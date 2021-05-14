-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 05:20 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(108, 'Mobile'),
(109, 'Smarts'),
(122, 'Gaming'),
(125, 'Gags'),
(137, 'Systems'),
(138, 'Printers');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `pst_id` int(33) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `com_mail` varchar(255) NOT NULL,
  `com_msg` text NOT NULL,
  `status` varchar(33) NOT NULL DEFAULT 'unappoved',
  `com_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `pst_id`, `com_name`, `com_mail`, `com_msg`, `status`, `com_date`) VALUES
(41, 52, 'Enoch Strokes', 'strokes@gmail.com', 'How much is this phone, do you think i can afford it?', 'approved', '2019-12-16 13:30:01'),
(42, 46, 'Gary Philips', 'philis@gmail.com', 'Will this phone last for long!', 'approved', '2019-12-16 13:31:29'),
(43, 48, 'Anthony Josh', 'josh@gmail.com', 'Can this HD vision cause shock?', 'approved', '2019-12-16 14:05:44'),
(63, 56, 'Dan James', 'dan@gmail.com', 'Cool pad!', 'approved', '2019-12-23 12:16:43'),
(64, 58, 'Anthony Joshua', 'tony@gmail.com', 'What\'s the RAM size?', 'approved', '2019-12-23 12:18:37'),
(65, 53, 'Adams Elliot', 'elliot@gmail.com', 'Wow! It\'s too cool. What\'s the price?', 'approved', '2019-12-23 12:19:37'),
(82, 44, 'Mark Stephen', 'stephen33@gmail.com', 'Can i get this here in Apappa Lagos state?', 'approved', '2019-12-23 13:08:20'),
(105, 43, 'Sandy Obi', 'obi@gmail.com', 'Hey, can i get this in jumia or konga?', 'unappoved', '2020-01-15 17:06:42'),
(106, 43, 'Justin Lemon', 'lemon@gmail.com', 'Is this better than PS4?', 'unappoved', '2020-01-15 17:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(11) NOT NULL,
  `com_id` int(33) NOT NULL,
  `rep_name` varchar(255) NOT NULL,
  `rep_mail` varchar(255) NOT NULL,
  `rep_msg` varchar(255) NOT NULL,
  `rep_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `com_id`, `rep_name`, `rep_mail`, `rep_msg`, `rep_date`) VALUES
(13, 41, 'Admin Greg', 'greg@gmail.com', 'Yes, you can!', '2019-12-17 14:53:00'),
(14, 50, 'Admin josh', 'josh@gmail.com', 'It\'s for gaming only!', '2019-12-20 10:34:26'),
(15, 51, 'Admin Timothy', 'admin_tim@gmail.com', 'It\'s just 50,000', '2019-12-20 12:34:32'),
(18, 104, 'Admin Timothy', 'admin_tim@gmail.com', 'It is used for shit like you!', '2020-01-15 10:37:16'),
(19, 106, 'Admin Tony', 'admin_tony@gmail.com', 'Ofcourse! Yes', '2020-01-23 10:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(33) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `msg`, `date`) VALUES
(21, 'sandra@yahoo.com', 'Can it work', 'Can it work out for the best of purpose', '2020-01-17 05:45:54'),
(23, 'gab@gmail.com', 'Can i be employed', 'Hey, i was wondering if i can obtain a job at your place if it is kindly okay with you. Do you think i have a chance?', '2020-01-23 10:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pst_id` int(3) NOT NULL,
  `pst_cat_id` varchar(255) NOT NULL,
  `pst_title` varchar(255) NOT NULL,
  `pst_sub_title` varchar(255) NOT NULL,
  `pst_author` varchar(255) NOT NULL,
  `pst_date` datetime NOT NULL,
  `pst_img` text NOT NULL,
  `pst_content` longtext NOT NULL,
  `pst_comment_count` varchar(3) NOT NULL,
  `pst_tag` varchar(255) NOT NULL,
  `pst_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_view_count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pst_id`, `pst_cat_id`, `pst_title`, `pst_sub_title`, `pst_author`, `pst_date`, `pst_img`, `pst_content`, `pst_comment_count`, `pst_tag`, `pst_status`, `post_view_count`) VALUES
(26, '109', 'LG SHELL', '...life is good ', 'HENRY MATTEWS', '0000-00-00 00:00:00', 'appleWatch.png', 'Currently each member has a file on which vital data or information about a member or management is kept in. Apart from this the member information or data is also written on papers and in booklets which are then stored in shelves. Other documents such as', '5', 'LG', 'Published', 6),
(30, '122', 'PS VITA', '...game station', 'GARY HARTON', '0000-00-00 00:00:00', 'psvita.jpg', 'The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills lik', '3', 'playstation', 'Published', 3),
(43, '122', 'XBOX SET', '...gaming the nations', 'Eunice Adams', '2019-12-24 00:00:00', 'xbox360.jpg', 'The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills lik', '4', 'neo games', 'Published', 5),
(44, '125', 'TRAVEL TUG', '...moving bags', 'Bethel Johnson', '0000-00-00 00:00:00', 'new-pattern-duffel-bag-brown-luggage-bag-inte-enterprises-original-imafe8h7gwwffywg.jpeg', 'Currently each member has a file on which vital data or information about a member or management is kept in. Apart from this the member information or data is also written on papers and in booklets which are then stored in shelves. Other documents such as', '', 'moves', 'Published', 1),
(45, '125', 'GALLARY SACKS', '....fliping gags', 'Philip Garyston', '0000-00-00 00:00:00', '61mIEj15wjL._SL1200_.jpg', 'The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills lik', '3', 'standard gags', 'Published', 3),
(47, '109', 'ED POWER BANK', '...powering the nations', 'Barthelomew Andrews', '2019-12-13 00:00:00', '14.jpg', 'The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills lik', '', 'power banks', 'Published', 1),
(48, '109', 'HD VISION', '...visualizing the world', 'ABRAHIM YUSUF', '2019-12-20 00:00:00', 'vr.png', 'Currently each member has a file on which vital data or information about a member or management is kept in. Apart from this the member information or data is also written on papers and in booklets which are then stored in shelves. Other documents such as', '1', 'aluera signs', 'Published', 2),
(49, '125', 'ILOUD BAG', '....connecting inputs', 'Bethel Johnson', '2019-12-27 00:00:00', 'IK+MULTIMEDIA+ILOUD+TRAVEL+BAG.JPG', 'Currently each member has a file on which vital data or information about a member or management is kept in. Apart from this the member information or data is also written on papers and in booklets which are then stored in shelves. Other documents such as', '', 'for more', 'Published', 1),
(51, '125', 'HIGH RANGE BAG', '...hearing beyond miles', 'Sandra Jacobs', '0000-00-00 00:00:00', 'GUEST_e05c54f6-8608-43e6-975a-3bddacb98cf9.jpg', 'Modularity is successful because developers use prewritten code, which saves resources. Overall, modularity provides greater software development manageability.\r\n1.	Home: This module represent the home page of this application.\r\n2.	Register: The register module is used for the registration of new patients. This is where the admin click when trying to add new patient into the system.\r\n3.	Retrieve Patient Data: This module is used to retrieve patient information from database.\r\n4.	About St. Joseph: This module display few information about the case study.\r\n5.	Exit: This module enable you to close this application.   \r\n', '10', 'aluera signs', 'Published', 9),
(52, '108', 'GOOGLE X5 PLUS', '....connecting inputs', 'ERNEST NEWTON', '2019-12-25 00:00:00', 'pixelPro.png', 'The review focused mainly on Job, discussing its meaning, online systems as a type of system, portal, job portal, and examination. In the screening examination point of view, examination screening, the history of examination. Other related concepts were also reviewed to enlighten the researcher on what to design. This review contains internal citation whose references can be located at the reference page of this research paper.', '1', 'flips', 'Published', 2),
(53, '108', 'SAMSUNG S7+', '...watching time of flies', 'Abrahim Yusuf', '2019-12-27 00:00:00', 's7.png', 'The review focused mainly on Job, discussing its meaning, online systems as a type of system, portal, job portal, and examination. In the screening examination point of view, examination screening, the history of examination. Other related concepts were also reviewed to enlighten the researcher on what to design. This review contains internal citation whose references can be located at the reference page of this research paper.', '0', 'aluera signs', 'Published', 0),
(54, '122', 'XBOX 360 ACTIVATED', '...a sands in time', 'Chisom Chukwudi', '0000-00-00 00:00:00', 'xbox.png', 'The review focused mainly on Job, discussing its meaning, online systems as a type of system, portal, job portal, and examination. In the screening examination point of view, examination screening, the history of examination. Other related concepts were also reviewed to enlighten the researcher on what to design. This review contains internal citation whose references can be located at the reference page of this research paper.', '16', 'Gaming the world', 'Published', 5),
(55, '109', 'Iphone Charger x8 acdX', 'ipersonal', 'Felicity Stones', '0000-00-00 00:00:00', 'cab4.jpg', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the car owner to easily contact the engineer to come to their house to repair their cars.  In these project works the car owners can chart or contact the engineer to tell him or the particular problem of the car. This project involves identifying the problem of the car and solution to the problem.\r\n', '2', 'activeCharges', 'Published', 2),
(56, '108', 'iPad3 PRO', 'iPADS X3+', 'Nwairanauju Chukwudinaobi', '2019-02-01 00:00:00', 'ipad.png', 'Editing is the process of selecting and preparing writing, photography, visual, audible, and film media used to convey information. The editing process can involve correction, condensation, organization, and many other modifications performed with an intention of producing a correct, consistent, accurate and complete work. This chapter explores the existing method gathering and disseminating information and speeches as well as other practices of public relation unit in its background of study using Public Relation Division', '0', 'iMACS', 'Published', 0),
(57, '109', 'WRIST USB', 'LikeOns universals', 'Bethel Veronica', '2019-12-20 00:00:00', '2-1.jpg', 'Editing is the process of selecting and preparing writing, photography, visual, audible, and film media used to convey information. The editing process can involve correction, condensation, organization, and many other modifications performed with an intention of producing a correct, consistent, accurate and complete work. This chapter explores the existing method gathering and disseminating information and speeches as well as other practices of public relation unit in its background of study using Public Relation Division', '0', 'Mortalicant wires', 'Published', 0),
(58, '108', 'Iphone 7 plus', 'black skinned', 'Chisom Chukwudi', '2019-12-11 00:00:00', 'iphone6.jpg', 'Currently each member has a file on which vital data or information about a member or management is kept in. Apart from this the member information or data is also written on papers and in booklets which are then stored in shelves. Other documents such as', '0', 'iMac', 'Published', 0),
(59, '137', 'MACBOOK PRO', 'ipersonal', 'Felicity Stones', '0000-00-00 00:00:00', 'macbook.png', 'The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills lik', '12', 'iMac', 'Published', 0),
(60, '109', 'ELECTRONIC CHARGES', '....connecting inputs', 'Ernest Chukwuebuka', '0000-00-00 00:00:00', '15.jpg', 'The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills lik', '7', 'inputs for ....', 'Published', 7),
(61, '138', 'CANON PRINTER', '...printing without faults', 'Henry Mattews', '2019-12-26 00:00:00', '124611.jpg', 'The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills lik', '8', 'styling the designs', 'Published', 1),
(62, '138', 'STALLION PRINTERS', '...visualizing the world', 'Abrahim Yusuf', '0000-00-00 00:00:00', '113932.jpg', 'The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills lik', '0', 'aluera signs', 'Published', 0),
(63, '138', 'CANON MULTI PRINTERS', '...printing without faults', 'Chisom Chukwudi Moses', '0000-00-00 00:00:00', '124140.jpg', 'The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills lik', '7', 'flips', 'Published', 2),
(64, '137', 'Mac pro 26', '....promoting sands', 'Collins Phil', '0000-00-00 00:00:00', 'imac.jpg', '<p>The purpose of writing this review is to pass on to the reader knowledge and ideas that has been established on the topic by other scholars and highlight their strengths and weaknesses. Literature review lets the researcher gain and demonstrate skills like: the ability to seek information, scan literatures efficiently using manual or computerized methods and identify useful articles and books that will provide rational for the design and implementation phase. Before coming out with ideas on how to develop this system (online lecture support portal) research related to this topic that has been done has to be reviewed to avoid repetition of research work.</p>', '19', 'for more dissemination', 'Published', 0),
(71, '108', 'iphone 6x Coated', '...illuminating the strings', 'Chisom Chukwudi Moses', '2020-01-22 00:00:00', '5.jpg', 'Currently each member has a file on which vital data or information about a member or management is kept in. Apart from this the member information or data is also written on papers and in booklets which are then stored in shelves. Other documents such as', '31', 'iMac', 'Published', 31),
(74, '137', 'Computer Set', '...moving beyond miles', 'Leonard Thirmfir', '0000-00-00 00:00:00', '112913.jpg', 'Currently each membe', '95', 'Full sets', 'Published', 87),
(79, '137', 'Computer Set', '...moving beyond miles', 'Leonard Thirmfir', '0000-00-00 00:00:00', '112913.jpg', 'Currently each membe', '95', 'Full sets', 'draft', 87),
(80, '137', 'Computer Set', '...moving beyond miles', 'Leonard Thirmfir', '0000-00-00 00:00:00', '112913.jpg', 'Currently each membe', '95', 'Full sets', 'draft', 87);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(33) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `Role` varchar(33) NOT NULL DEFAULT 'user',
  `hashSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  `user_status` varchar(33) NOT NULL DEFAULT 'unauthorized',
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `user_img`, `Role`, `hashSalt`, `user_status`, `token`) VALUES
(15, 'sandra_michx', 'am', 'Michel', 'Sandras Jacob', 'mich_345@yahoo.com', 'quote-1-1.jpg', 'Admin', '', 'Unauthorized', '54a91d24f8c613d222032ba89b02f3e2861efd147d169863ec2536e21c5bf8e435a31c94c897f59c49b68e566f1a9f240d15'),
(16, 'Clintino_babra', 'Hello', 'Clintinos', 'Anumudu', 'clin232@gmail.com', 'links.png', 'Subscriber', '', 'Authorized', ''),
(17, 'Julie_cages', 'Hello', 'Juliet', 'Chukwukaodinaobi', 'julie@gmail.com', 'avatar4.jpg', 'Subscriber', '', 'unauthorized', ''),
(18, 'Dan_naths', 'Hello', 'Dan', 'Nathaniels', 'dan_naths@gmail.com', 'links2.png', 'Subscriber', '', 'Authorized', ''),
(19, 'TA', '00000000', 'Tonio', 'A', 'ta@gmail.com', 'quote-4-1.jpg', 'Admin', '', 'Unauthorized', ''),
(20, 'Gemini', 'Hello', 'Bethel ', 'Innocent', 'beth@gmail.com', 'cand-5.png', 'Subscriber', '$2y$10$iusesomecrazystring22', 'unauthorized', ''),
(26, 'jamebekcom', 'Hello', 'James', 'Ibekason', 'james@gmail.com', 'avatar5.jpg', 'Subscriber', '$2y$10$iusesomecrazystring22', 'unauthorized', ''),
(44, 'Gamaliel', 'Hello', 'Gamaliel', 'Ibewuihe Clifford', 'gam@gmail.com', 'cand-2.png', 'Subscriber', '$2y$10$iusesomecrazystring22', 'unauthorized', ''),
(46, 'phil_jacs', 'Hello', 'Philip', 'Jacks', 'phil@gmail.com', 'testimonials_2.jpg', 'user', '$2y$10$iusesomecrazystring22', 'unauthorized', ''),
(47, 'neo', 'Hello', 'Newton', 'Gambala', 'neo@gmail.com', 'avatar5.jpg', 'User', '$2y$10$iusesomecrazystrings22', 'unauthorized', ''),
(50, 'Nike', 'Blessing', 'Nike', 'Benjamin', 'nike@gmail.com', 'cand-4.png', 'user', '$2y$10$iusesomecrazystrings22', 'unauthorized', ''),
(51, 'ben', 'ecb97d53d2d35b8ba98cf82a8d78cad9', 'Benjamain', 'Okoro', 'ben@gmail.com', 'IMG-20200122-WA0023.jpg', 'user', '$2y$10$iusesomecrazystrings22', 'unauthorized', ''),
(53, 'bel', 'Bright', 'Believing', 'Chukwubuikem', 'bel@gmail.com', 'IMG_20191229_170050~2.jpg', 'user', '$2y$10$iusesomecrazystrings22', 'unauthorized', ''),
(54, 'kenneth', '$2y$12$s8KYo18HUSJJG.aEh2uNa.JoDv', 'ken', 'onwuka', 'ken@gmail.com', 'kisspng-webcam-computer-video-camera-vector-computer-camera-5a8e839ae5fe75.9635205815192892429421.png', 'user', '$2y$10$iusesomecrazystrings22', 'unauthorized', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(3, 'kgcb18eh1lb8ruok0v0etv0c48', 1579691208),
(4, 'i3bmcdtt8kg3mqjl1dvirgfm87', 1579091801),
(5, 'bva9f3trdp4vvl397ueaodercv', 1579006472),
(6, 'ojodaeiv2din2fnp4q4vc14cjs', 1579006364),
(7, 'qcp3fk45bl773vvkc1l4hiergv', 1579002633),
(8, '', 1579003380),
(9, 'u504o85dd0l915k65fnet5jpt0', 1579007042),
(10, 'omvd2cr4g9ffrbf1impe41uo7v', 1579039917),
(11, 'tt9n0npffvvpvqacc1k03ronc6', 1580032295);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pst_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pst_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
