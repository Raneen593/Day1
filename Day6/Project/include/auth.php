<?php
session_start();

$users = [
    'admin' => [
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
        'email' => 'admin@example.com'
    ],
    'user1' => [
        'password' => password_hash('password123', PASSWORD_DEFAULT),
        'email' => 'user1@example.com'
    ]
];

if (!isset($_SESSION['upload_logs'])) {
    $_SESSION['upload_logs'] = [];
}

if (!isset($_SESSION['login_logs'])) {
    $_SESSION['login_logs'] = [];
}

function login($username, $password) {
    global $users;
    
    if (isset($users[$username])) {
        if (password_verify($password, $users[$username]['password'])) {
            $_SESSION['user'] = [
                'username' => $username,
                'email' => $users[$username]['email']
            ];
            
            $_SESSION['login_logs'][] = [
                'date' => date('Y-m-d H:i:s'),
                'user' => $username,
                'status' => 'success'
            ];
            
            return true;
        }
    }
    
    $_SESSION['login_logs'][] = [
        'date' => date('Y-m-d H:i:s'),
        'user' => $username,
        'status' => 'failed'
    ];
    
    return false;
}

function register($username, $email, $password) {
    global $users;
    
    if (isset($users[$username])) {
        return false;
    }
    
    $users[$username] = [
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'email' => $email
    ];
    
    $_SESSION['user'] = [
        'username' => $username,
        'email' => $email
    ];
    
    return true;
}

function addUploadLog($fileName, $fileType, $fileSize) {
    $filePath = 'uploads/' . $fileName;
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $filePath);
    finfo_close($finfo);
    
    $logEntry = [
        'date' => date('Y-m-d H:i:s'),
        'user' => getUser()['username'],
        'name' => $fileName,
        'type' => strtoupper($fileType),
        'mime' => $mimeType,
        'size' => round($fileSize / 1024, 2) . ' KB',
        'path' => $filePath
    ];
    
    array_unshift($_SESSION['upload_logs'], $logEntry);
    return $logEntry;
}

// تعريف واحد فقط للدالة getUploadLogs
function getUploadLogs() {
    $logs = $_SESSION['upload_logs'] ?? [];
    
    // تحديث السجلات القديمة إذا لزم الأمر
    foreach ($logs as &$log) {
        if (!isset($log['mime']) && file_exists($log['path'])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $log['mime'] = finfo_file($finfo, $log['path']);
            finfo_close($finfo);
        }
    }
    
    return $logs;
}

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function getUser() {
    return isLoggedIn() ? $_SESSION['user'] : null;
}

function logout() {
    session_unset();
    session_destroy();
}
?>