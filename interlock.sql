SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `Interlock` ;
CREATE SCHEMA IF NOT EXISTS `Interlock` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Interlock` ;

-- -----------------------------------------------------
-- Table `Interlock`.`ServiceCenter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Interlock`.`ServiceCenter` ;

CREATE  TABLE IF NOT EXISTS `Interlock`.`ServiceCenter` (
  `servCenterID` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `address` VARCHAR(45) NULL ,
  `city` VARCHAR(45) NULL ,
  `zip` VARCHAR(45) NULL ,
  `phone` VARCHAR(45) NULL ,
  `website` VARCHAR(45) NULL ,
  `fax` VARCHAR(45) NULL ,
  `email` VARCHAR(255) NULL ,
  PRIMARY KEY (`servCenterID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Interlock`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Interlock`.`User` ;

CREATE  TABLE IF NOT EXISTS `Interlock`.`User` (
  `userID` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NULL ,
  `password` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `verification` VARCHAR(255) NULL ,
  `role` VARCHAR(45) NULL ,
  PRIMARY KEY (`userID`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Interlock`.`Lessee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Interlock`.`Lessee` ;

CREATE  TABLE IF NOT EXISTS `Interlock`.`Lessee` (
  `userID` INT NOT NULL ,
  `address` VARCHAR(255) NULL ,
  `homePhone` VARCHAR(25) NULL ,
  `mobilePhone` VARCHAR(25) NULL ,
  `homeDealer` INT NULL ,
  `discount` DECIMAL NULL ,
  `Comment` VARCHAR(255) NULL ,
  `removeDate` DATETIME NULL ,
  PRIMARY KEY (`userID`) ,
  INDEX `HomeDealer_idx` (`homeDealer` ASC) ,
  INDEX `userID_idx` (`userID` ASC) ,
  CONSTRAINT `HomeDealer`
    FOREIGN KEY (`homeDealer` )
    REFERENCES `Interlock`.`ServiceCenter` (`servCenterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `lUserID`
    FOREIGN KEY (`userID` )
    REFERENCES `Interlock`.`User` (`userID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Interlock`.`ServiceType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Interlock`.`ServiceType` ;

CREATE  TABLE IF NOT EXISTS `Interlock`.`ServiceType` (
  `servID` INT NOT NULL ,
  `desc` VARCHAR(255) NULL ,
  `price` DECIMAL(5,2) NULL ,
  `duration` INT NULL COMMENT 'Number of days before next service due.' ,
  PRIMARY KEY (`servID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Interlock`.`Technician`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Interlock`.`Technician` ;

CREATE  TABLE IF NOT EXISTS `Interlock`.`Technician` (
  `userID` INT NOT NULL ,
  `fName` VARCHAR(45) NULL ,
  `lName` VARCHAR(45) NULL ,
  `phone` VARCHAR(25) NULL ,
  `servCenterID` INT NULL ,
  `email` VARCHAR(255) NULL ,
  PRIMARY KEY (`userID`) ,
  INDEX `DealerID_idx` (`servCenterID` ASC) ,
  INDEX `userID_idx` (`userID` ASC) ,
  CONSTRAINT `techDealer`
    FOREIGN KEY (`servCenterID` )
    REFERENCES `Interlock`.`ServiceCenter` (`servCenterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `tUserID`
    FOREIGN KEY (`userID` )
    REFERENCES `Interlock`.`User` (`userID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Interlock`.`Device`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Interlock`.`Device` ;

CREATE  TABLE IF NOT EXISTS `Interlock`.`Device` (
  `deviceID` INT NOT NULL ,
  `type` VARCHAR(45) NULL ,
  `lastCal` DATETIME NULL ,
  `lastServ` DATETIME NULL ,
  `lastDraegerServ` DATETIME NULL ,
  `leased` TINYINT(1) NULL ,
  `locationID` INT NULL COMMENT 'Could be located at dealer or customer' ,
  PRIMARY KEY (`deviceID`) ,
  INDEX `locationID_idx` (`locationID` ASC) ,
  INDEX `serviceCenter_idx` (`locationID` ASC) ,
  CONSTRAINT `lessee`
    FOREIGN KEY (`locationID` )
    REFERENCES `Interlock`.`Lessee` (`userID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `serviceCenter`
    FOREIGN KEY (`locationID` )
    REFERENCES `Interlock`.`ServiceCenter` (`servCenterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Interlock`.`Invoice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Interlock`.`Invoice` ;

CREATE  TABLE IF NOT EXISTS `Interlock`.`Invoice` (
  `invoiceNum` INT NOT NULL AUTO_INCREMENT ,
  `serviceDate` DATE NOT NULL ,
  `servTypeID` INT NOT NULL ,
  `subTotal` DECIMAL(5,2) NULL ,
  `total` DECIMAL(5,2) NULL ,
  `lesseeID` INT NOT NULL ,
  `servCenterID` INT NULL ,
  `techID` INT NULL ,
  `handsetID` INT NULL ,
  `controlboxID` INT NULL ,
  `comment` VARCHAR(255) NULL ,
  PRIMARY KEY (`invoiceNum`) ,
  INDEX `ServiceID_idx` (`servTypeID` ASC) ,
  INDEX `CustomerID_idx` (`lesseeID` ASC) ,
  INDEX `DealerID_idx` (`servCenterID` ASC) ,
  INDEX `TechnicianID_idx` (`techID` ASC) ,
  INDEX `HandsetID_idx` (`handsetID` ASC) ,
  INDEX `ControlboxID_idx` (`controlboxID` ASC) ,
  CONSTRAINT `ServiceID`
    FOREIGN KEY (`servTypeID` )
    REFERENCES `Interlock`.`ServiceType` (`servID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `lesseeID`
    FOREIGN KEY (`lesseeID` )
    REFERENCES `Interlock`.`Lessee` (`userID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `DealerID`
    FOREIGN KEY (`servCenterID` )
    REFERENCES `Interlock`.`ServiceCenter` (`servCenterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `TechnicianID`
    FOREIGN KEY (`techID` )
    REFERENCES `Interlock`.`Technician` (`userID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `HandsetID`
    FOREIGN KEY (`handsetID` )
    REFERENCES `Interlock`.`Device` (`deviceID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ControlboxID`
    FOREIGN KEY (`controlboxID` )
    REFERENCES `Interlock`.`Device` (`deviceID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Interlock`.`Appointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Interlock`.`Appointment` ;

CREATE  TABLE IF NOT EXISTS `Interlock`.`Appointment` (
  `appID` INT NOT NULL AUTO_INCREMENT ,
  `servCenterID` INT NULL ,
  `custID` INT NULL ,
  `date` DATETIME NULL ,
  `comment` VARCHAR(255) NULL ,
  `Appointmentcol` VARCHAR(45) NULL ,
  PRIMARY KEY (`appID`) ,
  INDEX `Customer_idx` (`custID` ASC) ,
  INDEX `DealerID_idx` (`servCenterID` ASC) ,
  CONSTRAINT `appointmentDealer`
    FOREIGN KEY (`servCenterID` )
    REFERENCES `Interlock`.`ServiceCenter` (`servCenterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `appointmentCustomer`
    FOREIGN KEY (`custID` )
    REFERENCES `Interlock`.`Lessee` (`userID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
