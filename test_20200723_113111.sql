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
	`type` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created_at` DateTime NULL DEFAULT NULL,
	`updated_at` DateTime NULL DEFAULT NULL,
	`deleted_at` DateTime NULL DEFAULT NULL,
	`status` VarChar( 11 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "m_services" -----------------------------------
CREATE TABLE `m_services`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`type_id` Int( 255 ) NOT NULL,
	`description` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created_at` DateTime NULL DEFAULT NULL,
	`updated_at` DateTime NULL DEFAULT NULL,
	`unit_price` Double( 22, 0 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "m_customer" -----------------------------------
CREATE TABLE `m_customer`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`addres` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
	`city` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
	`country` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
	`created_at` DateTime NULL DEFAULT NULL,
	`updated_at` DateTime NULL DEFAULT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "t_transcation" --------------------------------
CREATE TABLE `t_transcation`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`subject` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`issue_date` Date NULL DEFAULT NULL,
	`due_date` Date NULL DEFAULT NULL,
	`created_at` DateTime NULL DEFAULT NULL,
	`updated_at` DateTime NULL DEFAULT NULL,
	`amount_due` Decimal( 10, 0 ) NULL DEFAULT NULL,
	`customer_id` Int( 255 ) NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 14;
-- -------------------------------------------------------------


-- CREATE TABLE "t_transaction_details" ------------------------
CREATE TABLE `t_transaction_details`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`trans_id` Int( 255 ) NOT NULL,
	`service_id` Int( 255 ) NOT NULL,
	`quantity` Int( 255 ) NOT NULL,
	`amount` Int( 255 ) NULL DEFAULT NULL,
	`created_at` DateTime NOT NULL,
	`updated_at` DateTime NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- Dump data of "m_type" -----------------------------------
BEGIN;

INSERT INTO `m_type`(`id`,`type`,`created_at`,`updated_at`,`deleted_at`,`status`) VALUES 
( '1', 'Service', NULL, NULL, NULL, NULL );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "m_services" -------------------------------
BEGIN;

INSERT INTO `m_services`(`id`,`type_id`,`description`,`created_at`,`updated_at`,`unit_price`) VALUES 
( '1', '1', 'Design', NULL, NULL, '230' ),
( '2', '1', 'Developmet', NULL, NULL, '330' ),
( '3', '1', 'Meetings', NULL, NULL, '60' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "m_customer" -------------------------------
BEGIN;

INSERT INTO `m_customer`(`id`,`name`,`addres`,`city`,`country`,`created_at`,`updated_at`) VALUES 
( '1', 'Barrington Publishers', '17 Great Suffolk Street', 'London SE1 ONS', 'United Kingdoms', NULL, NULL ),
( '2', 'Discovery Designs', '41 St Vincent Place', 'Glasgow G1 2ER', 'Scotland', NULL, NULL );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "t_transcation" ----------------------------
BEGIN;

INSERT INTO `t_transcation`(`id`,`subject`,`issue_date`,`due_date`,`created_at`,`updated_at`,`amount_due`,`customer_id`) VALUES 
( '13', 'Test', '2020-07-01', '2020-07-23', '2020-07-23 07:03:18', '2020-07-23 07:03:18', NULL, '1' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "t_transaction_details" --------------------
BEGIN;

INSERT INTO `t_transaction_details`(`id`,`trans_id`,`service_id`,`quantity`,`amount`,`created_at`,`updated_at`) VALUES 
( '19', '13', '3', '1', '60', '2020-07-23 07:03:22', '2020-07-23 07:03:22' ),
( '20', '13', '3', '2', '120', '2020-07-23 07:03:23', '2020-07-23 07:03:23' ),
( '21', '13', '3', '3', '180', '2020-07-23 07:03:23', '2020-07-23 07:03:23' );
COMMIT;
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_m_type_m_services" ------------------------
CREATE INDEX `lnk_m_type_m_services` USING BTREE ON `m_services`( `type_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_m_customer_t_transcation" -----------------
CREATE INDEX `lnk_m_customer_t_transcation` USING BTREE ON `t_transcation`( `customer_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_m_services_t_transaction_details" ---------
CREATE INDEX `lnk_m_services_t_transaction_details` USING BTREE ON `t_transaction_details`( `service_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_t_transcation_t_transaction_details" ------
CREATE INDEX `lnk_t_transcation_t_transaction_details` USING BTREE ON `t_transaction_details`( `trans_id` );
-- -------------------------------------------------------------


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


-- CREATE LINK "lnk_m_services_t_transaction_details" ----------
ALTER TABLE `t_transaction_details`
	ADD CONSTRAINT `lnk_m_services_t_transaction_details` FOREIGN KEY ( `service_id` )
	REFERENCES `m_services`( `id` )
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


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


