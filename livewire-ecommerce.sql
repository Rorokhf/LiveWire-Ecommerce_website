-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 06:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livewire-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `attrbute_values`
--

CREATE TABLE `attrbute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_attrbute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attrbute_values`
--

INSERT INTO `attrbute_values` (`id`, `product_attrbute_id`, `value`, `product_id`, `created_at`, `updated_at`) VALUES
(10, 2, 'x', 29, '2021-11-08 00:36:33', '2021-11-08 00:36:33'),
(11, 2, ' xl ', 29, '2021-11-08 00:36:33', '2021-11-08 00:36:33'),
(12, 2, 'l ', 29, '2021-11-08 00:36:33', '2021-11-08 00:36:33'),
(13, 3, 'red', 29, '2021-11-08 00:36:33', '2021-11-08 00:36:33'),
(14, 3, 'blue', 29, '2021-11-08 00:36:33', '2021-11-08 00:36:33'),
(15, 3, 'green', 29, '2021-11-08 00:36:33', '2021-11-08 00:36:33'),
(16, 3, 'pink', 29, '2021-11-08 00:36:33', '2021-11-08 00:36:33'),
(20, 2, 'x ', 23, '2021-11-08 13:53:41', '2021-11-08 13:53:41'),
(21, 2, ' xl ', 23, '2021-11-08 13:53:41', '2021-11-08 13:53:41'),
(22, 2, ' l', 23, '2021-11-08 13:53:41', '2021-11-08 13:53:41'),
(23, 3, 'red ', 23, '2021-11-08 13:53:41', '2021-11-08 13:53:41'),
(24, 3, ' green ', 23, '2021-11-08 13:53:41', '2021-11-08 13:53:41'),
(25, 3, ' pink', 23, '2021-11-08 13:53:41', '2021-11-08 13:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', '2021-09-27 22:30:04', '2021-09-29 18:07:52'),
(2, 'Fashion', 'fasion', '2021-09-27 22:30:04', '2021-09-29 18:08:57'),
(4, 'Health $ Beauty', 'health-beauty', '2021-09-27 22:30:04', '2021-09-30 17:44:23'),
(6, 'Home & Office', 'home-office', '2021-09-27 22:30:04', '2021-10-02 00:58:54'),
(7, 'Game', 'game', '2021-09-29 14:20:50', '2021-09-29 14:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'rawan', 'rorokhf2007@gmail.com', '01015177817', 'please be srtong', '2021-11-01 02:39:21', '2021-11-01 02:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `created_at`, `updated_at`, `expiry_date`) VALUES
(1, '505', 'percent', '5.00', '500.00', '2021-10-05 17:52:31', '2021-10-05 17:52:31', '2021-10-06'),
(2, 'B2020', 'fixed', '30.00', '600.00', '2021-10-05 17:55:38', '2021-10-05 17:55:38', '2021-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sel_categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `sel_categories`, `no_of_product`, `created_at`, `updated_at`) VALUES
(1, '1,2,4,7', 6, NULL, '2021-09-30 23:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `subtitle`, `price`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Tool', '2000', 'http://127.0.0.1:8000/shop', '1633028261.jpg', 1, '2021-09-30 16:57:41', '2021-09-30 16:57:41'),
(2, 'Electronics', 'Mobils', '2500', 'http://127.0.0.1:8000/shop', '1633028629.jpg', 1, '2021-09-30 17:03:49', '2021-09-30 17:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_09_27_205045_create_sessions_table', 1),
(7, '2021_09_27_234202_create_categories_table', 2),
(8, '2021_09_27_234226_create_products_table', 2),
(9, '2021_09_30_165832_create_home_sliders_table', 3),
(10, '2021_10_01_012128_create_home_categories_table', 4),
(11, '2021_10_02_002753_create_sales_table', 5),
(12, '2021_10_05_164023_create_coupons_table', 6),
(13, '2021_10_05_232940_add_expiry_date_to_coupon_table', 7),
(14, '2021_10_06_135754_create_orders_table', 8),
(15, '2021_10_06_135852_create_order_items_table', 8),
(16, '2021_10_06_135940_create_shippings_table', 8),
(17, '2021_10_06_140017_create_transactions_table', 8),
(18, '2021_10_09_035052_add_delivered_canceled_date_to_orders_table', 9),
(19, '2021_10_10_021344_create_reviews_table', 10),
(20, '2021_10_10_023230_add_rstatus_to_order_items_table', 11),
(21, '2021_11_01_034057_create_contacts_table', 12),
(22, '2021_11_01_044530_create_settings_table', 13),
(23, '2021_11_02_121600_create_shoppingcart_table', 14),
(24, '2021_11_04_125359_create_subcategories_table', 15),
(25, '2021_11_05_160705_add_subcategory_id_to_products_table', 16),
(26, '2021_11_06_224358_create_profiles_table', 17),
(27, '2021_11_07_180624_create_product_attributes_table', 18),
(28, '2021_11_08_002827_create_attrbute_values_table', 19),
(29, '2021_11_08_163602_add_options_to_order_items_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ordered','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `firstname`, `lastname`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `zipcode`, `status`, `is_shipping_different`, `created_at`, `updated_at`, `delivered_date`, `canceled_date`) VALUES
(1, 2, '60000.00', '50.00', '21.00', '30021.00', 'jude', 'Omar', '010154534', 'jude@gmail.com', '65', NULL, 'alex', 'alex', 'Egypt', '5555', 'delivered', 1, '2021-10-09 01:34:06', '2021-10-09 23:13:35', '2021-10-10', '2021-10-10'),
(2, 2, '5000.00', '0.00', '21.00', '5021.00', 'jude', 'Omar', '016171819', 'jude@gmail.com', 'alex-flemming', 'alex-gleem', 'alexandria', '', 'Egypt', '555056', 'delivered', 0, '2021-11-08 17:27:49', '2021-11-07 17:30:08', '2021-11-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `restatus` tinyint(1) NOT NULL DEFAULT 0,
  `options` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`, `restatus`, `options`) VALUES
(1, 23, 2, '25000.00', 10, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`, `subcategory_id`) VALUES
(5, 'quia officiis voluptas modi', 'quia-officiis-voluptas-modi', 'Magni eos nisi tempore fuga ipsa quas. Dolores assumenda in ea. Neque quis necessitatibus quam aut magni vitae totam. Laboriosam fugit voluptatem aut.', 'At corrupti illum voluptatum aliquid. Qui quod pariatur accusamus et omnis. Ut repudiandae inventore aut consectetur incidunt. Tempora voluptatem sit minima ex cumque fugit. Voluptatem aliquid sapiente quasi voluptas aut. Est excepturi placeat vitae asperiores. Numquam ut optio in voluptatem nesciunt iste labore. Dolorem beatae at aliquid nihil in ut facilis. Dolores accusantium ipsum veniam in quidem nisi. Laudantium repellat voluptatem nisi ut aut. Delectus possimus similique a laudantium.', '50.00', '25.00', 'DIGI346', 'instock', 0, 114, 'digital_4.jpg', NULL, 4, '2021-09-27 22:30:04', '2021-10-01 17:45:39', NULL),
(6, 'nihil ut delectus eligendi', 'nihil-ut-delectus-eligendi', 'Rem illum quibusdam eius omnis nihil quia nulla. Inventore dignissimos doloribus quam natus id maiores hic. Quae qui hic voluptatem enim sunt recusandae. Nihil explicabo provident ratione et aut sed.', 'Commodi ea perferendis officiis. Praesentium sint magni quidem qui nam eius. Sapiente quis cupiditate dignissimos modi qui. Deleniti iusto odio ipsa unde. Assumenda qui animi vel rerum incidunt illo. Voluptas doloribus ut culpa. Consequatur earum veritatis aut voluptas neque qui. Deserunt sit consectetur molestiae quia eos. Sed repellendus esse tempora quaerat. Tempora voluptatum magnam porro. Non voluptatem alias explicabo velit quis excepturi.', '354.00', '300.00', 'DIGI139', 'instock', 0, 122, 'digital_2.jpg', NULL, 4, '2021-09-27 22:30:04', '2021-10-01 17:45:51', NULL),
(7, 'voluptas tenetur accusantium qui', 'voluptas-tenetur-accusantium-qui', 'Repudiandae similique et vel. Quasi commodi exercitationem molestiae nostrum. Quaerat expedita ex quibusdam veniam totam aut. Et aut quod minus quasi repellendus velit excepturi et.', 'Corporis ab adipisci facilis delectus dolore dolores voluptatem earum. Accusantium eum sunt reprehenderit voluptas. Sed est aut sequi quia. Et voluptate dignissimos nam eum. Voluptates consequuntur eos aut qui id architecto eum. Debitis enim quas consequatur quis consequuntur dignissimos. Eum et nostrum ut officiis est qui. Ipsum eum tempora quibusdam. Rerum voluptatum assumenda repellendus architecto perspiciatis cupiditate dolores.', '91.00', NULL, 'DIGI436', 'instock', 0, 148, 'digital_22.jpg', NULL, 1, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(8, 'incidunt quos aut nesciunt', 'incidunt-quos-aut-nesciunt', 'Quo quod ad sint earum. Architecto qui aliquam laborum sunt ducimus et sequi. Aut tenetur ea maiores aut deserunt quod eveniet. Temporibus aut rerum tenetur molestiae earum et sed.', 'Non deleniti magnam eos molestiae. Eaque ipsam accusamus omnis asperiores dicta minima. Nostrum odio non quo voluptas. Id qui eos et dolores nemo enim dolores. Aut porro quo fuga. Quia autem est eaque illo pariatur non sit. Rerum enim eum optio est. Dolorem accusantium expedita minus facilis culpa officiis. Id similique aut autem ut dignissimos. Reprehenderit consequatur nostrum magnam similique id sunt.', '409.00', '200.00', 'DIGI254', 'instock', 0, 153, 'digital_1.jpg', NULL, 2, '2021-09-27 22:30:04', '2021-10-01 17:46:05', NULL),
(9, 'architecto vitae eum accusamus', 'architecto-vitae-eum-accusamus', 'Natus similique adipisci et. Ab et sit id exercitationem magnam eum aut aliquid. Eos nesciunt aperiam iure ut voluptatem. Ut perferendis fugit sit qui atque.', 'Repellat eius ut modi et dolores quisquam illum. Voluptatem rerum iusto quia ut. Possimus voluptatum deleniti sunt eaque quia cum. Commodi quae ut omnis et. Architecto quisquam ducimus unde expedita. Quisquam qui veritatis voluptates et voluptas aliquam. Tempore a velit odio rerum sed. Dolor expedita est occaecati expedita quo qui quidem. Voluptatem iusto assumenda nihil laborum qui tempora. Et consequatur ut ut fugiat. Iure reprehenderit est voluptas tenetur voluptatem accusantium.', '275.00', NULL, 'DIGI219', 'instock', 0, 107, 'digital_18.jpg', NULL, 1, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(10, 'dolores non quisquam provident', 'dolores-non-quisquam-provident', 'Debitis rerum magni fugit ut itaque. Nesciunt pariatur quia aperiam et.', 'Et vero aut quae eum nam ut. Recusandae fugit vel repellendus amet quaerat et. Incidunt optio sequi sequi ut. Eaque aut ut laboriosam alias illo aspernatur. Pariatur eos maxime et neque voluptas. Reiciendis rem odit incidunt consequatur et veritatis. Iusto unde eius eos et ab optio voluptates. Voluptas qui fuga sed velit animi consequatur. Explicabo natus non saepe quis nostrum vitae.', '308.00', NULL, 'DIGI279', 'instock', 0, 145, 'digital_7.jpg', NULL, 1, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(11, 'et libero quis expedita', 'et-libero-quis-expedita', 'Illo quasi eos ipsam voluptatem. In eveniet iusto nisi enim perferendis hic. Delectus aut facilis vel adipisci.', 'Assumenda ut fugit soluta eos. Repellat deleniti nesciunt expedita. Dolor non fugit non voluptas. Delectus deleniti nihil qui ut eos aut. Doloremque consectetur tenetur vero incidunt molestiae atque nisi eveniet. Autem sint quos dicta quo. Eaque eos delectus porro. Et ut illo ipsa ullam repellat impedit et. Commodi excepturi totam voluptatem velit laborum et sed ut. Ratione tempore repudiandae voluptas voluptas error.', '300.00', '150.00', 'DIGI471', 'instock', 0, 190, 'digital_15.jpg', NULL, 2, '2021-09-27 22:30:04', '2021-10-01 17:46:17', NULL),
(12, 'provident voluptatem sit quia', 'provident-voluptatem-sit-quia', 'Officiis nobis fugiat ut aut distinctio labore ipsum. Praesentium minima et hic rerum ut enim.', 'Excepturi explicabo ex voluptatem ratione nihil exercitationem maiores. Sunt voluptatem tempore omnis enim sed in veniam. In eligendi quia ipsam maiores quod omnis. Vel ea laudantium cum temporibus ut totam optio. Qui minima sit molestias quis. Sint fugit tenetur optio. Ipsa laborum sapiente in hic deleniti nihil. Est ratione omnis vel.', '58.00', NULL, 'DIGI474', 'instock', 0, 114, 'digital_20.jpg', NULL, 2, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(13, 'repellendus nihil doloremque ipsam', 'repellendus-nihil-doloremque-ipsam', 'Aliquam eius libero explicabo hic sapiente omnis et. Illo doloribus consectetur qui voluptatibus ut accusamus voluptatem voluptatum. Qui delectus dignissimos asperiores veniam accusamus et.', 'Omnis provident ipsam quo recusandae. Laborum explicabo temporibus unde molestiae atque. Qui distinctio temporibus expedita impedit corrupti tenetur. Consequuntur totam nemo perspiciatis molestiae. Dolore et voluptatem rerum quis soluta dolorem. Aut consectetur beatae voluptas. Est sapiente corporis nostrum ullam laudantium. Aut commodi sed non eum minima et praesentium rerum. Dolores est non dicta id ea reprehenderit. Voluptatum voluptatum assumenda sunt illo. Esse minima et voluptatem.', '477.00', NULL, 'DIGI416', 'instock', 0, 185, 'digital_16.jpg', NULL, 1, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(15, 'cumque itaque iure accusamus', 'cumque-itaque-iure-accusamus', 'Dolor ut natus fugiat deleniti omnis est ratione consequatur. Illum aut voluptatum quia asperiores et molestiae est.', 'Nobis voluptatum tempore officia facere error est rerum. Rerum tempora aut nobis illum placeat error neque asperiores. Aut esse quia voluptatibus omnis ex eius in. Ducimus vitae quam neque soluta. Deserunt placeat quae rerum in quia ratione maxime. Et vel et beatae autem. Aut in rerum dolorem. Consequatur quo repellendus consequatur numquam veritatis. Ut aspernatur illo et officia dolor distinctio. Recusandae aut aut dolorum. Voluptates voluptatem vitae ducimus doloribus.', '49.00', NULL, 'DIGI427', 'instock', 0, 188, 'digital_10.jpg', NULL, 2, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(16, 'vero ut atque omnis', 'vero-ut-atque-omnis', 'Aperiam inventore quae praesentium. Excepturi quod cum omnis non mollitia dolorum dolorem. Rem voluptate natus non ullam qui a tenetur.', 'Incidunt rerum qui unde explicabo. Vitae nam tenetur sint quae ipsa. Consequuntur nesciunt qui explicabo temporibus dignissimos amet accusantium. Voluptatem sequi ad id excepturi. Facilis earum ad nesciunt facere dicta odit qui. Harum incidunt asperiores aliquam in ut aperiam laborum. Dolor blanditiis eaque iste qui sed sed ipsam magnam. Porro quaerat deserunt aliquid cum quia neque est deleniti.', '392.00', NULL, 'DIGI387', 'instock', 0, 109, 'digital_11.jpg', NULL, 1, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(17, 'iusto possimus reprehenderit unde', 'iusto-possimus-reprehenderit-unde', 'Voluptatem omnis eveniet explicabo voluptas inventore voluptas quas. Nam qui expedita non ea enim. Voluptate sit sed ratione qui qui amet. Repellat animi id dolorem eum.', 'Corrupti reprehenderit dolor similique debitis aut autem. Fuga similique blanditiis incidunt vero quo. Consequatur architecto qui illum incidunt. Minus autem ex ut et aut. Dignissimos et et est ab. Sunt id animi ipsam error exercitationem officiis. Mollitia ut soluta laboriosam est architecto et neque. Id amet facilis est veritatis mollitia porro voluptates rem.', '405.00', NULL, 'DIGI165', 'instock', 0, 174, 'digital_9.jpg', NULL, 4, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(18, 'corrupti omnis suscipit amet', 'corrupti-omnis-suscipit-amet', 'Quas quod alias nihil qui. Qui autem beatae eius est expedita aut sequi sint. Ipsa eos enim dolor culpa unde enim et.', 'Consequatur aut iusto consequatur magni dolor quaerat reprehenderit. Quae tempore omnis ipsum perspiciatis laborum. Voluptatum fuga sint aut laboriosam quod explicabo rerum. Eos eum est magnam unde veniam. Repellendus ea ut dolorum non aut voluptatem quia. Repellendus fugit ut praesentium ex rerum. Provident consequatur qui saepe autem architecto. Voluptatem blanditiis aut et magni hic enim repellendus. Libero eligendi et sit illum aut iure. Sapiente aut voluptas non ea sint nulla.', '398.00', NULL, 'DIGI306', 'instock', 0, 170, 'digital_21.jpg', NULL, 4, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(21, 'in iusto exercitationem error', 'in-iusto-exercitationem-error', 'Numquam recusandae quia voluptatem velit. Maiores unde consectetur in minima qui. Numquam nam sapiente similique sint vitae.', 'Ullam quibusdam est praesentium. Iste at voluptatem blanditiis impedit autem suscipit. Assumenda rerum quidem sint dolore. Corporis omnis placeat et voluptatem. Magni qui adipisci esse. Accusantium autem et minus eum non architecto ut. Et quibusdam id ut aut ut nobis. Pariatur omnis aperiam architecto repellendus. Cupiditate quo cumque id voluptate id aut possimus. Suscipit est hic qui enim.', '21.00', NULL, 'DIGI213', 'instock', 0, 172, 'digital_8.jpg', NULL, 1, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(22, 'facilis iste reprehenderit similique', 'facilis-iste-reprehenderit-similique', 'Ad illum vitae fugiat repudiandae. Eum reiciendis possimus aut in. Id suscipit hic ab.', 'Architecto ut error at quia iste fugiat. Dolore omnis est facere a. Nesciunt aperiam dolores iure aut quidem quis maiores ipsa. Reprehenderit aut aliquam aut qui sit dolores. Ipsa culpa omnis blanditiis est dolorem qui. Delectus explicabo voluptatem qui et nisi cupiditate. Quia et deleniti ipsam accusamus eum. Autem modi aspernatur qui porro autem voluptatibus. Tempora labore ipsa sed dicta quae sunt. Repellat iste molestiae et eius vel rerum.', '362.00', NULL, 'DIGI278', 'instock', 0, 181, 'digital_12.jpg', NULL, 2, '2021-09-27 22:30:04', '2021-09-27 22:30:04', NULL),
(23, 'room', 'room', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '5000.00', '2500.00', 'D990', 'instock', 1, 10, '1632955214.jpg', NULL, 7, '2021-09-29 20:40:14', '2021-10-01 17:46:33', NULL),
(28, 'cloth', 'cloth', '<p><span style=\"text-decoration: underline;\">well done</span></p>', '<p>buy one get one</p><p><strong>make sure get it</strong></p>', '400.00', '350.00', 'S99', 'instock', 0, 50, '1636335561.png', NULL, 2, '2021-11-07 23:39:21', '2021-11-07 23:39:21', NULL),
(29, 'cloth1', 'cloth1', '<p><span style=\"text-decoration: underline;\">well done</span></p>', '<p>buy one get one</p><p><strong>make sure get it</strong></p>', '400.00', '350.00', 'S99', 'instock', 0, 50, '1636335638.png', NULL, 2, '2021-11-07 23:40:38', '2021-11-07 23:40:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'size', '2021-11-07 16:42:54', '2021-11-07 16:42:54'),
(3, 'color', '2021-11-07 23:14:46', '2021-11-07 23:14:46'),
(5, 'width', '2021-11-08 13:22:19', '2021-11-08 13:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `image`, `mobile`, `line1`, `line2`, `city`, `province`, `country`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '014151617', 'alex-flemming', 'alex-gleem', 'alexandria', NULL, 'Egypt', '555056', '2021-11-07 12:18:09', '2021-11-07 15:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-10-04 07:32:24', 1, NULL, '2021-10-01 23:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('D4rU80AVDV0KCPeq0g9rk8ZqlllugEl4JchMzElY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiS1NTWlpkNk1JVjdOYTBzVXJ3RVFCMkc1bHVkbDBBVWE1VTNWbm1sTyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3Byb2R1Y3QvZWRpdC9jbG90aDEiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjU6InV0eXBlIjtzOjM6IkFETSI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRGS3AyV3NQdDZDWlhqRUowL3VHc2h1Ymtiak8xaFM5cllpUy9UVzd4OFNDQWw4cGtoU3d3TyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkRktwMldzUHQ2Q1pYakVKMC91R3NodWJrYmpPMWhTOXJZaVMvVFc3eDhTQ0FsOHBraFN3d08iO3M6NDoiY2FydCI7YToxOntzOjQ6ImNhcnQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoxOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6ImJhMDJiMGRkZGIwMDBiMjU0NDUxNjgzMDBjNjUzODZkIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiYmEwMmIwZGRkYjAwMGIyNTQ0NTE2ODMwMGM2NTM4NmQiO3M6MjoiaWQiO2k6MjM7czozOiJxdHkiO2k6MTtzOjQ6Im5hbWUiO3M6NDoicm9vbSI7czo1OiJwcmljZSI7ZDo1MDAwO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoxOntzOjg6IgAqAGl0ZW1zIjthOjA6e319czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xwcm9kdWN0IjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aToyMTtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AaXNTYXZlZCI7YjowO319fX19', 1636390417);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pintrest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instgram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `phone2`, `address`, `map`, `twitter`, `facebook`, `pintrest`, `instgram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Tommy@cat.animal', '010101010', '010202030', '67-Street el-fath flimming', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6822.681738599925!2d29.961112559297458!3d31.238985792620763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5c550112c1251%3A0x7bb04a99dd19b585!2z2KzZhNmK2YUg2KjYp9mK!5e0!3m2!1sar!2seg!4v1635799319631!5m2!1sar!2seg', '#', '#', '#', '#', '#', '2021-11-01 03:29:05', '2021-11-01 18:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('Admin@admin.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"ba02b0dddb000b25445168300c65386d\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"ba02b0dddb000b25445168300c65386d\";s:2:\"id\";i:23;s:3:\"qty\";i:1;s:4:\"name\";s:4:\"room\";s:5:\"price\";d:5000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2021-11-08 13:55:45', NULL),
('jude@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"ba02b0dddb000b25445168300c65386d\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"ba02b0dddb000b25445168300c65386d\";s:2:\"id\";i:23;s:3:\"qty\";i:1;s:4:\"name\";s:4:\"room\";s:5:\"price\";d:5000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2021-11-07 15:33:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Xbox', 'xbox', 7, '2021-11-04 13:10:42', '2021-11-04 13:10:42'),
(2, 'playStation', 'playstation', 7, '2021-11-04 16:09:05', '2021-11-04 16:09:05'),
(3, 'Man\'s', 'mans', 2, '2021-11-04 16:10:46', '2021-11-04 16:10:46'),
(4, 'Women\'s', 'wonens', 2, '2021-11-04 16:11:34', '2021-11-04 16:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('code','card','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','declined','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'paypal', 'pending', '2021-10-09 01:33:06', '2021-10-08 01:33:19'),
(2, 2, 1, 'card', 'pending', '2021-11-07 17:26:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and User or customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@admin.com', NULL, '$2y$10$FKp2WsPt6CZXjEJ0/uGshubkbjO1hS9rYiS/TW7x8SCAl8pkhSwwO', NULL, NULL, NULL, NULL, NULL, 'ADM', '2021-09-27 19:13:47', '2021-09-27 19:13:47'),
(2, 'jude', 'jude@gmail.com', NULL, '$2y$10$WqRPDbFxK3xHx7NRpHuSXu/VCPHqzyzDYjWnpjT46K/ye0gZ/B7Ei', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-09-27 19:15:05', '2021-09-27 19:15:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attrbute_values`
--
ALTER TABLE `attrbute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attrbute_values_product_attrbute_id_foreign` (`product_attrbute_id`),
  ADD KEY `attrbute_values_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_order_item_id_foreign` (`order_item_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `attrbute_values`
--
ALTER TABLE `attrbute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attrbute_values`
--
ALTER TABLE `attrbute_values`
  ADD CONSTRAINT `attrbute_values_product_attrbute_id_foreign` FOREIGN KEY (`product_attrbute_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attrbute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
