-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 17 2023 г., 17:42
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `udb6211_2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders`
(
    `id`          int(11) NOT NULL,
    `user_name`   char(80) COLLATE utf8mb4_unicode_ci      NOT NULL,
    `user_number` char(16) COLLATE utf8mb4_unicode_ci      NOT NULL,
    `products`    varchar(4000) COLLATE utf8mb4_unicode_ci NOT NULL,
    `MD`          int(30) NOT NULL,
    `paid_status` int(11) NOT NULL DEFAULT 0,
    `1c_status` int(1) NOT NULL DEFAULT 0,
    `date`        datetime                                 NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `config_site`
--

CREATE TABLE `config_site`
(
    `str`              int  NOT NULL,
    `str2`             int  NOT NULL,
    `doctupe`          text NOT NULL,
    `kodirovka`        text NOT NULL,
    `styl_skript_icon` text NOT NULL,
    `wirina_stranici`  int  NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `config_site`
--

INSERT INTO `config_site` (`str`, `str2`, `doctupe`, `kodirovka`, `styl_skript_icon`, `wirina_stranici`)
VALUES (40, 50,
        '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html xmlns=\"https://www.w3.org/1999/xhtml\">',
        '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n',
        '<link rel=\"stylesheet\" type=\"text/css\" href=\"/style/style_site.css?id=241\" />\n<link rel=\"stylesheet\" type=\"text/css\" href=\"/style/style.css?id=242\" />\n<link rel=\"stylesheet\" type=\"text/css\" href=\"/style/meny.css?id=231\"/>\n<link rel=\"stylesheet\" type=\"text/css\" href=\"/style/forma.css?id=130\"/>\n<script type=\"text/javascript\" src=\"/js/jquery.js\"></script>\n<script type=\"text/javascript\" src=\"/js/scripts_all.js?id=227\"></script>\n<link rel=\"SHORTCUT ICON\" type=\"image/x-icon\" href=\"https://lavka-sheikha.ru/favicon.svg\" />\n',
        870);

-- --------------------------------------------------------

--
-- Структура таблицы `filters_pol`
--

CREATE TABLE `filters_pol`
(
    `id`   int         NOT NULL,
    `name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `filters_pol`
--

INSERT INTO `filters_pol` (`id`, `name`)
VALUES (2, 'Для него'),
       (1, 'Для нее'),
       (3, 'Для всех');

-- --------------------------------------------------------

--
-- Структура таблицы `otzivi`
--

CREATE TABLE `otzivi`
(
    `id`               int          NOT NULL,
    `id_user`          int          NOT NULL,
    `id_post`          int          NOT NULL,
    `fio`              varchar(150) NOT NULL,
    `telefon`          varchar(30)  NOT NULL,
    `date_time`        varchar(30)  NOT NULL,
    `date_time_format` datetime     NOT NULL,
    `moder`            int          NOT NULL,
    `opisanie`         text         NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `otzivi`
--

INSERT INTO `otzivi` (`id`, `id_user`, `id_post`, `fio`, `telefon`, `date_time`, `date_time_format`, `moder`,
                      `opisanie`)
VALUES (1, 0, 0, 'Андрей', '9528212121', '22.09.2021 17:14', '2021-10-01 17:14:40', 0,
        'Очень замечательный магазин! Товар отправляют быстро!  Спасибо!'),
       (2, 0, 0, 'Анастасия', '9528212121', '01.10.2021 17:35', '2021-10-01 17:35:41', 0,
        'Первый раз сюда попала. Цены меня здесь очень порадовали. Заказ пришел вовремя, без всяких задержек. Теперь знаю где делать выгодные покупки, буду советовать своим друзьям.'),
       (3, 0, 0, 'Анастасия', '9384172395', '29.10.2021 15:20', '2021-10-29 15:20:44', 0,
        'Посетила Ваш магазин, хожу за ароматами только к вам. И наконец попала в смену прекрасного продавца- консультанта Надежды. Очень отзывчивый , внимательный консультант. Всегда расскажет о новинках, очень грамотно подходит к подбору желаемого. Спасибо! Очень приятно , Надежда профессионал своего дела&amp;#127802;.');

-- --------------------------------------------------------

--
-- Структура таблицы `posetiteli`
--

CREATE TABLE `posetiteli`
(
    `id`      int NOT NULL DEFAULT '0',
    `counter` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `posetiteli`
--

INSERT INTO `posetiteli` (`id`, `counter`)
VALUES (0, 262213);

-- --------------------------------------------------------

--
-- Структура таблицы `post_cat1`
--

CREATE TABLE `post_cat1`
(
    `id`            int          NOT NULL,
    `id_cat1`       int          NOT NULL,
    `id_group`      int          NOT NULL,
    `sort`          int          NOT NULL,
    `name`          varchar(50)  NOT NULL,
    `title`         varchar(120) NOT NULL,
    `zagolovok_h1`  varchar(150) NOT NULL,
    `seo_url`       varchar(150) NOT NULL,
    `keywords`      varchar(200) NOT NULL,
    `description`   text         NOT NULL,
    `view`          int          NOT NULL,
    `text1`         text         NOT NULL,
    `text2`         text         NOT NULL,
    `map_block`     int          NOT NULL,
    `kolvo_zametok` int          NOT NULL,
    `uid`           varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `site_pages`
--

CREATE TABLE `site_pages`
(
    `id`           int          NOT NULL,
    `translit_url` varchar(120) NOT NULL,
    `url`          varchar(150) NOT NULL,
    `lastmod`      date         NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `site_pages`
--

INSERT INTO `site_pages` (`id`, `translit_url`, `url`, `lastmod`)
VALUES (70, 'korzina/', 'korzina.php', '2021-09-02'),
       (67, 'poisk/', 'poisk.php', '2021-08-31'),
       (62, 'catalog/', 'catalog.php', '2021-08-06'),
       (1783, 'cart/', 'cart.php', '2023-06-25'),
       (1784, 'order/', 'order.php', '2023-06-25'),
       (1773, 'catalog/', 'catalog.php', '2023-06-25'),
       (1774, 'catalog/parfum/', 'blocks/parfums.php', '2023-06-25'),
       (1776, 'catalog/parfum/brands/', 'brands.php', '2023-06-25'),
       (1782, 'catalog/parfum/all/', 'tovar_cat.php?pol=3', '2023-06-25'),
       (1781, 'catalog/parfum/him/', 'tovar_cat.php?pol=1', '2023-06-25'),
       (1780, 'catalog/parfum/her/', 'tovar_cat.php?pol=2', '2023-06-25');

-- --------------------------------------------------------

--
-- Структура таблицы `tovari`
--

CREATE TABLE `tovari`
(
    `id`            int          NOT NULL,
    `opisanie`      text         NOT NULL,
    `cat`           int          NOT NULL                                       DEFAULT '0',
    `mugskaya`      int                                                         DEFAULT NULL,
    `genskaya`      int                                                         DEFAULT NULL,
    `seo_url`       varchar(250) NOT NULL,
    `nazvanie`      varchar(250) NOT NULL                                       DEFAULT '',
    `status`        int          NOT NULL                                       DEFAULT '0',
    `old_price`     int          NOT NULL                                       DEFAULT '0',
    `date_time_add` datetime                                                    DEFAULT NULL,
    `po_ml`         text CHARACTER SET cp1251 COLLATE cp1251_general_ci,
    `uid`           varchar(255) CHARACTER SET cp1251 COLLATE cp1251_general_ci DEFAULT NULL,
    `realcat`       text
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `tovari_foto`
--

CREATE TABLE `tovari_foto`
(
    `id`        int         NOT NULL,
    `id_tovar`  int         NOT NULL,
    `img`       varchar(50) NOT NULL,
    `date_time` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `tovari_po_ml`
--

CREATE TABLE `tovari_po_ml`
(
    `id`       int                                                         NOT NULL,
    `id_tovar` int                                                         NOT NULL,
    `uid`      varchar(255) CHARACTER SET cp1251 COLLATE cp1251_general_ci NOT NULL DEFAULT '-',
    `name`     int                                                         NOT NULL,
    `prise`    int                                                         NOT NULL,
    `kolvo`    int                                                         NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `users_sheikh`
--

CREATE TABLE `users_sheikh`
(
    `id`       int          NOT NULL,
    `username` varchar(20)  NOT NULL,
    `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users_sheikh`
--

INSERT INTO `users_sheikh` (`id`, `username`, `password`)
VALUES (1, 'victoriya', '$2y$10$lvWAAc8L3bXEho7O2C84...RUjk4MrxJtlfIl1C35c.fGvw/s2.7i');

-- --------------------------------------------------------

--
-- Структура таблицы `vibranie_tovari`
--

CREATE TABLE `vibranie_tovari`
(
    `id`                   int          NOT NULL,
    `talon`                text         NOT NULL,
    `id_klient`            int          NOT NULL,
    `tel`                  varchar(20)  NOT NULL,
    `tag`                  int          NOT NULL,
    `id_tovara`            int          NOT NULL,
    `id_zakaz`             int          NOT NULL,
    `pay_key`              varchar(70)  NOT NULL,
    `colichestvo`          int          NOT NULL DEFAULT '0',
    `cena_za_ed`           int          NOT NULL,
    `old_price`            int          NOT NULL,
    `skidka_discont`       int          NOT NULL,
    `zakaz_summa`          float        NOT NULL,
    `pay_sum`              float        NOT NULL,
    `dostavka`             int          NOT NULL,
    `data`                 datetime     NOT NULL,
    `date_time_add`        datetime     NOT NULL,
    `date_oformlen`        varchar(20)  NOT NULL,
    `data_zaverwen_zakaz`  varchar(20)  NOT NULL,
    `data_oplata_menedger` varchar(20)  NOT NULL,
    `data_del_menedger`    varchar(20)  NOT NULL,
    `adres_dostavki`       varchar(250) NOT NULL,
    `komment`              text         NOT NULL,
    `fio`                  varchar(250) NOT NULL,
    `sposob_dostavki`      varchar(250) NOT NULL,
    `punkt_vidachi`        varchar(250) NOT NULL,
    `sposob_oplati`        varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `vibranie_tovari`
--

INSERT INTO `vibranie_tovari` (`id`, `talon`, `id_klient`, `tel`, `tag`, `id_tovara`, `id_zakaz`, `pay_key`,
                               `colichestvo`, `cena_za_ed`, `old_price`, `skidka_discont`, `zakaz_summa`, `pay_sum`,
                               `dostavka`, `data`, `date_time_add`, `date_oformlen`, `data_zaverwen_zakaz`,
                               `data_oplata_menedger`, `data_del_menedger`, `adres_dostavki`, `komment`, `fio`,
                               `sposob_dostavki`, `punkt_vidachi`, `sposob_oplati`)
VALUES (3, '784', 0, '', 0, 14, 0, '', 3, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 17:34:37', '', '',
        '', '', '', '', '', '', '', ''),
       (8, '929', 0, '', 0, 14, 0, '', 2, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:16', '', '',
        '', '', '', '', '', '', '', ''),
       (9, '929', 0, '', 0, 11, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:20', '', '',
        '', '', '', '', '', '', '', ''),
       (10, '929', 0, '', 0, 9, 0, '', 1, 4400, 5700, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:23', '', '',
        '', '', '', '', '', '', '', ''),
       (11, '893', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:34', '', '',
        '', '', '', '', '', '', '', ''),
       (12, '893', 0, '', 0, 11, 0, '', 2, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:19:36', '', '',
        '', '', '', '', '', '', '', ''),
       (13, '929', 0, '', 0, 8, 0, '', 1, 400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:24:07', '', '', '',
        '', '', '', '', '', '', ''),
       (14, '939', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:33:45', '', '',
        '', '', '', '', '', '', '', ''),
       (15, '939', 0, '', 0, 11, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:33:55', '', '',
        '', '', '', '', '', '', '', ''),
       (16, '940', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:38:52', '', '',
        '', '', '', '', '', '', '', ''),
       (17, '940', 0, '', 0, 5, 0, '', 1, 4500, 4600, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:38:56', '', '',
        '', '', '', '', '', '', '', ''),
       (42, '1883', 0, '', 0, 13, 0, '', 2, 2000, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 16:38:36', '', '',
        '', '', '', '', '', '', '', ''),
       (19, '941', 0, '', 0, 11, 0, '', 2, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:39:49', '', '',
        '', '', '', '', '', '', '', ''),
       (24, '944', 0, '', 0, 14, 0, '', 3, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-04 01:01:52', '', '',
        '', '', '', '', '', '', '', ''),
       (21, '944', 0, '', 0, 12, 0, '', 2, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:41:00', '', '',
        '', '', '', '', '', '', '', ''),
       (22, '944', 0, '', 0, 11, 0, '', 5, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:41:03', '', '',
        '', '', '', '', '', '', '', ''),
       (23, '944', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-03 23:44:20', '', '',
        '', '', '', '', '', '', '', ''),
       (43, '1883', 0, '', 0, 300, 0, '', 2, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 16:56:20', '', '', '',
        '', '', '', '', '', '', ''),
       (26, '1883', 0, '', 0, 14, 0, '', 2, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 15:04:17', '', '',
        '', '', '', '', '', '', '', ''),
       (33, '940', 0, '', 0, 12, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 21:15:42', '', '',
        '', '', '', '', '', '', '', ''),
       (34, '940', 0, '', 0, 1, 0, '', 1, 2000, 2100, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 21:15:46', '', '',
        '', '', '', '', '', '', '', ''),
       (31, '944', 0, '', 0, 2, 0, '', 1, 340, 450, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 17:17:58', '', '',
        '', '', '', '', '', '', '', ''),
       (35, '940', 0, '', 0, 14, 0, '', 3, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-07 21:17:26', '', '',
        '', '', '', '', '', '', '', ''),
       (36, '1883', 0, '', 0, 5, 0, '', 1, 4500, 4600, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-08 15:52:39', '', '',
        '', '', '', '', '', '', '', ''),
       (37, '1883', 0, '', 0, 6, 0, '', 1, 300, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-08 15:54:45', '', '', '',
        '', '', '', '', '', '', ''),
       (38, '2182', 0, '', 0, 13, 0, '', 1, 14500, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-08 17:06:30', '', '',
        '', '', '', '', '', '', '', ''),
       (39, '941', 0, '', 0, 12, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-08 20:05:05', '', '',
        '', '', '', '', '', '', '', ''),
       (44, '1883', 0, '', 0, 2000, 0, '', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 18:08:26', '', '',
        '', '', '', '', '', '', '', ''),
       (45, '1883', 0, '', 0, 3200, 0, '', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 18:17:28', '', '',
        '', '', '', '', '', '', '', ''),
       (46, '944', 0, '', 0, 3200, 0, '', 2, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-14 18:51:05', '', '', '',
        '', '', '', '', '', '', ''),
       (47, '4881', 0, '', 0, 11, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-23 23:10:27', '', '',
        '', '', '', '', '', '', '', ''),
       (48, '940', 0, '', 0, 3200, 0, '', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-09-30 20:34:09', '', '', '',
        '', '', '', '', '', '', ''),
       (49, '10364', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2021-12-08 15:13:01', '', '',
        '', '', '', '', '', '', '', ''),
       (50, '20610', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-03-09 22:24:44', '', '',
        '', '', '', '', '', '', '', ''),
       (51, '38338', 0, '', 0, 14, 0, '', 2, 14400, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-08-19 16:34:53', '', '',
        '', '', '', '', '', '', '', ''),
       (52, 'null', 0, '', 0, 0, 0, '', 2, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-08-29 12:58:20', '', '', '',
        '', '', '', '', '', '', ''),
       (53, '39787', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-08-29 18:20:51', '', '',
        '', '', '', '', '', '', '', ''),
       (54, '38313', 0, '', 0, 12, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-09-17 21:46:04', '', '',
        '', '', '', '', '', '', '', ''),
       (55, '54702', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2022-12-28 17:14:12', '', '',
        '', '', '', '', '', '', '', ''),
       (56, '58135', 0, '', 0, 13, 0, '', 1, 1200, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2023-02-02 11:20:22', '', '',
        '', '', '', '', '', '', '', ''),
       (57, '60115', 0, '', 0, 11, 0, '', 1, 11900, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2023-02-13 16:52:08', '', '',
        '', '', '', '', '', '', '', ''),
       (58, '13555', 0, '', 0, 2000, 0, '', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2023-02-22 15:56:09', '', '',
        '', '', '', '', '', '', '', '');

--
-- Индексы сохранённых таблиц
--
ALTER TABLE `orders`
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
-- Индексы таблицы `otzivi`
--
ALTER TABLE `otzivi`
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
ALTER TABLE `tovari`
    ADD FULLTEXT KEY `nazvanie` (`nazvanie`);

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
-- AUTO_INCREMENT для таблицы `otzivi`
--
ALTER TABLE `otzivi`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `post_cat1`
--
ALTER TABLE `post_cat1`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT для таблицы `site_pages`
--
ALTER TABLE `site_pages`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1785;
ALTER TABLE `orders`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `tovari`
--
ALTER TABLE `tovari`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2221;

--
-- AUTO_INCREMENT для таблицы `tovari_foto`
--
ALTER TABLE `tovari_foto`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `tovari_po_ml`
--
ALTER TABLE `tovari_po_ml`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1708;

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
