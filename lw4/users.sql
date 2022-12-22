CREATE SCHEMA `database`;
CREATE TABLE `database`.`users` (
  `id` INT NOT NULL,
  `login` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));
  
  
INSERT INTO `database`.`users` (`id`, `login`, `password`, `name`) VALUES ('1', 'Lin', 'root', 'Alina');
INSERT INTO `database`.`users` (`id`, `login`, `password`, `name`) VALUES ('2', 'Ssun', 'root', 'Leysan');
INSERT INTO `database`.`users` (`id`, `login`, `password`, `name`) VALUES ('3', 'Grr', 'root', 'Gerra');
