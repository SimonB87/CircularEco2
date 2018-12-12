-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 11:11 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects_cycle`
--
ALTER TABLE `projects_cycle`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
