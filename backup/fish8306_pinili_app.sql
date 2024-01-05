-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2024 at 01:48 AM
-- Server version: 10.6.16-MariaDB-cll-lve
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fish8306_pinili_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classification` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`id`, `classification`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'N/A', '2024-01-01 06:50:46', '2024-01-01 06:50:46', NULL),
(2, 'Category', '2024-01-01 06:50:46', '2024-01-01 06:50:46', NULL),
(3, 'Forms', '2024-01-01 06:50:46', '2024-01-01 06:50:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `landline` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `id_number`, `company_name`, `contact_number`, `landline`, `email`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CMPY-11084754', 'altomed', '5523857', '5523857', 'maricelmahinay87@yahoo.com', 'cebu', '2023-11-30 08:47:54', '2023-11-30 08:47:54', NULL),
(2, 'CMPY-11133802', '4Life', '09171189924', '09171189924', 'rickdemonteverde@gmail.com', 'Gen. Santos City', '2023-11-30 13:38:02', '2023-11-30 13:38:02', NULL),
(3, 'CMPY-12032949', 'EuroAsia', '09171234567', '09171234567', 'EuroAsia@gmail.com', 'Gen. Santos City', '2023-12-07 03:29:49', '2023-12-07 03:29:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `id_number`, `entity_id`, `company_id`, `isActive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DST-09060634', 1, 1, 1, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(2, 'DST-11085038', 2, 2, 1, '2023-11-30 08:50:38', '2023-11-30 08:50:38', NULL),
(3, 'DST-11133825', 3, 2, 1, '2023-11-30 13:38:25', '2023-11-30 13:38:25', NULL),
(4, 'DST-12033004', 4, 3, 1, '2023-12-07 03:30:04', '2023-12-07 03:30:04', NULL),
(5, 'DST-12033413', 4, 3, 1, '2023-12-07 03:34:13', '2023-12-07 03:34:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drug_classes`
--

CREATE TABLE `drug_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classification_id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drug_classes`
--

INSERT INTO `drug_classes` (`id`, `classification_id`, `id_number`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '', 'N/A', 'N/A', '2024-01-01 06:50:46', '2024-01-01 06:50:46', NULL),
(2, 3, 'DRG-06283253', 'Tablet', 'Tablet', '2024-01-01 06:50:46', '2024-01-01 06:50:46', NULL),
(3, 3, 'DRG-28032539', 'Liquid', 'Liquid', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(4, 3, 'DRG-24732539', 'Capsules', 'Capsules', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(5, 3, 'DRG-28064539', 'Drops', 'Drops', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(6, 3, 'DRG-28742539', 'Inhalers', 'Inhalers', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(7, 3, 'DRG-28302539', 'Injections', 'Injections', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(8, 3, 'DRG-28962539', 'Implants', 'Implants', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(9, 3, 'DRG-28632539', 'Chewable Tablets', 'Chewable Tablets', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(10, 3, 'DRG-28037439', 'Softgels', 'Softgels', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(11, 3, 'DRG-28772539', 'Granules', 'Granules', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(12, 3, 'DRG-28074539', 'Powders', 'Powders', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(13, 3, 'DRG-28842539', 'Cream', 'Cream', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(14, 3, 'DRG-28212539', 'Ointment', 'Ointment', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(15, 2, 'DRG-03253939', 'Analgesics', 'Drugs that relieve pain', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(16, 2, 'DRG-00325399', 'Antacids', 'Drugs that relieve indigestion and heartburn by neutralizing stomach acid.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(17, 2, 'DRG-00325399', 'Antianxiety Drugs', 'Drugs that suppress anxiety and relax muscles.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(18, 2, 'DRG-00325399', 'Antiarrhythmics', 'Drugs used to control irregularities of heartbeat.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(19, 2, 'DRG-00325399', 'Antibacterials', 'Drugs used to treat infections.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(20, 2, 'DRG-00325399', 'Antibiotics', 'Drugs made from naturally occurring and synthetic substances that combat bacterial infection.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(21, 2, 'DRG-00325399', 'Anticoagulants', 'Drugs prevent blood from clotting.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(22, 2, 'DRG-00325399', 'Thrombolytics', 'Drugs help dissolve and disperse blood clots.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(23, 2, 'DRG-00325399', 'Anticonvulsants', 'Drugs that prevent epileptic seizures.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(24, 2, 'DRG-00325399', 'Antidepressants', 'Drugs  can help relieve symptoms of conditions such as depression and anxiety disorders.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(25, 2, 'DRG-00325399', 'Antidiarrheals', 'Drugs used for the relief of diarrhea.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(26, 2, 'DRG-00325399', 'Antiemetics', 'Drugs used to treat nausea and vomiting.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(27, 2, 'DRG-00325399', 'Antifungals', 'Drugs used to treat fungal infections.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(28, 2, 'DRG-00325399', 'Antihistamines', 'Drugs used primarily to counteract the effects of histamine.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(29, 2, 'DRG-00325399', 'Antihypertensives', 'Drugs that lower blood pressure.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(30, 2, 'DRG-00325399', 'Anti-Inflammatories', 'Drugs used to reduce inflammation', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(31, 2, 'DRG-00325399', 'Antineoplastics', 'Drugs used to treat cancer.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(32, 2, 'DRG-00325399', 'Antipsychotics', 'Drugs used to treat symptoms of severe psychiatric disorders.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(33, 2, 'DRG-00325399', 'Antipyretics', 'Drugs that reduce fever.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(34, 2, 'DRG-00325399', 'Antivirals', 'Drugs used to treat viral infections', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(35, 2, 'DRG-00325399', 'Barbiturates', 'Sleeping drugs', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(36, 2, 'DRG-00325399', 'Beta-Blockers', 'Drugs used to reduce the oxygen needs of the heart by reducing heartbeat rate.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(37, 2, 'DRG-00325399', 'Bronchodilators', 'Drugs used to ease breathing in diseases such as asthma.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(38, 2, 'DRG-00325399', 'Cold Cures', '', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(39, 2, 'DRG-00325399', 'Corticosteroids', 'Drugs used for treating some malignancies or compensating for a deficiency of natural hormones in disorders', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(40, 2, 'DRG-00325399', 'Cough Suppressants', 'Drugs used for stopping the urge to cough.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(41, 2, 'DRG-00325399', 'Cytotoxics', 'Drugs that kill or damage cells', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(42, 2, 'DRG-00325399', 'Decongestants', 'Drugs that reduce swelling of the mucous membranes that line the nose by constricting blood vessels.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(43, 2, 'DRG-00325399', 'Diuretics', 'Drugs used for treating mild cases of high blood pressure.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(44, 2, 'DRG-00325399', 'Expectorant', 'Drugs that stimulates the flow of saliva and promotes coughing to eliminate phlegm from the respiratory tract', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(45, 2, 'DRG-00325399', 'Hormones', 'Drugs used for hormone replacement therapy.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(46, 2, 'DRG-00325399', 'Hypoglycemics (Oral)', 'Drugs that lower the level of glucose in the blood.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(47, 2, 'DRG-00325399', 'Immunosuppressives', 'Drugs that prevent or reduce the bodys normal reaction to invasion by disease or by foreign tissues.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(48, 2, 'DRG-00325399', 'Laxatives', 'Drugs that increase the frequency and ease of bowel movements.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(49, 2, 'DRG-00325399', 'Muscle Relaxants', 'Drugs that relieve muscle spasm in disorders such as backache.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(50, 2, 'DRG-00325399', 'Sedatives', 'Antianxiety drugs.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(51, 2, 'DRG-00325399', 'Sex Hormones (Female)', 'Drugs used to treat menstrual and menopausal disorders.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(52, 2, 'DRG-00325399', 'Sex Hormones (Male)', 'Drugs used to compensate for hormonal deficiency in hypopituitarism or disorders of the testes.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(53, 2, 'DRG-00325399', 'Sleeping Drugs', 'A drug and especially a barbiturate that is taken as a tablet or capsule to induce sleep', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(54, 2, 'DRG-00325399', 'Tranquilizer', 'Drugs used to reduce mental disturbance.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(55, 2, 'DRG-00325399', 'Vitamins', 'Are substances that our bodies need to develop and function normally.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(56, 2, 'DRG-00325399', 'Mucolytic', 'A mucolytic is any agent which dissolves thick mucus, used to help relieve breathing difficulties.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(57, 2, 'DRG-00325399', 'Antiprotozoal', 'Medication used to treat infections caused by protozoa, which are single cell organisms that belong to the type of parasites.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(58, 2, 'DRG-00325399', 'Antispasmodic', 'A medication that relieves, prevents, or lowers the incidence of muscle spasms, especially those of smooth muscle such as in the bowel wall.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(59, 2, 'DRG-00325399', 'Antiasthma', 'Relieving or counteracting the symptoms of asthma. anti-asthma drugs.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(60, 2, 'DRG-00325399', 'Antitussive', 'Used to treat coughs and congestion caused by the common cold, bronchitis, and other breathing illnesses.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(61, 2, 'DRG-00325399', 'Corticosteroid', 'Are a class of steroid hormones that are produced in the adrenal cortex of vertebrates, as well as the synthetic analogues of these hormones.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(62, 2, 'DRG-00325399', 'Antidiabetic', 'Used in diabetes treat diabetes mellitus by altering the glucose level in the blood.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(63, 2, 'DRG-00325399', 'Inhibitor', 'A substance that binds to an enzyme and decreases the enzymes activity', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(64, 2, 'DRG-00325399', 'Antivertigo', 'Used to prevent or relieve the symptoms of vertigo', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(65, 2, 'DRG-00325399', 'Antimotility', 'Contain an antimotility agent that relieves the symptoms of diarrhea by slowing intestinal movement.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(66, 2, 'DRG-00325399', 'Antigout', 'Agents are medications prescribed for the treatment of gout, a painful arthritic condition caused by excessive uric acid in the blood that gets deposited as monosodium urate crystals in joints.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(67, 2, 'DRG-00325399', 'Antifibrinolytic', 'Are drugs that act by inhibiting the process that dissolves clots, thereby reducing bleeding', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(68, 2, 'DRG-00325399', 'Antithrombotic', 'Any drug that prevents or interferes with the formation of thrombi', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL),
(69, 2, 'DRG-00325399', 'Anticholinergic', 'Drugs that block the action of acetylcholine . Acetylcholine is a neurotransmitter, or a chemical messenger.', '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`id`, `role_id`, `id_number`, `name`, `contact_number`, `address`, `role`, `isActive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'USER-11084328', 'altomed pharma', '5523857', 'cebu', 'supplier', 1, '2023-11-30 08:43:28', '2023-11-30 08:43:28', NULL),
(2, 6, 'USER-11133633', 'Richard Demonteverde', '09171189924', 'Gen. Santos City', 'supplier', 1, '2023-11-30 13:36:33', '2023-11-30 13:36:33', NULL),
(3, 7, 'USER-11133705', 'Richard Demonteverde', '09171189924', 'Gen. Santos City', 'representative', 1, '2023-11-30 13:37:05', '2023-11-30 13:37:05', NULL),
(4, 7, 'USER-12032847', 'Jherrylen', '09171234567', 'Gen. Santos City', 'representative', 1, '2023-12-07 03:28:47', '2023-12-07 03:28:47', NULL),
(5, 6, 'USER-12033331', 'Jherrylen', '09171234567', 'Gen. Santos City', 'supplier', 1, '2023-12-07 03:33:31', '2023-12-07 03:33:31', NULL);

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
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'male', '2024-01-01 06:50:46', '2024-01-01 06:50:46', NULL),
(2, 'female', '2024-01-01 06:50:46', '2024-01-01 06:50:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `purchase_stocks` int(11) DEFAULT NULL,
  `srp` double DEFAULT NULL,
  `po_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `supplier_id`, `user_id`, `id_number`, `price`, `purchase_stocks`, `srp`, `po_number`, `created_at`, `updated_at`, `deleted_at`, `isActive`) VALUES
(1, 18, 4, 1, 'IVN-20240101-072455', 12, 100, 24, NULL, '2024-01-01 07:24:55', '2024-01-01 07:24:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_details`
--

CREATE TABLE `inventory_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_sheet_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `inventory_status_id` bigint(20) UNSIGNED NOT NULL,
  `or_number` varchar(255) DEFAULT NULL,
  `po_number` varchar(255) DEFAULT NULL,
  `delivery_number` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_payments`
--

CREATE TABLE `inventory_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_sheet_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status_id` bigint(20) UNSIGNED NOT NULL,
  `balance` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_payment_details`
--

CREATE TABLE `inventory_payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_sheet_id` bigint(20) UNSIGNED NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_sheets`
--

CREATE TABLE `inventory_sheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distributor_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `po_number` varchar(255) DEFAULT NULL,
  `delivery_number` varchar(255) DEFAULT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `previous_delivery` varchar(255) DEFAULT NULL,
  `present_delivery` varchar(255) DEFAULT NULL,
  `or_number` varchar(255) DEFAULT NULL,
  `or_date` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratories`
--

CREATE TABLE `laboratories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laboratory` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laboratories`
--

INSERT INTO `laboratories` (`id`, `laboratory`, `description`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'N/A', 'N/A', 0, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(2, 'Medical Certificate', 'Medical Certificate', 50, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(3, 'PF/Medical Worker', 'PF/Medical Worker', 350, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(4, 'PWD Certificate', 'PWD Certificate', 350, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(5, 'Senior Citizen Certificate', 'Senior Citizen Certificate', 350, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(6, 'SSS Certificate', 'SSS Certificate', 350, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(7, 'DSWD Certificate', 'DSWD Certificate', 350, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(8, 'Small Wound Dressing', 'Small Wound Dressing', 200, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(9, 'Medium Wound Dressing', 'Medium Wound Dressing', 300, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(10, 'Big Wound Dressing', 'Big Wound Dressing', 500, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(11, 'XL Wound Dressing', 'XL Wound Dressing', 750, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(12, 'Antibiotic Cream (tube)', 'Antibiotic Cream (tube)', 245, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(13, 'Nebulizer without Medicine', 'Nebulizer without Medicine', 50, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(14, 'Nebulizer with Medicine', 'Nebulizer with Medicine', 100, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(15, 'LABORATORY - BLOOD PRESSURE', 'LABORATORY - BLOOD PRESSURE', 10, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(16, 'LABORATORY - WEIGHT', 'LABORATORY - WEIGHT', 10, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(17, 'LABORATORY - CBC', 'LABORATORY - CBC', 275, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(18, 'LABORATORY - HGT', 'LABORATORY - HGT', 100, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(19, 'LABORATORY - LIPID PROFILE', 'LABORATORY - LIPID PROFILE', 510, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(20, 'LABORATORY - CHOLESTEROL', 'LABORATORY - CHOLESTEROL', 290, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(21, 'LABORATORY - TRIGLYCERIDE', 'LABORATORY - TRIGLYCERIDE', 510, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(22, 'LABORATORY - BLOOD TYPING', 'LABORATORY - BLOOD TYPING', 100, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(23, 'LABORATORY - SGPT', 'LABORATORY - SGPT', 290, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(24, 'LABORATORY - SODIUM', 'LABORATORY - SODIUM', 440, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(25, 'LABORATORY - POTASSIUM', 'LABORATORY - POTASSIUM', 460, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(26, 'LABORATORY - BUN', 'LABORATORY - BUN', 495, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(27, 'LABORATORY - CREATININE', 'LABORATORY - CREATININE', 335, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(28, 'LABORATORY - SGPT', 'LABORATORY - SGPT', 310, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(29, 'LABORATORY - HBsag', 'LABORATORY - HBsag', 275, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(30, 'LABORATORY - URINALYSIS', 'LABORATORY - URINALYSIS', 90, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(31, 'LABORATORY - PREGNANCY TEST', 'LABORATORY - PREGNANCY TEST', 150, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47'),
(32, 'LABORATORY - FECALYSIS', 'LABORATORY - FECALYSIS', 100, NULL, '2024-01-01 06:50:47', '2024-01-01 06:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_menu_id` bigint(20) UNSIGNED NOT NULL,
  `list` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isMenuTitle` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(1, '2010_09_13_001615_create_statuses_table', 1),
(2, '2010_09_13_062109_create_roles_table', 1),
(3, '2010_09_14_061149_create_classifications_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_09_13_045328_create_entities_table', 1),
(9, '2023_09_13_045709_create_companies_table', 1),
(10, '2023_09_13_045845_create_distributors_table', 1),
(11, '2023_09_13_051114_create_drug_classes_table', 1),
(12, '2023_09_13_051656_create_products_table', 1),
(13, '2023_09_13_052303_create_genders_table', 1),
(14, '2023_09_13_052552_create_patients_table', 1),
(15, '2023_09_13_052906_create_patient_bmis_table', 1),
(16, '2023_09_13_053446_create_patient_checkups_table', 1),
(17, '2023_09_13_054316_create_patient_checkup_images_table', 1),
(18, '2023_09_13_054634_create_patient_requests_table', 1),
(19, '2023_09_14_051014_create_orders_table', 1),
(20, '2023_09_16_193716_create_inventories_table', 1),
(21, '2023_09_23_164540_create_inventory_sheets_table', 1),
(22, '2023_09_23_195624_create_inventory_details_table', 1),
(23, '2023_09_23_200101_create_inventory_payments_table', 1),
(24, '2023_09_23_200110_create_inventory_payment_details_table', 1),
(25, '2023_10_05_085520_create_sub_menus_table', 1),
(26, '2023_10_05_085523_create_menus_table', 1),
(27, '2023_10_14_213250_create_transactions_table', 1),
(28, '2023_11_03_135731_add_is_follow_and_is_new_column_to_patient_checkups', 1),
(29, '2023_11_05_052636_drop_foreign_keys_from_patient_checkups', 1),
(30, '2023_11_07_151206_create_laboratories_table', 1),
(31, '2023_11_20_050142_add_is_active_to_inventory_table', 1),
(32, '2023_11_22_043724_create_prescribe_laboratories_table', 1),
(33, '2023_11_22_043724_create_prescribe_medicines_table', 1),
(34, '2023_11_22_043724_create_prescriptions_table', 1),
(35, '2023_11_27_211427_add_follow_up_date_to_patient_checkups_table', 1),
(36, '2023_11_30_021810_add_new_column_to_patient_bmis_table', 1),
(37, '2023_11_30_023656_add_soft_delete_to_prescriptions_table', 1),
(38, '2023_12_03_201607_create_petty_cashes_table', 1),
(39, '2023_12_03_203018_add_remark_status_to_petty_cashes_table', 1),
(40, '2023_12_04_065009_add_subtotal_to_petty_cashes_table', 1),
(41, '2023_12_04_090658_add_purchase_remarks_to_petty_cashes_table', 1),
(42, '2023_12_04_111111_create_purchase_items_table', 1),
(43, '2023_12_05_021638_change_purchase_remarks_text_in_petty_cashes', 1),
(44, '2023_12_05_024313_remove_columns_from_petty_cash_table', 1),
(45, '2023_12_05_030452_remove_purchase_item_id_from_petty_cash_table', 1),
(46, '2023_12_05_030649_add_petty_cash_id_from_purchase_items_table', 1),
(47, '2023_12_05_032737_remove_subtotal_qty_from_petty_cash_table', 1),
(48, '2023_12_05_032959_add_subtotal_qty_from_purchase_items_table', 1),
(49, '2023_12_11_085454_add_nullable_change_in_patients', 1),
(50, '2023_12_14_053347_update_patient_check_up_in__patient_checkups_table', 1),
(51, '2023_12_14_054940_add_check_up_date_in_patient_checkups_table', 1),
(52, '2023_12_26_154445_create_patient_purchase_prescriptions_table', 1),
(53, '2023_12_31_075322_create_patient_billings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `approve_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `manufacturer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `invoice_number` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_cost` double NOT NULL,
  `srp` double NOT NULL,
  `or_number` varchar(255) DEFAULT NULL,
  `delivery_number` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `manufacturing_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `supplier_id`, `approve_id`, `manufacturer_id`, `product_id`, `status_id`, `order_status_id`, `invoice_number`, `quantity`, `purchase_cost`, `srp`, `or_number`, `delivery_number`, `remarks`, `expiry_date`, `manufacturing_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, 1, 4, 18, 8, 7, 'TNX-ORD-20231207-033938', 100, 12, 24, NULL, NULL, 'for approval', '2024-12-07', '2023-12-07', '2023-12-07 03:39:38', '2024-01-01 07:24:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `mi` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `gender_id`, `id_number`, `firstname`, `mi`, `lastname`, `age`, `contact_number`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'PNT-11223647', 'ABSALON', NULL, 'KALEX JACE', '3', '09510889719', 'FATIMA UHAW General Santos City', '2023-11-07 22:36:47', '2023-11-14 07:39:18', NULL),
(2, 1, 'PNT-11070320', 'rick', 'b', 'demonte', '51', '09171189924', 'Lagao', '2023-11-08 07:03:20', '2023-11-08 07:03:20', NULL),
(3, 2, 'PNT-11011529', 'TUBO', NULL, 'LUCIA', '74', '09367526766', 'BAWING GENERAL SANTOS CITY', '2023-11-14 01:15:29', '2023-11-14 01:15:29', NULL),
(4, 2, 'PNT-11063411', 'ASARIZ', NULL, 'CELIA', '65', '09509508114', 'PUTING BATO', '2023-11-14 06:34:11', '2023-11-14 06:34:11', NULL),
(5, 1, 'PNT-11063613', 'ALBARILLO', NULL, 'JHARELL DAVE', '2', '09126434134', 'BRGY. TAMBLER', '2023-11-14 06:36:13', '2023-11-14 06:36:13', NULL),
(6, 1, 'PNT-11063813', 'AGUISANDO', 'F', 'MARCHANDO', '66', '09919379430', 'ESTRELLA', '2023-11-14 06:38:13', '2023-11-14 06:38:13', NULL),
(7, 2, 'PNT-11064412', 'ANDO', NULL, 'ALPHA', '51', '09101756128', 'CALUMPANG', '2023-11-14 06:44:12', '2023-11-14 06:44:12', NULL),
(8, 2, 'PNT-11070239', 'AMBA', 'D', 'GERALDINE MAE', '30', '09692681960', 'BAWING', '2023-11-14 07:02:39', '2023-11-14 07:34:14', NULL),
(9, 2, 'PNT-11071154', 'ALAGDON', NULL, 'ELENA', '60', '09', 'FERNANDEZ CALUMPANG', '2023-11-14 07:11:54', '2023-11-14 07:11:54', NULL),
(10, 1, 'PNT-11071631', 'ABE', 'D', 'GERALD', '33', '09519590937', 'SAEG CALUMPANG', '2023-11-14 07:16:31', '2023-11-14 07:16:31', NULL),
(11, 1, 'PNT-11072015', 'ALBARICO', NULL, 'DANILO', '21', '09481563453', 'TAMBLER', '2023-11-14 07:20:15', '2023-11-14 07:20:15', NULL),
(12, 1, 'PNT-11072147', 'ASI', NULL, 'MUHAMMAD', '22', '09077086648', 'TAMBLER', '2023-11-14 07:21:47', '2023-11-14 07:21:47', NULL),
(13, 2, 'PNT-11072500', 'AMBOLODTO', NULL, 'AZRIEL KHALESI', '1', '09631821138', 'TAMBLER', '2023-11-14 07:25:00', '2023-11-14 07:25:00', NULL),
(14, 1, 'PNT-11072941', 'ASPARA', NULL, 'RAMBO', '16', '0', 'BAWENG', '2023-11-14 07:29:41', '2023-11-14 07:29:41', NULL),
(15, 2, 'PNT-11035702', 'AGUSTO', 'S', 'AIDA', '54', '09553849260', 'KIAMBA', '2023-11-22 03:57:02', '2023-11-22 03:57:02', NULL),
(16, 1, 'PNT-11040009', 'ARANETA', NULL, 'RUDINO', '56', '09105193026', 'PASSIONIST  CALUMPANG', '2023-11-22 04:00:09', '2023-11-22 04:00:09', NULL),
(17, 1, 'PNT-11040216', 'ANCES', NULL, 'SONEE', '42', '09128808946', 'DIAMOND TAMBLER', '2023-11-22 04:02:16', '2023-11-22 04:02:16', NULL),
(18, 1, 'PNT-11040614', 'ACOMPANIADO', NULL, 'JOEL', '53', '09488494187', 'CALUMPANG', '2023-11-22 04:06:14', '2023-11-22 04:06:14', NULL),
(19, 1, 'PNT-11041051', 'ALOY', NULL, 'ARCENIO', '58', '09056872973', 'PRK. ALQUIZAR', '2023-11-22 04:10:51', '2023-11-22 04:10:51', NULL),
(20, 1, 'PNT-11041452', 'ACIDO', NULL, 'LEONITO', '67', '09972079211', 'ESTRELLA', '2023-11-22 04:14:52', '2023-11-22 04:14:52', NULL),
(62, 1, 'PNT-12090305', 'ADRIAN', NULL, 'BARSOBIA', '19', NULL, 'NEW BOHOL', '2023-12-11 09:03:05', '2023-12-11 09:03:05', NULL),
(63, 1, 'PNT-12024902', 'COCOL', NULL, 'ROEL', '36', '09706984506', 'APOPONG', '2023-12-13 02:49:02', '2023-12-13 02:49:02', NULL),
(64, 2, 'PNT-12025955', 'CORTINA', NULL, 'MARY JEAN', '48', '09356128060', 'PLACIDA CALUMPANG', '2023-12-13 02:59:55', '2023-12-13 02:59:55', NULL),
(65, 1, 'PNT-12030659', 'CERVANTES', NULL, 'JOSELITO', '49', '09367529116', 'PRK. PLACIDA', '2023-12-13 03:06:59', '2023-12-13 03:06:59', NULL),
(66, 1, 'PNT-12031128', 'CONJURADO', NULL, 'RESIE', '43', '09102016122', 'FATIMA', '2023-12-13 03:11:28', '2023-12-13 03:11:28', NULL),
(67, 1, 'PNT-12035402', 'CORTEZ', NULL, 'RODOLFO', '68', '09101452476', 'CALUMPANG', '2023-12-13 03:54:02', '2023-12-13 03:54:02', NULL),
(68, 1, 'PNT-12025833', 'CORTEZ', NULL, 'RODOLFO', '68', '09101452476', 'CALUMPANG', '2023-12-19 02:58:33', '2023-12-19 02:58:33', NULL),
(69, 1, 'PNT-12033037', 'CLARO', NULL, 'RUBEN', '55', NULL, 'FATIMA G.S.C', '2023-12-19 03:30:37', '2023-12-19 03:30:37', NULL),
(70, 1, 'PNT-12034804', 'CAMPAAN', NULL, 'ALBERTO', '65', '09650612425', 'SAN MIGUEL', '2023-12-19 03:48:04', '2023-12-19 03:48:04', NULL),
(71, 1, 'PNT-12034835', 'CAMPAAN', NULL, 'ALBERTO', '65', '09650612425', 'SAN MIGUEL', '2023-12-19 03:48:35', '2023-12-19 03:48:35', NULL),
(72, 2, 'PNT-12040431', 'CARDENIO', NULL, 'REBECCA', '72', NULL, 'GREENVILLE', '2023-12-19 04:04:31', '2023-12-19 04:04:31', NULL),
(73, 2, 'PNT-12040432', 'CARDENIO', NULL, 'REBECCA', '72', NULL, 'GREENVILLE', '2023-12-19 04:04:32', '2023-12-19 04:04:32', NULL),
(74, 1, 'PNT-01072032', 'Rick', 'D', 'Monte', '51', '09171189924', 'Gen. Santos City', '2024-01-01 07:20:32', '2024-01-01 07:20:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_billings`
--

CREATE TABLE `patient_billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `laboratory_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `patient_checkup_id` bigint(20) UNSIGNED NOT NULL,
  `billing_status_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `srp` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total_medicine` int(11) NOT NULL,
  `sub_total_laboratory` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_bmis`
--

CREATE TABLE `patient_bmis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `heart_rate` varchar(255) NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `symptoms` text NOT NULL,
  `diagnosis` text NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_bmis`
--

INSERT INTO `patient_bmis` (`id`, `patient_id`, `blood_pressure`, `heart_rate`, `temperature`, `weight`, `symptoms`, `diagnosis`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '0', '0', '36.7', '14.30', 'EAR DISCHARGE AND RASHES FOR 1 WEEK', '', '2023-11-07 22:36:47', '2023-11-14 07:39:18', NULL),
(2, 2, '120/80', '65', '36.3', '48', 'Healthy', '', '2023-11-08 07:03:20', '2023-11-08 07:03:20', NULL),
(3, 3, '122/72', '75', '36.8', '57', 'COUGH- almost a month\r\nHAW ANG KUTO-KUTO for 1 week', '', '2023-11-14 01:15:29', '2023-11-14 01:15:29', NULL),
(4, 4, '132/84', '80', '36.5', '0', 'COUGH-5DAYS', '', '2023-11-14 06:34:11', '2023-11-14 06:34:11', NULL),
(5, 5, '0', '122', '36.8', '11', 'BLOATED FOR 3DAYS', '', '2023-11-14 06:36:13', '2023-11-14 06:36:13', NULL),
(6, 6, '158/87', '91', '36.8', '58', 'PAINFUL HIPS', '', '2023-11-14 06:38:13', '2023-11-14 06:38:13', NULL),
(7, 7, '158/86', '85', '36.6', '111', 'COUGH AND COLD', '', '2023-11-14 06:44:12', '2023-11-14 06:44:12', NULL),
(8, 8, '107/62', '98', '37.4', '44', 'FEVER (2 DAYS)', '', '2023-11-14 07:02:39', '2023-11-14 07:34:14', NULL),
(9, 9, '158/94', '91', '36.6', '72', 'COUGH (2DAYS)', '', '2023-11-14 07:11:54', '2023-11-14 07:11:54', NULL),
(10, 10, '110/66', '84', '36.2', '65', 'COUGH almost a year', '', '2023-11-14 07:16:31', '2023-11-14 07:16:31', NULL),
(11, 11, '177/77', '70', '36.4', '40', 'PALPITATION\r\nNAUSEA', '', '2023-11-14 07:20:15', '2023-11-14 07:20:15', NULL),
(12, 12, '108/59', '103', '37.8', '41', 'COUGH (1WEEK)\r\nFEVER ON/OFF', '', '2023-11-14 07:21:47', '2023-11-14 07:21:47', NULL),
(13, 13, '0', '0', '36.8', '11', 'COUGH \r\nFEVER ON/OFF', '', '2023-11-14 07:25:00', '2023-11-14 07:25:00', NULL),
(14, 14, '125/81', '61', '36.9', '52', 'right lower quandrant pain for 4days \r\nloss of appetite', '', '2023-11-14 07:29:41', '2023-11-14 07:29:41', NULL),
(15, 15, '141/83', '91', '36.1', '47', 'COUGH 4DAYS\r\nFEVER 2DAYS', '', '2023-11-22 03:57:02', '2023-11-22 03:57:02', NULL),
(16, 16, '171/87', '81', '36.6', '61', 'HYPERTENSION\r\nINSOMIA', '', '2023-11-22 04:00:09', '2023-11-22 04:00:09', NULL),
(17, 17, '147/51', '90', '36.8', '67', 'SWOLLEN BOTH FEET 1 WEEK', '', '2023-11-22 04:02:16', '2023-11-22 04:02:16', NULL),
(18, 18, '176/99', '77', '36.1', '73.8', 'BACK PAIN 2 WEEKS', '', '2023-11-22 04:06:14', '2023-11-22 04:06:14', NULL),
(19, 19, '107/56', '91', '36.9', '52', 'LOWER BACK PAIN \r\nNUMBNESS RIGHT SIDE OF BODY', '', '2023-11-22 04:10:51', '2023-11-22 04:10:51', NULL),
(20, 20, '167/74', '88', '36.5', '56', 'COUGH 1 WEEK', '', '2023-11-22 04:14:52', '2023-11-22 04:14:52', NULL),
(51, 62, '104/56', '114', '36.9', '51', 'FEVER', '', '2023-12-11 09:03:05', '2023-12-11 09:03:05', NULL),
(52, 63, '116/67', '87', '35.8', '69', 'COUGH 2WEEKS', '', '2023-12-13 02:49:02', '2023-12-13 02:49:02', NULL),
(53, 64, '144/90', '84', '36.8', '81', 'INFLAMMATION ON ANKLE JOINT', '', '2023-12-13 02:59:55', '2023-12-13 02:59:55', NULL),
(54, 65, '140/78', '65', '36.6', '42', 'SWOLLEN RIGHT SIDE FOOT', '', '2023-12-13 03:06:59', '2023-12-13 03:06:59', NULL),
(55, 66, '132/72', '77', '36.6', '61', 'DIZZINESS\r\nSHORTNESS OF BREATH', '', '2023-12-13 03:11:28', '2023-12-13 03:11:28', NULL),
(56, 67, '104/60', '91', '36.6', '44', 'SHORTNESS OF BREATH', '', '2023-12-13 03:54:02', '2023-12-13 03:54:02', NULL),
(57, 68, '121/79', '71', '36.9', '44', 'fever \r\nepegastric pain \r\n1week', '', '2023-12-19 02:58:33', '2023-12-19 02:58:33', NULL),
(58, 68, '150/82', '88', '36.8', '46', 'EPIGASTRIC PAIN', '', '2023-12-19 03:01:23', '2023-12-19 03:01:23', NULL),
(59, 68, '100/57', '94', '36.6', '46', 'SHORTNESS OF BREATH', '', '2023-12-19 03:06:31', '2023-12-19 03:06:31', NULL),
(60, 68, '104/60', '91', '36.6', '44`213', 'SHORTNESS OF BREATH \r\nFOLLOW UP', 'sick kaayo', '2023-12-19 03:16:20', '2024-01-01 10:02:17', NULL),
(61, 69, '91/43', '77', '36.8', '59', 'COUGH\r\nFEVER\r\nINSOMIA', '', '2023-12-19 03:30:37', '2023-12-19 03:30:37', NULL),
(62, 69, '92/52', '82', '36.6', '59', 'FOLLOW UP', '', '2023-12-19 03:32:42', '2023-12-19 03:32:42', NULL),
(63, 70, '164/97', '85', '36,6', '51', 'COUGH\r\nPAINFUL LEFT SIDE ABDOMEN', '', '2023-12-19 03:48:04', '2023-12-19 03:48:04', NULL),
(64, 71, '164/97', '85', '36,6', '51', 'COUGH\r\nPAINFUL LEFT SIDE ABDOMEN', '', '2023-12-19 03:48:35', '2023-12-19 03:48:35', NULL),
(65, 71, '150/85', '87', '36.6', '52', 'READING LAB. RESULT\r\n\r\nPTB', '', '2023-12-19 03:58:31', '2023-12-19 03:58:31', NULL),
(66, 72, '180/86', '77', '36.6', '60', 'WHITE PATCHES ON MOUTH FOR 5 DAYS', '', '2023-12-19 04:04:31', '2023-12-19 04:04:31', NULL),
(67, 73, '180/86', '77', '36.6', '60', 'WHITE PATCHES ON MOUTH FOR 5 DAYS', '', '2023-12-19 04:04:32', '2023-12-19 04:04:32', NULL),
(68, 74, '120/80', '60', '36', '50', 'Sick', '', '2024-01-01 07:20:32', '2024-01-01 07:20:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_checkups`
--

CREATE TABLE `patient_checkups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `patient_bmi_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `isNew` tinyint(1) NOT NULL DEFAULT 0,
  `isFollowUp` tinyint(1) NOT NULL DEFAULT 0,
  `follow_up_date` date DEFAULT NULL,
  `check_up_date` date NOT NULL DEFAULT '1900-01-01',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_checkups`
--

INSERT INTO `patient_checkups` (`id`, `id_number`, `patient_bmi_id`, `status_id`, `remarks`, `isNew`, `isFollowUp`, `follow_up_date`, `check_up_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CHKP-11223647', 1, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-07 22:36:47', '2023-11-07 22:36:47', NULL),
(2, 'CHKP-11070320', 2, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-08 07:03:20', '2023-11-08 07:03:20', NULL),
(3, 'CHKP-11011529', 3, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 01:15:29', '2023-11-14 01:15:29', NULL),
(4, 'CHKP-11063411', 4, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 06:34:11', '2023-11-14 06:34:11', NULL),
(5, 'CHKP-11063613', 5, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 06:36:13', '2023-11-14 06:36:13', NULL),
(6, 'CHKP-11063813', 6, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 06:38:13', '2023-11-14 06:38:13', NULL),
(7, 'CHKP-11064412', 7, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 06:44:12', '2023-11-14 06:44:12', NULL),
(8, 'CHKP-11070239', 8, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 07:02:39', '2023-11-14 07:02:39', NULL),
(9, 'CHKP-11071154', 9, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 07:11:54', '2023-11-14 07:11:54', NULL),
(10, 'CHKP-11071631', 10, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 07:16:31', '2023-11-14 07:16:31', NULL),
(11, 'CHKP-11072015', 11, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 07:20:15', '2023-11-14 07:20:15', NULL),
(12, 'CHKP-11072147', 12, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 07:21:47', '2023-11-14 07:21:47', NULL),
(13, 'CHKP-11072500', 13, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 07:25:00', '2023-11-14 07:25:00', NULL),
(14, 'CHKP-11072941', 14, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-14 07:29:41', '2023-11-14 07:29:41', NULL),
(15, 'CHKP-11035702', 15, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-22 03:57:02', '2023-11-22 03:57:02', NULL),
(16, 'CHKP-11040009', 16, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-22 04:00:09', '2023-11-22 04:00:09', NULL),
(17, 'CHKP-11040216', 17, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-22 04:02:16', '2023-11-22 04:02:16', NULL),
(18, 'CHKP-11040614', 18, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-22 04:06:14', '2023-11-22 04:06:14', NULL),
(19, 'CHKP-11041051', 19, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-22 04:10:51', '2023-11-22 04:10:51', NULL),
(20, 'CHKP-11041452', 20, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-11-22 04:14:52', '2023-11-22 04:14:52', NULL),
(47, 'CHKP-12090305', 51, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-12-11 09:03:05', '2023-12-11 09:03:05', NULL),
(48, 'CHKP-12024902', 52, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-12-13 02:49:02', '2023-12-13 02:49:02', NULL),
(49, 'CHKP-12025955', 53, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-12-13 02:59:55', '2023-12-13 02:59:55', NULL),
(50, 'CHKP-12030659', 54, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-12-13 03:06:59', '2023-12-13 03:06:59', NULL),
(51, 'CHKP-12031128', 55, 1, 'for checkup', 1, 0, '1900-01-01', '1900-01-01', '2023-12-13 03:11:28', '2023-12-13 03:11:28', NULL),
(52, 'CHKP-12035402', 56, 2, 'done checkup', 0, 1, '1900-01-01', '1900-01-01', '2023-12-13 03:54:02', '2023-12-16 07:51:27', NULL),
(53, 'CHKP-12025833', 57, 1, 'for checkup', 1, 0, NULL, '2023-03-21', '2023-12-19 02:58:33', '2023-12-19 02:58:33', NULL),
(54, 'CHKP-12030123', 58, 1, 'for follow-up', 1, 1, NULL, '1900-01-01', '2023-12-19 03:01:23', '2023-12-19 03:01:23', NULL),
(55, 'CHKP-12030631', 59, 1, 'for follow-up', 1, 1, NULL, '1900-01-01', '2023-12-19 03:06:31', '2023-12-19 03:06:31', NULL),
(56, 'CHKP-12031620', 60, 2, 'done checkup', 0, 1, NULL, '1900-01-01', '2023-12-19 03:16:20', '2024-01-01 10:02:17', NULL),
(57, 'CHKP-12033037', 61, 1, 'for checkup', 1, 0, NULL, '2023-02-04', '2023-12-19 03:30:37', '2023-12-19 03:30:37', NULL),
(58, 'CHKP-12033242', 62, 1, 'for follow-up', 1, 1, NULL, '1900-01-01', '2023-12-19 03:32:42', '2023-12-19 03:32:42', NULL),
(59, 'CHKP-12034804', 63, 1, 'for checkup', 1, 0, NULL, '2023-05-03', '2023-12-19 03:48:04', '2023-12-19 03:48:04', NULL),
(60, 'CHKP-12034835', 64, 1, 'for checkup', 1, 0, NULL, '2023-05-03', '2023-12-19 03:48:35', '2023-12-19 03:48:35', NULL),
(61, 'CHKP-12035831', 65, 1, 'for follow-up', 1, 1, NULL, '1900-01-01', '2023-12-19 03:58:31', '2023-12-19 03:58:31', NULL),
(62, 'CHKP-12040431', 66, 1, 'for checkup', 1, 0, NULL, '2023-02-20', '2023-12-19 04:04:31', '2023-12-19 04:04:31', NULL),
(63, 'CHKP-12040432', 67, 1, 'for checkup', 1, 0, NULL, '2023-02-20', '2023-12-19 04:04:32', '2023-12-19 04:04:32', NULL),
(64, 'CHKP-01072032', 68, 1, 'for checkup', 1, 0, NULL, '2024-01-01', '2024-01-01 07:20:32', '2024-01-01 07:20:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_checkup_images`
--

CREATE TABLE `patient_checkup_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_checkup_id` bigint(20) UNSIGNED NOT NULL,
  `checkup_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_purchase_prescriptions`
--

CREATE TABLE `patient_purchase_prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_checkup_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_status_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `laboratory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_requests`
--

CREATE TABLE `patient_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_checkup_id` bigint(20) UNSIGNED NOT NULL,
  `findings` text NOT NULL,
  `recomendation` text NOT NULL,
  `request_date` date NOT NULL,
  `isRelease` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petty_cashes`
--

CREATE TABLE `petty_cashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `petty_cash_status_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `file_date` date NOT NULL,
  `remarks` text NOT NULL DEFAULT '',
  `paid_amount` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `total_amount` int(11) NOT NULL DEFAULT 0,
  `change` int(11) NOT NULL DEFAULT 0,
  `isApprove` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescribe_laboratories`
--

CREATE TABLE `prescribe_laboratories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laboratory_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescribe_laboratories`
--

INSERT INTO `prescribe_laboratories` (`id`, `laboratory_id`, `quantity`, `remarks`, `isActive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '', 0, '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescribe_medicines`
--

CREATE TABLE `prescribe_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `srp` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescribe_medicines`
--

INSERT INTO `prescribe_medicines` (`id`, `product_id`, `srp`, `quantity`, `remarks`, `isActive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 0, '', 0, '2024-01-01 06:50:47', '2024-01-01 06:50:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_checkup_id` bigint(20) UNSIGNED NOT NULL,
  `prescribe_laboratory_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `prescribe_medicine_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_checkup_id`, `prescribe_laboratory_id`, `prescribe_medicine_id`, `status_id`, `invoice_number`, `remarks`, `qty`, `isActive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 54, 1, 1, 1, '', 'pending', 0, 1, '2023-12-19 03:01:23', '2023-12-19 03:01:23', NULL),
(15, 55, 1, 1, 1, '', 'pending', 0, 1, '2023-12-19 03:06:31', '2023-12-19 03:06:31', NULL),
(16, 56, 1, 1, 1, '', 'pending', 0, 1, '2023-12-19 03:16:20', '2023-12-19 03:16:20', NULL),
(17, 58, 1, 1, 1, '', 'pending', 0, 1, '2023-12-19 03:32:42', '2023-12-19 03:32:42', NULL),
(18, 61, 1, 1, 1, '', 'pending', 0, 1, '2023-12-19 03:58:31', '2023-12-19 03:58:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT 0,
  `sku` int(11) DEFAULT 0,
  `sold` int(11) DEFAULT 0,
  `available` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `form_id`, `barcode`, `serial_number`, `medicine_name`, `generic_name`, `description`, `isActive`, `sku`, `sold`, `available`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'PRD-20230222-083221', '', 'N/A', 'N/A', 'N/A', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(2, 14, 3, 'PRD-20230222-083223', '', 'Paracetamol Advance', 'Biogesic', 'For Flu', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(3, 14, 3, 'PRD-20230222-083223', '', 'ACECLOFENAC 100MG', '-', 'ACECLOFENAC 100MG', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(4, 14, 3, 'PRD-20230222-083223', '', 'ACICLOVIR 200MG', '-', 'ACICLOVIR 200MG', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(5, 14, 3, 'PRD-20230222-083223', '', 'ACETYLCYSTEINE 600MG', '-', 'ACETYLCYSTEINE 600MG', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(6, 14, 3, 'PRD-20230222-083223', '', 'ALLUMINUM MAGNESIUN LIQUID SACHET', '-', 'ALLUMINUM MAGNESIUN LIQUID SACHET', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(7, 14, 3, 'PRD-20230222-083223', '', 'ALLUMINUM MAGNESIUN TABLET', '-', 'ALLUMINUM MAGNESIUN TABLET', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(8, 14, 3, 'PRD-20230222-083223', '', 'AMBROXOL 30MG TABLET', '-', 'AMBROXOL 30MG TABLET', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(9, 14, 3, 'PRD-20230222-083223', '', 'AMLODIPINE + LOSARTAN TAB 50MG/5MG', '-', 'AMLODIPINE + LOSARTAN TAB 50MG/5MG', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(10, 14, 3, 'PRD-20230222-083223', '', 'ATORVASTATI + AMLODIPINE 10MG/5MG TAB', '-', 'ATORVASTATI + AMLODIPINE 10MG/5MG TAB', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(11, 14, 3, 'PRD-20230222-083223', '', 'AZITHROMYCIN 500MG TAB', '-', 'AZITHROMYCIN 500MG TAB', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(12, 14, 3, 'PRD-20230222-083223', '', 'CHLORAMPHENICOL 500MG CAP', '-', 'CHLORAMPHENICOL 500MG CAP', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(13, 14, 3, 'PRD-20230222-083223', '', 'COTRIMOXAZOLE800MG TAB', '-', 'COTRIMOXAZOLE800MG TAB', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(14, 14, 3, 'PRD-20230222-083223', '', 'LEVOCETIRIZINE+ MONTELUKAST TAB 10MG', '-', 'LEVOCETIRIZINE+ MONTELUKAST TAB 10MG', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(15, 14, 3, 'PRD-20230222-083223', '', 'LEVOCETIRIZINE+BETHAMETASONE TAB 10MG', '-', 'LEVOCETIRIZINE+BETHAMETASONE TAB 10MG', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(16, 14, 3, 'PRD-20230222-083223', '', 'POTASSIUM CHLORIDE 750MG TAB', '-', 'POTASSIUM CHLORIDE 750MG TAB', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(17, 14, 3, 'PRD-20230222-083223', '', 'SYLIMARIN + B COMPLEX SOFTGEL', '-', 'SYLIMARIN + B COMPLEX SOFTGEL', 0, 0, 0, 0, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(18, 74, 3, 'PRD-20231207-033804', '012345', 'Bacticef', 'Cefixime', '200 mg Capsule, Antibacterial (Third Generation Cephalosporin)', 1, 100, 0, 0, '2023-12-07 03:38:04', '2024-01-01 07:24:55', NULL),
(19, 76, 6, 'PRD-20231216-072326', '220915', 'Fukolac', 'KETOROLAC', 'Non-Steroidal Anti-Inflammatory Drug', 0, 0, 0, 0, '2023-12-16 07:23:26', '2023-12-16 07:23:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petty_cash_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_item` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `subtotal` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `purchase_remarks` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(2, 'manager', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(3, 'clerk', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(4, 'labtech', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(5, 'cashier', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(6, 'supplier', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(7, 'representative', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(8, 'manufacturer', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(9, 'wholesaler', '2023-11-07 22:35:58', '2023-11-07 22:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pending', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(2, 'success', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(3, 'rejected', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(4, 'partial', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(5, 'paid', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(6, 'due', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(7, 'for delivery', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(8, 'received', '2023-11-07 22:35:58', '2023-11-07 22:35:58'),
(9, 'onhand', '2023-11-07 22:35:58', '2023-11-07 22:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `list` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `status_id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 7, 'has ordered product with a TNX-ORD-20231207-033938 ', '2023-12-07 03:39:38', '2023-12-07 03:39:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `isActive` tinyint(1) DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `username`, `isActive`, `email_verified_at`, `password`, `contact_number`, `position`, `address`, `profile_image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Administrator Account', 'admin@admin.com', 'admin', 1, NULL, '$2y$10$toBe8SFI9wkBnCLR90HMyuamaiE6YOOk8SaekUdPz4R2kGCskcvW6', '09380276146', 'admin', 'General Santos City', '', NULL, '2023-11-07 22:35:58', '2023-11-30 08:41:41', NULL),
(2, 1, 'Administrator Account', 'ep.admin@admin.com', 'ep.admin', 1, NULL, '$2y$10$UKCIKb4X.e7njCB6TJlPhe3cg5hXs6Q3rjnAukH/qudQKlyPDse0C', '09380276146', 'admin', 'General Santos City', '', NULL, '2023-11-07 22:35:58', '2023-11-07 22:35:58', NULL),
(3, 2, 'Manager Account', 'maricel@manager.com', 'maricel.manager', 1, NULL, '$2y$10$i4s8ko0QHONvuhYgS8zrMej4hlqv2KjPj3R2zUaCCZlPVEox.BzsO', '09380276146', 'manager', 'General Santos City', '', NULL, '2023-11-07 22:35:58', '2023-11-07 22:35:58', NULL),
(4, 2, 'Manager Account', 'manager@manager.com', 'manager', 1, NULL, '$2y$10$6SgyVN6IWBkBbHwdBaBHIe6Lh0aRio839IWTrwHI6CTWMCk6xpcJu', '09380276146', 'manager', 'General Santos City', '', NULL, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(5, 3, 'Clerk Account', 'clerk01@admin.com', 'clerk01.manager', 1, NULL, '$2y$10$2caP92ttaQXjZBrFAvk0sOvLhmvdDRMjkAGDHfv77ccG2Sykp1US.', '09380276146', 'clerk', 'General Santos City', '', NULL, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(6, 3, 'Clerk Account', 'clerk02@admin.com', 'clerk02.manager', 0, NULL, '$2y$10$pXX/eOMMPEz7vBNVvXZ3HejVnDmuUwpZbZlx1yNBFEMCSP6wfxYUO', '09380276146', 'clerk', 'General Santos City', '', NULL, '2023-11-07 22:35:59', '2023-11-30 08:42:00', NULL),
(7, 3, 'Clerk Account', 'clerk@clerk.com', 'clerk', 1, NULL, '$2y$10$7BFDZbFsr6.jNyhPPuLH2.eHuy2Kj2qVml3S7bVLyxhpPxR1DgGAe', '09380276146', 'clerk', 'General Santos City', '', NULL, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(8, 4, 'Labtech Account', 'labtech@admin.com', 'labtech.manager', 1, NULL, '$2y$10$fZ//SNKjys28OQlY2.qsgeWikfwi5uc9a00UtAS5OGntdpi/Q87am', '09380276146', 'labtech', 'General Santos City', '', NULL, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL),
(9, 4, 'Labtech Account', 'labtech@labtech.com', 'labtech', 1, NULL, '$2y$10$uUB6rKqtKL7eupNVQlCAuOA82Tpq6hZafKt5tcO33CSFvdQ0OF0Wm', '09380276146', 'labtech', 'General Santos City', '', NULL, '2023-11-07 22:35:59', '2023-11-07 22:35:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distributors_entity_id_foreign` (`entity_id`),
  ADD KEY `distributors_company_id_foreign` (`company_id`);

--
-- Indexes for table `drug_classes`
--
ALTER TABLE `drug_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drug_classes_classification_id_foreign` (`classification_id`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entities_role_id_foreign` (`role_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_supplier_id_foreign` (`supplier_id`),
  ADD KEY `inventories_user_id_foreign` (`user_id`),
  ADD KEY `inventories_product_id_foreign` (`product_id`);

--
-- Indexes for table `inventory_details`
--
ALTER TABLE `inventory_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_details_inventory_sheet_id_foreign` (`inventory_sheet_id`),
  ADD KEY `inventory_details_product_id_foreign` (`product_id`),
  ADD KEY `inventory_details_inventory_status_id_foreign` (`inventory_status_id`);

--
-- Indexes for table `inventory_payments`
--
ALTER TABLE `inventory_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_payments_inventory_sheet_id_foreign` (`inventory_sheet_id`),
  ADD KEY `inventory_payments_customer_id_foreign` (`customer_id`),
  ADD KEY `inventory_payments_payment_status_id_foreign` (`payment_status_id`);

--
-- Indexes for table `inventory_payment_details`
--
ALTER TABLE `inventory_payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_payment_details_inventory_sheet_id_foreign` (`inventory_sheet_id`);

--
-- Indexes for table `inventory_sheets`
--
ALTER TABLE `inventory_sheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_sheets_distributor_id_foreign` (`distributor_id`);

--
-- Indexes for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_sub_menu_id_foreign` (`sub_menu_id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_approve_id_foreign` (`approve_id`),
  ADD KEY `orders_supplier_id_foreign` (`supplier_id`),
  ADD KEY `orders_manufacturer_id_foreign` (`manufacturer_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`),
  ADD KEY `orders_order_status_id_foreign` (`order_status_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_gender_id_foreign` (`gender_id`);

--
-- Indexes for table `patient_billings`
--
ALTER TABLE `patient_billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_billings_billing_status_id_foreign` (`billing_status_id`),
  ADD KEY `patient_billings_patient_checkup_id_foreign` (`patient_checkup_id`),
  ADD KEY `patient_billings_laboratory_id_foreign` (`laboratory_id`),
  ADD KEY `patient_billings_product_id_foreign` (`product_id`);

--
-- Indexes for table `patient_bmis`
--
ALTER TABLE `patient_bmis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_bmis_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `patient_checkups`
--
ALTER TABLE `patient_checkups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_checkups_status_id_foreign` (`status_id`),
  ADD KEY `patient_checkups_patient_bmi_id_foreign` (`patient_bmi_id`);

--
-- Indexes for table `patient_checkup_images`
--
ALTER TABLE `patient_checkup_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_checkup_images_patient_checkup_id_foreign` (`patient_checkup_id`);

--
-- Indexes for table `patient_purchase_prescriptions`
--
ALTER TABLE `patient_purchase_prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_purchase_prescriptions_patient_checkup_id_foreign` (`patient_checkup_id`),
  ADD KEY `patient_purchase_prescriptions_laboratory_id_foreign` (`laboratory_id`),
  ADD KEY `patient_purchase_prescriptions_product_id_foreign` (`product_id`),
  ADD KEY `patient_purchase_prescriptions_purchase_status_id_foreign` (`purchase_status_id`);

--
-- Indexes for table `patient_requests`
--
ALTER TABLE `patient_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_requests_patient_checkup_id_foreign` (`patient_checkup_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `petty_cashes`
--
ALTER TABLE `petty_cashes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petty_cashes_user_id_foreign` (`user_id`),
  ADD KEY `petty_cashes_petty_cash_status_id_foreign` (`petty_cash_status_id`);

--
-- Indexes for table `prescribe_laboratories`
--
ALTER TABLE `prescribe_laboratories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescribe_laboratories_laboratory_id_foreign` (`laboratory_id`);

--
-- Indexes for table `prescribe_medicines`
--
ALTER TABLE `prescribe_medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescribe_medicines_product_id_foreign` (`product_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_prescribe_laboratory_id_foreign` (`prescribe_laboratory_id`),
  ADD KEY `prescriptions_patient_checkup_id_foreign` (`patient_checkup_id`),
  ADD KEY `prescriptions_prescribe_medicine_id_foreign` (`prescribe_medicine_id`),
  ADD KEY `prescriptions_status_id_foreign` (`status_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_form_id_foreign` (`form_id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_petty_cash_id_foreign` (`petty_cash_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_status_id_foreign` (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drug_classes`
--
ALTER TABLE `drug_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_details`
--
ALTER TABLE `inventory_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_payments`
--
ALTER TABLE `inventory_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_payment_details`
--
ALTER TABLE `inventory_payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_sheets`
--
ALTER TABLE `inventory_sheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratories`
--
ALTER TABLE `laboratories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `patient_billings`
--
ALTER TABLE `patient_billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_bmis`
--
ALTER TABLE `patient_bmis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `patient_checkups`
--
ALTER TABLE `patient_checkups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `patient_checkup_images`
--
ALTER TABLE `patient_checkup_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_purchase_prescriptions`
--
ALTER TABLE `patient_purchase_prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_requests`
--
ALTER TABLE `patient_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petty_cashes`
--
ALTER TABLE `petty_cashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescribe_laboratories`
--
ALTER TABLE `prescribe_laboratories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescribe_medicines`
--
ALTER TABLE `prescribe_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distributors`
--
ALTER TABLE `distributors`
  ADD CONSTRAINT `distributors_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `distributors_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `entities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `drug_classes`
--
ALTER TABLE `drug_classes`
  ADD CONSTRAINT `drug_classes_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `entities`
--
ALTER TABLE `entities`
  ADD CONSTRAINT `entities_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventories_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `entities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory_details`
--
ALTER TABLE `inventory_details`
  ADD CONSTRAINT `inventory_details_inventory_sheet_id_foreign` FOREIGN KEY (`inventory_sheet_id`) REFERENCES `inventory_sheets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_details_inventory_status_id_foreign` FOREIGN KEY (`inventory_status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory_payments`
--
ALTER TABLE `inventory_payments`
  ADD CONSTRAINT `inventory_payments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_payments_inventory_sheet_id_foreign` FOREIGN KEY (`inventory_sheet_id`) REFERENCES `inventory_sheets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_payments_payment_status_id_foreign` FOREIGN KEY (`payment_status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory_payment_details`
--
ALTER TABLE `inventory_payment_details`
  ADD CONSTRAINT `inventory_payment_details_inventory_sheet_id_foreign` FOREIGN KEY (`inventory_sheet_id`) REFERENCES `inventory_sheets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory_sheets`
--
ALTER TABLE `inventory_sheets`
  ADD CONSTRAINT `inventory_sheets_distributor_id_foreign` FOREIGN KEY (`distributor_id`) REFERENCES `distributors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_sub_menu_id_foreign` FOREIGN KEY (`sub_menu_id`) REFERENCES `sub_menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_approve_id_foreign` FOREIGN KEY (`approve_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `distributors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `entities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_billings`
--
ALTER TABLE `patient_billings`
  ADD CONSTRAINT `patient_billings_billing_status_id_foreign` FOREIGN KEY (`billing_status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_billings_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_billings_patient_checkup_id_foreign` FOREIGN KEY (`patient_checkup_id`) REFERENCES `patient_checkups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_billings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_bmis`
--
ALTER TABLE `patient_bmis`
  ADD CONSTRAINT `patient_bmis_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_checkups`
--
ALTER TABLE `patient_checkups`
  ADD CONSTRAINT `patient_checkups_patient_bmi_id_foreign` FOREIGN KEY (`patient_bmi_id`) REFERENCES `patient_bmis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_checkups_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_checkup_images`
--
ALTER TABLE `patient_checkup_images`
  ADD CONSTRAINT `patient_checkup_images_patient_checkup_id_foreign` FOREIGN KEY (`patient_checkup_id`) REFERENCES `patient_checkups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_purchase_prescriptions`
--
ALTER TABLE `patient_purchase_prescriptions`
  ADD CONSTRAINT `patient_purchase_prescriptions_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `prescribe_laboratories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_purchase_prescriptions_patient_checkup_id_foreign` FOREIGN KEY (`patient_checkup_id`) REFERENCES `patient_checkups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_purchase_prescriptions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `prescribe_medicines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_purchase_prescriptions_purchase_status_id_foreign` FOREIGN KEY (`purchase_status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_requests`
--
ALTER TABLE `patient_requests`
  ADD CONSTRAINT `patient_requests_patient_checkup_id_foreign` FOREIGN KEY (`patient_checkup_id`) REFERENCES `patient_checkups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `petty_cashes`
--
ALTER TABLE `petty_cashes`
  ADD CONSTRAINT `petty_cashes_petty_cash_status_id_foreign` FOREIGN KEY (`petty_cash_status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `petty_cashes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescribe_laboratories`
--
ALTER TABLE `prescribe_laboratories`
  ADD CONSTRAINT `prescribe_laboratories_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescribe_medicines`
--
ALTER TABLE `prescribe_medicines`
  ADD CONSTRAINT `prescribe_medicines_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_patient_checkup_id_foreign` FOREIGN KEY (`patient_checkup_id`) REFERENCES `patient_checkups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_prescribe_laboratory_id_foreign` FOREIGN KEY (`prescribe_laboratory_id`) REFERENCES `prescribe_laboratories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_prescribe_medicine_id_foreign` FOREIGN KEY (`prescribe_medicine_id`) REFERENCES `prescribe_medicines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_petty_cash_id_foreign` FOREIGN KEY (`petty_cash_id`) REFERENCES `petty_cashes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
