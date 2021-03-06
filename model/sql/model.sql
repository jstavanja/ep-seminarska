-- MySQL Script generated by MySQL Workbench
-- Tue Jan  9 21:34:05 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `password` VARCHAR(128) NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  `status` INT NOT NULL,
  `username` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `postcode` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `userid_UNIQUE` (`id` ASC),
  UNIQUE INDEX `email_address_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`administrator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`administrator` (
  `user_id` INT NOT NULL,
  `certifikat` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `certifikat_UNIQUE` (`certifikat` ASC),
  CONSTRAINT `fk_administrator_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`seller`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`seller` (
  `user_id` INT NOT NULL,
  `activated` TINYINT NOT NULL,
  `certifikat` VARCHAR(128) NOT NULL,
  INDEX `fk_seller_user_idx` (`user_id` ASC),
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `certifikat_UNIQUE` (`certifikat` ASC),
  CONSTRAINT `fk_seller_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`customer` (
  `user_id` INT NOT NULL,
  `activated` TINYINT NOT NULL,
  `address` VARCHAR(128) NOT NULL,
  `phone_number` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_customer_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL,
  `description` VARCHAR(2048) NOT NULL,
  `price` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`status` (
  `id` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`order` (
  `id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `status_id` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_nakup_stanje1_idx` (`status_id` ASC),
  INDEX `fk_nakup_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_nakup_stanje1`
    FOREIGN KEY (`status_id`)
    REFERENCES `mydb`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_nakup_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ordered_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ordered_items` (
  `order_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  INDEX `fk_table1_artikel1_idx` (`item_id` ASC),
  INDEX `fk_table1_nakup1_idx` (`order_id` ASC),
  PRIMARY KEY (`order_id`, `item_id`),
  CONSTRAINT `fk_table1_artikel1`
    FOREIGN KEY (`item_id`)
    REFERENCES `mydb`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_nakup1`
    FOREIGN KEY (`order_id`)
    REFERENCES `mydb`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`rating`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`rating` (
  `user_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  `rating` INT NOT NULL,
  PRIMARY KEY (`user_id`, `item_id`),
  INDEX `fk_ocena_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ocena_artikel1`
    FOREIGN KEY (`item_id`)
    REFERENCES `mydb`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ocena_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`size`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`size` (
  `size` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`size`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`available_size`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`available_size` (
  `item_id` INT NOT NULL,
  `size_size` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`item_id`, `size_size`),
  INDEX `fk_available_size_size1_idx` (`size_size` ASC),
  CONSTRAINT `fk_size_item1`
    FOREIGN KEY (`item_id`)
    REFERENCES `mydb`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_available_size_size1`
    FOREIGN KEY (`size_size`)
    REFERENCES `mydb`.`size` (`size`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`image` (
  `location` VARCHAR(128) NOT NULL,
  `item_id` INT NOT NULL,
  PRIMARY KEY (`location`),
  UNIQUE INDEX `location_UNIQUE` (`location` ASC),
  INDEX `fk_image_item1_idx` (`item_id` ASC),
  CONSTRAINT `fk_image_item1`
    FOREIGN KEY (`item_id`)
    REFERENCES `mydb`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
