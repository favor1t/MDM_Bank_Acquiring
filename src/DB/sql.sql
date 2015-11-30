CREATE TABLE `mdmbank`.`payments` ( 
	`id` int(11) NOT NULL AUTO_INCREMENT , 
	`timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`last_update` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`order_id` VARCHAR(12) NOT NULL , 
	`trtype` VARCHAR(3) NOT NULL , 
	`amount` VARCHAR (8) NOT NULL , 
	`currency` VARCHAR(3) NOT NULL , 
	`terminal` VARCHAR(8) NOT NULL , 
	PRIMARY KEY (`id`)
) 
ENGINE = InnoDB;

CREATE TABLE `mdmbank`.`payments_callback` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`order_id` varchar(12) NOT NULL,
	`json_answer` text NOT NULL,
	`timestamp_x` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) 
ENGINE=InnoDB;