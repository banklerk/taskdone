-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Сен 16 2020 г., 13:22
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taskbase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `content`, `image`, `date`, `user_id`) VALUES
(71, ' Excepteur sint occaecat cupidatat non...', 'At vero eos et accusamus et iusto odio dignissimos ducimus, nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id,...', 'h8mhughivv.jpg', 1597506060, 1),
(72, 'Lorem ipsum dolor sit amet,...', 'Nemo enim ipsam voluptatem, nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, quis nostrud exercitation...', 'txkts1pyzv.jpg', 1597506060, 1),
(73, ' Excepteur sint occaecat cupidatat non...', 'Itaque earum rerum hic tenetur a sapiente delectus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, velit esse cillum...', 'htmn6kd0kl.jpg', 1597506060, 1),
(74, 'Ut enim ad minima veniam,...', 'At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati...', 'yltyx1cyav.jpg', 1597658997, 2),
(75, 'Temporibus autem quibusdam et aut...', 'Ut enim ad minim veniam, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque...', 'biwshkbqa0.jpg', 1597659254, 2),
(76, 'Et harum quidem rerum facilis...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora...', 'egcezpqums.jpg', 1597690955, 4),
(77, 'At vero eos et accusamus...', 'Excepteur sint occaecat cupidatat non proident, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, sunt in culpa qui officia deserunt mollit...', 'xej1loesae.jpg', 1598317869, 4),
(78, ' Itaque earum rerum hic tenetur...', 'Ut enim ad minim veniam, nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, ut et...', 'kgl1mbqvov.jpg', 1598809863, 1),
(79, 'Lorem ipsum dolor sit amet,...', 'At vero eos et accusamus et iusto odio dignissimos ducimus, consectetur adipiscing elit, velit esse cillum dolore eu fugiat nulla pariatur.\r\n\r\nExcepteur sint occaecat cupidatat...', 'q4tlfxaffj.jpg', 1598809874, 1),
(81, 'Duis aute irure dolor in...', 'Excepteur sint occaecat cupidatat non proident, nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, velit...', '7z7f9bsata.png', 1598809890, 1),
(82, 'Nemo enim ipsam voluptatem...', 'Itaque earum rerum hic tenetur a sapiente delectus, nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime...', '7k2dbyujz9.jpg', 1598814031, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(1, 'key4me@ya.ru', '$2y$10$eWB3kHV6rD86xfmrIzKboOmeeyvS0AJ3hl3yk4Uure9j7/O6KGE6y', 'banklerk', 0, 1, 1, 1, 1597059598, 1600198711, 0),
(2, 'banklerk@ya.ru', '$2y$10$oWuJS0iu6bYOx6ldDFn.LeFXWZgEIhxwAaJY5k50t0.g65dE0NXiq', 'username', 0, 1, 1, 2, 1597476589, 1599223988, 0),
(3, 'udjer@icloud.com', '$2y$10$eCOIPAPuVDTUS8Pw4iQ/ueKCO1MsWVt/VUUzGtByufTQcFxeC8dRi', 'udjer', 0, 1, 1, 2, 1597501628, 1597501660, 0),
(4, 'udjer@me.com', '$2y$10$o32kz9Lht4nUPi8xfZk4c.6DsysT/5/J7v8nhQlpGtdYgQiMlFrQK', 'banklerk1', 0, 1, 1, 2, 1597675498, 1600195105, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(4, 5, 'udjerald@gmail.com', 'p0mu3IqZipprYlm0', '$2y$10$tmOxrYRLK8.0.EJjYlbl0eU/xOeePL0YSHZrOkwwJF6b8VqXCBcie', 1599989530),
(5, 6, 'udjerald@gmail.com', 'yk7Ytp2JAZdR6EPZ', '$2y$10$/XiSYMEVvXA/p3dvFGMDDuTRQpwcCe7/uisMK.LVGxmQGQzIAd7em', 1599989668),
(6, 7, 'udjerald@gmail.com', 'cLR7AfWFO5P-We0L', '$2y$10$sbkjTM1GXjQGTL9IWAFqWe3pNrk8k1frQvCKhPgJWwoz/mWEEN5u6', 1599990074),
(7, 8, 'udjerald@gmail.com', 'fsULcP2ueq83a8MU', '$2y$10$48YVnnLyhWc4eonjCpz85O9UgzRGvv3.Gm5rR1sLPjzYHxV90/Z8O', 1599990151),
(8, 9, 'udjerald@gmail.com', 'Fc_FewiGdO1oQOAE', '$2y$10$ZddXRgXckKhme4nt721kee2RbSSL.Jx6O7rZMzMUCLGZfevu1mLky', 1599990681),
(9, 10, 'udjerald@gmail.com', 'JojZp7V8rhPvBKM9', '$2y$10$8UyaREPziwtCyFTF7PjnpuYDDKh8IKf65u9lxX7oZtRDea.ZQMo/S', 1599992057),
(10, 11, 'udjerald@gmail.com', 'A4Dp0wpyBCnnI_VG', '$2y$10$KRLmRzE6j8o6TgirBbMk9OQEsZstfQsi9LXXV6D8OIOzx1r0OfdIy', 1599992831),
(11, 12, 'udjerald@gmail.com', 'o0tQ_t-mAt8NuLYj', '$2y$10$/8I.DtA0i/gZlPuBH.ML2ukFsrA2wEeebc9oSwxKN2YLoybYAIbmS', 1599993651),
(12, 13, 'udjer@yahoo.com', '97BRrQHj5YpvVzAT', '$2y$10$dAHqD5ADwwK1.srk/tuUTeMaYDe4aKHsoYMSoSfBiVlsnTLevrU06', 1600070383),
(13, 14, 'udjer@yahoo.com', 'v_XikW91uTjTQLBt', '$2y$10$xQGYA09bnjWtfNH9a0vzvujFZ5N0Re8.8X9iXhVvq9vDbi64rh9qa', 1600074436),
(14, 15, 'udjer@yahoo.com', 'qF-uU8YOdfx3c_rG', '$2y$10$wbVlT/6KJ8D.eLjHTdy2geu9X/aE2wsr1fWzTI136ykclxedFuo4K', 1600074635),
(15, 16, 'udjerald@gmail.com', 'VtINWLgQZdRURYE2', '$2y$10$E5pjgO.tgYl5qaRX89h.Me4qYlTXnUfiypyObKEXY4XFLjf350yhG', 1600084359),
(16, 17, 'udjerald@gmail.com', 'hEvtEjDTdy2UMqQz', '$2y$10$yQOWa/nP1IE3ldzfX.PrPeboqQ0rmVZq.WJvTMh/m/bbz1fGq3nvi', 1600089302),
(17, 18, 'udjerald@gmail.com', 'y5Xn96X0nsyTDDB8', '$2y$10$UpMjRdKMgftm4YR.6b18de6bc6JJrVIWZVQhOzH3wPlJ/cH34fseC', 1600089359),
(18, 19, 'udjerald@yahoo.com', 'ezeT_OySLIfovFS1', '$2y$10$ST2V1FRn60fDi3FqtHTJwOxgjaZpEFG3Y7dKlrqqrFEduANyeLRhy', 1600265871);

-- --------------------------------------------------------

--
-- Структура таблицы `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('ejWtPDKvxt-q7LZ3mFjzUoIWKJYzu47igC8Jd9mffFk', 74, 1600198711, 1600738711);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Индексы таблицы `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
