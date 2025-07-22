<?php
require_once __DIR__ . '/includes/auth.php';

if (!isLoggedIn()) {
    header("Location: index.php");
    exit();
}

$user = getUser();
require_once __DIR__ . '/includes/header.php';
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Dashboard</h3>
        </div>
        <div class="card-body">
            <h2>Welcome to your dashboard <?= htmlspecialchars($user['username']) ?>!</h2>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>