SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `tbcategoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbcategoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT ,
  `categoria` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idcategoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbcoiso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbcoiso` (
  `idcoiso` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `descricao` TEXT NULL ,
  `status` CHAR(1) NOT NULL DEFAULT 'A' ,
  `idcategoria` INT NOT NULL ,
  PRIMARY KEY (`idcoiso`) ,
  INDEX `fk_tbcoiso_tbcategoria_idx` (`idcategoria` ASC) ,
  CONSTRAINT `fk_tbcoiso_tbcategoria`
    FOREIGN KEY (`idcategoria` )
    REFERENCES `tbcategoria` (`idcategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbadmin`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbadmin` (
  `idadmin` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(150) NOT NULL ,
  `senha` CHAR(32) NULL ,
  PRIMARY KEY (`idadmin`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
