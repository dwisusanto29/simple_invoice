-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "m_type" ---------------------------------------
CREATE TABLE `m_type`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`type` BigInt( 255 ) NOT NULL,
	`created_at` DateTime NOT NULL,
	`updated_at` DateTime NOT NULL,
	`deleted_at` DateTime NOT NULL,
	`status` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "m_services" -----------------------------------
CREATE TABLE `m_services`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`type_id` Int( 255 ) NOT NULL,
	`description` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created_at` DateTime NOT NULL,
	`updated_at` DateTime NOT NULL,
	`unit_price` Double( 2, 0 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "m_customer" -----------------------------------
CREATE TABLE `m_customer`( 
	`id` Int( 255 ) NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`addres` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`city` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`country` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created_at` DateTime NOT NULL,
	`updated_at` DateTime NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "t_transcation" --------------------------------
CREATE TABLE `t_transcation`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`subject` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`issue_date` Date NOT NULL,
	`due_date` Date NOT NULL,
	`created_at` DateTime NOT NULL,
	`updated_at` DateTime NOT NULL,
	`subtotal` Decimal( 10, 0 ) NOT NULL,
	`tax` Decimal( 10, 0 ) NOT NULL,
	`payments` Decimal( 10, 0 ) NOT NULL,
	`amount_due` Decimal( 10, 0 ) NOT NULL,
	`customer_id` Int( 255 ) NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "t_transaction_details" ------------------------
CREATE TABLE `t_transaction_details`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`trans_id` Int( 255 ) NOT NULL,
	`service_id` Int( 255 ) NOT NULL,
	`quantity` Int( 255 ) NOT NULL,
	`amount` Int( 255 ) NOT NULL,
	`created_at` DateTime NOT NULL,
	`updated_at` DateTime NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- Dump data of "m_type" -----------------------------------
-- ---------------------------------------------------------


-- Dump data of "m_services" -------------------------------
-- ---------------------------------------------------------


-- Dump data of "m_customer" -------------------------------
-- ---------------------------------------------------------


-- Dump data of "t_transcation" ----------------------------
-- ---------------------------------------------------------


-- Dump data of "t_transaction_details" --------------------
-- ---------------------------------------------------------


-- CREATE LINK "lnk_m_type_m_services" -------------------------
ALTER TABLE `m_services`
	ADD CONSTRAINT `lnk_m_type_m_services` FOREIGN KEY ( `type_id` )
	REFERENCES `m_type`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_t_transcation_t_transaction_details" -------
ALTER TABLE `t_transaction_details`
	ADD CONSTRAINT `lnk_t_transcation_t_transaction_details` FOREIGN KEY ( `trans_id` )
	REFERENCES `t_transcation`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_m_customer_t_transcation" ------------------
ALTER TABLE `t_transcation`
	ADD CONSTRAINT `lnk_m_customer_t_transcation` FOREIGN KEY ( `customer_id` )
	REFERENCES `m_customer`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_m_services_t_transaction_details" ----------
ALTER TABLE `t_transaction_details`
	ADD CONSTRAINT `lnk_m_services_t_transaction_details` FOREIGN KEY ( `service_id` )
	REFERENCES `m_services`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


