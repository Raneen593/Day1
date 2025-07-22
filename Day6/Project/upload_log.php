<?php
require_once __DIR__ . '/includes/auth.php';

if (!isLoggedIn()) {
    header("Location: index.php");
    exit();
}

require_once __DIR__ . '/includes/header.php';
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Upload Log</h3>
        </div>
        <div class="card-body p-0">
            <?php if (empty(getUploadLogs())): ?>
            <div class="alert alert-info m-3">No upload records found</div>
            <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-nowrap">Date</th>
                            <th class="text-nowrap">User</th>
                            <th class="text-nowrap">Type</th>
                            <th class="text-nowrap"> Path</th>
                            <th class="text-nowrap">MIME </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (getUploadLogs() as $log): ?>
                        <tr>
                            <td><?= htmlspecialchars($log['date'] ?? 'N/A') ?></td>
                            <td><?= htmlspecialchars($log['user'] ?? 'N/A') ?></td>
                            <td>
                                <span class="badge bg-primary">
                                    <?= htmlspecialchars($log['type'] ?? 'N/A') ?>
                                </span>
                            </td>

                            <td>
                                <small><?= htmlspecialchars($log['name'] ?? 'N/A') ?></small>
                            </td>
                            <td>
                                <span class="badge text-dark">
                                    <?= htmlspecialchars($log['mime'] ?? 'unknown') ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>