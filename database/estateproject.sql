-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 01:46 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estateproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `pbr` int(11) NOT NULL,
  `name` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`pbr`, `name`) VALUES
(10000, 'Zagreb'),
(10010, 'Zagreb-Sloboština'),
(10020, 'Zagreb-Novi Zagreb'),
(10040, 'Zagreb-Dubrava'),
(10090, 'Zagreb-Susedgrad'),
(10250, 'Lučko'),
(10255, 'Gornji Stupnik'),
(10290, 'Zaprešić'),
(10295, 'Kupljenovo'),
(10310, 'Ivanić-Grad'),
(10315, 'Novoselec'),
(10340, 'Vrbovec'),
(10345, 'Gradec'),
(10360, 'Sesvete'),
(10370, 'Dugo Selo'),
(10380, 'Sveti Ivan Zelina'),
(10410, 'Velika Gorica'),
(10415, 'Novo Čiče'),
(10430, 'Samobor'),
(10435, 'Sveti Martin pod Okićem'),
(10450, 'Jastrebarsko'),
(10455, 'Kostanjevac'),
(20000, 'Dubrovnik'),
(20205, 'Topolo'),
(20210, 'Cavtat'),
(20215, 'Gruda'),
(20225, 'Babino Polje'),
(20230, 'Ston'),
(20235, 'Zaton Veliki'),
(20240, 'Trpanj'),
(20242, 'Oskorušno'),
(20245, 'Trstenik'),
(20250, 'Orebić'),
(20260, 'Korčula'),
(20270, 'Vela Luka'),
(20275, 'Žrnovo'),
(20290, 'Lastovo'),
(20340, 'Ploče'),
(20345, 'Staševica'),
(20350, 'Metković'),
(20355, 'Opuzen'),
(21000, 'Split'),
(21205, 'Donji Dolac'),
(21210, 'Solin'),
(21215, 'Kaštel Lukšić'),
(21220, 'Trogir'),
(21225, 'Drvenik Veliki'),
(21230, 'Sinj'),
(21232, 'Dicmo'),
(21235, 'Otišić'),
(21240, 'Trilj'),
(21245, 'Tijarica'),
(21250, 'Šestanovac'),
(21255, 'Zadvarje'),
(21260, 'Imotski'),
(21265, 'Studenci'),
(21270, 'Zagvozd'),
(21275, 'Dragljane'),
(21300, 'Makarska'),
(21310, 'Omiš'),
(21315, 'Dugi Rat'),
(21320, 'Baška Voda'),
(21325, 'Tučepi'),
(21330, 'Gradac'),
(21335, 'Podaca'),
(21400, 'Supetar'),
(21405, 'Milna'),
(21410, 'Postira'),
(21420, 'Bol'),
(21425, 'Selca'),
(21430, 'Grohote'),
(21450, 'Hvar'),
(21460, 'Stari Grad'),
(21465, 'Jelsa'),
(21480, 'Vis'),
(21485, 'Komiža'),
(22000, 'Šibenik'),
(22010, 'Šibenik-Brodarica'),
(22020, 'Šibenik-Ražine'),
(22030, 'Šibenik-Zablaće'),
(22205, 'Perković'),
(22215, 'Zaton'),
(22235, 'Kaprije'),
(22240, 'Tisno'),
(22300, 'Knin'),
(22305, 'Kistanje'),
(22310, 'Kijevo'),
(22320, 'Drniš'),
(23000, 'Zadar'),
(23205, 'Bibinje'),
(23210, 'Biograd na moru'),
(23235, 'Vrsi'),
(23245, 'Tribanj'),
(23250, 'Pag'),
(23275, 'Ugljan'),
(23285, 'Brbinj'),
(23295, 'Silba'),
(23420, 'Benkovac'),
(23440, 'Gračac'),
(23445, 'Srb'),
(23450, 'Obrovac'),
(31000, 'Osijek'),
(31205, 'Aljmaš'),
(31215, 'Ernestinovo'),
(31220, 'Višnjevac'),
(31225, 'Breznica Našička'),
(31300, 'Beli Manastir'),
(31301, 'Branjin Vrh'),
(31305, 'Draž'),
(31315, 'Karanac'),
(31325, 'Čeminac'),
(31400, 'Đakovo'),
(31410, 'Strizivojna'),
(31415, 'Selci Đakovački'),
(31500, 'Našice'),
(31530, 'Podravska Moslavina'),
(31531, 'Viljevo'),
(31540, 'Donji Miholjac'),
(31550, 'Valpovo'),
(31555, 'Marijanci'),
(32000, 'Vukovar'),
(32100, 'Vinkovci'),
(32225, 'Bobota'),
(32235, 'Bapska'),
(32240, 'Mirkovci'),
(32245, 'Nijemci'),
(32255, 'Soljani'),
(32260, 'Gunja'),
(32270, 'Županja'),
(32275, 'Bošnjaci'),
(32280, 'Jarmina'),
(33000, 'Virovitica'),
(33405, 'Pitomača'),
(33410, 'Suhopolje'),
(33515, 'Orahovica'),
(33520, 'Slatina'),
(33525, 'Sopje'),
(34000, 'Požega'),
(34310, 'Pleternica'),
(34315, 'Ratkovica'),
(34320, 'Orljavac'),
(34330, 'Velika'),
(34335, 'Vetovo'),
(34340, 'Kutjevo'),
(34350, 'Čaglin'),
(34550, 'Pakrac'),
(35000, 'Slavonski Brod'),
(35210, 'Vrpolje'),
(35215, 'Svilaj'),
(35220, 'Slavonski Šamac'),
(35250, 'Oriovac'),
(35255, 'Slavonski Kobaš'),
(35400, 'Nova Gradiška'),
(35420, 'Staro Petrovo Selo'),
(35425, 'Davor'),
(35430, 'Okučani'),
(35435, 'Stara Gradiška'),
(40000, 'Čakovec'),
(40305, 'Nedelišče'),
(40315, 'Mursko Središče'),
(40320, 'Donji Kraljevec'),
(40325, 'Draškovec'),
(42000, 'Varaždin'),
(42205, 'Vidovec'),
(42220, 'Novi Marof'),
(42225, 'Breznički Hum'),
(42230, 'Ludbreg'),
(42240, 'Ivanec'),
(42245, 'Donja Voća'),
(42250, 'Lepoglava'),
(42255, 'Donja Višnjica'),
(43000, 'Bjelovar'),
(43240, 'Čazma'),
(43245, 'Gornji Draganec'),
(43270, 'Veliki Grđevac'),
(43271, 'Velika Pisanica'),
(43280, 'Garešnica'),
(43285, 'Velika Trnovitica'),
(43290, 'Grubišno Polje'),
(43500, 'Daruvar'),
(43505, 'Končanica'),
(43531, 'Veliki Bastaji'),
(44000, 'Sisak'),
(44010, 'Sisak-Caprag'),
(44205, 'Donja Bačuga'),
(44210, 'Sunja'),
(44250, 'Petrinja'),
(44271, 'Letovanić'),
(44320, 'Kutina'),
(44325, 'Krapje'),
(44330, 'Novska'),
(44400, 'Glina'),
(44405, 'Mali Gradac'),
(44410, 'Gvozd'),
(44415, 'Topusko'),
(44425, 'Gornja Bučica'),
(44430, 'Hrvatska Kostajnica'),
(44435, 'Divuša'),
(44440, 'Dvor'),
(44450, 'Hrvatska Dubica'),
(47000, 'Karlovac'),
(47201, 'Draganići'),
(47205, 'Vukmanić'),
(47220, 'Vojnić'),
(47240, 'Slunj'),
(47245, 'Rakovica'),
(47250, 'Duga Resa'),
(47251, 'Bosiljevo'),
(47280, 'Ozalj'),
(47285, 'Radatovići'),
(47300, 'Ogulin'),
(47302, 'Oštarije'),
(47305, 'Lička Jesenica'),
(48000, 'Koprivnica'),
(48260, 'Križevci'),
(48265, 'Raven'),
(48305, 'Reka'),
(48325, 'Novigrad Podravski'),
(48350, 'Đurđevac'),
(48355, 'Novo Virje'),
(49000, 'Krapina'),
(49210, 'Zabok'),
(49215, 'Tuhelj'),
(49225, 'Đurmanec'),
(49240, 'Donja Stubica'),
(49245, 'Gornja Stubica'),
(49250, 'Zlatar'),
(49255, 'Novi Golubovec'),
(49290, 'Klanjec'),
(49295, 'Kumrovec'),
(51000, 'Rijeka'),
(51211, 'Matulji'),
(51215, 'Kastav'),
(51225, 'Praputnjak'),
(51250, 'Novi Vinodolski'),
(51251, 'Ledenice'),
(51260, 'Crikvenica'),
(51265, 'Dramalj'),
(51280, 'Rab'),
(51300, 'Delnice'),
(51305, 'Tršće'),
(51315, 'Mrkopalj'),
(51325, 'Moravice'),
(51410, 'Opatija'),
(51415, 'Lovran'),
(51500, 'Krk'),
(51515, 'Šilo'),
(51550, 'Mali Lošinj'),
(51555, 'Belej'),
(52000, 'Pazin'),
(52100, 'Pula'),
(52210, 'Rovinj (Rovigno)'),
(52215, 'Vodnjan (Dignano)'),
(52220, 'Labin'),
(52420, 'Buzet'),
(52425, 'Roč'),
(52440, 'Poreč'),
(52445, 'Baderna'),
(52450, 'Vrsar'),
(52460, 'Buje (Buie)'),
(52465, 'Tar'),
(52470, 'Umag (Umago)'),
(52475, 'Savudrija (Salvore)'),
(53000, 'Gospić'),
(53205, 'Medak'),
(53220, 'Otočac'),
(53225, 'Švica'),
(53230, 'Korenica'),
(53235, 'Bunić'),
(53250, 'Donji Lapac'),
(53260, 'Brinje'),
(53270, 'Senj'),
(53285, 'Lukovo');

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `id` int(10) UNSIGNED NOT NULL,
  `posted_at` date NOT NULL DEFAULT current_timestamp(),
  `posted_by` int(10) UNSIGNED NOT NULL,
  `city` int(10) NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `floors` int(11) NOT NULL,
  `property_size` int(11) NOT NULL,
  `living_space` int(11) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `terrace` tinyint(1) NOT NULL,
  `construction_year` int(11) NOT NULL,
  `last_renovation` int(11) NOT NULL,
  `energy_class` varchar(2) COLLATE utf8_croatian_ci NOT NULL,
  `heating_system` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `lift` tinyint(1) NOT NULL,
  `barrier_free` tinyint(1) NOT NULL,
  `internet` tinyint(1) NOT NULL,
  `garage` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`status`, `id`, `posted_at`, `posted_by`, `city`, `type`, `price`, `rooms`, `floors`, `property_size`, `living_space`, `balcony`, `terrace`, `construction_year`, `last_renovation`, `energy_class`, `heating_system`, `parking`, `lift`, `barrier_free`, `internet`, `garage`, `description`) VALUES
(1, 1, '2020-02-10', 1, 23420, 4, 58000, 3, 2, 67, 45, 1, 1, 2009, 2019, 'A', 'Not Specified', 1, 1, 1, 0, 1, 'Lorem ipsum'),
(1, 2, '2020-02-10', 1, 52220, 2, 58000, 3, 2, 67, 45, 1, 1, 2009, 2019, 'A', 'Not Specified', 1, 1, 0, 0, 1, 'Lorem ipsum'),
(1, 3, '2020-02-10', 1, 20260, 3, 34000, 3, 2, 67, 45, 1, 1, 2009, 2019, 'A', 'Not Specified', 1, 1, 1, 0, 1, 'Lorem ipsum'),
(1, 4, '2020-02-10', 3, 10000, 7, 95000, 3, 3, 67, 45, 1, 1, 2006, 2019, 'B', 'Not Specified', 1, 0, 0, 0, 1, 'Lorem...............'),
(1, 5, '2020-02-10', 3, 22320, 7, 95000, 1, 3, 67, 45, 1, 1, 2002, 2019, 'C', 'Not Specified', 1, 0, 1, 0, 1, 'Lorem...............Ipsum'),
(1, 6, '2020-02-10', 3, 32235, 10, 67000, 5, 0, 67, 0, 0, 0, 0, 0, 'D', '', 0, 0, 1, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 7, '2020-02-10', 3, 31225, 10, 450000, 3, 0, 56, 0, 0, 0, 0, 0, 'A', '', 1, 0, 0, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 8, '2020-02-10', 3, 23440, 2, 98000, 5, 0, 54, 0, 0, 0, 0, 0, 'C', '', 0, 1, 0, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 9, '2020-02-10', 3, 48260, 8, 76000, 7, 0, 97, 0, 0, 0, 0, 0, 'B', '', 0, 0, 0, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 10, '2020-02-10', 3, 21430, 10, 85000, 8, 0, 120, 0, 0, 0, 0, 0, 'B', '', 0, 0, 1, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 11, '2020-02-10', 3, 42240, 5, 34000, 2, 0, 28, 0, 0, 0, 0, 0, 'D', '', 1, 0, 1, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 12, '2020-02-10', 3, 48260, 3, 52000, 6, 0, 75, 0, 0, 0, 0, 0, 'A', '', 1, 1, 0, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 13, '2020-02-10', 3, 20215, 2, 88200, 3, 0, 56, 0, 0, 0, 0, 0, 'E', '', 1, 0, 0, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 14, '2020-02-10', 3, 10310, 8, 75620, 2, 0, 20, 0, 0, 0, 0, 0, 'F', '', 1, 0, 1, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 15, '2020-02-10', 3, 23440, 6, 97250, 8, 0, 150, 0, 0, 0, 0, 0, 'A', '', 1, 0, 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 16, '2020-02-10', 3, 21320, 1, 56300, 3, 0, 42, 0, 0, 0, 0, 0, 'C', '', 1, 0, 1, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 17, '2020-02-10', 3, 43000, 3, 86500, 7, 0, 120, 0, 0, 0, 0, 0, 'B', '', 1, 0, 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 18, '2020-02-10', 3, 44450, 8, 54230, 2, 0, 32, 0, 0, 0, 0, 0, 'B', '', 1, 0, 1, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 19, '2020-02-10', 3, 52445, 9, 23450, 1, 0, 50, 0, 0, 0, 0, 0, 'C', '', 0, 0, 1, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 20, '2020-02-10', 3, 44450, 10, 43250, 2, 0, 30, 0, 0, 0, 0, 0, 'A', '', 0, 0, 1, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 21, '2020-02-10', 3, 10295, 10, 45230, 4, 0, 55, 0, 0, 0, 0, 0, 'F', '', 0, 1, 1, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 22, '2020-02-10', 3, 53205, 10, 65200, 4, 0, 33, 0, 0, 0, 0, 0, 'A', '', 1, 0, 1, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 23, '2020-02-10', 3, 10255, 3, 89300, 8, 0, 150, 0, 0, 0, 0, 0, 'C', '', 1, 1, 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 24, '2020-02-10', 3, 23205, 2, 75500, 3, 0, 35, 0, 0, 0, 0, 0, 'B', '', 1, 1, 0, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 25, '2020-02-10', 3, 43500, 3, 54200, 8, 0, 120, 0, 0, 0, 0, 0, 'B', '', 1, 0, 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a gravida est, et rhoncus ex. Curabitur ornare faucibus accumsan. Morbi et nunc fringilla, eleifend quam sed, dictum ipsum. Curabitur commodo porta nisi. Aliquam odio enim, blandit at nibh quis, vulputate ullamcorper mi. Vivamus sodales orci quis risus ullamcorper sodales. Suspendisse tempor mauris fermentum mi porta tincidunt. Fusce lobortis varius nunc, varius lacinia lorem gravida id. Maecenas sit amet tincidunt turpis. In varius ut felis vitae efficitur. Integer id odio vel metus malesuada rhoncus id quis leo. Sed sed lorem efficitur, dapibus ligula in, suscipit nulla.\r\n\r\nSuspendisse elementum, odio facilisis facilisis vestibulum, turpis velit scelerisque nisl, sagittis rutrum ipsum orci ac purus. Maecenas in sapien a justo pulvinar vehicula vitae eu tortor. Vestibulum neque mauris, vulputate quis feugiat a, sodales et mauris. Morbi quis dictum velit. Pellentesque eget pretium leo. Morbi a quam posuere, malesuada est sit amet, feugiat metus. Proin pulvinar porttitor tortor ut aliquet. Praesent pharetra tortor a vehicula ornare. Phasellus id blandit metus. Nullam ac neque ac velit vehicula sollicitudin eget vitae orci. Vestibulum pretium erat non lacinia vulputate.'),
(1, 44, '2020-02-10', 3, 21420, 4, 140000, 2, 3, 45, 0, 0, 0, 0, 0, '', '', 1, 0, 1, 1, 1, 'Lol');

-- --------------------------------------------------------

--
-- Table structure for table `estatetypes`
--

CREATE TABLE `estatetypes` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `estatetypes`
--

INSERT INTO `estatetypes` (`id`, `type`) VALUES
(1, 'Cottage'),
(2, 'Flat'),
(3, 'House'),
(4, 'Apartment'),
(5, 'Cabin'),
(6, 'Mansion'),
(7, 'Villa'),
(8, 'Bungalow'),
(9, 'Barn'),
(10, 'Chalet');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `phone_nmb` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `registerd_date` date NOT NULL DEFAULT current_timestamp(),
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone_nmb`, `registerd_date`, `isAdmin`) VALUES
(1, 'Daniel', 'Lovrinov', 'dlovrin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0996929136', '2020-02-10', 1),
(3, 'Filip', 'Medak', 'fmedak@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '2020-02-10', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`pbr`);

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posted_by` (`posted_by`),
  ADD KEY `city` (`city`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `estatetypes`
--
ALTER TABLE `estatetypes`
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
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `estatetypes`
--
ALTER TABLE `estatetypes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estates`
--
ALTER TABLE `estates`
  ADD CONSTRAINT `estates_ibfk_1` FOREIGN KEY (`posted_by`) REFERENCES `users` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `estates_ibfk_2` FOREIGN KEY (`type`) REFERENCES `estatetypes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estates_ibfk_3` FOREIGN KEY (`city`) REFERENCES `city` (`pbr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
