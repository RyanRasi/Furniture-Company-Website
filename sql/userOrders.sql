SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `phoneNumber` varchar(11) NOT NULL DEFAULT '0',
  `emailID` varchar(50) NOT NULL DEFAULT '',
  `item` varchar(50) NOT NULL DEFAULT '',
  `price` varchar(50) NOT NULL DEFAULT '',
  `created`  timestamp  NOT  NULL  DEFAULT  CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;


INSERT INTO `orders` (`id`, `name`, `phoneNumber`, `emailID`, `item`, `price`, `created`) VALUES
(1, 'Tony Stark', '01234567891', 'ironman@avengers.com', 'Bed', "£300.00", CURRENT_TIMESTAMP),
(2, 'Steve Rogers', '12345678910', 'captainamerica@avengers.com', 'Table', "£30.00", CURRENT_TIMESTAMP),
(3, 'Thor Odinson', '23456789101', 'thor@avengers.com', 'Fridge', "£250.00", CURRENT_TIMESTAMP),
(4, 'Bruce Banner', '45447878787', 'bruce@avengers.com', 'Spork', "£3.00", CURRENT_TIMESTAMP);