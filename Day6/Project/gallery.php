<?php
require_once __DIR__ . '/includes/auth.php';

if (!isLoggedIn()) {
    header("Location: index.php");
    exit();
}

$images = [];
if (is_dir('uploads')) {
    foreach (scandir('uploads') as $file) {
        if ($file != '.' && $file != '..') {
            $filePath = 'uploads/' . $file;
            $images[] = [
                'name' => $file,
                'path' => $filePath,
                'size' => round(filesize($filePath) / 1024, 2) . ' KB',
                'type' => strtoupper(pathinfo($filePath, PATHINFO_EXTENSION))
            ];
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<div class="card">
    <div class="card-header">
        <h3>Gallery</h3>
    </div>
    <div class="card-body">
        <?php if (empty($images)): ?>
        <div class="alert alert-info">No images found</div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($images as $image): ?>
                    <tr>
                        <td><img src="<?= $image['path'] ?>" class="img-thumbnail" style="max-width: 100px;"></td>
                        <td><?= $image['name'] ?></td>
                        <td><?= $image['type'] ?></td>
                        <td><?= $image['size'] ?></td>
                        <td>
                            <a href="<?= $image['path'] ?>" target="_blank" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="upload.php">Back To Upload</a> |
            <a href="logout.php">logout</a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>