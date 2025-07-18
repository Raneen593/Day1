<?php
$userIP = $_SERVER['REMOTE_ADDR'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($userIP === '127.0.0.1' || $requestMethod !== 'GET') {
    header("Location: denied.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة المسموح بها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h2 class="text-center mb-0">Access OK</h2>
            </div>

        </div>
    </div>
</body>

</html>