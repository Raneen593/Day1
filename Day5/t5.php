<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رفع الصور</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $file = $_FILES['avatar'];
                            $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
                            if (in_array($file['type'], $allowed) && $file['error'] == 0) {
                                $targetPath = 'uploads/' . basename($file['name']);
                                
                                if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                                    echo '<img src="'.$targetPath.'" class="img-thumbnail mt-3" width="200">';
                                } else {
                                    echo '<div class="alert alert-danger">حدث خطأ أثناء رفع الملف</div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger">نوع الملف غير مسموح به. يسمح فقط بملفات JPG و PNG</div>';
                            }
                        }
                        ?>

                        <form method="post" enctype="multipart/form-data" class="p-3">
                            <label class="form-label">Choose Photo (JPG || PNG )</label>
                            <input type="file" name="avatar" class="form-control mb-2" required>
                            <button type="submit" class="btn btn-success w-100">Upload </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>