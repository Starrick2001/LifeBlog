CREATE TABLE `member` (
    `email` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `birth` DATE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`email`)
);

CREATE TABLE `posts` (
    `id` integer(11) AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `imgUrl` varchar(100),
    `content` text NOT NULL,
    `author` text NOT NULL,
    PRIMARY KEY(`id`)
);