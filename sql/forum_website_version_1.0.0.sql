-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 08:38 PM
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
-- Database: `forum_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tokens`
--

CREATE TABLE `access_tokens` (
  `access_tokens_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `token_access_role` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `access_tokens`
--

INSERT INTO `access_tokens` (`access_tokens_id`, `token`, `token_access_role`, `datetime`) VALUES
(1, '0a54ce6e4686e319', 'crud', '2023-12-06 12:17:44'),
(2, '6c3dddbe9e96d5db', 'crud', '2023-12-06 12:18:36'),
(3, '7997ddc47af76f78', 'crud', '2023-12-06 12:19:42'),
(4, '8a55eef469a40942', 'crud', '2023-12-06 12:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `datatime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `datatime`) VALUES
(1, 'UI/UX DESIGN', '2024-01-02 12:07:59'),
(2, 'SOFTWARE ENGINEERING', '2024-01-02 12:08:22'),
(3, 'FRONTEND DEVELOPER', '2024-01-02 12:08:43'),
(4, 'BACKEND DEVELOPER', '2024-01-02 12:08:55'),
(5, 'FULL STACK DEVELOPER', '2024-01-02 12:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `album_id` varchar(255) NOT NULL,
  `catagory_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_id` varchar(255) NOT NULL,
  `article_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `album_id`, `catagory_id`, `user_id`, `title`, `sub_title`, `description`, `image_id`, `article_datetime`) VALUES
(40, '1', '1', '1', '42', 'geged', 'kdmkfd\r\ndkfk', '41', '2024-01-03 14:27:01'),
(41, '3', '1', '2', 'Demystifying UI/UX Design: Crafting Digital Experiences for Success', 'The Intersection of User Interface and User Experience in Shaping Engaging Digital Realms', 'In todays digital age, where interactions are predominantly screen-based, the role of UI/UX design has emerged as a linchpin for creating immersive and user-centric experiences. \r\nUI (User Interface) and UX (User Experience) design are two integral components that work hand in hand to define the success and appeal of a digital product, be it an app, website, or software.\r\n\r\nUnderstanding the Dichotomy:\r\nUI focuses on the look, feel, and interactivity of the product, dealing with visual elements like buttons, icons, typography, color schemes, and overall aesthetics. It’s akin to the design of a car’s dashboard – the way information is displayed and how users interact with it.\r\n\r\nOn the other hand, UX zooms out to encompass the broader experience users have while navigating through the digital terrain. It involves understanding user behaviors, conducting research, creating user personas, wireframing, prototyping, and testing to ensure that the product not only looks good but is intuitive and enjoyable to use.\r\n\r\nThe Marriage of Functionality and Form:\r\nGreat UI/UX design isn’t just about making things pretty; it&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;#039;s about making them functional and purposeful. Think of a well-designed smartphone app – its UI showcases a sleek design with easy-to-navigate menus (UI), while the UX ensures a seamless flow, guiding users effortlessly through tasks while delivering a delightful experience.\r\n\r\nEmpathy as the Core:\r\nAt its heart, successful UI/UX design is rooted in empathy. Designers put themselves in the shoes of the end-users, understanding their needs, pain points, and preferences. By doing so, they craft solutions that resonate with the audience, driving engagement and loyalty.\r\n\r\nThe Iterative Journey:\r\nUI/UX design is an iterative process. It involves continuous refinement based on user feedback and evolving trends. Designers must adapt to changing technologies, user behaviors, and market demands to stay relevant and effective.\r\n\r\nThe Impact on Business:\r\nInvesting in stellar UI/UX design isn’t just about creating aesthetically pleasing products; it directly impacts the bottom line. A seamless, user-friendly interface coupled with an enjoyable user experience translates to increased user retention, higher conversion rates, and ultimately, a competitive edge in the market.\r\n\r\nConclusion:\r\nIn a world inundated with digital offerings, UI/UX design acts as the compass that guides users through the digital landscape. Its significance cannot be overstated – it’s the bridge that connects technology with human interaction, enriching lives by simplifying and enhancing digital experiences.\r\n\r\nAs technology continues to evolve, UI/UX design will remain a pivotal factor in shaping the way we interact with digital interfaces, reinforcing the notion that behind every successful digital product lies an exceptional user-centric design', '42', '2024-01-03 14:30:59'),
(49, '2', '2', '2', 'ti', 'jfk', 'fdkj', '50', '2024-01-07 01:30:26'),
(50, '2', '2', '1', 'Exploring the Boundless Realm of Frontend Development', 'Crafting User Experiences in the Digital Frontier', 'In todays digital age, where the virtual landscape reigns supreme, Frontend Development emerges as the gateway to captivating and user-centric digital experiences. The realm of Frontend Development encompasses the artistry and engineering prowess required to sculpt the visual and interactive facets of websites, applications, and digital platforms.\r\n\r\nThe Canvas of Creativity:\r\nFrontend Development is akin to an artist&amp;#039;s canvas, where design meets functionality. It&amp;#039;s the conduit through which aesthetic design elements blend seamlessly with the underlying code, defining how users interact with digital interfaces. From the arrangement of elements to the color palette, typography, and animations, Frontend Development is the harmonious convergence of artistry and technology.\r\n\r\nThe Responsive Tapestry:\r\nIn the ever-evolving digital ecosystem, responsiveness is paramount. Frontend Developers weave responsive designs, ensuring seamless user experiences across diverse devices and screen sizes. The fluidity of responsive design enables content to adapt and flourish, irrespective of the viewing medium, be it a desktop, tablet, or mobile device.\r\n\r\nThe Code Symphony:\r\nAt the core of Frontend Development lies a symphony of programming languages and frameworks. HTML, CSS, and JavaScript serve as the foundational pillars, while frameworks like React, Angular, and Vue.js provide the tools to craft dynamic and interactive user interfaces. The synergy between these languages and frameworks empowers developers to innovate and breathe life into digital visions.\r\n\r\nThe UX Journey:\r\nFrontend Development entwines with User Experience (UX), molding digital pathways that engage and captivate. It delves into understanding user behaviors, wireframing, prototyping, and testing interfaces. The marriage of Frontend Development with UX orchestrates experiences that resonate with users, fostering engagement and loyalty.\r\n\r\nEvolution and Adaptation:\r\nFrontend Development is a landscape in perpetual motion. It adapts to emerging technologies and trends, embracing modern methodologies like Progressive Web Apps (PWAs) and Single Page Applications (SPAs). The discipline thrives on constant learning, experimentation, and evolution to stay at the forefront of innovation.\r\n\r\nConclusion:\r\nIn the expansive realm of digital creativity, Frontend Development stands tall as the conduit between imagination and realization. Its evolution is intertwined with the evolution of digital experiences, shaping the way we interact with and perceive the digital world.\r\n\r\nFrontend Development is not merely about lines of code; it&amp;#039;s an expedition into the artistry of digital experiences, where innovation and creativity converge to redefine the boundaries of the digital frontier.', '51', '2024-01-07 01:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`, `datetime`) VALUES
(1, 'UI/UX DESIGN', '2024-01-02 00:14:08'),
(2, 'SOFTWARE ENGINEERING', '2024-01-02 00:14:34'),
(3, 'FRONTEND DEVELOPER', '2024-01-02 00:15:14'),
(4, 'BACKEND DEVELOPER', '2024-01-02 00:15:37'),
(5, 'FULL STACK DEVELOPER', '2024-01-02 00:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `album_id` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_type` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `album_id`, `image_name`, `image_type`, `datetime`) VALUES
(40, '1', '1873.jpg', 'image/jpeg', '2024-01-03 14:15:28'),
(41, '1', '5172658.jpg', 'image/jpeg', '2024-01-03 14:27:01'),
(42, '3', 'arnold-francisca-FBNxmwEVpAc-unsplash.jpg', 'image/jpeg', '2024-01-03 14:30:59'),
(50, '2', '', '', '2024-01-07 01:30:26'),
(51, '2', 'dawid-zawila--G3rw6Y02D0-unsplash.jpg', '', '2024-01-07 01:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_img_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `email_verification_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_img_name`, `password`, `email`, `otp`, `email_verification_status`, `datetime`) VALUES
(1, 'the main test', 'the main test_user_img.jpg', '$2y$10$/lEkKXGvlpY6jqtymTjYBeYUHTxmWAUH4gv8YUioXJunfggrBcHgO', 't@t.t', '2071', 'email_verified', '2024-01-03 00:22:40'),
(2, 'test', '', '$2y$10$/lEkKXGvlpY6jqtymTjYBeYUHTxmWAUH4gv8YUioXJunfggrBcHgO', 'test@test.test', '', 'email_verified', '2024-01-03 06:21:09'),
(3, 'New User', '', '$2y$10$/lEkKXGvlpY6jqtymTjYBeYUHTxmWAUH4gv8YUioXJunfggrBcHgO', 'n@n.n', '5474', '', '2024-01-06 19:45:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_tokens`
--
ALTER TABLE `access_tokens`
  ADD PRIMARY KEY (`access_tokens_id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_tokens`
--
ALTER TABLE `access_tokens`
  MODIFY `access_tokens_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
