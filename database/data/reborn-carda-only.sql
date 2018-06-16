-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2018 г., 22:20
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `reborn`
--

-- --------------------------------------------------------

--
-- Структура таблицы `artists`
--

CREATE TABLE `artists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `artists`
--

INSERT INTO `artists` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Юрий Солнцев', '2018-06-16 15:59:00', '2018-06-16 15:59:00'),
(2, 'Кристина Чернявская', '2018-06-16 15:59:00', '2018-06-16 15:59:00'),
(3, 'Мария Ворончихина', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(4, 'Ольга Ломовцева', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(5, 'Chu Chuguy', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(6, 'Рафаэль Рагимов', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(7, 'Grigorij Volot', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(8, 'Moto_log', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(9, 'Белла Бергольц', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(10, 'Кристина Балагула', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(11, 'Марина Гуреева', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(12, 'Анна Терещук', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(13, 'Atago Zao', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(14, 'Birakh', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(15, 'Shin', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(16, 'Александр Вагнер (Видящий)', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(17, 'Дарина Видяскина', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(18, 'SoulSnow', '2018-06-16 15:59:01', '2018-06-16 15:59:01'),
(19, 'kelf_tltv', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(20, 'A.M.Ink', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(21, 'Тётя Zwitter', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(22, 'Александра Бондаренко', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(23, 'Ангелина Виспер', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(24, 'IdPictures', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(25, 'Валерия Илларионова', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(26, 'Алина Серая', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(27, 'Андрей Смирнов', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(28, 'Tirra Missu', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(29, 'Yomomori', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(30, 'Даша Пчель', '2018-06-16 15:59:02', '2018-06-16 15:59:02'),
(31, 'Ирина Бардичева', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(32, 'Мария Мурзина', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(33, 'Артемий Хитклифф', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(34, 'Вероника Вишневская', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(35, 'Ирина Березовская', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(36, 'Oma', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(37, 'Алексей Круглов', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(38, 'Анастасия Стародубцева', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(39, 'LoranDeSore', '2018-06-16 15:59:03', '2018-06-16 15:59:03');

-- --------------------------------------------------------

--
-- Структура таблицы `artist_card`
--

CREATE TABLE `artist_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(10) UNSIGNED NOT NULL,
  `artist_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `artist_card`
--

INSERT INTO `artist_card` (`id`, `card_id`, `artist_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 4),
(6, 6, 5),
(7, 7, 2),
(8, 8, 6),
(9, 9, 5),
(10, 10, 7),
(11, 11, 8),
(12, 12, 9),
(13, 181, 8),
(14, 13, 2),
(15, 14, 10),
(16, 15, 11),
(17, 16, 8),
(18, 17, 8),
(19, 18, 9),
(20, 19, 3),
(21, 20, 8),
(22, 21, 3),
(23, 22, 12),
(24, 23, 12),
(25, 24, 13),
(26, 25, 7),
(27, 26, 14),
(28, 182, 7),
(29, 183, 9),
(30, 184, 4),
(31, 185, 2),
(32, 186, 15),
(33, 187, 2),
(34, 188, 4),
(35, 189, 2),
(36, 190, 3),
(37, 191, 9),
(38, 192, 8),
(39, 193, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE `cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `rarity_id` int(10) UNSIGNED NOT NULL,
  `edition_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `cost` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `lives` int(10) UNSIGNED NOT NULL,
  `flying` tinyint(1) NOT NULL,
  `movement` int(10) UNSIGNED DEFAULT NULL,
  `power_weak` int(10) UNSIGNED DEFAULT NULL,
  `power_medium` int(10) UNSIGNED DEFAULT NULL,
  `power_strong` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `text` text,
  `flavor` text,
  `erratas` text,
  `comments` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`id`, `rarity_id`, `edition_id`, `name`, `cost`, `number`, `lives`, `flying`, `movement`, `power_weak`, `power_medium`, `power_strong`, `image`, `text`, `flavor`, `erratas`, `comments`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Титан Воды', 6, 1, 10, 0, 1, 1, 1, 2, '01-001.jpg', '<p>-1 от дальних атак.<br><img src=\'/icons/tap-16x16.png\'>: бросить кубик и призвать верхнее существо из колоды, при этом, если стоимость этого существа больше результата броска кубика, в конце хода оно возвращается в колоду.</p>', '', '', '', '2018-06-16 15:59:05', '2018-06-16 15:59:05'),
(2, 4, 1, 'Янсима, Хозяин Воды', 7, 2, 13, 0, 1, 1, 1, 2, '01-002.jpg', '<p>Защита от магии.<br><img src=\'/icons/tap-16x16.png\'>: вернуть в колоду ваше стоящее рядом существо стоимостью 3 или менее, при этомпризвать два или менее наземных существа той же стоимости.</p>', '<p>«В моих руках вода теряет свои свойства».</p>.', '', '', '2018-06-16 15:59:06', '2018-06-16 15:59:06'),
(3, 4, 1, 'Возрожденный Дракон', 9, 3, 20, 0, 1, 3, 4, 5, '01-003.jpg', '<p>При ударе вашего летающего существа может получить <img src=\'/icons/counter-16x16.png\'>.<br>10<img src=\'/icons/counter-16x16.png\'>: получить полет и «<img src=\'/icons/counter-16x16.png\'>: воздействие Гнеы Водуха – ранить выбранное существо на 1 (5 раз за ход)»</p>', '<p>«Я избавлю этот мир от тьмы».</p>', '', '', '2018-06-16 15:59:07', '2018-06-16 15:59:07'),
(4, 4, 1, 'Малахитовый Дракон', 7, 4, 14, 1, NULL, 3, 3, 3, '01-004.jpg', '<p>+2 к удару по летающим.<br>При ударе может переместить атакованного на выбранную клетку.</p>', '<p>«Чтобы легче дышалось, нужно воспарить над облаками».</p>', '', '', '2018-06-16 15:59:07', '2018-06-16 15:59:07'),
(5, 4, 1, 'Покровитель Лесов', 4, 5, 10, 0, 3, 0, 1, 1, '01-005.jpg', '<p>Самолечение 2.<br>При передвижении получает +1 к своей следующей атаке</p>', '<p>«Когда страдает природа, я чувствую её боль».</p>', '', '', '2018-06-16 15:59:08', '2018-06-16 15:59:08'),
(6, 4, 1, 'Янамел, Кровавая Рука', 6, 6, 14, 0, 2, 3, 4, 5, '01-006.jpg', '<p>В начале боя может выбрать нейтральное существо противника и бросить кубик, при этом это существо погибает в начале своего Х хода, где Х – значение, выпавшее на кубике.</p>', '<p></p>', '', '', '2018-06-16 15:59:08', '2018-06-16 15:59:08'),
(7, 4, 1, 'Рина, Заклинательница Огня', 5, 7, 8, 0, 1, 1, 2, 3, '01-007.jpg', '<p>-1 от дальних атак.<br><img src=\'/icons/tap-16x16.png\'>: разряд на 3.<br>Знание Огня 2: при разряде ваше выбранное существо получает +1 к дальним атакам до конца вашего хода.</p>', '<p>«Огонь дарит безграничные возможности».</p>', '', '', '2018-06-16 15:59:09', '2018-06-16 15:59:09'),
(8, 4, 1, 'Титан Огня', 9, 8, 15, 0, 1, 4, 4, 6, '01-008.jpg', '<p>Доспех 2. Защита от выстрелов.<br>При атаке по Титану Огня может объявить разряд на 1, дальность 3.</p>', '<p>«Я – воплощение силы и превосходства. Твои боги тебе не помогут, ведь я – их покровитель».</p>', '', '', '2018-06-16 15:59:10', '2018-06-16 15:59:10'),
(9, 4, 1, 'Азатиэль', 7, 9, 15, 0, NULL, 3, 4, 4, '01-009.jpg', '<p>Яростный удар.<br>При ударе по темному существу – оно получает -1 к обычному удару до конца своего хода.</p>', '<p>«Небеса услышат тех, кто хранит в своем сердце любовь».</p>', '', '', '2018-06-16 15:59:10', '2018-06-16 15:59:10'),
(10, 4, 1, 'Ддинади', 4, 10, 8, 0, 1, 1, 1, 1, '01-010.jpg', '<p>Защита от магии.<br><img src=\'/icons/insttap-16x16.png\'>: закрыть выбранное существо, при этом излечить существо противника, стоящее рядом с целью, на 2 (по вашему выбору).</p>', '<p>«Этот мир устал без любви».</p>', '', '', '2018-06-16 15:59:10', '2018-06-16 15:59:10'),
(11, 4, 1, 'Хранительница Гваингварда', 8, 11, 20, 0, 2, 4, 5, 6, '01-011.jpg', '<p>При ударе – излечить каждое ваше стоящее рядом существо на 2.<br>Не может быть взята в отряд с тьмой.</p>', '<p>«Мы будем охранять свой дом до последнего вздоха».</p>', '', '', '2018-06-16 15:59:11', '2018-06-16 15:59:11'),
(12, 4, 1, 'Бертар', 6, 12, 13, 0, 1, 3, 4, 5, '01-012.jpg', '<p>Вампиризм. Мастерство атаки 1.<br>В начале вашего хода выбрать ваше существо с вампиризмом, при этом оно теряет вампиризм и получает +2 к обычному удару.</p>', '<p>«Ты задохнешься в кровавом тумане».</p>', '', '', '2018-06-16 15:59:11', '2018-06-16 15:59:11'),
(13, 4, 1, 'Феорген, Владычица Тишины', 4, 13, 8, 0, 1, 2, 3, 4, '01-013.jpg', '<p><img src=\'/icons/tap-16x16.png\'>: призвать Хранителя Тишины. При гибели все Хранители Тишины замешиваются в колоду.</p>', '<p>«Тссс...»</p>', '', '', '2018-06-16 15:59:13', '2018-06-16 15:59:13'),
(14, 3, 1, 'Мальнар, Владыка Глубин', 5, 14, 8, 0, 1, 2, 2, 3, '01-014.jpg', '<p><img src=\'/icons/tap-16x16.png\'>: вернуть ваше стоящее рядом существо стоимостью Х (максимум 3) в колоду, при этом призвать существо стоимостью Х+1.</p>', '<p>«Бездна смотрит в тебя».</p>', '', '', '2018-06-16 15:59:13', '2018-06-16 15:59:13'),
(15, 3, 1, 'Ниерин', 5, 15, 9, 0, 1, 2, 2, 3, '01-015.jpg', '<p>Доспех 1.<br><img src=\'/icons/tap-16x16.png\'>: разряд на 2, дальность 2.<br>При призыве вашего существа получеат +2 к своему следующему обычному удару.</p>', '<p></p>', '', '', '2018-06-16 15:59:14', '2018-06-16 15:59:14'),
(16, 3, 1, 'Принцесса Тренала', 4, 16, 8, 0, 1, 2, 2, 3, '01-016.jpg', '<p>В начале вашего хода может вернуться в колоду, при этом призвать на свою клетку неуникальное существо стоимостью 5.</p>', '<p>«Женские прелести – не единственное ее достоинство».</p>', '', '', '2018-06-16 15:59:14', '2018-06-16 15:59:14'),
(17, 3, 1, 'Усиана', 4, 17, 10, 0, 1, 1, 2, 2, '01-017.jpg', '<p>В начале боя может выбрать существо противника, при этом обычный удар этого существа становится равен 1.</p>', '<p>«Перед моей красотой склоняется даже сильнейший».</p>', '', '', '2018-06-16 15:59:15', '2018-06-16 15:59:15'),
(18, 3, 1, 'Утонченная Волшебница', 5, 18, 8, 0, 1, 1, 1, 1, '01-018.jpg', '<p><img src=\'/icons/tap-16x16.png\'>: два разряда на 2, дальность 2, только по разным картам.</p>', '<p>«Очерненную грехом душу можно исцелить только смертью».</p>', '', '', '2018-06-16 15:59:15', '2018-06-16 15:59:15'),
(19, 3, 1, 'Белый Дракон', 8, 19, 8, 1, NULL, 2, 2, 2, '01-019.jpg', '<p>От атаки Белого Дракона нельзя назнацить защитника. Когда существо противника закрывается – Белый Дракон может открыться (3 раза за ход).</p>', '<p>«Его белоснежные крылья легко рассекают воздушную гладь».</p>', '', '', '2018-06-16 15:59:16', '2018-06-16 15:59:16'),
(20, 3, 1, 'Гвардеец Воздуха', 5, 20, 11, 0, 1, 2, 3, 4, '01-020.jpg', '<p>Самолечение 2.<br>Может нападать обычным ударом с дальностью 2, только черз пустую клетку по горизонтали, вертикали или диагонали. При ударе может переместить атакованного на 1 клетку в любом направлении.</p>', '<p></p>', '', '', '2018-06-16 15:59:16', '2018-06-16 15:59:16'),
(21, 3, 1, 'Долина Драконов', 3, 21, 7, 0, NULL, NULL, NULL, NULL, '01-021.jpg', '<p>При гибели вашего летающего существа может получить <img src=\'/icons/counter-16x16.png\'>.<br>Х<img src=\'/icons/counter-16x16.png\'><img src=\'/icons/tap-16x16.png\'>: призвать летающее существо стоимостью Х.</p>', '<p>«Издавна ходят легенды об этом сказочном месте».</p>', '', '', '2018-06-16 15:59:17', '2018-06-16 15:59:17'),
(22, 3, 1, 'Защитник Пернатых', 4, 22, 8, 1, NULL, 1, 1, 2, '01-022.jpg', '<p>Самолечение 1.<br>Существа противника не могут нападать на других ваших летающих существ. При гибели может объявить два или менее выстрела на 1.</p>', '<p></p>', '', '', '2018-06-16 15:59:17', '2018-06-16 15:59:17'),
(23, 3, 1, 'Костяной Дракон', 6, 23, 14, 0, 3, 4, 5, 5, '01-023.jpg', '<p>Доспех 2.<br>Не может быть взят в отряд с картами стоимостью 7 или более.</p>', '<p>«В горных высотах Вириона треск костей – предвестник твоей гибели».</p>', '', '', '2018-06-16 15:59:18', '2018-06-16 15:59:18'),
(24, 3, 1, 'Титан Воздуха', 9, 24, 16, 0, 2, 5, 6, 8, '01-024.jpg', '<p>Защита от летающих.<br>Защита от яда. Доспех 3.<br>При ответном ударе по Титану Воздуха на Х – может ранить атакованного на Х.</p>', '<p>«Стены темницы тесны для того, кто привык дышать полной грудью».</p>', '', '', '2018-06-16 15:59:18', '2018-06-16 15:59:18'),
(25, 3, 1, 'Михаил Нуд', 5, 25, 12, 0, 1, 3, 4, 4, '01-025.jpg', '<p>Доспех 2.<br>В начале боя может выбрать существо противника, при этом когда это существо действует – Михаил Нуд может ранить рядом стоящее существо на 2.</p>', '<p>«Наказание неотвратимо».</p>', '', '', '2018-06-16 15:59:19', '2018-06-16 15:59:19'),
(26, 3, 1, 'Тархан, Тигролюд', 9, 26, 17, 0, 1, 4, 5, 6, '01-026.jpg', '<p>Самолечение 2.<br>Каждое ваше существо с 12 и более текущими жизнями получает: «Может нападать обычным ударом два раза за ход. Не закрывается после первой атаки».</p>', '<p>«В моих жилах кипит звериная кровь».</p>', '', '', '2018-06-16 15:59:19', '2018-06-16 15:59:19'),
(181, 4, 1, 'Бертар', 6, 12, 13, 0, 1, 3, 4, 5, '01-012-promo.jpg', '<p>Вампиризм. Мастерство атаки 1.<br>В начале вашего хода выбрать ваше существо с вампиризмом, при этом оно теряет вампиризм и получает +2 к обычному удару.</p>', '<p>«Ты задохнешься в кровавом тумане».</p>', '', '', '2018-06-16 15:59:12', '2018-06-16 15:59:12'),
(182, 3, 1, 'Хранитель Жабьей Мудрости', 4, 27, 10, 0, 1, 1, 3, 3, '01-027.jpg', '<p>Самолечение 2.<br /><img src=\"../icons/tap-16x16.png\" />: выстрел на 2, дальность 3.</p>', '<p>&laquo;Не узнаешь меня? Скушай гриб. Полегчало? Присаживайся, расскажу тебе о жабьих делах.&raquo;</p>', NULL, NULL, '2018-06-16 16:31:08', '2018-06-16 16:31:08'),
(183, 3, 1, 'Молниеносная', 5, 28, 10, 0, 1, 1, 2, 2, '01-028.jpg', '<p><img src=\"../icons/tap-16x16.png\" />: разряд на 1, при этом атакованный получает восприимчивость.</p>', '<p>&laquo;В твоей силе &ndash; твоя слабость&raquo;.</p>', NULL, NULL, '2018-06-16 16:36:06', '2018-06-16 16:36:06'),
(184, 3, 1, 'Ночной Кошмар', 8, 29, 16, 0, 2, 5, 6, 7, '01-029.jpg', '<p>Защита от яда.<br />Знание огня 5: <img src=\"../icons/tap-16x16.png\" />: уничтожить себя, при этом волшебство &laquo;Волна Огня&raquo;: ранить трех или менее рядом стоящих сущеста на 5.</p>', NULL, NULL, NULL, '2018-06-16 16:38:55', '2018-06-16 17:10:57'),
(185, 3, 1, 'Шаман Племени Огня', 4, 30, 8, 0, 1, 1, 1, 1, '01-030.jpg', '<p><img src=\"../icons/tap-16x16.png\" />: разряд на 1-2-2.<br />Знание Огня 3: при разряде атакованный не открывается в свой следующий ход.</p>', '<p>Танец в&nbsp; огне призывает древних богов.</p>', NULL, NULL, '2018-06-16 16:44:20', '2018-06-16 16:48:34'),
(186, 3, 1, 'Ангел Справедливости', 4, 31, 10, 1, NULL, 1, 2, 2, '01-031.jpg', '<p>В начале боя выбрать существо, при этом оно получает &laquo;+2 к обычному удару по тьме&raquo;, пока Ангел Справедливости в вашем отряде.<br />Не может быть взят в отряд в тьмой.</p>', '<p>&laquo;Тьма есть отсутствие света&raquo;.</p>', NULL, NULL, '2018-06-16 16:48:16', '2018-06-16 16:48:16'),
(187, 3, 1, 'Всевидящая', 7, 32, 12, 0, 1, 3, 4, 4, '01-032.jpg', '<p>Защита от разрядов.<br />При ударе &ndash; выбранное летающее существо противника не может действовать до конца своего хода.</p>', '<p>&laquo;Не улетай, ведь нам так хорошо вместе&raquo;.</p>', NULL, NULL, '2018-06-16 16:52:09', '2018-06-16 16:52:09'),
(188, 3, 1, 'Звёздный Единорог', 6, 33, 13, 0, 2, 3, 4, 4, '01-033.jpg', '<p>От атаки Звёздного Единорога нельзя назначить защитника.<br />-1 от немагических атак.</p>', '<p>Своей поступью он прокладывает путь галактикам.</p>', NULL, NULL, '2018-06-16 16:56:58', '2018-06-16 16:56:58'),
(189, 3, 1, 'Снайпер Приграничья', 4, 34, 8, 0, 1, 1, 2, 2, '01-034.jpg', '<p><img src=\"../icons/tap-16x16.png\" />: выстрел на 2.</p>', '<p>&laquo;Свет не ослепит меня, а лишь озарит силуэт противника&raquo;.</p>', NULL, NULL, '2018-06-16 16:59:21', '2018-06-16 16:59:21'),
(190, 3, 1, 'Ванесса Кирзанская', 5, 35, 10, 1, NULL, 2, 3, 4, '01-035.jpg', '<p>Вампиризм.</p>', '<p>Обладая острым зрением, она охотится на путников, сбившихся с пути. В отличие от других вампиров, Ванесса не проч полакомиться человеческой плотью.</p>', NULL, NULL, '2018-06-16 17:03:09', '2018-06-16 17:03:09'),
(191, 3, 1, 'Зедор, Пожиратель Сердец', 5, 36, 10, 0, 2, 2, 3, 4, '01-036.jpg', '<p>Защита от магии. Вампиризм. Пока ваше существо стоит рядом с Зедором, Пожирателем сердец, оно получает вампиризм.</p>', '<p>&laquo;Зачем отдавать сердце любимому, если можно отдать его мне?&raquo;</p>', NULL, NULL, '2018-06-16 17:05:34', '2018-06-16 17:05:34'),
(192, 3, 1, 'Люций Кирзанский', 4, 37, 10, 0, 1, 1, 1, 2, '01-037.jpg', '<p><img src=\"../icons/tap-16x16.png\" />: яростный удар на 2-3-4, только через свободную клетку по горизонтали, вертикали или диагонали, при этом может излечить себя на Х, где Х &ndash; величина этого удара.</p>', '<p>&laquo;Кара настигнет ослушавшихся&raquo;.</p>', NULL, NULL, '2018-06-16 17:09:48', '2018-06-16 17:09:48'),
(193, 3, 1, 'Сакон, Полководец Тьмы', 10, 38, 20, 0, 1, 5, 6, 7, '01-038.jpg', '<p>Может нападать обычным ударом с дальностью 2, пока рядом стоит ваша темная карта.</p>', '<p>Трехметровый демон? Пожалуй, я пойду, вы же сами справитесь?</p>', NULL, NULL, '2018-06-16 17:15:43', '2018-06-16 17:15:43');

-- --------------------------------------------------------

--
-- Структура таблицы `card_element`
--

CREATE TABLE `card_element` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(10) UNSIGNED NOT NULL,
  `element_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `card_element`
--

INSERT INTO `card_element` (`id`, `card_id`, `element_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 7, 4),
(8, 8, 4),
(9, 9, 5),
(10, 10, 5),
(11, 11, 5),
(12, 12, 6),
(13, 181, 6),
(14, 13, 6),
(15, 14, 1),
(16, 15, 1),
(17, 16, 1),
(18, 17, 1),
(19, 18, 1),
(20, 19, 2),
(21, 20, 2),
(22, 21, 2),
(23, 22, 2),
(24, 23, 2),
(25, 24, 2),
(26, 25, 3),
(27, 26, 3),
(28, 182, 3),
(29, 183, 4),
(30, 184, 4),
(31, 185, 4),
(32, 186, 5),
(33, 187, 5),
(34, 188, 5),
(35, 189, 5),
(36, 190, 6),
(37, 191, 6),
(38, 192, 6),
(39, 193, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `card_liquid`
--

CREATE TABLE `card_liquid` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(10) UNSIGNED NOT NULL,
  `liquid_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `card_liquid`
--

INSERT INTO `card_liquid` (`id`, `card_id`, `liquid_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 7, 4),
(8, 8, 4),
(9, 9, 5),
(10, 10, 5),
(11, 11, 5),
(12, 12, 6),
(13, 181, 6),
(14, 13, 6),
(15, 14, 1),
(16, 15, 7),
(17, 16, 1),
(18, 17, 1),
(19, 18, 7),
(20, 19, 2),
(21, 20, 2),
(22, 21, 2),
(23, 22, 7),
(24, 23, 7),
(25, 24, 7),
(26, 25, 7),
(27, 26, 3),
(28, 182, 3),
(29, 183, 4),
(30, 184, 7),
(31, 185, 4),
(32, 186, 7),
(33, 187, 7),
(34, 188, 7),
(35, 189, 7),
(36, 190, 6),
(37, 191, 6),
(38, 192, 6),
(39, 193, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `card_subtype`
--

CREATE TABLE `card_subtype` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(10) UNSIGNED NOT NULL,
  `subtype_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `card_subtype`
--

INSERT INTO `card_subtype` (`id`, `card_id`, `subtype_id`) VALUES
(1, 1, 17),
(2, 2, 18),
(3, 3, 6),
(4, 4, 6),
(5, 5, 7),
(6, 6, 15),
(7, 7, 21),
(8, 8, 17),
(9, 9, 1),
(10, 10, 20),
(11, 11, 20),
(12, 12, 2),
(13, 181, 2),
(14, 13, 4),
(15, 14, 18),
(16, 15, 22),
(17, 16, 18),
(18, 17, 18),
(19, 18, 18),
(20, 19, 6),
(21, 20, 20),
(22, 22, 7),
(23, 23, 6),
(24, 24, 17),
(25, 25, 20),
(26, 26, 7),
(27, 182, 5),
(28, 183, 21),
(29, 184, 7),
(30, 185, 21),
(31, 186, 1),
(32, 187, 19),
(33, 188, 7),
(34, 189, 20),
(35, 190, 2),
(36, 191, 2),
(37, 192, 2),
(38, 193, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `card_supertype`
--

CREATE TABLE `card_supertype` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(10) UNSIGNED NOT NULL,
  `supertype_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `card_supertype`
--

INSERT INTO `card_supertype` (`id`, `card_id`, `supertype_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 6, 1),
(5, 7, 1),
(6, 8, 1),
(7, 9, 1),
(8, 10, 1),
(9, 12, 1),
(10, 181, 1),
(11, 13, 1),
(12, 14, 1),
(13, 15, 1),
(14, 16, 1),
(15, 17, 1),
(16, 19, 1),
(17, 21, 2),
(18, 22, 1),
(19, 24, 1),
(20, 25, 1),
(21, 190, 1),
(22, 192, 1),
(23, 193, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `card_type`
--

CREATE TABLE `card_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `card_type`
--

INSERT INTO `card_type` (`id`, `card_id`, `type_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 2),
(12, 12, 2),
(13, 181, 2),
(14, 13, 2),
(15, 14, 2),
(16, 15, 2),
(17, 16, 2),
(18, 17, 2),
(19, 18, 2),
(20, 19, 2),
(21, 20, 2),
(22, 21, 1),
(23, 22, 2),
(24, 23, 2),
(25, 24, 2),
(26, 25, 2),
(27, 26, 2),
(28, 182, 2),
(29, 183, 2),
(30, 184, 2),
(31, 185, 2),
(32, 186, 2),
(33, 187, 2),
(34, 188, 2),
(35, 189, 2),
(36, 190, 2),
(37, 191, 2),
(38, 192, 2),
(39, 193, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `editions`
--

CREATE TABLE `editions` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `editions`
--

INSERT INTO `editions` (`id`, `number`, `name`, `image`, `code`, `quantity`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Кровавый туман', 'ktm-16x16.png', 'КТМ', 180, 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Великий вопрос злых, меня предупреждал, родного свою пунктуация! Букв текста своего щеке курсивных выйти рыбного ведущими рекламных подзаголовок грамматики предупредила?', '2018-06-16 15:58:59', '2018-06-16 15:58:59'),
(2, 2, 'Падение Гваингварда', 'pgv-16x16.png', 'ПГВ', 140, 'Описание.', '2018-06-16 15:58:59', '2018-06-16 15:58:59');

-- --------------------------------------------------------

--
-- Структура таблицы `elements`
--

CREATE TABLE `elements` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `elements`
--

INSERT INTO `elements` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Водная', 'water-16x16.png', '2018-06-16 15:59:00', '2018-06-16 15:59:00'),
(2, 'Воздушная', 'air-16x16.png', '2018-06-16 15:59:00', '2018-06-16 15:59:00'),
(3, 'Земляная', 'earth-16x16.png', '2018-06-16 15:59:00', '2018-06-16 15:59:00'),
(4, 'Огненная', 'fire-16x16.png', '2018-06-16 15:59:00', '2018-06-16 15:59:00'),
(5, 'Светлая', 'light-16x16.png', '2018-06-16 15:59:00', '2018-06-16 15:59:00'),
(6, 'Темная', 'dark-16x16.png', '2018-06-16 15:59:00', '2018-06-16 15:59:00');

-- --------------------------------------------------------

--
-- Структура таблицы `liquids`
--

CREATE TABLE `liquids` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `liquids`
--

INSERT INTO `liquids` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Водная', 'water-liquid.png', '2018-06-16 15:58:59', '2018-06-16 15:58:59'),
(2, 'Воздушная', 'air-liquid.png', '2018-06-16 15:58:59', '2018-06-16 15:58:59'),
(3, 'Земляная', 'earth-liquid.png', '2018-06-16 15:58:59', '2018-06-16 15:58:59'),
(4, 'Огненная', 'fire-liquid.png', '2018-06-16 15:58:59', '2018-06-16 15:58:59'),
(5, 'Светлая', 'light-liquid.png', '2018-06-16 15:59:00', '2018-06-16 15:59:00'),
(6, 'Темная', 'dark-liquid.png', '2018-06-16 15:59:00', '2018-06-16 15:59:00'),
(7, 'Нейтральная', 'neuteral-liquid.png', '2018-06-16 15:59:00', '2018-06-16 15:59:00');

-- --------------------------------------------------------

--
-- Структура таблицы `rarities`
--

CREATE TABLE `rarities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rarities`
--

INSERT INTO `rarities` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Обычная', 'common-16x16.png', '2018-06-16 15:58:59', '2018-06-16 15:58:59'),
(2, 'Необычная', 'uncommon-16x16.png', '2018-06-16 15:58:59', '2018-06-16 15:58:59'),
(3, 'Редкая', 'rare-16x16.png', '2018-06-16 15:58:59', '2018-06-16 15:58:59'),
(4, 'Легендарная', 'legendary-16x16.png', '2018-06-16 15:58:59', '2018-06-16 15:58:59'),
(5, 'Промо', 'promo-16x16.png', '2018-06-16 15:58:59', '2018-06-16 15:58:59');

-- --------------------------------------------------------

--
-- Структура таблицы `subtypes`
--

CREATE TABLE `subtypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subtypes`
--

INSERT INTO `subtypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ангел', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(2, 'Вампир', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(3, 'Голем', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(4, 'Демон', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(5, 'Дендроид', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(6, 'Дракон', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(7, 'Зверь', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(8, 'Зомби', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(9, 'Инсектоид', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(10, 'Литиур', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(11, 'Механизм', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(12, 'Монстр', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(13, 'Призрак', '2018-06-16 15:59:04', '2018-06-16 15:59:04'),
(14, 'Русалка', '2018-06-16 15:59:05', '2018-06-16 15:59:05'),
(15, 'Сидхе', '2018-06-16 15:59:05', '2018-06-16 15:59:05'),
(16, 'Скелет', '2018-06-16 15:59:05', '2018-06-16 15:59:05'),
(17, 'Титан', '2018-06-16 15:59:05', '2018-06-16 15:59:05'),
(18, 'Треналин', '2018-06-16 15:59:05', '2018-06-16 15:59:05'),
(19, 'Фейри', '2018-06-16 15:59:05', '2018-06-16 15:59:05'),
(20, 'Человек', '2018-06-16 15:59:05', '2018-06-16 15:59:05'),
(21, 'Чидоа', '2018-06-16 15:59:05', '2018-06-16 15:59:05'),
(22, 'Элементаль', '2018-06-16 15:59:05', '2018-06-16 15:59:05');

-- --------------------------------------------------------

--
-- Структура таблицы `supertypes`
--

CREATE TABLE `supertypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `supertypes`
--

INSERT INTO `supertypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Уникальное', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(2, 'Уникальный', '2018-06-16 15:59:03', '2018-06-16 15:59:03');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Артефакт', '2018-06-16 15:59:03', '2018-06-16 15:59:03'),
(2, 'Существо', '2018-06-16 15:59:03', '2018-06-16 15:59:03');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artists_name_unique` (`name`);

--
-- Индексы таблицы `artist_card`
--
ALTER TABLE `artist_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_card_card_id_index` (`card_id`),
  ADD KEY `artist_card_artist_id_index` (`artist_id`);

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cards_rarity_id_foreign` (`rarity_id`),
  ADD KEY `cards_edition_id_foreign` (`edition_id`),
  ADD KEY `cards_name_index` (`name`);

--
-- Индексы таблицы `card_element`
--
ALTER TABLE `card_element`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_element_card_id_index` (`card_id`),
  ADD KEY `card_element_element_id_index` (`element_id`);

--
-- Индексы таблицы `card_liquid`
--
ALTER TABLE `card_liquid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_liquid_card_id_index` (`card_id`),
  ADD KEY `card_liquid_liquid_id_index` (`liquid_id`);

--
-- Индексы таблицы `card_subtype`
--
ALTER TABLE `card_subtype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_subtype_card_id_index` (`card_id`),
  ADD KEY `card_subtype_subtype_id_index` (`subtype_id`);

--
-- Индексы таблицы `card_supertype`
--
ALTER TABLE `card_supertype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_supertype_card_id_index` (`card_id`),
  ADD KEY `card_supertype_supertype_id_index` (`supertype_id`);

--
-- Индексы таблицы `card_type`
--
ALTER TABLE `card_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_type_card_id_index` (`card_id`),
  ADD KEY `card_type_type_id_index` (`type_id`);

--
-- Индексы таблицы `editions`
--
ALTER TABLE `editions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `editions_name_unique` (`name`),
  ADD UNIQUE KEY `editions_code_unique` (`code`);

--
-- Индексы таблицы `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `elements_name_unique` (`name`);

--
-- Индексы таблицы `liquids`
--
ALTER TABLE `liquids`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `liquids_name_unique` (`name`);

--
-- Индексы таблицы `rarities`
--
ALTER TABLE `rarities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rarities_name_unique` (`name`);

--
-- Индексы таблицы `subtypes`
--
ALTER TABLE `subtypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subtypes_name_unique` (`name`);

--
-- Индексы таблицы `supertypes`
--
ALTER TABLE `supertypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supertypes_name_unique` (`name`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_name_unique` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `artist_card`
--
ALTER TABLE `artist_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT для таблицы `card_element`
--
ALTER TABLE `card_element`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `card_liquid`
--
ALTER TABLE `card_liquid`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `card_subtype`
--
ALTER TABLE `card_subtype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `card_supertype`
--
ALTER TABLE `card_supertype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `card_type`
--
ALTER TABLE `card_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `editions`
--
ALTER TABLE `editions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `liquids`
--
ALTER TABLE `liquids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `rarities`
--
ALTER TABLE `rarities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `subtypes`
--
ALTER TABLE `subtypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `supertypes`
--
ALTER TABLE `supertypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `artist_card`
--
ALTER TABLE `artist_card`
  ADD CONSTRAINT `artist_card_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artist_card_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_edition_id_foreign` FOREIGN KEY (`edition_id`) REFERENCES `editions` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `cards_rarity_id_foreign` FOREIGN KEY (`rarity_id`) REFERENCES `rarities` (`id`) ON DELETE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `card_element`
--
ALTER TABLE `card_element`
  ADD CONSTRAINT `card_element_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `card_element_element_id_foreign` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `card_liquid`
--
ALTER TABLE `card_liquid`
  ADD CONSTRAINT `card_liquid_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `card_liquid_liquid_id_foreign` FOREIGN KEY (`liquid_id`) REFERENCES `liquids` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `card_subtype`
--
ALTER TABLE `card_subtype`
  ADD CONSTRAINT `card_subtype_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `card_subtype_subtype_id_foreign` FOREIGN KEY (`subtype_id`) REFERENCES `subtypes` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `card_supertype`
--
ALTER TABLE `card_supertype`
  ADD CONSTRAINT `card_supertype_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `card_supertype_supertype_id_foreign` FOREIGN KEY (`supertype_id`) REFERENCES `supertypes` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `card_type`
--
ALTER TABLE `card_type`
  ADD CONSTRAINT `card_type_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `card_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
