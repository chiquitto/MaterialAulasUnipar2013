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

CREATE TABLE `usuario` (
 `cdusuario` int(11) NOT NULL AUTO_INCREMENT,
 `nome` varchar(50) NOT NULL,
 `email` varchar(100) NOT NULL,
 `senha` varchar(40) NOT NULL,
 PRIMARY KEY (`cdusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuario` (`nome`, `email`, `senha`) VALUES
('Usuário Administrativo', 'admin@admin.com', 'admin');