-- 21-09-2020
-- create new table currencies
ALTER TABLE `currencies` ADD `is_active` TINYINT(1) NOT NULL DEFAULT '1' AFTER `code`;
ALTER TABLE `users` ADD `otp` INT(6) NULL AFTER `tfw_type`, ADD `otp_time` DATETIME NULL AFTER `otp`;
-- 22-09-2020
ALTER TABLE `users` ADD `provider_id` VARCHAR(200) NULL AFTER `parent_id`, ADD `provider` VARCHAR(200) NOT NULL DEFAULT 'system' AFTER `provider_id`;
ALTER TABLE `users` ADD `trw_profile` INT NULL AFTER `trw_type`;


