/* ---------------------------------------------------- */
/*  Generated by Enterprise Architect Version 13.5 		*/
/*  Created On : 08-abr.-2022 11:23:27 				*/
/*  DBMS       : MySql 						*/
/* ---------------------------------------------------- */

SET FOREIGN_KEY_CHECKS=0 
;

/* Drop Tables */

DROP TABLE IF EXISTS `Generos` CASCADE
;

/* Create Tables */

CREATE TABLE `Generos`
(
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(50) NOT NULL,
	CONSTRAINT `PK_Generos` PRIMARY KEY (`id` ASC)
)

;

SET FOREIGN_KEY_CHECKS=1 
;