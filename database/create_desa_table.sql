CREATE TABLE IF NOT EXISTS `desa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL UNIQUE,
  `slug` varchar(255) NOT NULL UNIQUE,
  `population` int DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `head_name` varchar(255) DEFAULT NULL,
  `head_phone` varchar(255) DEFAULT NULL,
  `head_email` varchar(255) DEFAULT NULL,
  `village_office_phone` varchar(255) DEFAULT NULL,
  `village_office_email` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `statistics` json DEFAULT NULL,
  `map_iframe` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `desa` (`name`, `slug`, `population`, `area`, `head_name`, `head_phone`, `head_email`, `village_office_phone`, `village_office_email`, `description`, `statistics`) VALUES
('Kertamukti', 'kertamukti', 3500, '4.2 km²', 'Kepala Desa Kertamukti', '0812345678', 'kepala@kertamukti.desa.id', '0267123456', 'kantor@kertamukti.desa.id', 'Desa Kertamukti adalah salah satu desa di Kecamatan Cilebar dengan mayoritas penduduk bekerja di sektor pertanian dan perikanan.', '{\"households\": 850, \"men\": 1750, \"women\": 1750, \"education\": {\"SD\": 120, \"SMP\": 150, \"SMA\": 180, \"S1\": 50}, \"occupation\": {\"Petani\": 1200, \"Nelayan\": 600, \"Pedagang\": 400, \"Lainnya\": 300}}'),
('Cikande', 'cikande', 3200, '4.0 km²', 'Kepala Desa Cikande', '0812345679', 'kepala@cikande.desa.id', '0267123457', 'kantor@cikande.desa.id', 'Desa Cikande memiliki potensi pertanian padi dan tambak udang yang berkembang pesat.', '{\"households\": 780, \"men\": 1600, \"women\": 1600, \"education\": {\"SD\": 110, \"SMP\": 140, \"SMA\": 160, \"S1\": 45}, \"occupation\": {\"Petani\": 1100, \"Nelayan\": 550, \"Pedagang\": 380, \"Lainnya\": 270}}'),
('Mekarpohaci', 'mekarpohaci', 3100, '4.5 km²', 'Kepala Desa Mekarpohaci', '0812345680', 'kepala@mekarpohaci.desa.id', '0267123458', 'kantor@mekarpohaci.desa.id', 'Desa Mekarpohaci terletak di tepi perairan dan mengembangkan usaha perikanan.', '{\"households\": 750, \"men\": 1550, \"women\": 1550, \"education\": {\"SD\": 105, \"SMP\": 135, \"SMA\": 155, \"S1\": 40}, \"occupation\": {\"Petani\": 1050, \"Nelayan\": 600, \"Pedagang\": 350, \"Lainnya\": 250}}'),
('Rawasari', 'rawasari', 3800, '4.8 km²', 'Kepala Desa Rawasari', '0812345681', 'kepala@rawasari.desa.id', '0267123459', 'kantor@rawasari.desa.id', 'Desa Rawasari adalah desa dengan populasi terbesar di Kecamatan Cilebar.', '{\"households\": 920, \"men\": 1900, \"women\": 1900, \"education\": {\"SD\": 130, \"SMP\": 160, \"SMA\": 190, \"S1\": 55}, \"occupation\": {\"Petani\": 1300, \"Nelayan\": 700, \"Pedagang\": 450, \"Lainnya\": 350}}'),
('Kosambibatu', 'kosambibatu', 3400, '4.1 km²', 'Kepala Desa Kosambibatu', '0812345682', 'kepala@kosambibatu.desa.id', '0267123460', 'kantor@kosambibatu.desa.id', 'Desa Kosambibatu mengembangkan pertanian organik dan wisata lokal.', '{\"households\": 820, \"men\": 1700, \"women\": 1700, \"education\": {\"SD\": 115, \"SMP\": 145, \"SMA\": 170, \"S1\": 48}, \"occupation\": {\"Petani\": 1150, \"Nelayan\": 580, \"Pedagang\": 400, \"Lainnya\": 290}}'),
('Pusakajaya Utara', 'pusakajaya-utara', 2800, '3.9 km²', 'Kepala Desa Pusakajaya Utara', '0812345683', 'kepala@pusakajayautara.desa.id', '0267123461', 'kantor@pusakajayautara.desa.id', 'Desa Pusakajaya Utara fokus pada pengembangan infrastruktur dan pendidikan.', '{\"households\": 680, \"men\": 1400, \"women\": 1400, \"education\": {\"SD\": 95, \"SMP\": 125, \"SMA\": 145, \"S1\": 35}, \"occupation\": {\"Petani\": 950, \"Nelayan\": 450, \"Pedagang\": 300, \"Lainnya\": 250}}'),
('Pusakajaya Selatan', 'pusakajaya-selatan', 2900, '4.0 km²', 'Kepala Desa Pusakajaya Selatan', '0812345684', 'kepala@pusakajayaselatan.desa.id', '0267123462', 'kantor@pusakajayaselatan.desa.id', 'Desa Pusakajaya Selatan berkembang sebagai pusat perdagangan lokal.', '{\"households\": 700, \"men\": 1450, \"women\": 1450, \"education\": {\"SD\": 100, \"SMP\": 130, \"SMA\": 150, \"S1\": 38}, \"occupation\": {\"Petani\": 1000, \"Nelayan\": 480, \"Pedagang\": 330, \"Lainnya\": 270}}'),
('Sukaratu', 'sukaratu', 3600, '4.3 km²', 'Kepala Desa Sukaratu', '0812345685', 'kepala@sukaratu.desa.id', '0267123463', 'kantor@sukaratu.desa.id', 'Desa Sukaratu adalah sentra UMKM dengan produk kerajinan lokal.', '{\"households\": 870, \"men\": 1800, \"women\": 1800, \"education\": {\"SD\": 125, \"SMP\": 155, \"SMA\": 180, \"S1\": 52}, \"occupation\": {\"Petani\": 1200, \"Nelayan\": 600, \"Pedagang\": 420, \"Lainnya\": 310}}'),
('Tanjungsari', 'tanjungsari', 2400, '3.8 km²', 'Kepala Desa Tanjungsari', '0812345686', 'kepala@tanjungsari.desa.id', '0267123464', 'kantor@tanjungsari.desa.id', 'Desa Tanjungsari terletak di ujung utara dengan akses ke laut.', '{\"households\": 580, \"men\": 1200, \"women\": 1200, \"education\": {\"SD\": 80, \"SMP\": 110, \"SMA\": 130, \"S1\": 30}, \"occupation\": {\"Petani\": 800, \"Nelayan\": 650, \"Pedagang\": 250, \"Lainnya\": 200}}'),
('Ciptamargi', 'ciptamargi', 2700, '3.6 km²', 'Kepala Desa Ciptamargi', '0812345687', 'kepala@ciptamargi.desa.id', '0267123465', 'kantor@ciptamargi.desa.id', 'Desa Ciptamargi memiliki program pemberdayaan masyarakat yang kuat.', '{\"households\": 650, \"men\": 1350, \"women\": 1350, \"education\": {\"SD\": 90, \"SMP\": 120, \"SMA\": 140, \"S1\": 32}, \"occupation\": {\"Petani\": 900, \"Nelayan\": 530, \"Pedagang\": 320, \"Lainnya\": 250}}');
