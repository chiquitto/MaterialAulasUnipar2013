CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO cliente (nome,email)
VALUES
('Jose da Silva', 'jose@gmail.com'),
('Maria Aparecida', 'maria.65@hotmail.com'),
('Geraldo Santos', 'geraldo@yahoo.com'),
('Margarida Rosa', 'margarida@rosa.com');
