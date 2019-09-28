-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 01. zář 2019, 14:29
-- Verze serveru: 10.1.30-MariaDB
-- Verze PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `social`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'Hello there', 'Å imon_buryan', 'Å imon_buryan', '2018-11-25 21:55:41', 'no', 19),
(2, 'hello there', 'george_smith', 'petr_petrov', '2018-11-25 21:56:23', 'no', 15),
(3, 'hello there', 'Å imon_buryan', 'george_smith', '2018-11-25 21:59:16', 'no', 16),
(4, '11', 'Å imon_buryan', 'george_smith', '2018-11-25 22:04:13', 'no', 16),
(5, 'qwerty', 'Å imon_buryan', 'george_smith', '2018-11-25 22:07:27', 'no', 16),
(6, 'qwerty', 'petr_petrov', 'george_smith', '2018-11-26 20:13:43', 'no', 16),
(7, 'qwerty', 'petr_petrov', 'george_smith', '2018-11-26 20:53:52', 'no', 16),
(8, 'hi there', 'petr_petrov', 'george_smith', '2018-11-26 20:57:11', 'no', 16),
(9, 'aloha', 'petr_petrov', 'george_smith', '2018-11-26 20:59:27', 'no', 16),
(10, 'just one more', 'petr_petrov', 'george_smith', '2018-11-26 20:59:51', 'no', 16),
(11, 'hi', 'simon_buryan', 'simon_buryan', '2018-12-11 00:02:00', 'no', 32),
(12, 'hi', 'petr_petrov', 'petr_petrov', '2018-12-12 23:53:55', 'no', 34),
(13, 'i like it', 'george_smith', 'george_smith', '2018-12-17 13:01:13', 'no', 58),
(14, 'hello', 'george_smith', 'simon_buryan', '2018-12-17 13:01:21', 'no', 56),
(15, 'hi', 'george_smith', 'simon_buryan', '2018-12-17 21:51:11', 'no', 36),
(16, 'hi again', 'george_smith', 'simon_buryan', '2018-12-17 21:51:17', 'no', 36),
(17, 'amigo!', 'george_smith', 'simon_buryan', '2018-12-17 21:59:52', 'no', 56),
(18, 'hi there', 'jordan_jake', 'joe_smith', '2018-12-18 21:49:35', 'no', 66),
(19, '', 'jordan_jake', 'joe_smith', '2018-12-18 21:49:37', 'no', 66),
(20, 'yes', 'jordan_jake', 'simon_buryan', '2018-12-18 21:49:51', 'no', 56),
(21, 'hi there', 'jordan_jake', 'simon_buryan', '2018-12-18 21:50:00', 'no', 54),
(22, 'Nice to see you!', 'simon_buryan', 'simon_buryan', '2018-12-18 22:35:01', 'no', 54),
(23, 'yup', 'jordan_jake', 'simon_buryan', '2018-12-18 22:35:30', 'no', 54),
(24, 'aloha,', 'simon_buryan', 'jordan_jake', '2018-12-18 22:36:09', 'no', 68),
(25, 'nice,', 'jordan_jake', 'george_smith', '2018-12-23 21:13:16', 'no', 58),
(26, 'hey :-)', 'george_smith', 'simon_buryan', '2019-01-03 16:10:24', 'no', 87);

-- --------------------------------------------------------

--
-- Struktura tabulky `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_to`, `user_from`) VALUES
(1, '', 'Å imon_buryan'),
(2, '', 'Å imon_buryan'),
(3, '', 'Å imon_buryan'),
(4, '', 'Å imon_buryan'),
(8, 'simon_buryan', 'martin_sklã¡la');

-- --------------------------------------------------------

--
-- Struktura tabulky `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(15, 'Å imon_buryan', 18),
(17, 'Å imon_buryan', 15),
(18, 'Å imon_buryan', 11),
(20, 'Å imon_buryan', 14),
(23, 'Å imon_buryan', 19),
(24, 'Å imon_buryan', 16),
(25, 'Å imon_buryan', 13),
(26, 'simon_buryan', 21),
(27, 'simon_buryan', 28),
(28, 'petr_petrov', 34),
(30, 'simon_buryan', 42),
(34, 'simon_buryan', 48),
(35, 'simon_buryan', 54),
(36, 'simon_buryan', 46),
(38, 'george_smith', 36),
(39, 'george_smith', 56),
(40, 'jordan_jake', 54),
(41, 'simon_buryan', 68),
(42, 'jordan_jake', 58),
(43, 'jordan_jake', 56),
(44, 'george_smith', 86),
(45, 'george_smith', 87);

-- --------------------------------------------------------

--
-- Struktura tabulky `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(1, 'petr_petrov', 'simon_buryan', 'Send', '2018-12-09 00:58:40', 'yes', 'yes', 'no'),
(2, 'petr_petrov', 'simon_buryan', 'Send', '2018-12-09 00:58:49', 'yes', 'yes', 'no'),
(3, 'petr_petrov', 'simon_buryan', 'Send', '2018-12-09 01:02:23', 'yes', 'yes', 'no'),
(5, 'simon_buryan', 'petr_petrov', 'Send This', '2018-12-09 01:04:53', 'yes', 'yes', 'no'),
(6, 'simon_buryan', 'petr_petrov', 'Send This', '2018-12-09 01:19:53', 'yes', 'yes', 'no'),
(7, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-09 22:30:25', 'yes', 'no', 'no'),
(8, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-09 22:31:10', 'yes', 'no', 'no'),
(14, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 22:37:50', 'yes', 'no', 'no'),
(15, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 23:44:05', 'yes', 'no', 'no'),
(16, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 23:44:08', 'yes', 'no', 'no'),
(17, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 23:44:10', 'yes', 'no', 'no'),
(18, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 23:44:13', 'yes', 'no', 'no'),
(19, 'petr_petrov', 'simon_buryan', 'Test message 1', '2018-12-12 21:21:02', 'yes', 'no', 'no'),
(20, 'simon_buryan', 'petr_petrov', 'Hi there :-)', '2018-12-12 21:21:30', 'yes', 'yes', 'no'),
(21, 'joe_smith', 'simon_buryan', 'Hey, how are you?', '2018-12-12 23:46:29', 'yes', 'yes', 'no'),
(22, 'petr_petrov', 'simon_buryan', 'ALOHA', '2018-12-12 23:48:52', 'yes', 'no', 'no'),
(23, 'simon_buryan', 'joe_smith', 'I am doing great! How about U?', '2018-12-12 23:51:59', 'yes', 'yes', 'no'),
(24, 'simon_buryan', 'petr_petrov', 'I am very well. What is new?', '2018-12-12 23:53:19', 'yes', 'yes', 'no'),
(25, 'george_smith', 'simon_buryan', 'Hi George :-)', '2018-12-12 23:55:05', 'yes', 'yes', 'no'),
(26, 'joe_smith', 'simon_buryan', 'thx', '2018-12-12 23:55:18', 'yes', 'yes', 'no'),
(27, 'joe_smith', 'simon_buryan', 'I am sending a hy from Prague.', '2018-12-13 13:20:43', 'yes', 'yes', 'no'),
(28, 'joe_smith', 'simon_buryan', 'Hi there, how is life?', '2018-12-14 12:00:56', 'yes', 'yes', 'no'),
(29, 'petr_petrov', 'simon_buryan', 'ahoy!', '2018-12-14 18:35:03', 'yes', 'no', 'no'),
(30, 'joe_smith', 'simon_buryan', 'ÄŒau!', '2018-12-14 18:42:58', 'yes', 'yes', 'no'),
(31, 'joe_smith', 'simon_buryan', 'ÄŒau!', '2018-12-14 18:51:59', 'yes', 'yes', 'no'),
(32, 'simon_buryan', 'petr_petrov', 'hi there clever guy.', '2018-12-15 19:45:35', 'yes', 'yes', 'no'),
(33, 'simon_buryan', 'joe_smith', 'I send you greeting from the town :-)', '2018-12-15 19:56:56', 'yes', 'yes', 'no'),
(34, 'simon_buryan', 'george_smith', 'ho are you rolling?', '2018-12-15 20:00:16', 'yes', 'yes', 'no'),
(35, 'simon_buryan', 'george_smith', 'Doing good? :-)', '2018-12-15 20:00:31', 'yes', 'yes', 'no'),
(36, 'simon_buryan', 'jim_yanke', 'hi there', '2018-12-15 20:01:11', 'yes', 'yes', 'no'),
(37, 'simon_buryan', 'jim_yanke', 'how is life? :-)', '2018-12-15 20:01:20', 'yes', 'yes', 'no'),
(38, 'jordan_jake', 'simon_buryan', 'Aloha new member ;-)', '2018-12-15 21:32:19', 'yes', 'yes', 'no'),
(39, 'simon_buryan', 'jordan_jake', 'hi there, how are you? :-)', '2018-12-15 21:33:08', 'yes', 'yes', 'no'),
(40, '1ai_bot', 'simon_buryan', 'Hi there', '2018-12-15 21:35:47', 'yes', 'no', 'no'),
(41, 'simon_buryan', 'martin_sklã¡la', 'ahoj', '2018-12-15 21:40:09', 'no', 'yes', 'no'),
(42, 'simon_buryan', '1ai_bot', 'Äau', '2018-12-15 21:40:32', 'yes', 'yes', 'no'),
(43, 'simon_buryan', 'jura_krava', 'nazdar', '2018-12-15 21:42:21', 'yes', 'yes', 'no'),
(44, 'simon_buryan', 'aneta_aneta', 'Äau', '2018-12-15 21:44:57', 'yes', 'yes', 'no'),
(45, 'jim_yanke', 'simon_buryan', 'Hello my friend :-)', '2018-12-15 22:51:51', 'no', 'no', 'no'),
(46, 'george_smith', 'simon_buryan', 'hello there', '2018-12-17 12:42:49', 'yes', 'yes', 'no'),
(47, 'simon_buryan', 'george_smith', 'how is life in P?', '2018-12-17 21:51:30', 'yes', 'yes', 'no'),
(48, 'simon_buryan', 'george_smith', 'how is life in P?', '2018-12-17 21:51:44', 'yes', 'yes', 'no'),
(49, 'simon_buryan', 'george_smith', 'amigo!', '2018-12-17 22:00:08', 'yes', 'yes', 'no'),
(50, 'simon_buryan', 'joe_smith', 'hi there, man ;-)', '2018-12-18 20:36:59', 'yes', 'yes', 'no'),
(51, 'simon_buryan', 'jordan_jake', 'hi there friend.', '2018-12-18 21:50:10', 'yes', 'yes', 'no'),
(52, 'jordan_jake', 'simon_buryan', 'hi there man', '2018-12-18 22:36:19', 'yes', 'yes', 'no'),
(53, 'jura_krava', 'simon_buryan', 'cau!', '2018-12-21 21:36:58', 'yes', 'no', 'no'),
(54, 'simon_buryan', 'jura_krava', 'Äau', '2018-12-22 15:36:15', 'yes', 'yes', 'no'),
(55, 'simon_buryan', 'jura_krava', 'Äau', '2018-12-22 15:36:25', 'yes', 'yes', 'no'),
(56, 'jura_krava', 'simon_buryan', 'Ahoj', '2019-01-13 15:38:48', 'no', 'no', 'no'),
(57, 'joe_smith', 'simon_buryan', 'Hi there, how are you?', '2019-01-13 15:39:06', 'no', 'no', 'no'),
(58, 'joe_smith', 'simon_buryan', 'hello', '2019-09-01 11:37:51', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Struktura tabulky `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `datetime`, `opened`, `viewed`) VALUES
(4, 'simon_buryan', 'joe_smith', 'Joe Smith posted on your profile', 'post.php?id=66', '2018-12-18 20:36:48', 'yes', 'yes'),
(5, 'simon_buryan', 'jordan_jake', 'Jordan Jake posted on your profile', 'post.php?id=68', '2018-12-18 21:49:28', 'yes', 'yes'),
(6, 'joe_smith', 'jordan_jake', 'Jordan Jake commented on your post', 'post.php?id=66', '2018-12-18 21:49:35', 'no', 'no'),
(7, 'simon_buryan', 'jordan_jake', 'Jordan Jake commented on your profile post', 'post.php?id=66', '2018-12-18 21:49:35', 'yes', 'yes'),
(8, 'joe_smith', 'jordan_jake', 'Jordan Jake commented on your post', 'post.php?id=66', '2018-12-18 21:49:37', 'no', 'no'),
(9, 'simon_buryan', 'jordan_jake', 'Jordan Jake commented on your profile post', 'post.php?id=66', '2018-12-18 21:49:37', 'yes', 'yes'),
(10, 'simon_buryan', 'jordan_jake', 'Jordan Jake commented on your post', 'post.php?id=56', '2018-12-18 21:49:51', 'yes', 'yes'),
(11, 'george_smith', 'jordan_jake', 'Jordan Jake commented on your profile post', 'post.php?id=56', '2018-12-18 21:49:51', 'no', 'no'),
(12, 'simon_buryan', 'jordan_jake', 'Jordan Jake liked your post', 'post.php?id=54', '2018-12-18 21:49:56', 'yes', 'yes'),
(13, 'simon_buryan', 'jordan_jake', 'Jordan Jake commented on your post', 'post.php?id=54', '2018-12-18 21:50:00', 'yes', 'yes'),
(14, 'jordan_jake', 'simon_buryan', 'Å imon Buryan commented on your profile post', 'post.php?id=54', '2018-12-18 22:35:01', 'no', 'yes'),
(15, 'simon_buryan', 'jordan_jake', 'Jordan Jake commented on your post', 'post.php?id=54', '2018-12-18 22:35:30', 'yes', 'yes'),
(16, 'jordan_jake', 'simon_buryan', 'Å imon Buryan liked your post', 'post.php?id=68', '2018-12-18 22:36:03', 'no', 'yes'),
(17, 'jordan_jake', 'simon_buryan', 'Å imon Buryan commented on your post', 'post.php?id=68', '2018-12-18 22:36:09', 'no', 'yes'),
(18, 'simon_buryan', 'jura_krava', 'Jura Krava posted on your profile', 'post.php?id=72', '2018-12-22 15:36:23', 'yes', 'yes'),
(19, 'george_smith', 'jordan_jake', 'Jordan Michael liked your post', 'post.php?id=58', '2018-12-23 21:13:09', 'no', 'no'),
(20, 'simon_buryan', 'jordan_jake', 'Jordan Michael liked your post', 'post.php?id=56', '2018-12-23 21:13:10', 'yes', 'yes'),
(21, 'george_smith', 'jordan_jake', 'Jordan Michael commented on your post', 'post.php?id=58', '2018-12-23 21:13:16', 'no', 'no'),
(22, 'simon_buryan', 'george_smith', 'George Smith liked your post', 'post.php?id=86', '2019-01-03 16:10:15', 'yes', 'yes'),
(23, 'simon_buryan', 'george_smith', 'George Smith liked your post', 'post.php?id=87', '2019-01-03 16:10:18', 'yes', 'yes'),
(24, 'simon_buryan', 'george_smith', 'George Smith commented on your post', 'post.php?id=87', '2019-01-03 16:10:24', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Struktura tabulky `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`, `image`) VALUES
(8, 'Fist clear post into the database.', 'simon_buryan', 'none', '2018-09-03 13:11:21', 'no', 'no', 0, ''),
(9, 'Fist clear post into the database.', 'simon_buryan', 'none', '2018-09-03 13:18:25', 'no', 'no', 0, ''),
(10, 'Hello', 'simon_buryan', 'none', '2018-09-04 19:35:23', 'no', 'no', 0, ''),
(14, 'post by Petr Petrov', 'petr_petrov', 'none', '2018-11-24 20:38:11', 'no', 'no', 1, ''),
(15, 'post by Petr Petrov', 'petr_petrov', 'none', '2018-11-24 20:38:46', 'no', 'no', 1, ''),
(16, 'my fist post', 'george_smith', 'none', '2018-11-24 20:41:09', 'no', 'no', 1, ''),
(17, 'Hello world', 'jim_yanke', 'none', '2018-11-24 20:42:26', 'no', 'no', 0, ''),
(18, 'hello there', 'simon_buryan', 'none', '2018-11-25 20:41:14', 'no', 'no', 1, ''),
(19, 'good day', 'simon_buryan', 'none', '2018-11-25 20:41:25', 'no', 'no', 0, ''),
(21, 'I am going to the city now :-)', 'joe_smith', 'none', '2018-12-01 16:24:18', 'no', 'no', 1, ''),
(22, 'Hi there', 'simon_buryan', 'george_smith', '2018-12-01 23:22:15', 'no', 'no', 0, ''),
(23, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-01 23:43:25', 'no', 'no', 0, ''),
(24, 'I like your potatoes.', 'simon_buryan', 'petr_petrov', '2018-12-01 23:43:25', 'no', 'no', 0, ''),
(25, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-01 23:50:28', 'no', 'no', 0, ''),
(26, 'Good night', 'petr_petrov', 'none', '2018-12-01 23:50:28', 'no', 'no', 0, ''),
(27, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-01 23:50:58', 'no', 'no', 0, ''),
(28, 'I like your blue jacket.', 'petr_petrov', 'simon_buryan', '2018-12-01 23:50:58', 'no', 'no', 1, ''),
(29, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-03 21:23:58', 'no', 'no', 0, ''),
(30, 'NejlÃ©pe se diskutuje u poÅ™Ã¡dnÃ©ho kafe.', 'simon_buryan', 'none', '2018-12-03 21:23:58', 'no', 'no', 0, ''),
(31, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-11 00:01:53', 'no', 'no', 0, ''),
(32, 'hallo?', 'simon_buryan', 'none', '2018-12-11 00:01:53', 'no', 'no', 0, ''),
(33, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-12 23:53:42', 'no', 'no', 0, ''),
(34, 'Hi there :-)', 'petr_petrov', 'simon_buryan', '2018-12-12 23:53:42', 'no', 'no', 1, ''),
(35, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-14 20:16:51', 'no', 'no', 0, ''),
(36, 'I feel great today :-)', 'simon_buryan', 'none', '2018-12-14 20:16:51', 'no', 'no', 1, ''),
(37, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-15 19:46:04', 'no', 'no', 0, ''),
(38, 'Great evening :-)', 'petr_petrov', 'simon_buryan', '2018-12-15 19:46:04', 'no', 'no', 0, ''),
(39, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-15 19:53:34', 'no', 'no', 0, ''),
(40, 'This evening is great :-)', 'jim_yanke', 'none', '2018-12-15 19:53:34', 'no', 'no', 0, ''),
(41, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-15 19:53:48', 'no', 'no', 0, ''),
(42, 'hello mister :-)', 'jim_yanke', 'simon_buryan', '2018-12-15 19:53:48', 'no', 'no', 1, ''),
(43, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-15 19:56:40', 'no', 'no', 0, ''),
(44, 'Hi there friend :-)', 'joe_smith', 'simon_buryan', '2018-12-15 19:56:40', 'no', 'no', 0, ''),
(45, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-15 19:59:49', 'no', 'no', 0, ''),
(46, 'I wish you all having a great time :-)', 'george_smith', 'none', '2018-12-15 19:59:49', 'no', 'no', 1, ''),
(47, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-15 20:00:04', 'no', 'no', 0, ''),
(48, 'Hi there amigo :-)', 'george_smith', 'simon_buryan', '2018-12-15 20:00:04', 'no', 'no', 1, ''),
(49, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-15 21:26:50', 'no', 'no', 0, ''),
(50, 'hello to all', 'martin_skã¡la', 'none', '2018-12-15 21:26:50', 'no', 'no', 0, ''),
(51, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-15 21:31:11', 'no', 'no', 0, ''),
(52, 'Hello there', 'jordan_jake', 'none', '2018-12-15 21:31:11', 'no', 'no', 0, ''),
(53, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-15 21:32:04', 'no', 'no', 0, ''),
(54, 'Hello member :-)', 'simon_buryan', 'jordan_jake', '2018-12-15 21:32:04', 'no', 'no', 2, ''),
(55, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-17 12:42:43', 'no', 'no', 0, ''),
(56, 'Hi there', 'simon_buryan', 'george_smith', '2018-12-17 12:42:43', 'no', 'no', 2, ''),
(57, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-17 12:58:40', 'no', 'no', 0, ''),
(58, 'Monday is today. :-)', 'george_smith', 'none', '2018-12-17 12:58:40', 'no', 'no', 1, ''),
(59, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-17 13:01:43', 'no', 'no', 0, ''),
(60, 'Wanna grab a tea? :-)', 'george_smith', 'simon_buryan', '2018-12-17 13:01:43', 'no', 'no', 0, ''),
(61, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-17 21:51:41', 'no', 'no', 0, ''),
(62, 'hi there mate,', 'george_smith', 'simon_buryan', '2018-12-17 21:51:41', 'no', 'no', 0, ''),
(63, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-17 22:00:04', 'no', 'no', 0, ''),
(64, 'amigo!', 'george_smith', 'simon_buryan', '2018-12-17 22:00:04', 'no', 'no', 0, ''),
(65, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-18 20:36:48', 'no', 'no', 0, ''),
(66, 'Good evening :-)', 'joe_smith', 'simon_buryan', '2018-12-18 20:36:48', 'no', 'no', 0, ''),
(67, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-18 21:49:28', 'no', 'no', 0, ''),
(68, 'hi there', 'jordan_jake', 'simon_buryan', '2018-12-18 21:49:28', 'no', 'no', 1, ''),
(69, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-22 15:36:06', 'no', 'no', 0, ''),
(70, 'I am here again :-)', 'jura_krava', 'none', '2018-12-22 15:36:06', 'no', 'no', 0, ''),
(71, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-22 15:36:23', 'no', 'no', 0, ''),
(72, 'ahoj,', 'jura_krava', 'simon_buryan', '2018-12-22 15:36:23', 'no', 'no', 0, ''),
(73, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-22 16:44:38', 'no', 'no', 0, ''),
(74, '<br><iframe width=\'420\' height=\'315\' src=\' \'><iframe><br>', 'simon_buryan', 'none', '2018-12-22 16:44:38', 'no', 'no', 0, ''),
(75, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-22 16:47:12', 'no', 'no', 0, ''),
(76, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/PQRyGacBRA4\'></iframe><br>', 'simon_buryan', 'none', '2018-12-22 16:47:12', 'no', 'no', 0, ''),
(77, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-22 16:53:50', 'no', 'no', 0, ''),
(78, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/CzAJhW1cfdw\'></iframe><br>', 'simon_buryan', 'none', '2018-12-22 16:53:50', 'no', 'no', 0, ''),
(79, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-22 17:12:50', 'no', 'no', 0, ''),
(80, 'Hello guys, I am lookinf forwards for the match on monday :-).', 'petr_petrov', 'none', '2018-12-22 17:12:50', 'no', 'no', 0, ''),
(81, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-22 17:16:02', 'no', 'no', 0, ''),
(82, 'Hello guys, I am looking forwards for the match on Tuesday:-). ', 'petr_petrov', 'none', '2018-12-22 17:16:02', 'no', 'no', 0, ''),
(83, 'hi all', 'simon_buryan', 'none', '2018-12-22 19:46:05', 'no', 'no', 0, 'assets/images/posts/5c1e947d85267thank-you-note.jpg'),
(84, 'I am free as a bird.', 'simon_buryan', 'none', '2018-12-22 19:50:38', 'no', 'no', 0, 'assets/images/posts/5c1e958e3e004picMe3.jpg'),
(85, 'New profile picture :-)', 'jordan_jake', 'none', '2018-12-23 21:03:16', 'no', 'no', 0, ''),
(86, 'thank you :-)', 'simon_buryan', 'none', '2019-01-03 15:59:59', 'no', 'no', 1, 'assets/images/posts/5c2e317fbbfd5thxalot.jpg'),
(87, 'Test of connection ;-)', 'simon_buryan', 'none', '2019-01-03 16:00:09', 'no', 'no', 1, ''),
(88, 'Heelo everyone :-)', 'simon_buryan', 'none', '2019-01-13 15:38:13', 'no', 'no', 0, ''),
(89, 'there are many possibilities to recycle....', 'simon_buryan', 'none', '2019-01-13 15:38:30', 'no', 'no', 0, 'assets/images/posts/5c3b5b7628049recycle.jpg'),
(90, 'new profile picture', 'george_smith', 'none', '2019-01-13 18:17:09', 'no', 'no', 0, 'assets/images/posts/5c3b80a5ae25cgeorge.jpg'),
(91, 'Recyklase je zÃ¡klad pro redukci odpadu.', 'simon_buryan', 'none', '2019-01-17 17:38:32', 'no', 'no', 0, 'assets/images/posts/5c40bd98804a0recycle.jpg'),
(92, 'Acadmics at work...', 'simon_buryan', 'none', '2019-08-31 17:25:42', 'no', 'no', 0, 'assets/images/posts/5d6a9f86d854aacademic beer.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `projects_cycle`
--

CREATE TABLE `projects_cycle` (
  `id` int(11) NOT NULL,
  `nazev` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `popis_dopady` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `podminky_vyuziti` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `typy_produktu` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `swot_silne` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `swot_slabe` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `swot_prilezitosti` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `swot_hrozby` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `cilova_skupina` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `ekonomicka_narocnost` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `personalni_narocnost` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `pravo` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `poznamky` text CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `projects_cycle`
--

INSERT INTO `projects_cycle` (`id`, `nazev`, `popis_dopady`, `podminky_vyuziti`, `typy_produktu`, `swot_silne`, `swot_slabe`, `swot_prilezitosti`, `swot_hrozby`, `cilova_skupina`, `ekonomicka_narocnost`, `personalni_narocnost`, `pravo`, `poznamky`, `datum`) VALUES
(1, 'Zpětný odběr EEZ + pneu', 'Maximální využití možnosti zpětného odběru vysloužilých výrobků a zprostředkování této možnosti občanům. Spolupráce s provozovateli kolektivních systémů sběru:\n *elektrické akumulátory\n* galvanické články a baterie\n *výbojky a zářivky\n * pneumatiky\n * elektrozařízení\nHledání dalších možností zpětného odběru – tonery apod.\nVyužití komplexních služeb kolektivních systémů – materiální i informační pomoci.', '* Navázání spolupráce s kolektivními systémy\n* Uzavření smlouvy\n* Informační osvěta v oblasti zpětného odběru\n', '* všechny produkty v rámci zpětného odběru', 'spolupráce s kolektivními systémy ', '', 'využití informačních a dalších prostředků, které nabízejí kolektivní systémy', '', 'Obce, obyvatelé', 'nízká', 'nízká', 'nejsou', 'Nic', '2018-09-03 13:11:21'),
(2, 'Optimální provoz sběrného dvoru – recyklační centrum', 'Umožnění využití dožilých předmětů umístěných na sběrný dvůr. Např. nábytku, stavebnin apod.', '* Speciálně vytvořené prostory v rámci sběrného dvora\n* Nároky na obsluhu  a provoz sběrného dvora', '* objemný odpad, * stavební odpad', 'přímý odklon dožilých produktů z odpadového toku k zájemcům o jejich využití.', 'zvýšení nároků na provoz sběrného dvora (prostory, informace o poskytovaných produktech atd.) .', 'rozšiřování dalších možností využití sběrného dvora.', 'zneužití odebraných produktů (spalování apod.), malý zájem ze strany odběratelů', 'Obce, obyvatelé', 'různá', 'vysoká', 'Žádná omezení', 'Nic', '2018-09-03 13:11:21'),
(3, 'Nákup kompostérů pro domácnosti - komunity', 'Odklon biologicky rozložitelných odpadů ze směsného komunálního odpadu obce', '- Finanční prostředky na pořízení kompostérů – dotace\n- Ochota ze strany uživatelů takto odpad zpracovávat', 'Veškeré druhy biologicky rozložitelného komunálního odpadu', 'odklon BRKO – BRO z materiálového toku směsného komunálního odpadu obce.', 'počáteční finanční náklady.', 'vznik a využití kompostů – zlepšení podmínek pro pěstování plodin.', '', 'Rodina, komunity v obci', 'Dle způsobu získání finančních prostředků', 'minimální', 'Žádná omezení', 'Nic', '2018-09-03 13:11:21'),
(4, 'Obecní kompostárna – využití biomasy z údržby veřejné zeleně', 'Plánování a zafinancování vzniku zařízení pro využití BRO + BRKO. Zařízení by sloužilo především pro občany obce, nakládání s biologicky rozložitelnými odpady vznikajícími na území obce (parky, zahrady, úpravy ploch, hřbitov, soukromé zahrádky a podobně). Snaha o zapojení místních zemědělců do nakládání s BRO v obci.', 'Zajištění finanční stránky\nZajištění vhodné plochy\nZajištění pracovní síly\nPodmínky pro svoz, objednávky svozu, provoz kompostárny\n', 'Všechny druhy biologicky rozložitelných odpadů a biologicky rozložitelných komunálních odpadů', 'odklon BRO a BRKO z materiálového toku SKO vznikajícího na území obce, přetvoření odpadů na využiteoný materiál', 'finanční náročnost, nároky na odbornou obsluhu, nároky na zábor plochy ', 'kompost a jeho užití na plochách obce, bezplatné hnojivo pro občany obce, případně prodej pro občany z jiných obcí', 'neodborný provoz kompostárny, finanční nároky, zápach', 'Obec, občané obce', 'Vysoká – vytipování ploch, pořízení a stavba zařízení, provoz kompostárny, svoz biologického odpadu', 'Zaměstnanci kompostárny, vyřízení případné dotace', 'Zákon o odpadech – povolení pro zařízení na využití odpadu', 'Nic', '2018-09-03 13:11:21'),
(5, 'Sběr textilu a oděvu v obci', 'Zdarma zapůjčené kontejnery v obci - využití oděvů a textilu pro charitu', 'Navázání spolupráce se společností, která zajišťuje sběr a nakládání s textilními materiály\nUzavření smlouvy o propůjčení a rozmístění speciálních nádob\n', 'Textilní materiály, oděvy', 'Odklon těchto odpadů z toku SKO obce', 'nezájem ze strany občanů, zavádění nového systému', 'využití vyhozených oděvů pro charitativní účely', 'riziko poškození kontejnerů, vykrádání', 'Obce, obyvatelé', 'Nízká, žádná', 'Pouze v počáteční fázi zajišťování sběru – smlouva o spolupráci', 'Žádná omezení', 'Nic', '2018-09-03 13:11:21'),
(6, 'RE – USE centra, Opravny produktů (nábytek, elektronika)', 'Vznik opraven, kde by se renovovaly, opravovaly, vyměňovaly díly u rozličných produktů používaných v domácnostech', '- Zájem ze strany podnikatelů\n- Informační kampaně o existenci opravny v obci', 'Objemný odpad - nábytek, elektrická a elektronická zařízení, osvětlovací zařízení', 'prověřené postupy, prodloužení doby užitku výrobku, šetření primárních surovin, zamezení vzniku odpadu, ryze lokální působení – využití místních vazeb, široké spektrum oborů i forem podpory', 'hromadění odpadu, nezájem o opravené produkty,', 'vznik nových pracovních pozic, zapojení sociálně ', 'nízký zájem spotřebitelů i dodavatelů', 'Obec, občané', 'Záleží na konkrétním způsobu podpory ze strany obce, může být vysoké (zvýhodněné půjčky), částečné (zvýhodněné nájmy obecních prostor) i nulové (propagace místních podnikatelů, pořádání trhů)', 'zaměstnanci', 'Nejsou – vše zajištěno smluvními vztahy.', 'Nic', '2018-09-03 13:11:21'),
(7, 'Organizování bleších trhů, obecní burzy', 'výměna, darování, prodej nepotřebných věcí mezi občany – neskončí v popelnici a na skládce', 'Obecní prostory k využití pro trhy, burzy\nPropagace akce\nZájem prodávajících i kupujících\n', 'Různé druhy', 'prodej a využití věcí, které by se jinak staly odpadem', 'náklady na úklid veřejného prostranství, pořízení prodejních stánků, pultů', 'posílení sociálních vazeb v obci', 'nezájem z řad prodejců, či kupujících', 'Obyvatelé obce', 'Dle nastavení pravidel pronájmu místa, pronájmu stánků a konstrukcí', 'Zajištění vstupu a vjezdu, občerstvení, úklidové práce', '', '', '2018-09-03 13:11:21');

-- --------------------------------------------------------

--
-- Struktura tabulky `trends`
--

CREATE TABLE `trends` (
  `title` varchar(50) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `trends`
--

INSERT INTO `trends` (`title`, `hits`) VALUES
('Hello', 1),
('Guys', 1),
('Looking', 1),
('Forwards', 1),
('Match', 1),
('Tuesday', 1),
('Hi', 1),
('Free', 1),
('Bird', 1),
('Profile', 2),
('Picture', 2),
('Thank', 1),
('Thynk', 2),
('Heelo', 1),
('Possibilities', 1),
('Recycle', 1),
('Recyklase', 1),
('Je', 1),
('Zklad', 1),
('Pro', 1),
('Redukci', 1),
('Odpadu', 1),
('Acadmics', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(20, 'Å imon', 'Buryan', 'simon_buryan', 'Simon.buryan@seznam.cz', '0cbb3ad466ebb557f1317c066e3db03a', '2018-03-18', 'assets/images/profile_pics/simon_buryan39ff495e94e8cbf1a011742a5a817efen.jpeg', 23, 11, 'no', ',petr_petrov,george_smith,joe_smith,jim_yanke,1ai_bot,martin_sklã¡la,aneta_aneta,jordan_jake,jura_krava,'),
(27, 'Å imon', 'Buryan', 'Å imon_buryan_1', 'Simon.buryan@cez.cz', '0129601396d16c84b32e0cc291f1d256', '2018-04-02', '', 0, 0, '', ''),
(42, 'Simon', 'Buryan', 'simon_buryan_1', 'Xburs02@vse.cz', '0cbb3ad466ebb557f1317c066e3db03a', '2018-09-03', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(43, 'Petr', 'Petrov', 'petr_petrov', 'Petr@user.us', '29d847ffce86b63c39a756a25b198751', '2018-11-24', 'assets/images/profile_pics/petrov.jpg', 8, 4, 'no', ',petr_petrov,george_smith,simon_buryan,jim_yanke,joe_smith,'),
(44, 'George', 'Smith', 'george_smith', 'George@user.us', '29d847ffce86b63c39a756a25b198751', '2018-11-24', 'assets/images/profile_pics/george_smitha31ebb442c1ebf39abf3c66c123d810en.jpeg', 8, 4, 'no', ',petr_petrov,simon_buryan,jordan_jake,'),
(45, 'Jim', 'Yanke', 'jim_yanke', 'Jim@user.us', '29d847ffce86b63c39a756a25b198751', '2018-11-24', 'assets/images/profile_pics/jim.jpg', 3, 1, 'no', ',simon_buryan,petr_petrov,'),
(46, 'Joe', 'Smith', 'joe_smith', 'Joe@user.us', '29d847ffce86b63c39a756a25b198751', '2018-11-30', 'assets/images/profile_pics/joe.jpg', 3, 1, 'no', ',Å imon_buryan,simon_buryan,petr_petrov,'),
(48, 'Martin', 'Sklã¡la', 'martin_sklã¡la', 'Martin@user.us', '29d847ffce86b63c39a756a25b198751', '2018-12-15', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ',simon_buryan,'),
(49, 'Jordan', 'Michael', 'jordan_jake', 'Jordan@user.us', '29d847ffce86b63c39a756a25b198751', '2018-12-15', 'assets/images/profile_pics/jordan_jake5a11310d47c9587067dbe6c31189f42en.jpeg', 3, 1, 'no', ',simon_buryan,george_smith,'),
(50, '1ai', 'Bot', '1ai_bot', '1ai@user.us', '29d847ffce86b63c39a756a25b198751', '2018-12-15', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ',simon_buryan,'),
(51, 'Jura', 'Krava', 'jura_krava', 'Jura@user.us', '29d847ffce86b63c39a756a25b198751', '2018-12-15', 'assets/images/profile_pics/defaults/head_deep_blue.png', 2, 0, 'no', ',simon_buryan,'),
(52, 'Aneta', 'Aneta', 'aneta_aneta', 'Aneta@user.us', '29d847ffce86b63c39a756a25b198751', '2018-12-15', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ',simon_buryan,');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `projects_cycle`
--
ALTER TABLE `projects_cycle`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pro tabulku `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pro tabulku `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pro tabulku `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pro tabulku `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pro tabulku `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
