<?php 
include("index.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$base_url = dirname($_SERVER['SCRIPT_NAME']);
$base_url = ($base_url == '/') ? '' : $base_url;
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body class="bg-dark">
    <nav class="bg-info-subtle">
        <ul class="nav nav-tabs">
            <li class="nav-item nav-left">
                <a class="nav-link" href="<?= $base_url ?>/project.php">
                    <strong>
                        <h5>Training System (<?= $_SESSION['role'] ?? 'Guest' ?>)</h5>
                    </strong>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], 'students') ? 'active' : '' ?>"
                    href="<?= $base_url ?>/students/dp.php">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], 'course') ? 'active' : '' ?>"
                    href="<?= $base_url ?>/course/dp.php">Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], 'Enrollments') ? 'active' : '' ?>"
                    href="<?= $base_url ?>/Enrollments/dp.php">Enrollments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $base_url ?>/logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <?php if(($_SESSION['role'] ?? '') == "admin"){ ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2">
                <a href="<?= $base_url ?>/admin/dp.php" class="btn btn-outline-info w-100"
                    onclick="console.log('Admin Path: <?= $base_url ?>/admin/dp.php')">
                    View Admin
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?= $base_url ?>/state/dp.php" class="btn btn-outline-info w-100">View Login</a>
            </div>
        </div>
    </div>
    <?php } ?>
</body>

</html>