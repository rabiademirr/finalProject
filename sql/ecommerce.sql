-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Mar 2021, 19:33:56
-- Sunucu sürümü: 10.4.13-MariaDB
-- PHP Sürümü: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ecommerce`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `about_description` text COLLATE utf8_turkish_ci NOT NULL,
  `about_video` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `about_vision` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `about_mission` varchar(1000) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`about_id`, `about_title`, `about_description`, `about_video`, `about_vision`, `about_mission`) VALUES
(0, 'Lively Garden', '<p>Sanal mağazacılık sekt&ouml;r&uuml;ndeki gelişmeleri s&uuml;rekli takip eden Lively Garden, 2009 yılında www.livelygarden.com online alışveriş sitesini kurarak, Vip kalitede online &ccedil;i&ccedil;ek&ccedil;ilik i&ccedil;in ilk adımı atmıştır.</p>\r\n\r\n<p>Bu s&uuml;re&ccedil;ten itibaren, tasarladığımız her &uuml;r&uuml;n sekt&ouml;rde beğeni toplamış ve sekt&ouml;r&uuml;n aranan &uuml;r&uuml;nleri arasında yerini almıştır. &Ouml;rneğin, Bonsai, terrarium ve minyat&uuml;r bah&ccedil;e uygulamalarında ger&ccedil;ekleştirdiğimiz tasarımlar &ccedil;i&ccedil;ek modasının trendlerini belirlemektedir.<br />\r\n&nbsp;</p>\r\n\r\n<p>&Uuml;r&uuml;nlerimizde kullandığımız &ccedil;i&ccedil;ekler, d&uuml;nyanın d&ouml;rt bir yanından &uuml;lkemize gelen en kalite &uuml;r&uuml;nler araasından &ouml;zenle se&ccedil;ilmekte, en kaliteli malzemeler kullanılarak sizlerin beğenisine sunulmaktadır.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'GHo9dk5W57E', 'Yıllarca Başta Bankacılık, Beyaz Eşya, Gıda, Eğitim vs. gibi pek çok önemli sektörün en önemli markalarının genel merkezlerine birebir hizmet veren Lively Garden, 2004 yılında ', 'Sanal mağazacılık sektöründeki gelişmeleri sürekli takip eden Lively Garden, 2009 yılında www.livelygarden.com online alışveriş sitesini kurarak, Vip kalitede online çiçekçilik için ilk adımı atmıştır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `bank_iban` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `bank_accountname` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `bank_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `bank_iban`, `bank_accountname`, `bank_status`) VALUES
(1, 'Garanti', 'TR 0400 0100 0298 7101 5973 5005', 'Rabia Demir', '1'),
(3, 'Ziraat ', 'TR 0400 0100 0298 7101 5973 5003', 'Lively Garden', '1'),
(4, 'Türkiye Finans', 'TR 0400 0100 0298 7101 5973 5008', 'Rabia Demir', '1'),
(6, 'ING Bank', 'TR 0400 0100 0298 7101 5973 5009', 'Rabia Demir', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_piece` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `product_piece`) VALUES
(17, 51244, 40, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `category_top` int(2) NOT NULL,
  `category_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `category_order` int(11) NOT NULL,
  `category_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_top`, `category_seourl`, `category_order`, `category_status`) VALUES
(1, 'Tasarım Çiçekler', 0, 'tasarim-cicekler', 1, '1'),
(3, 'İç Mekan & Bahçe', 0, 'ic-mekan-bahce', 2, '1'),
(4, 'Çiçek Buketleri', 0, 'cicek-buketleri', 3, '1'),
(7, 'Teraryum', 0, 'teraryum', 6, '1'),
(8, 'Bonsai', 0, 'bonsai', 11, '1'),
(14, ' Papatya/Gerbera', 0, 'papatya-gerbera', 9, '1'),
(15, 'Lilyum/Zambak', 0, 'lilyum-zambak', 10, '1'),
(17, 'Saksı Çiçekleri', 0, 'saksi-cicekleri', 15, '1'),
(18, 'Bonny Food', 0, 'bonny-food', 16, '1'),
(20, ' Doğum Günü Çiçekleri', 0, 'dogum-gunu-cicekleri', 25, '1'),
(22, 'Orkide', 0, 'orkide', 17, '1'),
(24, 'Güller', 0, 'guller', 1, '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_detail` text COLLATE utf8_turkish_ci NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `comment_confirmation` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `comment_detail`, `comment_time`, `product_id`, `comment_confirmation`) VALUES
(8, 51240, 'güzel ürün', '2021-03-22 16:43:23', 20, '0'),
(9, 51240, 'güzel ürün', '2021-03-22 16:44:04', 20, '1'),
(17, 51241, 'Teşekkür ederim lively garden ailesi ???? mükemmel bir teslimat,zamanlama harika ???? elinize sağlık', '2021-03-22 17:22:27', 21, '1'),
(23, 51244, 'Tadı, görünümü her şeyi o kadar kusursuz ki bayıldımmmm. Güvenle sipariş edebilirsiniz.', '2021-03-22 18:59:56', 2, '1'),
(28, 51244, 'Hizli birsekilde teslim edildi . Tesekkurler .', '2021-03-22 19:15:57', 23, '1'),
(31, 14752, 'Teşekkürler Beğenildi hızlı teslimat için sağlıklı günler dilerim.', '2021-03-24 19:27:48', 9, '1'),
(32, 51242, 'Güzel ama beklediğimden ve göründüğünden çook küçük', '2021-03-24 19:29:33', 33, '1'),
(33, 51240, 'Resimdekinden daha güzeldi evimin en güzel yerinde bana bakıyor 10 yıldız benden :)', '2021-03-25 20:55:05', 30, '1'),
(35, 51240, 'Özensiz ve dağılmış bir şekilde ulaştırıldı.  Hiç memnun kalmadım', '2021-03-25 20:56:28', 37, '1'),
(36, 51240, 'Teslimat son derece hızlıydı, ve siparişim 5 dakika bile geçmeden hazırlandı. ❤️', '2021-03-25 20:57:51', 16, '1'),
(37, 51240, 'Çok lezzetli ve hızlı teslimat için Teşekkür ediyorum', '2021-03-25 20:58:30', 12, '1'),
(38, 51240, 'Resimdekinden daha güzel :) Çok memnun kaldık emeği geçen herkese teşekkürler', '2021-03-25 21:00:22', 33, '1'),
(39, 51242, 'Annemi ağlattı, 10 üzerinden 10 tavsiye ederim.', '2021-03-25 23:24:19', 14, '1'),
(40, 51242, 'teşekkür ediyorum. Güvenle sipariş verebilirsiniz.', '2021-03-26 15:51:48', 23, '1'),
(41, 51242, 'Cok beğendik teşekkürler', '2021-03-26 15:52:39', 37, '1'),
(42, 51240, 'Göründüğü gibi çok güzel teşekkürler', '2021-03-26 17:28:59', 44, '1'),
(43, 51240, 'güzel ürün', '2021-03-29 01:21:43', 36, '1'),
(44, 51242, 'Ürün görseldekinin aynısı. Ciçekler o kadar güzel ve canlı ki???? ', '2021-03-29 23:38:46', 49, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_top` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_detail` text COLLATE utf8_turkish_ci NOT NULL,
  `menu_order` int(2) NOT NULL,
  `menu_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `menu_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_top`, `menu_name`, `menu_detail`, `menu_order`, `menu_url`, `menu_status`, `menu_seourl`) VALUES
(1, '0', 'Hakkımızda', '', 1, 'about', '1', 'hakkimizda'),
(2, '0', 'İletişim', '', 4, 'contact', '1', 'iletisim'),
(4, '0', 'Gizlilik Politikası', '<p>Sorumlu kuruluşun adı:Lively Garden&nbsp;Ticaret A.Ş.</p>\r\n\r\n<p>Sorumlu kuruluşun adresi: Fatih Sultan Mehmet Mah. Poligon, Cad. No 8, Buyaka İki Sitesi C Blok, Kat 10-14, Tepe&uuml;st&uuml; &Uuml;mraniye 34771, Istanbul,T&uuml;rkiye</p>\r\n\r\n<p>Lively Garden, ilgili kişisel verileri bu web sitesini kullanıcılara sunmak ve bu sitenin uygun şekilde &ccedil;alıştığının ve gerekli &ouml;l&ccedil;&uuml;de g&uuml;venliğin sağlandığının temin edilmesi doğrultusunda kullanır. Bu kapsam dışında kalan ve veriler &uuml;zerinde ger&ccedil;ekleştirilen her işlem, diğer yasal y&uuml;k&uuml;ml&uuml;l&uuml;kler, zinler, Henkel&rsquo;in meşru menfaatinin bulunduğu haller zemininde ya da ilgili kullanıcının Lively Garden&#39;e verdiği a&ccedil;ık rıza &ccedil;er&ccedil;evesinde ger&ccedil;ekleşmektedir.</p>\r\n', 3, '', '1', 'gizlilik-politikasi'),
(7, '', 'Gizlilik Politikası', '', 0, 'privacy-policy', '0', ''),
(8, '', 'Kategoriler', '', 2, 'categories', '1', 'kategoriler'),
(9, '', 'Mesafeli Satış Sözleşmesi', '<p>Mesafeli Satış S&ouml;zleşmesi</p>\r\n\r\n<p>MESAFELİ SATIŞ S&Ouml;ZLEŞMESİ<br />\r\nMADDE 1 - TARAFLAR</p>\r\n\r\n<p>1.1- SATICI</p>\r\n\r\n<p>&Uuml;nvanı : Lively Garden Rabia DEMİR<br />\r\nAdresi : Kılı&ccedil;ede Mahallesi İstiklal Caddesi &Uuml;nsal Apartmanı 189/5 melikgazi/KAYSERİ<br />\r\nVergi Dairesi :19 Mayıs<br />\r\nVergi Numarası: 1234566<br />\r\nTelefon : 542621856<br />\r\nE-mail :info@livelygarden.com.tr</p>\r\n\r\n<p>1.2- ALICI<br />\r\nAdı/Soyadı/&Uuml;nvanı :.....................(Kısaca ALICI olarak anılacak)<br />\r\nAdresi :&nbsp;</p>\r\n\r\n<p><br />\r\nMADDE 2 - KONUSU<br />\r\nALICI&#39;nın SATICI&#39;ya ait www.firmaadi.com &nbsp;internet sitesinden elektronik ortamda siparişini verdiği, &ouml;zellikleri ve satış fiyatı aşağıda belirtilen &uuml;r&uuml;n&uuml;n satışı, teslimi ve bedelinin &ouml;denmesine ilişkin olarak T&uuml;keticinin Korunması Hakkında Kanun ve Mesafeli S&ouml;zleşmelere Dair Y&ouml;netmelik?e g&ouml;re tarafların hak ve y&uuml;k&uuml;ml&uuml;l&uuml;klerinin belirlenmesidir.<br />\r\nMADDE 3 - S&Ouml;ZLESME TARİHİ: Satıcı tarafından daha &ouml;nce imzalanmış bulunan iş bu iki n&uuml;sha s&ouml;zleşme alıcı tarafından [SiparisTarih] tarihinde kabul edilmiştir ve bir n&uuml;shası alıcının mail adresine g&ouml;nderilecektir.<br />\r\nMADDE 4 - TESLİMAT MASRAFLARI VE IFASI: Teslimat masrafları Alıcıya aittir. Satıcı, web sitesinde, ilan ettiği rakamın &uuml;zerinde alışveriş yapanların teslimat &uuml;cretinin kendisince karşılanacağını beyan etmişse, teslimat masrafı Satıcıya aittir. Teslimat; stoğun m&uuml;sait olması ve mal bedelinin Satıcının hesabına ge&ccedil;mesinden sonra en kısa s&uuml;rede yapılır. Satıcı, mal/hizmetin siparişinden itibaren 30 (Otuz) g&uuml;n i&ccedil;inde teslim eder. Herhangi bir nedenle mal/hizmet bedeli &ouml;denmez veya banka kayıtlarında iptal edilir ise, Satıcı mal/hizmetin teslimi y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;nden kurtulmuş kabul edilir.<br />\r\nMADDE 5 - ALICININ BEYAN VE TAAHH&Uuml;TLERI: Alici, s&ouml;zleşme konusu mal/hizmeti teslim almadan &ouml;nce muayene edecek ezik, kirik, ambalajı yırtılmış vb. hasarlı ve ayıplı mal/hizmeti kargo şirketinden teslim almayacaktır. Teslim alınan Mal/hizmetin hasarsız ve sağlam olduğu kabul edilecektir. Teslimden sonra mal/hizmetin &ouml;zenle korunması borcu, alıcıya aittir. Mal/hizmetin tesliminden sonra Alıcıya ait kredi kartının Alicinin kusurundan kaynaklanmayan bir şekilde yetkisiz kişilerce haksiz veya hukuka aykırı olarak kullanılması nedeni ile ilgili banka veya finans kurulusunun mal/hizmet bedelini Satıcıya &ouml;dememesi halinde, Alici kendisine teslim edilmiş olması kaydıyla mal/hizmeti 3 (&Uuml;&ccedil;) g&uuml;n i&ccedil;inde Satıcıya g&ouml;ndermekle y&uuml;k&uuml;ml&uuml;d&uuml;r. Bu takdirde teslimat giderleri Alıcıya aittir.</p>\r\n\r\n<p>MADDE 6 - S&Ouml;ZLEŞME KONUSU &Uuml;R&Uuml;N/&Uuml;R&Uuml;NLER<br />\r\n6.1- &Uuml;r&uuml;nlerin Cinsi ve t&uuml;r&uuml;, Miktarı, Marka/Modeli, Rengi, Vergiler Dahil Satış Bedeli (adet x birim fiyat olarak) aşağıda belirtildiği gibidir.</p>\r\n\r\n<p>6.2- &Ouml;deme Şekli :</p>\r\n\r\n<p><br />\r\n6.3- Diğer yandan vadeli satışların sadece Bankalara ait kredi kartları ile yapılması nedeniyle, alıcı, ilgili faiz oranlarını ve temerr&uuml;t faizi ile ilgili bilgileri bankasından ayrıca teyit edeceğini, y&uuml;r&uuml;rl&uuml;kte bulunan mevzuat h&uuml;k&uuml;mleri gereğince faiz ve temerr&uuml;t faizi ile ilgili h&uuml;k&uuml;mlerin Banka ve alıcı arasındaki kredi kartı s&ouml;zleşmesi kapsamında uygulanacağını kabul, beyan ve taahh&uuml;t eder.<br />\r\nKredi kartına İade Prosed&uuml;r&uuml;:</p>\r\n\r\n<p>Alıcının cayma hakkını kullandığı durumlarda ya da siparişe konu olan &uuml;r&uuml;n&uuml;n &ccedil;eşitli sebeplerle tedarik edilememesi veya Hakem heyeti kararları ile T&uuml;keticiye bedel iadesine karar verilen durumlarda ,alışveriş kredi kartı ile ve taksitli olarak yapılmışsa, kredi kartına iade prosed&uuml;r&uuml; aşağıda belirtilmiştir:</p>\r\n\r\n<p>M&uuml;şterimiz &uuml;r&uuml;n&uuml; ka&ccedil; taksit ile aldıysa Banka m&uuml;şteriye geri &ouml;demesini taksitle yapmaktadır. SATICI bankaya &uuml;r&uuml;n bedelinin tamamını tek seferde &ouml;dedikten sonra ,Banka poslarından yapılan taksitli harcamaların M&uuml;şterimizin kredi kartına iadesi durumunda,konuya m&uuml;dahil tarafların mağdur duruma d&uuml;şmemesi i&ccedil;in talep edilen iade tutarları,yine taksitli olarak hamil taraf hesaplarına Banka tarafından aktarılır.M&uuml;şterinin satış iptaline kadar &ouml;demiş olduğu taksit tutarları ,eğer iade tarihi ile kartın hesap kesim tarihleri &ccedil;akışmazsa her ay karta 1 iade yansıyacak ve m&uuml;şteri iade &ouml;ncesinde &ouml;demiş olduğu taksitleri satışın taksitleri bittikten sonra , iade &ouml;ncesinde &ouml;demiş olduğu taksitleri sayısı kadar ay daha alacak ve mevcut bor&ccedil;larından d&uuml;şm&uuml;ş olacaktır.</p>\r\n\r\n<p>Kart ile alınmış mal ve hizmetin iadesi durumunda SATICI,Banka ile yapmış olduğu s&ouml;zleşme gereği M&uuml;şteriye nakit para ile &ouml;deme yapamaz.&Uuml;ye işyeri yani SATICI,bir iade işlemi s&ouml;zkonusu olduğunda ilgili yazılım aracılığı ile iadesini yapacak olup,&Uuml;ye işyeri yani SATICI ilgili tutarı Bankaya nakden veya mahsuben &ouml;demekle y&uuml;k&uuml;ml&uuml; olduğundan yukarıda anlatmış olduğumuz prosed&uuml;r gereğince M&uuml;şteriye nakit olarak &ouml;deme yapılamamaktadır. Kredi kartına iade ,SATICI Bankaya bedeli tek seferde &ouml;demesinden sonra ,Banka tarafından yukarıdaki prosed&uuml;r gereğince yapılacaktır.</p>\r\n\r\n<p>Alıcı, bu prosed&uuml;r&uuml; okuduğunu ve kabul ettiğini kabul ve taahh&uuml;d eder.</p>\r\n\r\n<p>6.4- Teslimat Şekli ve Adresi :</p>\r\n\r\n<p>Teslimat Adresi :&nbsp;&nbsp;</p>\r\n\r\n<p><br />\r\nTeslimat kargo şirketi aracılığı ile Alıcının yukarıda belirtilen adresinde elden teslim edilecektir. Teslim anında alıcının adresinde bulunmaması durumunda dahi SATICI edimini tam ve eksiksiz olarak yerine getirmiş olarak kabul edilecektir. Bu nedenle, alıcının &uuml;r&uuml;n&uuml; ge&ccedil; teslim almasından kaynaklanan her t&uuml;rl&uuml; zarar ile &uuml;r&uuml;n&uuml;n kargo şirketinde beklemiş olması ve/veya kargonun SATICI&#39;ya geri iade edilmesinden dolayı da oluşan giderler de ALICI&#39;ya aittir.</p>\r\n\r\n<p>Kargo &Uuml;creti : ...... TL &nbsp;olup, kargo fiyatı sipariş toplam tutarına eklenmekte ve m&uuml;şteri tarafından &ouml;denmektedir. &Uuml;r&uuml;n bedeline dahil değildir.</p>\r\n\r\n<p>MADDE 7 - GENEL H&Uuml;K&Uuml;MLER<br />\r\n7.1- ALICI, www.firmaadi.com internet sitesinde s&ouml;zleşme konusu &uuml;r&uuml;n&uuml;n temel nitelikleri, satış fiyatı ve &ouml;deme şekli ile teslimata ilişkin &ouml;n bilgileri okuyup bilgi sahibi olduğunu ve elektronik ortamda gerekli teyidi verdiğini beyan eder.<br />\r\n7.2- S&ouml;zleşme konusu &uuml;r&uuml;n, yasal 30 g&uuml;nl&uuml;k s&uuml;reyi aşmamak koşulu ile her bir &uuml;r&uuml;n i&ccedil;in ALICI&#39;nın yerleşim yerinin uzaklığına bağlı olarak internet sitesinde &ouml;n bilgiler i&ccedil;inde a&ccedil;ıklanan s&uuml;re i&ccedil;inde ALICI veya g&ouml;sterdiği adresteki kişi/kuruluşa teslim edilir.<br />\r\n7.3- S&ouml;zleşme konusu &uuml;r&uuml;n, ALICI&#39;dan başka bir kişi/kuruluşa teslim edilecek ise, teslim edilecek kişi/kuruluşun teslimatı kabul etmemesinden SATICI sorumlu tutulamaz.<br />\r\n7.4- SATICI, s&ouml;zleşme konusu &uuml;r&uuml;n&uuml;n sağlam, eksiksiz, siparişte belirtilen niteliklere uygun ve varsa garanti belgeleri ve kullanım kılavuzları ile teslim edilmesinden sorumludur.<br />\r\n7.5- S&ouml;zleşme konusu &uuml;r&uuml;n&uuml;n teslimatı i&ccedil;in işbu s&ouml;zleşmenin imzalı n&uuml;shasının SATICI?ya ulaştırılmış olması ve bedelinin ALICI&#39;nın tercih ettiği &ouml;deme şekli ile &ouml;denmiş olması şarttır. Herhangi bir nedenle &uuml;r&uuml;n bedeli &ouml;denmez veya banka kayıtlarında iptal edilir ise, SATICI &uuml;r&uuml;n&uuml;n teslimi y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;nden kurtulmuş kabul edilir.<br />\r\n7.6- &Uuml;r&uuml;n&uuml;n tesliminden sonra ALICI&#39;ya ait kredi kartının ALICI&#39;nın kusurundan kaynaklanmayan bir şekilde yetkisiz kişilerce haksız veya hukuka aykırı olarak kullanılması nedeni ile ilgili banka veya finans kuruluşun &uuml;r&uuml;n bedelini SATICI&#39;ya &ouml;dememesi halinde, ALICI&#39;nın kendisine teslim edilmiş olması kaydıyla &uuml;r&uuml;n&uuml;n 3 g&uuml;n i&ccedil;inde SATICI&#39;ya g&ouml;nderilmesi zorunludur. Bu takdirde nakliye giderleri ALICI&#39;ya aittir.<br />\r\n7.7- Garanti belgesi ile satılan &uuml;r&uuml;nlerden olan veya olmayan &uuml;r&uuml;nlerin arızalı veya bozuk olanlar, (ayıplı) garanti şartları i&ccedil;inde gerekli onarımın yetkili servise yaptırılması i&ccedil;in SATICI?ya g&ouml;nderilebilir, bu takdirde kargo giderleri SATICI tarafından karşılanacaktır.<br />\r\n7.8 - Ayrıca sitede yer alan &uuml;r&uuml;nlerin &ouml;zellikleri, stok durumları, fiyatları vs. hususlarda herhangi bir hata oluşması m&uuml;mk&uuml;nd&uuml;r. Bu gibi hallerde hatalar SATICI tarafından d&uuml;zeltilmektedir. Ancak herhangi bir hatayla karşılaşılması durumunda sipariş ger&ccedil;ekleşmiş ve sipariş tutarı ALICI?nın kredi kartından (veya havale ile) alınmış olsa dahi SATICI?nın siparişin iptali ile &ouml;denen tutarın kredi kartına (veya hesabına) iadesini yapma hakkı mevcuttur. Bu halde sipariş iptal edilerek tutar ALICI?nın kredi kartına (veya hesabına) iade edilir. İadesi ger&ccedil;ekleştirilen tutarın ALICI?nın hesabına aktarılması kartı veren/hesabın ait olduğu kuruluşun y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;nde olup oluşabilecek gecikmelerden dolayı SATICI?nın herhangi bir sorumluluğu bulunmamaktadır.<br />\r\n7.9 ? ALICI satın alınan &uuml;r&uuml;n&uuml;n montajının kendisine ait olduğunu kabul ve taahh&uuml;t etmiştir.<br />\r\nMADDE 8- CAYMA HAKKI<br />\r\nALICI, s&ouml;zleşme konusu &uuml;r&uuml;n&uuml;n kendisine veya g&ouml;sterdiği adresteki kişi/kuruluşa tesliminden itibaren 14 g&uuml;n i&ccedil;inde malı redederek cayma hakkına sahiptir. Cayma hakkinin kullanılması i&ccedil;in aynı s&uuml;re i&ccedil;inde Satıcıya faks, e-posta veya telefon ile bildirimde bulunulması ve mal/hizmetin 7. md. h&uuml;k&uuml;mleri &ccedil;er&ccedil;evesinde ve iş bu s&ouml;zleşmenin ayrılmaz par&ccedil;ası olan ve SATICI web sitesinde yayınlanmış olan &ouml;nbilgiler gereğince, ambalaj ve i&ccedil;eriğinin denenirken hasar g&ouml;rmemiş olması şarttır. Bu hakkin kullanılması halinde, 3. kişiye veya Alıcıya teslim edilen mal/hizmete ilişkin kargo teslim tutanağı &ouml;rneği ile fatura aslının iadesi zorunludur. Fatura asli g&ouml;nderilmezse Alıcıya KDV ve varsa diğer yasal y&uuml;k&uuml;ml&uuml;l&uuml;kler iade edilemez.<br />\r\nT&uuml;keticinin cayma bildiriminin satıcıya ulaştığı tarihten itibaren 10 g&uuml;n i&ccedil;inde &uuml;r&uuml;n bedeli ALICI&#39;ya iade edilir.(bkz Mesafeli S&ouml;zleşmeler Hakkında Y&ouml;netmelik) Cayma hakkı nedeni ile iade edilen &uuml;r&uuml;n&uuml;n kargo bedeli SATICI tarafından karşılanır.</p>\r\n\r\n<p>T&uuml;keticinin hi&ccedil;bir hukuki ve cezai sorumluluk &uuml;stlenmeksizin ve hi&ccedil;bir gerek&ccedil;e g&ouml;stermeksizin malı teslim aldığı veya s&ouml;zleşmenin imzalandığı tarihten itibaren yedi g&uuml;n i&ccedil;erisinde malı veya hizmeti reddederek s&ouml;zleşmeden cayma hakkının var olduğunu ve cayma bildiriminin satıcı veya sağlayıcıya ulaşması tarihinden itibaren malı geri almayı taahh&uuml;t ederiz.</p>\r\n\r\n<p>MADDE 9- CAYMA HAKKI KULLANILAMAYACAK &Uuml;R&Uuml;NLER<br />\r\nNiteliği itibarıyla iade edilemeyecek &uuml;r&uuml;nler, tek kullanımlık &uuml;r&uuml;nler, kopyalanabilir yazılım ve programlar, hızlı bozulan veya son kullanım tarihi ge&ccedil;en &uuml;r&uuml;nler i&ccedil;in cayma hakkı kullanılamaz. Aşağıdaki &uuml;r&uuml;nlerde cayma hakkının kullanılması, &uuml;r&uuml;n&uuml;n ambalajının a&ccedil;ılmamış, bozulmamış ve &uuml;r&uuml;n&uuml;n kullanılmamış olması şartına bağlıdır.<br />\r\n-Taşınabilir Bilgisayar ve Masa&uuml;st&uuml; Bilgisayarlar (Orijinal işletim sistemi kurulduktan sonra yani bilgisayarın kurulumu yapıldıktan sonra iade alınmayacaktır.)<br />\r\n-Her t&uuml;rl&uuml; yazılım ve programlar<br />\r\n-DVD, VCD, CD ve kasetler<br />\r\n-Bilgisayar ve kırtasiye sarf malzemeleri (toner, kartuş, şerit v.b)<br />\r\n-H&uuml;r t&uuml;rl&uuml; kozmetik &uuml;r&uuml;nleri<br />\r\n-Telefon kont&ouml;r siparişleri<br />\r\n- Niteliği itibarıyla iade edilemeyecek &uuml;r&uuml;nler ( &uuml;r&uuml;n&uuml;n arızalı veya ayıplı &ccedil;ıkması halleri dışında, a&ccedil;ıldıktan sonra sağlık a&ccedil;ısından tehlike arzedebilen &uuml;r&uuml;nler &ouml;rn : kullanım esnasında v&uuml;cut ile birebir temas gerektiren &uuml;r&uuml;nler (kulak i&ccedil;i veya kulak &uuml;st&uuml; kulaklık vs. ), tek kullanımlık &uuml;r&uuml;nler, kopyalanabilir yazılım ve programlar, hızlı bozulan veya son kullanım tarihi ge&ccedil;en &uuml;r&uuml;nler ve iadesi m&uuml;mk&uuml;n değildir</p>\r\n\r\n<p>MADDE 10 - TEMERR&Uuml;T H&Uuml;K&Uuml;MLERİ<br />\r\nTarafların işbu s&ouml;zleşmeden kaynaklarından edimlerini yerine getirmemesi durumunda T&uuml;rk Bor&ccedil;lar Kanunu&#39;nun 123-125.maddesinde yer alan Bor&ccedil;lunun Temerr&uuml;d&uuml; h&uuml;k&uuml;mleri uygulanacaktır. Temerr&uuml;t durumlarında, herhangi bir tarafın edimlerini s&uuml;resi i&ccedil;inde haklı bir sebebi olmaksızın yerine getirmemesi durumunda diğer taraf s&ouml;z konusu edimin yerine getirilmesi i&ccedil;in edimini yerine getirmeyen tarafa 7 g&uuml;nl&uuml;k s&uuml;re verecektir. Bu s&uuml;re zarfında da yerine getirilmesi durumunda edimini yerine getirmeyen taraf m&uuml;temerrit olarak addolunacak ve alacaklı edimin ifasını talep etmek suretiyle malın teslimini, ve/veya s&ouml;zleşmenin feshini ve bedelin iadesini talep etme hakkına sahiptir.</p>\r\n\r\n<p>Mesafeli S&ouml;zleşmeler Hakkında Y&ouml;netmeliğin 9.maddesinin son fıkrası gereğince satıcı SATICI,sipariş konusu mal veye hizmetin yerine getirilmesinin imkansızlaştığı ileri s&uuml;rerek (tedarik&ccedil;i Firmadan &uuml;r&uuml;n&uuml;n hi&ccedil;bir şekilde tedarik edilememesi durumu) ,s&ouml;zleşme konusu y&uuml;k&uuml;ml&uuml;l&uuml;klerini yerine getiremiyorsa ,bu durumu s&ouml;zleşmeden doğan ifa y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;n&uuml;n s&uuml;resi dolmadan t&uuml;keticiye bildirmeyi taahh&uuml;d eder.Bu durumda ,SATICI s&ouml;zleşmeyi derhal fesih etme hakkına haiz olup,M&uuml;şterinin sipariş verdiği &uuml;r&uuml;n&uuml;n bedelini ve varsa bor&ccedil; altına sokan t&uuml;m belgeleri geri iade edeceğini taahh&uuml;d eder.</p>\r\n\r\n<p>SATICI&#39;nın işbu y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;n&uuml; yerine getirmesini engelleyebilecek m&uuml;cbir sebepler veya nakliyeyi engelleyen hava muhalefetleri,ulaşımın kesilmesi,yangın ,deprem,sel baskını gibi olağan&uuml;st&uuml; olaylar nedeni ile s&ouml;zleşme konusu &uuml;r&uuml;n&uuml; s&uuml;resi i&ccedil;erisinde teslim edemez ise , Bu tip durumlarda Alıcı, SATICI&#39;nın hi&ccedil;bir sorumluluğu olmadığını,siparişin iptal edilmesini veya teslimat s&uuml;resinin engelleyici durumunun ortadan kalkmasına kadar ertelenmesi haklarından birini kullanabilir. ALICInın siparişi iptal etmesi halinde &ouml;dediği tutar 10 g&uuml;n i&ccedil;erisinde kendisine &ouml;denir.(kredi kartı ile yapılan taksitli alışverişlerde ise kredi kartına iade i&ccedil;in yukarıdaki prosed&uuml;r ALICI tarafından kabul edilir)</p>\r\n\r\n<p>MADDE 11- YETKİLİ MAHKEME<br />\r\nİşbu s&ouml;zleşmenin uygulanmasında, Sanayi ve Ticaret Bakanlığınca ilan edilen değere kadar T&uuml;ketici Hakem Heyetleri ile Samsun T&uuml;ketici Mahkemeleri yetkilidir.</p>\r\n', 5, '', '1', 'mesafeli-satis-sozlesmesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `order_no` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_total` float(9,2) NOT NULL,
  `order_type` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `order_bank` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `order_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`order_id`, `order_time`, `order_no`, `user_id`, `order_total`, `order_type`, `order_bank`, `order_payment`) VALUES
(450003, '2021-03-26 01:05:50', NULL, 51242, 198.00, 'Banka EFT-Havale', 'ING Bank', 0),
(450004, '2021-03-26 01:15:42', NULL, 51242, 198.00, 'Banka EFT-Havale', 'Ziraat ', 0),
(450005, '2021-03-26 01:35:46', NULL, 51242, 276.00, 'Banka EFT-Havale', 'Ziraat ', 0),
(450010, '2021-03-26 17:27:27', NULL, 51240, 243.00, 'Banka EFT-Havale', 'ING Bank', 0),
(450011, '2021-03-29 01:22:38', NULL, 51240, 158.00, 'Banka EFT-Havale', 'Türkiye Finans', 0),
(450012, '2021-03-29 01:27:35', NULL, 51240, 198.00, 'Banka EFT-Havale', 'Garanti', 0),
(450013, '2021-03-29 03:05:01', NULL, 51240, 180.00, 'Banka EFT-Havale', 'Ziraat ', 0),
(450014, '2021-03-29 15:34:54', NULL, 51242, 45.00, 'Banka EFT-Havale', 'Ziraat ', 0),
(450015, '2021-03-29 23:37:21', NULL, 51242, 89.00, 'Banka EFT-Havale', 'ING Bank', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_detail`
--

CREATE TABLE `order_detail` (
  `orderdetail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` float(9,2) NOT NULL,
  `product_piece` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_id`, `order_id`, `product_id`, `product_price`, `product_piece`) VALUES
(1, 450009, 40, 99.00, 2),
(2, 450009, 39, 78.00, 1),
(3, 450010, 33, 45.00, 1),
(4, 450010, 40, 99.00, 2),
(5, 450011, 2, 59.00, 1),
(6, 450011, 43, 99.00, 1),
(7, 450012, 43, 99.00, 2),
(8, 450013, 24, 90.00, 2),
(9, 450014, 16, 45.00, 1),
(10, 450015, 49, 89.00, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_time` datetime NOT NULL DEFAULT current_timestamp(),
  `product_name` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `product_seourl` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `product_description` text COLLATE utf8_turkish_ci NOT NULL,
  `product_price` float(9,2) NOT NULL,
  `product_video` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_keywords` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `product_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `product_standout` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `product_imgpath` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_time`, `product_name`, `product_seourl`, `product_description`, `product_price`, `product_video`, `product_stock`, `product_keywords`, `product_status`, `product_standout`, `product_imgpath`) VALUES
(2, 18, '2021-03-19 15:45:59', 'Mutluluk Enerjisi  Aranjmanı', 'mutluluk-enerjisi-aranjmani', '<p>Doğum g&uuml;n&uuml;; kimi i&ccedil;in b&uuml;y&uuml;mek, kimi i&ccedil;in yaşlanmak, bazıları i&ccedil;in &ouml;zel bazıları i&ccedil;in ise alelade bir g&uuml;n olarak g&ouml;r&uuml;l&uuml;r. Ancak ortak bir ger&ccedil;ek vardır ki; doğum g&uuml;n&uuml;nde herkes hatırlanmak ister. Bu &ouml;zel g&uuml;nde sevdiklerinizi en mutlu eden hediyelerden biri de Mutluluğun Enerjisi Doğum G&uuml;n&uuml; Kek Aranjmanı&#39;dır. İyi ki doğdun mesajı veren kutu tasarımı; renkli, lezzetli ve g&ouml;z alıcı kekleri ile bu aranjman sayesinde sevdiklerinize leziz bir s&uuml;rpriz yapabilir, bu &ouml;nemli g&uuml;n&uuml;n&uuml; keyifli bir şekilde ge&ccedil;irmesini sağlayabilirsiniz!</p>\r\n', 59.00, '', 95, 'happy,flower,love', '1', '1', 'dimg/product/31522229932639221361mutlulugun-enerjisi-dogum-gunu-kek-aranjmani-gr1806-1-8d61276cd92aa6a-3ab74232.jpg'),
(12, 18, '2021-03-19 20:14:30', 'Pembe Kek Aranjmanı', 'pembe-kek-aranjmani', '<p>Siyah kakaolu silindir kek :&nbsp;19 Adet&Ccedil;ikolata Kaplı Kakaolu Truf Kek :&nbsp;17 AdetB&uuml;y&uuml;k Boy Yuvarlak Kurabiye :&nbsp;1 Adet</p>\r\n', 45.00, '', 125, 'fruit,flower,cart,love', '1', '0', 'dimg/product/22136229602161725251pembe-ruyalar-kisisellestirilebilir-kek-aranjmani-gr1823-1-8d6127e9246afc1-af7855d6.jpg'),
(14, 17, '2021-03-19 17:37:12', ' Spatifilyum Bitkisi', 'spatifilyum-bitkisi', '<p>Zarif beyaz &ccedil;i&ccedil;ekleri ve g&uuml;zel yapraklarıyla ihtişamını her ortamda sergilemekten ka&ccedil;ınmayan Spatifilyum Bitkisi &ouml;zel olarak tasarlanan gold kareli vazoda sizin i&ccedil;in sunuluyor. Yaşam alanlarınızı dekore ederken kullanabileceğiniz ya da sevdiklerinizin yeni ev ve iş yerlerinde kullanmaları i&ccedil;in hediye edebileceğiniz bu muhteşem bitki ortamın havasını değiştirirken aynı zamanda g&ouml;r&uuml;nt&uuml;s&uuml; ile de b&uuml;y&uuml;leyici bir atmosfer oluşturulmasına yardımcı olacak. Kendiniz ya da sevdikleriniz i&ccedil;in Gold Kareli Vazoda Spatifilyum Bitkisi edinmek i&ccedil;in &Ccedil;i&ccedil;ekSepeti &uuml;zerinden sipariş oluşturabilirsiniz.</p>\r\n', 99.00, '', 125, 'gold,flower', '1', '1', 'dimg/product/25881215432230024897at4243-1-8d8299fe7b68b6f-31ae8292.jpg'),
(15, 18, '2021-03-19 18:02:38', 'Mixed  Meyve Sepeti', 'mixed-meyve-sepeti', '<p>Meyvelerin en tatlı, en taze, en şık hali bu sepette! Mixed Fruit Meyve Sepeti ile k&uuml;sl&uuml;kler son bulacak, s&uuml;rprizler daha anlamlı olacak, hediyenize herkes bayılacak! Mixed Fruit Meyve Sepeti&#39;nde ortalama 10 adet fresh ananas, ortalama 55 adet &uuml;z&uuml;m tanesi, ortalama 7 adet &ccedil;ikolataya batırılmış &ccedil;ilek, ortalama 15 adet fresh &ccedil;ilek, ortalama 7 adet &ccedil;ikolatalı elma dilimi, ortalama 3 adet portakal dilimi bulunmaktadır. Saksı rengi ve modeli şube stoklarına g&ouml;re farklılık g&ouml;sterebilir. Hediyen burada sen neredesin?</p>\r\n', 85.00, '', 56, 'fruit,flower,cart', '1', '0', 'dimg/product/23408248802976431395mixed-fruit-meyve-sepeti-kc5676160-1-72d8119b0dea4d7a9962b48c4dc314c1.jpg'),
(16, 18, '2021-03-19 19:33:33', 'Love Meyve Sepeti', 'love-meyve-sepeti', '<p>Bu harika &uuml;r&uuml;n&uuml;m&uuml;z sevdikleriniz i&ccedil;in harika bir hediye olacak. &uuml;r&uuml;n&uuml;m&uuml;zde ortalama 35 ile 40 adet arasında truffle ve &ccedil;ilek bulunmaktadır.Saksı rengi ve modeli stoklara g&ouml;re değiskenlik g&ouml;sterebilir .</p>\r\n', 45.00, '', 45, 'fruit,flower,cart,love', '1', '0', 'dimg/product/23642231173079424913love-meyve-sepeti-kc5088474-1-5a32d1931cab49ab934067096ccb888b.jpg'),
(18, 17, '2021-03-19 20:08:07', ' Dieffenbachia Camilla', 'dieffenbachia-camilla', '<p>ieffenbachia Camilla&nbsp;Bitkisi Hakkında Bilmemiz Gerekenler</p>\r\n\r\n<p>Diefenbahya alacalı hoş ve g&ouml;sterişli yaprakları ile evde veya ofis dekorasyonu,b&uuml;y&uuml;k odalar, koridorlar, resepsiyon alanları,kapalı teras alanları i&ccedil;in uygun bir t&uuml;rd&uuml;r..</p>\r\n', 85.00, '', 55, 'difen,bahya,flower', '1', '0', 'dimg/product/27548261672236224217etnik-saksida-dieffenbachia-camilla-bitkisi-kc4748294-1-b76d37d2467e4f56af5e5dbc40c52c22.jpg'),
(20, 8, '2021-03-21 13:05:18', 'Zelkova Bonsai ', 'zelkova-bonsai', '<p>Yaklaşık &Uuml;r&uuml;n Boyutu: 25 cm</p>\r\n\r\n<p>Bulunduğu ortama dekoratif bir hava katan Bonsai bitkisi, bodur ağa&ccedil; g&ouml;r&uuml;n&uuml;m&uuml; ve yeşil yaprakları ile sevdiklerinizin evini veya ofisini s&uuml;sleyecek.</p>\r\n\r\n<p>Bonsai Bakımı:&nbsp;Bonsai bitkinizi direkt g&uuml;neş almayan aydınlık bir yerde ve toprağı hafif nemli olacak şekilde muhafaza etmeniz gerekir. Gelişiminde en &ouml;nemli etken sulamadır.&nbsp;Saksının heryeri eşit miktarda oda sıcaklığında su ile sulanmalı ve toprak suyu emdiğinde sulama kesilmelidir. Bulunduğu ortam 12 derece altında olmamalıdır</p>\r\n', 90.00, '', 100, 'bonsai,saksı,flower', '1', '1', 'dimg/product/28832284992695428485at1892-1-8d8231ce5f7756d-a0c5942a.jpg'),
(21, 6, '2021-03-21 14:54:50', 'California', 'california', '<p>O an yanında olup da kocaman sarılamadığınız sevdiklerinizi zarif bir s&uuml;rprizle sevindirmek ister misiniz? Kraft rengi kare kutusunun i&ccedil;erisinde lilarenk, sarı ve beyaz g&uuml;ller ile tamamlanmış California &Ccedil;i&ccedil;ek Aranjmanı, sevdikleriniz i&ccedil;in şık ve mutluluk verici bir jest olacak.</p>\r\n', 99.00, '', 55, 'gold,flower', '1', '1', 'dimg/product/24967301223137922550california-at2750-1-636149065770010271.jpg'),
(22, 6, '2021-03-21 14:58:37', 'Kırmızı Gül Aranjmanı', 'kirmizi-gul-aranjmani', '<p>Adını kalbinize yazdınız yetmedi mi? Gelin kırmızı g&uuml;llerle dolu bir kutunun tam ortasına beyaz g&uuml;llerle baş harflerini yazalım.</p>\r\n', 125.00, '', 85, 'flower,rose', '1', '0', 'dimg/product/24907215033113931438via144-1-8d89832d0001c4e-1d8a02b7.jpg'),
(23, 16, '2021-03-21 15:12:07', 'Renk Karnavalı ', 'renk-karnavali', '<p>Gerbera Beyaz :&nbsp;3 AdetGerbera Pembe :&nbsp;3 AdetGerbera Sarı :&nbsp;3 AdetGerbera Turuncu :&nbsp;3 Adet</p>\r\n\r\n<p>Sevdiklerinizin g&uuml;n&uuml;ne renk ve neşe katmak istediğiniz anlarda, doğum g&uuml;n&uuml; veya yeni iş tebriği i&ccedil;in ya da ge&ccedil;miş olsun dileklerinizi iletmek i&ccedil;in g&ouml;nderebileceğiniz enerji dolu bir &ccedil;i&ccedil;ek aranjmanı olan Renk Karnavalı Gerberalar, siyah ve şık vazosu i&ccedil;erisinde beyaz, pembe, sarı ve turuncu renkli gerberalar ile hazırlanıyor. Rengarenk kesme gerberaların cipsolar ile bir araya geldiği bu aranjman t&uuml;m sevdikleriniz i&ccedil;in dilediğiniz her zaman g&ouml;nderebileceğiniz bir &ccedil;i&ccedil;ek buketi olarak hazırlandı.</p>\r\n', 85.00, '', 23, 'flower,rose', '1', '1', 'dimg/product/22203225342702830585renk-karnavali-gerberalar-standart-boy.jpeg'),
(24, 15, '2021-03-21 15:15:08', 'Beyaz Lilyum Çiçek', 'beyaz-lilyum-cicek', '<p>Beyaz Lilyum &Ccedil;i&ccedil;ek Buketi</p>\r\n\r\n<p>&Uuml;r&uuml;n i&ccedil;eriği: 10&nbsp;Adet Beyaz Lilyum</p>\r\n\r\n<p>Masumiyetin, zarafetin, g&uuml;ven duygusunun ve saf sevginin simgesidir beyaz renk. Biz de Beyaz Lilyum &Ccedil;i&ccedil;ek Buketi i&ccedil;erisinde sizin t&uuml;m bu hislerinize terc&uuml;man olacak 6 adet lilyumu sevidkleriniz i&ccedil;in &ouml;zenle ve &ouml;zel olarak bir araya getirdik. Ona karşı hissettiğiniz saf sevginizi, aşkınızın masumiyetini ve onun ne kadar zarif olduğunu ona kelimeler olmadan anlatmak istiyorsanız Beyaz Lilyum &Ccedil;i&ccedil;ek Buketi sizin i&ccedil;in doğru tercih olacaktır. Bukette yer alan &ccedil;i&ccedil;ekler, mevsimsel şartları sebebiyle &ccedil;i&ccedil;ek a&ccedil;mamış halde, kapalı olarak g&ouml;nderilebilir. Kapalı olan &ccedil;i&ccedil;ekler 1-2 g&uuml;n i&ccedil;erisinde, oda sıcaklığında a&ccedil;maktadır.</p>\r\n', 90.00, '', 100, 'gold,flower', '1', '0', 'dimg/product/21538274662120326183at4252-1-8d7fefe73da7ecd-4cac50ef.jpg'),
(25, 18, '2021-03-21 23:48:25', 'Truf Kek Buketi', 'truf-kek-buketi', '<p>&Ccedil;ikolata Kaplı Kakaolu Truf Kek :&nbsp;50 Adet</p>\r\n\r\n<p>Kocaman s&uuml;rprizlere yakışan kocaman bir aranjman! İ&ccedil;erisinde 22 adet frambuaz &ccedil;ikolatalı truf kek, 17 adet fildişi &ccedil;ikolatalı truf kek, 10 adet fildişi &ccedil;ikolatalı karışık &ccedil;ikolatalı truf kek ve en tepede 1 adet fildişi &ccedil;ikolatalı brezilya şekerli gramapon kağıdına sarılmış truf kek bulunan Pembe &Ccedil;i&ccedil;ek Truf Kek Buketi, b&uuml;y&uuml;k partilere yakışan g&ouml;sterişe ve lezzete sahip bir s&uuml;rpriz olacak.</p>\r\n\r\n<p>&Uuml;r&uuml;n Kodu:&nbsp;gr2008</p>\r\n', 56.00, '', 75, 'bonny,food,flower', '1', '1', 'dimg/product/25204246432382322178pembe-cicek-truf-kek-buketi-standart-boy.jpeg'),
(29, 16, '2021-03-24 00:36:14', 'Chamadore ve Kalanchoe', 'chamadore-ve-kalanchoe', '<p>Chamadora Elegans . 8,5 cm&nbsp; :&nbsp;1 AdetKalanchoe sarı 5,5 cm mini :&nbsp;2 Adet</p>\r\n\r\n<p>&Uuml;r&uuml;n İ&ccedil;eriği:&nbsp;Dekoratif Saksıda Chamadore ve Kalanchoe (Kalanşo)</p>\r\n\r\n<p>Dekoratif saksıda Kalanşo ve Chamadore bitkileriyle hazırlanan &uuml;r&uuml;n ile sevdiklerinizi şaşırtmak istemez misiniz? Evleriniz, iş yerleriniz i&ccedil;in uygun, bakımı &ccedil;ok zor olmayan Kalanşo &ccedil;i&ccedil;eği ile Cahamadore bitkisinin dekoratif saksıdaki uyumuyla etrafınızı g&uuml;zelleştirmek &ccedil;ok daha kolay.</p>\r\n\r\n<p>Dekoratif Saksıda Chamadore ve Kalanchoe (Kalanşo) Bakımı Nasıl Olmalı?&nbsp;Bu bitkiler yarı g&ouml;lgeli, doğrudan g&uuml;neş ışığına maruz kalmadıkları alanları &ccedil;ok severler. &Ccedil;i&ccedil;ekler yazın b&uuml;y&uuml;me d&ouml;neminde bolca sulanmalı, &ccedil;i&ccedil;eklerin yapraklarına sık sık su p&uuml;sk&uuml;rt&uuml;lmelidir.</p>\r\n\r\n<p>&Uuml;r&uuml;n, 2 adet Mini Kalanşo (5.5 cm) ve 1 adet Cahamadora (8.5 cm) ile g&ouml;rseldeki saksıda g&ouml;nderilir.</p>\r\n\r\n<p>Not: Stok durumuna g&ouml;re aynı bitkinin farklı rengi g&ouml;nderilebilir, renk konusunda farklılıklar yaşanabilir.</p>\r\n', 89.00, '', 145, 'gold,flower', '1', '0', 'dimg/product/20633251682243027609dekoratif-saksida-chamadore-ve-kalanchoe-at4173-1-0423a814d1474d09be6da840d256fce5.jpg'),
(30, 3, '2021-03-24 00:43:42', 'Chamadore ve Kalanchoe', 'chamadore-ve-kalanchoe', '<p>Chamadora Elegans . 8,5 cm&nbsp; :&nbsp;1 AdetKalanchoe sarı 5,5 cm mini :&nbsp;2 Adet</p>\r\n\r\n<p>&Uuml;r&uuml;n İ&ccedil;eriği:&nbsp;Dekoratif Saksıda Chamadore ve Kalanchoe (Kalanşo)</p>\r\n\r\n<p>Dekoratif saksıda Kalanşo ve Chamadore bitkileriyle hazırlanan &uuml;r&uuml;n ile sevdiklerinizi şaşırtmak istemez misiniz? Evleriniz, iş yerleriniz i&ccedil;in uygun, bakımı &ccedil;ok zor olmayan Kalanşo &ccedil;i&ccedil;eği ile Cahamadore bitkisinin dekoratif saksıdaki uyumuyla etrafınızı g&uuml;zelleştirmek &ccedil;ok daha kolay.</p>\r\n\r\n<p>Dekoratif Saksıda Chamadore ve Kalanchoe (Kalanşo) Bakımı Nasıl Olmalı?&nbsp;Bu bitkiler yarı g&ouml;lgeli, doğrudan g&uuml;neş ışığına maruz kalmadıkları alanları &ccedil;ok severler. &Ccedil;i&ccedil;ekler yazın b&uuml;y&uuml;me d&ouml;neminde bolca sulanmalı, &ccedil;i&ccedil;eklerin yapraklarına sık sık su p&uuml;sk&uuml;rt&uuml;lmelidir.</p>\r\n\r\n<p>&Uuml;r&uuml;n, 2 adet Mini Kalanşo (5.5 cm) ve 1 adet Cahamadora (8.5 cm) ile g&ouml;rseldeki saksıda g&ouml;nderilir.</p>\r\n\r\n<p>Not: Stok durumuna g&ouml;re aynı bitkinin farklı rengi g&ouml;nderilebilir, renk konusunda farklılıklar yaşanabilir.</p>\r\n', 99.00, '', 125, 'flower,rose', '1', '0', 'dimg/product/24893272522468628211dekoratif-saksida-chamadore-ve-kalanchoe-at4173-1-0423a814d1474d09be6da840d256fce5.jpg'),
(31, 20, '2021-03-24 00:45:52', 'Sevimli Peluş Ayı ve Sarı Kalanchoe', 'sevimli-pelus-ayi-ve-sari-kalanchoe', '<p>Kalanchoe sarı 5,5 cm mini :&nbsp;1 Adet</p>\r\n\r\n<p>Hangi yaşta olursa olsun hediyenin mutlu edemeyeceği kimse yoktur! Taptaze &ccedil;i&ccedil;ek aranjmanının yanında pofuduk bir peluş ayının ise mutluluğu katlamadığı hi&ccedil; kimse yoktur! Sevdiğiniz kişiye romantik bir jest yapmak i&ccedil;in muhteşem bir hediye! -Doğal k&uuml;t&uuml;k &uuml;zerinde Sarı Kalanchoe &ccedil;i&ccedil;eklerinin bir araya gelmesiyle oluşan bir aranjmandır. -Kalanchoe &ccedil;i&ccedil;ekleri d&uuml;şt&uuml;kleri yerde tekrar yeşerdikleri i&ccedil;in hediye ettiğiniz kişiye g&ouml;sterdiğiniz sevginin g&uuml;c&uuml;n&uuml; hatırlatır. -Aranjmanın yanında gelen Peluş Ayı, hediyenizi daha &ouml;zel kılar. Not: Aranjmanda yer alan &ccedil;i&ccedil;ekler stok durumuna g&ouml;re farklı renklerde ve boyutlarda olabilir. Ayrıca bazı &ccedil;i&ccedil;ekler, mevsimsel şartlar sebebiyle &ccedil;i&ccedil;ek a&ccedil;mamış halde, kapalı olarak g&ouml;nderilebilir.</p>\r\n', 85.00, '', 100, 'gold,flower', '1', '0', 'dimg/product/29709275522177728522sevimli-pelus-ayi-ve-sari-kalanchoe-at4382-1-40f8df4dc54a42048d5b1c8b5d449054.jpg'),
(32, 22, '2021-03-24 01:24:15', ' 2 Dal Beyaz Orkide Çiçeği', '2-dal-beyaz-orkide-cicegi', '<p>Saksı Phalanopsis Beyaz &Ccedil;iftli :&nbsp;1 Adet</p>\r\n\r\n<p>Asaletin ve zarifliğin simgesi olan beyaz orkide, &ouml;zel g&uuml;nleri kutlamak ve hoş s&uuml;rprizler yapmak i&ccedil;in tercih edebileceğiniz hediyeler arasında bulunuyor. Narinliğine&nbsp;rağmen olduk&ccedil;a dayanıklı bir &ccedil;i&ccedil;ek olan orkide aynı zamanda uzun &ouml;m&uuml;rl&uuml; olmasıyla da biliniyor. Orkidenin estetik duruşu, dekorasyonlarda da sıklıkla kullanılıyor. Bakımı kolay ve zahmetsiz olan orkidelerle sevdiklerinize kendilerini &ouml;zel hissettirebilirsiniz. Beyaz yaprakları ve tomurcuklarıyla baharı m&uuml;jdeleyen orkide sayesinde, sevdiklerinize sevginiz kadar uzun &ouml;m&uuml;rl&uuml; bir hediye verebilirsiniz. Baharın enerjisini taşıyan 2 Dal Beyaz Orkide ile sevdiklerinizle mutluluğunuzu paylaşmanın keyfini yaşayabilirsiniz.</p>\r\n\r\n<p>2 Dal Beyaz Orkidenin&nbsp;G&ouml;z Alıcılığıyla Dikkat &Ccedil;ekin</p>\r\n\r\n<p>Seramik bir saksıda &ouml;zenle yetiştirilen beyaz orkideler dikkat &ccedil;eken hediyeler arasında yer alıyor. Siz de sevdiklerinize sadakatinizi ve sevginizi g&ouml;stermek i&ccedil;in orkidenin masumiyetinden yararlanabilirsiniz. Yılda birka&ccedil; kez &ccedil;i&ccedil;ek a&ccedil;an orkideleri sevdiklerinize kalıcı bir hatıra olarak armağan edebilirsiniz. Orkidelerin g&uuml;c&uuml;nden ilham alan hediyeniz ile sevdiklerinizi mutlu etmenin ayrıcalığını yaşayabilirsiniz. 2 Dal Beyaz Orkide&#39;yi, &Ccedil;i&ccedil;ekSepeti&rsquo;nin sizlere sunduğu uygun fiyatlarla sipariş edebilir, aynı g&uuml;n i&ccedil;inde teslim avantajı ile sevdiklerine s&uuml;rpriz yapabilirsiniz</p>\r\n', 99.00, '', 15, 'gold,flower', '1', '0', 'dimg/product/27793222892465524838at773-1-8d8231b81603127-714671d1.jpg'),
(33, 1, '2021-03-24 01:26:18', 'Lavanta', 'lavanta', '<p>El yapımı saksıda kuru lavanta. &Uuml;r&uuml;n &ouml;i&ccedil;&uuml;leri ( saksı ve lavanta ile beraber) yaklaşık : 15x20 cm. Lavantanın doğal rengi kaybetmemesi i&ccedil;in renkli pigment kullanmakta. S&uuml;slemede kullanılan kuru &ccedil;i&ccedil;ekler mevsime g&ouml;re farklılık g&ouml;sterebilir.</p>\r\n', 45.00, '', 55, 'flower,rose', '1', '0', 'dimg/product/30118261702933930253mor-saksida-kuru-lavanta-kc27433-1-1.jpg'),
(35, 3, '2021-03-25 14:32:38', 'Porselen Görünümlü Saksıda Limon Ağacı', 'porselen-gorunumlu-saksida-limon-agaci', '<p>&Uuml;r&uuml;n &Ouml;zellikleri : &Uuml;r&uuml;n Boy : 39 cm &Uuml;r&uuml;n Saksı Boyu : 12 Cm &Uuml;r&uuml;n A&ccedil;ıklaması :</p>\r\n\r\n<p>Minimalist porselen g&ouml;r&uuml;n&uuml;ml&uuml; saksıda limon. Masa&uuml;st&uuml; , raf, balkon &ccedil;i&ccedil;eği olarak ve daha fazlası opsiyonel kullanım alanı ile yaratıcılığınızın sınırlarını zorlayabileceğiniz, yaşam alanınızı renklendirebileceğiniz yegane tercihiniz.</p>\r\n', 85.00, '', 258, 'flower,rose', '1', '1', 'dimg/product/2628329297286142323421408259842764330001porselen-gorunumlu-saksida-limon-demet-yapay-bitki-kc6836400-1-e8fb911b918942feb4c948da311f4f38.jpg'),
(36, 7, '2021-03-25 14:35:21', 'Mutluluk Teraryum', 'mutluluk-teraryum', '<p>Cam fanus i&ccedil;erisinde yapay bitkiler ve sevimli objeler kullanarak hazırladığımız teraryum modelimiz. Sevdiklerinize kalıcı ve g&uuml;l&uuml;mseten bir hediye g&ouml;ndermek isterseniz, hemen online siparişinizi oluşturabilirsiniz. Deniz efekti, sevimli &ccedil;ift ve balonlu ev objesi ile renkli teraryum anında adresinizde.<br />\r\nEn: 18 cm<br />\r\nBoy: 20 cm</p>\r\n', 99.00, '', 15, 'fruit,flower,cart', '1', '0', 'dimg/product/2531921480223802696224399210902631927026sevgili-img_0995_9831191375.jpg'),
(37, 3, '2021-03-25 14:37:48', 'Citrus Mandalina Bitkisi', 'citrus-mandalina-bitkisi', '<p>Seramik dekoratif kırık beyaz saksı i&ccedil;erisinde&nbsp;Citrus Mandalina bitkisi&nbsp;bol meyveleri ile olduk&ccedil;a g&uuml;zel g&ouml;r&uuml;n&uuml;yor. Minyat&uuml;r, turuncu meyveli mandalina bitkisinin şık g&ouml;rseli ev veya iş yerlerinde ortama pozitif değer katacaktır. Turun&ccedil;gillerden Citrus mandalina kalıcı ve dayanıklı olduğu i&ccedil;in en g&uuml;zel hediye se&ccedil;eneğidir.</p>\r\n\r\n<p>Y&uuml;k: 30-35 cm</p>\r\n', 99.00, '', 125, 'fruit,flower,cart', '1', '1', 'dimg/product/29001245152478325379mandalina-bitkisi.jpg'),
(38, 14, '2021-03-25 14:42:58', 'Beyaz Papatya Aranjmanı', 'beyaz-papatya-aranjmani', '<p>Beyaz Papatya :&nbsp;40 Adet</p>\r\n\r\n<p>Papatya fallarının cevap beklenen sorusu: Seviyor mu yoksa sevmiyor mu? Bu test sonucu ne kadar doğru &ccedil;ıkar bilinmez ama sevdiklerinize g&ouml;ndereceğiniz bir buket mis kokulu papatya ile sorularınıza daha net cevaplar alabileceğinizi kabul etmek gerek. Konik Vazoda Beyaz Papatya Aranjmanı i&ccedil;erisinde mis kokulu 55&nbsp;adet beyaz papatya yer alıyor ve mutlu etmek i&ccedil;in hazır bekliyor!</p>\r\n', 86.00, '', 100, 'flower,rose', '1', '1', 'dimg/product/25438318152072320267at3890-1-8d6d3b14df9bc72-5371623d.jpg'),
(39, 14, '2021-03-25 14:44:18', 'Sarı Beyaz Papatya Aranjman', 'sari-beyaz-papatya-aranjman', '<p>Beyaz Papatya :&nbsp;42 AdetSarı Papatya :&nbsp;20 Adet</p>\r\n\r\n<p>Bizler i&ccedil;in daima en iyiyi, en g&uuml;zeli isteyen biricik annelerimiz, her zaman her şeyin en g&uuml;zelini hak ederler. Bug&uuml;n annenizin y&uuml;z&uuml;n&uuml; en g&uuml;zel &ccedil;i&ccedil;ekler olan papatyalar ile g&uuml;ld&uuml;rmeye ne dersiniz? Canım Annem yazılı bir vazo i&ccedil;erisinde 42 adet beyaz, 20 adet sarı papatya ile hazırlanan Canım Annem Stickerlı Sarı Beyaz Papatya Aranjmanı, annelerinizin y&uuml;zlerini g&uuml;ld&uuml;recek mis kokulu bir s&uuml;rpriz.</p>\r\n', 78.00, '', 104, 'fruit,flower,cart', '1', '1', 'dimg/product/22859319413102328123canim-annem-stickerli-sari-beyaz-papatya-aranjmani-at3329-1-8d41d26e954b0c5-cf6977a0.jpg'),
(40, 14, '2021-03-25 14:47:17', 'Kış Güneşi Sarı Papatya', 'kis-gunesi-sari-papatya', '<p>Sarı Papatya :&nbsp;55 Adet</p>\r\n\r\n<p>&Ouml;zel fanusunda&nbsp;suyun&nbsp;i&ccedil;inde hayat bulan &nbsp;sarı papatyalar ile, sevdiğinize d&ouml;rt mevsim g&uuml;neşin enerjisini armağan edin. Kış g&uuml;neşi sarı papatya, sevdiklerinize kocaman bir g&uuml;l&uuml;mseme hediye etmek i&ccedil;in sizi bekliyor.</p>\r\n', 99.00, '', 15, 'fruit,flower,cart,love', '1', '1', 'dimg/product/22061239382409331072at2926-1-8d794eae8bf2ca3-186ee5b3.jpg'),
(41, 17, '2021-03-25 15:03:38', 'Antoryum Çiçeği Beyaz', 'antoryum-cicegi-beyaz', '<p>Saksı: Beyaz Dekoratif Saksı</p>\r\n\r\n<p>Renk : Ateş Kırmızısı</p>\r\n\r\n<p>Antoryum &Ccedil;i&ccedil;eği</p>\r\n\r\n<p>Antoryum kırmızı g&uuml;zel renklerde sağlam bir bitkidir. tarafından sunulan bu Antoryum (Flamingo &Ccedil;i&ccedil;eği), klasik veya modern i&ccedil; mekanlardaki &ouml;zel renklendirmeleri nedeniyle her yerde harika g&ouml;r&uuml;necek. Y&uuml;ksekliği 50 cm olan Antoryum ger&ccedil;ek bir g&ouml;z alıcı!</p>\r\n', 45.00, '', 55, 'fruit,flower,cart', '1', '', 'dimg/product/2529625672233672958225686263432071224981antoryum-cicegi-beyaz-dekoratif-saksili-kc2207770-1-96ec260793234ba1b12d3c9b98cc0648.jpg'),
(42, 1, '2021-03-26 15:20:56', 'Buxus Bonsaisi', 'buxus-bonsaisi', '<p>Bu orijinal tasarım yıllarca unutulmayacak eşsiz bir hediye arayanlar i&ccedil;in canlı bitkiler ve ahşap mobilyalarla hazırlanmıştır. El emeği ile &uuml;retilen şeyler her zaman &ouml;zeldir. Minyat&uuml;r bah&ccedil;eniz, b&uuml;y&uuml;k bir fedakarlıkla &ccedil;alışan tıp mensupları i&ccedil;in &ouml;zenle se&ccedil;ilen bitkiler ve tek tek elde hazırlanan aksesuarlarla tamamlanır. Minyat&uuml;r bah&ccedil;e, yaklaşık 20 x 20 cm &ccedil;apında benzer formdaki porselen ya da seramik kaplarda Buxus Serpervirens &ndash; Bonsai t&uuml;r&uuml; bitki ile hazırlanır. Bah&ccedil;ede el yapımı ahşap masa ve sandalye takımı, masa &uuml;zerinde minyat&uuml;r kitap &quot;Best Doctor Ever&quot; (D&uuml;nyanın En İyi Doktoru) ve el yapımı minyat&uuml;r stetoskop yer alır. Zeminde ise &ccedil;akıl taşları, el yapımı mantar ve ahşap kırmızı bambi fig&uuml;r&uuml; yer alır. Zarif hediyeniz, &ldquo;Kişiye &Ouml;zel&rdquo; hazırlanan şık bir bah&ccedil;e tabelası ile tamamlanmaktadır. B&uuml;y&uuml;k b&ouml;l&uuml;m&uuml; tek tek elde hazırlanan minyat&uuml;r aksesuarların tasarımlarında değişiklikler ya da milimetrik &ouml;l&ccedil;&uuml; farklılıkları bulunabilir. Bakım: Minyat&uuml;r bitki canlıdır. Bol g&uuml;n ışığı alan dış mekanlar i&ccedil;in uygundur. Bah&ccedil;e zeminindeki bitki doğaldır ancak canlı değildir. Sulama ve bakım ihtiyacı yoktur. Zamanla renk ve hacmini kaybedebilir.</p>\r\n', 99.00, '', 120, 'buxus,bonsai', '1', '1', 'dimg/product/22505303862687327555kisiye-ozel-tasarim-doktorlar-icin-buxus-bonsaisi-kc422568-1-1.jpg'),
(43, 1, '2021-03-26 15:23:43', 'White World', 'white-world', '<p>Tamamen el yapımı olarak &ouml;zel hazırlanan, aynı zamanda dekoratif olan bu &ouml;zel tasarımda Buxus Bonsai kullandık. &Uuml;r&uuml;n Bakımı İ&ccedil;in , Yarı aydınlık ve direkt g&uuml;neş ışığı almayan bir yere koyulmalı,Sulama yaparken;su toprağın her tarafına ulaştırılmalıdır. Not :&Uuml;zerine eklenecek yazı kraft baskı ile yapılmaktadır. &Uuml;r&uuml;n &Ouml;l&ccedil;&uuml;leri 17 x 20 cm&#39;dir.</p>\r\n', 99.00, '', 56, 'buxus,bonsai,white', '1', '1', 'dimg/product/27730299482012229267white-world-serisi-buxus-bonsai-kc8465786-1-1faeeb9ed3f04c9280725989c452cffe.jpg'),
(44, 3, '2021-03-26 15:27:30', 'Pilea Peperomioides', 'pilea-peperomioides', '<p>Pilea Peperomioides - &Ccedil;in Para Bitkisi - İthal Bitki</p>\r\n\r\n<p>Bitki plastik &uuml;retim saksılarında g&ouml;nderilecektir.</p>\r\n\r\n<p>Saksı &ccedil;apı 12 cm dir.</p>\r\n\r\n<p>Son Yılların En pop&uuml;ler bitkilerinden olan Pilea, T&uuml;rk&ccedil;e&#39;mizde &Ccedil;in para bitkisi ve Misyoner &ccedil;i&ccedil;eği olarak yer etmiştir.</p>\r\n\r\n<p>Işık ge&ccedil;irgen yaprağının g&uuml;zelliği ile pop&uuml;ler olan Pilea aslında bakımı basit bitkiler arasındadır,<br />\r\nDirekt g&uuml;neş ışığına maruz kalmamalı ve toprağını az miktarda nemli tutmak yeterlidir.</p>\r\n\r\n<p>Bakım &ouml;nerilerine aşağıdaki yazımızdan ulaşabilirsiniz,</p>\r\n\r\n<p>Fidanburada&nbsp;Pilea Peperomioides&nbsp;- &Ccedil;in Para Bitkisi Bakım &Ouml;nerileri</p>\r\n\r\n<p>&middot;Optimal sağlıklı bir Pilea i&ccedil;in her iki yılda bir saksı ve toprağını değiştirmek yeterlidir.</p>\r\n\r\n<p>&middot;Pilea&#39;nızın saksı-toprağını değiştirirken drenajı iyi olan &ccedil;ok ama&ccedil;lı veya tropikal torf-toprak karışımlarını kullanmanız yeterlidir<br />\r\nSaksı değişimi esnasında Ana bitkinin k&ouml;k yanlarından gelen k&uuml;&ccedil;&uuml;k filizleri k&ouml;k&uuml;nden ayırarak farklı bir saksıya<br />\r\naktardığınızda Pilea&rsquo;nızı &ccedil;oğalmış olursunuz, Saksı değişimi i&ccedil;in en ideal zaman bahar aylarıdır.</p>\r\n\r\n<p>&middot;Doğrudan g&uuml;neş ışığına maruz kalmamalı, Kuzey ve doğu penceresinin &ouml;n&uuml;nde d&uuml;ş&uuml;k veya orta ışık seviyesinde iyi şekilde gelişecektir.</p>\r\n\r\n<p>Pilea bitkinizi G&uuml;neye veya batıya bakan pencere &ouml;nlerinde yetiştirmek isterseniz mutlaka filtre edilmiş g&uuml;n ışığı olmalıdır,<br />\r\n&ouml;zellikle yaz aylarında direkt g&uuml;neş ışığına maruz kalmamalıdır.</p>\r\n', 99.00, '', 12, 'pilea', '1', '1', 'dimg/product/27941240232887421678pilea-peperomioides-cin-para-bitkisi-thal-buyuk-boy-kc8458069-1-2c78162d87614e249437983d5d5aa05a.jpg'),
(45, 3, '2021-03-26 15:30:55', 'Hava Bitkisi', 'hava-bitkisi', '<p>Saksı : Beyaz Dekoratif Saksı Hava bitkileri, sadece bir yere tutunmak i&ccedil;in k&ouml;k benzeri uzantılar geliştirirler ancak bunlar normal bildiğimiz bitkilerdeki k&ouml;klerin vazifesini g&ouml;rmezler. Hava bitkileri su ve besin ihtiya&ccedil;larını s&uuml;nger dokulu yapraklarından alırlar. Neredeyse tamamı yıl i&ccedil;inde renk değiştirirler. &Ouml;zellikle &ccedil;i&ccedil;ek a&ccedil;maya yakın kırmızı, mor gibi g&ouml;z alıcı renklere b&uuml;r&uuml;n&uuml;rler.</p>\r\n', 99.00, '', 18, 'Tullandsia', '1', '0', 'dimg/product/20813304082307030652hava-bitkisi---tullandsia-dekoratif-saksili-kc9523363-1-005e392e862c43168b555f9698929640.jpg'),
(46, 17, '2021-03-26 15:35:04', ' Kokulu Lavanta Mor', 'kokulu-lavanta-mor', '<p>Mor seramik saksıda kuru kokulu lavanta tasarımı. &Uuml;r&uuml;n 15x18 cm boyutta.</p>\r\n', 89.00, '', 55, 'gold,flower', '1', '0', 'dimg/product/31880226163072121855mor-seramik-saksida-kokulu-lavanta-mor-kc456139-1-bc7f1f85191942009302b9b16dd3bb1f.jpg'),
(47, 8, '2021-03-26 15:50:04', 'Retro Pre Bonsai', 'retro-pre-bonsai', '<p>&Uuml;r&uuml;n y&uuml;ksekliği yaklaşık 20-25 cmdir. Doğrudan g&uuml;neş ışığına maruz bırakılmamalıdır. Bonsai bitkisi kıs aylarında yaprakları turuncu bakır rengını alabilmektedirBonsai bitkilerinin toprağı az ve k&ouml;kleri k&uuml;&ccedil;&uuml;k olduğu i&ccedil;in toprağı s&uuml;rekli olarak nemli tutulmalı . Aydınlık bir yerde bulundurmalıdır</p>\r\n', 86.00, '', 55, 'bonsai,saksı,flower', '1', '1', 'dimg/product/22670261263070227550siyah-retro-pre-buxus-bonsai-kc8027307-1-388a0d7b30b6495fb2a4926afa1e1913.jpg'),
(48, 24, '2021-03-29 21:37:25', 'Turuncu Güller', 'turuncu-guller', '<p>Turuncu &Ccedil;ardak G&uuml;l :&nbsp;24 Adet</p>\r\n\r\n<p>Bir hediye g&ouml;ndereyim hem dikkat &ccedil;eksin hem de g&ouml;rd&uuml;ğ&uuml;nde mutluluktan havalara u&ccedil;sun mu diyorsunuz? O zaman turuncu g&uuml;llerden oluşan bu &ccedil;i&ccedil;ek buketi tam olarak aradığınız hediye olacaktır. Mutluluk verici, &ccedil;arpıcı, insanın i&ccedil;ini kıpır kıpır yapan turuncu rengin &ccedil;ekiciliği g&uuml;llerin aşkı, sevgiyi ve cesareti simgeleyen g&uuml;zelliği ile buluşunca ortaya adeta heyecan kasırgası &ccedil;ıkıyor. Siz de sevdiklerinizin g&ouml;zlerindeki heyecan parıltısını doruklara &ccedil;ıkartacak tutkulu bir hediye vermek i&ccedil;in hemen &Ccedil;i&ccedil;ekSepeti&rsquo;nden sipariş oluşturabilirsiniz. Aynı g&uuml;n g&ouml;nderim ve farklı &ouml;deme se&ccedil;enekleriyle sevdiklerinizi mutlu etmek olduk&ccedil;a kolay.&nbsp;</p>\r\n\r\n<p><br />\r\nBukette yer alan bazı &ccedil;i&ccedil;ekler, mevsimsel şartları sebebiyle &ccedil;i&ccedil;ek a&ccedil;mamış halde, kapalı olarak g&ouml;nderilebilir. Kapalı olan &ccedil;i&ccedil;ekler 1-2 g&uuml;n i&ccedil;erisinde, oda sıcaklığında a&ccedil;maktadır.</p>\r\n', 99.00, '', 55, 'flower,rose', '1', '0', 'dimg/product/31217238962194720516turuncu-guller-cicek-buketi-at4282-1-20fdb9ed91b04ccfb17c3843bd6bc926.jpg'),
(49, 24, '2021-03-29 21:39:08', 'Renkli Çiçek Buketi', 'renkli-cicek-buketi', '<p>Lilarenk G&uuml;l :&nbsp;3 Adet</p>\r\n\r\n<p>Yeşil Bi&ccedil;me :&nbsp;18 Adet</p>\r\n\r\n<p>İlk g&ouml;r&uuml;şte aşka inanır mısınız? Bir r&uuml;zgar eser, bir k&ouml;şe d&ouml;n&uuml;l&uuml;r ve karşınızda birisi olur. O an zaman ve mekan belki de hi&ccedil; olmadığı kadar i&ccedil; i&ccedil;edir. Sizin i&ccedil;in hayat artık o andan &ouml;nce ve sonrası olarak tamamen değişir. Eğer ilk g&ouml;r&uuml;şte aşka inanmıyorsanız bile bazı kişileri ilk g&ouml;rd&uuml;ğ&uuml;n&uuml;z andan itibaren &ccedil;ok etkilenirsiniz ve s&uuml;rekli birlikte olmak, bir şeyler paylaşmak ve hislerinizi anlatmanın bir yolunu bulmak isterseniz. İşte size hislerinizi anlatmanın ve sevdiğiniz kişiyi b&uuml;y&uuml;lemenin en etkili yolu: &Ccedil;i&ccedil;ekSepeti&rsquo;nin &ouml;zel olarak hazırladığı Renkli &Ccedil;i&ccedil;ek Buketi. Sevdiğinize &ccedil;ok &ouml;zel olduğunu ve onun hayatınızdaki eşsiz yerini hissettirecek g&uuml;ller ve bi&ccedil;melerden oluşan &ccedil;i&ccedil;ek buketine birka&ccedil; kelimelik not ekleyerek hislerinizi daha anlamlı bir hale getirebilirsiniz.</p>\r\n', 89.00, '', 125, 'flower,rose', '1', '0', 'dimg/product/24681235842914922453renkli-cicek-buketi-at4279-1-107a670194bf4a1796f637a19e5b549c.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_logo` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `setting_url` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_title` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `setting_description` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `setting_keywords` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_author` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `setting_phone` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_fax` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_district` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_province` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_address` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `setting_shift` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `setting_maps` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `setting_analystic` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `setting_zopim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `setting_facebook` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_twitter` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_google` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_youtube` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_smtphost` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_smtpuser` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_smtppassword` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_smtpport` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_maintenance` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_logo`, `setting_url`, `setting_title`, `setting_description`, `setting_keywords`, `setting_author`, `setting_phone`, `setting_gsm`, `setting_fax`, `setting_mail`, `setting_district`, `setting_province`, `setting_address`, `setting_shift`, `setting_maps`, `setting_analystic`, `setting_zopim`, `setting_facebook`, `setting_twitter`, `setting_google`, `setting_youtube`, `setting_smtphost`, `setting_smtpuser`, `setting_smtppassword`, `setting_smtpport`, `setting_maintenance`) VALUES
(0, 'dimg/30316logo.PNG', '', 'Lively Garden', 'Lively Garden', 'shop,ecommerce,shopping,flower', 'RABİA DEMİR', '0850 000 16 28', '0850 000 16 28', '0850 000 16 25', 'info@livelygarden.com.tr', 'Şişli', 'İSTANBUL', 'Astoria AVM', '7x24 Open', 'setting_maps_api', 'setting_analystic_api', 'setting_zopim', 'www.facebook.com', 'www.twitter.com', 'www.google.com', 'www.youtube.com', 'smtp.gmail.com', 'livelygarden7@gmail.com', '12345678lively', '587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `slider_imgpath` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_order` int(2) NOT NULL,
  `slider_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `slider_description` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_name`, `slider_imgpath`, `slider_order`, `slider_link`, `slider_status`, `slider_description`) VALUES
(3, 'Citrus Mandalina Bitkisi', 'dimg/slider/20945273892844229974mandalina-bitkisi.jpg', 0, 'http://localhost:8080/finalProject/product-citrus-mandalina-bitkisi-37', '1', 'Seramik dekoratif kırık beyaz saksı içerisinde Citrus Mandalina bitkisi bol meyveleri ile oldukça güzel görünüyor. Minyatür, turuncu meyveli mandalina bitkisinin şık görseli ev veya iş yerlerinde ortama pozitif değer katacaktır. Turunçgillerden Citrus mandalina kalıcı ve dayanıklı olduğu için en güzel hediye seçeneğidir.'),
(4, 'Mutluluk Teraryum', 'dimg/slider/2932028186274012008324399210902631927026sevgili-img_0995_9831191375.jpg', 1, 'http://localhost:8080/finalProject/product-mutluluk-teraryum-36', '1', 'Cam fanus içerisinde yapay bitkiler ve sevimli objeler kullanarak hazırladığımız teraryum modelimiz. Sevdiklerinize kalıcı ve gülümseten bir hediye göndermek isterseniz, hemen online siparişinizi oluşturabilirsiniz. Deniz efekti, sevimli çift ve balonlu ev objesi ile renkli teraryum anında adresinizde.'),
(6, 'Porselen Görünümlü Saksıda Yapay Limon Ağacı', 'dimg/slider/3150023969239153193721408259842764330001porselen-gorunumlu-saksida-limon-demet-yapay-bitki-kc6836400-1-e8fb911b918942feb4c948da311f4f38.jpg', 3, 'http://localhost:8080/finalProject/product-porselen-gorunumlu-saksida-yapay-limon-agaci-35', '1', 'Minimalist porselen görünümlü saksıda limon. Masaüstü , raf, balkon çiçeği olarak ve daha fazlası opsiyonel kullanım alanı ile yaratıcılığınızın sınırlarını zorlayabileceğiniz, yaşam alanınızı renklendirebileceğiniz yegane tercihiniz.'),
(7, 'Antoryum Çiçeği Beyaz Dekoratif Saksılı', 'dimg/slider/3095321107236492798725686263432071224981antoryum-cicegi-beyaz-dekoratif-saksili-kc2207770-1-96ec260793234ba1b12d3c9b98cc0648.jpg', 2, 'http://localhost:8080/finalProject/product-antoryum-cicegi-beyaz-dekoratif-saksili-41', '1', 'Antoryum kırmızı güzel renklerde sağlam bir bitkidir. tarafından sunulan bu Antoryum (Flamingo Çiçeği), klasik veya modern iç mekanlardaki özel renklendirmeleri nedeniyle her yerde harika görünecek. Yüksekliği 50 cm olan Antoryum gerçek bir göz alıcı!'),
(10, 'Mixed Meyve Sepeti', 'dimg/slider/28860246382040521982mixed-fruit-meyve-sepeti-kc5676160-1-72d8119b0dea4d7a9962b48c4dc314c1.jpg', 12, 'http://localhost:8080/finalProject/product-mixed-meyve-sepeti-15', '1', ' Mixed Fruit Meyve Sepeti ile küslükler son bulacak, sürprizler daha anlamlı olacak, hediyenize herkes bayılacak! Mixed Fruit Meyve Sepeti\'nde ortalama 10 adet fresh ananas, ortalama 55 adet üzüm tanesi, ortalama 7 adet çikolataya batırılmış çilek, ortalama 15 adet fresh çilek, ortalama 7 adet çikolatalı elma dilimi, ortalama 3 adet portakal dilimi bulunmaktadır.'),
(11, 'Kokulu Lavanta Mor', 'dimg/slider/22867226733028629868mor-saksida-kuru-lavanta-kc27433-1-1.jpg', 1, 'http://localhost:8080/finalProject/product-kokulu-lavanta-mor-46', '1', 'Mor seramik saksıda kuru kokulu lavanta tasarımı. Ürün 15x18 cm boyutta.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_image` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_tc` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `user_nickname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `user_address` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `user_district` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_province` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_degree` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_authority` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_status` int(1) NOT NULL,
  `user_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `user_time`, `user_image`, `user_tc`, `user_nickname`, `user_mail`, `user_gsm`, `user_name`, `user_address`, `user_district`, `user_province`, `user_degree`, `user_authority`, `user_status`, `user_password`) VALUES
(455, '2021-03-16 19:46:45', '', '41725614785', 'admin', 'rabiadem78@gmail.com', '05427241787', 'Rabia Demir', '', 'Melikgazi', 'Kayseri', '', '1', 1, '827ccb0eea8a706c4c34a16891f84e7b'),
(14752, '2021-03-17 14:15:58', '', '45215625666', 'user1', 'user1@gmail.com', '05427241621', 'Alparslan Demir', '', '', 'İstanbul', '', '2', 1, 'e10adc3949ba59abbe56e057f20f883e'),
(51239, '2021-03-18 15:48:10', '', '41725614787', '', 'cansu@gmail.com', '05427245662', 'Cansu Erdem', '', '', '', '', '1', 0, 'e10adc3949ba59abbe56e057f20f883e'),
(51240, '2021-03-18 16:27:48', '', '452359564133', '', 'aysun@gmail.com', '05865942563', 'Aysun Erdem', '', 'Kadıköy', 'İstanbul', '', '2', 1, 'e10adc3949ba59abbe56e057f20f883e'),
(51241, '2021-03-18 16:38:16', '', '154256326625', '', 'hatice@gmail.com', '05428564596', 'Hatice Boran', '', 'çankaya', 'ankara', '', '2', 1, 'e10adc3949ba59abbe56e057f20f883e'),
(51242, '2021-03-19 14:10:28', '', '12345223699', '', 'eray@gmail.com', '05348564527', 'Eray Aydın', '', 'Bergama', 'İzmir', '', '2', 1, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Tablo için indeksler `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Tablo için indeksler `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Tablo için indeksler `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderdetail_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450016;

--
-- Tablo için AUTO_INCREMENT değeri `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51247;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
