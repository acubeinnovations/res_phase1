//17-Dec-2013 db alteration
ALTER TABLE `bills` CHANGE `bill_date` `bill_date` DATETIME NOT NULL ;

CREATE TABLE IF NOT EXISTS `bill_kitchen_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;



INSERT INTO `bill_kitchen_statuses` (`id`, `name`) VALUES
(1, 'To Kitchen'),
(2, 'Accept'),
(3, 'Reject'),
(4, 'Finished');

ALTER TABLE `bills` ADD `bill_kitchen_status_id` INT NULL AFTER `bill_status_id` ;
ALTER TABLE `bill_items` ADD `bill_kitchen_status_id` INT NULL AFTER `bill_item_status_id`;

ALTER TABLE `bill_items` ADD `counter_id` INT NOT NULL AFTER `bill_id`;



//23-Dec-2013 db alteration - server not updated



ALTER TABLE `bills` ADD `paid` DOUBLE NOT NULL AFTER `amount` , ADD `balance` DOUBLE NOT NULL AFTER `paid`;

ALTER TABLE `bills` ADD `packing_charge` DOUBLE NULL AFTER `balance`;

;

CREATE TABLE IF NOT EXISTS `packing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;



INSERT INTO `packing` (`id`, `name`, `rate`) VALUES
(1, 'Small Container', 5),
(2, 'Large Container', 10),
(3, 'Juice Container', 3);


ALTER TABLE `bill_items` ADD `packing_id` INT NULL AFTER `bill_kitchen_status_id` ,
ADD `packing_rate` DOUBLE NULL AFTER `packing_id` ,
ADD `packing_quantity` INT NULL AFTER `packing_rate` ,
ADD `packing_amount` DOUBLE NULL AFTER `packing_quantity` ,
ADD INDEX ( `packing_id` )

ALTER TABLE `items` ADD `packing_id` INT NOT NULL ,
ADD INDEX ( `packing_id` ) ;
