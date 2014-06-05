DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(20) NOT NULL COMMENT 'ブログ公開時のデフォルトURLにするので、英数字のみ許可' COLLATE 'utf8_unicode_ci',
    `password_digest` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
    `blog_name` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
    `blog_title` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
    `blog_description` VARCHAR(500) NULL DEFAULT NULL COMMENT 'ブログの説明文（無くても可）' COLLATE 'utf8_unicode_ci',
    `date_created` DATETIME NOT NULL,
    `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `user_name` (`user_name`),
    UNIQUE INDEX `blog_name` (`blog_name`)
)
COMMENT='サービス利用者データ\r\nブログ情報を含む'
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;

INSERT INTO `blogapp`.`users`
(`user_name`, `password_digest`, `blog_name`, `blog_title`, `blog_description`, `date_created`)
 VALUES ('testuser', '8843d7f92416211de9ebb963ff4ce28125932878', 'testblog', 'Test Blog', 'This is a blog for testing usage.', '2014-04-25 10:49:38');
