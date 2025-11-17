-- Migration: Add Sapa Camat service if it doesn't exist
-- Run this SQL to ensure Sapa Camat service is in the database

INSERT INTO services (name, description, requirements, notes)
SELECT 
    'Sapa Camat',
    'Sampaikan Aspirasi dan Aduan Langsung ke Camat',
    'Tidak ada persyaratan khusus. Masyarakat dapat langsung menyampaikan aspirasi, saran, atau aduan melalui WhatsApp.',
    'Layanan ini memungkinkan masyarakat untuk berkomunikasi langsung dengan Camat melalui WhatsApp. Pastikan untuk menyampaikan aspirasi atau aduan dengan sopan dan jelas.'
WHERE NOT EXISTS (
    SELECT 1 FROM services WHERE LOWER(name) = 'sapa camat'
);

