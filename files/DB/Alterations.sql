// 13-JAN-2014-For sync-data only on local-----------------

ALTER TABLE `bills` ADD `sync` BOOLEAN NOT NULL DEFAULT '0';
ALTER TABLE `bill_items` ADD `sync` BOOLEAN NOT NULL DEFAULT '0';
ALTER TABLE `counter_items` ADD `sync` BOOLEAN NOT NULL DEFAULT '0';

ALTER TABLE `items` ADD `sync` BOOLEAN NOT NULL DEFAULT '0';
ALTER TABLE `item_categories` ADD `sync` BOOLEAN NOT NULL DEFAULT '0';
ALTER TABLE `packing` ADD `sync` BOOLEAN NOT NULL DEFAULT '0';
