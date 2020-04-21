SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `Kitchen` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `variety` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `filepath` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL DEFAULT '',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

INSERT INTO `Kitchen` (`id`, `variety`, `name`, `filepath`, `price`) VALUES
(1, 'Utensil', 'Super Soft', 'Estrella.png', '£40.00'),
(2, 'Oven', 'Wooden Fortress', 'CraftSelection.jpg', '£350.00'),
(3, 'Fridge', 'Memory Dream', 'ScottishBeerBox.jpg', '£1,000.00');