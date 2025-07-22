<?php
require_once __DIR__ . '/includes/auth.php';

if (!isLoggedIn()) {
    header("Location: index.php");
    exit();
}

$_SESSION['login_logs'] = [
    [
        'date' => date('Y-m-d H:i:s'),
        'user' => 'test_user',
        'status' => 'success'
    ],
    [
        'date' => date('Y-m-d H:i:s', strtotime('-1 hour')),
        'user' => 'another_user',
        'status' => 'failed'
    ]
];
$loginLogs = $_SESSION['login_logs'] ?? [];

require_once __DIR__ . '/includes/header.php';
?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Login Log</h3>
    </div>
    <div class="card-body p-0">
        <?php if (empty($loginLogs)): ?>
        <div class="alert alert-info m-3">No login records found</div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-nowrap">Date</th>
                        <th class="text-nowrap">User</th>
                        <th class="text-nowrap">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($loginLogs as $log): ?>
                    <tr>
                        <td><?= htmlspecialchars($log['date']) ?></td>
                        <td><?= htmlspecialchars($log['user']) ?></td>
                        <td>
                            <?php if ($log['status'] === 'success'): ?>
                            <span class="badge bg-success">Success</span>
                            <?php else: ?>
                            <span class="badge bg-danger">Failed</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>