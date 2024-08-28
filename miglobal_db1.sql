-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2024 at 12:28 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miglobal_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `is_admin` int NOT NULL DEFAULT '0',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `auth_key`, `password_hash`, `email`, `status`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, '', 'admin', 'X7Tt5Om7Eb97soAmNVRFIZhxUPRcpkII', '$2y$13$3iSNVaI2AmeXpt8tWzmsD.9QKp6.FhHWaz4VsQPkYDcy0pKH.M2me', 'louis.bruce.collins@gmail.com', 10, 1, 1533094239, 1641781207);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 1, 1565960697);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb3_unicode_ci,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1565226677, 1565226677),
('admin', 1, 'admin bao gồm tất cả các quyền quản trị', NULL, NULL, 1565226712, 1565226712);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/*');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb3_unicode_ci,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

CREATE TABLE `bacsi` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `des_en` text COLLATE utf8mb4_unicode_ci,
  `content_vi` text COLLATE utf8mb4_unicode_ci,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `number` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bacsi`
--

INSERT INTO `bacsi` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `slug`, `image`, `number`) VALUES
(1, 'Ms. Duyên Lâm ', 'Ms. Duyên Lâm ', 'Account Manager', 'Account Manager', NULL, NULL, NULL, '/backend/web/uploads/images/doi-ngu/MIG-DUYEN-LAM.png', 0),
(2, 'Ms. Mai Vân ', 'Ms. Mai Vân ', 'Founder & CEO', 'Fouder & CEO', NULL, NULL, NULL, '/backend/web/uploads/images/doi-ngu/MIG-MAI-VAN.png', 0),
(3, 'Mr. Công Nguyên ', 'Mr. Công Nguyên ', 'Operation Manager', 'Operation Manager', NULL, NULL, NULL, '/backend/web/uploads/images/doi-ngu/MIG-CONG-NGUYEN.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `baogia`
--

CREATE TABLE `baogia` (
  `id` int NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb3_unicode_ci,
  `created_date` datetime NOT NULL,
  `address` text COLLATE utf8mb3_unicode_ci,
  `thoigian` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `baogia`
--

INSERT INTO `baogia` (`id`, `fullname`, `phone`, `email`, `content`, `created_date`, `address`, `thoigian`, `status`) VALUES
(18, 'Nguyễn Văn B', '0988999777', 'email2@gmail.com', 'Test 2', '2022-01-02 22:58:19', 'Chi nhánh 2: Số 1 Phạm Văn Đồng - Thủ Đức', '12/01/2022 10:30', 0),
(19, 'Nguyễn Văn C', '0988777666', 'email3@gmail.com', 'Test 3', '2022-01-03 16:26:57', 'Chi nhánh 3: số 252 Phạm Văn Chiêu - Gò Vấp', '13/01/2022 11:30', 0),
(20, 'Giao Thanh Tuấn', '0396542917', 'giaotuan2407@gmail.com', 'Tôi muốn trám răng', '2022-04-04 15:49:31', 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', '05/04/2022 10:00', 0),
(21, 'Persephone', '0378841186', 'giaotuan2407@gmail.com', 'Tôi muốn bọc sứ', '2022-04-04 15:52:27', 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', '06/04/2022 11:00', 0),
(22, 'Luân Trần', '0973017622', 'luantran.365zina@gmail.com', 'sdsad', '2022-04-09 15:37:08', 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', '06/04/2022 10:10', 0),
(23, 'Persephone Giao', '0396542917', 'giaotuan2407@gmail.com', 'Tôi muốn tẩy trắng răng', '2022-08-15 11:10:22', 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', '16/08/2022 11:00', 0),
(24, 'Nguyễn Văn A', '0988999888', 'louis.bruce.collin@gmail.com', 'test', '2022-08-15 14:01:55', 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', '16/08/2022 11:30', 0),
(25, 'Luân Trần', '0973017622', 'luantran.365zina@gmail.com', 'sadasd', '2022-08-15 17:40:11', 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', '04/08/2022 06:10', 0),
(26, 'Luân Trần', '0973017622', 'luantran.365zina@gmail.com', 'đâsdasdas', '2022-08-15 17:44:07', 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', '11/08/2022 02:30', 0),
(27, 'Luân Trần', '0973017622', 'luantran.365zina@gmail.com', 'ádasdas', '2022-08-15 19:01:46', 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', '03/08/2022 19:05', 0),
(37, 'ưerwerwer', '34234324', 'dasdasd@gmail.com', 'ádasdas', '2024-05-23 13:48:47', NULL, '09/05/2024 10:25', 0),
(38, 'Luantrsn', '34324234324', 'luantran.nina@gmail.com', 'ádasd', '2024-05-23 13:49:31', NULL, '09/05/2024 10:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `camket`
--

CREATE TABLE `camket` (
  `id` int NOT NULL,
  `name_vi` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` text COLLATE utf8mb3_unicode_ci,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `image` text COLLATE utf8mb3_unicode_ci,
  `number` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `camket`
--

INSERT INTO `camket` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `image`, `number`) VALUES
(3, 'Đa Dạng', 'Fast', '', '', '/backend/web/uploads/images/ICON-DA-DANG.png', 0),
(5, 'Linh Hoạt', 'Professional', '', '', '/backend/web/uploads/images/ICON-LINH-HOAT.png', 0),
(6, 'Tận Tâm', 'Conscientious', '', '', '/backend/web/uploads/images/ICON-TAN-TAM.png', 0),
(7, 'Chuyên Nghiệp', '', NULL, '', '/backend/web/uploads/images/ICON-CHUYEN-NGHIEP.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `camnhan`
--

CREATE TABLE `camnhan` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` text COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `image` text COLLATE utf8mb3_unicode_ci,
  `number` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `danhgia` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `camnhan`
--

INSERT INTO `camnhan` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `image`, `number`, `status`, `danhgia`) VALUES
(4, 'CHỊ MY VÕ  ĐÃ SỬ DỤNG DỊCH VỤ NIỀNG RĂNG TẠI YSMILES', '', 'Sau khi trải nghiệm dịch vụ Răng sứ  My thấy Bác sĩ của Ysmiles có trình độ chuyên môn rất là cao và tận tâm với bệnh nhân. Trong quá trình điều trị My không có bị đau buốt, không có bị khó chịu, vì nếu My thấy hơi đau xíu thôi thì Bác sĩ sẽ làm mọi cách để nhẹ nhàng nhất có thể. Cho nên My không thể không hài lòng, My quá hài lòng với dịch của Ysmiles . Điều mà mình hài lòng nhất là chất lượng răng Sứ ở Ysmiles là rất hoàn thiện về độ tinh xảo cũng như trên mỗi chiếc răng có đường vân răng rất giống răng thật, màu sắc thì rất trắng và trong phù hợp với gương mặt của mình, giúp mình cười tự nhiên và rạng rỡ hơn.', '', 'Ra đời với mục tiêu cung cấp các dịch vụ và những dòng sản phẩm chăm sóc Sức khỏe và Sắc đẹp được tạo từ những nguyên liệu thiên nhiên và hữu cơ (chứng nhận hữu cơ quốc tế). Kèm với chất lượng, sự an toàn là giá cả hợp lý nhất....', '', '/backend/web/uploads/images/trai-nghiem-khach-hang-ysmile.jpg', 0, 1, 10),
(6, 'CHỊ NGUYÊN NELLY ĐÃ SỬ DỤNG DỊCH VỤ TẨY TRẮNG RĂNG TẠI Y SMILES', '', 'Sau khi trải nghiệm dịch vụ Nguyên thấy Bác sĩ của Y Smiles có trình độ chuyên môn rất là cao và tận tâm với bệnh nhân. Trong quá trình điều trị NGUYÊN NELL không có bị đau buốt, không có bị khó chịu, vì nếu NGUYÊN NELL thấy hơi đau xíu thôi thì Bác sĩ sẽ làm mọi cách để nhẹ nhàng nhất có thể. Cho nên NGUYÊN NELL không thể không hài lòng, NGUYÊN NELL quá hài lòng với dịch của Ysmiles.\r\nĐiều mà mình hài lòng nhất là chất lượng răng Sứ ở Ysmiles là rất hoàn thiện về độ tinh xảo cũng như trên mỗi chiếc răng có đường vân răng rất giống răng thật, màu sắc thì rất trắng và trong phù hợp với gương mặt của mình, giúp mình cười tự nhiên và rạng rỡ hơn.', '', NULL, NULL, '/backend/web/uploads/images/trai-nghiem-khach-hang.jpg', 0, 0, 10),
(7, 'CHỊ MINH NGỌC ĐÃ SỬ DỤNG DỊCH VỤ TẠI YSMILES', '', 'Mình thật may mắn khi biết đến NHA KHOA YSMILES .\r\nNhờ sự nhiệt tình của đội ngũ y bác sỹ tại đây đã giúp mình có hàm răng trắng đẹp như mơ và nụ cười rạng rỡ . Tự tin với gương mặt tươi xinh hơn. Một lần nữa xin cảm ơn Nha Khoa rất nhiều và xin chúc Nha Khoa Ysmiles ngày càng thành công và được nhiều nhiều người biết đến vì đây là nơi làm đẹp đáng tin cậy, tất cả mọi thứ đều  trên cả tuyệt vời! Xin cảm ơn rất nhiều ak', '', NULL, NULL, '/backend/web/uploads/images/danh-gia/162653694_1603360243386792_8873241216633318858_n.jpg', 0, 0, 9),
(8, 'Chị Jan Nguyễn chủ tiệm hải sản The Kickin\' Crab', '', 'Chị Jan Nguyễn chủ tiệm hải sản The Kickin\' Crab đã đến và sử dụng dịch vụ của NHA KHOA YSMILES. Và được đánh giá 10 điểm từ chị Jan Nguyễn và Chồng chị về dịch vụ và chăm sóc nhiệt tình của các nhân viên trong nha khoa YSMILES khi về Việt Nam.', '', NULL, NULL, '/backend/web/uploads/images/2b59f677c0ef1bb142fe.jpg', -1, 0, 10),
(9, 'Hoa Hậu Michelle charlotter Thorlund', '', 'Hoa Hậu Michelle charlotter Thorlund đã đến và sử dụng dịch vụ của NHA KHOA YSMILES. Và được đánh giá cao từ chị Hoa Hậu Michelle charlotter Thorlund  về dịch vụ và chăm sóc nhiệt tình của các nhân viên trong nha khoa YSMILES khi về Việt Nam.', '', NULL, NULL, '/backend/web/uploads/images/25ed51362129fb77a238.jpg', -1, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `user_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` text COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `parent` int NOT NULL DEFAULT '0',
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb3_unicode_ci,
  `icon` text COLLATE utf8mb3_unicode_ci,
  `banner` text COLLATE utf8mb3_unicode_ci,
  `homepage` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `number` int NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb3_unicode_ci,
  `description` text COLLATE utf8mb3_unicode_ci,
  `keyword` text COLLATE utf8mb3_unicode_ci,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `parent`, `slug`, `image`, `icon`, `banner`, `homepage`, `status`, `number`, `title`, `description`, `keyword`, `created_date`) VALUES
(35, 'Máy chiếu vật thể', '', '', '', '', '', 0, 'may-chieu-vat-the', '', '', NULL, 0, 0, 0, '', '', '', '2024-08-24 18:54:39'),
(36, 'Chăn ga', '', '', '', '', '', 0, 'chan-ga', '/backend/web/uploads/images/chan-ga.jpg', NULL, NULL, 0, 1, 0, '', '', '', '2024-08-24 18:47:00'),
(37, 'Gối nệm', '', '', '', '', '', 0, 'goi-nem', '/backend/web/uploads/images/goi-nem.jpg', NULL, NULL, 0, 1, 0, '', '', '', '2024-08-24 18:47:29'),
(38, 'Thú bông', '', '', '', '', '', 0, 'thu-bong', '/backend/web/uploads/images/thu-bong.jpg', NULL, NULL, 0, 1, 0, '', '', '', '2024-08-24 18:47:56'),
(39, 'Phụ kiện', '', '', '', '', '', 0, 'phu-kien', '/backend/web/uploads/images/phu-kien.jpg', NULL, NULL, 0, 1, 0, '', '', '', '2024-08-24 18:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `chinhanh`
--

CREATE TABLE `chinhanh` (
  `id` int NOT NULL,
  `name_vi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `number` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chinhanh`
--

INSERT INTO `chinhanh` (`id`, `name_vi`, `name_en`, `number`) VALUES
(1, 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', '', 0),
(2, 'Chi nhánh 2: 35/7D Trân Đình Xu, Phường Bến Thành , Quận 1, TP.HCM', '', 1),
(3, 'Chi nhánh 3: Shophouse số 26 Masteri An Phú, số 1 Võ Trường Toản, An Phú, Quận 2, TP.HCM', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `combos`
--

CREATE TABLE `combos` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` text COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `image` text COLLATE utf8mb3_unicode_ci,
  `thumb` text COLLATE utf8mb3_unicode_ci,
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `parent` int NOT NULL,
  `number` int NOT NULL DEFAULT '0',
  `price` int NOT NULL DEFAULT '0',
  `price_promotion` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `feature` int NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb3_unicode_ci,
  `description` text COLLATE utf8mb3_unicode_ci,
  `keyword` text COLLATE utf8mb3_unicode_ci,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `combos`
--

INSERT INTO `combos` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `image`, `thumb`, `slug`, `parent`, `number`, `price`, `price_promotion`, `status`, `feature`, `title`, `description`, `keyword`, `created_date`) VALUES
(1, 'Combo 3 tiệm vàng', '', 'SẢN PHẨM THUỘC COMBO 3 TIỆM VÀNG', '', '', '', '/backend/web/uploads/images/GOLDEN%20SHOP2.jpg', '', 'combo-3-tiem-vang', 2, 0, 0, 0, 1, 0, '', '', '', '2019-10-09 15:29:19'),
(2, 'Combo 1 tiệm vàng', '', 'SẢN PHẨM THUỘC COMBO 1 TIỆM VÀNG', '', '', '', '/backend/web/uploads/images/GOLDEN%20SHOP.jpg', '', 'combo-1-tiem-vang', 1, 0, 0, 0, 1, 0, '', '', '', '2019-10-09 15:28:50'),
(3, 'Combo Siêu thị mini 1', '', 'SẢN PHẨM THUỘC COMBO SIÊU THỊ MINI 1', '', '', '', '/backend/web/uploads/images/CB-TB2.jpg', '', 'combo-sieu-thi-mini-1', 2, 0, 0, 0, 1, 0, '', '', '', '2019-10-09 15:28:16'),
(4, 'Combo Nhà hàng 3', '', 'SẢN PHẨM THUỘC COMBO NHÀ HÀNG 3', '', '', '', '/backend/web/uploads/images/CB-NH33.jpg', '', 'combo-nha-hang-3', 2, 0, 600000, 0, 1, 0, '', '', '', '2019-10-09 15:27:46'),
(5, 'Combo Nhà hàng 2', '', 'SẢN PHẨM THUỘC COMBO NHÀ HÀNG 2', '', '', '', '/backend/web/uploads/images/CB-NH22.jpg', '', 'combo-nha-hang-2', 2, 0, 600000, 500000, 1, 0, '', '', '', '2019-10-09 15:27:12'),
(7, 'Combo Nhà hàng 1', '', 'SẢN PHẨM THUỘC COMBO NHÀ HÀNG 1', '', '', '', '/backend/web/uploads/images/CB-NH11.jpg', '', 'combo-nha-hang-1', 1, 0, 0, 0, 1, 0, '', '', '', '2019-10-09 15:26:41'),
(10, 'Combo 2 quán Bida', '', 'SẢN PHẨM THUỘC COMBO 2 QUÁN BIDA', '', '', '', '/backend/web/uploads/images/combo.jpg', '', 'combo-2-quan-bida', 1, 0, 0, 0, 1, 0, '', '', '', '2019-10-09 15:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `comboscat`
--

CREATE TABLE `comboscat` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` text COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `parent` int NOT NULL DEFAULT '0',
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb3_unicode_ci,
  `homepage` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `number` int NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb3_unicode_ci,
  `description` text COLLATE utf8mb3_unicode_ci,
  `keyword` text COLLATE utf8mb3_unicode_ci,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `comboscat`
--

INSERT INTO `comboscat` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `parent`, `slug`, `image`, `homepage`, `status`, `number`, `title`, `description`, `keyword`, `created_date`) VALUES
(1, 'Danh mục Combo 1', '', '', '', '', '', 0, 'danh-muc-combo-1', '', 1, 1, 0, '', '', '', '2019-10-03 15:17:56'),
(2, 'Danh mục Combo 2', '', '', '', '', '', 0, 'danh-muc-combo-2', '', 1, 1, 0, '', '', '', '2019-10-03 15:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `ID` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address_vi` text COLLATE utf8mb3_unicode_ci,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `fanpage` text COLLATE utf8mb3_unicode_ci,
  `website` text COLLATE utf8mb3_unicode_ci,
  `map` text COLLATE utf8mb3_unicode_ci,
  `address_en` text COLLATE utf8mb3_unicode_ci,
  `title` text COLLATE utf8mb3_unicode_ci,
  `keyword` text COLLATE utf8mb3_unicode_ci,
  `description` text COLLATE utf8mb3_unicode_ci,
  `logo` text COLLATE utf8mb3_unicode_ci,
  `favicon` text COLLATE utf8mb3_unicode_ci,
  `banner` text COLLATE utf8mb3_unicode_ci,
  `lang` int DEFAULT '1',
  `headtag` text COLLATE utf8mb3_unicode_ci,
  `bodytag` text COLLATE utf8mb3_unicode_ci,
  `heading` text COLLATE utf8mb3_unicode_ci,
  `customcss` text COLLATE utf8mb3_unicode_ci,
  `schema` text COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`ID`, `name_vi`, `name_en`, `phone`, `address_vi`, `email`, `fanpage`, `website`, `map`, `address_en`, `title`, `keyword`, `description`, `logo`, `favicon`, `banner`, `lang`, `headtag`, `bodytag`, `heading`, `customcss`, `schema`) VALUES
(1, 'CÔNG TY TNHH MI GLOBAL', 'Yii 2 Advanced', '0869269976', '<div class=\"btgrid\">\r\n<div class=\"row row-1\">\r\n<div class=\"col col-md-2\" style=\"width: 20%;\">\r\n<div class=\"content\">\r\n<ul>\r\n	<li>SĐT</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-10\" style=\"width: 80%;\">\r\n<div class=\"content\">\r\n<p>: 0869 269 976</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row row-2\">\r\n<div class=\"col col-md-2\" style=\"width: 20%;\">\r\n<div class=\"content\">\r\n<ul>\r\n	<li><span style=\"width: 90px;display: inline-block;\">Website</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-10\" style=\"width: 80%;\">\r\n<div class=\"content\">\r\n<p>: www.miglobalvn.com</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row row-3\">\r\n<div class=\"col col-md-2\" style=\"width: 20%;\">\r\n<div class=\"content\">\r\n<ul>\r\n	<li><span style=\"width: 90px;display: inline-block;\"><span style=\"width: 90px;display: inline-block;\">Địa chỉ</span></span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-10\" style=\"width: 80%;\">\r\n<div class=\"content\">\r\n<p>: 216 Trần N&atilde;o, Khu phố 2, P. An Kh&aacute;nh,Tp. Thủ Đức,Tp. HCM</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row row-4\">\r\n<div class=\"col col-md-2\" style=\"width: 20%;\">\r\n<div class=\"content\">\r\n<ul>\r\n	<li><span style=\"width: 90px;display: inline-block;\"><span style=\"width: 90px;display: inline-block;\">VPKD</span></span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-10\" style=\"width: 80%;\">\r\n<div class=\"content\">\r\n<p>: 9A Nguyễn Hữu Cảnh, P9, Quận B&igrave;nh Thạnh, Tp. HCM</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n', 'duyen.lam@miglobalvn.com', 'm.me/309563872238189', 'www.miglobalvn.com', '10.7898332,106.7186164', '<p><span style=\"line-height:1;\"><span style=\"font-size:14px;\"><span style=\"font-family:Roboto-Regular;\">Đia chỉ: 302 T&acirc;y Thạnh, P. T&acirc;y Thạnh, Q. T&acirc;n Ph&uacute;, Tp. HCM </span></span></span></p>\r\n\r\n<p><span style=\"line-height:1;\"><span style=\"font-size:14px;\"><span style=\"font-family:Roboto-Regular;\">Hotline: 0988.223.229 </span></span></span></p>\r\n\r\n<p><span style=\"line-height:1;\"><span style=\"font-size:14px;\"><span style=\"font-family:Roboto-Regular;\">Email: phuongnano.hcm@gmail.com </span></span></span></p>\r\n\r\n<p><span style=\"line-height:1;\"><span style=\"font-size:14px;\"><span style=\"font-family:Roboto-Regular;\">Website: www.noithatnano.com</span></span></span></p>\r\n', 'CÔNG TY TNHH MI GLOBAL', '', 'CÔNG TY TNHH MI GLOBAL', '/backend/web/uploads/images/logo1(1).png', '/backend/web/uploads/images/logo1.png', '', 2, '<meta name=\"google-site-verification\" content=\"iBQQCyEyuAJjBFQPrb3VuOSydO7G3JhA98C9AAjHpDk\" />\r\n\r\n<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-NZCZSCMX\');</script>\r\n<!-- End Google Tag Manager -->\r\n', '<!-- Google Tag Manager (noscript) -->\r\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-NZCZSCMX\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\r\n<!-- End Google Tag Manager (noscript) -->\r\n', '<h2>Hỗ trợ vay vốn doanh nghiệp</h2>\r\n<h3>Vay vốn doanh nghiệp</h3>\r\n<h3>vay vốn kinh doanh</h3>\r\n<h4>hỗ trợ vay vốn</h4>\r\n<h5>vay vốn nước ngoài</h5>\r\n<h6>vay vốn doanh nghiệp nước ngoài</h6>\r\n', '', '<script type=\'application/ld+json\'> \r\n  {\r\n    \"@context\": \"http://www.schema.org\",\r\n    \"@type\": \"WebSite\",\r\n    \"name\": \"Miglobal\",\r\n    \"alternateName\": \"Miglobal\",\r\n    \"url\": \"https://Miglobal.vn/\"\r\n  }\r\n</script>');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int NOT NULL,
  `name` varchar(128) COLLATE utf8mb3_unicode_ci NOT NULL,
  `key` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb3_unicode_ci,
  `type` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `language` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'all'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `name`, `key`, `value`, `type`, `language`) VALUES
(57, 'Phone Zalo', 'phone-zalo', '0869269976', 'text', 'all'),
(78, 'Copyright', 'copyright', 'Copyright © 2024 | BY 365ZINA.COM', 'text', 'all'),
(102, 'Địa chỉ Map', 'add-map', 'Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', 'text', 'all'),
(133, 'Name Footer (VI)', 'namef_vi', 'CÔNG TY TNHH MI GLOBAL', 'text', 'all'),
(136, 'Name Footer (EN)', 'namef_en', 'CÔNG TY TNHH MI GLOBAL', 'text', 'all'),
(150, 'Tiêu đề giới thiệu (Top) (Tiếng Việt)', 'nameab-top_vi', 'Giới thiệu về MIG', 'text', 'vi'),
(151, 'Tiêu đề giới thiệu (Top) (Tiếng anh)', 'nameab-top_en', 'About us', 'text', 'en'),
(160, 'Link map', 'link_map', 'https://www.google.com/maps/place/Ysmiles+Dental+Clinic+-+Nha+Khoa+th%E1%BA%ABm+m%E1%BB%B9/@10.8036264,106.746702,18z/data=!4m6!3m5!1s0x317527bdd905d091:0x3e7a604ca333fdb5!8m2!3d10.8035715!4d106.7477302!16s%2Fg%2F11tmwxf54k', 'text', 'all'),
(162, 'Tiêu đề đội ngũ (Tiếng Việt)', 'title-dn_vi', 'GẶP GỠ ĐỘI NGŨ CỦA CHÚNG TÔI', 'text', 'vi'),
(163, 'Tiêu đề đội ngũ (Tiếng anh)', 'title-dn_en', NULL, 'text', 'en'),
(164, 'Mô tả đội ngũ (Tiếng việt)', 'des-dn_vi', NULL, 'text', 'vi'),
(165, 'Mô tả đội ngũ (Tiếng anh)', 'des-dn_en', NULL, 'text', 'en'),
(166, 'phone header', 'phone_header', '0869 269 976', 'text', 'all'),
(167, 'Link phone', 'link_phone', '0869269976', 'text', 'all'),
(168, 'backgroup dịch vụ', 'bgdv', '/backend/web/uploads/images/MIG-GRADIENT-BACKGROUND-min.png', 'img', 'all'),
(169, 'backgroud đội ngũ', 'bgdn', '/backend/web/uploads/images/BACKGROUND-DOI-NGU-min.png', 'img', 'all'),
(171, 'Địa chỉ footer', 'diachi_footer', '216 Trần Não, Khu phố 2, P. An Khánh, Tp. Thủ Đức, Tp. HCM', 'text', 'all'),
(172, 'Văn Phòng Kinh Doanh', 'vpkd_footer', '9A Nguyễn Hữu Cảnh, P9, Quận Bình Thạnh, Tp. HCM', 'text', 'all'),
(173, 'bgdv Mobile', 'bgdv_mobile', '/backend/web/uploads/images/dich-vu/MIG-GRADIENT-BACKGROUND.png', 'img', 'all'),
(174, 'Phone footer', 'phone_footer', '0869 269 9976', 'text', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `ip_address`, `last_visit`) VALUES
(1, '127.0.0.1', '2019-11-04 09:27:22'),
(3, '127.0.0.1', '2019-11-04 09:34:26'),
(4, '127.0.0.1', '2019-11-04 09:36:43'),
(5, '127.0.0.1', '2019-11-05 01:22:50'),
(6, '127.0.0.1', '2019-11-05 01:22:50'),
(7, '127.0.0.1', '2019-11-05 01:48:44'),
(8, '127.0.0.1', '2019-11-05 01:51:00'),
(9, '127.0.0.1', '2019-11-05 01:53:45'),
(10, '127.0.0.1', '2019-11-05 03:01:18'),
(11, '127.0.0.1', '2019-11-05 04:18:02'),
(12, '127.0.0.1', '2019-11-06 02:42:35'),
(13, '127.0.0.1', '2019-11-06 03:43:41'),
(14, '127.0.0.1', '2019-11-06 03:44:53'),
(15, '127.0.0.1', '2019-11-06 07:16:39'),
(16, '127.0.0.1', '2019-11-06 07:17:52'),
(17, '127.0.0.1', '2019-11-06 08:44:40'),
(18, '127.0.0.1', '2019-11-06 08:48:45'),
(19, '127.0.0.1', '2019-11-06 08:58:03'),
(20, '127.0.0.1', '2019-11-06 09:01:14'),
(21, '127.0.0.1', '2019-11-06 09:03:30'),
(22, '127.0.0.1', '2019-11-06 09:06:06'),
(23, '127.0.0.1', '2019-11-06 09:09:45'),
(24, '127.0.0.1', '2019-11-06 09:10:58'),
(25, '127.0.0.1', '2019-11-06 09:12:10'),
(26, '127.0.0.1', '2019-11-06 09:14:14'),
(27, '127.0.0.1', '2019-11-06 09:15:33'),
(28, '127.0.0.1', '2019-11-06 09:17:29'),
(29, '127.0.0.1', '2019-11-06 09:21:32'),
(30, '127.0.0.1', '2019-11-06 09:33:06'),
(31, '127.0.0.1', '2019-11-06 09:34:50'),
(32, '127.0.0.1', '2019-11-06 09:37:03'),
(33, '127.0.0.1', '2019-11-06 09:38:26'),
(34, '127.0.0.1', '2019-11-06 09:43:25'),
(35, '127.0.0.1', '2019-11-06 09:44:31'),
(36, '127.0.0.1', '2019-11-06 09:47:45'),
(37, '127.0.0.1', '2019-11-07 01:23:10'),
(38, '127.0.0.1', '2019-11-07 02:34:25'),
(39, '127.0.0.1', '2019-11-07 04:17:02'),
(40, '127.0.0.1', '2019-11-07 04:24:43'),
(41, '127.0.0.1', '2019-11-07 04:27:35'),
(42, '127.0.0.1', '2019-11-07 04:28:47'),
(43, '127.0.0.1', '2019-11-07 04:31:45'),
(44, '127.0.0.1', '2019-11-07 04:37:16'),
(45, '127.0.0.1', '2019-11-07 04:38:52'),
(46, '127.0.0.1', '2019-11-07 04:40:29'),
(47, '127.0.0.1', '2019-11-07 04:42:03'),
(48, '127.0.0.1', '2019-11-07 04:44:24'),
(49, '127.0.0.1', '2019-11-07 04:45:25'),
(50, '127.0.0.1', '2019-11-07 04:47:20'),
(51, '127.0.0.1', '2019-11-07 04:48:34'),
(52, '127.0.0.1', '2019-11-07 04:50:13'),
(53, '127.0.0.1', '2019-11-07 04:52:53'),
(54, '127.0.0.1', '2019-11-07 04:54:30'),
(55, '127.0.0.1', '2019-11-07 04:55:30'),
(56, '127.0.0.1', '2019-11-07 04:56:30'),
(57, '127.0.0.1', '2019-11-07 06:33:33'),
(58, '127.0.0.1', '2019-11-07 07:35:06'),
(59, '127.0.0.1', '2019-11-07 08:02:56'),
(60, '127.0.0.1', '2019-11-07 08:31:27'),
(61, '127.0.0.1', '2019-11-07 08:36:19'),
(62, '127.0.0.1', '2019-11-07 09:23:07'),
(63, '127.0.0.1', '2019-11-07 09:24:09'),
(64, '127.0.0.1', '2019-11-07 09:27:52'),
(65, '127.0.0.1', '2019-11-07 09:28:57'),
(66, '127.0.0.1', '2019-11-07 09:31:04'),
(67, '127.0.0.1', '2019-11-07 09:32:34'),
(68, '127.0.0.1', '2019-11-07 09:34:14'),
(69, '127.0.0.1', '2019-11-07 09:35:25'),
(70, '127.0.0.1', '2019-11-07 09:36:25'),
(71, '127.0.0.1', '2019-11-07 09:38:47'),
(72, '127.0.0.1', '2019-11-07 09:43:14'),
(73, '127.0.0.1', '2019-11-07 09:44:49'),
(74, '127.0.0.1', '2019-11-07 09:48:21'),
(75, '127.0.0.1', '2019-11-07 09:49:43'),
(76, '127.0.0.1', '2019-11-07 09:52:26'),
(77, '127.0.0.1', '2019-11-07 09:54:46'),
(78, '127.0.0.1', '2019-11-07 09:56:54'),
(79, '127.0.0.1', '2019-11-07 10:03:53'),
(80, '127.0.0.1', '2019-11-07 10:06:05'),
(81, '127.0.0.1', '2019-11-08 01:01:27'),
(82, '127.0.0.1', '2019-11-08 01:36:49'),
(83, '127.0.0.1', '2019-11-08 01:40:27'),
(84, '127.0.0.1', '2019-11-08 01:41:46'),
(85, '127.0.0.1', '2019-11-08 01:43:32'),
(86, '127.0.0.1', '2019-11-08 01:44:41'),
(87, '127.0.0.1', '2019-11-08 01:45:46'),
(88, '127.0.0.1', '2019-11-08 01:53:35'),
(89, '127.0.0.1', '2019-11-08 02:01:31'),
(90, '127.0.0.1', '2019-11-08 02:10:42'),
(91, '127.0.0.1', '2019-11-08 02:19:04'),
(92, '127.0.0.1', '2019-11-08 02:20:17'),
(93, '127.0.0.1', '2019-11-08 02:21:20'),
(94, '127.0.0.1', '2019-11-08 02:22:35'),
(95, '127.0.0.1', '2019-11-08 02:23:36'),
(96, '127.0.0.1', '2019-11-08 02:24:40'),
(97, '127.0.0.1', '2019-11-08 02:26:17'),
(98, '127.0.0.1', '2019-11-08 02:27:40'),
(99, '127.0.0.1', '2019-11-08 02:30:41'),
(100, '127.0.0.1', '2019-11-08 02:32:33'),
(101, '127.0.0.1', '2019-11-08 02:34:24'),
(102, '127.0.0.1', '2019-11-08 02:39:20'),
(103, '127.0.0.1', '2019-11-08 02:40:41'),
(104, '127.0.0.1', '2019-11-08 02:42:43'),
(105, '127.0.0.1', '2019-11-08 02:44:12'),
(106, '127.0.0.1', '2019-11-08 02:46:03'),
(107, '127.0.0.1', '2019-11-08 02:49:32'),
(108, '127.0.0.1', '2019-11-08 02:51:03'),
(109, '127.0.0.1', '2019-11-08 02:54:54'),
(110, '127.0.0.1', '2019-11-08 02:56:09'),
(111, '127.0.0.1', '2019-11-08 02:58:08'),
(112, '127.0.0.1', '2019-11-08 02:59:20'),
(113, '127.0.0.1', '2019-11-08 03:01:53'),
(114, '127.0.0.1', '2019-11-08 03:05:08'),
(115, '127.0.0.1', '2019-11-08 03:06:49'),
(116, '127.0.0.1', '2019-11-08 03:10:24'),
(117, '127.0.0.1', '2019-11-08 03:13:30'),
(118, '127.0.0.1', '2019-11-08 03:14:31'),
(119, '127.0.0.1', '2019-11-08 03:15:46'),
(120, '127.0.0.1', '2019-11-08 03:17:05'),
(121, '127.0.0.1', '2019-11-08 03:19:02'),
(122, '127.0.0.1', '2019-11-08 03:20:04'),
(123, '127.0.0.1', '2019-11-08 03:21:07'),
(124, '127.0.0.1', '2019-11-08 03:22:40'),
(125, '127.0.0.1', '2019-11-08 03:33:41'),
(126, '127.0.0.1', '2019-11-08 03:34:43'),
(127, '127.0.0.1', '2019-11-08 03:36:26'),
(128, '127.0.0.1', '2019-11-08 04:01:35'),
(129, '127.0.0.1', '2019-11-08 04:04:39'),
(130, '127.0.0.1', '2019-11-08 04:11:05'),
(131, '127.0.0.1', '2019-11-08 06:46:45'),
(132, '127.0.0.1', '2019-11-08 06:50:11'),
(133, '127.0.0.1', '2019-11-08 06:51:11'),
(134, '127.0.0.1', '2019-11-08 06:52:35'),
(135, '127.0.0.1', '2019-11-08 06:56:00'),
(136, '127.0.0.1', '2019-11-08 06:57:10'),
(137, '127.0.0.1', '2019-11-08 07:00:41'),
(138, '127.0.0.1', '2019-11-08 07:03:52'),
(139, '127.0.0.1', '2019-11-08 07:06:44'),
(140, '127.0.0.1', '2019-11-08 07:08:09'),
(141, '127.0.0.1', '2019-11-08 07:09:18'),
(142, '127.0.0.1', '2019-11-08 07:10:18'),
(143, '127.0.0.1', '2019-11-08 07:11:25'),
(144, '127.0.0.1', '2019-11-08 07:12:44'),
(145, '127.0.0.1', '2019-11-08 07:14:39'),
(146, '127.0.0.1', '2019-11-08 07:17:08'),
(147, '127.0.0.1', '2019-11-08 07:18:34'),
(148, '127.0.0.1', '2019-11-08 07:21:03'),
(149, '127.0.0.1', '2019-11-08 07:22:54'),
(150, '127.0.0.1', '2019-11-08 07:26:13'),
(151, '127.0.0.1', '2019-11-14 01:49:44'),
(152, '127.0.0.1', '2019-11-15 03:17:57'),
(153, '127.0.0.1', '2019-11-15 03:36:18'),
(154, '127.0.0.1', '2019-11-15 03:38:38'),
(155, '127.0.0.1', '2019-11-15 03:40:56'),
(156, '127.0.0.1', '2019-11-15 03:45:36'),
(157, '127.0.0.1', '2019-11-15 03:47:48'),
(158, '127.0.0.1', '2019-11-15 03:50:45'),
(159, '127.0.0.1', '2019-11-15 03:52:44'),
(160, '127.0.0.1', '2019-11-15 03:54:45'),
(161, '127.0.0.1', '2019-11-15 03:57:40'),
(162, '127.0.0.1', '2019-11-15 03:59:32'),
(163, '127.0.0.1', '2019-11-15 04:01:41'),
(164, '127.0.0.1', '2019-11-15 04:03:46'),
(165, '127.0.0.1', '2019-11-15 04:49:44'),
(166, '127.0.0.1', '2019-11-15 04:54:15'),
(167, '127.0.0.1', '2019-11-15 04:56:41'),
(168, '127.0.0.1', '2019-11-15 04:59:03'),
(169, '127.0.0.1', '2019-11-15 05:01:32'),
(170, '127.0.0.1', '2019-11-15 05:02:43'),
(171, '127.0.0.1', '2019-11-15 07:55:27'),
(172, '127.0.0.1', '2019-11-15 07:57:42'),
(173, '127.0.0.1', '2019-11-15 07:59:55'),
(174, '127.0.0.1', '2019-11-15 08:05:27'),
(175, '127.0.0.1', '2019-11-15 08:07:05'),
(176, '127.0.0.1', '2019-11-15 08:21:28'),
(177, '127.0.0.1', '2019-11-15 08:29:01'),
(178, '127.0.0.1', '2019-11-15 08:30:03'),
(179, '127.0.0.1', '2019-11-15 08:31:21'),
(180, '127.0.0.1', '2019-11-15 08:38:57'),
(181, '127.0.0.1', '2019-11-15 08:49:53'),
(182, '127.0.0.1', '2019-11-15 08:51:38'),
(183, '127.0.0.1', '2019-11-15 08:56:26'),
(184, '127.0.0.1', '2019-11-15 09:00:52'),
(185, '127.0.0.1', '2019-11-15 09:02:00'),
(186, '127.0.0.1', '2019-11-15 09:07:31'),
(187, '127.0.0.1', '2019-11-15 09:14:52'),
(188, '127.0.0.1', '2019-11-15 09:17:27'),
(189, '127.0.0.1', '2019-11-15 09:20:26'),
(190, '127.0.0.1', '2019-11-15 09:21:59'),
(191, '127.0.0.1', '2019-11-15 09:25:00'),
(192, '127.0.0.1', '2019-11-15 09:26:10'),
(193, '127.0.0.1', '2019-11-15 09:28:05'),
(194, '127.0.0.1', '2019-11-15 09:41:00'),
(195, '127.0.0.1', '2019-11-15 09:42:48'),
(196, '127.0.0.1', '2019-11-15 09:50:45'),
(197, '127.0.0.1', '2019-11-15 09:55:13'),
(198, '127.0.0.1', '2019-11-15 09:56:59'),
(199, '127.0.0.1', '2019-11-16 01:24:48'),
(200, '127.0.0.1', '2019-11-16 01:32:11'),
(201, '127.0.0.1', '2019-11-16 01:57:06'),
(202, '127.0.0.1', '2019-11-16 02:13:04'),
(203, '127.0.0.1', '2019-11-16 02:36:16'),
(204, '127.0.0.1', '2019-11-16 02:37:17'),
(205, '127.0.0.1', '2019-11-16 03:57:49'),
(206, '127.0.0.1', '2019-11-16 04:00:31'),
(207, '127.0.0.1', '2019-11-16 04:02:09'),
(208, '127.0.0.1', '2019-11-16 04:03:46'),
(209, '127.0.0.1', '2019-11-16 04:04:56'),
(210, '127.0.0.1', '2019-11-16 04:11:50'),
(211, '127.0.0.1', '2019-11-16 04:13:49'),
(212, '127.0.0.1', '2019-11-16 04:15:02'),
(213, '127.0.0.1', '2019-11-16 04:16:07'),
(214, '127.0.0.1', '2019-11-16 04:20:16'),
(215, '127.0.0.1', '2019-11-16 04:23:49'),
(216, '127.0.0.1', '2019-11-16 04:25:15'),
(217, '127.0.0.1', '2019-11-16 04:28:50'),
(218, '127.0.0.1', '2019-11-16 04:30:04'),
(219, '127.0.0.1', '2019-11-16 04:35:26'),
(220, '127.0.0.1', '2019-11-16 04:37:37'),
(221, '127.0.0.1', '2019-11-16 04:40:06'),
(222, '127.0.0.1', '2019-11-16 04:41:41'),
(223, '127.0.0.1', '2019-11-16 04:43:12'),
(224, '127.0.0.1', '2019-11-16 04:45:01'),
(225, '127.0.0.1', '2019-11-16 04:46:08'),
(226, '127.0.0.1', '2019-11-16 04:47:18'),
(227, '127.0.0.1', '2019-11-16 04:56:17'),
(228, '127.0.0.1', '2019-11-16 04:57:56'),
(229, '127.0.0.1', '2019-11-16 04:58:56'),
(230, '127.0.0.1', '2019-11-16 05:03:14'),
(231, '127.0.0.1', '2019-11-16 05:04:15'),
(232, '127.0.0.1', '2019-11-18 01:00:16'),
(233, '127.0.0.1', '2019-11-18 01:12:46'),
(234, '127.0.0.1', '2019-11-18 01:13:53'),
(235, '127.0.0.1', '2019-11-18 01:19:17'),
(236, '127.0.0.1', '2019-11-18 01:22:32'),
(237, '127.0.0.1', '2019-11-18 01:24:18'),
(238, '127.0.0.1', '2019-11-18 01:26:24'),
(239, '127.0.0.1', '2019-11-18 01:27:30'),
(240, '127.0.0.1', '2019-11-18 01:28:59'),
(241, '127.0.0.1', '2019-11-18 01:30:25'),
(242, '127.0.0.1', '2019-11-18 01:32:05'),
(243, '127.0.0.1', '2019-11-18 01:34:04'),
(244, '127.0.0.1', '2019-11-18 01:41:59'),
(245, '127.0.0.1', '2019-11-18 01:43:31'),
(246, '127.0.0.1', '2019-11-18 01:45:14'),
(247, '127.0.0.1', '2019-11-18 01:47:11'),
(248, '127.0.0.1', '2019-11-18 01:48:26'),
(249, '127.0.0.1', '2019-11-18 01:51:17'),
(250, '127.0.0.1', '2019-11-18 01:52:19'),
(251, '127.0.0.1', '2019-11-18 01:54:03'),
(252, '127.0.0.1', '2019-11-18 01:55:07'),
(253, '127.0.0.1', '2019-11-18 01:56:59'),
(254, '127.0.0.1', '2019-11-18 01:58:15'),
(255, '127.0.0.1', '2019-11-18 01:59:54'),
(256, '127.0.0.1', '2019-11-18 02:00:55'),
(257, '127.0.0.1', '2019-11-18 02:03:14'),
(258, '127.0.0.1', '2019-11-18 02:04:28'),
(259, '127.0.0.1', '2019-11-18 02:05:31'),
(260, '127.0.0.1', '2019-11-18 02:08:32'),
(261, '127.0.0.1', '2019-11-18 02:11:06'),
(262, '127.0.0.1', '2019-11-18 02:12:26'),
(263, '127.0.0.1', '2019-11-18 02:17:04'),
(264, '127.0.0.1', '2019-11-18 02:20:56'),
(265, '127.0.0.1', '2019-11-18 02:22:39'),
(266, '127.0.0.1', '2019-11-18 02:23:59'),
(267, '127.0.0.1', '2019-11-18 02:25:10'),
(268, '127.0.0.1', '2019-11-18 02:49:17'),
(269, '127.0.0.1', '2019-11-18 02:53:49'),
(270, '127.0.0.1', '2019-11-18 02:59:36'),
(271, '127.0.0.1', '2019-11-19 03:12:25'),
(272, '127.0.0.1', '2019-11-19 03:18:14'),
(273, '127.0.0.1', '2019-11-19 04:02:30'),
(274, '127.0.0.1', '2019-11-19 04:05:53'),
(275, '127.0.0.1', '2019-11-19 04:07:38'),
(276, '127.0.0.1', '2019-11-19 04:08:50'),
(277, '127.0.0.1', '2019-11-19 04:12:09'),
(278, '127.0.0.1', '2019-11-19 04:13:13'),
(279, '127.0.0.1', '2019-11-19 04:15:14'),
(280, '127.0.0.1', '2019-11-19 04:18:50'),
(281, '127.0.0.1', '2019-11-19 04:24:42'),
(282, '127.0.0.1', '2019-11-19 04:29:01'),
(283, '127.0.0.1', '2019-11-19 04:30:11'),
(284, '127.0.0.1', '2019-11-19 04:38:19'),
(285, '127.0.0.1', '2019-11-19 04:49:31'),
(286, '127.0.0.1', '2019-11-19 04:50:49'),
(287, '127.0.0.1', '2019-11-19 04:52:10'),
(288, '127.0.0.1', '2019-11-19 04:53:38'),
(289, '127.0.0.1', '2019-11-19 04:55:42'),
(290, '127.0.0.1', '2019-11-19 04:57:26'),
(291, '127.0.0.1', '2019-11-19 05:01:18'),
(292, '127.0.0.1', '2019-11-19 05:02:48'),
(293, '127.0.0.1', '2019-11-19 07:00:47'),
(294, '127.0.0.1', '2019-11-19 07:03:45'),
(295, '127.0.0.1', '2019-11-19 07:28:15'),
(296, '127.0.0.1', '2019-11-19 07:29:20'),
(297, '127.0.0.1', '2019-11-19 07:32:56'),
(298, '127.0.0.1', '2019-11-19 07:34:10'),
(299, '127.0.0.1', '2019-11-19 07:39:00'),
(300, '127.0.0.1', '2019-11-19 07:45:26'),
(301, '127.0.0.1', '2019-11-19 07:46:42'),
(302, '127.0.0.1', '2019-11-19 07:47:48'),
(303, '127.0.0.1', '2019-11-19 07:49:00'),
(304, '127.0.0.1', '2019-11-19 07:50:02'),
(305, '127.0.0.1', '2019-11-19 08:05:15'),
(306, '127.0.0.1', '2019-11-19 08:08:03'),
(307, '127.0.0.1', '2019-11-19 08:09:35'),
(308, '127.0.0.1', '2019-11-19 08:11:45'),
(309, '127.0.0.1', '2019-11-19 08:12:45'),
(310, '127.0.0.1', '2019-11-19 08:17:10'),
(311, '127.0.0.1', '2019-11-19 08:18:26'),
(312, '127.0.0.1', '2019-11-19 08:19:33'),
(313, '127.0.0.1', '2019-11-19 08:20:43'),
(314, '127.0.0.1', '2019-11-19 08:22:41'),
(315, '127.0.0.1', '2019-11-19 08:25:49'),
(316, '127.0.0.1', '2019-11-19 08:27:24'),
(317, '127.0.0.1', '2019-11-19 08:28:24'),
(318, '127.0.0.1', '2019-11-19 08:36:35'),
(319, '127.0.0.1', '2019-11-19 08:37:50'),
(320, '127.0.0.1', '2019-11-19 08:40:12'),
(321, '127.0.0.1', '2019-11-19 08:43:55'),
(322, '127.0.0.1', '2019-11-19 08:47:20'),
(323, '127.0.0.1', '2019-11-19 09:10:04'),
(324, '127.0.0.1', '2019-11-19 09:12:26'),
(325, '127.0.0.1', '2019-11-19 09:14:29'),
(326, '127.0.0.1', '2019-11-19 09:21:49'),
(327, '127.0.0.1', '2019-11-19 09:24:01'),
(328, '127.0.0.1', '2019-11-19 09:25:24'),
(329, '127.0.0.1', '2019-11-19 09:26:39'),
(330, '127.0.0.1', '2019-11-19 09:29:28'),
(331, '127.0.0.1', '2019-11-19 09:31:01'),
(332, '127.0.0.1', '2019-11-19 09:32:02'),
(333, '127.0.0.1', '2019-11-19 09:33:55'),
(334, '127.0.0.1', '2019-11-19 09:40:21'),
(335, '127.0.0.1', '2019-11-19 09:43:10'),
(336, '127.0.0.1', '2019-11-19 09:44:38'),
(337, '127.0.0.1', '2019-11-19 09:56:25'),
(338, '127.0.0.1', '2019-11-19 09:58:44'),
(339, '127.0.0.1', '2019-11-19 10:00:32'),
(340, '127.0.0.1', '2019-11-20 01:27:36'),
(341, '127.0.0.1', '2019-11-20 01:34:15'),
(342, '127.0.0.1', '2019-11-20 01:35:31'),
(343, '127.0.0.1', '2019-11-20 01:37:41'),
(344, '127.0.0.1', '2019-11-20 01:40:16'),
(345, '127.0.0.1', '2019-11-20 02:19:48'),
(346, '127.0.0.1', '2019-11-20 02:35:02'),
(347, '127.0.0.1', '2019-11-20 02:37:31'),
(348, '127.0.0.1', '2019-11-20 02:39:47'),
(349, '127.0.0.1', '2019-11-20 02:41:49'),
(350, '127.0.0.1', '2019-11-20 02:44:53'),
(351, '127.0.0.1', '2019-11-20 02:46:40'),
(352, '127.0.0.1', '2019-11-20 02:48:09'),
(353, '127.0.0.1', '2019-11-20 02:50:20'),
(354, '127.0.0.1', '2019-11-20 02:52:18'),
(355, '127.0.0.1', '2019-11-20 02:53:26'),
(356, '127.0.0.1', '2019-11-20 04:30:17'),
(357, '127.0.0.1', '2019-11-20 04:47:41'),
(358, '127.0.0.1', '2019-11-20 04:51:40'),
(359, '127.0.0.1', '2019-11-20 04:55:01'),
(360, '127.0.0.1', '2019-11-20 04:56:20'),
(361, '127.0.0.1', '2019-11-20 04:57:49'),
(362, '127.0.0.1', '2019-11-20 04:58:52'),
(363, '127.0.0.1', '2019-11-20 05:00:13'),
(364, '127.0.0.1', '2019-11-20 05:01:54'),
(365, '127.0.0.1', '2019-11-20 07:08:18'),
(366, '127.0.0.1', '2019-11-20 07:12:40'),
(367, '127.0.0.1', '2019-11-20 07:13:40'),
(368, '127.0.0.1', '2019-11-20 07:15:02'),
(369, '127.0.0.1', '2019-11-20 07:16:29'),
(370, '127.0.0.1', '2019-11-20 07:17:34'),
(371, '127.0.0.1', '2019-11-20 07:23:07'),
(372, '127.0.0.1', '2019-11-20 07:26:59'),
(373, '127.0.0.1', '2019-11-20 09:25:26'),
(374, '127.0.0.1', '2019-12-20 02:31:54'),
(375, '127.0.0.1', '2019-12-20 02:38:38'),
(376, '127.0.0.1', '2019-12-20 02:47:34'),
(377, '127.0.0.1', '2019-12-20 02:49:20'),
(378, '127.0.0.1', '2019-12-20 02:51:21'),
(379, '127.0.0.1', '2019-12-20 02:54:38'),
(380, '127.0.0.1', '2019-12-20 02:55:48'),
(381, '127.0.0.1', '2019-12-20 02:56:51'),
(382, '127.0.0.1', '2019-12-20 02:58:32'),
(383, '127.0.0.1', '2019-12-20 03:01:10'),
(384, '127.0.0.1', '2019-12-20 03:07:14'),
(385, '127.0.0.1', '2019-12-20 03:08:48'),
(386, '127.0.0.1', '2019-12-20 03:09:53'),
(387, '127.0.0.1', '2019-12-20 03:16:38'),
(388, '127.0.0.1', '2019-12-20 03:36:14'),
(389, '127.0.0.1', '2019-12-20 03:44:05'),
(390, '127.0.0.1', '2019-12-20 03:45:11'),
(391, '127.0.0.1', '2019-12-20 03:47:19'),
(392, '127.0.0.1', '2019-12-20 03:49:18'),
(393, '127.0.0.1', '2019-12-20 03:51:04'),
(394, '127.0.0.1', '2019-12-20 03:52:25'),
(395, '127.0.0.1', '2019-12-20 03:53:56'),
(396, '127.0.0.1', '2019-12-20 03:56:36'),
(397, '127.0.0.1', '2019-12-20 03:57:38'),
(398, '127.0.0.1', '2019-12-20 04:19:44'),
(399, '127.0.0.1', '2019-12-20 07:34:59'),
(400, '127.0.0.1', '2019-12-20 07:36:06'),
(401, '127.0.0.1', '2019-12-20 07:37:06'),
(402, '127.0.0.1', '2019-12-20 08:51:16'),
(403, '127.0.0.1', '2019-12-20 08:53:03'),
(404, '127.0.0.1', '2019-12-20 08:54:25'),
(405, '127.0.0.1', '2019-12-20 08:58:54'),
(406, '127.0.0.1', '2019-12-20 09:00:21'),
(407, '127.0.0.1', '2019-12-20 09:14:47'),
(408, '127.0.0.1', '2019-12-20 09:17:02'),
(409, '127.0.0.1', '2019-12-20 09:19:24'),
(410, '127.0.0.1', '2019-12-20 09:20:35'),
(411, '127.0.0.1', '2019-12-20 09:21:46'),
(412, '127.0.0.1', '2019-12-20 09:23:24'),
(413, '127.0.0.1', '2019-12-20 09:25:39'),
(414, '127.0.0.1', '2019-12-20 09:26:51'),
(415, '127.0.0.1', '2019-12-20 09:28:16'),
(416, '127.0.0.1', '2019-12-20 09:29:39'),
(417, '127.0.0.1', '2019-12-20 09:33:41'),
(418, '127.0.0.1', '2019-12-20 09:35:23'),
(419, '127.0.0.1', '2019-12-20 09:38:57'),
(420, '127.0.0.1', '2019-12-20 09:43:22'),
(421, '127.0.0.1', '2019-12-20 09:56:31'),
(422, '127.0.0.1', '2019-12-20 09:58:15'),
(423, '127.0.0.1', '2019-12-20 10:00:00'),
(424, '127.0.0.1', '2019-12-20 10:03:18'),
(425, '127.0.0.1', '2019-12-20 10:05:39'),
(426, '127.0.0.1', '2019-12-21 01:11:59'),
(427, '127.0.0.1', '2019-12-21 01:49:57'),
(428, '127.0.0.1', '2019-12-21 01:51:27'),
(429, '127.0.0.1', '2019-12-21 01:52:28'),
(430, '127.0.0.1', '2019-12-21 01:55:47'),
(431, '127.0.0.1', '2019-12-21 01:56:52'),
(432, '127.0.0.1', '2019-12-21 01:57:52'),
(433, '127.0.0.1', '2019-12-21 02:00:45'),
(434, '127.0.0.1', '2019-12-21 02:16:11'),
(435, '127.0.0.1', '2019-12-21 02:18:17'),
(436, '127.0.0.1', '2019-12-21 02:20:10'),
(437, '127.0.0.1', '2019-12-21 02:23:42'),
(438, '127.0.0.1', '2019-12-21 02:25:04'),
(439, '127.0.0.1', '2019-12-21 02:26:21'),
(440, '127.0.0.1', '2019-12-21 02:28:09'),
(441, '127.0.0.1', '2019-12-21 02:29:12'),
(442, '127.0.0.1', '2019-12-21 02:51:32'),
(443, '127.0.0.1', '2019-12-21 03:01:53'),
(444, '127.0.0.1', '2019-12-21 03:05:42'),
(445, '127.0.0.1', '2019-12-21 03:07:45'),
(446, '127.0.0.1', '2019-12-21 03:09:08'),
(447, '127.0.0.1', '2019-12-21 03:10:17'),
(448, '127.0.0.1', '2019-12-21 03:12:06'),
(449, '127.0.0.1', '2019-12-21 03:35:56'),
(450, '127.0.0.1', '2019-12-21 03:43:19'),
(451, '127.0.0.1', '2019-12-21 03:47:25'),
(452, '127.0.0.1', '2019-12-21 03:57:14'),
(453, '127.0.0.1', '2019-12-21 03:58:53'),
(454, '127.0.0.1', '2019-12-23 01:05:42'),
(455, '127.0.0.1', '2019-12-23 01:15:02'),
(456, '127.0.0.1', '2019-12-23 01:28:01'),
(457, '127.0.0.1', '2019-12-23 01:35:11'),
(458, '127.0.0.1', '2019-12-23 01:37:04'),
(459, '127.0.0.1', '2019-12-23 01:38:11'),
(460, '127.0.0.1', '2019-12-23 01:40:15'),
(461, '127.0.0.1', '2019-12-23 01:41:41'),
(462, '127.0.0.1', '2019-12-23 01:43:26'),
(463, '127.0.0.1', '2019-12-23 01:47:25'),
(464, '127.0.0.1', '2019-12-23 01:49:15'),
(465, '127.0.0.1', '2019-12-23 01:50:20'),
(466, '127.0.0.1', '2019-12-23 01:51:39'),
(467, '127.0.0.1', '2019-12-23 01:52:42'),
(468, '127.0.0.1', '2019-12-23 01:54:40'),
(469, '127.0.0.1', '2019-12-23 01:55:48'),
(470, '127.0.0.1', '2019-12-23 01:58:08'),
(471, '127.0.0.1', '2019-12-23 02:00:00'),
(472, '127.0.0.1', '2019-12-23 02:01:32'),
(473, '127.0.0.1', '2019-12-23 02:02:55'),
(474, '127.0.0.1', '2019-12-23 02:04:28'),
(475, '127.0.0.1', '2019-12-23 02:05:40'),
(476, '127.0.0.1', '2019-12-23 02:07:57'),
(477, '127.0.0.1', '2019-12-23 02:10:54'),
(478, '127.0.0.1', '2019-12-23 02:17:43'),
(479, '127.0.0.1', '2019-12-23 02:19:15'),
(480, '127.0.0.1', '2019-12-23 02:24:27'),
(481, '127.0.0.1', '2019-12-23 02:28:30'),
(482, '127.0.0.1', '2019-12-23 02:32:17'),
(483, '127.0.0.1', '2019-12-23 02:37:12'),
(484, '127.0.0.1', '2019-12-23 02:58:03'),
(485, '127.0.0.1', '2019-12-23 03:32:30'),
(486, '127.0.0.1', '2019-12-23 04:05:52'),
(487, '127.0.0.1', '2019-12-23 05:40:14'),
(488, '127.0.0.1', '2019-12-23 08:14:28'),
(489, '127.0.0.1', '2019-12-23 08:15:53'),
(490, '127.0.0.1', '2019-12-23 08:51:04'),
(491, '127.0.0.1', '2019-12-25 02:20:35'),
(492, '127.0.0.1', '2019-12-25 02:27:08'),
(493, '127.0.0.1', '2019-12-25 02:33:00'),
(494, '127.0.0.1', '2019-12-25 02:36:37'),
(495, '127.0.0.1', '2019-12-25 02:42:56'),
(496, '127.0.0.1', '2019-12-25 02:53:53'),
(497, '127.0.0.1', '2019-12-25 03:19:22'),
(498, '127.0.0.1', '2019-12-25 03:20:50'),
(499, '127.0.0.1', '2019-12-25 03:21:57'),
(500, '127.0.0.1', '2019-12-25 03:23:51'),
(501, '127.0.0.1', '2019-12-25 03:30:59'),
(502, '127.0.0.1', '2019-12-25 03:32:10'),
(503, '127.0.0.1', '2019-12-25 03:33:19'),
(504, '127.0.0.1', '2019-12-25 03:34:51'),
(505, '127.0.0.1', '2019-12-25 03:37:20'),
(506, '127.0.0.1', '2019-12-25 03:38:33'),
(507, '127.0.0.1', '2019-12-25 03:40:44'),
(508, '127.0.0.1', '2019-12-25 03:42:08'),
(509, '127.0.0.1', '2019-12-25 03:43:19'),
(510, '127.0.0.1', '2019-12-25 03:45:22'),
(511, '127.0.0.1', '2019-12-25 03:47:59'),
(512, '127.0.0.1', '2019-12-25 03:49:56'),
(513, '127.0.0.1', '2019-12-25 03:52:22'),
(514, '127.0.0.1', '2019-12-25 04:11:28'),
(515, '127.0.0.1', '2019-12-25 04:13:45'),
(516, '127.0.0.1', '2019-12-25 04:16:06'),
(517, '127.0.0.1', '2019-12-25 04:17:21'),
(518, '127.0.0.1', '2019-12-25 04:18:35'),
(519, '127.0.0.1', '2019-12-25 04:54:25'),
(520, '127.0.0.1', '2019-12-25 04:55:55'),
(521, '127.0.0.1', '2019-12-25 04:58:06'),
(522, '127.0.0.1', '2019-12-25 04:59:21'),
(523, '127.0.0.1', '2019-12-25 06:38:49'),
(524, '127.0.0.1', '2019-12-25 07:02:53'),
(525, '127.0.0.1', '2019-12-25 07:07:35'),
(526, '127.0.0.1', '2019-12-25 07:12:34'),
(527, '127.0.0.1', '2019-12-25 07:15:53'),
(528, '127.0.0.1', '2019-12-25 07:17:50'),
(529, '127.0.0.1', '2019-12-25 07:26:17'),
(530, '127.0.0.1', '2019-12-25 07:28:09'),
(531, '127.0.0.1', '2019-12-25 07:31:22'),
(532, '127.0.0.1', '2019-12-25 07:33:32'),
(533, '127.0.0.1', '2019-12-25 07:38:11'),
(534, '127.0.0.1', '2019-12-25 12:55:50'),
(535, '127.0.0.1', '2019-12-25 14:36:26'),
(536, '127.0.0.1', '2019-12-26 01:32:43'),
(537, '127.0.0.1', '2019-12-26 02:38:02'),
(538, '127.0.0.1', '2019-12-26 02:41:46'),
(539, '127.0.0.1', '2019-12-26 02:45:28'),
(540, '127.0.0.1', '2019-12-26 02:48:22'),
(541, '127.0.0.1', '2019-12-26 02:51:14'),
(542, '127.0.0.1', '2019-12-26 02:52:59'),
(543, '127.0.0.1', '2019-12-26 02:54:40'),
(544, '127.0.0.1', '2019-12-26 02:58:23'),
(545, '127.0.0.1', '2019-12-26 02:59:50'),
(546, '127.0.0.1', '2019-12-26 03:05:05'),
(547, '127.0.0.1', '2019-12-26 03:10:48'),
(548, '127.0.0.1', '2019-12-26 03:15:21'),
(549, '127.0.0.1', '2019-12-26 03:17:28'),
(550, '127.0.0.1', '2019-12-26 03:18:28'),
(551, '127.0.0.1', '2019-12-26 03:20:27'),
(552, '127.0.0.1', '2019-12-26 03:37:45'),
(553, '127.0.0.1', '2019-12-26 03:43:03'),
(554, '127.0.0.1', '2019-12-26 03:45:30'),
(555, '127.0.0.1', '2019-12-26 03:57:44'),
(556, '127.0.0.1', '2019-12-26 04:02:44'),
(557, '127.0.0.1', '2019-12-26 04:04:11'),
(558, '127.0.0.1', '2019-12-26 04:08:17'),
(559, '127.0.0.1', '2019-12-26 04:09:28'),
(560, '127.0.0.1', '2019-12-26 06:54:30'),
(561, '127.0.0.1', '2019-12-26 07:00:46'),
(562, '127.0.0.1', '2019-12-26 07:03:14'),
(563, '127.0.0.1', '2019-12-26 07:10:07'),
(564, '127.0.0.1', '2019-12-26 07:11:40'),
(565, '127.0.0.1', '2020-02-26 03:15:52'),
(566, '127.0.0.1', '2020-02-26 03:17:07'),
(567, '127.0.0.1', '2020-02-26 03:22:48'),
(568, '127.0.0.1', '2020-02-26 04:03:04'),
(569, '127.0.0.1', '2020-02-26 04:05:37'),
(570, '127.0.0.1', '2020-02-26 04:11:51'),
(571, '127.0.0.1', '2020-02-26 04:12:56'),
(572, '127.0.0.1', '2020-02-26 04:14:00'),
(573, '127.0.0.1', '2020-02-26 04:15:14'),
(574, '127.0.0.1', '2020-02-26 04:17:26'),
(575, '127.0.0.1', '2020-02-26 04:18:43'),
(576, '127.0.0.1', '2020-02-26 04:32:42'),
(577, '127.0.0.1', '2020-02-26 04:35:39'),
(578, '127.0.0.1', '2020-02-26 04:55:33'),
(579, '127.0.0.1', '2020-02-26 08:21:39'),
(580, '127.0.0.1', '2020-07-01 02:37:11'),
(581, '127.0.0.1', '2020-07-01 02:39:29'),
(582, '127.0.0.1', '2020-07-01 07:25:06'),
(583, '127.0.0.1', '2020-07-02 02:09:44'),
(584, '127.0.0.1', '2020-07-02 02:33:19'),
(585, '127.0.0.1', '2020-07-02 02:35:04'),
(586, '127.0.0.1', '2020-07-02 02:39:01'),
(587, '127.0.0.1', '2020-07-02 02:41:05'),
(588, '127.0.0.1', '2020-07-02 02:43:12'),
(589, '127.0.0.1', '2020-07-02 02:45:18'),
(590, '127.0.0.1', '2020-07-02 02:46:23'),
(591, '127.0.0.1', '2020-07-02 02:49:41'),
(592, '127.0.0.1', '2020-07-02 02:51:07'),
(593, '127.0.0.1', '2020-07-02 02:55:38'),
(594, '127.0.0.1', '2020-07-02 02:57:37'),
(595, '127.0.0.1', '2020-07-02 02:58:44'),
(596, '127.0.0.1', '2020-07-02 03:13:21'),
(597, '127.0.0.1', '2020-07-02 03:14:27'),
(598, '127.0.0.1', '2020-07-02 03:28:33'),
(599, '127.0.0.1', '2020-07-02 03:31:16'),
(600, '127.0.0.1', '2020-07-02 03:32:22'),
(601, '127.0.0.1', '2020-07-02 03:34:25'),
(602, '127.0.0.1', '2020-07-02 03:55:07'),
(603, '127.0.0.1', '2020-07-02 03:57:28'),
(604, '127.0.0.1', '2020-07-02 03:59:30'),
(605, '127.0.0.1', '2020-07-02 04:00:30'),
(606, '127.0.0.1', '2020-07-02 04:41:19'),
(607, '127.0.0.1', '2020-07-02 04:45:39'),
(608, '127.0.0.1', '2020-07-02 04:47:17'),
(609, '127.0.0.1', '2020-07-02 04:49:01'),
(610, '127.0.0.1', '2020-07-02 04:50:01'),
(611, '127.0.0.1', '2020-07-02 04:51:32'),
(612, '127.0.0.1', '2020-07-02 07:13:53'),
(613, '127.0.0.1', '2020-07-02 07:31:03'),
(614, '127.0.0.1', '2020-07-02 07:32:22'),
(615, '127.0.0.1', '2020-07-02 07:41:39'),
(616, '127.0.0.1', '2020-07-02 08:10:53'),
(617, '127.0.0.1', '2020-07-02 08:12:30'),
(618, '127.0.0.1', '2020-07-02 08:32:48'),
(619, '127.0.0.1', '2020-07-02 08:35:56'),
(620, '127.0.0.1', '2020-07-02 08:37:21'),
(621, '127.0.0.1', '2020-07-02 08:40:55'),
(622, '127.0.0.1', '2020-07-02 08:58:26'),
(623, '127.0.0.1', '2020-07-02 09:02:33'),
(624, '127.0.0.1', '2020-07-02 09:04:16'),
(625, '127.0.0.1', '2020-07-02 09:05:16'),
(626, '127.0.0.1', '2020-07-02 09:07:57'),
(627, '127.0.0.1', '2020-07-02 09:09:40'),
(628, '127.0.0.1', '2020-07-02 09:14:49'),
(629, '127.0.0.1', '2020-07-03 01:05:37'),
(630, '127.0.0.1', '2020-07-03 02:07:43'),
(631, '127.0.0.1', '2020-07-03 02:08:49'),
(632, '127.0.0.1', '2020-07-03 02:51:26'),
(633, '127.0.0.1', '2020-07-03 02:53:03'),
(634, '127.0.0.1', '2020-07-03 03:03:52'),
(635, '127.0.0.1', '2020-07-03 03:11:26'),
(636, '127.0.0.1', '2020-07-03 03:14:44'),
(637, '127.0.0.1', '2020-07-03 03:23:04'),
(638, '127.0.0.1', '2020-07-03 03:29:09'),
(639, '127.0.0.1', '2020-07-03 03:30:09'),
(640, '127.0.0.1', '2020-07-03 04:54:55'),
(641, '127.0.0.1', '2020-07-03 04:58:40'),
(642, '127.0.0.1', '2020-07-03 06:49:17'),
(643, '127.0.0.1', '2020-07-03 06:54:32'),
(644, '127.0.0.1', '2020-07-03 06:58:06'),
(645, '127.0.0.1', '2020-07-03 06:59:24'),
(646, '127.0.0.1', '2020-07-03 07:01:03'),
(647, '127.0.0.1', '2020-07-03 07:02:04'),
(648, '127.0.0.1', '2020-07-03 07:03:22'),
(649, '127.0.0.1', '2020-07-03 07:04:36'),
(650, '127.0.0.1', '2020-07-03 07:07:15'),
(651, '127.0.0.1', '2020-07-03 07:09:01'),
(652, '127.0.0.1', '2020-07-03 07:10:36'),
(653, '127.0.0.1', '2020-07-03 07:12:07'),
(654, '127.0.0.1', '2020-07-03 07:15:34'),
(655, '127.0.0.1', '2020-07-03 07:18:12'),
(656, '127.0.0.1', '2020-07-03 07:26:49'),
(657, '127.0.0.1', '2020-07-03 07:28:12'),
(658, '127.0.0.1', '2020-07-03 07:29:24'),
(659, '127.0.0.1', '2020-07-03 07:32:06'),
(660, '127.0.0.1', '2020-07-03 08:06:41'),
(661, '127.0.0.1', '2020-07-03 08:08:03'),
(662, '127.0.0.1', '2020-07-03 08:09:40'),
(663, '127.0.0.1', '2020-07-03 08:10:51'),
(664, '127.0.0.1', '2020-07-03 08:20:27'),
(665, '127.0.0.1', '2020-07-03 08:22:31'),
(666, '127.0.0.1', '2020-07-03 08:24:27'),
(667, '127.0.0.1', '2020-07-03 08:25:35'),
(668, '127.0.0.1', '2020-07-03 08:27:02'),
(669, '127.0.0.1', '2020-07-03 08:29:14'),
(670, '127.0.0.1', '2020-07-03 08:44:41'),
(671, '127.0.0.1', '2020-07-03 08:51:11'),
(672, '127.0.0.1', '2020-07-03 08:52:33'),
(673, '127.0.0.1', '2020-07-03 08:57:27'),
(674, '127.0.0.1', '2020-07-03 09:09:15'),
(675, '127.0.0.1', '2020-07-03 09:10:35'),
(676, '127.0.0.1', '2020-07-03 09:11:44'),
(677, '127.0.0.1', '2020-07-03 09:13:34'),
(678, '127.0.0.1', '2020-07-03 09:14:37'),
(679, '127.0.0.1', '2020-07-03 09:16:24'),
(680, '127.0.0.1', '2020-07-03 09:23:38'),
(681, '127.0.0.1', '2020-07-03 09:47:19'),
(682, '127.0.0.1', '2020-07-03 09:51:42'),
(683, '127.0.0.1', '2020-07-04 01:09:50'),
(684, '127.0.0.1', '2020-07-04 01:10:58'),
(685, '127.0.0.1', '2020-07-04 01:18:52'),
(686, '127.0.0.1', '2020-07-04 01:26:16'),
(687, '127.0.0.1', '2020-07-04 01:29:23'),
(688, '127.0.0.1', '2020-07-04 01:35:14'),
(689, '127.0.0.1', '2020-07-04 01:36:30'),
(690, '127.0.0.1', '2020-07-04 01:39:18'),
(691, '127.0.0.1', '2020-07-04 01:52:21'),
(692, '127.0.0.1', '2020-07-04 01:53:37'),
(693, '127.0.0.1', '2020-07-06 09:14:13'),
(694, '127.0.0.1', '2020-07-06 09:26:34'),
(695, '127.0.0.1', '2020-07-06 09:30:29'),
(696, '127.0.0.1', '2020-07-06 09:32:20'),
(697, '127.0.0.1', '2020-07-06 09:33:55'),
(698, '127.0.0.1', '2020-07-06 09:35:04'),
(699, '127.0.0.1', '2020-07-07 01:08:46'),
(700, '127.0.0.1', '2020-07-07 02:32:41'),
(701, '127.0.0.1', '2020-07-07 02:34:13'),
(702, '127.0.0.1', '2020-07-07 02:56:13'),
(703, '127.0.0.1', '2020-07-07 02:58:12'),
(704, '127.0.0.1', '2020-07-07 02:59:12'),
(705, '127.0.0.1', '2020-07-07 03:05:28'),
(706, '127.0.0.1', '2020-07-07 04:00:46'),
(707, '127.0.0.1', '2020-07-07 04:10:32'),
(708, '127.0.0.1', '2020-07-07 04:16:06'),
(709, '127.0.0.1', '2020-07-07 04:19:33'),
(710, '127.0.0.1', '2020-07-07 04:20:37'),
(711, '127.0.0.1', '2020-07-07 04:24:08'),
(712, '127.0.0.1', '2020-07-07 04:25:43'),
(713, '127.0.0.1', '2020-07-07 04:32:03'),
(714, '127.0.0.1', '2020-07-07 04:34:25'),
(715, '127.0.0.1', '2020-07-07 04:35:34'),
(716, '127.0.0.1', '2020-07-07 04:40:15'),
(717, '127.0.0.1', '2020-07-07 04:48:39'),
(718, '127.0.0.1', '2020-07-07 04:49:57'),
(719, '127.0.0.1', '2020-07-07 04:53:11'),
(720, '127.0.0.1', '2020-07-07 04:55:40'),
(721, '127.0.0.1', '2020-07-07 04:57:09'),
(722, '127.0.0.1', '2020-07-07 04:58:12'),
(723, '127.0.0.1', '2020-07-07 05:00:37'),
(724, '127.0.0.1', '2020-07-07 07:19:50'),
(725, '127.0.0.1', '2020-07-07 07:22:04'),
(726, '127.0.0.1', '2020-07-07 07:24:41'),
(727, '127.0.0.1', '2020-07-07 07:34:29'),
(728, '127.0.0.1', '2020-07-07 07:56:24'),
(729, '127.0.0.1', '2020-07-07 08:01:23'),
(730, '127.0.0.1', '2020-07-07 08:08:21'),
(731, '127.0.0.1', '2020-07-07 08:10:18'),
(732, '127.0.0.1', '2020-07-07 08:19:05'),
(733, '127.0.0.1', '2020-07-07 08:20:52'),
(734, '127.0.0.1', '2020-07-07 08:21:59'),
(735, '127.0.0.1', '2020-07-07 08:26:02'),
(736, '127.0.0.1', '2020-07-07 08:33:50'),
(737, '127.0.0.1', '2020-07-07 08:38:23'),
(738, '127.0.0.1', '2020-07-07 08:40:41'),
(739, '127.0.0.1', '2020-07-07 08:42:28'),
(740, '127.0.0.1', '2020-07-07 08:43:39'),
(741, '127.0.0.1', '2020-07-07 08:45:21'),
(742, '127.0.0.1', '2020-07-07 08:48:57'),
(743, '127.0.0.1', '2020-07-07 08:51:33'),
(744, '127.0.0.1', '2020-07-07 08:55:39'),
(745, '127.0.0.1', '2020-07-07 08:57:23'),
(746, '127.0.0.1', '2020-07-07 09:00:01'),
(747, '127.0.0.1', '2020-07-07 09:01:19'),
(748, '127.0.0.1', '2020-07-07 09:08:47'),
(749, '127.0.0.1', '2020-07-07 09:10:16'),
(750, '127.0.0.1', '2020-07-07 09:28:16'),
(751, '127.0.0.1', '2020-07-07 09:29:28'),
(752, '127.0.0.1', '2020-07-07 09:39:52'),
(753, '127.0.0.1', '2020-07-07 09:43:21'),
(754, '127.0.0.1', '2020-07-07 09:45:20'),
(755, '127.0.0.1', '2020-07-07 09:49:07'),
(756, '127.0.0.1', '2020-07-07 09:50:23'),
(757, '127.0.0.1', '2020-07-07 09:51:55'),
(758, '127.0.0.1', '2020-07-07 09:54:51'),
(759, '127.0.0.1', '2020-07-07 09:57:46'),
(760, '127.0.0.1', '2020-07-07 10:01:14'),
(761, '127.0.0.1', '2020-07-08 01:57:40'),
(762, '127.0.0.1', '2020-07-08 02:44:49'),
(763, '127.0.0.1', '2020-07-08 02:51:07'),
(764, '127.0.0.1', '2020-07-08 02:58:14'),
(765, '127.0.0.1', '2020-07-08 03:02:48'),
(766, '127.0.0.1', '2020-07-08 03:07:06'),
(767, '127.0.0.1', '2020-07-08 03:09:26'),
(768, '127.0.0.1', '2020-07-08 03:10:26'),
(769, '127.0.0.1', '2020-07-08 03:11:39'),
(770, '127.0.0.1', '2020-07-08 03:13:10'),
(771, '127.0.0.1', '2020-07-08 03:15:38'),
(772, '127.0.0.1', '2020-07-08 03:18:07'),
(773, '127.0.0.1', '2020-07-08 03:21:09'),
(774, '127.0.0.1', '2020-07-08 03:23:14'),
(775, '127.0.0.1', '2020-07-08 03:24:43'),
(776, '127.0.0.1', '2020-07-08 03:27:27'),
(777, '127.0.0.1', '2020-07-08 03:28:45'),
(778, '127.0.0.1', '2020-07-08 03:31:10'),
(779, '127.0.0.1', '2020-07-08 03:36:35'),
(780, '127.0.0.1', '2020-07-08 03:37:51'),
(781, '127.0.0.1', '2020-07-08 03:41:21'),
(782, '127.0.0.1', '2020-07-08 03:43:25'),
(783, '127.0.0.1', '2020-07-08 03:45:38'),
(784, '127.0.0.1', '2020-07-08 03:47:11'),
(785, '127.0.0.1', '2020-07-08 03:50:20'),
(786, '127.0.0.1', '2020-07-08 03:51:38'),
(787, '127.0.0.1', '2020-07-08 04:18:11'),
(788, '127.0.0.1', '2020-07-08 04:20:55'),
(789, '127.0.0.1', '2020-07-08 04:23:20'),
(790, '127.0.0.1', '2020-07-08 04:24:55'),
(791, '127.0.0.1', '2020-07-08 04:27:15'),
(792, '127.0.0.1', '2020-07-08 06:58:58'),
(793, '127.0.0.1', '2020-07-08 07:15:23'),
(794, '127.0.0.1', '2020-07-08 07:23:05'),
(795, '127.0.0.1', '2020-07-08 07:24:42'),
(796, '127.0.0.1', '2020-07-08 07:28:53'),
(797, '127.0.0.1', '2020-07-08 07:34:02'),
(798, '127.0.0.1', '2020-07-08 07:35:49'),
(799, '127.0.0.1', '2020-07-08 07:38:09'),
(800, '127.0.0.1', '2020-07-08 07:41:28'),
(801, '127.0.0.1', '2020-07-08 07:43:52'),
(802, '127.0.0.1', '2020-07-08 07:45:34'),
(803, '127.0.0.1', '2020-07-08 07:46:59'),
(804, '127.0.0.1', '2020-07-08 07:48:02'),
(805, '127.0.0.1', '2020-07-08 07:50:37'),
(806, '127.0.0.1', '2020-07-08 07:54:35'),
(807, '127.0.0.1', '2020-07-08 07:55:42'),
(808, '127.0.0.1', '2020-07-08 07:56:42'),
(809, '127.0.0.1', '2020-07-08 07:59:12'),
(810, '127.0.0.1', '2020-07-08 08:01:12'),
(811, '127.0.0.1', '2020-07-08 08:02:22'),
(812, '127.0.0.1', '2020-07-08 08:15:12'),
(813, '127.0.0.1', '2020-07-08 08:45:51'),
(814, '127.0.0.1', '2020-07-08 09:03:46'),
(815, '127.0.0.1', '2020-07-08 09:58:01'),
(816, '127.0.0.1', '2020-07-08 10:00:38'),
(817, '127.0.0.1', '2020-07-08 10:01:39'),
(818, '127.0.0.1', '2020-07-08 10:02:41'),
(819, '127.0.0.1', '2020-08-10 04:03:10'),
(820, '127.0.0.1', '2020-08-10 04:20:14'),
(821, '127.0.0.1', '2020-08-10 04:22:34'),
(822, '127.0.0.1', '2020-08-10 04:45:23'),
(823, '127.0.0.1', '2020-08-10 04:47:11'),
(824, '127.0.0.1', '2020-08-10 04:48:43'),
(825, '127.0.0.1', '2020-08-10 04:50:35'),
(826, '127.0.0.1', '2020-08-10 04:54:53'),
(827, '127.0.0.1', '2020-08-10 06:58:30'),
(828, '127.0.0.1', '2020-08-10 07:37:17'),
(829, '127.0.0.1', '2020-08-10 07:49:11'),
(830, '127.0.0.1', '2020-08-10 07:51:35'),
(831, '127.0.0.1', '2020-08-10 07:53:18'),
(832, '127.0.0.1', '2020-08-10 07:54:55'),
(833, '127.0.0.1', '2020-08-10 07:58:16'),
(834, '127.0.0.1', '2020-08-10 07:59:16'),
(835, '127.0.0.1', '2020-08-10 08:01:00'),
(836, '127.0.0.1', '2020-08-10 08:05:08'),
(837, '127.0.0.1', '2020-08-10 08:16:09'),
(838, '127.0.0.1', '2020-08-10 08:17:16'),
(839, '127.0.0.1', '2020-08-10 08:24:36'),
(840, '127.0.0.1', '2020-08-10 08:27:00'),
(841, '127.0.0.1', '2020-08-10 08:30:05'),
(842, '127.0.0.1', '2020-08-10 08:36:24'),
(843, '127.0.0.1', '2020-08-10 08:37:58'),
(844, '127.0.0.1', '2020-08-10 08:39:28'),
(845, '127.0.0.1', '2020-08-10 08:40:35'),
(846, '127.0.0.1', '2020-08-10 08:45:02'),
(847, '127.0.0.1', '2020-08-10 08:47:26'),
(848, '127.0.0.1', '2020-08-10 08:48:44'),
(849, '127.0.0.1', '2020-08-10 08:53:59'),
(850, '127.0.0.1', '2020-08-10 09:00:17'),
(851, '127.0.0.1', '2020-08-10 09:05:11'),
(852, '127.0.0.1', '2020-08-10 09:33:01'),
(853, '127.0.0.1', '2020-08-10 09:34:42'),
(854, '127.0.0.1', '2020-08-11 01:39:43'),
(855, '127.0.0.1', '2020-08-11 01:42:40'),
(856, '127.0.0.1', '2020-08-11 02:07:39'),
(857, '127.0.0.1', '2020-08-11 02:09:22'),
(858, '127.0.0.1', '2020-08-11 02:11:11'),
(859, '127.0.0.1', '2020-08-11 02:12:56'),
(860, '127.0.0.1', '2020-08-11 02:13:57'),
(861, '127.0.0.1', '2020-08-11 02:33:10'),
(862, '127.0.0.1', '2020-08-11 02:36:50'),
(863, '127.0.0.1', '2020-08-11 02:42:19'),
(864, '127.0.0.1', '2020-08-11 02:45:20'),
(865, '127.0.0.1', '2020-08-11 02:46:39'),
(866, '127.0.0.1', '2020-08-11 02:47:39'),
(867, '127.0.0.1', '2020-08-11 02:48:45'),
(868, '127.0.0.1', '2020-08-11 02:51:52'),
(869, '127.0.0.1', '2020-08-11 02:52:52'),
(870, '127.0.0.1', '2020-08-11 02:54:16'),
(871, '127.0.0.1', '2020-08-11 02:55:16'),
(872, '127.0.0.1', '2020-08-11 02:57:10'),
(873, '127.0.0.1', '2020-08-11 02:58:39'),
(874, '127.0.0.1', '2020-08-11 03:11:39'),
(875, '127.0.0.1', '2020-08-11 03:13:33'),
(876, '127.0.0.1', '2020-08-11 03:19:03'),
(877, '127.0.0.1', '2020-08-11 04:40:42'),
(878, '127.0.0.1', '2020-08-11 04:42:31'),
(879, '127.0.0.1', '2020-08-11 04:46:42'),
(880, '127.0.0.1', '2020-08-11 04:47:42'),
(881, '127.0.0.1', '2020-08-11 04:49:17'),
(882, '127.0.0.1', '2020-08-11 04:50:47'),
(883, '127.0.0.1', '2020-08-11 06:48:47'),
(884, '127.0.0.1', '2020-08-11 06:50:44'),
(885, '127.0.0.1', '2020-08-11 06:58:09'),
(886, '127.0.0.1', '2020-08-11 07:04:29'),
(887, '127.0.0.1', '2020-08-11 07:07:18'),
(888, '127.0.0.1', '2020-08-11 07:09:03'),
(889, '127.0.0.1', '2020-08-11 07:10:16'),
(890, '127.0.0.1', '2020-08-11 07:14:01'),
(891, '127.0.0.1', '2020-08-11 08:29:42'),
(892, '127.0.0.1', '2020-08-11 09:01:28'),
(893, '127.0.0.1', '2020-08-11 09:06:24'),
(894, '127.0.0.1', '2020-08-11 09:07:53'),
(895, '127.0.0.1', '2020-08-11 09:11:07'),
(896, '127.0.0.1', '2020-08-11 09:13:16'),
(897, '127.0.0.1', '2020-08-11 09:15:19'),
(898, '127.0.0.1', '2020-08-11 09:16:37'),
(899, '127.0.0.1', '2020-08-11 09:43:43'),
(900, '127.0.0.1', '2020-08-11 09:58:44'),
(901, '127.0.0.1', '2020-08-12 04:39:51'),
(902, '127.0.0.1', '2020-08-12 04:52:01'),
(903, '127.0.0.1', '2020-08-12 04:59:10'),
(904, '127.0.0.1', '2020-08-12 05:00:28'),
(905, '127.0.0.1', '2020-08-12 05:02:03'),
(906, '127.0.0.1', '2020-08-12 05:03:33'),
(907, '127.0.0.1', '2020-08-12 05:06:08'),
(908, '127.0.0.1', '2020-08-12 05:11:52'),
(909, '127.0.0.1', '2020-08-12 05:12:57'),
(910, '127.0.0.1', '2020-08-12 05:14:26'),
(911, '127.0.0.1', '2020-08-15 03:12:12'),
(912, '127.0.0.1', '2020-08-15 03:18:05'),
(913, '127.0.0.1', '2020-08-15 03:21:18'),
(914, '127.0.0.1', '2020-08-15 03:26:22'),
(915, '127.0.0.1', '2020-08-15 03:28:58'),
(916, '127.0.0.1', '2020-08-15 03:31:02'),
(917, '127.0.0.1', '2020-08-15 03:32:04'),
(918, '127.0.0.1', '2020-08-15 03:47:19'),
(919, '127.0.0.1', '2020-08-15 03:48:39'),
(920, '127.0.0.1', '2020-08-15 03:49:39'),
(921, '127.0.0.1', '2020-08-15 03:52:19'),
(922, '127.0.0.1', '2020-08-15 03:54:05'),
(923, '127.0.0.1', '2020-08-15 03:55:27'),
(924, '127.0.0.1', '2020-08-15 03:56:28'),
(925, '127.0.0.1', '2020-08-15 03:58:21'),
(926, '127.0.0.1', '2020-08-15 03:59:41'),
(927, '127.0.0.1', '2020-08-15 04:01:09'),
(928, '127.0.0.1', '2020-08-15 04:05:08'),
(929, '127.0.0.1', '2020-08-15 04:08:26'),
(930, '127.0.0.1', '2020-08-15 04:09:44'),
(931, '127.0.0.1', '2020-08-15 04:10:51'),
(932, '127.0.0.1', '2020-08-15 04:13:56'),
(933, '127.0.0.1', '2020-08-15 04:16:08'),
(934, '127.0.0.1', '2020-08-15 04:17:48'),
(935, '127.0.0.1', '2020-08-15 04:32:21'),
(936, '127.0.0.1', '2020-08-15 04:33:42'),
(937, '127.0.0.1', '2020-08-15 04:39:53'),
(938, '127.0.0.1', '2020-08-17 01:58:38'),
(939, '127.0.0.1', '2020-08-17 02:14:07'),
(940, '127.0.0.1', '2020-08-17 04:41:33'),
(941, '127.0.0.1', '2020-08-17 09:33:50'),
(942, '127.0.0.1', '2020-08-18 01:19:34'),
(943, '127.0.0.1', '2020-08-18 01:48:14'),
(944, '127.0.0.1', '2020-08-18 01:57:20'),
(945, '127.0.0.1', '2020-08-18 02:02:37'),
(946, '127.0.0.1', '2020-08-18 02:03:38'),
(947, '127.0.0.1', '2020-08-18 02:07:13'),
(948, '127.0.0.1', '2020-08-18 02:10:27'),
(949, '127.0.0.1', '2020-08-25 02:39:48'),
(950, '127.0.0.1', '2020-08-25 03:52:59'),
(951, '127.0.0.1', '2020-08-25 04:19:07'),
(952, '127.0.0.1', '2020-08-25 04:23:30'),
(953, '127.0.0.1', '2020-08-25 06:45:33'),
(954, '127.0.0.1', '2020-08-25 07:10:14'),
(955, '127.0.0.1', '2020-08-25 07:31:52'),
(956, '127.0.0.1', '2020-08-25 07:35:54'),
(957, '127.0.0.1', '2020-08-25 07:39:03'),
(958, '127.0.0.1', '2020-08-25 07:46:51'),
(959, '127.0.0.1', '2020-08-25 07:49:37'),
(960, '127.0.0.1', '2020-08-25 07:55:14'),
(961, '127.0.0.1', '2020-08-25 08:00:29'),
(962, '127.0.0.1', '2020-08-25 08:03:16'),
(963, '127.0.0.1', '2020-08-25 08:04:39'),
(964, '127.0.0.1', '2020-08-25 08:06:31'),
(965, '127.0.0.1', '2020-08-25 08:07:32'),
(966, '127.0.0.1', '2020-08-25 08:14:58'),
(967, '127.0.0.1', '2020-08-25 08:17:23'),
(968, '127.0.0.1', '2020-08-25 08:24:09'),
(969, '127.0.0.1', '2020-08-25 08:26:56'),
(970, '127.0.0.1', '2020-08-25 08:42:43'),
(971, '127.0.0.1', '2020-08-25 08:43:49'),
(972, '127.0.0.1', '2020-08-25 08:45:31'),
(973, '127.0.0.1', '2020-08-25 08:47:06'),
(974, '127.0.0.1', '2020-08-25 08:49:47'),
(975, '127.0.0.1', '2020-08-25 08:52:32'),
(976, '127.0.0.1', '2020-08-25 08:54:50'),
(977, '127.0.0.1', '2020-08-25 09:35:05'),
(978, '127.0.0.1', '2020-08-25 09:49:21'),
(979, '127.0.0.1', '2020-08-25 09:55:32'),
(980, '127.0.0.1', '2020-08-25 09:57:20'),
(981, '127.0.0.1', '2020-08-25 09:59:36'),
(982, '127.0.0.1', '2020-08-25 10:01:13'),
(983, '127.0.0.1', '2020-08-25 10:02:41'),
(984, '127.0.0.1', '2020-08-26 04:07:51'),
(985, '127.0.0.1', '2020-08-26 07:45:36'),
(986, '127.0.0.1', '2020-08-26 07:55:42'),
(987, '127.0.0.1', '2020-08-26 07:58:09'),
(988, '127.0.0.1', '2020-08-26 07:59:09'),
(989, '127.0.0.1', '2020-08-26 08:02:22'),
(990, '127.0.0.1', '2020-08-26 08:03:44'),
(991, '127.0.0.1', '2020-08-26 08:09:50'),
(992, '127.0.0.1', '2020-08-26 08:16:28'),
(993, '127.0.0.1', '2020-08-26 08:18:31'),
(994, '127.0.0.1', '2020-08-26 09:01:23'),
(995, '127.0.0.1', '2020-08-26 09:05:26'),
(996, '127.0.0.1', '2020-08-26 09:07:57'),
(997, '127.0.0.1', '2020-08-26 09:09:20'),
(998, '127.0.0.1', '2020-08-26 09:22:50'),
(999, '127.0.0.1', '2020-08-26 09:26:14'),
(1000, '127.0.0.1', '2020-08-26 09:36:50'),
(1001, '127.0.0.1', '2020-08-26 09:38:50'),
(1002, '127.0.0.1', '2020-08-26 09:44:06'),
(1003, '127.0.0.1', '2020-08-27 01:19:14'),
(1004, '127.0.0.1', '2020-08-27 02:19:37'),
(1005, '127.0.0.1', '2020-08-27 02:21:34'),
(1006, '127.0.0.1', '2020-08-27 02:23:57'),
(1007, '127.0.0.1', '2020-08-27 02:25:16'),
(1008, '127.0.0.1', '2020-08-27 02:29:00'),
(1009, '127.0.0.1', '2020-08-27 02:31:51'),
(1010, '127.0.0.1', '2020-08-27 02:34:48'),
(1011, '127.0.0.1', '2020-08-27 02:37:11'),
(1012, '127.0.0.1', '2020-08-27 02:45:11'),
(1013, '127.0.0.1', '2020-08-27 02:49:36'),
(1014, '127.0.0.1', '2020-08-27 02:51:20'),
(1015, '127.0.0.1', '2020-08-27 02:52:29'),
(1016, '127.0.0.1', '2020-08-27 02:54:03'),
(1017, '127.0.0.1', '2020-08-27 02:55:50'),
(1018, '127.0.0.1', '2020-08-27 02:59:55'),
(1019, '127.0.0.1', '2020-08-27 03:02:25'),
(1020, '127.0.0.1', '2020-08-27 03:07:14'),
(1021, '127.0.0.1', '2020-08-27 03:34:38'),
(1022, '127.0.0.1', '2020-08-27 04:00:10'),
(1023, '127.0.0.1', '2020-08-27 04:02:04'),
(1024, '127.0.0.1', '2020-08-27 04:05:58'),
(1025, '127.0.0.1', '2020-08-27 04:08:46'),
(1026, '127.0.0.1', '2020-08-27 04:16:03'),
(1027, '127.0.0.1', '2020-08-27 04:17:44'),
(1028, '127.0.0.1', '2020-08-27 04:20:34'),
(1029, '127.0.0.1', '2020-08-27 04:30:06'),
(1030, '127.0.0.1', '2020-08-27 04:31:25'),
(1031, '127.0.0.1', '2020-08-27 04:36:47'),
(1032, '127.0.0.1', '2020-08-27 04:38:55'),
(1033, '127.0.0.1', '2020-08-27 04:44:57'),
(1034, '127.0.0.1', '2020-08-27 04:46:33'),
(1035, '127.0.0.1', '2020-08-27 04:48:24'),
(1036, '127.0.0.1', '2020-08-27 04:58:44'),
(1037, '127.0.0.1', '2020-08-27 08:22:26'),
(1038, '127.0.0.1', '2020-08-27 08:29:01'),
(1039, '127.0.0.1', '2020-08-27 08:31:47'),
(1040, '127.0.0.1', '2020-08-27 08:47:49'),
(1041, '127.0.0.1', '2020-08-27 08:53:04'),
(1042, '127.0.0.1', '2020-08-27 08:56:26'),
(1043, '127.0.0.1', '2020-08-27 09:00:09'),
(1044, '127.0.0.1', '2020-08-27 09:01:29'),
(1045, '127.0.0.1', '2020-08-28 09:21:33'),
(1046, '127.0.0.1', '2020-08-28 09:22:40'),
(1047, '127.0.0.1', '2020-08-28 09:23:51'),
(1048, '127.0.0.1', '2020-08-28 09:25:19'),
(1049, '127.0.0.1', '2020-08-28 09:30:19'),
(1050, '127.0.0.1', '2020-08-31 03:26:00'),
(1051, '127.0.0.1', '2020-09-03 02:07:26'),
(1052, '127.0.0.1', '2020-09-03 02:10:56'),
(1053, '127.0.0.1', '2020-09-03 02:13:06'),
(1054, '127.0.0.1', '2020-09-03 02:15:15'),
(1055, '127.0.0.1', '2020-09-03 02:29:14'),
(1056, '127.0.0.1', '2020-09-07 07:48:03'),
(1057, '127.0.0.1', '2020-09-07 08:07:59'),
(1058, '127.0.0.1', '2020-09-07 08:10:55'),
(1059, '127.0.0.1', '2020-09-07 08:13:23'),
(1060, '127.0.0.1', '2020-09-07 08:17:24'),
(1061, '127.0.0.1', '2020-09-07 08:22:02'),
(1062, '127.0.0.1', '2020-09-07 08:24:18'),
(1063, '127.0.0.1', '2020-09-07 08:30:18'),
(1064, '127.0.0.1', '2020-09-07 08:31:37'),
(1065, '127.0.0.1', '2020-09-07 08:32:42'),
(1066, '127.0.0.1', '2020-09-07 08:47:29'),
(1067, '127.0.0.1', '2020-09-07 08:59:14'),
(1068, '127.0.0.1', '2020-09-07 09:00:56'),
(1069, '127.0.0.1', '2020-09-07 09:02:42'),
(1070, '127.0.0.1', '2020-09-07 09:03:55'),
(1071, '127.0.0.1', '2020-09-07 09:37:06'),
(1072, '127.0.0.1', '2020-09-07 09:38:36'),
(1073, '127.0.0.1', '2020-09-08 01:31:58'),
(1074, '127.0.0.1', '2020-09-08 01:36:06'),
(1075, '127.0.0.1', '2020-09-08 01:37:38'),
(1076, '127.0.0.1', '2020-09-08 01:43:46'),
(1077, '127.0.0.1', '2020-09-08 01:48:01'),
(1078, '127.0.0.1', '2020-09-08 01:52:53'),
(1079, '127.0.0.1', '2020-09-08 02:08:25'),
(1080, '127.0.0.1', '2020-09-08 02:10:08'),
(1081, '127.0.0.1', '2020-09-08 02:11:42'),
(1082, '127.0.0.1', '2020-09-08 02:17:03'),
(1083, '127.0.0.1', '2020-09-08 02:19:26'),
(1084, '127.0.0.1', '2020-09-08 02:22:35'),
(1085, '127.0.0.1', '2020-09-08 02:24:46'),
(1086, '127.0.0.1', '2020-09-08 02:26:52'),
(1087, '127.0.0.1', '2020-09-08 02:30:30'),
(1088, '127.0.0.1', '2020-09-08 02:31:35'),
(1089, '127.0.0.1', '2020-09-08 02:32:38'),
(1090, '127.0.0.1', '2020-09-08 02:33:40'),
(1091, '127.0.0.1', '2020-09-08 02:44:44'),
(1092, '127.0.0.1', '2020-09-08 02:51:39'),
(1093, '127.0.0.1', '2020-09-08 02:53:32'),
(1094, '127.0.0.1', '2020-09-08 02:55:13'),
(1095, '127.0.0.1', '2020-09-08 03:01:26'),
(1096, '127.0.0.1', '2020-09-08 03:03:15'),
(1097, '127.0.0.1', '2020-09-08 03:05:36'),
(1098, '127.0.0.1', '2020-09-08 03:08:12'),
(1099, '127.0.0.1', '2020-09-08 03:14:52'),
(1100, '127.0.0.1', '2020-09-08 03:41:31'),
(1101, '127.0.0.1', '2020-09-08 03:49:17'),
(1102, '127.0.0.1', '2020-09-08 03:50:41'),
(1103, '127.0.0.1', '2020-09-08 03:54:30'),
(1104, '127.0.0.1', '2020-09-08 03:56:55'),
(1105, '127.0.0.1', '2020-09-08 04:54:09'),
(1106, '127.0.0.1', '2020-09-08 08:04:42'),
(1107, '127.0.0.1', '2020-09-08 08:07:52'),
(1108, '127.0.0.1', '2020-09-08 08:09:09'),
(1109, '127.0.0.1', '2020-09-08 08:12:28'),
(1110, '127.0.0.1', '2020-09-08 08:23:13'),
(1111, '127.0.0.1', '2020-09-08 08:34:07'),
(1112, '127.0.0.1', '2020-09-08 08:40:49'),
(1113, '127.0.0.1', '2020-09-08 09:10:05'),
(1114, '127.0.0.1', '2020-09-08 09:15:08'),
(1115, '127.0.0.1', '2020-09-08 09:37:01'),
(1116, '127.0.0.1', '2020-09-08 10:00:21'),
(1117, '127.0.0.1', '2020-09-09 07:52:16'),
(1118, '127.0.0.1', '2020-09-09 07:55:08'),
(1119, '127.0.0.1', '2020-09-09 10:02:11'),
(1120, '127.0.0.1', '2020-09-09 10:03:38'),
(1121, '127.0.0.1', '2020-09-10 01:08:32'),
(1122, '127.0.0.1', '2020-09-10 01:42:40'),
(1123, '127.0.0.1', '2020-09-10 01:44:25'),
(1124, '127.0.0.1', '2020-09-10 01:48:59'),
(1125, '127.0.0.1', '2020-09-10 01:53:41'),
(1126, '127.0.0.1', '2020-09-10 02:06:41'),
(1127, '127.0.0.1', '2020-09-10 02:11:24'),
(1128, '127.0.0.1', '2020-09-10 02:20:33'),
(1129, '127.0.0.1', '2020-09-10 02:22:06'),
(1130, '127.0.0.1', '2020-09-10 02:24:45'),
(1131, '127.0.0.1', '2020-09-10 02:27:09'),
(1132, '127.0.0.1', '2020-09-10 02:28:29'),
(1133, '127.0.0.1', '2020-09-10 02:33:30'),
(1134, '127.0.0.1', '2020-09-10 02:49:12'),
(1135, '127.0.0.1', '2020-09-10 02:51:15'),
(1136, '127.0.0.1', '2020-09-10 02:53:31'),
(1137, '127.0.0.1', '2020-09-10 02:56:12'),
(1138, '127.0.0.1', '2020-09-10 02:58:52'),
(1139, '127.0.0.1', '2020-09-10 03:00:24'),
(1140, '127.0.0.1', '2020-09-10 03:08:55'),
(1141, '127.0.0.1', '2020-09-10 03:11:08'),
(1142, '127.0.0.1', '2020-09-10 03:18:13'),
(1143, '127.0.0.1', '2020-09-10 03:24:28'),
(1144, '127.0.0.1', '2020-09-10 03:30:25'),
(1145, '127.0.0.1', '2020-09-10 03:32:27'),
(1146, '127.0.0.1', '2020-09-10 03:34:55'),
(1147, '127.0.0.1', '2020-09-10 04:08:25'),
(1148, '127.0.0.1', '2020-09-10 04:16:30'),
(1149, '127.0.0.1', '2020-09-10 04:20:11'),
(1150, '127.0.0.1', '2020-09-10 04:23:13'),
(1151, '127.0.0.1', '2020-09-10 04:32:43'),
(1152, '127.0.0.1', '2020-09-10 04:34:50'),
(1153, '127.0.0.1', '2020-09-10 04:36:28'),
(1154, '127.0.0.1', '2020-09-10 04:37:37'),
(1155, '127.0.0.1', '2020-09-10 04:40:29'),
(1156, '127.0.0.1', '2020-09-10 04:43:34'),
(1157, '127.0.0.1', '2020-09-10 04:45:51'),
(1158, '127.0.0.1', '2020-09-10 07:17:12'),
(1159, '127.0.0.1', '2020-09-11 08:06:53'),
(1160, '127.0.0.1', '2020-09-11 09:10:59'),
(1161, '127.0.0.1', '2020-09-11 09:16:11'),
(1162, '127.0.0.1', '2020-09-11 09:28:44'),
(1163, '127.0.0.1', '2020-09-11 09:29:44'),
(1164, '127.0.0.1', '2020-09-11 09:43:36'),
(1165, '127.0.0.1', '2020-09-11 09:45:37'),
(1166, '127.0.0.1', '2020-09-11 09:47:21'),
(1167, '127.0.0.1', '2020-09-12 01:20:50'),
(1168, '127.0.0.1', '2020-09-12 01:21:50'),
(1169, '127.0.0.1', '2020-09-12 01:28:31'),
(1170, '127.0.0.1', '2020-09-12 01:36:07'),
(1171, '127.0.0.1', '2020-09-12 01:50:08'),
(1172, '127.0.0.1', '2020-09-12 01:51:52'),
(1173, '127.0.0.1', '2020-09-12 01:53:19'),
(1174, '127.0.0.1', '2020-09-12 02:14:46'),
(1175, '127.0.0.1', '2020-09-12 02:33:46'),
(1176, '127.0.0.1', '2020-09-12 02:35:35'),
(1177, '127.0.0.1', '2020-09-12 02:36:36'),
(1178, '127.0.0.1', '2020-09-12 02:40:57'),
(1179, '127.0.0.1', '2020-09-12 02:41:57'),
(1180, '127.0.0.1', '2020-09-12 02:43:13'),
(1181, '127.0.0.1', '2020-09-12 02:45:10'),
(1182, '127.0.0.1', '2020-09-12 02:46:38'),
(1183, '127.0.0.1', '2020-09-12 02:48:06'),
(1184, '127.0.0.1', '2020-09-12 02:49:55'),
(1185, '127.0.0.1', '2020-09-12 02:52:20'),
(1186, '127.0.0.1', '2020-09-12 02:53:28'),
(1187, '127.0.0.1', '2020-09-12 02:58:29'),
(1188, '127.0.0.1', '2020-09-12 03:05:33'),
(1189, '127.0.0.1', '2020-09-12 03:08:43'),
(1190, '127.0.0.1', '2020-09-12 03:11:27'),
(1191, '127.0.0.1', '2020-09-12 03:12:33'),
(1192, '127.0.0.1', '2020-09-12 04:10:29'),
(1193, '127.0.0.1', '2020-09-12 04:22:38'),
(1194, '127.0.0.1', '2020-09-12 04:23:38'),
(1195, '127.0.0.1', '2020-09-12 04:25:54'),
(1196, '127.0.0.1', '2020-09-12 04:27:02'),
(1197, '127.0.0.1', '2020-09-12 04:46:35'),
(1198, '127.0.0.1', '2020-09-12 04:51:46'),
(1199, '127.0.0.1', '2020-09-12 04:54:46'),
(1200, '127.0.0.1', '2020-09-12 05:01:28'),
(1201, '127.0.0.1', '2020-09-14 01:29:58'),
(1202, '127.0.0.1', '2020-09-14 04:30:40'),
(1203, '127.0.0.1', '2020-09-14 04:42:22'),
(1204, '127.0.0.1', '2020-09-14 04:47:09'),
(1205, '127.0.0.1', '2020-09-14 04:51:57'),
(1206, '127.0.0.1', '2020-09-14 06:49:25'),
(1207, '127.0.0.1', '2020-09-14 06:58:45'),
(1208, '127.0.0.1', '2020-09-14 09:08:05'),
(1209, '127.0.0.1', '2020-09-14 09:11:52'),
(1210, '127.0.0.1', '2020-09-14 09:13:32'),
(1211, '127.0.0.1', '2020-09-14 09:16:39'),
(1212, '127.0.0.1', '2020-09-14 09:19:39'),
(1213, '127.0.0.1', '2020-09-14 09:21:24'),
(1214, '127.0.0.1', '2020-12-17 09:56:38'),
(1215, '127.0.0.1', '2020-12-17 09:59:02'),
(1216, '127.0.0.1', '2020-12-17 10:03:33');
INSERT INTO `counter` (`id`, `ip_address`, `last_visit`) VALUES
(1217, '127.0.0.1', '2020-12-18 01:37:33'),
(1218, '127.0.0.1', '2020-12-18 02:17:33'),
(1219, '127.0.0.1', '2020-12-18 02:18:47'),
(1220, '127.0.0.1', '2020-12-18 02:20:40'),
(1221, '127.0.0.1', '2020-12-18 02:23:46'),
(1222, '127.0.0.1', '2020-12-18 03:21:11'),
(1223, '127.0.0.1', '2020-12-18 03:22:18'),
(1224, '127.0.0.1', '2020-12-18 03:25:18'),
(1225, '127.0.0.1', '2020-12-18 03:28:16'),
(1226, '127.0.0.1', '2020-12-18 03:29:24'),
(1227, '127.0.0.1', '2020-12-18 03:30:35'),
(1228, '127.0.0.1', '2020-12-18 03:37:56'),
(1229, '127.0.0.1', '2020-12-18 03:49:28'),
(1230, '127.0.0.1', '2020-12-18 03:51:56'),
(1231, '127.0.0.1', '2020-12-18 03:52:57'),
(1232, '127.0.0.1', '2020-12-18 03:54:51'),
(1233, '127.0.0.1', '2020-12-18 03:56:55'),
(1234, '127.0.0.1', '2020-12-18 03:59:34'),
(1235, '127.0.0.1', '2020-12-18 04:02:57'),
(1236, '127.0.0.1', '2020-12-18 04:04:05'),
(1237, '127.0.0.1', '2020-12-18 04:06:08'),
(1238, '127.0.0.1', '2020-12-18 06:38:10'),
(1239, '127.0.0.1', '2020-12-18 08:26:36'),
(1240, '127.0.0.1', '2020-12-18 08:27:49'),
(1241, '127.0.0.1', '2020-12-21 01:32:25'),
(1242, '127.0.0.1', '2020-12-22 06:45:21'),
(1243, '127.0.0.1', '2020-12-22 06:59:52'),
(1244, '127.0.0.1', '2020-12-30 02:41:55'),
(1245, '127.0.0.1', '2020-12-30 02:48:14'),
(1246, '127.0.0.1', '2020-12-30 03:25:14'),
(1247, '127.0.0.1', '2020-12-30 03:27:57'),
(1248, '127.0.0.1', '2020-12-30 03:39:44'),
(1249, '127.0.0.1', '2020-12-30 03:42:07'),
(1250, '127.0.0.1', '2020-12-30 04:34:08'),
(1251, '127.0.0.1', '2021-01-04 02:49:15'),
(1252, '127.0.0.1', '2021-01-04 02:50:15'),
(1253, '127.0.0.1', '2021-01-04 02:51:18'),
(1254, '127.0.0.1', '2021-01-04 03:45:51'),
(1255, '127.0.0.1', '2021-01-04 03:46:54'),
(1256, '127.0.0.1', '2021-01-04 03:49:38'),
(1257, '127.0.0.1', '2021-01-04 03:53:25'),
(1258, '127.0.0.1', '2021-01-04 04:28:09'),
(1259, '127.0.0.1', '2021-01-04 04:49:56'),
(1260, '127.0.0.1', '2021-01-04 04:56:03'),
(1261, '127.0.0.1', '2021-01-04 04:57:56'),
(1262, '127.0.0.1', '2021-01-04 06:33:23'),
(1263, '127.0.0.1', '2021-01-04 06:37:30'),
(1264, '127.0.0.1', '2021-01-04 06:53:59'),
(1265, '127.0.0.1', '2021-01-04 06:55:24'),
(1266, '127.0.0.1', '2021-01-04 06:56:45'),
(1267, '127.0.0.1', '2021-01-04 06:58:30'),
(1268, '127.0.0.1', '2021-01-04 07:00:01'),
(1269, '127.0.0.1', '2021-01-04 07:06:20'),
(1270, '127.0.0.1', '2021-01-04 07:11:38'),
(1271, '127.0.0.1', '2021-01-04 07:13:22'),
(1272, '127.0.0.1', '2021-01-04 07:18:00'),
(1273, '127.0.0.1', '2021-01-04 07:43:04'),
(1274, '127.0.0.1', '2021-01-04 07:45:16'),
(1275, '127.0.0.1', '2021-01-04 08:36:04'),
(1276, '127.0.0.1', '2021-01-04 08:54:09'),
(1277, '127.0.0.1', '2021-01-04 08:56:33'),
(1278, '127.0.0.1', '2021-01-04 09:59:39'),
(1279, '127.0.0.1', '2021-01-05 04:04:18'),
(1280, '127.0.0.1', '2021-01-05 04:05:57'),
(1281, '127.0.0.1', '2021-01-05 04:09:29'),
(1282, '127.0.0.1', '2021-01-05 04:11:50'),
(1283, '127.0.0.1', '2021-01-05 04:15:47'),
(1284, '127.0.0.1', '2021-01-05 04:22:16'),
(1285, '127.0.0.1', '2021-01-05 04:51:56'),
(1286, '127.0.0.1', '2021-01-05 06:50:11'),
(1287, '127.0.0.1', '2021-01-05 07:19:24'),
(1288, '127.0.0.1', '2021-01-05 07:21:35'),
(1289, '127.0.0.1', '2021-01-05 07:34:44'),
(1290, '127.0.0.1', '2021-01-05 09:01:10'),
(1291, '127.0.0.1', '2021-01-05 09:02:29'),
(1292, '127.0.0.1', '2021-01-05 09:10:22'),
(1293, '127.0.0.1', '2021-01-05 09:11:39'),
(1294, '127.0.0.1', '2021-01-05 09:12:46'),
(1295, '127.0.0.1', '2021-01-05 09:14:05'),
(1296, '127.0.0.1', '2021-01-05 09:54:23'),
(1297, '127.0.0.1', '2021-01-05 13:01:17'),
(1298, '127.0.0.1', '2021-01-05 13:02:22'),
(1299, '127.0.0.1', '2021-01-05 13:04:57'),
(1300, '127.0.0.1', '2021-01-05 13:10:56'),
(1301, '127.0.0.1', '2021-01-06 06:33:44'),
(1302, '127.0.0.1', '2021-01-06 06:40:27'),
(1303, '127.0.0.1', '2021-01-06 07:15:33'),
(1304, '127.0.0.1', '2021-01-06 08:56:19'),
(1305, '127.0.0.1', '2021-01-06 09:20:39'),
(1306, '127.0.0.1', '2021-01-07 01:07:04'),
(1307, '127.0.0.1', '2021-01-07 01:40:44'),
(1308, '127.0.0.1', '2021-01-07 01:42:33'),
(1309, '127.0.0.1', '2021-01-07 01:48:38'),
(1310, '127.0.0.1', '2021-01-07 01:50:51'),
(1311, '127.0.0.1', '2021-01-07 01:53:47'),
(1312, '127.0.0.1', '2021-01-07 01:55:44'),
(1313, '127.0.0.1', '2021-01-07 01:57:05'),
(1314, '127.0.0.1', '2021-01-07 02:03:32'),
(1315, '127.0.0.1', '2021-01-07 02:09:10'),
(1316, '127.0.0.1', '2021-01-07 02:10:30'),
(1317, '127.0.0.1', '2021-01-07 02:12:10'),
(1318, '127.0.0.1', '2021-01-07 02:25:10'),
(1319, '127.0.0.1', '2021-01-07 02:27:15'),
(1320, '127.0.0.1', '2021-01-07 02:28:47'),
(1321, '127.0.0.1', '2021-01-07 02:41:47'),
(1322, '127.0.0.1', '2021-01-07 02:46:12'),
(1323, '127.0.0.1', '2021-01-07 02:47:52'),
(1324, '127.0.0.1', '2021-01-07 02:53:23'),
(1325, '127.0.0.1', '2021-01-07 02:59:07'),
(1326, '127.0.0.1', '2021-01-07 03:02:47'),
(1327, '127.0.0.1', '2021-01-07 03:03:55'),
(1328, '127.0.0.1', '2021-01-07 03:06:00'),
(1329, '127.0.0.1', '2021-01-07 03:10:27'),
(1330, '127.0.0.1', '2021-01-07 03:11:28'),
(1331, '127.0.0.1', '2021-01-07 03:13:12'),
(1332, '127.0.0.1', '2021-01-07 03:15:40'),
(1333, '127.0.0.1', '2021-01-07 03:16:59'),
(1334, '127.0.0.1', '2021-01-07 03:21:42'),
(1335, '127.0.0.1', '2021-01-07 03:25:34'),
(1336, '127.0.0.1', '2021-01-07 03:32:39'),
(1337, '127.0.0.1', '2021-01-07 03:34:39'),
(1338, '127.0.0.1', '2021-01-07 03:36:05'),
(1339, '127.0.0.1', '2021-01-07 03:39:49'),
(1340, '127.0.0.1', '2021-01-07 03:42:06'),
(1341, '127.0.0.1', '2021-01-07 03:43:39'),
(1342, '127.0.0.1', '2021-01-07 03:46:00'),
(1343, '127.0.0.1', '2021-01-07 03:47:10'),
(1344, '127.0.0.1', '2021-02-01 02:10:52'),
(1345, '127.0.0.1', '2021-02-01 04:11:07'),
(1346, '127.0.0.1', '2021-02-01 08:19:15'),
(1347, '127.0.0.1', '2021-02-01 08:33:18'),
(1348, '127.0.0.1', '2021-02-01 08:51:58'),
(1349, '127.0.0.1', '2021-02-01 08:58:35'),
(1350, '127.0.0.1', '2021-02-01 09:00:13'),
(1351, '127.0.0.1', '2021-02-01 09:05:57'),
(1352, '127.0.0.1', '2021-02-01 09:07:05'),
(1353, '127.0.0.1', '2021-02-01 09:09:40'),
(1354, '127.0.0.1', '2021-02-01 09:10:52'),
(1355, '127.0.0.1', '2021-02-01 09:12:39'),
(1356, '127.0.0.1', '2021-02-01 09:16:07'),
(1357, '127.0.0.1', '2021-02-01 09:18:36'),
(1358, '127.0.0.1', '2021-02-01 09:25:33'),
(1359, '127.0.0.1', '2021-02-01 09:27:07'),
(1360, '127.0.0.1', '2021-02-01 09:28:10'),
(1361, '127.0.0.1', '2021-02-01 09:30:41'),
(1362, '127.0.0.1', '2021-02-01 09:32:20'),
(1363, '127.0.0.1', '2021-02-01 09:34:27'),
(1364, '127.0.0.1', '2021-02-01 09:36:05'),
(1365, '127.0.0.1', '2021-02-01 09:56:23'),
(1366, '127.0.0.1', '2021-02-01 09:57:40'),
(1367, '127.0.0.1', '2021-02-01 09:59:34'),
(1368, '127.0.0.1', '2021-02-02 01:19:33'),
(1369, '127.0.0.1', '2021-02-02 01:40:18'),
(1370, '127.0.0.1', '2021-02-02 01:42:16'),
(1371, '127.0.0.1', '2021-02-02 01:43:48'),
(1372, '127.0.0.1', '2021-02-02 01:46:10'),
(1373, '127.0.0.1', '2021-02-02 01:50:58'),
(1374, '127.0.0.1', '2021-02-02 01:53:28'),
(1375, '127.0.0.1', '2021-02-02 01:54:48'),
(1376, '127.0.0.1', '2021-02-02 01:57:45'),
(1377, '127.0.0.1', '2021-02-02 01:58:46'),
(1378, '127.0.0.1', '2021-02-02 01:59:58'),
(1379, '127.0.0.1', '2021-02-02 02:01:24'),
(1380, '127.0.0.1', '2021-02-02 02:03:31'),
(1381, '127.0.0.1', '2021-02-02 02:05:14'),
(1382, '127.0.0.1', '2021-02-02 02:07:01'),
(1383, '127.0.0.1', '2021-02-02 02:14:58'),
(1384, '127.0.0.1', '2021-02-02 02:16:13'),
(1385, '127.0.0.1', '2021-02-02 02:21:18'),
(1386, '127.0.0.1', '2021-02-02 03:03:32'),
(1387, '127.0.0.1', '2021-02-02 03:04:34'),
(1388, '127.0.0.1', '2021-02-02 03:09:42'),
(1389, '127.0.0.1', '2021-02-02 03:12:04'),
(1390, '127.0.0.1', '2021-02-02 03:13:06'),
(1391, '127.0.0.1', '2021-02-02 03:15:51'),
(1392, '127.0.0.1', '2021-02-02 03:18:04'),
(1393, '127.0.0.1', '2021-02-02 03:24:19'),
(1394, '127.0.0.1', '2021-02-02 04:01:45'),
(1395, '127.0.0.1', '2021-02-02 04:04:22'),
(1396, '127.0.0.1', '2021-02-02 04:06:55'),
(1397, '127.0.0.1', '2021-02-02 04:08:14'),
(1398, '127.0.0.1', '2021-02-02 04:18:10'),
(1399, '127.0.0.1', '2021-02-02 04:19:19'),
(1400, '127.0.0.1', '2021-02-02 04:22:16'),
(1401, '127.0.0.1', '2021-02-02 04:25:14'),
(1402, '127.0.0.1', '2021-02-02 04:27:04'),
(1403, '127.0.0.1', '2021-02-02 04:28:23'),
(1404, '127.0.0.1', '2021-02-02 04:38:56'),
(1405, '127.0.0.1', '2021-02-02 07:31:12'),
(1406, '127.0.0.1', '2021-02-02 07:32:20'),
(1407, '127.0.0.1', '2021-02-02 07:33:31'),
(1408, '127.0.0.1', '2021-02-02 07:34:55'),
(1409, '127.0.0.1', '2021-02-02 07:38:37'),
(1410, '127.0.0.1', '2021-02-02 08:11:29'),
(1411, '127.0.0.1', '2021-02-02 08:15:40'),
(1412, '127.0.0.1', '2021-02-02 08:20:33'),
(1413, '127.0.0.1', '2021-02-02 08:21:54'),
(1414, '127.0.0.1', '2021-02-02 08:22:55'),
(1415, '127.0.0.1', '2021-02-02 08:25:07'),
(1416, '127.0.0.1', '2021-02-02 08:28:57'),
(1417, '127.0.0.1', '2021-02-02 08:31:10'),
(1418, '127.0.0.1', '2021-02-02 08:41:03'),
(1419, '127.0.0.1', '2021-02-02 08:42:08'),
(1420, '127.0.0.1', '2021-02-02 08:43:10'),
(1421, '127.0.0.1', '2021-02-02 08:46:42'),
(1422, '127.0.0.1', '2021-02-02 08:48:15'),
(1423, '127.0.0.1', '2021-02-02 08:50:20'),
(1424, '127.0.0.1', '2021-02-02 08:51:35'),
(1425, '127.0.0.1', '2021-02-02 08:55:45'),
(1426, '127.0.0.1', '2021-02-02 08:56:58'),
(1427, '127.0.0.1', '2021-02-02 08:58:03'),
(1428, '127.0.0.1', '2021-02-02 08:59:05'),
(1429, '127.0.0.1', '2021-02-02 09:00:54'),
(1430, '127.0.0.1', '2021-02-02 09:54:29'),
(1431, '127.0.0.1', '2021-02-02 09:57:16'),
(1432, '127.0.0.1', '2021-02-02 10:00:12'),
(1433, '127.0.0.1', '2021-02-03 01:08:55'),
(1434, '127.0.0.1', '2021-02-03 01:40:33'),
(1435, '127.0.0.1', '2021-02-03 01:44:16'),
(1436, '127.0.0.1', '2021-02-03 02:10:36'),
(1437, '127.0.0.1', '2021-02-03 02:13:00'),
(1438, '127.0.0.1', '2021-02-03 02:23:59'),
(1439, '127.0.0.1', '2021-02-03 02:27:32'),
(1440, '127.0.0.1', '2021-02-03 02:30:55'),
(1441, '127.0.0.1', '2021-02-03 02:34:08'),
(1442, '127.0.0.1', '2021-02-03 02:39:11'),
(1443, '127.0.0.1', '2021-02-03 02:41:31'),
(1444, '127.0.0.1', '2021-02-03 03:14:25'),
(1445, '127.0.0.1', '2021-02-03 03:15:47'),
(1446, '127.0.0.1', '2021-02-03 03:48:46'),
(1447, '127.0.0.1', '2021-02-03 03:52:49'),
(1448, '127.0.0.1', '2021-02-03 03:58:21'),
(1449, '127.0.0.1', '2021-02-03 04:03:20'),
(1450, '127.0.0.1', '2021-02-03 04:04:29'),
(1451, '127.0.0.1', '2021-02-03 04:06:03'),
(1452, '127.0.0.1', '2021-02-03 04:07:11'),
(1453, '127.0.0.1', '2021-02-03 04:37:53'),
(1454, '127.0.0.1', '2021-02-03 04:47:22'),
(1455, '127.0.0.1', '2021-02-03 04:49:44'),
(1456, '127.0.0.1', '2021-02-03 04:56:32'),
(1457, '127.0.0.1', '2021-02-03 04:58:54'),
(1458, '127.0.0.1', '2021-02-03 06:59:09'),
(1459, '127.0.0.1', '2021-02-03 07:00:56'),
(1460, '127.0.0.1', '2021-02-03 07:12:19'),
(1461, '127.0.0.1', '2021-02-03 07:19:43'),
(1462, '127.0.0.1', '2021-02-03 08:05:57'),
(1463, '127.0.0.1', '2021-03-06 01:50:14'),
(1464, '127.0.0.1', '2021-03-06 02:04:25'),
(1465, '127.0.0.1', '2021-03-06 02:06:37'),
(1466, '127.0.0.1', '2021-03-06 02:07:46'),
(1467, '127.0.0.1', '2021-03-06 02:13:32'),
(1468, '127.0.0.1', '2021-03-06 02:15:19'),
(1469, '127.0.0.1', '2021-03-06 02:16:54'),
(1470, '127.0.0.1', '2021-03-06 02:23:13'),
(1471, '127.0.0.1', '2021-03-06 02:27:44'),
(1472, '127.0.0.1', '2021-03-06 02:39:57'),
(1473, '127.0.0.1', '2021-03-06 02:41:09'),
(1474, '127.0.0.1', '2021-03-06 02:42:09'),
(1475, '127.0.0.1', '2021-03-06 02:45:32'),
(1476, '127.0.0.1', '2021-03-06 03:07:43'),
(1477, '127.0.0.1', '2021-03-06 03:16:41'),
(1478, '127.0.0.1', '2021-03-06 03:18:46'),
(1479, '127.0.0.1', '2021-03-06 03:20:33'),
(1480, '127.0.0.1', '2021-03-06 03:27:42'),
(1481, '127.0.0.1', '2021-03-06 04:00:12'),
(1482, '127.0.0.1', '2021-03-06 04:27:56'),
(1483, '127.0.0.1', '2021-03-06 04:30:05'),
(1484, '127.0.0.1', '2021-03-06 04:34:00'),
(1485, '127.0.0.1', '2021-03-06 04:36:35'),
(1486, '127.0.0.1', '2021-03-06 04:44:51'),
(1487, '127.0.0.1', '2021-03-06 04:49:48'),
(1488, '127.0.0.1', '2021-03-06 04:52:16'),
(1489, '127.0.0.1', '2021-03-06 04:54:29'),
(1490, '127.0.0.1', '2021-03-06 04:56:17'),
(1491, '127.0.0.1', '2021-03-06 04:57:57'),
(1492, '127.0.0.1', '2021-03-06 05:00:46'),
(1493, '127.0.0.1', '2021-03-08 01:08:31'),
(1494, '127.0.0.1', '2021-03-08 01:31:50'),
(1495, '127.0.0.1', '2021-03-08 01:32:50'),
(1496, '127.0.0.1', '2021-03-08 02:07:46'),
(1497, '127.0.0.1', '2021-03-08 02:10:37'),
(1498, '127.0.0.1', '2021-03-08 02:13:26'),
(1499, '127.0.0.1', '2021-03-08 02:14:26'),
(1500, '127.0.0.1', '2021-03-08 02:18:03'),
(1501, '127.0.0.1', '2021-03-08 02:28:30'),
(1502, '127.0.0.1', '2021-03-08 02:31:20'),
(1503, '127.0.0.1', '2021-03-08 02:46:09'),
(1504, '127.0.0.1', '2021-03-08 03:00:22'),
(1505, '127.0.0.1', '2021-03-08 03:02:31'),
(1506, '127.0.0.1', '2021-03-08 03:05:31'),
(1507, '127.0.0.1', '2021-03-08 03:08:23'),
(1508, '127.0.0.1', '2021-03-08 03:18:28'),
(1509, '127.0.0.1', '2021-03-08 03:21:04'),
(1510, '127.0.0.1', '2021-03-08 03:22:04'),
(1511, '127.0.0.1', '2021-03-08 03:23:15'),
(1512, '127.0.0.1', '2021-03-08 03:24:27'),
(1513, '127.0.0.1', '2021-03-08 03:29:47'),
(1514, '127.0.0.1', '2021-03-08 03:32:08'),
(1515, '127.0.0.1', '2021-03-08 03:36:34'),
(1516, '127.0.0.1', '2021-03-08 03:37:39'),
(1517, '127.0.0.1', '2021-03-08 03:44:34'),
(1518, '127.0.0.1', '2021-03-08 03:46:48'),
(1519, '127.0.0.1', '2021-03-08 03:48:09'),
(1520, '127.0.0.1', '2021-03-08 03:54:51'),
(1521, '127.0.0.1', '2021-03-08 04:16:21'),
(1522, '127.0.0.1', '2021-03-08 04:18:56'),
(1523, '127.0.0.1', '2021-03-08 04:31:30'),
(1524, '127.0.0.1', '2021-03-08 04:32:32'),
(1525, '127.0.0.1', '2021-03-08 04:50:03'),
(1526, '127.0.0.1', '2021-03-08 04:52:12'),
(1527, '127.0.0.1', '2021-03-08 04:53:45'),
(1528, '127.0.0.1', '2021-03-08 04:54:52'),
(1529, '127.0.0.1', '2021-03-08 04:55:55'),
(1530, '127.0.0.1', '2021-03-08 04:56:57'),
(1531, '127.0.0.1', '2021-03-08 05:00:03'),
(1532, '127.0.0.1', '2021-03-08 06:38:46'),
(1533, '127.0.0.1', '2021-03-08 06:42:36'),
(1534, '127.0.0.1', '2021-03-08 06:43:45'),
(1535, '127.0.0.1', '2021-03-08 06:46:49'),
(1536, '127.0.0.1', '2021-03-08 06:48:47'),
(1537, '127.0.0.1', '2021-03-08 06:50:09'),
(1538, '127.0.0.1', '2021-03-08 06:54:21'),
(1539, '127.0.0.1', '2021-03-08 07:07:33'),
(1540, '127.0.0.1', '2021-03-08 07:09:58'),
(1541, '127.0.0.1', '2021-03-08 07:11:44'),
(1542, '127.0.0.1', '2021-03-08 07:16:04'),
(1543, '127.0.0.1', '2021-03-08 07:17:06'),
(1544, '127.0.0.1', '2021-03-08 08:52:14'),
(1545, '127.0.0.1', '2021-03-08 08:53:32'),
(1546, '127.0.0.1', '2021-03-08 08:55:36'),
(1547, '127.0.0.1', '2021-03-08 08:57:17'),
(1548, '127.0.0.1', '2021-03-08 09:00:00'),
(1549, '127.0.0.1', '2021-03-08 09:03:10'),
(1550, '127.0.0.1', '2021-03-08 09:06:45'),
(1551, '127.0.0.1', '2021-03-08 09:08:22'),
(1552, '127.0.0.1', '2021-03-08 09:19:23'),
(1553, '127.0.0.1', '2021-03-08 09:21:53'),
(1554, '127.0.0.1', '2021-03-08 09:23:13'),
(1555, '127.0.0.1', '2021-03-08 09:27:53'),
(1556, '127.0.0.1', '2021-03-08 09:30:57'),
(1557, '127.0.0.1', '2021-03-08 09:34:33'),
(1558, '127.0.0.1', '2021-03-08 09:36:11'),
(1559, '127.0.0.1', '2021-03-08 09:37:42'),
(1560, '127.0.0.1', '2021-03-08 09:38:48'),
(1561, '127.0.0.1', '2021-03-08 09:56:34'),
(1562, '127.0.0.1', '2021-03-09 01:06:46'),
(1563, '127.0.0.1', '2021-03-09 01:26:42'),
(1564, '127.0.0.1', '2021-03-09 02:26:34'),
(1565, '127.0.0.1', '2021-03-09 03:30:04'),
(1566, '127.0.0.1', '2021-03-09 03:40:17'),
(1567, '127.0.0.1', '2021-03-09 03:57:09'),
(1568, '127.0.0.1', '2021-03-09 06:37:48'),
(1569, '127.0.0.1', '2021-03-09 07:26:07'),
(1570, '127.0.0.1', '2021-03-09 07:33:47'),
(1571, '127.0.0.1', '2021-03-09 07:41:51'),
(1572, '127.0.0.1', '2021-03-09 07:45:53'),
(1573, '127.0.0.1', '2021-05-28 04:15:19'),
(1574, '127.0.0.1', '2021-05-28 04:18:29'),
(1575, '127.0.0.1', '2021-05-28 04:20:50'),
(1576, '127.0.0.1', '2021-05-28 04:22:29'),
(1577, '127.0.0.1', '2021-05-28 04:25:13'),
(1578, '127.0.0.1', '2021-05-28 04:26:34'),
(1579, '127.0.0.1', '2021-05-28 04:46:42'),
(1580, '127.0.0.1', '2021-05-28 04:47:57'),
(1581, '127.0.0.1', '2021-05-28 04:50:33'),
(1582, '127.0.0.1', '2021-05-28 04:51:38'),
(1583, '127.0.0.1', '2021-05-28 04:56:13'),
(1584, '127.0.0.1', '2021-05-28 05:02:02'),
(1585, '127.0.0.1', '2021-05-28 07:40:56'),
(1586, '127.0.0.1', '2021-05-28 07:43:18'),
(1587, '127.0.0.1', '2021-05-28 08:06:14'),
(1588, '127.0.0.1', '2021-05-28 08:07:39'),
(1589, '127.0.0.1', '2021-05-28 08:10:52'),
(1590, '127.0.0.1', '2021-05-28 08:13:20'),
(1591, '127.0.0.1', '2021-05-28 08:16:54'),
(1592, '127.0.0.1', '2021-05-28 08:19:01'),
(1593, '127.0.0.1', '2021-05-28 08:21:59'),
(1594, '127.0.0.1', '2021-05-28 08:24:26'),
(1595, '127.0.0.1', '2021-05-28 08:25:38'),
(1596, '127.0.0.1', '2021-05-28 08:28:20'),
(1597, '127.0.0.1', '2021-05-28 08:32:01'),
(1598, '127.0.0.1', '2021-05-28 08:37:38'),
(1599, '127.0.0.1', '2021-05-28 08:39:12'),
(1600, '127.0.0.1', '2021-05-28 08:44:21'),
(1601, '127.0.0.1', '2021-05-28 08:46:13'),
(1602, '127.0.0.1', '2021-05-28 08:47:17'),
(1603, '127.0.0.1', '2021-05-28 08:51:40'),
(1604, '127.0.0.1', '2021-05-28 08:53:51'),
(1605, '127.0.0.1', '2021-05-28 08:55:27'),
(1606, '127.0.0.1', '2021-05-28 08:58:35'),
(1607, '127.0.0.1', '2021-05-28 09:33:38'),
(1608, '127.0.0.1', '2021-05-28 09:43:14'),
(1609, '127.0.0.1', '2021-05-28 09:49:53'),
(1610, '127.0.0.1', '2021-05-28 09:51:27'),
(1611, '127.0.0.1', '2021-05-28 09:57:32'),
(1612, '127.0.0.1', '2021-05-28 09:58:33'),
(1613, '127.0.0.1', '2021-05-28 09:59:49'),
(1614, '127.0.0.1', '2021-05-29 01:20:27'),
(1615, '127.0.0.1', '2021-05-29 01:23:49'),
(1616, '127.0.0.1', '2021-05-29 01:46:00'),
(1617, '127.0.0.1', '2021-05-29 01:58:35'),
(1618, '127.0.0.1', '2021-05-29 02:00:00'),
(1619, '127.0.0.1', '2021-05-29 03:00:40'),
(1620, '127.0.0.1', '2021-05-31 07:48:49'),
(1621, '127.0.0.1', '2021-05-31 07:49:49'),
(1622, '127.0.0.1', '2021-05-31 07:52:00'),
(1623, '127.0.0.1', '2021-05-31 08:20:33'),
(1624, '127.0.0.1', '2021-05-31 10:21:53'),
(1625, '127.0.0.1', '2021-06-01 08:19:42'),
(1626, '127.0.0.1', '2021-06-01 08:50:59'),
(1627, '127.0.0.1', '2021-06-01 08:54:34'),
(1628, '127.0.0.1', '2021-06-01 09:05:04'),
(1629, '127.0.0.1', '2021-06-01 09:08:19'),
(1630, '127.0.0.1', '2021-06-01 09:12:34'),
(1631, '127.0.0.1', '2021-06-01 09:19:20'),
(1632, '127.0.0.1', '2021-06-01 09:20:42'),
(1633, '127.0.0.1', '2021-06-01 10:01:09'),
(1634, '127.0.0.1', '2021-06-01 10:02:58'),
(1635, '127.0.0.1', '2021-06-01 10:52:25'),
(1636, '127.0.0.1', '2021-06-01 10:54:40'),
(1637, '127.0.0.1', '2021-06-01 10:56:13'),
(1638, '127.0.0.1', '2021-06-01 10:57:50'),
(1639, '127.0.0.1', '2021-06-01 10:58:58'),
(1640, '127.0.0.1', '2021-06-01 11:00:24'),
(1641, '127.0.0.1', '2021-06-01 11:02:10'),
(1642, '127.0.0.1', '2021-06-01 11:04:36'),
(1643, '127.0.0.1', '2021-06-01 11:23:37'),
(1644, '127.0.0.1', '2021-06-01 11:24:43'),
(1645, '127.0.0.1', '2021-06-01 11:31:33'),
(1646, '127.0.0.1', '2021-06-01 11:34:03'),
(1647, '127.0.0.1', '2021-06-01 11:36:30'),
(1648, '127.0.0.1', '2021-06-01 11:38:23'),
(1649, '127.0.0.1', '2021-06-01 11:39:30'),
(1650, '127.0.0.1', '2021-06-01 11:41:17'),
(1651, '127.0.0.1', '2021-06-01 11:46:57'),
(1652, '127.0.0.1', '2021-06-01 11:50:58'),
(1653, '127.0.0.1', '2021-06-01 11:53:27'),
(1654, '127.0.0.1', '2021-06-01 11:55:12'),
(1655, '127.0.0.1', '2021-06-02 03:49:25'),
(1656, '127.0.0.1', '2021-06-02 04:01:49'),
(1657, '127.0.0.1', '2021-06-02 04:06:50'),
(1658, '127.0.0.1', '2021-06-02 08:26:23'),
(1659, '127.0.0.1', '2021-06-02 08:56:23'),
(1660, '127.0.0.1', '2021-06-02 10:55:50'),
(1661, '127.0.0.1', '2021-06-02 10:57:19'),
(1662, '127.0.0.1', '2021-06-02 10:59:27'),
(1663, '127.0.0.1', '2021-06-02 11:01:28'),
(1664, '127.0.0.1', '2021-06-02 11:03:57'),
(1665, '127.0.0.1', '2021-06-02 11:05:18'),
(1666, '127.0.0.1', '2021-06-02 11:08:59'),
(1667, '127.0.0.1', '2021-06-02 11:14:26'),
(1668, '127.0.0.1', '2021-06-02 11:20:31'),
(1669, '127.0.0.1', '2021-06-02 11:34:25'),
(1670, '127.0.0.1', '2021-06-02 11:55:35'),
(1671, '127.0.0.1', '2021-06-02 11:57:33'),
(1672, '127.0.0.1', '2021-06-02 11:58:56'),
(1673, '127.0.0.1', '2021-06-02 12:00:03'),
(1674, '127.0.0.1', '2021-06-02 12:01:09'),
(1675, '127.0.0.1', '2021-06-02 12:03:28'),
(1676, '127.0.0.1', '2021-06-02 12:08:49'),
(1677, '127.0.0.1', '2021-06-02 12:11:06'),
(1678, '127.0.0.1', '2021-06-02 12:20:19'),
(1679, '127.0.0.1', '2021-06-02 12:22:04'),
(1680, '127.0.0.1', '2021-06-02 12:23:38'),
(1681, '127.0.0.1', '2021-06-02 12:26:31'),
(1682, '127.0.0.1', '2021-06-02 12:30:46'),
(1683, '127.0.0.1', '2021-06-02 12:32:58'),
(1684, '127.0.0.1', '2021-06-02 13:22:08'),
(1685, '127.0.0.1', '2021-06-02 16:24:11'),
(1686, '127.0.0.1', '2021-06-02 16:25:29'),
(1687, '127.0.0.1', '2021-06-02 16:37:30'),
(1688, '127.0.0.1', '2021-06-02 16:38:57'),
(1689, '127.0.0.1', '2021-06-02 16:47:56'),
(1690, '127.0.0.1', '2021-06-02 16:49:39'),
(1691, '127.0.0.1', '2021-06-02 16:50:57'),
(1692, '127.0.0.1', '2021-06-02 16:52:34'),
(1693, '127.0.0.1', '2021-06-02 16:57:24'),
(1694, '127.0.0.1', '2021-06-02 17:00:54'),
(1695, '127.0.0.1', '2021-06-02 17:05:03'),
(1696, '127.0.0.1', '2021-06-02 17:09:21'),
(1697, '127.0.0.1', '2021-06-02 17:13:56'),
(1698, '127.0.0.1', '2021-06-02 17:15:39'),
(1699, '127.0.0.1', '2021-06-02 17:23:18'),
(1700, '127.0.0.1', '2021-06-02 17:24:35'),
(1701, '127.0.0.1', '2021-06-02 17:28:00'),
(1702, '127.0.0.1', '2021-06-02 17:38:51'),
(1703, '127.0.0.1', '2021-06-02 17:41:35'),
(1704, '127.0.0.1', '2021-06-02 17:45:57'),
(1705, '127.0.0.1', '2021-06-02 17:48:09'),
(1706, '127.0.0.1', '2021-06-02 17:59:09'),
(1707, '127.0.0.1', '2021-06-02 18:00:22'),
(1708, '127.0.0.1', '2021-06-02 18:01:23'),
(1709, '127.0.0.1', '2021-06-02 18:05:24'),
(1710, '127.0.0.1', '2021-06-02 18:08:15'),
(1711, '127.0.0.1', '2021-06-02 18:09:20'),
(1712, '127.0.0.1', '2021-06-02 18:11:33'),
(1713, '127.0.0.1', '2021-06-02 18:13:46'),
(1714, '127.0.0.1', '2021-06-02 18:17:18'),
(1715, '127.0.0.1', '2021-06-02 18:19:19'),
(1716, '127.0.0.1', '2021-06-02 18:30:14'),
(1717, '127.0.0.1', '2021-06-02 18:32:51'),
(1718, '127.0.0.1', '2021-06-02 18:38:44'),
(1719, '127.0.0.1', '2021-06-02 18:45:23'),
(1720, '127.0.0.1', '2021-06-03 03:21:25'),
(1721, '127.0.0.1', '2021-06-03 04:22:44'),
(1722, '127.0.0.1', '2021-06-03 05:22:33'),
(1723, '127.0.0.1', '2021-06-03 05:26:55'),
(1724, '127.0.0.1', '2021-06-03 05:35:11'),
(1725, '127.0.0.1', '2021-06-03 05:36:31'),
(1726, '127.0.0.1', '2021-06-03 05:37:35'),
(1727, '127.0.0.1', '2021-06-03 05:53:29'),
(1728, '127.0.0.1', '2021-06-03 06:00:15'),
(1729, '127.0.0.1', '2021-06-03 06:34:24'),
(1730, '127.0.0.1', '2021-06-03 06:35:35'),
(1731, '127.0.0.1', '2021-06-03 06:38:14'),
(1732, '127.0.0.1', '2021-06-03 06:39:38'),
(1733, '127.0.0.1', '2021-06-03 06:46:31'),
(1734, '127.0.0.1', '2021-06-03 06:48:22'),
(1735, '127.0.0.1', '2021-06-03 06:49:51'),
(1736, '127.0.0.1', '2021-06-03 09:16:09'),
(1737, '127.0.0.1', '2021-06-03 10:30:10'),
(1738, '127.0.0.1', '2021-06-03 10:34:11'),
(1739, '127.0.0.1', '2021-06-03 10:35:22'),
(1740, '127.0.0.1', '2021-06-03 10:37:29'),
(1741, '127.0.0.1', '2021-06-03 10:39:19'),
(1742, '127.0.0.1', '2021-06-03 10:40:40'),
(1743, '127.0.0.1', '2021-06-03 10:41:43'),
(1744, '127.0.0.1', '2021-06-03 10:42:49'),
(1745, '127.0.0.1', '2021-06-03 10:46:46'),
(1746, '127.0.0.1', '2021-06-03 11:28:16'),
(1747, '127.0.0.1', '2021-06-03 11:29:20'),
(1748, '127.0.0.1', '2021-06-03 11:31:12'),
(1749, '127.0.0.1', '2021-06-03 11:33:48'),
(1750, '127.0.0.1', '2021-06-03 11:42:38'),
(1751, '127.0.0.1', '2021-06-03 11:49:10'),
(1752, '127.0.0.1', '2021-06-03 11:50:55'),
(1753, '127.0.0.1', '2021-06-03 11:52:16'),
(1754, '127.0.0.1', '2021-06-03 11:55:42'),
(1755, '127.0.0.1', '2021-06-03 11:58:04'),
(1756, '127.0.0.1', '2021-06-03 11:59:16'),
(1757, '127.0.0.1', '2021-06-03 12:00:47'),
(1758, '127.0.0.1', '2021-06-03 12:03:51'),
(1759, '127.0.0.1', '2021-06-03 12:08:49'),
(1760, '127.0.0.1', '2021-06-03 12:11:06'),
(1761, '127.0.0.1', '2021-06-03 12:14:55'),
(1762, '127.0.0.1', '2021-06-03 12:16:40'),
(1763, '127.0.0.1', '2021-06-03 12:18:27'),
(1764, '127.0.0.1', '2021-06-03 12:19:36'),
(1765, '127.0.0.1', '2021-06-03 12:20:52'),
(1766, '127.0.0.1', '2021-06-03 12:22:19'),
(1767, '127.0.0.1', '2021-06-03 12:23:25'),
(1768, '127.0.0.1', '2021-06-03 12:25:34'),
(1769, '127.0.0.1', '2021-06-03 12:27:33'),
(1770, '127.0.0.1', '2021-06-03 12:28:40'),
(1771, '127.0.0.1', '2021-06-03 12:31:48'),
(1772, '127.0.0.1', '2021-06-03 12:41:21'),
(1773, '127.0.0.1', '2021-06-03 12:52:30'),
(1774, '127.0.0.1', '2021-06-03 13:00:21'),
(1775, '127.0.0.1', '2021-06-03 13:02:29'),
(1776, '127.0.0.1', '2021-06-03 13:04:01'),
(1777, '127.0.0.1', '2021-06-03 13:38:50'),
(1778, '127.0.0.1', '2021-06-03 13:40:09'),
(1779, '127.0.0.1', '2021-06-03 13:43:55'),
(1780, '127.0.0.1', '2021-06-03 14:03:35'),
(1781, '127.0.0.1', '2021-06-03 14:04:50'),
(1782, '127.0.0.1', '2021-06-03 14:06:00'),
(1783, '127.0.0.1', '2021-06-03 14:07:54'),
(1784, '127.0.0.1', '2021-06-03 14:10:48'),
(1785, '127.0.0.1', '2021-06-03 14:11:55'),
(1786, '127.0.0.1', '2021-06-03 17:42:28'),
(1787, '127.0.0.1', '2021-06-03 17:43:39'),
(1788, '127.0.0.1', '2021-06-03 17:54:58'),
(1789, '127.0.0.1', '2021-06-03 17:59:30'),
(1790, '127.0.0.1', '2021-06-03 18:00:59'),
(1791, '127.0.0.1', '2021-06-03 18:04:48'),
(1792, '127.0.0.1', '2021-06-03 18:08:15'),
(1793, '127.0.0.1', '2021-06-03 18:10:43'),
(1794, '127.0.0.1', '2021-06-03 18:11:50'),
(1795, '127.0.0.1', '2021-06-03 18:14:11'),
(1796, '127.0.0.1', '2021-06-03 18:16:08'),
(1797, '127.0.0.1', '2021-06-04 03:33:05'),
(1798, '127.0.0.1', '2021-06-04 03:33:05'),
(1799, '127.0.0.1', '2021-06-04 04:20:15'),
(1800, '127.0.0.1', '2021-06-04 04:36:31'),
(1801, '127.0.0.1', '2021-06-04 04:39:12'),
(1802, '127.0.0.1', '2021-06-04 04:43:07'),
(1803, '127.0.0.1', '2021-06-04 04:44:50'),
(1804, '127.0.0.1', '2021-06-04 04:52:47'),
(1805, '127.0.0.1', '2021-06-04 04:56:26'),
(1806, '127.0.0.1', '2021-06-04 05:00:47'),
(1807, '127.0.0.1', '2021-06-04 05:02:34'),
(1808, '127.0.0.1', '2021-06-04 05:04:28'),
(1809, '127.0.0.1', '2021-06-04 05:08:05'),
(1810, '127.0.0.1', '2021-06-04 05:10:20'),
(1811, '127.0.0.1', '2021-06-04 05:12:55'),
(1812, '127.0.0.1', '2021-06-04 05:15:19'),
(1813, '127.0.0.1', '2021-06-04 05:16:51'),
(1814, '127.0.0.1', '2021-06-04 05:20:10'),
(1815, '127.0.0.1', '2021-06-04 05:22:07'),
(1816, '127.0.0.1', '2021-06-04 05:25:24'),
(1817, '127.0.0.1', '2021-06-04 05:27:56'),
(1818, '127.0.0.1', '2021-06-04 05:29:01'),
(1819, '127.0.0.1', '2021-06-04 05:30:27'),
(1820, '127.0.0.1', '2021-06-04 05:33:57'),
(1821, '127.0.0.1', '2021-06-04 08:14:19'),
(1822, '127.0.0.1', '2021-06-04 08:15:33'),
(1823, '127.0.0.1', '2021-06-04 08:31:29'),
(1824, '127.0.0.1', '2021-06-04 09:12:15'),
(1825, '127.0.0.1', '2021-06-04 09:49:03'),
(1826, '127.0.0.1', '2021-06-04 09:50:39'),
(1827, '127.0.0.1', '2021-06-04 09:52:32'),
(1828, '127.0.0.1', '2021-06-07 03:10:03'),
(1829, '127.0.0.1', '2021-06-07 05:16:59'),
(1830, '127.0.0.1', '2021-06-07 08:58:06'),
(1831, '127.0.0.1', '2021-06-07 09:06:17'),
(1832, '127.0.0.1', '2021-06-07 09:19:40'),
(1833, '127.0.0.1', '2021-06-07 09:57:43'),
(1834, '127.0.0.1', '2021-06-07 09:59:14'),
(1835, '127.0.0.1', '2021-06-08 08:45:27'),
(1836, '127.0.0.1', '2021-06-08 10:01:59'),
(1837, '127.0.0.1', '2021-06-08 10:03:40'),
(1838, '127.0.0.1', '2021-06-08 10:49:43'),
(1839, '127.0.0.1', '2021-06-08 11:26:29'),
(1840, '127.0.0.1', '2021-06-08 11:28:47'),
(1841, '127.0.0.1', '2021-06-08 11:32:08'),
(1842, '127.0.0.1', '2021-06-08 11:36:36'),
(1843, '127.0.0.1', '2021-06-08 11:37:37'),
(1844, '127.0.0.1', '2021-06-08 11:38:50'),
(1845, '127.0.0.1', '2021-06-08 11:39:58'),
(1846, '127.0.0.1', '2021-06-08 11:41:44'),
(1847, '127.0.0.1', '2021-06-08 12:04:57'),
(1848, '127.0.0.1', '2021-06-08 12:06:05'),
(1849, '127.0.0.1', '2021-06-08 12:09:23'),
(1850, '127.0.0.1', '2021-06-08 12:10:40'),
(1851, '127.0.0.1', '2021-06-08 12:20:38'),
(1852, '127.0.0.1', '2021-06-08 12:24:11'),
(1853, '127.0.0.1', '2021-06-08 12:29:06'),
(1854, '127.0.0.1', '2021-06-08 12:31:42'),
(1855, '127.0.0.1', '2021-06-08 12:34:10'),
(1856, '127.0.0.1', '2021-06-08 13:55:41'),
(1857, '127.0.0.1', '2021-06-08 13:56:42'),
(1858, '127.0.0.1', '2021-06-08 13:58:24'),
(1859, '127.0.0.1', '2021-06-08 14:03:20'),
(1860, '127.0.0.1', '2021-06-08 14:04:49'),
(1861, '127.0.0.1', '2021-06-08 14:06:53'),
(1862, '127.0.0.1', '2021-06-08 14:09:48'),
(1863, '127.0.0.1', '2021-06-08 14:10:53'),
(1864, '127.0.0.1', '2021-06-08 14:12:28'),
(1865, '127.0.0.1', '2021-06-08 14:15:31'),
(1866, '127.0.0.1', '2021-06-08 14:16:34'),
(1867, '127.0.0.1', '2021-06-08 14:30:17'),
(1868, '127.0.0.1', '2021-06-08 14:38:40'),
(1869, '127.0.0.1', '2021-06-08 14:39:50'),
(1870, '127.0.0.1', '2021-06-08 14:42:36'),
(1871, '127.0.0.1', '2021-06-09 04:43:18'),
(1872, '127.0.0.1', '2021-06-09 05:07:05'),
(1873, '127.0.0.1', '2021-06-09 05:08:08'),
(1874, '127.0.0.1', '2021-06-09 05:14:58'),
(1875, '127.0.0.1', '2021-06-09 05:25:27'),
(1876, '127.0.0.1', '2021-06-09 05:27:05'),
(1877, '127.0.0.1', '2021-06-09 05:28:14'),
(1878, '127.0.0.1', '2021-06-09 05:38:42'),
(1879, '127.0.0.1', '2021-06-09 05:40:22'),
(1880, '127.0.0.1', '2021-06-09 05:42:12'),
(1881, '127.0.0.1', '2021-06-09 05:43:35'),
(1882, '127.0.0.1', '2021-06-09 05:48:37'),
(1883, '127.0.0.1', '2021-06-09 05:50:27'),
(1884, '127.0.0.1', '2021-06-09 05:52:07'),
(1885, '127.0.0.1', '2021-06-09 05:53:46'),
(1886, '127.0.0.1', '2021-06-09 05:56:43'),
(1887, '127.0.0.1', '2021-06-09 06:06:04'),
(1888, '127.0.0.1', '2021-06-09 06:09:41'),
(1889, '127.0.0.1', '2021-06-09 06:12:32'),
(1890, '127.0.0.1', '2021-06-09 06:22:40'),
(1891, '127.0.0.1', '2021-06-09 06:27:34'),
(1892, '127.0.0.1', '2021-06-09 06:29:24'),
(1893, '127.0.0.1', '2021-06-09 10:19:35'),
(1894, '127.0.0.1', '2021-06-09 10:20:35'),
(1895, '127.0.0.1', '2021-06-09 10:26:10'),
(1896, '127.0.0.1', '2021-06-09 10:27:34'),
(1897, '127.0.0.1', '2021-06-09 10:28:42'),
(1898, '127.0.0.1', '2021-06-09 10:48:10'),
(1899, '127.0.0.1', '2021-06-09 10:49:24'),
(1900, '127.0.0.1', '2021-06-09 10:59:29'),
(1901, '127.0.0.1', '2021-06-09 11:01:19'),
(1902, '127.0.0.1', '2021-06-09 11:05:25'),
(1903, '127.0.0.1', '2021-06-09 11:07:29'),
(1904, '127.0.0.1', '2021-06-09 11:09:05'),
(1905, '127.0.0.1', '2021-06-09 11:23:29'),
(1906, '127.0.0.1', '2021-06-09 13:15:53'),
(1907, '127.0.0.1', '2021-06-09 13:17:07'),
(1908, '127.0.0.1', '2021-06-09 13:19:34'),
(1909, '127.0.0.1', '2021-06-09 13:20:57'),
(1910, '127.0.0.1', '2021-06-09 13:22:13'),
(1911, '127.0.0.1', '2021-06-09 13:23:29'),
(1912, '127.0.0.1', '2021-06-09 13:25:55'),
(1913, '127.0.0.1', '2021-06-09 13:27:15'),
(1914, '127.0.0.1', '2021-06-09 13:34:45'),
(1915, '127.0.0.1', '2021-06-09 13:35:58'),
(1916, '127.0.0.1', '2021-06-09 13:37:22'),
(1917, '127.0.0.1', '2021-06-09 13:38:40'),
(1918, '127.0.0.1', '2021-06-09 13:39:44'),
(1919, '127.0.0.1', '2021-06-09 13:41:44'),
(1920, '127.0.0.1', '2021-06-09 13:43:00'),
(1921, '127.0.0.1', '2021-06-09 13:45:20'),
(1922, '127.0.0.1', '2021-06-09 13:51:04'),
(1923, '127.0.0.1', '2021-06-10 02:23:19'),
(1924, '127.0.0.1', '2021-06-10 04:23:31'),
(1925, '127.0.0.1', '2021-06-10 05:21:11'),
(1926, '127.0.0.1', '2021-07-28 10:49:02'),
(1927, '127.0.0.1', '2021-07-28 10:50:38'),
(1928, '127.0.0.1', '2021-07-28 10:53:14'),
(1929, '127.0.0.1', '2021-07-28 10:54:30'),
(1930, '127.0.0.1', '2021-07-29 02:37:50'),
(1931, '127.0.0.1', '2021-07-29 02:37:50'),
(1932, '127.0.0.1', '2021-07-29 02:39:32'),
(1933, '127.0.0.1', '2021-07-29 02:41:10'),
(1934, '127.0.0.1', '2021-07-29 02:55:41'),
(1935, '127.0.0.1', '2021-07-29 02:57:21'),
(1936, '127.0.0.1', '2021-07-29 02:59:10'),
(1937, '127.0.0.1', '2021-07-29 12:32:41'),
(1938, '127.0.0.1', '2021-07-29 12:48:37'),
(1939, '127.0.0.1', '2021-07-29 12:50:11'),
(1940, '127.0.0.1', '2021-07-29 12:55:14'),
(1941, '127.0.0.1', '2021-07-29 12:57:34'),
(1942, '127.0.0.1', '2021-07-29 12:59:37'),
(1943, '127.0.0.1', '2021-07-29 13:09:55'),
(1944, '127.0.0.1', '2021-07-29 13:22:44'),
(1945, '127.0.0.1', '2021-07-29 13:25:05'),
(1946, '127.0.0.1', '2021-07-30 03:14:37'),
(1947, '127.0.0.1', '2021-07-30 05:53:04'),
(1948, '127.0.0.1', '2021-07-30 05:59:36'),
(1949, '127.0.0.1', '2021-07-30 06:01:00'),
(1950, '127.0.0.1', '2021-07-30 06:02:08'),
(1951, '127.0.0.1', '2021-07-30 06:13:00'),
(1952, '127.0.0.1', '2021-07-30 06:22:57'),
(1953, '127.0.0.1', '2021-07-30 06:26:21'),
(1954, '127.0.0.1', '2021-07-30 06:27:24'),
(1955, '127.0.0.1', '2021-07-30 06:40:34'),
(1956, '127.0.0.1', '2021-07-30 06:53:45'),
(1957, '127.0.0.1', '2021-07-30 06:55:58'),
(1958, '127.0.0.1', '2021-07-30 06:58:45'),
(1959, '127.0.0.1', '2021-07-30 07:02:35'),
(1960, '127.0.0.1', '2021-07-30 10:48:48'),
(1961, '127.0.0.1', '2021-07-31 04:13:40'),
(1962, '127.0.0.1', '2021-07-31 04:13:40'),
(1963, '127.0.0.1', '2021-07-31 04:16:50'),
(1964, '127.0.0.1', '2021-07-31 04:18:50'),
(1965, '127.0.0.1', '2021-07-31 04:22:02'),
(1966, '127.0.0.1', '2021-07-31 04:23:19'),
(1967, '127.0.0.1', '2021-07-31 04:25:43'),
(1968, '127.0.0.1', '2021-07-31 04:29:14'),
(1969, '127.0.0.1', '2021-07-31 04:30:24'),
(1970, '127.0.0.1', '2021-07-31 04:34:21'),
(1971, '127.0.0.1', '2021-07-31 04:35:39'),
(1972, '127.0.0.1', '2021-07-31 04:38:08'),
(1973, '127.0.0.1', '2021-07-31 04:41:07'),
(1974, '127.0.0.1', '2021-07-31 04:55:21'),
(1975, '127.0.0.1', '2021-07-31 04:57:45'),
(1976, '127.0.0.1', '2021-07-31 04:59:53'),
(1977, '127.0.0.1', '2021-07-31 05:01:42'),
(1978, '127.0.0.1', '2021-07-31 05:04:02'),
(1979, '127.0.0.1', '2021-07-31 05:05:11'),
(1980, '127.0.0.1', '2021-07-31 05:07:23'),
(1981, '127.0.0.1', '2021-07-31 05:57:34'),
(1982, '127.0.0.1', '2021-07-31 06:00:05'),
(1983, '127.0.0.1', '2021-07-31 06:01:52'),
(1984, '127.0.0.1', '2021-07-31 06:03:42'),
(1985, '127.0.0.1', '2021-07-31 06:04:54'),
(1986, '127.0.0.1', '2021-07-31 06:06:01'),
(1987, '127.0.0.1', '2021-07-31 06:07:19'),
(1988, '127.0.0.1', '2021-07-31 06:12:12'),
(1989, '127.0.0.1', '2021-07-31 06:13:19'),
(1990, '127.0.0.1', '2021-07-31 06:14:52'),
(1991, '127.0.0.1', '2021-07-31 06:17:11'),
(1992, '127.0.0.1', '2021-07-31 06:18:14'),
(1993, '127.0.0.1', '2021-07-31 06:19:33'),
(1994, '127.0.0.1', '2021-07-31 06:22:15'),
(1995, '127.0.0.1', '2021-07-31 06:24:09'),
(1996, '127.0.0.1', '2021-07-31 06:25:10'),
(1997, '127.0.0.1', '2021-07-31 06:26:34'),
(1998, '127.0.0.1', '2021-07-31 06:30:12'),
(1999, '127.0.0.1', '2021-07-31 06:32:02'),
(2000, '127.0.0.1', '2021-07-31 06:33:20'),
(2001, '127.0.0.1', '2021-07-31 06:44:43'),
(2002, '127.0.0.1', '2021-07-31 08:59:53'),
(2003, '127.0.0.1', '2021-07-31 09:05:12'),
(2004, '127.0.0.1', '2021-07-31 10:04:30'),
(2005, '127.0.0.1', '2021-07-31 10:05:53'),
(2006, '127.0.0.1', '2021-07-31 11:39:14'),
(2007, '127.0.0.1', '2021-07-31 11:40:17'),
(2008, '127.0.0.1', '2021-10-11 06:48:59'),
(2009, '127.0.0.1', '2021-10-11 08:06:27'),
(2010, '127.0.0.1', '2021-10-11 08:17:20'),
(2011, '127.0.0.1', '2021-10-11 08:19:33'),
(2012, '127.0.0.1', '2021-10-11 08:21:16'),
(2013, '127.0.0.1', '2021-10-11 08:23:42'),
(2014, '127.0.0.1', '2021-10-11 08:25:37'),
(2015, '127.0.0.1', '2021-10-11 08:48:55'),
(2016, '127.0.0.1', '2021-10-11 08:50:16'),
(2017, '127.0.0.1', '2021-10-11 08:52:49'),
(2018, '127.0.0.1', '2021-10-11 11:13:49'),
(2019, '127.0.0.1', '2021-10-11 11:21:53'),
(2020, '127.0.0.1', '2021-10-11 11:24:46'),
(2021, '127.0.0.1', '2021-10-11 11:27:37'),
(2022, '127.0.0.1', '2021-10-11 11:30:16'),
(2023, '127.0.0.1', '2021-10-11 11:41:33'),
(2024, '127.0.0.1', '2021-10-11 11:47:12'),
(2025, '127.0.0.1', '2021-10-11 11:49:22'),
(2026, '127.0.0.1', '2021-10-11 11:52:32'),
(2027, '127.0.0.1', '2021-10-11 11:55:22'),
(2028, '127.0.0.1', '2021-10-11 11:57:48'),
(2029, '127.0.0.1', '2021-10-11 11:59:00'),
(2030, '127.0.0.1', '2021-10-11 12:03:21'),
(2031, '127.0.0.1', '2021-10-11 12:08:15'),
(2032, '127.0.0.1', '2021-10-11 12:09:34'),
(2033, '127.0.0.1', '2021-10-11 13:31:55'),
(2034, '127.0.0.1', '2021-10-11 14:08:01'),
(2035, '127.0.0.1', '2021-10-11 14:09:58'),
(2036, '127.0.0.1', '2021-10-11 14:13:28'),
(2037, '127.0.0.1', '2021-10-11 14:16:56'),
(2038, '127.0.0.1', '2021-10-11 14:18:12'),
(2039, '127.0.0.1', '2021-10-11 14:27:59'),
(2040, '127.0.0.1', '2021-10-11 14:29:52'),
(2041, '127.0.0.1', '2021-10-11 14:31:13'),
(2042, '127.0.0.1', '2021-11-07 08:55:48'),
(2043, '127.0.0.1', '2021-11-07 08:58:26'),
(2044, '127.0.0.1', '2021-11-07 08:59:49'),
(2045, '127.0.0.1', '2021-11-07 09:03:59'),
(2046, '127.0.0.1', '2021-11-07 09:09:25'),
(2047, '127.0.0.1', '2021-11-07 09:10:33'),
(2048, '127.0.0.1', '2021-11-07 09:15:40'),
(2049, '127.0.0.1', '2021-11-07 09:17:15'),
(2050, '127.0.0.1', '2021-11-07 09:19:33'),
(2051, '127.0.0.1', '2021-11-07 09:22:20'),
(2052, '127.0.0.1', '2021-11-07 09:25:53'),
(2053, '127.0.0.1', '2021-11-07 09:27:17'),
(2054, '127.0.0.1', '2021-11-07 09:28:17'),
(2055, '127.0.0.1', '2021-11-07 09:38:17'),
(2056, '127.0.0.1', '2021-11-07 09:39:34'),
(2057, '127.0.0.1', '2021-11-07 09:41:28'),
(2058, '127.0.0.1', '2021-11-07 09:52:49'),
(2059, '127.0.0.1', '2021-11-07 11:07:09'),
(2060, '127.0.0.1', '2021-11-07 11:37:17'),
(2061, '127.0.0.1', '2021-12-28 02:36:14'),
(2062, '127.0.0.1', '2021-12-28 03:04:03'),
(2063, '127.0.0.1', '2021-12-28 08:38:36'),
(2064, '127.0.0.1', '2021-12-28 08:52:17'),
(2065, '127.0.0.1', '2021-12-28 09:04:25'),
(2066, '127.0.0.1', '2021-12-28 09:05:29'),
(2067, '127.0.0.1', '2021-12-28 09:09:10'),
(2068, '127.0.0.1', '2021-12-28 09:11:16'),
(2069, '127.0.0.1', '2021-12-28 09:19:03'),
(2070, '127.0.0.1', '2021-12-28 09:36:31'),
(2071, '127.0.0.1', '2021-12-28 09:43:36'),
(2072, '127.0.0.1', '2021-12-28 09:46:25'),
(2073, '127.0.0.1', '2021-12-28 09:48:58'),
(2074, '127.0.0.1', '2021-12-28 10:02:08'),
(2075, '127.0.0.1', '2021-12-28 10:06:01'),
(2076, '127.0.0.1', '2021-12-28 10:08:42'),
(2077, '127.0.0.1', '2021-12-28 10:11:52'),
(2078, '127.0.0.1', '2021-12-28 10:15:09'),
(2079, '127.0.0.1', '2021-12-28 10:16:33'),
(2080, '127.0.0.1', '2021-12-28 10:18:53'),
(2081, '127.0.0.1', '2021-12-28 10:21:23'),
(2082, '127.0.0.1', '2021-12-28 10:25:48'),
(2083, '127.0.0.1', '2021-12-28 10:29:09'),
(2084, '127.0.0.1', '2021-12-28 10:33:19'),
(2085, '127.0.0.1', '2021-12-28 10:35:01'),
(2086, '127.0.0.1', '2021-12-28 10:36:39'),
(2087, '127.0.0.1', '2021-12-28 10:37:56'),
(2088, '127.0.0.1', '2021-12-28 10:39:26'),
(2089, '127.0.0.1', '2021-12-28 10:40:28'),
(2090, '127.0.0.1', '2021-12-28 10:43:51'),
(2091, '127.0.0.1', '2021-12-28 10:46:22'),
(2092, '127.0.0.1', '2021-12-28 12:06:04'),
(2093, '127.0.0.1', '2021-12-28 12:13:11'),
(2094, '127.0.0.1', '2021-12-28 12:14:31'),
(2095, '127.0.0.1', '2021-12-28 12:15:49'),
(2096, '127.0.0.1', '2021-12-28 12:30:36'),
(2097, '127.0.0.1', '2021-12-28 12:31:44'),
(2098, '127.0.0.1', '2021-12-28 12:33:45'),
(2099, '127.0.0.1', '2021-12-28 12:35:04'),
(2100, '127.0.0.1', '2021-12-28 12:42:10'),
(2101, '127.0.0.1', '2021-12-28 12:49:15'),
(2102, '127.0.0.1', '2021-12-28 12:54:43'),
(2103, '127.0.0.1', '2021-12-28 12:56:06'),
(2104, '127.0.0.1', '2021-12-28 13:24:32'),
(2105, '127.0.0.1', '2021-12-29 01:27:19'),
(2106, '127.0.0.1', '2022-01-01 08:50:43'),
(2107, '127.0.0.1', '2022-01-01 09:13:08'),
(2108, '127.0.0.1', '2022-01-01 09:16:34'),
(2109, '127.0.0.1', '2022-01-01 09:19:05'),
(2110, '127.0.0.1', '2022-01-01 09:20:24'),
(2111, '127.0.0.1', '2022-01-01 11:32:46'),
(2112, '127.0.0.1', '2022-01-01 11:43:02'),
(2113, '127.0.0.1', '2022-01-01 11:47:04'),
(2114, '127.0.0.1', '2022-01-01 11:52:22'),
(2115, '127.0.0.1', '2022-01-01 11:56:19'),
(2116, '127.0.0.1', '2022-01-01 11:58:14'),
(2117, '127.0.0.1', '2022-01-01 12:00:15'),
(2118, '127.0.0.1', '2022-01-01 12:23:25'),
(2119, '127.0.0.1', '2022-01-01 12:25:19'),
(2120, '127.0.0.1', '2022-01-01 12:27:13'),
(2121, '127.0.0.1', '2022-01-01 12:29:35'),
(2122, '127.0.0.1', '2022-01-01 12:31:39'),
(2123, '127.0.0.1', '2022-01-01 12:33:56'),
(2124, '127.0.0.1', '2022-01-01 12:37:07'),
(2125, '127.0.0.1', '2022-01-01 13:18:26'),
(2126, '127.0.0.1', '2022-01-01 13:19:29'),
(2127, '127.0.0.1', '2022-01-02 01:41:08'),
(2128, '127.0.0.1', '2022-01-02 02:17:27'),
(2129, '127.0.0.1', '2022-01-02 02:37:09'),
(2130, '127.0.0.1', '2022-01-02 02:38:12'),
(2131, '127.0.0.1', '2022-01-02 02:39:12'),
(2132, '127.0.0.1', '2022-01-02 02:43:50'),
(2133, '127.0.0.1', '2022-01-02 02:48:41'),
(2134, '127.0.0.1', '2022-01-02 02:50:54'),
(2135, '127.0.0.1', '2022-01-02 02:52:26'),
(2136, '127.0.0.1', '2022-01-02 02:58:53'),
(2137, '127.0.0.1', '2022-01-02 03:00:16'),
(2138, '127.0.0.1', '2022-01-02 03:01:21'),
(2139, '127.0.0.1', '2022-01-02 03:02:42'),
(2140, '127.0.0.1', '2022-01-02 03:06:03'),
(2141, '127.0.0.1', '2022-01-02 04:18:43'),
(2142, '127.0.0.1', '2022-01-02 04:20:36'),
(2143, '127.0.0.1', '2022-01-02 04:31:06'),
(2144, '127.0.0.1', '2022-01-02 04:32:57'),
(2145, '127.0.0.1', '2022-01-02 04:36:02'),
(2146, '127.0.0.1', '2022-01-02 04:39:04'),
(2147, '127.0.0.1', '2022-01-02 04:40:36'),
(2148, '127.0.0.1', '2022-01-02 04:41:52'),
(2149, '127.0.0.1', '2022-01-02 04:44:14'),
(2150, '127.0.0.1', '2022-01-02 04:46:00'),
(2151, '127.0.0.1', '2022-01-02 04:51:27'),
(2152, '127.0.0.1', '2022-01-02 05:00:08'),
(2153, '127.0.0.1', '2022-01-02 05:03:17'),
(2154, '127.0.0.1', '2022-01-02 05:13:43'),
(2155, '127.0.0.1', '2022-01-02 05:15:20'),
(2156, '127.0.0.1', '2022-01-02 05:16:35'),
(2157, '127.0.0.1', '2022-01-02 05:18:32'),
(2158, '127.0.0.1', '2022-01-02 09:39:40'),
(2159, '127.0.0.1', '2022-01-02 10:07:23'),
(2160, '127.0.0.1', '2022-01-02 10:08:23'),
(2161, '127.0.0.1', '2022-01-02 10:42:20'),
(2162, '127.0.0.1', '2022-01-02 14:28:42'),
(2163, '127.0.0.1', '2022-01-02 14:30:53'),
(2164, '127.0.0.1', '2022-01-02 14:55:45'),
(2165, '127.0.0.1', '2022-01-02 14:57:35'),
(2166, '127.0.0.1', '2022-01-02 15:19:28'),
(2167, '127.0.0.1', '2022-01-02 15:23:02'),
(2168, '127.0.0.1', '2022-01-02 15:26:36'),
(2169, '127.0.0.1', '2022-01-02 15:27:50'),
(2170, '127.0.0.1', '2022-01-02 15:29:13'),
(2171, '127.0.0.1', '2022-01-02 15:30:45'),
(2172, '127.0.0.1', '2022-01-02 15:31:49'),
(2173, '127.0.0.1', '2022-01-02 15:33:12'),
(2174, '127.0.0.1', '2022-01-02 15:35:07'),
(2175, '127.0.0.1', '2022-01-02 15:57:03'),
(2176, '127.0.0.1', '2022-01-02 17:01:36'),
(2177, '127.0.0.1', '2022-01-03 02:06:31'),
(2178, '127.0.0.1', '2022-01-03 02:45:44'),
(2179, '127.0.0.1', '2022-01-03 02:47:03'),
(2180, '127.0.0.1', '2022-01-03 02:49:06'),
(2181, '127.0.0.1', '2022-01-03 02:54:19'),
(2182, '127.0.0.1', '2022-01-03 03:03:20'),
(2183, '127.0.0.1', '2022-01-03 03:04:52'),
(2184, '127.0.0.1', '2022-01-03 03:07:58'),
(2185, '127.0.0.1', '2022-01-03 03:09:42'),
(2186, '127.0.0.1', '2022-01-03 03:11:07'),
(2187, '127.0.0.1', '2022-01-03 03:13:38'),
(2188, '127.0.0.1', '2022-01-03 03:15:28'),
(2189, '127.0.0.1', '2022-01-03 03:16:40'),
(2190, '127.0.0.1', '2022-01-03 03:18:15'),
(2191, '127.0.0.1', '2022-01-03 03:19:43'),
(2192, '127.0.0.1', '2022-01-03 03:21:24'),
(2193, '127.0.0.1', '2022-01-03 03:22:37'),
(2194, '127.0.0.1', '2022-01-03 03:24:10'),
(2195, '127.0.0.1', '2022-01-03 03:50:42'),
(2196, '127.0.0.1', '2022-01-03 04:03:03'),
(2197, '127.0.0.1', '2022-01-03 04:08:00'),
(2198, '127.0.0.1', '2022-01-03 04:10:01'),
(2199, '127.0.0.1', '2022-01-03 04:21:07'),
(2200, '127.0.0.1', '2022-01-03 04:35:59'),
(2201, '127.0.0.1', '2022-01-03 08:08:45'),
(2202, '127.0.0.1', '2022-01-03 08:09:48'),
(2203, '127.0.0.1', '2022-01-03 08:11:19'),
(2204, '127.0.0.1', '2022-01-03 08:12:35'),
(2205, '127.0.0.1', '2022-01-03 08:18:58'),
(2206, '127.0.0.1', '2022-01-03 08:26:06'),
(2207, '127.0.0.1', '2022-01-03 08:28:36'),
(2208, '127.0.0.1', '2022-01-03 08:29:45'),
(2209, '127.0.0.1', '2022-01-03 08:31:45'),
(2210, '127.0.0.1', '2022-01-03 08:33:06'),
(2211, '127.0.0.1', '2022-01-03 08:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb3_unicode_ci,
  `status` int NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone`, `body`, `status`, `created_date`) VALUES
(14, 'Nguyễn Văn A', 'louis.bruce.collins@gmail.com', 'Phạm Văn Chiêu, Gò Vấp, Tp.HCM', '0988999888', 'test', 0, '2021-03-09 14:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb3_unicode_ci,
  `link` text COLLATE utf8mb3_unicode_ci,
  `number` int NOT NULL DEFAULT '0',
  `type` int NOT NULL,
  `homepage` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name_vi`, `name_en`, `image`, `link`, `number`, `type`, `homepage`) VALUES
(15, 'Facebook', '', '/backend/web/uploads/images/iconFB.png', 'https://www.facebook.com/', 0, 2, 1),
(46, '3M', '', '/backend/web/uploads/images/pngegg.png', '', 0, 1, 1),
(49, 'Abbott', '', '/backend/web/uploads/images/Abbott_Laboratories-Logo_wine.png', '', 0, 1, 1),
(50, 'Nestle', '', '/backend/web/uploads/images/doi-tac/2015.jpg', '', 0, 1, 1),
(55, 'tefal', '', '/backend/web/uploads/images/pngwing_com.png', '', 0, 1, 1),
(57, 'santen', '', '/backend/web/uploads/images/Santen-logo.jpg', '', 0, 1, 1),
(58, 'Linkedin', '', '/backend/web/uploads/images/317750_linkedin_icon.png', '', 0, 2, 1),
(59, 'DKSH', '', '/backend/web/uploads/images/doi-tac/DKSH_hori_red_rgb.png', '', 0, 1, 1),
(65, 'opv', '', '/backend/web/uploads/images/doi-tac/RVOPV-logo.png', '', 0, 1, 1),
(66, 'shell', '', '/backend/web/uploads/images/doi-tac/images.png', '', 0, 1, 1),
(67, 'Vietbank', '', '/backend/web/uploads/images/doi-tac/logo_VB.png', '', 0, 1, 1),
(68, 'aeon', '', '/backend/web/uploads/images/doi-tac/logo-aeon.png', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoatdong`
--

CREATE TABLE `hoatdong` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb4_unicode_ci,
  `des_en` text COLLATE utf8mb4_unicode_ci,
  `thumb` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoatdong`
--

INSERT INTO `hoatdong` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `thumb`) VALUES
(1, 'Album Hình ảnh', '', 'Nỗ lực mỗi ngày, để đưa những cặp mắt kính chất lượng, giá cả phải chăng.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `bacsi` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb3_unicode_ci,
  `created_date` datetime NOT NULL,
  `thoigian` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `phongkham` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `fullname`, `phone`, `bacsi`, `email`, `content`, `created_date`, `thoigian`, `phongkham`, `status`) VALUES
(4, 'Nguyễn Văn A', '0988999888', 'Dr. Hoàng Quân', 'email@gmail.com', 'Test', '2022-01-02 17:48:44', '04/01/2022 10:05', 'Chi nhánh 1: Số 15 Hoàng Văn Thụ - Tân Bình', 0),
(5, 'Huynh Hoang Hoa', '0919262329', 'BS: Y Hồng Đào', 'hoanghoa09@yahoo.com', 'Làm răng sứ ', '2022-09-30 12:05:13', '07/10/2022 10:00', 'Chi nhánh 2: 35/7D Trân Đình Xu, Phường Bến Thành , Quận 1, TP.HCM', 0),
(6, 'Nguyen Thi Tuyet Mai', '0908292989', 'BS: Y Hồng Đào', 'nguyentrangthu6196@gmail.com', 'Consultation, clean', '2022-12-19 16:06:14', '20/12/2022 12:00', 'Chi nhánh 1: Shophouse, Sài Gòn Pearl, Tòa Nhà Ruby 2, Số 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành Phố Hồ Chí Minh, Việt Nam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parent` int NOT NULL DEFAULT '0',
  `model` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` int NOT NULL DEFAULT '0',
  `type` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `number` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name_vi`, `name_en`, `parent`, `model`, `model_id`, `type`, `number`) VALUES
(54, 'Giới thiệu', 'Introduce', 0, 'Page', 2, 'main', 1),
(68, 'Trang chủ', 'Home', 0, 'Home', 0, 'main', 0),
(71, 'Sản phẩm', 'Products', 0, 'AllProducts', 0, 'left', 2),
(75, 'Liên hệ', 'Contact', 0, 'Contact', 0, 'mobile', 0),
(78, 'Sản phẩm', 'Products', 0, 'AllProducts', 0, 'mobile', 0),
(80, 'Trang chủ', 'Home', 0, 'Home', 0, 'mobile', 0),
(100, 'Dịch Vụ', 'service', 0, 'Postscat', 16, 'main', 2),
(102, 'Tin tức', 'News', 0, 'Postscat', 24, 'main', 4),
(106, 'SALE', '', 100, 'Posts', 78, 'main', 1),
(107, 'MARKETING', '', 100, 'Posts', 53, 'main', 2),
(108, 'TÀI CHÍNH - BẢO HIỂM', '', 100, 'Posts', 44, 'main', 3),
(133, 'Liên hệ', 'Contact', 0, 'Contact', 0, 'main', 5),
(135, 'Dự Án', 'project', 0, 'Postscat', 23, 'main', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb3_unicode_ci NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1533094058),
('m130524_201442_init', 1533094064),
('m140209_132017_init', 1568195159),
('m140403_174025_create_account_table', 1568195161),
('m140504_113157_update_tables', 1568195168),
('m140504_130429_create_token_table', 1568195170),
('m140830_171933_fix_ip_field', 1568195172),
('m140830_172703_change_account_table_name', 1568195172),
('m141222_110026_update_ip_field', 1568195174),
('m141222_135246_alter_username_length', 1568195175),
('m150614_103145_update_social_account_table', 1568195179),
('m150623_212711_fix_username_notnull', 1568195179),
('m151218_234654_add_timezone_to_profile', 1568195180),
('m160104_073803_create_newsletter_template_table', 1568279089),
('m160104_073815_create_event_template_table', 1568279089),
('m160104_073828_create_event_newsletter_template_table', 1568279090),
('m160929_103127_add_last_login_at_to_user_table', 1568195182),
('m170619_133956_create_newsletter_client_table', 1568281926),
('m180604_202836_create_cart_items_table', 1568087647);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_client`
--

CREATE TABLE `newsletter_client` (
  `id` int NOT NULL COMMENT 'ID',
  `contacts` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Contacts',
  `fullname` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb3_unicode_ci,
  `content` text COLLATE utf8mb3_unicode_ci,
  `created_at` int NOT NULL COMMENT 'Created at',
  `updated_at` int NOT NULL COMMENT 'Updated at'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `newsletter_client`
--

INSERT INTO `newsletter_client` (`id`, `contacts`, `fullname`, `phone`, `address`, `content`, `created_at`, `updated_at`) VALUES
(7, 'louis.bruce.collins@gmail.com', NULL, NULL, NULL, NULL, 1576897817, 1576897817);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8mb3_unicode_ci,
  `product_price` int NOT NULL DEFAULT '0',
  `product_quantity` int NOT NULL DEFAULT '0',
  `product_cost` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `product_cost`) VALUES
(20, 14, 14, 'Sản phẩm test 7', '/backend/web/uploads/images/imgsp.jpg', 500000, 1, 500000),
(21, 14, 30, 'Sản phẩm test 23', '/backend/web/uploads/images/imgsp.jpg', 450000, 1, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` text COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb3_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `homepage` int NOT NULL DEFAULT '0',
  `number` int NOT NULL DEFAULT '0',
  `position` int NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb3_unicode_ci,
  `description` text COLLATE utf8mb3_unicode_ci,
  `keyword` text COLLATE utf8mb3_unicode_ci,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `slug`, `image`, `status`, `homepage`, `number`, `position`, `title`, `description`, `keyword`, `created_date`) VALUES
(2, 'Giới thiệu', 'Introduce', '<div>\n<p style=\"margin: 0in 0in 7.5pt; text-align: justify;\"><span ><span style=\"background:white\"><span ><span ><span style=\"background:white\"></span></span></span></span></span><span style=\"font-size:18px;\"><span style=\"font-family:Muli-Regular;\"><span style=\"line-height:107%\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"color:#081c36\">Được th&agrave;nh lập từ năm 2021, Mi Global tự h&agrave;o l&agrave; c&ocirc;ng ty tư vấn chiến lược Marketing &amp; Sale t&iacute;ch hợp với nền tảng kinh nghiệm v&agrave; nguồn lực được kế thừa từ c&ocirc;ng ty SRC Co., Ltd (hơn 10 năm hoạt động). </span></span></span></span></span></span></p>\n\n<p style=\"margin: 0in 0in 7.5pt; text-align: justify;\"><span style=\"font-size:18px;\"><span style=\"font-family:Muli-Regular;\"><span style=\"line-height:107%\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"color:#081c36\">Năm 2024, Mi Global vươn tầm hoạt động với c&aacute;c giải ph&aacute;p tư vấn v&agrave; x&uacute;c tiến trong lĩnh vực t&agrave;i ch&iacute;nh bảo hiểm. </span></span></span></span></span></span></p>\n\n<p style=\"margin: 0in 0in 7.5pt; text-align: justify;\"><span style=\"font-size:18px;\"><span style=\"font-family:Muli-Regular;\"><span style=\"line-height:107%\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"color:#081c36\">Ch&uacute;ng t&ocirc;i tin rằng, với đội ngũ chuy&ecirc;n gia kinh nghiệm v&agrave; s&aacute;ng tạo c&ugrave;ng hệ sinh th&aacute;i c&aacute;c đối t&aacute;c đang c&oacute;, Mi Global sẽ trở th&agrave;nh người bạn đồng h&agrave;nh c&ugrave;ng c&aacute;c doanh nghiệp để đạt được c&aacute;c mục ti&ecirc;u kinh doanh v&agrave; ph&aacute;t triển bền vững.</span></span></span></span></span></span></p>\n\n<p style=\"margin:0in; margin-bottom:.0001pt; margin-right:0in; margin-left:0in\"><span style=\"font-size:12pt\"><span style=\"background:white\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"><span style=\"font-size:11.5pt\"></span></span></span></span></p>\n</div>\n', '<p>Established in 2021, Mi Global is proud to be an integrated Marketing &amp; Sales strategy consulting company with a foundation of experience and resources inherited from SRC Co., Ltd (more than 10 years of operation). In 2024, Mi Global expands its operations with consulting and promotion solutions in the field of finance and insurance. We believe that, with a team of experienced and creative experts and an existing ecosystem of partners, Mi Global will become a companion to businesses to achieve business goals and sustainable development. solid.</p>\n', '<h1 style=\"margin: 0in 0in 7.5pt; text-align: center;\"><span style=\"color:#0000cc;\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">GIỚI THIỆU MI GLOBAL</b></span></h1>\n\n<p style=\"margin: 0in 0in 7.5pt; text-align: justify;\"><meta charset=\"utf-8\" /></p>\n\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">C&ocirc;ng ty Mi Global được th&agrave;nh lập từ năm 2021 bởi đội ngũ điều h&agrave;nh C&ocirc;ng ty SRC (<a href=\"http://www.srcvn.com\">www.srcvn.com</a>) &ndash;&nbsp;một&nbsp;trong những agency uy t&iacute;n v&agrave; linh hoạt c&oacute; hơn 10 năm ph&aacute;t triển trong lĩnh vực tư vấn v&agrave; thực thi c&aacute;c chiến lược marketing &amp; sale t&iacute;ch hợp.&nbsp;</b></p>\n\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Năm 2024, với chiến lược ph&aacute;t triển mới, Mi Global được hợp nhất c&ugrave;ng SRC để trở th&agrave;nh đơn vị đại diện cung cấp chuỗi dịch vụ t&iacute;ch hợp cho c&aacute;c doanh nghiệp trong v&agrave; ngo&agrave;i nước tại thị trường Việt Nam.&nbsp;</b></p>\n\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">V&agrave; hơn thế nữa, với tầm nh&igrave;n Go Global, Mi Global đ&atilde; v&agrave; đang chuẩn bị những nền tảng cho c&aacute;c hoạt động x&uacute;c tiến thương mại quốc tế d&agrave;nh cho c&aacute;c doanh nghiệp Việt Nam.&nbsp;</b></p>\n\n<h3 dir=\"ltr\"><span style=\"color:#0000cc;\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Gi&aacute; Trị Cốt L&otilde;i</b></span></h3>\n\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Trong qu&aacute; tr&igrave;nh ph&aacute;t triển, Mi Global lu&ocirc;n hoạt động xoay quanh 4 l&otilde;i gi&aacute; trị:</b></p>\n\n<h4 dir=\"ltr\" role=\"presentation\"><u><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Chuy&ecirc;n nghiệp:</b></u></h4>\n\n<ul>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Ch&uacute;ng t&ocirc;i lu&ocirc;n đặt sự chuy&ecirc;n nghiệp l&ecirc;n h&agrave;ng đầu. Từ quy tr&igrave;nh l&agrave;m việc, phong c&aacute;ch phục vụ đến c&aacute;ch thức giao tiếp, ch&uacute;ng t&ocirc;i cam kết mang đến cho kh&aacute;ch h&agrave;ng trải nghiệm dịch vụ chất lượng cao nhất.</b></p>\n	</li>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i kh&ocirc;ng ngừng n&acirc;ng cao kiến thức, kinh nghiệm v&agrave; kỹ năng, đảm bảo mọi dự &aacute;n đều được thực hiện với sự ch&iacute;nh x&aacute;c v&agrave; tối ưu nhất</b></p>\n	</li>\n</ul>\n\n<h4 dir=\"ltr\" role=\"presentation\"><u><b>Tận t&acirc;m:</b></u></h4>\n\n<ul>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Ch&uacute;ng t&ocirc;i lu&ocirc;n đặt kh&aacute;ch h&agrave;ng ở vị tr&iacute; trung t&acirc;m để lắng nghe v&agrave; thấu hiểu, từ đ&oacute; đưa ra những giải ph&aacute;p linh hoạt, tối ưu nhất. Sự h&agrave;i l&ograve;ng của kh&aacute;ch h&agrave;ng l&agrave; động lực để Mi Global kh&ocirc;ng ngừng ho&agrave;n thiện v&agrave; ph&aacute;t triển.</b></p>\n	</li>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global cam kết đồng h&agrave;nh c&ugrave;ng kh&aacute;ch h&agrave;ng trong suốt qu&aacute; tr&igrave;nh triển khai v&agrave; sau khi kết th&uacute;c dự &aacute;n, đảm bảo mọi mục ti&ecirc;u đều được thực hiện v&agrave; mang lại kết quả bền vững.</b></p>\n	</li>\n</ul>\n\n<h4 dir=\"ltr\" role=\"presentation\"><u><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Linh hoạt:</b></u></h4>\n\n<ul>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global lu&ocirc;n sẵn s&agrave;ng điều chỉnh v&agrave; tối ưu h&oacute;a chiến lược dựa tr&ecirc;n t&igrave;nh h&igrave;nh thực tế của kh&aacute;ch h&agrave;ng c&ugrave;ng những thay đổi của thị trường. Ch&uacute;ng t&ocirc;i hiểu rằng mỗi kh&aacute;ch h&agrave;ng đều c&oacute; những điểm ri&ecirc;ng biệt v&agrave; cần giải ph&aacute;p ph&ugrave; hợp được thiết kế ri&ecirc;ng cho từng nhu cầu.</b></p>\n	</li>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Khả năng th&iacute;ch ứng nhanh ch&oacute;ng với c&aacute;c xu hướng mới v&agrave; c&aacute;c yếu tố thay đổi của m&ocirc;i trường kinh doanh gi&uacute;p Mi Global lu&ocirc;n giữ vững vị thế dẫn đầu trong lĩnh vực tư vấn chiến lược.</b></p>\n	</li>\n</ul>\n\n<h4 dir=\"ltr\" role=\"presentation\"><u><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Đa dạng:</b></u></h4>\n\n<ul>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global sở hữu mạng lưới đối t&aacute;c v&agrave; dịch vụ phong ph&uacute;, từ tư vấn chiến lược Marketing &amp; Sale đến tư vấn t&agrave;i ch&iacute;nh bảo hiểm. Điều n&agrave;y gi&uacute;p ch&uacute;ng t&ocirc;i cung cấp c&aacute;c giải ph&aacute;p to&agrave;n diện v&agrave; đa dạng, đ&aacute;p ứng mọi nhu cầu của doanh nghiệp.</b></p>\n	</li>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Ch&uacute;ng t&ocirc;i kh&ocirc;ng ngừng mở rộng v&agrave; cập nhật danh mục dịch vụ để đảm bảo kh&aacute;ch h&agrave;ng lu&ocirc;n nhận được những giải ph&aacute;p ti&ecirc;n tiến v&agrave; hiệu quả nhất.</b></p>\n	</li>\n</ul>\n\n<h3 dir=\"ltr\"><span style=\"color:#0000cc;\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Cam Kết Của Ch&uacute;ng T&ocirc;i</b></span></h3>\n\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global tin rằng sự th&agrave;nh c&ocirc;ng của kh&aacute;ch h&agrave;ng l&agrave; thước đo cho sự th&agrave;nh c&ocirc;ng của ch&uacute;ng t&ocirc;i. Do đ&oacute;, ch&uacute;ng t&ocirc;i lu&ocirc;n cam kết:</b></p>\n\n<ul>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Cung cấp dịch vụ tư vấn chiến lược Marketing &amp; Sale: Đưa ra những chiến lược ph&ugrave; hợp, gi&uacute;p doanh nghiệp tiếp cận thị trường một c&aacute;ch hiệu quả v&agrave; đạt được mục ti&ecirc;u kinh doanh.</b></p>\n	</li>\n	<li aria-level=\"1\" dir=\"ltr\">\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Tư vấn t&agrave;i ch&iacute;nh bảo hiểm: Cung cấp c&aacute;c giải ph&aacute;p t&agrave;i ch&iacute;nh bảo hiểm tối ưu, gi&uacute;p doanh nghiệp bảo vệ, ph&aacute;t triển nguồn vốn &amp; d&ograve;ng tiền c&ugrave;ng t&agrave;i sản một c&aacute;ch tối ưu.</b></p>\n	</li>\n</ul>\n\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Ch&uacute;ng t&ocirc;i lu&ocirc;n đồng h&agrave;nh c&ugrave;ng kh&aacute;ch h&agrave;ng trong mọi bước đi, từ việc x&acirc;y dựng chiến lược, triển khai kế hoạch đến đ&aacute;nh gi&aacute; v&agrave; tối ưu h&oacute;a kết quả. Mi Global cam kết trở th&agrave;nh đối t&aacute;c tin cậy, gi&uacute;p doanh nghiệp của bạn vượt qua mọi thử th&aacute;ch v&agrave; đạt được những th&agrave;nh c&ocirc;ng vượt bậc.</b></p>\n\n<p dir=\"ltr\"><span style=\"color:#0000cc;\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global - Đối t&aacute;c chiến lược cho sự ph&aacute;t triển bền vững của doanh nghiệp.</b></span></p>\n\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">H&atilde;y để Mi Global c&ugrave;ng bạn vươn tới những tầm cao mới trong kinh doanh!</b></p>\n', '<p>Established in 2021, Mi Global is proud to be an integrated Marketing &amp; Sales strategy consulting company with a foundation of experience and resources inherited from SRC Co., Ltd (more than 10 years of operation). In 2024, Mi Global expands its operations with consulting and promotion solutions in the field of finance and insurance. We believe that, with a team of experienced and creative experts and an existing ecosystem of partners, Mi Global will become a companion to businesses to achieve business goals and sustainable development. solid.</p>\r\n', 'gioi-thieu0', '/backend/web/uploads/images/BG-MIG-615x480.png', 0, 1, 0, 2, 'Giới thiệu về MIG', '', '', '2024-06-24 07:49:37'),
(8, 'Giới thiệu ', 'Introduce', '<p>Lời đầu ti&ecirc;n ch&uacute;ng t&ocirc;i xin gửi lời c&aacute;m ơn ch&acirc;n th&agrave;nh đến qu&yacute; kh&aacute;ch h&agrave;ng, đối t&aacute;c đ&atilde; quan t&acirc;m tin nhiệm lựa chọn dịch vụ của ch&uacute;ng t&ocirc;i trong thời gian qua. Ch&uacute;ng t&ocirc;i đ&atilde; v&agrave; đang thực sự khẳng định được vị tr&iacute; của m&igrave;nh trong việc cung cấp CHĂN-DRAP-GỐI-NỆM phục vụ giấc ngủ, chăm s&oacute;c sức khỏe cho người ti&ecirc;u d&ugrave;ng. Ch&uacute;ng t&ocirc;i chuy&ecirc;n về kinh doanh ph&acirc;n phối Chăn- Drap- Gối- Nệm. Với ti&ecirc;u ch&iacute; h&agrave;ng đầu l&agrave; mang đến qu&yacute; kh&aacute;ch h&agrave;ng Sản Phẩm tốt nhất, phục vụ kh&aacute;ch h&agrave;ng tr&ecirc;n cơ sở lợi &iacute;ch của người ti&ecirc;u d&ugrave;ng đặt ở mức ưu ti&ecirc;n cao nhất. Chăn Ga Gối Nệm H&ograve;a B&igrave;nh l&agrave; một địa chỉ đ&aacute;ng tin cậy đến cho kh&aacute;ch h&agrave;ng những Sản Phẩm chất lượng cao.</p>\r\n', '<p>...</p>\r\n', '<h1><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">GIỚI THIỆU MI GLOBAL</b></h1>\r\n\r\n<p><meta charset=\"utf-8\" /></p>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">C&ocirc;ng ty Mi Global được th&agrave;nh lập từ năm 2021 bởi đội ngũ điều h&agrave;nh C&ocirc;ng ty SRC (<a href=\"http://www.srcvn.com\">www.srcvn.com</a>) &ndash;&nbsp;một&nbsp;trong những agency uy t&iacute;n v&agrave; linh hoạt c&oacute; hơn 10 năm ph&aacute;t triển trong lĩnh vực tư vấn v&agrave; thực thi c&aacute;c chiến lược marketing &amp; sale t&iacute;ch hợp.&nbsp;</b></p>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Năm 2024, với chiến lược ph&aacute;t triển mới, Mi Global được hợp nhất c&ugrave;ng SRC để trở th&agrave;nh đơn vị đại diện cung cấp chuỗi dịch vụ t&iacute;ch hợp cho c&aacute;c doanh nghiệp trong v&agrave; ngo&agrave;i nước tại thị trường Việt Nam.&nbsp;</b></p>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">V&agrave; hơn thế nữa, với tầm nh&igrave;n Go Global, Mi Global đ&atilde; v&agrave; đang chuẩn bị những nền tảng cho c&aacute;c hoạt động x&uacute;c tiến thương mại quốc tế d&agrave;nh cho c&aacute;c doanh nghiệp Việt Nam.&nbsp;</b></p>\r\n\r\n<h3 dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Gi&aacute; Trị Cốt L&otilde;i</b></h3>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Trong qu&aacute; tr&igrave;nh ph&aacute;t triển, Mi Global lu&ocirc;n hoạt động xoay quanh 4 l&otilde;i gi&aacute; trị:</b></p>\r\n\r\n<h4 dir=\"ltr\" role=\"presentation\"><u><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Chuy&ecirc;n nghiệp:</b></u></h4>\r\n\r\n<ul>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Ch&uacute;ng t&ocirc;i lu&ocirc;n đặt sự chuy&ecirc;n nghiệp l&ecirc;n h&agrave;ng đầu. Từ quy tr&igrave;nh l&agrave;m việc, phong c&aacute;ch phục vụ đến c&aacute;ch thức giao tiếp, ch&uacute;ng t&ocirc;i cam kết mang đến cho kh&aacute;ch h&agrave;ng trải nghiệm dịch vụ chất lượng cao nhất.</b></p>\r\n	</li>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i kh&ocirc;ng ngừng n&acirc;ng cao kiến thức, kinh nghiệm v&agrave; kỹ năng, đảm bảo mọi dự &aacute;n đều được thực hiện với sự ch&iacute;nh x&aacute;c v&agrave; tối ưu nhất</b></p>\r\n	</li>\r\n</ul>\r\n\r\n<h4 dir=\"ltr\" role=\"presentation\"><u><b>Tận t&acirc;m:</b></u></h4>\r\n\r\n<ul>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Ch&uacute;ng t&ocirc;i lu&ocirc;n đặt kh&aacute;ch h&agrave;ng ở vị tr&iacute; trung t&acirc;m để lắng nghe v&agrave; thấu hiểu, từ đ&oacute; đưa ra những giải ph&aacute;p linh hoạt, tối ưu nhất. Sự h&agrave;i l&ograve;ng của kh&aacute;ch h&agrave;ng l&agrave; động lực để Mi Global kh&ocirc;ng ngừng ho&agrave;n thiện v&agrave; ph&aacute;t triển.</b></p>\r\n	</li>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global cam kết đồng h&agrave;nh c&ugrave;ng kh&aacute;ch h&agrave;ng trong suốt qu&aacute; tr&igrave;nh triển khai v&agrave; sau khi kết th&uacute;c dự &aacute;n, đảm bảo mọi mục ti&ecirc;u đều được thực hiện v&agrave; mang lại kết quả bền vững.</b></p>\r\n	</li>\r\n</ul>\r\n\r\n<h4 dir=\"ltr\" role=\"presentation\"><u><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Linh hoạt:</b></u></h4>\r\n\r\n<ul>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global lu&ocirc;n sẵn s&agrave;ng điều chỉnh v&agrave; tối ưu h&oacute;a chiến lược dựa tr&ecirc;n t&igrave;nh h&igrave;nh thực tế của kh&aacute;ch h&agrave;ng c&ugrave;ng những thay đổi của thị trường. Ch&uacute;ng t&ocirc;i hiểu rằng mỗi kh&aacute;ch h&agrave;ng đều c&oacute; những điểm ri&ecirc;ng biệt v&agrave; cần giải ph&aacute;p ph&ugrave; hợp được thiết kế ri&ecirc;ng cho từng nhu cầu.</b></p>\r\n	</li>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Khả năng th&iacute;ch ứng nhanh ch&oacute;ng với c&aacute;c xu hướng mới v&agrave; c&aacute;c yếu tố thay đổi của m&ocirc;i trường kinh doanh gi&uacute;p Mi Global lu&ocirc;n giữ vững vị thế dẫn đầu trong lĩnh vực tư vấn chiến lược.</b></p>\r\n	</li>\r\n</ul>\r\n\r\n<h4 dir=\"ltr\" role=\"presentation\"><u><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Đa dạng:</b></u></h4>\r\n\r\n<ul>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global sở hữu mạng lưới đối t&aacute;c v&agrave; dịch vụ phong ph&uacute;, từ tư vấn chiến lược Marketing &amp; Sale đến tư vấn t&agrave;i ch&iacute;nh bảo hiểm. Điều n&agrave;y gi&uacute;p ch&uacute;ng t&ocirc;i cung cấp c&aacute;c giải ph&aacute;p to&agrave;n diện v&agrave; đa dạng, đ&aacute;p ứng mọi nhu cầu của doanh nghiệp.</b></p>\r\n	</li>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Ch&uacute;ng t&ocirc;i kh&ocirc;ng ngừng mở rộng v&agrave; cập nhật danh mục dịch vụ để đảm bảo kh&aacute;ch h&agrave;ng lu&ocirc;n nhận được những giải ph&aacute;p ti&ecirc;n tiến v&agrave; hiệu quả nhất.</b></p>\r\n	</li>\r\n</ul>\r\n\r\n<h3 dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Cam Kết Của Ch&uacute;ng T&ocirc;i</b></h3>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global tin rằng sự th&agrave;nh c&ocirc;ng của kh&aacute;ch h&agrave;ng l&agrave; thước đo cho sự th&agrave;nh c&ocirc;ng của ch&uacute;ng t&ocirc;i. Do đ&oacute;, ch&uacute;ng t&ocirc;i lu&ocirc;n cam kết:</b></p>\r\n\r\n<ul>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Cung cấp dịch vụ tư vấn chiến lược Marketing &amp; Sale: Đưa ra những chiến lược ph&ugrave; hợp, gi&uacute;p doanh nghiệp tiếp cận thị trường một c&aacute;ch hiệu quả v&agrave; đạt được mục ti&ecirc;u kinh doanh.</b></p>\r\n	</li>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Tư vấn t&agrave;i ch&iacute;nh bảo hiểm: Cung cấp c&aacute;c giải ph&aacute;p t&agrave;i ch&iacute;nh bảo hiểm tối ưu, gi&uacute;p doanh nghiệp bảo vệ, ph&aacute;t triển nguồn vốn &amp; d&ograve;ng tiền c&ugrave;ng t&agrave;i sản một c&aacute;ch tối ưu.</b></p>\r\n	</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Ch&uacute;ng t&ocirc;i lu&ocirc;n đồng h&agrave;nh c&ugrave;ng kh&aacute;ch h&agrave;ng trong mọi bước đi, từ việc x&acirc;y dựng chiến lược, triển khai kế hoạch đến đ&aacute;nh gi&aacute; v&agrave; tối ưu h&oacute;a kết quả. Mi Global cam kết trở th&agrave;nh đối t&aacute;c tin cậy, gi&uacute;p doanh nghiệp của bạn vượt qua mọi thử th&aacute;ch v&agrave; đạt được những th&agrave;nh c&ocirc;ng vượt bậc.</b></p>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">Mi Global - Đối t&aacute;c chiến lược cho sự ph&aacute;t triển bền vững của doanh nghiệp.</b></p>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-a99db0dc-7fff-5108-8599-49f6479bfa95\">H&atilde;y để Mi Global c&ugrave;ng bạn vươn tới những tầm cao mới trong kinh doanh!</b></p>\r\n', '<p>...</p>\r\n', 'gioi-thieu', '/backend/web/uploads/images/about-slide.png', 1, 1, 0, 2, 'Giới thiệu về HB', '', '', '2024-08-23 16:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_save`
--

CREATE TABLE `pcounter_save` (
  `save_name` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `save_value` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `pcounter_save`
--

INSERT INTO `pcounter_save` (`save_name`, `save_value`) VALUES
('day_time', 2458792),
('counter', 26),
('yesterday', 0),
('max_count', 1),
('max_time', 1567659600);

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_users`
--

CREATE TABLE `pcounter_users` (
  `user_ip` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_time` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `pcounter_users`
--

INSERT INTO `pcounter_users` (`user_ip`, `user_time`) VALUES
('f528764d624db129b32c21fbca0cb8d6', 1572843130);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `parent` int NOT NULL DEFAULT '0',
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` longtext COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb3_unicode_ci,
  `icon` text COLLATE utf8mb3_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `feature` int NOT NULL DEFAULT '0',
  `views` int NOT NULL DEFAULT '0',
  `number` int NOT NULL DEFAULT '0',
  `tag` text COLLATE utf8mb3_unicode_ci,
  `tag_compare` text COLLATE utf8mb3_unicode_ci,
  `title` text COLLATE utf8mb3_unicode_ci,
  `description` text COLLATE utf8mb3_unicode_ci,
  `keyword` text COLLATE utf8mb3_unicode_ci,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `parent`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `slug`, `image`, `icon`, `status`, `feature`, `views`, `number`, `tag`, `tag_compare`, `title`, `description`, `keyword`, `created_date`) VALUES
(44, 16, 'TÀI CHÍNH - BẢO HIỂM', '', '<ul>\r\n	<li style=\"margin: 0in 0in 8pt;\">Tư vấn c&aacute;c g&oacute;i vốn doanh nghiệp&nbsp;</li>\r\n	<li style=\"margin: 0in 0in 8pt;\">Chương tr&igrave;nh ph&uacute;c lợi nh&acirc;n vi&ecirc;n th&ocirc;ng qua bảo hiểm v&agrave; quỹ mở Manulife</li>\r\n	<li style=\"margin: 0in 0in 8pt;\">Bảo hiểm phi nh&acirc;n thọ</li>\r\n</ul>\r\n', '', '<p><meta charset=\"utf-8\" /></p>\r\n\r\n<h1 dir=\"ltr\" style=\"text-align: center;\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\"><a href=\"https://miglobalvn.com/chi-tiet-bai-viet/tai-chinh-bao-hiem.html\"><span style=\"color:#0000cc;\">T&Agrave;I CH&Iacute;NH - BẢO HIỂM</span></a></b></h1>\r\n\r\n<h4 dir=\"ltr\" role=\"presentation\"><span style=\"color:#0000cc;\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">1. Tư vấn c&aacute;c g&oacute;i vốn doanh nghiệp</b></span></h4>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Mi Global l&agrave; đơn vị tư vấn v&agrave; x&uacute;c tiến c&aacute;c g&oacute;i vay t&iacute;n chấp cho doanh nghiệp SME với c&aacute;c ng&acirc;n h&agrave;ng v&agrave; quỹ t&iacute;n dụng trong v&agrave; ngo&agrave;i nước. Đ&acirc;y sẽ l&agrave; nguồn cung cấp vốn &ldquo;sạch&rdquo; với mức l&atilde;i suất ph&ugrave; hợp v&agrave; thời gian x&eacute;t duyệt nhanh cho doanh nghiệp. Từ đ&oacute;, doanh nghiệp kh&ocirc;ng c&ograve;n nỗi lo về việc phải c&oacute; t&agrave;i sản thế chấp mới c&oacute; thể được vay hay phải d&ugrave;ng c&aacute;c nguồn vay b&ecirc;n ngo&agrave;i với l&atilde;i suất cao ảnh hưởng đến bi&ecirc;n lợi nhuận.&nbsp;</b></p>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Điều kiện x&uacute;c tiến c&aacute;c g&oacute;i vốn d&agrave;nh cho doanh nghiệp SME:</b></p>\r\n\r\n<ul>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Doanh nghiệp th&agrave;nh lập từ 2 năm trở l&ecirc;n</b></p>\r\n	</li>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">C&oacute; doanh thu tr&ecirc;n 3 tỷ/năm</b></p>\r\n	</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Xem th&ecirc;m về c&aacute;c g&oacute;i vay v&agrave; điều kiện chi tiết tại đ&acirc;y</b><span style=\"color:#0000cc;\"></span></p>\r\n\r\n<h4><span style=\"color:#0000cc;\">2.&nbsp;<b>Chương tr&igrave;nh ph&uacute;c lợi nh&acirc;n vi&ecirc;n th&ocirc;ng qua bảo hiểm v&agrave; quỹ mở Manulife</b></span></h4>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Với nhu cầu ph&aacute;t triển kinh doanh bền vững v&agrave; mở rộng, doanh nghiệp cần phải đầu tư v&agrave; duy tr&igrave; nguồn nh&acirc;n sự chất lượng cao th&ocirc;ng qua ch&iacute;nh s&aacute;ch lương thưởng v&agrave; c&aacute;c chương tr&igrave;nh ph&uacute;c lợi chuy&ecirc;n s&acirc;u để giữ ch&acirc;n nh&acirc;n t&agrave;i.&nbsp;</b></p>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Hiểu được sự quan t&acirc;m của doanh nghiệp về vấn đề nh&acirc;n sự, Mi Global mang đến một giải ph&aacute;p chăm lo về sức khoẻ t&agrave;i ch&iacute;nh cho nh&acirc;n vi&ecirc;n v&agrave; cả gia đ&igrave;nh của họ th&ocirc;ng qua hai sản phẩm của C&ocirc;ng ty Bảo Hiểm Manulife:</b></p>\r\n\r\n<ul>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm nh&acirc;n thọ d&agrave;nh cho nh&acirc;n vi&ecirc;n: đảm bảo đời sống của nh&acirc;n vi&ecirc;n v&agrave; gia đ&igrave;nh được an to&agrave;n trước c&aacute;c biến cố kh&ocirc;ng thể lường trước trong tương lai. Từ đ&oacute; nh&acirc;n vi&ecirc;n sẽ cảm thấy được c&ocirc;ng ty tr&acirc;n trọng v&agrave; c&oacute; động lực l&agrave;m việc gia tăng năng suất v&agrave; gắn b&oacute; l&acirc;u d&agrave;i c&ugrave;ng c&ocirc;ng ty.&nbsp;&nbsp;</b></p>\r\n\r\n	<ul>\r\n		<li role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm sinh mệnh &amp; tai nạn (bao gồm c&aacute;c tổn thương do tai nạn v&agrave; quyền lợi x2 khi ra đi trước năm 70 tuổi v&igrave; tai nạn)</b></li>\r\n		<li role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm bệnh nghi&ecirc;m trọng (125 loại bệnh bao gồm cả ung thư, đột quỵ,&hellip;)</b></li>\r\n		<li role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm trợ cấp y tế (được hưởng một khoản trợ cấp từ 200k &ndash; 500k/ng&agrave;y nằm viện)</b></li>\r\n		<li role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Thẻ sức khoẻ n&acirc;ng cao (quyền lợi nội tr&uacute;, ngoại tr&uacute; v&agrave; thai sản) với phạm vi &aacute;p dụng tại Việt Nam v&agrave; to&agrave;n cầu.</b></li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Thời gian đ&oacute;ng ph&iacute; linh hoạt với c&aacute;c cột mốc 3 - 5 &ndash; 15 &ndash; 20 năm.&nbsp;</b></p>\r\n\r\n<p><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Gi&aacute; trị ho&agrave;n lại của hợp đồng bảo hiểm tối ưu theo từng g&oacute;i sản phẩm.</b></p>\r\n\r\n<p><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Được tư vấn v&agrave; hỗ trợ chuy&ecirc;n nghiệp từ Mi Global v&agrave; Manulife.</b></p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Quỹ lương hưu cho nh&acirc;n vi&ecirc;n th&ocirc;ng qua việc trả thưởng v&agrave;o Quỹ mở Manulife: nhằm gia tăng tiền thưởng cho nh&acirc;n vi&ecirc;n th&ocirc;ng qua l&atilde;i suất nhận được từ hoạt động đầu tư của Quỹ mở, với ưu điểm:</b></p>\r\n\r\n	<ul>\r\n		<li aria-level=\"2\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Kh&ocirc;ng giới hạn số tiền nạp quỹ&nbsp;</b></p>\r\n		</li>\r\n		<li aria-level=\"2\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Linh hoạt về thời gian nạp quỹ v&agrave; r&uacute;t tiền</b></p>\r\n		</li>\r\n		<li aria-level=\"2\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">L&atilde;i suất tối ưu với t&iacute;nh an to&agrave;n cao</b></p>\r\n		</li>\r\n		<li aria-level=\"2\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Ph&ugrave; hợp với từng nhu cầu t&iacute;ch luỹ của nh&acirc;n vi&ecirc;n th&ocirc;ng qua 3 quỹ: cổ phiếu, c&acirc;n bằng v&agrave; năng động.</b></p>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li aria-level=\"1\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm phi nh&acirc;n thọ (BHPNT)&nbsp;</b></p>\r\n	</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Th&ocirc;ng qua đối t&aacute;c Fuse, Mi Global mang đến c&aacute;c sản phẩm BHPNT linh hoạt v&agrave; ph&ugrave; hợp với t&igrave;nh h&igrave;nh hoạt động của doanh nghiệp, bao gồm:</b></p>\r\n\r\n<ul>\r\n	<li aria-level=\"2\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm xe cơ giới:</b></p>\r\n\r\n	<ul>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH bắt buộc tr&aacute;ch nhiệm d&acirc;n sự của chủ xe cơ giới</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tự nguyện tr&aacute;ch nhiệm d&acirc;n sự của chủ xe cơ giới</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH thiệt hại vật chất xe &ocirc; t&ocirc;</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tai nạn l&aacute;i phụ xe v&agrave; người chở tr&ecirc;n xe</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tr&aacute;ch nhiệm d&acirc;n sự của chủ xe đối với h&agrave;ng ho&aacute; vận chuyển tr&ecirc;n xe</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tự nguyện vật chất xe m&ocirc; t&ocirc; &ndash; xe m&aacute;y</b></p>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li aria-level=\"2\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm h&agrave;ng ho&aacute;:&nbsp;</b></p>\r\n\r\n	<ul>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH h&agrave;ng ho&aacute; vận chuyển nội địa</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH h&agrave;ng ho&aacute; xuất nhập khẩu</b></p>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li aria-level=\"2\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm t&agrave;i sản</b></p>\r\n\r\n	<ul>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH ch&aacute;y v&agrave; c&aacute;c rủi ro đặc biệt</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH hoả hoạn nh&agrave; tư nh&acirc;n</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH mọi rủi ro t&agrave;i sản</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH ch&aacute;y nổ bắt buộc</b></p>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li aria-level=\"2\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm kỹ thuật</b></p>\r\n\r\n	<ul>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH mọi rủi ro lắp đặt</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH mọi rủi ro x&acirc;y dựng</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH m&aacute;y m&oacute;c v&agrave; thiết bị chủ thầu</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH đổ vỡ m&aacute;y m&oacute;c</b></p>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li aria-level=\"2\" dir=\"ltr\">\r\n	<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">Bảo hiểm con người</b></p>\r\n\r\n	<ul>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH to&agrave;n diện học sinh, sinh vi&ecirc;n, gi&aacute;o vi&ecirc;n &amp; c&aacute;n bộ nh&acirc;n vi&ecirc;n</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH t&iacute;n dụng c&aacute; nh&acirc;n</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH sinh mạng c&aacute; nh&acirc;n</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH sức khoẻ c&aacute; nh&acirc;n: thẻ sức khoẻ, trợ cấp nằm viện v&agrave; phẫu thuật</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH bệnh hiểm ngh&egrave;o</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH kết hợp con người</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tai nạn con người 24/24</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tai nạn con người 24/24 &aacute;p dụng cho hộ gia đ&igrave;nh</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tai nạn mức tr&aacute;ch nhiệm cao</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tai nạn thuyền vi&ecirc;n</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tai nạn người sử dụng điện</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH bồi thường cho người lao động trong c&aacute;c doanh nghiệp x&acirc;y dựng, lắp đặt.</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH tai nạn h&agrave;nh kh&aacute;ch đi lại trong nước</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH kh&aacute;ch du lịch trong nước</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH du lịch quốc tế</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH người Việt Nam du lịch nước ngo&agrave;i</b></p>\r\n		</li>\r\n		<li aria-level=\"3\" dir=\"ltr\">\r\n		<p dir=\"ltr\" role=\"presentation\"><b id=\"docs-internal-guid-4ec9c777-7fff-0a5a-5710-8f31f970bdcd\">BH kh&aacute;ch nước ngo&agrave;i du lịch Việt Nam</b></p>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', '', 'tai-chinh-bao-hiem', '/backend/web/uploads/images/dich-vu/240522_HIEN-THI-TCHINH-BHIEN-585x355.png', '', 1, 1, 230, 3, '', NULL, '', '', '', '2024-06-20 17:58:30'),
(53, 16, 'MARKETING', '', '<ul>\r\n	<li>Tư vấn kế hoạch x&acirc;y dựng v&agrave; ph&aacute;t triển thương hiệu</li>\r\n	<li>X&acirc;y dựng v&agrave; quản trị c&aacute;c k&ecirc;nh Social Media</li>\r\n	<li>Chạy Ads tr&ecirc;n c&aacute;c nền tảng Google &amp; Social Media</li>\r\n	<li>Booking B&aacute;o ch&iacute; - KOL - KOC</li>\r\n	<li>Thiết kế UI/UX &amp; Lập tr&igrave;nh, Quản trị Website, App Operation Systeam, etc</li>\r\n	<li>S&aacute;ng tạo nội dung ( b&agrave;i viết, h&igrave;nh ảnh, video) đa nền tảng v&agrave; phong ph&uacute; về thể loại</li>\r\n	<li>Thiết kế &amp; In Ấn POSM, Bao b&igrave;,...</li>\r\n	<li>Cung cấp c&aacute;c giải ph&aacute;p về qu&agrave; tặng khuyến m&atilde;i, affter- sale, loyalty</li>\r\n</ul>\r\n', '', '<ul>\r\n	<li>Tư vấn kế hoạch x&acirc;y dựng v&agrave; ph&aacute;t triển thương hiệu</li>\r\n	<li>X&acirc;y dựng v&agrave; quản trị c&aacute;c k&ecirc;nh Social Media</li>\r\n	<li>Chạy Ads tr&ecirc;n c&aacute;c nền tảng Google &amp; Social Media</li>\r\n	<li>Booking B&aacute;o ch&iacute; - KOL - KOC</li>\r\n	<li>Thiết kế UI/UX &amp; Lập tr&igrave;nh, Quản trị Website, App Operation Systeam, etc</li>\r\n	<li>S&aacute;ng tạo nội dung ( b&agrave;i viết, h&igrave;nh ảnh, video) đa nền tảng v&agrave; phong ph&uacute; về thể loại</li>\r\n	<li>Thiết kế &amp; In Ấn POSM, Bao b&igrave;,...</li>\r\n	<li>Cung cấp c&aacute;c giải ph&aacute;p về qu&agrave; tặng khuyến m&atilde;i, affter- sale, loyalty</li>\r\n</ul>\r\n\r\n<p style=\"margin-top:0in; margin-right:0in; margin-bottom:7.5pt; margin-left:0in\"><span style=\"font-size:12pt\"><span style=\"background:white\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\"></span></span></span></span></span></span></p>\r\n', '', 'marketing', '/backend/web/uploads/images/dich-vu/240522_HIEN-THI-MKT-585x355.png', NULL, 1, 1, 386, 2, '', NULL, 'MARKETING', '', '', '2024-05-22 16:27:13'),
(78, 16, 'SALE', '', '<ul>\r\n	<li>Tư vấn kế hoạch ph&aacute;t triển thị trường</li>\r\n	<li>X&acirc;y dựng v&agrave; cung cấp c&aacute;c k&ecirc;nh b&aacute;n h&agrave;ng TMĐT, Website, Social Flatform (Facebook, Tiktok Shop, Instagram)</li>\r\n	<li>Mở k&ecirc;nh ph&acirc;n phối offline theo y&ecirc;u cầu</li>\r\n	<li>Tổ chức c&aacute;c chương tr&igrave;nh k&iacute;ch hoạt Activation tại điểm b&aacute;n</li>\r\n</ul>\r\n', '', '<ul>\r\n	<li style=\"margin: 0in 0in 8pt; text-align: justify;\">Tư vấn kế hoạch ph&aacute;t triển thị trường&nbsp;</li>\r\n	<li style=\"margin: 0in 0in 8pt; text-align: justify;\">X&acirc;y dựng v&agrave; cung cấp&nbsp;c&aacute;c k&ecirc;nh b&aacute;n h&agrave;ng TMĐT, Website, Social Flatform (Facebook, Tiktok Shop, Instagram)</li>\r\n	<li style=\"margin: 0in 0in 8pt; text-align: justify;\">Mở k&ecirc;nh ph&acirc;n phối offline theo y&ecirc;u cầu</li>\r\n	<li style=\"margin: 0in 0in 8pt; text-align: justify;\">Tổ chức c&aacute;c chương tr&igrave;nh k&iacute;ch hoạt Activation tại điểm b&aacute;n</li>\r\n</ul>\r\n', '', 'sale', '/backend/web/uploads/images/dich-vu/240522_HIEN-THI-SALE-585x355.png', NULL, 1, 1, 415, 1, '', NULL, 'SALE ', '- Tư vấn kế hoạch phát triển thị trường \r\n- Xây dựng các kênh bán hàng TMĐT, Website, Social Flatform (Facebook, Tiktok Shop, Instagram)\r\n- Mở kênh phân phối offline theo yêu cầu\r\n- Tổ chức các chương trình kích hoạt Activation tại điểm bán', '', '2024-06-19 17:23:38'),
(101, 24, 'Các dạng content Fanpage hiệu quả cho ngành dược', '', '<p>Đối với việc ph&aacute;t triển doanh nghiệp content vốn đ&atilde; quan trọng, nhưng đối với ng&agrave;nh Dược, n&oacute; lại lại c&agrave;ng quan trọng hơn gấp nhiều lần. Để x&acirc;y dựng được niềm tin vững chắc của kh&aacute;ch h&agrave;ng, content ng&agrave;nh Dược phải đảm bảo h&agrave;i h&ograve;a giữa cảm x&uacute;c v&agrave; khoa học. L&agrave;m thế n&agrave;o để chạm v&agrave;o cảm x&uacute;c kh&aacute;ch h&agrave;ng th&ocirc;ng qua sản phẩm v&agrave; dịch vụ m&agrave; c&acirc;u chữ kh&ocirc;ng kh&ocirc; khan, th&aacute;i qu&aacute;.</p>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/H9.png\" style=\"width: 900px; height: 525px;\" /></p>\r\n\r\n<p>Đối với việc ph&aacute;t triển doanh nghiệp content vốn đ&atilde; quan trọng, nhưng đối với ng&agrave;nh Dược, n&oacute; lại lại c&agrave;ng quan trọng hơn gấp nhiều lần. Để x&acirc;y dựng được niềm tin vững chắc của kh&aacute;ch h&agrave;ng, content ng&agrave;nh Dược phải đảm bảo h&agrave;i h&ograve;a giữa cảm x&uacute;c v&agrave; khoa học. L&agrave;m thế n&agrave;o để chạm v&agrave;o cảm x&uacute;c kh&aacute;ch h&agrave;ng th&ocirc;ng qua sản phẩm v&agrave; dịch vụ m&agrave; c&acirc;u chữ kh&ocirc;ng kh&ocirc; khan, th&aacute;i qu&aacute;.</p>\r\n\r\n<p>Đ&oacute; cũng l&agrave; ch&igrave;a kh&oacute;a để bạn x&acirc;y dựng một Fanpage ng&agrave;nh dược chất lượng với h&agrave;ng ngh&igrave;n lượt follow thực từ kh&aacute;ch h&agrave;ng. Vậy đ&acirc;u l&agrave; những dạng&nbsp;<strong>content Fanpage hiệu quả cho ng&agrave;nh dược</strong>? Mời bạn c&ugrave;ng tham khảo th&ocirc;ng qua b&agrave;i viết b&ecirc;n dưới của MIG&nbsp;nh&eacute;.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">1. Infographics</span></h2>\r\n\r\n<p>Đối với ng&agrave;nh dược, một b&agrave;i viết qu&aacute; d&agrave;i sẽ khiến kh&aacute;ch h&agrave;ng dễ nh&agrave;m ch&aacute;n bởi sự d&agrave;i d&ograve;ng, lan man đến ng&aacute;n ngẩm, đặc biệt l&agrave; với một nền tảng nhiều biến h&oacute;a như Facebook.</p>\r\n\r\n<p>Một content Fanpage th&agrave;nh c&ocirc;ng l&agrave; phải khiến cho kh&aacute;ch h&agrave;ng ấn tượng mạnh, đọc hiểu ngay v&agrave; ghi nhớ thật l&acirc;u. V&agrave; Infographics l&agrave; một trong những dạng content c&oacute; thể gi&uacute;p bạn l&agrave;m được điều đ&oacute;. Infographic l&agrave; một dạng h&igrave;nh ảnh h&oacute;a dữ liệu, gi&uacute;p bạn biến h&oacute;a những nội dung nh&agrave;m ch&aacute;n, kh&ocirc; khan th&agrave;nh dạng h&igrave;nh ảnh, sơ đồ trực quan v&agrave; sinh động hơn. Điều đ&oacute; vừa gi&uacute;p tăng trải nghiệm cho kh&aacute;ch h&agrave;ng vừa gi&uacute;p họ dễ d&agrave;ng tiếp cận th&ocirc;ng tin, tăng độ tin cậy v&agrave; lan tỏa th&ocirc;ng điệp.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, để x&acirc;y dựng&nbsp;<strong>Content Fanpage</strong>&nbsp;dạng Infographics kh&ocirc;ng đơn giản, đ&ograve;i hỏi một sự tổng hợp th&ocirc;ng tin tốt cũng như sử dụng th&agrave;nh thạo c&ocirc;ng cụ thiết kế đồ họa để c&oacute; thể cho ra đời một b&agrave;i đăng chất lượng.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/medical-infographic.jpg\" style=\"width: 564px; height: 379px;\" /><br />\r\n<span style=\"color:#0000cc;\"></span></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">2. Video viral</span></h2>\r\n\r\n<p>Content Fanpage ở dạng video l&agrave; một c&aacute;ch tiếp thị v&ocirc; c&ugrave;ng hiệu quả cho ng&agrave;nh dược cũng như nhiều ng&agrave;nh h&agrave;ng kh&aacute;c. Facebook rất ưu &aacute;i cho những nội dung video, họ c&oacute; ri&ecirc;ng phần Watch cho video nữa cơ m&agrave;. Người d&ugrave;ng cũng rất th&iacute;ch xem video thay v&igrave; những văn bản th&ocirc;ng thường. Cho n&ecirc;n l&agrave;m Video Viral sẽ gi&uacute;p sản phẩm của ng&agrave;nh dược nhanh ch&oacute;ng được lan tỏa. Điều bạn cần l&agrave;m l&agrave; x&acirc;y dựng một video chất lượt, c&oacute; th&ocirc;ng điệp truyền th&ocirc;ng r&otilde; r&agrave;ng v&agrave; đặc biệt phải chạm đến cảm x&uacute;c của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Ưu điểm của video viral trong&nbsp;<strong>chiến lược content Fanpage</strong>&nbsp;l&agrave; ở chỗ n&oacute; c&oacute; thể dễ d&agrave;ng g&acirc;y hứng th&uacute; cho người xem v&agrave; chạm đến tr&aacute;i tim của họ. V&igrave; vậy m&agrave; t&iacute;nh lan truyền của video rất cao, tương t&aacute;c mạnh v&agrave; dễ chuyển đổi th&agrave;nh quyết định mua h&agrave;ng.</p>\r\n\r\n<p>Bạn cũng cần lưu &yacute; tạo n&ecirc;n những video c&oacute; nội dung ngắn gọn, s&uacute;c t&iacute;ch, truyền đạt th&ocirc;ng điệp dễ nhớ, tuy nhi&ecirc;n cũng đừng qu&ecirc;n t&iacute;nh thực tế v&agrave; gần gũi để chạm đến cảm x&uacute;c của người xem. Thời lượng tối ưu được Facebook đề xuất l&agrave; v&agrave;o khoảng 3 &ndash; 5 ph&uacute;t, thế n&ecirc;n đừng đi qu&aacute; lan man, h&atilde;y tập trung v&agrave;o vấn đề ch&iacute;nh.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">3. Review sản phẩm</span></h2>\r\n\r\n<p>Ng&agrave;y nay người d&ugrave;ng rất th&ocirc;ng minh v&agrave; nhanh nhạy trong việc t&igrave;m kiếm th&ocirc;ng tin th&ocirc;ng qua c&aacute;c k&ecirc;nh mạng x&atilde; hội v&agrave; website, họ đặc biệt ch&uacute; &yacute; đến lời giới thiệu &ndash; đ&aacute;nh gi&aacute; kh&aacute;ch quan của những người đ&atilde; từng sử dụng sản phẩm. Cho n&ecirc;n những trang web review sản phẩm, những video mang t&iacute;nh review, đ&aacute;nh gi&aacute;, so s&aacute;nh, hướng dẫn về sản phẩm bao giờ cũng c&oacute; độ cuốn h&uacute;t mạnh mẽ.</p>\r\n\r\n<p><strong>Content Fanpage ng&agrave;nh dược</strong>&nbsp;của bạn cũng n&ecirc;n d&agrave;nh một thời lượng nhất định để c&oacute; những b&agrave;i đăng review sản phẩm/dịch vụ. Một nội dung ho&agrave;n hảo thường theo cấu tr&uacute;c:</p>\r\n\r\n<ul>\r\n	<li>Giới thiệu, m&ocirc; tả sản phẩm, th&ocirc;ng tin nh&agrave; sản xuất.</li>\r\n	<li>Nhận x&eacute;t, đ&aacute;nh gi&aacute; sản phẩm đ&oacute;, bạn th&iacute;ch hay kh&ocirc;ng th&iacute;ch điều g&igrave; ở n&oacute;, &yacute; tưởng để cải tiến n&oacute; nếu bạn muốn. Những th&ocirc;ng tin n&agrave;y phải ho&agrave;n to&agrave;n kh&aacute;ch quan v&agrave; phải được lấy &yacute; kiến từ người đ&atilde; ch&iacute;nh thức sử dụng sản phẩm.</li>\r\n	<li>Lời k&ecirc;u gọi h&agrave;nh động, th&ocirc;i th&uacute;c mua h&agrave;ng.</li>\r\n</ul>\r\n\r\n<p>Những b&agrave;i đăng theo kiểu review sản phẩm tr&ecirc;n Fanpage sẽ nhận được sự quan t&acirc;m của đ&ocirc;ng đảo người d&ugrave;ng. Rất nhiều người muốn biết thực tế về sản phẩm l&agrave; g&igrave;, c&oacute; ai đ&oacute; đ&atilde; d&ugrave;ng n&oacute; v&agrave; hiệu quả ra sao hoặc những t&aacute;c dụng phụ n&agrave;o đ&oacute;. V&igrave; vậy, nh&atilde;n h&agrave;ng thuộc ng&agrave;nh dược n&ecirc;n ch&uacute; trọng đến c&aacute;ch l&agrave;m content Fanpage theo hướng product review một c&aacute;ch hợp l&yacute;.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">4. Đặt c&acirc;u hỏi</span></h2>\r\n\r\n<p>Một dạng&nbsp;<strong>content fanpage</strong>&nbsp;rất được ng&agrave;nh dược ch&uacute; &yacute; l&agrave; đặt ra c&acirc;u hỏi v&agrave; giải đ&aacute;p ch&uacute;ng. &ldquo;How to&rdquo; đi thẳng v&agrave;o vấn đề m&agrave; người d&ugrave;ng quan t&acirc;m, kh&ocirc;ng lan man d&agrave;i d&ograve;ng. C&acirc;u hỏi thường li&ecirc;n quan đến những chứng bệnh, triệu chứng phổ biến v&agrave; c&aacute;ch điều trị ph&ugrave; hợp.</p>\r\n\r\n<p>Người d&ugrave;ng sẽ đ&aacute;nh gi&aacute; cao dạng content n&agrave;y bởi v&igrave; n&oacute; trực tiếp giải đ&aacute;p điều m&agrave; họ đang băn khoăn. Dạng b&agrave;i viết n&agrave;y rất dễ khơi dậy hứng th&uacute; của người d&ugrave;ng v&agrave; họ nhanh ch&oacute;ng share, lưu b&agrave;i viết lại để sử dụng sau n&agrave;y.</p>\r\n\r\n<p>Ở dạng content fanpage n&agrave;y bạn c&agrave;ng đưa ra c&acirc;u hỏi cụ thể v&agrave; trả lời triệt để, r&otilde; r&agrave;ng, chi tiết về c&aacute;c phương ph&aacute;p, loại thuốc n&ecirc;n sử dụng, t&aacute;c dụng phụ nếu c&oacute; v&agrave; giải quyết ra sao&hellip; Kh&aacute;ch h&agrave;ng sẽ c&agrave;ng tin tưởng v&agrave;o thương hiệu của bạn v&agrave; trở th&agrave;nh người mua trung th&agrave;nh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/storytelling-mig.jpg\" style=\"width: 800px; height: 342px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">5. H&atilde;y kể chuyện</span></h2>\r\n\r\n<p>Những kh&aacute;ch h&agrave;ng kh&oacute; t&iacute;nh, họ thường rất quan t&acirc;m đến c&acirc;u chuyện của doanh nghiệp. H&atilde;y tận dụng điều n&agrave;y để truyền cảm hứng đến kh&aacute;ch h&agrave;ng th&ocirc;ng qua l&yacute; tưởng v&agrave; sứ mệnh của doanh nghiệp bạn. H&atilde;y biến ch&uacute;ng th&agrave;nh một c&acirc;u chuyện c&oacute; hồn, với lối kể chuyện sinh động, s&aacute;ng tạo v&agrave; thật sự l&ocirc;i cuốn. H&atilde;y để kh&aacute;ch h&agrave;ng nh&igrave;n thấy một bức tranh to&agrave;n cảnh v&agrave; cảm nhận điểm kh&aacute;c biệt đầu ti&ecirc;n khi bắt đầu t&igrave;m hiểu về doanh nghiệp.</p>\r\n\r\n<p>Thế nhưng h&atilde;y b&aacute;m s&aacute;t v&agrave;o thực tế, đừng vẽ vời những thứ qu&aacute; ảo diệu v&agrave; xa x&ocirc;i. V&igrave; như thế sẽ tạo cho kh&aacute;ch h&agrave;ng cảm gi&aacute;c kh&oacute; tin, phi thực tế. C&acirc;u chuyện m&agrave; bạn kể c&agrave;ng ch&acirc;n thật bao nhi&ecirc;u sẽ c&agrave;ng dễ truyền cảm hứng đến kh&aacute;ch h&agrave;ng bấy nhi&ecirc;u.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Đội ngũ content MIG&nbsp;sẽ gi&uacute;p bạn x&acirc;y dựng c&aacute;c dạng content Fanpage hiệu quả cho ng&agrave;nh dược</span></h2>\r\n\r\n<p>Với nhiều năm hoạt động trong lĩnh vực Digital Marketing tại TP.HCM, MIG&nbsp;tự h&agrave;o c&oacute; một đội ngũ chuy&ecirc;n gia gi&agrave;u kinh nghiệm trong việc x&acirc;y dựng&nbsp;<strong>chiến lược content marketing cho ng&agrave;nh dược</strong>. B&ecirc;n cạnh đ&oacute;, sự nhạy b&eacute;n v&agrave; năng lực s&aacute;ng tạo l&agrave; một trong những yếu tố trọng t&acirc;m tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng cho c&aacute;c dự &aacute;n của MIG.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n tự đề ra cho m&igrave;nh những nguy&ecirc;n tắc v&agrave; quy tr&igrave;nh cụ thể. Trong đ&oacute;, nghi&ecirc;n cứu sản phẩm &ndash; dịch vụ của kh&aacute;ch h&agrave;ng, nghi&ecirc;n cứu thị trường, nghi&ecirc;n cứu v&agrave; ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng mục ti&ecirc;u l&agrave; một trong những quy tr&igrave;nh cực kỳ quan trọng kh&ocirc;ng được ph&eacute;p bỏ qua.</p>\r\n\r\n<p>Dựa tr&ecirc;n sự am hiểu v&agrave; vận dụng c&aacute;c thuật to&aacute;n của Facebook một c&aacute;ch linh hoạt v&agrave; hiệu quả, MIG&nbsp;c&ograve;n tạo ra những mẫu content ph&ugrave; hợp, vừa đ&aacute;p ứng c&aacute;c điều kiện của Facebook, vừa nhắm đ&uacute;ng kh&aacute;ch h&agrave;ng mục ti&ecirc;u.</p>\r\n\r\n<p>V&agrave; đặc biệt, MIG&nbsp;đến với kh&aacute;ch h&agrave;ng bằng sự tận t&acirc;m, th&aacute;i độ tử tế v&agrave; tinh thần tr&aacute;ch nhiệm cao. Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng bạn để đưa ra những giải ph&aacute;p tối ưu bằng nghiệp vụ chuy&ecirc;n s&acirc;u v&agrave; kh&aacute;c biệt. MIG&nbsp;cam kết sẽ gi&uacute;p bạn x&acirc;y dựng một chiến lược content marketing cho Fanpage đầy đột ph&aacute; nhằm gia tăng lượt truy cập v&agrave; cải thiện hiệu quả b&aacute;n h&agrave;ng tối đa.</p>\r\n\r\n<p>Để được tư vấn th&ecirc;m về c&aacute;ch x&acirc;y dựng c&aacute;c dạng content marketing cho ng&agrave;nh dược, bạn h&atilde;y li&ecirc;n hệ với MIG&nbsp;ngay h&ocirc;m nay. Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn 24/7.</p>\r\n', '', 'cac-dang-content-fanpage-hieu-qua-cho-nganh-duoc', '/backend/web/uploads/images/Tin-tuc/H9.png', NULL, 1, 1, 59, 0, '', NULL, 'Các dạng content Fanpage hiệu quả cho ngành dược', 'Đối với việc phát triển doanh nghiệp content vốn đã quan trọng, nhưng đối với ngành Dược, nó lại lại càng quan trọng hơn gấp nhiều lần. Để xây dựng được niềm tin vững chắc của khách hàng, content ngành Dược phải đảm bảo hài hòa giữa cảm xúc và khoa học. ', 'Content marketing ngành dược, Content marketing, Content fanpage, content seo, Content SEO, Marketing ngành dược', '2024-05-28 11:35:38'),
(102, 24, '7 nguyên tắc quan trọng khi làm content marketing ngành dược', '', '<p>Ng&agrave;nh dược ng&agrave;y nay đ&atilde; v&agrave; đang tham gia v&agrave;o h&agrave;nh tr&igrave;nh tiếp thị số (digital marketing). Digital marketing mở ra cho c&aacute;c nh&atilde;n h&agrave;ng dược những cơ hội tiếp cận đối tượng mục ti&ecirc;u tr&ecirc;n nhiều k&ecirc;nh, đo lường v&agrave; tối ưu ho&aacute; được c&aacute;c chỉ số của từng chiến dịch. Song song đ&oacute;, khi triển khai digital marketing, nh&atilde;n h&agrave;ng dược phải ch&uacute; trọng v&agrave;o tiếp thị nội dung (content marketing) để truyền tải được th&ocirc;ng điệp v&agrave; th&ocirc;ng tin sản phẩm ch&iacute;nh x&aacute;c đến đ&uacute;ng đối tượng v&agrave; thời điểm.</p>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/H8.png\" style=\"width: 900px; height: 525px;\" /></p>\r\n\r\n<p>Ng&agrave;nh dược ng&agrave;y nay đ&atilde; v&agrave; đang tham gia v&agrave;o h&agrave;nh tr&igrave;nh tiếp thị số (digital marketing). Digital marketing mở ra cho c&aacute;c nh&atilde;n h&agrave;ng dược những cơ hội tiếp cận đối tượng mục ti&ecirc;u tr&ecirc;n nhiều k&ecirc;nh, đo lường v&agrave; tối ưu ho&aacute; được c&aacute;c chỉ số của từng chiến dịch. Song song đ&oacute;, khi triển khai digital marketing, nh&atilde;n h&agrave;ng dược phải ch&uacute; trọng v&agrave;o tiếp thị nội dung (content marketing) để truyền tải được th&ocirc;ng điệp v&agrave; th&ocirc;ng tin sản phẩm ch&iacute;nh x&aacute;c đến đ&uacute;ng đối tượng v&agrave; thời điểm.</p>\r\n\r\n<p>Với đặc th&ugrave; của một ng&agrave;nh nghề ảnh hưởng trực tiếp đến sức khỏe của con người, &nbsp;nh&agrave; tiếp thị (marketer) khi l&agrave;m&nbsp;content marketing ng&agrave;nh dược&nbsp;cần lưu &yacute; 7 nguy&ecirc;n tắc sau đ&acirc;y để tạo ra những nội dung chất lượng, đảm bảo c&aacute;c ti&ecirc;u ch&iacute; của ng&agrave;nh dược v&agrave; tạo hiệu ứng quảng c&aacute;o tốt.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">1. Content marketing ng&agrave;nh dược cần đặt sản phẩm l&agrave;m trung t&acirc;m</span></h2>\r\n\r\n<p>Ng&agrave;y nay, sự kh&aacute;c biệt giữa c&aacute;c k&ecirc;nh marketing ng&agrave;y c&agrave;ng lớn dần. Đối với việc quảng c&aacute;o c&aacute;c sản phẩm dược trực tiếp đến người ti&ecirc;u d&ugrave;ng (DTC Ads), c&aacute;c k&ecirc;nh như mẫu quảng c&aacute;o tr&ecirc;n b&aacute;o in (printads) hay tr&ecirc;n b&aacute;o điện tử (digital ads), phim quảng c&aacute;o (TVC hoặc viral clip) thường c&oacute; rất &iacute;t thời gian v&agrave; kh&ocirc;ng gian cho nội dung. Trong khi đ&oacute;, đối với việc tiếp cận c&aacute;c chuy&ecirc;n gia y tế (HPC), nh&atilde;n h&agrave;ng dược thường sử dụng c&aacute;c c&ocirc;ng cụ bao gồm t&agrave;i liệu giới thiệu sản phẩm, ấn phẩm quảng c&aacute;o, email th&ocirc;ng qua tr&igrave;nh dược vi&ecirc;n l&agrave;m việc trực tiếp hoặc tại c&aacute;c chương tr&igrave;nh hội thảo chuy&ecirc;n đề.</p>\r\n\r\n<p>Cho d&ugrave; nh&oacute;m đối tượng tiếp cận của bạn l&agrave; ai v&agrave; c&ocirc;ng cụ sử dụng l&agrave; g&igrave;, bạn cần đưa v&agrave;o nội dung c&aacute;c điểm dữ liệu quan trọng, như kết quả nghi&ecirc;n cứu, hiệu quả v&agrave; t&aacute;c dụng phụ của sản phẩm. Bạn cần tr&aacute;nh việc cố gắng truyền tải th&ocirc;ng điệp ngắn gọn ở một định dạng lớn như c&aacute;c b&agrave;i blog, ebook hoặc video. V&igrave; th&ocirc;ng điệp của bạn c&oacute; thể mất hoặc lo&atilde;ng khiến người xem kh&ocirc;ng hiểu r&otilde; về sản phẩm. V&agrave; ngược lại với một định dạng ngắn như mẫu quảng c&aacute;o (ads), TVC hoặc email, bạn cần tập trung v&agrave;o sản phẩm v&agrave; truyền tải th&ocirc;ng điệp một c&aacute;ch ngắn gọn.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/sanphamnganhduoc-marketing.jpg\" style=\"width: 900px; height: 667px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">2. Content marketing ng&agrave;nh dược cần đủ d&agrave;i v&agrave; chuy&ecirc;n s&acirc;u</span></h2>\r\n\r\n<p>Content marketing cho c&aacute;c sản phẩm dược cần đảm bảo c&aacute;c yếu tố: t&iacute;nh khoa học, t&iacute;nh chuy&ecirc;n s&acirc;u v&agrave; t&iacute;nh to&agrave;n diện. Bởi v&igrave; đối tượng mục ti&ecirc;u của ng&agrave;nh dược l&agrave; c&aacute;c chuy&ecirc;n gia y tế (HCP) c&oacute; tr&igrave;nh độ chuy&ecirc;n m&ocirc;n cao. Do đ&oacute; khi thực hiện nội dung cho nh&oacute;m n&agrave;y, nh&atilde;n h&agrave;ng dược cần đảm bảo đủ 3 đặc t&iacute;nh tr&ecirc;n để tạo sự thuyết phục v&agrave; tin tưởng khi sử dụng sản phẩm. C&ograve;n đối với nh&oacute;m người ti&ecirc;u d&ugrave;ng trực tiếp, nội dung tiếp thị cần phải đơn giản, dễ hiểu nhưng vẫn đảm bảo t&iacute;nh khoa học v&agrave; to&agrave;n diện để tạo sự tin tưởng.</p>\r\n\r\n<p>Đối với website, độ d&agrave;i l&yacute; tưởng được khuyến kh&iacute;ch của một b&agrave;i content ng&agrave;nh dược v&agrave;o khoảng 1600 từ trở l&ecirc;n để trang web được xếp hạng cao tr&ecirc;n c&aacute;c c&ocirc;ng cụ t&igrave;m kiếm. Như vậy, ngoại trừ c&aacute;c nội dung đầu phễu nhằm mục ti&ecirc;u thu h&uacute;t kh&aacute;ch h&agrave;ng truy cập. Tất cả nội dung c&ograve;n lại trong một trang web dược n&ecirc;n c&oacute; nội dung d&agrave;i.</p>\r\n\r\n<p>Một long-form content tạo ra nhiều gi&aacute; trị hữu &iacute;ch cho người đọc, x&acirc;y dựng được niềm tin của họ v&agrave; tăng khả năng chuyển đổi h&agrave;nh động mua h&agrave;ng hơn. Đồng thời về kh&iacute;a cạnh SEO, website cũng được đ&aacute;nh gi&aacute; cao hơn, uy t&iacute;n hơn, tăng khả năng hiển thị, lượt chia sẻ,&hellip;</p>\r\n\r\n<p>Đối với c&aacute;c k&ecirc;nh kh&aacute;c, nh&atilde;n h&agrave;ng cần nắm r&otilde; c&aacute;c quy chuẩn về độ d&agrave;i của nội dung để đạt hiệu quả cao nhất cho chiến dịch.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">3. Content marketing ng&agrave;nh dược phải ph&ugrave; hợp với từng giai đoạn của qu&aacute; tr&igrave;nh mua</span></h2>\r\n\r\n<p>Đối với nh&oacute;m kh&aacute;ch h&agrave;ng l&agrave; người ti&ecirc;u d&ugrave;ng trực tiếp, quyết định mua h&agrave;ng sẽ trải qua &iacute;t nhất 3 giai đoạn, k&eacute;o d&agrave;i trong v&ograve;ng 3 &ndash; 12 th&aacute;ng. Kh&aacute;ch h&agrave;ng sẽ chưa vội mua một sản phẩm ngay khi họ tr&ocirc;ng thấy nội dung quảng c&aacute;o. Họ cần t&igrave;m hiểu, đọc t&agrave;i liệu, so s&aacute;nh, tham khảo &yacute; kiến chuy&ecirc;n gia ở rất nhiều website kh&aacute;c nhau.</p>\r\n\r\n<p>Đối với nh&oacute;m kh&aacute;ch h&agrave;ng l&agrave; HCP, quyết định sử dụng sản phẩm để k&ecirc; toa, giới thiệu cho người bệnh hoặc sử dụng trong hệ thống ph&acirc;n phối sẽ cần từ 6 th&aacute;ng trở l&ecirc;n. Việc quyết định sử dụng sẽ từ sự nhận biết, t&igrave;m hiểu chi tiết về sản phẩm v&agrave; giấy ph&eacute;p, so s&aacute;nh với c&aacute;c sản phẩm tương tự v&agrave; nhận được sự đồng &yacute; từ hội đồng chuy&ecirc;n gia hoặc l&atilde;nh đạo cơ quan.</p>\r\n\r\n<p>Do đ&oacute;, nh&atilde;n h&agrave;ng cần thực hiện nội dung ph&ugrave; hợp tương ứng với từng giai đoạn của mỗi nh&oacute;m kh&aacute;ch h&agrave;ng mục ti&ecirc;u để gi&uacute;p kh&aacute;ch h&agrave;ng chuyển từ cấp thấp sang cấp cao nhất l&agrave; quyết định sử dụng sản phẩm.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">4. Content marketing ng&agrave;nh dược sẽ cần nhiều thời gian để được xuất bản</span></h2>\r\n\r\n<p>Tương tự như ng&agrave;nh y tế, ng&agrave;nh dược được kiểm so&aacute;t chặt chẽ thậm ch&iacute; đến kh&acirc;u tiếp thị quảng c&aacute;o. Ch&iacute;nh v&igrave; vậy một nội dung marketing dược muốn được xuất bản sẽ phải trải qua rất nhiều giai đoạn kiểm duyệt gắt gao.</p>\r\n\r\n<p>V&iacute; dụ một quy tr&igrave;nh triển khai&nbsp;chiến lược ph&aacute;t triển nội dung ng&agrave;nh dược&nbsp;như sau:</p>\r\n\r\n<ul>\r\n	<li>Nội dung ch&iacute;nh của sản phẩm được tạo ra &nbsp;sản phẩm được th&iacute; nghiệm, kiểm duyệt th&agrave;nh c&ocirc;ng v&agrave; được cấp ph&eacute;p.</li>\r\n	<li>Nội dung n&agrave;y sẽ được chuyển qua cho bộ phận tiếp thị để s&aacute;ng tạo.</li>\r\n	<li>N&oacute; sẽ tiếp tục được đưa lại cho c&aacute;c nh&agrave; khoa học để được ph&ecirc; duyệt về chuy&ecirc;n m&ocirc;n.</li>\r\n	<li>Nội dung sẽ tiếp tục được đưa đến bộ phận xem x&eacute;t ph&aacute;p l&yacute; v&agrave; c&aacute;c quy định để đảm bảo n&oacute; kh&ocirc;ng vi phạm bất kỳ vấn đề g&igrave;.</li>\r\n	<li>Qua h&agrave;ng loạt quy tr&igrave;nh kiểm duyệt như vậy, một content ng&agrave;nh dược mới được ph&eacute;p xuất bản.</li>\r\n</ul>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"7 nguyên tắc quan trọng khi làm content marketing ngành dược\" src=\"/backend/web/uploads/images/hinh-thu-vien/pexels-shvetsa-3683074.jpg\" style=\"width: 900px; height: 600px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">5. Content marketing ng&agrave;nh dược phẩm cần đi theo một kế hoạch l&acirc;u d&agrave;i</span></h2>\r\n\r\n<p>Muốn tạo ra một trang web dược uy t&iacute;n, thu h&uacute;t nhiều kh&aacute;ch h&agrave;ng, người l&agrave;m content phải x&acirc;y dựng một kế hoạch nội dung b&agrave;i bản. Bao gồm chiến lược tiếp thị nội dung ngắn hạn &ndash; trung hạn &ndash; d&agrave;i hạn. Ở từng chiến lược sẽ c&oacute; những kế hoạch nhỏ hơn để đạt được hiệu quả sau c&ugrave;ng như đơn vị mong muốn. Chẳng hạn như tăng lưu lượng truy cập của trang web, tăng nhận thức thương hiệu hay chuyển đổi th&agrave;nh kh&aacute;ch h&agrave;ng tiềm năng,&hellip; Một kế hoạch d&agrave;i hạn sẽ gi&uacute;p người l&agrave;m content dễ bề triển khai c&aacute;c nội dung ph&ugrave; hợp.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">6. Content marketing ng&agrave;nh dược cần được c&aacute; nh&acirc;n h&oacute;a đ&uacute;ng l&uacute;c đ&uacute;ng chỗ</span></h2>\r\n\r\n<p>Quyết định mua của kh&aacute;ch h&agrave;ng trong ng&agrave;nh dược cực kỳ phức tạp, n&oacute; phụ thuộc v&agrave;o từng trường hợp cụ thể. V&iacute; dụ: Người ra quyết định mua h&agrave;ng, c&aacute;c influencer (người ảnh hưởng) v&agrave; c&aacute;c chuy&ecirc;n gia. V&igrave; vậy,&nbsp;chiến lược ph&aacute;t triển nội dung ng&agrave;nh dược phẩm&nbsp;cần đi theo m&ocirc; h&igrave;nh Account Based Marketing. Nhằm s&aacute;ng tạo ra những nội dung c&oacute; t&iacute;nh c&aacute; nh&acirc;n h&oacute;a đến từng đối tượng, phục vụ từng mục đ&iacute;ch cụ thể. Như vậy sẽ tăng khả năng ra quyết định mua đến mức tối đa.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">7. Content marketing ng&agrave;nh dược cần thiết phải đo lường</span></h2>\r\n\r\n<p>Sau một giai đoạn ngắn thực hiện chiến lược&nbsp;content marketing, ch&uacute;ng ta cần đo lường kết quả của n&oacute;. Sẽ c&oacute; bộ c&ocirc;ng cụ với những ti&ecirc;u ch&iacute; cụ thể để bạn thực hiện nhiệm vụ n&agrave;y. Việc đo lường hiệu quả của content ng&agrave;nh dược cực kỳ quan trọng, gi&uacute;p x&aacute;c định xem những chiến thuật v&agrave; nội dung nhỏ c&oacute; đang đi đ&uacute;ng hướng hay chưa? C&aacute;c nội dung c&oacute; hoạt động hay kh&ocirc;ng? Đồng thời x&aacute;c định r&otilde; r&agrave;ng hơn những ROI ph&ugrave; hợp với chiến lược tiếp thị nội dung tổng qu&aacute;t.</p>\r\n\r\n<p>X&acirc;y dựng chiến lược ph&aacute;t triển nội dung ng&agrave;nh dược phẩm dựa tr&ecirc;n 7 nguy&ecirc;n tắc tr&ecirc;n đ&acirc;y l&agrave; một hướng marketing đ&uacute;ng đắn. Bạn c&oacute; đang l&agrave;m nội dung theo những nguy&ecirc;n tắc n&agrave;y? Nếu chưa, h&atilde;y điều chỉnh một ch&uacute;t để content mang lại hiệu quả như bạn mong đợi nh&eacute;.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Đội ngũ content MIG</span></h2>\r\n\r\n<p>Với nhiều năm hoạt động trong lĩnh vực Digital Marketing tại TP.HCM, MIG tự h&agrave;o c&oacute; một đội ngũ chuy&ecirc;n gia gi&agrave;u kinh nghiệm trong việc x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh dược. B&ecirc;n cạnh đ&oacute;, sự nhạy b&eacute;n v&agrave; năng lực s&aacute;ng tạo l&agrave; một trong những yếu tố trọng t&acirc;m tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng cho c&aacute;c dự &aacute;n của MIG.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n tự đề ra cho m&igrave;nh những nguy&ecirc;n tắc v&agrave; quy tr&igrave;nh cụ thể. Trong đ&oacute;, nghi&ecirc;n cứu sản phẩm &ndash; dịch vụ của kh&aacute;ch h&agrave;ng, nghi&ecirc;n cứu thị trường, nghi&ecirc;n cứu v&agrave; ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng mục ti&ecirc;u l&agrave; một trong những quy tr&igrave;nh cực kỳ quan trọng kh&ocirc;ng được ph&eacute;p bỏ qua.&nbsp;</p>\r\n\r\n<p>Dựa tr&ecirc;n sự am hiểu v&agrave; vận dụng c&aacute;c thuật to&aacute;n của Google một c&aacute;ch linh hoạt v&agrave; hiệu quả, MIG&nbsp;c&ograve;n tạo ra những mẫu content ph&ugrave; hợp, vừa đ&aacute;p ứng c&aacute;c điều kiện của Google, vừa nhắm đ&uacute;ng kh&aacute;ch h&agrave;ng mục ti&ecirc;u.</p>\r\n\r\n<p>V&agrave; đặc biệt, MIG&nbsp;đến với kh&aacute;ch h&agrave;ng bằng sự tận t&acirc;m, th&aacute;i độ tử tế v&agrave; tinh thần tr&aacute;ch nhiệm cao. Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng bạn để đưa ra những giải ph&aacute;p tối ưu bằng nghiệp vụ chuy&ecirc;n s&acirc;u v&agrave; kh&aacute;c biệt. MIG&nbsp;cam kết sẽ gi&uacute;p bạn x&acirc;y dựng một chiến lược content marketing đầy đột ph&aacute; nhằm gia tăng lượt truy cập v&agrave; cải thiện hiệu quả b&aacute;n h&agrave;ng tối đa.</p>\r\n\r\n<p>Để được tư vấn th&ecirc;m về c&aacute;ch x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh dược, bạn h&atilde;y li&ecirc;n hệ với MIG&nbsp;ngay h&ocirc;m nay. Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn 24/7.</p>\r\n\r\n<p style=\"margin:0cm 0cm 10pt\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:14.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"></span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin:0cm 0cm 10pt\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:14.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"></span></span></span></span></span></span></p>\r\n', '', '7-nguyen-tac-quan-trong-khi-lam-content-marketing-nganh-duoc', '/backend/web/uploads/images/Tin-tuc/H8.png', NULL, 1, 1, 87, 0, '', NULL, '7 nguyên tắc quan trọng khi làm content marketing ngành dược', 'Ngành dược ngày nay đã và đang tham gia vào hành trình tiếp thị số (digital marketing). Digital marketing mở ra cho các nhãn hàng dược những cơ hội tiếp cận đối tượng mục tiêu trên nhiều kênh, đo lường và tối ưu hoá được các chỉ số của từng chiến dịch.', 'Marketing ngành dược, Marketing ngành y tế, Digital Marketing, SEO ', '2024-05-24 18:17:13');
INSERT INTO `posts` (`id`, `parent`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `slug`, `image`, `icon`, `status`, `feature`, `views`, `number`, `tag`, `tag_compare`, `title`, `description`, `keyword`, `created_date`) VALUES
(103, 23, 'Samsung: Phát triển nội dung số, cung cấp cho Smart TV & Shub – Thư viện thông minh', '', '<p>MIG&nbsp; vinh dự được l&agrave; đơn vị cung cấp những nội dung số, ebook v&agrave; s&aacute;ch giấy cho thư viện th&ocirc;ng minh Shub của Samsung tại Thư viện Khoa Học Tổng hợp TPHCM.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i đ&atilde; cung cấp những nội dung chất lượng đ&aacute;p ứng cho nhu cầu đọc của thanh thiếu ni&ecirc;n v&agrave; trẻ em tại Thư viện th&ocirc;ng minh Shub &ndash; Dự &aacute;n cộng đồng được Samsung t&agrave;i trợ v&agrave; ph&aacute;t triển.</p>\r\n', '', '<p>MIG vinh dự được l&agrave; đơn vị cung cấp những nội dung số, ebook v&agrave; s&aacute;ch giấy cho thư viện th&ocirc;ng minh Shub của Samsung tại Thư viện Khoa Học Tổng hợp TPHCM.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i đ&atilde; cung cấp những nội dung chất lượng đ&aacute;p ứng cho nhu cầu đọc của thanh thiếu ni&ecirc;n v&agrave; trẻ em tại Thư viện th&ocirc;ng minh Shub &ndash; Dự &aacute;n cộng đồng được Samsung t&agrave;i trợ v&agrave; ph&aacute;t triển.</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>MỘT SỐ H&Igrave;NH ẢNH CỦA DỰ &Aacute;N:</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Samsung: Phát triển nội dung số, cung cấp cho Smart TV &amp; Shub – Thư viện thông minh\" src=\"https://file.hstatic.net/200000561203/file/shub-1_post-image_2bef91c608d74678bc3d495872825caa_1024x1024.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Samsung: Phát triển nội dung số, cung cấp cho Smart TV &amp; Shub – Thư viện thông minh\" src=\"https://file.hstatic.net/200000561203/file/shub-4_post-image_7469b553fe73448fa247073ca3a6beb8_1024x1024.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Samsung: Phát triển nội dung số, cung cấp cho Smart TV &amp; Shub – Thư viện thông minh\" src=\"https://file.hstatic.net/200000561203/file/shub-2_post-image_47d1eafc9fbf4504acc62760396f6a1b_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Samsung: Phát triển nội dung số, cung cấp cho Smart TV &amp; Shub – Thư viện thông minh\" src=\"https://file.hstatic.net/200000561203/file/shub-5_post-image_dae7162518914d2ba9ed75602eb41573_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Samsung: Phát triển nội dung số, cung cấp cho Smart TV &amp; Shub – Thư viện thông minh\" src=\"https://file.hstatic.net/200000561203/file/shub-stem_post-image_845316f8e4304994bcf9334e4f9fffec_grande.jpg\" /></p>\r\n\r\n<p style=\"margin: 0cm 0cm 10pt; text-align: justify;\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:14.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"></span></span></span></span></span></span></p>\r\n', '', 'samsung-phat-trien-noi-dung-so-cung-cap-cho-smart-tv-shub-thu-vien-thong-minh', '/backend/web/uploads/images/du-an/shub-banner_slider-1_d6afd06ec21447628915c05ae583271e_1024x1024.jpg', NULL, 1, 0, 83, 0, 'Tags : digital marketing,set up sự kiện,tổ chức hoạt động,nội dung số,thư viện thông minh', 'Tags-:-digital-marketing,set-up-su-kien,to-chuc-hoat-dong,noi-dung-so,thu-vien-thong-minh', 'Samsung: Phát triển nội dung số, cung cấp cho Smart TV & Shub – Thư viện thông minh', 'MIG  vinh dự được là đơn vị cung cấp những nội dung số, ebook và sách giấy cho thư viện thông minh Shub của Samsung tại Thư viện Khoa Học Tổng hợp TPHCM.', 'Digital Marketing, Event, Shub, Activation', '2024-05-22 10:07:31'),
(104, 23, 'Tã giấy Merries: Chương trình truyền thông tích hợp', '', '<p>MIG hợp t&aacute;c với thương hiệu t&atilde; giấy Merries thực hiện chương tr&igrave;nh truyền th&ocirc;ng t&iacute;ch hợp bao gồm chiến dịch truyền th&ocirc;ng tr&ecirc;n c&aacute;c k&ecirc;nh digital, ph&aacute;t triển cẩm nang qu&agrave; tặng &ldquo;Chăm con phong c&aacute;ch Nhật&rdquo; v&agrave; chuỗi lớp học thai gi&aacute;o nhằm gi&uacute;p cha mẹ c&oacute; th&ecirc;m kiến thức để chăm con tốt hơn với những kiến thức được kiểm chứng, c&oacute; bản quyền d&agrave;nh ri&ecirc;ng cho kh&aacute;ch h&agrave;ng của t&atilde; giấy Merries. Điều n&agrave;y mang đến &yacute; nghĩa san sẻ g&aacute;nh lo cho những người l&agrave;m mẹ lần đầu hay đơn giản l&agrave; những người mẹ muốn sự tốt nhất cho con m&igrave;nh.</p>\r\n', '', '<p>MIG hợp t&aacute;c với thương hiệu t&atilde; giấy Merries thực hiện chương tr&igrave;nh truyền th&ocirc;ng t&iacute;ch hợp bao gồm chiến dịch truyền th&ocirc;ng tr&ecirc;n c&aacute;c k&ecirc;nh digital, ph&aacute;t triển cẩm nang qu&agrave; tặng &ldquo;Chăm con phong c&aacute;ch Nhật&rdquo; v&agrave; chuỗi lớp học thai gi&aacute;o nhằm gi&uacute;p cha mẹ c&oacute; th&ecirc;m kiến thức để chăm con tốt hơn với những kiến thức được kiểm chứng, c&oacute; bản quyền d&agrave;nh ri&ecirc;ng cho kh&aacute;ch h&agrave;ng của t&atilde; giấy Merries. Điều n&agrave;y mang đến &yacute; nghĩa san sẻ g&aacute;nh lo cho những người l&agrave;m mẹ lần đầu hay đơn giản l&agrave; những người mẹ muốn sự tốt nhất cho con m&igrave;nh.</p>\r\n\r\n<p>Merries l&agrave; thương hiệu t&atilde; giấy cho trẻ em đến thứ Nhật Bản của tập đo&agrave;n KAO. Với c&aacute;c t&iacute;nh vượt trội c&ugrave;ng sự &ecirc;m &aacute;i tuyệt vời cho c&aacute;c b&eacute; y&ecirc;u, t&atilde; giấy Merries lu&ocirc;n được tin d&ugrave;ng bởi c&aacute;c b&agrave; mẹ Nhật Bản v&agrave; tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>MỘT SỐ H&Igrave;NH ẢNH CỦA DỰ &Aacute;N:</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>1. B&agrave;i đăng ch&iacute;nh thức cho Fanpage</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Tã giấy Merries: Chương trình truyền thông tích hợp\" src=\"https://file.hstatic.net/200000561203/file/4-07_8f9569ec74f2450d98be53047b0f359d.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Tã giấy Merries: Chương trình truyền thông tích hợp\" src=\"https://file.hstatic.net/200000561203/file/3_post-image_5988585bf2094bcb9a53ad8d8fb100a9_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Tã giấy Merries: Chương trình truyền thông tích hợp\" src=\"https://file.hstatic.net/200000561203/file/7-07_2c6d05ee81df43b88f35c71403457a48.jpg\" /></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>2.&nbsp;Cẩm nang &quot;Chăm Con Phong C&aacute;ch Nhật&quot; do ch&iacute;nh MIG/SRC s&aacute;ng tạo nội dung v&agrave; li&ecirc;n kết xuất bản</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Tã giấy Merries: Chương trình truyền thông tích hợp\" src=\"https://file.hstatic.net/200000561203/file/6_post-image_0e79e721ef804897b8a9d7da2df45586.jpg\" /></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>3.&nbsp;Event activation cho c&aacute;c b&agrave; mẹ</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Tã giấy Merries: Chương trình truyền thông tích hợp\" src=\"https://file.hstatic.net/200000561203/file/5_post-image_38228cfdcb3a474dab527f2f4a1b12bd.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'ta-giay-merries-chuong-trinh-truyen-thong-tich-hop', '/backend/web/uploads/images/du-an/1_slider-pd6kl5ojv0jdn2biyva1x1k8omynyx93iv2qktce80_da8a1626cb164392bc6f61b2fdbab536.jpg', NULL, 1, 0, 61, 0, 'Tags : content marketing,thiết kế ấn phẩm quảng cáo,Content cho Fanpage,Quản lý Fanpage,Cẩm nang cho mẹ và bé,dự án tã giấy Merries', 'Tags-:-content-marketing,thiet-ke-an-pham-quang-cao,Content-cho-Fanpage,Quan-ly-Fanpage,Cam-nang-cho-me-va-be,du-an-ta-giay-Merries', 'Tã giấy Merries: Chương trình truyền thông tích hợp', 'MIG hợp tác với thương hiệu tã giấy Merries thực hiện chương trình truyền thông tích hợp bao gồm chiến dịch truyền thông trên các kênh digital, phát triển cẩm nang quà tặng “Chăm con phong cách Nhật” và chuỗi lớp học thai giáo nhằm giúp cha mẹ có thêm kiến thức để chăm con tốt hơn.', 'Digital Marketing, Event, Activation, Marketing Campain ', '2024-05-22 10:04:37'),
(105, 24, 'Content Marketing – Sợi dây liên kết người dùng và thương hiệu bền chặt nhất', '', '<p>X&acirc;y dựng <b>chiến lược Content Marketing</b>&nbsp;tạo được &ldquo;điểm chạm&rdquo; đến tr&aacute;i tim kh&aacute;ch h&agrave;ng, l&agrave; một trong những b&iacute; quyết tạo dựng sức khỏe thương hiệu vững bền. V&agrave; c&ograve;n nhiều yếu tố kh&aacute;c nữa quyết định sự hiện diện của thương hiệu trong t&acirc;m tr&iacute; kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/H7.png\" style=\"width: 900px; height: 525px;\" /></p>\r\n\r\n<p>X&acirc;y dựng&nbsp;<a href=\"https://srcvn.com/pages/content-marketing\"><strong>chiến lược Content Marketing</strong></a>&nbsp;tạo được &ldquo;điểm chạm&rdquo; đến tr&aacute;i tim kh&aacute;ch h&agrave;ng, l&agrave; một trong những b&iacute; quyết tạo dựng sức khỏe thương hiệu vững bền. V&agrave; c&ograve;n nhiều yếu tố kh&aacute;c nữa quyết định sự hiện diện của thương hiệu trong t&acirc;m tr&iacute; kh&aacute;ch h&agrave;ng. C&ugrave;ng SRC t&igrave;m hiểu đ&oacute; l&agrave; những yếu tố n&agrave;o qua b&agrave;i viết dưới đ&acirc;y!</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Sức khỏe thương hiệu được tạo n&ecirc;n từ nhiều yếu tố</span></h2>\r\n\r\n<p>Nhiều chuy&ecirc;n gia về Marketing đồng &yacute; rằng: Một thương hiệu c&oacute; sức khỏe tốt c&oacute; nghĩa l&agrave; n&oacute; xuất hiện đầu ti&ecirc;n trong t&acirc;m tr&iacute; của kh&aacute;ch h&agrave;ng khi họ quyết định mua h&agrave;ng. V&iacute; dụ khi một ai đ&oacute; bước v&agrave;o cửa h&agrave;ng v&agrave; họ lấy ngay một lon coca-cola. C&oacute; nghĩa l&agrave; sức khỏe thương hiệu của thương hiệu Coca-cola rất ổn.</p>\r\n\r\n<p>V&igrave; vậy, mức độ xuất hiện của nh&atilde;n h&agrave;ng tr&ecirc;n thị trường cực kỳ quan trọng. Bởi v&igrave; người ti&ecirc;u d&ugrave;ng sẽ thường mua h&agrave;ng ngay tại chỗ tại c&aacute;c điểm b&aacute;n h&agrave;ng. C&aacute;c thương hiệu cần đảm bảo c&aacute;c chiến dịch marketing l&agrave;m sao để thương hiệu lu&ocirc;n xuất hiện trong t&acirc;m tr&iacute; của kh&aacute;ch h&agrave;ng, điều đ&oacute; g&oacute;p phần cải thiện sức khỏe của thương hiệu v&agrave; tăng doanh thu.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/branding_mig.png\" style=\"width: 952px; height: 675px;\" /></p>\r\n\r\n<p>Vấn đề lớn nhất của hầu hết c&aacute;c thương hiệu trong chiến dịch marketing của họ nằm ở sự li&ecirc;n kết chỉ mang t&iacute;nh tạm thời v&agrave; ngắn hạn giữa nh&atilde;n h&agrave;ng v&agrave; agency (đơn vị chạy c&aacute;c chiến dịch marketing cho nh&atilde;n h&agrave;ng). Điều đ&oacute; kh&ocirc;ng c&oacute; lợi cho việc phổ biến h&igrave;nh ảnh thương hiệu. Thay v&agrave;o đ&oacute;, nh&atilde;n h&agrave;ng v&agrave; agency n&ecirc;n trở th&agrave;nh đối t&aacute;c chiến lược để bất cứ một chiến dịch Content Marketing n&agrave;o cũng đều mang lại hiệu quả tốt nhất. Kết quả l&agrave; đem đến độ nhận diện thương hiệu cao hơn, cải thiện v&agrave; ph&aacute;t triển sức khỏe thương hiệu.</p>\r\n\r\n<p>Mặt kh&aacute;c, nh&atilde;n h&agrave;ng cũng cần c&oacute; tư duy đ&uacute;ng đắn rằng ch&iacute;nh sản phẩm mới tạo n&ecirc;n &ldquo;linh hồn&rdquo; của thương hiệu. Chẳng hạn như c&aacute;c h&atilde;ng điện thoại th&ocirc;ng minh đẳng cấp như iPhone, Samsung khiến người d&ugrave;ng cảm thấy tự h&agrave;o khi sở hữu ch&uacute;ng. Đến mức họ phải ra nước ngo&agrave;i xếp h&agrave;ng để trở th&agrave;nh người sớm nhất sở hữu một phi&ecirc;n bản di động mới ra mắt của c&aacute;c thương hiệu đ&igrave;nh đ&aacute;m n&agrave;y. Tương tự vậy, c&aacute;c nh&atilde;n h&agrave;ng thời trang xa xỉ, chẳng hạn như LV, Gucci,&hellip; đều khiến người ti&ecirc;u d&ugrave;ng &ldquo;m&aacute;t mặt&rdquo; khi sở hữu một m&oacute;n đồ từ họ.</p>\r\n\r\n<p>Nh&igrave;n v&agrave;o chiến lược x&acirc;y dựng sức khỏe thương hiệu của nh&atilde;n h&agrave;ng Samsung với 4 yếu tố cốt l&otilde;i b&ecirc;n dưới đ&acirc;y, bạn sẽ biết được c&aacute;c &ldquo;&ocirc;ng lớn&rdquo; đang tập trung cho c&aacute;i g&igrave; trong h&agrave;nh tr&igrave;nh l&agrave;m marketing của họ:</p>\r\n\r\n<p>1. Một kế hoạch&nbsp;<a href=\"https://srcvn.com/pages/content-marketing\"><strong>Content Marketing</strong></a>&nbsp;to&agrave;n diện, s&acirc;u rộng, bền vững.</p>\r\n\r\n<p>2. Đ&aacute;nh gi&aacute; lại những chiến dịch đ&atilde; từng thực hiện để tối ưu hiệu quả của mỗi chiến dịch.</p>\r\n\r\n<p>3. Quan trọng nhất l&agrave; trải nghiệm thực tế của kh&aacute;ch h&agrave;ng ngay tại điểm b&aacute;n h&agrave;ng. Đ&oacute; l&agrave; một &ldquo;điểm chạm&rdquo; (touch &ndash; point) để kh&aacute;ch h&agrave;ng gắn b&oacute; với thương hiệu.</p>\r\n\r\n<p>4. Dịch vụ sau b&aacute;n h&agrave;ng cũng g&oacute;p phần quyết định kh&aacute;ch h&agrave;ng c&oacute; mua sản phẩm kh&ocirc;ng v&agrave; c&oacute; gắn b&oacute; l&acirc;u d&agrave;i với thương hiệu hay kh&ocirc;ng.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Để Content Marketing &ldquo;chạm&rdquo; đến kh&aacute;ch h&agrave;ng</span></h2>\r\n\r\n<p>Từng c&oacute; c&acirc;u &ldquo;content is king&rdquo; v&agrave; n&oacute; ho&agrave;n to&agrave;n ph&aacute;t huy gi&aacute; trị của m&igrave;nh trong thời đại c&ocirc;ng nghệ 4.0 n&agrave;y. Khi m&agrave; c&aacute;c chiến dịch Content Marketing hiệu quả, nh&atilde;n h&agrave;ng c&oacute; thể tạo ra những content thu h&uacute;t &ndash; giữ ch&acirc;n kh&aacute;ch h&agrave;ng, tiếp đ&oacute; sẽ khiến kh&aacute;ch h&agrave;ng mua sản phẩm. Cao cấp hơn nữa l&agrave; tạo n&ecirc;n sự li&ecirc;n kết với kh&aacute;ch h&agrave;ng v&agrave; biến họ th&agrave;nh nh&oacute;m kh&aacute;ch h&agrave;ng trung th&agrave;nh với thương hiệu.</p>\r\n\r\n<p>Một nh&atilde;n h&agrave;ng cần dựa v&agrave;o c&aacute;c chiến dịch&nbsp;<a href=\"https://srcvn.com/pages/content-marketing\"><strong>Content Marketing</strong></a>&nbsp;để tạo n&ecirc;n sự BIẾT &ndash; HIỂU &ndash; TIN &ndash; Y&Ecirc;U &ndash; TRUNG TH&Agrave;NH của kh&aacute;ch h&agrave;ng đối với thương hiệu. Tất nhi&ecirc;n đ&oacute; l&agrave; cả một qu&aacute; tr&igrave;nh rất d&agrave;i v&agrave; gian khổ. Nh&atilde;n h&agrave;ng cần thực hiện qua từng chiến dịch li&ecirc;n tục theo kế hoạch đ&atilde; được đặt ra từ đầu (c&oacute; thể c&oacute; một số điều chỉnh trong qu&aacute; tr&igrave;nh cụ thể, nhưng vẫn đi theo lộ tr&igrave;nh đ&atilde; được đặt ra).</p>\r\n\r\n<p>Qu&aacute; tr&igrave;nh biến một vị kh&aacute;ch gh&eacute; thăm website hoặc Fanpage trở th&agrave;nh một vị kh&aacute;ch trung th&agrave;nh cũng như mối quan hệ giữa người với người. Cần c&oacute; rất nhiều yếu tố để tạo n&ecirc;n sự gắn b&oacute;, tin y&ecirc;u rồi mới đến trung th&agrave;nh. V&agrave; người l&agrave;m chiến lược nội dung sẽ căn cứ v&agrave;o rất nhiều yếu tố xung quanh sản phẩm v&agrave; người d&ugrave;ng. Đầu ti&ecirc;n, c&aacute;c marketers phải nắm r&otilde; insight kh&aacute;ch h&agrave;ng, c&agrave;ng chi tiết c&agrave;ng hiệu quả. Sau đ&oacute; bạn c&oacute; thể x&acirc;y dựng chiến dịch content ph&ugrave; hợp hơn.</p>\r\n\r\n<p>Tiếp theo bạn cần hiểu r&otilde; sản phẩm của m&igrave;nh l&agrave; g&igrave;, tất tần tật từ A đến Z về sản phẩm. V&agrave; h&atilde;y định ra ph&acirc;n kh&uacute;c của sản phẩm, bởi ở mỗi ph&acirc;n kh&uacute;c sẽ c&oacute; nh&oacute;m kh&aacute;ch h&agrave;ng tiềm năng kh&aacute;c nhau. Họ sẽ c&oacute; những suy nghĩ, h&agrave;nh vi, động cơ v&agrave; mục đ&iacute;ch mua h&agrave;ng ri&ecirc;ng biệt. Dựa tr&ecirc;n việc nắm r&otilde; đối tượng kh&aacute;ch h&agrave;ng mục ti&ecirc;u của bạn v&agrave; đặc điểm của sản phẩm sẽ gi&uacute;p bạn tung ra c&aacute;c chiến dịch Content Marketing thực sự hiệu quả.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/content-mig.png\" style=\"width: 900px; height: 506px;\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, Content Marketing cũng l&agrave; một &ldquo;con dao hai lưỡi&rdquo;. N&oacute; c&oacute; thể tạo n&ecirc;n l&agrave;n s&oacute;ng t&iacute;ch cực từ cộng đồng hoặc ngược lại. Do đ&oacute;, c&aacute;c nội dung được chọn lựa cần tr&aacute;nh tối đa việc dẫn dắt cảm x&uacute;c ti&ecirc;u cực về thương hiệu của người d&ugrave;ng để kh&ocirc;ng g&acirc;y n&ecirc;n sự &ldquo;tổn thương&rdquo; cho h&igrave;nh ảnh thương hiệu.</p>\r\n\r\n<p><a href=\"https://srcvn.com/pages/content-marketing\"><strong>Content Marketing</strong></a>&nbsp;l&agrave; một nhiệm vụ chưa bao giờ dễ d&agrave;ng của bất kỳ một nh&atilde;n h&agrave;ng n&agrave;o. Việc dẫn dắt kh&aacute;ch h&agrave;ng từ chưa biết g&igrave; đến biết về thương hiệu, biết rồi đến hiểu, hiểu rồi y&ecirc;u thương lựa chọn v&agrave; sau c&ugrave;ng l&agrave; gắn b&oacute; l&acirc;u d&agrave;i với thương hiệu. Đ&oacute; kh&ocirc;ng hề l&agrave; chuyện đơn giản. Quảng c&aacute;o &ldquo;chạm&rdquo; đến tr&aacute;i tim của kh&aacute;ch h&agrave;ng đ&atilde; kh&oacute;, để từ &ldquo;cảm động&rdquo; đến mua h&agrave;ng lại c&agrave;ng kh&oacute; hơn gấp bội lần.</p>\r\n\r\n<p>Tất cả những chia sẻ của MIG b&ecirc;n tr&ecirc;n tưởng chừng l&agrave; d&agrave;nh cho những người chuy&ecirc;n l&agrave;m marketers. Nhưng kh&ocirc;ng, mỗi một thương hiệu khi nắm bắt r&otilde; r&agrave;ng c&ocirc;ng việc của một người l&agrave;m nội dung tiếp thị l&agrave; g&igrave;. Cũng như xu hướng Content Marketing hiện tại đang đi đ&acirc;u về đ&acirc;u, c&aacute;i g&igrave; l&agrave; quan trọng, c&aacute;i g&igrave; n&ecirc;n bỏ qua. Doanh nghiệp sẽ sớm t&igrave;m được những đơn vị agency b&agrave;i bản, uy t&iacute;n v&agrave; h&agrave;i l&ograve;ng.</p>\r\n\r\n<p>Nếu bạn chưa t&igrave;m được một địa chỉ n&agrave;o đủ khả năng đảm đương nhiệm vụ kh&oacute; nhằn đ&oacute;. H&atilde;y để SRC gi&uacute;p nh&atilde;n h&agrave;ng, thương hiệu của bạn tỏa s&aacute;ng bằng những c&acirc;u chuyện xứng tầm.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Đội ngũ content MIG&nbsp;&ndash; Chuy&ecirc;n gia s&aacute;ng tạo content chuy&ecirc;n nghiệp</span></h2>\r\n\r\n<p>Với nhiều năm hoạt động trong lĩnh vực Digital Marketing tại TP.HCM, MIG tự h&agrave;o c&oacute; một đội ngũ chuy&ecirc;n gia gi&agrave;u kinh nghiệm trong việc x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh dược. B&ecirc;n cạnh đ&oacute;, sự nhạy b&eacute;n v&agrave; năng lực s&aacute;ng tạo l&agrave; một trong những yếu tố trọng t&acirc;m tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng cho c&aacute;c dự &aacute;n của MIG.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n tự đề ra cho m&igrave;nh những nguy&ecirc;n tắc v&agrave; quy tr&igrave;nh cụ thể. Trong đ&oacute;, nghi&ecirc;n cứu sản phẩm &ndash; dịch vụ của kh&aacute;ch h&agrave;ng, nghi&ecirc;n cứu thị trường, nghi&ecirc;n cứu v&agrave; ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng mục ti&ecirc;u l&agrave; một trong những quy tr&igrave;nh cực kỳ quan trọng kh&ocirc;ng được ph&eacute;p bỏ qua.&nbsp;</p>\r\n\r\n<p>Dựa tr&ecirc;n sự am hiểu v&agrave; vận dụng c&aacute;c thuật to&aacute;n của Google một c&aacute;ch linh hoạt v&agrave; hiệu quả, MIG&nbsp;c&ograve;n tạo ra những mẫu content ph&ugrave; hợp, vừa đ&aacute;p ứng c&aacute;c điều kiện của Google, vừa nhắm đ&uacute;ng kh&aacute;ch h&agrave;ng mục ti&ecirc;u.</p>\r\n\r\n<p>V&agrave; đặc biệt, MIG&nbsp;đến với kh&aacute;ch h&agrave;ng bằng sự tận t&acirc;m, th&aacute;i độ tử tế v&agrave; tinh thần tr&aacute;ch nhiệm cao. Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng bạn để đưa ra những giải ph&aacute;p tối ưu bằng nghiệp vụ chuy&ecirc;n s&acirc;u v&agrave; kh&aacute;c biệt. MIG&nbsp;cam kết sẽ gi&uacute;p bạn x&acirc;y dựng một chiến lược content marketing đầy đột ph&aacute; nhằm gia tăng lượt truy cập v&agrave; cải thiện hiệu quả b&aacute;n h&agrave;ng tối đa.</p>\r\n\r\n<p>Để được tư vấn th&ecirc;m về c&aacute;ch x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh dược, bạn h&atilde;y li&ecirc;n hệ với MIG ngay h&ocirc;m nay. Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn 24/7.</p>\r\n', '', 'content-marketing-soi-day-lien-ket-nguoi-dung-va-thuong-hieu-ben-chat-nhat', '/backend/web/uploads/images/Tin-tuc/H7.png', NULL, 1, 1, 72, 0, '', NULL, 'Content Marketing – Sợi dây liên kết người dùng và thương hiệu bền chặt nhất', 'Xây dựng chiến lược Content Marketing tạo được “điểm chạm” đến trái tim khách hàng, là một trong những bí quyết tạo dựng sức khỏe thương hiệu vững bền. Và còn nhiều yếu tố khác nữa quyết định sự hiện diện của thương hiệu trong tâm trí khách hàng.', 'Content Marketing, SEO, Digital Marketing, Branding, ', '2024-05-28 11:13:05'),
(106, 24, 'Cách chinh phục các “bà mẹ bỉm sữa” trong thời marketing 4.0', '', '<p>Cuộc c&aacute;ch mạng c&ocirc;ng nghệ 4.0 đ&atilde; thay đổi ho&agrave;n to&agrave;n th&oacute;i quen mua sắm của người d&ugrave;ng. Đ&acirc;y được đ&aacute;nh gi&aacute; l&agrave; thời điểm v&agrave;ng để doanh nghiệp đổi mới trong phương ph&aacute;p tiếp cận v&agrave; giới thiệu sản phẩm đến kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Trong rất nhiều ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng của thời đại 4.0 th&igrave; &ldquo;mẹ bỉm sữa&rdquo; được đ&aacute;nh gi&aacute; l&agrave; nh&oacute;m đối tượng c&oacute; xu hướng ti&ecirc;u d&ugrave;ng v&agrave; sử dụng c&aacute;c phương tiện truyền th&ocirc;ng th&ocirc;ng một c&aacute;ch rất đặc biệt. Đ&acirc;y cũng l&agrave; nh&oacute;m đối tượng c&oacute; xu hướng mua h&agrave;ng trực tuyến rất cao. Tuy nhi&ecirc;n, phải l&agrave;m thế n&agrave;o để chinh phục &ldquo;c&aacute;c b&agrave; mẹ bỉm sữa&rdquo; trong thời marketing 4.0? Mời c&aacute;c bạn c&ugrave;ng tham khảo b&agrave;i viết dưới đ&acirc;y của MIG&nbsp;nh&eacute;!</p>\r\n', '', '<p style=\"margin: 0cm 0cm 10pt; text-align: justify;\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:14.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/H6.png\" style=\"width: 900px; height: 526px;\" /></p>\r\n\r\n<p>Cuộc c&aacute;ch mạng c&ocirc;ng nghệ 4.0 đ&atilde; thay đổi ho&agrave;n to&agrave;n th&oacute;i quen mua sắm của người d&ugrave;ng. Đ&acirc;y được đ&aacute;nh gi&aacute; l&agrave; thời điểm v&agrave;ng để doanh nghiệp đổi mới trong phương ph&aacute;p tiếp cận v&agrave; giới thiệu sản phẩm đến kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Trong rất nhiều ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng của thời đại 4.0 th&igrave; &ldquo;mẹ bỉm sữa&rdquo; được đ&aacute;nh gi&aacute; l&agrave; nh&oacute;m đối tượng c&oacute; xu hướng ti&ecirc;u d&ugrave;ng v&agrave; sử dụng c&aacute;c phương tiện truyền th&ocirc;ng th&ocirc;ng một c&aacute;ch rất đặc biệt. Đ&acirc;y cũng l&agrave; nh&oacute;m đối tượng c&oacute; xu hướng mua h&agrave;ng trực tuyến rất cao. Tuy nhi&ecirc;n, phải l&agrave;m thế n&agrave;o để chinh phục &ldquo;c&aacute;c b&agrave; mẹ bỉm sữa&rdquo; trong thời marketing 4.0? Mời c&aacute;c bạn c&ugrave;ng tham khảo b&agrave;i viết dưới đ&acirc;y của MIG&nbsp;nh&eacute;!</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">L&agrave;m sao để chinh phục c&aacute;c &ldquo;b&agrave; mẹ bỉm sữa&rdquo; trong thời marketing 4.0?</span></h2>\r\n\r\n<p>Theo c&aacute;c chuy&ecirc;n gia marketing đến từ Diandra Silk c&oacute; khoảng 5 c&aacute;ch để c&aacute;c doanh nghiệp thu h&uacute;t được nh&oacute;m kh&aacute;ch h&agrave;ng &ldquo;b&agrave; mẹ bỉm sữa&rdquo; quan trọng n&agrave;y:</p>\r\n\r\n<h3><span style=\"color:#0000cc;\"><strong>C&aacute;ch 1: X&acirc;y dựng sự kết nối c&oacute; &yacute; nghĩa th&ocirc;ng qua sản phẩm</strong></span></h3>\r\n\r\n<p>Bạn c&oacute; biết c&aacute;ch một b&agrave; mẹ bỉm sữa đi mua sắm như thế n&agrave;o hay kh&ocirc;ng? Họ lu&ocirc;n c&oacute; sẵn một danh s&aacute;ch cần mua v&agrave; đến đ&uacute;ng cửa h&agrave;ng họ cần. Bởi v&igrave; họ chẳng c&oacute; nhiều thời gian cho việc lượn lờ mua sắm ở c&aacute;c si&ecirc;u thị hay kể cả mua sắm online. Vậy th&igrave;, doanh nghiệp cần l&agrave;m g&igrave; đ&oacute; để thu h&uacute;t sự ch&uacute; &yacute; của mẹ bỉm v&agrave; bắt họ dừng lại l&acirc;u hơn cho sản phẩm của bạn.</p>\r\n\r\n<p>Bạn c&oacute; thể tạo ra những gi&aacute; trị nổi bật của sản phẩm v&agrave; n&oacute; ph&ugrave; hợp với quan niệm gi&aacute; trị của một người mẹ c&oacute; con nhỏ. Chẳng hạn như phụ nữ họ thường quan t&acirc;m đến gi&aacute; trị đạo đức hoặc t&iacute;nh bền vững của sản phẩm.</p>\r\n\r\n<p>Nếu bạn tạo ra c&aacute;c sản phẩm bền vững nhằm bảo vệ m&ocirc;i trường v&agrave; n&oacute; cũng c&oacute; gi&aacute; cả phải chăng, tất nhi&ecirc;n chất lượng kh&ocirc;ng được giảm s&uacute;t. Nhiều khả năng mẹ bỉm sẽ mua n&oacute; thay v&igrave; mua thứ b&igrave;nh thường họ vẫn chọn cho con m&igrave;nh.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/smiling-woman-with-daughter-hands.jpg\" style=\"width: 900px; height: 600px;\" /></p>\r\n\r\n<h3><span style=\"color:#0000cc;\"><strong>C&aacute;ch 2: Hợp t&aacute;c với c&aacute;c b&agrave; mẹ bỉm sữa nổi tiếng</strong></span></h3>\r\n\r\n<p>C&aacute;c b&agrave; mẹ bỉm sữa c&oacute; xu hướng tin tưởng v&agrave;o kinh nghiệm của những người c&ugrave;ng thời đại với m&igrave;nh. Do đ&oacute;, họ d&agrave;nh nhiều thời gian để lướt web, mạng x&atilde; hội, t&igrave;m đọc v&agrave; xem video hướng dẫn về c&aacute;ch nu&ocirc;i dạy, chăm s&oacute;c con. Họ tỏ ra rất y&ecirc;u th&iacute;ch v&agrave; đ&aacute;nh gi&aacute; t&iacute;ch cực về c&aacute;c phương tiện truyền th&ocirc;ng c&oacute; nội dung về mẹ bỉm sữa. Đặc biệt l&agrave; những hướng dẫn, review sản phẩm của những người mẹ nổi tiếng.</p>\r\n\r\n<p>Vậy n&ecirc;n, doanh nghiệp c&oacute; thể tận dụng ngay cơ hội n&agrave;y để kết nối với những người mẹ nổi tiếng (influencers, tương tự như một ng&ocirc;i sao TikTok, một ca sĩ,&hellip;). H&atilde;y giới thiệu gi&aacute; trị của sản phẩm của bạn th&ocirc;ng qua những người c&oacute; tầm ảnh hưởng. V&agrave; thương hiệu của bạn sẽ được tiếp cận với một lượng fan kh&ocirc;ng hề nhỏ của những influencers n&agrave;y.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\"><strong>C&aacute;ch 3: Tối ưu h&oacute;a những từ kh&oacute;a d&agrave;i</strong></span></h3>\r\n\r\n<p>Một thống k&ecirc; tại Mỹ v&agrave;o năm 2020 cho biết, khoảng 33% nữ giới v&agrave; 40% nam giới tại đất nước n&agrave;y trong độ tuổi bỉm sữa sẵn s&agrave;ng chi tiền để mua mọi thứ tr&ecirc;n internet. C&ograve;n tại Việt Nam, b&aacute;o c&aacute;o của Facebook cho biết, giới trẻ (bao gồm cả gen Z v&agrave; gen Y, khoảng 45 triệu người, chiếm gần nửa d&acirc;n số cả nước) d&agrave;nh hẳn 5 giờ đồng hồ để lướt web. Cuộc sống của những &ocirc;ng bố b&agrave; mẹ bỉm sữa trẻ cũng gần như d&aacute;n chặt với thiết bị điện tử.</p>\r\n\r\n<p>C&oacute; thể n&oacute;i những người mẹ bỉm sữa rất lanh lẹ, s&agrave;nh sỏi trong việc t&igrave;m mọi thứ li&ecirc;n quan đến con nhỏ của m&igrave;nh tr&ecirc;n internet. Họ c&oacute; thể t&igrave;m thấy tất cả những g&igrave; họ muốn tr&ecirc;n tất cả phương tiện truyền th&ocirc;ng m&agrave; họ c&oacute; thể truy cập. V&igrave; vậy, điều m&agrave; một doanh nghiệp n&ecirc;n l&agrave;m l&agrave; cung cấp đầy đủ, ch&iacute;nh x&aacute;c, chi tiết c&aacute;c nội dung hữu &iacute;ch. SEO &ndash; Tối ưu h&oacute;a c&ocirc;ng cụ t&igrave;m kiếm với những từ kh&oacute;a d&agrave;i, vừa &iacute;t tốn chi ph&iacute; hơn lại giảm thiểu độ cạnh tranh. V&agrave; tất nhi&ecirc;n n&oacute; sẽ nhanh xuất hiện trước những bố mẹ bỉm sữa trẻ hiện nay &ndash; Những kh&aacute;ch h&agrave;ng mục ti&ecirc;u v&ocirc; c&ugrave;ng tiềm năng của bất kỳ thương hiệu n&agrave;o.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\"><strong>C&aacute;ch 4: Đặt t&iacute;nh hữu &iacute;ch l&ecirc;n vị tr&iacute; số 1</strong></span></h3>\r\n\r\n<p>Ở thời đại n&agrave;y 4.0, c&aacute;c &ocirc;ng bố, b&agrave; mẹ bỉm sữa bận rộn hơn bao giờ hết, khối lượng c&ocirc;ng việc l&agrave; rất nhiều mỗi ng&agrave;y. Vậy n&ecirc;n nội dung tiếp thị v&agrave; sản phẩm n&agrave;o mang lại sự hỗ trợ cho họ, gi&uacute;p cuộc sống của họ dễ d&agrave;ng hơn, tiết kiệm thời gian v&agrave; c&ocirc;ng sức th&igrave; họ sẵn s&agrave;ng đ&oacute;n nhận.</p>\r\n\r\n<p>Mẹ bỉm sữa lướt web rất c&oacute; mục đ&iacute;ch, họ c&oacute; mục ti&ecirc;u cụ thể để t&igrave;m kiếm c&aacute;i g&igrave; đ&oacute;. V&igrave; vậy, doanh nghiệp của bạn h&atilde;y nhanh ch&oacute;ng nắm bắt insight kh&aacute;ch h&agrave;ng quan trọng n&agrave;y. V&agrave; bắt đầu s&aacute;ng tạo ra những nội dung tiếp thị hữu &iacute;ch để l&ocirc;i k&eacute;o một lượng kh&aacute;ch h&agrave;ng mục ti&ecirc;u to lớn từ những b&agrave; mẹ bỉm sữa. Việc gi&uacute;p đỡ v&ocirc; tư v&agrave; kh&ocirc;ng cần b&aacute;n sản phẩm ngay tức khắc sẽ dễ d&agrave;ng tiếp nhận hơn so với quảng c&aacute;o r&otilde; rệt như trước đ&acirc;y.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\"><strong>C&aacute;ch 5: Đừng qu&ecirc;n những &ldquo;&ocirc;ng bố bỉm sữa&rdquo;</strong></span></h3>\r\n\r\n<p>&ldquo;B&agrave; mẹ bỉm sữa&rdquo; ng&agrave;y nay thường kh&ocirc;ng thể thiếu sự đồng h&agrave;nh của c&aacute;c &ldquo;&ocirc;ng bố bỉm sữa&rdquo;. Thậm ch&iacute; trong nhiều gia đ&igrave;nh, bố mẹ thay đổi vai tr&ograve; cho nhau, ranh giới giữa họ đ&atilde; dần bị x&oacute;a nh&ograve;a.</p>\r\n\r\n<p>Một b&aacute;o c&aacute;o tr&ecirc;n Business Insider (2021) cho thấy bố mẹ thế hệ Y chăm s&oacute;c con c&aacute;i rất kh&aacute;c. Đặc biệt, người bố gần như đồng h&agrave;nh &ldquo;mọi l&uacute;c, mọi nơi&rdquo; với con c&aacute;i của họ.Họ cũng c&oacute; xu hướng lướt web để t&igrave;m kiếm th&ocirc;ng tin về chăm s&oacute;c &amp; nu&ocirc;i dạy con nhỏ giống hệt như c&aacute;c b&agrave; mẹ bỉm sữa.</p>\r\n\r\n<p>C&aacute;c &ocirc;ng bố bỉm sữa sẽ th&iacute;ch th&uacute; v&agrave; c&oacute; nhiều t&aacute;c động mua sắm đối với những quảng c&aacute;o đ&aacute;nh gi&aacute; cao về vai tr&ograve; của họ trong cuộc sống gia đ&igrave;nh.</p>\r\n\r\n<p>Một doanh nghiệp n&ecirc;n ch&uacute; trọng điểm n&agrave;y để c&oacute; những chiến dịch content marketing ph&ugrave; hợp cho cả bố v&agrave; mẹ bỉm sữa. Từ đ&oacute; đ&aacute;nh mạnh v&agrave;o cảm x&uacute;c của nh&oacute;m kh&aacute;ch h&agrave;ng tiềm năng n&agrave;y.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/bobimsua-marketing.jpg\" style=\"width: 826px; height: 551px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Đội ngũ content MIG&nbsp;- Chuy&ecirc;n gia x&acirc;y dựng chiến lược content chinh phục &ldquo;mẹ bỉm sữa&rdquo; thời đại 4.0</span></h2>\r\n\r\n<p>Với nhiều năm hoạt động trong lĩnh vực Digital Marketing tại TP.HCM, MIG&nbsp;tự h&agrave;o c&oacute; một đội ngũ chuy&ecirc;n gia gi&agrave;u kinh nghiệm trong việc x&acirc;y dựng chiến lược content marketing cho đối tượng kh&aacute;ch h&agrave;ng &ldquo;mẹ bỉm sữa&rdquo;. B&ecirc;n cạnh đ&oacute;, sự nhạy b&eacute;n v&agrave; năng lực s&aacute;ng tạo l&agrave; một trong những yếu tố trọng t&acirc;m tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng cho c&aacute;c dự &aacute;n của MIG.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n tự đề ra cho m&igrave;nh những nguy&ecirc;n tắc v&agrave; quy tr&igrave;nh cụ thể. Trong đ&oacute;, nghi&ecirc;n cứu sản phẩm &ndash; dịch vụ của kh&aacute;ch h&agrave;ng, nghi&ecirc;n cứu thị trường, nghi&ecirc;n cứu v&agrave; ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng mục ti&ecirc;u l&agrave; một trong những quy tr&igrave;nh cực kỳ quan trọng kh&ocirc;ng thể bỏ qua.</p>\r\n\r\n<p>Dựa tr&ecirc;n sự am hiểu v&agrave; vận dụng thuần thục c&aacute;c thuật to&aacute;n của Google, MIG&nbsp;c&ograve;n tạo ra những mẫu content ph&ugrave; hợp, vừa đ&aacute;p ứng c&aacute;c điều kiện của Google, vừa nhắm đ&uacute;ng kh&aacute;ch h&agrave;ng mục ti&ecirc;u.</p>\r\n\r\n<p>V&agrave; đặc biệt, MIG&nbsp;đến với kh&aacute;ch h&agrave;ng bằng sự tận t&acirc;m, th&aacute;i độ tử tế v&agrave; tinh thần tr&aacute;ch nhiệm cao. Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng bạn để đưa ra những giải ph&aacute;p tối ưu bằng nghiệp vụ chuy&ecirc;n s&acirc;u v&agrave; kh&aacute;c biệt. MIG&nbsp;cam kết sẽ gi&uacute;p bạn x&acirc;y dựng một chiến lược content marketing đầy đột ph&aacute; nhằm gia tăng lượt truy cập v&agrave; cải thiện hiệu quả b&aacute;n h&agrave;ng tối đa.</p>\r\n\r\n<p>Để được tư vấn th&ecirc;m về c&aacute;ch x&acirc;y dựng chiến lược content marketing cho nh&oacute;m đối tượng kh&aacute;ch h&agrave;ng &ldquo;mẹ bỉm sữa&rdquo;, bạn h&atilde;y li&ecirc;n hệ với MIG&nbsp;ngay h&ocirc;m nay. Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn 24/7.</p>\r\n\r\n<p style=\"margin: 0cm 0cm 10pt; text-align: justify;\">&nbsp;</p>\r\n\r\n<h3><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:14.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"></span></span></span></span></span></span></h3>\r\n', '', 'cach-chinh-phuc-cac-ba-me-bim-sua-trong-thoi-marketing-4-0', '/backend/web/uploads/images/Tin-tuc/H6.png', NULL, 1, 1, 54, 0, '', NULL, 'Cách chinh phục các “bà mẹ bỉm sữa” trong thời marketing 4.0', 'Trong rất nhiều phân khúc khách hàng của thời đại 4.0 thì “mẹ bỉm sữa” được đánh giá là nhóm đối tượng có xu hướng tiêu dùng và sử dụng các phương tiện truyền thông thông một cách rất đặc biệt.', 'Content marketing, SEO, Content mẹ và bé, marketing 4.0, chat gpt', '2024-05-24 18:16:04'),
(127, 23, '3M LITTMAN - Chiến dịch Digital hướng đến sinh viên y khoa', '', '<p>Với mục đ&iacute;ch hướng đến c&aacute;c sinh vi&ecirc;n y khoa tiếp cận v&agrave; nhận thức về sản phẩm ống nghe cao cấp thương hiệu Littmann, MIG&nbsp;đ&atilde; chạy một chiến dịch quảng c&aacute;o v&agrave; seeding tr&ecirc;n website v&agrave; fanpage ch&iacute;nh thức của trường Đại học Y TPHCM v&agrave; trường Y Khoa Phạm Ngọc Thạch.</p>\r\n\r\n<p>Chiến dịch n&agrave;y đồng thời li&ecirc;n kết sản phẩm tới trang mua h&agrave;ng ch&iacute;nh thức tr&ecirc;n Tiki của thương hiệu Littmann.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '<p>Với mục đ&iacute;ch hướng đến c&aacute;c sinh vi&ecirc;n y khoa tiếp cận v&agrave; nhận thức về sản phẩm ống nghe cao cấp thương hiệu Littmann, MIG&nbsp;đ&atilde; chạy một chiến dịch quảng c&aacute;o v&agrave; seeding tr&ecirc;n website v&agrave; fanpage ch&iacute;nh thức của trường Đại học Y TPHCM v&agrave; trường Y Khoa Phạm Ngọc Thạch.</p>\r\n\r\n<p>Chiến dịch n&agrave;y đồng thời li&ecirc;n kết sản phẩm tới trang mua h&agrave;ng ch&iacute;nh thức tr&ecirc;n Tiki của thương hiệu Littmann.</p>\r\n\r\n<p><span style=\"color:#000099;\"><strong>MỘT SỐ H&Igrave;NH ẢNH CỦA DỰ &Aacute;N:</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/1fb-post-768x768_fca8af0a294e44628faa3a274a2fb0cf_grande.png\" style=\"width: 600px; height: 600px;\" /></strong></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/2fb-post-2-768x768_a2fd482f9451409f81836a99ac6ec8a7_grande.png\" style=\"width: 600px; height: 600px;\" /></strong></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/4littmann-445x1024_8953c7cb3218415baeb9c837949621e4_grande(1).png\" style=\"width: 261px; height: 600px;\" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '3m-littman-chien-dich-digital-huong-den-sinh-vien-y-khoa', '/backend/web/uploads/images/du-an/bia-3m.jpg', NULL, 1, 1, 43, 0, 'Tags : digital marketing,content marketing,quảng cáo facebook,quảng cáo google,phát triển website,phát triển fanpage', 'Tags-:-digital-marketing,content-marketing,quang-cao-facebook,quang-cao-google,phat-trien-website,phat-trien-fanpage', '3M Littmann Chiến dịch digital hướng đến sinh viên y khoa', 'Với mục đích hướng đến các sinh viên y khoa tiếp cận và nhận thức về sản phẩm ống nghe cao cấp thương hiệu Littmann, MIG đã chạy một chiến dịch quảng cáo và seeding trên website và fanpage chính thức của trường Đại học Y TPHCM và trường Y Khoa Phạm Ngọc Thạch.', 'Digital Marketing, Sedding Fanpage', '2024-05-30 11:05:03'),
(129, 23, 'Shell Vietnam: Quản lý hoạt động Rewards', '', '<p>MIG/SRC l&agrave; đơn vị độc quyền quản l&yacute; chương tr&igrave;nh trao thưởng v&agrave; qu&agrave; tặng của Shell Việt Nam, bao gồm:</p>\r\n\r\n<ul>\r\n	<li>Ph&aacute;t triển v&agrave; bảo tr&igrave; hệ thống CRM</li>\r\n	<li>Vận h&agrave;nh việc trao thưởng bằng c&aacute;c lệnh đổi điểm tr&ecirc;n ứng dụng SHARE</li>\r\n	<li>Tư vấn danh mục qu&agrave; tặng SHARE &ndash; Shell Advantage Rewards, c&aacute;c chương tr&igrave;nh ưu đ&atilde;i, khuyến m&atilde;i của Shell Việt Nam</li>\r\n	<li>Quản l&yacute; qu&agrave; tặng</li>\r\n</ul>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"Shell Vietnam: Quản lý hoạt động Rewards\" src=\"https://file.hstatic.net/200000561203/file/280166382_837032867689346_3130390928423953107_n_c666da569d3e438c9fc0cadbadd808d2_1024x1024.png\" /></p>\r\n\r\n<p>MIG/SRC l&agrave; đơn vị độc quyền quản l&yacute; chương tr&igrave;nh trao thưởng v&agrave; qu&agrave; tặng của Shell Việt Nam, bao gồm:</p>\r\n\r\n<ul>\r\n	<li>Ph&aacute;t triển v&agrave; bảo tr&igrave; hệ thống CRM</li>\r\n	<li>Vận h&agrave;nh việc trao thưởng bằng c&aacute;c lệnh đổi điểm tr&ecirc;n ứng dụng SHARE</li>\r\n	<li>Tư vấn danh mục qu&agrave; tặng SHARE &ndash; Shell Advantage Rewards, c&aacute;c chương tr&igrave;nh ưu đ&atilde;i, khuyến m&atilde;i của Shell Việt Nam</li>\r\n	<li>Quản l&yacute; qu&agrave; tặng</li>\r\n</ul>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Một số h&igrave;nh ảnh về dự &aacute;n:&nbsp;</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/du-an/nd11-6-03-1024x606_12fe43e304614a58999f469aa22b615e_grande.jpg\" style=\"width: 600px; height: 355px;\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/du-an/picture11_039402e34c4d4f109949d5e602b95d5c_grande.png\" style=\"width: 600px; height: 311px;\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/du-an/picture13_73b6257f69c64a09be3b61c9c0349773_grande.png\" style=\"width: 595px; height: 431px;\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/du-an/gift_cho_nha_phan_phoi_7595621f841f4f7a8a725f82f0c9e8af_grande.png\" style=\"width: 600px; height: 261px;\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/du-an/gife_8-3_181b0f84928c400088d4fdd64a9edb3e_grande.png\" style=\"width: 600px; height: 275px;\" /></p>\r\n', '', 'shell-vietnam-quan-ly-hoat-dong-rewards', '/backend/web/uploads/images/du-an/picture13_73b6257f69c64a09be3b61c9c0349773_grande.png', NULL, 1, 1, 47, 0, '', NULL, 'Shell Vietnam: Quản lý hoạt động Rewards', 'MIG/SRC là đơn vị độc quyền quản lý chương trình trao thưởng và quà tặng của Shell Việt Nam, bao gồm:Phát triển và bảo trì hệ thống CRM; Vận hành việc trao thưởng bằng các lệnh đổi điểm trên ứng dụng SHARE. Tư vấn danh mục quà tặng SHARE – Shell Advantage Rewards, các chương trình ưu đãi, khuyến mãi', 'Rewards, CRM, Marketing Campain, App ', '2024-05-22 10:00:15'),
(130, 23, 'Tã giấy Huggies: Sự kiện Activation Bước nhảy mông xinh', '', '<p>MIG tiến h&agrave;nh Set up v&agrave; chạy Event Activation với chủ đề &ldquo;Bước nhảy m&ocirc;ng xinh&rdquo; cho c&aacute;c b&eacute; tại trung t&acirc;m thương mại. Đ&acirc;y l&agrave; chương tr&igrave;nh event với chủ đề chung được thực hiện nhất qu&aacute;n với thương hiệu Huggies triển khai tr&ecirc;n c&aacute;c tỉnh th&agrave;nh lớn như TPHCM, H&agrave; Nội, Hải Ph&ograve;ng v&agrave; Đ&agrave; Nẵng.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"Tã giấy Huggies: Sự kiện Activation Bước nhảy mông xinh\" src=\"https://file.hstatic.net/200000561203/file/du_an_buoc_nhay_mong_xinh_0c4bdfca710549ab98fa3ad50062e791_1024x1024.png\" /></p>\r\n\r\n<p>MIG tiến h&agrave;nh set up v&agrave; chạy event activation với chủ đề &ldquo;Bước nhảy m&ocirc;ng xinh&rdquo; cho c&aacute;c b&eacute; tại trung t&acirc;m thương mại. Đ&acirc;y l&agrave; chương tr&igrave;nh event với chủ đề chung được thực hiện nhất qu&aacute;n với thương hiệu Huggies triển khai tr&ecirc;n c&aacute;c tỉnh th&agrave;nh lớn như TPHCM, H&agrave; Nội, Hải Ph&ograve;ng v&agrave; Đ&agrave; Nẵng.</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>MỘT SỐ H&Igrave;NH ẢNH TẠI DỰ &Aacute;N:</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/du-an/nd10-3-1024x549_3d206828a09b43b482d45b7c0bcbe67c_1024x1024.jpg\" style=\"width: 1024px; height: 549px;\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/du-an/nd10-1-784x1024_38103c1ffd9b4f16bb0b7a5e52771919_1024x1024.jpg\" style=\"width: 784px; height: 1024px;\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/1024_d8c7a27097c34269981303e23fcb667b_1024x1024.png\" style=\"width: 886px; height: 444px;\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'ta-giay-huggies-su-kien-activation-buoc-nhay-mong-xinh', '/backend/web/uploads/images/du-an/du_an_buoc_nhay_mong_xinh_0c4bdfca710549ab98fa3ad50062e791_1024x1024.png', NULL, 1, 1, 47, 0, 'Tags : dự án tã giấy Huggies,tổ chức sự kiện,bước nhảy mông xinh', 'Tags-:-du-an-ta-giay-Huggies,to-chuc-su-kien,buoc-nhay-mong-xinh', 'Tã giấy Huggies: Sự kiện Activation Bước nhảy mông xinh', 'MIG tiến hành Set up và chạy Event Activation với chủ đề “Bước nhảy mông xinh” cho các bé tại trung tâm thương mại. Đây là chương trình event với chủ đề chung được thực hiện nhất quán với thương hiệu Huggies triển khai trên các tỉnh thành lớn như TPHCM, Hà Nội, Hải Phòng và Đà Nẵng.', 'Event, Activation ', '2024-05-30 11:05:09'),
(131, 23, 'OPV Pharma: Phát triển cẩm nang và tài liệu quảng cáo', '', '<p>MIG phối hợp với h&atilde;ng dược phẩm OPV s&aacute;ng tạo nội dung c&aacute;c ấn phẩm bao gồm c&aacute;c cẩm nang v&agrave; t&agrave;i liệu li&ecirc;n quan đến c&aacute;c loại thuốc v&agrave; kiến thức li&ecirc;n quan. Để thực hiện được những nội dung n&agrave;y, ch&uacute;ng t&ocirc;i đ&atilde; tiến h&agrave;nh tham khảo &yacute; kiến chuy&ecirc;n m&ocirc;n của nhiều chuy&ecirc;n gia, b&aacute;c sĩ, dược sĩ trong mạng lưới đối t&aacute;c của ch&uacute;ng t&ocirc;i để ho&agrave;n thiện nội dung được chuẩn x&aacute;c hơn.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i cũng tiến h&agrave;nh sản xuất c&aacute;c nội dung tr&ecirc;n để ho&agrave;n th&agrave;nh mục ti&ecirc;u m&agrave; OPV đ&atilde; đề ra đ&oacute; l&agrave; ph&acirc;n phối c&aacute;c nội dung tr&ecirc;n cho kh&aacute;ch h&agrave;ng mua thuốc tại c&aacute;c hiệu thuốc. V&igrave; thế, đội ngũ sản xuất của MIG&nbsp;đ&atilde; tiến h&agrave;nh thiết kế, in ấn, vận chuyển tất cả c&aacute;c ấn phẩm tr&ecirc;n tới từng nh&agrave; thuốc c&oacute; b&aacute;n sản phẩm OPV tại TPHCM v&agrave; c&aacute;c tỉnh l&acirc;n cận.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '<p>MIG phối hợp với h&atilde;ng dược phẩm OPV s&aacute;ng tạo nội dung c&aacute;c ấn phẩm bao gồm c&aacute;c cẩm nang v&agrave; t&agrave;i liệu li&ecirc;n quan đến c&aacute;c loại thuốc v&agrave; kiến thức li&ecirc;n quan. Để thực hiện được những nội dung n&agrave;y, ch&uacute;ng t&ocirc;i đ&atilde; tiến h&agrave;nh tham khảo &yacute; kiến chuy&ecirc;n m&ocirc;n của nhiều chuy&ecirc;n gia, b&aacute;c sĩ, dược sĩ trong mạng lưới đối t&aacute;c của ch&uacute;ng t&ocirc;i để ho&agrave;n thiện nội dung được chuẩn x&aacute;c hơn.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i cũng tiến h&agrave;nh sản xuất c&aacute;c nội dung tr&ecirc;n để ho&agrave;n th&agrave;nh mục ti&ecirc;u m&agrave; OPV đ&atilde; đề ra đ&oacute; l&agrave; ph&acirc;n phối c&aacute;c nội dung tr&ecirc;n cho kh&aacute;ch h&agrave;ng mua thuốc tại c&aacute;c hiệu thuốc. V&igrave; thế, đội ngũ sản xuất của SRC đ&atilde; tiến h&agrave;nh thiết kế, in ấn, vận chuyển tất cả c&aacute;c ấn phẩm tr&ecirc;n tới từng nh&agrave; thuốc c&oacute; b&aacute;n sản phẩm OPV tại TPHCM v&agrave; c&aacute;c tỉnh l&acirc;n cận.</p>\r\n\r\n<p><strong>Dưới đ&acirc;y l&agrave; c&aacute;c dịch vụ ch&uacute;ng t&ocirc;i đ&atilde; triển khai cho dự &aacute;n n&agrave;y:</strong></p>\r\n\r\n<p>1.&nbsp;BẢN QUYỀN</p>\r\n\r\n<p>2.&nbsp;S&Aacute;NG TẠO NỘI DUNG</p>\r\n\r\n<p>3.&nbsp;BI&Ecirc;N TẬP NỘI DUNG</p>\r\n\r\n<p>4.&nbsp;X&Aacute;C NHẬN BỞI CHUY&Ecirc;N GIA Y TẾ - KOL</p>\r\n\r\n<p>5.&nbsp;THIẾT KẾ V&Agrave; IN ẤN</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>MỘT SỐ H&Igrave;NH ẢNH CỦA DỰ &Aacute;N:</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/opv-banner_slider-768x329_baaeecb8232845eeb535e25012b6220a_grande.jpg\" style=\"width: 600px; height: 257px;\" /></strong></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/activation_-_du_an_game_7e0d2001a154458cae2f26c5e0af77d9_grande.jpg\" style=\"width: 600px; height: 303px;\" /></strong></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>1.&nbsp;C&aacute;c trang của cuốn cẩm nang Những điều cần biết về bệnh cảm c&uacute;m cho gia đ&igrave;nh</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/opv1_post-image_4e7014b73dde4998ab3efda47cb9c417_grande%20(1).jpg\" style=\"width: 600px; height: 393px;\" /></strong></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/opv1-1_post-image_1b41712cdead4dd0a4ef1a715e7532f9_grande_11zon.jpg\" style=\"width: 600px; height: 405px;\" /></strong></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>2.&nbsp;C&aacute;c tờ rơi th&ocirc;ng tin của thuốc Ameflu được ph&aacute;t đến những nh&agrave; thuốc</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><em><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/opv2_post-image_977a9b7b033d4b3a915b36a3f8a78f6a_grande.jpg\" style=\"width: 600px; height: 400px;\" /></strong></em></p>\r\n\r\n<p style=\"text-align: center;\"><em><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/opv2-1_post-image_31e73e279ef44883909257abf3d208f2_grande.jpg\" style=\"width: 600px; height: 400px;\" /></strong></em></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>3.&nbsp;Thiết kế &amp; in ấn t&agrave;i liệu cho&nbsp;nh&agrave; thuốc</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/picture9_4a1684b66eba49f3b13f78da41f039e3_grande.jpg\" style=\"width: 600px; height: 449px;\" /></strong></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/picture10_e2947eb6dd9e4568b668b0bb4f2af809_grande.jpg\" style=\"width: 469px; height: 524px;\" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'opv-pharma-phat-trien-cam-nang-va-tai-lieu-quang-cao', '/backend/web/uploads/images/du-an/opv-banner_slider-768x329_baaeecb8232845eeb535e25012b6220a_grande.jpg', NULL, 1, 0, 29, 0, 'Tags : content marketing,thiết kế tờ rơi,thiết kế ấn phẩm quảng cáo,content marketing cho ngành dược', 'Tags-:-content-marketing,thiet-ke-to-roi,thiet-ke-an-pham-quang-cao,content-marketing-cho-nganh-duoc', 'OPV Pharma: Phát triển cẩm nang và tài liệu quảng cáo', 'MIG phối hợp với hãng dược phẩm OPV sáng tạo nội dung các ấn phẩm bao gồm các cẩm nang và tài liệu liên quan đến các loại thuốc và kiến thức liên quan.', 'Content Marketing, Thiết kế tờ rơi, POSM, Content Marketing ngành dược', '2024-05-22 09:36:40');
INSERT INTO `posts` (`id`, `parent`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `slug`, `image`, `icon`, `status`, `feature`, `views`, `number`, `tag`, `tag_compare`, `title`, `description`, `keyword`, `created_date`) VALUES
(132, 24, 'Social content - Một dạng content marketing phổ biến cho ngành dược', '', '<p>Social media hiện đang l&agrave; một k&ecirc;nh truyền th&ocirc;ng phổ biến v&agrave; mang lại hiệu quả cao bởi sức ảnh hưởng v&agrave; độ lan tỏa cực kỳ mạnh mẽ. Do đ&oacute;, Social content đ&atilde; trở th&agrave;nh 1 phần quan trọng kh&ocirc;ng thể thiếu trong chiến lược content marketing của doanh nghiệp. Tuy nhi&ecirc;n, phải l&agrave;m thế n&agrave;o để x&acirc;y dựng chiến lược Social content đạt hiệu quả cao v&agrave; để lại nhiều ấn tượng cho kh&aacute;ch h&agrave;ng? Mời c&aacute;c bạn c&ugrave;ng tham khảo b&agrave;i viết b&ecirc;n dưới của MIG nh&eacute;!</p>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/H5.png\" style=\"width: 900px; height: 526px;\" /></p>\r\n\r\n<p>Social media hiện đang l&agrave; một k&ecirc;nh truyền th&ocirc;ng phổ biến v&agrave; mang lại hiệu quả cao bởi sức ảnh hưởng v&agrave; độ lan tỏa cực kỳ mạnh mẽ. Do đ&oacute;, Social content đ&atilde; trở th&agrave;nh 1 phần quan trọng kh&ocirc;ng thể thiếu trong chiến lược content marketing của doanh nghiệp. Tuy nhi&ecirc;n, phải l&agrave;m thế n&agrave;o để x&acirc;y dựng chiến lược Social content đạt hiệu quả cao v&agrave; để lại nhiều ấn tượng cho kh&aacute;ch h&agrave;ng? Mời c&aacute;c bạn c&ugrave;ng tham khảo b&agrave;i viết b&ecirc;n dưới của MIG&nbsp;nh&eacute;!</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Social content l&agrave; g&igrave;?</span></h2>\r\n\r\n<p>Social content l&agrave; một h&igrave;nh thức truyền th&ocirc;ng mạng x&atilde; hội chủ yếu tập trung cho c&aacute;c k&ecirc;nh: Facebook, Youtube, Instagram, Zalo, TikTok, Pinterest, Liked In&hellip;</p>\r\n\r\n<p>Tất cả những k&ecirc;nh mạng x&atilde; hội n&agrave;y đều c&oacute; một hệ thống Th&iacute;ch (Like), Chia sẻ (Share) v&agrave; B&igrave;nh luận (comment) để người d&ugrave;ng tương t&aacute;c với nội dung b&agrave;i viết, đồng thời gi&uacute;p doanh nghiệp đo lường hiệu quả của chiến lược Social content. Trong đ&oacute;, hiệu quả nhất phải kể đến những lượt chia sẻ gi&uacute;p lan tỏa th&ocirc;ng tin tiếp thị đến rất nhiều người d&ugrave;ng theo mức độ cấp số nh&acirc;n.</p>\r\n\r\n<p>Để nội dung tiếp thị của bạn được nhiều người biết đến th&igrave; nội dung đ&oacute; cần đ&aacute;nh đ&uacute;ng t&acirc;m l&yacute; v&agrave; insight kh&aacute;ch h&agrave;ng mục ti&ecirc;u, đi theo xu hướng hiện h&agrave;nh để nhận được nhiều lượt quan t&acirc;m v&agrave; chia sẻ, đồng thời&nbsp; gi&uacute;p th&ocirc;ng điệp của bạn được lan tỏa nhanh ch&oacute;ng hơn.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Ưu điểm v&agrave; hạn chế của Social content ng&agrave;nh dược</span></h2>\r\n\r\n<p>Social content cho ng&agrave;nh dược cực kỳ đa dạng để c&aacute;c doanh nghiệp lựa chọn cho ph&ugrave; hợp với từng chiến dịch nhất định. Với c&aacute;c chiến lược Social content, nh&atilde;n h&agrave;ng sẽ c&oacute; cơ hội tiếp cận với một số lượng người d&ugrave;ng v&ocirc; c&ugrave;ng lớn tr&ecirc;n c&aacute;c nền tảng mạng x&atilde; hội như: Facebook, Zalo, Instagram, TikTok, Youtube,&hellip; C&oacute; đ&ocirc;i khi chỉ một video tr&ecirc;n TikTok c&oacute; thể tăng độ phủ (độ nhận diện thương hiệu) đến h&agrave;ng ng&agrave;n, h&agrave;ng chục ng&agrave;n thậm ch&iacute; h&agrave;ng triệu người d&ugrave;ng. Với mức chi ph&iacute; Marketing cực kỳ rẻ thậm ch&iacute; l&agrave; bằng 0, chỉ cần nội dung đ&oacute; thật sự hấp dẫn v&agrave; mang đến lợi &iacute;ch cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>So s&aacute;nh với c&aacute;ch l&agrave;m content marketing kh&aacute;c, Social content cho ng&agrave;nh dược gi&uacute;p c&aacute;c thương hiệu dễ d&agrave;ng tiếp cận với kh&aacute;ch h&agrave;ng mục ti&ecirc;u hơn v&agrave; dễ đo lường hiệu quả của chiến dịch hơn rất nhiều.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, Social content cũng c&oacute; điểm yếu của n&oacute;. Ranh giới giữa sự tin y&ecirc;u v&agrave; phẫn nộ của người d&ugrave;ng d&agrave;nh cho thương hiệu l&agrave; cực kỳ mong manh trong một chiến dịch Social content. Bởi v&igrave; rất kh&oacute; để kiểm so&aacute;t được cảm x&uacute;c của người d&ugrave;ng tr&ecirc;n c&aacute;ch nền tảng mạng x&atilde; hội v&agrave; bất cứ l&uacute;c n&agrave;o họ cũng c&oacute; thể &ldquo;quay xe&rdquo; với thương hiệu của bạn. Đơn giản như nhiều người đ&aacute;nh gi&aacute; ti&ecirc;u cực về Fanpage của bạn, họ để lại những comment kh&ocirc;ng hay ho g&igrave;. Người sau truy cập sẽ thấy những đ&aacute;nh gi&aacute; đ&oacute; v&agrave; rất dễ hiểu nhầm về thương hiệu của bạn.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/medical-banner-with-doctor-patient.jpg\" style=\"width: 900px; height: 600px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">C&ocirc;ng ty ng&agrave;nh dược n&ecirc;n l&agrave;m chiến dịch Social content như thế n&agrave;o?</span></h2>\r\n\r\n<p>Quảng c&aacute;o tiếp thị cho ng&agrave;nh dược rất kh&oacute; khăn bởi v&igrave; n&oacute; l&agrave; một ng&agrave;nh đặc th&ugrave;, chịu nhiều sự kiểm so&aacute;t của luật ph&aacute;p. Cho n&ecirc;n từng nội dung tiếp thị được hiển thị tr&ecirc;n bất kỳ k&ecirc;nh mạng x&atilde; hội n&agrave;o cũng đ&ograve;i hỏi sự chỉn chu, ph&ugrave; hợp, tinh tế v&agrave; đ&uacute;ng luật. Vậy một c&ocirc;ng ty ng&agrave;nh dược n&ecirc;n l&agrave;m Social content như thế n&agrave;o? MIG c&oacute; một v&agrave;i gợi &yacute; d&agrave;nh cho bạn!</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">1. Lựa chọn một k&ecirc;nh mạng x&atilde; hội ph&ugrave; hợp</span></h3>\r\n\r\n<p>Kh&ocirc;ng phải k&ecirc;nh mạng x&atilde; hội n&agrave;o cũng cho ph&eacute;p bạn đăng c&aacute;c quảng c&aacute;o li&ecirc;n quan đến dược phẩm, y tế, chăm s&oacute;c sức khỏe,&hellip; V&iacute; dụ như LinkedIn v&agrave; Pinterest cấm ho&agrave;n to&agrave;n những g&igrave; li&ecirc;n quan đến lĩnh vực n&agrave;y.</p>\r\n\r\n<p>Trước khi triển khai c&aacute;c chiến dịch Social content ng&agrave;nh dược, bạn chắc chắn n&ecirc;n t&igrave;m hiểu kỹ lưỡng c&aacute;c k&ecirc;nh mạng x&atilde; hội hiện nay v&agrave; chọn một số k&ecirc;nh ph&ugrave; hợp nhất với bạn. Bạn cũng cần quan t&acirc;m đến đối tượng kh&aacute;ch h&agrave;ng của từng k&ecirc;nh để nhắm mục ti&ecirc;u cho ph&ugrave; hợp.</p>\r\n\r\n<p>V&iacute; dụ:</p>\r\n\r\n<ul>\r\n	<li>Facebook l&agrave; một nền tảng phổ biến cho những người tr&ecirc;n 30 tuổi, nếu sản phẩm của bạn ph&ugrave; hợp với nh&oacute;m n&agrave;y th&igrave; h&atilde;y chọn l&agrave;m Social content tr&ecirc;n k&ecirc;nh Facebook.</li>\r\n	<li>Tiktok một nền tảng mạng x&atilde; hội chuy&ecirc;n về s&aacute;ng tạo nội dung video được c&aacute;c bạn trẻ quan t&acirc;m kh&aacute; nhiều. Liệu sản phẩm của bạn c&oacute; ph&ugrave; hợp với nh&oacute;m đối tượng n&agrave;y hay kh&ocirc;ng?</li>\r\n	<li>Instagram phổ biến ở những người trẻ dưới tuổi 30, thật ph&ugrave; hợp cho c&aacute;ch l&agrave;m nội dung kiểu video ngắn, h&igrave;nh ảnh hoặc infographic.</li>\r\n	<li>Youtube cũng l&agrave; một k&ecirc;nh tiếp thị mạng x&atilde; hội tốt, c&ocirc;ng ty dược n&ecirc;n l&agrave;m c&aacute;c video ngắn hữu &iacute;ch về sản phẩm.</li>\r\n</ul>\r\n\r\n<h3><span style=\"color:#0000cc;\">2. H&atilde;y để nh&acirc;n vi&ecirc;n n&oacute;i về thương hiệu của bạn</span></h3>\r\n\r\n<p>Nh&acirc;n vi&ecirc;n ch&iacute;nh l&agrave; những người am hiểu v&agrave; y&ecirc;u mến doanh nghiệp của bạn nhiều nhất. Ch&iacute;nh v&igrave; thế, thay v&igrave; thu&ecirc; những influencers nổi tiếng v&agrave; tốn qu&aacute; nhiều chi ph&iacute;, bạn h&atilde;y tận dụng ch&iacute;nh nguồn lực nội tại của doanh nghiệp. H&atilde;y để nh&acirc;n vi&ecirc;n chia sẻ th&ecirc;m về c&ocirc;ng ty hay sản phẩm, điều đ&oacute; sẽ gi&uacute;p doanh nghiệp bạn tiếp cận th&ecirc;m 1 lượng lớn kh&aacute;ch h&agrave;ng mục ti&ecirc;u từ c&aacute;c network của nh&acirc;n vi&ecirc;n. Tuy nhi&ecirc;n, bạn cũng cần kiểm so&aacute;t để đảm bảo rằng c&aacute;c th&ocirc;ng tin được truyền đi l&agrave; ho&agrave;n to&agrave;n ch&iacute;nh x&aacute;c.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">3. Ch&uacute; trọng nội dung gi&aacute;o dục</span></h3>\r\n\r\n<p>T&acirc;m thế của kh&aacute;ch h&agrave;ng thường rất y&ecirc;u mến c&aacute;c thương hiệu mang đến cho họ nhiều th&ocirc;ng tin gi&aacute; trị v&agrave; hữu &iacute;ch. Do đ&oacute;, bạn đừng chỉ chăm chăm b&aacute;n h&agrave;ng, h&atilde;y chia sẻ những nội dung bổ &iacute;ch đến kh&aacute;ch h&agrave;ng của bạn. Một v&agrave;i mẹo nhỏ phối hợp với sản phẩm để mang lại hiệu quả tối đa sẽ được kh&aacute;ch h&agrave;ng quan t&acirc;m rất nhiều. B&ecirc;n cạnh đ&oacute;, việc hỗ trợ ph&ograve;ng chống bệnh tật l&agrave; nhiệm vụ quan trọng của ng&agrave;nh dược phẩm. C&agrave;ng chia sẻ nhiều th&ocirc;ng tin bổ &iacute;ch mang t&iacute;nh gi&aacute;o dục cao, bạn sẽ c&agrave;ng nhận được nhiều sự quan t&acirc;m v&agrave; y&ecirc;u mến từ kh&aacute;ch h&agrave;ng. Để khi c&oacute; nhu cầu về sản phẩm th&igrave; họ sẽ nhớ đến thương hiệu của bạn đầu ti&ecirc;n.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">4. Đừng qu&ecirc;n l&agrave;m seri video</span></h3>\r\n\r\n<p>Người d&ugrave;ng mạng x&atilde; hội đặc biệt th&iacute;ch th&uacute; với những nội dung video, cho n&ecirc;n l&agrave;m Social content cũng cần ch&uacute; trọng đến mảng n&agrave;y. C&oacute; thể sẽ tốn nhiều chi ph&iacute; hơn để sản xuất nội dung dạng video, nhưng n&oacute; sẽ nhanh ch&oacute;ng hiệu quả, n&oacute; thu h&uacute;t h&agrave;ng ng&agrave;n, h&agrave;ng chục ng&agrave;n, h&agrave;ng triệu lượt xem cho video của bạn. Cứ như vậy nh&atilde;n h&agrave;ng của bạn sẽ tiếp cận đến nhiều kh&aacute;ch h&agrave;ng hơn, hiệu quả hơn nhiều so với một b&agrave;i viết b&igrave;nh thường.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">5. N&ecirc;n l&agrave;m infographic</span></h3>\r\n\r\n<p>WHO thường xuy&ecirc;n sử dụng infographic cho c&aacute;c nội dung về ph&ograve;ng chống bệnh tật v&agrave; sức khỏe. V&agrave; bạn cũng n&ecirc;n tạo ra những nội dung dạng n&agrave;y để tăng cường nhận thức của kh&aacute;ch h&agrave;ng. N&oacute; rất hiệu quả trong c&aacute;c chiến dịch sức khỏe, v&iacute; dụ như c&aacute;ch ph&ograve;ng chống dịch Covid-19, c&aacute;c mẹo sức khỏe, c&aacute;ch h&ocirc; hấp nh&acirc;n tạo,&hellip;</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">6. Tạo chatbox tự động cho c&aacute;c c&acirc;u hỏi thường gặp</span></h3>\r\n\r\n<p>T&agrave;i khoản mạng x&atilde; hội của một c&ocirc;ng ty dược sẽ lu&ocirc;n nhận được rất nhiều c&acirc;u hỏi từ người d&ugrave;ng. Việc bạn c&oacute; thể giải đ&aacute;p nhanh ch&oacute;ng cho những c&acirc;u hỏi đ&oacute; l&agrave; ho&agrave;n to&agrave;n cần thiết để tăng uy t&iacute;n của thương hiệu. Tuy nhi&ecirc;n, để tiết kiệm bớt sức lực v&agrave; thời gian, v&igrave; kh&ocirc;ng phải l&uacute;c n&agrave;o bạn cũng lu&ocirc;n c&oacute; mặt. Tạo chatbox cho những c&acirc;u hỏi phổ biến l&agrave; lựa chọn th&ocirc;ng minh.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">7. Cần c&oacute; một kế hoạch chỉnh chu v&agrave; d&agrave;i hạn</span></h3>\r\n\r\n<p>C&ocirc;ng ty dược phẩm cần c&oacute; một kế hoạch Social content chỉn chu v&agrave; d&agrave;i hạn để tạo n&ecirc;n hiệu quả tiếp thị. Quan trọng nữa l&agrave; tr&aacute;nh cho thương hiệu mắc v&agrave;o những vụ kiện tụng kh&ocirc;ng mong muốn.</p>\r\n\r\n<p>Như vậy MIG đ&atilde; chia sẻ với bạn đọc về c&aacute;ch l&agrave;m Social content cho ng&agrave;nh dược, một trong những c&aacute;ch tiếp thị nội dung phổ biến nhất của ng&agrave;nh n&agrave;y. Hi vọng b&agrave;i viết mang đến nhiều th&ocirc;ng tin hữu &iacute;ch d&agrave;nh cho người l&agrave;m marketing ng&agrave;nh dược. Cảm ơn bạn đ&atilde; theo d&otilde;i những kiến thức Marketing ng&agrave;nh dược từ MIG.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/doctor-reviewing-tablet.jpg\" style=\"width: 900px; height: 600px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Đội ngũ Content MIG&nbsp;- Chuy&ecirc;n gia s&aacute;ng tạo Social content chất lượng cao</span></h2>\r\n\r\n<p>Với nhiều năm hoạt động trong lĩnh vực Digital Marketing tại TP.HCM, MIG&nbsp;tự h&agrave;o c&oacute; một đội ngũ chuy&ecirc;n gia gi&agrave;u kinh nghiệm trong việc x&acirc;y dựng chiến lược Social content cho ng&agrave;nh dược. B&ecirc;n cạnh đ&oacute;, sự nhạy b&eacute;n v&agrave; năng lực s&aacute;ng tạo l&agrave; một trong những yếu tố trọng t&acirc;m tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng cho c&aacute;c dự &aacute;n của MIG.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n tự đề ra cho m&igrave;nh những nguy&ecirc;n tắc v&agrave; quy tr&igrave;nh cụ thể. Trong đ&oacute;, nghi&ecirc;n cứu sản phẩm &ndash; dịch vụ của kh&aacute;ch h&agrave;ng, nghi&ecirc;n cứu thị trường, nghi&ecirc;n cứu v&agrave; ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng mục ti&ecirc;u l&agrave; một trong những quy tr&igrave;nh cực kỳ quan trọng kh&ocirc;ng được ph&eacute;p bỏ qua.</p>\r\n\r\n<p>Dựa tr&ecirc;n sự am hiểu v&agrave; vận dụng c&aacute;c thuật to&aacute;n của Google, MIG c&ograve;n tạo ra những mẫu content ph&ugrave; hợp, vừa đ&aacute;p ứng c&aacute;c điều kiện của Google, vừa nhắm đ&uacute;ng kh&aacute;ch h&agrave;ng mục ti&ecirc;u.</p>\r\n\r\n<p>V&agrave; đặc biệt, MIG&nbsp;đến với kh&aacute;ch h&agrave;ng bằng sự tận t&acirc;m, th&aacute;i độ tử tế v&agrave; tinh thần tr&aacute;ch nhiệm cao. Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng bạn để đưa ra những giải ph&aacute;p tối ưu bằng nghiệp vụ chuy&ecirc;n s&acirc;u v&agrave; kh&aacute;c biệt. MIG&nbsp;cam kết sẽ gi&uacute;p bạn x&acirc;y dựng một chiến lược Social content đầy đột ph&aacute; để lan tỏa th&ocirc;ng điệp truyền th&ocirc;ng v&agrave; cải thiện hiệu quả b&aacute;n h&agrave;ng tối đa.</p>\r\n\r\n<p>Để được tư vấn th&ecirc;m về c&aacute;ch x&acirc;y dựng chiến lược&nbsp; Social content cho ng&agrave;nh dược, bạn h&atilde;y li&ecirc;n hệ với MIG&nbsp;ngay h&ocirc;m nay. Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn 24/7.</p>\r\n', '', 'social-content-mot-dang-content-marketing-pho-bien-cho-nganh-duoc', '/backend/web/uploads/images/Tin-tuc/H5.png', NULL, 1, 1, 10, 0, '', NULL, 'Social content - Một dạng content marketing phổ biến cho ngành dược', 'Social media hiện đang là một kênh truyền thông phổ biến và mang lại hiệu quả cao bởi sức ảnh hưởng và độ lan tỏa cực kỳ mạnh mẽ. Do đó, Social content đã trở thành 1 phần quan trọng không thể thiếu trong chiến lược content marketing của doanh nghiệp. ', 'Social Media, Content Marketing, Social Content, Marketing ngành dược', '2024-05-24 18:15:16'),
(133, 23, 'Santen: Quản lý & Phát triển trang Fanpage Facebook', '', '<p>MIG tự h&agrave;o v&igrave; đ&atilde; được hợp t&aacute;c c&ugrave;ng Santen Việt Nam trong dự &aacute;n Quản l&yacute; &amp; Ph&aacute;t triển Fanpage ch&iacute;nh thức của Santen.</p>\r\n', '', '<p>MIG tự h&agrave;o v&igrave; đ&atilde; được hợp t&aacute;c c&ugrave;ng Santen Việt Nam trong dự &aacute;n Quản l&yacute; &amp; Ph&aacute;t triển Fanpage ch&iacute;nh thức của Santen. Tại dự &aacute;n n&agrave;y, Team MIG&nbsp;đ&atilde; triển khai c&aacute;c hoạt động:</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>1. S&Aacute;NG TẠO NỘI DUNG</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>2. CHẠY QUẢNG C&Aacute;O FACEBOOK</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>3. L&Agrave;M VIỆC VỚI KOLS &amp; B&Aacute;O CH&Iacute;</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>4. PH&Aacute;T TRIỂN WEB - APP</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Một số h&igrave;nh ảnh của dự &aacute;n:</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/untitled-1_03e322543b4e46e3bc126f472556992e_medium.png\" style=\"width: 217px; height: 240px;\" />&nbsp;<img alt=\"\" src=\"/backend/web/uploads/images/du-an/untitled_de70aa2959ec45dd87e48ee8ea54bfb6_medium.png\" style=\"width: 240px; height: 214px;\" />&nbsp;<img alt=\"\" src=\"/backend/web/uploads/images/du-an/untitled-2_c91cd11c67ad434c9fe59ef441e09ec6_medium.png\" style=\"width: 216px; height: 240px;\" /></strong></p>\r\n\r\n<p style=\"text-align: center;\"><strong><img alt=\"\" src=\"/backend/web/uploads/images/du-an/273542295_699351438113133_2791466087774369270_n_59fe0d6fe9134604b993e1d2d5da9e20_medium.jpg\" style=\"width: 240px; height: 238px;\" />&nbsp;<img alt=\"\" src=\"/backend/web/uploads/images/du-an/271325956_673382714043339_2128680763632856183_n_8a8b4abb72fe4929845c2c2533da4c09_medium.jpg\" style=\"width: 240px; height: 240px;\" />&nbsp;<img alt=\"\" src=\"/backend/web/uploads/images/du-an/273949516_696163785098565_3611579630534796593_n_4b32351cc46d4587bb656358b88c6768_medium.jpg\" style=\"width: 240px; height: 240px;\" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'santen-quan-ly-phat-trien-trang-fanpage-facebook', '/backend/web/uploads/images/du-an/248048976_628531665195111_3068084055023766611_n.jpg', NULL, 1, 0, 22, 0, '', NULL, 'Santen: Quản lý & Phát triển trang Fanpage Facebook', 'MIG tự hào vì đã được hợp tác cùng Santen Việt Nam trong dự án Quản lý & Phát triển Fanpage chính thức của Santen.', 'Content Fanpage, Content marketing, Digital Marketing', '2024-05-22 09:31:28'),
(134, 23, 'Aeon Mall: Phát triển cẩm nang & Quản lý Fanpage', '', '<p>Đội ngũ content của MIG&nbsp;đ&atilde; thay mặt AEON l&ecirc;n kế hoạch, Concept cho c&aacute;c b&agrave;i đăng tr&ecirc;n trang Fanpage ch&iacute;nh thức.&nbsp;Team MIG&nbsp;đ&atilde; s&aacute;ng tạo nội dung của hơn (50) b&agrave;i đăng với nguồn th&ocirc;ng tin, &yacute; tưởng được thu thập từ AEON v&agrave; nhiều nguồn kh&aacute;c.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, ch&uacute;ng t&ocirc;i cũng l&ecirc;n kế hoạch thiết kế v&agrave; sản xuất c&aacute;c coupon v&agrave; cẩm nang cho kh&aacute;ch h&agrave;ng của Aeon Mall.</p>\r\n', '', '<p>Đội ngũ content của MIG&nbsp;đ&atilde; thay mặt AEON l&ecirc;n kế hoạch, concept cho c&aacute;c b&agrave;i đăng tr&ecirc;n trang Fanpage ch&iacute;nh thức.&nbsp;Team MIG&nbsp;đ&atilde; s&aacute;ng tạo nội dung của hơn (50) b&agrave;i đăng với nguồn th&ocirc;ng tin, &yacute; tưởng được thu thập từ AEON v&agrave; nhiều nguồn kh&aacute;c.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, ch&uacute;ng t&ocirc;i cũng l&ecirc;n kế hoạch thiết kế v&agrave; sản xuất c&aacute;c coupon v&agrave; cẩm nang cho kh&aacute;ch h&agrave;ng của Aeon Mall.</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>MỘT SỐ H&Igrave;NH ẢNH CỦA DỰ &Aacute;N:</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Aeon Mall: Phát triển cẩm nang &amp; quản lý fanpage\" src=\"https://file.hstatic.net/200000561203/file/picture8_12f3dd3826e94afda4d8707c95112e01.png\" /><img alt=\"Aeon Mall: Phát triển cẩm nang &amp; quản lý fanpage\" src=\"https://file.hstatic.net/200000561203/file/aeon-1_post-image_db0c677f2bcb41958ed26ea09e049bfb_1024x1024.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Aeon Mall: Phát triển cẩm nang &amp; quản lý fanpage\" src=\"https://file.hstatic.net/200000561203/file/aeon-2_post-image_5def9c702f074140b2101229350fae0e_1024x1024.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Aeon Mall: Phát triển cẩm nang &amp; quản lý fanpage\" src=\"https://file.hstatic.net/200000561203/file/aeon-3_post-image_f029d87d613b445da000d2c4338ab358_1024x1024.jpg\" /></p>\r\n\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n', '', 'aeon-mall-phat-trien-cam-nang-quan-ly-fanpage', '/backend/web/uploads/images/du-an/he-thong-trung-tam-thuong-mai-aeon-tai-viet-nam.jpeg', NULL, 1, 0, 24, 0, 'digital marketing,quản lý fanpage,Content cho fanpage,content marketing,dự án Aeon Mall', 'digital-marketing,quan-ly-fanpage,Content-cho-fanpage,content-marketing,du-an-Aeon-Mall', 'Aeon Mall: Phát triển cẩm nang & Quản lý Fanpage', 'Đội ngũ content của MIG đã thay mặt AEON lên kế hoạch, Concept cho các bài đăng trên trang Fanpage chính thức. Team MIG đã sáng tạo nội dung của hơn (50) bài đăng với nguồn thông tin, ý tưởng được thu thập từ AEON và nhiều nguồn khác.', 'Content Fanpage, Content marketing, Digital Marketing', '2024-05-22 09:29:22'),
(135, 23, 'Máy lọc không khí AP: Phân phối & Marketing sản phẩm', '', '<p>MIG tiếp tục khẳng định thế mạnh của m&igrave;nh trong lĩnh vực thương mại điện tử bằng việc x&acirc;y dựng v&agrave; quản l&yacute; gian h&agrave;ng b&aacute;n phụ kiện &ocirc; t&ocirc; với sản phẩm ch&iacute;nh l&agrave; m&aacute;y lọc kh&ocirc;ng kh&iacute; đa năng d&ugrave;ng trong &ocirc; t&ocirc;.</p>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"Máy lọc không khí AP: Phân phối &amp; Marketing sản phẩm\" src=\"https://file.hstatic.net/200000561203/file/final_cover_0a62d1157eb94d56ba777a2e0c4eadc6_1024x1024.jpg\" /></p>\r\n\r\n<p>MIG tiếp tục khẳng định thế mạnh của m&igrave;nh trong lĩnh vực thương mại điện tử bằng việc x&acirc;y dựng v&agrave; quản l&yacute; gian h&agrave;ng b&aacute;n phụ kiện &ocirc; t&ocirc; với sản phẩm ch&iacute;nh l&agrave; m&aacute;y lọc kh&ocirc;ng kh&iacute; đa năng d&ugrave;ng trong &ocirc; t&ocirc;.</p>\r\n\r\n<p>Với dự &aacute;n n&agrave;y, MIG&nbsp;đ&atilde; sử dụng nhiều c&ocirc;ng cụ để đạt được c&aacute;c mục ti&ecirc;u kh&aacute;c nhau như:</p>\r\n\r\n<ol>\r\n	<li>Sử dụng c&aacute;c nền tảng thương mại điện tử với chiến lược kinh doanh ph&ugrave; hợp để đạt được doanh số ổn định qua từng th&aacute;ng.</li>\r\n	<li>Với trang fanpage M&aacute;y Lọc Kh&ocirc;ng Kh&iacute; Đa Năng, ch&uacute;ng t&ocirc;i kh&ocirc;ng ngừng s&aacute;ng tạo nội dung mang th&ocirc;ng điệp của thương hiệu để n&acirc;ng cao nhận thức của kh&aacute;ch h&agrave;ng tiềm năng về sản phẩm M&aacute;y Lọc Kh&ocirc;ng Kh&iacute; AP.</li>\r\n	<li>Nhằm tạo ra độ phủ hơn nữa, ch&uacute;ng t&ocirc;i triển khai seeding, SEM, SEO gi&uacute;p thương hiệu M&aacute;y lọc kh&ocirc;ng kh&iacute; AP hiện diện nhiều hơn tr&ecirc;n thị trường phụ kiện &ocirc; t&ocirc;.</li>\r\n</ol>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Một số h&igrave;nh ảnh của dự &aacute;n:</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>1. Ph&acirc;n phối sản phẩm tại c&aacute;c S&agrave;n TNĐT Shopee, Tiki, Lazada</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Máy lọc không khí AP: Phân phối &amp; Marketing sản phẩm\" src=\"https://file.hstatic.net/200000561203/file/du-an-may-loc-khong-khi_5e0600e3b2bd4635a5f79d245ddb35c1.png\" /></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><b>2. Thiết kế chất liệu Branding Sản phẩm:</b></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Máy lọc không khí AP: Phân phối &amp; Marketing sản phẩm\" height=\"2611\" src=\"https://salt.tikicdn.com/ts/tmp/ba/68/7f/f084d4dc72f01f4d94187c6df00ac382.jpg\" width=\"750\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Máy lọc không khí AP: Phân phối &amp; Marketing sản phẩm\" height=\"1959\" src=\"https://salt.tikicdn.com/ts/tmp/ff/6a/c1/33b51432540b087e11b32485120155ed.jpg\" width=\"700\" /></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Máy lọc không khí AP: Phân phối &amp; Marketing sản phẩm\" height=\"743\" src=\"https://salt.tikicdn.com/ts/tmp/2e/71/67/fefc720908025bb2d9cb0399c5955e75.jpg\" width=\"750\" /><img alt=\"Máy lọc không khí AP: Phân phối &amp; Marketing sản phẩm\" height=\"979\" src=\"https://salt.tikicdn.com/ts/tmp/4c/0e/f1/92416a6f621623c309ec190ade8df1d4.jpg\" width=\"750\" /><img alt=\"Máy lọc không khí AP: Phân phối &amp; Marketing sản phẩm\" height=\"1550\" src=\"https://salt.tikicdn.com/ts/tmp/d9/90/c9/4ec0a11ce4370ed31052e0aa856e3880.jpg\" width=\"750\" /><img alt=\"Máy lọc không khí AP: Phân phối &amp; Marketing sản phẩm\" height=\"1000\" src=\"https://salt.tikicdn.com/ts/tmp/5a/08/bb/10c7b1de09d66083fc1332dafeff13f4.jpg\" width=\"750\" /><img alt=\"Máy lọc không khí AP: Phân phối &amp; Marketing sản phẩm\" height=\"2166\" src=\"https://salt.tikicdn.com/ts/tmp/02/89/b7/5d16bdbaa69f070aafedf4f6f4ae4894.jpg\" width=\"750\" /></p>\r\n', '', 'may-loc-khong-khi-ap-phan-phoi-marketing-san-pham', '/backend/web/uploads/images/du-an/final_cover_0a62d1157eb94d56ba777a2e0c4eadc6_1024x1024.jpg', NULL, 1, 0, 40, 0, '', NULL, 'Máy lọc không khí AP: Phân phối & Marketing sản phẩm', 'MIG tiếp tục khẳng định thế mạnh của mình trong lĩnh vực thương mại điện tử bằng việc xây dựng và quản lý gian hàng bán phụ kiện ô tô với sản phẩm chính là máy lọc không khí đa năng dùng trong ô tô.', 'Máy lọc không khí ô tô, thương mại điện tử, sale, marketing', '2024-05-22 09:25:21'),
(136, 24, '6 cách triển khai Content Marketing chăm sóc sức khỏe hiệu quả', '', '<p>C&ocirc;ng ty của bạn đang hoạt động trong lĩnh vực chăm s&oacute;c sức khỏe v&agrave; bạn muốn l&agrave;m content marketing sao cho thật hiệu quả. Dưới đ&acirc;y l&agrave; 5 c&aacute;ch l&agrave;m&nbsp;<strong>Content Marketing cho ng&agrave;nh chăm s&oacute;c sức khỏe</strong>&nbsp;tuyệt vời để bạn: Thu h&uacute;t đ&ocirc;ng đảo kh&aacute;ch h&agrave;ng, x&acirc;y dựng niềm tin bền vững v&agrave; c&oacute; ri&ecirc;ng một cộng đồng lớn mạnh.</p>\r\n', '', '<p>C&ocirc;ng ty của bạn đang hoạt động trong lĩnh vực chăm s&oacute;c sức khỏe v&agrave; bạn muốn l&agrave;m content marketing sao cho thật hiệu quả. Dưới đ&acirc;y l&agrave; 5 c&aacute;ch l&agrave;m&nbsp;<strong>Content Marketing cho ng&agrave;nh chăm s&oacute;c sức khỏe</strong>&nbsp;tuyệt vời để bạn: Thu h&uacute;t đ&ocirc;ng đảo kh&aacute;ch h&agrave;ng, x&acirc;y dựng niềm tin bền vững v&agrave; c&oacute; ri&ecirc;ng một cộng đồng lớn mạnh.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">1. Để kh&aacute;ch h&agrave;ng trải nghiệm sản phẩm hoặc dịch vụ th&ocirc;ng qua c&ocirc;ng nghệ</span></h2>\r\n\r\n<p>Đối với c&aacute;c quảng c&aacute;o v&agrave; nội dung truyền th&ocirc;ng trong ng&agrave;nh chăm s&oacute;c sức khoẻ, kh&aacute;ch h&agrave;ng sẽ kh&ocirc;ng dễ d&agrave;ng tin tưởng v&agrave; quyết định sử dụng ngay nếu kh&ocirc;ng c&oacute; những bằng chứng thuyết phục về hiệu quả v&agrave; sự an to&agrave;n. Do đ&oacute;, bạn c&oacute; thể sử dụng c&ocirc;ng nghệ để tạo sự trải nghiệm th&uacute; vị v&agrave; hữu &iacute;ch cho ch&iacute;nh kh&aacute;ch h&agrave;ng của m&igrave;nh để c&oacute; thể tăng tỷ lệ chuyển đổi.</p>\r\n\r\n<p>Thật kh&oacute; để ai đ&oacute; c&oacute; thể b&igrave;nh tĩnh trước những lần phẫu thuật lớn. Họ thường xuy&ecirc;n lo &acirc;u về ca mổ của m&igrave;nh. T&ocirc;i sẽ trải qua những g&igrave; trong ph&ograve;ng mổ? B&aacute;c sĩ của t&ocirc;i sẽ l&agrave;m những g&igrave;? Bằng c&ocirc;ng nghệ tường thuật trực tiếp, c&ocirc;ng ty Medical Realities ở Vương quốc Anh đ&atilde; cho c&aacute;c kh&aacute;ch h&agrave;ng quan s&aacute;t từng ng&oacute;c ng&aacute;ch b&ecirc;n trong ph&ograve;ng mổ, theo d&otilde;i mỗi thao t&aacute;c của b&aacute;c sĩ, t&igrave;nh h&igrave;nh bệnh nh&acirc;n,&hellip; Kh&aacute;ch h&agrave;ng của Medical Realities đ&atilde; được thuyết phục v&agrave; tin tưởng th&ocirc;ng qua buổi tường thuật trực tiếp. V&agrave; buổi tường thuật trực tiếp đ&oacute; cũng ch&iacute;nh l&agrave; nội dung Medical Realities đ&atilde; tạo ra để thu h&uacute;t v&agrave; th&uacute;c đẩy kh&aacute;ch h&agrave;ng quyết định.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">2. Dẫn chứng những ca điều trị th&agrave;nh c&ocirc;ng</span></h2>\r\n\r\n<p>Một hướng tiếp thị kh&ocirc;n kh&eacute;o của nhiều tổ chức y tế hiện nay ch&iacute;nh l&agrave; dẫn ra những c&acirc;u chuyện điều trị th&agrave;nh c&ocirc;ng của bệnh nh&acirc;n. Họ lập n&ecirc;n một trang web để kết nối những bệnh nh&acirc;n đ&atilde; từng sử dụng dịch vụ. Họ cũng sẽ c&oacute; k&ecirc;nh YouTube để chia sẻ những video người thật việc thật.</p>\r\n\r\n<p>Bản th&acirc;n người bệnh n&oacute;i l&ecirc;n trải nghiệm của họ c&oacute; sức thuyết phục hơn rất nhiều so với c&aacute;c h&igrave;nh thức PR kh&aacute;c. Trong khi đ&oacute;, đ&acirc;y cũng l&agrave; một nh&acirc;n chứng đầy thuyết phục về chất lượng dịch vụ của tổ chức của bạn.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"6 cách triển khai Content Marketing chăm sóc sức khỏe hiệu quả\" src=\"https://file.hstatic.net/200000561203/file/cach_trien_khai_content_marketing_cho_nganh_cham_soc_suc_khoe_1_44b18ee34b274ec69c19a18a382c8a85.jpg\" /></p>\r\n\r\n<p>Nếu bạn ch&uacute; &yacute; đến c&aacute;c dịch vụ nha khoa hoặc thẩm mỹ viện, bạn sẽ thấy họ sử dụng c&aacute;ch marketing n&agrave;y rất thường xuy&ecirc;n. V&agrave; thực tế l&agrave; n&oacute; rất thuyết phục đ&uacute;ng kh&ocirc;ng n&agrave;o? Trước như thế n&agrave;y &ndash; c&ograve;n đ&acirc;y l&agrave; &ndash; Sau khi điều trị. Những h&igrave;nh ảnh thực tế của kh&aacute;ch h&agrave;ng nhanh ch&oacute;ng thu h&uacute;t sự ch&uacute; &yacute; của kh&aacute;ch h&agrave;ng mới, họ sẽ t&igrave;m hiểu về dịch vụ c&oacute; li&ecirc;n quan v&agrave; khả năng cao sẽ chuyển sang sử dụng dịch vụ của bạn.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">3. Sử dụng những form thăm d&ograve; &yacute; kiến, tr&ograve; chơi, c&acirc;u đố</span></h2>\r\n\r\n<p><strong>Content Marketing trong lĩnh vực chăm s&oacute;c sức khỏe</strong>&nbsp;thường kh&aacute; nh&agrave;m ch&aacute;n bởi những nội dung mang t&iacute;nh chuy&ecirc;n m&ocirc;n khoa học. Cho n&ecirc;n bạn c&oacute; thể sử dụng những c&acirc;u đố, tạo ra c&aacute;c tr&ograve; chơi hoặc đặt những c&acirc;u hỏi thăm d&ograve; &yacute; kiến. Kh&aacute;ch h&agrave;ng của bạn sẽ cảm thấy h&ograve;a m&igrave;nh v&agrave;o vấn đề m&agrave; họ đang quan t&acirc;m chứ kh&ocirc;ng hẳn l&agrave; tiếp nhận th&ocirc;ng tin một chiều.</p>\r\n\r\n<p>Một v&iacute; dụ điển h&igrave;nh l&agrave; trường hợp của United Healthcare (một tổ chức chăm s&oacute;c sức khỏe). Website của họ lu&ocirc;n c&oacute; những c&acirc;u đ&oacute; c&oacute; k&egrave;m theo giải thưởng v&agrave; họ cũng thường xuy&ecirc;n tung ra những thử th&aacute;ch d&agrave;nh cho kh&aacute;ch gh&eacute; thăm.</p>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng của tổ chức n&agrave;y cực kỳ hứng th&uacute; khi được tham gia c&aacute;c thử th&aacute;ch sống khỏe mạnh hơn v&agrave; ghi lại qu&aacute; tr&igrave;nh đ&oacute;. Đ&acirc;y được đ&aacute;nh gi&aacute; l&agrave; một chiến lược content marketing chăm s&oacute;c sức khỏe th&ocirc;ng minh. Ch&iacute;nh người d&ugrave;ng sẽ tạo n&ecirc;n c&aacute;c nội dung đầy ch&acirc;n thực d&agrave;nh cho tổ chức.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">4. Tạo ra c&aacute;c chủ đề li&ecirc;n quan đến c&aacute;c ng&agrave;y lễ kỷ niệm</span></h2>\r\n\r\n<p>Trong lĩnh vực sức khỏe c&oacute; kh&aacute; nhiều ng&agrave;y kỷ niệm do WHO đưa ra. V&iacute; dụ ng&agrave;y thế giới kh&ocirc;ng thuốc l&aacute; 31/5. Với tư c&aacute;ch l&agrave; một website chăm s&oacute;c sức khỏe, bạn h&atilde;y tận dụng tốt những ng&agrave;y lễ kỷ niệm n&agrave;y để tạo n&ecirc;n những nội dung h&uacute;t kh&aacute;ch.</p>\r\n\r\n<p>Chiến lược n&agrave;y vừa c&oacute; thể tăng nhận thức của cộng đồng về vấn đề đang được kỷ niệm. Sẽ c&oacute; nhiều giải ph&aacute;p được đưa ra nhằm giải quyết tốt vấn đề đang được quan t&acirc;m. Cũng đồng thời thu h&uacute;t lượng tương t&aacute;c lớn d&agrave;nh cho website của bạn.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">5. Những chương tr&igrave;nh giảm gi&aacute;, chiết khấu, ưu đ&atilde;i, qu&agrave; tặng</span></h2>\r\n\r\n<p>Hầu hết mọi kh&aacute;ch h&agrave;ng đều th&iacute;ch chương tr&igrave;nh giảm gi&aacute;, c&oacute; ưu đ&atilde;i g&igrave; đ&oacute;, dịch vụ tặng k&egrave;m miễn ph&iacute; hoặc chiết khấu hấp dẫn. Vậy n&ecirc;n rất nhiều tổ chức chăm s&oacute;c sức khỏe li&ecirc;n tục tung ra những chương tr&igrave;nh khuyến m&atilde;i để thu h&uacute;t th&ecirc;m kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Trong chiến lược ph&aacute;t triển nội dung ng&agrave;nh dược phẩm, bạn sẽ dễ th&agrave;nh c&ocirc;ng hơn khi kết hợp với những chương tr&igrave;nh như vậy.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"6 cách triển khai Content Marketing chăm sóc sức khỏe hiệu quả\" src=\"https://file.hstatic.net/200000561203/file/cach_trien_khai_content_marketing_cho_nganh_cham_soc_suc_khoe_2_ca378532bda94ba481f71852cf89ac41.jpg\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">6. Đừng qu&ecirc;n gắn Hashtags</span></h2>\r\n\r\n<p>Bạn sẽ tiếp cận được với h&agrave;ng triệu người, thậm ch&iacute; cả tỷ người nếu như bạn biết c&aacute;ch gắn hashtags th&ocirc;ng minh dưới b&agrave;i viết của m&igrave;nh. H&atilde;y l&agrave;m cho hashtags của bạn trở n&ecirc;n thật dễ nhớ v&agrave; s&aacute;ng tạo đủ để lan tỏa ra cộng đồng. N&oacute; sẽ li&ecirc;n quan đến c&aacute;c vấn đề sức khỏe quan trọng như lối sống l&agrave;nh mạnh, tăng cường sức đề kh&aacute;ng, gi&aacute;o dục sơ cứu,&hellip; v&agrave; nhiều thứ nữa.</p>\r\n\r\n<p>Đặc biệt, nếu bạn truyền tải những th&ocirc;ng điệp sức khỏe l&agrave;nh mạnh v&agrave; hữu &iacute;ch. Kết hợp với hashtags kh&eacute;o l&eacute;o, nội dung của bạn sẽ được rất nhiều người ch&uacute; &yacute;.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những&nbsp;<strong>chiến lược content marketing</strong>&nbsp;chăm s&oacute;c sức khỏe rất được c&aacute;c tổ chức ưa chuộng. Tuy nhi&ecirc;n, bạn h&atilde;y nhớ chương tr&igrave;nh khuyến m&atilde;i n&ecirc;n đi sau những nội dung c&oacute; t&iacute;nh cung cấp th&ocirc;ng tin, gi&aacute;o dục hoặc th&ocirc;ng b&aacute;o về dịch vụ. Những c&aacute;ch l&agrave;m nội dung b&ecirc;n tr&ecirc;n c&oacute; thể gi&uacute;p n&acirc;ng cao nhận thức của cộng đồng về một vấn đề sức khỏe đang được n&oacute;i đến. V&agrave; cũng đồng thời l&agrave;m nổi bật dịch vụ của c&ocirc;ng ty dược phẩm, bệnh viện, ph&ograve;ng kh&aacute;m, thẩm mỹ,&hellip;</p>\r\n\r\n<p>Bạn c&oacute; những mẹo hay n&agrave;o khi l&agrave;m nội dung tiếp thị lĩnh vực sức khỏe? H&atilde;y chia sẻ với ch&uacute;ng t&ocirc;i nh&eacute;!</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/asian-female-doctor-having-medical-webinar-with-her-team-working-using-laptop_67155-27354.jpg\" style=\"width: 826px; height: 551px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Giới thiệu đội ngũ Content MIG</span></h2>\r\n\r\n<p>Với nhiều năm hoạt động trong lĩnh vực&nbsp;<strong>Digital Marketing</strong>&nbsp;tại TP.HCM, MIG&nbsp;tự h&agrave;o c&oacute; một đội ngũ chuy&ecirc;n gia gi&agrave;u kinh nghiệm trong việc x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh chăm s&oacute;c sức khỏe. B&ecirc;n cạnh đ&oacute;, sự nhạy b&eacute;n v&agrave; năng lực s&aacute;ng tạo l&agrave; một trong những yếu tố trọng t&acirc;m tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng cho c&aacute;c dự &aacute;n của MIG.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n tự đề ra cho m&igrave;nh những nguy&ecirc;n tắc v&agrave; quy tr&igrave;nh cụ thể. Trong đ&oacute;, nghi&ecirc;n cứu sản phẩm &ndash; dịch vụ của kh&aacute;ch h&agrave;ng, nghi&ecirc;n cứu thị trường, nghi&ecirc;n cứu v&agrave; ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng mục ti&ecirc;u l&agrave; một trong những quy tr&igrave;nh cực kỳ quan trọng kh&ocirc;ng được ph&eacute;p bỏ qua.&nbsp;</p>\r\n\r\n<p>Dựa tr&ecirc;n sự am hiểu v&agrave; vận dụng c&aacute;c thuật to&aacute;n của Google một c&aacute;ch linh hoạt v&agrave; hiệu quả, MIG&nbsp;c&ograve;n tạo ra những mẫu content ph&ugrave; hợp, vừa đ&aacute;p ứng c&aacute;c điều kiện của Google, vừa nhắm đ&uacute;ng kh&aacute;ch h&agrave;ng mục ti&ecirc;u.</p>\r\n\r\n<p>V&agrave; đặc biệt, MIG&nbsp;đến với kh&aacute;ch h&agrave;ng bằng sự tận t&acirc;m, th&aacute;i độ tử tế v&agrave; tinh thần tr&aacute;ch nhiệm cao. Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng bạn để đưa ra những giải ph&aacute;p tối ưu bằng nghiệp vụ chuy&ecirc;n s&acirc;u v&agrave; kh&aacute;c biệt. MIG&nbsp;cam kết sẽ gi&uacute;p bạn x&acirc;y dựng một chiến lược content marketing đầy đột ph&aacute; nhằm gia tăng lượt truy cập v&agrave; cải thiện hiệu quả b&aacute;n h&agrave;ng tối đa.</p>\r\n\r\n<p>Để được tư vấn th&ecirc;m về c&aacute;ch x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh dược, bạn h&atilde;y li&ecirc;n hệ với MIG&nbsp;ngay h&ocirc;m nay. Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn 24/7.</p>\r\n', '', '6-cach-trien-khai-content-marketing-cham-soc-suc-khoe-hieu-qua', '/backend/web/uploads/images/Tin-tuc/H4.png', NULL, 1, 1, 18, 0, '', NULL, '6 cách triển khai Content Marketing chăm sóc sức khỏe hiệu quả', 'Công ty của bạn đang hoạt động trong lĩnh vực chăm sóc sức khỏe và bạn muốn làm content marketing sao cho thật hiệu quả. Dưới đây là 5 cách làm Content Marketing cho ngành chăm sóc sức khỏe tuyệt vời để bạn: Thu hút đông đảo khách hàng, xây dựng niềm tin bền vững và có riêng một cộng đồng lớn mạnh.', 'Content marketing, Digital marketing, ngành dược, marketing ngành dược', '2024-05-28 11:01:39'),
(137, 24, 'Lý do ngành Dược nên làm Video Marketing ', '', '<p>Gần đ&acirc;y khi bạn lướt Facebook, c&oacute; phải bạn nh&igrave;n thấy nhiều video li&ecirc;n quan đến dược phẩm hay việc chăm s&oacute;c sức khỏe hay kh&ocirc;ng? Điều đ&oacute; chứng tỏ&nbsp;<strong>Video Marketing</strong>&nbsp;đang trở th&agrave;nh một xu hướng nội dung quan trọng trong chiến lược marketing của ng&agrave;nh dược phẩm. Tại sao Video Content lại hiệu quả trong ng&agrave;nh dược? H&atilde;y c&ugrave;ng t&igrave;m hiểu qua b&agrave;i viết dưới đ&acirc;y bạn nh&eacute;!</p>\r\n', '', '<p>Gần đ&acirc;y khi bạn lướt Facebook, c&oacute; phải bạn nh&igrave;n thấy nhiều video li&ecirc;n quan đến dược phẩm hay việc chăm s&oacute;c sức khỏe hay kh&ocirc;ng? Điều đ&oacute; chứng tỏ&nbsp;<strong>Video Marketing</strong>&nbsp;đang trở th&agrave;nh một xu hướng nội dung quan trọng trong chiến lược marketing của ng&agrave;nh dược phẩm. Tại sao Video Content lại hiệu quả trong ng&agrave;nh dược? H&atilde;y c&ugrave;ng t&igrave;m hiểu qua b&agrave;i viết dưới đ&acirc;y bạn nh&eacute;!</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Video Marketing l&agrave; xu thế tất yếu của ng&agrave;nh dược phẩm</span></h2>\r\n\r\n<p>Dịch covid-19 đ&atilde; l&agrave;m thay đổi s&acirc;u sắc c&aacute;ch thức mua sắm của ch&uacute;ng ta. Hầu hết mọi người đ&atilde; biết mua h&agrave;ng qua mạng v&agrave; ng&agrave;y c&agrave;ng nhận thức r&otilde; ưu điểm của h&igrave;nh thức n&agrave;y. Hầu như mọi doanh nghiệp kh&ocirc;ng thể thờ ơ trước sự dịch chuyển n&agrave;y, kể cả ng&agrave;nh dược phẩm.</p>\r\n\r\n<p>Thời đại c&ocirc;ng nghệ 4.0 đ&atilde; cho thấy sự vượt trội của internet, c&aacute;c thiết bị di động, smart phone v&agrave; nhiều ti&ecirc;u ch&iacute; kỹ thuật số kh&aacute;c. Mạng 5G đ&atilde; xuất hiện với tốc độ cao, khả năng truyền tải video mượt m&agrave;&hellip;. C&oacute; rất nhiều yếu tố đang t&aacute;c động mạnh đến chiến lược tiếp thị nội dung kh&ocirc;ng chỉ trong ri&ecirc;ng ng&agrave;nh dược phẩm.</p>\r\n\r\n<p>Năm 2020, nhiều chuy&ecirc;n gia đ&atilde; dự đo&aacute;n&nbsp;<strong>Video Marketing</strong>&nbsp;sẽ l&agrave; xu hướng tiếp thị nội dung chủ đạo của ng&agrave;nh dược trong năm 2021 v&agrave; sau đ&oacute;.</p>\r\n\r\n<p>Theo c&aacute;c b&aacute;o c&aacute;o chuy&ecirc;n s&acirc;u cho thấy, kh&aacute;ch h&agrave;ng (bệnh nh&acirc;n) tương t&aacute;c với Video Marketing dược phẩm (v&agrave; c&aacute;c sản phẩm/dịch vụ y tế) cao hơn nhiều so với những c&aacute;ch tiếp thị truyền thống. Khoảng 39% số người bệnh đặt lịch hẹn sau khi xem video li&ecirc;n quan đến chăm s&oacute;c sức khỏe. Cộng th&ecirc;m dịch covid-19 mọi người sẽ cần sự hỗ trợ của những video hướng dẫn từ xa. Chăm s&oacute;c trực tuyến cũng sẽ v&igrave; vậy m&agrave; trở n&ecirc;n phổ biến kể cả sau dịch.</p>\r\n\r\n<p>Giao tiếp dễ d&agrave;ng &ndash; rẻ - thuận tiện &ndash; Đ&oacute; l&agrave; những thế mạnh của chiến lược tiếp thị nội dung ng&agrave;nh dược bằng video kỹ thuật số. H&atilde;y sử dụng những c&acirc;u chuyện li&ecirc;n quan đến người bệnh để s&aacute;ng tạo n&ecirc;n những video h&uacute;t kh&aacute;ch. V&agrave; nếu kh&ocirc;ng muốn bị tụt lại ph&iacute;a sau, h&atilde;y sớm đầu tư những video chất lượng cho mọi hoạt động trong ng&agrave;nh dược. D&ugrave; l&agrave; chiến lược tiếp thị, gi&aacute;o dục, hướng dẫn, đ&agrave;o tạo hay nh&acirc;n sự.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/young-asia-male-doctor-white-medical-uniform-using-laptop-talking-video-conference-call-with-senior-doctor-desk-health-clinic-hospital.jpg\" style=\"width: 900px; height: 506px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">L&yacute; do Video Marketing hiệu quả đối với ng&agrave;nh dược</span></h2>\r\n\r\n<p>Đối với người ti&ecirc;u d&ugrave;ng c&aacute;c sản phẩm dược phẩm, video marketing mang đến những nguồn tin tức hữu dụng hơn rất nhiều so với c&aacute;c c&aacute;ch quảng c&aacute;o trước đ&acirc;y. V&agrave; dưới đ&acirc;y ch&iacute;nh l&agrave; những l&yacute; do m&agrave;&nbsp;<strong>Video Marketing</strong>&nbsp;trở n&ecirc;n hữu &iacute;ch đối với ng&agrave;nh dược phẩm.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">Video Marketing ng&agrave;nh dược đem đến những hướng dẫn hiệu quả từ xa</span></h3>\r\n\r\n<p>Được hướng dẫn điều trị từ xa bởi một b&aacute;c sĩ hoặc tốt nhất l&agrave; vị b&aacute;c sĩ đ&oacute; đang live stream để chỉ dẫn cụ thể hơn cho người d&ugrave;ng. Đ&oacute; l&agrave; một trải nghiệm tuyệt vời trong những t&igrave;nh huống khẩn cấp m&agrave; bạn lại kh&ocirc;ng thể đi kh&aacute;m b&aacute;c sĩ ngay được hay những t&igrave;nh huống cần xử l&yacute; sơ cứu ngay tại chỗ.</p>\r\n\r\n<p>Th&ocirc;ng qua c&aacute;c video kỹ thuật số (online hoặc offline), bệnh nh&acirc;n đều sẽ nhận được những th&ocirc;ng tin cực kỳ hữu &iacute;ch. Họ được gi&aacute;o dục một c&aacute;ch trực quan &ndash; trực tiếp &ndash; sinh động v&agrave; c&oacute; thể thực h&agrave;nh được. V&iacute; dụ như video b&aacute;c sĩ hướng dẫn tập thở cho người nhiễm covid-19 chẳng hạn. Người bệnh c&oacute; thể xem v&agrave; thực hiện ngay được m&agrave; kh&ocirc;ng cần đi bệnh viện để được nh&acirc;n vi&ecirc;n y tế hướng dẫn.</p>\r\n\r\n<p>Video cũng l&agrave; một k&ecirc;nh kết nối mạnh mẽ giữa c&aacute;c chuy&ecirc;n gia với nhau, họ c&oacute; thể c&ugrave;ng nhau hội chẩn để gi&uacute;p đỡ những người bệnh kh&ocirc;ng c&oacute; điều kiện chữa trị ở bệnh viện.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">Video Marketing ng&agrave;nh dược kết nối bệnh nh&acirc;n một c&aacute;ch tự nhi&ecirc;n</span></h3>\r\n\r\n<p>Video c&oacute; nh&acirc;n vật ch&iacute;nh l&agrave; một người bệnh, họ chia sẻ thẳng thắn vấn đề của m&igrave;nh (thường th&igrave; &iacute;t ai th&iacute;ch n&oacute;i về t&igrave;nh h&igrave;nh sức khỏe của bản th&acirc;n nếu n&oacute; tồi tệ). Sau đ&oacute; họ n&oacute;i đến những sản phẩm bản th&acirc;n đ&atilde; sử dụng v&agrave; n&oacute; đem lại hiệu quả như thế n&agrave;o.</p>\r\n\r\n<p>Đ&oacute; l&agrave; một dạng video chứng thực c&oacute; nh&acirc;n vật thực sự, c&oacute; sản phẩm thực sự. Họ d&aacute;m chia sẻ những điều giấu k&iacute;n về sức khỏe, họ trải l&ograve;ng, họ chấp nhận sự tổn thương. C&ograve;n h&igrave;nh thức tiếp thị n&agrave;o c&oacute; thể chinh phục kh&aacute;ch h&agrave;ng s&acirc;u sắc hơn&nbsp;<strong>Video Marketing ng&agrave;nh dược</strong>? So s&aacute;nh với content marketing bạn sẽ thấy r&otilde; rệt sự ch&ecirc;nh lệch ở mức độ n&agrave;o.</p>\r\n\r\n<p>Bản th&acirc;n người xem cũng đang gặp chứng bệnh hoặc triệu chứng tương tự hoặc họ biết ai đ&oacute; cũng đang bị bệnh như thế. Cũng sẽ dễ d&agrave;ng tin tưởng v&agrave;o sản phẩm, muốn d&ugrave;ng thử v&agrave; sẵn s&agrave;ng giới thiệu cho người th&acirc;n nếu họ d&ugrave;ng hiệu quả.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/portrait-doctor-video-conferencing-clinic.jpg\" style=\"width: 900px; height: 720px;\" /></p>\r\n\r\n<h3><span style=\"color:#0000cc;\">Video Marketing ng&agrave;nh dược ph&ugrave; hợp với một lực lượng lớn kh&aacute;n giả tr&ecirc;n YouTube</span></h3>\r\n\r\n<p>Theo c&aacute;c thống k&ecirc; cho thấy, c&oacute; một lượng kh&aacute;n giả lớn tr&ecirc;n YouTube quan t&acirc;m đặc biệt đến những video y tế, chăm s&oacute;c sức khỏe, dược phẩm, thực phẩm chức năng. Họ thuộc nh&oacute;m người Gen X (36 &ndash; 49 tuổi) v&agrave; thế hệ Baby Boomers (50-65 tuổi). C&oacute; khoảng 73% số người trong hai nh&oacute;m n&agrave;y t&igrave;m kiếm từ kh&oacute;a video &ldquo;how to&rdquo; (l&agrave;m thế n&agrave;o). V&iacute; dụ như &ldquo;l&agrave;m sao để x&oacute;a nếp nhăn tuổi trung ni&ecirc;n&rdquo;, &ldquo;l&agrave;m sao để giảm v&ograve;ng eo&rdquo;, &ldquo;l&agrave;m sao để ngủ ngon hơn&rdquo;,&hellip;</p>\r\n\r\n<p>Khi người l&agrave;m tiếp thị nội dung ng&agrave;nh dược phẩm tận dụng tốt th&ocirc;ng tin n&agrave;y để tạo ra những video c&oacute; t&iacute;nh hướng dẫn, n&ecirc;u bật những giải ph&aacute;p hữu &iacute;ch nhất d&agrave;nh cho những vấn đề m&agrave; người d&ugrave;ng mục ti&ecirc;u tr&ecirc;n YouTube quan t&acirc;m. Như vậy, bất kỳ chiến lược video marketing dược phẩm n&agrave;o của bạn cũng dễ th&agrave;nh c&ocirc;ng hơn.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">Video dược phẩm cũng quan trọng ở kh&acirc;u đ&agrave;o tạo</span></h3>\r\n\r\n<p>Doanh nghiệp dược phẩm muốn đổi mới hoạt động đ&agrave;o tạo nh&acirc;n sự, xu hướng l&agrave;m việc từ xa đang tạo ra một lợi thế cho c&aacute;c&nbsp;<strong>video marketing ng&agrave;nh dược</strong>&nbsp;ph&aacute;t triển. C&ocirc;ng ty dược c&oacute; thể sử dụng những video n&agrave;y để đ&agrave;o tạo nh&acirc;n sự trực tuyến.</p>\r\n\r\n<p>Một tổ chức kinh doanh ng&agrave;nh dược phẩm sẽ được hưởng lợi mạnh mẽ từ những video marketing. Một hướng đi tất yếu của ng&agrave;nh li&ecirc;n quan đến chăm s&oacute;c sức khỏe đang được đ&ocirc;ng đảo mọi người quan t&acirc;m hiện nay.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Đội ngũ Content Marketing của MIG</span></h2>\r\n\r\n<p>Với nhiều năm hoạt động trong lĩnh vực Digital Marketing tại TP.HCM, MIG&nbsp;tự h&agrave;o c&oacute; một đội ngũ chuy&ecirc;n gia gi&agrave;u kinh nghiệm trong việc x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh dược. B&ecirc;n cạnh đ&oacute;, sự nhạy b&eacute;n v&agrave; năng lực s&aacute;ng tạo l&agrave; một trong những yếu tố trọng t&acirc;m tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng cho c&aacute;c dự &aacute;n của&nbsp;MIG .</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n tự đề ra cho m&igrave;nh những nguy&ecirc;n tắc v&agrave; quy tr&igrave;nh cụ thể. Trong đ&oacute;, nghi&ecirc;n cứu sản phẩm &ndash; dịch vụ của kh&aacute;ch h&agrave;ng, nghi&ecirc;n cứu thị trường, nghi&ecirc;n cứu v&agrave; ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng mục ti&ecirc;u l&agrave; một trong những quy tr&igrave;nh cực kỳ quan trọng kh&ocirc;ng được ph&eacute;p bỏ qua.&nbsp;</p>\r\n\r\n<p>Dựa tr&ecirc;n sự am hiểu v&agrave; vận dụng c&aacute;c thuật to&aacute;n của Google một c&aacute;ch linh hoạt v&agrave; hiệu quả, MIG&nbsp;c&ograve;n tạo ra những mẫu content ph&ugrave; hợp, vừa đ&aacute;p ứng c&aacute;c điều kiện của Google, vừa nhắm đ&uacute;ng kh&aacute;ch h&agrave;ng mục ti&ecirc;u.</p>\r\n\r\n<p>V&agrave; đặc biệt, MIG&nbsp;đến với kh&aacute;ch h&agrave;ng bằng sự tận t&acirc;m, th&aacute;i độ tử tế v&agrave; tinh thần tr&aacute;ch nhiệm cao. Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng bạn để đưa ra những giải ph&aacute;p tối ưu bằng nghiệp vụ chuy&ecirc;n s&acirc;u v&agrave; kh&aacute;c biệt. MIG&nbsp;cam kết sẽ gi&uacute;p bạn x&acirc;y dựng một chiến lược content marketing đầy đột ph&aacute; nhằm gia tăng lượt truy cập v&agrave; cải thiện hiệu quả b&aacute;n h&agrave;ng tối đa.</p>\r\n\r\n<p>Để được tư vấn th&ecirc;m về c&aacute;ch x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh dược, bạn h&atilde;y li&ecirc;n hệ với MIG&nbsp;ngay h&ocirc;m nay. Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn 24/7.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'ly-do-nganh-duoc-nen-lam-video-marketing', '/backend/web/uploads/images/Tin-tuc/H3.png', NULL, 1, 1, 17, 0, 'video marketing,content marketing,video marketing ngành dược,content marketing ngành dược,triển khai video marketing cho ngành dược', 'video-marketing,content-marketing,video-marketing-nganh-duoc,content-marketing-nganh-duoc,trien-khai-video-marketing-cho-nganh-duoc', 'LÝ DO NGÀNH DƯỢC NÊN LÀM VIDEO MARKETING', 'Gần đây khi bạn lướt Facebook, có phải bạn nhìn thấy nhiều video liên quan đến dược phẩm hay việc chăm sóc sức khỏe hay không? Điều đó chứng tỏ Video Marketing đang trở thành một xu hướng nội dung quan trọng trong chiến lược marketing của ngành dược phẩm.', 'video marketing, marketing ngành dược, digital marketing, content marketing, seo', '2024-05-28 10:56:45');
INSERT INTO `posts` (`id`, `parent`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `slug`, `image`, `icon`, `status`, `feature`, `views`, `number`, `tag`, `tag_compare`, `title`, `description`, `keyword`, `created_date`) VALUES
(138, 23, 'Samsung: Phát triển chương trình Quà tặng Galaxy', '', '<p>Cung cấp cho người ti&ecirc;u d&ugrave;ng những ưu đ&atilde;i hấp dẫn v&agrave; phiếu giảm gi&aacute; với ứng dụng Galaxy Gift v&agrave; shopMORE trong điện thoại th&ocirc;ng minh v&agrave; m&aacute;y t&iacute;nh bảng Samsung. Dự &aacute;n được điều h&agrave;nh bởi MIG/SRC,được bắt đầu từ t&igrave;m nguồn cung ứng thương mại đến ph&aacute;t triển ứng dụng v&agrave; tiếp thị lan truyền.</p>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"Samsung: Phát triển chương trình Quà tặng Galaxy\" src=\"https://file.hstatic.net/200000561203/file/z3790559021136_2e02dcdb8d2887d6682a5e02cc788534_569e10881dfb4e1f8e7e667b2c1d9cc9_1024x1024.jpg\" /></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Tổng&nbsp;quan:</strong>&nbsp;</span>Samsung muốn tặng qu&agrave; miễn ph&iacute; cho người ti&ecirc;u d&ugrave;ng để người d&ugrave;ng của Samsung c&oacute; thể được hưởng c&aacute;c ưu đ&atilde;i đặc quyền của c&aacute;c nh&atilde;n hiệu hợp t&aacute;c Samsung tại Việt Nam.</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Giải&nbsp;ph&aacute;p:</strong></span>&nbsp;Cung cấp cho người ti&ecirc;u d&ugrave;ng những ưu đ&atilde;i hấp dẫn v&agrave; phiếu giảm gi&aacute; với ứng dụng Galaxy Gift v&agrave; shopMORE trong điện thoại th&ocirc;ng minh v&agrave; m&aacute;y t&iacute;nh bảng Samsung. Dự &aacute;n được điều h&agrave;nh bởi MIG,được bắt đầu từ t&igrave;m nguồn cung ứng thương mại đến ph&aacute;t triển ứng dụng v&agrave; tiếp thị lan truyền.</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>T&aacute;c&nbsp;động:</strong></span>&nbsp;Ứng dụng tạo ra một tiếng vang lớn trong cộng đồng người d&ugrave;ng Samsung: hơn 85.000 người d&ugrave;ng trong v&ograve;ng 06 th&aacute;ng v&agrave; 50% phiếu giảm gi&aacute; đang hoạt động</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Một số h&igrave;nh ảnh về dự &aacute;n:</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Samsung: Phát triển chương trình Quà tặng Galaxy\" src=\"https://file.hstatic.net/200000561203/file/dua-an-qua-tang-galaxy_b41ba2708c404837add99ca31242221a.png\" /></p>\r\n', '', 'samsung-phat-trien-chuong-trinh-qua-tang-galaxy', '/backend/web/uploads/images/du-an/qua-tang-galaxy.jpg', NULL, 1, 0, 26, 0, '', NULL, 'Samsung: Phát triển chương trình Quà tặng Galaxy', '', 'Cung cấp cho người tiêu dùng những ưu đãi hấp dẫn và phiếu giảm giá với ứng dụng Galaxy Gift và shopMORE trong điện thoại thông minh và máy tính bảng Samsung. Dự án được điều hành bởi MIG/SRC,được bắt đầu từ tìm nguồn cung ứng thương mại đến phát triển ứng dụng và tiếp thị lan truyền.', '2024-05-22 10:14:21'),
(139, 23, 'Dự án Tài Chính tích hợp ', '', '<p>Kh&aacute;ch h&agrave;ng: Aizen Credit, Mcredit</p>\r\n\r\n<p>C&ocirc;ng việc triển khai:</p>\r\n\r\n<ul>\r\n	<li>Ph&aacute;t triển kh&aacute;ch mở hồ sơ</li>\r\n	<li>Ph&aacute;t triển đối t&aacute;c li&ecirc;n kết giới thiệu hồ sơ</li>\r\n	<li>K&ecirc;nh triển khai: Tele-sales / Digital / Field-sales</li>\r\n</ul>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"Các dự án khác\" src=\"https://file.hstatic.net/200000561203/file/tc3-banner_slider_cf43ad7ccc634ea4a91f4eff5a6927c8.jpg\" /></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Th&ocirc;ng tin dự &aacute;n:&nbsp;</strong></span></p>\r\n\r\n<p>- Kh&aacute;ch h&agrave;ng: Aizen Credit, Mcredit</p>\r\n\r\n<p>- C&ocirc;ng việc triển khai:</p>\r\n\r\n<ul>\r\n	<li>Ph&aacute;t triển kh&aacute;ch mở hồ sơ</li>\r\n	<li>Ph&aacute;t triển đối t&aacute;c li&ecirc;n kết giới thiệu hồ sơ</li>\r\n</ul>\r\n\r\n<p>- K&ecirc;nh triển khai: Tele-sales / Digital / Field-sales</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>C&aacute;c kh&aacute;ch h&agrave;ng đ&atilde; hợp t&aacute;c:</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Các dự án khác\" src=\"https://file.hstatic.net/200000561203/file/tc3_post-image-768x512_20738374956a47e9868fd1cfef0fdb89_large.jpg\" /></p>\r\n', '', 'du-an-tai-chinh-tich-hop', '/backend/web/uploads/images/du-an/3563-aizem.png', NULL, 1, 0, 23, 0, '', NULL, 'Dự án Tài Chính tích hợp ', 'Triển khai các dịch vụ:Tele-sales / Digital / Field-sales cho các khách hàng Aizen Credit, Mcredit', 'Telesales, Digital Marketing, Chăm sóc khách hàng ', '2024-05-22 10:21:49'),
(140, 23, 'Các dự án phát triển khách hàng mới: FE Credit, MB Bank, VIB, UOB, đđ, Cash24, Kim An', '', '<p>- Kh&aacute;ch h&agrave;ng: FE Credit, MB Bank, VIB, UOB, đđ, Cash24, Kim An, v.v</p>\r\n\r\n<p>- C&ocirc;ng việc triển khai:</p>\r\n\r\n<ul>\r\n	<li>Ph&aacute;t triển thẻ t&iacute;n dụng</li>\r\n	<li>Ph&aacute;t triển kh&aacute;ch mở hồ sơ</li>\r\n</ul>\r\n\r\n<p>- K&ecirc;nh triển khai: Tele-sales &amp; Digital</p>\r\n', '', '<section>\r\n<article itemscope=\"\" itemtype=\"http://schema.org/Article\">\r\n<p style=\"text-align: center;\"><img alt=\"Các dự án phát triển khách hàng mới\" src=\"https://file.hstatic.net/200000561203/file/tc2-banner_slider_0cac7244cb73472bb4731a21dfed8997.jpg\" /></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Th&ocirc;ng tin dự &aacute;n</strong></span></p>\r\n\r\n<p>- Kh&aacute;ch h&agrave;ng: FE Credit, MB Bank, VIB, UOB, đđ, Cash24, Kim An, v.v</p>\r\n\r\n<p>- C&ocirc;ng việc triển khai:</p>\r\n\r\n<ul>\r\n	<li>Ph&aacute;t triển thẻ t&iacute;n dụng</li>\r\n	<li>Ph&aacute;t triển kh&aacute;ch mở hồ sơ</li>\r\n</ul>\r\n\r\n<p>- K&ecirc;nh triển khai: Tele-sales &amp; Digital</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Một số kh&aacute;ch h&agrave;ng MIG/SRC đ&atilde; hợp t&aacute;c:</strong></span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Các dự án phát triển khách hàng mới\" src=\"https://file.hstatic.net/200000561203/file/tc2_post-image-768x512__1__d2d8e33bdbed4599aff4ec9f83f3b679_large.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&nbsp;</h2>\r\n</article>\r\n</section>\r\n', '', 'cac-du-an-phat-trien-khach-hang-moi-fe-credit-mb-bank-vib-uob-dd-cash24-kim-an', '/backend/web/uploads/images/du-an/image1-39.jpg', NULL, 1, 0, 23, 0, '', NULL, 'Các dự án phát triển khách hàng mới: FE Credit, MB Bank, VIB, UOB, đđ, Cash24, Kim An', '- Khách hàng: FE Credit, MB Bank, VIB, UOB, đđ, Cash24, Kim An, v.v\r\n- Công việc triển khai: Phát triển thẻ tín dụng; Phát triển khách mở hồ sơ\r\n- Kênh triển khai: Tele-sales & Digital', 'Tài chính ngân hàng, phát triển khách hàng, chăm sóc khách hàng', '2024-05-22 10:34:36'),
(141, 23, 'Các dự án phát triển đối tác liên kết', '', '<p>- Kh&aacute;ch h&agrave;ng: JCB, Vietbank, Monpay, Toro, Webmoney,v.v</p>\r\n\r\n<p>- C&ocirc;ng việc triển khai:</p>\r\n\r\n<ul>\r\n	<li>Ph&aacute;t triển đối t&aacute;c li&ecirc;n kết ưu đ&atilde;i cho chủ thẻ ng&acirc;n h&agrave;ng</li>\r\n	<li>Ph&aacute;t triển đối t&aacute;c li&ecirc;n kết chấp nhận l&agrave;m điểm thanh to&aacute;n</li>\r\n	<li>Ph&aacute;t triển đối t&aacute;c li&ecirc;n kết giới thiệu chương tr&igrave;nh mở thẻ,v.v</li>\r\n</ul>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"Các dự án phát triển đối tác liên kết\" src=\"https://file.hstatic.net/200000561203/file/tc1-banner_slider_eaab6c352e1d4caa823628a0ede6cedc.jpg\" /></p>\r\n\r\n<p><span style=\"color:#0000cc;\"></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Th&ocirc;ng tin dự &aacute;n</strong></span></p>\r\n\r\n<p>- Kh&aacute;ch h&agrave;ng: JCB, Vietbank, Monpay, Toro, Webmoney,v.v</p>\r\n\r\n<p>- C&ocirc;ng việc triển khai:</p>\r\n\r\n<ul>\r\n	<li>Ph&aacute;t triển đối t&aacute;c li&ecirc;n kết ưu đ&atilde;i cho chủ thẻ ng&acirc;n h&agrave;ng</li>\r\n	<li>Ph&aacute;t triển đối t&aacute;c li&ecirc;n kết chấp nhận l&agrave;m điểm thanh to&aacute;n</li>\r\n	<li>Ph&aacute;t triển đối t&aacute;c li&ecirc;n kết giới thiệu chương tr&igrave;nh mở thẻ,v.v</li>\r\n</ul>\r\n\r\n<p><span style=\"color:#0000cc;\">Một số kh&aacute;ch h&agrave;ng đ&atilde; hợp t&aacute;c:</span></p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"Các dự án phát triển đối tác liên kết\" src=\"https://file.hstatic.net/200000561203/file/tc1_post-image__1__1ed3f1b55eb34e59b8db9d2b9b7317b0_large.jpg\" /></p>\r\n', '', 'cac-du-an-phat-trien-doi-tac-lien-ket', '/backend/web/uploads/images/du-an/pexels-gabby-k-5849559.jpg', NULL, 1, 0, 28, 0, '', NULL, 'Các dự án phát triển đối tác liên kết', 'Phát triển đối tác liên kết ưu đãi cho chủ thẻ ngân hàng.  Phát triển đối tác liên kết chấp nhận làm điểm thanh toán. Phát triển đối tác liên kết giới thiệu chương trình mở thẻ,v.v', 'Phát triển đối tác liên kết', '2024-05-22 10:57:06'),
(142, 23, 'OPV Pharma: Chương trình Activation phát triển dự án Game trên thiết bị di động để tăng doanh số', '', '<p>MIG/SRC tự h&agrave;o v&igrave; đ&atilde; được hợp t&aacute;c c&ugrave;ng OPV Pharma để thực hiện dự &aacute;n Activation ph&aacute;t triển dự &aacute;n Game tr&ecirc;n thiết bị di động để tăng doanh số cho thương hiệu. Với đội ngũ nh&acirc;n sự gi&agrave;u kinh nghiệm, MIG/SRC Team đ&atilde; mang đến những kết quả nổi bật cho dự &aacute;n. Dưới đ&acirc;y l&agrave; một số h&igrave;nh ảnh từ dự &aacute;n:</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '<p>MIG/SRC tự h&agrave;o v&igrave; đ&atilde; được hợp t&aacute;c c&ugrave;ng OPV Pharma để thực hiện dự &aacute;n Activation ph&aacute;t triển dự &aacute;n Game tr&ecirc;n thiết bị di động để tăng doanh số cho thương hiệu. Với đội ngũ nh&acirc;n sự gi&agrave;u kinh nghiệm, MIG/SRC Team đ&atilde; mang đến những kết quả nổi bật cho dự &aacute;n. Dưới đ&acirc;y l&agrave; một số h&igrave;nh ảnh từ dự &aacute;n:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"OPV Pharma: Chương trình Activation phát triển dự án Game trên thiết bị di động để tăng doanh số\" src=\"https://file.hstatic.net/200000561203/file/activation_-_du_an_game_7e0d2001a154458cae2f26c5e0af77d9.png\" /></p>\r\n', '', 'opv-pharma-chuong-trinh-activation-phat-trien-du-an-game-tren-thiet-bi-di-dong-de-tang-doanh-so', '/backend/web/uploads/images/du-an/opv_activation.jpg', NULL, 1, 0, 34, 0, 'Tags : dự án game,phát triển dự án game cho OPV pharma,dự án OPV pharma', 'Tags-:-du-an-game,phat-trien-du-an-game-cho-OPV-pharma,du-an-OPV-pharma', 'OPV Pharma: Chương trình Activation phát triển dự án Game trên thiết bị di động để tăng doanh số', 'MIG/SRC tự hào vì đã được hợp tác cùng OPV Pharma để thực hiện dự án Activation phát triển dự án Game trên thiết bị di động để tăng doanh số cho thương hiệu. Với đội ngũ nhân sự giàu kinh nghiệm, MIG/SRC Team đã mang đến những kết quả nổi bật cho dự án.', 'Phát triển Website, Thiết kế Game', '2024-05-22 11:07:12'),
(143, 23, 'Sữa Nhật Glico ICREO: Phát triển nội dung & Sản Xuất', '', '<p>MIG/SRC tự h&agrave;o v&igrave; đ&atilde; được hợp t&aacute;c c&ugrave;ng Glico trong dự &aacute;n Ph&aacute;t triển nội dung &amp; Sản xuất ấn phẩm truyền th&ocirc;ng.</p>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"Sữa Nhật Glico ICREO: Phát triển nội dung &amp; Sản Xuất\" src=\"https://file.hstatic.net/200000561203/file/combosua-ecom-lazada-shopee_53c639954a4049909de99bbf92485acf_1024x1024.png\" /></p>\r\n\r\n<p>MIG/SRC tự h&agrave;o v&igrave; đ&atilde; được hợp t&aacute;c c&ugrave;ng Glico trong dự &aacute;n Ph&aacute;t triển nội dung &amp; Sản xuất ấn phẩm truyền th&ocirc;ng.&nbsp;Tại dự &aacute;n n&agrave;y, Team&nbsp;MIG/SRC đ&atilde; triển khai c&aacute;c hoạt động:</p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>1. BI&Ecirc;N SOẠN NỘI DUNG CẨM NANG</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>2. THIẾT KẾ</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>3. XIN PH&Eacute;P XUẤT BẢN</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>4. IN ẤN</strong></span></p>\r\n\r\n<p><span style=\"color:#0000cc;\"><strong>Một số h&igrave;nh ảnh của dự &aacute;n:</strong></span></p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;<img alt=\"Sữa Nhật Glico ICREO: Phát triển nội dung &amp; Sản Xuất\" src=\"https://file.hstatic.net/200000561203/file/picture6_5fc4ed364f064a95803721775f73509e_medium.png\" />&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;<img alt=\"Sữa Nhật Glico ICREO: Phát triển nội dung &amp; Sản Xuất\" src=\"https://file.hstatic.net/200000561203/file/picture7_b713c58607f24eb1a358bd3f02ac4633_large.png\" />&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;</p>\r\n', '', 'sua-nhat-glico-icreo-phat-trien-noi-dung-san-xuat', '/backend/web/uploads/images/du-an/217992875_1427943677588536_2663277920663158516_n.jpg', NULL, 1, 0, 30, 0, '', NULL, 'Sữa Nhật Glico ICREO: Phát triển nội dung & Sản Xuất', 'MIG/SRC tự hào vì đã được hợp tác cùng Glico trong dự án Phát triển nội dung & Sản xuất ấn phẩm truyền thông.', 'Thiết kế ấn phẩm truyền thông, Design Marketing, Content Marketing', '2024-05-22 11:21:08'),
(144, 24, '8 điểm nhấn quan trọng trong chiến lược marketing ngành chăm sóc sức khỏe', '', '<p>Khi x&acirc;y dựng&nbsp;<strong>chiến lược marketing ng&agrave;nh chăm s&oacute;c sức khỏe</strong>, ngo&agrave;i việc hiểu r&otilde; kh&aacute;ch h&agrave;ng mục ti&ecirc;u của m&igrave;nh l&agrave; ai, ch&uacute;ng ta cũng cần nhạy b&eacute;n với thị trường để dự đo&aacute;n những biến động c&oacute; thể xảy ra trong tương lai, đặc biệt l&agrave; đối với ng&agrave;nh tiếp thị chăm s&oacute;c sức khỏe. B&agrave;i viết dưới đ&acirc;y, MIG sẽ tập trung một v&agrave;i kh&iacute;a cạnh trong tương lai của ng&agrave;nh marketing chăm s&oacute;c sức khỏe. Mời bạn đọc c&ugrave;ng tham khảo!</p>\r\n', '', '<p>Khi x&acirc;y dựng&nbsp;<strong>chiến lược marketing ng&agrave;nh chăm s&oacute;c sức khỏe</strong>, ngo&agrave;i việc hiểu r&otilde; kh&aacute;ch h&agrave;ng mục ti&ecirc;u của m&igrave;nh l&agrave; ai, ch&uacute;ng ta cũng cần nhạy b&eacute;n với thị trường để dự đo&aacute;n những biến động c&oacute; thể xảy ra trong tương lai, đặc biệt l&agrave; đối với ng&agrave;nh tiếp thị chăm s&oacute;c sức khỏe. B&agrave;i viết dưới đ&acirc;y, MIG sẽ tập trung một v&agrave;i kh&iacute;a cạnh trong tương lai của ng&agrave;nh marketing chăm s&oacute;c sức khỏe. Mời bạn đọc c&ugrave;ng tham khảo!</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">1. Dịch Covid-19 sẽ c&ograve;n ảnh hưởng k&eacute;o d&agrave;i đến mọi người,mọi ng&agrave;nh</span></h2>\r\n\r\n<p>Suốt hai năm 2020 v&agrave; 2021, đại dịch Covid-19 đ&atilde; g&acirc;y n&ecirc;n những hệ lụy v&ocirc; c&ugrave;ng nặng nề cho tất cả mọi ng&agrave;nh nghề v&agrave; lĩnh vực. Mặc d&ugrave; ở thời điểm hiện tại người d&acirc;n ở nhiều quốc gia đ&atilde; được ti&ecirc;m ph&ograve;ng để đẩy l&ugrave;i dịch bệnh. Tuy nhi&ecirc;n, những hậu quả của n&oacute; sẽ vẫn c&ograve;n k&eacute;o d&agrave;i, c&oacute; thể kể đến l&agrave; những biến chứng thường gặp hậu covid, sẽ c&oacute; t&igrave;nh trạng nặng, t&igrave;nh trạng nhẹ, nhưng &iacute;t ra n&oacute; đ&atilde; t&aacute;c động mạnh mẽ v&agrave; mang đến nhiều thay đổi lớn trong lĩnh vực chăm s&oacute;c sức khỏe.</p>\r\n\r\n<p>Vậy ch&uacute;ng ta cần phải l&agrave;m g&igrave; để th&iacute;ch ứng với những biến động trong ng&agrave;nh chăm s&oacute;c sức khỏe, khi bỗng một ng&agrave;y những điều bất ngờ k&eacute;o đến chen ngang v&agrave;o kế hoạch định sẵn? Để kh&ocirc;ng phải rơi v&agrave;o t&acirc;m thế thụ động trước mọi diễn biến c&oacute; thể xảy ra, ch&uacute;ng ta cần phải x&acirc;y dựng chiến lược marketing ng&agrave;nh chăm s&oacute;c sức khỏe đ&aacute;p ứng c&aacute;c ti&ecirc;u ch&iacute; sau:</p>\r\n\r\n<ul>\r\n	<li>Chiến lược marketing tăng trưởng d&agrave;i hạn v&agrave; lường trước mọi t&igrave;nh huống c&oacute; thể xảy ra</li>\r\n	<li>Đặc biệt đẩy mạnh truyền th&ocirc;ng v&agrave; mở rộng hệ thống ph&acirc;n phối online</li>\r\n	<li>Chiến lược marketing phải tạo ra nhu cầu cho kh&aacute;ch h&agrave;ng, khiến họ t&ograve; m&ograve; v&agrave; ra sự hứng th&uacute; cho kh&aacute;ch h&agrave;ng</li>\r\n	<li>Tập trung x&acirc;y dựng danh tiếng v&agrave; uy t&iacute;n thương hiệu để gia tăng niềm tin cho kh&aacute;ch h&agrave;ng</li>\r\n	<li>X&acirc;y dựng hệ thống nhận diện tốt, để lại ấn tượng mạnh so với c&aacute;c đối thủ cạnh tranh</li>\r\n	<li>Vẫn tập trung x&acirc;y dựng Truyền th&ocirc;ng v&agrave; quan hệ c&ocirc;ng ch&uacute;ng</li>\r\n	<li>S&aacute;ng tạo nhiều loại h&igrave;nh dịch vụ v&agrave; Chăm s&oacute;c kh&aacute;ch h&agrave;ng kh&aacute;c biệt</li>\r\n	<li>N&ecirc;n tối ưu việc tư vấn v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng bằng hệ thống CRM chất lượng</li>\r\n</ul>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/pexels-edward-jenner-4031867.jpg\" style=\"width: 900px; height: 600px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">2. Hướng đến truyền th&ocirc;ng hiệu quả</span></h2>\r\n\r\n<p>C&oacute; qu&aacute; nhiều th&ocirc;ng tin sai lệch được lan truyền tr&ecirc;n mạng x&atilde; hội, điều đ&oacute; dẫn đến những hậu quả kh&ocirc;n lường đối với sức khỏe. V&agrave; đại dịch Covid-19 đ&atilde; phơi b&agrave;y bộ mặt n&agrave;y, n&oacute; được xem như một lỗ hỗng truyền th&ocirc;ng của ng&agrave;nh chăm s&oacute;c sức khỏe.</p>\r\n\r\n<p>V&igrave; vậy, giờ đ&acirc;y c&aacute;c&nbsp;<a href=\"https://srcvn.com/pages/giai-phap-marketing\"><strong>chiến lược marketing ng&agrave;nh chăm s&oacute;c sức khỏe</strong></a>&nbsp;cần hướng đến mục ti&ecirc;u: Truyền th&ocirc;ng hiệu quả. B&acirc;y giờ l&agrave; cơ hội x&acirc;y dựng thương hiệu v&ocirc; c&ugrave;ng to lớn d&agrave;nh cho những đơn vị c&oacute; c&aacute;ch l&agrave;m marketing đ&uacute;ng đắn.</p>\r\n\r\n<p>H&atilde;y loại bỏ những nội dung sai lệch v&agrave; chứng minh thương hiệu của bạn uy t&iacute;n bằng c&aacute;ch đảm bảo 3 yếu tố:</p>\r\n\r\n<ul>\r\n	<li>Sự đồng cảm, thương cảm từ người d&ugrave;ng</li>\r\n	<li>Độ tin cậy v&agrave; ch&acirc;n thật của c&aacute;c th&ocirc;ng tin</li>\r\n	<li>Độ hữu &iacute;ch của những g&igrave; bạn cung cấp</li>\r\n</ul>\r\n\r\n<h2><span style=\"color:#0000cc;\">3. Ưu ti&ecirc;n h&agrave;ng đầu cho trải nghiệm của người bệnh</span></h2>\r\n\r\n<p>Sau đại dịch Covid-19, dịch vụ kh&aacute;m chữa bệnh từ xa hoặc đặt lịch hẹn online trở n&ecirc;n phổ biến hơn bao giờ hết. Giờ đ&acirc;y, c&aacute;c nh&agrave; l&agrave;m chiến lược marketing ng&agrave;nh chăm s&oacute;c sức khỏe cần tập trung v&agrave;o trải nghiệm của bệnh nh&acirc;n. L&agrave;m thế n&agrave;o để tối ưu mọi quy tr&igrave;nh của kh&aacute;ch h&agrave;ng như: t&igrave;m kiếm dịch vụ, cập nhật những thay đổi của c&aacute;c dịch vụ, đặt lịch kh&aacute;m, hỗ trợ từ xa,&hellip;</p>\r\n\r\n<p>H&atilde;y chủ động đem đến những trải nghiệm hữu &iacute;ch v&agrave; thuận tiện cho bệnh nh&acirc;n với một v&agrave;i v&iacute; dụ sau đ&acirc;y:</p>\r\n\r\n<ul>\r\n	<li>Cập nhật nội dung v&agrave; tất cả những thay đổi mới nhất l&ecirc;n trang web.</li>\r\n	<li>R&agrave; so&aacute;t lại hệ thống điện thoại tự động để tư vấn trực tuyến cho kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Trực tiếp gửi email giải quyết vấn đề cho từng bệnh nh&acirc;n cụ thể.</li>\r\n	<li>Cung cấp c&aacute;c trải nghiệm ứng dụng tr&ecirc;n thiết bị di động.</li>\r\n</ul>\r\n\r\n<h2><span style=\"color:#0000cc;\">4. Danh tiếng thương hiệu giống một con dao hai lưỡi</span></h2>\r\n\r\n<p>Việc x&acirc;y dựng danh tiếng của thương hiệu l&agrave; rất cần thiết, n&oacute; được v&iacute; như một nền m&oacute;ng vững chắc cho việc quảng b&aacute;, lan tỏa thương hiệu đến với đ&ocirc;ng đảo người d&ugrave;ng. Tuy nhi&ecirc;n, h&atilde;y thận trọng, bởi kh&aacute;ch h&agrave;ng của bạn sẽ t&igrave;m hiểu danh tiếng đ&oacute; c&oacute; thật kh&ocirc;ng. Họ sẽ sớm nhận ra nếu thương hiệu của bạn &ldquo;chỉ n&oacute;i cho c&oacute;&rdquo;, &ldquo;n&oacute;i m&agrave; kh&ocirc;ng l&agrave;m&rdquo; hoặc &ldquo;n&oacute;i một đường l&agrave;m một nẻo&rdquo; th&igrave; niềm tin ấy sẽ lập tức bị lung lay.</p>\r\n\r\n<p>V&igrave; vậy, một nh&agrave; tiếp thị chăm s&oacute;c sức khỏe cần định hướng x&acirc;y dựng danh tiếng thương hiệu, chiến dịch tiếp cận bệnh nh&acirc;n cần đi theo c&aacute;c mục ti&ecirc;u:</p>\r\n\r\n<ul>\r\n	<li>T&iacute;nh minh bạch: Mọi th&ocirc;ng tin về dịch vụ y tế hay những thay đổi c&oacute; li&ecirc;n quan cần được th&ocirc;ng tin r&otilde; r&agrave;ng, ch&iacute;nh x&aacute;c đến người bệnh.</li>\r\n	<li>Thẩm quyền: Mọi th&ocirc;ng tin được đưa đến c&ocirc;ng ch&uacute;ng đều phải được kiểm định của chuy&ecirc;n gia, b&aacute;c sĩ, người c&oacute; thẩm quyền.</li>\r\n	<li>Danh tiếng: Đ&atilde; đến l&uacute;c bạn thu thập &yacute; kiến đ&aacute;nh gi&aacute; của kh&aacute;ch h&agrave;ng về thương hiệu để sớm c&oacute; c&aacute;ch giải quyết đ&uacute;ng đắn với những vấn đề c&ograve;n tồn đọng.</li>\r\n	<li>Quan hệ c&ocirc;ng ch&uacute;ng: B&acirc;y giờ kh&ocirc;ng c&ograve;n l&agrave; thời đại PR th&ocirc;ng thường, thay v&igrave; đăng những bảng tin l&ecirc;n mạng x&atilde; hội, h&atilde;y hướng kh&aacute;ch h&agrave;ng của bạn ch&uacute; &yacute; đến c&aacute;c hoạt động x&atilde; hội m&agrave; doanh nghiệp bạn vẫn l&agrave;m.</li>\r\n	<li>X&acirc;y dựng n&ecirc;n cộng đồng của ri&ecirc;ng bạn: Giờ đ&acirc;y, mọi người c&oacute; xu hướng tin tưởng c&aacute;c chuy&ecirc;n gia hơn bao giờ hết. H&atilde;y tận dụng điều đ&oacute; để x&acirc;y dựng n&ecirc;n một cộng đồng của ri&ecirc;ng bạn.</li>\r\n</ul>\r\n\r\n<h2><span style=\"color:#0000cc;\">5. Tập trung cho SEO v&agrave; Content Marketing</span></h2>\r\n\r\n<p>Ng&agrave;y nay, khi m&agrave; smartphone v&agrave; internet phổ biến đến tận n&uacute;i rừng, việc ai đ&oacute; l&ecirc;n Google t&igrave;m thứ họ quan t&acirc;m vẫn lu&ocirc;n diễn ra mỗi ng&agrave;y. Một thương hiệu chăm s&oacute;c sức khỏe vẫn n&ecirc;n đảm bảo bạn được t&igrave;m thấy khi kh&aacute;ch h&agrave;ng t&igrave;m kiếm về một triệu chứng c&oacute; li&ecirc;n quan đến dịch vụ/sản phẩm của bạn.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, trong bối cảnh của năm 2022, một nh&agrave; l&agrave;m&nbsp;<a href=\"https://srcvn.com/blogs/news/6-cach-trien-khai-content-marketing-cham-soc-suc-khoe-hieu-qua\"><strong>chiến lược marketing ng&agrave;nh chăm s&oacute;c sức khỏe</strong></a>&nbsp;cần ch&uacute; &yacute; đến 2 mảng ch&iacute;nh:</p>\r\n\r\n<ul>\r\n	<li>Local SEO: Ng&agrave;y c&agrave;ng c&oacute; nhiều người t&igrave;m kiếm c&aacute;c dịch vụ &ldquo;gần t&ocirc;i&rdquo; để chăm s&oacute;c sức khỏe của bản th&acirc;n v&agrave; gia đ&igrave;nh. V&igrave; vậy, bạn h&atilde;y ch&uacute; &yacute; mảng local SEO một c&aacute;ch cẩn thận v&agrave; khai th&aacute;c triệt để.</li>\r\n	<li>Nội dung gi&aacute; trị cao: H&atilde;y tưởng tượng đến lượng view cao ch&oacute;t v&oacute;t khi bạn c&oacute; thể hướng dẫn kịp thời những g&igrave; m&agrave; bệnh nh&acirc;n đang cực kỳ quan t&acirc;m. Giả dụ như c&aacute;c b&agrave;i hướng dẫn trẻ em ph&ograve;ng chống Covid-19 khi ch&uacute;ng quay lại trường học v&agrave; ch&uacute;ng chưa được ti&ecirc;m vắc-xin.</li>\r\n</ul>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/seo-content.png\" style=\"width: 900px; height: 600px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">6. Sự phổ biến của Telemedicine</span></h2>\r\n\r\n<p>Telemedicine (Telehealth) c&ograve;n gọi l&agrave; dịch vụ chăm s&oacute;c sức khỏe từ xa đang dần trở n&ecirc;n phổ biến kể từ sau đại dịch Covid-19. Mặc d&ugrave; n&oacute; kh&ocirc;ng thể thay thế 100% c&aacute;ch kh&aacute;m chữa bệnh truyền thống nhưng n&oacute; sẽ dần phổ biến hơn.</p>\r\n\r\n<p>V&igrave; vậy, một nh&agrave; l&agrave;m&nbsp;<strong>chiến lược marketing ng&agrave;nh chăm s&oacute;c sức khỏe</strong>&nbsp;n&ecirc;n bắt đầu ch&uacute; &yacute; đến dịch vụ Telemedicine. Một số h&agrave;nh động dưới đ&acirc;y c&oacute; thể gi&uacute;p bạn giới thiệu dịch vụ Telemedicine hiệu quả:</p>\r\n\r\n<ul>\r\n	<li>Kiểm tra lại c&aacute;c dịch vụ, loại bệnh hay đối tượng bệnh nh&acirc;n n&agrave;o ph&ugrave; hợp để Telemedicine. H&atilde;y nghĩ đến tương lai d&agrave;i hạn &iacute;t nhất l&agrave; 10 năm sau dịch vụ n&agrave;y liệu c&oacute; c&ograve;n hiệu quả kh&ocirc;ng.</li>\r\n	<li>Tạo một website li&ecirc;n quan đến Telemedicine để giới thiệu với người bệnh về dịch vụ kh&aacute;m chữa bệnh từ xa. Tốt nhất l&agrave; n&ecirc;n c&oacute; video hướng dẫn cụ thể cho người bệnh.</li>\r\n	<li>Gi&uacute;p bệnh nh&acirc;n hiện c&oacute; của bạn nhận được mọi th&ocirc;ng tin li&ecirc;n quan đến Telemedicine, v&iacute; dụ gửi email c&aacute; nh&acirc;n, gọi điện, gửi SMS,&hellip;</li>\r\n	<li>Quảng c&aacute;o đến c&aacute;c thị trường mục ti&ecirc;u.</li>\r\n</ul>\r\n\r\n<h2><span style=\"color:#0000cc;\">7. Thường xuy&ecirc;n s&aacute;ng tạo &amp; đổi mới c&aacute;c sản phẩm, dịch vụ chăm s&oacute;c sức khỏe</span></h2>\r\n\r\n<p>Y học lu&ocirc;n lu&ocirc;n đi đầu trong sự đổi mới, từ c&aacute;c phương ph&aacute;p chữa trị cho bệnh nh&acirc;n cho đến những trải nghiệm chữa bệnh th&uacute; vị hơn của họ. Hiện nay, ngo&agrave;i dịch vụ chữa bệnh từ xa, c&ocirc;ng nghệ AI đ&atilde; được ứng dụng v&agrave;o nhiều dịch vụ y tế hiện đại.</p>\r\n\r\n<p>V&agrave; một nh&agrave; l&agrave;m tiếp thị chăm s&oacute;c sức khỏe cũng phải nhanh ch&oacute;ng truyền đạt những đổi mới n&agrave;y đến với người bệnh. Đồng thời gi&uacute;p bệnh nh&acirc;n c&oacute; những trải nghiệm truyền th&ocirc;ng th&uacute; vị hơn để cảm nhận tốt hơn về dịch vụ y tế m&agrave; họ đang quan t&acirc;m.</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">8. Healthcare UX</span></h2>\r\n\r\n<p>Google đ&aacute;nh gi&aacute; cao những trang web đem đến trải nghiệm hữu &iacute;ch nhất cho kh&aacute;ch h&agrave;ng, bất chấp họ c&oacute; tr&igrave;nh độ kỹ năng v&agrave; tr&igrave;nh độ kỹ thuật số như thế n&agrave;o. Cũng như bất chấp họ đang lướt web tr&ecirc;n thiết bị di động hay một chiếc m&aacute;y t&iacute;nh. Điều đ&oacute; c&oacute; nghĩa l&agrave;, trang web của bạn bắt buộc phải load nhanh, dễ d&agrave;ng t&igrave;m kiếm v&agrave; sử dụng, c&oacute; thể truy cập được tr&ecirc;n bất kỳ thiết bị v&agrave; hệ điều h&agrave;nh n&agrave;o m&agrave; kh&aacute;ch h&agrave;ng c&oacute; thể sử dụng.</p>\r\n\r\n<p>May mắn l&agrave; bạn c&oacute; thể t&igrave;m hiểu kỹ về Healthcare UX của Google th&ocirc;ng qua Google Search Console. B&aacute;o c&aacute;o Core Web Vitals sẽ gi&uacute;p bạn hiểu r&otilde; vị tr&iacute; UX của trang web của bạn l&agrave; ở đ&acirc;u cũng như l&agrave;m sao để cải thiện n&oacute;.</p>\r\n\r\n<p>Dịch vụ chăm s&oacute;c sức khỏe sẽ kh&ocirc;ng bao giờ mất đi, v&agrave; bệnh nh&acirc;n sẽ ng&agrave;y c&agrave;ng hiểu biết hơn &ndash; kh&oacute; t&iacute;nh hơn &ndash; chọn lọc hơn. Vậy n&ecirc;n lĩnh vực y tế &amp; chăm s&oacute;c sức khỏe đang c&oacute; sự cạnh tranh hơn bao giờ hết. Với vai tr&ograve; l&agrave; một nh&agrave; tiếp thị lĩnh vực n&agrave;y, bạn n&ecirc;n ch&uacute; &yacute; đến 8 điểm nhấn về&nbsp;<strong>chiến lược marketing ng&agrave;nh chăm s&oacute;c sức&nbsp; khỏe</strong>&nbsp;tr&ecirc;n đ&acirc;y. V&agrave; quan trọng bậc nhất h&atilde;y ưu ti&ecirc;n cho trải nghiệm hữu &iacute;ch cho người d&ugrave;ng, bạn nh&eacute;!</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Đội ngũ x&acirc;y dựng chiến lược marketing MIG</span></h2>\r\n\r\n<p>Với nhiều năm hoạt động trong lĩnh vực Digital Marketing tại TP.HCM, MIG&nbsp;tự h&agrave;o c&oacute; một đội ngũ chuy&ecirc;n gia gi&agrave;u kinh nghiệm trong việc x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh chăm s&oacute;c sức khỏe. B&ecirc;n cạnh đ&oacute;, sự nhạy b&eacute;n v&agrave; năng lực s&aacute;ng tạo l&agrave; một trong những yếu tố trọng t&acirc;m tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng cho c&aacute;c dự &aacute;n của MIG.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n tự đề ra cho m&igrave;nh những nguy&ecirc;n tắc v&agrave; quy tr&igrave;nh cụ thể. Trong đ&oacute;, nghi&ecirc;n cứu sản phẩm &ndash; dịch vụ của kh&aacute;ch h&agrave;ng, nghi&ecirc;n cứu thị trường, nghi&ecirc;n cứu v&agrave; ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng mục ti&ecirc;u l&agrave; một trong những quy tr&igrave;nh cực kỳ quan trọng kh&ocirc;ng được ph&eacute;p bỏ qua.</p>\r\n\r\n<p>Dựa tr&ecirc;n sự am hiểu v&agrave; vận dụng c&aacute;c thuật to&aacute;n của Google một c&aacute;ch linh hoạt v&agrave; hiệu quả, MIG&nbsp;c&ograve;n tạo ra những mẫu content ph&ugrave; hợp, vừa đ&aacute;p ứng c&aacute;c điều kiện của Google, vừa nhắm đ&uacute;ng kh&aacute;ch h&agrave;ng mục ti&ecirc;u.</p>\r\n\r\n<p>V&agrave; đặc biệt, MIG&nbsp;đến với kh&aacute;ch h&agrave;ng bằng sự tận t&acirc;m, th&aacute;i độ tử tế v&agrave; tinh thần tr&aacute;ch nhiệm cao. Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng bạn để đưa ra những giải ph&aacute;p tối ưu bằng nghiệp vụ chuy&ecirc;n s&acirc;u v&agrave; kh&aacute;c biệt. MIG&nbsp;cam kết sẽ gi&uacute;p bạn x&acirc;y dựng một chiến lược content marketing đầy đột ph&aacute; nhằm gia tăng lượt truy cập v&agrave; cải thiện hiệu quả b&aacute;n h&agrave;ng tối đa.</p>\r\n\r\n<p>Để được tư vấn th&ecirc;m về c&aacute;ch x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh chăm s&oacute;c sức khỏe, bạn h&atilde;y li&ecirc;n hệ với MIG ngay h&ocirc;m nay. Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn 24/7.</p>\r\n', '', '8-diem-nhan-quan-trong-trong-chien-luoc-marketing-nganh-cham-soc-suc-khoe', '/backend/web/uploads/images/Tin-tuc/H2.png', NULL, 1, 1, 20, 0, 'chiến lược marketing,chiến lược marketing ngành chăm sóc sức khỏe,content marketing,content marketing ngành chăm sóc sức khỏe,chiến lược SEO,dịch vụ SEO,dịch vụ content marketing', 'chien-luoc-marketing,chien-luoc-marketing-nganh-cham-soc-suc-khoe,content-marketing,content-marketing-nganh-cham-soc-suc-khoe,chien-luoc-SEO,dich-vu-SEO,dich-vu-content-marketing', '8 điểm nhấn quan trọng trong chiến lược marketing ngành chăm sóc sức khỏe', 'Khi xây dựng chiến lược marketing ngành chăm sóc sức khỏe, ngoài việc hiểu rõ khách hàng mục tiêu của mình là ai, chúng ta cũng cần nhạy bén với thị trường để dự đoán những biến động có thể xảy ra trong tương lai, đặc biệt là đối với ngành tiếp thị chăm sóc sức khỏe. ', 'Marketing Plan, Content Marketing, SEO, Dịch vụ Marketing ', '2024-05-28 10:45:41'),
(145, 24, 'Những ý tưởng thú vị khi làm content marketing cho ngành hàng thức uống dinh dưỡng', '', '<p>Bạn đang kinh doanh lĩnh vực đồ uống v&agrave; bạn muốn s&aacute;ng tạo n&ecirc;n nhiều loại content marketing h&uacute;t kh&aacute;ch nhất. H&atilde;y đọc ngay b&agrave;i viết b&ecirc;n dưới để t&igrave;m ra những &yacute; tưởng th&uacute; vị khi l&agrave;m content cho ng&agrave;nh h&agrave;ng thức uống dinh dưỡng bạn nh&eacute;!</p>\r\n', '', '<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/H1(1).png\" style=\"width: 1141px; height: 667px;\" /></p>\r\n\r\n<p>Bạn đang kinh doanh lĩnh vực đồ uống v&agrave; bạn muốn s&aacute;ng tạo n&ecirc;n nhiều loại content marketing h&uacute;t kh&aacute;ch nhất. H&atilde;y đọc ngay b&agrave;i viết b&ecirc;n dưới để t&igrave;m ra những &yacute; tưởng th&uacute; vị khi l&agrave;m content cho ng&agrave;nh h&agrave;ng thức uống dinh dưỡng bạn nh&eacute;!</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">V&agrave;i n&eacute;t về thức uống dinh dưỡng</span></h2>\r\n\r\n<p>Thức uống dinh dưỡng (tiếng Anh l&agrave; Nutritional Drinks) l&agrave; một mảng nhỏ trong ng&agrave;nh ăn uống. Đồ uống dinh dưỡng để chỉ cho những m&oacute;n uống tốt cho sức khỏe, nổi bật như sữa từ nguồn gốc động vật hoặc thực vật, đồ uống l&agrave;nh mạnh, đồ uống được pha chế từ nguy&ecirc;n liệu organic,&hellip;</p>\r\n\r\n<p>Khi m&agrave; nền kinh tế đ&atilde; c&oacute; những bước ph&aacute;t triển nhảy vọt, thu nhập b&igrave;nh qu&acirc;n đầu người tăng l&ecirc;n, tầng lớp trung lưu, triệu ph&uacute; ng&agrave;y c&agrave;ng đ&ocirc;ng đảo. Nhu cầu sử dụng những loại thức uống tốt cho sức khỏe, thức uống dinh dưỡng cũng tăng theo. Nếu bạn đang kinh doanh trong lĩnh vực ăn uống, đ&acirc;y l&agrave; một xu hướng tất yếu bạn n&ecirc;n nghi&ecirc;n cứu để đừng bỏ lỡ những kh&aacute;ch h&agrave;ng tiềm năng nh&eacute;!</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Insight người d&ugrave;ng trong ng&agrave;nh thức uống dinh dưỡng</span></h2>\r\n\r\n<p>Khi l&agrave;m content marketing cho ng&agrave;nh h&agrave;ng thức uống dinh dưỡng, bạn nhất định phải nắm chắc insight của m&igrave;nh. Thực tế l&agrave; rất nhiều kh&aacute;ch h&agrave;ng sẽ ẩn giấu đi những th&ocirc;ng tin n&agrave;y. Trong khi c&oacute; rất nhiều thứ sẽ gi&uacute;p họ ra quyết định mua h&agrave;ng. Bằng c&aacute;ch n&agrave;o đ&oacute; doanh nghiệp khai th&aacute;c được những content insight kh&aacute;ch h&agrave;ng v&agrave; tung ra những content ph&ugrave; hợp. Họ sẽ thu h&uacute;t th&ecirc;m nhiều kh&aacute;ch h&agrave;ng tiềm năng v&agrave; th&uacute;c đẩy quyết định mua h&agrave;ng của đ&ocirc;ng đảo người d&ugrave;ng.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/pexels-suju-1233319.jpg\" style=\"width: 900px; height: 600px;\" /></p>\r\n\r\n<p>C&oacute; kh&aacute; nhiều content insight kh&aacute;ch h&agrave;ng Việt Nam</p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; một số insight kh&aacute;ch h&agrave;ng Việt Nam li&ecirc;n quan đến ng&agrave;nh thức uống dinh dưỡng bạn c&oacute; thể tham khảo:</p>\r\n\r\n<p>*** Tham khảo từ Kantar Worldpanel &ndash; Một trong những c&ocirc;ng ty tư vấn &amp; nghi&ecirc;n cứu thị trường h&agrave;ng đầu thế giới</p>\r\n\r\n<ol>\r\n	<li>Người Việt đang ng&agrave;y c&agrave;ng quan t&acirc;m v&agrave; th&iacute;ch sử dụng những thức uống c&oacute; nguồn gốc thực vật hơn so với đồ uống từ nguồn gốc động vật. V&iacute; dụ: Họ th&iacute;ch uống sữa đậu n&agrave;nh hơn so với sữa b&ograve; tươi.</li>\r\n	<li>Người ti&ecirc;u d&ugrave;ng c&oacute; thu nhập cao hơn, họ muốn sử dụng những đồ uống được l&agrave;m từ thực phẩm hữu cơ, kh&ocirc;ng c&oacute; h&oacute;a chất độc hại. Họ sẵn s&agrave;ng chi trả cao hơn để được sử dụng đồ uống nhiều gi&aacute; trị dinh dưỡng v&agrave; an to&agrave;n hơn.</li>\r\n	<li>10 năm nữa, d&acirc;n số tr&ecirc;n 45 tuổi sẽ chiếm đến 42% cơ cấu d&acirc;n số Việt Nam. Điều đ&oacute; c&oacute; nghĩa, ng&aacute;ch thức uống dinh dưỡng cho người cao tuổi đang dần chiếm lĩnh thị trường.</li>\r\n	<li>Đối với người trẻ, họ y&ecirc;u th&iacute;ch những đồ uống vừa dinh dưỡng, đầy năng lượng lại rất thuận tiện, tỉnh t&aacute;o v&agrave; năng động.</li>\r\n	<li>Kh&aacute;ch h&agrave;ng trẻ ở Việt Nam y&ecirc;u th&iacute;ch sự l&agrave;m mới của c&aacute;c thương hiệu đồ uống, thậm ch&iacute; chỉ l&agrave; sự thay đổi về bao b&igrave; cũng tạo n&ecirc;n bước ngoặt về doanh số. V&igrave; vậy, l&agrave;m content marketing cho ng&agrave;nh h&agrave;ng thức uống dinh dưỡng nhất định phải lu&ocirc;n s&aacute;ng tạo, lu&ocirc;n tạo n&ecirc;n nguồn cảm hứng bất tận cho kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Người ti&ecirc;u d&ugrave;ng Việt cũng quan t&acirc;m mạnh mẽ đến nguồn gốc của sản phẩm, uy t&iacute;n của thương hiệu. Điều đ&oacute; l&yacute; giải v&igrave; sao một sản phẩm kiểu &ldquo;made in China&rdquo; thường khiến d&acirc;n t&igrave;nh d&egrave; chừng. Khi l&agrave;m content marketing cho ng&agrave;nh h&agrave;ng thức uống dinh dưỡng h&atilde;y ch&uacute; &yacute; đến chất lượng, nguồn gốc sản phẩm v&agrave; độ ch&iacute;nh h&atilde;ng của sản phẩm bạn nh&eacute;!</li>\r\n</ol>\r\n\r\n<h2><span style=\"color:#0000cc;\">V&agrave;i gợi &yacute; hay ho cho người l&agrave;m content cho ng&agrave;nh h&agrave;ng thức uống dinh dưỡng</span></h2>\r\n\r\n<p>Khai th&aacute;c tốt những insight kh&aacute;ch h&agrave;ng trong ng&agrave;nh thức uống dinh dưỡng b&ecirc;n tr&ecirc;n, doanh nghiệp sẽ c&oacute; c&aacute;ch l&agrave;m content ph&ugrave; hợp v&agrave; th&agrave;nh c&ocirc;ng. Nhiều thương hiệu đ&atilde; tinh tế trong việc khai th&aacute;c lợi &iacute;ch về sức khỏe v&agrave; l&agrave;m đẹp của thức uống dinh dưỡng d&agrave;nh cho người d&ugrave;ng. V&iacute; dụ như đồ uống gi&uacute;p giảm c&acirc;n, đồ uống l&agrave;m đẹp da, đồ uống chống l&atilde;o h&oacute;a, đồ uống đem lại hạnh ph&uacute;c,&hellip;</p>\r\n\r\n<p>Một v&agrave;i c&acirc;u chuyện th&agrave;nh c&ocirc;ng trong content marketing ng&agrave;nh h&agrave;ng thức uống dinh dưỡng dưới đ&acirc;y c&oacute; thể hữu &iacute;ch cho bạn!</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">Thương hiệu Devondale v&agrave; sản phẩm sữa Full Cream</span></h3>\r\n\r\n<p>Chiến dịch n&agrave;y của họ tập trung nhấn mạnh d&ograve;ng sữa b&ograve; &Uacute;c mang đến nhiều gi&aacute; trị vượt trội cho sức khỏe.&nbsp; Khi mọi th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh đều khỏe mạnh, mọi người dễ d&agrave;ng vui sống b&igrave;nh y&ecirc;n hạnh ph&uacute;c b&ecirc;n nhau. Một th&ocirc;ng điệp đ&aacute;nh mạnh v&agrave;o t&acirc;m l&yacute; của người ti&ecirc;u d&ugrave;ng.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">Thương hiệu Vinamilk v&agrave; sản phẩm c&oacute; nguồn gốc organic</span></h3>\r\n\r\n<p>Một c&aacute;ch khai th&aacute;c th&ocirc;ng minh của thương hiệu Vinamilk l&agrave; mang đến d&ograve;ng sữa tươi sạch &ndash; trong l&agrave;nh &ndash; ho&agrave;n to&agrave;n thi&ecirc;n nhi&ecirc;n. Sản phẩm sữa tươi organic đ&atilde; nhanh ch&oacute;ng tăng sự nhận diện thương hiệu trong l&ograve;ng kh&aacute;ch h&agrave;ng. Mỗi khi người d&ugrave;ng muốn t&igrave;m kiếm một d&ograve;ng sữa tươi organic họ sẽ nhớ đến th&ocirc;ng điệp từ Vinamilk.</p>\r\n\r\n<h3><span style=\"color:#0000cc;\">Thương hiệu NESTL&Eacute; MILO v&agrave; những gi&aacute; trị tăng th&ecirc;m</span></h3>\r\n\r\n<p>Nếu như hai dẫn chứng b&ecirc;n tr&ecirc;n, c&aacute;c chiến dịch content marketing tập trung v&agrave;o gi&aacute; trị cốt l&otilde;i của sản phẩm. NESTL&Eacute; MILO lại tập trung v&agrave;o những gi&aacute; trị tăng th&ecirc;m l&agrave;m cho sản phẩm của họ trở n&ecirc;n độc đ&aacute;o hơn rất nhiều.</p>\r\n\r\n<p>Chiến dịch &ldquo;Pha MILO ngon như &yacute;, tiếp năng lượng cả ng&agrave;y&rdquo; khi h&atilde;ng nắm bắt ch&iacute;nh x&aacute;c insight kh&aacute;ch h&agrave;ng: Người mẹ n&agrave;o cũng muốn tự m&igrave;nh chuẩn bị một bữa s&aacute;ng đầy đủ dinh dưỡng v&agrave; ngập tr&agrave;n y&ecirc;u thương cho con m&igrave;nh.</p>\r\n\r\n<p>Nestl&eacute; c&ograve;n hướng dẫn những c&aacute;ch pha MILO độc đ&aacute;o theo nhiều c&aacute;ch kh&aacute;c nhau v&agrave; khuyến kh&iacute;ch c&aacute;c b&agrave; mẹ &amp; em b&eacute; thử nghiệm. Họ c&ugrave;ng nhau lan tỏa khoảnh khắc cảm x&uacute;c khi tận tay pha chế g&oacute;i MILO cho ng&agrave;y mới năng lượng l&ecirc;n mạng x&atilde; hội. Theo đ&oacute;, th&ocirc;ng điệp của h&atilde;ng ng&agrave;y c&agrave;ng được lan tỏa.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"/backend/web/uploads/images/hinh-thu-vien/pexels-pixabay-158053.jpg\" style=\"width: 900px; height: 600px;\" /></p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Lời kết</span></h2>\r\n\r\n<p>Insight kh&aacute;ch h&agrave;ng trong ng&agrave;nh thức uống dinh dưỡng cũng quan trọng như bất kỳ ng&agrave;nh h&agrave;ng n&agrave;o kh&aacute;c. Doanh nghiệp n&ecirc;n nắm chắc những insight n&agrave;y để đưa ra những chiến lược content ph&ugrave; hợp. V&agrave; người l&agrave;m content marketing cho ng&agrave;nh h&agrave;ng thức uống dinh dưỡng đừng qu&ecirc;n tham khảo những c&aacute;ch l&agrave;m hay ho từ 3 thương hiệu lớn tr&ecirc;n đ&acirc;y nh&eacute;!</p>\r\n\r\n<h2><span style=\"color:#0000cc;\">Đội ngũ content MIG</span></h2>\r\n\r\n<p>Với nhiều năm hoạt động trong lĩnh vực Digital Marketing tại TP.HCM, MIG&nbsp;tự h&agrave;o c&oacute; một đội ngũ chuy&ecirc;n gia gi&agrave;u kinh nghiệm trong việc x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh thức uống dinh dưỡng. B&ecirc;n cạnh đ&oacute;, sự nhạy b&eacute;n v&agrave; năng lực s&aacute;ng tạo l&agrave; một trong những yếu tố trọng t&acirc;m tạo n&ecirc;n sự th&agrave;nh c&ocirc;ng cho c&aacute;c dự &aacute;n của MIG.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n tự đề ra cho m&igrave;nh những nguy&ecirc;n tắc v&agrave; quy tr&igrave;nh cụ thể. Trong đ&oacute;, nghi&ecirc;n cứu sản phẩm &ndash; dịch vụ của kh&aacute;ch h&agrave;ng, nghi&ecirc;n cứu thị trường, nghi&ecirc;n cứu v&agrave; ph&acirc;n kh&uacute;c kh&aacute;ch h&agrave;ng mục ti&ecirc;u l&agrave; một trong những quy tr&igrave;nh cực kỳ quan trọng kh&ocirc;ng được ph&eacute;p bỏ qua.&nbsp;</p>\r\n\r\n<p>Dựa tr&ecirc;n sự am hiểu v&agrave; vận dụng c&aacute;c thuật to&aacute;n của Google một c&aacute;ch linh hoạt v&agrave; hiệu quả, MIG c&ograve;n tạo ra những mẫu content ph&ugrave; hợp, vừa đ&aacute;p ứng c&aacute;c điều kiện của Google, vừa nhắm đ&uacute;ng kh&aacute;ch h&agrave;ng mục ti&ecirc;u.</p>\r\n\r\n<p>V&agrave; đặc biệt, MIG&nbsp;đến với kh&aacute;ch h&agrave;ng bằng sự tận t&acirc;m, th&aacute;i độ tử tế v&agrave; tinh thần tr&aacute;ch nhiệm cao. Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng bạn để đưa ra những giải ph&aacute;p tối ưu bằng nghiệp vụ chuy&ecirc;n s&acirc;u v&agrave; kh&aacute;c biệt. MIG&nbsp;cam kết sẽ gi&uacute;p bạn x&acirc;y dựng một chiến lược content marketing đầy đột ph&aacute; nhằm gia tăng lượt truy cập v&agrave; cải thiện hiệu quả b&aacute;n h&agrave;ng tối đa.</p>\r\n\r\n<p>Để được tư vấn th&ecirc;m về c&aacute;ch x&acirc;y dựng chiến lược content marketing cho ng&agrave;nh thức uống dinh dưỡng, bạn h&atilde;y li&ecirc;n hệ với MIG&nbsp;ngay h&ocirc;m nay. Đội ngũ chuy&ecirc;n gia của ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn 24/7.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'nhung-y-tuong-thu-vi-khi-lam-content-marketing-cho-nganh-hang-thuc-uong-dinh-duong', '/backend/web/uploads/images/Tin-tuc/H1.png', NULL, 1, 1, 26, 0, 'content marketing,content marketing cho ngành thức uống dinh dưỡng,Những lưu ý cho content marketing,chiến lược markeing,chiến lược marketing cho ngành thức uống dinh dưỡng', 'content-marketing,content-marketing-cho-nganh-thuc-uong-dinh-duong,Nhung-luu-y-cho-content-marketing,chien-luoc-markeing,chien-luoc-marketing-cho-nganh-thuc-uong-dinh-duong', 'Những ý tưởng thú vị khi làm content marketing cho ngành hàng thức uống dinh dưỡng', 'Bạn đang kinh doanh lĩnh vực đồ uống và bạn muốn sáng tạo nên nhiều loại content marketing hút khách nhất. Hãy đọc ngay bài viết bên dưới để tìm ra những ý tưởng thú vị khi làm content cho ngành hàng thức uống dinh dưỡng bạn nhé!', 'Cotent marketing, content marketing cho ngành thức uống dinh dưỡng, chiến lược marketing', '2024-05-28 10:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `postscat`
--

CREATE TABLE `postscat` (
  `id` int NOT NULL,
  `parent` int NOT NULL DEFAULT '0',
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` text COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb3_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `homepage` int NOT NULL DEFAULT '0',
  `position` int NOT NULL DEFAULT '0',
  `number` int NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb3_unicode_ci,
  `description` text COLLATE utf8mb3_unicode_ci,
  `keyword` text COLLATE utf8mb3_unicode_ci,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `postscat`
--

INSERT INTO `postscat` (`id`, `parent`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `slug`, `image`, `status`, `homepage`, `position`, `number`, `title`, `description`, `keyword`, `created_date`) VALUES
(16, 0, 'Dịch Vụ', 'service', 'Với đội ngũ chuyên gia có kinh nghiệm trong lĩnh vực Marketing – Sale – Tài chính - Bảo hiểm, Mi Global có thế mạnh trong việc tư vấn và triển khai kế hoạch với các dịch vụ đa dạng và được tối ưu hoá theo từng yêu cầu chuyên biệt của Doanh nghiệp và Nhãn hàng.', '', '<p align=\"center\" style=\"margin-top:15.0pt; margin-right:0in; margin-bottom:7.5pt; margin-left:0in; text-align:center; margin:0in 0in 0.0001pt\"><strong><span style=\"font-size:12pt\"><span style=\"background:white\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span lang=\"VI\" style=\"font-family:&quot;AvertaStdCY-Regular&quot;,&quot;serif&quot;\"><span style=\"color:red\">Với đội ngũ chuy&ecirc;n gia c&oacute; kinh nghiệm trong lĩnh vực Marketing &ndash; Sale &ndash; T&agrave;i ch&iacute;nh - Bảo hiểm, Mi Global c&oacute; thế mạnh trong việc tư vấn v&agrave; triển khai kế hoạch với c&aacute;c dịch vụ đa dạng v&agrave; được tối ưu ho&aacute; theo từng y&ecirc;u cầu chuy&ecirc;n biệt của Doanh nghiệp v&agrave; Nh&atilde;n h&agrave;ng.</span></span></span></span></span></strong></p>\r\n', '', 'dich-vu', '', 1, 1, 1, 0, '', '', '', '2024-06-19 17:24:11'),
(23, 0, 'Dự Án', 'project', '', '', '', '', 'du-an', '', 1, 1, 0, 0, '', '', '', '2024-05-10 16:10:30'),
(24, 0, 'Tin tức', 'News', '', '', '', '', 'tin-tuc', '', 1, 1, 0, 0, '', '', '', '2024-05-09 00:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` text COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `image` text COLLATE utf8mb3_unicode_ci,
  `thumb` text COLLATE utf8mb3_unicode_ci,
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `parent` int NOT NULL,
  `number` int NOT NULL DEFAULT '0',
  `price` int NOT NULL DEFAULT '0',
  `price_promotion` int NOT NULL DEFAULT '0',
  `goidien` text COLLATE utf8mb3_unicode_ci,
  `quantity` int NOT NULL DEFAULT '1',
  `feature` int NOT NULL DEFAULT '0',
  `new` int NOT NULL DEFAULT '0',
  `bestseller` int NOT NULL DEFAULT '0',
  `promotion` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `title` text COLLATE utf8mb3_unicode_ci,
  `description` text COLLATE utf8mb3_unicode_ci,
  `keyword` text COLLATE utf8mb3_unicode_ci,
  `tag` text COLLATE utf8mb3_unicode_ci,
  `tag_compare` text COLLATE utf8mb3_unicode_ci,
  `created_date` datetime DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `ratecount` int NOT NULL DEFAULT '0',
  `userrate` int NOT NULL DEFAULT '0',
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `image`, `thumb`, `slug`, `parent`, `number`, `price`, `price_promotion`, `goidien`, `quantity`, `feature`, `new`, `bestseller`, `promotion`, `status`, `title`, `description`, `keyword`, `tag`, `tag_compare`, `created_date`, `rating`, `ratecount`, `userrate`, `views`) VALUES
(1, 'Máy chiếu vật thể Learning share DLS2GK', '', 'Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải', '', '<p>Gi&aacute; rẻ nhất cho d&ograve;ng sản phẩm m&aacute;y in h&oacute;a đơn<br />\r\nTh&ocirc;ng số kỹ thuật:<br />\r\nTốc độ in 90mm/s<br />\r\nC&ocirc;ng nghệ in nhiệt trực tiếp<br />\r\nSử dụng khổ giấy 57mm<br />\r\nKết nối USB,RJ11<br />\r\nBảo h&agrave;nh 12 th&aacute;ng</p>\r\n', '', '/backend/web/uploads/images/imgsp.jpg', '', 'may-chieu-vat-the-learning-share-dls2gk', 35, 0, 0, 0, NULL, 1, 1, 0, 1, 1, 0, '', '', '', 'mỹ phẩm,nước hoa,kem body', 'my-pham,nuoc-hoa,kem-body', '2024-08-24 20:07:00', 6, 70, 11, 81),
(2, 'Máy chiếu vật thể Learning share DLS3T', '', 'Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải', '', '<p>Gi&aacute; rẻ nhất cho d&ograve;ng sản phẩm m&aacute;y in h&oacute;a đơn<br />\r\nTh&ocirc;ng số kỹ thuật:<br />\r\nTốc độ in 90mm/s<br />\r\nC&ocirc;ng nghệ in nhiệt trực tiếp<br />\r\nSử dụng khổ giấy 57mm<br />\r\nKết nối USB,RJ11<br />\r\nBảo h&agrave;nh 12 th&aacute;ng</p>\r\n', '', '/backend/web/uploads/images/imgsp.jpg', '', 'may-chieu-vat-the-learning-share-dls3t', 35, 0, 0, 0, NULL, 1, 1, 0, 1, 1, 0, '', '', '', '', '', '2024-08-24 20:06:58', 5, 5, 1, 36),
(3, 'Máy chiếu vật thể Learning share DLS3L', '', 'Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải', '', '<p>Gi&aacute; rẻ nhất cho d&ograve;ng sản phẩm m&aacute;y in h&oacute;a đơn<br />\r\nTh&ocirc;ng số kỹ thuật:<br />\r\nTốc độ in 90mm/s<br />\r\nC&ocirc;ng nghệ in nhiệt trực tiếp<br />\r\nSử dụng khổ giấy 57mm<br />\r\nKết nối USB,RJ11<br />\r\nBảo h&agrave;nh 12 th&aacute;ng</p>\r\n', '', '/backend/web/uploads/images/imgsp.jpg', '', 'may-chieu-vat-the-learning-share-dls3l', 35, 0, 0, 0, NULL, 1, 1, 0, 1, 1, 0, '', '', '', '', '', '2024-08-24 20:06:56', 0, 0, 0, 2),
(4, 'Máy chiếu vật thể Learning share DLS2L', '', 'Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải', '', '<p>Gi&aacute; rẻ nhất cho d&ograve;ng sản phẩm m&aacute;y in h&oacute;a đơn<br />\r\nTh&ocirc;ng số kỹ thuật:<br />\r\nTốc độ in 90mm/s<br />\r\nC&ocirc;ng nghệ in nhiệt trực tiếp<br />\r\nSử dụng khổ giấy 57mm<br />\r\nKết nối USB,RJ11<br />\r\nBảo h&agrave;nh 12 th&aacute;ng</p>\r\n', '', '/backend/web/uploads/images/imgsp.jpg', '', 'may-chieu-vat-the-learning-share-dls2l', 35, 0, 600000, 0, NULL, 1, 1, 0, 1, 1, 0, '', '', '', 'bùa thái,tâm linh,bùa hộ mệnh', 'bua-thai,tam-linh,bua-ho-menh', '2024-08-24 20:06:55', 4, 4, 1, 16),
(5, 'Sản phẩm test 4', '', 'Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải', '', '<p>Gi&aacute; rẻ nhất cho d&ograve;ng sản phẩm m&aacute;y in h&oacute;a đơn<br />\r\nTh&ocirc;ng số kỹ thuật:<br />\r\nTốc độ in 90mm/s<br />\r\nC&ocirc;ng nghệ in nhiệt trực tiếp<br />\r\nSử dụng khổ giấy 57mm<br />\r\nKết nối USB,RJ11<br />\r\nBảo h&agrave;nh 12 th&aacute;ng</p>\r\n', '', '/backend/web/uploads/images/imgsp.jpg', '', 'san-pham-test-4', 35, 0, 600000, 500000, NULL, 3, 0, 0, 1, 1, 0, '', '', '', 'mỹ phẩm,kem dưỡng da,kem trị nám', 'my-pham,kem-duong-da,kem-tri-nam', '2024-08-24 20:06:54', 3, 3, 1, 113),
(7, 'Sản phẩm test 5', '', 'Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải', '', '<p>Gi&aacute; rẻ nhất cho d&ograve;ng sản phẩm m&aacute;y in h&oacute;a đơn<br />\r\nTh&ocirc;ng số kỹ thuật:<br />\r\nTốc độ in 90mm/s<br />\r\nC&ocirc;ng nghệ in nhiệt trực tiếp<br />\r\nSử dụng khổ giấy 57mm<br />\r\nKết nối USB,RJ11<br />\r\nBảo h&agrave;nh 12 th&aacute;ng</p>\r\n', '', '/backend/web/uploads/images/imgsp.jpg', '', 'san-pham-test-5', 35, 0, 0, 0, NULL, 1, 0, 1, 0, 0, 0, '', '', '', 'sản phẩm mới,sản phẩm tốt', 'san-pham-moi,san-pham-tot', '2024-08-24 20:06:52', 0, 0, 0, 19),
(10, 'Sản phẩm test 6', '', 'Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải', '', '<p>Gi&aacute; rẻ nhất cho d&ograve;ng sản phẩm m&aacute;y in h&oacute;a đơn<br />\r\nTh&ocirc;ng số kỹ thuật:<br />\r\nTốc độ in 90mm/s<br />\r\nC&ocirc;ng nghệ in nhiệt trực tiếp<br />\r\nSử dụng khổ giấy 57mm<br />\r\nKết nối USB,RJ11<br />\r\nBảo h&agrave;nh 12 th&aacute;ng</p>\r\n', '', '/backend/web/uploads/images/imgsp.jpg', '', 'san-pham-test-6', 35, 0, 0, 0, NULL, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '2024-08-24 20:06:50', 0, 0, 0, 8),
(14, 'Sản phẩm test 7', '', 'Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải', '', '<p>Gi&aacute; rẻ nhất cho d&ograve;ng sản phẩm m&aacute;y in h&oacute;a đơn<br />\r\nTh&ocirc;ng số kỹ thuật:<br />\r\nTốc độ in 90mm/s<br />\r\nC&ocirc;ng nghệ in nhiệt trực tiếp<br />\r\nSử dụng khổ giấy 57mm<br />\r\nKết nối USB,RJ11<br />\r\nBảo h&agrave;nh 12 th&aacute;ng</p>\r\n', '', '/backend/web/uploads/images/imgsp.jpg', '', 'san-pham-test-7', 35, 0, 600000, 500000, NULL, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '2024-08-24 20:06:48', 10, 10, 1, 176),
(15, 'Sản phẩm test 8', '', 'Mang lại sự khác biệt cho chúng ta không nhữngvề hình ảnh mà còn cả về giải pháp trình chiếu hiển thị với độ phân giải', '', '<p>Gi&aacute; rẻ nhất cho d&ograve;ng sản phẩm m&aacute;y in h&oacute;a đơn<br />\r\nTh&ocirc;ng số kỹ thuật:<br />\r\nTốc độ in 90mm/s<br />\r\nC&ocirc;ng nghệ in nhiệt trực tiếp<br />\r\nSử dụng khổ giấy 57mm<br />\r\nKết nối USB,RJ11<br />\r\nBảo h&agrave;nh 12 th&aacute;ng</p>\r\n', '', '/backend/web/uploads/images/imgsp.jpg', '', 'san-pham-test-8', 35, 0, 0, 0, 'Gọi điện giảm ngay 200.000 VNĐ', 1, 0, 1, 1, 0, 0, '', '', '', '', '', '2024-08-24 20:06:44', 0, 0, 0, 9),
(16, 'Chăn ga mùa xuân', '', '', '', '', '', '/backend/web/uploads/images/chan-ga1.jpg', '', 'chan-ga-mua-xuan', 36, 0, 600000, 0, NULL, 1, 0, 0, 0, 0, 1, '', '', '', '', '', '2024-08-24 20:08:57', 0, 0, 0, 0),
(17, 'Chăn ga mùa hạ', '', '', '', '', '', '/backend/web/uploads/images/chan-ga2.jpg', '', 'chan-ga-mua-ha', 36, 0, 550000, 0, NULL, 1, 0, 0, 0, 0, 1, '', '', '', '', '', '2024-08-24 20:12:45', 0, 0, 0, 0),
(18, 'Chăn ga mùa thu', '', '', '', '', '', '/backend/web/uploads/images/chan-ga3.jpg', '', 'chan-ga-mua-thu', 36, 0, 0, 0, NULL, 1, 0, 0, 0, 0, 1, '', '', '', '', '', '2024-08-24 20:13:07', 0, 0, 0, 0),
(19, 'Chăn ga mùa đông', '', '', '', '', '', '/backend/web/uploads/images/chan-ga4.jpg', '', 'chan-ga-mua-dong', 36, 0, 700000, 0, NULL, 1, 0, 0, 0, 0, 1, '', '', '', '', '', '2024-08-24 20:13:41', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_op`
--

CREATE TABLE `products_op` (
  `id` int NOT NULL,
  `parent` int NOT NULL,
  `name_vi` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` text COLLATE utf8mb3_unicode_ci,
  `value_vi` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `value_en` text COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products_op`
--

INSERT INTO `products_op` (`id`, `parent`, `name_vi`, `name_en`, `value_vi`, `value_en`) VALUES
(2, 5, 'Kích thước', '', '615 x 380 x 460mm', ''),
(5, 4, 'Kích thước', '', '615 x 380 x 460mm', ''),
(6, 5, 'Màu sắc', '', 'Xanh, Đỏ, Vàng', ''),
(14, 3, 'Kích thước', '', '615 x 380 x 460mm', ''),
(15, 3, 'Màu sắc', '', 'Xanh, Đỏ, Vàng', ''),
(16, 10, 'Kích thước', NULL, '615 x 380 x 460mm', NULL),
(17, 14, 'Kích thước', NULL, '615 x 380 x 460mm', NULL),
(18, 14, 'Màu sắc', NULL, 'Xanh, Đỏ, Vàng', NULL),
(19, 15, 'Kích thước', NULL, '615 x 380 x 460mm', NULL),
(20, 15, 'Màu sắc', NULL, 'Xanh, Đỏ, Vàng', NULL),
(21, 10, 'Màu sắc', NULL, 'Xanh, Đỏ, Vàng', NULL),
(22, 7, 'Kích thước', NULL, '615 x 380 x 460mm', NULL),
(23, 7, 'Màu sắc', NULL, 'Xanh, Đỏ, Vàng', NULL),
(24, 4, 'Màu sắc', NULL, 'Xanh, Đỏ, Vàng', NULL),
(25, 2, 'Kích thước', NULL, '615 x 380 x 460mm', NULL),
(26, 2, 'Màu sắc', NULL, 'Xanh, Đỏ, Vàng', NULL),
(27, 1, 'Kích thước', NULL, '615 x 380 x 460mm', NULL),
(28, 1, 'Màu sắc', NULL, 'Xanh, Đỏ, Vàng', NULL),
(59, 5, 'Nguyên liệu', NULL, 'HDPE Nguyên Sinh', NULL),
(60, 7, 'Nguyên liệu', NULL, 'HDPE Nguyên Sinh', NULL),
(61, 10, 'Nguyên liệu', NULL, 'HDPE Nguyên Sinh', NULL),
(62, 14, 'Nguyên liệu', NULL, 'HDPE Nguyên Sinh', NULL),
(63, 15, 'Nguyên liệu', NULL, 'HDPE Nguyên Sinh', NULL),
(79, 2, 'Nguyên liệu', NULL, 'HDPE Nguyên Sinh', NULL),
(80, 3, 'Nguyên liệu', NULL, 'HDPE Nguyên Sinh', NULL),
(81, 4, 'Nguyên liệu', NULL, 'HDPE Nguyên Sinh', NULL),
(82, 1, 'Nguyên liệu', NULL, 'HDPE Nguyên Sinh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb3_unicode_ci,
  `timezone` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int NOT NULL,
  `parent` int NOT NULL DEFAULT '0',
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` text COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `link` text COLLATE utf8mb3_unicode_ci,
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb3_unicode_ci,
  `thumb` text COLLATE utf8mb3_unicode_ci,
  `number` int NOT NULL DEFAULT '0',
  `homepage` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `parent`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `link`, `slug`, `image`, `thumb`, `number`, `homepage`) VALUES
(3, 1, 'Slide 3', '', NULL, NULL, NULL, NULL, '', 'slide-3', '/backend/web/uploads/images/slide/z5436883456294_08b394d8830e0f3c7d00768a331b3522.jpg', '', 3, 0),
(5, 1, 'slide 4', '', NULL, NULL, NULL, NULL, '', 'slide-4', '/backend/web/uploads/images/slide/z5436883215858_4a3f7bc6c6169d256a2234158838d8cb.jpg', '', 0, 0),
(6, 1, 'Slide 1', '', NULL, NULL, NULL, NULL, '', 'slide-1', '/backend/web/uploads/images/slider-1.jpg', '', 0, 1),
(7, 1, 'Slide 2', '', NULL, NULL, NULL, NULL, '', 'slide-2', '/backend/web/uploads/images/slider-1.jpg', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slideshowcat`
--

CREATE TABLE `slideshowcat` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb3_unicode_ci,
  `des_en` text COLLATE utf8mb3_unicode_ci,
  `content_vi` text COLLATE utf8mb3_unicode_ci,
  `content_en` text COLLATE utf8mb3_unicode_ci,
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `homepage` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `slideshowcat`
--

INSERT INTO `slideshowcat` (`id`, `name_vi`, `name_en`, `des_vi`, `des_en`, `content_vi`, `content_en`, `slug`, `homepage`) VALUES
(1, 'Slide show', '', NULL, NULL, NULL, NULL, 'slide-show', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb3_unicode_ci,
  `code` varchar(32) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thuvien`
--

CREATE TABLE `thuvien` (
  `id` int NOT NULL,
  `name_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `thumb` text COLLATE utf8mb4_unicode_ci,
  `number` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thuvien`
--

INSERT INTO `thuvien` (`id`, `name_vi`, `name_en`, `slug`, `image`, `thumb`, `number`) VALUES
(5, 'Hình Nha khoa', '', 'hinh-nha-khoa', '/backend/web/uploads/images/hinh-thu-vien.jpg', '/backend/web/uploads/images/hinh-thu-vien/1.jpg,/backend/web/uploads/images/hinh-thu-vien/10.jpg,/backend/web/uploads/images/hinh-thu-vien/11.jpg,/backend/web/uploads/images/hinh-thu-vien/2.jpg,/backend/web/uploads/images/hinh-thu-vien/3.jpg,/backend/web/uploads/images/hinh-thu-vien/5.jpg,/backend/web/uploads/images/hinh-thu-vien/6.jpg,/backend/web/uploads/images/hinh-thu-vien/7.jpg,/backend/web/uploads/images/hinh-thu-vien/8.jpg,/backend/web/uploads/images/hinh-thu-vien/9.jpg,', 0);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int NOT NULL,
  `code` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int NOT NULL,
  `type` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `confirmed_at` int DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `blocked_at` int DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `flags` int NOT NULL DEFAULT '0',
  `last_login_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(2, 'admin', 'louis.bruce.collins@gmail.com', '$2y$12$N/rnR066NHPY8r/fDVDtTuKQjIMYyBnw1zS3B2Gfis9I6JzijKeli', 'lRnldgy-PXTiinddqilBDODlxBuWrk8d', 1569835377, NULL, NULL, '127.0.0.1', 1569835342, 1569835342, 0, 1615261842);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `parent` int NOT NULL DEFAULT '0',
  `name_vi` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` text COLLATE utf8mb3_unicode_ci,
  `video_id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb3_unicode_ci,
  `number` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `parent`, `name_vi`, `name_en`, `video_id`, `image`, `number`, `status`) VALUES
(1, 2, 'Đánh giá của chị Ngọc giám đóc Vuông Tròn Spa với Nha Khoa YSmiles', '', 'W8ljEuWs5LY', 'https://img.youtube.com/vi/W8ljEuWs5LY/0.jpg', 0, 1),
(2, 2, 'Người mẫu Nguyễn Bảo Sơn đã nói thế nào về Nha Khoa Thẩm Mỹ Ysmiles?', '', 'gp1zZjy9fCI', 'https://img.youtube.com/vi/gp1zZjy9fCI/0.jpg', 0, 1),
(3, 2, 'cảm nhận của nhà thiết kế thời trang Huỳnh Tiên với Nha Khoa YSmiles', '', 'z52HpfQLxZA', 'https://img.youtube.com/vi/z52HpfQLxZA/0.jpg', 0, 1),
(4, 3, 'Giới thiệu nha Khoa YSmiles | YSmiles Media', '', 'OneFvk9RLBM', 'https://img.youtube.com/vi/OneFvk9RLBM/0.jpg', 0, 1),
(5, 3, 'DỊCH VỤ TẠI NHA KHOA YSMILE', '', 'Zk8PH6xvSkU', 'https://img.youtube.com/vi/Zk8PH6xvSkU/0.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videoscat`
--

CREATE TABLE `videoscat` (
  `id` int NOT NULL,
  `name_vi` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_en` text COLLATE utf8mb3_unicode_ci,
  `slug` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb3_unicode_ci,
  `description` text COLLATE utf8mb3_unicode_ci,
  `keyword` text COLLATE utf8mb3_unicode_ci,
  `number` int NOT NULL DEFAULT '0',
  `parent` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `videoscat`
--

INSERT INTO `videoscat` (`id`, `name_vi`, `name_en`, `slug`, `title`, `description`, `keyword`, `number`, `parent`) VALUES
(2, 'Cảm nhận khách hàng', '', 'cam-nhan-khach-hang', 'Danh mục videos', '', '', 0, 0),
(3, 'Giới thiệu Ysmiles', '', 'gioi-thieu-ysmiles', '', '', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baogia`
--
ALTER TABLE `baogia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camket`
--
ALTER TABLE `camket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camnhan`
--
ALTER TABLE `camnhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `idx-cart_items-user_id` (`user_id`),
  ADD KEY `idx-cart_items-product_id` (`product_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chinhanh`
--
ALTER TABLE `chinhanh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comboscat`
--
ALTER TABLE `comboscat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip_address` (`ip_address`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `newsletter_client`
--
ALTER TABLE `newsletter_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcounter_users`
--
ALTER TABLE `pcounter_users`
  ADD PRIMARY KEY (`user_ip`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postscat`
--
ALTER TABLE `postscat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_op`
--
ALTER TABLE `products_op`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshowcat`
--
ALTER TABLE `slideshowcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `thuvien`
--
ALTER TABLE `thuvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videoscat`
--
ALTER TABLE `videoscat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bacsi`
--
ALTER TABLE `bacsi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `baogia`
--
ALTER TABLE `baogia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `camket`
--
ALTER TABLE `camket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `camnhan`
--
ALTER TABLE `camnhan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `chinhanh`
--
ALTER TABLE `chinhanh`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `combos`
--
ALTER TABLE `combos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comboscat`
--
ALTER TABLE `comboscat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2212;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `hoatdong`
--
ALTER TABLE `hoatdong`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `newsletter_client`
--
ALTER TABLE `newsletter_client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `postscat`
--
ALTER TABLE `postscat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products_op`
--
ALTER TABLE `products_op`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slideshowcat`
--
ALTER TABLE `slideshowcat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thuvien`
--
ALTER TABLE `thuvien`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videoscat`
--
ALTER TABLE `videoscat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `products_op`
--
ALTER TABLE `products_op`
  ADD CONSTRAINT `products_op_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `products` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;