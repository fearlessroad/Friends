-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema BFriends
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema BFriends
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BFriends` DEFAULT CHARACTER SET utf8 ;
USE `BFriends` ;

-- -----------------------------------------------------
-- Table `BFriends`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BFriends`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `alias` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `DOB` DATE NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BFriends`.`friendships`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BFriends`.`friendships` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `friend_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_friendships_users_idx` (`user_id` ASC),
  INDEX `fk_friendships_users1_idx` (`friend_id` ASC),
  CONSTRAINT `fk_friendships_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `BFriends`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_friendships_users1`
    FOREIGN KEY (`friend_id`)
    REFERENCES `BFriends`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
