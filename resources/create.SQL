-- MySQL Script generated by MySQL Workbench
-- Thu Nov  4 02:07:46 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cookbook
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cookbook` ;

-- -----------------------------------------------------
-- Schema cookbook
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cookbook` DEFAULT CHARACTER SET utf8 ;
USE `cookbook` ;

-- -----------------------------------------------------
-- Table `cookbook`.`cooks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cookbook`.`cooks` ;

CREATE TABLE IF NOT EXISTS `cookbook`.`cooks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(32) NULL,
  `lastname` VARCHAR(32) NULL,
  `bio` VARCHAR(1024) NULL,
  `quote` VARCHAR(512) NULL,
  `picture-url` VARCHAR(512) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cookbook`.`recipes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cookbook`.`recipes` ;

CREATE TABLE IF NOT EXISTS `cookbook`.`recipes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(128) NOT NULL,
  `teaser-text` VARCHAR(512) NULL,
  `image-url` VARCHAR(512) NULL,
  `preparation-time` INT(3) NOT NULL,
  `level` INT(2) NULL,
  `amount-of-people` INT(3) NULL,
  `cooks_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_recipes_cooks1_idx` (`cooks_id` ASC),
  CONSTRAINT `fk_recipes_cooks1`
    FOREIGN KEY (`cooks_id`)
    REFERENCES `cookbook`.`cooks` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cookbook`.`ingredients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cookbook`.`ingredients` ;

CREATE TABLE IF NOT EXISTS `cookbook`.`ingredients` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NULL,
  `image-url` VARCHAR(512) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cookbook`.`conversion-type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cookbook`.`conversion-type` ;

CREATE TABLE IF NOT EXISTS `cookbook`.`conversion-type` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `grams` INT(5) NULL,
  `name` VARCHAR(32) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cookbook`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cookbook`.`categories` ;

CREATE TABLE IF NOT EXISTS `cookbook`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cookbook`.`recipe_has_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cookbook`.`recipe_has_categories` ;

CREATE TABLE IF NOT EXISTS `cookbook`.`recipe_has_categories` (
  `recipes_id` INT NOT NULL,
  `categories_id` INT NOT NULL,
  INDEX `fk_recipe_has_categories_recipes_idx` (`recipes_id` ASC),
  INDEX `fk_recipe_has_categories_categories1_idx` (`categories_id` ASC),
  PRIMARY KEY (`recipes_id`, `categories_id`),
  CONSTRAINT `fk_recipe_has_categories_recipes`
    FOREIGN KEY (`recipes_id`)
    REFERENCES `cookbook`.`recipes` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recipe_has_categories_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `cookbook`.`categories` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cookbook`.`recipe-steps`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cookbook`.`recipe-steps` ;

CREATE TABLE IF NOT EXISTS `cookbook`.`recipe-steps` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `step-number` INT(2) NULL,
  `title` VARCHAR(48) NULL,
  `body` TEXT(1024) NULL,
  `image-url` VARCHAR(512) NULL,
  `recipes_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_recipe-steps_recipes1_idx` (`recipes_id` ASC),
  CONSTRAINT `fk_recipe-steps_recipes1`
    FOREIGN KEY (`recipes_id`)
    REFERENCES `cookbook`.`recipes` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cookbook`.`recipe_has_ingredients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cookbook`.`recipe_has_ingredients` ;

CREATE TABLE IF NOT EXISTS `cookbook`.`recipe_has_ingredients` (
  `recipes_id` INT NOT NULL,
  `ingredients_id` INT NOT NULL,
  `conversion-type_id` INT NOT NULL,
  `quantity` DECIMAL(4) NULL,
  INDEX `fk_recipe_has_ingredients_recipes1_idx` (`recipes_id` ASC),
  INDEX `fk_recipe_has_ingredients_ingredients1_idx` (`ingredients_id` ASC),
  PRIMARY KEY (`recipes_id`, `ingredients_id`),
  INDEX `fk_recipe_has_ingredients_conversion-type1_idx` (`conversion-type_id` ASC),
  CONSTRAINT `fk_recipe_has_ingredients_recipes1`
    FOREIGN KEY (`recipes_id`)
    REFERENCES `cookbook`.`recipes` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recipe_has_ingredients_ingredients1`
    FOREIGN KEY (`ingredients_id`)
    REFERENCES `cookbook`.`ingredients` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recipe_has_ingredients_conversion-type1`
    FOREIGN KEY (`conversion-type_id`)
    REFERENCES `cookbook`.`conversion-type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
