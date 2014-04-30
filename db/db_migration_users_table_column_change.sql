ALTER TABLE `users`
    ALTER `password` DROP DEFAULT;
ALTER TABLE `users`
    CHANGE COLUMN `password` `password_digest` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci' AFTER `user_name`;