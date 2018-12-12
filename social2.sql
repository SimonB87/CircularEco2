-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 12:57 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
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
-- Dumping data for table `comments`
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
(11, 'hi', 'simon_buryan', 'simon_buryan', '2018-12-11 00:02:00', 'no', 32);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_to`, `user_from`) VALUES
(1, '', 'Å imon_buryan'),
(2, '', 'Å imon_buryan'),
(3, '', 'Å imon_buryan'),
(4, '', 'Å imon_buryan'),
(6, 'petr_petrov', 'joe_smith');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
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
(27, 'simon_buryan', 28);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
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
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(1, 'petr_petrov', 'simon_buryan', 'Send', '2018-12-09 00:58:40', 'no', 'no', 'no'),
(2, 'petr_petrov', 'simon_buryan', 'Send', '2018-12-09 00:58:49', 'no', 'no', 'no'),
(3, 'petr_petrov', 'simon_buryan', 'Send', '2018-12-09 01:02:23', 'no', 'no', 'no'),
(5, 'simon_buryan', 'petr_petrov', 'Send This', '2018-12-09 01:04:53', 'yes', 'no', 'no'),
(6, 'simon_buryan', 'petr_petrov', 'Send This', '2018-12-09 01:19:53', 'yes', 'no', 'no'),
(7, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-09 22:30:25', 'no', 'no', 'no'),
(8, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-09 22:31:10', 'no', 'no', 'no'),
(14, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 22:37:50', 'no', 'no', 'no'),
(15, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 23:44:05', 'no', 'no', 'no'),
(16, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 23:44:08', 'no', 'no', 'no'),
(17, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 23:44:10', 'no', 'no', 'no'),
(18, 'petr_petrov', 'simon_buryan', 'Send This', '2018-12-11 23:44:13', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(8, 'Fist clear post into the database.', 'simon_buryan', 'none', '2018-09-03 13:11:21', 'no', 'no', 0),
(9, 'Fist clear post into the database.', 'simon_buryan', 'none', '2018-09-03 13:18:25', 'no', 'no', 0),
(10, 'Hello', 'simon_buryan', 'none', '2018-09-04 19:35:23', 'no', 'no', 0),
(14, 'post by Petr Petrov', 'petr_petrov', 'none', '2018-11-24 20:38:11', 'no', 'no', 1),
(15, 'post by Petr Petrov', 'petr_petrov', 'none', '2018-11-24 20:38:46', 'no', 'no', 1),
(16, 'my fist post', 'george_smith', 'none', '2018-11-24 20:41:09', 'no', 'no', 1),
(17, 'Hello world', 'jim_yanke', 'none', '2018-11-24 20:42:26', 'no', 'no', 0),
(18, 'hello there', 'simon_buryan', 'none', '2018-11-25 20:41:14', 'no', 'no', 1),
(19, 'good day', 'simon_buryan', 'none', '2018-11-25 20:41:25', 'no', 'no', 0),
(21, 'I am going to the city now :-)', 'joe_smith', 'none', '2018-12-01 16:24:18', 'no', 'no', 1),
(22, 'Hi there', 'simon_buryan', 'george_smith', '2018-12-01 23:22:15', 'no', 'no', 0),
(23, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-01 23:43:25', 'no', 'no', 0),
(24, 'I like your potatoes.', 'simon_buryan', 'petr_petrov', '2018-12-01 23:43:25', 'no', 'no', 0),
(25, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-01 23:50:28', 'no', 'no', 0),
(26, 'Good night', 'petr_petrov', 'none', '2018-12-01 23:50:28', 'no', 'no', 0),
(27, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-01 23:50:58', 'no', 'no', 0),
(28, 'I like your blue jacket.', 'petr_petrov', 'simon_buryan', '2018-12-01 23:50:58', 'no', 'no', 1),
(29, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-03 21:23:58', 'no', 'no', 0),
(30, 'NejlÃ©pe se diskutuje u poÅ™Ã¡dnÃ©ho kafe.', 'simon_buryan', 'none', '2018-12-03 21:23:58', 'no', 'no', 0),
(31, 'sda', 'asdfsd', 'asdfsdaf', '2018-12-11 00:01:53', 'no', 'no', 0),
(32, 'hallo?', 'simon_buryan', 'none', '2018-12-11 00:01:53', 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects_cycle`
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
-- Dumping data for table `projects_cycle`
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
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(20, 'Å imon', 'Buryan', 'simon_buryan', 'Simon.buryan@seznam.cz', '0cbb3ad466ebb557f1317c066e3db03a', '2018-03-18', 'assets/images/profile_pics/simon_buryanb4721c92526ba8961081042cfd1a688dn.jpeg', 9, 4, 'no', ',petr_petrov,george_smith,joe_smith,jim_yanke,'),
(27, 'Å imon', 'Buryan', 'Å imon_buryan_1', 'Simon.buryan@cez.cz', '0129601396d16c84b32e0cc291f1d256', '2018-04-02', '', 0, 0, '', ''),
(42, 'Simon', 'Buryan', 'simon_buryan_1', 'Xburs02@vse.cz', '0cbb3ad466ebb557f1317c066e3db03a', '2018-09-03', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(43, 'Petr', 'Petrov', 'petr_petrov', 'Petr@user.us', '29d847ffce86b63c39a756a25b198751', '2018-11-24', 'assets/images/profile_pics/defaults/head_carrot.png', 4, 3, 'no', ',petr_petrov,george_smith,simon_buryan,jim_yanke,'),
(44, 'George', 'Smith', 'george_smith', 'George@user.us', '29d847ffce86b63c39a756a25b198751', '2018-11-24', 'assets/images/profile_pics/defaults/head_pumpkin.png', 1, 1, 'no', ',petr_petrov,simon_buryan,'),
(45, 'Jim', 'Yanke', 'jim_yanke', 'Jim@user.us', '29d847ffce86b63c39a756a25b198751', '2018-11-24', 'assets/images/profile_pics/defaults/head_pete_river.png', 1, 0, 'no', ',simon_buryan,petr_petrov,'),
(46, 'Joe', 'Smith', 'joe_smith', 'Joe@user.us', '29d847ffce86b63c39a756a25b198751', '2018-11-30', 'assets/images/profile_pics/defaults/head_emerald.png', 1, 1, 'no', ',Å imon_buryan,simon_buryan,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_cycle`
--
ALTER TABLE `projects_cycle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
