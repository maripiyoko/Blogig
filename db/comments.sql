DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `comment` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
    `user_id` INT(11) NOT NULL,
    `article_id` INT(11) NOT NULL,
    `date_created` DATETIME NOT NULL,
    `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `FK__articles` (`article_id`),
    INDEX `FK__users` (`user_id`),
    INDEX `date_created` (`date_created`),
    CONSTRAINT `FK__articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
    CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)
COMMENT='ブログ記事へのコメント'
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;
