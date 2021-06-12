CREATE TABLE `member` (
    `email` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `birth` DATE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`email`)
)