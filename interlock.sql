SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `interlock`.`serviceCenter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interlock`.`serviceCenter` ;

CREATE  TABLE IF NOT EXISTS `interlock`.`serviceCenter` (
  `servCenterID` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `address` VARCHAR(45) NULL ,
  `city` VARCHAR(45) NULL ,
  `state` VARCHAR(2) NULL ,
  `zip` VARCHAR(45) NULL ,
  `phone` VARCHAR(45) NULL ,
  `website` VARCHAR(45) NULL ,
  `fax` VARCHAR(45) NULL ,
  `email` VARCHAR(255) NULL ,
  PRIMARY KEY (`servCenterID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interlock`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interlock`.`role` ;

CREATE  TABLE IF NOT EXISTS `interlock`.`role` (
  `roleID` INT NOT NULL ,
  `roleName` VARCHAR(45) NULL ,
  PRIMARY KEY (`roleID`) ,
  UNIQUE INDEX `roleName_UNIQUE` (`roleName` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------

INSERT INTO `role` (`roleID`, `roleName`) VALUES
(1, 'ADMIN'),
(2, 'TECHNICIAN');


-- -----------------------------------------------------
-- Table `interlock`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interlock`.`user` ;

CREATE  TABLE IF NOT EXISTS `interlock`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NULL ,
  `password` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `verification` VARCHAR(255) NULL ,
  `role` INT NULL ,
  `salt` VARCHAR(45) NULL ,
  `fName` VARCHAR(45) NULL ,
  `lName` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  INDEX `role_idx` (`role` ASC) ,
  CONSTRAINT `role`
    FOREIGN KEY (`role` )
    REFERENCES `interlock`.`role` (`roleID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interlock`.`lessee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interlock`.`lessee` ;

CREATE  TABLE IF NOT EXISTS `interlock`.`lessee` (
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
  CONSTRAINT `homeDealer`
    FOREIGN KEY (`homeDealer` )
    REFERENCES `interlock`.`serviceCenter` (`servCenterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `lUserID`
    FOREIGN KEY (`userID` )
    REFERENCES `interlock`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interlock`.`serviceType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interlock`.`serviceType` ;

CREATE  TABLE IF NOT EXISTS `interlock`.`serviceType` (
  `servID` INT NOT NULL ,
  `desc` VARCHAR(255) NULL ,
  `price` DECIMAL(5,2) NULL ,
  `duration` INT NULL COMMENT 'Number of days before next service due.' ,
  PRIMARY KEY (`servID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interlock`.`technician`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interlock`.`technician` ;

CREATE  TABLE IF NOT EXISTS `interlock`.`technician` (
  `userID` INT NOT NULL ,
  `phone` VARCHAR(25) NULL ,
  `servCenterID` INT NULL ,
  PRIMARY KEY (`userID`) ,
  INDEX `DealerID_idx` (`servCenterID` ASC) ,
  INDEX `userID_idx` (`userID` ASC) ,
  CONSTRAINT `techDealer`
    FOREIGN KEY (`servCenterID` )
    REFERENCES `interlock`.`serviceCenter` (`servCenterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `tUserID`
    FOREIGN KEY (`userID` )
    REFERENCES `interlock`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interlock`.`device`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interlock`.`device` ;

CREATE  TABLE IF NOT EXISTS `interlock`.`device` (
  `deviceID` INT NOT NULL ,
  `serialNum` VARCHAR(45) NOT NULL ,
  `type` VARCHAR(45) NULL ,
  `lastCal` DATETIME NULL ,
  `lastServ` DATETIME NULL ,
  `lastDraegerServ` DATETIME NULL ,
  `leased` TINYINT(1) NULL ,
  `locationID` INT NULL COMMENT 'Could be located at dealer or customer' ,
  PRIMARY KEY (`deviceID`) ,
  UNIQUE INDEX `serialNum_UNIQUE` (`serialNum` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interlock`.`invoice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interlock`.`invoice` ;

CREATE  TABLE IF NOT EXISTS `interlock`.`invoice` (
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
  CONSTRAINT `serviceID`
    FOREIGN KEY (`servTypeID` )
    REFERENCES `interlock`.`serviceType` (`servID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `lesseeID`
    FOREIGN KEY (`lesseeID` )
    REFERENCES `interlock`.`lessee` (`userID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `dealerID`
    FOREIGN KEY (`servCenterID` )
    REFERENCES `interlock`.`serviceCenter` (`servCenterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `technicianID`
    FOREIGN KEY (`techID` )
    REFERENCES `interlock`.`technician` (`userID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `handsetID`
    FOREIGN KEY (`handsetID` )
    REFERENCES `interlock`.`device` (`deviceID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `controlboxID`
    FOREIGN KEY (`controlboxID` )
    REFERENCES `interlock`.`device` (`deviceID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interlock`.`appointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interlock`.`appointment` ;

CREATE  TABLE IF NOT EXISTS `interlock`.`appointment` (
  `appID` INT NOT NULL AUTO_INCREMENT ,
  `servCenterID` INT NULL ,
  `custID` INT NULL ,
  `date` DATETIME NULL ,
  `comment` VARCHAR(255) NULL ,
  PRIMARY KEY (`appID`) ,
  INDEX `Customer_idx` (`custID` ASC) ,
  INDEX `DealerID_idx` (`servCenterID` ASC) ,
  CONSTRAINT `appointmentDealer`
    FOREIGN KEY (`servCenterID` )
    REFERENCES `interlock`.`serviceCenter` (`servCenterID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `appointmentCustomer`
    FOREIGN KEY (`custID` )
    REFERENCES `interlock`.`lessee` (`userID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
