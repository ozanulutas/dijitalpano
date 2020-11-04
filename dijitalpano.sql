-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 04 Kas 2020, 12:22:53
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
(2, '22 Ocak\'ta Abant gezisi yapılacaktır. Katılmak isteyenler sınıf öğretmenlerine başvuruda bulunabilir.', '2020-10-30', NULL, '1000-01-01', NULL),
(3, '8 Aralık tarihli deneme sınavının sonuçları katlardaki panolara asılmıştır.', '2020-10-28', NULL, '1000-01-01', NULL),
(4, '30 Ekim tarihinde yapılacak olan akşam etütü bir gün sonra (31 Ekim) yapılacaktır .', '2020-10-29', '00:00:00', '2020-10-31', '00:00:00'),
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
  `gun` tinyint(1) NOT NULL,
  `saat` time NOT NULL,
  `etkinlik` varchar(100) NOT NULL,
  `sube_id` smallint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `program`
--

INSERT INTO `program` (`id`, `gun`, `saat`, `etkinlik`, `sube_id`) VALUES
(1, 2, '22:11:00', 'Matz', 2),
(6, 2, '07:03:00', 'cvvcvc', 2),
(7, 3, '05:01:00', 'Bip', 2),
(16, 1, '22:22:00', 'asdaaa', 3),
(17, 3, '22:22:00', 'asd', 2),
(19, 0, '02:22:00', 'tatil', 2),
(25, 4, '03:05:00', 'Mahmut', 3),
(26, 4, '03:05:00', 'Mahmut', 3),
(27, 6, '23:04:00', 'Tatil matil yok', 2),
(28, 1, '05:03:00', 'Ekmek', 3),
(29, 1, '03:05:00', 'dsfds', 3),
(30, 1, '03:05:00', 'dsfds', 3),
(31, 2, '05:04:00', 'asd', 3);

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
(17, 'upload/img/slide/WhatsApp Image 2020-09-28 at 17.40.54.jpeg'),
(18, 'upload/img/slide/Ekran Görüntüsü 2020-09-16 13-46-39.png'),
(19, 'upload/img/slide/resimYok.png');

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
(1, 'Sonuçlar', '1-Kaynarca 2-Ferhatlar 3-Süleymaniye 4-Dudullu 5-Atakent 6-Yamanevler', '2020-11-02', 17),
(2, 'What is Lorem Ipsum?', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, NULL),
(3, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2020-11-02', 19),
(12, 'asd', 'asd', '2020-11-02', NULL);

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
(44, 2, 1),
(45, 3, 1),
(49, 3, 35),
(51, 2, 32);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
