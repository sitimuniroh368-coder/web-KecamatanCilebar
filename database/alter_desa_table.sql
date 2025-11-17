-- Add new columns to desa table
ALTER TABLE `desa` ADD COLUMN `image` varchar(255) DEFAULT NULL AFTER `slug`;
ALTER TABLE `desa` ADD COLUMN `contact_person` varchar(100) DEFAULT NULL AFTER `head_email`;
ALTER TABLE `desa` ADD COLUMN `contact_phone` varchar(20) DEFAULT NULL AFTER `contact_person`;
ALTER TABLE `desa` ADD COLUMN `contact_email` varchar(100) DEFAULT NULL AFTER `contact_phone`;
ALTER TABLE `desa` ADD COLUMN `latitude` decimal(10, 8) DEFAULT NULL AFTER `contact_email`;
ALTER TABLE `desa` ADD COLUMN `longitude` decimal(11, 8) DEFAULT NULL AFTER `latitude`;
