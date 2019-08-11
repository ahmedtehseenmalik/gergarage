-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2019 at 01:43 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ger`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `message` varchar(265) NOT NULL,
  `status` varchar(30) NOT NULL,
  `ordered_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `customer_id_fk` int(11) NOT NULL,
  `service_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `message`, `status`, `ordered_date`, `modified_date`, `customer_id_fk`, `service_id_fk`) VALUES
(1, 'est ducimus dolores ut doloremque et officiis ex\\nillum aspernatur est\\ndoloremque deleniti pariatur eos numquam quis et architecto labore\\nveniam aperiam quasi fugiat aut at molestiae\\n \\r\\tarchitecto quae cum et vero neque quasi dignissimos qui\\nmagni et omnis ei', 'In Service', '2019-07-15', '2019-07-15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(12) NOT NULL,
  `last_name` varchar(12) NOT NULL,
  `street` varchar(20) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `street`, `postal_code`, `state`, `city`, `country`, `email`, `phone`, `username`, `password`) VALUES
(1, 'Electa', 'Waelchi', 'A-Z Apartment Yasmin', '3ACA3', 'Florida', 'Donnell', 'USA', 'Easter@trycia.name', '3216991498', 'Soledad', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `street` varchar(60) NOT NULL,
  `postal_code` varchar(8) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `street`, `postal_code`, `state`, `city`, `country`, `phone`, `email`, `username`, `password`, `status`) VALUES
(1, 'Skyla', 'West', 'Woodbridge Street', 'WA3AC', 'Virginia', 'Virginia', 'USA', '0931893853', 'skylawest@gmail.com', 'skyla', '827ccb0eea8a706c4c34a16891f84e7b', 'yes'),
(2, 'Hilda', 'Jerrod', 'Street Lane Vendor', 'WB0909', 'VA', 'Woodbridge', 'USA', '7257606110', 'hildajerrod@gmail.com', 'hildsjerrod34', '25d55ad283aa400af464c76d713c07ad', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `employee_daily_point`
--

CREATE TABLE `employee_daily_point` (
  `id` int(11) NOT NULL,
  `employee_id_FK` int(11) NOT NULL,
  `date` date NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_daily_point`
--

INSERT INTO `employee_daily_point` (`id`, `employee_id_FK`, `date`, `points`) VALUES
(1, 1, '2019-07-15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `discounts` int(11) NOT NULL,
  `ordered_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `booking_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `cost`, `discounts`, `ordered_date`, `modified_date`, `booking_id_fk`) VALUES
(1, 0, 0, '2019-07-15', '2019-07-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_stock`
--

CREATE TABLE `invoice_stock` (
  `invoice_id_fk` int(11) NOT NULL,
  `stock_item_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_stock`
--

INSERT INTO `invoice_stock` (`invoice_id_fk`, `stock_item_fk`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `roaster`
--

CREATE TABLE `roaster` (
  `roaster_id` int(11) NOT NULL,
  `booking_id_fk` int(11) NOT NULL,
  `employee_id_fk` int(11) NOT NULL,
  `status` varchar(12) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roaster`
--

INSERT INTO `roaster` (`roaster_id`, `booking_id_fk`, `employee_id_fk`, `status`, `date`) VALUES
(1, 1, 1, 'assigned', '2019-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cost` int(10) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `name`, `cost`, `points`) VALUES
(1, 'Annual Service', 150, 2),
(2, 'Major Service', 200, 2),
(3, 'Fault/Repair', 150, 1),
(4, 'Major Repair', 500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stock_item`
--

CREATE TABLE `stock_item` (
  `stockitem_id` int(11) NOT NULL,
  `name` varchar(265) NOT NULL,
  `cost` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_item`
--

INSERT INTO `stock_item` (`stockitem_id`, `name`, `cost`, `quantity`) VALUES
(6, 'Lights', 5, 6),
(7, 'Tires', 100, 10),
(8, 'Locks', 200, 15),
(9, 'Oil Change', 40, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `type`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_name` varchar(20) NOT NULL,
  `license_no` varchar(100) NOT NULL,
  `engine_type` varchar(20) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model_year` int(4) NOT NULL,
  `vehicle_type` varchar(20) NOT NULL,
  `customer_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `vehicle_name`, `license_no`, `engine_type`, `make`, `model_year`, `vehicle_type`, `customer_id_fk`) VALUES
(1, '2cv', 'AB211311A', 'petrol', 'alfa romeo', 2019, 'car', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id_fk` (`customer_id_fk`),
  ADD KEY `service_id_fk` (`service_id_fk`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_daily_point`
--
ALTER TABLE `employee_daily_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id_FK` (`employee_id_FK`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `booking_id_fk` (`booking_id_fk`);

--
-- Indexes for table `invoice_stock`
--
ALTER TABLE `invoice_stock`
  ADD KEY `stockitem_id_fk` (`stock_item_fk`),
  ADD KEY `invoice_id_fk` (`invoice_id_fk`);

--
-- Indexes for table `roaster`
--
ALTER TABLE `roaster`
  ADD PRIMARY KEY (`roaster_id`),
  ADD KEY `booking_id_fk` (`booking_id_fk`),
  ADD KEY `employee_id_fk` (`employee_id_fk`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `stock_item`
--
ALTER TABLE `stock_item`
  ADD PRIMARY KEY (`stockitem_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `customer_id_fk` (`customer_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_daily_point`
--
ALTER TABLE `employee_daily_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roaster`
--
ALTER TABLE `roaster`
  MODIFY `roaster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_item`
--
ALTER TABLE `stock_item`
  MODIFY `stockitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`service_id_fk`) REFERENCES `service` (`service_id`),
  ADD CONSTRAINT `customer_id_fk` FOREIGN KEY (`customer_id_fk`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `employee_daily_point`
--
ALTER TABLE `employee_daily_point`
  ADD CONSTRAINT `employee_id_FK` FOREIGN KEY (`employee_id_FK`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `booking_id_fk` FOREIGN KEY (`booking_id_fk`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `invoice_stock`
--
ALTER TABLE `invoice_stock`
  ADD CONSTRAINT `invoice_id_fk` FOREIGN KEY (`invoice_id_fk`) REFERENCES `invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `stockitem_id_fk` FOREIGN KEY (`stock_item_fk`) REFERENCES `stock_item` (`stockitem_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `roaster`
--
ALTER TABLE `roaster`
  ADD CONSTRAINT `roaster_ibfk_1` FOREIGN KEY (`booking_id_fk`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `roaster_ibfk_2` FOREIGN KEY (`employee_id_fk`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`customer_id_fk`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
