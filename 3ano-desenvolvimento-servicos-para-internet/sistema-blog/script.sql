CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `resumo` varchar(255) NULL,
  `texto` TEXT NULL,
  `ativo` CHAR(1) NOT NULL,
  `destaque` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;