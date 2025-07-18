<?php
$allowed = ['image/jpeg', 'image/jpg'];
$maxSize = 4 * 1024 * 1024; 
$errors = [];
$filesToUpload = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['images'])) {
    foreach ($_FILES['images']['tmp_name'] as $i => $tmp) {
        $name = $_FILES['images']['name'][$i];
        $type = $_FILES['images']['type'][$i];
        $size = $_FILES['images']['size'][$i];
        $error = $_FILES['images']['error'][$i];
        
        if (!in_array($type, $allowed)) {
            $errors[] = "الملف $name ليس من نوع JPG";
            continue;
        }
        
        if ($size > $maxSize) {
            $errors[] = "الملف $name حجمه أكبر من 4MB";
            continue;
        }
        $targetPath = 'uploads/' . basename($name);
        if (move_uploaded_file($tmp, $targetPath)) {
            $filesToUpload[] = [
                'name' => $name,
                'path' => $targetPath
            ];
        } 
    }
    if (!empty($errors) && !empty($filesToUpload)) {
        foreach ($filesToUpload as $file) {
            if (file_exists($file['path'])) {
                unlink($file['path']);
            }
        }
        $filesToUpload = [];
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light py-4">
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <h5>لم يتم رفع أي صور بسبب الأخطاء التالية:</h5>
                    <?= implode('<br>', $errors) ?>
                </div>
                <?php elseif (!empty($filesToUpload) && empty($errors)): ?>
                <div class="alert alert-success">
                    تم رفع جميع الصور بنجاح!
                </div>
                <div class="d-flex flex-wrap">
                    <?php foreach ($filesToUpload as $file): ?>
                    <img src="uploads/<?= htmlspecialchars($file['name']) ?>" class="img-thumbnail m-2"
                        style="max-width:150px">
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" name="images[]" multiple class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">رفع </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>