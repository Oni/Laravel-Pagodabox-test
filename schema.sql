CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `sessions` (
  `id` VARCHAR(40) NOT NULL,
  `last_activity` INT(10) NOT NULL,
  `data` TEXT NOT NULL,
  PRIMARY KEY (`id`)
);
