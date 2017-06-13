-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 13 2017 г., 16:52
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`) VALUES
(19, 'efef', 'efeffe'),
(20, 'eefef', 'efefef'),
(21, 'feeeeeeeeeeeeeeeeeee', 'ffffffffffffffffffff'),
(23, 'rggr', 'grgrgr'),
(25, '3', '4');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_article` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `form`
--

CREATE TABLE `form` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(300) CHARACTER SET utf8 NOT NULL,
  `text` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `form`
--

INSERT INTO `form` (`id`, `name`, `email`, `text`) VALUES
(1, 'Тони', 'tony@mail.ru', 'Hello world!'),
(3, 'Tony', 'Email@email.ru', 'Privet'),
(4, 'Tony', 'Email@email.ru', 'Privet');

-- --------------------------------------------------------

--
-- Структура таблицы `privs`
--

CREATE TABLE `privs` (
  `id_priv` int(5) NOT NULL,
  `name` varchar(256) CHARACTER SET cp1251 NOT NULL,
  `description` varchar(512) CHARACTER SET cp1251 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `privs`
--

INSERT INTO `privs` (`id_priv`, `name`, `description`) VALUES
(1, 'USE_SECRET_FUNCTIONS', 'Привилегия для примера'),
(2, 'NEW_ARTICLE', 'Создание новой статьи'),
(3, 'COMMENT_ARTICLE', 'Комментирование статьи'),
(6, 'DELETE_ARTICLE', 'Удаление статьи'),
(7, 'DELETE_COMMENT', 'Удаление комментария'),
(10, 'ALL_PRIVILAGES', 'Доступ ко всему'),
(11, 'CONSOLE_EDITOR', 'Полный доступ к консоли редактора'),
(12, 'EDIT_ARTICLE', 'Редактирование статьи'),
(13, 'EDIT_COMMENT', 'Редактирование комментария'),
(14, 'VIEW_CONTACT', 'Просмотр контактов'),
(15, 'VIEW_SALARY', 'Просмотр зарплаты');

-- --------------------------------------------------------

--
-- Структура таблицы `privs2roles`
--

CREATE TABLE `privs2roles` (
  `id_priv` int(5) NOT NULL,
  `id_role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `privs2roles`
--

INSERT INTO `privs2roles` (`id_priv`, `id_role`) VALUES
(1, 1),
(14, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int(5) NOT NULL,
  `name` varchar(256) CHARACTER SET cp1251 NOT NULL,
  `description` varchar(512) CHARACTER SET cp1251 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `name`, `description`) VALUES
(0, 'user', 'Пользователь'),
(1, 'admin', 'Админ'),
(2, 'moder', 'Модератор');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id_session` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sid` varchar(10) CHARACTER SET cp1251 NOT NULL,
  `time_start` datetime NOT NULL,
  `time_last` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `login` varchar(256) CHARACTER SET cp1251 NOT NULL,
  `password` varchar(32) CHARACTER SET cp1251 NOT NULL,
  `id_role` int(5) DEFAULT NULL,
  `name` varchar(256) CHARACTER SET cp1251 DEFAULT NULL,
  `salt` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `id_role`, `name`, `salt`) VALUES
(4, 'tony@mail.ru', '554e64b49bc1e8f304751c77cf3684cf', 1, 'tony ', 'RKJWCzQ8eXR5KWB');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `privs`
--
ALTER TABLE `privs`
  ADD PRIMARY KEY (`id_priv`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `privs2roles`
--
ALTER TABLE `privs2roles`
  ADD PRIMARY KEY (`id_priv`,`id_role`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id_session`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `login_9` (`login`),
  ADD KEY `login_2` (`login`),
  ADD KEY `login_3` (`login`),
  ADD KEY `login_4` (`login`),
  ADD KEY `login_5` (`login`),
  ADD KEY `login_6` (`login`),
  ADD KEY `login_7` (`login`),
  ADD KEY `login_8` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `form`
--
ALTER TABLE `form`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `privs`
--
ALTER TABLE `privs`
  MODIFY `id_priv` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
