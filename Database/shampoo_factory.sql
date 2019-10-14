-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2018 at 06:32 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shampoo_factory`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Username`, `Password`, `Email`, `Name`) VALUES
('ADMIN', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 'bogary@gmail.com', 'raghad bogery'),
('asmaaa', '35ed8bfe9c93e4f9a68875d141fac95632aeb409', 'asma@me.com', 'asma yamani'),
('nadak', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 'nada@gmail.com', 'Nada Kahild Al-kabour'),
('raghad', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 'Bogar@gmail.com', 'Raghad Boger'),
('raghadb', '19485e369c691fa8ece1fabc8a6ceabfb5666b79', 'Bogaryr@gmail.com', 'Raghad Bogery');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `C_ID` int(10) NOT NULL,
  `P_ID` int(10) NOT NULL,
  `quantity` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='A customer can add a product to the cart';

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `idAdmin` int(11) NOT NULL,
  `ad_userName` varchar(20) NOT NULL,
  `PhoneNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`idAdmin`, `ad_userName`, `PhoneNumber`) VALUES
(305, 'ADMIN', '0555123499');

-- --------------------------------------------------------

--
-- Table structure for table `Creates_Add_Mix`
--

CREATE TABLE `Creates_Add_Mix` (
  `Customer_ID` int(11) NOT NULL,
  `Mix_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Creates_Add_Mix`
--

INSERT INTO `Creates_Add_Mix` (`Customer_ID`, `Mix_ID`) VALUES
(503, 102),
(503, 104),
(507, 101),
(507, 139),
(509, 137),
(509, 138);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(10) NOT NULL,
  `cu_userName` varchar(20) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `Phone2` varchar(13) DEFAULT NULL,
  `ZipCode` varchar(20) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `StreatAddress` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `cu_userName`, `Phone`, `Phone2`, `ZipCode`, `City`, `Country`, `StreatAddress`) VALUES
(503, 'nadak', '055-5566-7777', '055-2356-4343', '35133', 'Jeddah', 'Saudi Arabia', 'Alnoor St.9'),
(507, 'Raghadb', '055-5566-7777', '', '34255', 'Dhahran', 'Saudi Arabia', 'Tihamah district bui'),
(508, 'raghad', '', NULL, NULL, NULL, NULL, NULL),
(509, 'asmaaa', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `edit and monitor`
--

CREATE TABLE `edit and monitor` (
  `A_ID` int(11) NOT NULL,
  `OID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='admins can edit and monitor order history';

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `Name` varchar(45) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `admin_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`Name`, `Description`, `admin_ID`) VALUES
('Almonds', 'balance the hair', 305),
('Coconut', 'Coconut is a good solution for dry hair', 305),
('Green Tea', 'cleans the scalp', 305),
('Honey', 'Hydrate', 305),
('Olive Oil', 'Olive oil give a natural silky and smooth hair', 305),
('Orange Peels', 'Cleans the scalp and treat hair loss', 305),
('Tomato', 'Tomato is a good solution for oily hair', 305);

-- --------------------------------------------------------

--
-- Table structure for table `mixtures`
--

CREATE TABLE `mixtures` (
  `MID` int(11) NOT NULL,
  `Color` varchar(45) NOT NULL,
  `Label` varchar(45) NOT NULL,
  `ScentName` varchar(45) NOT NULL,
  `Recommended` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mixtures`
--

INSERT INTO `mixtures` (`MID`, `Color`, `Label`, `ScentName`, `Recommended`) VALUES
(100, 'Orange', 'Sunshine', 'Jasmin', 1),
(101, 'Blue', 'Strawberry Garden', 'Strawberry', 1),
(102, 'Green', 'Vanilla Ocean', 'Vanilla', 1),
(136, 'Blue', 'Raghad', 'Biscuits', 0),
(137, 'Pink', 'Asma', 'Cherry Blossom', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mixtures_contains_ingrediants`
--

CREATE TABLE `mixtures_contains_ingrediants` (
  `MixID` int(11) NOT NULL,
  `IngrediantName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mixtures_contains_ingrediants`
--

INSERT INTO `mixtures_contains_ingrediants` (`MixID`, `IngrediantName`) VALUES
(100, 'Avocado'),
(100, 'Green Tea'),
(101, 'Coconut'),
(101, 'Honey'),
(102, 'Green Tea'),
(102, 'Honey'),
(136, 'Honey'),
(136, 'Olive Oil'),
(137, 'Coconut'),
(137, 'Honey');

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `OID` int(11) NOT NULL,
  `orderdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `shipdate` date DEFAULT NULL,
  `CID` int(10) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `tottal_price` varchar(45) DEFAULT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderhistory`
--

INSERT INTO `orderhistory` (`OID`, `orderdate`, `shipdate`, `CID`, `state`, `tottal_price`, `address`) VALUES
(414, '2018-04-16 13:32:16', '2018-04-19', 507, 'inPreperation', '105', ''),
(442, '2018-04-25 19:19:28', '2018-04-19', 507, 'inPreperation', '157.5', 'Raghad Bogery Tihamah district building no 5141, Dhahran 34255 7733 Dhahran 34255 Saudi Arabia');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `order_item_ID` int(11) NOT NULL COMMENT 'order item is included in the order history',
  `order_history_id` int(11) NOT NULL COMMENT 'order item is included in the order history',
  `quantity` int(1) NOT NULL DEFAULT '1',
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`order_item_ID`, `order_history_id`, `quantity`, `product_id`) VALUES
(819, 414, 1, 243),
(849, 442, 1, 278);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `MixID` int(11) DEFAULT NULL COMMENT 'some mixes can be a product',
  `size` varchar(45) DEFAULT NULL,
  `Price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `MixID`, `size`, `Price`) VALUES
(243, 100, 'Medium', 100),
(278, 101, 'Large', 150);

-- --------------------------------------------------------

--
-- Table structure for table `recommended_mixtures`
--

CREATE TABLE `recommended_mixtures` (
  `adID` int(11) NOT NULL,
  `IMixID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommended_mixtures`
--

INSERT INTO `recommended_mixtures` (`adID`, `IMixID`) VALUES
(305, 100),
(305, 101),
(305, 102);

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `Review_ID` int(10) NOT NULL,
  `customerID` int(10) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Review_Body` text NOT NULL,
  `Product_Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`Review_ID`, `customerID`, `Title`, `Review_Body`, `Product_Rate`) VALUES
(100, 503, 'Sunshine', 'it was a good product and service', 5),
(101, 507, 'Vanilla Ocean', 'Great product, Strong scent and hydrate the hair. Will buy again.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `scents`
--

CREATE TABLE `scents` (
  `SName` varchar(45) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `adminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scents`
--

INSERT INTO `scents` (`SName`, `Description`, `adminID`) VALUES
('Biscuits', 'sweet sugar aroma', 305),
('Cherry Blossom', 'flower scent', 305),
('Jasmin', 'sweet and relaxing jasmin flower aroma', 305),
('Strawberry', 'Strawberry strong flavour', 305),
('Vanilla', 'vanilla aroma from vanilla flower for relaxing', 305);

-- --------------------------------------------------------

--
-- Table structure for table `Type_Of_Accout`
--

CREATE TABLE `Type_Of_Accout` (
  `username` varchar(20) NOT NULL,
  `AccountType` enum('A','C') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Type_Of_Accout`
--

INSERT INTO `Type_Of_Accout` (`username`, `AccountType`) VALUES
('ADMIN', 'A'),
('asmaaa', 'C'),
('nadak', 'C'),
('raghad', 'C'),
('raghadb', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username_UNIQUE` (`Username`),
  ADD UNIQUE KEY `E-mail_UNIQUE` (`Email`);

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`C_ID`,`P_ID`),
  ADD KEY `Product_ID_idx` (`P_ID`);

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `idAdmin_UNIQUE` (`idAdmin`),
  ADD KEY `userName_idx` (`ad_userName`);

--
-- Indexes for table `Creates_Add_Mix`
--
ALTER TABLE `Creates_Add_Mix`
  ADD PRIMARY KEY (`Customer_ID`,`Mix_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`),
  ADD KEY `cu_userName_idx` (`cu_userName`);

--
-- Indexes for table `edit and monitor`
--
ALTER TABLE `edit and monitor`
  ADD PRIMARY KEY (`A_ID`,`OID`),
  ADD KEY `orderhistoryID_idx` (`OID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Name_UNIQUE` (`Name`),
  ADD KEY `admin_username_idx` (`admin_ID`);

--
-- Indexes for table `mixtures`
--
ALTER TABLE `mixtures`
  ADD PRIMARY KEY (`MID`),
  ADD UNIQUE KEY `MID_UNIQUE` (`MID`),
  ADD KEY `ScentName_idx` (`ScentName`);

--
-- Indexes for table `mixtures_contains_ingrediants`
--
ALTER TABLE `mixtures_contains_ingrediants`
  ADD PRIMARY KEY (`MixID`,`IngrediantName`),
  ADD KEY `IngrediantName` (`IngrediantName`);

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`OID`),
  ADD UNIQUE KEY `OID_UNIQUE` (`OID`),
  ADD KEY `CID_idx` (`CID`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`order_item_ID`,`order_history_id`),
  ADD KEY `OHID_idx` (`order_history_id`),
  ADD KEY `pid` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `ProductID_UNIQUE` (`ProductID`),
  ADD KEY `MixID` (`MixID`);

--
-- Indexes for table `recommended_mixtures`
--
ALTER TABLE `recommended_mixtures`
  ADD PRIMARY KEY (`adID`,`IMixID`),
  ADD KEY `MixID_idx` (`IMixID`),
  ADD KEY `adID` (`adID`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `customerID_idx` (`customerID`);

--
-- Indexes for table `scents`
--
ALTER TABLE `scents`
  ADD PRIMARY KEY (`SName`),
  ADD UNIQUE KEY `SName_UNIQUE` (`SName`),
  ADD KEY `admin_uname_idx` (`adminID`);

--
-- Indexes for table `Type_Of_Accout`
--
ALTER TABLE `Type_Of_Accout`
  ADD PRIMARY KEY (`username`,`AccountType`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=510;

--
-- AUTO_INCREMENT for table `mixtures`
--
ALTER TABLE `mixtures`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `order_item_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'order item is included in the order history', AUTO_INCREMENT=850;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `Review_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD CONSTRAINT `Product_ID` FOREIGN KEY (`P_ID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cutomer_ID` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `ad_userName` FOREIGN KEY (`ad_userName`) REFERENCES `Account` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Creates_Add_Mix`
--
ALTER TABLE `Creates_Add_Mix`
  ADD CONSTRAINT `creates_add_mix_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `cu_userName` FOREIGN KEY (`cu_userName`) REFERENCES `Account` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edit and monitor`
--
ALTER TABLE `edit and monitor`
  ADD CONSTRAINT `admin_ID` FOREIGN KEY (`A_ID`) REFERENCES `admin` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderhistoryID` FOREIGN KEY (`OID`) REFERENCES `orderhistory` (`OID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `fk_admin_ID` FOREIGN KEY (`admin_ID`) REFERENCES `admin` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mixtures`
--
ALTER TABLE `mixtures`
  ADD CONSTRAINT `mixtures_ibfk_1` FOREIGN KEY (`ScentName`) REFERENCES `scents` (`SName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mixtures_contains_ingrediants`
--
ALTER TABLE `mixtures_contains_ingrediants`
  ADD CONSTRAINT `mixtures_contains_ingrediants_ibfk_1` FOREIGN KEY (`MixID`) REFERENCES `mixtures` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD CONSTRAINT `CID` FOREIGN KEY (`CID`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `OHID` FOREIGN KEY (`order_history_id`) REFERENCES `orderhistory` (`OID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`ProductID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`MixID`) REFERENCES `mixtures` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recommended_mixtures`
--
ALTER TABLE `recommended_mixtures`
  ADD CONSTRAINT `recommended_mixtures_ibfk_1` FOREIGN KEY (`IMixID`) REFERENCES `mixtures` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `customerID` FOREIGN KEY (`customerID`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scents`
--
ALTER TABLE `scents`
  ADD CONSTRAINT `fk_adminID` FOREIGN KEY (`adminID`) REFERENCES `admin` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Type_Of_Accout`
--
ALTER TABLE `Type_Of_Accout`
  ADD CONSTRAINT `type_of_accout_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
