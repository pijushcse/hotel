
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

drop database if exists reservation; 
create DATABASE reservation; 

use reservation;

CREATE TABLE `bed_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed_type`
--

INSERT INTO `bed_type` (`id`, `type`) VALUES
(1, 'King'),
(2, 'Queen'),
(3, 'Double'),
(4, 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `id` int(11) NOT NULL,
  `text` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`id`, `text`) VALUES
(7, 'adipiscing'),
(9, 'Maecenas'),
(11, 'libero'),
(12, 'sapien'),
(13, 'Vestibulum'),
(14, 'posuere'),
(15, 'tortor'),
(18, 'mattis'),
(19, 'libero'),
(20, 'venenatis'),
(23, 'semper'),
(24, 'laoreet'),
(27, 'vestibulum'),
(35, 'auctor'),
(36, 'pharetra'),
(39, 'suscipit'),
(43, 'sapien'),
(48, 'aliquam'),
(52, 'consequat'),
(54, 'dictum'),
(56, 'Nullam'),
(58, 'cursus'),
(59, 'euismod'),
(60, 'Aliquam'),
(65, 'tempus'),
(69, 'imperdiet'),
(70, 'hendrerit'),
(71, 'Maecenas'),
(72, 'volutpat'),
(76, 'commodo'),
(77, 'dictum'),
(83, 'dapibus'),
(84, 'luctus'),
(85, 'fermentum'),
(88, 'Vestibulum'),
(90, 'dapibus'),
(92, 'Praesent'),
(95, 'vehicula'),
(97, 'lectus'),
(99, 'egestas'),
(101, 'Quisque'),
(105, 'libero'),
(106, 'suscipit'),
(107, 'volutpat'),
(109, 'lobortis'),
(110, 'tortor'),
(113, 'egestas'),
(115, 'tincidunt'),
(121, 'mollis'),
(122, 'malesuada'),
(125, 'iaculis'),
(126, 'sapien'),
(128, 'hendrerit'),
(137, 'Quisque'),
(138, 'finibus'),
(141, 'mauris'),
(142, 'tincidunt'),
(143, 'congue'),
(144, 'Nullam'),
(147, 'placerat'),
(148, 'pharetra'),
(151, 'convallis'),
(153, 'Mauris'),
(155, 'convallis'),
(156, 'libero'),
(162, 'ultrices'),
(165, 'sodales'),
(166, 'suscipit'),
(172, 'porttitor'),
(178, 'habitant'),
(180, 'tristique'),
(181, 'senectus'),
(185, 'malesuada'),
(188, 'turpis'),
(189, 'egestas'),
(191, 'fermentum'),
(193, 'libero'),
(195, 'tincidunt'),
(196, 'tellus'),
(197, 'aliquet'),
(199, 'Curabitur'),
(204, 'auctor'),
(206, 'maximus'),
(209, 'varius'),
(213, 'varius'),
(215, 'lacinia'),
(217, 'molestie'),
(220, 'rutrum'),
(222, 'Aenean'),
(224, 'commodo'),
(227, 'dapibus'),
(229, 'Curabitur'),
(234, 'auctor'),
(235, 'tincidunt'),
(241, 'iaculis'),
(242, 'interdum'),
(243, 'pretium'),
(245, 'lectus'),
(248, 'tristique'),
(250, 'tortor'),
(252, 'venenatis'),
(254, 'rhoncus'),
(257, 'Integer'),
(262, 'tempor'),
(263, 'viverra'),
(264, 'Vivamus'),
(265, 'laoreet'),
(266, 'rutrum'),
(269, 'finibus'),
(271, 'habitant'),
(273, 'tristique'),
(274, 'senectus'),
(278, 'malesuada'),
(281, 'turpis'),
(282, 'egestas'),
(284, 'cursus'),
(287, 'posuere'),
(288, 'elementum'),
(291, 'ornare'),
(294, 'mollis'),
(301, 'libero'),
(305, 'cursus'),
(306, 'libero'),
(308, 'tristique'),
(314, 'pulvinar'),
(316, 'Mauris'),
(317, 'pretium'),
(321, 'feugiat'),
(323, 'eleifend'),
(325, 'fringilla'),
(327, 'molestie'),
(328, 'tincidunt'),
(329, 'sapien'),
(332, 'euismod'),
(334, 'vestibulum'),
(338, 'placerat'),
(341, 'porttitor'),
(345, 'tincidunt'),
(346, 'lacinia'),
(349, 'sodales'),
(352, 'Aliquam'),
(353, 'placerat'),
(354, 'pulvinar'),
(357, 'tristique'),
(359, 'placerat'),
(361, 'Vestibulum'),
(363, 'lobortis'),
(368, 'semper'),
(372, 'mattis'),
(373, 'elementum'),
(376, 'bibendum'),
(378, 'maximus'),
(384, 'finibus'),
(385, 'posuere'),
(388, 'tortor'),
(389, 'maximus'),
(391, 'rutrum'),
(397, 'Vestibulum'),
(400, 'laoreet'),
(402, 'libero'),
(403, 'aliquet'),
(404, 'lacinia'),
(405, 'tincidunt'),
(407, 'Integer'),
(409, 'fermentum'),
(416, 'potenti'),
(418, 'vehicula'),
(421, 'hendrerit'),
(422, 'eleifend'),
(425, 'fringilla'),
(426, 'lectus'),
(428, 'congue'),
(430, 'lectus'),
(435, 'habitasse'),
(436, 'platea'),
(437, 'dictumst'),
(438, 'Vivamus'),
(442, 'mauris'),
(443, 'consequat'),
(444, 'eleifend'),
(453, 'congue'),
(455, 'dapibus'),
(458, 'Maecenas'),
(460, 'iaculis'),
(461, 'libero'),
(463, 'auctor'),
(464, 'turpis'),
(465, 'Nullam'),
(466, 'pharetra'),
(467, 'fringilla'),
(469, 'hendrerit'),
(470, 'porttitor'),
(472, 'luctus'),
(474, 'viverra'),
(475, 'consequat'),
(476, 'lacinia'),
(479, 'ultrices'),
(481, 'congue'),
(482, 'vehicula'),
(484, 'libero'),
(487, 'Maecenas'),
(489, 'facilisis'),
(492, 'fringilla'),
(493, 'libero'),
(494, 'Aliquam'),
(495, 'bibendum'),
(496, 'libero'),
(499, 'rhoncus'),
(501, 'pulvinar'),
(503, 'Maecenas'),
(504, 'fringilla'),
(508, 'dignissim'),
(511, 'egestas'),
(515, 'lobortis'),
(520, 'Maecenas'),
(521, 'blandit'),
(522, 'egestas'),
(523, 'sodales'),
(529, 'suscipit'),
(530, 'laoreet'),
(531, 'convallis'),
(533, 'cursus'),
(535, 'accumsan'),
(537, 'tortor'),
(539, 'fermentum'),
(540, 'Vivamus'),
(541, 'rutrum'),
(542, 'mattis'),
(545, 'tristique'),
(548, 'tempus'),
(549, 'Nullam'),
(550, 'laoreet'),
(551, 'dictum'),
(552, 'luctus'),
(553, 'Aenean'),
(554, 'vulputate'),
(559, 'vulputate'),
(561, 'interdum'),
(563, 'suscipit'),
(564, 'Nullam'),
(565, 'sagittis'),
(566, 'turpis'),
(567, 'convallis'),
(568, 'sapien'),
(569, 'efficitur'),
(570, 'venenatis'),
(575, 'Aliquam'),
(577, 'volutpat'),
(579, 'convallis'),
(583, 'tempor'),
(585, 'efficitur'),
(587, 'Quisque'),
(588, 'lectus'),
(590, 'maximus'),
(592, 'cursus'),
(594, 'semper'),
(597, 'Mauris'),
(598, 'accumsan'),
(600, 'tempus'),
(602, 'semper'),
(606, 'venenatis'),
(607, 'tortor'),
(608, 'congue'),
(610, 'Curabitur'),
(613, 'vehicula'),
(614, 'lobortis'),
(617, 'aliquet'),
(621, 'porttitor'),
(622, 'ligula'),
(623, 'Quisque'),
(624, 'ultricies'),
(628, 'lobortis'),
(630, 'tempus'),
(633, 'dictum'),
(634, 'tincidunt'),
(635, 'sodales'),
(637, 'eleifend'),
(638, 'tempus'),
(641, 'tristique'),
(643, 'varius'),
(646, 'volutpat'),
(647, 'euismod'),
(648, 'sodales'),
(650, 'aptent'),
(651, 'taciti'),
(652, 'sociosqu'),
(654, 'litora'),
(655, 'torquent'),
(657, 'conubia'),
(658, 'nostra'),
(660, 'inceptos'),
(661, 'himenaeos'),
(666, 'pharetra'),
(667, 'cursus'),
(668, 'Integer'),
(674, 'egestas'),
(676, 'euismod'),
(679, 'dapibus'),
(683, 'vestibulum'),
(684, 'ligula'),
(685, 'semper'),
(687, 'Nullam'),
(689, 'mauris'),
(690, 'feugiat'),
(691, 'lobortis'),
(694, 'tempor'),
(697, 'facilisis'),
(698, 'ornare'),
(699, 'varius'),
(703, 'vulputate'),
(706, 'elementum'),
(711, 'turpis'),
(715, 'bibendum'),
(717, 'Aenean'),
(720, 'sodales'),
(721, 'viverra'),
(724, 'rhoncus'),
(729, 'vehicula'),
(733, 'posuere'),
(735, 'sapien'),
(737, 'maximus'),
(741, 'commodo'),
(743, 'vestibulum'),
(747, 'vestibulum'),
(748, 'iaculis'),
(751, 'laoreet'),
(752, 'Phasellus'),
(753, 'dapibus'),
(755, 'turpis'),
(757, 'volutpat'),
(759, 'vehicula'),
(762, 'mattis'),
(766, 'lacinia'),
(768, 'luctus'),
(771, 'hendrerit'),
(772, 'fermentum'),
(773, 'porttitor'),
(776, 'feugiat'),
(778, 'Integer'),
(779, 'elementum'),
(782, 'facilisis'),
(783, 'mollis'),
(786, 'fermentum'),
(787, 'sapien'),
(789, 'tempor'),
(790, 'tortor'),
(792, 'efficitur'),
(796, 'egestas'),
(798, 'sagittis'),
(800, 'Mauris'),
(801, 'mattis'),
(803, 'rhoncus'),
(806, 'dictum'),
(807, 'sapien'),
(809, 'feugiat'),
(816, 'volutpat'),
(817, 'placerat'),
(821, 'Mauris'),
(824, 'laoreet'),
(829, 'iaculis'),
(832, 'efficitur'),
(833, 'fringilla'),
(834, 'elementum'),
(836, 'interdum'),
(840, 'aliquam'),
(847, 'lacinia'),
(848, 'sagittis'),
(851, 'tortor'),
(852, 'eleifend'),
(853, 'malesuada'),
(854, 'ligula'),
(860, 'aptent'),
(861, 'taciti'),
(862, 'sociosqu'),
(864, 'litora'),
(865, 'torquent'),
(867, 'conubia'),
(868, 'nostra'),
(870, 'inceptos'),
(871, 'himenaeos'),
(874, 'lectus'),
(878, 'mattis'),
(881, 'volutpat'),
(884, 'commodo'),
(887, 'luctus'),
(888, 'pretium'),
(889, 'libero'),
(890, 'turpis'),
(894, 'viverra'),
(901, 'tellus'),
(902, 'sagittis'),
(903, 'pretium'),
(906, 'bibendum'),
(911, 'tincidunt'),
(914, 'efficitur'),
(917, 'mauris'),
(919, 'placerat'),
(920, 'emoclew');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'United States'),
(2, 'Canada'),
(3, 'Mexico'),
(4, 'Spain'),
(5, 'Cuba');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `address`) VALUES
(1, 'Atlanta,Georgia'),
(2, 'Bultimore,Maryland'),
(3, 'Cupertino,California'),
(4, 'Dallas,Texas'),
(5, 'EnglandWood,Colorado'),
(6, 'Fair Field,Iowa'),
(7, 'Greensboro,NC'),
(8, 'Herrisburg,PA'),
(9, 'Raleigh,NC'),
(10, 'Burlington,NC');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_confirmation`
--

CREATE TABLE `reservation_confirmation` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `room_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_confirmation`
--

INSERT INTO `reservation_confirmation` (`id`, `booking_id`, `customer_name`, `customer_phone`, `customer_email`, `check_in_date`, `check_out_date`, `booking_date`, `room_fk`) VALUES
(16, '524B', 'PIJUSH DEBNATH', '5618085141', 'PIJUSH.DEBNATH@LIVE.COM', '2018-03-06', '2018-03-07', '2018-03-06 18:55:27', 10),
(17, '38F2', 'PIJUSH DEBNATH', '5618085141', 'PIJUSH.DEBNATH@LIVE.COM', '2018-03-06', '2018-03-07', '2018-03-06 18:55:57', 10),
(18, 'C300', 'PIJUSH DEBNATH', '5618085141', 'PIJUSH.DEBNATH@LIVE.COM', '2018-03-07', '2018-03-08', '2018-03-06 19:16:53', 21); 

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_desc` varchar(1000) NOT NULL,
  `non_smoking` varchar(1) NOT NULL DEFAULT '',
  `rate` int(11) NOT NULL,
  `room_type_fk` int(11) DEFAULT NULL,
  `bed_type_fk` int(11) DEFAULT NULL,
  `address_fk` int(11) NOT NULL,
  `total_room` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_desc`, `non_smoking`, `rate`, `room_type_fk`, `bed_type_fk`, `address_fk`, `total_room`) VALUES
(10, 'AC/ Microwave', 'N', 100, 1, 3, 1, 10),
(11, 'AC. Microwave/Refrigerator.Front view ', 'Y', 100, 1, 1, 4, 10),
(12, 'Non-AC. Microwave/Refrigerator.Front view ', 'N', 95, 3, 2, 9, 10),
(13, 'AC. Microwave/Refrigerator.Rear view ', 'Y', 90, 1, 1, 2, 10),
(14, 'AC. Microwave/Refrigerator.Rear view ', 'Y', 80, 4, 2, 10, 10),
(15, 'AC. Microwave/Refrigerator.Front view ', 'N', 80, 2, 3, 6, 10),
(16, 'AC. Microwave/Refrigerator.Rear view ', 'N', 70, 3, 4, 5, 10),
(17, 'AC. Microwave/Refrigerator.Front view ', 'Y', 100, 3, 3, 3, 10),
(18, 'AC. Microwave/Refrigerator.Rear view ', 'Y', 75, 4, 1, 6, 10),
(19, 'Non-AC. Microwave/Refrigerator.Front view ', 'N', 95, 1, 2, 10, 10),
(20, 'Non-AC. Microwave/Refrigerator.Front view ', 'Y', 90, 1, 2, 10, 10),
(21, 'AC. Microwave/Refrigerator.Rear view ', 'N', 70, 1, 4, 1, 10),
(22, 'Non-AC. Microwave/Refrigerator.Front view ', 'Y', 80, 1, 2, 8, 10),
(23, 'AC. Microwave/Refrigerator.Rear view', 'Y', 90, 1, 3, 9, 10),
(24, 'Non-AC.Front view', 'Y', 70, 2, 3, 4, 10),
(25, 'AC. Microwave/Refrigerator.Rear view', 'N', 70, 3, 1, 3, 10),
(26, 'AC. Microwave/Refrigerator.Front view ', 'Y', 100, 1, 1, 4, 10),
(27, 'Non-AC. Microwave/Refrigerator.Front view ', 'N', 95, 3, 2, 9, 10),
(28, 'AC. Microwave/Refrigerator.Rear view ', 'Y', 90, 1, 1, 2, 10),
(29, 'AC. Microwave/Refrigerator.Rear view ', 'Y', 80, 4, 2, 10, 10),
(30, 'AC. Microwave/Refrigerator.Front view ', 'N', 80, 2, 3, 6, 10),
(31, 'AC. Microwave/Refrigerator.Rear view ', 'N', 70, 3, 4, 5, 10),
(32, 'AC. Microwave/Refrigerator.Front view ', 'Y', 100, 3, 3, 3, 10),
(33, 'AC. Microwave/Refrigerator.Rear view ', 'Y', 75, 4, 1, 6, 10),
(34, 'Non-AC. Microwave/Refrigerator.Front view ', 'N', 95, 1, 2, 10, 10),
(35, 'Non-AC. Microwave/Refrigerator.Front view ', 'Y', 90, 1, 2, 10, 10),
(36, 'AC. Microwave/Refrigerator.Rear view ', 'N', 70, 1, 4, 1, 10),
(37, 'Non-AC. Microwave/Refrigerator.Front view ', 'Y', 80, 1, 2, 8, 10),
(38, 'AC. Microwave/Refrigerator.Rear view', 'Y', 90, 1, 3, 9, 10),
(39, 'Non-AC.Front view', 'Y', 70, 2, 3, 4, 10),
(40, 'AC. Microwave/Refrigerator.Rear view', 'N', 70, 3, 1, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `type`) VALUES
(1, 'Economy'),
(2, 'Deluxe'),
(3, 'Business'),
(4, 'First class');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bed_type`
--
ALTER TABLE `bed_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_confirmation`
--
ALTER TABLE `reservation_confirmation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rm_fk` (`room_fk`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rt_id` (`room_type_fk`),
  ADD KEY `fk_bt_id` (`bed_type_fk`),
  ADD KEY `add_fk` (`address_fk`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reservation_confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
ALTER TABLE `reservation_confirmation`
  ADD CONSTRAINT `rm_fk` FOREIGN KEY (`room_fk`) REFERENCES `room` (`id`);
--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `add_fk` FOREIGN KEY (`address_fk`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `fk_bt_id` FOREIGN KEY (`bed_type_fk`) REFERENCES `bed_type` (`id`),
  ADD CONSTRAINT `fk_rt_id` FOREIGN KEY (`room_type_fk`) REFERENCES `room_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
