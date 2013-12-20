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

ALTER TABLE `bill_items` ADD `counter_id` INT NOT NULL AFTER `bill_id`
