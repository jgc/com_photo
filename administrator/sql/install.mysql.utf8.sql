CREATE TABLE IF NOT EXISTS `#__photo` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`photo1` VARCHAR(255)  NOT NULL ,
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

