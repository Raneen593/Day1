<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $folder = 'uploads/' . date('Y-m-d') . '/';
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }
    
    $fileName = basename($_FILES['image']['name']);
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $new_name = uniqid('img_', true) . '.' . $ext;
    $target = $folder . time() . "_" . $new_name;
    
    $allowed = ['jpeg', 'jpg', 'png'];
    if (in_array($ext, $allowed)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $message = "<div class='alert alert-success d-flex align-items-center mb-3'>
                            <i class='bi bi-check-circle-fill me-2'></i>
                            Uploaded to $target
                        </div>";
        } else {
            $message = "<div class='alert alert-danger d-flex align-items-center mb-3'>
                        <i class='bi bi-exclamation-triangle-fill me-2'></i>
                        Error uploading file.
                    </div>";
        }
    } else {
        $message = "<div class='alert alert-danger d-flex align-items-center mb-3'>
                        <i class='bi bi-x-circle-fill me-2'></i>
                        Invalid file type. Only JPEG, JPG, PNG allowed.
                    </div>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    .upload-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        background-color: #f8f9fa;
    }

    .file-input-label {
        cursor: pointer;
        padding: 10px 15px;
        background-color: #e9ecef;
        border-radius: 5px;
        display: inline-block;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="upload-container">

            <?php if (!empty($message)) echo $message; ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <label class="file-input-label">
                        Choose File
                        <input type="file" class="d-none" name="image" id="fileInput" required>
                    </label>
                    <span class="input-group-text" id="fileName">No file chosen</span>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>