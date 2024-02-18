SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(1000) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `due_date` varchar(1000) NOT NULL,
  `last_modification` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `category`, `status`, `due_date`, `last_modification`) VALUES
(1, 'Possimus quis culpa accusamus repellat est est.', 'body', 'pending', '1678386710', '1678228310'),
(2, 'Deleniti voluptas omnis sit tenetur.', 'medical', 'pending', '1678307510', '1678228310'),
(3, 'Ipsam sed labore in harum distinctio pariatur dicta.', 'body', 'pending', '1678530710', '1678228310'),
(4, 'A tempore ducimus quia distinctio non asperiores quia.', 'body', 'pending', '1678487510', '1678228310'),
(5, 'Ipsa qui amet reprehenderit dolore eaque.', 'body', 'pending', '1678422710', '1678228310'),
(6, 'Consequatur quibusdam iste fugit hic nam.', 'mind', 'pending', '1678537910', '1678228310'),
(7, 'Autem quod a provident.', 'mind', 'pending', '1678231910', '1678228310'),
(8, 'Debitis suscipit quo placeat fugiat qui architecto architecto enim.', 'mind', 'pending', '1678519910', '1678228310'),
(9, 'Cumque officia aspernatur id quam perspiciatis.', 'medical', 'pending', '1678527110', '1678228310'),
(10, 'Eum error minima aliquam mollitia libero.', 'medical', 'pending', '1678433510', '1678228310'),
(11, 'Iusto neque velit voluptatem ut.', 'body', 'pending', '1678278710', '1678228310'),
(12, 'Itaque facere consectetur illum non labore sint.', 'body', 'pending', '1678393910', '1678228310'),
(13, 'Nam et rerum consequatur sed quia sequi esse.', 'medical', 'pending', '1678570310', '1678228310'),
(14, 'Unde quia cum expedita cupiditate officiis autem vero.', 'body', 'pending', '1678408310', '1678228310'),
(15, 'Quaerat ut consequatur ad nobis quia corporis illo.', 'mind', 'pending', '1678314710', '1678228310'),
(16, 'Distinctio pariatur ut ea.', 'medical', 'pending', '1678563110', '1678228310'),
(17, 'Eum nemo explicabo quasi quod sapiente qui.', 'body', 'pending', '1678336310', '1678228310'),
(18, 'Sapiente accusantium quisquam animi quaerat quidem.', 'body', 'pending', '1678541510', '1678228310'),
(19, 'Voluptatem eligendi qui eveniet reprehenderit et ut ducimus.', 'mind', 'pending', '1678314710', '1678228310'),
(20, 'Ratione sunt officiis voluptate magnam suscipit.', 'body', 'pending', '1678350710', '1678228310'),
(21, 'Commodi alias error delectus a.', 'mind', 'pending', '1678534310', '1678228310'),
(22, 'Veniam possimus modi doloremque ducimus omnis ea molestiae.', 'medical', 'pending', '1678552310', '1678228310'),
(23, 'Et id quaerat et accusantium ducimus ea.', 'body', 'pending', '1678523510', '1678228310'),
(24, 'Iusto excepturi quia ut sit nisi ipsum.', 'body', 'pending', '1678465910', '1678228310'),
(25, 'In nobis distinctio ex exercitationem unde.', 'body', 'pending', '1678350710', '1678228310'),
(26, 'Tempore doloribus sunt nihil qui pariatur adipisci perferendis qui.', 'medical', 'pending', '1678285910', '1678228310'),
(27, 'Sunt aut omnis expedita occaecati cupiditate sit.', 'mind', 'pending', '1678570310', '1678228310'),
(28, 'Est voluptatem error ducimus reiciendis non sint numquam.', 'body', 'pending', '1678325510', '1678228310'),
(29, 'Nemo sit qui placeat ut illum iusto.', 'mind', 'pending', '1678375910', '1678228310'),
(30, 'Iure deleniti autem iure pariatur laudantium dolorem et.', 'mind', 'done', '1678347110', '1678228310');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'swiegand', '$2y$10$pBCB2eK7/QD5xh.LsyEeLu6d8PWPD3t8Wi0Tnk4s89Jeiw6tKNGsu'),
(2, 'ewald.daugherty', '$2y$10$KixunZmLmJfW7Eg8mGTVgORc2lq4UZS9R/bCMxKxi36cNJB7pwyeW'),
(3, 'myah51', '$2y$10$lgRfJq1sP.niThoXDhI15eYMA3PiWdnHe6tY8ucV0OUd7zkXksFhq'),
(4, 'adriana08', '$2y$10$.PyuL6KPNONub5mYi0yj7OwHp.6Tk9L1wbr0O8v4VTQgedXx3Nitq'),
(5, 'ephraim29', '$2y$10$l76KCcxVO.Suaw.4t5whiOzzn.mGpiwffkJwBmu5R/TLTWkoMCC9.'),
(6, 'mohammed57', '$2y$10$PzgfP2S99EszoYKZs1d6jOr/T3/f3Xb2e0q06aXlMxdaUpe/vwWZe'),
(7, 'champlin.estel', '$2y$10$GGtJB.wOjVRDA1iWx7ry5usNqAz1pcbzFXoHAne.E3SvCJTuXxSke'),
(8, 'kamren.jacobs', '$2y$10$18wSVFKNNXCaXlt6tmhbmeWOlxYDF7Az6g9Id9OMcFwsktVRHzFV.'),
(9, 'rbartell', '$2y$10$oVrZkTm3ssR63JodKGlPH.UgIyCbhvWOmrAKs4fQPAuqTTlo8e0Ji'),
(10, 'homenick.morris', '$2y$10$kp9KfMNpYtsMSfOwZXQgPeQp2HplZ5tbVnKVTejLVrKhRmJS3qCvW');

-- --------------------------------------------------------

--
-- Table structure for table `users_tasks`
--

CREATE TABLE `users_tasks` (
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `task_id` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tasks`
--

INSERT INTO `users_tasks` (`user_id`, `task_id`) VALUES
(6, 1),
(3, 2),
(5, 3),
(4, 4),
(2, 5),
(7, 6),
(4, 7),
(3, 8),
(8, 9),
(2, 10),
(9, 11),
(7, 12),
(9, 13),
(1, 14),
(5, 15),
(8, 16),
(2, 17),
(9, 18),
(3, 19),
(7, 20),
(9, 21),
(2, 22),
(6, 23),
(6, 24),
(10, 25),
(3, 26),
(7, 27),
(8, 28),
(7, 29),
(4, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tasks`
--
ALTER TABLE `users_tasks`
  ADD KEY `users_tasks_user_id_index` (`user_id`),
  ADD KEY `users_tasks_task_id_index` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_tasks`
--
ALTER TABLE `users_tasks`
  ADD CONSTRAINT `users_tasks_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `users_tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
