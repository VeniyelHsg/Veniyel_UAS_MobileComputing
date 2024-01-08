SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `crud_db`
--

-- --------------------------------------------------------

--
-- Product Table
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `description` text,
  `purchase_price` int(11) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `product_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `description`, `purchase_price`, `selling_price`, `product_picture`) VALUES
(1, 'Tissue', 'Needs', 4000, 5000, '836-tissue.jpg'),
(4, '342', '', 55, 234, '308-handsanitizer.jpg'),
(5, '123', '33', 55, 123, '48-pepsodent.jpg');

COMMIT;
