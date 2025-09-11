-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 07:25 AM
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
-- Database: `pracfy`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `user_id`, `title`, `subtitle`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'About Us', NULL, 'http://localhost:8000/uploads/1752645985_about.jpg', '<p style=\"box-sizing: inherit; margin-top: 1rem; color: rgb(84, 86, 90); font-family: Roboto, sans-serif; font-size: 20px;\">An About Us page can go by many names (e.g., Our Mission, Our Story, About [Brand Name], etc.). But no matter what you call it, it must resonate with your target consumers.&nbsp;<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">The About Us page for your healthcare business must achieve three things:</p><ol class=\"wp-block-list\" style=\"padding-left: 1rem; color: rgb(84, 86, 90); font-family: Roboto, sans-serif; font-size: 20px;\"><li style=\"box-sizing: inherit; margin-bottom: 0.5rem;\">Clearly articulate who you are and why you do the work that you do<br style=\"box-sizing: inherit;\">(e.g., your brand story, mission, vision, and values)</li><li style=\"box-sizing: inherit; margin-bottom: 0.5rem;\">Explain how you meet the needs of your clients</li><li style=\"box-sizing: inherit; margin-bottom: 0.5rem;\">Show consumers why you are the best choice for them<ol class=\"wp-block-list\" style=\"padding-left: 1rem;\"><li style=\"box-sizing: inherit; margin-bottom: 0.5rem;\">How you align with their values</li><li style=\"box-sizing: inherit; margin-bottom: 0.5rem;\">How do you plan to serve their needs</li><li style=\"box-sizing: inherit; margin-bottom: 0.5rem;\">Positive results (e.g., testimonials, reviews, patient stories) from past and current clients</li></ol></li></ol>', '2025-07-17 10:47:23', '2025-07-18 00:09:10'),
(2, 3, 'How to Write an About Us Page for a Healthcare Business (With Examples)', NULL, 'http://localhost:8000/uploads/1752842558_about-bg.jpg', 'Most people decide on who to trust, who to buy from, and who to listen to based on a simple metric of believability.<p></p><p style=\"box-sizing: inherit; margin-top: 1rem; color: rgb(84, 86, 90); font-family: Roboto, sans-serif; font-size: 20px;\">Today, I will cover how your business can create a robust About Us page experience that helps establish credibility and trust in the minds of buyers.</p><p style=\"box-sizing: inherit; margin-top: 1rem; color: rgb(84, 86, 90); font-family: Roboto, sans-serif; font-size: 20px;\">Why? Because it directly impacts your conversion rate and company success.</p>', '2025-07-17 11:13:20', '2025-07-18 07:55:41'),
(3, 4, 'About Us', 'Hectolab Medical and Health Ut wisi enim ad minim veniam, wisi nibh tristique risus. quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis nisl ut aliquip erat volutpat', 'http://localhost:8000/uploads/1753280039_about-bg (1).jpg', '<p class=\"line-h-3 mb-4\" style=\"line-height: 1.7; color: rgb(86, 88, 87); font-family: \" fira=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;\"=\"\">Hectolab have facility to produce adipisicing elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi vero minima impedit aliquam tempor incididunt ut labore et dolore.</p>', '2025-07-22 10:23:00', '2025-07-23 08:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `city`, `state`, `pincode`, `created_at`, `updated_at`) VALUES
(2, 3, 'Bholaram Square', 'Indore', 'Madhya Pradesh', '456789', '2025-07-17 12:36:27', '2025-07-17 12:36:27'),
(3, 3, '465, Scheme No 171', 'Indore', 'Madhya Pradesh', '456789', '2025-07-17 12:37:05', '2025-07-17 12:37:05'),
(4, 1, 'Bholaram Square', 'Indore', 'Madhya Pradesh', '456789', '2025-07-23 10:09:42', '2025-07-23 04:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `user_id`, `title`, `subtitle`, `link`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Contact with Pritesh Ghoghare', 'Best Medical Business Template', '#', 'http://localhost:8000/uploads/banner/1752648532_image-1.jpg', '<ul class=\"slider-features list-unstyled mt-4\" style=\"color: rgb(68, 68, 68); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><li style=\"margin-bottom: 10px; font-size: 1rem;\">✔ Latest Advancements</li><li style=\"margin-bottom: 10px; font-size: 1rem;\">✔ Professional Healthcare</li><li style=\"margin-bottom: 10px; font-size: 1rem;\">✔ Critical &amp; Palliative Care</li><li style=\"margin-bottom: 10px; font-size: 1rem;\">✔ State of the Art Research</li></ul>', '2025-07-17 13:05:47', '2025-07-25 01:50:39'),
(3, 1, 'Comprehensive Family Healthcare', 'Caring for All Ages', NULL, 'http://localhost:8000/uploads/banner/1752666810_mid-adult-father-holding-his-small-son-communicating-with-female-doctor-who-is-taking-notes-clipboard.jpg', '<p>Our family clinic provides personalized care for children, adults, and seniors with compassion and expertise.</p>', '2025-07-17 13:05:47', '2025-07-16 06:23:30'),
(4, 1, '24/7 Emergency Clinic Services', 'Always Ready to Help', '#', 'http://localhost:8000/uploads/banner/1752666878_young-medical-expert-reviewing-x-ray-test-findings-medical-office.jpg', '<p>Our emergency care unit is equipped with advanced medical technology to handle urgent health situations any time, any day.</p>', '2025-07-17 13:05:47', '2025-07-16 06:24:38'),
(5, 3, NULL, NULL, NULL, 'http://localhost:8000/uploads/banner/1752750557_istockphoto-1839081024-612x612.jpg', NULL, '2025-07-17 13:05:47', '2025-07-17 13:05:47'),
(6, 3, NULL, NULL, NULL, 'http://localhost:8000/uploads/banner/1752750592_istockphoto-1475065175-612x612.jpg', NULL, '2025-07-17 13:05:47', '2025-07-17 13:05:47'),
(7, 3, NULL, NULL, NULL, 'http://localhost:8000/uploads/banner/1752750601_premium_photo-1682130157004-057c137d96d5.jpg', NULL, '2025-07-17 13:05:47', '2025-07-17 13:05:47'),
(8, 4, 'Hectolab Provide Best Solution', 'Medical Center', NULL, 'http://localhost:8000/uploads/banner/1753181882_01.jpg', '<div>We try to make maximum use of all our experience, accumulated potential,</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; knowledge of modern medicine.</div>', '2025-07-22 10:58:02', '2025-07-22 08:09:43'),
(9, 4, 'What Makes Us Different Hectolab', 'Medical Center', NULL, 'http://localhost:8000/uploads/banner/1753182048_01.jpg', '<p>We try to make maximum use of all our experience, accumulated potential, knowledge of modern medicine.</p>', '2025-07-22 11:00:48', '2025-07-22 08:09:52'),
(10, 4, 'We Will Provide Best Hectolab', 'Medical Center', NULL, 'http://localhost:8000/uploads/banner/1753182848_01 (1).jpg', '<p>We try to make maximum use of all our experience, accumulated potential, knowledge of modern medicine.</p>', '2025-07-22 11:02:59', '2025-07-22 08:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `userid`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'lorem ipsum', 'http://localhost:8000/uploads/blogs/1752318721_photo-1471899236350-e3016bf1e69e.jpg', NULL, '2025-07-12 13:32:34', '2025-07-23 04:55:12'),
(3, 1, '10 Health Tips for a Better Life', 'http://localhost:8000/uploads/blogs/images.jpg', 'Maintaining a healthy lifestyle doesn\'t have to be complicated. Eat balanced meals, stay hydrated, exercise regularly, and get enough sleep. These basic tips can go a long way in improving your overall well-being.', '2025-07-16 08:49:57', '2025-07-16 08:50:05'),
(4, 1, 'Saves Time and Effort', 'http://localhost:8000/uploads/blogs/images (1).jpg', '<p><span style=\"color: rgb(51, 71, 91); font-family: -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">Creating content from scratch, especially when working on a new project, can be incredibly time-consuming. Dummy content generators allow you to bypass the lengthy process of manually writing paragraphs or posts. Instead, you can instantly generate filler text to populate your site, giving you the space to focus on design and structure. This is particularly helpful during the initial stages of a project, where the focus is on layout, navigation, and aesthetics rather than content creation.</span></p>', '2025-07-17 06:02:33', '2025-07-17 06:02:33'),
(5, 1, 'Enhances Productivity', 'http://localhost:8000/uploads/blogs/Hair-solution-consultation-1024x682.png', '<p><span style=\"color: rgb(51, 71, 91); font-family: -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px;\">For web developers and designers, dummy content is essential for maintaining a smooth workflow. With filler text and placeholders automatically generated, you can quickly prototype and build out web pages or blog templates without needing to wait for content to be created. This helps speed up the development process and allows teams to stay on track with project timelines. It also makes collaboration easier, as stakeholders can visualize the final product with realistic content in place.</span></p>', '2025-07-17 06:03:02', '2025-07-17 06:03:02'),
(6, 3, 'Dr. John Doe', 'http://localhost:8000/uploads/blogs/tutor-8.jpg', 'Maintaining a healthy lifestyle doesn\'t have to be complicated. Eat balanced meals, stay hydrated, exercise regularly, and get enough sleep. These basic tips can go a long way in improving your overall well-being.', '2025-07-17 13:15:40', '2025-07-17 07:48:56'),
(7, 4, 'Our Patients’ Healthy Researches is Our Priority', 'http://localhost:8000/uploads/blogs/01 (3).jpg', '<p><span style=\"color: rgb(86, 88, 87); font-family: &quot;Fira Sans&quot;, sans-serif; font-size: 15px;\">Cras ultricies ligula sed magna dictum porta, Sed ut perspiciatis unde omnis iste natus error sit voluptat</span></p>', '2025-07-22 13:01:31', '2025-07-22 13:01:31'),
(8, 4, 'Our Patients’ Healthy Researches is Our Priority', 'http://localhost:8000/uploads/blogs/02 (1).jpg', '<p><span style=\"color: rgb(86, 88, 87); font-family: &quot;Fira Sans&quot;, sans-serif; font-size: 15px;\">Cras ultricies ligula sed magna dictum porta, Sed ut perspiciatis unde omnis iste natus error sit voluptat</span></p>', '2025-07-22 13:02:55', '2025-07-22 13:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `user_id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, 'Dental Department', '<p><span style=\"color: rgb(25, 29, 23); font-family: monospace; font-size: 12px; white-space-collapse: preserve; background-color: rgb(250, 253, 244);\">Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolor erat, sed diam voluptua, maiores possimus fugiat repellat totam.</span></p>', 'http://localhost:8000/uploads/department/1753252686_04.jpg', '2025-07-23 06:38:06', '2025-07-23 01:26:31'),
(2, 4, 'Pediatrics Depertment', '<p><span style=\"font-family: monospace; font-size: 12px; white-space-collapse: preserve;\">Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolor erat, sed diam voluptua, maiores possimus fugiat repellat totam.</span></p>', 'http://localhost:8000/uploads/department/1753252840_02 (2).jpg', '2025-07-23 06:40:40', '2025-07-23 01:46:54'),
(4, 4, 'Outpatient Depertment', '<p><span style=\"font-family: monospace; font-size: 12px; white-space-collapse: preserve;\">Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolor erat, sed diam voluptua, maiores possimus fugiat repellat totam.</span></p>', 'http://localhost:8000/uploads/department/1753254166_01 (4).jpg', '2025-07-23 07:02:46', '2025-07-23 01:46:40'),
(5, 4, 'Diagnostic Depertment', '<p><span style=\"font-family: monospace; font-size: 12px; white-space-collapse: preserve;\">Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolor erat, sed diam voluptua, maiores possimus fugiat repellat totam.</span></p>', 'http://localhost:8000/uploads/department/1753254234_06.jpg', '2025-07-23 07:03:54', '2025-07-23 01:46:24'),
(6, 4, 'Neurology Depertment', '<p><span style=\"font-family: monospace; font-size: 12px; white-space-collapse: preserve;\">Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolor erat, sed diam voluptua, maiores possimus fugiat repellat totam.</span></p>', 'http://localhost:8000/uploads/department/1753254294_03 (1).jpg', '2025-07-23 07:04:54', '2025-07-23 01:46:08'),
(7, 4, 'Cardiology Depertment', '<p><span style=\"font-family: monospace; font-size: 12px; white-space-collapse: preserve;\">Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolor erat, sed diam voluptua, maiores possimus fugiat repellat totam.</span></p>', 'http://localhost:8000/uploads/department/1753254364_05.jpg', '2025-07-23 07:06:04', '2025-07-23 01:45:53'),
(8, 1, 'Cardiology', '<p class=\"fst-italic\" style=\"color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p><p style=\"margin-bottom: 0px; color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>', 'http://localhost:8000/uploads/department/1753256676_departments-1.jpg', '2025-07-23 07:44:36', '2025-07-23 07:44:36'),
(9, 1, 'Neurology', '<h3 style=\"margin-bottom: 20px; font-weight: 600; color: rgb(44, 73, 100); font-size: 26px; font-family: Poppins, sans-serif;\">Et blanditiis nemo veritatis excepturi</h3><p class=\"fst-italic\" style=\"color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p><p style=\"margin-bottom: 0px; color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>', 'http://localhost:8000/uploads/department/1753256741_departments-2.jpg', '2025-07-23 07:45:41', '2025-07-23 07:45:41'),
(10, 1, 'Hepatology', '<h3 style=\"margin-bottom: 20px; font-weight: 600; color: rgb(44, 73, 100); font-size: 26px; font-family: Poppins, sans-serif;\">Impedit facilis occaecati odio neque aperiam sit</h3><p class=\"fst-italic\" style=\"color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p><p style=\"margin-bottom: 0px; color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>', 'http://localhost:8000/uploads/department/1753256780_departments-3.jpg', '2025-07-23 07:46:20', '2025-07-23 07:46:20'),
(11, 1, 'Pediatrics', '<h3 style=\"margin-bottom: 20px; font-weight: 600; color: rgb(44, 73, 100); font-size: 26px; font-family: Poppins, sans-serif;\">Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3><p class=\"fst-italic\" style=\"color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p><p style=\"margin-bottom: 0px; color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>', 'http://localhost:8000/uploads/department/1753256821_departments-4.jpg', '2025-07-23 07:47:01', '2025-07-23 07:47:01'),
(12, 1, 'Eye Care', '<h3 style=\"margin-bottom: 20px; font-weight: 600; color: rgb(44, 73, 100); font-size: 26px; font-family: Poppins, sans-serif;\">Est eveniet ipsam sindera pad rone matrelat sando reda</h3><p class=\"fst-italic\" style=\"color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p><p style=\"margin-bottom: 0px; color: color(srgb 0.266667 0.266667 0.266667 / 0.8); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>', 'http://localhost:8000/uploads/department/1753256855_departments-5.jpg', '2025-07-23 07:47:35', '2025-07-23 07:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `social_media_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_media_links`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `department_id`, `name`, `image`, `description`, `social_media_links`, `created_at`, `updated_at`) VALUES
(6, 1, 5, 'Dr. John Maxwell', 'http://localhost:8000/uploads/doctors/01 (5).jpg', '<p><span style=\"font-family: monospace; font-size: 12px; white-space-collapse: preserve;\">Cras ultricies ligula sed magna dictum porta, Sed ut perspiciatis unde omnis iste natus error sit voluptat</span></p>', '[\"https:\\/\\/www.facebook.com\\/\",\"https:\\/\\/in.linkedin.com\\/\",\"https:\\/\\/www.instagram.com\\/\"]', '2025-07-23 12:33:55', '2025-07-24 05:51:57'),
(7, 1, 7, 'Dr. Matthew Doe', 'http://localhost:8000/uploads/doctors/02 (3).jpg', '<p><span style=\"font-family: monospace; font-size: 12px; white-space-collapse: preserve;\">Cras ultricies ligula sed magna dictum porta, Sed ut perspiciatis unde omnis iste natus error sit voluptat</span></p>', '[\"https:\\/\\/www.facebook.com\\/\",\"https:\\/\\/in.linkedin.com\\/\",\"https:\\/\\/www.instagram.com\\/\"]', '2025-07-23 12:35:20', '2025-07-24 05:50:03'),
(8, 1, 8, 'Dr. Romi Keely', 'http://localhost:8000/uploads/doctors/03 (2).jpg', '<p><span style=\"font-family: monospace; font-size: 12px; white-space-collapse: preserve;\">Cras ultricies ligula sed magna dictum porta, Sed ut perspiciatis unde omnis iste natus error sit voluptat</span></p>', '[\"https:\\/\\/www.facebook.com\\/\",\"https:\\/\\/in.linkedin.com\\/\",\"https:\\/\\/www.instagram.com\\/\"]', '2025-07-23 12:36:55', '2025-07-24 05:52:11'),
(10, 4, 2, 'Walter White', 'http://localhost:8000/uploads/doctors/doctors-1.jpg', '<p><span style=\"color: rgb(68, 68, 68); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14px;\">Explicabo voluptatem mollitia et repellat qui dolorum quasi</span></p>', '[\"https:\\/\\/www.facebook.com\\/\",\"https:\\/\\/www.instagram.com\\/\",\"https:\\/\\/www.instagram.com\\/\",\"https:\\/\\/in.linkedin.com\\/\"]', '2025-07-23 13:31:59', '2025-07-23 13:31:59'),
(11, 4, 5, 'Sarah Jhonson', 'http://localhost:8000/uploads/doctors/doctors-2.jpg', '<p><span style=\"color: rgb(68, 68, 68); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14px;\">Aut maiores voluptates amet et quis praesentium qui senda para</span></p>', '[\"https:\\/\\/www.facebook.com\\/\",\"https:\\/\\/www.instagram.com\\/\",\"https:\\/\\/x.com\\/\",\"https:\\/\\/in.linkedin.com\\/\"]', '2025-07-23 13:34:16', '2025-07-23 13:34:16'),
(12, 4, 4, 'William Anderson', 'http://localhost:8000/uploads/doctors/doctors-3.jpg', '<p><span style=\"color: rgb(68, 68, 68); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14px;\">Quisquam facilis cum velit laborum corrupti fuga rerum quia</span></p>', '[\"https:\\/\\/www.facebook.com\\/\",\"https:\\/\\/x.com\\/\",\"https:\\/\\/in.linkedin.com\\/\",\"https:\\/\\/www.instagram.com\\/\"]', '2025-07-23 13:36:06', '2025-07-24 04:48:19'),
(13, 4, 5, 'Amanda Jepson', 'http://localhost:8000/uploads/doctors/doctors-4.jpg', '<p><span style=\"color: rgb(68, 68, 68); font-family: Roboto, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14px;\">Dolorum tempora officiis odit laborum officiis et et accusamus</span></p>', '[\"https:\\/\\/www.facebook.com\\/\",\"https:\\/\\/www.instagram.com\\/\",\"https:\\/\\/x.com\\/\",\"https:\\/\\/in.linkedin.com\\/\"]', '2025-07-23 13:37:33', '2025-07-23 13:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', 'atulbist21@gmail.com', 'test', 'test', '2025-07-24 05:26:19', '2025-07-24 05:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `user_id`, `question`, `description`, `created_at`, `updated_at`) VALUES
(3, 1, 'What all should I carry for my first appointment?', 'Kindly carry all your previous records and blood reports for reference.', '2025-07-17 13:04:11', '2025-07-17 13:04:11'),
(4, 1, 'What is the success rate', 'Success of bone marrow transplant usually depends on stage of disease, duration of disease and patient\'s condition at the time of transplantation. With modern day medicines and technological advances one expects a cure rate of 90% if BMT is performed at age of 3 years for thalassemia while it drops to 80% if done at the age of 7 years.', '2025-07-17 13:04:11', '2025-07-17 13:04:11'),
(5, 1, 'Do I require continuous follow-ups?', 'It depends upon the disease and type of transplant whether autologous or allogenic. In case of autologous transplant, patient needs to follow up for around 1-2 months, whereas in Allogenic transplant at least 3 months follow up is necessary. In case patient develops any complications a longer follow up is required.', '2025-07-17 13:04:11', '2025-07-17 13:04:11'),
(6, 1, 'Will I ever be able to lead a normal life?', 'Yes, patient can return to his normal routine in 6 months – 1 year post successful transplant. However, he needs to follow up with transplant centre as advised.', '2025-07-17 13:04:11', '2025-07-17 13:04:11'),
(7, 1, 'Will I be able to resume work after treatment?', 'An ideal situation for the donor should be to stay near transplant center for a week or so after transplant as patient may require platelet support from his donor.', '2025-07-17 13:04:11', '2025-07-23 04:51:57'),
(8, 1, 'Am I at a higher risk of getting infections from an unrelated bone marrow transplant?', 'Generally, the risks are reduced if:\r\n• you are young – studies have shown the younger you are, the more likely the treatment is to succeed\r\n• you receive stem cell donation from a sibling (brother or sister)\r\n• you have no serious health conditions (apart from the condition you\'re being treated for)', '2025-07-17 13:04:11', '2025-07-17 13:04:11'),
(9, 1, 'Is there any risk to the donor?', 'It is an extremely safe procedure for the donor and the patient can return to normalcy within 6 months- 1year post successful transplant. The modern day advancements are such that the risk to donor is nearly negligible. However, they may get fever and or body pain for 1 day or so whichever is manageable. The donor need not be admitted and does not require anesthesia.', '2025-07-17 13:04:11', '2025-07-17 13:04:11'),
(10, 3, 'What services does your platform offer?', 'We offer a wide range of services including online consultations, appointment scheduling, and access to certified medical professionals.', '2025-07-17 13:08:34', '2025-07-17 13:08:34'),
(11, 3, 'How can I book an appointment?', 'Booking an appointment is simple—just register on our platform, choose a service, select a doctor, and pick a suitable time slot.', '2025-07-17 13:08:58', '2025-07-17 13:08:58'),
(12, 3, 'Is my personal information secure?', 'Yes, we prioritize your privacy and use the latest encryption methods to ensure your data is safe and secure at all times.', '2025-07-17 13:09:21', '2025-07-17 07:39:58'),
(13, 4, 'Consectetur Adipisicing Elit, Sed?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Duis aute dolor in reprehenderit.', '2025-07-22 13:27:06', '2025-07-22 13:27:06'),
(14, 4, 'Temporo Incididunt ut Labore Et Dolore ?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Duis aute dolor in reprehenderit.', '2025-07-22 13:27:45', '2025-07-22 13:27:45'),
(15, 4, 'Quis Nostrd Exercitation Ullamco Laboris ?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Duis aute dolor in reprehenderit.', '2025-07-22 13:28:17', '2025-07-22 13:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photos_upload` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `user_id`, `photos_upload`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://localhost:8000/uploads/photos/1752579451_photo-1471899236350-e3016bf1e69e.jpg', '2025-07-17 10:43:34', '2025-07-17 10:43:43'),
(2, 1, 'http://localhost:8000/uploads/photos/1752579462_photo-1471899236350-e3016bf1e69e.jpg', '2025-07-17 10:43:34', '2025-07-17 10:43:43'),
(3, 1, 'http://localhost:8000/uploads/photos/1752579471_photo-1471899236350-e3016bf1e69e.jpg', '2025-07-17 10:43:34', '2025-07-17 10:43:43'),
(4, 1, 'http://localhost:8000/uploads/photos/1752579481_photo-1471899236350-e3016bf1e69e.jpg', '2025-07-17 10:43:34', '2025-07-17 10:43:43'),
(5, 1, 'http://localhost:8000/uploads/photos/1752579492_photo-1471899236350-e3016bf1e69e.jpg', '2025-07-17 10:43:34', '2025-07-17 10:43:43'),
(6, 1, 'http://localhost:8000/uploads/photos/1752579678_cosmos-flowers_1373-83.jpg', '2025-07-17 10:43:34', '2025-07-17 10:43:43'),
(7, 1, 'http://localhost:8000/uploads/photos/1752579678_photo-1496062031456-07b8f162a322.jpg', '2025-07-17 10:43:34', '2025-07-17 10:43:43'),
(8, 1, 'http://localhost:8000/uploads/photos/1752579691_photo-1471899236350-e3016bf1e69e.jpg', '2025-07-17 10:43:34', '2025-07-17 10:43:43'),
(9, 3, 'http://localhost:8000/uploads/photos/1752756711_images (3).jpg', '2025-07-17 12:51:51', '2025-07-17 12:51:51'),
(10, 3, 'http://localhost:8000/uploads/photos/1752756711_ortodontik-tedavi-su-resince-dis-bakiminda-nelere-dikkat-edilmeli.jpg', '2025-07-17 12:51:51', '2025-07-17 12:51:51'),
(11, 3, 'http://localhost:8000/uploads/photos/1752756711_images (4).jpg', '2025-07-17 12:51:51', '2025-07-17 12:51:51'),
(12, 3, 'http://localhost:8000/uploads/photos/1752756711_ped-care.jpg', '2025-07-17 12:51:51', '2025-07-17 12:51:51'),
(14, 4, 'http://localhost:8000/uploads/photos/1753188190_istockphoto-1319031310-612x612 (1).jpg', '2025-07-22 12:43:10', '2025-07-22 12:43:10'),
(15, 4, 'http://localhost:8000/uploads/photos/1753188190_mit-evaluating-performance-0-21617358969.jpg', '2025-07-22 12:43:10', '2025-07-22 12:43:10'),
(16, 4, 'http://localhost:8000/uploads/photos/1753188190_cosmos-flowers_1373-83.jpg', '2025-07-22 12:43:10', '2025-07-22 12:43:10'),
(17, 4, 'http://localhost:8000/uploads/photos/1753188190_photo-1471899236350-e3016bf1e69e.jpg', '2025-07-22 12:43:10', '2025-07-22 12:43:10'),
(18, 4, 'http://localhost:8000/uploads/photos/1753188190_photo-1496062031456-07b8f162a322.jpg', '2025-07-22 12:43:10', '2025-07-22 12:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2025_07_10_114057_create_posts_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(11, '2025_07_10_125938_create_abouts_table', 2),
(12, '2025_07_11_051631_create_services_table', 2),
(13, '2025_07_11_062729_create_addresses_table', 2),
(14, '2025_07_11_062804_create_social_media_table', 2),
(15, '2025_07_11_074045_create_galleries_table', 3),
(16, '2025_07_11_091551_create_videos_table', 4),
(17, '2025_07_11_100659_create_f_a_q_s_table', 5),
(18, '2025_07_11_104314_create_blogs_table', 6),
(19, '2025_07_11_113838_create_testimonials_table', 7),
(20, '2025_07_16_062244_create_banners_table', 8),
(21, '2025_07_16_101518_create_enquiries_table', 9),
(22, '2025_07_23_061318_create_departments_table', 10),
(23, '2025_07_23_102849_create_doctors_table', 11),
(24, '2025_07_25_050633_create_pages_table', 12),
(25, '2025_07_26_064253_create_settings_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `page_name` varchar(255) NOT NULL,
  `section_title` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `page_name`, `section_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home', NULL, 0, NULL, NULL),
(2, 1, 'About', NULL, 0, NULL, NULL),
(3, 1, 'Service', 'Our Services', 0, NULL, NULL),
(4, 1, 'Blog', 'Our Blog', 0, NULL, '2025-07-25 06:24:03'),
(5, 1, 'FAQ', 'Frequently Asked Questions', 0, NULL, '2025-07-25 06:18:25'),
(6, 1, 'Testimonial', 'Our Testimonial', 0, NULL, '2025-07-25 06:10:59'),
(7, 1, 'Gallery', 'Our Gallery', 0, NULL, '2025-07-25 06:15:31'),
(8, 1, 'Department', 'Our Deparment', 0, NULL, '2025-07-25 06:07:12'),
(9, 1, 'Doctors', 'Our Doctors', 0, NULL, NULL),
(10, 1, 'Contact', 'Our Contact', 0, NULL, NULL),
(11, 1, 'test', 'test title', 1, NULL, '2025-07-25 01:13:55'),
(12, 4, 'Home', NULL, 0, NULL, NULL),
(13, 4, 'About', NULL, 0, NULL, NULL),
(14, 4, 'Service', 'Our Services', 0, NULL, NULL),
(15, 4, 'Blog', 'Latest Blog', 0, NULL, NULL),
(16, 4, 'FAQ', 'Frequently Asked Questions', 0, NULL, NULL),
(17, 4, 'Department', 'Our Departments', 0, NULL, NULL),
(18, 4, 'Testimonial', 'Our Testimonials', 0, NULL, NULL),
(19, 4, 'Doctor', 'Meet Our Doctors', 0, NULL, NULL),
(20, 4, 'Gallery', 'Our Gallery', 0, NULL, NULL),
(21, 4, 'Video', 'Our Videos', 1, NULL, '2025-07-25 06:56:09'),
(22, 4, 'Contact', 'Contact Us', 1, NULL, '2025-07-25 06:56:21'),
(23, 3, 'Home', NULL, 0, NULL, NULL),
(24, 3, 'About', 'About Us', 0, NULL, NULL),
(25, 3, 'Service', 'Our Services', 0, NULL, NULL),
(26, 3, 'Doctors', 'Our Doctors', 1, NULL, '2025-07-25 08:04:17'),
(27, 3, 'Blog', 'Our Blog', 0, NULL, NULL),
(28, 3, 'Contact', 'Our Contact Us', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `title`, `subtitle`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 1, 'General Consultation', NULL, 'http://localhost:8000/uploads/service/1752585024_istockphoto-1319031310-612x612 (1).jpg', 'Comprehensive health check-up and personalized medical advice for all age groups.', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(3, 1, 'Pediatric Care', NULL, 'http://localhost:8000/uploads/service/1752585067_istockphoto-1388254153-612x612.jpg', 'Diagnosis and treatment for infants, children, and adolescents by experienced pediatricians', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(4, 1, 'Dental Cleaning & Check-up', NULL, 'http://localhost:8000/uploads/service/1752585104_images.jpg', 'Professional teeth cleaning, oral hygiene tips, and cavity detection.', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(5, 1, 'Orthopedic Consultation', NULL, 'http://localhost:8000/uploads/service/1752585142_consultationenorthopedie.jpg', 'Expert evaluation and treatment for bone, joint, or muscle pain and injuries.', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(6, 1, 'Skin & Hair Consultation', NULL, 'http://localhost:8000/uploads/service/1752585171_Hair-solution-consultation-1024x682.png', 'Treatment for acne, pigmentation, hair loss, allergies, and other dermatological issues.', '2025-07-17 13:04:55', '2025-07-23 04:43:47'),
(7, 1, 'Cardiology Check-up', NULL, 'http://localhost:8000/uploads/service/1752585199_Heart-Checkup-and-All-You-Need-to-Know.jpg', 'Heart health assessment including ECG, blood pressure, and lifestyle consultation.', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(8, 3, 'General Health Checkup', 'Your first step to better health', 'http://localhost:8000/uploads/service/1752752786_images (2).jpg', '<p>Comprehensive medical exams to assess your overall health. Ideal for early detection and prevention of common illnesses.</p>', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(9, 3, 'Pediatric Care', 'Caring for your little ones', 'http://localhost:8000/uploads/service/1752752925_ped-care.jpg', '<p>Specialized child healthcare services from newborns to teenagers, ensuring their healthy growth and development.</p>', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(10, 3, 'Dental Services', 'Bright smiles start here', 'http://localhost:8000/uploads/service/1752753523_ortodontik-tedavi-su-resince-dis-bakiminda-nelere-dikkat-edilmeli.jpg', '<p>Teeth cleaning, cavity fillings, and dental checkups to maintain optimal oral hygiene for all age groups.</p>', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(11, 3, 'Dermatology Consultation', 'Healthy skin, happy you', 'http://localhost:8000/uploads/service/1752753598_images (3).jpg', '<p>Expert diagnosis and treatment for acne, rashes, pigmentation, and other skin concerns.</p>', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(12, 3, 'Physiotherapy & Rehab', 'Recover faster, move better', 'http://localhost:8000/uploads/service/1752753676_DSC07313-copy-min-1024x682.jpg', '<p>Personalized therapy for injuries, post-surgery recovery, and chronic pain management.</p>', '2025-07-17 13:04:55', '2025-07-17 07:03:49'),
(13, 3, 'Women’s Health & Gynecology', 'Compassionate care for women', 'http://localhost:8000/uploads/service/1752753772_images (4).jpg', '<p>Menstrual disorders, prenatal checkups, and menopause support under one roof</p>', '2025-07-17 13:04:55', '2025-07-17 13:04:55'),
(14, 4, 'Outdoor Checkup', NULL, 'http://localhost:8000/uploads/service/1753185020_stethoscope.png', '<p><span style=\"color: rgb(86, 88, 87); font-family: &quot;Fira Sans&quot;, sans-serif; font-size: 15px; text-align: center;\">We have experience in different areas of Health Center, We offer our Better solutions your treatment is appropriate.</span></p>', '2025-07-22 11:49:33', '2025-07-22 06:20:20'),
(15, 4, 'Operation Theatre', NULL, 'http://localhost:8000/uploads/service/1753185110_medical-box.png', '<p><span style=\"color: rgb(86, 88, 87); font-family: &quot;Fira Sans&quot;, sans-serif; font-size: 15px; text-align: center;\">We have experience in different areas of Health Center, We offer our Better solutions your treatment is appropriate.</span></p>', '2025-07-22 11:51:50', '2025-07-22 11:51:50'),
(16, 4, 'Pharmacy', NULL, 'http://localhost:8000/uploads/service/1753185183_medicine.png', '<p><span style=\"color: rgb(86, 88, 87); font-family: &quot;Fira Sans&quot;, sans-serif; font-size: 15px; text-align: center;\">We have experience in different areas of Health Center, We offer our Better solutions your treatment is appropriate.</span></p>', '2025-07-22 11:53:03', '2025-07-22 11:53:03'),
(17, 4, 'Blood Test', NULL, 'http://localhost:8000/uploads/service/1753185283_blood-test.png', '<p><span style=\"color: rgb(86, 88, 87); font-family: &quot;Fira Sans&quot;, sans-serif; font-size: 15px; text-align: center;\">We have experience in different areas of Health Center, We offer our Better solutions your treatment is appropriate.</span></p>', '2025-07-22 11:54:43', '2025-07-22 11:54:43'),
(18, 4, 'Qualified Doctors', NULL, 'http://localhost:8000/uploads/service/1753185364_doctor.png', '<p><span style=\"color: rgb(86, 88, 87); font-family: &quot;Fira Sans&quot;, sans-serif; font-size: 15px; text-align: center;\">We have experience in different areas of Health Center, We offer our Better solutions your treatment is appropriate.</span></p>', '2025-07-22 11:56:04', '2025-07-22 11:56:04'),
(19, 4, 'Emergency Care', NULL, 'http://localhost:8000/uploads/service/1753185428_ambulance.png', '<p><span style=\"color: rgb(86, 88, 87); font-family: &quot;Fira Sans&quot;, sans-serif; font-size: 15px; text-align: center;\">We have experience in different areas of Health Center, We offer our Better solutions your treatment is appropriate.</span></p>', '2025-07-22 11:57:08', '2025-07-22 11:57:08'),
(20, 1, 'Pathology Lab', 'Medical Center', 'http://localhost:8000/uploads/service/1753428112_departments-1.jpg', '<p>kslkjljljlfjl</p>', '2025-07-25 07:21:52', '2025-07-25 07:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `background_color` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `hover_color` varchar(255) DEFAULT NULL,
  `section_background_color` varchar(255) DEFAULT NULL,
  `section_color` varchar(255) DEFAULT NULL,
  `section_hover_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `background_color`, `color`, `hover_color`, `section_background_color`, `section_color`, `section_hover_color`, `created_at`, `updated_at`) VALUES
(2, 3, '#ffffff', '#000000', '#000000', '#ffffff', '#000000', '#000000', '2025-07-26 07:15:16', '2025-07-28 00:37:54'),
(3, 1, '#ffffff', '#000000', '#000000', '#000000', '#000000', '#000000', '2025-07-28 05:14:00', '2025-07-29 04:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `social_medias`
--

CREATE TABLE `social_medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_medias`
--

INSERT INTO `social_medias` (`id`, `user_id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(2, 3, 'facebook', 'https://www.facebook.com/', '2025-07-17 12:42:31', '2025-07-17 12:42:31'),
(3, 3, 'instagram', 'https://www.instagram.com/', '2025-07-17 12:43:16', '2025-07-17 07:13:51'),
(4, 1, 'test', 'https://www.lipsum.com/', '2025-07-23 10:15:26', '2025-07-23 04:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `rating` int(20) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `author_image` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `author_name`, `rating`, `designation`, `company_name`, `author_image`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sarah Jenkins', 5, 'Product Manager', 'TechNova Inc.', 'http://localhost:8000/uploads/testimonials/1752915078_44.jpg', 'TechNova helped us streamline our workflow and boost productivity by over 40%. Their team is professional and truly understands user needs.', NULL, '2025-07-19 03:21:18'),
(5, 3, 'John Doe', 5, 'CEO', 'ExampleCorp', 'http://localhost:8000/uploads/testimonials/tutor-8.jpg', '<p>This service exceeded my expectations. The team was professional, responsive, and delivered everything on time</p>', NULL, NULL),
(7, 4, 'Thomas James', 4, 'Manager', NULL, 'http://localhost:8000/uploads/testimonials/02.jpg', '<p><span style=\"font-style: italic; font-size: 16px; color: #202125; font-weight: 600;\">“ Consectetur adipisicing elit, Totam mollitia incidunt vero cupiditate obcaecati iusto tempora unde! Numquam officiis, quae adipisci quam laudantium nulla modi, adipisci quam laudantium nulla modi. ”</span></p>', NULL, '2025-07-22 07:04:05'),
(8, 4, 'Kendra Velly', 5, 'Manager', NULL, 'http://localhost:8000/uploads/testimonials/03.jpg', '<p><span style=\"font-style: italic; font-size: 16px; color: #202125; font-weight: 600;\">“ Quae adipisci quam laudantium nulla modi, Consectetur adipisicing elit, Totam mollitia incidunt vero cupiditate obcaecati iusto tempora unde! Numquam officiis, adipisci quam laudantium nulla modi. ”</span></p>', NULL, '2025-07-22 07:05:29'),
(9, 4, 'Samantha Lion', 3, 'Manager', NULL, 'http://localhost:8000/uploads/testimonials/01 (2).jpg', '<p><span style=\"font-style: italic; font-size: 16px; color: #202125; font-weight: 600;\">“ Totam mollitia incidunt Consectetur adipisicing elit, vero cupiditate obcaecati iusto tempora unde! Numquam officiis, quae adipisci quam laudantium nulla modi, adipisci quam laudantium nulla modi vero cupiditate. ”</span></p>', NULL, '2025-07-22 07:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `clinic_name` varchar(255) DEFAULT NULL,
  `clinic_logo` varchar(255) DEFAULT NULL,
  `clinic_photo` varchar(255) DEFAULT NULL,
  `telephone_number` varchar(255) DEFAULT NULL,
  `alternate_phone` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `linkdin_link` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `dr_dob` date DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_map_link` longtext DEFAULT NULL,
  `selected_theme` varchar(255) DEFAULT NULL,
  `clinic_open_from` varchar(255) DEFAULT NULL,
  `clinic_open_to` varchar(255) DEFAULT NULL,
  `closed_clinic` varchar(255) DEFAULT NULL,
  `clinic_open_time` time DEFAULT NULL,
  `clinic_close_time` time DEFAULT NULL,
  `half_day` varchar(255) DEFAULT NULL,
  `time_of_half_day_from` time DEFAULT NULL,
  `time_of_half_day_to` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `username`, `email`, `photo`, `email_verified_at`, `password`, `address`, `city`, `state`, `phone`, `remember_token`, `created_at`, `updated_at`, `clinic_name`, `clinic_logo`, `clinic_photo`, `telephone_number`, `alternate_phone`, `facebook_link`, `instagram_link`, `twitter_link`, `linkdin_link`, `pincode`, `dr_dob`, `country`, `address_map_link`, `selected_theme`, `clinic_open_from`, `clinic_open_to`, `closed_clinic`, `clinic_open_time`, `clinic_close_time`, `half_day`, `time_of_half_day_from`, `time_of_half_day_to`) VALUES
(1, NULL, 'atul', 'atul@666', 'atul@gmail.com', 'http://localhost:8000/uploads/profile/44.jpg', NULL, '$2y$12$4dNS8EKNOms6T2hz43EnS.P/AhFz/3Z4dfW//6b0CCbY3AqiCLYvm', '465, Scheme No 171', 'Indore', 'Madhya Pradesh', '6666666666', NULL, '2025-07-17 10:46:59', '2025-07-29 05:19:52', 'Pracfy', 'http://localhost:8000/uploads/profile/apolloLogo.webp', 'http://localhost:8000/uploads/profile/cosmos-flowers_1373-83.jpg', NULL, '9876543210', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://x.com/?lang=en', 'https://in.linkedin.com/', '456789', NULL, 'India', 'https://maps.app.goo.gl/VM6h6V5JpRttqxGB7', 'theme4', 'Monday', 'Friday', 'Sunday', '06:00:00', '10:00:00', 'Saturday', '09:00:00', '20:00:00'),
(3, NULL, 'manish', 'manish@999', 'manish@skbinfocom.in', NULL, NULL, '$2y$12$1cJsP2wDRNVyqW69qL9K/eCfCZpdnztR96.SCSHSPWU/e8Ng5vSTm', 'M', 'M', 'M', '9999999999', NULL, '2025-07-17 10:46:59', '2025-07-29 03:31:14', 'Pracfy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://maps.app.goo.gl/mgtE6PuUgJbNzDfo7', 'theme2', 'Monday', 'Friday', 'Sunday', '06:00:00', '22:00:00', 'Saturday', '09:00:00', '20:00:00'),
(4, NULL, 'test', 'test@890', 'test@gmail.com', NULL, NULL, '$2y$12$PMeKMIjGtGLEFHkjPLdoW.NtW3ARfVI8LfunTwGH5sHMIp/qgMq4a', 'Bholaram Square', 'Indore', 'Madhya Pradesh', '1234567890', NULL, '2025-07-22 09:21:55', '2025-07-25 06:27:50', 'Pracfy', 'http://localhost:8000/uploads/profile/logo.png', NULL, NULL, NULL, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://x.com/?lang=en', 'https://in.linkedin.com/', '456789', NULL, NULL, 'https://maps.app.goo.gl/jz4UpT1UGDQuGUgDA', 'theme4', 'Monday', 'Saturday', 'Sunday', '08:00:00', '07:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `videos` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `title`, `videos`, `created_at`, `updated_at`) VALUES
(2, 1, 'dummy videos', 'http://localhost:8000/uploads/videos/SampleVideo_1280x720_1mb.mp4', '2025-07-17 10:45:43', '2025-07-17 10:45:43'),
(3, 1, 'dummy video2', 'http://localhost:8000/uploads/videos/SampleVideo_1280x720_1mb.mp4', '2025-07-17 10:45:43', '2025-07-17 10:45:43'),
(4, 1, 'dummy video3', 'http://localhost:8000/uploads/videos/SampleVideo_1280x720_1mb.mp4', '2025-07-17 10:45:43', '2025-07-17 10:45:43'),
(5, 1, 'test', 'http://localhost:8000/uploads/videos/SampleVideo_360x240_2mb.mp4', '2025-07-17 10:45:43', '2025-07-17 10:45:43'),
(6, 1, 'test2', 'http://localhost:8000/uploads/videos/SampleVideo_360x240_2mb.mp4', '2025-07-17 10:45:43', '2025-07-23 04:50:28'),
(7, 1, 'test3', 'http://localhost:8000/uploads/videos/SampleVideo_360x240_2mb.mp4', '2025-07-17 10:45:43', '2025-07-17 10:45:43'),
(8, 1, 'test4', 'http://localhost:8000/uploads/videos/SampleVideo_1280x720_1mb.mp4', '2025-07-17 10:45:43', '2025-07-17 10:45:43'),
(9, 1, 'test5', 'http://localhost:8000/uploads/videos/SampleVideo_1280x720_1mb.mp4', '2025-07-17 10:45:43', '2025-07-17 10:45:43'),
(10, 3, 'Dummy2', 'http://localhost:8000/uploads/videos/SampleVideo_360x240_2mb.mp4', '2025-07-17 12:58:13', '2025-07-17 12:58:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abouts_to_user_id` (`user_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_to_userid` (`userid`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_to_user_id` (`user_id`),
  ADD KEY `doctors_to_department` (`department_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abouts`
--
ALTER TABLE `abouts`
  ADD CONSTRAINT `abouts_to_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_to_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_to_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `doctors_to_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
