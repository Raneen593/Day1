<?php
session_start();


define('UPLOAD_DIR', 'uploads/');
define('ALLOWED_TYPES', ['jpg', 'jpeg', 'png', 'gif']);

if (!file_exists(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0777, true);
}

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        [
            'id' => '1',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s')
        ]
    ];
}

// بيانات المنتجات الافتراضية
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}
?>