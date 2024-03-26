-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 28 Ara 2023, 18:01:26
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `magazin`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

DROP TABLE IF EXISTS `haberler`;
CREATE TABLE IF NOT EXISTS `haberler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `sef` varchar(250) NOT NULL,
  `resim` varchar(250) NOT NULL,
  `tumb` varchar(250) NOT NULL,
  `mini` varchar(250) NOT NULL,
  `katID` int NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `hit` int NOT NULL,
  `durum` int NOT NULL,
  `yorum` int NOT NULL,
  `icerik` longtext NOT NULL,
  `sondakika` int NOT NULL,
  `tarih` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `title`, `sef`, `resim`, `tumb`, `mini`, `katID`, `kategori`, `hit`, `durum`, `yorum`, `icerik`, `sondakika`, `tarih`) VALUES
(3, 'Aleyna Nur Karanın Beklenmedik Başarısı: İnternet Programcılığı Dersinden 70 Alarak Şaşırttı!', 'aleyna-nur-karanin-beklenmedik-basarisi-internet-programciligi-dersinden-70-alarak-sasirtti', 'assets/front/images/haber/bed14f5e37b822deb2ff470511773ba3.png', 'assets/front/images/haber/tmb/bed14f5e37b822deb2ff470511773ba3.png', 'assets/front/images/haber/mini/bed14f5e37b822deb2ff470511773ba3.png', 17, 'Magazin', 0, 1, 1, '<p>D&uuml;n sabah, internet programcılığı dersinden beklenenin &uuml;zerinde bir not alan Aleyna Nur Kara, sınıfta şaşkınlık yarattı. Başlangı&ccedil;ta 30 almayı uman gen&ccedil; programcı adayı, sınav sonu&ccedil;larını &ouml;ğrenince b&uuml;y&uuml;k bir s&uuml;rprizle karşılaştı: tam 70 almıştı!</p>\r\n\r\n<p>Kendisine y&ouml;neltilen soruları yanıtlamakta zorlanan Aleyna Nur Kara, bu beklenmedik başarı karşısında şaşkınlığını gizleyemedi. Yakın &ccedil;evresine duyduğu sevin&ccedil;, adeta havalara u&ccedil;masına sebep oldu.</p>\r\n\r\n<p>Sınav sonu&ccedil;larıyla ilgili konuşan Kara, &quot;Ders boyunca &ccedil;ok &ccedil;alıştım ve ger&ccedil;ekten zorlandım. Beklentimin &uuml;zerinde bir not almak inanılmaz bir duygu. Bu benim i&ccedil;in b&uuml;y&uuml;k bir motivasyon kaynağı oldu.&quot; dedi.</p>\r\n\r\n<p>Aleyna Nur Kara&#39;nın &ouml;ğretmenleri ise gen&ccedil; &ouml;ğrencilerinin bu t&uuml;r başarıları g&ouml;rmekten b&uuml;y&uuml;k memnuniyet duyduklarını belirtti. &Ouml;ğrencilerin azmi ve gayretinin, beklenenden daha iyi sonu&ccedil;lar elde etmelerine yol a&ccedil;tığını vurguladılar.</p>\r\n\r\n<p>Kara&#39;nın bu beklenmedik başarısı, gen&ccedil; neslin &ccedil;alışma azmi ve hedeflere odaklanma konusundaki kararlılığını bir kez daha g&ouml;zler &ouml;n&uuml;ne serdi. Kendisine tebrikler yağarken, başarılı gen&ccedil; programcı adayının gelecekteki hedefleri merak konusu oldu.</p>\r\n', 1, '2023-12-28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `sef` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `title`, `sef`) VALUES
(17, 'Magazin', 'magazin'),
(18, 'Sağlık', 'saglik'),
(19, 'Spor', 'spor'),
(20, 'Siyaset', 'siyaset'),
(21, 'Kültür', 'kultur');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_ayarlari`
--

DROP TABLE IF EXISTS `site_ayarlari`;
CREATE TABLE IF NOT EXISTS `site_ayarlari` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `site_mail` varchar(50) NOT NULL,
  `site_telefon` varchar(20) NOT NULL,
  `site_bilgi` text NOT NULL,
  `site_adres` varchar(250) NOT NULL,
  `site_desc` varchar(250) NOT NULL,
  `site_keyw` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `site_ayarlari`
--

INSERT INTO `site_ayarlari` (`id`, `title`, `url`, `site_mail`, `site_telefon`, `site_bilgi`, `site_adres`, `site_desc`, `site_keyw`) VALUES
(1, 'Haberin Yeri | Güncel Haber', 'http://localhost/magazin/', 'aleynanrkr@gmail.comsdf', '01234567890', 'Merhaba güncel haberin adresine hoşgeldiğinizz', 'Adresi buraya kaydedilecek hayır ', 'Haberin Yerİsiodjgğoıwerugğowe', 'GÜNCEL,SPOR,MAGAZİN');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sosyal_medya`
--

DROP TABLE IF EXISTS `sosyal_medya`;
CREATE TABLE IF NOT EXISTS `sosyal_medya` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `durum` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `sosyal_medya`
--

INSERT INTO `sosyal_medya` (`id`, `title`, `url`, `durum`) VALUES
(17, 'şakir paşa pasaşında sesı büzülesice', 'https://https://pin.it/1PvAFi8', 1),
(18, 'Siyaset', 'https://aleynakara.com.tr/', 1),
(19, 'Spor', 'https://aleynakara.com.tr/df', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

DROP TABLE IF EXISTS `yonetici`;
CREATE TABLE IF NOT EXISTS `yonetici` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `sifre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`id`, `email`, `sifre`) VALUES
(1, 'aleynanrkr@gmail.com', '64da0739e9bb5ebe67c530f8d6f19ce571788bcb');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
