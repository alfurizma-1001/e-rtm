-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 10:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eform_rtm`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `uuid`, `departemen`, `created_at`, `modified_at`) VALUES
(1, '3c0b868a-578b-42e8-b703-cb3944cf7082', 'QC', '2024-04-29 02:27:33', '2024-04-29 02:27:33'),
(2, '34a19a02-915c-43d9-94ef-bd558c8ed6d8', 'PRODUKSI', '2024-04-29 02:33:05', '2024-04-29 02:33:05'),
(3, 'a8e9dc99-053e-4661-842d-25fe499a984c', 'ENGINEERING', '2024-04-29 02:35:40', '2024-04-29 02:35:40'),
(4, '19200b9e-c60a-410d-8480-f5d2ef504ea6', 'TEKNISI AC', '2024-04-29 02:36:37', '2024-04-29 02:43:11'),
(5, '4a4e399b-cc17-4b6a-94ea-64b7ac63a41b', 'ICT', '2024-05-03 02:12:34', '2024-05-03 02:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `kebersihan_ruangan`
--

CREATE TABLE `kebersihan_ruangan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `clantai` text DEFAULT NULL,
  `cidinding` text DEFAULT NULL,
  `ckurtain` text DEFAULT NULL,
  `cpintu` text DEFAULT NULL,
  `clangit` text DEFAULT NULL,
  `cac` text DEFAULT NULL,
  `crak` text DEFAULT NULL,
  `clampu` text DEFAULT NULL,
  `cslantai` text DEFAULT NULL,
  `csdinding` text DEFAULT NULL,
  `cs_kurtain` text DEFAULT NULL,
  `cs_pintu` text DEFAULT NULL,
  `cs_langit` text DEFAULT NULL,
  `cs_ac` text DEFAULT NULL,
  `cs_rak` text DEFAULT NULL,
  `cs_lampu` text DEFAULT NULL,
  `csr_lantai` text DEFAULT NULL,
  `csr_dinding` text DEFAULT NULL,
  `csr_kurtain` text DEFAULT NULL,
  `csr_pintu` text DEFAULT NULL,
  `csr_langit` text DEFAULT NULL,
  `csr_ac` text DEFAULT NULL,
  `csr_rak` text DEFAULT NULL,
  `csr_lampu` text DEFAULT NULL,
  `s_lantai` text DEFAULT NULL,
  `s_dinding` text DEFAULT NULL,
  `s_kurtain` text DEFAULT NULL,
  `s_pintu` text DEFAULT NULL,
  `s_langit` text DEFAULT NULL,
  `s_ac` text DEFAULT NULL,
  `s_rak` text DEFAULT NULL,
  `s_lampu` text DEFAULT NULL,
  `s_allergen` text DEFAULT NULL,
  `s_tagging` text DEFAULT NULL,
  `p_lantai` text DEFAULT NULL,
  `p_dinding` text DEFAULT NULL,
  `p_kurtain` text DEFAULT NULL,
  `p_pintu` text DEFAULT NULL,
  `p_langit` text DEFAULT NULL,
  `p_ac` text DEFAULT NULL,
  `p_rak` text DEFAULT NULL,
  `p_lampu` text DEFAULT NULL,
  `p_vegetable` text DEFAULT NULL,
  `p_slicer` text DEFAULT NULL,
  `p_peeling` text DEFAULT NULL,
  `p_vacum` text DEFAULT NULL,
  `c_lantai` text DEFAULT NULL,
  `c_dinding` text DEFAULT NULL,
  `c_kurtain` text DEFAULT NULL,
  `c_pintu` text DEFAULT NULL,
  `c_langit` text DEFAULT NULL,
  `c_ac` text DEFAULT NULL,
  `c_rak` text DEFAULT NULL,
  `c_lampu` text DEFAULT NULL,
  `c_alco` text DEFAULT NULL,
  `c_titing` text DEFAULT NULL,
  `c_exhaust` text DEFAULT NULL,
  `c_stir` text DEFAULT NULL,
  `c_streamer` text DEFAULT NULL,
  `c_bowl` text DEFAULT NULL,
  `f_lantai` text DEFAULT NULL,
  `f_dinding` text DEFAULT NULL,
  `f_kurtain` text DEFAULT NULL,
  `f_pintu` text DEFAULT NULL,
  `f_langit` text DEFAULT NULL,
  `f_ac` text DEFAULT NULL,
  `f_rak` text DEFAULT NULL,
  `f_lampu` text DEFAULT NULL,
  `f_filling` text DEFAULT NULL,
  `f_vacum` text DEFAULT NULL,
  `f_sealer1` text DEFAULT NULL,
  `f_sealer2` text DEFAULT NULL,
  `f_filer1` text DEFAULT NULL,
  `f_filler2` text DEFAULT NULL,
  `rwaktu_periksa` time DEFAULT NULL,
  `rlantai` text DEFAULT NULL,
  `rdiniding` text DEFAULT NULL,
  `rpintu` text DEFAULT NULL,
  `rlangit` text DEFAULT NULL,
  `rsaluran_air` text DEFAULT NULL,
  `rlampu` text DEFAULT NULL,
  `rice_washer` text DEFAULT NULL,
  `rice_filling_machine` text DEFAULT NULL,
  `rice_cooker` text DEFAULT NULL,
  `rline_conveyor` text DEFAULT NULL,
  `rboiling` text DEFAULT NULL,
  `rmasalah` text DEFAULT NULL,
  `rtindakan_koreksi` text DEFAULT NULL,
  `nwaktu_periksa` time DEFAULT NULL,
  `nlantai` text DEFAULT NULL,
  `ndiniding` text DEFAULT NULL,
  `npintu` text DEFAULT NULL,
  `nlangit` text DEFAULT NULL,
  `nsaluran_air` text DEFAULT NULL,
  `nlampu` text DEFAULT NULL,
  `nvacuum_mixer` text DEFAULT NULL,
  `naging_machine` text DEFAULT NULL,
  `nroller_machine` text DEFAULT NULL,
  `ncutinng` text DEFAULT NULL,
  `t_lantai` text DEFAULT NULL,
  `t_dinding` text DEFAULT NULL,
  `t_kurtain` text DEFAULT NULL,
  `t_pintu` text DEFAULT NULL,
  `t_langit` text DEFAULT NULL,
  `t_ac` text DEFAULT NULL,
  `t_rak` text DEFAULT NULL,
  `t_lampu` text DEFAULT NULL,
  `pac_lantai` text DEFAULT NULL,
  `pac_dinding` text DEFAULT NULL,
  `pac_kurtain` text DEFAULT NULL,
  `pac_pintu` text DEFAULT NULL,
  `pac_langit` text DEFAULT NULL,
  `pac_ac` text DEFAULT NULL,
  `pac_rak` text DEFAULT NULL,
  `pac_lampu` text DEFAULT NULL,
  `pac_packing` text DEFAULT NULL,
  `pac_tray` text DEFAULT NULL,
  `pac_metal` text DEFAULT NULL,
  `pac_xray` text DEFAULT NULL,
  `pac_line` text DEFAULT NULL,
  `pac_inkjet` text DEFAULT NULL,
  `dinding_luar` text DEFAULT NULL,
  `dinding_dalam` text DEFAULT NULL,
  `ruang_iqf` text DEFAULT NULL,
  `conveyor_iqf` text DEFAULT NULL,
  `fg_lantai` text DEFAULT NULL,
  `fg_dinding` text DEFAULT NULL,
  `fg_kurtain` text DEFAULT NULL,
  `fg_pintu` text DEFAULT NULL,
  `fg_langit` text DEFAULT NULL,
  `fg_ac` text DEFAULT NULL,
  `fg_rak` text DEFAULT NULL,
  `fg_lampu` text DEFAULT NULL,
  `d_lantai` text DEFAULT NULL,
  `d_dinding` text DEFAULT NULL,
  `d_kurtain` text DEFAULT NULL,
  `d_pintu` text DEFAULT NULL,
  `d_langit` text DEFAULT NULL,
  `d_ac` text DEFAULT NULL,
  `d_rak` text DEFAULT NULL,
  `d_lampu` text DEFAULT NULL,
  `nmasalah` text DEFAULT NULL,
  `ntindakan_koreksi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontaminasi_benda_asing`
--

CREATE TABLE `kontaminasi_benda_asing` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `jenis_kontaminasi_benda_asing` varchar(255) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `tahapan` varchar(255) DEFAULT NULL,
  `tindakan_koreksi` varchar(255) DEFAULT NULL,
  `diketahui_produksi` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `qc` varchar(128) NOT NULL,
  `produksi` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontaminasi_benda_asing`
--

INSERT INTO `kontaminasi_benda_asing` (`id`, `uuid`, `date`, `shift`, `pukul`, `jenis_kontaminasi_benda_asing`, `bukti`, `produk`, `kode_produksi`, `tahapan`, `tindakan_koreksi`, `diketahui_produksi`, `catatan`, `qc`, `produksi`, `created_at`, `modified_at`) VALUES
(0, '4c538d42-9386-4d78-a8c4-7c421a13b8b2', '2024-11-09', '1', '08:00:00', '-', 'd', '-', 'd', 'd', 'd', NULL, 'd', '', '', '2024-11-09 02:54:51', '2024-11-09 02:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_sample`
--

CREATE TABLE `laboratory_sample` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `plant` varchar(255) DEFAULT NULL,
  `sample_type` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `sample_storage_frozen` varchar(255) DEFAULT NULL,
  `sample_storage_chilled` varchar(25) DEFAULT NULL,
  `sample_storage_other` varchar(25) DEFAULT NULL,
  `microbiological` text DEFAULT NULL,
  `Antibiotic_residues` text DEFAULT NULL,
  `Enterococcus` text DEFAULT NULL,
  `TPC` text DEFAULT NULL,
  `Salmonella` text DEFAULT NULL,
  `Coliform` text DEFAULT NULL,
  `Yeast` text DEFAULT NULL,
  `coli` text DEFAULT NULL,
  `Clostridium` text DEFAULT NULL,
  `aureus` text DEFAULT NULL,
  `Other` text DEFAULT NULL,
  `Chemical` text DEFAULT NULL,
  `Pesticide` text DEFAULT NULL,
  `Peroxide` text DEFAULT NULL,
  `pH` text DEFAULT NULL,
  `Ash` text DEFAULT NULL,
  `Fatty` text DEFAULT NULL,
  `Salinity` text DEFAULT NULL,
  `Protein` text DEFAULT NULL,
  `Moisture` text DEFAULT NULL,
  `Other2` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `production_code` varchar(255) DEFAULT NULL,
  `best_before` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `sample_checking_correct` varchar(25) DEFAULT NULL,
  `sample_checking_incorrect` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratory_sample`
--

INSERT INTO `laboratory_sample` (`id`, `uuid`, `plant`, `sample_type`, `date`, `sample_storage_frozen`, `sample_storage_chilled`, `sample_storage_other`, `microbiological`, `Antibiotic_residues`, `Enterococcus`, `TPC`, `Salmonella`, `Coliform`, `Yeast`, `coli`, `Clostridium`, `aureus`, `Other`, `Chemical`, `Pesticide`, `Peroxide`, `pH`, `Ash`, `Fatty`, `Salinity`, `Protein`, `Moisture`, `Other2`, `description`, `production_code`, `best_before`, `quantity`, `remarks`, `sample_checking_correct`, `sample_checking_incorrect`, `created_at`, `modified_at`) VALUES
(1, '64808fd0-e1a9-458e-99e0-0930786416ec', 'Cikande', 'ada', '2024-11-09', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'dada,didi,dudu', 'dada,didi,dudu', 'dada,didi,dudu', 'dada,didi,dudu', 'dada,didi,dudu', 'v', 'v', '2024-11-09 02:24:17', '2024-11-09 02:24:17'),
(2, '64924ca0-10e4-410e-aec8-8f5ab09cbf5e', 'Cikande', 'fufu', '2024-11-09', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'fufu,fifi,fafa', 'fufu,fifi,fafa', 'fufu,fifi,fafa', 'fufu,fifi,fafa', 'fufu,fifi,fafa', 'v', 'v', '2024-11-09 02:25:55', '2024-11-09 02:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `loading_lokal`
--

CREATE TABLE `loading_lokal` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `mulai_loading` time DEFAULT NULL,
  `selesai_loading` time DEFAULT NULL,
  `jenis_kendaraan` varchar(255) DEFAULT NULL,
  `nomor_kendaraan` varchar(255) DEFAULT NULL,
  `nama_ekspedisi` varchar(255) DEFAULT NULL,
  `nama_supir` varchar(255) DEFAULT NULL,
  `nama_pengirim` varchar(255) DEFAULT NULL,
  `tujuan_pengiriman` varchar(255) DEFAULT NULL,
  `bersih` varchar(255) DEFAULT NULL,
  `tidak_berdebu` varchar(255) DEFAULT NULL,
  `tidak_pecah` varchar(255) DEFAULT NULL,
  `bebas_hama` varchar(255) DEFAULT NULL,
  `tidak_kondensasi` varchar(255) DEFAULT NULL,
  `pecah` varchar(255) DEFAULT NULL,
  `bebabs_produk_nonhalal` varchar(255) DEFAULT NULL,
  `tidak_ada_noda` varchar(255) DEFAULT NULL,
  `pallet_utuh` varchar(255) DEFAULT NULL,
  `tidak_ada_sampah` varchar(255) DEFAULT NULL,
  `binatang` varchar(255) DEFAULT NULL,
  `jamur` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kondisi_produk` varchar(255) DEFAULT NULL,
  `kondisi_kemasanan` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `sanitasi_larutan` varchar(255) DEFAULT NULL,
  `ppm_sanitasi_larutan` varchar(255) DEFAULT NULL,
  `precooling` varchar(255) DEFAULT NULL,
  `suhu_produk` float DEFAULT NULL,
  `suhu_18` varchar(255) DEFAULT NULL,
  `segel_terpasang` varchar(255) DEFAULT NULL,
  `lama_delay` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loading_lokal`
--

INSERT INTO `loading_lokal` (`id`, `uuid`, `date`, `shift`, `mulai_loading`, `selesai_loading`, `jenis_kendaraan`, `nomor_kendaraan`, `nama_ekspedisi`, `nama_supir`, `nama_pengirim`, `tujuan_pengiriman`, `bersih`, `tidak_berdebu`, `tidak_pecah`, `bebas_hama`, `tidak_kondensasi`, `pecah`, `bebabs_produk_nonhalal`, `tidak_ada_noda`, `pallet_utuh`, `tidak_ada_sampah`, `binatang`, `jamur`, `nama_produk`, `kondisi_produk`, `kondisi_kemasanan`, `kode_produksi`, `tanggal_kadaluarsa`, `keterangan`, `sanitasi_larutan`, `ppm_sanitasi_larutan`, `precooling`, `suhu_produk`, `suhu_18`, `segel_terpasang`, `lama_delay`, `created_at`, `modified_at`) VALUES
(2, '57bca26a-9145-4e36-b430-5fb299f0d070', '2024-11-06', '1', '15:06:00', '16:07:00', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2024-11-13', '1', '1', '1', '1', 1, '1', '1', '1', '2024-11-06 08:06:32', '2024-11-06 08:06:32'),
(3, 'c76954cb-7ab5-4d5c-afd8-866c99cf74ad', '2024-11-06', '3', '16:07:00', '08:22:00', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2024-11-07', '2', '2', '2', '2', 2, '2', '2', '2', '2024-11-06 08:07:08', '2024-11-06 08:07:08'),
(4, 'd23682ac-06cd-4c2e-8176-dfc60bba3437', '2024-11-06', '2', '16:12:00', '17:13:00', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '2024-11-07', '5', 'Ya', '5', '5', 5, 'Ya', 'Tidak', '5', '2024-11-06 08:12:26', '2024-11-06 08:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_false`
--

CREATE TABLE `monitoring_false` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `mesin` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `jumlah_pack_tdklolos` varchar(255) DEFAULT NULL,
  `jumlah_pack_kontaminan` varchar(255) DEFAULT NULL,
  `jenis_kontaminan` varchar(255) DEFAULT NULL,
  `posisi_kontaminan` varchar(255) DEFAULT NULL,
  `false_rejections` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitoring_false`
--

INSERT INTO `monitoring_false` (`id`, `uuid`, `mesin`, `date`, `nama_produk`, `kode_produksi`, `jumlah_pack_tdklolos`, `jumlah_pack_kontaminan`, `jenis_kontaminan`, `posisi_kontaminan`, `false_rejections`, `catatan`, `created_at`, `modified_at`) VALUES
(1, 'b9b9af0b-b4b6-45a5-b409-8de44a513e55', 'dede', '2024-11-05', 'e', 'e', '2', '2', '2', '2', '2', '2', '2024-11-05 16:25:10', '2024-11-05 16:25:10'),
(2, '64ca209e-becb-41f4-bd3e-1049a905c56a', 'dede', '2024-11-05', '2', '2', '2', '2', '2', '2', '2', '2', '2024-11-05 16:25:23', '2024-11-05 16:25:23'),
(3, '12b4fdc0-17bc-49f4-8aad-3db968f60369', 'dere', '2024-11-15', '4', '4', '4', '4', '4', '4', '4', '4', '2024-11-05 16:25:35', '2024-11-05 16:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_repack`
--

CREATE TABLE `monitoring_repack` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `karton` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `exp_date` varchar(255) DEFAULT NULL,
  `kodefikasi` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `kerapihan` varchar(255) DEFAULT NULL,
  `lain_lain` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitoring_repack`
--

INSERT INTO `monitoring_repack` (`id`, `uuid`, `date`, `shift`, `nama_produk`, `produk`, `karton`, `jumlah`, `exp_date`, `kodefikasi`, `content`, `kerapihan`, `lain_lain`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(3, '99dae6b5-7af7-4011-ac7c-20f82a5d815a', '2024-11-06', '1', '3', '3', '3', '3', '2024-11-21', '3', '3', '3', '3', '3', '3', '2024-11-05 17:06:22', '2024-11-05 17:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_saus_y`
--

CREATE TABLE `parameter_saus_y` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `saus` varchar(255) DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `tangal_prod` date DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `suhu` float DEFAULT NULL,
  `brix` float DEFAULT NULL,
  `salt` float DEFAULT NULL,
  `viscositas` varchar(255) DEFAULT NULL,
  `brookfield` float DEFAULT NULL,
  `brookfield_frozen` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `par_yoshinoya`
--

CREATE TABLE `par_yoshinoya` (
  `id` int(11) NOT NULL,
  `uuid` text NOT NULL,
  `saus` text NOT NULL,
  `shift` text NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `kode_produksi` text NOT NULL,
  `suhu_pengukuran` text NOT NULL,
  `brix` text NOT NULL,
  `salt` text NOT NULL,
  `viscositas` text NOT NULL,
  `brookfield` text NOT NULL,
  `brookfield_setelah_frozen` text NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `par_yoshinoya`
--

INSERT INTO `par_yoshinoya` (`id`, `uuid`, `saus`, `shift`, `tanggal_produksi`, `kode_produksi`, `suhu_pengukuran`, `brix`, `salt`, `viscositas`, `brookfield`, `brookfield_setelah_frozen`, `catatan`, `created_at`, `modified_at`) VALUES
(4, 'a28726ca-c06b-4a60-8f3d-99c5a9f810c6', 'Yoshinoya', '2', '2024-10-21', '123', 'suhu', 'brix', 'salt', 'visco', 'brook', 'bsf', 'catatan', '2024-10-21 08:09:22', '2024-10-21 08:09:22'),
(5, 'e28e06ef-6c85-41a7-a073-2b12a5df1860', 'yoshinoya2', '2', '2024-10-21', '789', 'suhu2', 'brix2', 'salt2', 'visco2', 'brook2', 'bsf2', 'catatan2', '2024-10-21 08:11:21', '2024-10-21 08:11:21'),
(6, '153da897-6dfb-440f-add7-7cf4455ae6cd', 'yoshinoya23', '1', '2024-10-21', '456', '789', '789', '456', '123', '159', '753', '565', '2024-10-23 03:44:16', '2024-10-23 03:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `tipe_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `uuid`, `nama`, `username`, `password`, `email`, `departemen`, `tipe_user`, `created_at`, `modified_at`) VALUES
(4, 'a50e8288-920a-4d1a-a353-1ae11a65e5ac', 'Efa Isnawati', 'efa', '$2y$10$RdR6qNS38Xjh.xwanXvH4.beaXN8.GPisV0Rr7g4yxM2FtBpdLL/y', '', '3c0b868a-578b-42e8-b703-cb3944cf7082', '0', '2024-05-03 02:08:42', '2024-05-03 02:08:42'),
(5, '84582268-db3d-446b-8f72-dbea675914f6', 'ADMIN', 'admin', '$2y$10$1VOySPNbzVzn6fWINJw8auuDt.MTLojdo1rYTbs6oKEKKLG4XolNu', '', '3c0b868a-578b-42e8-b703-cb3944cf7082', '0', '2024-06-19 08:57:22', '2024-05-03 02:16:06'),
(6, 'ff667946-1ad0-4539-84fc-e6c8b8a4a358', 'Naufal Arisyi', 'naufal', '$2y$10$R5mgftBN05yMUn80j3fituVYVNiJNWYkruEa2UoAxvGUFpgnhGs4W', '', '3c0b868a-578b-42e8-b703-cb3944cf7082', '6', '2024-06-19 08:58:01', '2024-05-03 02:21:29'),
(7, '0589a5cf-f830-4305-8d82-2a2bf67e2b26', 'ya', 'ya', '$2y$10$6neg/Q0Yo.1sUYhbmAgMGOLv4QNindvDAqkFEmQ3T3EcwGpcWurRm', '', '34a19a02-915c-43d9-94ef-bd558c8ed6d8', '4', '2024-05-03 02:39:09', '2024-05-03 02:39:09'),
(8, '121536ec-92ad-4788-9576-ee9e1eae33c7', 'user', 'user', '$2y$10$1Sko84NlAT29JvkMe9KwRuquL6a.4hf6le6Som1bLSDDLq2vMcLru', '', '3c0b868a-578b-42e8-b703-cb3944cf7082', '5', '2024-05-27 03:05:15', '2024-05-27 03:05:15'),
(9, '6b444ad4-f269-4f4f-b9f5-a3af59542246', 'admin1', 'admin1', '$2y$10$3TO80/j1El71juCsw0nytu4KkjBT/fdXjadgMTWM4WzXbEnnQtePS', '', '3c0b868a-578b-42e8-b703-cb3944cf7082', '0', '2024-05-29 03:34:50', '2024-05-29 03:34:50'),
(10, 'cbaec85e-ce9f-44bd-a796-282eb9b1a8b8', 'user', 'user1', '$2y$10$xxglshKGoXTd1z.bR//0R.OPhfk.t0mgqd702BrLbLGUI90rOk2am', '', '3c0b868a-578b-42e8-b703-cb3944cf7082', '4', '2024-05-29 03:35:06', '2024-05-29 03:35:06'),
(11, 'fad95254-87f0-4093-858f-6819c1740fce', 'user2', 'user2', '$2y$10$sUKjAFk0LsQ0ftxZpYgBxuZ/aUzNXJh3b8GlrKvXSIFeyWwh7Rnxi', '', '3c0b868a-578b-42e8-b703-cb3944cf7082', '5', '2024-05-31 08:35:56', '2024-05-31 08:35:56'),
(13, 'd7199a99-646c-43d4-892b-12b2490b9fb6', 'alfurizma', 'alfurizma', '$2y$10$yUQ.VakgJ4mKL4Byy1nUmuagE2ma2EAsdA//JhoSmbnfHa2QAgNIa', '', '3c0b868a-578b-42e8-b703-cb3944cf7082', '0', '2024-08-19 01:42:43', '2024-08-19 01:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_disposisi`
--

CREATE TABLE `pemeriksaan_disposisi` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `ketidaksesuain` varchar(255) DEFAULT NULL,
  `tindakan_terhadap_produk` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_dry_store`
--

CREATE TABLE `pemeriksaan_dry_store` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `mobil` varchar(255) DEFAULT NULL,
  `no_polisi` varchar(255) DEFAULT NULL,
  `identitas_pengantar` varchar(255) DEFAULT NULL,
  `segel` varchar(255) DEFAULT NULL,
  `kebersihaan` varchar(255) DEFAULT NULL,
  `hama` varchar(255) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `mulai_dicek` varchar(255) DEFAULT NULL,
  `selesai_dicek` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan_dry_store`
--

INSERT INTO `pemeriksaan_dry_store` (`id`, `uuid`, `date`, `nama_supplier`, `nama_barang`, `mobil`, `no_polisi`, `identitas_pengantar`, `segel`, `kebersihaan`, `hama`, `jam_masuk`, `jam_keluar`, `mulai_dicek`, `selesai_dicek`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '5b1294c0-fc24-4ff4-9a6a-85073b0be31b', '2024-11-06', '1', '1', '1', '1', '1', '1', '1', '1', '23:08:00', '12:08:00', '1', '1', '1', '1', '2024-11-06 16:08:40', '2024-11-06 16:08:40'),
(2, '0654c4bc-83b5-4774-8123-6d3329714b2a', '2024-11-12', '4', '4', '4', '2', '2', '2', '2', '2', '13:10:00', '13:10:00', '2', '2', '2', '2', '2024-11-06 16:09:01', '2024-11-06 16:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_incoming`
--

CREATE TABLE `pemeriksaan_incoming` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nama_supllier` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `jenis_mobil` varchar(255) DEFAULT NULL,
  `no_polisi` varchar(255) DEFAULT NULL,
  `identitas_pengantar` varchar(255) DEFAULT NULL,
  `segel` varchar(255) DEFAULT NULL,
  `kebersihaan` varchar(255) DEFAULT NULL,
  `tertutup` varchar(255) DEFAULT NULL,
  `hama` varchar(255) DEFAULT NULL,
  `jam_datang` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan_incoming`
--

INSERT INTO `pemeriksaan_incoming` (`id`, `uuid`, `date`, `nama_supllier`, `nama_barang`, `jenis_mobil`, `no_polisi`, `identitas_pengantar`, `segel`, `kebersihaan`, `tertutup`, `hama`, `jam_datang`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '5bb22028-4652-4c77-af44-bd4d52f555df', '2024-11-07', 'C', 'C', 'C', 'A', 'A', 'A', 'A', 'A', 'A', '11:18', 'A', 'A', '2024-11-07 03:17:19', '2024-11-07 03:18:06'),
(2, '308671c3-f553-4ead-a06a-cca5dc2b15ab', '2024-11-07', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', '11:18', 'B', 'B', '2024-11-07 03:17:54', '2024-11-07 03:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_kedatangan_raw_material`
--

CREATE TABLE `pemeriksaan_kedatangan_raw_material` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `jenis_raw_material` varchar(255) DEFAULT NULL,
  `spesifikasi` varchar(255) DEFAULT NULL,
  `pemasok` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `jumlah_barang_datang` varchar(255) DEFAULT NULL,
  `sampel` varchar(255) NOT NULL,
  `sesuai` varchar(255) DEFAULT NULL,
  `tidak_sesuai` varchar(255) DEFAULT NULL,
  `kemasan` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `kotoran` varchar(255) DEFAULT NULL,
  `aroma` varchar(255) DEFAULT NULL,
  `suhu` varchar(255) DEFAULT NULL,
  `ada` varchar(255) DEFAULT NULL,
  `tdk_ada` varchar(255) DEFAULT NULL,
  `negara_asal` varchar(255) DEFAULT NULL,
  `ok` varchar(255) DEFAULT NULL,
  `tolak` varchar(255) DEFAULT NULL,
  `berlaku` varchar(255) DEFAULT NULL,
  `tidak_berlaku` varchar(255) DEFAULT NULL,
  `coa` varchar(255) DEFAULT NULL,
  `A` varchar(255) DEFAULT NULL,
  `NA` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan_kedatangan_raw_material`
--

INSERT INTO `pemeriksaan_kedatangan_raw_material` (`id`, `uuid`, `date`, `jenis_raw_material`, `spesifikasi`, `pemasok`, `kode_produksi`, `exp_date`, `jumlah_barang_datang`, `sampel`, `sesuai`, `tidak_sesuai`, `kemasan`, `warna`, `kotoran`, `aroma`, `suhu`, `ada`, `tdk_ada`, `negara_asal`, `ok`, `tolak`, `berlaku`, `tidak_berlaku`, `coa`, `A`, `NA`, `keterangan`, `catatan`, `created_at`) VALUES
(1, '4ba1c038-4b30-4983-839f-0ba48805c425', '2024-11-07', 'a', 'a', 'a', 'a', '2024-11-15', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2024-11-07 04:30:51'),
(2, '009df66f-d8a0-4ac8-8f6d-a2e7ffba77e7', '2024-11-07', 'b', 'b', 'b', 'b', '2024-11-07', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '2024-11-07 04:31:19'),
(3, '02958ecb-cac5-48e8-8627-8275d35af8eb', '2024-11-07', 'c', 'c', '', '', '2024-11-22', 'c', 'c', '', '', 'c', 'c', 'c', 'c', 'c', '', '', '', '', 'c', 'c', 'c', '', '', 'c', 'c', 'c', '2024-11-07 04:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_kemasan_dari_pemasok`
--

CREATE TABLE `pemeriksaan_kemasan_dari_pemasok` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `jenis_kemasan` varchar(255) DEFAULT NULL,
  `spesifikasi` varchar(255) DEFAULT NULL,
  `pemasok` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `jumlah_barang_datang` varchar(255) DEFAULT NULL,
  `sampling` varchar(255) DEFAULT NULL,
  `sesuai` varchar(255) DEFAULT NULL,
  `tidak_sesuai` varchar(255) DEFAULT NULL,
  `penampakan` varchar(255) DEFAULT NULL,
  `dimensi` varchar(255) DEFAULT NULL,
  `sealing` varchar(255) DEFAULT NULL,
  `cetakan` varchar(255) DEFAULT NULL,
  `ketebalan` varchar(255) DEFAULT NULL,
  `ok` varchar(255) DEFAULT NULL,
  `tolak` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan_kemasan_dari_pemasok`
--

INSERT INTO `pemeriksaan_kemasan_dari_pemasok` (`id`, `uuid`, `date`, `jenis_kemasan`, `spesifikasi`, `pemasok`, `kode_produksi`, `no_po`, `jumlah_barang_datang`, `sampling`, `sesuai`, `tidak_sesuai`, `penampakan`, `dimensi`, `sealing`, `cetakan`, `ketebalan`, `ok`, `tolak`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, 'b149518f-d319-4120-9f45-63ed6db6793c', '2024-11-07', '11', '11', '11', '11', '11', '11', '11', '11', '11', '11', '11', '1', '11', '11', '11', '1', '11', '11', '2024-11-07 14:49:12', '2024-11-07 14:49:12'),
(2, '0e944138-a51e-4d8e-82f1-a6b4023d301c', '2024-11-07', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '2024-11-07 14:49:30', '2024-11-07 14:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_premix`
--

CREATE TABLE `pemeriksaan_premix` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `no_mobil` varchar(255) DEFAULT NULL,
  `nama_supir` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `pemasok` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `jumlah_barang_datang` varchar(255) DEFAULT NULL,
  `jumlah_sample_cek` varchar(255) DEFAULT NULL,
  `sesuai` varchar(255) DEFAULT NULL,
  `tidak_Sesuai` varchar(255) DEFAULT NULL,
  `berat_premix` varchar(255) DEFAULT NULL,
  `kemasan` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `jamur` varchar(255) DEFAULT NULL,
  `aroma` varchar(255) DEFAULT NULL,
  `ok` varchar(255) DEFAULT NULL,
  `tolak` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan_premix`
--

INSERT INTO `pemeriksaan_premix` (`id`, `uuid`, `date`, `shift`, `no_mobil`, `nama_supir`, `nama_produk`, `pemasok`, `kode_produksi`, `exp_date`, `jumlah_barang_datang`, `jumlah_sample_cek`, `sesuai`, `tidak_Sesuai`, `berat_premix`, `kemasan`, `warna`, `jamur`, `aroma`, `ok`, `tolak`, `catatan`, `keterangan`, `created_at`, `modified_at`) VALUES
(1, '536d9245-ab4a-49f6-8cea-1be0a6c346bd', '2024-11-06', '1', '123', '123', '123', '123', '123', '2024-11-07', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '2024-11-06 14:45:42', '2024-11-06 14:45:42'),
(2, '56adf0b7-f529-449a-bd1e-a6bbdee08f51', '2024-11-06', '2', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', '2024-11-21', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', 'ZXC', '2024-11-06 14:46:15', '2024-11-06 14:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_retur`
--

CREATE TABLE `pemeriksaan_retur` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `no_mobil` varchar(255) DEFAULT NULL,
  `nama_supir` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `bocor` varchar(255) DEFAULT NULL,
  `isi_kurang` varchar(255) DEFAULT NULL,
  `lain` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan_retur`
--

INSERT INTO `pemeriksaan_retur` (`id`, `uuid`, `date`, `shift`, `no_mobil`, `nama_supir`, `nama_produk`, `kode_produksi`, `exp_date`, `jumlah`, `bocor`, `isi_kurang`, `lain`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, 'c9dc2c76-3156-4797-973b-d5f9ce167ae3', '2024-11-06', '1', '1', '1', '1', '1', '2024-11-12', '1', '1', '1', '1', '1', '1', '2024-11-06 08:41:10', '2024-11-06 08:41:10'),
(2, '522f2d31-0921-4b9c-bc27-02440320a779', '2024-11-06', '2', '2', '2', '2', '2', '2024-11-30', '2', '2', '2', '2', '2', '2', '2024-11-06 08:41:25', '2024-11-06 08:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `pem_kettle`
--

CREATE TABLE `pem_kettle` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `shift` varchar(11) DEFAULT NULL,
  `nama_produk` text DEFAULT NULL,
  `jenis_produk` text DEFAULT NULL,
  `kode_produksi` text DEFAULT NULL,
  `waktu_start_stop` text DEFAULT NULL,
  `mesin` text DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `tahapan_proses` text DEFAULT NULL,
  `formulasike` text DEFAULT NULL,
  `jenis_bahan` text DEFAULT NULL,
  `jumlah_standar` text DEFAULT NULL,
  `jumlah_aktual` text DEFAULT NULL,
  `sensori` text DEFAULT NULL,
  `lama_proses` text DEFAULT NULL,
  `mixing_paddle_on` text DEFAULT NULL,
  `mixing_paddle_off` text DEFAULT NULL,
  `pressure` text DEFAULT NULL,
  `temperature` text DEFAULT NULL,
  `target_temperature` text DEFAULT NULL,
  `actual_temperature` text DEFAULT NULL,
  `suhu_pusat_produk` text DEFAULT NULL,
  `organoleptik_warna` text DEFAULT NULL,
  `organoleptik_aroma` text DEFAULT NULL,
  `organoleptik_rasa` text DEFAULT NULL,
  `organoleptik_tekstur` text DEFAULT NULL,
  `catatan_kanan` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pem_kettle`
--

INSERT INTO `pem_kettle` (`id`, `uuid`, `date`, `shift`, `nama_produk`, `jenis_produk`, `kode_produksi`, `waktu_start_stop`, `mesin`, `waktu`, `tahapan_proses`, `formulasike`, `jenis_bahan`, `jumlah_standar`, `jumlah_aktual`, `sensori`, `lama_proses`, `mixing_paddle_on`, `mixing_paddle_off`, `pressure`, `temperature`, `target_temperature`, `actual_temperature`, `suhu_pusat_produk`, `organoleptik_warna`, `organoleptik_aroma`, `organoleptik_rasa`, `organoleptik_tekstur`, `catatan_kanan`, `catatan`, `created_at`, `modified_at`) VALUES
(39, '67711bb1-52cc-4750-8c1a-fe4bc1fcd32e', '2024-10-22', '1', 'Tai', '1', '1', '1', '1', '17:38', 'Cooking & Stirring', 'Formulasi ke 1', '1', '1', '1', '1', '1', 'ON', 'OFF', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2024-10-22 09:37:25', '2024-10-22 09:37:25'),
(40, 'cf9ba42a-681f-44b5-8986-4716b945a567', '2024-10-22', '3', 'ha', 'ha', 'ha', 'ha', 'ah', '15:05', 'Cooking & Stirring', 'Formulasi ke 1', 'ha', 'ha', 'ha', 'ha', 'ha', 'ON', 'OFF', 'ha', 'ha', 'ha', 'ha', 'ha', 'ha', 'ha', 'ha', 'ha', 'ha', 'ah', '2024-10-23 08:05:57', '2024-10-23 08:05:57'),
(42, 'dc12403a-bb30-464a-8415-da2687fd36d4', '2024-10-28', '1', 'ada', 'ada', 'ada', 'ada', 'ada', '14:50', 'Cooking & Stirring', 'Formulasi ke 1', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', NULL, 'ada', '2024-10-28 06:49:39', '2024-10-28 06:49:39'),
(43, '0df114a5-a789-4998-8b4a-ae78f07fe9ab', '2024-10-28', '1', 'afa', 'afa', 'afa', 'afa', 'afa', '17:53', 'Cooking & Stirring', 'Formulasi ke 1', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', 'afa', NULL, 'afa', '2024-10-28 06:50:23', '2024-10-28 06:50:23'),
(44, '82015896-9695-4bb8-a605-1308da0aff05', '2024-10-28', '2', 'aga', 'aga', 'aga', 'aga', 'aga', '19:56', 'Cooking & Stirring', 'Formulasi ke 2', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', 'aga', NULL, 'aga', '2024-10-28 06:51:29', '2024-10-28 06:51:29'),
(45, '5c0d63f2-2a55-4a61-9c11-052adc94be66', '2024-10-28', '3', 'fff', 'fff', 'fff', 'fff', 'fff', '20:54', 'Finish', ' ', '', '', '', '', 'fff', 'fff', 'fff', 'fff', 'fff', 'ggg', 'fff', 'fff', 'fff', 'fff', 'fff', 'fff', 'hueeeeee', 'fff', '2024-10-28 06:52:45', '2024-10-28 06:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `pem_masak_disteam`
--

CREATE TABLE `pem_masak_disteam` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `mesin` varchar(255) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `tahapan_proses` varchar(255) DEFAULT NULL,
  `jenis_bahan` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `sensori` varchar(255) DEFAULT NULL,
  `suhu` float DEFAULT NULL,
  `lama_proses` varchar(255) DEFAULT NULL,
  `on` varchar(255) DEFAULT NULL,
  `off` varchar(255) DEFAULT NULL,
  `pressure` varchar(255) DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `target_temperature` float DEFAULT NULL,
  `actual_temperature` float DEFAULT NULL,
  `suhu_pusat` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `aroma` varchar(255) DEFAULT NULL,
  `rasa` varchar(255) DEFAULT NULL,
  `tekstur` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pem_masak_noodle`
--

CREATE TABLE `pem_masak_noodle` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `mixing_bahan_utama` text DEFAULT NULL,
  `mixing_kode_produksi` text DEFAULT NULL,
  `mixing_berat` text DEFAULT NULL,
  `bahan_lain` text DEFAULT NULL,
  `bahan_lain_kode_produksi` text DEFAULT NULL,
  `bahan_lain_berat` text DEFAULT NULL,
  `bahan_lain_kode_produksi_item2` text DEFAULT NULL,
  `bahan_lain_berat_item2` text DEFAULT NULL,
  `waktu_proses` text DEFAULT NULL,
  `vacuum` text DEFAULT NULL,
  `suhu_adonan` text DEFAULT NULL,
  `aging_waktu` text DEFAULT NULL,
  `aging_rh` text DEFAULT NULL,
  `aging_suhu_ruangan` text DEFAULT NULL,
  `rolling_ukuran_tebal` text DEFAULT NULL,
  `cutting_sampling_berat` text DEFAULT NULL,
  `boiling_suhu_setting_water` text DEFAULT NULL,
  `boiling_suhu_actual_water` text DEFAULT NULL,
  `boiling_waktu` text DEFAULT NULL,
  `washing_suhu_setting_water` text DEFAULT NULL,
  `washing_suhu_actual_water` text DEFAULT NULL,
  `washing_waktu` text DEFAULT NULL,
  `cooling_suhu_setting_water` text DEFAULT NULL,
  `cooling_suhu_actual_water` text DEFAULT NULL,
  `cooling_waktu` text DEFAULT NULL,
  `lama_proses_jam_mulai` text DEFAULT NULL,
  `lama_proses_jam_selesai` text DEFAULT NULL,
  `sensori_suhu_produk_akhir` text DEFAULT NULL,
  `sensori_suhu_produk_setelah` text DEFAULT NULL,
  `sensori_rasa` text DEFAULT NULL,
  `sensori_kekenyalan` text DEFAULT NULL,
  `sensori_warna` text DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pem_masak_noodle`
--

INSERT INTO `pem_masak_noodle` (`id`, `uuid`, `date`, `shift`, `nama_produk`, `kode_produksi`, `mixing_bahan_utama`, `mixing_kode_produksi`, `mixing_berat`, `bahan_lain`, `bahan_lain_kode_produksi`, `bahan_lain_berat`, `bahan_lain_kode_produksi_item2`, `bahan_lain_berat_item2`, `waktu_proses`, `vacuum`, `suhu_adonan`, `aging_waktu`, `aging_rh`, `aging_suhu_ruangan`, `rolling_ukuran_tebal`, `cutting_sampling_berat`, `boiling_suhu_setting_water`, `boiling_suhu_actual_water`, `boiling_waktu`, `washing_suhu_setting_water`, `washing_suhu_actual_water`, `washing_waktu`, `cooling_suhu_setting_water`, `cooling_suhu_actual_water`, `cooling_waktu`, `lama_proses_jam_mulai`, `lama_proses_jam_selesai`, `sensori_suhu_produk_akhir`, `sensori_suhu_produk_setelah`, `sensori_rasa`, `sensori_kekenyalan`, `sensori_warna`, `catatan`, `created_at`, `modified_at`) VALUES
(0, '9693a130-b07d-4ffa-ab00-4a6fd20b247a', '2024-11-09', '1', 'nama,nama2', 'kode,kode2', 'mixing bahan,mixing bahan2', 'mixing kode, mixing kode2', 'mixing berat, mixing berat2', 'bl1,bl2,bl3', 'blk1,blk2,blk3', 'blb1,blb2,blb3', 'blkkk1,blkkk1,blkkk1', 'blkkk1,blkkk1,blkkk1', 'w1,w2,w3', 'v1,v2,v3,v4,v5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 's1,s2,s3,s4,s5', 'ada', '2024-11-09 05:22:10', '2024-11-10 12:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `pem_masak_rice_cooker`
--

CREATE TABLE `pem_masak_rice_cooker` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_beras` varchar(255) DEFAULT NULL,
  `berat` varchar(255) DEFAULT NULL,
  `kode_prod` varchar(255) DEFAULT NULL,
  `basket_no` varchar(255) DEFAULT NULL,
  `gas` varchar(255) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `suhu_produk` float DEFAULT NULL,
  `suhu_produk_1menit` float DEFAULT NULL,
  `suhu_aftervakum` float DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesi` time DEFAULT NULL,
  `kematangan` varchar(255) DEFAULT NULL,
  `rasa` varchar(255) DEFAULT NULL,
  `aroma` varchar(255) DEFAULT NULL,
  `tekstur` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pem_masak_rice_cooker`
--

INSERT INTO `pem_masak_rice_cooker` (`id`, `uuid`, `date`, `shift`, `nama_produk`, `kode_beras`, `berat`, `kode_prod`, `basket_no`, `gas`, `waktu`, `suhu_produk`, `suhu_produk_1menit`, `suhu_aftervakum`, `jam_mulai`, `jam_selesi`, `kematangan`, `rasa`, `aroma`, `tekstur`, `warna`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, 'a03da2a6-9f5c-4ec4-b51f-62eb3eea7270', '2024-11-07', '1', '1', '1', '1', '1', '1', '1', '23:29:00', 1, 1, 1, '23:28:00', '12:28:00', '1', '1', '', '1', 'warna', '1', '1', '2024-11-07 16:30:43', '2024-11-08 01:18:49'),
(2, 'ede4e260-372c-40bb-8033-2eef2c58c648', '2024-11-07', '2', '2', '2', '2', '2', '2', '2', '12:31:00', 2, 2, 2, '14:30:00', '15:30:00', '2', '2', '', '2', '2', '2', '2', '2024-11-07 16:31:06', '2024-11-07 16:31:06'),
(3, '54400218-53fd-4d81-991d-1f789f782c56', '2024-11-08', '2', 'nama1', 'kode1', 'berat1', 'kode1', 'basket1', 'gas1', '08:19:00', 11, 11, 11, '09:21:00', '10:22:00', 'matang', 'rasa', '2', 'tekstur', 'warna', 'ket', 'cat', '2024-11-08 01:20:32', '2024-11-08 01:50:40'),
(4, 'a567c8d1-d5d3-46ae-8d71-1fcce4d3c0c2', '2024-11-08', '3', 'ada', 'ada', 'ada', 'ada', 'ad', 'ad', '10:52:00', 22, 22, 22, '09:49:00', '09:50:00', 'ada', 'da', 'ad', '22', 'ada', 'da', 'da', '2024-11-08 01:49:35', '2024-11-08 01:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `pem_masak_steamer`
--

CREATE TABLE `pem_masak_steamer` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `t_raw` varchar(255) DEFAULT NULL,
  `jumlah_tray` varchar(255) DEFAULT NULL,
  `t_ruang` varchar(255) DEFAULT NULL,
  `t_produk` varchar(255) DEFAULT NULL,
  `t_produk1menit` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jam_mulai` varchar(255) DEFAULT NULL,
  `jam_selesai` varchar(255) DEFAULT NULL,
  `kematangan` varchar(255) DEFAULT NULL,
  `rasa` varchar(255) DEFAULT NULL,
  `aroma` varchar(255) DEFAULT NULL,
  `tekstur` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `qc` varchar(255) DEFAULT NULL,
  `produksi` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pem_masak_steamer`
--

INSERT INTO `pem_masak_steamer` (`id`, `uuid`, `date`, `shift`, `nama_produk`, `kode_produksi`, `t_raw`, `jumlah_tray`, `t_ruang`, `t_produk`, `t_produk1menit`, `waktu`, `keterangan`, `jam_mulai`, `jam_selesai`, `kematangan`, `rasa`, `aroma`, `tekstur`, `warna`, `qc`, `produksi`, `ket`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '81a1caa5-5dad-40e3-9d6a-ce0aae40009c', '2024-04-24', '1', 'ASDAS', 'fsdf', '11', '12312', '12', '2', '12', '21', 'vsfdvdf', '14:56', '16:56', 'OK', 'OK', 'OK', 'OK', 'OK', 'Ade Stefani Khaeria', 'Nama A', NULL, 'ASFSDF', '2024-04-24 07:00:01', '2024-04-24 07:00:01'),
(2, 'c3503b67-979e-40cd-8183-b836bffca8f2', '2024-04-24', '2', 'ASDAS', 'fsdf', '11', '12312', '12', '2', '12', '21', 'vsfdvdf', '14:29', '17:29', 'OK', 'OK', 'OK', 'OK', 'OK', 'Agung Martono', 'Nama B', NULL, 'ASFSDF', '2024-04-24 07:29:42', '2024-04-24 07:29:42'),
(3, '2bc8ceaf-d675-455f-8728-a30b09b42cdc', '2024-04-24', '1', 'ASDAS', 'fsdf', '11', '12312', '12', '2', '12', '21', 'vsfdvdf', '16:38', '15:38', NULL, 'OK', 'OK', 'OK', 'OK', 'Ade Stefani Khaeria', 'Nama A', NULL, 'ASFSDF', '2024-04-24 07:40:36', '2024-04-24 07:40:36'),
(4, '89d2ab31-403c-426c-bb08-d08b57c5c9b1', '2024-04-24', '1', 'ASDAS', 'fsdf', '11', '12312', '12', '2', '12', '21', 'vsfdvdf', '14:43', '18:43', NULL, 'OK', 'OK', 'OK', 'OK', 'Agung Martono', 'Nama A', NULL, 'ASFSDF', '2024-04-24 07:43:52', '2024-04-24 07:43:52'),
(5, '252e70c7-a0f2-4133-83c5-8a260f51eb3c', '2024-04-24', '2', 'ASDAS', 'fsdf', '11', '12312', '12', '2', '12', '21', 'vsfdvdf', '14:46', '17:47', 'OK', 'OK', 'OK', 'OK', 'OK', 'Agung Martono', 'Nama A', NULL, 'ASFSDF', '2024-04-24 07:47:15', '2024-04-24 07:47:15'),
(6, '505736ad-e89f-4615-bee1-72bff9288195', '2024-04-24', '3', 'ASDAS', 'fsdf', '11', '12312', '12', '2', '12', '21', 'vsfdvdf', '15:49', '17:49', 'TIDAK', 'OK', 'OK', 'OK', 'OK', 'Agung Martono', 'Nama B', NULL, 'ASFSDF', '2024-04-24 07:49:24', '2024-04-24 07:49:24'),
(7, '14353dff-70b8-4677-9161-2e34e689084b', '2024-04-24', '1', 'ASDAS', 'fsdf', '11', '12312', '12', '2', '12', '21', 'vsfdvdf', '15:03', '17:03', 'TIDAK', 'OK', 'OK', 'TIDAK', 'TIDAK', NULL, 'Nama A', NULL, 'fasdfs', '2024-04-24 08:06:01', '2024-04-24 08:06:01'),
(8, 'de0ac1fb-cf0f-4777-96a0-eb2284f75c75', '2024-09-04', '1', '111', '111', '11', '11', '11', '11', '11', '11', '11', '08:45', '08:45', 'OK', 'OK', 'OK', 'OK', 'OK', NULL, 'Nama A', NULL, '111', '2024-09-04 01:45:34', '2024-09-04 01:45:34'),
(9, '8cad90b4-804b-4aa9-a061-81f81a785146', '2024-10-24', '2', 'da', 'da', 'da', 'da', 'da', 'da', 'da', 'da', 'da', '08:56', '09:57', 'OK', 'OK', 'OK', 'OK', 'OK', NULL, NULL, NULL, 'da', '2024-10-23 01:57:35', '2024-10-23 01:57:35'),
(10, 'd7c36ec6-7a87-4f1a-bbf6-ff200326aff9', '2024-11-18', '1', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', '22:30', '12:30', 'OK', 'TIDAK', 'OK', 'TIDAK', 'OK', NULL, NULL, NULL, 'ada', '2024-11-18 15:30:33', '2024-11-18 15:30:33'),
(11, '5746875e-5b73-48fb-903c-85177bf9ac89', '2024-11-18', '2', 'ara', 'ara', 'ara', 'ara', 'ara', 'ara', 'ara', 'ara', 'ara', '22:30', '23:31', 'OK', 'TIDAK', 'OK', 'TIDAK', 'OK', NULL, NULL, NULL, 'ara', '2024-11-18 15:31:09', '2024-11-18 15:31:09'),
(12, '29621626-4131-4ae6-9348-1acbdb222e19', '2024-11-20', '1', 'ada', '123', '9', '9', '9', '9', '9', '9', 'ada', '09:39', '12:42', 'OK', 'TIDAK', 'TIDAK', 'TIDAK', 'OK', NULL, NULL, NULL, 'ada1', '2024-11-20 02:40:02', '2024-11-20 02:40:02'),
(13, '7a7528b8-defa-4f3e-9500-58a0ccdb02d4', '2024-11-20', '3', 'idi', '123', '5', '5', '5', '5', '5', '5', 'idiw', '10:41', '15:46', 'OK', 'TIDAK', 'OK', 'OK', 'OK', NULL, NULL, NULL, 'idiw', '2024-11-20 02:40:34', '2024-11-20 02:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `pem_metal_detector`
--

CREATE TABLE `pem_metal_detector` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `no_Produksi` varchar(255) DEFAULT NULL,
  `fe_1` varchar(255) DEFAULT NULL,
  `fe_2` varchar(255) NOT NULL,
  `non_fe_1` varchar(255) DEFAULT NULL,
  `non_fe_2` varchar(255) NOT NULL,
  `sus_1` varchar(255) DEFAULT NULL,
  `sus_2` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tindakan_koreksi` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pem_metal_detector`
--

INSERT INTO `pem_metal_detector` (`id`, `uuid`, `date`, `shift`, `pukul`, `kode_produksi`, `no_Produksi`, `fe_1`, `fe_2`, `non_fe_1`, `non_fe_2`, `sus_1`, `sus_2`, `keterangan`, `tindakan_koreksi`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '3959e8fa-6dd9-4d7e-8d1e-7406e24d1599', '2024-11-05', '1', '08:01:00', 'idi', 'idi', 'idi', 'idi', 'idi', 'idi', 'idi', 'idi', 'idi', 'idi', 'idi', '2024-11-05 12:32:23', '2024-11-05 12:39:15'),
(2, '00bed323-68d0-49b8-8d3b-b98d43c20ca6', '2024-11-05', '2', '15:00:00', 'fefe', 'fefe', 'fefe', 'fefe', 'fefe', 'fefe', 'fefe', 'fefe', 'fefe', 'fefe', 'fefe', '2024-11-05 12:39:58', '2024-11-05 12:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `pem_sanitasi`
--

CREATE TABLE `pem_sanitasi` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `pukul` varchar(255) DEFAULT NULL,
  `foot_basin` varchar(255) DEFAULT NULL,
  `hand_basin` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tindakan_koreksi` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pem_sanitasi`
--

INSERT INTO `pem_sanitasi` (`id`, `uuid`, `date`, `shift`, `pukul`, `foot_basin`, `hand_basin`, `keterangan`, `tindakan_koreksi`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '28f23b51-45f9-4317-aad4-e3a56f539b80', '2024-05-22', '1', '15:44:00', 'dsfasa', 'fsdf', 'sfsd', 'fsd', 'sdf', '2024-05-22 08:44:24', '2024-05-22 08:44:14'),
(2, 'f58ff580-589a-4565-a2e7-efaef71fd7d6', '2024-05-29', '1', '08:00:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:09:52', '2024-05-29 02:09:52'),
(3, '295b2096-ddff-4cea-bb58-175bda605d33', '2024-05-29', '1', '09:10:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:10:38', '2024-05-29 02:10:38'),
(4, '92548169-ce27-41e8-bc09-10dfd87ab31f', '2024-05-29', '1', '10:10:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:10:50', '2024-05-29 02:10:50'),
(5, '44aa65d6-d426-4b53-b175-3868a1363b28', '2024-05-29', '1', '11:10:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:11:02', '2024-05-29 02:11:02'),
(6, '13a16908-d63a-4dd0-953a-a2e5b8f7b988', '2024-05-29', '1', '12:11:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:11:16', '2024-05-29 02:11:16'),
(7, 'a7a1c6b3-d088-4875-a35b-cc5ec51de243', '2024-05-29', '1', '13:11:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:11:33', '2024-05-29 02:11:33'),
(8, '7b426fac-2097-4e36-ade4-6527095887ec', '2024-05-29', '1', '14:11:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:11:46', '2024-05-29 02:11:46'),
(9, '77a44552-f68e-4786-8d87-d6b41dac9995', '2024-05-29', '1', '15:11:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:12:00', '2024-05-29 02:12:00'),
(10, '9d79c7d4-bb49-4c4b-8281-c3c83f59e134', '2024-05-29', '1', '16:12:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:12:14', '2024-05-29 02:12:14'),
(11, '2a773bf6-c576-4ce3-aecb-1901dd5272ca', '2024-05-29', '2', '14:00', 'dsf', 'fsdf', 'ya', 'SDAD', '-', '2024-05-29 02:41:40', '2024-05-29 02:41:40'),
(13, '7bf183a3-2ca8-4473-8f28-c825cfa65ef1', '2024-11-18', '1', '21:59', 'ada', 'ada', 'ada', 'ada', 'ada', '2024-11-18 14:59:17', '2024-11-18 14:59:17'),
(14, '5927f562-c6ed-4a7d-a95a-2be7035aec43', '2024-11-18', '3', '21:59', 'uhuuy', 'uhuuy', 'uhuuy', 'uhuuy', 'uhuuy', '2024-11-18 14:59:29', '2024-11-18 14:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `pem_suhuiqf`
--

CREATE TABLE `pem_suhuiqf` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `iqf_no` varchar(255) DEFAULT NULL,
  `pukul` varchar(255) DEFAULT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `batch_no` varchar(255) DEFAULT NULL,
  `std_ct` float DEFAULT NULL,
  `suhu_pusat` varchar(255) DEFAULT NULL,
  `problem` varchar(255) DEFAULT NULL,
  `tindakan_koreksi` varchar(255) DEFAULT NULL,
  `qc` varchar(255) DEFAULT NULL,
  `produksi` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pem_thawing`
--

CREATE TABLE `pem_thawing` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `kondisi_ruangan` text DEFAULT NULL,
  `jenis_produk` text DEFAULT NULL,
  `jumlah` text DEFAULT NULL,
  `kode_produksi` text DEFAULT NULL,
  `suhu_ruangan` text DEFAULT NULL,
  `mulai_thawing_pukul` text DEFAULT NULL,
  `selesai_thawing_pukul` text DEFAULT NULL,
  `suhu_produk` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pem_thawing`
--

INSERT INTO `pem_thawing` (`id`, `uuid`, `date`, `kondisi_ruangan`, `jenis_produk`, `jumlah`, `kode_produksi`, `suhu_ruangan`, `mulai_thawing_pukul`, `selesai_thawing_pukul`, `suhu_produk`, `catatan`, `created_at`, `modified_at`) VALUES
(2, '60305efc-3799-4565-b92e-b6bd38a7f96b', '2024-10-03', '2222', 'adaa', '111', 'adad', 'adadd', '16:00', '17:02', 'daad', 'aadad', '2024-10-03 09:06:42', '2024-10-03 09:01:55'),
(3, '6373deeb-271e-4c41-b17a-bf8dc86eea24', '2024-10-21', 'kondisi ruangan', 'jenis produk', '123', 'kode produksi', 'suhu ruangan', '13:10', '14:11', 'suhu produk', 'catatan', '2024-10-21 06:11:29', '2024-10-21 06:11:29'),
(4, '31140d09-6f84-4e10-bdf2-e2159bd21de2', '2024-10-21', 'tete', 'tete', '222', '13321', '31', '09:43', '09:43', '123', 'gege', '2024-10-23 02:43:32', '2024-10-23 02:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `pem_tumbling`
--

CREATE TABLE `pem_tumbling` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` text DEFAULT NULL,
  `nama_produk` text DEFAULT NULL,
  `batch_no` text DEFAULT NULL,
  `identifikasi_daging` text DEFAULT NULL,
  `asal` text DEFAULT NULL,
  `kode_item_1` text DEFAULT NULL,
  `kode_item_2` text DEFAULT NULL,
  `kode_item_3` text DEFAULT NULL,
  `kode_item_4` text DEFAULT NULL,
  `berat_item_1` text DEFAULT NULL,
  `berat_item_2` text DEFAULT NULL,
  `berat_item_3` text DEFAULT NULL,
  `berat_item_4` text DEFAULT NULL,
  `suhu_daging_item_1` text DEFAULT NULL,
  `suhu_daging_item_2` text DEFAULT NULL,
  `suhu_daging_item_3` text DEFAULT NULL,
  `suhu_daging_item_4` text DEFAULT NULL,
  `rata_rata_item_1` text DEFAULT NULL,
  `rata_rata_item_2` text DEFAULT NULL,
  `rata_rata_item_3` text DEFAULT NULL,
  `rata_rata_item_4` text DEFAULT NULL,
  `kondisi_daging` text DEFAULT NULL,
  `marinade_bahan_utama_1` text DEFAULT NULL,
  `marinade_bahan_utama_2` text DEFAULT NULL,
  `marinade_bahan_utama_3` text DEFAULT NULL,
  `marinade_bahan_utama_4` text DEFAULT NULL,
  `marinade_kode_1` text DEFAULT NULL,
  `marinade_kode_2` text DEFAULT NULL,
  `marinade_kode_3` text DEFAULT NULL,
  `marinade_kode_4` text DEFAULT NULL,
  `marinade_berat_1` text DEFAULT NULL,
  `marinade_berat_2` text DEFAULT NULL,
  `marinade_berat_3` text DEFAULT NULL,
  `marinade_berat_4` text DEFAULT NULL,
  `marinade_kode_next_1` text DEFAULT NULL,
  `marinade_kode_next_2` text DEFAULT NULL,
  `marinade_kode_next_3` text DEFAULT NULL,
  `marinade_kode_next_4` text DEFAULT NULL,
  `marinade_berat_next_1` text DEFAULT NULL,
  `marinade_berat_next_2` text DEFAULT NULL,
  `marinade_berat_next_3` text DEFAULT NULL,
  `marinade_berat_next_4` text DEFAULT NULL,
  `bahan_lain` text DEFAULT NULL,
  `bahan_lain_kode_item_1` text DEFAULT NULL,
  `bahan_lain_berat_item_1` text DEFAULT NULL,
  `bahan_lain_sensori_item_1` text DEFAULT NULL,
  `bahan_lain_kode_item_2` text DEFAULT NULL,
  `bahan_lain_berat_item_2` text DEFAULT NULL,
  `bahan_lain_sensori_item_2` text DEFAULT NULL,
  `bahan_lain_kode_item_3` text DEFAULT NULL,
  `bahan_lain_berat_item_3` text DEFAULT NULL,
  `bahan_lain_sensori_item_3` text DEFAULT NULL,
  `bahan_lain_kode_item_4` text DEFAULT NULL,
  `bahan_lain_berat_item_4` text DEFAULT NULL,
  `bahan_lain_sensori_item_4` text DEFAULT NULL,
  `air` text DEFAULT NULL,
  `suhu_air` text DEFAULT NULL,
  `suhu_marinade` text DEFAULT NULL,
  `lama_pengadukan` text DEFAULT NULL,
  `brix_salinity` text DEFAULT NULL,
  `drum_on` text DEFAULT NULL,
  `drum_off` text DEFAULT NULL,
  `drum_speed` text DEFAULT NULL,
  `vacuum_time` text DEFAULT NULL,
  `total_time` text DEFAULT NULL,
  `mulai_item_1` text DEFAULT NULL,
  `mulai_item_2` text DEFAULT NULL,
  `mulai_item_3` text DEFAULT NULL,
  `mulai_item_4` text DEFAULT NULL,
  `selesai_item_1` text DEFAULT NULL,
  `selesai_item_2` text DEFAULT NULL,
  `selesai_item_3` text DEFAULT NULL,
  `selesai_item_4` text DEFAULT NULL,
  `tumbling_suhu_daging_item_1` text DEFAULT NULL,
  `tumbling_suhu_daging_item_2` text DEFAULT NULL,
  `tumbling_suhu_daging_item_3` text DEFAULT NULL,
  `tumbling_suhu_daging_item_4` text DEFAULT NULL,
  `tumbling_rata_rata` text DEFAULT NULL,
  `kondisi` text DEFAULT NULL,
  `catatan_bawah` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pem_tumbling`
--

INSERT INTO `pem_tumbling` (`id`, `uuid`, `date`, `shift`, `nama_produk`, `batch_no`, `identifikasi_daging`, `asal`, `kode_item_1`, `kode_item_2`, `kode_item_3`, `kode_item_4`, `berat_item_1`, `berat_item_2`, `berat_item_3`, `berat_item_4`, `suhu_daging_item_1`, `suhu_daging_item_2`, `suhu_daging_item_3`, `suhu_daging_item_4`, `rata_rata_item_1`, `rata_rata_item_2`, `rata_rata_item_3`, `rata_rata_item_4`, `kondisi_daging`, `marinade_bahan_utama_1`, `marinade_bahan_utama_2`, `marinade_bahan_utama_3`, `marinade_bahan_utama_4`, `marinade_kode_1`, `marinade_kode_2`, `marinade_kode_3`, `marinade_kode_4`, `marinade_berat_1`, `marinade_berat_2`, `marinade_berat_3`, `marinade_berat_4`, `marinade_kode_next_1`, `marinade_kode_next_2`, `marinade_kode_next_3`, `marinade_kode_next_4`, `marinade_berat_next_1`, `marinade_berat_next_2`, `marinade_berat_next_3`, `marinade_berat_next_4`, `bahan_lain`, `bahan_lain_kode_item_1`, `bahan_lain_berat_item_1`, `bahan_lain_sensori_item_1`, `bahan_lain_kode_item_2`, `bahan_lain_berat_item_2`, `bahan_lain_sensori_item_2`, `bahan_lain_kode_item_3`, `bahan_lain_berat_item_3`, `bahan_lain_sensori_item_3`, `bahan_lain_kode_item_4`, `bahan_lain_berat_item_4`, `bahan_lain_sensori_item_4`, `air`, `suhu_air`, `suhu_marinade`, `lama_pengadukan`, `brix_salinity`, `drum_on`, `drum_off`, `drum_speed`, `vacuum_time`, `total_time`, `mulai_item_1`, `mulai_item_2`, `mulai_item_3`, `mulai_item_4`, `selesai_item_1`, `selesai_item_2`, `selesai_item_3`, `selesai_item_4`, `tumbling_suhu_daging_item_1`, `tumbling_suhu_daging_item_2`, `tumbling_suhu_daging_item_3`, `tumbling_suhu_daging_item_4`, `tumbling_rata_rata`, `kondisi`, `catatan_bawah`, `catatan`, `created_at`, `modified_at`) VALUES
(15, '2b18a437-3679-4427-bb44-37f8bac51e1a', '2024-11-19', '1', 'ada', '1,2,3,4', '1,2,3,4', '1,2,3,4', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', 's1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12', 's1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12', 's1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12', 's1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3,4', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4,5,6', '1,2,3,4', '1,2,3,4', '1,2,3,4', '1,2,3,4', '1,2,3,4', '1,2,3,4', '1,2,3,4', '1,2,3,4', '1,2,3,4', '1,2,3,4', '10.20,10.20', '11.11,11.11', '22.22,22.22', '33.33,33.33', '10.20,10.20', '99.99,99.99', '99.99,99.99', '99.99,99.99', '1,2,3,4,5,6,7,8,9,10,11,12', '1,2,3,4,5,6,7,8,9,10,11,12', '1,2,3,4,5,6,7,8,9,10,11,12', '1,2,3,4,5,6,7,8,9,10,11,12', '1,2,3,4', '1,2,3,4', '1,2,3,4', 'hehuhuehueheuhe,hueuheue', '2024-11-19 02:34:26', '2024-11-19 07:11:54'),
(16, '1df8eaf6-5848-4b9a-98ba-537113188cae', '2024-11-18', '1', 'tdk', 'tdk,ada,yoyo, lolo', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', 'tdk', '2024-11-19 02:39:47', '2024-11-19 07:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `pem_xray`
--

CREATE TABLE `pem_xray` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `no_program` varchar(255) DEFAULT NULL,
  `glass_ball_1` varchar(255) DEFAULT NULL,
  `glass_ball_2` varchar(255) NOT NULL,
  `ceramic_1` varchar(255) DEFAULT NULL,
  `ceramic_2` varchar(255) NOT NULL,
  `sus_wire_1` varchar(255) DEFAULT NULL,
  `sus_wire_2` varchar(255) NOT NULL,
  `sus_ball_1` varchar(255) DEFAULT NULL,
  `sus_ball_2` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pem_xray`
--

INSERT INTO `pem_xray` (`id`, `uuid`, `date`, `shift`, `pukul`, `kode_produksi`, `no_program`, `glass_ball_1`, `glass_ball_2`, `ceramic_1`, `ceramic_2`, `sus_wire_1`, `sus_wire_2`, `sus_ball_1`, `sus_ball_2`, `keterangan`, `tindakan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '97f71443-e6bd-4d72-b8b9-ac144dc993b1', '2024-11-05', '1', '07:00:00', 'ADA', 'ADA', 'ADA', 'ADA', 'ADA', 'ADA', 'ADA', 'ADA', 'ADA', 'ADA', 'ADA', 'ADA', 'ADA', '2024-11-05 13:42:08', '2024-11-05 13:42:08'),
(2, 'f66af67c-71ca-4eda-b8c9-ac03511673d6', '2024-11-05', '2', '15:00:00', 'FUFU', 'FEFFUFUE', 'FEFFUFUE', 'FEFEFUFU', 'FEFEFUFU', 'FEFEFUFU', 'FEFEFUFU', 'FEFEFUFU', 'FEFEFUFU', 'FEFEFUFU', 'FEFEFUFU', 'FEFEFUFU', 'FEFEFUFU', '2024-11-05 13:43:35', '2024-11-05 13:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `peneraan_termo`
--

CREATE TABLE `peneraan_termo` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `kode_termo` varchar(255) NOT NULL,
  `pukul` time NOT NULL,
  `hasil_tera` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peneraan_termo`
--

INSERT INTO `peneraan_termo` (`id`, `uuid`, `date`, `shift`, `kode_termo`, `pukul`, `hasil_tera`, `tindakan`, `catatan`, `created_at`, `modified_at`) VALUES
(20, 'c54be0af-9944-44bb-a825-20ef9152dcbf', '2024-10-22', '1', 'kode', '08:47:00', 'tera1', 'tindakan1', 'catatan1', '2024-10-22 01:47:47', '2024-10-22 01:47:47'),
(21, 'de1386ea-c267-4ee9-93d7-418ebcba1ad4', '2024-10-22', '2', 'kode2', '08:47:00', 'tera2', 'tindakan2', 'catatan2', '2024-10-22 01:48:11', '2024-10-22 01:48:11'),
(22, '9c515992-2dfb-4c41-8472-1dd4f6869824', '2024-10-22', '2', '1345', '09:10:00', '564', 'hajar', 'catatan123', '2024-10-23 02:11:13', '2024-10-23 02:11:13'),
(23, '4b54da23-5d85-47bb-b09f-083cee6e8948', '2024-11-07', '1', 'sdfs', '13:35:00', 'sfsdf', 'dsfsf', '', '2024-11-07 06:35:53', '2024-11-07 06:35:53'),
(24, '73cd6b9e-d2b0-4450-bfab-dac00d917823', '2024-11-18', '1', 'ada', '22:06:00', 'ada', 'ada', 'ada', '2024-11-18 15:06:54', '2024-11-18 15:06:54'),
(25, '80c21110-ff71-4653-abf1-cb827837c203', '2024-11-18', '2', 'tdk', '22:06:00', 'tdk', 'tdk', 'tdk', '2024-11-18 15:07:05', '2024-11-18 15:07:05'),
(26, '2ec0ba2d-5393-4467-8748-8b7dd3021600', '2024-11-20', '1', '1245', '08:22:00', '20', 'ufufuefue', 'oke', '2024-11-20 01:22:31', '2024-11-20 01:22:31'),
(27, '123822d5-4259-4d1b-9c89-2fa80ea6b305', '2024-11-20', '2', '6548', '14:28:00', '60', 'juan', 'oce', '2024-11-20 01:22:53', '2024-11-20 01:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `peneraan_timbangan`
--

CREATE TABLE `peneraan_timbangan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `kode_timbangan` varchar(255) DEFAULT NULL,
  `standar` varchar(255) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `hasil_tera` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peneraan_timbangan`
--

INSERT INTO `peneraan_timbangan` (`id`, `uuid`, `date`, `shift`, `kode_timbangan`, `standar`, `pukul`, `hasil_tera`, `tindakan`, `catatan`, `created_at`, `modified_at`) VALUES
(2, '11085789-be3b-4b33-bed7-dca8026aba7c', '2024-10-21', '2', '12345', NULL, '08:46:00', 'indah', 'indah', 'indah', '2024-10-21 01:47:06', '2024-10-21 01:47:06'),
(3, '3594e417-91de-4478-9560-c06f3fd28744', '2024-10-21', '1', '213546', NULL, '13:13:00', '5584', 'hajar', 'ulala', '2024-10-23 02:10:10', '2024-10-23 02:09:48'),
(4, '9f3ac599-9a87-4e29-93b0-3ef3baa79905', '2024-10-21', '3', 'dwasd', NULL, '09:24:00', 'ddwasd', 'dwasd', 'asdwad', '2024-10-23 02:24:54', '2024-10-23 02:24:54'),
(5, '0d53496e-9c09-4344-9412-8803afc16336', '2024-10-21', '3', 'rere', NULL, '09:30:00', 'rerer', 'rere', 'rere', '2024-10-23 02:33:47', '2024-10-23 02:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `proses_thawing`
--

CREATE TABLE `proses_thawing` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `kondisi_ruangan` varchar(255) DEFAULT NULL,
  `jenis_produk` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `sebelum_kondisioktdk` varchar(255) DEFAULT NULL,
  `blmketerangan` varchar(255) DEFAULT NULL,
  `suhu_ruangan` float DEFAULT NULL,
  `mulai_thawing` time DEFAULT NULL,
  `selesai_thawing` time DEFAULT NULL,
  `setelah_kondisioktdk` varchar(255) DEFAULT NULL,
  `stketerangan` varchar(255) DEFAULT NULL,
  `suhu_produk` float DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retained_sample_report`
--

CREATE TABLE `retained_sample_report` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `plant` varchar(255) DEFAULT NULL,
  `sample_type` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `sample_storage_frozen` varchar(255) DEFAULT NULL,
  `sample_storage_chilled` varchar(25) DEFAULT NULL,
  `sample_storage_other` varchar(25) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prod_date` varchar(255) DEFAULT NULL,
  `best_before` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `retained_sample_report`
--

INSERT INTO `retained_sample_report` (`id`, `uuid`, `plant`, `sample_type`, `date`, `sample_storage_frozen`, `sample_storage_chilled`, `sample_storage_other`, `description`, `prod_date`, `best_before`, `quantity`, `remarks`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '6d2bb21a-a2a8-43c3-a1e6-a61e14ce645b', 'cikande', 'ssss', '2024-11-08', 'v', 'v', 'v', 'sss', '2024-11-21', '2024-11-13', 's', 's', NULL, 's', '2024-11-08 14:43:50', '2024-11-08 14:43:50'),
(2, 'f82a990c-5aa0-4f5c-873c-6341fe8d94b5', 'cikande', 'ffff', '2024-11-08', 'v', 'v', 'v', 'fff', '2024-11-07', '2024-11-22', 'ff', 'ff', NULL, 'ff', '2024-11-08 14:44:10', '2024-11-08 14:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `sample_bulanan_rnd`
--

CREATE TABLE `sample_bulanan_rnd` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `plant` text DEFAULT NULL,
  `sample_bulan` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `sample_storage_frozen` varchar(255) DEFAULT NULL,
  `sample_storage_chilled` varchar(25) DEFAULT NULL,
  `sample_storage_other` varchar(25) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `best_before` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample_bulanan_rnd`
--

INSERT INTO `sample_bulanan_rnd` (`id`, `uuid`, `plant`, `sample_bulan`, `date`, `sample_storage_frozen`, `sample_storage_chilled`, `sample_storage_other`, `nama_produk`, `kode_produksi`, `best_before`, `quantity`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '7e475865-1a7b-4510-83dd-df1dc833a4e8', 'Cikande', 'ada', '2024-11-08', 'v', 'v', 'v', 'ad', 'ada', 'ada', 'ada', 'daa', 'da', '2024-11-08 09:12:17', '2024-11-08 09:20:25'),
(2, 'f2918111-c0a4-4ad3-88bf-b3995184381e', 'Cikande', 'rere', '2024-11-08', 'v', 'v', 'v', 're', 're', 're', 're', 'er', 're', '2024-11-08 09:12:31', '2024-11-08 09:20:18'),
(3, '4004fa33-03e3-454d-85eb-ce6ddd847132', 'Cikande', 'ada', '2024-11-08', 'v', 'v', 'v', 'ada', 'aa', 'ada', 'da', 'da', 'ad', '2024-11-08 09:19:05', '2024-11-08 09:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `sanitasi_ruangan`
--

CREATE TABLE `sanitasi_ruangan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `kondisi` text NOT NULL,
  `masalah` text NOT NULL,
  `tindakan_koreksi` text NOT NULL,
  `qc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanitasi_ruangan`
--

INSERT INTO `sanitasi_ruangan` (`id`, `uuid`, `date`, `area`, `lokasi`, `waktu`, `kondisi`, `masalah`, `tindakan_koreksi`, `qc`, `created_at`, `modified_at`) VALUES
(8, '3f8c10ac-4f30-449b-bb9e-22466ebac246', '2024-10-24', 'CHILLROOM RM', '', '14:59', '{\"Lantai\":\"Oke\",\"Dinding\":\"Tidak\",\"Kurtain\":\"Oke\",\"Pintu\":\"Tidak\",\"Langit-langit\":\"Oke\",\"AC\":\"Tidak\",\"RakPenampungProduk\":\"Oke\",\"LampudanCover\":\"Tidak\"}', '{\"Lantai\":\"iu\",\"Dinding\":\"iu\",\"Kurtain\":\"iu\",\"Pintu\":\"iu\",\"Langit-langit\":\"iu\",\"AC\":\"iu\",\"RakPenampungProduk\":\"iu\",\"LampudanCover\":\"iu\"}', '{\"Lantai\":\"iu\",\"Dinding\":\"iu\",\"Kurtain\":\"iu\",\"Pintu\":\"iu\",\"Langit-langit\":\"iu\",\"AC\":\"iu\",\"RakPenampungProduk\":\"iu\",\"LampudanCover\":\"iu\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-24 08:12:06', '2024-10-24 08:12:06'),
(9, '06e2f197-41da-47a5-90f9-9117c3a48072', '2024-10-24', 'COLD STORAGE 1 RM', '', '15:43', '{\"Lantai\":\"Oke\",\"Dinding\":\"Tidak\",\"Kurtain\":\"Oke\",\"Pintu\":\"Tidak\",\"Langit-langit\":\"Oke\",\"AC\":\"Tidak\",\"RakPenampungProduk\":\"Oke\",\"LampudanCover\":\"Tidak\"}', '{\"Lantai\":\"ki\",\"Dinding\":\"ki\",\"Kurtain\":\"ki\",\"Pintu\":\"ki\",\"Langit-langit\":\"ki\",\"AC\":\"ki\",\"RakPenampungProduk\":\"ki\",\"LampudanCover\":\"ki\"}', '{\"Lantai\":\"ki\",\"Dinding\":\"ki\",\"Kurtain\":\"ki\",\"Pintu\":\"ki\",\"Langit-langit\":\"ki\",\"AC\":\"ki\",\"RakPenampungProduk\":\"ki\",\"LampudanCover\":\"ki\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-24 08:43:35', '2024-10-24 08:43:35'),
(12, 'fcc2e2e8-f378-418f-a984-fa6d02ef52ce', '2024-10-24', 'IQF', '', '16:25', '{\"DindingLuar\":\"Oke\",\"DindingDalam\":\"Tidak\",\"RuangdalamIqf\":\"Oke\",\"ConveyorIQF\":\"Tidak\"}', '{\"DindingLuar\":\"qq\",\"DindingDalam\":\"qq\",\"RuangdalamIqf\":\"qq\",\"ConveyorIQF\":\"qq\"}', '{\"DindingLuar\":\"qq\",\"DindingDalam\":\"qq\",\"RuangdalamIqf\":\"qq\",\"ConveyorIQF\":\"qq\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-24 09:25:49', '2024-10-24 09:25:49'),
(13, '76cc1c72-91d3-43cd-8568-3c9a954d5343', '2024-10-24', 'DRY STORE', '', '16:26', '{\"Lantai\":\"Tidak\",\"Dinding\":\"Oke\",\"Kurtan\":\"Tidak\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Tidak\",\"AC\":\"Oke\",\"RakPenampungProduk\":\"Tidak\",\"TerdapatTagging\":\"Oke\",\"LampudanCover\":\"Tidak\"}', '{\"Lantai\":\"lol\",\"Dinding\":\"lol\",\"Kurtan\":\"lol\",\"Pintu\":\"lol\",\"Langit-langit\":\"lol\",\"AC\":\"lol\",\"RakPenampungProduk\":\"lol\",\"TerdapatTagging\":\"lol\",\"LampudanCover\":\"lol\"}', '{\"Lantai\":\"lol\",\"Dinding\":\"lol\",\"Kurtan\":\"lol\",\"Pintu\":\"lol\",\"Langit-langit\":\"lol\",\"AC\":\"lol\",\"RakPenampungProduk\":\"lol\",\"TerdapatTagging\":\"lol\",\"LampudanCover\":\"lol\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-24 09:26:37', '2024-10-24 09:26:37'),
(14, '4727ee77-c786-43fd-9e9e-ae8b27cb4277', '2024-10-24', 'TOPPING AREA', '', '16:30', '{\"Lantai\":\"Oke\",\"Dinding\":\"Tidak\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Tidak\",\"AC\":\"Oke\",\"SaluranAirBuangan\":\"Tidak\",\"LampudanCover\":\"Oke\"}', '{\"Lantai\":\"be\",\"Dinding\":\"be\",\"Pintu\":\"be\",\"Langit-langit\":\"be\",\"AC\":\"be\",\"SaluranAirBuangan\":\"be\",\"LampudanCover\":\"be\"}', '{\"Lantai\":\"be\",\"Dinding\":\"be\",\"Pintu\":\"be\",\"Langit-langit\":\"be\",\"AC\":\"be\",\"SaluranAirBuangan\":\"be\",\"LampudanCover\":\"be\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-24 09:30:42', '2024-10-24 09:30:42'),
(16, 'e952cec7-50e8-46c0-93e2-83818a4336d1', '2024-10-24', 'PREPARATION ROOM', '', '16:34', '{\"Lantai\":\"Oke\",\"Dinding\":\"Tidak\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Oke\",\"SaluranAirBuangan\":\"Tidak\",\"LampudanCover\":\"Oke\",\"VegetableWashingMachine\":\"Tidak\",\"Slicer\":\"Oke\",\"PeelingMachine\":\"Oke\",\"VacuumTumbler\":\"Tidak\"}', '{\"Lantai\":\"pp\",\"Dinding\":\"pp\",\"Pintu\":\"pp\",\"Langit-langit\":\"pp\",\"SaluranAirBuangan\":\"pp\",\"LampudanCover\":\"pp\",\"VegetableWashingMachine\":\"pp\",\"Slicer\":\"pp\",\"PeelingMachine\":\"pp\",\"VacuumTumbler\":\"pp\"}', '{\"Lantai\":\"pp\",\"Dinding\":\"pp\",\"Pintu\":\"pp\",\"Langit-langit\":\"pp\",\"SaluranAirBuangan\":\"pp\",\"LampudanCover\":\"pp\",\"VegetableWashingMachine\":\"pp\",\"Slicer\":\"pp\",\"PeelingMachine\":\"pp\",\"VacuumTumbler\":\"pp\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-24 09:36:36', '2024-10-24 09:36:36'),
(17, '80039071-0f69-4eef-add2-1ff7b646c8d8', '2024-10-24', 'COLD STORAGE 2 RM', '', '16:36', '{\"Lantai\":\"Oke\",\"Dinding\":\"Tidak\",\"Kurtain\":\"Oke\",\"Pintu\":\"Tidak\",\"Langit-langit\":\"Oke\",\"AC\":\"Tidak\",\"RakPenampungProduk\":\"Oke\",\"LampudanCover\":\"Tidak\"}', '{\"Lantai\":\"apacih\",\"Dinding\":\"apacih\",\"Kurtain\":\"apacih\",\"Pintu\":\"apacih\",\"Langit-langit\":\"apacih\",\"AC\":\"apacih\",\"RakPenampungProduk\":\"apacih\",\"LampudanCover\":\"apacih\"}', '{\"Lantai\":\"apacih\",\"Dinding\":\"apacih\",\"Kurtain\":\"apacih\",\"Pintu\":\"apacih\",\"Langit-langit\":\"apacih\",\"AC\":\"apacih\",\"RakPenampungProduk\":\"apacih\",\"LampudanCover\":\"apacih\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-24 09:37:16', '2024-10-24 09:37:16'),
(24, '6020562a-ef00-4b44-9832-9067607440da', '2024-10-24', 'SEASONING', '', '09:09', '{\"Lantai\":\"Tidak\",\"Dinding\":\"Oke\",\"Kurtain\":\"Oke\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Oke\",\"AC\":\"Oke\",\"RakPenampungProduk\":\"Oke\",\"LampudanCover\":\"Oke\",\"PemisahanAlergenDanNon\":\"Oke\",\"TerdapatTagging\":\"Oke\"}', '{\"Lantai\":\"lo\",\"Dinding\":\"lo\",\"Kurtain\":\"lo\",\"Pintu\":\"lo\",\"Langit-langit\":\"lo\",\"AC\":\"lo\",\"RakPenampungProduk\":\"lo\",\"LampudanCover\":\"lo\",\"PemisahanAlergenDanNon\":\"lo\",\"TerdapatTagging\":\"lo\"}', '{\"Lantai\":\"lo\",\"Dinding\":\"lo\",\"Kurtain\":\"lo\",\"Pintu\":\"lo\",\"Langit-langit\":\"lo\",\"AC\":\"lo\",\"RakPenampungProduk\":\"lo\",\"LampudanCover\":\"lo\",\"PemisahanAlergenDanNon\":\"lo\",\"TerdapatTagging\":\"lo\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-25 02:09:45', '2024-10-25 02:09:45'),
(31, '1fb48cff-6cca-49d5-95ab-53a31db2c858', '2024-10-24', 'FILLING-ROOM', '', '09:38', '{\"Lantai\":\"Oke\",\"Dinding\":\"Oke\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Oke\",\"AC\":\"Oke\",\"SaluranAirBuangan\":\"Oke\",\"LampudanCover\":\"Oke\",\"FillingMachine\":\"Oke\",\"VacummCoolingMachine\":\"Tidak\",\"Sealer1\":\"Tidak\",\"Sealer2\":\"Oke\",\"FillerManual1\":\"Oke\",\"FM2\":\"Oke\"}', '{\"Lantai\":\"opo\",\"Dinding\":\"opo\",\"Pintu\":\"opo\",\"Langit-langit\":\"opo\",\"AC\":\"opo\",\"SaluranAirBuangan\":\"opo\",\"LampudanCover\":\"opo\",\"FillingMachine\":\"opo\",\"VacummCoolingMachine\":\"opo\",\"Sealer1\":\"opo\",\"Sealer2\":\"opo\",\"FillerManual1\":\"opo\",\"FM2\":\"opo\"}', '{\"Lantai\":\"opo\",\"Dinding\":\"opo\",\"Pintu\":\"opo\",\"Langit-langit\":\"opo\",\"AC\":\"opo\",\"SaluranAirBuangan\":\"opo\",\"LampudanCover\":\"opo\",\"FillingMachine\":\"opo\",\"VacummCoolingMachine\":\"opo\",\"Sealer1\":\"opo\",\"Sealer2\":\"opo\",\"FillerManual1\":\"opo\",\"FM2\":\"opo\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-25 02:39:06', '2024-10-25 02:39:06'),
(33, '117bc699-92d0-4e2a-8c76-1b0efb50b0a0', '2024-10-24', 'COOKING', '', '09:51', '{\"Lantai\":\"Oke\",\"Dinding\":\"Oke\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Oke\",\"SaluranAirBuangan\":\"Oke\",\"LampudanCover\":\"Oke\",\"AlcoCookingMixer\":\"Oke\",\"TitingKettle\":\"Oke\",\"Exhaust\":\"Tidak\",\"StirFryer\":\"Tidak\",\"Steamer\":\"Oke\",\"BowlCutter\":\"Oke\"}', '{\"Lantai\":\"kuku\",\"Dinding\":\"kuku\",\"Pintu\":\"kuku\",\"Langit-langit\":\"kuku\",\"SaluranAirBuangan\":\"kuku\",\"LampudanCover\":\"kuku\",\"AlcoCookingMixer\":\"kuku\",\"TitingKettle\":\"kuku\",\"Exhaust\":\"kuku\",\"StirFryer\":\"kuku\",\"Steamer\":\"kuku\",\"BowlCutter\":\"kuku\"}', '{\"Lantai\":\"kuku\",\"Dinding\":\"kuku\",\"Pintu\":\"kuku\",\"Langit-langit\":\"kuku\",\"SaluranAirBuangan\":\"kuku\",\"LampudanCover\":\"kuku\",\"AlcoCookingMixer\":\"kuku\",\"TitingKettle\":\"kuku\",\"Exhaust\":\"kuku\",\"StirFryer\":\"kuku\",\"Steamer\":\"kuku\",\"BowlCutter\":\"kuku\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-25 02:51:49', '2024-10-25 02:51:49'),
(34, '09ec3554-1527-4c75-90cb-e719da603fe2', '2024-10-24', 'RICE COOKING & NOODLE BOILING ROOM', '', '09:56', '{\"Lantai\":\"Oke\",\"Dinding\":\"Oke\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Oke\",\"SaluranAirBuangan\":\"Oke\",\"LampudanCover\":\"Oke\",\"RiceWasher\":\"Oke\",\"RiceFillingMachine\":\"Tidak\",\"RiceCooker\":\"Tidak\",\"LineConveyor\":\"Tidak\",\"BWCS-Machine\":\"Oke\"}', '{\"Lantai\":\"hy\",\"Dinding\":\"hy\",\"Pintu\":\"hy\",\"Langit-langit\":\"hy\",\"SaluranAirBuangan\":\"hy\",\"LampudanCover\":\"hy\",\"RiceWasher\":\"hy\",\"RiceFillingMachine\":\"hy\",\"RiceCooker\":\"hy\",\"LineConveyor\":\"hy\",\"BWCS-Machine\":\"hy\"}', '{\"Lantai\":\"hy\",\"Dinding\":\"hy\",\"Pintu\":\"hy\",\"Langit-langit\":\"hy\",\"SaluranAirBuangan\":\"hy\",\"LampudanCover\":\"hy\",\"RiceWasher\":\"hy\",\"RiceFillingMachine\":\"hy\",\"RiceCooker\":\"hy\",\"LineConveyor\":\"hy\",\"BWCS-Machine\":\"hy\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-25 02:57:22', '2024-10-25 02:57:22'),
(35, 'ad4d2c18-ec59-407e-bb97-d55a8d6f0428', '2024-10-24', 'NOODLE MAKING ROOM', '', '10:00', '{\"Lantai\":\"Oke\",\"Dinding\":\"Tidak\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Tidak\",\"SaluranAirBuangan\":\"Oke\",\"LampudanCover\":\"Oke\",\"Vacuum-Mixer\":\"Oke\",\"Aging-Machine\":\"Tidak\",\"Roller-Machine\":\"Oke\",\"Cutting-Sitting\":\"Oke\"}', '{\"Lantai\":\"noodle\",\"Dinding\":\"noodle\",\"Pintu\":\"noodle\",\"Langit-langit\":\"noodle\",\"SaluranAirBuangan\":\"noodle\",\"LampudanCover\":\"noodle\",\"Vacuum-Mixer\":\"noodle\",\"Aging-Machine\":\"noodle\",\"Roller-Machine\":\"noodle\",\"Cutting-Sitting\":\"noodle\"}', '{\"Lantai\":\"noodle\",\"Dinding\":\"noodle\",\"Pintu\":\"noodle\",\"Langit-langit\":\"noodle\",\"SaluranAirBuangan\":\"noodle\",\"LampudanCover\":\"noodle\",\"Vacuum-Mixer\":\"noodle\",\"Aging-Machine\":\"noodle\",\"Roller-Machine\":\"noodle\",\"Cutting-Sitting\":\"noodle\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-25 03:01:36', '2024-10-25 03:01:36'),
(41, '2bd8653b-c52d-4643-974f-99833b7790ad', '2024-10-24', 'PACKING', '', '10:25', '{\"Lantai\":\"Oke\",\"Dinding\":\"Oke\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Oke\",\"AC\":\"Tidak\",\"SaluranAirBuangan\":\"Oke\",\"LampudanCover\":\"Oke\",\"PackingMachine\":\"Oke\",\"TraySealer\":\"Tidak\",\"Metal-Rejector\":\"Oke\",\"Xray-Rejector\":\"Oke\",\"Line-Conveyor\":\"Oke\",\"PrinterPlastik\":\"Tidak\"}', '{\"Lantai\":\"huhu\",\"Dinding\":\"huhu\",\"Pintu\":\"huhu\",\"Langit-langit\":\"huhu\",\"AC\":\"huhu\",\"SaluranAirBuangan\":\"huhu\",\"LampudanCover\":\"huhu\",\"PackingMachine\":\"huhu\",\"TraySealer\":\"huhu\",\"Metal-Rejector\":\"huhu\",\"Xray-Rejector\":\"huhu\",\"Line-Conveyor\":\"huhu\",\"PrinterPlastik\":\"huhu\"}', '{\"Lantai\":\"huhu\",\"Dinding\":\"huhu\",\"Pintu\":\"huhu\",\"Langit-langit\":\"huhu\",\"AC\":\"huhu\",\"SaluranAirBuangan\":\"huhu\",\"LampudanCover\":\"huhu\",\"PackingMachine\":\"huhu\",\"TraySealer\":\"huhu\",\"Metal-Rejector\":\"huhu\",\"Xray-Rejector\":\"huhu\",\"Line-Conveyor\":\"huhu\",\"PrinterPlastik\":\"huhu\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-25 03:26:23', '2024-10-25 03:26:23'),
(42, '68d5f698-13ee-4fa2-85d4-6e7b3755ef69', '2024-10-24', 'COLD STORAGE FG', '', '10:55', '{\"Lantai\":\"Oke\",\"Dinding\":\"Tidak\",\"Kurtain\":\"Oke\",\"Pintu\":\"Tidak\",\"Langit-langit\":\"Oke\",\"AC\":\"Oke\",\"RakPenampungProduk\":\"Tidak\",\"LampudanCover\":\"Oke\"}', '{\"Lantai\":\"kurtain\",\"Dinding\":\"kurtain\",\"Kurtain\":\"kurtain\",\"Pintu\":\"kurtain\",\"Langit-langit\":\"kurtain\",\"AC\":\"kurtain\",\"RakPenampungProduk\":\"kurtain\",\"LampudanCover\":\"kurtain\"}', '{\"Lantai\":\"kurtain\",\"Dinding\":\"kurtain\",\"Kurtain\":\"kurtain\",\"Pintu\":\"kurtain\",\"Langit-langit\":\"kurtain\",\"AC\":\"kurtain\",\"RakPenampungProduk\":\"kurtain\",\"LampudanCover\":\"kurtain\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-10-25 03:56:12', '2024-10-25 03:56:12'),
(43, '32784144-4488-4596-8e4a-dbe1279a08b4', '2024-11-18', 'CHILLROOM RM', '', '21:49', '{\"Lantai\":\"Oke\",\"Dinding\":\"Oke\",\"Kurtain\":\"Oke\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Oke\",\"AC\":\"Oke\",\"RakPenampungProduk\":\"Oke\",\"LampudanCover\":\"Oke\"}', '{\"Lantai\":\"ada\",\"Dinding\":\"ada\",\"Kurtain\":\"ada\",\"Pintu\":\"ada\",\"Langit-langit\":\"ada\",\"AC\":\"ada\",\"RakPenampungProduk\":\"ada\",\"LampudanCover\":\"ada\"}', '{\"Lantai\":\"tdk ada\",\"Dinding\":\"tdk ada\",\"Kurtain\":\"tdk ada\",\"Pintu\":\"tdk ada\",\"Langit-langit\":\"tdk ada\",\"AC\":\"tdk ada\",\"RakPenampungProduk\":\"tdk ada\",\"LampudanCover\":\"tdk ada\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-11-18 14:49:33', '2024-11-18 14:49:33'),
(44, 'a9ac72c7-bcb5-40c2-89bb-ac63869ad544', '2024-11-18', 'COLD STORAGE 2 RM', '', '21:52', '{\"Lantai\":\"Oke\",\"Dinding\":\"Oke\",\"Kurtain\":\"Oke\",\"Pintu\":\"Oke\",\"Langit-langit\":\"Oke\",\"AC\":\"Oke\",\"RakPenampungProduk\":\"Oke\",\"LampudanCover\":\"Oke\"}', '{\"Lantai\":\"ada\",\"Dinding\":\"ada\",\"Kurtain\":\"ada\",\"Pintu\":\"ada\",\"Langit-langit\":\"ada\",\"AC\":\"ada\",\"RakPenampungProduk\":\"ada\",\"LampudanCover\":\"ada\"}', '{\"Lantai\":\"ada\",\"Dinding\":\"ada\",\"Kurtain\":\"ada\",\"Pintu\":\"ada\",\"Langit-langit\":\"ada\",\"AC\":\"ada\",\"RakPenampungProduk\":\"ada\",\"LampudanCover\":\"ada\"}', 'd7199a99-646c-43d4-892b-12b2490b9fb6', '2024-11-18 14:52:27', '2024-11-18 14:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `sortasi_tdksesuai`
--

CREATE TABLE `sortasi_tdksesuai` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_bahan` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `jumlah_bahan_sebelum` varchar(255) DEFAULT NULL,
  `sesuai` varchar(255) DEFAULT NULL,
  `tidak_sesuai` varchar(255) DEFAULT NULL,
  `tindakan_koreksi` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sortasi_tdksesuai`
--

INSERT INTO `sortasi_tdksesuai` (`id`, `uuid`, `date`, `shift`, `nama_bahan`, `kode_produksi`, `jumlah_bahan_sebelum`, `sesuai`, `tidak_sesuai`, `tindakan_koreksi`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '917af602-39f0-45bf-8337-142a868c18bd', '2024-04-22', '1', 'wdqwed', 'das', '1', '1', '1', 'ds', '', '2024-04-22 04:21:05', '2024-04-22 03:50:41'),
(2, '5a0cb0fc-09c4-467b-8a11-e6ad65141543', '2024-10-21', '1', 'nama bahan', 'kode produksi', 'jumlah bahan', 'jumlah bahan setelah sesuai', 'jumlah bahan setelah tdk sesuai', 'tindakan koreksi ', 'catatan1', '2024-10-21 09:10:12', '2024-10-21 09:10:12'),
(3, 'de8f8df8-0a53-4ed4-b729-5e0aa74bfd6b', '2024-10-21', '2', 'nama bahan 2', 'kode produksi 2', 'jumlah bahan sebeluj sortasi', 'jumlah bahan setelah sesuai', 'jumlah bahan setelah tdk sesuai', 'tindakan koreksi', 'catatan 2', '2024-10-21 09:10:58', '2024-10-21 09:10:58'),
(4, '1d48bb51-eaf1-4b51-bb8e-d2f37243ae52', '2024-10-21', '2', 'dad', 'ada', '222', '333', '33', 'da', 'da', '2024-10-23 04:38:42', '2024-10-23 04:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `suhu_cold_storage`
--

CREATE TABLE `suhu_cold_storage` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `pukul` text DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_produk` text NOT NULL,
  `suhu_cs` varchar(255) DEFAULT NULL,
  `suhu_dics1` float DEFAULT NULL,
  `suhu_dics2` float DEFAULT NULL,
  `suhu_dics3` float DEFAULT NULL,
  `suhu_dics4` float DEFAULT NULL,
  `suhu_dics5` float DEFAULT NULL,
  `rata` float DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suhu_cold_storage`
--

INSERT INTO `suhu_cold_storage` (`id`, `uuid`, `date`, `pukul`, `shift`, `nama_produk`, `suhu_cs`, `suhu_dics1`, `suhu_dics2`, `suhu_dics3`, `suhu_dics4`, `suhu_dics5`, `rata`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(2, '85dad9e7-8967-4c76-8565-798537487d5a', '2024-11-08', '10:00', '1', 'a', '1', 1, 1, 1, 1, 1, 1, '1', '1', '2024-11-08 03:32:35', '2024-11-08 03:32:35'),
(3, 'd267df56-31a4-45b2-8708-4ab9526319f3', '2024-11-08', '16:00', '2', '2', '2', 2, 2, 2, 2, 2, 2, '2', '2', '2024-11-08 03:33:03', '2024-11-08 03:33:03'),
(4, 'db18abcd-c40e-4fbf-8df6-221a3da2f1aa', '2024-11-08', '24:00', '3', '3', '3', 3, 3, 3, 3, 3, 3, '3', '3', '2024-11-08 03:37:02', '2024-11-08 03:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `suhu_ruangan`
--

CREATE TABLE `suhu_ruangan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` int(11) NOT NULL,
  `pukul` varchar(255) NOT NULL,
  `chill_room` float NOT NULL,
  `cold_stor1` float NOT NULL,
  `cold_stor2` float NOT NULL,
  `anteroom` float NOT NULL,
  `sea_T` float NOT NULL,
  `sea_RH` float NOT NULL,
  `prep_room` float NOT NULL,
  `cooking_room` float NOT NULL,
  `filling_room` float NOT NULL,
  `rice_room` float NOT NULL,
  `noodle_room` float NOT NULL,
  `topping_area` float NOT NULL,
  `packing_karton` float NOT NULL,
  `dry_T` float NOT NULL,
  `dry_RH` float NOT NULL,
  `cold_fg` float NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `anteroom_fg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suhu_ruangan`
--

INSERT INTO `suhu_ruangan` (`id`, `uuid`, `date`, `shift`, `pukul`, `chill_room`, `cold_stor1`, `cold_stor2`, `anteroom`, `sea_T`, `sea_RH`, `prep_room`, `cooking_room`, `filling_room`, `rice_room`, `noodle_room`, `topping_area`, `packing_karton`, `dry_T`, `dry_RH`, `cold_fg`, `keterangan`, `catatan`, `created_at`, `modified_at`, `anteroom_fg`) VALUES
(44, '51821c1d-3ac2-4298-8876-8e7021306243', '2024-11-18', 1, '07:00', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '3', '3', '2024-11-18 14:42:42', '2024-11-18 14:42:42', '3'),
(45, '4fe2f3c8-cc24-4e1f-b641-b2be740c4cf0', '2024-11-18', 2, '15:00', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, '4', 'Ya sudah lah', '2024-11-18 14:43:11', '2024-11-18 14:43:11', '4'),
(46, 'ce11a542-f2b7-474f-b137-af8f0d08d8d8', '2024-11-20', 3, '23:00', 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, '7', 'Icikiwir', '2024-11-18 14:43:40', '2024-11-18 14:43:40', '7'),
(47, '38f099e6-1c3f-4b98-9b0e-e0db7b0ab509', '2024-11-18', 3, '23:00', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, '9', 'Icikiwir', '2024-11-18 14:47:16', '2024-11-18 14:47:16', '9'),
(48, 'ec2c3e1f-8a3c-46ab-8ee0-9c20c15c621c', '2024-11-18', 2, '15:00', 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, 3.3, '3.3', 'ada', '2024-11-18 16:08:42', '2024-11-18 16:08:42', '3.3');

-- --------------------------------------------------------

--
-- Table structure for table `suhu_tahapan`
--

CREATE TABLE `suhu_tahapan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `filling_portioning` varchar(255) DEFAULT NULL,
  `iqf` varchar(255) DEFAULT NULL,
  `top_sealer` varchar(255) DEFAULT NULL,
  `x_ray` varchar(255) DEFAULT NULL,
  `sticker` varchar(255) DEFAULT NULL,
  `shrink` varchar(255) DEFAULT NULL,
  `packing_box` varchar(255) DEFAULT NULL,
  `cold_storage` varchar(255) DEFAULT NULL,
  `filling` varchar(255) DEFAULT NULL,
  `masuk_iqf` varchar(255) DEFAULT NULL,
  `keluar_aktual` varchar(255) DEFAULT NULL,
  `suhu_top_sealer` varchar(255) DEFAULT NULL,
  `suhu_x_ray` varchar(255) DEFAULT NULL,
  `suhu_sticker` varchar(255) DEFAULT NULL,
  `suhu_shrink` varchar(255) DEFAULT NULL,
  `down_time` varchar(255) DEFAULT NULL,
  `cold_aktual` varchar(255) DEFAULT NULL,
  `catatan_kanan` varchar(255) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suhu_tahapan`
--

INSERT INTO `suhu_tahapan` (`id`, `uuid`, `date`, `shift`, `nama_produk`, `kode_produksi`, `filling_portioning`, `iqf`, `top_sealer`, `x_ray`, `sticker`, `shrink`, `packing_box`, `cold_storage`, `filling`, `masuk_iqf`, `keluar_aktual`, `suhu_top_sealer`, `suhu_x_ray`, `suhu_sticker`, `suhu_shrink`, `down_time`, `cold_aktual`, `catatan_kanan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '807fae0e-4edc-48fa-8356-6eed15d9d321', '2024-11-05', '1', 'b', 'b', 'a', 'b', 'b', 'b', 'b', 'a', 'a', 'a', 'b', 'b', 'b', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2024-11-05 15:44:09', '2024-11-05 15:44:24'),
(2, '73ab7133-56e6-418a-be3c-c15dc0bbd9a8', '2024-11-05', '2', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', '2024-11-05 15:45:19', '2024-11-05 15:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_uuid` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_institusi`
--

CREATE TABLE `verifikasi_institusi` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `user_uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `jenis_produk` varchar(255) DEFAULT NULL,
  `kode_produksi` varchar(255) DEFAULT NULL,
  `waktu_proses` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `sebelum` varchar(255) DEFAULT NULL,
  `sesudah` varchar(255) DEFAULT NULL,
  `sensori` varchar(255) DEFAULT NULL,
  `qc` varchar(255) DEFAULT NULL,
  `produksi` varchar(255) DEFAULT NULL,
  `ket` text NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verifikasi_institusi`
--

INSERT INTO `verifikasi_institusi` (`id`, `uuid`, `user_uuid`, `date`, `shift`, `jenis_produk`, `kode_produksi`, `waktu_proses`, `lokasi`, `sebelum`, `sesudah`, `sensori`, `qc`, `produksi`, `ket`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '8a442484-198e-447d-ae73-13c90d947cc7', NULL, '2024-04-23', '1', 'adss', 'asdasd', '08:53', 'ddas', '11', NULL, '12', 'sdad', 'adasd', '', 'das', '2024-04-23 01:54:19', '2024-04-23 01:54:19'),
(2, '4a15527d-7ef8-4ad6-8ccf-549ba3868d6b', NULL, '2024-04-23', '1', 'asdsad', 'asda', '08:55', 'asdsad', '22', '43', '12', 'dcsdc', 'zczc', 'ket2', 'haha', '2024-10-21 13:31:11', '2024-04-23 01:55:26'),
(3, '06e8883e-b02b-43bc-9c7b-03fddbf5f7eb', NULL, '2024-05-18', '1', 'adss', 'fsdf', '09:36', 'asa', '22', '1', '11', 'sdf', 'ffs', 'ket1', 'ASFSDF', '2024-10-21 13:30:54', '2024-05-18 02:37:02'),
(4, 'fc1d1b96-4641-49ab-a914-b8e53cd72b41', NULL, '2024-10-23', '3', 're', 're', '15:52', 're', 'er', 're', 're', 're', 're', 're', 're', '2024-10-23 04:48:51', '2024-10-23 04:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_pengemasan`
--

CREATE TABLE `verifikasi_pengemasan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `jam` time NOT NULL,
  `tnama_produk` varchar(255) NOT NULL,
  `tprod_code` varchar(255) NOT NULL,
  `tbb` varchar(255) NOT NULL,
  `tqr_code` varchar(255) NOT NULL,
  `tok_tdk` varchar(255) NOT NULL,
  `bnama_produk` varchar(255) NOT NULL,
  `bprod_code` varchar(255) NOT NULL,
  `bbb` varchar(255) NOT NULL,
  `bisi` varchar(255) NOT NULL,
  `bok_tdk` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `qc` varchar(255) NOT NULL,
  `produksi` varchar(255) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_premix`
--

CREATE TABLE `verifikasi_premix` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `nama_premix` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `sensori` varchar(255) NOT NULL,
  `tindakan_koreksi` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verifikasi_premix`
--

INSERT INTO `verifikasi_premix` (`id`, `uuid`, `date`, `shift`, `nama_premix`, `kode_produksi`, `sensori`, `tindakan_koreksi`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '8999b530-f8f6-4cc9-824d-170cd3bb672b', '2024-04-22', '2', 'EDIT KODE', 'ASC', '11', 'SDAD', '-', '2024-05-18 02:32:42', '2024-04-22 02:48:13'),
(2, '58b8a1e8-38b9-4762-a9ff-784d70e00b04', '2024-05-18', '1', 'SCASC', 'fsdf1', '11.2', 'ds', 'aa', '2024-05-22 03:32:00', '2024-05-18 02:32:05'),
(3, 'ded8c9b7-ad7d-40b7-8695-23db6c35c108', '2024-10-23', '1', 'da', 'da', 'da', 'da', 'da', '2024-10-23 04:50:17', '2024-10-23 04:50:17'),
(4, 'ee3549ec-bfb7-467c-b83a-a27ee0138da5', '2024-10-23', '1', 'tq', 'tq', 'tq', 'tq', 'tq', '2024-10-23 04:50:27', '2024-10-23 04:50:27'),
(5, '0f609dea-d164-445d-b832-6faae41577b0', '2024-10-23', '2', 'uj', 'ju', 'ju', 'ju', 'ju', '2024-10-23 04:50:38', '2024-10-23 04:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_sanitasi`
--

CREATE TABLE `verifikasi_sanitasi` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `pukul` text NOT NULL,
  `area` varchar(255) NOT NULL,
  `mesin` varchar(255) NOT NULL,
  `cleaning_agents` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verifikasi_sanitasi`
--

INSERT INTO `verifikasi_sanitasi` (`id`, `uuid`, `date`, `shift`, `pukul`, `area`, `mesin`, `cleaning_agents`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, '9c0872ed-1759-45c0-86d8-87c8e1e6260d', '2024-11-08', '1', '08:00', 'ada', 'ada', 'dada', 'ada', 'ada', '2024-11-08 06:23:18', '2024-11-08 06:23:18'),
(2, 'e8cea1d7-e119-4bef-aaaf-37bcc5e62413', '2024-11-08', '2', '22:00', 'did', 'did', 'diii', 'did', 'dii', '2024-11-08 06:23:28', '2024-11-08 06:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `verif_mesin`
--

CREATE TABLE `verif_mesin` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_mesin` varchar(255) DEFAULT NULL,
  `standar_setting` varchar(255) DEFAULT NULL,
  `aktual` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verif_mesin`
--

INSERT INTO `verif_mesin` (`id`, `uuid`, `date`, `shift`, `nama_mesin`, `standar_setting`, `aktual`, `tindakan`, `keterangan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, 'e8225ba4-ab0a-40d0-a6ec-56a1bcf240c0', '2024-11-06', '1', 'EDEW', 'EDEW', 'EDEW', 'EDEW', 'EDEW', 'EDEW', '2024-11-06 04:46:15', '2024-11-06 04:46:15'),
(2, '1745011a-cb37-4b01-9b1c-b8d99de4ecbd', '2024-11-06', '2', 'FUFUFIFI', 'FUFUFAFA', 'FUFUFAFA', 'FUFUFAFA', 'FUFUFAFA', 'FUFUFAFA', '2024-11-06 04:49:37', '2024-11-06 04:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `verif_topping`
--

CREATE TABLE `verif_topping` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kode_produk` varchar(255) DEFAULT NULL,
  `jenis_topping` varchar(255) DEFAULT NULL,
  `standar` varchar(255) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `gramasi` varchar(255) DEFAULT NULL,
  `p_pukul` time DEFAULT NULL,
  `p_gramasi` varchar(255) DEFAULT NULL,
  `pp_pukul` time DEFAULT NULL,
  `pp_gramasi` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verif_topping`
--

INSERT INTO `verif_topping` (`id`, `uuid`, `date`, `shift`, `nama_produk`, `kode_produk`, `jenis_topping`, `standar`, `pukul`, `gramasi`, `p_pukul`, `p_gramasi`, `pp_pukul`, `pp_gramasi`, `tindakan`, `catatan`, `created_at`, `modified_at`) VALUES
(1, 'cdabf0e2-6821-48ff-8157-a4c518ad9ae9', '2024-11-06', '1', 'nama', 'kode', 'jenis1,jenis2,jenis3', 'standar1,standar2,standar3', '09:38:00', 'gramasi1,gramasi2,gramasi3', '09:39:00', 'gramasi1,gramasi2,gramasi3', '12:41:00', 'gram1,gram2,gram3', 'tindakan', 'catatan', '2024-11-06 02:39:53', '0000-00-00 00:00:00'),
(2, 'b06b7459-a2e5-46d0-995a-05d45830851e', '2024-11-06', '2', 'gugu', 'gugu', 'j1,j2,j3', 's1,s2,s3', '10:48:00', 'g1,g2,g3', '11:50:00', 'g1,g2,g3', '14:53:00', 'g1,g2,g3', 'titi', 'tutu', '2024-11-06 02:48:41', '2024-11-06 02:48:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebersihan_ruangan`
--
ALTER TABLE `kebersihan_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontaminasi_benda_asing`
--
ALTER TABLE `kontaminasi_benda_asing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory_sample`
--
ALTER TABLE `laboratory_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loading_lokal`
--
ALTER TABLE `loading_lokal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring_false`
--
ALTER TABLE `monitoring_false`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring_repack`
--
ALTER TABLE `monitoring_repack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameter_saus_y`
--
ALTER TABLE `parameter_saus_y`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `par_yoshinoya`
--
ALTER TABLE `par_yoshinoya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_disposisi`
--
ALTER TABLE `pemeriksaan_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_dry_store`
--
ALTER TABLE `pemeriksaan_dry_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_incoming`
--
ALTER TABLE `pemeriksaan_incoming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_kedatangan_raw_material`
--
ALTER TABLE `pemeriksaan_kedatangan_raw_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_kemasan_dari_pemasok`
--
ALTER TABLE `pemeriksaan_kemasan_dari_pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_premix`
--
ALTER TABLE `pemeriksaan_premix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_retur`
--
ALTER TABLE `pemeriksaan_retur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_kettle`
--
ALTER TABLE `pem_kettle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_masak_disteam`
--
ALTER TABLE `pem_masak_disteam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_masak_noodle`
--
ALTER TABLE `pem_masak_noodle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_masak_rice_cooker`
--
ALTER TABLE `pem_masak_rice_cooker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_masak_steamer`
--
ALTER TABLE `pem_masak_steamer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_metal_detector`
--
ALTER TABLE `pem_metal_detector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_sanitasi`
--
ALTER TABLE `pem_sanitasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_suhuiqf`
--
ALTER TABLE `pem_suhuiqf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_thawing`
--
ALTER TABLE `pem_thawing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_tumbling`
--
ALTER TABLE `pem_tumbling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pem_xray`
--
ALTER TABLE `pem_xray`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peneraan_termo`
--
ALTER TABLE `peneraan_termo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peneraan_timbangan`
--
ALTER TABLE `peneraan_timbangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proses_thawing`
--
ALTER TABLE `proses_thawing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retained_sample_report`
--
ALTER TABLE `retained_sample_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_bulanan_rnd`
--
ALTER TABLE `sample_bulanan_rnd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanitasi_ruangan`
--
ALTER TABLE `sanitasi_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sortasi_tdksesuai`
--
ALTER TABLE `sortasi_tdksesuai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suhu_cold_storage`
--
ALTER TABLE `suhu_cold_storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suhu_ruangan`
--
ALTER TABLE `suhu_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suhu_tahapan`
--
ALTER TABLE `suhu_tahapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifikasi_institusi`
--
ALTER TABLE `verifikasi_institusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifikasi_pengemasan`
--
ALTER TABLE `verifikasi_pengemasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifikasi_premix`
--
ALTER TABLE `verifikasi_premix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifikasi_sanitasi`
--
ALTER TABLE `verifikasi_sanitasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verif_mesin`
--
ALTER TABLE `verif_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verif_topping`
--
ALTER TABLE `verif_topping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kebersihan_ruangan`
--
ALTER TABLE `kebersihan_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratory_sample`
--
ALTER TABLE `laboratory_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loading_lokal`
--
ALTER TABLE `loading_lokal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monitoring_false`
--
ALTER TABLE `monitoring_false`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `monitoring_repack`
--
ALTER TABLE `monitoring_repack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `par_yoshinoya`
--
ALTER TABLE `par_yoshinoya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pemeriksaan_dry_store`
--
ALTER TABLE `pemeriksaan_dry_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemeriksaan_incoming`
--
ALTER TABLE `pemeriksaan_incoming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemeriksaan_kedatangan_raw_material`
--
ALTER TABLE `pemeriksaan_kedatangan_raw_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemeriksaan_kemasan_dari_pemasok`
--
ALTER TABLE `pemeriksaan_kemasan_dari_pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemeriksaan_premix`
--
ALTER TABLE `pemeriksaan_premix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemeriksaan_retur`
--
ALTER TABLE `pemeriksaan_retur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pem_kettle`
--
ALTER TABLE `pem_kettle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pem_masak_rice_cooker`
--
ALTER TABLE `pem_masak_rice_cooker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pem_masak_steamer`
--
ALTER TABLE `pem_masak_steamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pem_metal_detector`
--
ALTER TABLE `pem_metal_detector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pem_sanitasi`
--
ALTER TABLE `pem_sanitasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pem_thawing`
--
ALTER TABLE `pem_thawing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pem_tumbling`
--
ALTER TABLE `pem_tumbling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pem_xray`
--
ALTER TABLE `pem_xray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peneraan_termo`
--
ALTER TABLE `peneraan_termo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `peneraan_timbangan`
--
ALTER TABLE `peneraan_timbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `retained_sample_report`
--
ALTER TABLE `retained_sample_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sample_bulanan_rnd`
--
ALTER TABLE `sample_bulanan_rnd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanitasi_ruangan`
--
ALTER TABLE `sanitasi_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `sortasi_tdksesuai`
--
ALTER TABLE `sortasi_tdksesuai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suhu_cold_storage`
--
ALTER TABLE `suhu_cold_storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suhu_ruangan`
--
ALTER TABLE `suhu_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `suhu_tahapan`
--
ALTER TABLE `suhu_tahapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verifikasi_institusi`
--
ALTER TABLE `verifikasi_institusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `verifikasi_pengemasan`
--
ALTER TABLE `verifikasi_pengemasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifikasi_premix`
--
ALTER TABLE `verifikasi_premix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `verifikasi_sanitasi`
--
ALTER TABLE `verifikasi_sanitasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verif_mesin`
--
ALTER TABLE `verif_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verif_topping`
--
ALTER TABLE `verif_topping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
