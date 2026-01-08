<?php
/**
 * Database Configuration
 * Sistem Informasi Pencacatan dan Arsip Dokumen
 */

// Database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sistem_arsip_dokumen');

// Application settings
define('APP_NAME', 'Sistem Arsip Dokumen');
define('APP_VERSION', '1.0.0');
define('BASE_URL', 'http://localhost/sistem-arsip-dokumen/');

// File upload settings
define('UPLOAD_PATH', __DIR__ . '/../uploads/documents/');
define('MAX_FILE_SIZE', 10485760); // 10MB in bytes
define('ALLOWED_EXTENSIONS', ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'jpg', 'jpeg', 'png']);

// Session settings
define('SESSION_NAME', 'sistem_arsip_session');
define('SESSION_LIFETIME', 3600); // 1 hour

// Timezone
date_default_timezone_set('Asia/Jakarta');
?>
