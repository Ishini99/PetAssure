-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 05:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petassure`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pword` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appNo` int(20) NOT NULL,
  `spid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `appoDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0 COMMENT '0=available 1=notavailable, 2=cancel ,3=completed',
  `completed` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=notcompleted ,1=completed',
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appNo`, `spid`, `userid`, `appoDate`, `startTime`, `endTime`, `status`, `completed`, `description`) VALUES
(136, 25, 40, '2023-05-20', '18:44:00', '19:09:42', 1, 0, ''),
(137, 25, NULL, '2023-05-20', '19:09:42', '19:35:24', 0, 0, ''),
(138, 25, NULL, '2023-05-20', '19:35:25', '20:01:07', 0, 0, ''),
(139, 25, NULL, '2023-05-20', '20:01:08', '20:26:50', 0, 0, ''),
(140, 25, NULL, '2023-05-20', '20:26:51', '20:52:33', 0, 0, ''),
(141, 25, NULL, '2023-05-20', '20:52:34', '21:18:16', 0, 0, ''),
(142, 25, NULL, '2023-05-20', '21:18:17', '21:43:59', 0, 0, ''),
(143, 26, NULL, '2023-05-19', '13:49:00', '14:13:00', 0, 0, ''),
(144, 26, NULL, '2023-05-19', '14:13:00', '14:37:00', 0, 0, ''),
(145, 26, NULL, '2023-05-19', '14:37:00', '15:01:00', 0, 0, ''),
(146, 26, NULL, '2023-05-19', '15:01:00', '15:25:00', 0, 0, ''),
(147, 26, NULL, '2023-05-19', '15:25:00', '15:49:00', 0, 0, ''),
(148, 26, NULL, '2023-05-22', '21:49:00', '22:01:12', 0, 0, ''),
(149, 26, NULL, '2023-05-22', '22:01:12', '22:13:24', 0, 0, ''),
(150, 26, NULL, '2023-05-22', '22:13:24', '22:25:36', 0, 0, ''),
(151, 26, NULL, '2023-05-22', '22:25:36', '22:37:48', 0, 0, ''),
(152, 26, NULL, '2023-05-22', '22:37:48', '22:50:00', 0, 0, ''),
(153, 26, NULL, '2023-05-27', '13:50:00', '14:02:00', 0, 0, ''),
(154, 26, NULL, '2023-05-27', '14:02:00', '14:14:00', 0, 0, ''),
(155, 26, NULL, '2023-05-27', '14:14:00', '14:26:00', 0, 0, ''),
(156, 26, NULL, '2023-05-27', '14:26:00', '14:38:00', 0, 0, ''),
(157, 26, NULL, '2023-05-27', '14:38:00', '14:50:00', 0, 0, ''),
(158, 28, 42, '2023-05-18', '22:05:00', '22:17:00', 1, 0, ''),
(159, 28, NULL, '2023-05-18', '22:17:00', '22:29:00', 0, 0, ''),
(160, 28, NULL, '2023-05-18', '22:29:00', '22:41:00', 0, 0, ''),
(161, 28, NULL, '2023-05-18', '22:41:00', '22:53:00', 0, 0, ''),
(162, 28, NULL, '2023-05-18', '22:53:00', '23:05:00', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `boardingimage`
--

CREATE TABLE `boardingimage` (
  `imgId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(75) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boardingimage`
--

INSERT INTO `boardingimage` (`imgId`, `name`, `image`, `uid`) VALUES
(3, '22', '646240bae230e.jpg', 39);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `book_id` int(255) NOT NULL,
  `cage_id` int(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `userid` int(255) DEFAULT NULL,
  `spid` int(255) DEFAULT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `food_pref` varchar(255) NOT NULL,
  `med` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Available , 1= Unvailable',
  `check_out` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-notcheckout,1=checkout'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`book_id`, `cage_id`, `cat_id`, `userid`, `spid`, `checkin_date`, `checkout_date`, `type`, `food_pref`, `med`, `name`, `status`, `check_out`) VALUES
(88, 112, 38, 40, 27, '0000-00-00', '0000-00-00', '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cage`
--

CREATE TABLE `cage` (
  `cage_id` int(255) NOT NULL,
  `cat_id` int(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Available , 1= Unvailable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cage`
--

INSERT INTO `cage` (`cage_id`, `cat_id`, `status`) VALUES
(112, 38, 1),
(113, 38, 0),
(114, 38, 0),
(115, 38, 0),
(116, 38, 0),
(117, 39, 0),
(118, 39, 0),
(119, 39, 0),
(120, 39, 0),
(121, 39, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cage_categories`
--

CREATE TABLE `cage_categories` (
  `cat_id` int(255) NOT NULL,
  `spid` int(11) DEFAULT NULL,
  `size` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cage_categories`
--

INSERT INTO `cage_categories` (`cat_id`, `spid`, `size`, `price`, `qty`, `image`, `description`, `food`) VALUES
(38, 27, 'Small.', '1000', 5, 'cage3.jpg', '-', 'Pet owners can bring their own food or home food is available.'),
(39, 27, 'Meduim.', '2000', 5, 'cage2.jpg', '-', 'Please specify your food preferences in the form.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `amount`, `email`, `created_at`) VALUES
('cus_NtrCvEpcYYgoZz', 'Theekshani Nathali Wickramasinghe', '200', 'theekshani3@gmail.com', '2023-05-15 21:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(15) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `submit_date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `spid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `rating`, `content`, `submit_date`, `name`, `page_id`, `userid`, `spid`) VALUES
(12, 5, 'It was a great service', '2023-05-15 21:08:47', 'sangee', 1, 42, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groomerimage`
--

CREATE TABLE `groomerimage` (
  `uid` int(11) NOT NULL,
  `imgId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groomerimage`
--

INSERT INTO `groomerimage` (`uid`, `imgId`, `name`, `image`) VALUES
(38, 13, 'send', '64624013ccda8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groomer_posts`
--

CREATE TABLE `groomer_posts` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
  `price` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotelreview`
--

CREATE TABLE `hotelreview` (
  `hotelname` varchar(100) NOT NULL,
  `reviewID` int(15) NOT NULL,
  `rating` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `districts` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `imgId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelreview`
--

INSERT INTO `hotelreview` (`hotelname`, `reviewID`, `rating`, `email`, `districts`, `mobile`, `address`, `comments`, `imgId`) VALUES
('Cinnamon', 1, 3, '', 'Colombo', 0, 'hotel1.jpg', 'The first best quality I saw in the hotel was to maintain a very good customer service. They are rea', 0),
('Hilton', 2, 5, '', 'Colombo', 0, 'hotel2.jpg', 'are you a pet lovers...? this place for u', 0),
('The Commons', 3, 3, '', 'Colombo', 0, 'hotel3.jpg', 'The first best quality I saw in the hotel was to maintain a very good customer service. They are rea', 0),
('Peppermint Cafe', 4, 3, '', 'Colombo', 0, 'hotel4.jpg', 'come with your pets for spend a coffee time with them', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inf`
--

CREATE TABLE `inf` (
  `n_id` int(11) NOT NULL,
  `notifications_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inf`
--

INSERT INTO `inf` (`n_id`, `notifications_name`, `message`, `active`, `date`) VALUES
(40, 'New User', 'New User is Registered', 1, '2023-05-15 14:04:19'),
(41, 'New User', 'New User is Registered', 1, '2023-05-15 14:04:25'),
(42, 'New User', 'New User is Registered', 1, '2023-05-15 14:09:53'),
(43, 'New User', 'New User is Registered', 1, '2023-05-15 14:18:26'),
(44, 'New User', 'New User is Registered', 1, '2023-05-15 14:24:10'),
(45, 'New User', 'New User is Registered', 1, '2023-05-15 15:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(100) NOT NULL,
  `user_from` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(420, 'Ishini', 'Sangee', 'hi', '2023-05-15 16:46:33', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notiId` int(15) NOT NULL,
  `spid` int(15) DEFAULT NULL,
  `message` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet-sitter-appointments`
--

CREATE TABLE `pet-sitter-appointments` (
  `sitno` int(255) NOT NULL,
  `spid` int(255) DEFAULT NULL,
  `userid` int(255) DEFAULT NULL,
  `date` date NOT NULL,
  `breed` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Available , 1= Unvailable	',
  `dateid` int(255) NOT NULL,
  `age` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-notcompleted ,1=completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet-sitter-appointments`
--

INSERT INTO `pet-sitter-appointments` (`sitno`, `spid`, `userid`, `date`, `breed`, `des`, `status`, `dateid`, `age`, `type`, `name`, `completed`) VALUES
(19668, 24, NULL, '2023-05-17', '', '', 0, 50, 0, '', '', 0),
(19669, 24, NULL, '2023-05-18', '', '', 0, 50, 0, '', '', 0),
(19670, 24, NULL, '2023-05-19', '', '', 0, 50, 0, '', '', 0),
(19671, 24, NULL, '2023-05-20', '', '', 0, 50, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `petsitterappdates`
--

CREATE TABLE `petsitterappdates` (
  `dateid` int(11) NOT NULL,
  `spid` int(255) DEFAULT NULL,
  `startdate` date NOT NULL,
  `endate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petsitterappdates`
--

INSERT INTO `petsitterappdates` (`dateid`, `spid`, `startdate`, `endate`) VALUES
(50, 24, '2023-05-17', '2023-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `petsittingimages`
--

CREATE TABLE `petsittingimages` (
  `imgId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(75) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `adoption_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `district` varchar(50) NOT NULL,
  `pet_variety` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `userid` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`adoption_id`, `name`, `district`, `pet_variety`, `address`, `price`, `description`, `image`, `email`, `phone_number`, `userid`) VALUES
(25, 'Bulldog', 'Colombo', 'adopt', 'No: 1/216, Rathnahera,Kanaththagoda', 300000, 'lovely ', '0567c66917061177a7df6c35c0028444.jpg', 'theekshani3@gmail.com', 712345678, 40);

-- --------------------------------------------------------

--
-- Table structure for table `pet_crossing`
--

CREATE TABLE `pet_crossing` (
  `crossing_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `district` varchar(50) NOT NULL,
  `pet_variety` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_crossing`
--

INSERT INTO `pet_crossing` (`crossing_id`, `name`, `district`, `pet_variety`, `address`, `price`, `description`, `image`, `email`, `phone_number`, `userid`) VALUES
(25, 'German Shepard', 'Colombo', 'cross', 'No: 1/216, Rathnahera,Kanaththagoda', 50000, 'Two moths old\r\nLovely and very friendly', 'image1.png', 'theekshani3@gmail.com', 770562741, 40);

-- --------------------------------------------------------

--
-- Table structure for table `pet_selling`
--

CREATE TABLE `pet_selling` (
  `selling_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `district` varchar(50) NOT NULL,
  `pet_variety` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_selling`
--

INSERT INTO `pet_selling` (`selling_id`, `name`, `district`, `pet_variety`, `address`, `price`, `description`, `image`, `email`, `phone_number`, `userid`) VALUES
(29, 'Rottwailer', 'Colombo', 'sale', 'town road, ja ela', 15000, 'imported breed\r\ntop quality ', 'cage3.jpg', 'sangeerthan@gmail.com', 113131666, 40),
(30, 'Bulldog', 'Colombo', 'sale', 'No: 1/216, Rathnahera,Kanaththagoda', 100000, 'Very loving and caring dog. 10 moths old', 'cage3.jpg', 'theekshani3@gmail.com', 312253164, 40),
(31, 'Chihuahua', 'Colombo', 'sale', 'No: 1/216, Rathnahera,Kanaththagoda', 200000, 'clean and loving dog', 'ac6a54982743c47a9058f815cf4cda26.jpg', 'theekshani3@gmail.com', 17568924, 40);

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `spid` int(11) NOT NULL,
  `proofs` varchar(25) NOT NULL,
  `details` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`spid`, `proofs`, `details`, `userid`, `status`) VALUES
(23, '1_EBusiness Infrastructur', 'pet sitter should be compassionate and caring towards animals.', 35, 'pending'),
(24, '1_EBusiness Infrastructur', 'pet sitter should be compassionate and caring towards animals.', 36, 'pending'),
(25, '1_EBusiness Infrastructur', 'i have more than 10 years experience', 37, 'pending'),
(26, 'cat1.jpg', 'a medical professional who specializes in providing healthcare services to animals. trained to diagnose and treat various medical conditions that affect animals, including domestic pets, livestock, wildlife, and zoo animals.', 38, 'pending'),
(27, 'cage2.jpg', 'I am good pet baorder', 39, 'pending'),
(28, '8a4d2d850cdad36a2275b3d0b', 'I love pets.', 45, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `sitimage`
--

CREATE TABLE `sitimage` (
  `imgId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(75) NOT NULL,
  `uid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitimage`
--

INSERT INTO `sitimage` (`imgId`, `name`, `image`, `uid`) VALUES
(11, 'send', '64623c503d617.jpg', 36);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `product`, `amount`, `currency`, `status`, `created_at`) VALUES
('ch_3N83UYDpKSoGJDlN2wHgRstd', 'cus_NtrCvEpcYYgoZz', 'Booking Fee', '2000', 'usd', 'succeeded', '2023-05-15 21:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fname` varchar(100) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `userid` int(11) NOT NULL,
  `role` varchar(225) NOT NULL,
  `district` varchar(225) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `signup_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_closed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `nic`, `uname`, `email`, `mobile`, `address`, `password`, `userid`, `role`, `district`, `lname`, `signup_date`, `user_closed`) VALUES
('Theekshani', '997591895V', 'Theekshani', 'theekshani3@gmail.com', 77, 'No: 1/216, Rathnahera,Kanaththagoda', '9RNudpF0Jm', 35, 'petsitter', 'Colombo', 'Wickramasinghe', '2023-05-15 14:04:19', 'no'),
('Theekshani', '997591895V', 'Theekshani', 'theekshani3@gmail.com', 771093473, 'No: 1/216, Rathnahera,Kanaththagoda', 'TykhfzUjCd', 36, 'petsitter', 'Colombo', 'Wickramasinghe', '2023-05-15 14:07:35', 'no'),
('Ishini', '99782546', 'Ishini', 'ishininuwanthika99@gmail.com', 774543473, 'Kandy', 'Ishini@123', 37, 'veterinarian ', 'Colombo', 'Ekanayaka', '2023-05-15 14:17:49', 'no'),
('Imasga', '997591875V', 'Ishini Groomers', 'ishininuwanthika75@gmail.com', 774545454, 'Kandy', 'qHbGTR1Fyi', 38, 'petgrooming', 'Colombo', 'Jayawardhana', '2023-05-15 14:18:26', 'no'),
('Nathali', '9975911495V', 'Nathali', 'theekshani3@gmail.com', 771093473, 'No: 1/216, Rathnahera,Kanaththagoda', '0CGINAsX04', 39, 'petboarding', 'Colombo', 'Wickramasinghe', '2023-05-15 14:24:10', 'no'),
('Sangeerthan', '997594895V', 'Sangee', 'sms99sangeerthan@gmail.com', 771073473, 'Vavuniya', 'Sangee@123', 40, 'client', 'Vavuniya', '', '2023-05-14 18:30:00', '0'),
('Sangeerthan', '997594895V', 'Sangee', 'sms99sangeerthan@gmail.com', 771073473, 'Vavuniya', 'Sangee@123', 41, 'client', 'Vavuniya', '', '2023-05-14 18:30:00', '0'),
('M Sangeerthan ', '997595895V', 'Sangeerthan', 'sms99sangeerthan@gmail.com', 771073473, 'Vavuniya', 'Sangee@123', 42, 'client', 'Vavuniya', '', '2023-05-14 18:30:00', '0'),
('T Nathali', '8975911495V', 'Nathalii', 'theekshani3@gmail.com', 771093473, 'No: 1/216, Rathnahera,Kanaththagoda', 'Teek@123', 43, 'petboarding', 'Colombo', 'Wickramasinghe', '2023-05-15 14:24:10', 'no'),
('S Theekshani ', '997591895V', 'Theekshaniii', 'theekshani3@gmail.com', 773041245, 'No: 1/216, Rathnahera,Kanaththagoda', 'Teek@123', 44, 'petsitter', 'Colombo', 'Wickramasinghe', '2023-05-15 14:04:19', 'no'),
('Chris ', '993400165v', 'chris', 'chris@gmail.com', 770562741, 'No: 1/216, Rathnahera,Kanaththagoda', 'hp6kDAj7CW', 45, 'veterinarian ', 'Mannar', 'Perera', '2023-05-15 15:34:29', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `uid` int(11) NOT NULL,
  `imgId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='image for user';

-- --------------------------------------------------------

--
-- Table structure for table `vetimage`
--

CREATE TABLE `vetimage` (
  `imgId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(75) NOT NULL,
  `uid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vetimage`
--

INSERT INTO `vetimage` (`imgId`, `name`, `image`, `uid`) VALUES
(33, '20', '64623e2adb8db.jpg', 37),
(34, 'same', '6462512fba533.jpg', 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appNo`),
  ADD KEY `spid` (`spid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `boardingimage`
--
ALTER TABLE `boardingimage`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `cage_id` (`cage_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `spid` (`spid`);

--
-- Indexes for table `cage`
--
ALTER TABLE `cage`
  ADD PRIMARY KEY (`cage_id`),
  ADD KEY `cage_ibfk_1` (`cat_id`);

--
-- Indexes for table `cage_categories`
--
ALTER TABLE `cage_categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `spid` (`spid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `spid` (`spid`);

--
-- Indexes for table `groomerimage`
--
ALTER TABLE `groomerimage`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `groomer_posts`
--
ALTER TABLE `groomer_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spid` (`spid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `hotelreview`
--
ALTER TABLE `hotelreview`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `hotelView` (`imgId`);

--
-- Indexes for table `inf`
--
ALTER TABLE `inf`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notiId`),
  ADD KEY `userid` (`userid`),
  ADD KEY `spid` (`spid`);

--
-- Indexes for table `pet-sitter-appointments`
--
ALTER TABLE `pet-sitter-appointments`
  ADD PRIMARY KEY (`sitno`),
  ADD KEY `userid` (`userid`),
  ADD KEY `spid` (`spid`),
  ADD KEY `dateid` (`dateid`);

--
-- Indexes for table `petsitterappdates`
--
ALTER TABLE `petsitterappdates`
  ADD PRIMARY KEY (`dateid`),
  ADD KEY `spid` (`spid`);

--
-- Indexes for table `petsittingimages`
--
ALTER TABLE `petsittingimages`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `pet_crossing`
--
ALTER TABLE `pet_crossing`
  ADD PRIMARY KEY (`crossing_id`);

--
-- Indexes for table `pet_selling`
--
ALTER TABLE `pet_selling`
  ADD PRIMARY KEY (`selling_id`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`spid`),
  ADD KEY `user_id` (`userid`);

--
-- Indexes for table `sitimage`
--
ALTER TABLE `sitimage`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `vetimage`
--
ALTER TABLE `vetimage`
  ADD PRIMARY KEY (`imgId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `boardingimage`
--
ALTER TABLE `boardingimage`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `book_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `cage`
--
ALTER TABLE `cage`
  MODIFY `cage_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `cage_categories`
--
ALTER TABLE `cage_categories`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `groomerimage`
--
ALTER TABLE `groomerimage`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `groomer_posts`
--
ALTER TABLE `groomer_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `hotelreview`
--
ALTER TABLE `hotelreview`
  MODIFY `reviewID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inf`
--
ALTER TABLE `inf`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notiId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pet-sitter-appointments`
--
ALTER TABLE `pet-sitter-appointments`
  MODIFY `sitno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19672;

--
-- AUTO_INCREMENT for table `petsitterappdates`
--
ALTER TABLE `petsitterappdates`
  MODIFY `dateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pet_crossing`
--
ALTER TABLE `pet_crossing`
  MODIFY `crossing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pet_selling`
--
ALTER TABLE `pet_selling`
  MODIFY `selling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `spid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sitimage`
--
ALTER TABLE `sitimage`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vetimage`
--
ALTER TABLE `vetimage`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`spid`) REFERENCES `serviceprovider` (`spid`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`cage_id`) REFERENCES `cage` (`cage_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `cage_categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`spid`) REFERENCES `serviceprovider` (`spid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cage`
--
ALTER TABLE `cage`
  ADD CONSTRAINT `cage_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cage_categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cage_categories`
--
ALTER TABLE `cage_categories`
  ADD CONSTRAINT `cage_categories_ibfk_1` FOREIGN KEY (`spid`) REFERENCES `serviceprovider` (`spid`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`spid`) REFERENCES `serviceprovider` (`spid`);

--
-- Constraints for table `pet-sitter-appointments`
--
ALTER TABLE `pet-sitter-appointments`
  ADD CONSTRAINT `pet-sitter-appointments_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pet-sitter-appointments_ibfk_2` FOREIGN KEY (`spid`) REFERENCES `serviceprovider` (`spid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pet-sitter-appointments_ibfk_3` FOREIGN KEY (`dateid`) REFERENCES `petsitterappdates` (`dateid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petsitterappdates`
--
ALTER TABLE `petsitterappdates`
  ADD CONSTRAINT `petsitterappdates_ibfk_1` FOREIGN KEY (`spid`) REFERENCES `serviceprovider` (`spid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
