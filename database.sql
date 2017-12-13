-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 02:01 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkmate-dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_ID` int(11) NOT NULL,
  `account_fname` varchar(45) NOT NULL,
  `account_lname` varchar(45) NOT NULL,
  `account_street` varchar(45) NOT NULL,
  `account_city` varchar(45) NOT NULL,
  `account_state` varchar(45) NOT NULL,
  `account_zip` varchar(45) NOT NULL,
  `account_number` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `account_routing_number` varchar(45) CHARACTER SET utf8 NOT NULL,
  `company_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_ID`, `account_fname`, `account_lname`, `account_street`, `account_city`, `account_state`, `account_zip`, `account_number`, `account_routing_number`, `company_ID`) VALUES
(1, 'Lian', 'Hylden', '412 Elka Ln', 'Philadelphia', 'Pennsylvania', '52217', '123456788', '98765432', 1),
(2, 'Vittoria', 'Shottin', '70 Messerschmidt St', 'Charleston', 'South Carolina', '38719', '234867584', '773526443', 1),
(3, 'Myca', 'McGarahan', '44 Waxwing Cir', 'San Antonio', 'Texas', '20526', '398467893', '884326783', 1),
(4, 'Julienne', 'Diggle', '74 Green Ln', 'Garland', 'Texas', '79180', '238749587', '565647384', 1),
(5, 'Jayson', 'Kirrens', '39 Northland Way', 'Edmond', 'Oklahoma', '88427', '298764876', '199847363', 1),
(6, 'Mikkel', 'Vannuccinii', '8564 Village Green Plaza', 'El Paso', 'Texas', '93647', '198749857', '182938744', 1),
(7, 'Rafa', 'Eddies', '6587 Gina Ln', 'Rochester', 'New York', '47399', '578467927', '112783621', 1),
(8, 'Elton', 'Sneaker', '4169 Bartelt Way', 'Charleston', 'West Virginia', '50687', '198759843', '993847362', 1),
(9, 'Justina', 'Speed', '279 Brickson Park Ave', 'Denver', 'Colorado', '73179', '775483956', '321567389', 1),
(10, 'Valida', 'Howden', '307 Holy Cross Ln', 'Stockton', 'California', '14878', '858843748', '224536478', 1),
(11, 'Clarence', 'Braybrooks', '9 Nancy St', 'Pasadena', 'California', '62652', '984777383', '332456377', 1),
(12, 'Emlyn', 'Boulton', '59 John Wall Cir', 'Orange', 'California', '28313', '746376226', '432105354', 1),
(13, 'Lorelei', 'Roxbee', '54112 Pankratz Ln', 'Charlotte', 'North Carolina', '74385', '127463857', '223674985', 1),
(14, 'Abbye', 'MacGinlay', '395 6th Ave', 'Memphis', 'Tennessee', '71381', '182736526', '465327854', 1),
(15, 'Forester', 'Wilshire', '6 Hallows Cir', 'Oklahoma City', 'Oklahoma', '99299', '123456789', '987654321', 1),
(16, 'Walliw', 'Siward', '2 Ridge Oak Way', 'Montgomery', 'Alabama', '68653', '358723644', '825599438', 1),
(17, 'Arabelle', 'McKevany', '10 Lunder Ln', 'Houston', 'Texas', '49966', '356289638', '209475894', 1),
(18, 'Kasper', 'Segot', '25055 Loftsgordon Way', 'Fort Lauderdale', 'Florida', '27649', '925387463', '192839475', 1),
(19, 'Alidia', 'Limrick', '41037 Merchant Rd', 'Greenville', 'South Carolina', '32520', '192846573', '485673097', 1),
(20, 'Osbourn', 'Pinching', '33 Reindahl Ave', 'Peoria', 'Illinois', '52211', '564739278', '5564738209', 1),
(21, 'Fernanda', 'Fogg', '61084 Talmadge St', 'Charleston', 'West Virginia', '87969', '676536478', '993872638', 1),
(22, 'Elvyn', 'Lipman', '629 Forster Way', 'Tampa', 'Florida', '25959', '382739467', '625384097', 1),
(23, 'Regan', 'McPaik', '61 Crowley Way', 'San Jose', 'California', '47649', '365498274', '874530273', 1),
(24, 'Ariadne', 'Suttle', '1 Aberg St', 'Toledo', 'Ohio', '43453', '382964730', '987234516', 1),
(25, 'Yetty', 'Croney', '19 Duke Ln', 'Camden', 'New Jersey', '83212', '384858743', '765498763', 1),
(26, 'Brendon', 'Coppock.', '95 Randy Ave', 'Houston', 'Texas', '84151', '2334567891', '876543219', 1),
(27, 'Miguelita', 'Jindacek', '9304 Knutson Way', 'Tacoma', 'Washington', '54883', '345678912', '765432198', 1),
(28, 'Hugo', 'Burleton', '553 Jenna Cir', 'Washington', 'District of Columbia', '50287', '456789123', '654321987', 1),
(29, 'Verine', 'Wadsworth', '957 Anhalt Way', 'Jeffersonville', 'Indiana', '84474', '567891234', '543219876', 1),
(30, 'Sarene', 'Parkman', '5153 Calypso Ln', 'Columbus', 'Ohio', '96441', '156317377', '654876432', 1),
(32, 'Mark', 'Bixler', '5740 S 36th Ave', 'New Era', 'MI', '49446', '22222222222', '11111111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_ID` int(11) NOT NULL,
  `bank_name` varchar(45) NOT NULL,
  `bank_address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_ID`, `bank_name`, `bank_address`) VALUES
(1, 'TD Bank', '254 W 83 St Fayetteville NC 32165'),
(2, 'BB&T', '15 Piper Ln Fayetteville NC 32541'),
(3, 'United Bank', '3 Tenor Ln Fayetteville NC 36251'),
(4, 'Bank of Fayetteville', '65 Main Streen Fayetteville NC 32165');

-- --------------------------------------------------------

--
-- Table structure for table `check`
--

CREATE TABLE `check` (
  `check_ID` int(11) NOT NULL,
  `check_ammount` decimal(7,2) NOT NULL,
  `check_date` date DEFAULT NULL,
  `letter_sent_date` date DEFAULT NULL,
  `payment_received` tinyint(4) NOT NULL,
  `Store_store_ID` int(11) NOT NULL,
  `Store_Company_company_ID` int(11) NOT NULL,
  `Account_account_ID` int(11) NOT NULL,
  `letter_status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `check`
--

INSERT INTO `check` (`check_ID`, `check_ammount`, `check_date`, `letter_sent_date`, `payment_received`, `Store_store_ID`, `Store_Company_company_ID`, `Account_account_ID`, `letter_status`) VALUES
(1, '419.96', '2017-11-27', '2017-12-11', 1, 2, 1, 3, '1'),
(2, '193.85', '2016-08-09', NULL, 0, 1, 1, 24, '2'),
(3, '818.96', '2017-02-25', NULL, 0, 1, 1, 24, '2'),
(4, '67.68', '2017-10-17', NULL, 1, 1, 1, 29, '3'),
(5, '426.68', '2016-09-04', NULL, 0, 2, 1, 15, '4'),
(6, '324.14', '2016-03-16', NULL, 1, 2, 1, 29, '3'),
(7, '422.40', '2017-11-08', '2017-12-12', 0, 2, 1, 18, '2'),
(8, '666.31', '2017-09-20', NULL, 0, 2, 1, 5, '2'),
(9, '584.56', '2016-12-17', NULL, 0, 2, 1, 21, '3'),
(10, '225.23', '2017-07-27', NULL, 1, 1, 1, 22, '2'),
(11, '398.73', '2016-01-20', NULL, 0, 1, 1, 3, '2'),
(12, '393.09', '2017-12-01', NULL, 0, 2, 1, 8, '0'),
(13, '58.58', '2017-11-13', NULL, 1, 1, 1, 4, '2'),
(14, '144.99', '2017-10-26', NULL, 1, 1, 1, 5, '3'),
(15, '208.41', '2016-08-19', NULL, 0, 2, 1, 2, '2'),
(16, '780.72', '2017-04-25', '2017-12-12', 0, 2, 1, 1, '2'),
(17, '848.43', '2016-05-09', NULL, 0, 1, 1, 29, '2'),
(18, '131.11', '2016-07-26', NULL, 0, 1, 1, 6, '2'),
(19, '358.18', '2017-03-04', NULL, 0, 1, 1, 5, '3'),
(20, '260.34', '2017-02-13', NULL, 0, 1, 1, 7, '3'),
(21, '325.62', '2016-06-21', NULL, 0, 1, 1, 2, '2'),
(22, '320.92', '2016-04-22', NULL, 0, 1, 1, 5, '2'),
(23, '692.47', '2017-12-01', '2017-12-02', 0, 1, 1, 4, '1'),
(24, '70.56', '2017-02-16', NULL, 1, 1, 1, 8, '2'),
(25, '260.10', '2017-12-24', NULL, 1, 1, 1, 6, '3'),
(26, '439.46', '2016-08-28', NULL, 0, 1, 1, 3, '3'),
(27, '551.78', '2017-04-07', NULL, 0, 1, 1, 2, '4'),
(28, '335.98', '2017-07-28', NULL, 0, 2, 1, 1, '2'),
(29, '527.01', NULL, NULL, 1, 2, 1, 30, '2'),
(30, '261.83', '2016-11-03', NULL, 0, 1, 1, 22, '2'),
(31, '12.50', '2016-07-09', NULL, 0, 2, 1, 1, '1'),
(32, '999.99', '2017-10-05', NULL, 1, 2, 1, 32, '1');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_ID` int(11) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `company_contact` varchar(45) NOT NULL,
  `company_letter_interval` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_ID`, `company_name`, `company_contact`, `company_letter_interval`) VALUES
(1, 'Bill\'s Groceries INC', '321654987', '30');

-- --------------------------------------------------------

--
-- Table structure for table `company_has_bank`
--

CREATE TABLE `company_has_bank` (
  `Company_company_ID` int(11) NOT NULL,
  `Bank_bank_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_has_bank`
--

INSERT INTO `company_has_bank` (`Company_company_ID`, `Bank_bank_ID`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE `letter` (
  `letter_ID` int(11) NOT NULL,
  `letter_header` longtext NOT NULL,
  `letter_body` longtext NOT NULL,
  `letter_footer` longtext NOT NULL,
  `letter_number` int(11) NOT NULL,
  `Company_company_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`letter_ID`, `letter_header`, `letter_body`, `letter_footer`, `letter_number`, `Company_company_ID`) VALUES
(1, '[COMPANY]\r\n[COMPANY ADDRESS]\r\n[PHONE NUMBER]\r\n[DATE]\r\n', '[NAME OF CUSTOMER], you recently purchased some items using a check from our store, coming to a total of [PRICE]. Your check has bounced, and we have not received the money from your account. Please return to the store and pay the amount due. You will be sent another letter in 10 business days if you do not pay. You will also be charged a fee due to the bounced check.', 'Sincerely,\r\n[NAME OF MANAGER]', 1, 1),
(2, '[COMPANY]\n[COMPANY ADDRESS]\n[PHONE NUMBER]\n[DATE]', '[NAME OF CUSTOMER], we sent you a letter 2 weeks ago asking you to pay the amount of [PRICE] because your check had bounced. We have not heard from you and are reminding you that failure to pay is considered stealing. If the money is not given to us in 2 weeks, we will take legal action against you. Please return to the store and pay the money you owe us. Because you had not responded before this letter was sent the bounced check fee has increased.', 'Sincerely,\n[NAME OF MANAGER]\n', 2, 1),
(3, '[COMPANY]\n[COMPANY ADDRESS]\n[PHONE NUMBER]\n[DATE]\n', '[NAME OF CUSTOMER], We have not heard from you and have given you ample time to respond and give the money you owe us. Because of this, we will be taking you to court. Expect to hear from our lawyer very soon.', 'Sincerely,\n[NAME OF MANAGER]', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_ID` int(11) NOT NULL,
  `report_file` varchar(256) NOT NULL,
  `letter_number` int(11) NOT NULL,
  `report_printed` tinyint(1) NOT NULL DEFAULT '0',
  `check_ID` int(11) NOT NULL,
  `company_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_ID`, `report_file`, `letter_number`, `report_printed`, `check_ID`, `company_ID`) VALUES
(24, '16_2017-12-12.pdf', 2, 0, 16, 1),
(23, '12_2017-12-12.pdf', 1, 0, 12, 1),
(22, '7_2017-12-12.pdf', 2, 1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_ID` int(11) NOT NULL,
  `store_name` varchar(45) NOT NULL,
  `store_street` varchar(45) NOT NULL,
  `store_city` varchar(45) NOT NULL,
  `store_state` varchar(45) NOT NULL,
  `store_zip` varchar(45) NOT NULL,
  `Company_company_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_ID`, `store_name`, `store_street`, `store_city`, `store_state`, `store_zip`, `Company_company_ID`) VALUES
(1, 'West Bob\'s Groceries', '23 East Paladin Way', 'Fayetteville', 'NC', '32154', 1),
(2, 'East Bob\'s Groceries', '4 Hunter Ave', 'Fayetteville', 'NC', '35485', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `user_fname` varchar(45) NOT NULL,
  `user_lname` varchar(45) NOT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_role_name` varchar(45) NOT NULL,
  `Store_store_ID` int(11) NOT NULL,
  `Store_Company_company_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_role_name`, `Store_store_ID`, `Store_Company_company_ID`) VALUES
(3, 'George', 'Smith', 'gsmith@gmail.com', 'nothardpassword', 'manager', 1, 1),
(1, 'Hannah', 'Hagiss', 'hhagiss@gmail.com', 'password123', 'manager', 2, 1),
(2, 'Emmit', 'Person', 'emmitt@gmail.com', 'password', 'clerk', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_ID`),
  ADD UNIQUE KEY `account_ID_UNIQUE` (`account_ID`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_ID`),
  ADD UNIQUE KEY `bank_ID_UNIQUE` (`bank_ID`);

--
-- Indexes for table `check`
--
ALTER TABLE `check`
  ADD PRIMARY KEY (`check_ID`,`Store_store_ID`,`Store_Company_company_ID`,`Account_account_ID`),
  ADD UNIQUE KEY `check_ID_UNIQUE` (`check_ID`),
  ADD KEY `fk_Check_Store1_idx` (`Store_store_ID`,`Store_Company_company_ID`),
  ADD KEY `fk_Check_Account1_idx` (`Account_account_ID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_ID`),
  ADD UNIQUE KEY `company_ID_UNIQUE` (`company_ID`);

--
-- Indexes for table `company_has_bank`
--
ALTER TABLE `company_has_bank`
  ADD PRIMARY KEY (`Company_company_ID`,`Bank_bank_ID`),
  ADD KEY `fk_Company_has_Bank_Bank1_idx` (`Bank_bank_ID`),
  ADD KEY `fk_Company_has_Bank_Company_idx` (`Company_company_ID`);

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`letter_ID`,`Company_company_ID`),
  ADD UNIQUE KEY `letter_id_UNIQUE` (`letter_ID`),
  ADD KEY `fk_Letter_Company1_idx` (`Company_company_ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_ID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_ID`,`Company_company_ID`),
  ADD UNIQUE KEY `store_ID_UNIQUE` (`store_ID`),
  ADD KEY `fk_Store_Company1_idx` (`Company_company_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Store_store_ID`,`Store_Company_company_ID`,`user_ID`),
  ADD UNIQUE KEY `user_ID_UNIQUE` (`user_ID`),
  ADD UNIQUE KEY `user_email_UNIQUE` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `check`
--
ALTER TABLE `check`
  MODIFY `check_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `letter_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
