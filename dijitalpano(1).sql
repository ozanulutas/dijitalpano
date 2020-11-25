-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Kas 2020, 16:16:03
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dijitalpano`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `css`
--

CREATE TABLE `css` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(150) NOT NULL,
  `sube_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `css`
--

INSERT INTO `css` (`id`, `name`, `value`, `sube_id`) VALUES
(1, '--renk-1', '#ff5f01', 1),
(2, '--renk-2', '#feac00', 1),
(3, '--renk-3', '#ffb933', 1),
(4, '--renk-4', '#800000', 1),
(5, '--renk-5', '#ffc933', 1),
(6, '--renk-6', '#ff9100', 1),
(7, '--renk-1', '#ff5f01', 2),
(8, '--renk-2', '#feac00', 2),
(9, '--renk-3', '#ffb933', 2),
(10, '--renk-4', '#800000', 2),
(11, '--renk-5', '#ffc933', 2),
(12, '--renk-6', '#ff9100', 2),
(13, '--renk-1', '#ff5f01', 3),
(14, '--renk-2', '#feac00', 3),
(15, '--renk-3', '#ffb933', 3),
(16, '--renk-4', '#800000', 3),
(17, '--renk-5', '#ffc933', 3),
(18, '--renk-6', '#ff00c1', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `id` mediumint(9) NOT NULL,
  `metin` varchar(1000) NOT NULL,
  `yayin_tarih` date NOT NULL,
  `yayin_saat` time DEFAULT NULL,
  `bitis_tarih` date DEFAULT NULL,
  `bitis_saat` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`id`, `metin`, `yayin_tarih`, `yayin_saat`, `bitis_tarih`, `bitis_saat`) VALUES
(1, '5 Aralık Tarihinde 11. sınıflara deneme sınavı yapılacaktır.', '2020-10-28', '11:11:00', '2020-11-22', '00:00:00'),
(2, '22 Ocak\'ta Abant gezisi yapılacaktır. Katılmak isteyenler sınıf öğretmenlerine başvuruda bulunabilir.', '2020-10-30', NULL, '2020-11-27', NULL),
(3, '8 Aralık tarihli deneme sınavının sonuçları katlardaki panolara asılmıştır.', '2020-10-28', NULL, '2020-11-28', NULL),
(4, '30 Ekim tarihinde yapılacak olan akşam etütü bir gün sonra (31 Ekim) yapılacaktır .', '2020-10-29', '00:00:00', '2020-11-30', '00:00:00'),
(16, 'Duyuru-5', '2020-10-14', '00:00:00', '2020-12-31', '00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` smallint(6) NOT NULL,
  `k_adi` varchar(25) NOT NULL,
  `sifre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `k_adi`, `sifre`) VALUES
(3, 'admin', '.'),
(4, 'admina', 'a'),
(5, 'adminaa', 'ü'),
(6, 'adminaz', 's'),
(7, 'adminella', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `gun` varchar(10) NOT NULL,
  `saat` time NOT NULL,
  `bitis_saat` time DEFAULT NULL,
  `etkinlik` varchar(100) NOT NULL,
  `sube_id` smallint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `program`
--

INSERT INTO `program` (`id`, `gun`, `saat`, `bitis_saat`, `etkinlik`, `sube_id`) VALUES
(2, '0', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(3, '0', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(4, '0', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(5, '0', '07:30:00', '07:45:00', 'DUŞ', 1),
(6, '0', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(7, '0', '08:15:00', '09:10:00', 'DERS 1', 1),
(8, '0', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(9, '0', '09:20:00', '10:10:00', 'DERS 2', 1),
(10, '0', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(11, '0', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(12, '0', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(13, '0', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(14, '0', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(15, '0', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(16, '0', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(17, '0', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(18, '0', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(19, '0', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(20, '0', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(21, '0', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(22, '0', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(23, '0', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(24, '0', '19:45:00', '21:00:00', 'KANTİN', 1),
(25, '0', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(26, '0', '21:30:00', '22:00:00', 'SERBEST', 1),
(27, '0', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(28, '1', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(29, '1', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(30, '1', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(31, '1', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(32, '1', '07:30:00', '07:45:00', 'DUŞ', 1),
(33, '1', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(34, '1', '08:15:00', '09:10:00', 'DERS 1', 1),
(35, '1', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(36, '1', '09:20:00', '10:10:00', 'DERS 2', 1),
(37, '1', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(38, '1', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(39, '1', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(40, '1', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(41, '1', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(42, '1', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(43, '1', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(44, '1', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(45, '1', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(46, '1', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(47, '1', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(48, '1', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(49, '1', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(50, '1', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(51, '1', '19:45:00', '21:00:00', 'KANTİN', 1),
(52, '1', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(53, '1', '21:30:00', '22:00:00', 'SERBEST', 1),
(54, '1', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(55, '2', '23:59:00', '06:30:00', 'İSTİRAHAT', 1),
(56, '2', '06:30:00', '08:45:00', 'NAMAZA HAZIRLIK', 1),
(57, '2', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(58, '2', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(59, '2', '07:30:00', '07:45:00', 'DUŞ', 1),
(60, '2', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(61, '2', '08:15:00', '09:10:00', 'DERS 1', 1),
(62, '2', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(63, '2', '09:20:00', '10:10:00', 'DERS 2', 1),
(64, '2', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(65, '2', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(66, '2', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(67, '2', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(68, '2', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(69, '2', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(70, '2', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(71, '2', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(72, '2', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(73, '2', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(74, '2', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(75, '2', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(76, '2', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(77, '2', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(78, '2', '19:45:00', '21:00:00', 'KANTİN', 1),
(79, '2', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(80, '2', '21:30:00', '22:00:00', 'SERBEST', 1),
(81, '2', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(82, '3', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(83, '3', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(84, '3', '06:45:00', '08:00:00', 'SABAH NAMAZI', 1),
(85, '3', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(86, '3', '07:30:00', '07:45:00', 'DUŞ', 1),
(87, '3', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(88, '3', '08:15:00', '09:10:00', 'DERS 1', 1),
(89, '3', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(90, '3', '09:20:00', '10:10:00', 'DERS 2', 1),
(91, '3', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(92, '3', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(93, '3', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(94, '3', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(95, '3', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(96, '3', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(97, '3', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(98, '3', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(99, '3', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(100, '3', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(101, '3', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(102, '3', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(103, '3', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(104, '3', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(105, '3', '19:45:00', '21:00:00', 'KANTİN', 1),
(106, '3', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(107, '3', '21:30:00', '22:00:00', 'SERBEST', 1),
(108, '3', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(109, '4', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(110, '4', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(111, '4', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(112, '4', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(113, '4', '07:30:00', '07:45:00', 'DUŞ', 1),
(114, '4', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(115, '4', '08:15:00', '09:10:00', 'DERS 1', 1),
(116, '4', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(117, '4', '09:20:00', '10:10:00', 'DERS 2', 1),
(118, '4', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(119, '4', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(120, '4', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(121, '4', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(122, '4', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(123, '4', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(124, '4', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(125, '4', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(126, '4', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(127, '4', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(128, '4', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(129, '4', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(130, '4', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(131, '4', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(132, '4', '19:45:00', '21:00:00', 'KANTİN', 1),
(133, '4', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(134, '4', '21:30:00', '22:00:00', 'SERBEST', 1),
(135, '4', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(136, '5', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(137, '5', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(138, '5', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(139, '5', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(140, '5', '07:30:00', '07:45:00', 'DUŞ', 1),
(141, '5', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(142, '5', '08:15:00', '09:10:00', 'DERS 1', 1),
(143, '5', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(144, '5', '09:20:00', '10:10:00', 'DERS 2', 1),
(145, '5', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(146, '5', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(147, '5', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(148, '5', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(149, '5', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(150, '5', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(151, '5', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(152, '5', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(153, '5', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(154, '5', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(155, '5', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(156, '5', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(157, '5', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(158, '5', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(159, '5', '19:45:00', '21:00:00', 'KANTİN', 1),
(160, '5', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(161, '5', '21:30:00', '22:00:00', 'SERBEST', 1),
(162, '5', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(163, '6', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(164, '6', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(165, '6', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(166, '6', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(167, '6', '07:30:00', '07:45:00', 'DUŞ', 1),
(168, '6', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(169, '6', '08:15:00', '09:10:00', 'DERS 1', 1),
(170, '6', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(171, '6', '09:20:00', '10:10:00', 'DERS 2', 1),
(172, '6', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(173, '6', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(174, '6', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(175, '6', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(176, '6', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(177, '6', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(178, '6', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(179, '6', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(180, '6', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(181, '6', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(182, '6', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(183, '6', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(184, '6', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(185, '6', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(186, '6', '19:45:00', '21:00:00', 'KANTİN', 1),
(187, '6', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(188, '6', '21:30:00', '22:00:00', 'SERBEST', 1),
(189, '6', '22:00:00', '23:59:00', 'İSTİRAHAT son', 1),
(191, '0', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(193, '1', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(194, '1', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(195, '2', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(196, '2', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(197, '3', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(198, '3', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(199, '4', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(200, '4', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(201, '5', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(202, '5', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(203, '6', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(204, '6', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(207, '0', '00:00:00', NULL, 'fvgfd', 2),
(215, '0', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(216, '3', '19:12:00', '18:50:00', 'deneme', 2),
(217, '0', '00:00:00', '06:30:00', 'Ders1', 3),
(218, '0', '06:30:00', '06:45:00', 'Ders2', 3),
(219, '0', '06:45:00', '07:00:00', 'SABAH NAMAZI', 3),
(220, '0', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 3),
(221, '0', '07:30:00', '07:45:00', 'DUŞ', 3),
(222, '0', '07:45:00', '08:15:00', 'KAHVALTI', 3),
(223, '0', '08:15:00', '09:10:00', 'DERS 1', 3),
(224, '0', '09:10:00', '09:20:00', 'TENEFFÜS', 3),
(225, '0', '09:20:00', '10:10:00', 'DERS 2', 3),
(226, '0', '10:10:00', '10:30:00', 'TEMİZLİK', 3),
(227, '0', '10:30:00', '13:30:00', 'EBA CANLI DERS', 3),
(228, '0', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 3),
(229, '0', '13:50:00', '14:10:00', 'EBA CANLI DERS', 3),
(230, '0', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 3),
(231, '0', '14:30:00', '15:30:00', 'ETÜT 1', 3),
(232, '0', '15:30:00', '15:45:00', 'TENEFFÜS', 3),
(233, '0', '15:45:00', '16:45:00', 'ETÜT 2', 3),
(234, '0', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 3),
(235, '0', '17:10:00', '17:50:00', 'ETÜT 4', 3),
(236, '0', '17:50:00', '18:00:00', 'TENEFFÜS', 3),
(237, '0', '18:00:00', '18:40:00', 'ETÜT 5', 3),
(238, '0', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 3),
(239, '0', '19:05:00', '19:45:00', 'ETÜT 6', 3),
(240, '0', '19:45:00', '21:00:00', 'KANTİN', 3),
(241, '0', '21:00:00', '21:30:00', 'YATSI NAMAZI', 3),
(242, '0', '21:30:00', '22:00:00', 'SERBEST', 3),
(243, '0', '22:00:00', '23:59:00', 'İSTİRAHAT', 3),
(244, '1', '00:00:00', '06:30:00', 'İSTİRAHAT', 3),
(245, '1', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 3),
(246, '1', '06:45:00', '07:00:00', 'SABAH NAMAZI', 3),
(247, '1', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 3),
(248, '1', '07:30:00', '07:45:00', 'DUŞ', 3),
(249, '1', '07:45:00', '08:15:00', 'KAHVALTI', 3),
(250, '1', '08:15:00', '09:10:00', 'DERS 1', 3),
(251, '1', '09:10:00', '09:20:00', 'TENEFFÜS', 3),
(252, '1', '09:20:00', '10:10:00', 'DERS 2', 3),
(253, '1', '10:10:00', '10:30:00', 'TEMİZLİK', 3),
(254, '1', '10:30:00', '13:30:00', 'EBA CANLI DERS', 3),
(255, '1', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 3),
(256, '1', '13:50:00', '14:10:00', 'EBA CANLI DERS', 3),
(257, '1', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 3),
(258, '1', '14:30:00', '15:30:00', 'ETÜT 1', 3),
(259, '1', '15:30:00', '15:45:00', 'TENEFFÜS', 3),
(260, '1', '15:45:00', '16:45:00', 'ETÜT 2', 3),
(261, '1', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 3),
(262, '1', '17:10:00', '17:50:00', 'ETÜT 4', 3),
(263, '1', '17:50:00', '18:00:00', 'TENEFFÜS', 3),
(264, '1', '18:00:00', '18:40:00', 'ETÜT 5', 3),
(265, '1', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 3),
(266, '1', '19:05:00', '19:45:00', 'ETÜT 6', 3),
(267, '1', '19:45:00', '21:00:00', 'KANTİN', 3),
(268, '1', '21:00:00', '21:30:00', 'YATSI NAMAZI', 3),
(269, '1', '21:30:00', '22:00:00', 'SERBEST', 3),
(270, '1', '22:00:00', '23:59:00', 'İSTİRAHAT', 3),
(271, '2', '06:30:00', '08:45:00', 'NAMAZA HAZIRLIK', 3),
(272, '2', '06:45:00', '07:00:00', 'SABAH NAMAZI', 3),
(273, '2', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 3),
(274, '2', '07:30:00', '07:45:00', 'DUŞ', 3),
(275, '2', '07:45:00', '08:15:00', 'KAHVALTI', 3),
(276, '2', '08:15:00', '09:10:00', 'DERS 1', 3),
(277, '2', '09:10:00', '09:20:00', 'TENEFFÜS', 3),
(278, '2', '09:20:00', '10:10:00', 'DERS 2', 3),
(279, '2', '10:10:00', '10:30:00', 'TEMİZLİK', 3),
(280, '2', '10:30:00', '13:30:00', 'EBA CANLI DERS', 3),
(281, '2', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 3),
(282, '2', '13:50:00', '14:10:00', 'EBA CANLI DERS', 3),
(283, '2', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 3),
(284, '2', '14:30:00', '15:30:00', 'ETÜT 1', 3),
(285, '2', '15:30:00', '15:45:00', 'TENEFFÜS', 3),
(286, '2', '15:45:00', '16:45:00', 'ETÜT 2', 3),
(287, '2', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 3),
(288, '2', '17:10:00', '17:50:00', 'ETÜT 4', 3),
(289, '2', '17:50:00', '18:00:00', 'TENEFFÜS', 3),
(290, '2', '18:00:00', '18:40:00', 'ETÜT 5', 3),
(291, '2', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 3),
(292, '2', '19:05:00', '19:45:00', 'ETÜT 6', 3),
(293, '2', '19:45:00', '21:00:00', 'KANTİN', 3),
(294, '2', '21:00:00', '21:30:00', 'YATSI NAMAZI', 3),
(295, '2', '21:30:00', '22:00:00', 'SERBEST', 3),
(296, '2', '22:00:00', '23:59:00', 'İSTİRAHAT', 3),
(297, '2', '23:59:00', '06:30:00', 'İSTİRAHAT', 3),
(298, '3', '00:00:00', '06:30:00', 'İSTİRAHAT', 3),
(299, '3', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 3),
(300, '3', '06:45:00', '08:00:00', 'SABAH NAMAZI', 3),
(301, '3', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 3),
(302, '3', '07:30:00', '07:45:00', 'DUŞ', 3),
(303, '3', '07:45:00', '08:15:00', 'KAHVALTI', 3),
(304, '3', '08:15:00', '09:10:00', 'DERS 1', 3),
(305, '3', '09:10:00', '09:20:00', 'TENEFFÜS', 3),
(306, '3', '09:20:00', '10:10:00', 'DERS 2', 3),
(307, '3', '10:10:00', '10:30:00', 'TEMİZLİK', 3),
(308, '3', '10:30:00', '13:30:00', 'EBA CANLI DERS', 3),
(309, '3', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 3),
(310, '3', '13:50:00', '14:10:00', 'EBA CANLI DERS', 3),
(311, '3', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 3),
(312, '3', '14:30:00', '15:30:00', 'ETÜT 1', 3),
(313, '3', '15:30:00', '15:45:00', 'TENEFFÜS', 3),
(314, '3', '15:45:00', '16:45:00', 'ETÜT 2', 3),
(315, '3', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 3),
(316, '3', '17:10:00', '17:50:00', 'ETÜT 4', 3),
(317, '3', '17:50:00', '18:00:00', 'TENEFFÜS', 3),
(318, '3', '18:00:00', '18:40:00', 'ETÜT 5', 3),
(319, '3', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 3),
(320, '3', '19:05:00', '19:45:00', 'ETÜT 6', 3),
(321, '3', '19:45:00', '21:00:00', 'KANTİN', 3),
(322, '3', '21:00:00', '21:30:00', 'YATSI NAMAZI', 3),
(323, '3', '21:30:00', '22:00:00', 'SERBEST', 3),
(324, '3', '22:00:00', '23:59:00', 'İSTİRAHAT', 3),
(325, '4', '00:00:00', '06:30:00', 'İSTİRAHAT', 3),
(326, '4', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 3),
(327, '4', '06:45:00', '07:00:00', 'SABAH NAMAZI', 3),
(328, '4', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 3),
(329, '4', '07:30:00', '07:45:00', 'DUŞ', 3),
(330, '4', '07:45:00', '08:15:00', 'KAHVALTI', 3),
(331, '4', '08:15:00', '09:10:00', 'DERS 1', 3),
(332, '4', '09:10:00', '09:20:00', 'TENEFFÜS', 3),
(333, '4', '09:20:00', '10:10:00', 'DERS 2', 3),
(334, '4', '10:10:00', '10:30:00', 'TEMİZLİK', 3),
(335, '4', '10:30:00', '13:30:00', 'EBA CANLI DERS', 3),
(336, '4', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 3),
(337, '4', '13:50:00', '14:10:00', 'EBA CANLI DERS', 3),
(338, '4', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 3),
(339, '4', '14:30:00', '15:30:00', 'ETÜT 1', 3),
(340, '4', '15:30:00', '15:45:00', 'TENEFFÜS', 3),
(341, '4', '15:45:00', '16:45:00', 'ETÜT 2', 3),
(342, '4', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 3),
(343, '4', '17:10:00', '17:50:00', 'ETÜT 4', 3),
(344, '4', '17:50:00', '18:00:00', 'TENEFFÜS', 3),
(345, '4', '18:00:00', '18:40:00', 'ETÜT 5', 3),
(346, '4', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 3),
(347, '4', '19:05:00', '19:45:00', 'ETÜT 6', 3),
(348, '4', '19:45:00', '21:00:00', 'KANTİN', 3),
(349, '4', '21:00:00', '21:30:00', 'YATSI NAMAZI', 3),
(350, '4', '21:30:00', '22:00:00', 'SERBEST', 3),
(351, '4', '22:00:00', '23:59:00', 'İSTİRAHAT', 3),
(352, '5', '00:00:00', '06:30:00', 'İSTİRAHAT', 3),
(353, '5', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 3),
(354, '5', '06:45:00', '07:00:00', 'SABAH NAMAZI', 3),
(355, '5', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 3),
(356, '5', '07:30:00', '07:45:00', 'DUŞ', 3),
(357, '5', '07:45:00', '08:15:00', 'KAHVALTI', 3),
(358, '5', '08:15:00', '09:10:00', 'DERS 1', 3),
(359, '5', '09:10:00', '09:20:00', 'TENEFFÜS', 3),
(360, '5', '09:20:00', '10:10:00', 'DERS 2', 3),
(361, '5', '10:10:00', '10:30:00', 'TEMİZLİK', 3),
(362, '5', '10:30:00', '13:30:00', 'EBA CANLI DERS', 3),
(363, '5', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 3),
(364, '5', '13:50:00', '14:10:00', 'EBA CANLI DERS', 3),
(365, '5', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 3),
(366, '5', '14:30:00', '15:30:00', 'ETÜT 1', 3),
(367, '5', '15:30:00', '15:45:00', 'TENEFFÜS', 3),
(368, '5', '15:45:00', '16:45:00', 'ETÜT 2', 3),
(369, '5', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 3),
(370, '5', '17:10:00', '17:50:00', 'ETÜT 4', 3),
(371, '5', '17:50:00', '18:00:00', 'TENEFFÜS', 3),
(372, '5', '18:00:00', '18:40:00', 'ETÜT 5', 3),
(373, '5', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 3),
(374, '5', '19:05:00', '19:45:00', 'ETÜT 6', 3),
(375, '5', '19:45:00', '21:00:00', 'KANTİN', 3),
(376, '5', '21:00:00', '21:30:00', 'YATSI NAMAZI', 3),
(377, '5', '21:30:00', '22:00:00', 'SERBEST', 3),
(378, '5', '22:00:00', '23:59:00', 'İSTİRAHAT', 3),
(379, '6', '00:00:00', '06:30:00', 'İSTİRAHAT', 3),
(380, '6', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 3),
(381, '6', '06:45:00', '07:00:00', 'SABAH NAMAZI', 3),
(382, '6', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 3),
(383, '6', '07:30:00', '07:45:00', 'DUŞ', 3),
(384, '6', '07:45:00', '08:15:00', 'KAHVALTI', 3),
(385, '6', '08:15:00', '09:10:00', 'DERS 1', 3),
(386, '6', '09:10:00', '09:20:00', 'TENEFFÜS', 3),
(387, '6', '09:20:00', '10:10:00', 'DERS 2', 3),
(388, '6', '10:10:00', '10:30:00', 'TEMİZLİK', 3),
(389, '6', '10:30:00', '13:30:00', 'EBA CANLI DERS', 3),
(390, '6', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 3),
(391, '6', '13:50:00', '14:10:00', 'EBA CANLI DERS', 3),
(392, '6', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 3),
(393, '6', '14:30:00', '15:30:00', 'ETÜT 1', 3),
(394, '6', '15:30:00', '15:45:00', 'TENEFFÜS', 3),
(395, '6', '15:45:00', '16:45:00', 'ETÜT 2', 3),
(396, '6', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 3),
(397, '6', '17:10:00', '17:50:00', 'ETÜT 4', 3),
(398, '6', '17:50:00', '18:00:00', 'TENEFFÜS', 3),
(399, '6', '18:00:00', '18:40:00', 'ETÜT 5', 3),
(400, '6', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 3),
(401, '6', '19:05:00', '19:45:00', 'ETÜT 6', 3),
(402, '6', '19:45:00', '21:00:00', 'KANTİN', 3),
(403, '6', '21:00:00', '21:30:00', 'YATSI NAMAZI', 3),
(404, '6', '21:30:00', '22:00:00', 'SERBEST', 3),
(405, '6', '22:00:00', '23:59:00', 'İSTİRAHAT son', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `id` mediumint(9) NOT NULL,
  `yol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`id`, `yol`) VALUES
(41, 'upload/img/slide/resim1.jpg'),
(47, 'upload/img/slide/resim2.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayac`
--

CREATE TABLE `sayac` (
  `id` mediumint(9) NOT NULL,
  `etkinlik` varchar(255) NOT NULL,
  `tarih` date NOT NULL,
  `saat` time NOT NULL,
  `yayin_tarih` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sayac`
--

INSERT INTO `sayac` (`id`, `etkinlik`, `tarih`, `saat`, `yayin_tarih`) VALUES
(4, 'Deneme1', '2020-11-22', '21:10:00', '2020-11-21'),
(5, 'Deneme2', '2020-11-22', '21:05:00', '2020-11-21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slide`
--

CREATE TABLE `slide` (
  `id` mediumint(9) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `metin` varchar(1000) NOT NULL,
  `tarih` date DEFAULT NULL,
  `resim_id` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `slide`
--

INSERT INTO `slide` (`id`, `baslik`, `metin`, `tarih`, `resim_id`) VALUES
(1, 'Sonuçlar', '1-Kaynarca 2-Ferhatlar 3-Süleymaniye 4-Dudullu 5-Atakent 6-Yamanevler', '2020-11-12', 41),
(2, 'What is Lorem Ipsum?', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-11-19', NULL),
(3, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2020-11-02', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sube`
--

CREATE TABLE `sube` (
  `id` smallint(6) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `adres` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sube`
--

INSERT INTO `sube` (`id`, `isim`, `adres`) VALUES
(1, 'Şube-1', 'Seyhan'),
(2, 'Şube-2', 'Sarıyer'),
(3, 'Sube-3', 'Ankara'),
(30, 'Şube-4', 'Ardahan'),
(34, 'Şube-5', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sube_duyuru`
--

CREATE TABLE `sube_duyuru` (
  `id` mediumint(9) NOT NULL,
  `sube_id` smallint(6) NOT NULL,
  `duyuru_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sube_duyuru`
--

INSERT INTO `sube_duyuru` (`id`, `sube_id`, `duyuru_id`) VALUES
(70, 1, 3),
(71, 3, 3),
(72, 1, 16),
(73, 3, 16),
(78, 1, 1),
(79, 2, 1),
(80, 3, 1),
(81, 1, 2),
(82, 30, 2),
(85, 1, 4),
(86, 3, 4),
(87, 30, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sube_sayac`
--

CREATE TABLE `sube_sayac` (
  `id` mediumint(9) NOT NULL,
  `sube_id` smallint(6) NOT NULL,
  `sayac_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sube_sayac`
--

INSERT INTO `sube_sayac` (`id`, `sube_id`, `sayac_id`) VALUES
(9, 1, 4),
(10, 2, 4),
(11, 3, 4),
(12, 30, 4),
(13, 1, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tercih`
--

CREATE TABLE `tercih` (
  `id` smallint(6) NOT NULL,
  `ozellik` varchar(100) NOT NULL,
  `deger` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tercih`
--

INSERT INTO `tercih` (`id`, `ozellik`, `deger`) VALUES
(1, 'marquee_hiz', 15),
(2, 'slide_hiz', 5000),
(3, 'yenile_hiz', 20000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `thumbnail`
--

CREATE TABLE `thumbnail` (
  `id` mediumint(9) NOT NULL,
  `yol` varchar(255) NOT NULL,
  `video_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video`
--

CREATE TABLE `video` (
  `id` mediumint(9) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `yol` varchar(1000) NOT NULL,
  `goster` tinyint(1) DEFAULT NULL,
  `kaynak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `video`
--

INSERT INTO `video` (`id`, `isim`, `yol`, `goster`, `kaynak`) VALUES
(50, 'deneme', 'https://drive.google.com/file/d/1y5efhVA_2NgOtXZ6gNGl7l8nQ3B1HkYf/preview', NULL, 'gdrive'),
(53, 'deneme3', 'https://www.youtube.com/embed/H90GFYTpFqE', 1, 'gdrive'),
(54, 'deneme4', 'https://www.youtube.com/embed/JxS5E-kZc2s', NULL, 'gdrive');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video_embed`
--

CREATE TABLE `video_embed` (
  `id` smallint(6) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `video_embed`
--

INSERT INTO `video_embed` (`id`, `link`) VALUES
(1, 'https://drive.google.com/file/d/1y5efhVA_2NgOtXZ6gNGl7l8nQ3B1HkYf/preview');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `css`
--
ALTER TABLE `css`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sube_id` (`sube_id`);

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sube_id` (`sube_id`);

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sayac`
--
ALTER TABLE `sayac`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resim_id` (`resim_id`);

--
-- Tablo için indeksler `sube`
--
ALTER TABLE `sube`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sube_duyuru`
--
ALTER TABLE `sube_duyuru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sube_id` (`sube_id`),
  ADD KEY `duyuru_id` (`duyuru_id`);

--
-- Tablo için indeksler `sube_sayac`
--
ALTER TABLE `sube_sayac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sube_id` (`sube_id`),
  ADD KEY `sayac_id` (`sayac_id`);

--
-- Tablo için indeksler `tercih`
--
ALTER TABLE `tercih`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id` (`video_id`);

--
-- Tablo için indeksler `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `video_embed`
--
ALTER TABLE `video_embed`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `css`
--
ALTER TABLE `css`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=973;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `sayac`
--
ALTER TABLE `sayac`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `slide`
--
ALTER TABLE `slide`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `sube`
--
ALTER TABLE `sube`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `sube_duyuru`
--
ALTER TABLE `sube_duyuru`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Tablo için AUTO_INCREMENT değeri `sube_sayac`
--
ALTER TABLE `sube_sayac`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `tercih`
--
ALTER TABLE `tercih`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `thumbnail`
--
ALTER TABLE `thumbnail`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `video`
--
ALTER TABLE `video`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Tablo için AUTO_INCREMENT değeri `video_embed`
--
ALTER TABLE `video_embed`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `css`
--
ALTER TABLE `css`
  ADD CONSTRAINT `css_ibfk_1` FOREIGN KEY (`sube_id`) REFERENCES `sube` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`sube_id`) REFERENCES `sube` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `slide_ibfk_1` FOREIGN KEY (`resim_id`) REFERENCES `resim` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sube_duyuru`
--
ALTER TABLE `sube_duyuru`
  ADD CONSTRAINT `sube_duyuru_ibfk_1` FOREIGN KEY (`duyuru_id`) REFERENCES `duyuru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sube_duyuru_ibfk_2` FOREIGN KEY (`sube_id`) REFERENCES `sube` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sube_sayac`
--
ALTER TABLE `sube_sayac`
  ADD CONSTRAINT `sube_sayac_ibfk_1` FOREIGN KEY (`sayac_id`) REFERENCES `sayac` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sube_sayac_ibfk_2` FOREIGN KEY (`sube_id`) REFERENCES `sube` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD CONSTRAINT `thumbnail_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
