-- Migration: Add image_path column to announcements table
-- Run this SQL to add image support to announcements

ALTER TABLE announcements 
ADD COLUMN image_path VARCHAR(255) NULL AFTER content;

