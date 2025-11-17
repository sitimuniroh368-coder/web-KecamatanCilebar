-- Migration: Add requirements and notes fields to services table
-- Run this SQL to update the services table

ALTER TABLE services 
ADD COLUMN IF NOT EXISTS requirements MEDIUMTEXT NULL AFTER description,
ADD COLUMN IF NOT EXISTS notes MEDIUMTEXT NULL AFTER requirements;

