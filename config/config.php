<?php
// Global configuration for Kecamatan Cilebar Information System

// Update these according to your MySQL setup
define('DB_HOST', 'localhost');
define('DB_NAME', 'cobain');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Base URL (no trailing slash). Adjust if not served from web root.
// Example: define('BASE_URL', 'http://localhost/cobain');
define('BASE_URL', 'http://localhost/cobain');

// Public upload directory (must be writable by PHP)
define('UPLOAD_DIR', __DIR__ . '/../public/uploads');

// Application metadata
define('APP_NAME', 'Sistem Informasi Kecamatan Cilebar');
define('APP_SHORT', 'SIK Cilebar');

// Timezone
date_default_timezone_set('Asia/Jakarta');

?>


