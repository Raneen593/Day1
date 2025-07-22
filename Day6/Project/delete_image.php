<?php
require_once __DIR__ . '/includes/auth.php';

if (!isLoggedIn()) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['file'])) {
    $file = 'uploads/' . basename($_GET['file']);
    
    if (file_exists($file)) {
        unlink($file);
        
        if (isset($_SESSION['upload_logs'])) {
            $_SESSION['upload_logs'] = array_filter($_SESSION['upload_logs'], 
                function($log) use ($file) {
                    return $log['path'] !== $file;
                });
        }
    }
}

header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'gallery.php'));
exit();
?>