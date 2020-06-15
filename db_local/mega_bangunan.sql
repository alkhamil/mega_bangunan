/*
 Navicat Premium Data Transfer

 Source Server         : local_mysql
 Source Server Type    : MySQL
 Source Server Version : 50730
 Source Host           : localhost:3306
 Source Schema         : mega_bangunan

 Target Server Type    : MySQL
 Target Server Version : 50730
 File Encoding         : 65001

 Date: 16/06/2020 03:13:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for criterias
-- ----------------------------
DROP TABLE IF EXISTS `criterias`;
CREATE TABLE `criterias`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dimension_id` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of criterias
-- ----------------------------
INSERT INTO `criterias` VALUES (1, 1, 'K1', 'Kepuasan terhadap kesesuaian Harga yang di jual di Kuningan Mega Bangunan', '2020-06-15 10:35:32', '2020-06-15 10:35:32');
INSERT INTO `criterias` VALUES (2, 1, 'K2', 'Kepuasan terhadap keramahan pegawai Kuningan Mega Bangunan', '2020-06-15 10:37:13', '2020-06-15 10:37:13');
INSERT INTO `criterias` VALUES (3, 1, 'K3', 'Kepuasan Karyawan dalam memberikan layanan tepat pada waktunya.', '2020-06-15 10:37:24', '2020-06-15 10:37:24');
INSERT INTO `criterias` VALUES (4, 1, 'K4', 'Pelayanan pengaduan cepat dan handal', '2020-06-15 10:37:38', '2020-06-15 10:37:38');
INSERT INTO `criterias` VALUES (5, 1, 'K5', 'Karyawan menginformasikan kepada pelanggan tentang produk-produknya', '2020-06-15 10:37:50', '2020-06-15 10:37:50');
INSERT INTO `criterias` VALUES (6, 2, 'K6', 'Kepuasan terhadap kecepatan dan ketepatan dalam melayani pelanggan', '2020-06-15 10:38:39', '2020-06-15 10:38:39');
INSERT INTO `criterias` VALUES (7, 2, 'K7', 'Kepuasan pelayanan pegawai Kuningan Mega Bangunan dalam memberikan informasi', '2020-06-15 10:38:56', '2020-06-15 10:38:56');
INSERT INTO `criterias` VALUES (8, 2, 'K8', 'Kepuasan Karyawan dalam melakukan proses transaksi', '2020-06-15 10:39:16', '2020-06-15 10:39:16');
INSERT INTO `criterias` VALUES (9, 2, 'K9', 'Kepuasan dalam penanganan keluhanan pelanggan', '2020-06-15 10:39:36', '2020-06-15 10:39:36');
INSERT INTO `criterias` VALUES (10, 3, 'K10', 'Kepuasan terhadap kesopanan atau keramahan Karyawan Kuningan Mega Bangunan', '2020-06-15 10:39:51', '2020-06-15 10:39:51');
INSERT INTO `criterias` VALUES (11, 3, 'K11', 'Pengembalian barang yang rusak jika cacat produksi', '2020-06-15 10:40:04', '2020-06-15 10:40:04');
INSERT INTO `criterias` VALUES (12, 3, 'K12', 'Pelanggan merasa aman dalam melakukan transaksi', '2020-06-15 10:40:28', '2020-06-15 10:40:28');
INSERT INTO `criterias` VALUES (13, 4, 'K13', 'Karyawan mudah dihubungi oleh pelanggan', '2020-06-15 10:40:51', '2020-06-15 10:40:51');
INSERT INTO `criterias` VALUES (14, 4, 'K14', 'Karyawan mengutamakan kepentingan pelanggan', '2020-06-15 10:42:00', '2020-06-15 10:42:00');
INSERT INTO `criterias` VALUES (15, 5, 'K15', 'Kepuasan Terhadap fasilitas yang ditawarkan', '2020-06-15 10:42:20', '2020-06-15 10:42:20');
INSERT INTO `criterias` VALUES (16, 5, 'K16', 'Kepuasan terhadap kondisi lingkungan yang bersih dan nyaman', '2020-06-15 10:42:38', '2020-06-15 10:42:38');

-- ----------------------------
-- Table structure for dimensions
-- ----------------------------
DROP TABLE IF EXISTS `dimensions`;
CREATE TABLE `dimensions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dimensions
-- ----------------------------
INSERT INTO `dimensions` VALUES (1, 'D1', 'Reliability', 'Reliabilitas / Keandalan', '2020-06-15 10:21:05', '2020-06-15 10:21:05');
INSERT INTO `dimensions` VALUES (2, 'D2', 'Responsiveness', 'Daya Tanggap', '2020-06-15 10:22:14', '2020-06-15 10:22:14');
INSERT INTO `dimensions` VALUES (3, 'D3', 'Assurance', 'Jaminan', '2020-06-15 10:22:32', '2020-06-15 10:22:32');
INSERT INTO `dimensions` VALUES (4, 'D4', 'Empathy', 'Empati', '2020-06-15 10:22:50', '2020-06-15 10:22:50');
INSERT INTO `dimensions` VALUES (5, 'D5', 'Tanggibles', 'Bukti Fisik', '2020-06-15 10:23:06', '2020-06-15 10:23:06');

-- ----------------------------
-- Table structure for kuisioners
-- ----------------------------
DROP TABLE IF EXISTS `kuisioners`;
CREATE TABLE `kuisioners`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pelanggan_id` int(20) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `kenyataan` int(11) NULL DEFAULT 0,
  `harapan` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kuisioners
-- ----------------------------
INSERT INTO `kuisioners` VALUES (1, 1, 1, 1, 1, '2020-06-15 17:57:14', '2020-06-15 17:57:14');
INSERT INTO `kuisioners` VALUES (2, 1, 2, 2, 0, '2020-06-15 17:57:14', '2020-06-15 17:57:14');
INSERT INTO `kuisioners` VALUES (3, 1, 3, 2, 0, '2020-06-15 17:57:14', '2020-06-15 17:57:14');
INSERT INTO `kuisioners` VALUES (4, 1, 4, 0, 0, '2020-06-15 17:57:14', '2020-06-15 17:57:14');
INSERT INTO `kuisioners` VALUES (5, 1, 5, 0, 0, '2020-06-15 17:57:14', '2020-06-15 17:57:14');
INSERT INTO `kuisioners` VALUES (6, 1, 6, 0, 0, '2020-06-15 17:57:14', '2020-06-15 17:57:14');
INSERT INTO `kuisioners` VALUES (7, 1, 7, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (8, 1, 8, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (9, 1, 9, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (10, 1, 10, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (11, 1, 11, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (12, 1, 12, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (13, 1, 13, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (14, 1, 14, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (15, 1, 15, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (16, 1, 16, 0, 0, '2020-06-15 17:57:15', '2020-06-15 17:57:15');
INSERT INTO `kuisioners` VALUES (17, 2, 1, 1, 2, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (18, 2, 2, 2, 3, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (19, 2, 3, 3, 2, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (20, 2, 4, 3, 2, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (21, 2, 5, 4, 1, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (22, 2, 6, 2, 1, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (23, 2, 7, 3, 1, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (24, 2, 8, 3, 2, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (25, 2, 9, 3, 2, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (26, 2, 10, 3, 1, '2020-06-15 18:03:31', '2020-06-15 18:03:31');
INSERT INTO `kuisioners` VALUES (27, 2, 11, 3, 3, '2020-06-15 18:03:32', '2020-06-15 18:03:32');
INSERT INTO `kuisioners` VALUES (28, 2, 12, 4, 2, '2020-06-15 18:03:32', '2020-06-15 18:03:32');
INSERT INTO `kuisioners` VALUES (29, 2, 13, 4, 2, '2020-06-15 18:03:32', '2020-06-15 18:03:32');
INSERT INTO `kuisioners` VALUES (30, 2, 14, 3, 2, '2020-06-15 18:03:32', '2020-06-15 18:03:32');
INSERT INTO `kuisioners` VALUES (31, 2, 15, 4, 3, '2020-06-15 18:03:32', '2020-06-15 18:03:32');
INSERT INTO `kuisioners` VALUES (32, 2, 16, 2, 2, '2020-06-15 18:03:32', '2020-06-15 18:03:32');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2020_06_15_063744_create_roles_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_06_15_065018_create_dimensions_table', 2);
INSERT INTO `migrations` VALUES (4, '2020_06_15_065052_create_criterias_table', 2);
INSERT INTO `migrations` VALUES (5, '2020_06_15_124232_create_kuisioners_table', 3);

-- ----------------------------
-- Table structure for pelanggans
-- ----------------------------
DROP TABLE IF EXISTS `pelanggans`;
CREATE TABLE `pelanggans`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_tlp` bigint(13) NULL DEFAULT NULL,
  `saran` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggans
-- ----------------------------
INSERT INTO `pelanggans` VALUES (1, NULL, NULL, NULL, NULL, '2020-06-15 17:57:14', '2020-06-15 17:57:14');
INSERT INTO `pelanggans` VALUES (2, 'Nazmudin', 'jakarta', 809909090, NULL, '2020-06-15 18:03:31', '2020-06-15 18:03:31');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'Admin', '2020-06-15 13:45:09', '2020-06-15 13:45:19');
INSERT INTO `roles` VALUES (2, 'Staff', 'Staff', '2020-06-15 13:45:12', '2020-06-15 13:45:22');
INSERT INTO `roles` VALUES (3, 'Pelanggan', 'Pelanggan', '2020-06-15 13:45:16', '2020-06-15 13:45:25');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 'admin', 'admin@email.com', '$2y$10$ab0LRmbICjbVWSvIJQz/pugMysGdWk/pk6xd8PHcfWe0MO.RWNqd6', '2020-06-15 13:48:54', '2020-06-15 13:49:03');
INSERT INTO `users` VALUES (2, 2, 'staff', 'staff@email.com', '$2y$10$RkqgmUfJf9fzDlnVj9EozugAXI09nZAuDZVhOpCCSoTZSIIKl9kry', '2020-06-15 13:48:58', '2020-06-15 13:49:06');
INSERT INTO `users` VALUES (3, 3, 'pelanggan', 'pelanggan@email.com', '$2y$10$3WcAOwQpkpyEvbh2cUuDx.KekK7KaDdD7FAswi5rVVs8YHJm7W1/a', '2020-06-15 13:49:00', '2020-06-15 13:49:09');
INSERT INTO `users` VALUES (4, 2, 'nazmudin', 'nazmudin@imaniprima.com', '$2y$10$z6IfN..8YQp9DxXqeF88A.vqmjjDkL2vmWmOcqaMm4fJ3Z86tX/GC', '2020-06-15 11:21:49', '2020-06-15 11:21:49');

SET FOREIGN_KEY_CHECKS = 1;
