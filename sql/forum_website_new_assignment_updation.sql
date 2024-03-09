-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 12:27 PM
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
(50, '2', '2', '1', 'Exploring the Boundless Realm of Frontend Development', 'Crafting User Experiences in the Digital Frontier', '&lt;p&gt;In today&amp;#39;s digital age,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;span class=&quot;marker&quot;&gt;where&lt;/span&gt; the virtual landscape reigns supreme, &lt;span class=&quot;marker&quot;&gt;&lt;strong&gt;&lt;em&gt;Frontend&lt;/em&gt; Development&lt;/strong&gt;&lt;/span&gt; emerges as the gateway to captivating and user-centric digital experiences.&lt;/p&gt;\r\n\r\n&lt;p&gt;The realm of Frontend Development encompasses the artistry and engineering prowess required to sculpt the visual and interactive facets of websites, applications, and digital platforms. The Canvas of Creativity:&lt;/p&gt;\r\n\r\n&lt;p&gt;Frontend Development is akin to an artist&amp;#39;s canvas, where design meets functionality. It&amp;#39;s the conduit through which aesthetic design elements blend seamlessly with the underlying code, defining how users interact with digital interfaces.&lt;/p&gt;\r\n\r\n&lt;p&gt;From the arrangement of elements to the color palette, typography, and animations, Frontend Development is the harmonious convergence of artistry and technology. The Responsive Tapestry: In the ever-evolving digital ecosystem, responsiveness is paramount.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://localhost:8000/assets/uploads/text_img/the main test/files/arnold-francisca-FBNxmwEVpAc-unsplash.jpg&quot; style=&quot;height:160px; margin:25px; width:240px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Frontend Developers weave responsive designs, ensuring seamless user experiences across diverse devices and screen sizes. The fluidity of responsive design enables content to adapt and flourish, irrespective of the viewing medium, be it a desktop, tablet, or mobile device.&lt;/p&gt;\r\n\r\n&lt;p&gt;The Code Symphony: At the core of Frontend Development lies a symphony of programming languages and frameworks. HTML, CSS, and JavaScript serve as the foundational pillars, while frameworks like&lt;span class=&quot;marker&quot;&gt; React, Angular, and Vue.js&lt;/span&gt; provide the tools to craft dynamic and interactive user interfaces. The synergy between these languages and frameworks empowers developers to innovate and breathe life into &lt;em&gt;digital&lt;/em&gt; visions. The UX Journey: Frontend Development entwines with User Experience (UX), molding digital pathways that engage and captivate. It delves into understanding user behaviors, wireframing, prototyping, and testing interfaces. The marriage of Frontend Development with UX orchestrates experiences that resonate with users, fostering engagement and loyalty. Evolution and Adaptation: Frontend Development is a landscape in perpetual motion. It adapts to emerging technologies and trends, embracing modern methodologies like Progressive Web Apps (PWAs) and Single Page Applications (SPAs). The discipline thrives on constant learning, experimentation, and evolution to stay at the forefront of innovation. Conclusion: In the expansive realm of digital creativity, Frontend Development stands tall as the conduit between imagination and realization. Its evolution is intertwined with the evolution of digital experiences, shaping the way we interact with and perceive the digital world. Frontend Development is not merely about lines of code; it&amp;#39;s an expedition into the artistry of digital experiences, where innovation and creativity converge to redefine the boundaries of the digital frontier.&lt;/p&gt;\r\n', '51', '2024-01-07 01:37:00'),
(51, '1', '1', '1', 'd', 'd', 'fd', '52', '2024-01-12 23:39:24'),
(52, '1', '1', '1', 'd', 'd', '&lt;p&gt;d&lt;/p&gt;', '53', '2024-01-12 23:54:07'),
(53, '1', '1', '1', 'd', 't', '&lt;p&gt;The&lt;strong&gt; test&lt;/strong&gt;&lt;/p&gt;', '54', '2024-01-12 23:54:54'),
(54, '1', '1', '1', 't', 't', '&lt;p&gt;text&lt;/p&gt;\n\n&lt;p&gt;with&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;new&lt;/p&gt;\n\n&lt;p&gt;lines &lt;strong&gt;hey &lt;/strong&gt;&lt;em&gt;th are you become ,,,, &lt;strong&gt;surprized&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://localhost:8000/assets/uploads/text_img/the main test/files/arnold-francisca-FBNxmwEVpAc-unsplash.jpg&quot; style=&quot;float:left; height:160px; margin:50px 250px; width:240px&quot; /&gt;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&lt;em&gt;&lt;strong&gt;the new&amp;nbsp;&lt;/strong&gt;&lt;/em&gt;&lt;strong&gt;text&amp;nbsp;&lt;/strong&gt;line&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;em&gt;for&amp;nbsp;&lt;strong&gt;checking&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\n', '55', '2024-01-13 00:28:33'),
(55, '1', '1', '1', 'hi', 'kd', '', '56', '2024-01-13 23:00:56'),
(56, '1', '1', '1', 'f', 'd', '', '57', '2024-01-13 23:03:07'),
(57, '1', '1', '1', 'The not blank', 'The article blank', '&lt;p&gt;The o&lt;em&gt;thers&amp;nbsp;&lt;span class=&quot;marker&quot;&gt;blog&lt;/span&gt;&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '58', '2024-01-13 23:10:19'),
(58, '1', '1', '1', 'The img', 'the', '&lt;p&gt;theijtek&lt;/p&gt;\r\n', '59', '2024-01-14 00:19:56'),
(59, '1', '1', '1', 'second tryy', 'thjfw', '&lt;p&gt;thej&lt;/p&gt;\r\n', '60', '2024-01-14 00:23:29'),
(60, '1', '1', '1', 'the ag chek', 'fjkfj', '&lt;p&gt;dfkfkdj&lt;/p&gt;\r\n', '61', '2024-01-14 00:28:12'),
(61, '1', '1', '1', 'jnnj', 'bjb', '&lt;p&gt;nknk&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://localhost:8000/assets/uploads/text_img/the main test/files/arnold-francisca-FBNxmwEVpAc-unsplash.jpg&quot; style=&quot;height:160px; margin-bottom:20px; margin-top:20px; width:240px&quot; /&gt;&lt;/p&gt;\r\n', '62', '2024-01-14 00:31:59'),
(62, '1', '1', '1', 'test', 'the second', '&lt;p&gt;the new second test&lt;/p&gt;\r\n', '70', '2024-03-09 17:22:56');

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
(51, '2', 'dawid-zawila--G3rw6Y02D0-unsplash.jpg', '', '2024-01-07 01:37:00'),
(52, '1', '', '', '2024-01-12 23:39:24'),
(53, '1', '', '', '2024-01-12 23:54:07'),
(54, '1', '', '', '2024-01-12 23:54:54'),
(55, '1', '', '', '2024-01-13 00:28:33'),
(56, '1', '', '', '2024-01-13 23:00:56'),
(57, '1', '', '', '2024-01-13 23:03:07'),
(58, '1', 'arnold-francisca-FBNxmwEVpAc-unsplash.jpg', 'image/jpeg', '2024-01-13 23:10:19'),
(59, '1', 'the main test_11.jpg', 'image/jpeg', '2024-01-14 00:19:56'),
(60, '1', 'the main test_12.jpg', 'image/jpeg', '2024-01-14 00:23:29'),
(61, '1', 'the_main_test_13.jpg', 'image/jpeg', '2024-01-14 00:28:12'),
(62, '1', 'the_main_test_15.jpg', 'image/jpeg', '2024-01-14 00:31:59'),
(63, '2', 'the_main_test_1.jpg', 'image/jpeg', '2024-02-13 23:12:28'),
(64, '2', 'the_main_test_1.jpg', 'image/jpeg', '2024-02-13 23:18:43'),
(65, '2', 'the_main_test_1.jpg', 'image/jpeg', '2024-02-13 23:23:48'),
(66, '2', 'the_main_test_1.jpg', 'image/jpeg', '2024-02-13 23:24:26'),
(67, '2', 'project_c_the_main_test_2.jpg', 'image/jpeg', '2024-02-13 23:26:45'),
(68, '1', 'project_d_the_main_test_3.jpg', 'image/jpeg', '2024-02-15 23:29:34'),
(69, '2', 'project_The new project_the_main_test_4.jpg', 'image/jpeg', '2024-02-15 23:52:00'),
(70, '1', 'the_main_test_15.jpg', 'image/jpeg', '2024-03-09 17:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_sub_title` varchar(255) NOT NULL,
  `catagory_id` varchar(255) NOT NULL,
  `album_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `project_status` varchar(255) NOT NULL,
  `image_id` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_title`, `project_sub_title`, `catagory_id`, `album_id`, `user_id`, `project_description`, `project_status`, `image_id`, `datetime`) VALUES
(1, 'test project', 'The testing project', '2', '2', '1', '&lt;p&gt;f&lt;/p&gt;\r\n', 'Project Declared and Created into the Projects Hub', '67', '2024-02-13 23:04:41'),
(2, 'fd', 'd', '2', '2', '1', '&lt;p&gt;d&lt;/p&gt;\r\n', '', '66', '2024-02-13 23:24:26'),
(3, 'c', 't', '2', '2', '1', '&lt;p&gt;d&lt;/p&gt;\r\n', '', '67', '2024-02-13 23:26:45'),
(4, 'd', 'd', '1', '1', '1', '&lt;p&gt;d&lt;/p&gt;\r\n', '', '68', '2024-02-15 23:29:34'),
(5, 'The new project', 'The testing project', '2', '2', '1', '&lt;p&gt;This is the new testing project.&lt;/p&gt;\r\n', 'Project Declared and Created into the Projects Hub', '69', '2024-02-15 23:52:00');

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
  `user_role` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `email_verification_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_img_name`, `password`, `email`, `user_role`, `otp`, `email_verification_status`, `datetime`) VALUES
(1, 'the main test', 'the main test_user_img.jpg', '$2y$10$/lEkKXGvlpY6jqtymTjYBeYUHTxmWAUH4gv8YUioXJunfggrBcHgO', 't@t.t', 'chief_programmer', '2071', 'email_verified', '2024-01-03 00:22:40'),
(2, 'test', '', '$2y$10$/lEkKXGvlpY6jqtymTjYBeYUHTxmWAUH4gv8YUioXJunfggrBcHgO', 'test@test.test', 'admin', '', 'email_verified', '2024-01-03 06:21:09'),
(3, 'New User', '', '$2y$10$/lEkKXGvlpY6jqtymTjYBeYUHTxmWAUH4gv8YUioXJunfggrBcHgO', 'n@n.n', 'designer', '5474', '', '2024-01-06 19:45:33');

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

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
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
