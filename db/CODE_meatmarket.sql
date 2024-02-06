-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema meatmarket
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema meatmarket
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `meatmarket` DEFAULT CHARACTER SET utf8 ;
USE `meatmarket` ;

-- -----------------------------------------------------
-- Table `meatmarket`.`Supplier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meatmarket`.`Supplier` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `phone_UNIQUE` (`phone` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `meatmarket`.`Meat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meatmarket`.`Meat` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `quantity` INT NOT NULL,
  `idSupplier` INT NOT NULL,
  `origin` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idmeatType_UNIQUE` (`id` ASC) ,
  INDEX `fk_Animal_Supplier_idx` (`idSupplier` ASC) ,
  CONSTRAINT `fk_Animal_Supplier`
    FOREIGN KEY (`idSupplier`)
    REFERENCES `meatmarket`.`Supplier` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `meatmarket`.`Cuts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meatmarket`.`Cuts` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `price` DOUBLE NOT NULL,
  `stocks` DOUBLE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `meatmarket`.`AnimalCuts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meatmarket`.`AnimalCuts` (
  `Meat_idMeat` INT NOT NULL,
  `Cuts_idCuts` INT NOT NULL,
  `quantity` INT NOT NULL,
  `quality` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`Meat_idMeat`, `Cuts_idCuts`),
  INDEX `fk_Animal_has_Cuts_Cuts1_idx` (`Cuts_idCuts` ASC) ,
  CONSTRAINT `fk_Animal_has_Cuts_Animal1`
    FOREIGN KEY (`Meat_idMeat`)
    REFERENCES `meatmarket`.`Meat` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animal_has_Cuts_Cuts1`
    FOREIGN KEY (`Cuts_idCuts`)
    REFERENCES `meatmarket`.`Cuts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
