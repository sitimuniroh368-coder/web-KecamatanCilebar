-- Migration: Create employees table for Data Pegawai Kecamatan
-- Run this SQL to create the employees table

CREATE TABLE IF NOT EXISTS employees (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data based on the organizational structure
INSERT INTO employees (name, position, division, display_order) VALUES
('Dr. H. Ahmad Fauzi, M.Si.', 'Camat Kecamatan Cilebar', 'Kepala Daerah', 1),
('Ir. Budi Santoso, M.AP', 'Sekretaris Camat', 'Sekretariat', 2),
('Siti Aminah, S.E', 'Kepala Sub Bagian Umum', 'Sekretariat', 3),
('Drs. Eko Prasetyo', 'Kepala Seksi Pelayanan', 'Seksi Pelayanan Umum', 4),
('Dewi Sartika, S.Sos.', 'Kepala Seksi Pelayanan', 'Seksi Pelayanan Umum', 5),
('Muhammad Ridwan', 'Staf Pelayanan', 'Seksi Pelayanan Umum', 6)
ON DUPLICATE KEY UPDATE name = name;

