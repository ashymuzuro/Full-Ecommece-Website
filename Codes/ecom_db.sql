-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 09:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(12, 'Consumer Electronics'),
(13, 'Apparel'),
(14, 'Vehicles & Accessories'),
(15, 'Sports & Entertainment'),
(16, 'Machinery'),
(17, 'Home & Garden'),
(18, 'Beauty & Personal Care'),
(19, 'Agriculture & Food');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(1, 345, '345354', 'Completed', 'CNY'),
(2, 346, '34565464', 'Completed', 'CNY'),
(3, 35, '876546', 'Completed', 'CNY'),
(4, 34, '3456546', 'Completed', 'CNY'),
(5, 55, '8765454', 'Completed', 'CNY'),
(6, 345, '345354', 'Completed', 'CNY'),
(7, 345, '345354', 'Completed', 'CNY'),
(8, 3457, '3453954', 'Completed', 'CNY'),
(9, 3457, '3453954', 'Completed', 'CNY'),
(10, 3457, '3453954', 'Completed', 'CNY'),
(11, 3457, '3453954', 'Completed', 'CNY'),
(12, 3457, '3453954', 'Completed', 'CNY'),
(13, 3457, '3453954', 'Completed', 'CNY'),
(14, 3457, '3453954', 'Completed', 'CNY'),
(15, 345, '345354', 'Completed', 'CNY'),
(16, 345, '345354', 'Completed', 'CNY'),
(17, 345, '345354', 'Completed', 'CNY'),
(18, 345, '345354', 'Completed', 'CNY'),
(19, 349895, '3453549', 'Completed', 'CNY'),
(20, 349895, '3453549', 'Completed', 'CNY'),
(21, 349895, '3453549', 'Completed', 'CNY'),
(22, 349895, '3453549', 'Completed', 'CNY'),
(23, 349895, '3453549', 'Completed', 'CNY'),
(24, 349895, '3453549', 'Completed', 'CNY'),
(25, 349895, '3453549', 'Completed', 'CNY'),
(26, 349895, '3453549', 'Completed', 'CNY'),
(27, 349895, '3453549', 'Completed', 'CNY'),
(28, 349895, '3453549', 'Completed', 'CNY'),
(29, 349895, '3453549', 'Completed', 'CNY'),
(30, 349895, '3453549', 'Completed', 'CNY'),
(31, 349895, '3453549', 'Completed', 'CNY'),
(32, 349895, '3453549', 'Completed', 'CNY'),
(33, 349895, '3453549', 'Completed', 'CNY'),
(34, 349895, '3453549', 'Completed', 'CNY'),
(35, 349895, '3453549', 'Completed', 'CNY'),
(36, 349895, '3453549', 'Completed', 'CNY'),
(37, 349895, '3453549', 'Completed', 'CNY'),
(38, 349895, '3453549', 'Completed', 'CNY'),
(41, 345, '345354', 'Completed', 'CNY');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`) VALUES
(62, 'Italian Chianti Wine 75', 19, 95, 6, 'Wine is an alcoholic drink typically made from fermented grape juice.', 'Wine is an alcoholic drink typically made from fermented grape juice.', 'Italian Chianti Wine 75.jpg'),
(63, 'Chinese Tsao', 19, 80.45, 80, 'Yeast consumes the sugar in the grapes and converts it to ethanol, carbon dioxide, and heat. ', 'Yeast consumes the sugar in the grapes and converts it to ethanol, carbon dioxide, and heat. ', 'Unique local products.jpg'),
(64, ' Johnnie Walker Blue Label', 19, 300, 300, 'Johnnie Walker is a brand of Scotch whisky now owned by Diageo that originated in the Scottish burgh of Kilmarnock in East Ayrshire. The brand was first established by grocer John Walker.', 'Johnnie Walker is a brand of Scotch whisky now owned by Diageo.', 'Johnnie Walker Blue Label .jpg'),
(65, 'Rioja Alavesa', 19, 450, 80, 'Rioja is the best-known region for quality Spanish red wine. Located in Northern Spain, the Rioja DO is made up of three distinct zones: Rioja Alta, Rioja Alavesa and Rioja Baja.', 'Rioja is the best-known region for quality Spanish red wine', 'Spain Red Wine.jpg'),
(66, 'Cheap Beer / Lager Beer / 033ml ', 19, 15.55, 1000, '500ml Top quality', '500ml Top quality', 'Gunthers.jpg'),
(67, 'Frozen Collagen', 18, 100, 250, 'This product has no side effects and has been proven to be safe for use. It\'s also FDA approved and Halal certified, so unless you are specifically allergic to any ingredient on the list, then this product is safe to use.', 'This product has no side effects and has been proven to be safe for use. It\'s also FDA approved and Halal certified.', 'Frozen Collagen.jpg'),
(68, 'Vanilla Milk Powder', 18, 80.6, 45, 'Wansongtang fat blaster shake Control diet with vanilla milk substitute milkshake powder.', 'Vanilla milk substitute milkshake powder.', 'FatBlaster.jpg'),
(69, '100ml Neon Private Label High Pigment', 18, 300, 900, '100ml Neon Private Label High Pigment Makeup Nursing Repair Tattoo Micropigmentation Pigments Oemodm Ink Paper Pulp.', '100ml Neon Private Label High Pigment Makeup Nursing Repair Tattoo Micropigmentation .', 'Tattoo Pigment.jpg'),
(70, ' Home Fragrance Reed Diffuser', 17, 18.4, 78, 'High quality home fragrance reed diffuser with rattan sticks for gift ', 'High quality home fragrance reed diffuser with rattan sticks for gift ', 'Home Fragment.jpg'),
(71, 'Multi Function Desk Clock ', 17, 95, 98, 'Multi function desk clock simple modern electronic clock cartoon alarm clock .', 'Multi function desk clock simple modern electronic clock cartoon alarm clock .', 'Old Clock.jpg'),
(72, '4k Projector Screen Projection ', 12, 5599, 80, 'WP 90inch ust alr screen pet crystal 4k projector screen projection screens home theatres format 16:9, High gain:0.6 \r\n', 'Screen pet crystal 4k projector screen projection screens.', 'tv.jpg'),
(74, 'XDCAM Professional Camcorder', 12, 4700, 90, 'Brand New Sealed 4K XDCAM Professional Camcorder.', 'Brand New Sealed 4K XDCAM Professional Camcorder .', 'Camcoder.jpg'),
(75, 'Waterproof Smart Watch', 12, 15.45, 300, '1.28 inch full circle color screen waterproof smart watch sport smart bracelet fitness tracker heart rate and blood pressure .', '1.28 inch full circle color screen waterproof smart watch sport smart bracelet fitness tracker heart rate and blood pressure .', 'Smart Watch.jpg'),
(76, 'BK Smart Watch 2020 Bluetooth', 12, 45, 125, 'BK Smart Watch 2020 Bluetooth 1.75 Inch 320*385 Temperature Men Sports Smartwatch.', 'BK Smart Watch 2020 Bluetooth 1.75 Inch 320*385 Temperature Men Sports Smartwatch.', 'BK Watch.jpg'),
(77, '3d VR Headset ', 12, 250, 2, '3d vr headset virtual reality gaming headset type vr glasses 3d vr glasses .', '3d vr headset virtual reality gaming headset type vr glasses 3d vr glasses.', 'VR Sets.jpg'),
(78, 'TLW025A Smart Watch', 12, 35.56, 50, 'new arrival TLW025A smart watch blood pressure heart rate monitor ', 'new arrival TLW025A smart watch blood pressure heart rate monitor ', 'Mi.jpg'),
(79, 'Outdoor Microwave Sensor', 12, 25.45, 80, 'Japanese high quality hot sale led outdoor microwave sensor motion ', 'Japanese high quality hot sale led outdoor microwave sensor motion ', 'Speaker.jpg'),
(80, 'Super Mini Wireless ', 12, 40.5, 60, 'Super Mini Wireless TWS Bluetooth Speaker Hifi Stereo Music Loud Speaker TV Gaming Partner Cheap Corporate Gifts ', 'Super Mini Wireless TWS Bluetooth Speaker Hifi Stereo Music Loud Speaker TV Gaming Partner Cheap Corporate Gifts ', 'Mini Speaker.jpg'),
(81, 'Women Casual Dress ', 13, 30.56, 90, 'Clothes women casual dress lady elegant dresses women Floral dress ', 'Clothes women casual dress lady elegant dresses women Floral dress ', 'Red Women Casual.jpg'),
(82, 'KMDD144 Autumn', 13, 49.99, 800, 'KMDD144 Autumn and winter women striped women sweater casual cardigan', 'KMDD144 Autumn and winter women striped women sweater casual cardigan', 'Mixed Casual.jpg'),
(83, 'KHS2109 Women', 13, 58, 34, 'KHS2109 Women loose camouflage sports multi pocket stretch casual cargo pants ', 'KHS2109 Women loose camouflage sports multi pocket stretch casual cargo pants ', 'Camflash Women.jpg'),
(84, 'WEIXIN Womens Clothing ', 13, 300, 45, 'WEIXIN Womens Clothing Hot Sun X Princess Polly Floral Cami Slip Mini Casual Print Dress ', 'WEIXIN Womens Clothing Hot Sun X Princess Polly Floral Cami Slip Mini Casual Print Dress ', 'Weixin Cloths.jpg'),
(85, 'Maxi Dress Woman', 13, 36.78, 230, 'Cotton embroidered Maxi dress Woman Boho Floral Embroidered Long Gown Maxi ', 'Cotton embroidered Maxi dress Woman Boho Floral Embroidered Long Gown Maxi ', 'Boho Floral Women.jpg'),
(86, 'Women Casual Elegant', 13, 46.24, 245, 'Women Casual Elegant Floral Print Dress For Party', 'Women Casual Elegant Floral Print Dress For Party', 'Summer Casual Women.jpg'),
(87, 'Fitness Shockproof Yoga ', 15, 28.56, 78, 'Wholesale running fitness shockproof yoga underwear female classic beauty back sports bra ', 'Wholesale running fitness shockproof yoga underwear female classic beauty back sports bra ', 'Fitness Women Top.jpg'),
(88, 'Mens Dry-Fit Fitness Gym', 15, 75, 600, 'Mens Dry-Fit Fitness Gym and Casual Moisture Wicking Athletic Performance T-Shirt ', 'Mens Dry-Fit Fitness Gym and Casual Moisture Wicking Athletic Performance T-Shirt ', 'Men Dry Fit.jpg'),
(89, 'High Quality American Football Uniform', 15, 350, 45, 'High Quality American Football Uniform Half Sleeve Shirt with Trouser Customized Design for sale \r\n', 'High Quality American Football Uniform Half Sleeve Shirt with Trouser Customized Design for sale \r\n', 'AFU Men .jpg'),
(90, ' Cycling Jersey Sets', 15, 450, 30, 'Winter Thermal Pro Cycling Jersey Sets Pro Keep Warm Cycling MTB Bicycle Clothing Mountain Bike Wear Cycling Clothes ', 'Winter Thermal Pro Cycling Jersey Sets Pro Keep Warm Cycling MTB Bicycle Clothing Mountain Bike Wear Cycling Clothes ', 'MTB Bicycle.jpg'),
(91, 'Mens Sweatsuit Sets', 15, 60, 254, 'custom logo Plus Size Mens Sweatsuit Sets Fall Winter Jogging 2 pieces Tracksuit Track Suit Sportwear Hoodies jogger set for men ', 'custom logo Plus Size Mens Sweatsuit Sets Fall Winter Jogging 2 pieces Tracksuit Track Suit Sportwear Hoodies jogger set for men ', 'Nike Pants.jpg'),
(92, 'Football Socks', 15, 14, 400, 'Non-slip wear-resistant football socks Long tube over the knee men\'s thin wicking adult sports pressure socks ', 'Non-slip wear-resistant football socks Long tube over the knee men\'s thin wicking adult sports pressure socks ', 'socks.jpg'),
(93, 'Car Accessories Interior ', 14, 120, 5, 'Auto Universal Usa car accessories interior decoration seat cover ', 'Auto Universal Usa car accessories interior decoration seat cover ', 'car sit.jpg'),
(94, 'Hood Pins Lock Clip Kit ', 14, 10, 100, 'Universal racing car Billet Hood Pins Lock Clip Kit Car Quick Latch New Engine Bonnets hood lock hood pin ', 'Universal racing car Billet Hood Pins Lock Clip Kit Car Quick Latch New Engine Bonnets hood lock hood pin ', 'Bots.jpg'),
(95, 'Shift Lever Knob', 14, 78, 45, 'CNWAGNER Custom Carbon Fiber Acrylic Levier de Vitesses Palanca de Cambios Speed 5 6 Gear Stick Shift Lever Knob For GOLF VII 7 ', 'CNWAGNER Custom Carbon Fiber Acrylic Levier de Vitesses Palanca de Cambios Speed 5 6 Gear Stick Shift Lever Knob For GOLF VII 7 ', 'Bonnet.jpg'),
(96, 'Aluminum Alloy Car Rims', 14, 1200, 80, 'Custom forged wheel aluminum alloy car rims 18 19 20 21 22 23 24 inch for cars ', 'Custom forged wheel aluminum alloy car rims 18 19 20 21 22 23 24 inch for cars ', 'Alloy Car Rims.jpg'),
(97, 'Tractor Massey ', 16, 30000, 5, 'tractor massey ferguson 290 ', 'tractor massey ferguson 290 ', 'Trucktar.jpg'),
(98, 'Leather Gloves Rotatory', 16, 45000, 8, 'High pressure leather gloves rotatory ultrasonic embossing machine ', 'High pressure leather gloves rotatory ultrasonic embossing machine ', 'Grove Machine.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_price`, `product_title`, `product_quantity`) VALUES
(1, 1, 0, 25.59, '', 1),
(2, 1, 0, 25.59, '', 3),
(3, 1, 0, 25.59, '', 3),
(4, 1, 0, 25.59, '', 3),
(5, 1, 0, 25.59, '', 3),
(6, 1, 0, 25.59, '', 3),
(7, 1, 0, 25.59, '', 3),
(8, 1, 0, 25.59, '', 3),
(9, 1, 0, 25.59, '', 3),
(10, 1, 0, 25.59, '', 3),
(11, 1, 29, 25.59, '', 3),
(12, 1, 30, 25.59, '', 3),
(13, 1, 31, 25.59, '', 3),
(14, 1, 32, 25.59, '', 3),
(15, 1, 33, 25.59, '', 3),
(16, 1, 39, 25.59, 'Olivine Oil ', 3),
(17, 1, 40, 25.59, 'Olivine Oil ', 3),
(18, 2, 41, 2499.99, 'Dell XPS 13 2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_image`) VALUES
(10, 'Passer 01', 'slider_1.jpg'),
(11, 'Passer 02', 'slider_2.jpg'),
(12, 'Passer 03', 'slider_3.jpg'),
(13, 'Passer 04', 'slider_4.jpg'),
(14, 'Passer 05', 'slider_5.jpg'),
(15, 'Passer 06', 'slider_6.jpg'),
(19, 'Passer 07', 'slider_10.png'),
(20, 'Passer 08', 'slider_11.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_photo`) VALUES
(1, 'tendai', 'tendai@gmail.com', '1234', ''),
(2, 'ashley', 'ashley@support.com', '1234', ''),
(4, 'ashy', 'tendai@business.com', '1234', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
