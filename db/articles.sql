DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
    `content` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
    `digest` CHAR(32) NOT NULL COMMENT '記事公開時のURLに使用。作成時に初期化' COLLATE 'utf8_unicode_ci',
    `date_created` DATETIME NOT NULL,
    `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
    `date_published` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
    `user_id` INT(11) NOT NULL,
    `published` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '記事が公開されているか。1: 公開 0:非公開',
    PRIMARY KEY (`id`),
    UNIQUE INDEX `digest` (`digest`),
    INDEX `FK_articles_users` (`user_id`),
    CONSTRAINT `FK_articles_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)
COMMENT='ブログ記事を保存するテーブル'
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;
