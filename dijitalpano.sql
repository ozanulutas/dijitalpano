-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 Kas 2020, 19:14:47
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
(1, '5 Aralık Tarihinde 11. sınıflara deneme sınavı yapılacaktır.', '2020-10-28', '11:11:00', '2020-11-07', '00:00:00'),
(2, '22 Ocak\'ta Abant gezisi yapılacaktır. Katılmak isteyenler sınıf öğretmenlerine başvuruda bulunabilir.', '2020-10-30', NULL, '2020-11-05', NULL),
(3, '8 Aralık tarihli deneme sınavının sonuçları katlardaki panolara asılmıştır.', '2020-10-28', NULL, '2020-11-13', NULL),
(4, '30 Ekim tarihinde yapılacak olan akşam etütü bir gün sonra (31 Ekim) yapılacaktır .', '2020-10-29', '00:00:00', '2020-11-30', '00:00:00'),
(16, 'Duyuru-5', '2020-10-14', '00:00:00', '2020-10-21', '00:00:00'),
(32, 'Duyuru-6', '1000-01-01', '00:00:00', '1000-01-01', '00:00:00'),
(33, 'Duyuru-7', '1000-01-01', '00:00:00', '1000-01-01', '00:00:00'),
(34, 'Duyuru-8', '2020-10-30', NULL, '2020-11-08', NULL),
(35, 'Duyuru-9', '1000-01-01', NULL, '1000-01-01', NULL);

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
(1, 'admin', '.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `gun` varchar(10) NOT NULL,
  `saat` time NOT NULL,
  `etkinlik` varchar(100) NOT NULL,
  `sube_id` smallint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `program`
--

INSERT INTO `program` (`id`, `gun`, `saat`, `etkinlik`, `sube_id`) VALUES
(190, 'Pazartesi', '00:00:00', 'İSTİRAHAT', 3),
(191, 'Pazartesi', '06:30:00', 'NAMAZA HAZIRLIK', 3),
(192, 'Pazartesi', '06:45:00', 'SABAH NAMAZI', 3),
(193, 'Pazartesi', '07:00:00', 'YÜRÜÜYŞ', 3),
(194, 'Pazartesi', '07:30:00', 'DUŞ', 3),
(195, 'Pazartesi', '07:45:00', 'KAHVALTI', 3),
(196, 'Pazartesi', '08:15:00', 'DERS 1', 3),
(197, 'Pazartesi', '09:10:00', 'TENEFFÜS', 3),
(198, 'Pazartesi', '09:20:00', 'DERS 2', 3),
(199, 'Pazartesi', '10:10:00', 'TEMİZLİK', 3),
(200, 'Pazartesi', '10:30:00', 'EBA CANLI DERS', 3),
(201, 'Pazartesi', '13:30:00', 'ÖĞLE YEMEĞİ', 3),
(202, 'Pazartesi', '13:50:00', 'EBA CANLI DERS', 3),
(203, 'Pazartesi', '14:10:00', 'ÖĞLE NAMAZI', 3),
(204, 'Pazartesi', '14:30:00', 'ETÜT 1', 3),
(205, 'Pazartesi', '15:30:00', 'TENEFFÜS', 3),
(206, 'Pazartesi', '15:45:00', 'ETÜT 2', 3),
(207, 'Pazartesi', '16:45:00', 'İKİNDİ NAMAZI', 3),
(208, 'Pazartesi', '17:10:00', 'ETÜT 4', 3),
(209, 'Pazartesi', '17:50:00', 'TENEFFÜS', 3),
(210, 'Pazartesi', '18:00:00', 'ETÜT 5', 3),
(211, 'Pazartesi', '18:40:00', 'AKŞAM NAMAZI', 3),
(212, 'Pazartesi', '19:05:00', 'ETÜT 6', 3),
(213, 'Pazartesi', '19:45:00', 'KANTİN', 3),
(214, 'Pazartesi', '21:00:00', 'YATSI NAMAZI', 3),
(215, 'Pazartesi', '21:30:00', 'SERBEST', 3),
(216, 'Pazartesi', '22:00:00', 'İSTİRAHAT', 3),
(217, 'Salı', '00:00:00', 'İSTİRAHAT', 3),
(218, 'Salı', '06:30:00', 'NAMAZA HAZIRLIK', 3),
(219, 'Salı', '06:45:00', 'SABAH NAMAZI', 3),
(220, 'Salı', '07:00:00', 'YÜRÜÜYŞ', 3),
(221, 'Salı', '07:30:00', 'DUŞ', 3),
(222, 'Salı', '07:45:00', 'KAHVALTI', 3),
(223, 'Salı', '08:15:00', 'DERS 1', 3),
(224, 'Salı', '09:10:00', 'TENEFFÜS', 3),
(225, 'Salı', '09:20:00', 'DERS 2', 3),
(226, 'Salı', '10:10:00', 'TEMİZLİK', 3),
(227, 'Salı', '10:30:00', 'EBA CANLI DERS', 3),
(228, 'Salı', '13:30:00', 'ÖĞLE YEMEĞİ', 3),
(229, 'Salı', '13:50:00', 'EBA CANLI DERS', 3),
(230, 'Salı', '14:10:00', 'ÖĞLE NAMAZI', 3),
(231, 'Salı', '14:30:00', 'ETÜT 1', 3),
(232, 'Salı', '15:30:00', 'TENEFFÜS', 3),
(233, 'Salı', '15:45:00', 'ETÜT 2', 3),
(234, 'Salı', '16:45:00', 'İKİNDİ NAMAZI', 3),
(235, 'Salı', '17:10:00', 'ETÜT 4', 3),
(236, 'Salı', '17:50:00', 'TENEFFÜS', 3),
(237, 'Salı', '18:00:00', 'ETÜT 5', 3),
(238, 'Salı', '18:40:00', 'AKŞAM NAMAZI', 3),
(239, 'Salı', '19:05:00', 'ETÜT 6', 3),
(240, 'Salı', '19:45:00', 'KANTİN', 3),
(241, 'Salı', '21:00:00', 'YATSI NAMAZI', 3),
(242, 'Salı', '21:30:00', 'SERBEST', 3),
(243, 'Salı', '22:00:00', 'İSTİRAHAT', 3),
(244, 'Çarşamba', '00:00:00', 'İSTİRAHAT', 3),
(245, 'Çarşamba', '06:30:00', 'NAMAZA HAZIRLIK', 3),
(246, 'Çarşamba', '06:45:00', 'SABAH NAMAZI', 3),
(247, 'Çarşamba', '07:00:00', 'YÜRÜÜYŞ', 3),
(248, 'Çarşamba', '07:30:00', 'DUŞ', 3),
(249, 'Çarşamba', '07:45:00', 'KAHVALTI', 3),
(250, 'Çarşamba', '08:15:00', 'DERS 1', 3),
(251, 'Çarşamba', '09:10:00', 'TENEFFÜS', 3),
(252, 'Çarşamba', '09:20:00', 'DERS 2', 3),
(253, 'Çarşamba', '10:10:00', 'TEMİZLİK', 3),
(254, 'Çarşamba', '10:30:00', 'EBA CANLI DERS', 3),
(255, 'Çarşamba', '13:30:00', 'ÖĞLE YEMEĞİ', 3),
(256, 'Çarşamba', '13:50:00', 'EBA CANLI DERS', 3),
(257, 'Çarşamba', '14:10:00', 'ÖĞLE NAMAZI', 3),
(258, 'Çarşamba', '14:30:00', 'ETÜT 1', 3),
(259, 'Çarşamba', '15:30:00', 'TENEFFÜS', 3),
(260, 'Çarşamba', '15:45:00', 'ETÜT 2', 3),
(261, 'Çarşamba', '16:45:00', 'İKİNDİ NAMAZI', 3),
(262, 'Çarşamba', '17:10:00', 'ETÜT 4', 3),
(263, 'Çarşamba', '17:50:00', 'TENEFFÜS', 3),
(264, 'Çarşamba', '18:00:00', 'ETÜT 5', 3),
(265, 'Çarşamba', '18:40:00', 'AKŞAM NAMAZI', 3),
(266, 'Çarşamba', '19:05:00', 'ETÜT 6', 3),
(267, 'Çarşamba', '19:45:00', 'KANTİN', 3),
(268, 'Çarşamba', '21:00:00', 'YATSI NAMAZI', 3),
(269, 'Çarşamba', '21:30:00', 'SERBEST', 3),
(270, 'Çarşamba', '22:00:00', 'İSTİRAHAT', 3),
(271, 'Perşembe', '00:00:00', 'İSTİRAHAT', 3),
(272, 'Perşembe', '06:30:00', 'NAMAZA HAZIRLIK', 3),
(273, 'Perşembe', '06:45:00', 'SABAH NAMAZI', 3),
(274, 'Perşembe', '07:00:00', 'YÜRÜÜYŞ', 3),
(275, 'Perşembe', '07:30:00', 'DUŞ', 3),
(276, 'Perşembe', '07:45:00', 'KAHVALTI', 3),
(277, 'Perşembe', '08:15:00', 'DERS 1', 3),
(278, 'Perşembe', '09:10:00', 'TENEFFÜS', 3),
(279, 'Perşembe', '09:20:00', 'DERS 2', 3),
(280, 'Perşembe', '10:10:00', 'TEMİZLİK', 3),
(281, 'Perşembe', '10:30:00', 'EBA CANLI DERS', 3),
(282, 'Perşembe', '13:30:00', 'ÖĞLE YEMEĞİ', 3),
(283, 'Perşembe', '13:50:00', 'EBA CANLI DERS', 3),
(284, 'Perşembe', '14:10:00', 'ÖĞLE NAMAZI', 3),
(285, 'Perşembe', '14:30:00', 'ETÜT 1', 3),
(286, 'Perşembe', '15:30:00', 'TENEFFÜS', 3),
(287, 'Perşembe', '15:45:00', 'ETÜT 2', 3),
(288, 'Perşembe', '16:45:00', 'İKİNDİ NAMAZI', 3),
(289, 'Perşembe', '17:10:00', 'ETÜT 4', 3),
(290, 'Perşembe', '17:50:00', 'TENEFFÜS', 3),
(291, 'Perşembe', '18:00:00', 'ETÜT 5', 3),
(292, 'Perşembe', '18:40:00', 'AKŞAM NAMAZI', 3),
(293, 'Perşembe', '19:05:00', 'ETÜT 6', 3),
(294, 'Perşembe', '19:45:00', 'KANTİN', 3),
(295, 'Perşembe', '21:00:00', 'YATSI NAMAZI', 3),
(296, 'Perşembe', '21:30:00', 'SERBEST', 3),
(297, 'Perşembe', '22:00:00', 'İSTİRAHAT', 3),
(298, 'Cuma', '00:00:00', 'İSTİRAHAT', 3),
(299, 'Cuma', '06:30:00', 'NAMAZA HAZIRLIK', 3),
(300, 'Cuma', '06:45:00', 'SABAH NAMAZI', 3),
(301, 'Cuma', '07:00:00', 'YÜRÜÜYŞ', 3),
(302, 'Cuma', '07:30:00', 'DUŞ', 3),
(303, 'Cuma', '07:45:00', 'KAHVALTI', 3),
(304, 'Cuma', '08:15:00', 'DERS 1', 3),
(305, 'Cuma', '09:10:00', 'TENEFFÜS', 3),
(306, 'Cuma', '09:20:00', 'DERS 2', 3),
(307, 'Cuma', '10:10:00', 'TEMİZLİK', 3),
(308, 'Cuma', '10:30:00', 'EBA CANLI DERS', 3),
(309, 'Cuma', '13:30:00', 'ÖĞLE YEMEĞİ', 3),
(310, 'Cuma', '13:50:00', 'EBA CANLI DERS', 3),
(311, 'Cuma', '14:10:00', 'ÖĞLE NAMAZI', 3),
(312, 'Cuma', '14:30:00', 'ETÜT 1', 3),
(313, 'Cuma', '15:30:00', 'TENEFFÜS', 3),
(314, 'Cuma', '15:45:00', 'ETÜT 2', 3),
(315, 'Cuma', '16:45:00', 'İKİNDİ NAMAZI', 3),
(316, 'Cuma', '17:10:00', 'ETÜT 4', 3),
(317, 'Cuma', '17:50:00', 'TENEFFÜS', 3),
(318, 'Cuma', '18:00:00', 'ETÜT 5', 3),
(319, 'Cuma', '18:40:00', 'AKŞAM NAMAZI', 3),
(320, 'Cuma', '19:05:00', 'ETÜT 6', 3),
(321, 'Cuma', '19:45:00', 'KANTİN', 3),
(322, 'Cuma', '21:00:00', 'YATSI NAMAZI', 3),
(323, 'Cuma', '21:30:00', 'SERBEST', 3),
(324, 'Cuma', '22:00:00', 'İSTİRAHAT', 3),
(325, 'Cumartesi', '00:00:00', 'İSTİRAHAT', 3),
(326, 'Cumartesi', '06:30:00', 'NAMAZA HAZIRLIK', 3),
(327, 'Cumartesi', '06:45:00', 'SABAH NAMAZI', 3),
(328, 'Cumartesi', '07:00:00', 'YÜRÜÜYŞ', 3),
(329, 'Cumartesi', '07:30:00', 'DUŞ', 3),
(330, 'Cumartesi', '07:45:00', 'KAHVALTI', 3),
(331, 'Cumartesi', '08:15:00', 'DERS 1', 3),
(332, 'Cumartesi', '09:10:00', 'TENEFFÜS', 3),
(333, 'Cumartesi', '09:20:00', 'DERS 2', 3),
(334, 'Cumartesi', '10:10:00', 'TEMİZLİK', 3),
(335, 'Cumartesi', '10:30:00', 'EBA CANLI DERS', 3),
(336, 'Cumartesi', '13:30:00', 'ÖĞLE YEMEĞİ', 3),
(337, 'Cumartesi', '13:50:00', 'EBA CANLI DERS', 3),
(338, 'Cumartesi', '14:10:00', 'ÖĞLE NAMAZI', 3),
(339, 'Cumartesi', '14:30:00', 'ETÜT 1', 3),
(340, 'Cumartesi', '15:30:00', 'TENEFFÜS', 3),
(341, 'Cumartesi', '15:45:00', 'ETÜT 2', 3),
(342, 'Cumartesi', '16:45:00', 'İKİNDİ NAMAZI', 3),
(343, 'Cumartesi', '17:10:00', 'ETÜT 4', 3),
(344, 'Cumartesi', '17:50:00', 'TENEFFÜS', 3),
(345, 'Cumartesi', '18:00:00', 'ETÜT 5', 3),
(346, 'Cumartesi', '18:40:00', 'AKŞAM NAMAZI', 3),
(347, 'Cumartesi', '19:05:00', 'ETÜT 6', 3),
(348, 'Cumartesi', '19:45:00', 'KANTİN', 3),
(349, 'Cumartesi', '21:00:00', 'YATSI NAMAZI', 3),
(350, 'Cumartesi', '21:30:00', 'SERBEST', 3),
(351, 'Cumartesi', '22:00:00', 'İSTİRAHAT', 3),
(352, 'Pazar', '00:00:00', 'İSTİRAHAT', 3),
(353, 'Pazar', '06:30:00', 'NAMAZA HAZIRLIK', 3),
(354, 'Pazar', '06:45:00', 'SABAH NAMAZI', 3),
(355, 'Pazar', '07:00:00', 'YÜRÜÜYŞ', 3),
(356, 'Pazar', '07:30:00', 'DUŞ', 3),
(357, 'Pazar', '07:45:00', 'KAHVALTI', 3),
(358, 'Pazar', '08:15:00', 'DERS 1', 3),
(359, 'Pazar', '09:10:00', 'TENEFFÜS', 3),
(360, 'Pazar', '09:20:00', 'DERS 2', 3),
(361, 'Pazar', '10:10:00', 'TEMİZLİK', 3),
(362, 'Pazar', '10:30:00', 'EBA CANLI DERS', 3),
(363, 'Pazar', '13:30:00', 'ÖĞLE YEMEĞİ', 3),
(364, 'Pazar', '13:50:00', 'EBA CANLI DERS', 3),
(365, 'Pazar', '14:10:00', 'ÖĞLE NAMAZI', 3),
(366, 'Pazar', '14:30:00', 'ETÜT 1', 3),
(367, 'Pazar', '15:30:00', 'TENEFFÜS', 3),
(368, 'Pazar', '15:45:00', 'ETÜT 2', 3),
(369, 'Pazar', '16:45:00', 'İKİNDİ NAMAZI', 3),
(370, 'Pazar', '17:10:00', 'ETÜT 4', 3),
(371, 'Pazar', '17:50:00', 'TENEFFÜS', 3),
(372, 'Pazar', '18:00:00', 'ETÜT 5', 3),
(373, 'Pazar', '18:40:00', 'AKŞAM NAMAZI', 3),
(374, 'Pazar', '19:05:00', 'ETÜT 6', 3),
(375, 'Pazar', '19:45:00', 'KANTİN', 3),
(376, 'Pazar', '21:00:00', 'YATSI NAMAZI', 3),
(377, 'Pazar', '21:30:00', 'SERBEST', 3),
(378, 'Pazar', '22:00:00', 'İSTİRAHAT son', 3),
(568, 'Pazartesi', '00:00:00', 'İSTİRAHAT', 1),
(569, 'Pazartesi', '06:30:00', 'NAMAZA HAZIRLIK', 1),
(570, 'Pazartesi', '06:45:00', 'SABAH NAMAZI', 1),
(571, 'Pazartesi', '07:00:00', 'YÜRÜÜYŞ', 1),
(572, 'Pazartesi', '07:30:00', 'DUŞ', 1),
(573, 'Pazartesi', '07:45:00', 'KAHVALTI', 1),
(574, 'Pazartesi', '08:15:00', 'DERS 1', 1),
(575, 'Pazartesi', '09:10:00', 'TENEFFÜS', 1),
(576, 'Pazartesi', '09:20:00', 'DERS 2', 1),
(577, 'Pazartesi', '10:10:00', 'TEMİZLİK', 1),
(578, 'Pazartesi', '10:30:00', 'EBA CANLI DERS', 1),
(579, 'Pazartesi', '13:30:00', 'ÖĞLE YEMEĞİ', 1),
(580, 'Pazartesi', '13:50:00', 'EBA CANLI DERS', 1),
(581, 'Pazartesi', '14:10:00', 'ÖĞLE NAMAZI', 1),
(582, 'Pazartesi', '14:30:00', 'ETÜT 1', 1),
(583, 'Pazartesi', '15:30:00', 'TENEFFÜS', 1),
(584, 'Pazartesi', '15:45:00', 'ETÜT 2', 1),
(585, 'Pazartesi', '16:45:00', 'İKİNDİ NAMAZI', 1),
(586, 'Pazartesi', '17:10:00', 'ETÜT 4', 1),
(587, 'Pazartesi', '17:50:00', 'TENEFFÜS', 1),
(588, 'Pazartesi', '18:00:00', 'ETÜT 5', 1),
(589, 'Pazartesi', '18:40:00', 'AKŞAM NAMAZI', 1),
(590, 'Pazartesi', '19:05:00', 'ETÜT 6', 1),
(591, 'Pazartesi', '19:45:00', 'KANTİN', 1),
(592, 'Pazartesi', '21:00:00', 'YATSI NAMAZI', 1),
(593, 'Pazartesi', '21:30:00', 'SERBEST', 1),
(594, 'Pazartesi', '22:00:00', 'İSTİRAHAT', 1),
(595, 'Salı', '00:00:00', 'İSTİRAHAT', 1),
(596, 'Salı', '06:30:00', 'NAMAZA HAZIRLIK', 1),
(597, 'Salı', '06:45:00', 'SABAH NAMAZI', 1),
(598, 'Salı', '07:00:00', 'YÜRÜÜYŞ', 1),
(599, 'Salı', '07:30:00', 'DUŞ', 1),
(600, 'Salı', '07:45:00', 'KAHVALTI', 1),
(601, 'Salı', '08:15:00', 'DERS 1', 1),
(602, 'Salı', '09:10:00', 'TENEFFÜS', 1),
(603, 'Salı', '09:20:00', 'DERS 2', 1),
(604, 'Salı', '10:10:00', 'TEMİZLİK', 1),
(605, 'Salı', '10:30:00', 'EBA CANLI DERS', 1),
(606, 'Salı', '13:30:00', 'ÖĞLE YEMEĞİ', 1),
(607, 'Salı', '13:50:00', 'EBA CANLI DERS', 1),
(608, 'Salı', '14:10:00', 'ÖĞLE NAMAZI', 1),
(609, 'Salı', '14:30:00', 'ETÜT 1', 1),
(610, 'Salı', '15:30:00', 'TENEFFÜS', 1),
(611, 'Salı', '15:45:00', 'ETÜT 2', 1),
(612, 'Salı', '16:45:00', 'İKİNDİ NAMAZI', 1),
(613, 'Salı', '17:10:00', 'ETÜT 4', 1),
(614, 'Salı', '17:50:00', 'TENEFFÜS', 1),
(615, 'Salı', '18:00:00', 'ETÜT 5', 1),
(616, 'Salı', '18:40:00', 'AKŞAM NAMAZI', 1),
(617, 'Salı', '19:05:00', 'ETÜT 6', 1),
(618, 'Salı', '19:45:00', 'KANTİN', 1),
(619, 'Salı', '21:00:00', 'YATSI NAMAZI', 1),
(620, 'Salı', '21:30:00', 'SERBEST', 1),
(621, 'Salı', '22:00:00', 'İSTİRAHAT', 1),
(622, 'Çarşamba', '00:00:00', 'İSTİRAHAT', 1),
(623, 'Çarşamba', '06:30:00', 'NAMAZA HAZIRLIK', 1),
(624, 'Çarşamba', '06:45:00', 'SABAH NAMAZI', 1),
(625, 'Çarşamba', '07:00:00', 'YÜRÜÜYŞ', 1),
(626, 'Çarşamba', '07:30:00', 'DUŞ', 1),
(627, 'Çarşamba', '07:45:00', 'KAHVALTI', 1),
(628, 'Çarşamba', '08:15:00', 'DERS 1', 1),
(629, 'Çarşamba', '09:10:00', 'TENEFFÜS', 1),
(630, 'Çarşamba', '09:20:00', 'DERS 2', 1),
(631, 'Çarşamba', '10:10:00', 'TEMİZLİK', 1),
(632, 'Çarşamba', '10:30:00', 'EBA CANLI DERS', 1),
(633, 'Çarşamba', '13:30:00', 'ÖĞLE YEMEĞİ', 1),
(634, 'Çarşamba', '13:50:00', 'EBA CANLI DERS', 1),
(635, 'Çarşamba', '14:10:00', 'ÖĞLE NAMAZI', 1),
(636, 'Çarşamba', '14:30:00', 'ETÜT 1', 1),
(637, 'Çarşamba', '15:30:00', 'TENEFFÜS', 1),
(638, 'Çarşamba', '15:45:00', 'ETÜT 2', 1),
(639, 'Çarşamba', '16:45:00', 'İKİNDİ NAMAZI', 1),
(640, 'Çarşamba', '17:10:00', 'ETÜT 4', 1),
(641, 'Çarşamba', '17:50:00', 'TENEFFÜS', 1),
(642, 'Çarşamba', '18:00:00', 'ETÜT 5', 1),
(643, 'Çarşamba', '18:40:00', 'AKŞAM NAMAZI', 1),
(644, 'Çarşamba', '19:05:00', 'ETÜT 6', 1),
(645, 'Çarşamba', '19:45:00', 'KANTİN', 1),
(646, 'Çarşamba', '21:00:00', 'YATSI NAMAZI', 1),
(647, 'Çarşamba', '21:30:00', 'SERBEST', 1),
(648, 'Çarşamba', '22:00:00', 'İSTİRAHAT', 1),
(649, 'Perşembe', '00:00:00', 'İSTİRAHAT', 1),
(650, 'Perşembe', '06:30:00', 'NAMAZA HAZIRLIK', 1),
(651, 'Perşembe', '06:45:00', 'SABAH NAMAZI', 1),
(652, 'Perşembe', '07:00:00', 'YÜRÜÜYŞ', 1),
(653, 'Perşembe', '07:30:00', 'DUŞ', 1),
(654, 'Perşembe', '07:45:00', 'KAHVALTI', 1),
(655, 'Perşembe', '08:15:00', 'DERS 1', 1),
(656, 'Perşembe', '09:10:00', 'TENEFFÜS', 1),
(657, 'Perşembe', '09:20:00', 'DERS 2', 1),
(658, 'Perşembe', '10:10:00', 'TEMİZLİK', 1),
(659, 'Perşembe', '10:30:00', 'EBA CANLI DERS', 1),
(660, 'Perşembe', '13:30:00', 'ÖĞLE YEMEĞİ', 1),
(661, 'Perşembe', '13:50:00', 'EBA CANLI DERS', 1),
(662, 'Perşembe', '14:10:00', 'ÖĞLE NAMAZI', 1),
(663, 'Perşembe', '14:30:00', 'ETÜT 1', 1),
(664, 'Perşembe', '15:30:00', 'TENEFFÜS', 1),
(665, 'Perşembe', '15:45:00', 'ETÜT 2', 1),
(666, 'Perşembe', '16:45:00', 'İKİNDİ NAMAZI', 1),
(667, 'Perşembe', '17:10:00', 'ETÜT 4', 1),
(668, 'Perşembe', '17:50:00', 'TENEFFÜS', 1),
(669, 'Perşembe', '18:00:00', 'ETÜT 5', 1),
(670, 'Perşembe', '18:40:00', 'AKŞAM NAMAZI', 1),
(671, 'Perşembe', '19:05:00', 'ETÜT 6', 1),
(672, 'Perşembe', '19:45:00', 'KANTİN', 1),
(673, 'Perşembe', '21:00:00', 'YATSI NAMAZI', 1),
(674, 'Perşembe', '21:30:00', 'SERBEST', 1),
(675, 'Perşembe', '22:00:00', 'İSTİRAHAT', 1),
(676, 'Cuma', '00:00:00', 'İSTİRAHAT', 1),
(677, 'Cuma', '06:30:00', 'NAMAZA HAZIRLIK', 1),
(678, 'Cuma', '06:45:00', 'SABAH NAMAZI', 1),
(679, 'Cuma', '07:00:00', 'YÜRÜÜYŞ', 1),
(680, 'Cuma', '07:30:00', 'DUŞ', 1),
(681, 'Cuma', '07:45:00', 'KAHVALTI', 1),
(682, 'Cuma', '08:15:00', 'DERS 1', 1),
(683, 'Cuma', '09:10:00', 'TENEFFÜS', 1),
(684, 'Cuma', '09:20:00', 'DERS 2', 1),
(685, 'Cuma', '10:10:00', 'TEMİZLİK', 1),
(686, 'Cuma', '10:30:00', 'EBA CANLI DERS', 1),
(687, 'Cuma', '13:30:00', 'ÖĞLE YEMEĞİ', 1),
(688, 'Cuma', '13:50:00', 'EBA CANLI DERS', 1),
(689, 'Cuma', '14:10:00', 'ÖĞLE NAMAZI', 1),
(690, 'Cuma', '14:30:00', 'ETÜT 1', 1),
(691, 'Cuma', '15:30:00', 'TENEFFÜS', 1),
(692, 'Cuma', '15:45:00', 'ETÜT 2', 1),
(693, 'Cuma', '16:45:00', 'İKİNDİ NAMAZI', 1),
(694, 'Cuma', '17:10:00', 'ETÜT 4', 1),
(695, 'Cuma', '17:50:00', 'TENEFFÜS', 1),
(696, 'Cuma', '18:00:00', 'ETÜT 5', 1),
(697, 'Cuma', '18:40:00', 'AKŞAM NAMAZI', 1),
(698, 'Cuma', '19:05:00', 'ETÜT 6', 1),
(699, 'Cuma', '19:45:00', 'KANTİN', 1),
(700, 'Cuma', '21:00:00', 'YATSI NAMAZI', 1),
(701, 'Cuma', '21:30:00', 'SERBEST', 1),
(702, 'Cuma', '22:00:00', 'İSTİRAHAT', 1),
(703, 'Cumartesi', '00:00:00', 'İSTİRAHAT', 1),
(704, 'Cumartesi', '06:30:00', 'NAMAZA HAZIRLIK', 1),
(705, 'Cumartesi', '06:45:00', 'SABAH NAMAZI', 1),
(706, 'Cumartesi', '07:00:00', 'YÜRÜÜYŞ', 1),
(707, 'Cumartesi', '07:30:00', 'DUŞ', 1),
(708, 'Cumartesi', '07:45:00', 'KAHVALTI', 1),
(709, 'Cumartesi', '08:15:00', 'DERS 1', 1),
(710, 'Cumartesi', '09:10:00', 'TENEFFÜS', 1),
(711, 'Cumartesi', '09:20:00', 'DERS 2', 1),
(712, 'Cumartesi', '10:10:00', 'TEMİZLİK', 1),
(713, 'Cumartesi', '10:30:00', 'EBA CANLI DERS', 1),
(714, 'Cumartesi', '13:30:00', 'ÖĞLE YEMEĞİ', 1),
(715, 'Cumartesi', '13:50:00', 'EBA CANLI DERS', 1),
(716, 'Cumartesi', '14:10:00', 'ÖĞLE NAMAZI', 1),
(717, 'Cumartesi', '14:30:00', 'ETÜT 1', 1),
(718, 'Cumartesi', '15:30:00', 'TENEFFÜS', 1),
(719, 'Cumartesi', '15:45:00', 'ETÜT 2', 1),
(720, 'Cumartesi', '16:45:00', 'İKİNDİ NAMAZI', 1),
(721, 'Cumartesi', '17:10:00', 'ETÜT 4', 1),
(722, 'Cumartesi', '17:50:00', 'TENEFFÜS', 1),
(723, 'Cumartesi', '18:00:00', 'ETÜT 5', 1),
(724, 'Cumartesi', '18:40:00', 'AKŞAM NAMAZI', 1),
(725, 'Cumartesi', '19:05:00', 'ETÜT 6', 1),
(726, 'Cumartesi', '19:45:00', 'KANTİN', 1),
(727, 'Cumartesi', '21:00:00', 'YATSI NAMAZI', 1),
(728, 'Cumartesi', '21:30:00', 'SERBEST', 1),
(729, 'Cumartesi', '22:00:00', 'İSTİRAHAT', 1),
(730, 'Pazar', '00:00:00', 'İSTİRAHAT', 1),
(731, 'Pazar', '06:30:00', 'NAMAZA HAZIRLIK', 1),
(732, 'Pazar', '06:45:00', 'SABAH NAMAZI', 1),
(733, 'Pazar', '07:00:00', 'YÜRÜÜYŞ', 1),
(734, 'Pazar', '07:30:00', 'DUŞ', 1),
(735, 'Pazar', '07:45:00', 'KAHVALTI', 1),
(736, 'Pazar', '08:15:00', 'DERS 1', 1),
(737, 'Pazar', '09:10:00', 'TENEFFÜS', 1),
(738, 'Pazar', '09:20:00', 'DERS 2', 1),
(739, 'Pazar', '10:10:00', 'TEMİZLİK', 1),
(740, 'Pazar', '10:30:00', 'EBA CANLI DERS', 1),
(741, 'Pazar', '13:30:00', 'ÖĞLE YEMEĞİ', 1),
(742, 'Pazar', '13:50:00', 'EBA CANLI DERS', 1),
(743, 'Pazar', '14:10:00', 'ÖĞLE NAMAZI', 1),
(744, 'Pazar', '14:30:00', 'ETÜT 1', 1),
(745, 'Pazar', '15:30:00', 'TENEFFÜS', 1),
(746, 'Pazar', '15:45:00', 'ETÜT 2', 1),
(747, 'Pazar', '16:45:00', 'İKİNDİ NAMAZI', 1),
(748, 'Pazar', '17:10:00', 'ETÜT 4', 1),
(749, 'Pazar', '17:50:00', 'TENEFFÜS', 1),
(750, 'Pazar', '18:00:00', 'ETÜT 5', 1),
(751, 'Pazar', '18:40:00', 'AKŞAM NAMAZI', 1),
(752, 'Pazar', '19:05:00', 'ETÜT 6', 1),
(753, 'Pazar', '19:45:00', 'KANTİN', 1),
(754, 'Pazar', '21:00:00', 'YATSI NAMAZI', 1),
(755, 'Pazar', '21:30:00', 'SERBEST', 1),
(756, 'Pazar', '22:00:00', 'İSTİRAHAT son', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `id` mediumint(9) NOT NULL,
  `yol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Sonuçlar', '1-Kaynarca 2-Ferhatlar 3-Süleymaniye 4-Dudullu 5-Atakent 6-Yamanevler', '2020-11-05', NULL),
(2, 'What is Lorem Ipsum?', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-11-05', NULL),
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
(4, 'Sube-4', 'Tekirdağ');

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
(2, 1, 2),
(3, 1, 3),
(4, 2, 3),
(5, 3, 3),
(6, 4, 3),
(8, 4, 4),
(9, 3, 4),
(49, 3, 35),
(51, 2, 32),
(56, 1, 1),
(57, 2, 1),
(58, 3, 1),
(59, 4, 1);

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
  `yol` varchar(255) NOT NULL,
  `goster` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

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
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=757;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `slide`
--
ALTER TABLE `slide`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `sube`
--
ALTER TABLE `sube`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `sube_duyuru`
--
ALTER TABLE `sube_duyuru`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `thumbnail`
--
ALTER TABLE `thumbnail`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `video`
--
ALTER TABLE `video`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

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
-- Tablo kısıtlamaları `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD CONSTRAINT `thumbnail_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
