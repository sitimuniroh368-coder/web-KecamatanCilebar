<?php
/**
 * Migration Script: Create employees table
 * Run this file once via browser: http://localhost/cobain/database/run_migration_employees.php
 * Or via command line: php database/run_migration_employees.php
 */

require_once __DIR__ . '/../config/database.php';

try {
    $pdo = DatabaseConnection::getConnection();
    
    // Check if table already exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'employees'");
    $tableExists = $stmt->fetch();
    
    if ($tableExists) {
        $message = "Tabel 'employees' sudah ada. Migration tidak diperlukan.";
        $success = true;
    } else {
        // Create employees table
        $pdo->exec("CREATE TABLE IF NOT EXISTS employees (
          id INT AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(120) NOT NULL,
          position VARCHAR(160) NOT NULL,
          division VARCHAR(120) NULL,
          photo_path VARCHAR(255) NULL,
          phone VARCHAR(60) NULL,
          email VARCHAR(160) NULL,
          display_order INT DEFAULT 0,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        
        // Insert sample data
        $pdo->exec("INSERT INTO employees (name, position, division, display_order) VALUES
        ('Dr. H. Ahmad Fauzi, M.Si.', 'Camat Kecamatan Cilebar', 'Kepala Daerah', 1),
        ('Ir. Budi Santoso, M.AP', 'Sekretaris Camat', 'Sekretariat', 2),
        ('Siti Aminah, S.E', 'Kepala Sub Bagian Umum', 'Sekretariat', 3),
        ('Drs. Eko Prasetyo', 'Kepala Seksi Pelayanan', 'Seksi Pelayanan Umum', 4),
        ('Dewi Sartika, S.Sos.', 'Kepala Seksi Pelayanan', 'Seksi Pelayanan Umum', 5),
        ('Muhammad Ridwan', 'Staf Pelayanan', 'Seksi Pelayanan Umum', 6)");
        
        $message = "Migration berhasil! Tabel 'employees' telah dibuat dengan data contoh.";
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
    <title>Migration: Employees Table</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2f8e6a;
            margin-top: 0;
        }
        .success {
            color: #10b981;
            background: #d1fae5;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #10b981;
        }
        .error {
            color: #ef4444;
            background: #fee2e2;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #ef4444;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #2f8e6a;
            text-decoration: none;
            padding: 10px 20px;
            background: #f1f5f9;
            border-radius: 6px;
        }
        a:hover {
            background: #e2e8f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Migration: Employees Table</h1>
        <?php if ($success): ?>
            <div class="success">
                <strong>✓ Berhasil!</strong><br>
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php else: ?>
            <div class="error">
                <strong>✗ Error!</strong><br>
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        <a href="<?php echo str_replace('/database/run_migration_employees.php', '', $_SERVER['PHP_SELF']); ?>/admin/employees.php">Kembali ke Admin</a>
    </div>
</body>
</html>

