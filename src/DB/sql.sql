CREATE TABLE `payments` ( 
	`id` int(11) NOT NULL AUTO_INCREMENT , 
	`timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`last_update` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`order_mdm` VARCHAR(12) NOT NULL , 
	`trtype_mdm` VARCHAR(3), 
	`amount_mdm` VARCHAR (11), 
	`currency_mdm` VARCHAR(3), 
	`terminal_mdm` VARCHAR(8),
        `timestamp_mdm` VARCHAR(14),
        `rrn_mdm` VARCHAR(12),
        `intref_mdm` VARCHAR(32),
	PRIMARY KEY (`id`)
) 
ENGINE = InnoDB;

CREATE TABLE `payments_callback` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`order_id` varchar(12) NOT NULL,
	`json_answer` text NOT NULL,
	`timestamp_x` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) 
ENGINE=InnoDB;