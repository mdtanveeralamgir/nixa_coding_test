-- Create Schema
CREATE SCHEMA `nixa_client_manager` ;

-- Create Table
CREATE TABLE `Clients`.`new_table` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `FName` VARCHAR(50) NOT NULL,
  `LName` VARCHAR(50) NOT NULL,
  `PhoneNumber` VARCHAR(15) NULL,
  `DateOfContact` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);