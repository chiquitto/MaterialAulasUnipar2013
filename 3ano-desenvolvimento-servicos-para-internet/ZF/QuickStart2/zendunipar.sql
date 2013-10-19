CREATE TABLE IF NOT EXISTS `categoria` (
  `cdcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`cdcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `categoria` (`cdcategoria`, `categoria`) VALUES
(1, 'ESPORTE'),
(2, 'ECONOMIA'),
(3, 'POLITICA'),
(4, 'BRASIL'),
(5, 'INTERNACIONAL'),
(6, 'INFORMÁTICA');

CREATE TABLE IF NOT EXISTS `noticia` (
  `cdnoticia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `datacadastro` date NOT NULL,
  `cdcategoria` int(11) NOT NULL,
  PRIMARY KEY (`cdnoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

Insert Into noticia
(nome, texto, datacadastro, cdcategoria) VALUES
('Noticia 1', 'Texto 1', '2013-10-16', 1),
('Noticia 2', 'Texto 2', '2013-10-16', 2),
('Noticia 3', 'Texto 3', '2013-10-16', 3),
('Noticia 4', 'Texto 4', '2013-10-16', 4),
('Noticia 5', 'Texto 5', '2013-10-16', 5)
;

CREATE TABLE `usuario` (
 `cdusuario` int(11) NOT NULL AUTO_INCREMENT,
 `nome` varchar(50) NOT NULL,
 `email` varchar(100) NOT NULL,
 `senha` varchar(40) NOT NULL,
 PRIMARY KEY (`cdusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuario` (`nome`, `email`, `senha`) VALUES
('Usuário Administrativo', 'admin@admin.com', 'admin');