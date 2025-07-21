<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $folder = 'uploads/' . date('Y-m-d') . '/';
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }
    
    $fileName = basename($_FILES['image']['name']);
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $new_name = 'img_' . uniqid() . '.' . $ext;
    $target = $folder . $new_name;
    
    $allowed = ['jpeg', 'jpg', 'png'];
    if (in_array($ext, $allowed)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $_SESSION['upload_message'] = "Uploaded to $target";
        } else {
            $_SESSION['upload_message'] = "Error uploading file.";
        }
    } else {
        $_SESSION['upload_message'] = "Invalid file type. Only JPEG, JPG, PNG allowed.";
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_GET['delete'])) {
    $fileToDelete = urldecode($_GET['delete']);
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        $_SESSION['upload_message'] = "File deleted successfully.";
    } else {
        $_SESSION['upload_message'] = "File not found.";
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$imageFiles = [];
$uploadDir = 'uploads/';
if (file_exists($uploadDir)) {
    $dirIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($uploadDir));
    foreach ($dirIterator as $file) {
        if ($file->isFile() && in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png'])) {
            $imageFiles[] = $file->getPathname();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .table-img {
        max-width: 150px;
        height: auto;
        border-radius: 4px;
    }

    .action-col {
        width: 120px;
    }
    </style>
</head>

<body class="bg-dark">
    <div class="container py-5">

        <?php if (isset($_SESSION['upload_message'])): ?>
        <div class="alert alert-info mb-4"><?= $_SESSION['upload_message'] ?></div>
        <?php unset($_SESSION['upload_message']); ?>
        <?php endif; ?>

        <div class="card mb-5 bg-dark">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-8">
                        <input type="file" class="form-control" name="image" accept="image/*" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">Upload</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped m-0 table-dark ">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Path</th>
                        <th class="action-col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($imageFiles as $index => $image): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td>
                            <img src="<?= $image ?>" alt="Uploaded Image" class="table-img">
                        </td>
                        <td class="small"><?= $image ?></td>
                        <td>
                            <a href="?delete=<?= urlencode($image) ?>" class="btn btn-sm btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>