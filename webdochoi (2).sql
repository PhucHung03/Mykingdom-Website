-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 09:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdochoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `type` enum('Admin','Staff') NOT NULL DEFAULT 'Staff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `address`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2024-10-11 14:10:40', '123', '123', '1234567890', '', 'Active', 'Admin', '2024-10-11 14:10:40', '2024-10-11 14:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'LEGO', 'lego', 'Active', '2024-09-27 13:55:05', '2024-09-27 13:55:05'),
(2, 'MATTEL HOTWHEEL', 'mattel-hotwheel', 'Active', '2024-09-27 13:55:05', '2024-09-27 13:55:05'),
(3, 'CLEVER HIPPO', 'clever-hippo', 'Active', NULL, NULL),
(27, 'MAKE IT REAL', 'make-it-real', 'Active', NULL, NULL),
(28, 'BABY ALIVE', 'baby-alive', 'Active', NULL, NULL),
(29, 'PONY', 'pony', 'Active', NULL, NULL),
(30, 'VECTO', 'vecto', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `images` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `images`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ĐỒ CHƠI BÉ TRAI', 'hinhanh/img_blog/3_2_779.jpg', '-ch-i-b-trai', 'Active', '2024-09-27 13:58:00', '2024-09-27 13:58:00'),
(2, 'ĐỒ CHƠI BÉ GÁI', 'hinhanh/img_blog/2_187.jpg', '-ch-i-b-g-i', 'Active', '2024-09-27 13:58:00', '2024-09-27 13:58:00'),
(3, 'ĐỒ CHƠI LEGO', 'hinhanh/img_blog/ce94a7069eca50b16d3a047af943d20b_206.jpg', '-ch-i-lego', 'Active', '2024-09-27 13:58:00', '2024-09-27 13:58:00'),
(11, 'ĐỒ CHƠI ROBOT', 'hinhanh/img_blog/robot_719.jpg', '-ch-i-robot', 'Active', NULL, NULL),
(16, 'ĐỒ CHƠI UNISEX', 'hinhanh/img_blog/10_661.png', '-ch-i-unisex', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_03_123426_create_admins_table', 1),
(6, '2023_10_03_130747_create_categories_table', 2),
(7, '2023_10_03_130946_create_brands_table', 2),
(8, '2023_10_03_132635_create_products_table', 3),
(9, '2023_10_03_135606_create_reviews_table', 4),
(10, '2023_10_04_080710_create_orders_table', 5),
(11, '2023_10_04_081411_create_order_details_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `images` varchar(100) NOT NULL,
  `newcategory_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `summary`, `description`, `images`, `newcategory_id`, `created_at`, `updated_at`) VALUES
(7, 'Deal Hời Cho Mẹ - Quà Xinh Cho Bé', 'deal-h-i-cho-m---qu-xinh-cho-b-', 'Hoa LEGO Trang Trí - Biểu tượng tươi mới và xinh đẹp Đồ Chơi Lắp Ráp Bó Hoa Trang Trí Lego LEGO BOTANICALS 10313', 'Nhân dịp phụ nữ Việt Nam 20/10, Mykingdom gửi đến khách hàng thân yêu chương trình Deal hời cho mẹ - Quà xinh cho bé GIẢM GIÁ LÊN ĐẾN 40% diễn ra từ 5/10 - 15/10. Cơ hội sở hữu ngay loạt sản phẩm yêu thích nhân dịp đặc biệt này từ các thương hiệu đồ chơi nổi tiếng như LEGO, BABY LIVE, PLAY DOH, BARBIE,...', 'hinhanh/img_blog/900x486_693.jpg', 1, '2024-10-04 17:00:52', '2024-10-04 17:00:52'),
(9, 'Giải trí cực đỉnh cùng đồ chơi tương tác tại Mykingdom', 'gi-i-tr-c-c-nh-c-ng-ch-i-t-ng-t-c-t-i-mykingdom', 'Các đặc điểm nổi bật của đồ chơi tương tác sẽ là những lí do đáng để ba mẹ có thể tham khảo và chọn mua cho con em mình những bộ đồ chơi chất lượng.', 'Đồ chơi tương tác là công cụ cần thiết để con có thể tự chơi với bạn bè hoặc anh chị mà không cần đến sự trông coi của ba mẹ. Không những thế, đây còn là sự kết hợp giữa yếu tố giải trí và học tập đi kèm song song với nhau. Không chỉ đơn thuần là một hình thức giải trí, trò chơi tương tác còn mở ra nhiều cơ hội để bé kết nối với xã hội và phát triển bản thân trong giao tiếp sau này. ', 'hinhanh/img_blog/do-choi-tuong-tac_thumbnail_944.jpg', 1, '2024-10-04 17:48:49', '2024-10-04 17:48:49'),
(11, '5 hoạt động thú vị trong lễ hội trẻ em mà bạn cần biết', '5-ho-t-ng-th-v-trong-l-h-i-tr-em-m-b-n-c-n-bi-t', 'Lễ hội trẻ em luôn là hoạt động được mong chờ nhất mỗi dịp 1/6 hay Tết Trung Thu. Trong lễ hội, các bé sẽ được vui chơi và ăn uống các món ăn mình thích, tham gia các hoạt động tập thể vui nhộn cùng bạn bè. Hơn nữa, ngày hội là cách để tuyên truyền và cổ vũ trẻ em hưởng ứng các giá trị văn hóa lâu đời của dân tộc, giữ gìn và phát huy các bản sắc được lưu truyền qua biết bao thế hệ. Vậy thì trong lễ hội trẻ em thường có những hoạt động gì để trẻ em vui chơi và phát triển? Bạn hãy cùng Mykingdom tìm hiểu nhé!', 'Hát, múa văn nghệ\r\nBiểu diễn văn nghệ là hoạt động không thể thiếu trong lễ hội trẻ em. Các bé sẽ cùng nhau mặc lên những bộ trang phục đẹp mắt và trình bày các tiết mục để tạo không khí vui tươi, phấn khởi cho lễ hội. Đây là dịp để các bé thể hiện tài năng của bản thân, rèn luyện kỹ năng làm chủ sân khấu và trở nên tự tin hơn bao giờ hết. Thêm vào đó, việc phụ huynh đến tham gia lễ hội và làm khán giả cho con còn giúp bé trở nên tự hào với buổi biểu diễn của mình hơn.\r\n\r\nTrò chơi dân gian\r\nTrong lễ hội trẻ em tại trường học thường sẽ được tổ chức các trò chơi dân gian với mục đích tạo không khí và rèn luyện thể chất cho trẻ em. Trò chơi dân gian như mèo bắt chuột. bịt mắt bắt dê. rồng rắn lên mây, nhảy bao bố… đều cần sự phối hợp nhịp nhàng giữa các thành viên, nhờ vậy mà cải thiện khả năng làm việc nhóm cho trẻ. Chưa dừng lại ở đó, các trò chơi còn kích thích tinh thần thể dục thể thao để các bé trở nên năng động hơn. Đặc biệt, việc trò chơi dân gian được truyền từ thế hệ này sang thế hệ khác sẽ lưu giữ và phát triển nét đẹp văn hóa của nước ta.\r\n\r\nGóc sáng tạo và DIY\r\nỞ một số trường học, dịp lễ hội là cơ hội tuyệt vời để thực hành thủ công. Các bé sẽ được cùng nhau cắt giấy, vẽ tranh hoặc sử dụng đất nặn để tạo ra thành phẩm mong muốn. Giáo viên sẽ đóng vai trò là người hướng dẫn để bé hiện thực hóa những ý tưởng của mình. Hoạt động này vừa giúp bé có sản phẩm mang về khoe với bố mẹ, vừa kích thích sự sáng tạo và sự khéo léo của đôi tay trẻ.', 'hinhanh/img_blog/le-hoi-tre-em_thumbnail_267.jpg', 6, '2024-10-04 23:46:17', '2024-10-04 23:46:17'),
(12, 'Top 5 món quà 20/10 cho mẹ cực thiết thực và ý nghĩa', 'top-5-m-n-qu-20-10-cho-m-c-c-thi-t-th-c-v-ngh-a', 'Quà 20/10 cho mẹ luôn là một chủ đề được nhiều người quan tâm, đặc biệt trong dịp kỷ niệm tôn vinh phái đẹp để tri ân cho những hy sinh to lớn của mẹ. Nếu bạn đang tìm kiếm những món quà độc đáo và thú vị để làm mẹ bất ngờ và hạnh phúc, hãy cùng Mykingdom khám phá những gợi ý tuyệt vời ngay sau đây nhé!', 'Bó Hoa Trang Trí LEGO BOTANICALS\r\nBộ lắp ráp Bó Hoa Trang Trí Lego LEGO BOTANICALS là một lựa chọn vô cùng mới lạ để bạn dùng làm quà tặng cho mẹ. Bó hoa được tích hợp nhiều loại hoa với đa dạng sắc màu, tái hiện chân thực những những chiếc lá và nụ hoa chưa nở.\r\n\r\nBó hoa LEGO này còn được phối hợp hài hòa và cân bằng bởi được xen kẽ hoa baby trắng với các loại hoa sắc màu, làm tổng thể bó hoa không bị quá rối mắt những vẫn giữ được vẻ trẻ trung và tươi sáng. Lựa chọn sản phẩm này để trang trí trong nhà sẽ giúp cho tâm trạng của mẹ được thoải mái và nhẹ nhàng hơn rất nhiều đấy!\r\n\r\nBộ chăm sóc da từ thiên nhiên\r\nNhững người phụ nữ thân yêu đã hy sinh cả cuộc đời cho gia đình và con cái, vì thế bạn có thể nhân dịp này, tặng quà 20/10 cho mẹ nhằm nhắc nhở mẹ nên yêu thương bản thân nhiều hơn. Các món quà như đi spa, bộ mỹ phẩm chăm sóc da thiên nhiên đều vô cùng lý tưởng, giúp chăm sóc làn da của mẹ để mẹ luôn tự tin và tỏa sáng. \r\n\r\nTặng quà 20/10 cho mẹ với nước hoa \r\nNgoài mỹ phẩm, bạn có thể lựa chọn một chai nước hoa có hương thơm dịu nhẹ để làm quà 20/10 cho mẹ. Bạn hãy lưu ý để lựa chọn những dòng nước hoa đến từ các thương hiệu lớn hoặc các thương hiệu nổi tiếng với độ uy tín và chất lượng vì một chai nước hoa tốt sẽ không làm da bị kích ứng khi xịt lên.\r\nMột thỏi son môi chất lượng \r\nBạn có thể tặng cho một thỏi son môi chất lượng mẹ có thể “tô điểm” mỗi khi ra đường hoặc khi cần đi dự tiệc. Một thỏi son môi đẹp không những có thể làm khuôn mặt của mẹ thêm tươi tắn mà còn tượng trưng cho sự kiêu hãnh và tự tin của mỗi người phụ nữ. Bạn có thể tham khảo phong cách của mẹ để chọn màu son cho phù hợp nhé!\r\n\r\nMột chậu hoa lan LEGO\r\nChơi hoa lan là một thú vui khá tao nhã của người lớn tuổi. Đây là loài hoa có cành hoa dài, đứng thẳng và lá mỏng cho nên rất dễ bị đứt gãy bởi sự tác động ngoại cảnh như con người hay thời tiết, hay qua thời gian, những bông hoa sẽ rụng dần và héo úa. Hãy chọn mô hình chậu cây lan LEGO làm quà tặng cho mẹ để có thể có một chậu hoa vĩnh cửu, không bao giờ bị héo lụi, tàn úa nhé.\r\n\r\nChậu Hoa Lan Lego LEGO sở hữu những cành hoa lan trắng với nhiều kích thước to nhỏ khác nhau, uốn lượn vô cùng thanh nhã, kết hợp với những chiếc lá xanh bản to mang lại vẻ đẹp mong manh khó tả. LEGO còn cẩn thận và tỉ mỉ đến từng chi tiết khi tái hiện hoàn hảo những mảnh LEGO nhỏ để làm đất trồng hoa và các mầm xanh đang phát triển được mọc ra từ đất.', 'hinhanh/img_blog/qua-20-10-cho-me_thumbnail_611.jpg', 5, '2024-10-05 00:02:38', '2024-10-05 00:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `newscategories`
--

CREATE TABLE `newscategories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newscategories`
--

INSERT INTO `newscategories` (`id`, `name`, `slug`, `status`, `create_at`, `update_at`) VALUES
(1, 'Khuyến mãi lớn 55%', 'khuy-n-m-i-l-n-55-', 'Active', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Dạy con thông minh', 'd-y-con-th-ng-minh', 'Active', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Chơi cùng con ', 'ch-i-c-ng-con-', 'Active', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Mẹo hữu ích', 'm-o-h-u-ch', 'Active', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Hôm nay con chơi gì ', 'h-m-nay-con-ch-i-g-', 'Active', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `note` text DEFAULT NULL,
  `status` enum('Processing','Confirmed','Shipping','Delivered','Cancelled') NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `address`, `phone`, `note`, `status`, `created_at`, `updated_at`) VALUES
(16, 0, 'hưng', 'hung@gmail.com', 'Quảng trị', '0376963735', 'ship nhanh', 'Processing', '2024-10-06 03:16:56', '2024-10-06 03:16:56'),
(17, 0, 'phan công phúc hưng', 'fisph01@gmail.com', 'Quảng trị', '0376963735', 'ship chậm', 'Shipping', '2024-10-06 04:04:27', '2024-10-06 04:04:27'),
(18, 0, 'phương ', 'phuchung340@gmail.co', 'Hồ Chí Minh', '0832061251', 'giao hàng buổi sáng ', 'Shipping', '2024-10-06 06:08:47', '2024-10-06 06:08:47'),
(19, 0, 'ok', 'ok@gmail.com', '123 abc', '0376963735', 'giao hàng buổi sáng ', 'Confirmed', '2024-10-06 06:44:26', '2024-10-06 06:44:26'),
(20, 0, 'phan công phúc hưng', 'fisph01@gmail.com', 'Hồ Chí Minh', '0376963735', 'giao hàng buổi sáng ', 'Confirmed', '2024-10-11 13:44:32', '2024-10-11 13:44:32'),
(21, 0, 'người bí ẩn ', 'nguoibian@gmail.com', 'Hồ Chí Minh', '0123456789', 'khong ghi chu', 'Confirmed', '2024-10-11 15:36:41', '2024-10-11 15:36:41'),
(22, 0, 'Nguyễn văn a ', 'user@gmail.com', 'hồ chí minh', '1232533564', 'ok ', 'Shipping', '2024-10-19 02:49:24', '2024-10-19 02:49:24'),
(23, 0, 'Nguyễn Đình Hoàng', 'hoanglit652003@gmail', 'an lạc đông 1', '0981557780', '', 'Shipping', '2024-10-19 06:02:37', '2024-10-19 06:02:37'),
(24, 0, 'Hoàng', 'hoanglit652003@gmail', 'aaa', '0981557780', '', 'Confirmed', '2024-10-19 07:30:43', '2024-10-19 07:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(12, 16, 44, 419000, 1, 419000, '2024-10-06 03:16:56', '2024-10-06 03:16:56'),
(13, 17, 42, 419000, 4, 1676000, '2024-10-06 04:04:27', '2024-10-06 04:04:27'),
(14, 18, 42, 419000, 3, 1257000, '2024-10-06 06:08:47', '2024-10-06 06:08:47'),
(15, 19, 42, 419000, 5, 2095000, '2024-10-06 06:44:26', '2024-10-06 06:44:26'),
(16, 20, 42, 419000, 3, 1257000, '2024-10-11 13:44:32', '2024-10-11 13:44:32'),
(17, 21, 42, 419000, 1, 419000, '2024-10-11 15:36:41', '2024-10-11 15:36:41'),
(18, 22, 44, 419000, 2, 838000, '2024-10-19 02:49:24', '2024-10-19 02:49:24'),
(19, 23, 44, 419000, 1, 419000, '2024-10-19 06:02:37', '2024-10-19 06:02:37'),
(20, 24, 56, 178000, 1, 178000, '2024-10-19 07:30:43', '2024-10-19 07:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `summary` text NOT NULL,
  `stock` tinyint(3) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `disscounted_price` double NOT NULL,
  `images` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `summary`, `stock`, `price`, `disscounted_price`, `images`, `category_id`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(42, 'Đồ chơi lắp ráp Chiến giáp của Cole LEGO NINJAGO 71806', '-ch-i-l-p-r-p-chi-n-gi-p-c-a-cole-lego-ninjago-71806', '                            • Xây dựng những bộ chiến giáp của riêng bạn – Những bé hâm mộ NINJAGO® có thể tận hưởng hàng giờ vui vẻ sáng tạo khi kết hợp các bộ phận từ những bộ đồ chơi khác nhau (được bán riêng) để tạo ra những bộ siêu chiến giáp NINJAGO® của riêng mình\r\n\r\n• 2 nhân vật NINJAGO® – Bộ trò chơi bao gồm Cole với phụ kiện thanh kiếm mini và Chiến binh Sói gian ác cũng có thanh kiếm. Bé có thể tái hiện các trận chiến từ phần 2 của bộ phim hoạt hình NINJAGO Dragons Rising                        ', '                            Siêu chiến giáp của Cole có buồng lái và được trang bị một cây búa để chiến đấu với những tên Chiến binh Sói gian ác. Và bây giờ, bạn có thể kết hợp các bộ phận của 3 cỗ máy ninja tuyệt vời do Cole, Sora và Kai điều khiển để tạo ra cỗ máy kết hợp của riêng bạn. Mỗi cỗ máy có thể tùy chỉnh và được bán riêng, đi kèm với chân, tay, vũ khí và thân có thể tháo rời để bạn có thể kết hợp.                        ', 10, 599000, 419000, 'hinhanh/lego-ninjago_139.jpg', 3, 1, 'Active', NULL, NULL),
(43, 'Đồ Chơi Bộ 10 Siêu Xe Hot Wheels 54886', '-ch-i-b-10-si-u-xe-hot-wheels-54886', '                                                                                    Đồ chơi bộ 10 siêu xe Hot Wheels 54886 là món đồ chơi yêu thích của các nhà sưu tập, những người đam mê xe hơi và người hâm mộ đua xe ở mọi lứa tuổi. Những chiếc xe Hot Wheels cực chất, được thiết kế vô cùng tinh xảo với tỷ lệ thu nhỏ 1/64 từ chiếc xe ngoài đời thật. Tuyệt vời hơn, bộ 10 siêu xe còn tích hợp thêm một siêu xe đặc biệt, chỉ được bán kèm trong bộ này.                                                                         ', '                                                                                    Đồ Chơi Bộ 10 Siêu Xe Hot Wheels 54886 - Giao hàng ngẫu nhiên                                                                        ', 5, 679000, 0, 'hinhanh/hotwheels54886_750.jpg;hinhanh/hot-wheels54886_978.jpg', 1, 2, 'Active', NULL, NULL),
(44, 'Siêu xe trung chuyển Hot Wheels HOT WHEELS FLF56', 'si-u-xe-trung-chuy-n-hot-wheels-hot-wheels-flf56', '                                                                                    Hot Wheels là dòng đồ chơi xe mô hình cực kì được yêu thích tại Mỹ và nhiều nước trên thế giới với tỷ lệ 1:64 đặc biệt giống hệt như xe thật ngoài đời. Hot Wheels thuộc tập đoàn đồ chơi Mattel nổi tiếng hàng đầu hiện nay. Chính thức ra mắt từ năm 1968, tính đến nay, sau hơn 40 năm ra đời và phát triển, Hot Wheels đã có hàng triệu fan hâm mộ trên toàn thế giới, từ trẻ em đến người lớn.                                                                         ', '                                                                                    Dòng Siêu xe Hot Wheels mà bất cứ dân sưu tập nào cũng khao khát sở hữu trong bộ sưu tập đồ sộ của mình. Đa dạng chủ đề để bổ sung cho bộ sưu tập của bạn với: Car Culture, Pop Culture, Replica Entertainment, and Team Transports.                                                                        ', 15, 599000, 419000, 'hinhanh/fkf56_1_751.jpg;hinhanh/flf56_3_411.jpg;hinhanh/hotwheelsFLF56_377.jpg', 1, 2, 'Active', NULL, NULL),
(46, 'Bé Lily tập ăn dặm BABY ALIVE E5841', 'b-lily-t-p-n-d-m-baby-alive-e5841', '                                                                                    Sản phẩm búp bê Baby Alive E5841 - bé Lily là một sản phẩm không thể thiếu trong bộ sưu tập búp bê của các bé gái bởi các đặc điểm nổi bật sau:\r\n\r\n\r\n1. Bé búp bê thân cứng có kích thước là 35cm, phù hợp với chiều cao của trẻ em và là kích cỡ mà bé có thể dễ dàng quan sát.\r\n2. Bề mặt sản phẩm búp bê được thiết kế cẩn thận, thân thiện với cả những làn da mỏng manh nhất.\r\n2. Búp bê có thể uống nước, ăn bột và đi bô y như thật, mang đến cho các bé những trải nghiệm chân thực nhất.\r\n3. Từng chi tiết như mắt, mũi, miệng, tay, chân, … em bé búp bê đều được sơn vẽ tỉ mỉ với màu sắc trong sáng, đáng yêu, thu hút mọi ánh nhìn.                                                                        ', '                                                                                    Búp bê Baby Alive - bé Lily tập ăn dặm với hình dáng xinh xắn cùng những phụ kiện như bột ăn dặm, tã em bé đi kèm sẽ giúp cho trẻ có những giây phút chơi đùa, chăm sóc và nâng niu em bé dễ thương của mình. Việc tự tay thay tã và đúc cho em bé ăn chính là cách tốt nhất để cho trẻ em học được cách quan tâm, chăm sóc cho người khác, phát huy được khả năng nhanh nhạy khi xử lý tình huống.                                                                        ', 4, 1159000, 753000, 'hinhanh/Babi-alive-E5841_1_912.jpg', 2, 28, 'Active', NULL, NULL),
(47, 'Bộ thiết kế vòng tay ghép chữ MAKE IT REAL 1205MIR', 'b-thi-t-k-v-ng-tay-gh-p-ch-make-it-real-1205mir', '                                                                                                                                                                        Bộ sản phẩm bao gồm:-60 hạt chữ cái-70 hạt phong cách-Dây đàn hồi-Sách hướng dẫn-Khay đựng hạt                                                                                                                                                ', '                                                                                                                                                                        Làm bốn vòng tay hoàn toàn tuyệt vời nói bất cứ điều gì bạn muốn bằng cách sử dụng bộ hạt chữ cái Bảng chữ cái này, chuỗi hạt thời trang và bùa chú xinh xắn.                                                                                                                                                 ', 10, 139000, 0, 'hinhanh/bo-thiet-ke-vong-tay-ghep-chu-12_978.jpg', 2, 27, 'Active', NULL, NULL),
(48, 'Combo 5 sơn móng tay confetti MAKE IT REAL 10012MIR', 'combo-5-s-n-m-ng-tay-confetti-make-it-real-10012mir', '                            Đồ Chơi Combo 5 sơn móng tay confetti MAKE IT REAL 20260701/10012MIR Bộ 5 lọ sơn móng với 5 màu sành điệu, được tô điểm thêm với chủ đề confetti.                        ', '                            Đồ Chơi Combo 5 Sơn Móng Tay Confetti MAKE IT REAL 10012MIR                        ', 20, 169000, 0, 'hinhanh/combo-5-son-mong-tay-confetti-ma_453.jpg', 2, 27, 'Active', NULL, NULL),
(49, 'Trực thăng điều khiển từ xa WOLF FORCE (xanh dương) VECTO VTF8', 'tr-c-th-ng-i-u-khi-n-t-xa-wolf-force-xanh-d-ng-vecto-vtf8', '                            - Công nghệ tự giữ độ cao khiến máy bay luôn ở trạng thái lơ lửng giúp việc điều khiển dễ hơn rất nhiều\r\n- Tự do điều khiển trực thăng bay tới, lui, quẹo trái, phải\r\n- Nút nhấn tự động cất cánh/ hạ cánh\r\n- Chế độ chỉnh bay nhanh, bay chậm\r\n- Nút căn chỉnh trái phải\r\nThiết kế phóng khoáng, nhẹ nhàng tạo nên một vẻ ngoài trang nhã nhưng không kém phần mạnh mẽ. Cơ cấu khí động học hoàn hảo giúp trực thăng có thể chuyển động mượt mà.                        ', '                            CHINH PHỤC BẦU TRỜI CÙNG TRỰC THĂNG WOLF FORCE VECTO\r\nDòng trực thăng với pin sạc thế hệ mới cho thời gian chơi lên đến 22 phút hứa hẹn sẽ là mang đến những giờ bay đầy hào hứng cho các bé.                        ', 2, 799000, 0, 'hinhanh/vtf8_3_802.jpg', 1, 30, 'Active', NULL, NULL),
(50, 'EE - Pony Bánh Táo (Có thể cử động khớp) MY LITTLE PONY B3602', 'ee---pony-b-nh-t-o-c-th-c-ng-kh-p-my-little-pony-b3602', '                            Nếu con bạn là \"fan nhí\" của bộ phim My Little Pony hoặc yêu thích những món đồ chơi ngộ nghĩnh, nhiều màu sắc thì nhất định đừng bỏ qua bộ sưu tập búp bê ngựa Pony                        ', '                            Bộ sản phẩm gồm 1 Pony và phụ kiện đi kèm. Đặc biệt, chỉ trong bộ sản phẩm này Pony mới có khớp và có thể tạo dáng thoải mái.                        ', 9, 399000, 120000, 'hinhanh/pony-bánh-táo_583.jpg', 2, 29, 'Active', NULL, NULL),
(52, 'Đồ Chơi Lắp Ráp Thùng Gạch Duplo Sáng Tạo LEGO DUPLO 10913', '-ch-i-l-p-r-p-thu-ng-ga-ch-duplo-sa-ng-ta-o-lego-duplo-10913', 'Khi bạn mở hộp gạch LEGO® DUPLO® đầy màu sắc này, bạn sẽ mở ra một thế giới vui chơi sáng tạo và những lợi ích phát triển. Bộ vở kịch đa năng này chứa đựng nhiều ý tưởng và cảm hứng cho trẻ mới biết đi. Có một chiếc ô tô có bánh xe di chuyển, mái nhà, cửa sổ, hoa, bánh mì ... tất cả kết hợp với nhiều loại gạch và mảnh để chơi thỏa trí tưởng tượng. Bạn thậm chí có thể giới thiệu các số với 1,2 và 3 gạch.', 'LEGO DUPLO 10913 Thùng Gạch Duplo Sáng Tạo ( 65 Chi tiết)', 35, 1319000, 719000, 'hinhanh/legoduplo_417.jpg;hinhanh/legoduplo2_890.jpg', 3, 1, 'Active', NULL, NULL),
(53, 'Ô tô chiến xe Monster Jam MONSTER JAM 6044941', '-t-chi-n-xe-monster-jam-monster-jam-6044941', '                            Đồ chơi MONSTER JAM ô tô chiến xe 6044941 mô phỏng chân thật các chiến xe tham gia giải đấu Monster Jam. Với bất cứ những ai đam mê show thực tế này, chắc hẳn bạn đã có trong lòng chiếc xe yêu thích. Giờ đây, các cỗ máy chiến được tái hiện đầy hầm hố và ấn tượng hơn bao giờ hết!                        ', '                            Đồ Chơi MONSTER JAM Ô Tô Chiến Xe 6044941 - Giao hàng ngẫu nhiên                        ', 5, 209000, 0, 'hinhanh/o-to-chien-xe-monster-jam-604494_904.jpg', 1, 30, 'Active', NULL, NULL),
(54, 'Đồ Chơi Robot Tự Động Cleverbot Thông Thái VECTO VT2661', '-ch-i-robot-t-ng-cleverbot-th-ng-th-i-vecto-vt2661', 'Đồ Chơi Robot Tự Động Cleverbot Thông Thái VECTO VT2661\r\nVECTO - THẾ GIỚI ĐỒ CHƠI BÉ TRAI CỰC ĐỈNH\r\n\r\nVECTO là thương hiệu đồ chơi dành riêng cho các bé trai, với các dòng đồ chơi trải dài từ điều khiển từ xa đến lắp ráp. Với mong muốn giúp các bé trai có sự phát triển toàn diện từ trí não đến thể chất, Vecto đã phát triển đa dạng các loại đồ chơi nhằm mang đến cho bé nhiều lựa chọn nhất có thể, một số dòng đồ chơi nổi bật:\r\n\r\n- ROBOT ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY SÁNG TẠO\r\n- XE ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY PHƯƠNG HƯỚNG\r\n- ĐỒ CHƠI BAY – PHÁT TRIỂN TƯ DUY LOGIC\r\n- ĐỒ CHƠI LẮP RÁP DIY – PHÁT TRIỂN KỸ NĂNG VẬN ĐỘNG TINH\r\nVà còn nhiều dòng đồ chơi khác từ VECTO đang đợi bé khám phá.', 'Đồ Chơi Robot Tự Động Cleverbot Thông Thái VECTO VT2661\r\nVECTO - THẾ GIỚI ĐỒ CHƠI BÉ TRAI CỰC ĐỈNH\r\n\r\nVECTO là thương hiệu đồ chơi dành riêng cho các bé trai, với các dòng đồ chơi trải dài từ điều khiển từ xa đến lắp ráp. Với mong muốn giúp các bé trai có sự phát triển toàn diện từ trí não đến thể chất, Vecto đã phát triển đa dạng các loại đồ chơi nhằm mang đến cho bé nhiều lựa chọn nhất có thể, một số dòng đồ chơi nổi bật:\r\n\r\n- ROBOT ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY SÁNG TẠO\r\n- XE ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY PHƯƠNG HƯỚNG\r\n- ĐỒ CHƠI BAY – PHÁT TRIỂN TƯ DUY LOGIC\r\n- ĐỒ CHƠI LẮP RÁP DIY – PHÁT TRIỂN KỸ NĂNG VẬN ĐỘNG TINH\r\nVà còn nhiều dòng đồ chơi khác từ VECTO đang đợi bé khám phá.', 100, 349000, 300000, 'hinhanh/robot_541.png', 11, 30, 'Active', NULL, NULL),
(55, 'Đồ Chơi Robot Trực Thăng Cảm Biến (Xanh) VECTO VT2300B', '-ch-i-robot-tr-c-th-ng-c-m-bi-n-xanh-vecto-vt2300b', 'Đồ Chơi Robot Trực Thăng Cảm Biến (Xanh) VECTO VT2300B/BL\r\nVECTO - THẾ GIỚI ĐỒ CHƠI BÉ TRAI CỰC ĐỈNH\r\nVECTO là thương hiệu đồ chơi dành riêng cho các bé trai, với các dòng đồ chơi trải dài từ điều khiển từ xa đến lắp ráp. Với mong muốn giúp các bé trai có sự phát triển toàn diện từ trí não đến thể chất, Vecto đã phát triển đa dạng các loại đồ chơi nhằm mang đến cho bé nhiều lựa chọn nhất có thể, một số dòng đồ chơi nổi bật:\r\n- ROBOT ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY SÁNG TẠO\r\n- XE ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY PHƯƠNG HƯỚNG\r\n- ĐỒ CHƠI BAY – PHÁT TRIỂN TƯ DUY LOGIC\r\n- ĐỒ CHƠI LẮP RÁP DIY – PHÁT TRIỂN KỸ NĂNG VẬN ĐỘNG TINH\r\nVà còn nhiều dòng đồ chơi khác từ VECTO đang đợi bé khám phá.', 'Đồ Chơi Robot Trực Thăng Cảm Biến (Xanh) VECTO VT2300B/BL\r\nVECTO - THẾ GIỚI ĐỒ CHƠI BÉ TRAI CỰC ĐỈNH\r\nVECTO là thương hiệu đồ chơi dành riêng cho các bé trai, với các dòng đồ chơi trải dài từ điều khiển từ xa đến lắp ráp. Với mong muốn giúp các bé trai có sự phát triển toàn diện từ trí não đến thể chất, Vecto đã phát triển đa dạng các loại đồ chơi nhằm mang đến cho bé nhiều lựa chọn nhất có thể, một số dòng đồ chơi nổi bật:\r\n- ROBOT ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY SÁNG TẠO\r\n- XE ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY PHƯƠNG HƯỚNG\r\n- ĐỒ CHƠI BAY – PHÁT TRIỂN TƯ DUY LOGIC\r\n- ĐỒ CHƠI LẮP RÁP DIY – PHÁT TRIỂN KỸ NĂNG VẬN ĐỘNG TINH\r\nVà còn nhiều dòng đồ chơi khác từ VECTO đang đợi bé khám phá.', 20, 179000, 169000, 'hinhanh/1_269.png', 11, 30, 'Active', NULL, NULL),
(56, 'Đồ Chơi Robot Tự Động Vịt Lém Lỉnh VECTO VT9040C', '-ch-i-robot-t-ng-v-t-l-m-l-nh-vecto-vt9040c', 'Đồ Chơi Robot Tự Động Vịt Lém Lỉnh VECTO VT9040C\r\n\r\nVECTO - THẾ GIỚI ĐỒ CHƠI BÉ TRAI CỰC ĐỈNH\r\n\r\nVECTO là thương hiệu đồ chơi dành riêng cho các bé trai, với các dòng đồ chơi trải dài từ điều khiển từ xa đến lắp ráp. Với mong muốn giúp các bé trai có sự phát triển toàn diện từ trí não đến thể chất, Vecto đã phát triển đa dạng các loại đồ chơi nhằm mang đến cho bé nhiều lựa chọn nhất có thể, một số dòng đồ chơi nổi bật:\r\n\r\n- ROBOT ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY SÁNG TẠO\r\n- XE ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY PHƯƠNG HƯỚNG\r\n- ĐỒ CHƠI BAY – PHÁT TRIỂN TƯ DUY LOGIC\r\n- ĐỒ CHƠI LẮP RÁP DIY – PHÁT TRIỂN KỸ NĂNG VẬN ĐỘNG TINH\r\nVà còn nhiều dòng đồ chơi khác từ VECTO đang đợi bé khám phá.', 'Đồ Chơi Robot Tự Động Vịt Lém Lỉnh VECTO VT9040C\r\n\r\nVECTO - THẾ GIỚI ĐỒ CHƠI BÉ TRAI CỰC ĐỈNH\r\n\r\nVECTO là thương hiệu đồ chơi dành riêng cho các bé trai, với các dòng đồ chơi trải dài từ điều khiển từ xa đến lắp ráp. Với mong muốn giúp các bé trai có sự phát triển toàn diện từ trí não đến thể chất, Vecto đã phát triển đa dạng các loại đồ chơi nhằm mang đến cho bé nhiều lựa chọn nhất có thể, một số dòng đồ chơi nổi bật:\r\n\r\n- ROBOT ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY SÁNG TẠO\r\n- XE ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY PHƯƠNG HƯỚNG\r\n- ĐỒ CHƠI BAY – PHÁT TRIỂN TƯ DUY LOGIC\r\n- ĐỒ CHƠI LẮP RÁP DIY – PHÁT TRIỂN KỸ NĂNG VẬN ĐỘNG TINH\r\nVà còn nhiều dòng đồ chơi khác từ VECTO đang đợi bé khám phá.', 23, 189000, 178000, 'hinhanh/2_403.png', 11, 30, 'Active', NULL, NULL),
(57, 'Đồ Chơi Robot Tự Động - Chuột VECTO VT9902C', '-ch-i-robot-t-ng---chu-t-vecto-vt9902c', 'THÔNG TIN VỀ SẢN PHẨM:\r\nKích thước hộp hàng: 18 x 12 x 5 cm\r\nChủ đề: VECTO ROBOT\r\nNăm sản xuất: 2024\r\nXuất xứ thương hiệu: Việt Nam\r\nChất liệu: Nhựa và kim loại (An toàn tuyệt đối cho bé)\r\n\r\nBộ đồ chơi bao gồm:\r\n1 x Đồ chơi Robot tự động (kèm pin)\r\n\r\nVECTO - THẾ GIỚI ĐỒ CHƠI BÉ TRAI CỰC ĐỈNH\r\nVECTO là thương hiệu đồ chơi dành riêng cho các bé trai, với các dòng đồ chơi trải dài từ điều khiển từ xa đến lắp ráp. Với mong muốn giúp các bé trai có sự phát triển toàn diện từ trí não đến thể chất, Vecto đã phát triển đa dạng các loạli đồ chơi nhằm mang đến cho bé nhiều lựa chọn nhất có thể, một số dòng đồ chơi nổi bật:\r\n- ROBOT ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY SÁNG TẠO\r\n- XE ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY PHƯƠNG HƯỚNG\r\n- ĐỒ CHƠI BAY – PHÁT TRIỂN TƯ DUY LOGIC\r\n- ĐỒ CHƠI LẮP RÁP DIY – PHÁT TRIỂN KỸ NĂNG VẬN ĐỘNG TINH\r\nVà còn nhiều dòng đồ chơi khác từ VECTO đang đợi bé khám phá.', 'Đồ chơi Robot tự động – Chuột từ VECTO – Món đồ chơi robot sống động y như thật, cho bé chơi thật vui:\r\n+ Ngoại hình mô phỏng loài Chuột ngoài đời thật\r\n+ Di chuyển tự động xung quanh\r\n+ Nhiều cách chơi thú vị, có thể dùng cho những trò chọc ghẹo các bạn cực vui', 23, 129000, 120000, 'hinhanh/3_137.png', 11, 30, 'Active', NULL, NULL),
(58, 'Đồ Chơi Robot Tự Động - Nhện VECTO VT9902B', '-ch-i-robot-t-ng---nh-n-vecto-vt9902b', 'THÔNG TIN VỀ SẢN PHẨM:\r\nKích thước hộp hàng: 18 x 12 x 4 cm\r\nChủ đề: VECTO ROBOT\r\nNăm sản xuất: 2024\r\nXuất xứ thương hiệu: Việt Nam\r\nChất liệu: Nhựa và kim loại (An toàn tuyệt đối cho bé)\r\n\r\nBộ đồ chơi bao gồm:\r\n1 x Đồ chơi Robot tự động (kèm pin)\r\n\r\nVECTO - THẾ GIỚI ĐỒ CHƠI BÉ TRAI CỰC ĐỈNH\r\nVECTO là thương hiệu đồ chơi dành riêng cho các bé trai, với các dòng đồ chơi trải dài từ điều khiển từ xa đến lắp ráp. Với mong muốn giúp các bé trai có sự phát triển toàn diện từ trí não đến thể chất, Vecto đã phát triển đa dạng các loại đồ chơi nhằm mang đến cho bé nhiều lựa chọn nhất có thể, một số dòng đồ chơi nổi bật:\r\n- ROBOT ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY SÁNG TẠO\r\n- XE ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY PHƯƠNG HƯỚNG\r\n- ĐỒ CHƠI BAY – PHÁT TRIỂN TƯ DUY LOGIC\r\n- ĐỒ CHƠI LẮP RÁP DIY – PHÁT TRIỂN KỸ NĂNG VẬN ĐỘNG TINH\r\nVà còn nhiều dòng đồ chơi khác từ VECTO đang đợi bé khám phá.', 'Đồ chơi Robot tự động - Nhện từ VECTO – Món đồ chơi robot sống động y như thật, cho bé chơi thật vui:\r\n+ Ngoại hình mô phỏng loài Nhện ngoài đời thật\r\n+ Di chuyển tự động xung quanh\r\n+ Nhiều cách chơi thú vị, có thể dùng cho những trò chọc ghẹo các bạn cực vui', 45, 129000, 123000, 'hinhanh/4_594.png', 11, 30, 'Active', NULL, NULL),
(59, 'Đồ Chơi Lắp Ráp Bay Cùng Máy Bay Dodo LEGO ANIMAL CROSSING 77051 (292 chi tiết)', '-ch-i-l-p-r-p-bay-c-ng-m-y-bay-dodo-lego-animal-crossing-77051-292-chi-ti-t-', 'Đồ Chơi Lắp Ráp Bay Cùng Máy Bay Dodo LEGO ANIMAL CROSSING 77051 (292 chi tiết)\r\nKhơi dậy trí tưởng tượng của bé với bộ Lego Animal Crossing Bay Cùng Máy Bay Dodo (77051). Dành cho các bé từ 7 tuổi trở lên, bộ lắp ráp này cho phép các em tham gia cuộc phiêu lưu khám phá hòn đảo mới, giống như trong trò chơi Animal Crossing nổi tiếng.\r\n\r\nVới nhiều chi tiết thú vị, bộ đồ chơi cho phép các bé tự tạo nên câu chuyện của riêng mình trong khung cảnh quen thuộc. Sân bay có cầu cảng dẫn ra bãi biển, tháp điều khiển và cổng màu cam mở ra như thật. Khi hoàn thành lắp ráp, các bé có thể quay cánh quạt của thủy phi cơ và tưởng tượng hành trình cùng Wilbur và Tangy đến một vùng đất mới.\r\n\r\nBộ đồ chơi này còn tích hợp với ứng dụng Lego Builder, giúp trẻ dễ dàng phóng to, xoay mô hình 3D và tùy chỉnh cờ của sân bay. Bộ Lego Animal Crossing mang đến niềm vui từ thế giới trò chơi video vào thực tế, kích thích sự sáng tạo không giới hạn của trẻ em.', 'Đồ Chơi Lắp Ráp Bay Cùng Máy Bay Dodo LEGO ANIMAL CROSSING 77051 (292 chi tiết)\r\nKhơi dậy trí tưởng tượng của bé với bộ Lego Animal Crossing Bay Cùng Máy Bay Dodo (77051). Dành cho các bé từ 7 tuổi trở lên, bộ lắp ráp này cho phép các em tham gia cuộc phiêu lưu khám phá hòn đảo mới, giống như trong trò chơi Animal Crossing nổi tiếng.\r\n\r\nVới nhiều chi tiết thú vị, bộ đồ chơi cho phép các bé tự tạo nên câu chuyện của riêng mình trong khung cảnh quen thuộc. Sân bay có cầu cảng dẫn ra bãi biển, tháp điều khiển và cổng màu cam mở ra như thật. Khi hoàn thành lắp ráp, các bé có thể quay cánh quạt của thủy phi cơ và tưởng tượng hành trình cùng Wilbur và Tangy đến một vùng đất mới.\r\n\r\nBộ đồ chơi này còn tích hợp với ứng dụng Lego Builder, giúp trẻ dễ dàng phóng to, xoay mô hình 3D và tùy chỉnh cờ của sân bay. Bộ Lego Animal Crossing mang đến niềm vui từ thế giới trò chơi video vào thực tế, kích thích sự sáng tạo không giới hạn của trẻ em.', 26, 1179000, 1050000, 'hinhanh/5_727.png', 3, 1, 'Active', NULL, NULL),
(60, 'Đồ Chơi Lắp Ráp Hoa Trạng Nguyên LEGO BOTANICALS 10370 (608 chi tiết)', '-ch-i-l-p-r-p-hoa-tr-ng-nguy-n-lego-botanicals-10370-608-chi-ti-t-', 'Đồ Chơi Lắp Ráp Hoa Trạng Nguyên LEGO BOTANICALS 10370 (608 chi tiết)\r\nTạo nên một khung cảnh thanh lịch với bộ Lego Icons Hoa Trạng Nguyên (10370). Bộ mô hình này mang đến trải nghiệm thư giãn và là lựa chọn quà tặng hoàn hảo cho người thân, bạn bè.\r\n\r\nMô phỏng một cây hoa trạng nguyên ‘Grande Italia’ trong chậu giỏ dệt, mô hình này bao gồm những chiếc lá xanh và 5 chùm lá bracts đỏ tươi, kèm với nhụy hoa màu vàng ở trung tâm. Bộ đồ chơi dễ dàng lắp ráp, mang lại niềm vui trong quá trình xây dựng và tạo nên một tác phẩm trưng bày thanh lịch cho ngôi nhà hoặc văn phòng.\r\n\r\nHãy khám phá loạt bộ Lego trong Bộ Sưu Tập Thực Vật Lego, mang đến sự thư giãn và sáng tạo. Hướng dẫn lắp ráp phiên bản kỹ thuật số có thể được tìm thấy trên ứng dụng Lego Builder, giúp bạn dễ dàng theo dõi và hoàn thành mô hình.', 'Đồ Chơi Lắp Ráp Hoa Trạng Nguyên LEGO BOTANICALS 10370 (608 chi tiết)\r\nTạo nên một khung cảnh thanh lịch với bộ Lego Icons Hoa Trạng Nguyên (10370). Bộ mô hình này mang đến trải nghiệm thư giãn và là lựa chọn quà tặng hoàn hảo cho người thân, bạn bè.\r\n\r\nMô phỏng một cây hoa trạng nguyên ‘Grande Italia’ trong chậu giỏ dệt, mô hình này bao gồm những chiếc lá xanh và 5 chùm lá bracts đỏ tươi, kèm với nhụy hoa màu vàng ở trung tâm. Bộ đồ chơi dễ dàng lắp ráp, mang lại niềm vui trong quá trình xây dựng và tạo nên một tác phẩm trưng bày thanh lịch cho ngôi nhà hoặc văn phòng.\r\n\r\nHãy khám phá loạt bộ Lego trong Bộ Sưu Tập Thực Vật Lego, mang đến sự thư giãn và sáng tạo. Hướng dẫn lắp ráp phiên bản kỹ thuật số có thể được tìm thấy trên ứng dụng Lego Builder, giúp bạn dễ dàng theo dõi và hoàn thành mô hình.', 45, 1619000, 1350000, 'hinhanh/6_728.png', 3, 1, 'Active', NULL, NULL),
(61, 'Đồ Chơi Lắp Ráp Xe Batmobile Huyền Thoại LEGO SUPERHEROES 76328 (1822 chi tiết)', '-ch-i-l-p-r-p-xe-batmobile-huy-n-tho-i-lego-superheroes-76328-1822-chi-ti-t-', 'Đồ Chơi Lắp Ráp Xe Batmobile Huyền Thoại LEGO SUPERHEROES 76328 (1822 chi tiết)\r\nLego DC Batman™: Xe Batmobile Huyền Thoại (76328) là bộ lắp ráp sưu tầm lý tưởng cho các fan của Batman, mang đến trải nghiệm xây dựng và trưng bày đầy thú vị.\r\n\r\nĐược lấy cảm hứng từ chiếc Batmobile mang tính biểu tượng trong loạt phim truyền hình Batman năm 1966, bộ đồ chơi này là một món quà sáng tạo hoàn hảo cho những người yêu thích siêu anh hùng và văn hóa pop của thập niên 60.\r\n\r\nChiếc Batmobile này nổi bật với kính chắn gió được thiết kế tinh xảo, bánh xe có thể xoay, và khoang chứa đồ mở ra với Bat-Computer. Bộ đồ chơi còn đi kèm một nhân vật minifigure Batman phong cách 1966 với áo choàng, mũ đặc trưng và Batarang™. Batman đứng trên một nền tảng riêng biệt (minifigure không vừa trong xe), làm tăng thêm giá trị trưng bày cho bộ sưu tập.\r\n\r\nĐể hỗ trợ quá trình lắp ráp, hướng dẫn kỹ thuật số của bộ lắp ráp này có sẵn trên ứng dụng Lego Builder, giúp dễ dàng theo dõi và hoàn thành mô hình. Bộ LEGO này mang lại trải nghiệm thỏa mãn cho những người đam mê mô hình và lắp ráp với nhiều năm kinh nghiệm.\"', 'Đồ Chơi Lắp Ráp Xe Batmobile Huyền Thoại LEGO SUPERHEROES 76328 (1822 chi tiết)\r\nLego DC Batman™: Xe Batmobile Huyền Thoại (76328) là bộ lắp ráp sưu tầm lý tưởng cho các fan của Batman, mang đến trải nghiệm xây dựng và trưng bày đầy thú vị.\r\n\r\nĐược lấy cảm hứng từ chiếc Batmobile mang tính biểu tượng trong loạt phim truyền hình Batman năm 1966, bộ đồ chơi này là một món quà sáng tạo hoàn hảo cho những người yêu thích siêu anh hùng và văn hóa pop của thập niên 60.\r\n\r\nChiếc Batmobile này nổi bật với kính chắn gió được thiết kế tinh xảo, bánh xe có thể xoay, và khoang chứa đồ mở ra với Bat-Computer. Bộ đồ chơi còn đi kèm một nhân vật minifigure Batman phong cách 1966 với áo choàng, mũ đặc trưng và Batarang™. Batman đứng trên một nền tảng riêng biệt (minifigure không vừa trong xe), làm tăng thêm giá trị trưng bày cho bộ sưu tập.\r\n\r\nĐể hỗ trợ quá trình lắp ráp, hướng dẫn kỹ thuật số của bộ lắp ráp này có sẵn trên ứng dụng Lego Builder, giúp dễ dàng theo dõi và hoàn thành mô hình. Bộ LEGO này mang lại trải nghiệm thỏa mãn cho những người đam mê mô hình và lắp ráp với nhiều năm kinh nghiệm.\"', 12, 4869000, 4500000, 'hinhanh/7_623.png', 3, 1, 'Active', NULL, NULL),
(62, 'Bộ Thử Thách 4 Vòng Xoắn Cực Đại HOT WHEELS HXR70', 'b-th-th-ch-4-v-ng-xo-n-c-c-i-hot-wheels-hxr70', '                            Đồ Chơi Bộ Thử Thách 4 Vòng Xoắn Cực Đại HOT WHEELS HXR70\r\n- Khởi động cuộc đua qua bốn vòng lượn đầy kịch tính với Bộ thử thách Hot Wheels 4 vòng xoắn cực đại.\r\n\r\n- Bộ đồ chơi đi kèm với bộ tăng áp có động cơ giúp các xe chạy liên tục, tạo thêm phần hấp dẫn. Trẻ có thể cho nhiều xe đua vào cùng một lúc và xem những chiếc xe đua va chạm vào nhau. \r\n\r\n- Dễ dàng gập lại để cất giữ và trên bộ tăng áp còn có chỗ để đỗ 5 chiếc xe tỷ lệ 1:64.\r\n\r\n- Với một xe Hot Wheels tỷ lệ 1:64 đã bao gồm trong bộ đồ chơi, trẻ có thể thả xe vào bộ tăng áp, xem xe lao qua khu vực va chạm và lượn qua 4 vòng đua. Bộ tăng áp động cơ giúp xe di chuyển không ngừng và còn có thể thêm nhiều xe hơn để tăng thêm phần thú vị. \r\n\r\n- Phù hợp cho trẻ từ 5 tuổi trở lên. Trò chơi không chỉ đem lại những pha nhào lộn và va chạm ngoạn mục mà còn kích thích trí tưởng tượng và niềm hứng thú với đua xe của trẻ em!\r\n\r\nSản phẩm liên quan                        ', '                            Đồ Chơi Bộ Thử Thách 4 Vòng Xoắn Cực Đại HOT WHEELS HXR70\r\n- Khởi động cuộc đua qua bốn vòng lượn đầy kịch tính với Bộ thử thách Hot Wheels 4 vòng xoắn cực đại.\r\n\r\n- Bộ đồ chơi đi kèm với bộ tăng áp có động cơ giúp các xe chạy liên tục, tạo thêm phần hấp dẫn. Trẻ có thể cho nhiều xe đua vào cùng một lúc và xem những chiếc xe đua va chạm vào nhau. \r\n\r\n- Dễ dàng gập lại để cất giữ và trên bộ tăng áp còn có chỗ để đỗ 5 chiếc xe tỷ lệ 1:64.\r\n\r\n- Với một xe Hot Wheels tỷ lệ 1:64 đã bao gồm trong bộ đồ chơi, trẻ có thể thả xe vào bộ tăng áp, xem xe lao qua khu vực va chạm và lượn qua 4 vòng đua. Bộ tăng áp động cơ giúp xe di chuyển không ngừng và còn có thể thêm nhiều xe hơn để tăng thêm phần thú vị. \r\n\r\n- Phù hợp cho trẻ từ 5 tuổi trở lên. Trò chơi không chỉ đem lại những pha nhào lộn và va chạm ngoạn mục mà còn kích thích trí tưởng tượng và niềm hứng thú với đua xe của trẻ em!\r\n\r\nSản phẩm liên quan                        ', 34, 1799000, 1350000, 'hinhanh/8_509.png', 1, 1, 'Active', NULL, NULL),
(64, 'Đồ Chơi Nhà Bếp Dáng Balo Có Đèn Frozen SWEET HEART SH10099', '-ch-i-nh-b-p-d-ng-balo-c-n-frozen-sweet-heart-sh10099', 'Đồ Chơi Nhà Bếp Dáng Balo Có Đèn Frozen SWEET HEART SH10099\r\nĐồ Chơi Nhà Bếp Dáng Balo Có Đèn Frozen SH10099 bộ đồ chơi nhà bếp dạng balo tiện lợi hình Frozen xinh xắn phù hợp cho bé gái.\r\n\r\nNhiều phụ kiện, dụng cụ nhà bếp cho bé thoả sức phụ mẹ chuẩn bị bữa ăn cho gia đình', 'Đồ Chơi Nhà Bếp Dáng Balo Có Đèn Frozen SWEET HEART SH10099\r\nĐồ Chơi Nhà Bếp Dáng Balo Có Đèn Frozen SH10099 bộ đồ chơi nhà bếp dạng balo tiện lợi hình Frozen xinh xắn phù hợp cho bé gái.\r\n\r\nNhiều phụ kiện, dụng cụ nhà bếp cho bé thoả sức phụ mẹ chuẩn bị bữa ăn cho gia đình', 4, 379000, 350000, 'hinhanh/9_180.png', 2, 27, 'Active', NULL, NULL),
(65, 'Đồ Chơi Lắp Ráp Thùng Gạch Trung Classic Sáng Tạo LEGO CLASSIC 10696', '-ch-i-l-p-r-p-th-ng-g-ch-trung-classic-s-ng-t-o-lego-classic-10696', 'LEGO CLASSIC 10696 Thùng Gạch Trung Classic Sáng Tạo ( 484 Chi tiết)\r\n\r\n\r\nĐược thiết kế dành cho các nhà xây dựng ở mọi lứa tuổi, bộ sưu tập gạch LEGO® với 35 màu sắc khác nhau này sẽ khuyến khích chơi xây dựng không gian mở và truyền cảm hứng cho mọi trí tưởng tượng. Cửa sổ, mắt và rất nhiều bánh xe tăng thêm sự thú vị và cung cấp khả năng vô tận cho việc xây dựng và chơi xe sáng tạo. Một bộ bổ sung tuyệt vời cho bất kỳ bộ sưu tập LEGO hiện có nào, bộ này đi kèm trong một hộp lưu trữ bằng nhựa tiện lợi và bao gồm các ý tưởng để bắt đầu xây dựng.\r\n\r\n', 'LEGO CLASSIC 10696 Thùng Gạch Trung Classic Sáng Tạo ( 484 Chi tiết)\r\n\r\n\r\nĐược thiết kế dành cho các nhà xây dựng ở mọi lứa tuổi, bộ sưu tập gạch LEGO® với 35 màu sắc khác nhau này sẽ khuyến khích chơi xây dựng không gian mở và truyền cảm hứng cho mọi trí tưởng tượng. Cửa sổ, mắt và rất nhiều bánh xe tăng thêm sự thú vị và cung cấp khả năng vô tận cho việc xây dựng và chơi xe sáng tạo. Một bộ bổ sung tuyệt vời cho bất kỳ bộ sưu tập LEGO hiện có nào, bộ này đi kèm trong một hộp lưu trữ bằng nhựa tiện lợi và bao gồm các ý tưởng để bắt đầu xây dựng.\r\n\r\n', 12, 761000, 560000, 'hinhanh/11_504.png', 16, 1, 'Active', NULL, NULL),
(66, 'Đồ Chơi Lắp Ráp Đoàn Tàu Sinh Nhật Của Mickey & Minnie LEGO DUPLO 10941', '-ch-i-l-p-r-p-o-n-t-u-sinh-nh-t-c-a-mickey-minnie-lego-duplo-10941', 'LEGO DUPLO 10941 Đoàn Tàu Sinh Nhật Của Mickey & Minnie ( 22 Chi tiết)\r\nLEGO DUPLO 10941 Đoàn Tàu Sinh Nhật Của Mickey & Minnie ( 22 Chi tiết) xứng đáng là món quà tuyệt vời dành cho bé yêu của bạn. Với các hoạt động phát triển và có các nhân vật Disney yêu thích, bộ chơi xây dựng cao cấp này là cách hoàn hảo để giới thiệu cho trẻ mẫu giáo về số lượng, xây dựng sáng tạo và phép thuật Disney! Học tập vui tươi cho trẻ nhỏ Trẻ mới biết đi tham gia cùng chuột Mickey, chuột Minnie và Sao Diêm Vương của Disney khi chúng lái tàu sinh nhật, dừng lại để chơi và học với các hoạt động trên tàu. Bộ xây dựng đầy màu sắc này cải thiện kỹ năng vận động tốt khi trẻ em lắp ráp tàu và xếp chồng các viên gạch số; truyền cảm hứng sáng tạo khi họ trang trí toa xe và phát triển các kỹ năng xã hội khi họ nhập vai với các nhân vật Disney đáng yêu. Xây dựng kỹ năng với các nhân vật Disney nổi tiếng Tất cả các bộ xây dựng LEGO DUPLO Disney đều được thiết kế chuyên nghiệp với các tính năng tưởng tượng và các nhân vật mang tính biểu tượng để cha mẹ có thể cùng chơi với bé và tạo ra những khoảnh khắc đáng nhớ.', 'LEGO DUPLO 10941 Đoàn Tàu Sinh Nhật Của Mickey & Minnie ( 22 Chi tiết)\r\nLEGO DUPLO 10941 Đoàn Tàu Sinh Nhật Của Mickey & Minnie ( 22 Chi tiết) xứng đáng là món quà tuyệt vời dành cho bé yêu của bạn. Với các hoạt động phát triển và có các nhân vật Disney yêu thích, bộ chơi xây dựng cao cấp này là cách hoàn hảo để giới thiệu cho trẻ mẫu giáo về số lượng, xây dựng sáng tạo và phép thuật Disney! Học tập vui tươi cho trẻ nhỏ Trẻ mới biết đi tham gia cùng chuột Mickey, chuột Minnie và Sao Diêm Vương của Disney khi chúng lái tàu sinh nhật, dừng lại để chơi và học với các hoạt động trên tàu. Bộ xây dựng đầy màu sắc này cải thiện kỹ năng vận động tốt khi trẻ em lắp ráp tàu và xếp chồng các viên gạch số; truyền cảm hứng sáng tạo khi họ trang trí toa xe và phát triển các kỹ năng xã hội khi họ nhập vai với các nhân vật Disney đáng yêu. Xây dựng kỹ năng với các nhân vật Disney nổi tiếng Tất cả các bộ xây dựng LEGO DUPLO Disney đều được thiết kế chuyên nghiệp với các tính năng tưởng tượng và các nhân vật mang tính biểu tượng để cha mẹ có thể cùng chơi với bé và tạo ra những khoảnh khắc đáng nhớ.', 23, 643000, 630000, 'hinhanh/13_813.png', 16, 1, 'Active', NULL, NULL),
(67, 'Cá ngựa ru ngủ - Hồng FISHER PRICE MATTEL DGH83', 'c-ng-a-ru-ng---h-ng-fisher-price-mattel-dgh83', 'Đồ Chơi FISHER PRICE Cá Ngựa Ru Ngủ - Hồng DGH83\r\n\r\n\r\nĐồ chơi Fisher Price cá ngựa ru ngủ - hồng DGH83 là hãng đồ chơi dành cho trẻ sơ sinh tại Mỹ. Đồ chơi của hãng giúp cho bé có thể vui chơi, thư giãn, học hỏi, tiếp cận, vận động, di chuyển phát triển thể lực, tính phối hợp và sự tự tin của bé. Từ đó giúp bé tăng khả năng nhận thức: khuyến khích bé cảm nhận, lắng nghe, chạm vào và nhận thức thông qua các trò chơi, kích thích sự tò mò tự nhiên, cũng như xây dựng khả năng sáng tạo và trí thông minh cho bé.', 'Đồ Chơi FISHER PRICE Cá Ngựa Ru Ngủ - Hồng DGH83\r\n\r\n\r\nĐồ chơi Fisher Price cá ngựa ru ngủ - hồng DGH83 là hãng đồ chơi dành cho trẻ sơ sinh tại Mỹ. Đồ chơi của hãng giúp cho bé có thể vui chơi, thư giãn, học hỏi, tiếp cận, vận động, di chuyển phát triển thể lực, tính phối hợp và sự tự tin của bé. Từ đó giúp bé tăng khả năng nhận thức: khuyến khích bé cảm nhận, lắng nghe, chạm vào và nhận thức thông qua các trò chơi, kích thích sự tò mò tự nhiên, cũng như xây dựng khả năng sáng tạo và trí thông minh cho bé.', 32, 649000, 620000, 'hinhanh/14_420.png', 16, 28, 'Active', NULL, NULL),
(68, 'Đồ chơi lật đật thả vòng PEEK A BOO 3136', '-ch-i-l-t-t-th-v-ng-peek-a-boo-3136', 'PEEK A BOO - ĐỒ CHƠI LẬT ĐẬT THẢ VÒNG - 3136\r\nĐồ chơi lật đật thả vòng phù hợp cho bé từ 3 – 9 tháng tuổi với nhiều cách chơi khác nhau giúp bé phát triển vận động tinh, kết hợp tay – mắt, giúp bé nhận biết màu sắc, chữ cái, con số và phát triển tư duy logic.\r\nVới bé 3 tháng tuổi, bé có thể chơi với từng vòng tròn như chiếc lục lạc nhỏ. Khi bé lắc, vòng tròn sẽ phát ra tiếng kích thích sự tò mò của bé.', 'PEEK A BOO - ĐỒ CHƠI LẬT ĐẬT THẢ VÒNG - 3136\r\nĐồ chơi lật đật thả vòng phù hợp cho bé từ 3 – 9 tháng tuổi với nhiều cách chơi khác nhau giúp bé phát triển vận động tinh, kết hợp tay – mắt, giúp bé nhận biết màu sắc, chữ cái, con số và phát triển tư duy logic.\r\nVới bé 3 tháng tuổi, bé có thể chơi với từng vòng tròn như chiếc lục lạc nhỏ. Khi bé lắc, vòng tròn sẽ phát ra tiếng kích thích sự tò mò của bé.', 3, 199000, 100000, 'hinhanh/15_574.png', 16, 27, 'Active', NULL, NULL),
(69, 'Xe tải nhiều ngăn - Cứu hỏa (nhỏ) VECTO 666-03K', 'xe-t-i-nhi-u-ng-n---c-u-h-a-nh-vecto-666-03k', 'Mô tả sản phẩm\r\nXe tải nhiều ngăn chủ đề cứu hỏa bao gồm 5 xe cứu hỏa và 1 trực thăng, 4 chi tiết trang trí giao thông Bé còn có thể thả các xe con vào đường phóng được tích hợp trên đầu xe tải lớn để tăng cường tốc độ cho các xe con nữa đó. Bộ đồ chơi hứa hẹn sẽ là một món đồ không thể thiếu trong bộ sưu tập xe của các bé trai yêu thích xe mô hình.\r\n\r\nVECTO - THẾ GIỚI ĐỒ CHƠI BÉ TRAI CỰC ĐỈNH\r\n\r\nVECTO là thương hiệu đồ chơi dành riêng cho các bé trai, với các dòng đồ chơi trải dài từ đồ chơi mô hình cho đến các đồ chơi điều khiển từ xa. Với mong muốn giúp các bé trai có một sự phát triển toàn diện từ trí não đến thể chất, Vecto đã phát triển đa dạng các loại đồ chơi để đem đến cho bé nhiều lựa chọn nhất có thể, có thể kể đến như:\r\n\r\n- ROBOT ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY SÁNG TẠO\r\n\r\n- XE ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY PHƯƠNG HƯỚNG - ĐỒ CHƠI BAY ĐIỀU KHIỂN – PHÁT TRIỂN TƯ DUY LOGIC\r\n\r\n- BỘ ĐỒ CHƠI LẮP RÁP DIY – PHÁT TRIỂN KỸ NĂNG VẬN ĐỘNG TINH', 'Xe tải nhiều ngăn chủ đề cứu hỏa bao gồm 5 xe cứu hỏa và 1 trực thăng, 4 chi tiết trang trí giao thông Bé còn có thể thả các xe con vào đường phóng được tích hợp trên đầu xe tải lớn để tăng cường tốc độ cho các xe con nữa đó. Bộ đồ chơi hứa hẹn sẽ là một món đồ không thể thiếu trong bộ sưu tập xe của các bé trai yêu thích xe mô hình.', 1, 230000, 128000, 'hinhanh/16_570.png', 16, 30, 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Phúc Hưng', 'phuchung340@gmail.com', '2024-10-19 04:26:27', '$2y$10$MCGs2bYJPAyoPGCftSc0ze5hyIQFthsT4iiIDyKZTF9FU/HV4Z9bC', NULL, '0376963735', '592/16 Hồ Học Lãm', 'Active', '2024-10-19 04:26:27', '2024-10-19 04:26:27'),
(4, 'nguoidung', 'nguoidung@gmail.com', '2024-10-19 04:33:04', '$2y$10$FdR0F7/R4k.LUHTQoUXlWeQCoeY7x4tiUg84l3YUTPiIb7m2WSgvK', NULL, '12304058323', '592/16 Hồ Học Lãm', 'Active', '2024-10-19 04:33:04', '2024-10-19 04:33:04'),
(5, 'Nguyễn Đình Hoàng', 'hoanglit652003@gmail.com', '2024-10-19 05:15:21', '$2y$10$kFZEmcszCDvsDkJwcZaipe3LNHFwKkjzNo6NZHgDueBkOOrK/MJxe', NULL, '123456789', 'aaaaa', 'Active', '2024-10-19 05:15:21', '2024-10-19 05:15:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newscategories`
--
ALTER TABLE `newscategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `newscategories`
--
ALTER TABLE `newscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
