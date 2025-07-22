<?php
require_once __DIR__ . '/includes/auth.php';

if (!isLoggedIn()) {
    header("Location: index.php");
    exit();
}

$message = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $message = ['type' => 'danger', 'text' => 'File is not an image'];
    }
    elseif (file_exists($targetFile)) {
        $message = ['type' => 'danger', 'text' => 'File already exists'];
    }
    elseif ($_FILES['image']['size'] > 5000000) {
        $message = ['type' => 'danger', 'text' => 'File is too large (max 5MB)'];
    }
    elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $message = ['type' => 'danger', 'text' => 'Only JPG, JPEG, PNG & GIF files are allowed'];
    }
    elseif (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        addUploadLog(
            basename($_FILES['image']['name']),
            $imageFileType,
            $_FILES['image']['size']
        );
        $message = ['type' => 'success', 'text' => 'Image uploaded successfully'];
    } else {
        $message = ['type' => 'danger', 'text' => 'Error uploading file'];
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<div class="card">
    <div class="card-header">
        <h3>Upload Image</h3>
    </div>
    <div class="card-body">
        <?php if ($message): ?>
        <div class="alert alert-<?= $message['type'] ?>"><?= $message['text'] ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Select Image</label>
                <input class="form-control" type="file" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>