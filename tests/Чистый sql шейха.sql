-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 06 2023 г., 16:09
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `udb6211_2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `config_site`
--

CREATE TABLE `config_site` (
  `str` int NOT NULL,
  `str2` int NOT NULL,
  `doctupe` text NOT NULL,
  `kodirovka` text NOT NULL,
  `styl_skript_icon` text NOT NULL,
  `wirina_stranici` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `config_site`
--

INSERT INTO `config_site` (`str`, `str2`, `doctupe`, `kodirovka`, `styl_skript_icon`, `wirina_stranici`) VALUES
(40, 50, '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html xmlns=\"https://www.w3.org/1999/xhtml\">', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n', '<link rel=\"stylesheet\" type=\"text/css\" href=\"/style/style_site.css?id=241\" />\n<link rel=\"stylesheet\" type=\"text/css\" href=\"/style/style.css?id=242\" />\n<link rel=\"stylesheet\" type=\"text/css\" href=\"/style/meny.css?id=231\"/>\n<link rel=\"stylesheet\" type=\"text/css\" href=\"/style/forma.css?id=130\"/>\n<script type=\"text/javascript\" src=\"/js/jquery.js\"></script>\n<script type=\"text/javascript\" src=\"/js/scripts_all.js?id=227\"></script>\n<link rel=\"SHORTCUT ICON\" type=\"image/x-icon\" href=\"https://lavka-sheikha.ru/favicon.svg\" />\n', 870);

-- --------------------------------------------------------

--
-- Структура таблицы `filters_pol`
--

CREATE TABLE `filters_pol` (
  `id` int NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `filters_pol`
--

INSERT INTO `filters_pol` (`id`, `name`) VALUES
(2, 'Для него'),
(1, 'Для нее'),
(3, 'Для всех');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_name` char(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_number` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MD` int NOT NULL,
  `paid_status` int NOT NULL DEFAULT '0',
  `1c_status` int NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posetiteli`
--

CREATE TABLE `posetiteli` (
  `id` int NOT NULL DEFAULT '0',
  `counter` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `posetiteli`
--

INSERT INTO `posetiteli` (`id`, `counter`) VALUES
(0, 262345);

-- --------------------------------------------------------

--
-- Структура таблицы `post_cat1`
--

CREATE TABLE `post_cat1` (
  `id` int NOT NULL,
  `id_cat1` int NOT NULL,
  `id_group` int NOT NULL,
  `sort` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(120) NOT NULL,
  `zagolovok_h1` varchar(150) NOT NULL,
  `seo_url` varchar(150) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `view` int NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL,
  `map_block` int NOT NULL,
  `kolvo_zametok` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `site_pages`
--

CREATE TABLE `site_pages` (
  `id` int NOT NULL,
  `translit_url` varchar(120) NOT NULL,
  `url` varchar(150) NOT NULL,
  `lastmod` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `site_pages`
--

INSERT INTO `site_pages` (`id`, `translit_url`, `url`, `lastmod`) VALUES
(70, 'korzina/', 'korzina.php', '2021-09-02'),
(67, 'poisk/', 'poisk.php', '2021-08-31'),
(62, 'catalog/', 'catalog.php', '2021-08-06'),
(1783, 'cart/', 'cart.php', '2023-06-25'),
(1784, 'order/', 'order.php', '2023-06-25'),
(1773, 'catalog/', 'catalog.php', '2023-06-25'),
(1774, 'catalog/parfum/', 'blocks/parfums.php', '2023-06-25'),
(1776, 'catalog/parfum/brands/', 'brands.php', '2023-06-25'),
(2431, 'thanks/', 'thanks.php', '2021-08-06'),
(2437, 'about/', 'about.php', '2021-09-02'),
(2438, 'reviews/', 'reviews.php', '2023-10-11');

-- --------------------------------------------------------

--
-- Структура таблицы `tovari`
--

CREATE TABLE `tovari` (
  `id` int NOT NULL,
  `opisanie` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cat` int NOT NULL DEFAULT '0',
  `mugskaya` int DEFAULT NULL,
  `genskaya` int DEFAULT NULL,
  `seo_url` varchar(250) NOT NULL,
  `nazvanie` varchar(250) NOT NULL DEFAULT '',
  `status` int NOT NULL DEFAULT '0',
  `old_price` int NOT NULL DEFAULT '0',
  `date_time_add` datetime DEFAULT NULL,
  `po_ml` text CHARACTER SET cp1251 COLLATE cp1251_general_ci,
  `uid` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_general_ci DEFAULT NULL,
  `realcat` text
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `tovari`
--

INSERT INTO `tovari` (`id`, `opisanie`, `image`, `cat`, `mugskaya`, `genskaya`, `seo_url`, `nazvanie`, `status`, `old_price`, `date_time_add`, `po_ml`, `uid`, `realcat`) VALUES
(2271, '', NULL, 156, 1, 1, 'shaari', 'SHA\'ARI', 0, 0, '2023-09-18 01:46:28', '-100-', '|688a99da-7c0a-11eb-845d-f0761c70905c|', ''),
(2272, '', NULL, 156, 1, 1, 'adeeb-lattafa', 'ADEEB LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|688a99dc-7c0a-11eb-845d-f0761c70905c|', ''),
(2273, '', NULL, 156, 1, 1, 'teeb-al-musk-lattafa', 'TEEB AL MUSK LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|688a99de-7c0a-11eb-845d-f0761c70905c|', ''),
(2274, '', NULL, 156, 1, 1, 'ekhtiari-lattafa', 'EKHTIARI LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|688a99e0-7c0a-11eb-845d-f0761c70905c|', ''),
(2275, '', NULL, 156, 1, 1, 'basha-lattafa', 'BASHA LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|688a99e2-7c0a-11eb-845d-f0761c70905c|', ''),
(2276, '', NULL, 156, 1, 1, 'khaltaat-al-arabia-royal-delaght-lattafa', 'KHALTAAT AL ARABIA ROYAL DELAGHT LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|688a99e4-7c0a-11eb-845d-f0761c70905c|', ''),
(2277, '', NULL, 157, 1, 1, 'supremacy-incense', 'SUPREMACY INCENSE', 0, 0, '2023-09-18 01:46:28', '-100-', '|96dc779e-9aad-11eb-8463-f0761c70905c|', 'parfum'),
(2278, '', NULL, 156, 1, 1, 'badee-al-oud-lattafa', 'BADEE AL OUD LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|9d73b31c-9ba1-11eb-8465-f0761c70905c|', ''),
(2279, '', NULL, 156, 1, 1, 'guinea', 'GUINEA', 0, 0, '2023-09-18 01:46:28', '-100-', '|9d73b322-9ba1-11eb-8465-f0761c70905c|', ''),
(2280, '', NULL, 157, 1, 1, 'ornament-muzh-homme', 'ORNAMENT  МУЖ. HOMME', 0, 0, '2023-09-18 01:46:28', '-100-', '|9d73b32e-9ba1-11eb-8465-f0761c70905c|', 'parfum'),
(2281, '', NULL, 157, 1, 1, 'dahaab-saafi', 'DAHAAB SAAFI', 0, 0, '2023-09-18 01:46:28', '-100-', '|9d73b330-9ba1-11eb-8465-f0761c70905c|', 'parfum'),
(2282, '', NULL, 157, 1, 1, '9-am-afnan', '9 AM   AFNAN', 0, 0, '2023-09-18 01:46:28', '-100-', '|9d73b332-9ba1-11eb-8465-f0761c70905c|', 'parfum'),
(2283, '', NULL, 157, 1, 1, 'sandal-abiyad', 'SANDAL ABIYAD', 0, 0, '2023-09-18 01:46:28', '-20-', '|9d73b334-9ba1-11eb-8465-f0761c70905c|', ''),
(2284, '', NULL, 156, 1, 1, 'udalit', 'удалить', 0, 0, '2023-09-18 01:46:28', '--', '|26a534b1-9c7a-11eb-8465-f0761c70905c|', ''),
(2285, '', NULL, 156, 1, 1, 'lahdath-lattafa', 'LAHDATH LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f6813-9d13-11eb-8465-f0761c70905c|', ''),
(2286, '', NULL, 156, 1, 1, 'mazaaji', 'MAZAAJI', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f6815-9d13-11eb-8465-f0761c70905c|', ''),
(2287, '', NULL, 156, 1, 1, 'raed-luxe-lattafa', 'RAED LUXE LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f6819-9d13-11eb-8465-f0761c70905c|', ''),
(2288, '', NULL, 156, 1, 1, 'raed', 'RA\'ED', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f681b-9d13-11eb-8465-f0761c70905c|', ''),
(2289, '', NULL, 156, 1, 1, 'sumou-lattafa', 'SUMOU LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f681f-9d13-11eb-8465-f0761c70905c|', ''),
(2290, '', NULL, 156, 1, 1, 'fakhar-white-lattafa', 'FAKHAR WHITE LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f6823-9d13-11eb-8465-f0761c70905c|', ''),
(2291, '', NULL, 156, 1, 1, 'fakhar-black-lattafa', 'FAKHAR BLACK LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f6825-9d13-11eb-8465-f0761c70905c|', ''),
(2292, '', NULL, 156, 1, 1, 'elite-just-white', 'ELITE JUST WHITE', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f6827-9d13-11eb-8465-f0761c70905c|', ''),
(2293, '', NULL, 156, 1, 1, 'ikhtiyaar-al-ameerath-suroori', 'IKHTIYAAR AL AMEERATH SUROORI', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f682d-9d13-11eb-8465-f0761c70905c|', ''),
(2294, '', NULL, 156, 1, 1, 'sheikh-al-arab-surrori', 'SHEIKH AL ARAB SURRORI', 0, 0, '2023-09-18 01:46:28', '-100-', '|403f6831-9d13-11eb-8465-f0761c70905c|', ''),
(2295, '', NULL, 156, 1, 1, 'azhaar-shams-al-shamoos', 'AZHAAR SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|8d1097cd-a0eb-11eb-8466-f0761c70905c|', ''),
(2296, '', NULL, 156, 1, 1, 'asraar-shams-al-shamoos', 'ASRAAR SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|8d1097ce-a0eb-11eb-8466-f0761c70905c|', ''),
(2297, '', NULL, 156, 1, 1, 'florenca-shams-al-shamoos', 'FLORENCA SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|8d1097cf-a0eb-11eb-8466-f0761c70905c|', ''),
(2298, '', NULL, 156, 1, 1, 'diana-shams-al-shamoos', 'DIANA SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|8d1097d0-a0eb-11eb-8466-f0761c70905c|', ''),
(2299, '', NULL, 156, 1, 1, 'al-maas-shams-al-shamoos', 'AL MAAS SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|8d1097d1-a0eb-11eb-8466-f0761c70905c|', ''),
(2300, '', NULL, 156, 1, 1, 'al-shamoukh-shams-al-shamoos', 'AL SHAMOUKH SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|8d1097d2-a0eb-11eb-8466-f0761c70905c|', ''),
(2301, '', NULL, 156, 1, 1, 'areej-shams-al-shamoos', 'AREEJ SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|8d1097d3-a0eb-11eb-8466-f0761c70905c|', ''),
(2302, '', NULL, 156, 1, 1, 'badr-al-badoor-shams-al-shamoos', 'BADR AL BADOOR SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|8d1097d4-a0eb-11eb-8466-f0761c70905c|', ''),
(2303, '', NULL, 156, 1, 1, 'oud-al-khuloud-shams-al-shamoos', 'OUD AL KHULOUD SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|43f4eb34-a1b7-11eb-8466-f0761c70905c|', ''),
(2304, '', NULL, 156, 1, 1, 'al-andalus-shams-al-shamoos', 'AL ANDALUS SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|43f4eb35-a1b7-11eb-8466-f0761c70905c|', ''),
(2305, '', NULL, 156, 1, 1, 'rose-taifi-shams-al-shamoos', 'ROSE TAIFI SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|43f4eb37-a1b7-11eb-8466-f0761c70905c|', ''),
(2306, '', NULL, 156, 1, 1, 'khaltat-shams-al-shamoos', 'KHALTAT SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|43f4eb38-a1b7-11eb-8466-f0761c70905c|', ''),
(2307, '', NULL, 156, 1, 1, 'meydan-shams-al-shamoos', 'MEYDAN SHAMS AL SHAMOOS', 0, 0, '2023-09-18 01:46:28', '-35-', '|43f4eb3a-a1b7-11eb-8466-f0761c70905c|', ''),
(2308, '', NULL, 156, 1, 1, 'yara-lattafa', 'YARA LATTAFA', 0, 0, '2023-09-18 01:46:28', '-100-', '|088fe0f5-c523-11eb-8473-f0761c70905c|', ''),
(2309, '', NULL, 158, 1, 1, '12-parf-chambord-parf-shambord-duhi', '12 PARF. CHAMBORD Parf  Шамборд духи', 0, 0, '2023-09-18 01:46:28', '-100-', '|9eff23dd-f42e-11eb-847e-f0761c70905c|', 'parfum'),
(2310, '', NULL, 158, 1, 1, '12-parf-fontainebleau-parf-fontenblo-duhi', '12 PARF. FONTAINEBLEAU Parf  Фонтенбло духи', 0, 0, '2023-09-18 01:46:29', '-100-', '|9eff23de-f42e-11eb-847e-f0761c70905c|', 'parfum'),
(2311, '', NULL, 158, 1, 1, '12-parf-le-roi-chanceux-parf-le-rua-shanso-duhi', '12 PARF. LE ROI CHANCEUX PARF.  ЛЭ РУА ШАНСО духи', 0, 0, '2023-09-18 01:46:29', '-50--100-', '|9eff23e0-f42e-11eb-847e-f0761c70905c|9eff23df-f42e-11eb-847e-f0761c70905c|', 'parfum'),
(2312, '', NULL, 158, 1, 1, '12-parf-madame-royale-women-parf-madam-royal-duhi', '12 PARF. MADAME  ROYALE WOMEN PARF  Мадам Рояль духи', 0, 0, '2023-09-18 01:46:29', '-100-', '|9eff23e1-f42e-11eb-847e-f0761c70905c|', 'parfum'),
(2313, '', NULL, 158, 1, 1, '12-parf-marie-de-medicis-women-parf-mariya-de-medicis-duhi', '12 PARF. MARIE DE MEDICIS WOMEN PARF  Мария де Медицис духи', 0, 0, '2023-09-18 01:46:29', '-50--100-', '|9eff23e3-f42e-11eb-847e-f0761c70905c|9eff23e2-f42e-11eb-847e-f0761c70905c|', 'parfum'),
(2314, '', NULL, 158, 1, 1, '12-parf-marqueyssac-edp-markesak-parfyumernaya-voda', '12 PARF. MARQUEYSSAC EDP  Маркесак парфюмерная вода', 0, 0, '2023-09-18 01:46:29', '-100-', '|9eff23e4-f42e-11eb-847e-f0761c70905c|', 'parfum'),
(2315, '', NULL, 158, 1, 1, '12-parf-montresor-parf-montrezor-duhi', '12 PARF. MONTRESOR Parf  Монтрезор духи', 0, 0, '2023-09-18 01:46:29', '-100-', '|9eff23e5-f42e-11eb-847e-f0761c70905c|', 'parfum'),
(2316, '', NULL, 158, 1, 1, '12-parf-saint-cloud-edp-sen-klu-parfyumernaya-voda', '12 PARF. SAINT CLOUD EDP  Сен клу парфюмерная вода', 0, 0, '2023-09-18 01:46:29', '-100-', '|9eff23e6-f42e-11eb-847e-f0761c70905c|', 'parfum'),
(2317, '', NULL, 159, 1, 1, 'ame-fauve-parfvoda', 'AME FAUVE  ПАРФ.ВОДА', 0, 0, '2023-09-18 01:46:29', '-70-', '|c023981e-f9f7-11eb-8483-f0761c70905c|', ''),
(2318, '', NULL, 159, 1, 1, 'esprit-infini-parfvoda', 'ESPRIT INFINI  ПАРФ.ВОДА', 0, 0, '2023-09-18 01:46:29', '-70-', '|c0239821-f9f7-11eb-8483-f0761c70905c|', ''),
(2319, '', NULL, 159, 1, 1, 'source-joyeuse-1-tualetnaya-voda', 'SOURCE JOYEUSE №1  ТУАЛЕТНАЯ ВОДА', 0, 0, '2023-09-18 01:46:29', '-70-', '|c0239829-f9f7-11eb-8483-f0761c70905c|', ''),
(2320, '', NULL, 159, 1, 1, 'source-joyeuse-2-tualetnaya-voda', 'SOURCE JOYEUSE №2  ТУАЛЕТНАЯ ВОДА', 0, 0, '2023-09-18 01:46:29', '-70-', '|c023982a-f9f7-11eb-8483-f0761c70905c|', ''),
(2321, '', NULL, 159, 1, 1, 'source-joyeuse-3-tualetnaya-voda', 'SOURCE JOYEUSE №3  ТУАЛЕТНАЯ ВОДА', 0, 0, '2023-09-18 01:46:29', '-70-', '|c023982b-f9f7-11eb-8483-f0761c70905c|', ''),
(2322, '', NULL, 160, 1, 1, 'ne-plach-po-mne-parfyumernaya-voda--dont-cry-for-me-altaia-edp', 'Не плачь по мне… парфюмерная вода  / Don\'t cry for me Altaia EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|a0d69be1-0004-11ec-8486-f0761c70905c|', 'parfum'),
(2323, '', NULL, 160, 1, 1, 'atakama-parfyumernaya-voda--atacama-edp', 'Атакама парфюмерная вода  / Atacama EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|a0d69be2-0004-11ec-8486-f0761c70905c|', 'parfum'),
(2324, '', NULL, 160, 1, 1, 'kak-rozu-ne-zovi-parfyumernaya-voda--by-any-other-name-altaia-edp', 'Как розу не зови… парфюмерная вода  / By any other name Altaia EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|a0d69be3-0004-11ec-8486-f0761c70905c|', 'parfum'),
(2325, '', NULL, 160, 1, 1, 'purpurnyj-bereg-parfyumernaya-voda--purple-land-altaia-edp', 'Пурпурный берег парфюмерная вода  / Purple Land Altaia EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|a0d69be4-0004-11ec-8486-f0761c70905c|', 'parfum'),
(2326, '', NULL, 160, 1, 1, 'voshishhen-toboj-parfyumernaya-voda--wonder-of-you', 'Восхищен тобой парфюмерная вода  / WONDER OF YOU', 0, 0, '2023-09-18 01:46:29', '-100-', '|a0d69be5-0004-11ec-8486-f0761c70905c|', 'parfum'),
(2327, '', NULL, 160, 1, 1, 'tuberoza-in-blyu-parfyumernaya-voda--tuberose-in-blue', 'Тубероза ин блю парфюмерная вода  / Tuberose in Blue', 0, 0, '2023-09-18 01:46:29', '-100-', '|a0d69be6-0004-11ec-8486-f0761c70905c|', 'parfum'),
(2328, '', NULL, 160, 1, 1, 'yu-son-parfyumernaya-voda--yu-son-altaia-edp', 'Ю Сон парфюмерная вода  / Yu Son Altaia EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|a0d69be7-0004-11ec-8486-f0761c70905c|', 'parfum'),
(2329, '', NULL, 157, 1, 1, 'ambre-exclusif-u-edp', 'AMBRE EXCLUSIF u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a33-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2330, '', NULL, 156, 1, 1, 'ana-abiyedh-u-edp-spr', 'ANA ABIYEDH u EDP  SPR', 0, 0, '2023-09-18 01:46:29', '-30-', '|17ae9a34-0330-11ec-8486-f0761c70905c|', ''),
(2331, '', NULL, 157, 1, 1, 'hekayti-3-u-edp', 'HEKAYTI 3 u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a42-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2332, '', NULL, 157, 1, 1, 'hekayti-6-u-edp', 'HEKAYTI 6 u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a43-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2333, '', NULL, 157, 1, 1, 'hekayti-8-u-edp', 'HEKAYTI 8 u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a44-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2334, '', NULL, 157, 1, 1, 'la-perle-u-edp', 'LA PERLE u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a45-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2335, '', NULL, 156, 1, 1, 'malaak-u-edp-spr-lattafa', 'MALAAK u EDP  SPR LATTAFA', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a46-0330-11ec-8486-f0761c70905c|', ''),
(2336, '', NULL, 157, 1, 1, 'musk-abiyad-u-edp', 'MUSK ABIYAD u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a49-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2337, '', NULL, 157, 1, 1, 'najdia-u-edp-spr', 'NAJDIA u EDP  SPR', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a4a-0330-11ec-8486-f0761c70905c|', ''),
(2338, '', NULL, 157, 1, 1, 'oud-blend-u-edp', 'OUD BLEND u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a4b-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2339, '', NULL, 157, 1, 1, 'oud-darabie-u-edp-spr', 'OUD D`ARABIE u EDP  SPR', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a4c-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2340, '', NULL, 156, 1, 1, 'oud-mood-u-edp-spr', 'OUD MOOD u EDP  SPR', 0, 0, '2023-09-18 01:46:29', '-30-', '|17ae9a4d-0330-11ec-8486-f0761c70905c|', ''),
(2341, '', NULL, 157, 1, 1, 'patron-de-nuitu-edp', 'PATRON DE NUITu EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a4e-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2342, '', NULL, 156, 1, 1, 'ser-al-ameer-u-edp-spr-lattafa', 'SER AL AMEER u EDP  SPR LATTAFA', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a51-0330-11ec-8486-f0761c70905c|', ''),
(2343, '', NULL, 156, 1, 1, 'sheikh-shuyukh-luxe-edition-u-edp-spr', 'SHEIKH SHUYUKH LUXE EDITION u EDP  SPR', 0, 0, '2023-09-18 01:46:29', '-30-', '|17ae9a52-0330-11ec-8486-f0761c70905c|', ''),
(2344, '', NULL, 157, 1, 1, 'souvenir-floral-bouquetu-edp', 'SOUVENIR FLORAL BOUQUETu EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a53-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2345, '', NULL, 157, 1, 1, 'tohfa-pink-u-edp', 'TOHFA (PINK) u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a55-0330-11ec-8486-f0761c70905c|', ''),
(2346, '', NULL, 157, 1, 1, 'tohfa-black-u-edp', 'TOHFA (BLACK) u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a56-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2347, '', NULL, 157, 1, 1, 'tohfa-purple-u-edp', 'TOHFA (PURPLE) u EDP', 0, 0, '2023-09-18 01:46:29', '-100-', '|17ae9a57-0330-11ec-8486-f0761c70905c|', 'parfum'),
(2348, '', NULL, 158, 1, 1, '12-parf-malmaison-edp-malmezon-parfyumernaya-voda', '12 PARF. MALMAISON EDP  Малмезон парфюмерная вода', 0, 0, '2023-09-18 01:46:29', '-100-', '|e6470799-0a5f-11ec-8488-f0761c70905c|', 'parfum'),
(2349, '', NULL, 158, 1, 1, '12-parf-malmaison-parf-malmezon-duhi', '12 PARF. MALMAISON PARF.  Малмезон духи', 0, 0, '2023-09-18 01:46:29', '-50-', '|e647079a-0a5f-11ec-8488-f0761c70905c|', 'parfum'),
(2350, '', NULL, 161, 1, 1, 'ill-damour--ostrov-lyubvi-tualetnaya-voda', 'Ill d\'Amour / Остров любви туалетная вода', 0, 0, '2023-09-18 01:46:29', '-100-', '|20b51f55-2519-11ec-848a-f0761c70905c|', ''),
(2351, '', NULL, 161, 1, 1, 'moment-vole--beg-vremeni-tualetnaya-voda-fragonard', 'Moment vole / Бег времени туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:29', '-100-', '|20b51f5f-2519-11ec-848a-f0761c70905c|', ''),
(2352, '', NULL, 161, 1, 1, 'diamant--brilliant-duhi-fragonard', 'Diamant / Бриллиант духи  FRAGONARD', 0, 0, '2023-09-18 01:46:29', '-30--60-', '|20b51f62-2519-11ec-848a-f0761c70905c|20b51f61-2519-11ec-848a-f0761c70905c|', ''),
(2353, '', NULL, 161, 1, 1, 'grain-de-soleil--velikolepie-solnca-parfyumernaya-voda-fragonard', 'Grain De Soleil / Великолепие солнца парфюмерная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:29', '-50-', '|20b51f64-2519-11ec-848a-f0761c70905c|', ''),
(2354, '', NULL, 161, 1, 1, 'toujours-fidele--vernost-tualetnaya-voda-fragonard', 'Toujours fidele / Верность туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:29', '-100-', '|20b51f65-2519-11ec-848a-f0761c70905c|', ''),
(2355, '', NULL, 161, 1, 1, 'vetiver--vetiver-tualetnaya-voda-fragonard', 'Vetiver / Ветивер туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:29', '-100-', '|20b51f66-2519-11ec-848a-f0761c70905c|', ''),
(2356, '', NULL, 161, 1, 1, 'eau-du-seducteur--voda-soblazna-tualetnaya-voda-fragonard', 'Eau du seducteur / Вода соблазна туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:29', '-100-', '|20b51f68-2519-11ec-848a-f0761c70905c|', ''),
(2357, '', NULL, 161, 1, 1, 'jasmine-perle--zhemchuzhina-zhasmina-parfyumernaya-voda-fragonard', 'Jasmine perle / Жемчужина жасмина парфюмерная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-50-', '|20b51f69-2519-11ec-848a-f0761c70905c|', ''),
(2358, '', NULL, 161, 1, 1, 'etoile--zvezda-duhi-fragonard', 'Etoile / Звезда духи  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-30-', '|20b51f6a-2519-11ec-848a-f0761c70905c|', ''),
(2359, '', NULL, 161, 1, 1, 'etoile--zvezda-tualetnaya-voda-fragonard', 'Etoile / Звезда туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|20b51f6b-2519-11ec-848a-f0761c70905c|', ''),
(2360, '', NULL, 161, 1, 1, 'laventurier--iskatel-priklyuchenij-tualetnaya-voda-fragonard', 'L’Aventurier / Искатель приключений туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|20b51f6c-2519-11ec-848a-f0761c70905c|', ''),
(2361, '', NULL, 161, 1, 1, 'cerde--kedr-tualetnaya-voda-fragonard', 'Cerde / Кедр туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|20b51f6e-2519-11ec-848a-f0761c70905c|', ''),
(2362, '', NULL, 161, 1, 1, 'belle-de-nuit--krasavica-nochi-duhi-fragonard', 'Belle de nuit / Красавица ночи духи  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-30--60-', '|20b51f70-2519-11ec-848a-f0761c70905c|20b51f6f-2519-11ec-848a-f0761c70905c|', ''),
(2363, '', NULL, 161, 1, 1, 'tilleul-cedrat--limonnaya-lipa-parfyumernaya-voda-fragonard', 'Tilleul cedrat / Лимонная липа парфюмерная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-50-', '|20b51f71-2519-11ec-848a-f0761c70905c|', ''),
(2364, '', NULL, 161, 1, 1, 'belle-cherie--milaya-krasavica-duhi-fragonard', 'Belle cherie / Милая красавица духи  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-30--60-', '|20b51f75-2519-11ec-848a-f0761c70905c|20b51f74-2519-11ec-848a-f0761c70905c|', ''),
(2365, '', NULL, 161, 1, 1, 'ile-damour-perfume--ostrov-lyubvi-duhi-fragonard', 'Ile D\'Amour perfume / Остров любви духи  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-30-', '|20b51f76-2519-11ec-848a-f0761c70905c|', ''),
(2366, '', NULL, 161, 1, 1, 'ile-damour--ostrov-lyubvi-duhi-fragonard', 'Ile D\'Amour / Остров любви духи  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-60-', '|20b51f77-2519-11ec-848a-f0761c70905c|', ''),
(2367, '', NULL, 161, 1, 1, 'patchouli--pachuli-tualetnaya-voda-fragonard', 'Patchouli / Пачули туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|20b51f79-2519-11ec-848a-f0761c70905c|', ''),
(2368, '', NULL, 161, 1, 1, 'desert--pustynya-tualetnaya-voda-fragonard', 'Desert / Пустыня туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|20b51f7b-2519-11ec-848a-f0761c70905c|', ''),
(2369, '', NULL, 161, 1, 1, 'santal-cardamome--santal-kardamon-parfyumernaya-voda', 'Santal cardamome / Сантал кардамон парфюмерная вода', 0, 0, '2023-09-18 01:46:30', '-50-', '|20b51f7d-2519-11ec-848a-f0761c70905c|', ''),
(2370, '', NULL, 161, 1, 1, 'heliotrope-gingembre--solnechnyj-imbir-parfyumernaya-voda-fragonard', 'Heliotrope gingembre / Солнечный имбирь парфюмерная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-50-', '|20b51f7e-2519-11ec-848a-f0761c70905c|', ''),
(2371, '', NULL, 161, 1, 1, 'suivez-moi--sleduj-za-mnoj-tualetnaya-voda-fragonard', 'Suivez-moi / Следуй за мной туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|20b51f7f-2519-11ec-848a-f0761c70905c|', ''),
(2372, '', NULL, 161, 1, 1, 'soleil--solnce-parfyumernaya-voda-fragonard', 'Soleil / Солнце парфюмерная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-50-', '|20b51f80-2519-11ec-848a-f0761c70905c|', ''),
(2373, '', NULL, 161, 1, 1, 'fragonard-perfume--fragonar-duhi-fragonard', 'Fragonard perfume / Фрагонар духи  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-60-', '|20b51f81-2519-11ec-848a-f0761c70905c|', ''),
(2374, '', NULL, 161, 1, 1, 'fragonard-perfume--fragonar-duhi-v-zolotom-flakone-fragonard', 'Fragonard perfume / Фрагонар духи в золотом флаконе  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-30-', '|20b51f82-2519-11ec-848a-f0761c70905c|', ''),
(2375, '', NULL, 161, 1, 1, 'encens-feve-tonka--femian-tonka-parfyumernaya-voda-fragonard', 'Encens feve tonka / Фемиан тонка парфюмерная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-50-', '|20b51f83-2519-11ec-848a-f0761c70905c|', ''),
(2376, '', NULL, 161, 1, 1, 'fragonard--fragonard-tualetnaya-voda-fragonard', 'Fragonard / Фрагонард туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|20b51f84-2519-11ec-848a-f0761c70905c|', ''),
(2377, '', NULL, 161, 1, 1, 'frivole-perfume--frivol-duhi-fragonard', 'Frivole perfume / Фриволь духи  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-30--60-', '|20b51f86-2519-11ec-848a-f0761c70905c|20b51f85-2519-11ec-848a-f0761c70905c|', ''),
(2378, '', NULL, 161, 1, 1, 'frivole--frivol-tualetnaya-voda-fragonard', 'Frivole / Фриволь туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|20b51f87-2519-11ec-848a-f0761c70905c|', ''),
(2379, '', NULL, 161, 1, 1, 'beau-gosse--horoshij-paren-tualetnaya-voda-fragonard', 'Beau Gosse / Хороший парень туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|20b51f88-2519-11ec-848a-f0761c70905c|', ''),
(2380, '', NULL, 161, 1, 1, 'fleur-de-la-passion--cvetok-strasti-tualetnaya-voda-fragonard', 'Fleur de la passion / Цветок страсти туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-50-', '|20b51f8b-2519-11ec-848a-f0761c70905c|', ''),
(2381, '', NULL, 161, 1, 1, 'emilie--emili-duhi-fragonard', 'Emilie / Эмили духи  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-30--60-', '|20b51f8e-2519-11ec-848a-f0761c70905c|20b51f8d-2519-11ec-848a-f0761c70905c|', ''),
(2382, '', NULL, 161, 1, 1, 'emilie--emili-tualetnaya-voda-fragonard', 'Emilie / Эмили туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|098dab96-25cd-11ec-848a-f0761c70905c|', ''),
(2383, '', NULL, 157, 1, 1, 'era-by-afnan-gold-limited-edition-w-edp', 'ERA BY AFNAN GOLD LIMITED EDITION w EDP', 0, 0, '2023-09-18 01:46:30', '-100-', '|0a96ff9f-26ba-11ec-848a-f0761c70905c|', 'parfum'),
(2384, '', NULL, 157, 1, 1, 'era-by-afnan-silver-limited-edition-m-edp', 'ERA BY AFNAN SILVER LIMITED EDITION m EDP', 0, 0, '2023-09-18 01:46:30', '-100-', '|0a96ffa0-26ba-11ec-848a-f0761c70905c|', 'parfum'),
(2385, '', NULL, 157, 1, 1, 'his-highness-white-m-edp', 'HIS HIGHNESS (WHITE) m EDP', 0, 0, '2023-09-18 01:46:30', '-100-', '|0a96ffa2-26ba-11ec-848a-f0761c70905c|', 'parfum'),
(2386, '', NULL, 157, 1, 1, 'celebrita-pour-femme-w-edp', 'CELEBRITA POUR FEMME w EDP', 0, 0, '2023-09-18 01:46:30', '-100-', '|0a96ffa3-26ba-11ec-848a-f0761c70905c|', 'parfum'),
(2387, '', NULL, 157, 1, 1, 'maschera-pour-homme-m-edp', 'MASCHERA POUR HOMME m EDP', 0, 0, '2023-09-18 01:46:30', '-100-', '|0a96ffb2-26ba-11ec-848a-f0761c70905c|', 'parfum'),
(2388, '', NULL, 157, 1, 1, 'naseej-al-khuzama-u-edp', 'NASEEJ AL KHUZAMA u EDP', 0, 0, '2023-09-18 01:46:30', '-50-', '|0a96ffb3-26ba-11ec-848a-f0761c70905c|', 'parfum'),
(2389, '', NULL, 157, 1, 1, 'naseej-al-oud-u-edp', 'NASEEJ AL OUD u EDP', 0, 0, '2023-09-18 01:46:30', '-50-', '|0a96ffb4-26ba-11ec-848a-f0761c70905c|', 'parfum'),
(2390, '', NULL, 157, 1, 1, 'naseej-al-ward-u-edp', 'NASEEJ AL WARD u EDP', 0, 0, '2023-09-18 01:46:30', '-50-', '|0a96ffb5-26ba-11ec-848a-f0761c70905c|', 'parfum'),
(2391, '', NULL, 161, 1, 1, 'concerto--koncert-tualetnaya-voda-fragonard', 'Concerto / Концерт туалетная вода  FRAGONARD', 0, 0, '2023-09-18 01:46:30', '-100-', '|b9f468f8-2b55-11ec-848a-f0761c70905c|', ''),
(2392, '', NULL, 156, 1, 1, 'lail-maleki-lattafa-edp-spr', 'LAIL MALEKI LATTAFA EDP  SPR', 0, 0, '2023-09-18 01:46:30', '-30-', '|abfc7cdc-46e6-11ec-8490-f0761c70905c|', ''),
(2393, '', NULL, 157, 1, 1, 'ornament-pour-femme-purple-allure-w-edp', 'ORNAMENT POUR FEMME (PURPLE ALLURE) w EDP', 0, 0, '2023-09-18 01:46:30', '-100-', '|abfc7cdf-46e6-11ec-8490-f0761c70905c|', 'parfum'),
(2394, '', NULL, 157, 1, 1, 'tribute-pink-u-edp', 'TRIBUTE (PINK) u EDP', 0, 0, '2023-09-18 01:46:30', '-100-', '|abfc7ce1-46e6-11ec-8490-f0761c70905c|', 'parfum'),
(2395, '', NULL, 157, 1, 1, 'souvenir-desert-rose-u-edp', 'SOUVENIR  DESERT ROSE u EDP', 0, 0, '2023-09-18 01:46:30', '-100-', '|abfc7ce2-46e6-11ec-8490-f0761c70905c|', 'parfum'),
(2396, '', NULL, 156, 1, 1, 'ameerat-al-arab-parfvoda', 'AMEERAT AL ARAB ПАРФ.ВОДА', 0, 0, '2023-09-18 01:46:30', '-100-', '|66b15e7b-536a-11ec-8491-f0761c70905c|', ''),
(2397, '', NULL, 156, 1, 1, 'musk-salama-edp-lattafa', 'MUSK SALAMA EDP  LATTAFA', 0, 0, '2023-09-18 01:46:30', '-100-', '|3b638c7c-92fc-11ec-8492-f0761c70905c|', 'parfum'),
(2398, '', NULL, 157, 1, 1, 'pride-pour-femme-edp', 'PRIDE POUR FEMME EDP', 0, 0, '2023-09-18 01:46:30', '-100-', '|3b638c7e-92fc-11ec-8492-f0761c70905c|', 'parfum'),
(2399, '', NULL, 157, 1, 1, 'r-u-serious-her-edp', 'R U SERIOUS HER EDP', 0, 0, '2023-09-18 01:46:31', '-100-', '|3b638c7f-92fc-11ec-8492-f0761c70905c|', 'parfum'),
(2400, '', NULL, 157, 1, 1, 'supremacy-not-only-intense-edp', 'SUPREMACY NOT ONLY INTENSE EDP', 0, 0, '2023-09-18 01:46:31', '-100-', '|3b638c80-92fc-11ec-8492-f0761c70905c|', 'parfum'),
(2401, '', NULL, 157, 1, 1, 'supreme-amber-edp', 'SUPREME AMBER EDP', 0, 0, '2023-09-18 01:46:31', '-100-', '|3b638c81-92fc-11ec-8492-f0761c70905c|', 'parfum'),
(2402, '', NULL, 157, 1, 1, 'supreme-musk-edp', 'SUPREME MUSK EDP', 0, 0, '2023-09-18 01:46:31', '-100-', '|3b638c82-92fc-11ec-8492-f0761c70905c|', 'parfum'),
(2403, '', NULL, 157, 1, 1, 'theoreme-pour-homme-edp', 'THEOREME POUR HOMME EDP', 0, 0, '2023-09-18 01:46:31', '-90-', '|3b638c83-92fc-11ec-8492-f0761c70905c|', 'parfum'),
(2404, '', NULL, 157, 1, 1, 'touche-pour-femme-edp', 'TOUCHE POUR FEMME EDP', 0, 0, '2023-09-18 01:46:31', '-100-', '|3b638c84-92fc-11ec-8492-f0761c70905c|', 'parfum'),
(2405, '', NULL, 156, 1, 1, 'pure-white-asdaaf', 'PURE WHITE ASDAAF', 0, 0, '2023-09-18 01:46:31', '-100-', '|8a315e72-f784-11ec-849b-f0761c70905c|', ''),
(2406, '', NULL, 157, 1, 1, 'sandal-abiyad-u-edp', 'SANDAL ABIYAD u EDP', 0, 0, '2023-09-18 01:46:31', '-100-', '|69a86f2a-fa0c-11ec-849b-f0761c70905c|', 'parfum'),
(2407, '', NULL, 157, 1, 1, 'theoreme-pour-femme-w-edp', 'THEOREME POUR FEMME w EDP', 0, 0, '2023-09-18 01:46:31', '-90-', '|69a86f2b-fa0c-11ec-849b-f0761c70905c|', 'parfum'),
(2408, '', NULL, 162, 1, 1, 'amethyste-sereine-duhi', 'AMETHYSTE SEREINЕ Духи', 0, 0, '2023-09-18 01:46:31', '-100-', '|f040b8ed-0d99-11ed-849b-f0761c70905c|', 'parfum'),
(2409, '', NULL, 162, 1, 1, 'guanaco-duhi', 'GUANACO Духи', 0, 0, '2023-09-18 01:46:31', '-15--100-', '|f040b8ef-0d99-11ed-849b-f0761c70905c|f040b8ee-0d99-11ed-849b-f0761c70905c|', ''),
(2410, '', NULL, 162, 1, 1, 'royal-llama-duhi', 'ROYAL LLAMA Духи', 0, 0, '2023-09-18 01:46:31', '-15--50--100-', '|f040b8f2-0d99-11ed-849b-f0761c70905c|f040b8f1-0d99-11ed-849b-f0761c70905c|f040b8f0-0d99-11ed-849b-f0761c70905c|', 'parfum'),
(2411, '', NULL, 162, 1, 1, 'white-sable-parfyumernaya-voda', 'WHITE SABLE Парфюмерная вода', 0, 0, '2023-09-18 01:46:31', '-15-', '|f040b8f3-0d99-11ed-849b-f0761c70905c|', ''),
(2412, '', NULL, 162, 1, 1, 'white-vicuna-duhi', 'WHITE VICUNA  Духи', 0, 0, '2023-09-18 01:46:31', '-15--100-', '|f040b8f5-0d99-11ed-849b-f0761c70905c|f040b8f4-0d99-11ed-849b-f0761c70905c|', ''),
(2413, '', NULL, 156, 1, 1, 'mayar-lattafa', 'MAYAR LATTAFA', 0, 0, '2023-09-18 01:46:31', '-100-', '|fb7851fa-1c8d-11ed-849b-f0761c70905c|', ''),
(2414, '', NULL, 156, 1, 1, 'musamam-lattafa', 'MUSAMAM LATTAFA', 0, 0, '2023-09-18 01:46:31', '-100-', '|fb7851fb-1c8d-11ed-849b-f0761c70905c|', ''),
(2415, '', NULL, 156, 1, 1, 'khamran-lattafa', 'KHAMRAN LATTAFA', 0, 0, '2023-09-18 01:46:31', '-100-', '|fb7851fc-1c8d-11ed-849b-f0761c70905c|', ''),
(2416, '', NULL, 163, 1, 1, 'adamas-duhi-parf', 'ADAMAS духи парф.', 0, 0, '2023-09-18 01:46:31', '-100-', '|a15138cf-1fbc-11ed-849b-f0761c70905c|', ''),
(2417, '', NULL, 163, 1, 1, 'batticuore-duhi-parf', 'BATTICUORE духи парф.', 0, 0, '2023-09-18 01:46:31', '-100-', '|a15138d0-1fbc-11ed-849b-f0761c70905c|', ''),
(2418, '', NULL, 163, 1, 1, 'delirio-duhi-parf', 'DELIRIO духи парф.', 0, 0, '2023-09-18 01:46:31', '-100-', '|a15138d1-1fbc-11ed-849b-f0761c70905c|', ''),
(2419, '', NULL, 163, 1, 1, 'la-bella-vita-duhi-parf', 'LA BELLA VITA духи парф', 0, 0, '2023-09-18 01:46:31', '-100-', '|a15138d2-1fbc-11ed-849b-f0761c70905c|', ''),
(2420, '', NULL, 163, 1, 1, 'ocean-duhi-parf', 'OCEAN духи парф.', 0, 0, '2023-09-18 01:46:31', '-100-', '|a15138d3-1fbc-11ed-849b-f0761c70905c|', ''),
(2421, '', NULL, 163, 1, 1, 'odi-et-amo-duhi-parf', 'ODI ET AMO духи парф.', 0, 0, '2023-09-18 01:46:31', '-100-', '|a15138d4-1fbc-11ed-849b-f0761c70905c|', ''),
(2422, '', NULL, 163, 1, 1, 'pelle-dangelo-duhi-parf', 'PELLE D\'ANGELO духи парф.', 0, 0, '2023-09-18 01:46:31', '-100-', '|a15138d5-1fbc-11ed-849b-f0761c70905c|', ''),
(2423, '', NULL, 156, 1, 1, 'khashabi-u-edp-spr', 'KHASHABI u EDP  SPR', 0, 0, '2023-09-18 01:46:31', '-100-', '|21772817-223a-11ed-849b-f0761c70905c|', ''),
(2424, '', NULL, 156, 1, 1, 'qaed-al-fursan-lattafa', 'QAED AL FURSAN LATTAFA', 0, 0, '2023-09-18 01:46:31', '-100-', '|7f7893f6-253c-11ed-849b-f0761c70905c|', ''),
(2425, '', NULL, 164, 1, 1, 'actor-parfyumernaya-voda', 'ACTOR  парфюмерная вода', 0, 0, '2023-09-18 01:46:31', '-100-', '|8a08d4e3-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2426, '', NULL, 164, 1, 1, 'ballerina-edp-parfyumernaya-voda', 'BALLERINA EDP  парфюмерная вода', 0, 0, '2023-09-18 01:46:31', '-100-', '|8a08d4e4-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2427, '', NULL, 164, 1, 1, 'painter-edp-parfyumernaya-voda', 'PAINTER EDP  парфюмерная вода', 0, 0, '2023-09-18 01:46:31', '-100-', '|8a08d4e5-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2428, '', NULL, 164, 1, 1, 'sculptor-edp-parfyumernaya-voda', 'SCULPTOR EDP  парфюмерная вода', 0, 0, '2023-09-18 01:46:31', '-100-', '|8a08d4e6-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2429, '', NULL, 165, 1, 1, 'bois-dambrette-edp', 'Bois d\'Ambrette EDP', 0, 0, '2023-09-18 01:46:31', '-100-', '|8a08d4ed-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2430, '', NULL, 165, 1, 1, 'cacao-porcelana-edp', 'Cacao Porcelana EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|8a08d4ee-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2431, '', NULL, 165, 1, 1, 'iris-ebene-edp', 'Iris Ebene EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|8a08d4ef-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2432, '', NULL, 165, 1, 1, 'narcisse-taiji-edp', 'Narcisse Taiji EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|8a08d4f0-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2433, '', NULL, 165, 1, 1, 'poivre-pomelo-edp', 'Poivre Pomelo EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|8a08d4f1-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2434, '', NULL, 165, 1, 1, 'rose-ardoise-edp', 'Rose Ardoise EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|8a08d4f2-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2435, '', NULL, 165, 1, 1, 'santal-blond-edp', 'Santal Blond EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|8a08d4f3-3432-11ed-849b-f0761c70905c|', 'parfum'),
(2436, '', NULL, 166, 1, 1, 'voda-italii-parfyumernaya-voda-voda--eau-ditalie-edp', 'Вода Италии парфюмерная вода вода  / Eau D\'Italie EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|5d7b03b7-35a6-11ed-849b-f0761c70905c|', 'parfum'),
(2437, '', NULL, 166, 1, 1, 'desyatyj-aromat-parfyumernaya-voda--acqua-decima-edp', 'Десятый аромат парфюмерная вода  / Acqua Decima EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|5d7b03b8-35a6-11ed-849b-f0761c70905c|', 'parfum'),
(2438, '', NULL, 166, 1, 1, 'zhasminovaya-kozha-parfyumernaya-voda--jasmine-leather-edp', 'Жасминовая кожа парфюмерная вода  / Jasmine leather EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|5d7b03b9-35a6-11ed-849b-f0761c70905c|', 'parfum'),
(2439, '', NULL, 166, 1, 1, 'zerno-schastya-parfyumernaya-voda--graine-de-joie-edp', 'Зерно счастья парфюмерная вода  / Graine de joie EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|5d7b03ba-35a6-11ed-849b-f0761c70905c|', 'parfum'),
(2440, '', NULL, 166, 1, 1, 'misticheskij-zakat-parfyumernaya-voda--mystic-sunset-edp', 'Мистический закат парфюмерная вода  / MYSTIC SUNSET EDP', 0, 0, '2023-09-18 01:46:32', '-100-', '|5d7b03bb-35a6-11ed-849b-f0761c70905c|', 'parfum'),
(2441, '', NULL, 167, 1, 1, 'mint-vibrant-scent-parfyumernayaya-voda-sprej', 'M.INT VIBRANT SCENT Парфюмернаяя Вода  Спрей', 0, 0, '2023-09-18 01:46:32', '-70-', '|5d7b03c5-35a6-11ed-849b-f0761c70905c|', ''),
(2442, '', NULL, 167, 1, 1, 'parfyumernaya-voda-irisation--sprej', 'Парфюмерная вода IRISATION, , спрей', 0, 0, '2023-09-18 01:46:32', '-70-', '|5d7b03c6-35a6-11ed-849b-f0761c70905c|', ''),
(2443, '', NULL, 167, 1, 1, 'parfyumernaya-voda-ten-strike--sprej', 'Парфюмерная вода TEN STRIKE, , спрей', 0, 0, '2023-09-18 01:46:32', '-70-', '|5d7b03c7-35a6-11ed-849b-f0761c70905c|', ''),
(2444, '', NULL, 167, 1, 1, 'parfyumernaya-voda-vibrant-scent-travel-set-20', 'Парфюмерная вода VIBRANT SCENT, TRAVEL SET, 20+', 0, 0, '2023-09-18 01:46:32', '-20-', '|5d7b03c8-35a6-11ed-849b-f0761c70905c|', ''),
(2445, '', NULL, 156, 1, 1, 'sutoor-lattafa', 'SUTOOR LATTAFA', 0, 0, '2023-09-18 01:46:32', '-100-', '|55ab3d7a-38f2-11ed-849b-f0761c70905c|', ''),
(2446, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-cvezhaya-myata', 'MARVIS Зубная паста Cвежая Мята', 0, 0, '2023-09-18 01:46:32', '-25--85-', '|3629ba26-3f25-11ed-849b-f0761c70905c|3629ba25-3f25-11ed-849b-f0761c70905c|', ''),
(2447, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-klassicheskaya-nasyshhennaya-myata', 'MARVIS Зубная паста Классическая Насыщенная Мята', 0, 0, '2023-09-18 01:46:32', '-25--85-', '|3629ba33-3f25-11ed-849b-f0761c70905c|3629ba27-3f25-11ed-849b-f0761c70905c|', ''),
(2448, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-lakrica-amarelli', 'MARVIS Зубная паста Лакрица Амарелли', 0, 0, '2023-09-18 01:46:32', '-25--85-', '|3629ba34-3f25-11ed-849b-f0761c70905c|3629ba28-3f25-11ed-849b-f0761c70905c|', ''),
(2449, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-myata-antitabak-otbelivayushhaya', 'MARVIS Зубная паста Мята Антитабак отбеливающая', 0, 0, '2023-09-18 01:46:32', '-25--85-', '|3629ba35-3f25-11ed-849b-f0761c70905c|3629ba29-3f25-11ed-849b-f0761c70905c|', ''),
(2450, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-myata-otbelivayushhaya', 'MARVIS Зубная паста Мята отбеливающая', 0, 0, '2023-09-18 01:46:32', '-25--85-', '|3629ba32-3f25-11ed-849b-f0761c70905c|3629ba2a-3f25-11ed-849b-f0761c70905c|', ''),
(2451, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-blossom-tea', 'MARVIS Зубная паста BLOSSOM TEA', 0, 0, '2023-09-18 01:46:32', '-25--75-', '|3629ba3b-3f25-11ed-849b-f0761c70905c|3629ba2b-3f25-11ed-849b-f0761c70905c|', ''),
(2452, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-creamy-matcha-tea', 'MARVIS Зубная паста CREAMY MATCHA TEA', 0, 0, '2023-09-18 01:46:32', '-25--75-', '|3629ba3c-3f25-11ed-849b-f0761c70905c|3629ba2c-3f25-11ed-849b-f0761c70905c|', ''),
(2453, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-earl-grey-tea', 'MARVIS Зубная паста EARL GREY TEA', 0, 0, '2023-09-18 01:46:32', '-25--75-', '|3629ba3d-3f25-11ed-849b-f0761c70905c|3629ba2d-3f25-11ed-849b-f0761c70905c|', ''),
(2454, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-myata-i-anis', 'MARVIS Зубная паста Мята и Анис', 0, 0, '2023-09-18 01:46:32', '-25--85-', '|3629ba36-3f25-11ed-849b-f0761c70905c|3629ba2e-3f25-11ed-849b-f0761c70905c|', ''),
(2455, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-myata-i-zhasmin', 'MARVIS Зубная паста Мята и Жасмин', 0, 0, '2023-09-18 01:46:32', '-25--85-', '|3629ba37-3f25-11ed-849b-f0761c70905c|3629ba2f-3f25-11ed-849b-f0761c70905c|', ''),
(2456, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-myata-i-imbir', 'MARVIS Зубная паста Мята и Имбирь', 0, 0, '2023-09-18 01:46:32', '-25--85-', '|3629ba38-3f25-11ed-849b-f0761c70905c|3629ba30-3f25-11ed-849b-f0761c70905c|', ''),
(2457, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-myata-i-korica', 'MARVIS Зубная паста Мята и Корица', 0, 0, '2023-09-18 01:46:32', '-25--85-', '|3629ba39-3f25-11ed-849b-f0761c70905c|3629ba31-3f25-11ed-849b-f0761c70905c|', ''),
(2458, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-black-forest', 'MARVIS Зубная паста BLACK FOREST', 0, 0, '2023-09-18 01:46:33', '-75-', '|3629ba3a-3f25-11ed-849b-f0761c70905c|', ''),
(2459, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-orange-blossom-bloom', 'MARVIS Зубная паста ORANGE BLOSSOM BLOOM', 0, 0, '2023-09-18 01:46:33', '-75-', '|3629ba3e-3f25-11ed-849b-f0761c70905c|', ''),
(2460, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-sweet--sour-rhubarb', 'MARVIS Зубная паста SWEET & SOUR RHUBARB', 0, 0, '2023-09-18 01:46:33', '-75-', '|3629ba3f-3f25-11ed-849b-f0761c70905c|', ''),
(2461, '', NULL, 168, 1, 1, 'marvis-zubnaya-shhetka-s-nejlonovoj-shhetinoj-myagkaya', 'MARVIS Зубная щетка с нейлоновой щетиной мягкая', 0, 0, '2023-09-18 01:46:33', '--', '|3629ba40-3f25-11ed-849b-f0761c70905c|', ''),
(2462, '', NULL, 168, 1, 1, 'marvis-zubnaya-shhetka-c-nejlonovoj-shhetinoj-srednej-zhestkosti', 'MARVIS Зубная щетка c нейлоновой щетиной средней жесткости', 0, 0, '2023-09-18 01:46:33', '--', '|3629ba41-3f25-11ed-849b-f0761c70905c|', ''),
(2463, '', NULL, 168, 1, 1, 'r-122020-dispenser-marvis-2020', 'R-122020: Диспенсер  Marvis 2020', 0, 0, '2023-09-18 01:46:33', '--', '|439aa9eb-3f32-11ed-849b-f0761c70905c|', ''),
(2464, '', NULL, 169, 1, 1, '1472-histoires-de-parfums-parfyumernaya-voda', '1472 HISTOIRES de PARFUMS Парфюмерная вода', 0, 0, '2023-09-18 01:46:33', '-120-', '|439aa9fd-3f32-11ed-849b-f0761c70905c|', ''),
(2465, '', NULL, 169, 1, 1, '1472-histoires-de-parfums-parfyumernaya-voda-1472', '1472 HISTOIRES de PARFUMS Парфюмерная вода 1472', 0, 0, '2023-09-18 01:46:33', '-15--60-', '|439aa9ff-3f32-11ed-849b-f0761c70905c|439aa9fe-3f32-11ed-849b-f0761c70905c|', ''),
(2466, '', NULL, 169, 1, 1, '1828-histoires-de-parfums-parfyumernaya-voda', '1828 HISTOIRES de PARFUMS Парфюмерная вода', 0, 0, '2023-09-18 01:46:33', '-15--60--120-', '|439aaa02-3f32-11ed-849b-f0761c70905c|439aaa01-3f32-11ed-849b-f0761c70905c|439aaa00-3f32-11ed-849b-f0761c70905c|', ''),
(2467, '', NULL, 169, 1, 1, '1969-histoires-de-parfums-parfyumernaya-voda', '1969 HISTOIRES de PARFUMS Парфюмерная вода', 0, 0, '2023-09-18 01:46:33', '-60--120-', '|439aaa04-3f32-11ed-849b-f0761c70905c|439aaa03-3f32-11ed-849b-f0761c70905c|', ''),
(2468, '', NULL, 169, 1, 1, '7753-histoires-de-parfums-parfyumernaya-voda', '7753 HISTOIRES de PARFUMS Парфюмерная вода', 0, 0, '2023-09-18 01:46:33', '-15--120-', '|439aaa06-3f32-11ed-849b-f0761c70905c|439aaa05-3f32-11ed-849b-f0761c70905c|', ''),
(2469, '', NULL, 169, 1, 1, '7753-histoires-de-parfums-parfyumernaya-voda-7753', '7753 HISTOIRES de PARFUMS Парфюмерная вода 7753', 0, 0, '2023-09-18 01:46:33', '-60-', '|439aaa07-3f32-11ed-849b-f0761c70905c|', ''),
(2470, '', NULL, 169, 1, 1, '16-histoires-de-parfums-parfyumernaya-voda-this-is-not-a-blue-bottle', '1/.6 HISTOIRES de PARFUMS Парфюмерная вода this is not a blue bottle', 0, 0, '2023-09-18 01:46:33', '-60--120-', '|439aaa09-3f32-11ed-849b-f0761c70905c|439aaa08-3f32-11ed-849b-f0761c70905c|', ''),
(2471, '', NULL, 169, 1, 1, 'histoires-de-16-histoires-de-parfums-parfyumernaya-voda-this-is-not-a-blue-bottle', 'HISTOIRES de  1/.6 HISTOIRES de PARFUMS Парфюмерная вода this is not a blue bottle', 0, 0, '2023-09-18 01:46:33', '-15-', '|439aaa0a-3f32-11ed-849b-f0761c70905c|', ''),
(2472, '', NULL, 169, 1, 1, '15-histoires-de-parfums-parfyumernaya-voda-this-is-not-a-blue-bottle-15', '1/.5 HISTOIRES de PARFUMS Парфюмерная вода this is not a blue bottle 1/.5', 0, 0, '2023-09-18 01:46:33', '-15--60--120-', '|439aaa0d-3f32-11ed-849b-f0761c70905c|439aaa0c-3f32-11ed-849b-f0761c70905c|439aaa0b-3f32-11ed-849b-f0761c70905c|', ''),
(2473, '', NULL, 169, 1, 1, '13-histoires-de-parfums-parfyumernaya-voda-this-is-not-a-blue-bottle', '1/.3  HISTOIRES de PARFUMS Парфюмерная вода this is not a blue bottle', 0, 0, '2023-09-18 01:46:34', '-120-', '|439aaa0e-3f32-11ed-849b-f0761c70905c|', ''),
(2474, '', NULL, 169, 1, 1, 'histoires-de-parfums-parfyumernaya-voda-this-is-not-a-blue-bottle-13', 'HISTOIRES de PARFUMS Парфюмерная вода this is not a blue bottle 1/.3', 0, 0, '2023-09-18 01:46:34', '-15--60-', '|439aaa10-3f32-11ed-849b-f0761c70905c|439aaa0f-3f32-11ed-849b-f0761c70905c|', ''),
(2475, '', NULL, 169, 1, 1, 'histoires-de-parfums-parfyumernaya-voda-this-is-not-a-blue-bottle-12', 'HISTOIRES de PARFUMS Парфюмерная вода this is not a blue bottle 1/.2', 0, 0, '2023-09-18 01:46:34', '-15--60-', '|439aaa12-3f32-11ed-849b-f0761c70905c|439aaa11-3f32-11ed-849b-f0761c70905c|', ''),
(2476, '', NULL, 167, 1, 1, 'mint-moonglade-parfyumernayaya-voda-sprej', 'M.INT MOONGLADE Парфюмернаяя Вода  Спрей', 0, 0, '2023-09-18 01:46:34', '-70-', '|098e2d9e-409d-11ed-849b-f0761c70905c|', ''),
(2477, '', NULL, 167, 1, 1, 'blue-waterfall-parfyumernaya-voda--sprej', 'BLUE WATERFALL, Парфюмерная вода , спрей', 0, 0, '2023-09-18 01:46:34', '-70-', '|098e2d9f-409d-11ed-849b-f0761c70905c|', ''),
(2478, '', NULL, 168, 1, 1, 'marvis-nabor-marvis-tea-collection-zubnaya-pasta-blossom-tea--zubnaya-pasta-earl-grey-tea', 'MARVIS Набор MARVIS TEA COLLECTION (Зубная паста BLOSSOM TEA , Зубная паста EARL GREY TEA', 0, 0, '2023-09-18 01:46:34', '-25-', '|5d9ecbcd-4f31-11ed-849c-f0761c70905c|', ''),
(2479, '', NULL, 168, 1, 1, 'marvis-opolaskivatel---koncentrat-dlya-polosti-rta-myata-i-anis', 'MARVIS Ополаскиватель - концентрат для полости рта Мята и Анис', 0, 0, '2023-09-18 01:46:34', '-120-', '|5d9ecbce-4f31-11ed-849c-f0761c70905c|', ''),
(2480, '', NULL, 168, 1, 1, 'marvis-opolaskivatel---koncentrat-dlya-polosti-rta-myata-i-korica', 'MARVIS Ополаскиватель - концентрат для полости рта Мята и Корица', 0, 0, '2023-09-18 01:46:34', '-120-', '|5d9ecbcf-4f31-11ed-849c-f0761c70905c|', ''),
(2481, '', NULL, 168, 1, 1, 'marvis-opolaskivatel---koncentrat-dlya-polosti-rta-myata', 'MARVIS Ополаскиватель - концентрат для полости рта Мята', 0, 0, '2023-09-18 01:46:34', '-120-', '|5d9ecbd0-4f31-11ed-849c-f0761c70905c|', ''),
(2482, '', NULL, 168, 1, 1, 'marvis-nabor-marvis-the-mints-gift-set-zubnaya-pasta-klassicheskaya-nasyshhennaya-myata--zubnaya-pa', 'MARVIS Набор MARVIS THE MINTS GIFT SET (Зубная паста Классическая Насыщенная Мята , Зубная па', 0, 0, '2023-09-18 01:46:34', '-85-', '|5d9ecbd1-4f31-11ed-849c-f0761c70905c|', ''),
(2483, '', NULL, 168, 1, 1, 'marvis-nabor-marvis-toothpaste-travel-set-zubnaya-pasta-klassicheskaya-nasyshhennaya-myata--opolas', 'MARVIS Набор MARVIS TOOTHPASTE TRAVEL SET (Зубная паста Классическая Насыщенная Мята , Ополас', 0, 0, '2023-09-18 01:46:34', '-25-', '|5d9ecbd2-4f31-11ed-849c-f0761c70905c|', ''),
(2484, '', NULL, 168, 1, 1, 'marvis-nabor-marvis-the-spicys-gift-set-zubnaya-pasta-myata-i-korica--zubnaya-pasta-lakrica-a', 'MARVIS Набор MARVIS THE SPICYS GIFT SET (Зубная паста Мята и Корица , Зубная паста Лакрица А', 0, 0, '2023-09-18 01:46:34', '-85-', '|5d9ecbd3-4f31-11ed-849c-f0761c70905c|', ''),
(2485, '', NULL, 168, 1, 1, 'marvis-nabor-marvis-whitening-zubnaya-pasta-myata-otbelivayushhaya--v-komplekte-s-derzhatelem', 'MARVIS Набор MARVIS WHITENING (Зубная паста Мята отбеливающая , в комплекте с держателем)', 0, 0, '2023-09-18 01:46:34', '-85-', '|5d9ecbd5-4f31-11ed-849c-f0761c70905c|', ''),
(2486, '', NULL, 170, 1, 1, 'baza-pod-makiyazh-luminous-face-primer', 'База под макияж (Luminous face primer)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d764-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2487, '', NULL, 170, 1, 1, 'baza-pod-makiyazh-primary-pro-matte', 'База под макияж (Primary pro matte)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d765-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2488, '', NULL, 170, 1, 1, 'blesk-dlya-gub-lipgloss-01-rose-pink', 'Блеск для губ (Lipgloss 01 rose pink)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d766-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2489, '', NULL, 170, 1, 1, 'blesk-dlya-gub-lipgloss-02-dusty-rose', 'Блеск для губ (Lipgloss 02 dusty rose)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d767-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2490, '', NULL, 170, 1, 1, 'blesk-dlya-gub-lipgloss-04-peachy-rose', 'Блеск для губ (Lipgloss 04 peachy rose)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d768-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2491, '', NULL, 170, 1, 1, 'blesk-dlya-gub-lipgloss-05-soft-caramel', 'Блеск для губ (Lipgloss 05 soft caramel)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d769-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2492, '', NULL, 170, 1, 1, 'zerkalo-aa-mirror-makeup-hand', 'Зеркало АА (Mirror makeup hand)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d76a-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2493, '', NULL, 170, 1, 1, 'blesk-dlya-gub-lipgloss-07-glossy-purity', 'Блеск для губ (Lipgloss 07 glossy purity)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d76b-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2494, '', NULL, 170, 1, 1, 'blesk-dlya-gub-lipgloss-08-babe-nude', 'Блеск для губ (Lipgloss 08 babe nude)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d76c-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2495, '', NULL, 170, 1, 1, 'blesk-dlya-gub-lipgloss-09-softly-pink', 'Блеск для губ (Lipgloss 09 softly pink)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d76d-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2496, '', NULL, 170, 1, 1, 'blesk-dlya-gub-lipgloss-10-sweet-caramel', 'Блеск для губ (Lipgloss 10 sweet caramel)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d76e-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2497, '', NULL, 170, 1, 1, 'karandash-dlya-brovej-eyebrow-pencil-nude', 'Карандаш для бровей (Eyebrow pencil nude)', 0, 0, '2023-09-18 01:46:34', '--', '|6315d76f-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2498, '', NULL, 170, 1, 1, 'karandash-dlya-brovej-eyebrow-pencil-retractable-01', 'Карандаш для бровей (Eyebrow pencil retractable 01)', 0, 0, '2023-09-18 01:46:35', '--', '|6315d770-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2499, '', NULL, 170, 1, 1, 'karandash-dlya-brovej-eyebrow-pencil-retractable-02', 'Карандаш для бровей (Eyebrow pencil retractable 02)', 0, 0, '2023-09-18 01:46:35', '--', '|6315d771-5f53-11ed-849c-f0761c70905c|', 'decor'),
(2500, '', NULL, 170, 1, 1, 'karandash-dlya-brovej-eyebrow-pencil-retractable-03', 'Карандаш для бровей (Eyebrow pencil retractable 03)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf32f-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2501, '', NULL, 170, 1, 1, 'karandash-dlya-vek-eyeliner-pencil-black', 'Карандаш для век (Eyeliner pencil black)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf330-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2502, '', NULL, 170, 1, 1, 'karandash-dlya-vek-eyeliner-pencil-brown', 'Карандаш для век (Eyeliner pencil brown)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf331-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2503, '', NULL, 170, 1, 1, 'karandash-dlya-vek-eyeliner-pencil-dark-blue', 'Карандаш для век (Eyeliner pencil dark blue)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf332-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2504, '', NULL, 170, 1, 1, 'karandash-dlya-vek-eyeliner-pencil-green', 'Карандаш для век (Eyeliner pencil green)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf333-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2505, '', NULL, 170, 1, 1, 'karandash-dlya-vek-inner-pencil-creamy', 'Карандаш для век (Inner pencil creamy)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf334-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2506, '', NULL, 170, 1, 1, 'karandash-dlya-vek-smoky-eye-pencil', 'Карандаш для век (Smoky eye pencil)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf335-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2507, '', NULL, 170, 1, 1, 'karandash-dlya-gub-lipliner-pencil-dusty-red', 'Карандаш для губ (Lipliner pencil dusty red)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf336-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2508, '', NULL, 170, 1, 1, 'karandash-dlya-gub-lipliner-pencil-light-nude', 'Карандаш для губ (Lipliner pencil light nude)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf337-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2509, '', NULL, 170, 1, 1, 'karandash-dlya-gub-lipliner-pencil-light-pink', 'Карандаш для губ (Lipliner pencil light pink)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf338-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2510, '', NULL, 170, 1, 1, 'karandash-dlya-gub-lipliner-pencil-red', 'Карандаш для губ (Lipliner pencil red)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf339-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2511, '', NULL, 170, 1, 1, 'karandash-dlya-gub-lipliner-pencil-ruby', 'Карандаш для губ (Lipliner pencil ruby)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf33a-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2512, '', NULL, 170, 1, 1, 'karandash-dlya-gub-lipliner-pencil-salmon', 'Карандаш для губ (Lipliner pencil salmon)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf33b-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2513, '', NULL, 170, 1, 1, 'kist-dlya-makiyazha-aa-concealer-brush', 'Кисть для макияжа АА (Concealer brush)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf33c-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2514, '', NULL, 170, 1, 1, 'kist-dlya-makiyazha-aa-eyebrow-brush', 'Кисть для макияжа АА (Eyebrow brush)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf33d-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2515, '', NULL, 170, 1, 1, 'kist-dlya-makiyazha-aa-eyebrow-comb', 'Кисть для макияжа АА (Eyebrow comb)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf33e-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2516, '', NULL, 170, 1, 1, 'kist-dlya-makiyazha-aa-eyeshadow-brush', 'Кисть для макияжа АА (Eyeshadow brush)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf33f-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2517, '', NULL, 170, 1, 1, 'krem-vv-bb-cream-10-fair-to-light', 'Крем ВВ (BB Cream 10 fair to light)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf340-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2518, '', NULL, 170, 1, 1, 'krem-vv-bb-cream-20-light-to-medium', 'Крем ВВ (BB Cream 20 light to medium)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf341-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2519, '', NULL, 170, 1, 1, 'krem-vv-bb-cream-30-medium', 'Крем ВВ (BB Cream 30 medium)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf342-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2520, '', NULL, 170, 1, 1, 'krem-vv-bb-cream-40-medium-to-dark', 'Крем ВВ (BB Cream 40 medium to dark)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf343-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2521, '', NULL, 170, 1, 1, 'krem-tonalnyj-liquid-foundation-302-ochre-beige', 'Крем тональный (Liquid foundation 302 ochre beige)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf344-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2522, '', NULL, 170, 1, 1, 'krem-tonalnyj-liquid-foundation-301-soft-ivory', 'Крем тональный (Liquid foundation 301 soft ivory)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf345-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2523, '', NULL, 170, 1, 1, 'krem-tonalnyj-liquid-foundation-304-buff', 'Крем тональный (Liquid foundation 304 buff)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf346-61c3-11ed-849c-f0761c70905c|', 'decor');
INSERT INTO `tovari` (`id`, `opisanie`, `image`, `cat`, `mugskaya`, `genskaya`, `seo_url`, `nazvanie`, `status`, `old_price`, `date_time_add`, `po_ml`, `uid`, `realcat`) VALUES
(2524, '', NULL, 170, 1, 1, 'krem-tonalnyj-liquid-foundation-309-cashmere-beige', 'Крем тональный (Liquid foundation 309 cashmere beige)', 0, 0, '2023-09-18 01:46:35', '--', '|eb7bf347-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2525, '', NULL, 170, 1, 1, 'krem-tonalnyj-liquid-foundation-310-pale-camel', 'Крем тональный (Liquid foundation 310 pale camel)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf348-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2526, '', NULL, 170, 1, 1, 'krem-tonalnyj-liquid-foundation-311-deep-beige', 'Крем тональный (Liquid foundation 311 deep beige)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf349-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2527, '', NULL, 170, 1, 1, 'krem-tonalnyj-antivozrastnoj-anti-aging-foundation-501-light-beige', 'Крем тональный антивозрастной (Anti-aging foundation 501 light beige)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf34a-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2528, '', NULL, 170, 1, 1, 'krem-tonalnyj-antivozrastnoj-anti-aging-foundation-503-soft-peach', 'Крем тональный антивозрастной (Anti-aging foundation 503 soft peach)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf34b-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2529, '', NULL, 170, 1, 1, 'krem-tonalnyj-antivozrastnoj-anti-aging-foundation-504-natural-beige', 'Крем тональный антивозрастной (Anti-aging foundation 504 natural beige)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf34c-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2530, '', NULL, 170, 1, 1, 'krem-tonalnyj-antivozrastnoj-anti-aging-foundation-505-warm-peach', 'Крем тональный антивозрастной (Anti-aging foundation 505 warm peach)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf34d-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2531, '', NULL, 170, 1, 1, 'krem-tonalnyj-antivozrastnoj-anti-aging-foundation-507-natural-buff', 'Крем тональный антивозрастной (Anti-aging foundation 507 natural buff)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf34e-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2532, '', NULL, 170, 1, 1, 'krem-tonalnyj-antivozrastnoj-anti-aging-foundation-508-sable-sand', 'Крем тональный антивозрастной (Anti-aging foundation 508 sable sand)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf34f-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2533, '', NULL, 170, 1, 1, 'krem-tonalnyj-matiruyushhij-matte-foundation-401-soft-ivory', 'Крем тональный матирующий (Matte foundation 401 soft ivory)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf350-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2534, '', NULL, 170, 1, 1, 'krem-tonalnyj-matiruyushhij-matte-foundation-402-ochre-beige', 'Крем тональный матирующий (Matte foundation 402 ochre beige)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf351-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2535, '', NULL, 170, 1, 1, 'krem-tonalnyj-matiruyushhij-matte-foundation-407-true-sand', 'Крем тональный матирующий (Matte foundation 407 true sand)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf352-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2536, '', NULL, 170, 1, 1, 'krem-tonalnyj-matiruyushhij-matte-foundation-408-beige', 'Крем тональный матирующий (Matte foundation 408 beige)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf353-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2537, '', NULL, 170, 1, 1, 'krem-tonalnyj-matiruyushhij-matte-foundation-409-cashmere-beige', 'Крем тональный матирующий (Matte foundation 409 cashmere beige)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf354-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2538, '', NULL, 170, 1, 1, 'krem-tonalnyj-matiruyushhij-matte-foundation-410-pale-camel', 'Крем тональный матирующий (Matte foundation 410 pale camel)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf355-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2539, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-01', 'Лак для ногтей (Nail polish 01)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf356-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2540, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-07', 'Лак для ногтей (Nail polish 07)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf357-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2541, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-101', 'Лак для ногтей (Nail polish 101)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf358-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2542, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-11', 'Лак для ногтей (Nail polish 11)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf359-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2543, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-16', 'Лак для ногтей (Nail polish 16)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf35a-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2544, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-21', 'Лак для ногтей (Nail polish 21)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf35b-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2545, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-56', 'Лак для ногтей (Nail polish 56)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf35c-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2546, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-64', 'Лак для ногтей (Nail polish 64)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf35d-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2547, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-80', 'Лак для ногтей (Nail polish 80)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf35e-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2548, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-81', 'Лак для ногтей (Nail polish 81)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf35f-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2549, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-95', 'Лак для ногтей (Nail polish 95)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf360-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2550, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-96', 'Лак для ногтей (Nail polish 96)', 0, 0, '2023-09-18 01:46:36', '--', '|eb7bf361-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2551, '', NULL, 170, 1, 1, 'maskiruyushhij-krem-korrektor-liquid-concealer-103-creamy-beige', 'Маскирующий крем корректор (Liquid concealer 103 creamy beige)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf362-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2552, '', NULL, 170, 1, 1, 'maskiruyushhij-krem-korrektor-liquid-concealer-104-warm-bisque', 'Маскирующий крем корректор (Liquid concealer 104 warm bisque)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf363-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2553, '', NULL, 170, 1, 1, 'maskiruyushhij-krem-korrektor-liquid-concealer-105-cool-rose', 'Маскирующий крем корректор (Liquid concealer 105 cool rose)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf364-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2554, '', NULL, 170, 1, 1, 'maskiruyushhij-krem-korrektor-liquid-concealer-108-butter-milk', 'Маскирующий крем корректор (Liquid concealer 108 butter milk)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf365-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2555, '', NULL, 170, 1, 1, 'podvodka-flomaster-dlya-glaz-inkliner-pencil-black', 'Подводка-фломастер для глаз (Inkliner pencil black)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf366-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2556, '', NULL, 170, 1, 1, 'podvodka-dlya-glaz-ultra-black-dipliner', 'Подводка для глаз (Ultra black dipliner)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf367-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2557, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-301-bright-pink', 'Помада глянцевая (Lipstick glossy 301 bright pink)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf368-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2558, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-302-nude', 'Помада глянцевая (Lipstick glossy 302 nude)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf369-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2559, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-303-nude-rose', 'Помада глянцевая (Lipstick glossy 303 nude rose)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf36a-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2560, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-304-nude-apricot', 'Помада глянцевая (Lipstick glossy 304 nude apricot)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf36b-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2561, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-305-rose-apricot', 'Помада глянцевая (Lipstick glossy 305 rose apricot)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf36c-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2562, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-307-sheer-coral', 'Помада глянцевая (Lipstick glossy 307 sheer coral)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf36d-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2563, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-312-true-rose', 'Помада глянцевая (Lipstick glossy 312 true rose)', 0, 0, '2023-09-18 01:46:37', '--', '|eb7bf36e-61c3-11ed-849c-f0761c70905c|', 'decor'),
(2564, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-313-too-rose', 'Помада глянцевая (Lipstick glossy 313 too rose)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb04-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2565, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-314-dirty-rose', 'Помада глянцевая (Lipstick glossy 314 dirty rose)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb05-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2566, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-315-glossy-plum', 'Помада глянцевая (Lipstick glossy 315 glossy plum)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb06-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2567, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-317-bright-fuschia', 'Помада глянцевая (Lipstick glossy 317 bright fuschia)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb07-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2568, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-318-berry', 'Помада глянцевая (Lipstick glossy 318 berry)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb08-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2569, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-319-deep-fuschia', 'Помада глянцевая (Lipstick glossy 319 deep fuschia)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb09-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2570, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-320-glossy-red', 'Помада глянцевая (Lipstick glossy 320 glossy red)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb0a-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2571, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-321-stunning-red', 'Помада глянцевая (Lipstick glossy 321 stunning red)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb0b-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2572, '', NULL, 170, 1, 1, 'pomada-glyancevaya-lipstick-glossy-322-cranberry', 'Помада глянцевая (Lipstick glossy 322 cranberry)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb0c-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2573, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-402-nude', 'Помада матовая (Lipstick matte 402 nude)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb0d-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2574, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-403-caramel-nude', 'Помада матовая (Lipstick matte 403 caramel nude)', 0, 0, '2023-09-18 01:46:37', '--', '|2324bb0e-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2575, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-405-peach-nude', 'Помада матовая (Lipstick matte 405 peach nude)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb0f-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2576, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-407-dusty-rose', 'Помада матовая (Lipstick matte 407 dusty rose)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb10-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2577, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-408-spicy-rose', 'Помада матовая (Lipstick matte 408 spicy rose)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb11-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2578, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-409-rose-apricot', 'Помада матовая (Lipstick matte 409 rose apricot)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb12-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2579, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-410-rose-coral', 'Помада матовая (Lipstick matte 410 rose coral)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb13-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2580, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-414-deep-pink', 'Помада матовая (Lipstick matte 414 deep pink)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb14-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2581, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-415-dusty-pink', 'Помада матовая (Lipstick matte 415 dusty pink)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb15-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2582, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-416-berry-pink', 'Помада матовая (Lipstick matte 416 berry pink)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb16-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2583, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-421-orange-red', 'Помада матовая (Lipstick matte 421 orange red)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb17-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2584, '', NULL, 170, 1, 1, 'pomada-matovaya-lipstick-matte-422-wild-red', 'Помада матовая (Lipstick matte 422 wild red)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb18-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2585, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-502-peachy-nude', 'Помада матовая жидкая (Lipstick matte liquid 502 peachy nude)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb19-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2586, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-505-nude-pink', 'Помада матовая жидкая (Lipstick matte liquid 505 nude pink)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb1a-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2587, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-506-dirty-pink', 'Помада матовая жидкая (Lipstick matte liquid 506 dirty pink)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb1b-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2588, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-508-bright-rose', 'Помада матовая жидкая (Lipstick matte liquid 508 bright rose)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb1c-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2589, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-509-berry', 'Помада матовая жидкая (Lipstick matte liquid 509 berry)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb1d-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2590, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-510-dark-rose', 'Помада матовая жидкая (Lipstick matte liquid 510 dark rose)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb1e-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2591, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-514-bright-fuschia', 'Помада матовая жидкая (Lipstick matte liquid 514 bright fuschia)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb1f-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2592, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-515-royal-cranberry', 'Помада матовая жидкая (Lipstick matte liquid 515 royal cranberry)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb20-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2593, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-517-sweet-plum', 'Помада матовая жидкая (Lipstick matte liquid 517 sweet plum)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb21-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2594, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-520-red-carpet', 'Помада матовая жидкая (Lipstick matte liquid 520 red carpet)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb22-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2595, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-521-wild-red', 'Помада матовая жидкая (Lipstick matte liquid 521 wild red)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb23-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2596, '', NULL, 170, 1, 1, 'pomada-matovaya-zhidkaya-lipstick-matte-liquid-523-berry-red', 'Помада матовая жидкая (Lipstick matte liquid 523 berry red)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb24-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2597, '', NULL, 170, 1, 1, 'pudra-dlya-lica-kompaktnaya-compact-powder-01-porcelain', 'Пудра для лица компактная (Compact powder 01 porcelain)', 0, 0, '2023-09-18 01:46:38', '--', '|2324bb25-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2598, '', NULL, 170, 1, 1, 'pudra-dlya-lica-kompaktnaya-compact-powder-04-light-ivory', 'Пудра для лица компактная (Compact powder 04 light ivory)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb26-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2599, '', NULL, 170, 1, 1, 'pudra-dlya-lica-kompaktnaya-compact-powder-05-bisque', 'Пудра для лица компактная (Compact powder 05 bisque)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb27-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2600, '', NULL, 170, 1, 1, 'pudra-dlya-lica-kompaktnaya-compact-powder-08-cool-rose', 'Пудра для лица компактная (Compact powder 08 cool rose)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb28-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2601, '', NULL, 170, 1, 1, 'pudra-dlya-lica-kompaktnaya-compact-powder-09-golden-sand', 'Пудра для лица компактная (Compact powder 09 golden sand)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb29-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2602, '', NULL, 170, 1, 1, 'pudra-dlya-lica-kompaktnaya-compact-powder-10-soft-desert', 'Пудра для лица компактная (Compact powder 10 soft desert)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb2a-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2603, '', NULL, 170, 1, 1, 'pudra-dlya-lica-kompaktnaya-bronziruyushhaya-bronzing-powder-301-warm-tan', 'Пудра для лица компактная бронзирующая (Bronzing powder 301 warm tan)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb2b-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2604, '', NULL, 170, 1, 1, 'pudra-dlya-lica-kompaktnaya-bronziruyushhaya-bronzing-powder-302-deep-bronze', 'Пудра для лица компактная бронзирующая (Bronzing powder 302 deep bronze)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb2c-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2605, '', NULL, 170, 1, 1, 'pudra-dlya-lica-kompaktnaya-zapechennaya-baked-powder-201-nude-ivory', 'Пудра для лица компактная запеченная (Baked powder 201 nude ivory)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb2d-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2606, '', NULL, 170, 1, 1, 'pudra-dlya-lica-rassypchataya-loose-powder-04-desert-sand', 'Пудра для лица рассыпчатая (Loose powder 04 desert sand)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb2e-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2607, '', NULL, 170, 1, 1, 'pudra-dlya-lica-rassypchataya-loose-powder-02-nude-ivory', 'Пудра для лица рассыпчатая (Loose powder 02 nude ivory)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb2f-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2608, '', NULL, 170, 1, 1, 'pudra-dlya-lica-rassypchataya-loose-powder-03-soft-apricot', 'Пудра для лица рассыпчатая (Loose powder 03 soft apricot)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb30-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2609, '', NULL, 170, 1, 1, 'rumyana-dlya-lica-kompaktnye-zapechennye-baked-blush-105-bright-nude', 'Румяна для лица компактные запеченные (Baked blush 105 bright nude)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb31-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2610, '', NULL, 170, 1, 1, 'rumyana-dlya-lica-kompaktnye-zapechennye-baked-blush-103-sparkling-cinnamon', 'Румяна для лица компактные запеченные (Baked blush 103 sparkling cinnamon)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb32-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2611, '', NULL, 170, 1, 1, 'rumyana-dlya-lica-kompaktnye-zapechennye-baked-blush-102-dirty-rose', 'Румяна для лица компактные запеченные (Baked blush 102 dirty rose)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb33-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2612, '', NULL, 170, 1, 1, 'rumyana-dlya-lica-kompaktnye-powder-blush-101-nude-pink', 'Румяна для лица компактные (Powder blush 101 nude pink)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb34-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2613, '', NULL, 170, 1, 1, 'rumyana-dlya-lica-kompaktnye-powder-blush-104-sweetie', 'Румяна для лица компактные (Powder blush 104 sweetie)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb35-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2614, '', NULL, 170, 1, 1, 'rumyana-dlya-lica-kompaktnye-powder-blush-105-babe', 'Румяна для лица компактные (Powder blush 105 babe)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb36-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2615, '', NULL, 170, 1, 1, 'rumyana-dlya-lica-kompaktnye-powder-blush-108-sweet-apricot', 'Румяна для лица компактные (Powder blush 108 sweet apricot)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb37-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2616, '', NULL, 170, 1, 1, 'rumyana-dlya-lica-kompaktnye-powder-blush-109-pretty-blush', 'Румяна для лица компактные (Powder blush 109 pretty blush)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb38-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2617, '', NULL, 170, 1, 1, 'rumyana-dlya-lica-kompaktnye-powder-blush-112-rosewood', 'Румяна для лица компактные (Powder blush 112 rosewood)', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb39-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2618, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-duo-202-blue-gray--pearly-navy-2pcs', 'Тени для век (Eyeshadow duo 202 blue gray & pearly navy (2pcs))', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb3a-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2619, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-duo-203-pearly-sage--khaki-2pcs', 'Тени для век (Eyeshadow duo 203 pearly sage & khaki (2pcs))', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb3b-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2620, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-duo-205-warm-nude--pearly-peanut-2pcs', 'Тени для век (Eyeshadow duo 205 warm nude & pearly peanut (2pcs))', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb3c-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2621, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-duo-206-power-of-pearls--creamy-brown-2pcs', 'Тени для век (Eyeshadow duo 206 power of pearls & creamy brown (2pcs))', 0, 0, '2023-09-18 01:46:39', '--', '|2324bb3d-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2622, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-mono-102-soft-apricot', 'Тени для век (Eyeshadow mono 102 soft apricot)', 0, 0, '2023-09-18 01:46:40', '--', '|2324bb3e-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2623, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-mono-103-milky-coffee', 'Тени для век (Eyeshadow mono 103 milky coffee)', 0, 0, '2023-09-18 01:46:40', '--', '|2324bb3f-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2624, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-mono-104-spring-blossom', 'Тени для век (Eyeshadow mono 104 spring blossom)', 0, 0, '2023-09-18 01:46:40', '--', '|2324bb40-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2625, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-mono-106-olive-blossom', 'Тени для век (Eyeshadow mono 106 olive blossom)', 0, 0, '2023-09-18 01:46:40', '--', '|2324bb41-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2626, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-pallette-333-glamorous-galaxy-12pcs', 'Тени для век (Eyeshadow pallette 333 glamorous galaxy (12pcs))', 0, 0, '2023-09-18 01:46:40', '--', '|2324bb42-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2627, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-pallette-555-coffee-time-12pcs', 'Тени для век (Eyeshadow pallette 555 coffee time (12pcs))', 0, 0, '2023-09-18 01:46:40', '--', '|2324bb43-61d4-11ed-849c-f0761c70905c|', 'decor'),
(2628, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-pallette-777-obsessive-addiction-12pcs', 'Тени для век (Eyeshadow pallette 777 obsessive addiction (12pcs))', 0, 0, '2023-09-18 01:46:40', '--', '|1fd0edf9-61e1-11ed-849c-f0761c70905c|', 'decor'),
(2629, '', NULL, 170, 1, 1, 'teni-dlya-vek-eyeshadow-pallette-999-all-seasons-12pcs', 'Тени для век (Eyeshadow pallette 999 all seasons (12pcs))', 0, 0, '2023-09-18 01:46:40', '--', '|1fd0edfa-61e1-11ed-849c-f0761c70905c|', 'decor'),
(2630, '', NULL, 170, 1, 1, 'tush-dlya-resnic-mascara-3-in-1', 'Тушь для ресниц (Mascara 3 in 1)', 0, 0, '2023-09-18 01:46:40', '--', '|1fd0edfb-61e1-11ed-849c-f0761c70905c|', 'decor'),
(2631, '', NULL, 170, 1, 1, 'tush-dlya-resnic-mascara-volume', 'Тушь для ресниц (Mascara volume)', 0, 0, '2023-09-18 01:46:40', '--', '|1fd0edfc-61e1-11ed-849c-f0761c70905c|', 'decor'),
(2632, '', NULL, 170, 1, 1, 'hajlajter-powder-highlighter-gold', 'Хайлайтер (Powder highlighter gold)', 0, 0, '2023-09-18 01:46:40', '--', '|1fd0edfd-61e1-11ed-849c-f0761c70905c|', 'decor'),
(2633, '', NULL, 170, 1, 1, 'hajlajter-powder-highlighter-nude', 'Хайлайтер (Powder highlighter nude)', 0, 0, '2023-09-18 01:46:40', '--', '|1fd0edfe-61e1-11ed-849c-f0761c70905c|', 'decor'),
(2634, '', NULL, 170, 1, 1, 'hajlajter-powder-highlighter-pink', 'Хайлайтер (Powder highlighter pink)', 0, 0, '2023-09-18 01:46:40', '--', '|1fd0edff-61e1-11ed-849c-f0761c70905c|', 'decor'),
(2635, '', NULL, 156, 1, 1, 'qissati-my-story-lattafa', 'QISSATI MY STORY LATTAFA', 0, 0, '2023-09-18 01:46:40', '-100-', '|d5c38173-74b7-11ed-849c-f0761c70905c|', ''),
(2636, '', NULL, 157, 1, 1, '9-am-pour-femme-pink-w-edp', '9 AM POUR FEMME (PINK) w EDP', 0, 0, '2023-09-18 01:46:40', '-100-', '|9dd29237-7bc4-11ed-849c-f0761c70905c|', 'parfum'),
(2637, '', NULL, 157, 1, 1, '9-pm-pour-femme-purple-w-edp', '9 PM POUR FEMME (PURPLE) w EDP', 0, 0, '2023-09-18 01:46:40', '-100-', '|9dd29238-7bc4-11ed-849c-f0761c70905c|', 'parfum'),
(2638, '', NULL, 157, 1, 1, 'historic-olmeda-u-edp', 'HISTORIC OLMEDA u EDP', 0, 0, '2023-09-18 01:46:40', '-100-', '|9dd29239-7bc4-11ed-849c-f0761c70905c|', 'parfum'),
(2639, '', NULL, 157, 1, 1, 'omniyah-pour-homme-m-edp', 'OMNIYAH POUR HOMME m EDP', 0, 0, '2023-09-18 01:46:40', '-100-', '|9dd2923b-7bc4-11ed-849c-f0761c70905c|', 'parfum'),
(2640, '', NULL, 157, 1, 1, 'patchouli-on-fire-u-edp', 'PATCHOULI ON FIRE u EDP', 0, 0, '2023-09-18 01:46:40', '-80-', '|9dd2923c-7bc4-11ed-849c-f0761c70905c|', 'parfum'),
(2641, '', NULL, 157, 1, 1, 'tobacco-rush-u-edp', 'TOBACCO RUSH u EDP', 0, 0, '2023-09-18 01:46:40', '-80-', '|9dd2923d-7bc4-11ed-849c-f0761c70905c|', 'parfum'),
(2642, '', NULL, 157, 1, 1, 'zahrat-al-kha-leej-u-edp', 'ZAHRAT AL KHA LEEJ u EDP', 0, 0, '2023-09-18 01:46:40', '-100-', '|00b5ee86-7c7c-11ed-849c-f0761c70905c|', 'parfum'),
(2643, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-chaj-matcha-creamy-matcha-tea', 'Marvis Зубная паста  Чай матча Creamy Matcha Tea', 0, 0, '2023-09-18 01:46:41', '-25-', '|31149b41-85d9-11ed-849c-f0761c70905c|', ''),
(2644, '', NULL, 156, 1, 1, 'yara-moi-lattafa', 'YARA MOI Lattafa', 0, 0, '2023-09-18 01:46:41', '-100-', '|31149b43-85d9-11ed-849c-f0761c70905c|', ''),
(2645, '', NULL, 156, 1, 1, 'thuraya-lattafa', 'THURAYA LATTAFA', 0, 0, '2023-09-18 01:46:41', '-100-', '|5a24351f-86b8-11ed-849c-f0761c70905c|', ''),
(2646, '', NULL, 171, 1, 1, 'pitatelnyj-krem-dlya-nog-suhoj-i-ochen-suhoj-goldman-cosmetics', 'ПИТАТЕЛЬНЫЙ КРЕМ ДЛЯ НОГ (СУХОЙ И ОЧЕНЬ СУХОЙ) GOLDMAN COSMETICS', 0, 0, '2023-09-18 01:46:41', '-100-', '|3ca5be6c-9801-11ed-849d-f0761c70905c|', ''),
(2647, '', NULL, 171, 1, 1, 'uvlazhnyayushhij-krem-dlya-nog-goldman-cosmetics', 'УВЛАЖНЯЮЩИЙ КРЕМ ДЛЯ НОГ GOLDMAN COSMETICS', 0, 0, '2023-09-18 01:46:41', '-100-', '|3ca5be6d-9801-11ed-849d-f0761c70905c|', ''),
(2648, '', NULL, 171, 1, 1, 'universalnyj-krem-dlya-ruk-goldman-cosmetics', 'УНИВЕРСАЛЬНЫЙ КРЕМ ДЛЯ РУК GOLDMAN COSMETICS', 0, 0, '2023-09-18 01:46:41', '-100-', '|3ca5be6e-9801-11ed-849d-f0761c70905c|', ''),
(2649, '', NULL, 171, 1, 1, 'zhidkoe-mylo-dlya-nog-goldman-cosmetics', 'ЖИДКОЕ МЫЛО ДЛЯ НОГ GOLDMAN COSMETICS', 0, 0, '2023-09-18 01:46:41', '-200-', '|3ca5be6f-9801-11ed-849d-f0761c70905c|', ''),
(2650, '', NULL, 172, 1, 1, 'john-milltone-sprej-dlya-volos-30-v-1-s-keratinom-perfect-hair-and-scalp-home', 'JOHN MILLTONE Спрей для волос 30 в 1 с кератином PERFECT HAIR AND SCALP home', 0, 0, '2023-09-18 01:46:41', '--', '|8584b7fa-aebc-11ed-849d-f0761c70905c|', ''),
(2651, '', NULL, 172, 1, 1, 'john-milltone-maska-dlya-volos-s-ceramidami-perfect-hair-and-scalp-home', 'JOHN MILLTONE Маска для волос с церамидами PERFECT HAIR AND SCALP home', 0, 0, '2023-09-18 01:46:41', '--', '|8584b7fb-aebc-11ed-849d-f0761c70905c|', ''),
(2652, '', NULL, 172, 1, 1, 'john-milltone-balzam-dlya-volos-perfect-hair-and-scalp-home', 'JOHN MILLTONE Бальзам для волос PERFECT HAIR AND SCALP home', 0, 0, '2023-09-18 01:46:41', '--', '|8584b7fc-aebc-11ed-849d-f0761c70905c|', ''),
(2653, '', NULL, 172, 1, 1, 'john-milltone---shampun-dlya-volos-perfect-hair-and-scalp-home', 'JOHN MILLTONE  - Шампунь для волос PERFECT HAIR AND SCALP home', 0, 0, '2023-09-18 01:46:41', '--', '|8584b7fd-aebc-11ed-849d-f0761c70905c|', ''),
(2654, '', NULL, 156, 1, 1, 'badee-al-oud-lattafa', 'BADEE AL OUD  LATTAFA', 0, 0, '2023-09-18 01:46:41', '-100-', '|95cb89e6-bc18-11ed-849e-f0761c70905c|', ''),
(2655, '', NULL, 168, 1, 1, 'marvis-zubnaya-pasta-dlya-chuvstvitelnyh-desen', 'MARVIS Зубная паста для чувствительных десен', 0, 0, '2023-09-18 01:46:41', '-75-', '|118c9bab-d782-11ed-849e-f0761c70905c|', ''),
(2656, '', NULL, 173, 1, 1, 'loson-posle-britya-floid-the-genuine', 'Лосьон после бритья Floid The Genuine', 0, 0, '2023-09-18 01:46:41', '-150-', '|118c9baf-d782-11ed-849e-f0761c70905c|', 'face'),
(2657, '', NULL, 173, 1, 1, 'balzam-posle-britya-vetyver-splash-floid-the-genuine', 'Бальзам после бритья VETYVER SPLASH Floid The Genuine', 0, 0, '2023-09-18 01:46:41', '-100-', '|118c9bb0-d782-11ed-849e-f0761c70905c|', 'face'),
(2658, '', NULL, 173, 1, 1, 'gel-dlya-dusha-vetyver-splash-floid-the-genuine', 'Гель для душа  VETYVER SPLASH Floid The Genuine', 0, 0, '2023-09-18 01:46:41', '-500-', '|118c9bb1-d782-11ed-849e-f0761c70905c|', 'body'),
(2659, '', NULL, 173, 1, 1, 'gel-dlya-dusha-citrus-spectre-floid-the-genuine', 'Гель для душа CITRUS SPECTRE Floid The Genuine', 0, 0, '2023-09-18 01:46:41', '-500-', '|118c9bb2-d782-11ed-849e-f0761c70905c|', 'body'),
(2660, '', NULL, 173, 1, 1, 'dezodorant-stik-vetyver-splash-floid-the-genuine', 'Дезодорант-стик VETYVER SPLASH Floid The Genuine', 0, 0, '2023-09-18 01:46:41', '-75-', '|118c9bb3-d782-11ed-849e-f0761c70905c|', 'body'),
(2661, '', NULL, 173, 1, 1, 'gel-dlya-britya-vetyver-splash-floid-the-genuine', 'Гель для бритья VETYVER SPLASH Floid The Genuine', 0, 0, '2023-09-18 01:46:41', '-150-', '|118c9bb4-d782-11ed-849e-f0761c70905c|', 'face'),
(2662, '', NULL, 173, 1, 1, 'mylo-tverdoe-vetyver-splash-floid-the-genuine-120-gr', 'Мыло твердое VETYVER SPLASH Floid The Genuine 120 гр', 0, 0, '2023-09-18 01:46:41', '--', '|118c9bb5-d782-11ed-849e-f0761c70905c|', 'body'),
(2663, '', NULL, 173, 1, 1, 'gel-dlya-britya-citrus-spectre-floid-the-genuine', 'Гель для бритья CITRUS SPECTRE Floid The Genuine', 0, 0, '2023-09-18 01:46:41', '-150-', '|118c9bb6-d782-11ed-849e-f0761c70905c|', 'face'),
(2664, '', NULL, 173, 1, 1, 'mylo-tverdoe-citrus-spectre-floid-the-genuine-120-gr', 'Мыло твердое CITRUS SPECTRE Floid The Genuine 120 гр', 0, 0, '2023-09-18 01:46:42', '--', '|118c9bb7-d782-11ed-849e-f0761c70905c|', 'body'),
(2665, '', NULL, 173, 1, 1, 'balzam-posle-britya-citrus-spectre-floid-the-genuine', 'Бальзам после бритья CITRUS SPECTRE Floid The Genuine', 0, 0, '2023-09-18 01:46:42', '-100-', '|118c9bb8-d782-11ed-849e-f0761c70905c|', 'face'),
(2666, '', NULL, 173, 1, 1, 'dezodorant-stik-citrus-spectre-floid-the-genuine', 'Дезодорант-стик CITRUS SPECTRE Floid The Genuine', 0, 0, '2023-09-18 01:46:42', '-75-', '|118c9bb9-d782-11ed-849e-f0761c70905c|', 'body'),
(2667, '', NULL, 169, 1, 1, 'histoires-de-parfums-parfyumernaya-voda-1969', 'HISTOIRES de PARFUMS Парфюмерная вода 1969', 0, 0, '2023-09-18 01:46:42', '-15-', '|80c2bc4f-d788-11ed-849e-f0761c70905c|', ''),
(2668, '', NULL, 169, 1, 1, 'histoires-de-parfums-parfyumernaya-voda-1804', 'HISTOIRES de PARFUMS Парфюмерная вода 1804', 0, 0, '2023-09-18 01:46:42', '-15--60--120-', '|80c2bc52-d788-11ed-849e-f0761c70905c|80c2bc51-d788-11ed-849e-f0761c70905c|80c2bc50-d788-11ed-849e-f0761c70905c|', ''),
(2669, '', NULL, 157, 1, 1, 'dehn-al-oudh-abiyad-u-edp--parfyumernaya-voda', 'DEHN AL OUDH ABIYAD u EDP  | парфюмерная вода', 0, 0, '2023-09-18 01:46:42', '-100-', '|e99ad4ba-dcf9-11ed-849e-f0761c70905c|', 'parfum'),
(2670, '', NULL, 157, 1, 1, 'historic-doria-w-edp--parfyumernaya-voda', 'HISTORIC DORIA w EDP  | парфюмерная вода', 0, 0, '2023-09-18 01:46:42', '-100-', '|e99ad4bb-dcf9-11ed-849e-f0761c70905c|', 'parfum'),
(2671, '', NULL, 157, 1, 1, 'la-fleur-bouquet-u-edp--parfyumernaya-voda', 'LA FLEUR BOUQUET u EDP  | парфюмерная вода', 0, 0, '2023-09-18 01:46:42', '-80-', '|e99ad4bc-dcf9-11ed-849e-f0761c70905c|', 'parfum'),
(2672, '', NULL, 157, 1, 1, 'mukhallat-abiyad-u-edp--parfyumernaya-voda', 'MUKHALLAT ABIYAD u EDP  | парфюмерная вода', 0, 0, '2023-09-18 01:46:42', '-100-', '|e99ad4bf-dcf9-11ed-849e-f0761c70905c|', 'parfum'),
(2673, '', NULL, 157, 1, 1, 'pride-pour-homme-m-edp--parfyumernaya-voda', 'PRIDE POUR HOMME m EDP  | парфюмерная вода', 0, 0, '2023-09-18 01:46:42', '-100-', '|e99ad4c0-dcf9-11ed-849e-f0761c70905c|', 'parfum'),
(2674, '', NULL, 157, 1, 1, 'supremacy-in-oud-u-per--duhi', 'SUPREMACY IN OUD u PER  | духи', 0, 0, '2023-09-18 01:46:42', '-100-', '|e99ad4c1-dcf9-11ed-849e-f0761c70905c|', 'parfum'),
(2675, '', NULL, 157, 1, 1, 'tribute-black-cartbox-u-edp--parfyumernaya-voda', 'TRIBUTE BLACK CARTBOX  u EDP  | парфюмерная вода', 0, 0, '2023-09-18 01:46:42', '-100-', '|e99ad4c2-dcf9-11ed-849e-f0761c70905c|', 'parfum'),
(2676, '', NULL, 157, 1, 1, 'violet-bouquet-u-edp--parfyumernaya-voda', 'VIOLET BOUQUET u EDP  | парфюмерная вода', 0, 0, '2023-09-18 01:46:42', '-80-', '|e99ad4c3-dcf9-11ed-849e-f0761c70905c|', 'parfum'),
(2677, '', NULL, 174, 1, 1, 'malbrum-vol-i---psychotrope---extrait-de-parfum', 'MALBRUM Vol. I - PSYCHOTROPE - Extrait de Parfum', 0, 0, '2023-09-18 01:46:42', '-30-', '|1d4bcd77-ddd3-11ed-849e-f0761c70905c|', 'parfum'),
(2678, '', NULL, 174, 1, 1, 'malbrum-vol-i---shameless-seducer---extrait-de-parfum', 'MALBRUM Vol. I - SHAMELESS SEDUCER - Extrait de Parfum', 0, 0, '2023-09-18 01:46:42', '-30-', '|1d4bcd7a-ddd3-11ed-849e-f0761c70905c|', 'parfum'),
(2679, '', NULL, 174, 1, 1, 'malbrum-vol-i---tigre-du-bengale---extrait-de-parfum', 'MALBRUM Vol. I - TIGRE DU BENGALE - Extrait de Parfum', 0, 0, '2023-09-18 01:46:42', '-30-', '|1d4bcd7b-ddd3-11ed-849e-f0761c70905c|', 'parfum'),
(2680, '', NULL, 174, 1, 1, 'malbrum-vol-ii---bagheera---extrait-de-parfum', 'MALBRUM Vol. II - BAGHEERA - Extrait de Parfum', 0, 0, '2023-09-18 01:46:42', '-30-', '|1d4bcd7c-ddd3-11ed-849e-f0761c70905c|', 'parfum'),
(2681, '', NULL, 174, 1, 1, 'malbrum-vol-ii---safariyah---extrait-de-parfum', 'MALBRUM Vol. II - SAFARIYAH - Extrait de Parfum', 0, 0, '2023-09-18 01:46:42', '-30-', '|1d4bcd7d-ddd3-11ed-849e-f0761c70905c|', 'parfum'),
(2682, '', NULL, 174, 1, 1, 'malbrum-vol-ii---wildfire---extrait-de-parfum', 'MALBRUM Vol. II - WILDFIRE - Extrait de Parfum', 0, 0, '2023-09-18 01:46:42', '-30-', '|1d4bcd7e-ddd3-11ed-849e-f0761c70905c|', 'parfum'),
(2683, '', NULL, 175, 1, 1, 'lor-parfyumernaya-voda-animal-doux', 'LOR Парфюмерная вода Animal Doux', 0, 0, '2023-09-18 01:46:43', '-100-', '|39b47f56-deaa-11ed-849e-f0761c70905c|', 'parfum'),
(2684, '', NULL, 175, 1, 1, 'lor-parfyumernaya-voda-dark-mimosa', 'LOR Парфюмерная вода Dark Mimosa', 0, 0, '2023-09-18 01:46:43', '-100-', '|39b47f57-deaa-11ed-849e-f0761c70905c|', 'parfum'),
(2685, '', NULL, 175, 1, 1, 'lor-parfyumernaya-voda-musc-fruite', 'LOR Парфюмерная вода Musc Fruite', 0, 0, '2023-09-18 01:46:43', '-100-', '|39b47f58-deaa-11ed-849e-f0761c70905c|', 'parfum'),
(2686, '', NULL, 175, 1, 1, 'lor-parfyumernaya-voda-oud-latte', 'LOR Парфюмерная вода Oud Latte', 0, 0, '2023-09-18 01:46:43', '-100-', '|39b47f59-deaa-11ed-849e-f0761c70905c|', 'parfum'),
(2687, '', NULL, 175, 1, 1, 'lor-parfyumernaya-voda-petale-de-oud', 'LOR Парфюмерная вода Petale de Oud', 0, 0, '2023-09-18 01:46:43', '-100-', '|39b47f5a-deaa-11ed-849e-f0761c70905c|', 'parfum'),
(2688, '', NULL, 176, 1, 1, 'the-sensual-skin-primer---prajmer-dlya-makiyazha-kevyn-aucoin--', 'The Sensual Skin Primer - Праймер для макияжа Kevyn Aucoin -', 0, 0, '2023-09-18 01:46:43', '--', '|971cc30c-debf-11ed-849e-f0761c70905c|', 'decor'),
(2689, '', NULL, 176, 1, 1, 'the-etherealist-skin-illuminating-foundation-ef2-podsvechivayushhaya-tonalnaya-osnova-dlya-makiyazha-kevyn', 'The Etherealist Skin Illuminating Foundation EF2 Подсвечивающая тональная основа для макияжа Kevyn', 0, 0, '2023-09-18 01:46:43', '--', '|971cc30d-debf-11ed-849e-f0761c70905c|', 'decor'),
(2690, '', NULL, 176, 1, 1, 'the-etherealist-skin-illuminating-foundation-ef3-podsvechivayushhaya-tonalnaya-osnova-dlya-makiyazha-kevyn', 'The Etherealist Skin Illuminating Foundation EF3 Подсвечивающая тональная основа для макияжа Kevyn', 0, 0, '2023-09-18 01:46:43', '--', '|971cc30e-debf-11ed-849e-f0761c70905c|', 'decor'),
(2691, '', NULL, 176, 1, 1, 'the-etherealist-skin-illuminating-foundation-ef04-podsvechivayushhaya-tonalnaya-osnova-dlya-makiyazha-kevyn', 'The Etherealist Skin Illuminating Foundation EF04 Подсвечивающая тональная основа для макияжа Kevyn', 0, 0, '2023-09-18 01:46:43', '--', '|971cc30f-debf-11ed-849e-f0761c70905c|', 'decor'),
(2692, '', NULL, 176, 1, 1, 'the-etherealist-skin-illuminating-foundation-ef5-podsvechivayushhaya-tonalnaya-osnova-dlya-makiyazha-kevyn', 'The Etherealist Skin Illuminating Foundation EF5 Подсвечивающая тональная основа для макияжа Kevyn', 0, 0, '2023-09-18 01:46:43', '--', '|971cc310-debf-11ed-849e-f0761c70905c|', 'decor'),
(2693, '', NULL, 176, 1, 1, 'the-etherealist-skin-illuminating-foundation-ef6-podsvechivayushhaya-tonalnaya-osnova-dlya-makiyazha-kevyn', 'The Etherealist Skin Illuminating Foundation EF6 Подсвечивающая тональная основа для макияжа Kevyn', 0, 0, '2023-09-18 01:46:43', '--', '|971cc311-debf-11ed-849e-f0761c70905c|', 'decor'),
(2694, '', NULL, 176, 1, 1, 'the-etherealist-skin-illuminating-foundation-ef7-podsvechivayushhaya-tonalnaya-osnova-dlya-makiyazha-kevyn', 'The Etherealist Skin Illuminating Foundation EF7 Подсвечивающая тональная основа для макияжа Kevyn', 0, 0, '2023-09-18 01:46:43', '--', '|971cc312-debf-11ed-849e-f0761c70905c|', 'decor'),
(2695, '', NULL, 176, 1, 1, 'the-etherealist-supernatural-concealer-ec-01---sverhestestvennyj-konsiler---light-ec-01', 'The Etherealist Supernatural Concealer EC 01 - Сверхестественный консилер - Light EC 01', 0, 0, '2023-09-18 01:46:43', '--', '|971cc313-debf-11ed-849e-f0761c70905c|', 'decor'),
(2696, '', NULL, 176, 1, 1, 'the-etherealist-supernatural-concealer-ec-02---sverhestestvennyj-konsiler---light-ec-02', 'The Etherealist Supernatural Concealer EC 02 - Сверхестественный консилер - Light EC 02', 0, 0, '2023-09-18 01:46:43', '--', '|971cc314-debf-11ed-849e-f0761c70905c|', 'decor'),
(2697, '', NULL, 176, 1, 1, 'stripped-nude-skin-tint-light-st-01---tonalnaya-vual-kevyn-aucoin', 'Stripped Nude Skin Tint Light ST 01 - Тональная вуаль Kevyn Aucoin', 0, 0, '2023-09-18 01:46:43', '--', '|971cc315-debf-11ed-849e-f0761c70905c|', 'decor'),
(2698, '', NULL, 176, 1, 1, 'stripped-nude-skin-tint-light-st-02---tonalnaya-vual-kevyn-aucoin', 'Stripped Nude Skin Tint Light ST 02 - Тональная вуаль Kevyn Aucoin', 0, 0, '2023-09-18 01:46:43', '--', '|971cc316-debf-11ed-849e-f0761c70905c|', 'decor'),
(2699, '', NULL, 176, 1, 1, 'stripped-nude-skin-tint-light-st-03---tonalnaya-vual-kevyn-aucoin', 'Stripped Nude Skin Tint Light ST 03 - Тональная вуаль Kevyn Aucoin', 0, 0, '2023-09-18 01:46:43', '--', '|971cc317-debf-11ed-849e-f0761c70905c|', 'decor'),
(2700, '', NULL, 176, 1, 1, 'loose-powder---rassypchataya-pudra-kevyn-aucoin', 'Loose Powder - Рассыпчатая пудра Kevyn Aucoin', 0, 0, '2023-09-18 01:46:43', '--', '|971cc318-debf-11ed-849e-f0761c70905c|', 'decor'),
(2701, '', NULL, 176, 1, 1, 'paletka-dlya-sozdaniya-kontura-kontur-duo-kevyn-aucoin', 'Палетка для создания контура Контур Дуо Kevyn Aucoin', 0, 0, '2023-09-18 01:46:43', '--', '|971cc319-debf-11ed-849e-f0761c70905c|', 'decor'),
(2702, '', NULL, 176, 1, 1, 'the-sculpting-powder---medium-pudra-dlya-sozdaniya-kontura-kevyn-aucoin', 'The Sculpting Powder - Medium Пудра для создания контура Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc31a-debf-11ed-849e-f0761c70905c|', 'decor'),
(2703, '', NULL, 176, 1, 1, 'the-sculpting-powder---light-pudra-dlya-sozdaniya-kontura-kevyn-aucoin', 'The Sculpting Powder - Light Пудра для создания контура Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc31b-debf-11ed-849e-f0761c70905c|', 'decor'),
(2704, '', NULL, 176, 1, 1, 'the-sculpting-powder---deep-pudra-dlya-sozdaniya-kontura', 'The Sculpting Powder - Deep Пудра для создания контура', 0, 0, '2023-09-18 01:46:44', '--', '|971cc31c-debf-11ed-849e-f0761c70905c|', 'decor'),
(2705, '', NULL, 176, 1, 1, 'the-neo-blush---neo-rumyana---sunset-kevyn-aucoin', 'The Neo-Blush - Нео-румяна - Sunset Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc31d-debf-11ed-849e-f0761c70905c|', 'decor'),
(2706, '', NULL, 176, 1, 1, 'the-neo-blush---neo-rumyana---grapevine-kevyn-aucoin', 'The Neo-Blush - Нео-румяна - Grapevine Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc31e-debf-11ed-849e-f0761c70905c|', 'decor'),
(2707, '', NULL, 176, 1, 1, 'the-neo-blush-neo-rumyana---rose-clif-kevyn-aucoin', 'The Neo-Blush Нео-румяна - Rose Clif Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc31f-debf-11ed-849e-f0761c70905c|', 'decor'),
(2708, '', NULL, 176, 1, 1, 'the-neo-blush---neo-rumyana---pink-sand-kevyn-aucoin', 'The Neo-Blush - Нео-румяна - Pink Sand Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc320-debf-11ed-849e-f0761c70905c|', 'decor'),
(2709, '', NULL, 176, 1, 1, 'the-contour-book-30-enciklopediya-konturinga-vol-iii-kevyn-aucoin', 'The Contour Book 3.0 Энциклопедия контуринга Vol. III Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc321-debf-11ed-849e-f0761c70905c|', 'decor'),
(2710, '', NULL, 176, 1, 1, 'glass-glow-face--prism-rose--siyayushhaya-osnova-hajlajter-dlya-makiyazha', 'Glass Glow Face- Prism Rose -Сияющая основа-хайлайтер для макияжа', 0, 0, '2023-09-18 01:46:44', '--', '|971cc322-debf-11ed-849e-f0761c70905c|', 'decor'),
(2711, '', NULL, 176, 1, 1, 'glass-glow-face---cosmic-flame-siyayushhaya-osnova-hajlajter-dlya-makiyazha', 'Glass Glow Face - Cosmic Flame Сияющая основа-хайлайтер для макияжа', 0, 0, '2023-09-18 01:46:44', '--', '|971cc323-debf-11ed-849e-f0761c70905c|', 'decor'),
(2712, '', NULL, 176, 1, 1, 'neo-bronzer---sunrise-kevyn-aucoin', 'Нео-бронзер - Sunrise Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc324-debf-11ed-849e-f0761c70905c|', 'decor'),
(2713, '', NULL, 176, 1, 1, 'neo-bronzer---dusk-medium-kevyn-aucoin', 'Нео-бронзер - Dusk medium Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc325-debf-11ed-849e-f0761c70905c|', 'decor'),
(2714, '', NULL, 176, 1, 1, 'neo-bronzer---sahara-kevyn-aucoin', 'Нео-бронзер - Sahara Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc326-debf-11ed-849e-f0761c70905c|', 'decor'),
(2715, '', NULL, 176, 1, 1, 'the-volume-mascara---tush-dlya-obema-resnic-kevyn-aucoin', 'The Volume Mascara - Тушь для объема ресниц Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc327-debf-11ed-849e-f0761c70905c|', 'decor'),
(2716, '', NULL, 176, 1, 1, 'the-curling-mascara---podkruchivayushhaya-tush-dlya-resnic-kevyn-aucoin', 'The Curling Mascara - Подкручивающая тушь для ресниц Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc328-debf-11ed-849e-f0761c70905c|', 'decor'),
(2717, '', NULL, 176, 1, 1, 'the-precision-eye-definer---tochnaya-podvodka-dlya-glaz-vanta-black-kevyn-aucoin', 'The Precision Eye Definer - Точная подводка для глаз Vanta (Black) Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc329-debf-11ed-849e-f0761c70905c|', 'decor'),
(2718, '', NULL, 176, 1, 1, 'the-precision-eye-definer---tochnaya-podvodka-dlya-glaz-kabicha-brown-kevyn-aucoin', 'The Precision Eye Definer - Точная подводка для глаз Kabicha (Brown) Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc32a-debf-11ed-849e-f0761c70905c|', 'decor'),
(2719, '', NULL, 176, 1, 1, 'the-precision-brow-pencil---karandash-dlya-brovej---brunette-kevyn-aucoin', 'The Precision Brow Pencil - Карандаш для бровей - Brunette Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc32b-debf-11ed-849e-f0761c70905c|', 'decor'),
(2720, '', NULL, 176, 1, 1, 'the-precision-brow-pencil---karandash-dlya-brovej---dark-brunette-kevyn-aucoin', 'The Precision Brow Pencil - Карандаш для бровей - Dark Brunette Kevyn Aucoin', 0, 0, '2023-09-18 01:46:44', '--', '|971cc32c-debf-11ed-849e-f0761c70905c|', 'decor'),
(2721, '', NULL, 176, 1, 1, 'marker--gel-dlya-brovej-warm-brunette---true-feather-marker-gel-duo', 'Маркер- Гель для бровей Warm Brunette - True Feather Marker Gel Duo', 0, 0, '2023-09-18 01:46:45', '--', '|971cc32d-debf-11ed-849e-f0761c70905c|', 'decor'),
(2722, '', NULL, 176, 1, 1, 'marker--gel-dlya-brovej-brunette---true-feather-marker-gel-duo', 'Маркер- Гель для бровей Brunette - True Feather Marker Gel Duo', 0, 0, '2023-09-18 01:46:45', '--', '|971cc32e-debf-11ed-849e-f0761c70905c|', 'decor'),
(2723, '', NULL, 176, 1, 1, 'marker--gel-dlya-brovej-dark-brunette---true-feather-marker-gel-duo', 'Маркер- Гель для бровей Dark Brunette - True Feather Marker Gel Duo', 0, 0, '2023-09-18 01:46:45', '--', '|971cc32f-debf-11ed-849e-f0761c70905c|', 'decor'),
(2724, '', NULL, 176, 1, 1, 'unforgettable-lip-definer---karandash-dlya-gub--tochilka-minima', 'Unforgettable Lip Definer - Карандаш для губ + Точилка Minima', 0, 0, '2023-09-18 01:46:45', '--', '|971cc330-debf-11ed-849e-f0761c70905c|', 'decor'),
(2725, '', NULL, 176, 1, 1, 'unforgettable-lip-definer---karandash-dlya-gub--tochilka-divine', 'Unforgettable Lip Definer - Карандаш для губ + Точилка Divine', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb744-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2726, '', NULL, 176, 1, 1, 'unforgettable-lipstick-cream-immaculate---nezabyvaemaya-kremovaya-pomada', 'Unforgettable Lipstick Cream Immaculate  - Незабываемая кремовая помада', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb745-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2727, '', NULL, 176, 1, 1, 'unforgettable-lipstick-suspicious--pomada-s-siyayushhim-effektom', 'Unforgettable Lipstick Suspicious- помада с сияющим эффектом', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb746-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2728, '', NULL, 176, 1, 1, 'unforgettable-lipstick-cream-legendary---nezabyvaemaya-kremovaya-pomada', 'Unforgettable Lipstick Cream Legendary - Незабываемая кремовая помада', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb747-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2729, '', NULL, 177, 1, 1, 'paletka-glow-your-way-hajlajterov---volume-1light-skin', 'Палетка GLOW YOUR WAY хайлайтеров  - VOLUME 1*Light Skin', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb74a-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2730, '', NULL, 177, 1, 1, 'paletka-dlya-lica-i-glaz-hot--snatched-6-ottenkov-deep-skin-tones', 'Палетка для лица и глаз HOT & SNATCHED/ 6 оттенков Deep Skin Tones', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb74b-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2731, '', NULL, 177, 1, 1, 'paletka-glow-your-way-hajlajterov---volume-2deep-skin-tones', 'Палетка  GLOW YOUR WAY хайлайтеров  - VOLUME 2*Deep Skin Tones', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb74c-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2732, '', NULL, 177, 1, 1, 'paletka-dlya-glaz-9-ottenkov---party-pop', 'Палетка для глаз  9 оттенков - PARTY POP', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb74d-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2733, '', NULL, 177, 1, 1, 'paletka-dlya-glaz-9-ottenkov---soho-nudes', 'Палетка для глаз  9 оттенков - SOHO NUDES', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb74e-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2734, '', NULL, 177, 1, 1, 'paletka-dlya-glaz-9-ottenkov---sunkissed-nudes', 'Палетка для глаз  9 оттенков - SUNKISSED NUDES', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb74f-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2735, '', NULL, 177, 1, 1, 'modelrock---pomada-barhatnoe-sufle-buff', 'Modelrock - Помада Бархатное суфле *BUFF*', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb750-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2736, '', NULL, 177, 1, 1, 'modelrock---pomada-barhatnoe-sufle-blushed', 'Modelrock - Помада Бархатное суфле *BLUSHED*', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb751-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2737, '', NULL, 177, 1, 1, 'modelrock---pomada-barhatnoe-sufle-saddle', 'Modelrock - Помада Бархатное суфле *SADDLE*', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb752-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2738, '', NULL, 177, 1, 1, 'modelrock---pomada-barhatnoe-sufle-forever-nude', 'Modelrock - Помада Бархатное суфле *FOREVER NUDE*', 0, 0, '2023-09-18 01:46:45', '--', '|2cbcb753-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2739, '', NULL, 177, 1, 1, 'modelrock---pomada-barhatnoe-sufle-fierce-nude', 'Modelrock - Помада Бархатное суфле *FIERCE NUDE*', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb754-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2740, '', NULL, 177, 1, 1, 'modelrock---pomada-barhatnoe-sufle-bon-bon', 'Modelrock - Помада Бархатное суфле *BON BON*', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb755-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2741, '', NULL, 177, 1, 1, 'modelrock---pomada-barhatnoe-sufle-dusted-peach', 'Modelrock - Помада Бархатное суфле *DUSTED PEACH*', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb756-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2742, '', NULL, 177, 1, 1, 'modelrock--matovaya-pomada---peachy-keen', 'Modelrock- Матовая помада - Peachy Keen', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb75b-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2743, '', NULL, 177, 1, 1, 'modelrock-lashes---matovaya-pomada--sweet-flirt', 'Modelrock Lashes - Матовая помада- Sweet Flirt', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb75c-e2c1-11ed-849e-f0761c70905c|', 'decor');
INSERT INTO `tovari` (`id`, `opisanie`, `image`, `cat`, `mugskaya`, `genskaya`, `seo_url`, `nazvanie`, `status`, `old_price`, `date_time_add`, `po_ml`, `uid`, `realcat`) VALUES
(2744, '', NULL, 177, 1, 1, 'modelrock-lashes---matovaya-pomada---rock-out-red', 'Modelrock Lashes - Матовая помада - Rock Out Red', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb75d-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2745, '', NULL, 177, 1, 1, 'modelrock-lashes---matovaya-pomada--latte', 'Modelrock Lashes - Матовая помада- Latte`', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb75e-e2c1-11ed-849e-f0761c70905c|', 'decor'),
(2746, '', NULL, 178, 1, 1, 'ourecipe-oil-to-foam-cleanser--ochishhayushhee-sredstvo-dlya-lica', 'Ourecipe Oil To Foam Cleanser – Очищающее средство для лица', 0, 0, '2023-09-18 01:46:46', '-200-', '|2cbcb767-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2747, '', NULL, 178, 1, 1, 'ourecipe-oil-to-foam-cleanser--ochishhayushhee-sredstvo-dlya-lica', 'Ourecipe Oil To Foam Cleanser  – Очищающее средство для лица', 0, 0, '2023-09-18 01:46:46', '-30-', '|2cbcb768-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2748, '', NULL, 178, 1, 1, 'pantherecipe-nonicica-soothing-serum--uspokaivayushhaya-syvorotka--', 'Pantherecipe Nonicica Soothing Serum – Успокаивающая сыворотка -', 0, 0, '2023-09-18 01:46:46', '-30-', '|2cbcb76a-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2749, '', NULL, 178, 1, 1, 'gold-thread-face-mask-mask---zolotaya-maska--', 'Gold thread face mask Mask - Золотая Маска -', 0, 0, '2023-09-18 01:46:46', '-70-', '|2cbcb76b-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2750, '', NULL, 178, 1, 1, 'the-brightist---dvuhkomponentnyj-toner-dlya-lica', 'The brightist - Двухкомпонентный тонер для лица', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb76c-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2751, '', NULL, 178, 1, 1, 'gom-cream---krem-s-zolotom-dlya-lica--', 'Gom Cream - Крем с золотом для лица -', 0, 0, '2023-09-18 01:46:46', '-65-', '|2cbcb76d-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2752, '', NULL, 178, 1, 1, 'pestlo-panterecipe-krem-dlya-lica-s-pantenolom-i-keramidami--50g', 'Pestlo Panterecipe Крем для лица с пантенолом и керамидами- 50g', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb76e-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2753, '', NULL, 178, 1, 1, 'pestlo-panterecipe-mini-krem-dlya-lica-s-pantenolom-i-keramidami--50g', 'Pestlo Panterecipe МИНИ Крем для лица с пантенолом и керамидами- 50g', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb76f-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2754, '', NULL, 178, 1, 1, 'safe-recipe-sun-essence---essenciya-dlya-lica-s-zashhitoj-ot-solnca-spf-50-pa---50g', 'Safe Recipe Sun Essence - Эссенция для лица с защитой от солнца SPF 50+ PA++++ - 50g', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb770-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2755, '', NULL, 178, 1, 1, 'safe-recipe-sun-essence-15-g--essenciya-dlya-lica-s-zashhitoj-ot-solnca-spf-50-pa--', 'Safe Recipe Sun Essence 15 g- Эссенция для лица с защитой от солнца SPF 50+ PA++++ -', 0, 0, '2023-09-18 01:46:46', '--', '|2cbcb771-e2c1-11ed-849e-f0761c70905c|', 'face'),
(2756, '', NULL, 170, 1, 1, 'tush-dlya-resnic-waterproff', 'Тушь для ресниц (Waterproff)', 0, 0, '2023-09-18 01:46:46', '--', '|8dcc4d7f-e423-11ed-849e-f0761c70905c|', 'decor'),
(2757, '', NULL, 170, 1, 1, 'karandash-dlya-brovej-brow-liner-151-medium-brown', 'Карандаш для бровей (brow liner 151 medium brown)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c06-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2758, '', NULL, 170, 1, 1, 'karandash-dlya-brovej-brow-liner-152-dusty-brown', 'Карандаш для бровей (brow liner 152 dusty brown)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c07-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2759, '', NULL, 170, 1, 1, 'karandash-dlya-brovej-brow-liner-153-chocolate-brown', 'Карандаш для бровей (brow liner 153 chocolate brown)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c08-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2760, '', NULL, 170, 1, 1, 'karandash-dlya-brovej-brow-liner-154-deepest-brown', 'Карандаш для бровей (brow liner 154 deepest brown)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c09-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2761, '', NULL, 170, 1, 1, 'karandash-dlya-brovej-brow-liner-155-onix', 'Карандаш для бровей (brow liner 155 onix)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c0a-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2762, '', NULL, 170, 1, 1, 'kist-dlya-makiyazha-aa-foundation-brush', 'Кисть для макияжа АА (Foundation brush)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c0b-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2763, '', NULL, 170, 1, 1, 'kist-dlya-makiyazha-aa-powder-brush', 'Кисть для макияжа АА (Powder brush)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c0c-e42a-11ed-849e-f0761c70905c|', ''),
(2764, '', NULL, 170, 1, 1, 'kist-dlya-makiyazha-aa-blasher-brush', 'Кисть для макияжа АА (Blasher brush)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c0d-e42a-11ed-849e-f0761c70905c|', ''),
(2765, '', NULL, 170, 1, 1, 'kist-dlya-makiyazha-aa-contour-brush', 'Кисть для макияжа АА (Contour brush)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c0e-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2766, '', NULL, 170, 1, 1, 'kist-dlya-makiyazha-aa-blending-brush', 'Кисть для макияжа АА (Blending brush)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c0f-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2767, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-59', 'Лак для ногтей (Nail polish 59)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c10-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2768, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-54', 'Лак для ногтей (Nail polish 54)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c11-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2769, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-13', 'Лак для ногтей (Nail polish 13)', 0, 0, '2023-09-18 01:46:47', '', '|915b8c17-e42a-11ed-849e-f0761c70905c|915b8c12-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2770, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-10', 'Лак для ногтей (Nail polish 10)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c13-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2771, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-46', 'Лак для ногтей (Nail polish 46)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c14-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2772, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-82', 'Лак для ногтей (Nail polish 82)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c15-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2773, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-69', 'Лак для ногтей (Nail polish 69)', 0, 0, '2023-09-18 01:46:47', '--', '|915b8c16-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2774, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-60', 'Лак для ногтей (Nail polish 60)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c18-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2775, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-61', 'Лак для ногтей (Nail polish 61)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c19-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2776, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-103', 'Лак для ногтей (Nail polish 103)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c1a-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2777, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-83', 'Лак для ногтей (Nail polish 83)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c1b-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2778, '', NULL, 170, 1, 1, 'lak-dlya-nogtej-nail-polish-79', 'Лак для ногтей (Nail polish 79)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c1c-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2779, '', NULL, 170, 1, 1, 'palitra-dlya-brovej-aa-701-soft-brown', 'Палитра для бровей AA (701 soft brown)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c1d-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2780, '', NULL, 170, 1, 1, 'palitra-dlya-brovej-aa-702-brown', 'Палитра для бровей AA (702 brown)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c1e-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2781, '', NULL, 170, 1, 1, 'palitra-dlya-brovej-aa-703-deep-brown', 'Палитра для бровей AA (703 deep brown)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c1f-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2782, '', NULL, 170, 1, 1, 'palitra-dlya-brovej-aa-704-truy-gray', 'Палитра для бровей AA (704 truy gray)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c20-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2783, '', NULL, 170, 1, 1, 'hajlajter-zapechennyj--01-sparkling-ivory', 'Хайлайтер запеченный ( 01 sparkling ivory)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c21-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2784, '', NULL, 170, 1, 1, 'hajlajter-zapechennyj--02-golden-glow', 'Хайлайтер запеченный ( 02 golden glow)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c22-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2785, '', NULL, 170, 1, 1, 'hajlajter-zapechennyj--03-sunkissed-radiance', 'Хайлайтер запеченный ( 03 sunkissed radiance)', 0, 0, '2023-09-18 01:46:48', '--', '|915b8c23-e42a-11ed-849e-f0761c70905c|', 'decor'),
(2786, '', NULL, 169, 1, 1, 'histoires-de-parfums-parfyumernaya-voda-this-is-not-a-blue-bottle-11', 'HISTOIRES de PARFUMS Парфюмерная вода this is not a blue bottle 1/.1', 0, 0, '2023-09-18 01:46:48', '-15--60--120-', '|915b8c2f-e42a-11ed-849e-f0761c70905c|915b8c2e-e42a-11ed-849e-f0761c70905c|915b8c2d-e42a-11ed-849e-f0761c70905c|', ''),
(2787, '', NULL, 179, 1, 1, '195-ac-duhi-agatho', '195 A.C.  духи Agatho', 0, 0, '2023-09-18 01:46:48', '-100-', '|ff206d66-e439-11ed-849e-f0761c70905c|', 'parfum'),
(2788, '', NULL, 179, 1, 1, 'adone-duhi-agatho', 'ADONE  духи Agatho', 0, 0, '2023-09-18 01:46:49', '-100-', '|ff206d67-e439-11ed-849e-f0761c70905c|', 'parfum'),
(2789, '', NULL, 179, 1, 1, 'castiamanti-duhi-agatho', 'CASTIAMANTI  духи Agatho', 0, 0, '2023-09-18 01:46:49', '-100-', '|ff206d68-e439-11ed-849e-f0761c70905c|', 'parfum'),
(2790, '', NULL, 179, 1, 1, 'giardinodiercole-duhi-agatho', 'GIARDINODIERCOLE  духи Agatho', 0, 0, '2023-09-18 01:46:49', '-100-', '|ff206d69-e439-11ed-849e-f0761c70905c|', 'parfum'),
(2791, '', NULL, 179, 1, 1, 'rossopompeiano-duhi-agatho', 'ROSSOPOMPEIANO  духи Agatho', 0, 0, '2023-09-18 01:46:49', '-100-', '|ff206d6a-e439-11ed-849e-f0761c70905c|', 'parfum'),
(2792, '', NULL, 179, 1, 1, 'sileno-duhi-agatho', 'SILENO  духи Agatho', 0, 0, '2023-09-18 01:46:49', '-100-', '|ff206d6b-e439-11ed-849e-f0761c70905c|', 'parfum'),
(2793, '', NULL, 164, 1, 1, 'writer-edp-parfyumernaya-voda', 'WRITER EDP  парфюмерная вода', 0, 0, '2023-09-18 01:46:49', '-100-', '|ff206d72-e439-11ed-849e-f0761c70905c|', 'parfum'),
(2794, '', NULL, 164, 1, 1, 'tattoo-artist-edp-parfyumernaya-voda', 'TATTOO ARTIST EDP  парфюмерная вода', 0, 0, '2023-09-18 01:46:49', '-100-', '|ff206d73-e439-11ed-849e-f0761c70905c|', 'parfum'),
(2795, '', NULL, 164, 1, 1, 'musician-edp-parfyumernaya-voda', 'MUSICIAN EDP  парфюмерная вода', 0, 0, '2023-09-18 01:46:49', '-100-', '|ff206d74-e439-11ed-849e-f0761c70905c|', 'parfum'),
(2796, '', NULL, 163, 1, 1, 'ambre-nuits-duhi-parf', 'AMBRE NUITS духи парф.', 0, 0, '2023-09-18 01:46:49', '-100-', '|d35cf1c1-e4c7-11ed-849e-f0761c70905c|', ''),
(2797, '', NULL, 180, 1, 1, 'monegal-agar-muska-edp-agar-mask-parfyumernaya-voda', 'MONEGAL Agar Muska EDP  агар маск парфюмерная вода', 0, 0, '2023-09-18 01:46:49', '-50--100-', '|21ede662-e75d-11ed-849e-f0761c70905c|21ede661-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2798, '', NULL, 180, 1, 1, 'monegal-cherry-musk-edp-cheri-mask-parfyumernaya-voda', 'MONEGAL Cherry Musk EDP  чери маск парфюмерная вода', 0, 0, '2023-09-18 01:46:49', '-50--100-', '|21ede664-e75d-11ed-849e-f0761c70905c|21ede663-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2799, '', NULL, 180, 1, 1, 'monegal-cotton-musk-edp-koton-mask-parfyumernaya-voda', 'MONEGAL Cotton Musk EDP  котон маск парфюмерная вода', 0, 0, '2023-09-18 01:46:49', '-50-', '|21ede665-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2800, '', NULL, 180, 1, 1, 'monegal-dry-wood-edp-draj-vud-parfyumernaya-voda', 'MONEGAL Dry Wood EDP  драй вуд парфюмерная вода', 0, 0, '2023-09-18 01:46:49', '-50--100-', '|21ede667-e75d-11ed-849e-f0761c70905c|21ede666-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2801, '', NULL, 180, 1, 1, 'monegal-flamenco-edp-flamenko-parfyumernaya-voda', 'MONEGAL Flamenco EDP  фламенко парфюмерная вода', 0, 0, '2023-09-18 01:46:49', '-50--100-', '|21ede669-e75d-11ed-849e-f0761c70905c|21ede668-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2802, '', NULL, 180, 1, 1, 'monegal-heritage-drops-edp-eritazh-drops-parfyumernaya-voda', 'MONEGAL Heritage Drops EDP  Эритаж дропс парфюмерная вода', 0, 0, '2023-09-18 01:46:49', '-100-', '|21ede66a-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2803, '', NULL, 180, 1, 1, 'monegal-ibiza-flowerpower-edp-ibica-floverpouver-parfyumernaya-voda', 'MONEGAL Ibiza Flowerpower EDP  Ибица фловерпоувер парфюмерная вода', 0, 0, '2023-09-18 01:46:50', '-100-', '|21ede66b-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2804, '', NULL, 180, 1, 1, 'monegal-ibiza-laislablanca-edp-ibica-leislablanka-parfyumernaya-voda', 'MONEGAL Ibiza Laislablanca EDP  Ибица леислабланка парфюмерная вода', 0, 0, '2023-09-18 01:46:50', '-100-', '|21ede66c-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2805, '', NULL, 180, 1, 1, 'monegal-nex-to-me-edp-nekst-tu-mi-parfyumernaya-voda', 'MONEGAL Nex to Me EDP  некст ту ми парфюмерная вода', 0, 0, '2023-09-18 01:46:50', '-50--100-', '|21ede66e-e75d-11ed-849e-f0761c70905c|21ede66d-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2806, '', NULL, 180, 1, 1, 'monegal-ole-edp-ole-parfyumernaya-voda', 'MONEGAL Ole EDP  оле парфюмерная вода', 0, 0, '2023-09-18 01:46:50', '-50--100-', '|21ede670-e75d-11ed-849e-f0761c70905c|21ede66f-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2807, '', NULL, 180, 1, 1, 'monegal-ten-fresh-notes-edp-ten-fresh-notes-parfyumernaya-voda', 'MONEGAL Ten fresh Notes EDP  Тен фреш нотэс парфюмерная вода', 0, 0, '2023-09-18 01:46:50', '-100-', '|21ede671-e75d-11ed-849e-f0761c70905c|', 'parfum'),
(2808, '', NULL, 181, 1, 1, 'auster-electimuss-eternal-collection-parfum', 'Auster Electimuss Eternal Collection Parfum', 0, 0, '2023-09-18 01:46:50', '-100-', '|14ce47df-e98e-11ed-849f-f0761c70905c|', 'parfum'),
(2809, '', NULL, 181, 1, 1, 'rhodanthe-electimuss-eternal-collection-parfum', 'Rhodanthe Electimuss Eternal Collection Parfum', 0, 0, '2023-09-18 01:46:50', '-100-', '|14ce47e0-e98e-11ed-849f-f0761c70905c|', 'parfum'),
(2810, '', NULL, 181, 1, 1, 'trajan-electimuss-eternal-collection-parfum', 'Trajan Electimuss Eternal Collection Parfum', 0, 0, '2023-09-18 01:46:50', '-100-', '|14ce47e1-e98e-11ed-849f-f0761c70905c|', 'parfum'),
(2811, '', NULL, 181, 1, 1, 'black-caviar-electimuss-nero-collection-parfum', 'Black Caviar Electimuss Nero Collection Parfum', 0, 0, '2023-09-18 01:46:50', '-100-', '|14ce47e2-e98e-11ed-849f-f0761c70905c|', 'parfum'),
(2812, '', NULL, 181, 1, 1, 'mercurial-cashmere-electimuss-nero-collection-parfum', 'Mercurial Cashmere Electimuss Nero Collection Parfum', 0, 0, '2023-09-18 01:46:50', '-100-', '|14ce47e3-e98e-11ed-849f-f0761c70905c|', 'parfum'),
(2813, '', NULL, 156, 1, 1, 'asad-lattafa', 'ASAD LATTAFA', 0, 0, '2023-09-18 01:46:50', '-100-', '|b8d091cb-1046-11ee-84a1-f0761c70905c|', ''),
(2814, '', NULL, 156, 1, 1, 'tamima-lattafa', 'TAMIMA LATTAFA', 0, 0, '2023-09-18 01:46:50', '-100-', '|b8d091cc-1046-11ee-84a1-f0761c70905c|', ''),
(2815, '', NULL, 156, 1, 1, 'shahd-lattafa', 'SHAHD LATTAFA', 0, 0, '2023-09-18 01:46:50', '-100-', '|b8d091d1-1046-11ee-84a1-f0761c70905c|', ''),
(2816, '', NULL, 156, 1, 1, 'ghality-ard-al-zaafaran', 'GHALITY ARD AL ZAAFARAN', 0, 0, '2023-09-18 01:46:50', '-100-', '|b8d091d2-1046-11ee-84a1-f0761c70905c|', ''),
(2817, '', NULL, 156, 1, 1, 'maahir-legacy-lattafa', 'MAAHIR LEGACY LATTAFA', 0, 0, '2023-09-18 01:46:50', '-100-', '|b8d091d4-1046-11ee-84a1-f0761c70905c|', ''),
(2818, '', NULL, 156, 1, 1, 'haya-lattafa', 'HAYA LATTAFA', 0, 0, '2023-09-18 01:46:50', '-100-', '|1052d6a2-144c-11ee-84a1-f0761c70905c|', ''),
(2819, '', NULL, 156, 1, 1, 'poudree-ana-abiyedh-lattafa', 'POUDREE ANA ABIYEDH LATTAFA', 0, 0, '2023-09-18 01:46:51', '-100-', '|c6e8307b-260b-11ee-84a1-f0761c70905c|', ''),
(2820, '', NULL, 176, 1, 1, 'neprilichnaya-tush-indencent-mascara-kevyn-aucoin', 'Неприличная тушь Indencent Mascara Kevyn Aucoin', 0, 0, '2023-09-18 01:46:51', '--', '|b0c8e17c-304f-11ee-84a1-f0761c70905c|', 'decor'),
(2821, '', NULL, 176, 1, 1, 'balle-of-the-ball-nezabyvaemaya-kremovaya-pomada', 'Balle of the ball Незабываемая кремовая помада', 0, 0, '2023-09-18 01:46:51', '--', '|b0c8e17d-304f-11ee-84a1-f0761c70905c|', 'decor'),
(2822, '', NULL, 176, 1, 1, 'suspicious-shine-nezabyvaemaya-kremovaya-pomada', 'SUSPICIOUS SHINE Незабываемая кремовая помада', 0, 0, '2023-09-18 01:46:51', '--', '|b0c8e17e-304f-11ee-84a1-f0761c70905c|', ''),
(2823, '', NULL, 176, 1, 1, 'modern-love-nezabyvaemaya-kremovaya-pomada', 'MODERN LOVE Незабываемая кремовая помада', 0, 0, '2023-09-18 01:46:51', '--', '|b0c8e17f-304f-11ee-84a1-f0761c70905c|', 'decor'),
(2824, '', NULL, 176, 1, 1, 'wild-orchid-cream-nezabyvaemaya-kremovaya-pomada', 'WILD ORCHID CREAM Незабываемая кремовая помада', 0, 0, '2023-09-18 01:46:51', '--', '|b0c8e180-304f-11ee-84a1-f0761c70905c|', 'decor'),
(2825, '', NULL, 176, 1, 1, 'unforgettable-lipstick-shine-roserin--pomada-s-siyayushhim-effektom', 'Unforgettable Lipstick Shine ROSERIN- помада с сияющим эффектом', 0, 0, '2023-09-18 01:46:51', '--', '|b0c8e181-304f-11ee-84a1-f0761c70905c|', 'decor'),
(2826, '', NULL, 177, 1, 1, 'modelrock---pomada-barhatnoe-sufle-nude', 'Modelrock - Помада Бархатное суфле *NUDE*', 0, 0, '2023-09-18 01:46:51', '--', '|b0c8e182-304f-11ee-84a1-f0761c70905c|', 'decor'),
(2827, '', NULL, 177, 1, 1, 'kosmetichka-chernaya-kozhzam-mini-modelrosk', 'КОСМЕТИЧКА ЧЕРНАЯ КОЖ.ЗАМ МИНИ MODELROСK', 0, 0, '2023-09-18 01:46:51', '--', '|b0c8e185-304f-11ee-84a1-f0761c70905c|', 'decor'),
(2828, '', NULL, 177, 1, 1, 'kosmetichka-prozrachnaya-modelrosk', 'КОСМЕТИЧКА ПРОЗРАЧНАЯ MODELROСK', 0, 0, '2023-09-18 01:46:51', '--', '|b0c8e186-304f-11ee-84a1-f0761c70905c|', 'decor'),
(2829, '', NULL, 156, 1, 1, 'atlantis-asdaaf', 'ATLANTIS ASDAAF', 0, 0, '2023-09-18 01:46:51', '-100-', '|deec1ec3-3093-11ee-84a1-f0761c70905c|', ''),
(2830, '', NULL, 156, 1, 1, 'blue-oud-lattafa', 'BLUE OUD LATTAFA', 0, 0, '2023-09-18 01:46:51', '-100-', '|34cc2d8c-5ee7-11eb-8f6d-706655cf369a|', ''),
(2831, '', NULL, 157, 1, 1, 'rare-carbon-afnan', 'RARE CARBON AFNAN', 0, 0, '2023-09-18 01:46:51', '-100-', '|34cc2d94-5ee7-11eb-8f6d-706655cf369a|', 'parfum'),
(2832, '', NULL, 156, 1, 1, 'opulent-oud-lattafa', 'OPULENT OUD LATTAFA', 0, 0, '2023-09-18 01:46:51', '-100-', '|af03edc4-5f18-11eb-8f6d-706655cf369a|', ''),
(2833, '', NULL, 156, 1, 1, 'lail-malaki', 'LAIL MALAKI', 0, 0, '2023-09-18 01:46:51', '-100-', '|af03edc6-5f18-11eb-8f6d-706655cf369a|', ''),
(2834, '', NULL, 157, 1, 1, 'majestic-sport', 'MAJESTIC SPORT', 0, 0, '2023-09-18 01:46:51', '-100-', '|af03edd4-5f18-11eb-8f6d-706655cf369a|', 'parfum'),
(2835, '', NULL, 156, 1, 1, 'musk-al-ghazal', 'MUSK AL GHAZAL', 0, 0, '2023-09-18 01:46:52', '-100-', '|af03edd8-5f18-11eb-8f6d-706655cf369a|', ''),
(2836, '', NULL, 156, 1, 1, 'kashmiri-lattafa', 'KASHMIRI LATTAFA', 0, 0, '2023-09-18 01:46:52', '-100-', '|78011258-66ff-11eb-8f6e-706655ceedac|', ''),
(2837, '', NULL, 156, 1, 1, 'rose-kashmiri-lattafa', 'ROSE KASHMIRI LATTAFA', 0, 0, '2023-09-18 01:46:52', '-100-', '|7801125a-66ff-11eb-8f6e-706655ceedac|', ''),
(2838, '', NULL, 156, 1, 1, 'ahlam-al-emarat', 'AHLAM AL EMARAT', 0, 0, '2023-09-18 01:46:52', '-100-', '|78011260-66ff-11eb-8f6e-706655ceedac|', ''),
(2839, 'Крутые духи\r\nOchen\r\n\r\n', 'lil-sabaya_872', 156, 1, 1, 'lil-sabaya', 'LIL SABAYA', 0, 0, '2023-09-18 01:46:52', '-25-', '|78011266-66ff-11eb-8f6e-706655ceedac|', ''),
(2840, 'Отличные духи с интересным вкусом\r\n', 'her-highness-black-afnan_218', 157, 1, 1, 'her-highness-black-afnan', 'HER HIGHNESS', 0, 0, '2023-09-18 01:46:52', '-100-', '|187716d7-5199-11eb-8f76-706655cef500|', 'parfum');

-- --------------------------------------------------------

--
-- Структура таблицы `tovari_foto`
--

CREATE TABLE `tovari_foto` (
  `id` int NOT NULL,
  `id_tovar` int NOT NULL,
  `img` varchar(50) NOT NULL,
  `date_time` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `tovari_po_ml`
--

CREATE TABLE `tovari_po_ml` (
  `id` int NOT NULL,
  `id_tovar` int NOT NULL,
  `uid` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_general_ci NOT NULL DEFAULT '-',
  `name` int NOT NULL,
  `prise` int NOT NULL,
  `kolvo` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `tovari_po_ml`
--

INSERT INTO `tovari_po_ml` (`id`, `id_tovar`, `uid`, `name`, `prise`, `kolvo`) VALUES
(1758, 2271, '688a99da-7c0a-11eb-845d-f0761c70905c', 100, 2700, 0),
(1759, 2272, '688a99dc-7c0a-11eb-845d-f0761c70905c', 100, 3000, 0),
(1760, 2273, '688a99de-7c0a-11eb-845d-f0761c70905c', 100, 2800, 0),
(1761, 2274, '688a99e0-7c0a-11eb-845d-f0761c70905c', 100, 2700, 0),
(1762, 2275, '688a99e2-7c0a-11eb-845d-f0761c70905c', 100, 3500, 0),
(1763, 2276, '688a99e4-7c0a-11eb-845d-f0761c70905c', 100, 3500, 0),
(1764, 2277, '96dc779e-9aad-11eb-8463-f0761c70905c', 100, 6500, 1),
(1765, 2278, '9d73b31c-9ba1-11eb-8465-f0761c70905c', 100, 4500, 0),
(1766, 2279, '9d73b322-9ba1-11eb-8465-f0761c70905c', 100, 3500, 0),
(1767, 2280, '9d73b32e-9ba1-11eb-8465-f0761c70905c', 100, 8500, 5),
(1768, 2281, '9d73b330-9ba1-11eb-8465-f0761c70905c', 100, 4500, 3),
(1769, 2282, '9d73b332-9ba1-11eb-8465-f0761c70905c', 100, 5000, 0),
(1770, 2283, '9d73b334-9ba1-11eb-8465-f0761c70905c', 20, 2800, 0),
(1771, 2285, '403f6813-9d13-11eb-8465-f0761c70905c', 100, 2500, 0),
(1772, 2286, '403f6815-9d13-11eb-8465-f0761c70905c', 100, 2500, 0),
(1773, 2287, '403f6819-9d13-11eb-8465-f0761c70905c', 100, 3950, 2),
(1774, 2288, '403f681b-9d13-11eb-8465-f0761c70905c', 100, 3950, 2),
(1775, 2289, '403f681f-9d13-11eb-8465-f0761c70905c', 100, 3000, 0),
(1776, 2290, '403f6823-9d13-11eb-8465-f0761c70905c', 100, 4500, 0),
(1777, 2291, '403f6825-9d13-11eb-8465-f0761c70905c', 100, 4500, 0),
(1778, 2292, '403f6827-9d13-11eb-8465-f0761c70905c', 100, 3500, 0),
(1779, 2293, '403f682d-9d13-11eb-8465-f0761c70905c', 100, 3200, 0),
(1780, 2294, '403f6831-9d13-11eb-8465-f0761c70905c', 100, 2500, 0),
(1781, 2295, '8d1097cd-a0eb-11eb-8466-f0761c70905c', 35, 1500, 0),
(1782, 2296, '8d1097ce-a0eb-11eb-8466-f0761c70905c', 35, 1500, 0),
(1783, 2297, '8d1097cf-a0eb-11eb-8466-f0761c70905c', 35, 1500, 0),
(1784, 2298, '8d1097d0-a0eb-11eb-8466-f0761c70905c', 35, 1500, 0),
(1785, 2299, '8d1097d1-a0eb-11eb-8466-f0761c70905c', 35, 1500, 0),
(1786, 2300, '8d1097d2-a0eb-11eb-8466-f0761c70905c', 35, 1500, 0),
(1787, 2301, '8d1097d3-a0eb-11eb-8466-f0761c70905c', 35, 1500, 0),
(1788, 2302, '8d1097d4-a0eb-11eb-8466-f0761c70905c', 35, 1500, 0),
(1789, 2303, '43f4eb34-a1b7-11eb-8466-f0761c70905c', 35, 1500, 0),
(1790, 2304, '43f4eb35-a1b7-11eb-8466-f0761c70905c', 35, 1500, 0),
(1791, 2305, '43f4eb37-a1b7-11eb-8466-f0761c70905c', 35, 1500, 0),
(1792, 2306, '43f4eb38-a1b7-11eb-8466-f0761c70905c', 35, 1500, 0),
(1793, 2307, '43f4eb3a-a1b7-11eb-8466-f0761c70905c', 35, 1500, 0),
(1794, 2308, '088fe0f5-c523-11eb-8473-f0761c70905c', 100, 4500, 0),
(1795, 2309, '9eff23dd-f42e-11eb-847e-f0761c70905c', 100, 24000, 0),
(1796, 2310, '9eff23de-f42e-11eb-847e-f0761c70905c', 100, 24000, 0),
(1797, 2311, '9eff23df-f42e-11eb-847e-f0761c70905c', 100, 24000, 2),
(1798, 2311, '9eff23e0-f42e-11eb-847e-f0761c70905c', 50, 18000, 1),
(1799, 2312, '9eff23e1-f42e-11eb-847e-f0761c70905c', 100, 24000, 0),
(1800, 2313, '9eff23e2-f42e-11eb-847e-f0761c70905c', 100, 24000, 0),
(1801, 2313, '9eff23e3-f42e-11eb-847e-f0761c70905c', 50, 18000, 0),
(1802, 2314, '9eff23e4-f42e-11eb-847e-f0761c70905c', 100, 21500, 0),
(1803, 2315, '9eff23e5-f42e-11eb-847e-f0761c70905c', 100, 21500, 0),
(1804, 2316, '9eff23e6-f42e-11eb-847e-f0761c70905c', 100, 21500, 0),
(1805, 2317, 'c023981e-f9f7-11eb-8483-f0761c70905c', 70, 11500, 0),
(1806, 2318, 'c0239821-f9f7-11eb-8483-f0761c70905c', 70, 11500, 0),
(1807, 2319, 'c0239829-f9f7-11eb-8483-f0761c70905c', 70, 11500, 0),
(1808, 2320, 'c023982a-f9f7-11eb-8483-f0761c70905c', 70, 11500, 0),
(1809, 2321, 'c023982b-f9f7-11eb-8483-f0761c70905c', 70, 11500, 0),
(1810, 2322, 'a0d69be1-0004-11ec-8486-f0761c70905c', 100, 19800, 1),
(1811, 2323, 'a0d69be2-0004-11ec-8486-f0761c70905c', 100, 19800, 2),
(1812, 2324, 'a0d69be3-0004-11ec-8486-f0761c70905c', 100, 19800, 1),
(1813, 2325, 'a0d69be4-0004-11ec-8486-f0761c70905c', 100, 19800, 0),
(1814, 2326, 'a0d69be5-0004-11ec-8486-f0761c70905c', 100, 19800, 0),
(1815, 2327, 'a0d69be6-0004-11ec-8486-f0761c70905c', 100, 19800, 3),
(1816, 2328, 'a0d69be7-0004-11ec-8486-f0761c70905c', 100, 19800, 3),
(1817, 2329, '17ae9a33-0330-11ec-8486-f0761c70905c', 100, 4800, 1),
(1818, 2330, '17ae9a34-0330-11ec-8486-f0761c70905c', 30, 2100, 0),
(1819, 2331, '17ae9a42-0330-11ec-8486-f0761c70905c', 100, 1800, 0),
(1820, 2332, '17ae9a43-0330-11ec-8486-f0761c70905c', 100, 1800, 0),
(1821, 2333, '17ae9a44-0330-11ec-8486-f0761c70905c', 100, 1800, 0),
(1822, 2334, '17ae9a45-0330-11ec-8486-f0761c70905c', 100, 5500, 1),
(1823, 2335, '17ae9a46-0330-11ec-8486-f0761c70905c', 100, 2700, 0),
(1824, 2336, '17ae9a49-0330-11ec-8486-f0761c70905c', 100, 3500, 3),
(1825, 2337, '17ae9a4a-0330-11ec-8486-f0761c70905c', 100, 2700, 0),
(1826, 2338, '17ae9a4b-0330-11ec-8486-f0761c70905c', 100, 4800, 0),
(1827, 2339, '17ae9a4c-0330-11ec-8486-f0761c70905c', 100, 3500, 0),
(1828, 2340, '17ae9a4d-0330-11ec-8486-f0761c70905c', 30, 2100, 0),
(1829, 2341, '17ae9a4e-0330-11ec-8486-f0761c70905c', 100, 4800, 0),
(1830, 2342, '17ae9a51-0330-11ec-8486-f0761c70905c', 100, 4000, 1),
(1831, 2343, '17ae9a52-0330-11ec-8486-f0761c70905c', 30, 2100, 0),
(1832, 2344, '17ae9a53-0330-11ec-8486-f0761c70905c', 100, 9500, 6),
(1833, 2345, '17ae9a55-0330-11ec-8486-f0761c70905c', 100, 2100, 0),
(1834, 2346, '17ae9a56-0330-11ec-8486-f0761c70905c', 100, 2100, 0),
(1835, 2347, '17ae9a57-0330-11ec-8486-f0761c70905c', 100, 2100, 0),
(1836, 2348, 'e6470799-0a5f-11ec-8488-f0761c70905c', 100, 21500, 1),
(1837, 2349, 'e647079a-0a5f-11ec-8488-f0761c70905c', 50, 18000, 1),
(1838, 2350, '20b51f55-2519-11ec-848a-f0761c70905c', 100, 5500, 3),
(1839, 2351, '20b51f5f-2519-11ec-848a-f0761c70905c', 100, 5500, 0),
(1840, 2352, '20b51f61-2519-11ec-848a-f0761c70905c', 30, 7700, 1),
(1841, 2352, '20b51f62-2519-11ec-848a-f0761c70905c', 60, 11700, 0),
(1842, 2353, '20b51f64-2519-11ec-848a-f0761c70905c', 50, 6400, 0),
(1843, 2354, '20b51f65-2519-11ec-848a-f0761c70905c', 100, 5500, 1),
(1844, 2355, '20b51f66-2519-11ec-848a-f0761c70905c', 100, 5500, 0),
(1845, 2356, '20b51f68-2519-11ec-848a-f0761c70905c', 100, 5500, 0),
(1846, 2357, '20b51f69-2519-11ec-848a-f0761c70905c', 50, 6000, 4),
(1847, 2358, '20b51f6a-2519-11ec-848a-f0761c70905c', 30, 7700, 3),
(1848, 2359, '20b51f6b-2519-11ec-848a-f0761c70905c', 100, 5500, 0),
(1849, 2360, '20b51f6c-2519-11ec-848a-f0761c70905c', 100, 5500, 1),
(1850, 2361, '20b51f6e-2519-11ec-848a-f0761c70905c', 100, 5500, 0),
(1851, 2362, '20b51f6f-2519-11ec-848a-f0761c70905c', 30, 7700, 0),
(1852, 2362, '20b51f70-2519-11ec-848a-f0761c70905c', 60, 11700, 2),
(1853, 2363, '20b51f71-2519-11ec-848a-f0761c70905c', 50, 6000, 4),
(1854, 2364, '20b51f74-2519-11ec-848a-f0761c70905c', 30, 7700, 0),
(1855, 2364, '20b51f75-2519-11ec-848a-f0761c70905c', 60, 11700, 0),
(1856, 2365, '20b51f76-2519-11ec-848a-f0761c70905c', 30, 7700, 0),
(1857, 2366, '20b51f77-2519-11ec-848a-f0761c70905c', 60, 11700, 2),
(1858, 2367, '20b51f79-2519-11ec-848a-f0761c70905c', 100, 5500, 0),
(1859, 2368, '20b51f7b-2519-11ec-848a-f0761c70905c', 100, 5500, 2),
(1860, 2369, '20b51f7d-2519-11ec-848a-f0761c70905c', 50, 6000, 2),
(1861, 2370, '20b51f7e-2519-11ec-848a-f0761c70905c', 50, 6000, 3),
(1862, 2371, '20b51f7f-2519-11ec-848a-f0761c70905c', 100, 5500, 1),
(1863, 2372, '20b51f80-2519-11ec-848a-f0761c70905c', 50, 6500, 0),
(1864, 2373, '20b51f81-2519-11ec-848a-f0761c70905c', 60, 11700, 1),
(1865, 2374, '20b51f82-2519-11ec-848a-f0761c70905c', 30, 7700, 1),
(1866, 2375, '20b51f83-2519-11ec-848a-f0761c70905c', 50, 6000, 4),
(1867, 2376, '20b51f84-2519-11ec-848a-f0761c70905c', 100, 5500, 4),
(1868, 2377, '20b51f85-2519-11ec-848a-f0761c70905c', 30, 7700, 0),
(1869, 2377, '20b51f86-2519-11ec-848a-f0761c70905c', 60, 11700, 1),
(1870, 2378, '20b51f87-2519-11ec-848a-f0761c70905c', 100, 5500, 2),
(1871, 2379, '20b51f88-2519-11ec-848a-f0761c70905c', 100, 5500, 0),
(1872, 2380, '20b51f8b-2519-11ec-848a-f0761c70905c', 50, 4700, 0),
(1873, 2381, '20b51f8d-2519-11ec-848a-f0761c70905c', 30, 7700, 1),
(1874, 2381, '20b51f8e-2519-11ec-848a-f0761c70905c', 60, 11700, 2),
(1875, 2382, '098dab96-25cd-11ec-848a-f0761c70905c', 100, 5500, 3),
(1876, 2383, '0a96ff9f-26ba-11ec-848a-f0761c70905c', 100, 5700, 0),
(1877, 2384, '0a96ffa0-26ba-11ec-848a-f0761c70905c', 100, 5700, 0),
(1878, 2385, '0a96ffa2-26ba-11ec-848a-f0761c70905c', 100, 28000, 0),
(1879, 2386, '0a96ffa3-26ba-11ec-848a-f0761c70905c', 100, 2900, 0),
(1880, 2387, '0a96ffb2-26ba-11ec-848a-f0761c70905c', 100, 2900, 0),
(1881, 2388, '0a96ffb3-26ba-11ec-848a-f0761c70905c', 50, 6500, 3),
(1882, 2389, '0a96ffb4-26ba-11ec-848a-f0761c70905c', 50, 6500, 1),
(1883, 2390, '0a96ffb5-26ba-11ec-848a-f0761c70905c', 50, 6500, 3),
(1884, 2391, 'b9f468f8-2b55-11ec-848a-f0761c70905c', 100, 5500, 0),
(1885, 2392, 'abfc7cdc-46e6-11ec-8490-f0761c70905c', 30, 2100, 0),
(1886, 2393, 'abfc7cdf-46e6-11ec-8490-f0761c70905c', 100, 6500, 4),
(1887, 2394, 'abfc7ce1-46e6-11ec-8490-f0761c70905c', 100, 10500, 2),
(1888, 2395, 'abfc7ce2-46e6-11ec-8490-f0761c70905c', 100, 9500, 1),
(1889, 2396, '66b15e7b-536a-11ec-8491-f0761c70905c', 100, 3500, 0),
(1890, 2397, '3b638c7c-92fc-11ec-8492-f0761c70905c', 100, 3950, 1),
(1891, 2398, '3b638c7e-92fc-11ec-8492-f0761c70905c', 100, 3500, 1),
(1892, 2399, '3b638c7f-92fc-11ec-8492-f0761c70905c', 100, 4200, 1),
(1893, 2400, '3b638c80-92fc-11ec-8492-f0761c70905c', 100, 10500, 3),
(1894, 2401, '3b638c81-92fc-11ec-8492-f0761c70905c', 100, 3900, 1),
(1895, 2402, '3b638c82-92fc-11ec-8492-f0761c70905c', 100, 3900, 0),
(1896, 2403, '3b638c83-92fc-11ec-8492-f0761c70905c', 90, 4700, 1),
(1897, 2404, '3b638c84-92fc-11ec-8492-f0761c70905c', 100, 3500, 0),
(1898, 2405, '8a315e72-f784-11ec-849b-f0761c70905c', 100, 3500, 0),
(1899, 2406, '69a86f2a-fa0c-11ec-849b-f0761c70905c', 100, 3500, 5),
(1900, 2407, '69a86f2b-fa0c-11ec-849b-f0761c70905c', 90, 4700, 0),
(1901, 2408, 'f040b8ed-0d99-11ed-849b-f0761c70905c', 100, 39800, 0),
(1902, 2409, 'f040b8ee-0d99-11ed-849b-f0761c70905c', 100, 47500, 0),
(1903, 2409, 'f040b8ef-0d99-11ed-849b-f0761c70905c', 15, 15200, 0),
(1904, 2410, 'f040b8f0-0d99-11ed-849b-f0761c70905c', 100, 47500, 0),
(1905, 2410, 'f040b8f1-0d99-11ed-849b-f0761c70905c', 15, 15200, 0),
(1906, 2410, 'f040b8f2-0d99-11ed-849b-f0761c70905c', 50, 37000, 0),
(1907, 2411, 'f040b8f3-0d99-11ed-849b-f0761c70905c', 15, 14500, 0),
(1908, 2412, 'f040b8f4-0d99-11ed-849b-f0761c70905c', 100, 47500, 0),
(1909, 2412, 'f040b8f5-0d99-11ed-849b-f0761c70905c', 15, 13800, 0),
(1910, 2413, 'fb7851fa-1c8d-11ed-849b-f0761c70905c', 100, 6500, 0),
(1911, 2414, 'fb7851fb-1c8d-11ed-849b-f0761c70905c', 100, 5000, 0),
(1912, 2415, 'fb7851fc-1c8d-11ed-849b-f0761c70905c', 100, 5500, 0),
(1913, 2416, 'a15138cf-1fbc-11ed-849b-f0761c70905c', 100, 19500, 4),
(1914, 2417, 'a15138d0-1fbc-11ed-849b-f0761c70905c', 100, 19500, 4),
(1915, 2418, 'a15138d1-1fbc-11ed-849b-f0761c70905c', 100, 19500, 4),
(1916, 2419, 'a15138d2-1fbc-11ed-849b-f0761c70905c', 100, 19500, 4),
(1917, 2420, 'a15138d3-1fbc-11ed-849b-f0761c70905c', 100, 19500, 2),
(1918, 2421, 'a15138d4-1fbc-11ed-849b-f0761c70905c', 100, 19500, 3),
(1919, 2422, 'a15138d5-1fbc-11ed-849b-f0761c70905c', 100, 19500, 2),
(1920, 2423, '21772817-223a-11ed-849b-f0761c70905c', 100, 3500, 0),
(1921, 2424, '7f7893f6-253c-11ed-849b-f0761c70905c', 100, 3500, 0),
(1922, 2425, '8a08d4e3-3432-11ed-849b-f0761c70905c', 100, 16500, 3),
(1923, 2426, '8a08d4e4-3432-11ed-849b-f0761c70905c', 100, 16500, 2),
(1924, 2427, '8a08d4e5-3432-11ed-849b-f0761c70905c', 100, 16500, 1),
(1925, 2428, '8a08d4e6-3432-11ed-849b-f0761c70905c', 100, 16500, 2),
(1926, 2429, '8a08d4ed-3432-11ed-849b-f0761c70905c', 100, 20100, 3),
(1927, 2430, '8a08d4ee-3432-11ed-849b-f0761c70905c', 100, 20100, 1),
(1928, 2431, '8a08d4ef-3432-11ed-849b-f0761c70905c', 100, 20100, 0),
(1929, 2432, '8a08d4f0-3432-11ed-849b-f0761c70905c', 100, 20100, 0),
(1930, 2433, '8a08d4f1-3432-11ed-849b-f0761c70905c', 100, 20100, 2),
(1931, 2434, '8a08d4f2-3432-11ed-849b-f0761c70905c', 100, 20100, 3),
(1932, 2435, '8a08d4f3-3432-11ed-849b-f0761c70905c', 100, 20100, 1),
(1933, 2436, '5d7b03b7-35a6-11ed-849b-f0761c70905c', 100, 18000, 5),
(1934, 2437, '5d7b03b8-35a6-11ed-849b-f0761c70905c', 100, 18000, 5),
(1935, 2438, '5d7b03b9-35a6-11ed-849b-f0761c70905c', 100, 18000, 5),
(1936, 2439, '5d7b03ba-35a6-11ed-849b-f0761c70905c', 100, 18000, 5),
(1937, 2440, '5d7b03bb-35a6-11ed-849b-f0761c70905c', 100, 18000, 2),
(1938, 2441, '5d7b03c5-35a6-11ed-849b-f0761c70905c', 70, 18500, 0),
(1939, 2442, '5d7b03c6-35a6-11ed-849b-f0761c70905c', 70, 18500, 3),
(1940, 2443, '5d7b03c7-35a6-11ed-849b-f0761c70905c', 70, 18500, 3),
(1941, 2444, '5d7b03c8-35a6-11ed-849b-f0761c70905c', 20, 12500, 0),
(1942, 2445, '55ab3d7a-38f2-11ed-849b-f0761c70905c', 100, 3500, 0),
(1943, 2446, '3629ba25-3f25-11ed-849b-f0761c70905c', 25, 590, 8),
(1944, 2446, '3629ba26-3f25-11ed-849b-f0761c70905c', 85, 890, 0),
(1945, 2447, '3629ba27-3f25-11ed-849b-f0761c70905c', 25, 450, 9),
(1946, 2448, '3629ba28-3f25-11ed-849b-f0761c70905c', 25, 590, 12),
(1947, 2449, '3629ba29-3f25-11ed-849b-f0761c70905c', 25, 590, 14),
(1948, 2450, '3629ba2a-3f25-11ed-849b-f0761c70905c', 85, 1090, 0),
(1949, 2451, '3629ba2b-3f25-11ed-849b-f0761c70905c', 25, 590, 11),
(1950, 2452, '3629ba2c-3f25-11ed-849b-f0761c70905c', 25, 590, 0),
(1951, 2453, '3629ba2d-3f25-11ed-849b-f0761c70905c', 25, 590, 13),
(1952, 2454, '3629ba2e-3f25-11ed-849b-f0761c70905c', 25, 590, 11),
(1953, 2456, '3629ba30-3f25-11ed-849b-f0761c70905c', 25, 590, 11),
(1954, 2457, '3629ba31-3f25-11ed-849b-f0761c70905c', 25, 590, 11),
(1955, 2450, '3629ba32-3f25-11ed-849b-f0761c70905c', 25, 590, 11),
(1956, 2447, '3629ba33-3f25-11ed-849b-f0761c70905c', 85, 890, 3),
(1957, 2448, '3629ba34-3f25-11ed-849b-f0761c70905c', 85, 890, 2),
(1958, 2449, '3629ba35-3f25-11ed-849b-f0761c70905c', 85, 1090, 2),
(1959, 2454, '3629ba36-3f25-11ed-849b-f0761c70905c', 85, 890, 4),
(1960, 2455, '3629ba37-3f25-11ed-849b-f0761c70905c', 85, 890, 0),
(1961, 2456, '3629ba38-3f25-11ed-849b-f0761c70905c', 85, 890, 3),
(1962, 2457, '3629ba39-3f25-11ed-849b-f0761c70905c', 85, 890, 2),
(1963, 2458, '3629ba3a-3f25-11ed-849b-f0761c70905c', 75, 890, 2),
(1964, 2451, '3629ba3b-3f25-11ed-849b-f0761c70905c', 75, 890, 1),
(1965, 2452, '3629ba3c-3f25-11ed-849b-f0761c70905c', 75, 890, 2),
(1966, 2453, '3629ba3d-3f25-11ed-849b-f0761c70905c', 75, 890, 1),
(1967, 2459, '3629ba3e-3f25-11ed-849b-f0761c70905c', 75, 890, 15),
(1968, 2460, '3629ba3f-3f25-11ed-849b-f0761c70905c', 75, 890, 4),
(1969, 2464, '439aa9fd-3f32-11ed-849b-f0761c70905c', 120, 15900, 1),
(1970, 2465, '439aa9fe-3f32-11ed-849b-f0761c70905c', 15, 3950, 2),
(1971, 2465, '439aa9ff-3f32-11ed-849b-f0761c70905c', 60, 10900, 1),
(1972, 2466, '439aaa00-3f32-11ed-849b-f0761c70905c', 120, 15900, 1),
(1973, 2466, '439aaa01-3f32-11ed-849b-f0761c70905c', 15, 3950, 1),
(1974, 2466, '439aaa02-3f32-11ed-849b-f0761c70905c', 60, 10900, 1),
(1975, 2467, '439aaa03-3f32-11ed-849b-f0761c70905c', 120, 15900, 1),
(1976, 2467, '439aaa04-3f32-11ed-849b-f0761c70905c', 60, 10900, 0),
(1977, 2468, '439aaa05-3f32-11ed-849b-f0761c70905c', 120, 15900, 1),
(1978, 2468, '439aaa06-3f32-11ed-849b-f0761c70905c', 15, 3950, 4),
(1979, 2469, '439aaa07-3f32-11ed-849b-f0761c70905c', 60, 10900, 1),
(1980, 2470, '439aaa08-3f32-11ed-849b-f0761c70905c', 120, 15900, 1),
(1981, 2470, '439aaa09-3f32-11ed-849b-f0761c70905c', 60, 10900, 1),
(1982, 2471, '439aaa0a-3f32-11ed-849b-f0761c70905c', 15, 3950, 3),
(1983, 2472, '439aaa0b-3f32-11ed-849b-f0761c70905c', 15, 3950, 1),
(1984, 2472, '439aaa0c-3f32-11ed-849b-f0761c70905c', 120, 15900, 1),
(1985, 2472, '439aaa0d-3f32-11ed-849b-f0761c70905c', 60, 10900, 0),
(1986, 2473, '439aaa0e-3f32-11ed-849b-f0761c70905c', 120, 15900, 1),
(1987, 2474, '439aaa0f-3f32-11ed-849b-f0761c70905c', 60, 10900, 1),
(1988, 2474, '439aaa10-3f32-11ed-849b-f0761c70905c', 15, 3950, 1),
(1989, 2475, '439aaa11-3f32-11ed-849b-f0761c70905c', 15, 3950, 1),
(1990, 2475, '439aaa12-3f32-11ed-849b-f0761c70905c', 60, 10900, 0),
(1991, 2476, '098e2d9e-409d-11ed-849b-f0761c70905c', 70, 18500, 3),
(1992, 2477, '098e2d9f-409d-11ed-849b-f0761c70905c', 70, 18500, 4),
(1993, 2478, '5d9ecbcd-4f31-11ed-849c-f0761c70905c', 25, 1290, 0),
(1994, 2479, '5d9ecbce-4f31-11ed-849c-f0761c70905c', 120, 1190, 0),
(1995, 2480, '5d9ecbcf-4f31-11ed-849c-f0761c70905c', 120, 1190, 2),
(1996, 2481, '5d9ecbd0-4f31-11ed-849c-f0761c70905c', 120, 1190, 0),
(1997, 2482, '5d9ecbd1-4f31-11ed-849c-f0761c70905c', 85, 1290, 0),
(1998, 2483, '5d9ecbd2-4f31-11ed-849c-f0761c70905c', 25, 1490, 1),
(1999, 2484, '5d9ecbd3-4f31-11ed-849c-f0761c70905c', 85, 1290, 0),
(2000, 2485, '5d9ecbd5-4f31-11ed-849c-f0761c70905c', 85, 1590, 0),
(2001, 2635, 'd5c38173-74b7-11ed-849c-f0761c70905c', 100, 4500, 0),
(2002, 2636, '9dd29237-7bc4-11ed-849c-f0761c70905c', 100, 6500, 0),
(2003, 2637, '9dd29238-7bc4-11ed-849c-f0761c70905c', 100, 6500, 0),
(2004, 2638, '9dd29239-7bc4-11ed-849c-f0761c70905c', 100, 8500, 3),
(2005, 2639, '9dd2923b-7bc4-11ed-849c-f0761c70905c', 100, 3500, 1),
(2006, 2640, '9dd2923c-7bc4-11ed-849c-f0761c70905c', 80, 7500, 2),
(2007, 2641, '9dd2923d-7bc4-11ed-849c-f0761c70905c', 80, 7500, 0),
(2008, 2642, '00b5ee86-7c7c-11ed-849c-f0761c70905c', 100, 1, 0),
(2009, 2643, '31149b41-85d9-11ed-849c-f0761c70905c', 25, 590, 10),
(2010, 2644, '31149b43-85d9-11ed-849c-f0761c70905c', 100, 3500, 0),
(2011, 2645, '5a24351f-86b8-11ed-849c-f0761c70905c', 100, 3500, 0),
(2012, 2646, '3ca5be6c-9801-11ed-849d-f0761c70905c', 100, 4450, 3),
(2013, 2647, '3ca5be6d-9801-11ed-849d-f0761c70905c', 100, 3050, 4),
(2014, 2648, '3ca5be6e-9801-11ed-849d-f0761c70905c', 100, 2450, 2),
(2015, 2649, '3ca5be6f-9801-11ed-849d-f0761c70905c', 200, 3900, 3),
(2016, 2654, '95cb89e6-bc18-11ed-849e-f0761c70905c', 100, 4500, 0),
(2017, 2655, '118c9bab-d782-11ed-849e-f0761c70905c', 75, 1090, 4),
(2018, 2656, '118c9baf-d782-11ed-849e-f0761c70905c', 150, 1290, 5),
(2019, 2657, '118c9bb0-d782-11ed-849e-f0761c70905c', 100, 1290, 4),
(2020, 2658, '118c9bb1-d782-11ed-849e-f0761c70905c', 500, 1290, 6),
(2021, 2659, '118c9bb2-d782-11ed-849e-f0761c70905c', 500, 1290, 2),
(2022, 2660, '118c9bb3-d782-11ed-849e-f0761c70905c', 75, 1490, 0),
(2023, 2661, '118c9bb4-d782-11ed-849e-f0761c70905c', 150, 990, 5),
(2024, 2663, '118c9bb6-d782-11ed-849e-f0761c70905c', 150, 990, 3),
(2025, 2665, '118c9bb8-d782-11ed-849e-f0761c70905c', 100, 1290, 4),
(2026, 2666, '118c9bb9-d782-11ed-849e-f0761c70905c', 75, 1490, 0),
(2027, 2667, '80c2bc4f-d788-11ed-849e-f0761c70905c', 15, 3950, 9),
(2028, 2668, '80c2bc50-d788-11ed-849e-f0761c70905c', 60, 10900, 2),
(2029, 2668, '80c2bc51-d788-11ed-849e-f0761c70905c', 120, 15900, 2),
(2030, 2668, '80c2bc52-d788-11ed-849e-f0761c70905c', 15, 3950, 1),
(2031, 2669, 'e99ad4ba-dcf9-11ed-849e-f0761c70905c', 100, 2500, 2),
(2032, 2670, 'e99ad4bb-dcf9-11ed-849e-f0761c70905c', 100, 8500, 3),
(2033, 2671, 'e99ad4bc-dcf9-11ed-849e-f0761c70905c', 80, 8500, 3),
(2034, 2672, 'e99ad4bf-dcf9-11ed-849e-f0761c70905c', 100, 2500, 4),
(2035, 2673, 'e99ad4c0-dcf9-11ed-849e-f0761c70905c', 100, 3500, 0),
(2036, 2674, 'e99ad4c1-dcf9-11ed-849e-f0761c70905c', 100, 9500, 0),
(2037, 2675, 'e99ad4c2-dcf9-11ed-849e-f0761c70905c', 100, 12500, 2),
(2038, 2676, 'e99ad4c3-dcf9-11ed-849e-f0761c70905c', 80, 8500, 4),
(2039, 2677, '1d4bcd77-ddd3-11ed-849e-f0761c70905c', 30, 10900, 2),
(2040, 2678, '1d4bcd7a-ddd3-11ed-849e-f0761c70905c', 30, 10900, 4),
(2041, 2679, '1d4bcd7b-ddd3-11ed-849e-f0761c70905c', 30, 10900, 4),
(2042, 2680, '1d4bcd7c-ddd3-11ed-849e-f0761c70905c', 30, 10900, 3),
(2043, 2681, '1d4bcd7d-ddd3-11ed-849e-f0761c70905c', 30, 10900, 4),
(2044, 2682, '1d4bcd7e-ddd3-11ed-849e-f0761c70905c', 30, 10900, 4),
(2045, 2683, '39b47f56-deaa-11ed-849e-f0761c70905c', 100, 20960, 2),
(2046, 2684, '39b47f57-deaa-11ed-849e-f0761c70905c', 100, 20960, 2),
(2047, 2685, '39b47f58-deaa-11ed-849e-f0761c70905c', 100, 20960, 2),
(2048, 2686, '39b47f59-deaa-11ed-849e-f0761c70905c', 100, 20960, 3),
(2049, 2687, '39b47f5a-deaa-11ed-849e-f0761c70905c', 100, 23900, 3),
(2050, 2746, '2cbcb767-e2c1-11ed-849e-f0761c70905c', 200, 4690, 0),
(2051, 2747, '2cbcb768-e2c1-11ed-849e-f0761c70905c', 30, 890, 0),
(2052, 2748, '2cbcb76a-e2c1-11ed-849e-f0761c70905c', 30, 3290, 0),
(2053, 2749, '2cbcb76b-e2c1-11ed-849e-f0761c70905c', 70, 4990, 0),
(2054, 2751, '2cbcb76d-e2c1-11ed-849e-f0761c70905c', 65, 7690, 0),
(2055, 2786, '915b8c2d-e42a-11ed-849e-f0761c70905c', 120, 15900, 1),
(2056, 2786, '915b8c2e-e42a-11ed-849e-f0761c70905c', 15, 3950, 4),
(2057, 2786, '915b8c2f-e42a-11ed-849e-f0761c70905c', 60, 10900, 1),
(2058, 2787, 'ff206d66-e439-11ed-849e-f0761c70905c', 100, 27000, 2),
(2059, 2788, 'ff206d67-e439-11ed-849e-f0761c70905c', 100, 27000, 2),
(2060, 2789, 'ff206d68-e439-11ed-849e-f0761c70905c', 100, 27000, 3),
(2061, 2790, 'ff206d69-e439-11ed-849e-f0761c70905c', 100, 27000, 2),
(2062, 2791, 'ff206d6a-e439-11ed-849e-f0761c70905c', 100, 27000, 1),
(2063, 2792, 'ff206d6b-e439-11ed-849e-f0761c70905c', 100, 27000, 3),
(2064, 2793, 'ff206d72-e439-11ed-849e-f0761c70905c', 100, 16500, 0),
(2065, 2794, 'ff206d73-e439-11ed-849e-f0761c70905c', 100, 16500, 0),
(2066, 2795, 'ff206d74-e439-11ed-849e-f0761c70905c', 100, 16500, 0),
(2067, 2796, 'd35cf1c1-e4c7-11ed-849e-f0761c70905c', 100, 19500, 0),
(2068, 2797, '21ede661-e75d-11ed-849e-f0761c70905c', 100, 18000, 1),
(2069, 2797, '21ede662-e75d-11ed-849e-f0761c70905c', 50, 13500, 2),
(2070, 2798, '21ede663-e75d-11ed-849e-f0761c70905c', 100, 18000, 1),
(2071, 2798, '21ede664-e75d-11ed-849e-f0761c70905c', 50, 13500, 2),
(2072, 2799, '21ede665-e75d-11ed-849e-f0761c70905c', 50, 13500, 3),
(2073, 2800, '21ede666-e75d-11ed-849e-f0761c70905c', 100, 18000, 1),
(2074, 2800, '21ede667-e75d-11ed-849e-f0761c70905c', 50, 13500, 2),
(2075, 2801, '21ede668-e75d-11ed-849e-f0761c70905c', 100, 24300, 1),
(2076, 2801, '21ede669-e75d-11ed-849e-f0761c70905c', 50, 17500, 2),
(2077, 2802, '21ede66a-e75d-11ed-849e-f0761c70905c', 100, 11700, 3),
(2078, 2803, '21ede66b-e75d-11ed-849e-f0761c70905c', 100, 16500, 3),
(2079, 2804, '21ede66c-e75d-11ed-849e-f0761c70905c', 100, 17500, 3),
(2080, 2805, '21ede66d-e75d-11ed-849e-f0761c70905c', 100, 21600, 1),
(2081, 2805, '21ede66e-e75d-11ed-849e-f0761c70905c', 50, 15500, 2),
(2082, 2806, '21ede66f-e75d-11ed-849e-f0761c70905c', 100, 24500, 1),
(2083, 2806, '21ede670-e75d-11ed-849e-f0761c70905c', 50, 17500, 2),
(2084, 2807, '21ede671-e75d-11ed-849e-f0761c70905c', 100, 11700, 3),
(2085, 2808, '14ce47df-e98e-11ed-849f-f0761c70905c', 100, 23000, 3),
(2086, 2809, '14ce47e0-e98e-11ed-849f-f0761c70905c', 100, 23000, 3),
(2087, 2810, '14ce47e1-e98e-11ed-849f-f0761c70905c', 100, 23000, 0),
(2088, 2811, '14ce47e2-e98e-11ed-849f-f0761c70905c', 100, 29300, 2),
(2089, 2812, '14ce47e3-e98e-11ed-849f-f0761c70905c', 100, 29300, 3),
(2090, 2813, 'b8d091cb-1046-11ee-84a1-f0761c70905c', 100, 4500, 0),
(2091, 2814, 'b8d091cc-1046-11ee-84a1-f0761c70905c', 100, 4500, 0),
(2092, 2815, 'b8d091d1-1046-11ee-84a1-f0761c70905c', 100, 3500, 0),
(2093, 2816, 'b8d091d2-1046-11ee-84a1-f0761c70905c', 100, 4500, 0),
(2094, 2817, 'b8d091d4-1046-11ee-84a1-f0761c70905c', 100, 6500, 0),
(2095, 2818, '1052d6a2-144c-11ee-84a1-f0761c70905c', 100, 5000, 0),
(2096, 2819, 'c6e8307b-260b-11ee-84a1-f0761c70905c', 100, 3500, 0),
(2097, 2829, 'deec1ec3-3093-11ee-84a1-f0761c70905c', 100, 3500, 0),
(2098, 2830, '34cc2d8c-5ee7-11eb-8f6d-706655cf369a', 100, 2600, 0),
(2099, 2831, '34cc2d94-5ee7-11eb-8f6d-706655cf369a', 100, 6500, 0),
(2100, 2832, 'af03edc4-5f18-11eb-8f6d-706655cf369a', 100, 2600, 0),
(2101, 2833, 'af03edc6-5f18-11eb-8f6d-706655cf369a', 100, 2500, 0),
(2102, 2834, 'af03edd4-5f18-11eb-8f6d-706655cf369a', 100, 3500, 0),
(2103, 2835, 'af03edd8-5f18-11eb-8f6d-706655cf369a', 100, 1000, 0),
(2104, 2836, '78011258-66ff-11eb-8f6e-706655ceedac', 100, 2500, 0),
(2105, 2837, '7801125a-66ff-11eb-8f6e-706655ceedac', 100, 2500, 0),
(2106, 2838, '78011260-66ff-11eb-8f6e-706655ceedac', 100, 2500, 0),
(2107, 2839, '78011266-66ff-11eb-8f6e-706655ceedac', 25, 2700, 0),
(2108, 2840, '187716d7-5199-11eb-8f76-706655cef500', 100, 28000, 0),
(2109, 2232, '-', 30, 5000, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users_sheikh`
--

CREATE TABLE `users_sheikh` (
  `id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users_sheikh`
--

INSERT INTO `users_sheikh` (`id`, `username`, `password`) VALUES
(1, 'victoriya', '$2y$10$lvWAAc8L3bXEho7O2C84...RUjk4MrxJtlfIl1C35c.fGvw/s2.7i');

-- --------------------------------------------------------

--
-- Структура таблицы `vibranie_tovari`
--

CREATE TABLE `vibranie_tovari` (
  `id` int NOT NULL,
  `talon` text NOT NULL,
  `id_klient` int NOT NULL,
  `tel` varchar(20) NOT NULL,
  `tag` int NOT NULL,
  `id_tovara` int NOT NULL,
  `id_zakaz` int NOT NULL,
  `pay_key` varchar(70) NOT NULL,
  `colichestvo` int NOT NULL DEFAULT '0',
  `cena_za_ed` int NOT NULL,
  `old_price` int NOT NULL,
  `skidka_discont` int NOT NULL,
  `zakaz_summa` float NOT NULL,
  `pay_sum` float NOT NULL,
  `dostavka` int NOT NULL,
  `data` datetime NOT NULL,
  `date_time_add` datetime NOT NULL,
  `date_oformlen` varchar(20) NOT NULL,
  `data_zaverwen_zakaz` varchar(20) NOT NULL,
  `data_oplata_menedger` varchar(20) NOT NULL,
  `data_del_menedger` varchar(20) NOT NULL,
  `adres_dostavki` varchar(250) NOT NULL,
  `komment` text NOT NULL,
  `fio` varchar(250) NOT NULL,
  `sposob_dostavki` varchar(250) NOT NULL,
  `punkt_vidachi` varchar(250) NOT NULL,
  `sposob_oplati` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `vibranie_tovari`
--

INSERT INTO `vibranie_tovari` (`id`, `talon`, `id_klient`, `tel`, `tag`, `id_tovara`, `id_zakaz`, `pay_key`, `colichestvo`, `cena_za_ed`, `old_price`, `skidka_discont`, `zakaz_summa`, `pay_sum`, `dostavka`, `data`, `date_time_add`, `date_oformlen`, `data_zaverwen_zakaz`, `data_oplata_menedger`, `data_del_menedger`, `adres_dostavki`, `komment`, `fio`, `sposob_dostavki`, `punkt_vidachi`, `sposob_oplati`) VALUES
(3, '784', 0, '', 0, 14, 0, '', 3, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 17:34:37', '', '', '', '', '', '', '', '', '', ''),
(8, '929', 0, '', 0, 14, 0, '', 2, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:16', '', '', '', '', '', '', '', '', '', ''),
(9, '929', 0, '', 0, 11, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:20', '', '', '', '', '', '', '', '', '', ''),
(10, '929', 0, '', 0, 9, 0, '', 1, 4400, 5700, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:23', '', '', '', '', '', '', '', '', '', ''),
(11, '893', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:34', '', '', '', '', '', '', '', '', '', ''),
(12, '893', 0, '', 0, 11, 0, '', 2, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:36', '', '', '', '', '', '', '', '', '', ''),
(13, '929', 0, '', 0, 8, 0, '', 1, 400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:24:07', '', '', '', '', '', '', '', '', '', ''),
(14, '939', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:33:45', '', '', '', '', '', '', '', '', '', ''),
(15, '939', 0, '', 0, 11, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:33:55', '', '', '', '', '', '', '', '', '', ''),
(16, '940', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:38:52', '', '', '', '', '', '', '', '', '', ''),
(17, '940', 0, '', 0, 5, 0, '', 1, 4500, 4600, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:38:56', '', '', '', '', '', '', '', '', '', ''),
(42, '1883', 0, '', 0, 13, 0, '', 2, 2000, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 16:38:36', '', '', '', '', '', '', '', '', '', ''),
(19, '941', 0, '', 0, 11, 0, '', 2, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:39:49', '', '', '', '', '', '', '', '', '', ''),
(24, '944', 0, '', 0, 14, 0, '', 3, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-04 01:01:52', '', '', '', '', '', '', '', '', '', ''),
(21, '944', 0, '', 0, 12, 0, '', 2, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:41:00', '', '', '', '', '', '', '', '', '', ''),
(22, '944', 0, '', 0, 11, 0, '', 5, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:41:03', '', '', '', '', '', '', '', '', '', ''),
(23, '944', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:44:20', '', '', '', '', '', '', '', '', '', ''),
(43, '1883', 0, '', 0, 300, 0, '', 2, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 16:56:20', '', '', '', '', '', '', '', '', '', ''),
(26, '1883', 0, '', 0, 14, 0, '', 2, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 15:04:17', '', '', '', '', '', '', '', '', '', ''),
(33, '940', 0, '', 0, 12, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 21:15:42', '', '', '', '', '', '', '', '', '', ''),
(34, '940', 0, '', 0, 1, 0, '', 1, 2000, 2100, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 21:15:46', '', '', '', '', '', '', '', '', '', ''),
(31, '944', 0, '', 0, 2, 0, '', 1, 340, 450, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 17:17:58', '', '', '', '', '', '', '', '', '', ''),
(35, '940', 0, '', 0, 14, 0, '', 3, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 21:17:26', '', '', '', '', '', '', '', '', '', ''),
(36, '1883', 0, '', 0, 5, 0, '', 1, 4500, 4600, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-08 15:52:39', '', '', '', '', '', '', '', '', '', ''),
(37, '1883', 0, '', 0, 6, 0, '', 1, 300, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-08 15:54:45', '', '', '', '', '', '', '', '', '', ''),
(38, '2182', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-08 17:06:30', '', '', '', '', '', '', '', '', '', ''),
(39, '941', 0, '', 0, 12, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-08 20:05:05', '', '', '', '', '', '', '', '', '', ''),
(44, '1883', 0, '', 0, 2000, 0, '', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 18:08:26', '', '', '', '', '', '', '', '', '', ''),
(45, '1883', 0, '', 0, 3200, 0, '', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 18:17:28', '', '', '', '', '', '', '', '', '', ''),
(46, '944', 0, '', 0, 3200, 0, '', 2, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 18:51:05', '', '', '', '', '', '', '', '', '', ''),
(47, '4881', 0, '', 0, 11, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-23 23:10:27', '', '', '', '', '', '', '', '', '', ''),
(48, '940', 0, '', 0, 3200, 0, '', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-30 20:34:09', '', '', '', '', '', '', '', '', '', ''),
(49, '10364', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-12-08 15:13:01', '', '', '', '', '', '', '', '', '', ''),
(50, '20610', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-03-09 22:24:44', '', '', '', '', '', '', '', '', '', ''),
(51, '38338', 0, '', 0, 14, 0, '', 2, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-08-19 16:34:53', '', '', '', '', '', '', '', '', '', ''),
(52, 'null', 0, '', 0, 0, 0, '', 2, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-08-29 12:58:20', '', '', '', '', '', '', '', '', '', ''),
(53, '39787', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-08-29 18:20:51', '', '', '', '', '', '', '', '', '', ''),
(54, '38313', 0, '', 0, 12, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-09-17 21:46:04', '', '', '', '', '', '', '', '', '', ''),
(55, '54702', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-12-28 17:14:12', '', '', '', '', '', '', '', '', '', ''),
(56, '58135', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2023-02-02 11:20:22', '', '', '', '', '', '', '', '', '', ''),
(57, '60115', 0, '', 0, 11, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2023-02-13 16:52:08', '', '', '', '', '', '', '', '', '', ''),
(58, '13555', 0, '', 0, 2000, 0, '', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2023-02-22 15:56:09', '', '', '', '', '', '', '', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `config_site`
--
ALTER TABLE `config_site`
  ADD PRIMARY KEY (`str`);

--
-- Индексы таблицы `filters_pol`
--
ALTER TABLE `filters_pol`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_cat1`
--
ALTER TABLE `post_cat1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `site_pages`
--
ALTER TABLE `site_pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovari`
--
ALTER TABLE `tovari`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tovari` ADD FULLTEXT KEY `nazvanie` (`nazvanie`);

--
-- Индексы таблицы `tovari_foto`
--
ALTER TABLE `tovari_foto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovari_po_ml`
--
ALTER TABLE `tovari_po_ml`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_sheikh`
--
ALTER TABLE `users_sheikh`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vibranie_tovari`
--
ALTER TABLE `vibranie_tovari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `config_site`
--
ALTER TABLE `config_site`
  MODIFY `str` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `filters_pol`
--
ALTER TABLE `filters_pol`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `post_cat1`
--
ALTER TABLE `post_cat1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT для таблицы `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2439;

--
-- AUTO_INCREMENT для таблицы `tovari`
--
ALTER TABLE `tovari`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2841;

--
-- AUTO_INCREMENT для таблицы `tovari_foto`
--
ALTER TABLE `tovari_foto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `tovari_po_ml`
--
ALTER TABLE `tovari_po_ml`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2110;

--
-- AUTO_INCREMENT для таблицы `users_sheikh`
--
ALTER TABLE `users_sheikh`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `vibranie_tovari`
--
ALTER TABLE `vibranie_tovari`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
