SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `phoneNumber` varchar(11) NOT NULL DEFAULT '0',
  `emailID` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `admin` boolean NOT NULL DEFAULT FALSE,
  `created`  timestamp  NOT  NULL  DEFAULT  CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;


INSERT INTO `Users` (`id`, `name`, `phoneNumber`, `emailID`, `password`, `admin`, `created`) VALUES
(1, 'Tony Stark', '01234567891', 'ironman@avengers.com', 'Pepper', TRUE, CURRENT_TIMESTAMP),
(2, 'Steve Rogers', '12345678910', 'captainamerica@avengers.com', 'Peggy', TRUE, CURRENT_TIMESTAMP),
(3, 'Thor Odinson', '23456789101', 'thor@avengers.com', 'Jane', FALSE, CURRENT_TIMESTAMP),
(4, 'Bruce Banner', '45447878787', 'bruce@avengers.com', 'Betty', FALSE, CURRENT_TIMESTAMP);