CREATE TABLE `images` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL COMMENT '画像ファイル名',
    `type` VARCHAR(20) NOT NULL,
    `raw_data` MEDIUMBLOB NOT NULL,
    `thumb_data` BLOB NULL,
    `owner_id` INT(11) NOT NULL,
    `date_created` DATETIME NOT NULL,
    `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `FK_images_users` (`owner_id`),
    CONSTRAINT `FK_images_users` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`)
)
COMMENT='ユーザーからアップロードされた画像を保存するテーブル'
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;



CREATE TABLE `images_users` (
    `image_id` INT(11) NOT NULL,
    `user_id` INT(11) NOT NULL,
    PRIMARY KEY (`image_id`, `user_id`),
    INDEX `FK_images_users_users` (`user_id`),
    CONSTRAINT `FK_images_users_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
    CONSTRAINT `FK_images_users_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)
COMMENT='ユーザーのアバター画像のリレーションを定義'
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;


CREATE TABLE `images_articles` (
    `image_id` INT(11) NOT NULL,
    `article_id` INT(11) NOT NULL,
    PRIMARY KEY (`image_id`, `article_id`),
    INDEX `FK_images_articles_articles` (`article_id`),
    CONSTRAINT `FK_images_articles_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
    CONSTRAINT `FK_images_articles_articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
)
COMMENT='記事と画像の関連テーブル'
ENGINE=InnoDB;
