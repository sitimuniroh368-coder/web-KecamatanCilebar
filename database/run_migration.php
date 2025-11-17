<?php
/**
 * Migration Script: Add image_path column to announcements table
 * Run this file once via browser: http://localhost/cobain/database/run_migration.php
 * Or via command line: php database/run_migration.php
 */

require_once __DIR__ . '/../config/database.php';

try {
    $pdo = DatabaseConnection::getConnection();
    
    // Check if column already exists
    $stmt = $pdo->query("SHOW COLUMNS FROM announcements LIKE 'image_path'");
    $columnExists = $stmt->fetch();
    
    if ($columnExists) {
        $message = "Kolom 'image_path' sudah ada di tabel 'announcements'. Migration tidak diperlukan.";
        $success = true;
    } else {
        // Run migration
        $pdo->exec("ALTER TABLE announcements ADD COLUMN image_path VARCHAR(255) NULL AFTER content");
        $message = "Migration berhasil! Kolom 'image_path' telah ditambahkan ke tabel 'announcements'.";
        $success = true;
    }
} catch (PDOException $e) {
    $message = "Error: " . $e->getMessage();
    $success = false;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Migration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .success {
            color: #16a34a;
            background: #dcfce7;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #16a34a;
        }
        .error {
            color: #dc2626;
            background: #fee2e2;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #dc2626;
        }
        h1 {
            margin-top: 0;
            color: #1e293b;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Database Migration</h1>
        <div class="<?php echo $success ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <?php if ($success): ?>
            <p style="margin-top: 20px;">
                <a href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? '../index.php'); ?>">← Kembali</a>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>

