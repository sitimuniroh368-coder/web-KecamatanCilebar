-- MySQL schema for Sistem Informasi Kecamatan Cilebar
-- Create database (if not exists)
-- CREATE DATABASE IF NOT EXISTS `kec_cilebar` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
-- USE `kec_cilebar`;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  username VARCHAR(60) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS news (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(180) NOT NULL,
  summary VARCHAR(300) NOT NULL,
  content MEDIUMTEXT NOT NULL,
  image_path VARCHAR(255) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS announcements (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(180) NOT NULL,
  content MEDIUMTEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(160) NOT NULL,
  description MEDIUMTEXT NOT NULL,
  requirements MEDIUMTEXT NULL,
  notes MEDIUMTEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gallery (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(160) NOT NULL,
  image_path VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS profile (
  id TINYINT PRIMARY KEY DEFAULT 1,
  content MEDIUMTEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(160) NOT NULL,
  message MEDIUMTEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS settings (
  id TINYINT PRIMARY KEY DEFAULT 1,
  site_title VARCHAR(180) NOT NULL DEFAULT 'Sistem Informasi Kecamatan Cilebar',
  address VARCHAR(240) NULL,
  phone VARCHAR(60) NULL,
  email VARCHAR(160) NULL,
  whatsapp VARCHAR(60) NULL,
  instagram VARCHAR(160) NULL,
  facebook VARCHAR(160) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS welcome_message (
  id TINYINT PRIMARY KEY DEFAULT 1,
  camat_name VARCHAR(120) NOT NULL,
  camat_photo VARCHAR(255) NULL,
  message MEDIUMTEXT NOT NULL,
  sekretaris_name VARCHAR(120) NULL,
  sekretaris_photo VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS wilayah_info (
  id TINYINT PRIMARY KEY DEFAULT 1,
  content MEDIUMTEXT NOT NULL,
  map_iframe TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (name, username, password_hash)
VALUES ('Administrator', 'admin', '$2y$10$y1mYdWZQw4Jv1l5x0rV5.e0v2n0lS6kXz3s8u9B4jYc5iG2JjEo8O')
ON DUPLICATE KEY UPDATE username = username;
-- Password for the above hash: admin123

INSERT INTO profile (id, content) VALUES (1, 'Selamat datang di Kecamatan Cilebar')
ON DUPLICATE KEY UPDATE id = id;

INSERT INTO settings (id, site_title, address, phone, email, whatsapp, instagram, facebook) 
VALUES (1, 'Sistem Informasi Kecamatan Cilebar', 'Jl. Cilebar No. 270, Kecamatan Cilebar, Kabupaten Karawang, Jawa Barat 41384, Indonesia', NULL, NULL, NULL, NULL, NULL)
ON DUPLICATE KEY UPDATE id = id;

INSERT INTO welcome_message (id, camat_name, message) 
VALUES (1, 'H. Kurna, S.Sos, M.AP', 'Selamat datang di website resmi Kecamatan Cilebar. Website ini merupakan media informasi dan komunikasi antara Pemerintah Kecamatan Cilebar dengan masyarakat.')
ON DUPLICATE KEY UPDATE id = id;

INSERT INTO wilayah_info (id, content) 
VALUES (1, 'Kecamatan Cilebar merupakan salah satu kecamatan di Kabupaten Karawang yang memiliki potensi pertanian dan perikanan yang cukup besar.')
ON DUPLICATE KEY UPDATE id = id;


