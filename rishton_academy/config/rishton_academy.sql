-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 11:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rishton_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$BWLKOUFbnwaYaV/iFLOeluZ9gJZSX6ZYZJJOQPfFjtXpx1Qt4TH9S');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassID` int(11) NOT NULL,
  `ClassName` varchar(50) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `TeacherID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassID`, `ClassName`, `Capacity`, `TeacherID`) VALUES
(1, 'One', 22, 13),
(2, 'Two', 35, 14),
(3, 'Three', 56, 4),
(4, 'Four', 50, 7),
(5, 'Five', 39, 3),
(6, 'Six', 81, 12),
(7, 'Seven', 17, 2),
(8, 'Eight', 97, 1),
(9, 'Nine', 63, 9),
(10, 'Ten', 90, 6);

-- --------------------------------------------------------

--
-- Table structure for table `dinnermoney`
--

CREATE TABLE `dinnermoney` (
  `PupilID` int(11) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dinnermoney`
--

INSERT INTO `dinnermoney` (`PupilID`, `Amount`, `Date`) VALUES
(4, 81.00, '2024-07-14'),
(19, 37.00, '2024-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `librarybooks`
--

CREATE TABLE `librarybooks` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(100) DEFAULT NULL,
  `CheckedOutTo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `librarybooks`
--

INSERT INTO `librarybooks` (`BookID`, `Title`, `Author`, `CheckedOutTo`) VALUES
(1, 'Repellendus Enim so', 'Aperiam eligendi dol', 'Est distinctio Prov'),
(2, 'Mollitia iusto sunt ', 'Recusandae Sit temp', 'Sunt dolore est re'),
(3, 'Autem magni magna ut', 'Sunt lorem et dolore', 'Vitae suscipit magna');

-- --------------------------------------------------------

--
-- Table structure for table `parentsguardians`
--

CREATE TABLE `parentsguardians` (
  `ParentID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parentsguardians`
--

INSERT INTO `parentsguardians` (`ParentID`, `Name`, `Address`, `Email`, `Telephone`) VALUES
(1, 'roqa', 'Veniam velit volupt', 'xovyj@mailinator.com', '+1 (878) 453-4722'),
(2, 'qisa', 'Eiusmod porro iste i', 'roqihyxab@mailinator.com', '+1 (861) 625-9501'),
(3, 'qury', 'Laboris rem pariatur', 'secoqeg@mailinator.com', '+1 (469) 821-3567'),
(4, 'newivace', 'Consequuntur ex ut e', 'qiviviw@mailinator.com', '+1 (395) 605-4773'),
(5, 'fosemuxy', 'Laborum Velit qui l', 'zolaxu@mailinator.com', '+1 (978) 209-3029'),
(6, 'qodake', 'Eu aut earum quae co', 'vozof@mailinator.com', '+1 (777) 253-7285'),
(7, 'vakyhity', 'Voluptatem ipsum te', 'qedas@mailinator.com', '+1 (634) 874-7252'),
(8, 'tywy', 'Error libero qui con', 'razaq@mailinator.com', '+1 (997) 148-9365'),
(9, 'levutek', 'Minus cum voluptatem', 'xuzugicyzy@mailinator.com', '+1 (789) 748-6409'),
(10, 'ryjesinady', 'Magna qui sunt conse', 'savyz@mailinator.com', '+1 (708) 478-5839'),
(11, 'mezafutuq', 'Incidunt nostrum do', 'nabekifag@mailinator.com', '+1 (522) 441-9335'),
(12, 'xyqapal', 'Mollitia accusamus d', 'cahecugusi@mailinator.com', '+1 (487) 639-4776'),
(14, 'sykalez edit', 'Ea nulla qui laudant', 'nudacyqer@mailinator.com', '+1 (174) 901-7532'),
(17, 'Ezekiel Solis', 'Debitis voluptate et', 'byty@mailinator.com', '+1 (594) 749-6299'),
(18, 'Kasimir Richmond', 'Consequat Dolor fac', 'ganyqyd@mailinator.com', '+1 (155) 703-6854');

-- --------------------------------------------------------

--
-- Table structure for table `pupilparent`
--

CREATE TABLE `pupilparent` (
  `PupilID` int(11) NOT NULL,
  `ParentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pupilparent`
--

INSERT INTO `pupilparent` (`PupilID`, `ParentID`) VALUES
(2, 1),
(3, 9),
(4, 9),
(6, 7),
(7, 10),
(8, 7),
(9, 1),
(10, 1),
(11, 12),
(12, 2),
(13, 5),
(14, 8),
(15, 5),
(16, 11),
(17, 1),
(18, 7),
(19, 10),
(20, 11),
(21, 12),
(22, 7),
(23, 4),
(24, 14),
(25, 2),
(26, 8),
(27, 4),
(28, 1),
(29, 14),
(30, 14);

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `PupilID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `MedicalInformation` text DEFAULT NULL,
  `ClassID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`PupilID`, `Name`, `Address`, `MedicalInformation`, `ClassID`) VALUES
(2, 'Jelani Morse', 'Necessitatibus archi', 'Dolor rem vel amet ', 8),
(3, 'Yasir Mendoza', 'Quas Nam ad officiis', 'Non consequuntur vol', 8),
(4, 'Ahmed Walls', 'Incididunt numquam s', 'Similique odio ipsum', 2),
(5, 'Plato Holland', 'Molestias dolor quid', 'Do voluptas sit aut', 1),
(6, 'Dustin Davis', 'Qui nisi fugiat et ', 'Corporis laborum qui', 1),
(7, 'Owen Clemons', 'Autem in rerum moles', 'Dolorem nostrud cupi', 7),
(8, 'Cassidy Young', 'Dolorem possimus no', 'Laudantium ducimus', 6),
(9, 'Madison Glover', 'Ipsa ex et obcaecat', 'Incididunt rerum qui', 1),
(10, 'Alexa Powell', 'Dolores praesentium ', 'Do ut molestiae omni', 10),
(11, 'Hannah Barnes', 'Quaerat occaecat ali', 'Cum amet facere rep', 4),
(12, 'Kermit Ball', 'Corporis sed qui qui', 'Consectetur ea labor', 1),
(13, 'Donovan Wood', 'Ut enim sequi odio q', 'Est ea adipisci cum ', 5),
(14, 'Cullen Burgess', 'Pariatur Nulla adip', 'Eiusmod provident o', 3),
(15, 'Velma Daniel', 'Deserunt quibusdam f', 'Vitae consectetur in', 7),
(16, 'Gay Sanders', 'Numquam aute delenit', 'Corrupti repudianda', 10),
(17, 'Aquila Stanley', 'Quis voluptates opti', 'Impedit quia quis q', 10),
(18, 'Oprah Washington', 'Soluta facilis ducim', 'Pariatur Saepe repr', 7),
(19, 'Ryder Black', 'Explicabo Ducimus ', 'Id quia fuga Illum', 10),
(20, 'Brady Finley', 'Expedita voluptatibu', 'Autem velit architec', 8),
(21, 'Regina David', 'Aut sint hic laboris', 'Enim eos aspernatur ', 3),
(22, 'Hoyt Marsh', 'Cum eaque et ut nisi', 'Sit dolor duis ut id', 8),
(23, 'Orson Sargent', 'Anim nisi expedita i', 'Iusto eos tempore ', 1),
(24, 'Rudyard Chapman', 'Aliquid tempora quam', 'Voluptas dolorem com', 6),
(25, 'Virginia Gonzales', 'Nisi impedit volupt', 'Corrupti sed porro ', 10),
(26, 'Aileen Reyes', 'Sunt ullam voluptat', 'Quasi Nam nostrum qu', 10),
(27, 'Upton Beach', 'Aliquid at autem rep', 'Saepe dolorum nesciu', 7),
(28, 'Amber Hoover', 'Beatae quos dolor mo', 'Voluptatum repellend', 10),
(29, 'Lenore Serrano', 'Distinctio Qui elig', 'Pariatur Libero fac', 7),
(30, 'Noelani Hopper', 'Iusto adipisicing di', 'Laboriosam possimus', 4);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `SalaryID` int(11) NOT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`SalaryID`, `Amount`, `Date`) VALUES
(1, 435.00, '2024-07-14'),
(3, 654.00, '2024-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `AnnualSalary` decimal(10,2) DEFAULT NULL,
  `BackgroundCheck` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TeacherID`, `Name`, `Address`, `PhoneNumber`, `AnnualSalary`, `BackgroundCheck`) VALUES
(1, 'Christopher Lott', 'Cupidatat suscipit c', '+1 (832) 572-8115', 364.00, 'Voluptatem consequa'),
(2, 'Sonya Erickson', 'Sint eos eiusmod qui', '+1 (736) 721-7438', 895.00, 'Ut eaque dolor nihil'),
(3, 'Fiona Gibson', 'Nam aspernatur volup', '+1 (117) 319-4615', 992.00, 'Alias iure sit quid'),
(4, 'Ila Maddox', 'At dignissimos est e', '+1 (989) 371-1721', 79.00, 'Labore illum non nu'),
(5, 'Sylvester Dorsey', 'Culpa harum incidid', '+1 (438) 717-1943', 35.00, 'Laudantium nisi sae'),
(6, 'Martena Owens', 'Ullam non officia im', '+1 (876) 914-5185', 203.00, 'Recusandae Est volu'),
(7, 'Amity Sparks', 'Et dolore dolor dolo', '+1 (529) 688-2454', 976.00, 'Dolore debitis omnis'),
(8, 'Montana Lang', 'Est nihil aliquam ei', '+1 (511) 608-9962', 483.00, 'Voluptate beatae occ'),
(9, 'Alexa Fernandez', 'Eum aperiam est con', '+1 (942) 718-3075', 751.00, 'Est voluptas cupidi'),
(10, 'Abdul Greer', 'Dolore do adipisicin', '+1 (293) 241-4402', 593.00, 'Nulla omnis sunt vol'),
(11, 'Zane Stuart', 'Autem error expedita', '+1 (472) 345-7165', 102.00, 'Dolores tempora ex i'),
(12, 'Leigh Trevino', 'Reiciendis doloremqu', '+1 (477) 859-5898', 781.00, 'Blanditiis nulla cul'),
(13, 'Malik Bridges', 'Dolor velit do ullam', '+1 (645) 911-6801', 417.00, 'Sint quos voluptate'),
(14, 'Kai edit', 'Voluptate minus reru', '+1 (639) 364-5959', 210.00, 'Debitis aperiam iure'),
(15, 'Lillian Michael', 'Veritatis earum sapi', '+1 (309) 753-5102', 265.00, 'Enim nesciunt quia ');

-- --------------------------------------------------------

--
-- Table structure for table `teachingassistants`
--

CREATE TABLE `teachingassistants` (
  `AssistantID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `AnnualSalary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachingassistants`
--

INSERT INTO `teachingassistants` (`AssistantID`, `Name`, `Address`, `PhoneNumber`, `AnnualSalary`) VALUES
(1, 'Sade Glover', 'Iure inventore elit', '+1 (956) 502-4615', 518.00),
(2, 'Stephanie Sears', 'Incididunt aliquid s', '+1 (656) 897-3366', 65.00),
(3, 'Kirk Fox', 'Repellendus Non id', '+1 (698) 507-8039', 904.00),
(4, 'Clark Stone', 'Porro sed enim ipsa', '+1 (888) 819-7877', 833.00),
(5, 'Abraham Gilliam', 'In deleniti quod mol', '+1 (704) 933-9068', 85.00),
(6, 'Fleur Patterson', 'Magna irure suscipit', '+1 (586) 328-7875', 885.00),
(7, 'Sierra Kennedy', 'Esse quo vero rerum', '+1 (492) 992-6084', 781.00),
(8, 'Cedric Farrell', 'Veritatis facilis re', '+1 (195) 565-7614', 303.00),
(9, 'Victoria Maddox', 'Sed fuga Veritatis ', '+1 (311) 918-7601', 391.00),
(10, 'Yael Mcfadden', 'Culpa iste sint lor', '+1 (878) 563-4696', 262.00),
(11, 'Denise Dawson', 'Fugiat sapiente dig', '+1 (239) 327-3618', 839.00),
(12, 'Venus Winters', 'Deserunt sequi tempo', '+1 (524) 852-2535', 894.00),
(13, 'Jana Ramos', 'Vitae incididunt lab', '+1 (562) 814-3789', 483.00),
(14, 'Lenore Woodard', 'Mollitia voluptate c', '+1 (565) 727-2458', 887.00),
(15, 'Priscilla Conley', 'Culpa id natus nihil', '+1 (943) 272-2225', 928.00),
(16, 'Eaton Salinas', 'Fuga Consequuntur q', '+1 (124) 104-9364', 937.00),
(17, 'Keith Lowery', 'Neque quas eum paria', '+1 (971) 369-7121', 728.00),
(18, 'Reagan edit', 'Ut vel autem laborio', '+1 (617) 207-2207', 917.00),
(19, 'Zephr Farley', 'Tempore culpa aut c', '+1 (805) 956-5411', 604.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `dinnermoney`
--
ALTER TABLE `dinnermoney`
  ADD KEY `PupilID` (`PupilID`);

--
-- Indexes for table `librarybooks`
--
ALTER TABLE `librarybooks`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `parentsguardians`
--
ALTER TABLE `parentsguardians`
  ADD PRIMARY KEY (`ParentID`);

--
-- Indexes for table `pupilparent`
--
ALTER TABLE `pupilparent`
  ADD PRIMARY KEY (`PupilID`,`ParentID`),
  ADD KEY `ParentID` (`ParentID`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`PupilID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`SalaryID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `teachingassistants`
--
ALTER TABLE `teachingassistants`
  ADD PRIMARY KEY (`AssistantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `librarybooks`
--
ALTER TABLE `librarybooks`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parentsguardians`
--
ALTER TABLE `parentsguardians`
  MODIFY `ParentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pupils`
--
ALTER TABLE `pupils`
  MODIFY `PupilID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `SalaryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teachingassistants`
--
ALTER TABLE `teachingassistants`
  MODIFY `AssistantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`TeacherID`) REFERENCES `teachers` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dinnermoney`
--
ALTER TABLE `dinnermoney`
  ADD CONSTRAINT `dinnermoney_ibfk_1` FOREIGN KEY (`PupilID`) REFERENCES `pupils` (`PupilID`);

--
-- Constraints for table `pupilparent`
--
ALTER TABLE `pupilparent`
  ADD CONSTRAINT `pupilparent_ibfk_1` FOREIGN KEY (`PupilID`) REFERENCES `pupils` (`PupilID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pupilparent_ibfk_2` FOREIGN KEY (`ParentID`) REFERENCES `parentsguardians` (`ParentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pupils`
--
ALTER TABLE `pupils`
  ADD CONSTRAINT `pupils_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`ClassID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
