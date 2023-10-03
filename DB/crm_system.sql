-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 01:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `contactno` text NOT NULL,
  `address` text NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=admin,2=manager,3=emaployee',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `username`, `email`, `password`, `contactno`, `address`, `role`, `status`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '123', '1234567890', 'shree hari nursary', 1, 1),
(2, 'user', 'user', 'user', 'user', '1234567890', 'xyz', 2, 1),
(3, 'ridham', 'ridham', 'ridham', 'ridham', '1234567890', 'demo', 3, 1),
(4, 'chirag', 'chirag', 'chirag@gmail.com', '123', '1234567890', 'demo', 3, 1),
(5, 'Prakashbhai Chaudhary', 'pakuchaudhary', 'demo@mail.com', '1234', '9313200500', 'At. Kevadiya, Ta. Mandvi, Dist.: Surat', 3, 1),
(6, 'Tejash Chaudhari', 'tejubhaichaudhari', 'demo@mail.com', '5678', '8200768148', 'At.Po. Areth, Ta: Mandvi, Dist: Surat', 3, 1),
(7, 'Dharmesh Chaudhari', 'Dharmeshchaudhari', 'demo@mail.com', '9101112', '9512599908', 'At. Kevadiya, Ta. Mandvi, Dist.: Surat', 3, 1),
(8, 'Shesil Chaudhari', 'Shesilchaudhari', 'demo@mail.com', '13141516', '9638433585', 'At.Po. Areth, Ta: Mandvi, Dist: Surat', 3, 1),
(9, 'Rajeshkumar Viradiya', 'Rajubhaiviradiya', 'demo@mail.com', '17181920', '9825373775', 'Surat', 2, 1),
(10, 'Rajeshbhai Gamit', 'rajubhaigamit', 'demo@mail.com', '21222324', '9727442406', 'At. Kadavadi, Ta.: Mandvi, Dist.: Surat', 3, 1),
(11, 'Arunbhai Chaudhari', 'arunchaudhari', 'demo@mail.com', '25262728', '9712615574', 'At. Madhi, Ta.: Bardoli, Dist.: Surat', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'KESAR'),
(2, 'Rajapuri'),
(3, 'Langra'),
(4, 'Haphus'),
(5, 'Haphus'),
(7, 'Dasheri'),
(8, 'Totapuri'),
(9, 'Barmasi'),
(10, 'Jamadar'),
(11, 'Chausa'),
(12, 'Sabja'),
(13, 'Salgat'),
(14, 'Amrapalli'),
(15, 'Sardar'),
(16, 'Pachhatiyo'),
(17, 'Ratna'),
(18, 'Nilphonsho'),
(19, 'Vanaraj'),
(20, 'Badam'),
(21, 'Dadam'),
(22, 'ATM'),
(24, 'Dudhpendo'),
(25, 'Lalbaugh'),
(26, 'Malgobbo'),
(27, 'Sinduri'),
(28, 'Mallika'),
(29, 'Swarna Rekha'),
(30, 'Payri'),
(31, 'Sonpari');

-- --------------------------------------------------------

--
-- Table structure for table `paid_amount`
--

CREATE TABLE `paid_amount` (
  `p_id` int(11) NOT NULL,
  `p_u_id` text NOT NULL,
  `amount` text NOT NULL,
  `discount_amount` int(11) DEFAULT 0,
  `date` text NOT NULL,
  `payment_mode` text NOT NULL,
  `extra_note` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `cheque_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paid_amount`
--

INSERT INTO `paid_amount` (`p_id`, `p_u_id`, `amount`, `discount_amount`, `date`, `payment_mode`, `extra_note`, `bank_name`, `cheque_date`) VALUES
(1, '1', '4000', 0, '2023-09-21', '4', '', NULL, NULL),
(2, '1', '4500', 0, '2023-09-21', '4', '', NULL, NULL),
(3, '1', '4500', 0, '2023-09-21', '4', '', NULL, NULL),
(4, '1', '4500', 0, '2023-09-21', '4', '', NULL, NULL),
(5, '1', '500', 0, '2023-09-21', '4', '', NULL, NULL),
(6, '3', '4000', 1000, '2023-10-02', '4', 'cash', NULL, NULL),
(7, '2', '57000', 0, '2023-10-02', '4', '', NULL, NULL),
(10, '2', '700', 50, '2023-10-02', '4', '', NULL, NULL),
(11, '8', '32475', 1000, '2023-10-02', '4', '', NULL, NULL),
(12, '7', '35000', 675, '2023-10-02', '1', 'G-pay', NULL, NULL),
(13, '5', '5000', 1000, '2023-10-02', '4', '', NULL, NULL),
(14, '5', '50000', 2000, '2023-10-02', '4', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `bill_no` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_date` date DEFAULT NULL,
  `print_status` int(11) NOT NULL DEFAULT 0,
  `packing_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`bill_no`, `o_id`, `cat_id`, `sub_cat_name`, `quantity`, `price`, `user_id`, `order_status`, `order_date`, `print_status`, `packing_status`) VALUES
(1, 1, 1, 'B1-K1', 20, 225, 1, 1, NULL, 1, 0),
(2, 2, 1, 'B1-K1', 150, 225, 2, 1, NULL, 1, 0),
(3, 3, 1, 'B1-K1', 5, 1000, 3, 1, NULL, 0, 0),
(4, 4, 1, 'B1-K1', 8, 1000, 2, 1, NULL, 0, 1),
(5, 5, 1, 'B1-K1', 5, 225, 4, 1, NULL, 0, 1),
(5, 6, 4, 'B1-K3', 2, 500, 4, 1, NULL, 0, 0),
(5, 7, 18, 'B1-K3', 1, 600, 4, 1, NULL, 0, 1),
(5, 8, 22, 'B1-K1', 4, 800, 4, 1, NULL, 0, 0),
(5, 9, 31, 'B1-K3', 5, 800, 4, 1, NULL, 0, 0),
(6, 10, 1, 'B1-K1', 67, 225, 5, 0, NULL, 0, 1),
(6, 11, 1, 'B1-K2', 23, 300, 5, 0, NULL, 0, 0),
(6, 12, 1, 'B1-K3', 45, 300, 5, 0, NULL, 0, 0),
(6, 13, 1, 'B1-K4', 100, 300, 5, 0, NULL, 0, 1),
(6, 14, 7, 'B1-K1', 0, 300, 5, 0, NULL, 0, 0),
(6, 15, 8, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(6, 16, 9, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(6, 17, 10, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(6, 18, 11, 'B1-K1', 0, 500, 5, 0, NULL, 0, 1),
(6, 19, 12, 'B1-K1', 0, 500, 5, 0, NULL, 0, 1),
(6, 20, 13, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(6, 21, 14, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(6, 22, 16, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(6, 23, 17, 'B1-K1', 0, 600, 5, 0, NULL, 0, 0),
(6, 24, 19, 'B1-K1', 0, 600, 5, 0, NULL, 0, 0),
(7, 25, 1, 'B1-K1', 0, 225, 5, 0, NULL, 0, 1),
(7, 26, 2, 'B1-K1', 0, 300, 5, 0, NULL, 0, 0),
(7, 27, 3, 'B1-K1', 0, 300, 5, 0, NULL, 0, 0),
(7, 28, 4, 'B1-K1', 0, 300, 5, 0, NULL, 0, 0),
(7, 29, 7, 'B1-K1', 0, 300, 5, 0, NULL, 0, 0),
(7, 30, 8, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(7, 31, 9, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(7, 32, 10, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(7, 33, 11, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(7, 34, 12, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(7, 35, 13, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(7, 36, 14, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(7, 37, 16, 'B1-K1', 0, 500, 5, 0, NULL, 0, 0),
(7, 38, 17, 'B1-K1', 0, 600, 5, 0, NULL, 0, 0),
(7, 39, 19, 'B1-K1', 0, 600, 5, 0, NULL, 0, 0),
(8, 40, 1, 'B1-K1', 1430, 225, 6, 0, NULL, 0, 0),
(8, 41, 8, 'B1-K1', 7, 500, 6, 0, NULL, 0, 0),
(9, 42, 1, 'B1-K1', 1430, 225, 6, 0, NULL, 0, 0),
(9, 43, 8, 'B1-K1', 7, 500, 6, 0, NULL, 0, 0),
(10, 44, 1, 'B1-K1', 1430, 225, 6, 0, NULL, 1, 0),
(10, 45, 8, 'B1-K1', 7, 500, 6, 0, NULL, 1, 0),
(11, 46, 1, 'B1-K1', 1430, 225, 6, 0, NULL, 0, 0),
(11, 47, 8, 'B1-K1', 70, 500, 6, 0, NULL, 0, 0),
(12, 48, 1, 'B1-K1', 143, 225, 7, 0, NULL, 0, 0),
(12, 49, 8, 'B1-K1', 7, 500, 7, 0, NULL, 0, 0),
(13, 50, 1, 'B1-K1', 1430, 225, 6, 0, NULL, 0, 0),
(13, 51, 8, 'B1-K1', 70, 500, 6, 0, NULL, 0, 0),
(14, 52, 1, 'B1-K1', 1, 225, 6, 0, NULL, 0, 0),
(15, 53, 1, 'B1-K1', 10, 225, 2, 0, NULL, 0, 0),
(16, 54, 1, 'B1-K1', 7, 225, 8, 0, '2023-09-27', 0, 0),
(16, 55, 2, 'B1-K3', 9, 500, 8, 0, '2023-09-27', 0, 0),
(16, 56, 10, 'B1-K4', 8, 800, 8, 0, '2023-09-27', 0, 0),
(16, 57, 27, 'B1-K1', 15, 600, 8, 0, '2023-09-27', 0, 0),
(16, 58, 31, 'B1-K4', 8, 1500, 8, 0, '2023-09-27', 0, 0),
(17, 59, 1, 'B1-K1', 6, 225, 2, 0, '2023-09-29', 0, 0),
(17, 60, 1, 'B1-K2', 7, 300, 2, 0, '2023-09-29', 0, 0),
(17, 61, 1, 'B1-K4', 7, 500, 2, 0, '2023-09-29', 0, 0),
(17, 62, 3, 'B1-K1', 4, 300, 2, 0, '2023-09-29', 0, 0),
(17, 63, 4, 'B1-K2', 5, 400, 2, 0, '2023-09-29', 0, 0),
(17, 64, 12, 'B1-K2', 6, 600, 2, 0, '2023-09-29', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_order`
--

CREATE TABLE `quotation_order` (
  `bill_no` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotation_order`
--

INSERT INTO `quotation_order` (`bill_no`, `q_id`, `cat_id`, `sub_cat_name`, `quantity`, `price`, `user_id`) VALUES
(1, 1, 1, 'B1-K1', 7, 225, 1),
(1, 2, 2, 'B1-K2', 8, 400, 1),
(1, 3, 4, 'B1-K3', 10, 500, 1),
(1, 4, 7, 'B1-K1', 10, 300, 1),
(1, 5, 7, 'B1-K2', 10, 400, 1),
(1, 6, 7, 'B1-K4', 18, 600, 1),
(1, 7, 8, 'B1-K4', 14, 800, 1),
(1, 8, 11, 'B1-K3', 13, 700, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_user`
--

CREATE TABLE `quotation_user` (
  `u_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `address` text DEFAULT NULL,
  `b_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotation_user`
--

INSERT INTO `quotation_user` (`u_id`, `name`, `contact_no`, `address`, `b_date`) VALUES
(1, 'Ravi', 1234567899, 'xyz', '2023-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `s_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` text NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`s_id`, `cat_id`, `sub_cat_name`, `quantity`) VALUES
(1, 1, 'B1-K1', 42495),
(2, 1, 'B1-K2', 9993),
(3, 1, 'B1-K3', 10100),
(4, 1, 'B1-K4', 9993),
(5, 2, 'B1-K1', 10000),
(6, 2, 'B1-K2', 10000),
(7, 2, 'B1-K3', 9991),
(8, 2, 'B1-K4', 10000),
(9, 3, 'B1-K1', 9996),
(10, 3, 'B1-K2', 10000),
(11, 3, 'B1-K3', 10000),
(12, 3, 'B1-K4', 10000),
(13, 4, 'B1-K1', 10000),
(14, 4, 'B1-K2', 9995),
(15, 4, 'B1-K3', 9998),
(16, 4, 'B1-K4', 10000),
(17, 5, 'B1-K1', 0),
(18, 5, 'B1-K2', 0),
(19, 5, 'B1-K3', 0),
(20, 5, 'B1-K4', 0),
(21, 6, 'B1-K1', 0),
(22, 6, 'B1-K2', 0),
(23, 6, 'B1-K3', 0),
(24, 6, 'B1-K4', 0),
(25, 7, 'B1-K1', 10000),
(26, 7, 'B1-K2', 10000),
(27, 7, 'B1-K3', 10000),
(28, 7, 'B1-K4', 10000),
(29, 8, 'B1-K1', 9832),
(30, 8, 'B1-K2', 10000),
(31, 8, 'B1-K3', 10000),
(32, 8, 'B1-K4', 10000),
(33, 9, 'B1-K1', 10001),
(34, 9, 'B1-K2', 10000),
(35, 9, 'B1-K3', 10000),
(36, 9, 'B1-K4', 10000),
(37, 10, 'B1-K1', 10000),
(38, 10, 'B1-K2', 10000),
(39, 10, 'B1-K3', 10000),
(40, 10, 'B1-K4', 9992),
(41, 11, 'B1-K1', 10000),
(42, 11, 'B1-K2', 10000),
(43, 11, 'B1-K3', 10000),
(44, 11, 'B1-K4', 10000),
(45, 12, 'B1-K1', 10000),
(46, 12, 'B1-K2', 9994),
(47, 12, 'B1-K3', 10000),
(48, 12, 'B1-K4', 10000),
(49, 13, 'B1-K1', 100),
(50, 13, 'B1-K2', 0),
(51, 13, 'B1-K3', 0),
(52, 13, 'B1-K4', 0),
(53, 14, 'B1-K1', 100),
(54, 14, 'B1-K2', 300),
(55, 14, 'B1-K3', 500),
(56, 14, 'B1-K4', 1000),
(57, 15, 'B1-K1', 0),
(58, 15, 'B1-K2', 10),
(59, 15, 'B1-K3', 0),
(60, 15, 'B1-K4', 10000),
(61, 16, 'B1-K1', 60),
(62, 16, 'B1-K2', 80),
(63, 16, 'B1-K3', 20),
(64, 16, 'B1-K4', 0),
(65, 17, 'B1-K1', 5),
(66, 17, 'B1-K2', 0),
(67, 17, 'B1-K3', 0),
(68, 17, 'B1-K4', 10000),
(69, 18, 'B1-K1', 0),
(70, 18, 'B1-K2', 0),
(71, 18, 'B1-K3', 9999),
(72, 18, 'B1-K4', 10000),
(73, 19, 'B1-K1', 10000),
(74, 19, 'B1-K2', 10000),
(75, 19, 'B1-K3', 10000),
(76, 19, 'B1-K4', 10000),
(77, 20, 'B1-K1', 0),
(78, 20, 'B1-K2', 0),
(79, 20, 'B1-K3', 10000),
(80, 20, 'B1-K4', 10000),
(81, 21, 'B1-K1', 0),
(82, 21, 'B1-K2', 10000),
(83, 21, 'B1-K3', 0),
(84, 21, 'B1-K4', 10000),
(85, 22, 'B1-K1', 9996),
(86, 22, 'B1-K2', 10000),
(87, 22, 'B1-K3', 0),
(88, 22, 'B1-K4', 0),
(89, 23, 'B1-K1', 0),
(90, 23, 'B1-K2', 0),
(91, 23, 'B1-K3', 0),
(92, 23, 'B1-K4', 0),
(93, 24, 'B1-K1', 10000),
(94, 24, 'B1-K2', 10000),
(95, 24, 'B1-K3', 0),
(96, 24, 'B1-K4', 10000),
(97, 25, 'B1-K1', 0),
(98, 25, 'B1-K2', 0),
(99, 25, 'B1-K3', 0),
(100, 25, 'B1-K4', 500),
(101, 26, 'B1-K1', 10000),
(102, 26, 'B1-K2', 10000),
(103, 26, 'B1-K3', 10000),
(104, 26, 'B1-K4', 10000),
(105, 27, 'B1-K1', 9985),
(106, 27, 'B1-K2', 0),
(107, 27, 'B1-K3', 10000),
(108, 27, 'B1-K4', 10000),
(109, 28, 'B1-K1', 10000),
(110, 28, 'B1-K2', 10000),
(111, 28, 'B1-K3', 10000),
(112, 28, 'B1-K4', 10000),
(113, 29, 'B1-K1', 0),
(114, 29, 'B1-K2', 0),
(115, 29, 'B1-K3', 0),
(116, 29, 'B1-K4', 10000),
(117, 30, 'B1-K1', 10000),
(118, 30, 'B1-K2', 10000),
(119, 30, 'B1-K3', 10000),
(120, 30, 'B1-K4', 10000),
(121, 31, 'B1-K1', 0),
(122, 31, 'B1-K2', 0),
(123, 31, 'B1-K3', 9995),
(124, 31, 'B1-K4', 9992);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` text NOT NULL,
  `sub_cat_price` bigint(20) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `sub_cat_name`, `sub_cat_price`, `cat_id`) VALUES
(1, 'B1-K1', 225, 1),
(2, 'B1-K2', 300, 1),
(3, 'B1-K3', 400, 1),
(4, 'B1-K4', 500, 1),
(5, 'B1-K1', 300, 2),
(6, 'B1-K2', 400, 2),
(7, 'B1-K3', 500, 2),
(8, 'B1-K4', 600, 2),
(9, 'B1-K1', 300, 3),
(10, 'B1-K2', 400, 3),
(11, 'B1-K3', 500, 3),
(12, 'B1-K4', 600, 3),
(13, 'B1-K1', 300, 4),
(14, 'B1-K2', 400, 4),
(15, 'B1-K3', 500, 4),
(16, 'B1-K4', 600, 4),
(17, 'B1-K1', 300, 5),
(18, 'B1-K2', 400, 5),
(19, 'B1-K3', 500, 5),
(20, 'B1-K4', 600, 5),
(21, 'B1-K1', 0, 6),
(22, 'B1-K2', 0, 6),
(23, 'B1-K3', 0, 6),
(24, 'B1-K4', 0, 6),
(25, 'B1-K1', 300, 7),
(26, 'B1-K2', 400, 7),
(27, 'B1-K3', 500, 7),
(28, 'B1-K4', 600, 7),
(29, 'B1-K1', 500, 8),
(30, 'B1-K2', 600, 8),
(31, 'B1-K3', 700, 8),
(32, 'B1-K4', 800, 8),
(33, 'B1-K1', 500, 9),
(34, 'B1-K2', 600, 9),
(35, 'B1-K3', 700, 9),
(36, 'B1-K4', 800, 9),
(37, 'B1-K1', 500, 10),
(38, 'B1-K2', 600, 10),
(39, 'B1-K3', 700, 10),
(40, 'B1-K4', 800, 10),
(41, 'B1-K1', 500, 11),
(42, 'B1-K2', 600, 11),
(43, 'B1-K3', 700, 11),
(44, 'B1-K4', 800, 11),
(45, 'B1-K1', 500, 12),
(46, 'B1-K2', 600, 12),
(47, 'B1-K3', 700, 12),
(48, 'B1-K4', 800, 12),
(49, 'B1-K1', 500, 13),
(50, 'B1-K2', 600, 13),
(51, 'B1-K3', 700, 13),
(52, 'B1-K4', 800, 13),
(53, 'B1-K1', 500, 14),
(54, 'B1-K2', 600, 14),
(55, 'B1-K3', 700, 14),
(56, 'B1-K4', 800, 14),
(57, 'B1-K1', 500, 15),
(58, 'B1-K2', 600, 15),
(59, 'B1-K3', 700, 15),
(60, 'B1-K4', 800, 15),
(61, 'B1-K1', 500, 16),
(62, 'B1-K2', 600, 16),
(63, 'B1-K3', 700, 16),
(64, 'B1-K4', 800, 16),
(65, 'B1-K1', 600, 17),
(66, 'B1-K2', 700, 17),
(67, 'B1-K3', 800, 17),
(68, 'B1-K4', 900, 17),
(69, 'B1-K1', 600, 18),
(70, 'B1-K2', 700, 18),
(71, 'B1-K3', 800, 18),
(72, 'B1-K4', 900, 18),
(73, 'B1-K1', 600, 19),
(74, 'B1-K2', 700, 19),
(75, 'B1-K3', 800, 19),
(76, 'B1-K4', 900, 19),
(77, 'B1-K1', 600, 20),
(78, 'B1-K2', 700, 20),
(79, 'B1-K3', 800, 20),
(80, 'B1-K4', 900, 20),
(81, 'B1-K1', 600, 21),
(82, 'B1-K2', 700, 21),
(83, 'B1-K3', 800, 21),
(84, 'B1-K4', 900, 21),
(85, 'B1-K1', 600, 22),
(86, 'B1-K2', 700, 22),
(87, 'B1-K3', 800, 22),
(88, 'B1-K4', 900, 22),
(89, 'B1-K1', 0, 23),
(90, 'B1-K2', 0, 23),
(91, 'B1-K3', 0, 23),
(92, 'B1-K4', 0, 23),
(93, 'B1-K1', 600, 24),
(94, 'B1-K2', 700, 24),
(95, 'B1-K3', 800, 24),
(96, 'B1-K4', 900, 24),
(97, 'B1-K1', 600, 25),
(98, 'B1-K2', 700, 25),
(99, 'B1-K3', 800, 25),
(100, 'B1-K4', 900, 25),
(101, 'B1-K1', 600, 26),
(102, 'B1-K2', 700, 26),
(103, 'B1-K3', 800, 26),
(104, 'B1-K4', 900, 26),
(105, 'B1-K1', 600, 27),
(106, 'B1-K2', 700, 27),
(107, 'B1-K3', 800, 27),
(108, 'B1-K4', 900, 27),
(109, 'B1-K1', 600, 28),
(110, 'B1-K2', 700, 28),
(111, 'B1-K3', 800, 28),
(112, 'B1-K4', 900, 28),
(113, 'B1-K1', 600, 29),
(114, 'B1-K2', 700, 29),
(115, 'B1-K3', 800, 29),
(116, 'B1-K4', 900, 29),
(117, 'B1-K1', 600, 30),
(118, 'B1-K2', 700, 30),
(119, 'B1-K3', 800, 30),
(120, 'B1-K4', 900, 30),
(121, 'B1-K1', 1200, 31),
(122, 'B1-K2', 1300, 31),
(123, 'B1-K3', 1400, 31),
(124, 'B1-K4', 1500, 31);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `address` text DEFAULT NULL,
  `b_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `contact_no`, `address`, `b_date`) VALUES
(1, 'meet', 32552552552222, 'at areth, ta. mandvi surat', '2023-09-21'),
(2, 'Raju', 1234567890, 'Block No.119, Areth, ta.:Mandvi, Dist.: Surat', '2023-09-22'),
(3, 'ravi', 123456789, '501 xyz', '2023-09-24'),
(4, 'Prakash Chaudhary', 9913050717, 'at areth, ta. mandvi surat', '2023-09-25'),
(5, 'Rajugamit ', 9727442406, 'Village. kadvali ,ta.mandvi,dist.surat', '2023-09-25'),
(6, 'Raghuveer ', 9879357795, 'Kosamba ta.mangrol,di.surat', '2023-09-26'),
(7, 'Pradipbhai chaudhari ', 9427124477, 'Bardoli ta.bardoli, di.surat', '2023-09-26'),
(8, 'Bhumi Jagatiya', 8849475157, '402 ashvamegh ', '2023-09-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `paid_amount`
--
ALTER TABLE `paid_amount`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `quotation_order`
--
ALTER TABLE `quotation_order`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `quotation_user`
--
ALTER TABLE `quotation_user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `paid_amount`
--
ALTER TABLE `paid_amount`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `quotation_order`
--
ALTER TABLE `quotation_order`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quotation_user`
--
ALTER TABLE `quotation_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
