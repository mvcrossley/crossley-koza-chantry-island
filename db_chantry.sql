-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2017 at 06:24 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chantry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `gallery_name` varchar(150) NOT NULL DEFAULT 'gallery_default.jpg',
  `gallery_thumb` varchar(153) NOT NULL,
  `gallery_desc` varchar(600) NOT NULL DEFAULT 'Description Unavailable',
  `gallery_att` varchar(150) NOT NULL DEFAULT 'Photographer Unknown'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_name`, `gallery_thumb`, `gallery_desc`, `gallery_att`) VALUES
(1, 'aerial.jpg', 'aerial_TH.jpg', 'An aerial view of the island, the lighthouse, and its dock.', 'Karen Smith'),
(2, 'base.jpg', 'base_TH.jpg', 'Welcome to the Chantry Island tour base.', 'Vicki Tomori'),
(3, 'base2.jpg', 'base2_TH.jpg', 'Look for this sign to find us!', 'Photographer Unknown'),
(4, 'base3.jpg', 'base3_TH.jpg', 'Some knick-knacks found at the base.', 'Photographer Unknown'),
(5, 'base4.jpg', 'base4_TH.jpg', 'Local artworks on sale at the tour base.', 'Photographer Unknown'),
(6, 'base5.jpg', 'base5_TH.jpg', 'Nautical-themes pillows and decor are available at the Chantry Island tour base.', 'Photographer Unknown'),
(7, 'base6.jpg', 'base6_TH.jpg', 'Another view of our assorted gifts.', 'Photographer Unknown'),
(8, 'base7.jpg', 'base7_TH.jpg', 'Another view of the decor and gifts we have for sale at the Chantry Island tour base.', 'Photographer Unknown'),
(9, 'bedroom1.jpg', 'bedroom1_TH.jpg', 'Visit our fully-furnished lighthouse-keeper\'s cabin.', 'Vicki Tomori'),
(10, 'bedroom2.jpg', 'bedroom2_TH.jpg', 'The cabin is furnished with donations from local historical organisations, and volunteers.', 'Vicki Tomori'),
(11, 'birds1.jpg', 'birds1_TH.jpg', 'Thousands of birds make Chantry Island their home every year.', 'Nancy Calder'),
(12, 'birds2.jpg', 'birds2_TH.jpg', 'Whether in the trees, the bush, or on the rocky beaches, birds have found a way to nest on the island.', 'Nancy Calder'),
(13, 'birds3.jpg', 'birds3_TH.jpg', 'A beautiful bird nesting in a tree.', 'Carol Walberg'),
(14, 'birds4.jpg', 'birds4_TH.jpg', 'Another view of a beautiful bird nesting in a tree.', 'Carol Walberg'),
(15, 'diner1.jpg', 'diner1_TH.jpg', 'The dining table in the keeper\'s cabin.', 'James Swartz'),
(16, 'island1.jpg', 'island1_TH.jpg', 'A colorful summertime view of the lighthouse and its surrounding buildings.', 'Vicki Tomori'),
(17, 'island2.jpg', 'island2_TH.jpg', 'A full aerial view of the island and its serene waters.', 'James Swartz'),
(18, 'island3.jpg', 'island3_TH.jpg', 'Light shines off of the top of the lighthouse during a beautiful Lake Huron sunset.', 'Carol Walberg'),
(19, 'lighthouse.jpg', 'lighthouse_TH.jpg', 'A view of the lighthouse as our tour boat, Peerless II, sails by.', 'George Plant'),
(20, 'livingroom.jpg', 'livingroom_TH.jpg', 'Another view of the cabin\'s cozy, period-furnished interior.', 'Vicki Tomori'),
(21, 'peerless2.jpg', 'peerless2_TH.jpg', 'Our touring vessel, the Peerless II.', 'Gale Douglass'),
(22, 'peerless3.jpg', 'peerless3_TH.jpg', 'Our touring vessel, the Peerless II, docked.', 'Photographer Unknown'),
(23, 'quilts1.jpg', 'quilts1_TH.jpg', 'Period furnishings adorned with beautiful handmade quilts.', 'James Swartz'),
(24, 'quilts2.jpg', 'quilts2_TH.jpg', 'More period furnishings adorned with beautiful handmade quilts.', 'James Swartz'),
(25, 'rose.jpg', 'rose_TH.jpg', 'One of many beautiful flowers inhabiting the island\'s gardens.', 'Vicki Tomori'),
(26, 'tourboat.jpg', 'tourboat_TH.jpg', 'A crowded tour on a sunny day.', 'Wayne MacDonald');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
