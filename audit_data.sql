-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2025 at 12:30 PM
-- Server version: 8.0.35
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audit_data`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `avg_gap_level` ()   BEGIN
  DECLARE avg_level DECIMAL(5,2);
  DECLARE avg_gap DECIMAL(5,2);

  -- Hitung rata-rata skor
  SELECT 
    ROUND(AVG(rata_rata), 2) INTO avg_level
  FROM (
    SELECT 
      ROUND(AVG(a.skor), 2) AS rata_rata
    FROM (
      SELECT 'Audit Perencanaan Teknologi Informasi' AS audit
      UNION SELECT 'Audit Pengembangan Teknologi Informasi'
      UNION SELECT 'Audit Operasional Teknologi Informasi'
      UNION SELECT 'Audit Pemantauan Teknologi Informasi'
      UNION SELECT 'Audit Aplikasi Teknologi Informasi'
      UNION SELECT 'Audit Atas Infrastruktur Teknologi Informasi'
    ) j
    LEFT JOIN alokasi a ON a.audit = j.audit
    GROUP BY j.audit
  ) AS hasil;

  -- Asumsikan skor maksimal = 90, maka GAP = 90 - rata-rata
  SET avg_gap = ROUND(90 - avg_level, 2);

  -- Kembalikan hasil
  SELECT avg_level, avg_gap;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_avg_skor_and_gap` ()   BEGIN
  SELECT 
    j.audit,
    ROUND(AVG(a.skor), 2) AS rata_rata,
    90 AS skor_maksimal,
    ROUND(90 - AVG(a.skor), 2) AS gap_analysis
  FROM (
    SELECT 'Audit Perencanaan Teknologi Informasi' AS audit
    UNION SELECT 'Audit Pengembangan Teknologi Informasi'
    UNION SELECT 'Audit Operasional Teknologi Informasi'
    UNION SELECT 'Audit Pemantauan Teknologi Informasi'
    UNION SELECT 'Audit Aplikasi Teknologi Informasi'
    UNION SELECT 'Audit Atas Infrastruktur Teknologi Informasi'
  ) j
  LEFT JOIN alokasi a ON a.audit = j.audit
  GROUP BY j.audit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_avg_skor_by_jenis_audit` ()   BEGIN
  SELECT 
    j.audit,
    ROUND(AVG(a.skor), 2) AS rata_rata
  FROM (
    SELECT 'Audit Perencanaan Teknologi Informasi' AS audit
    UNION SELECT 'Audit Pengembangan Teknologi Informasi'
    UNION SELECT 'Audit Operasional Teknologi Informasi'
    UNION SELECT 'Audit Pemantauan Teknologi Informasi'
    UNION SELECT 'Audit Aplikasi Teknologi Informasi'
    UNION SELECT 'Audit Atas Infrastruktur Teknologi Informasi'
  ) j
  LEFT JOIN alokasi a ON a.audit = j.audit
  GROUP BY j.audit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `akun_auditee`
--

CREATE TABLE `akun_auditee` (
  `id_auditee` int NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `auditee` varchar(100) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `user_id` int DEFAULT NULL
);

--
-- Dumping data for table `akun_auditee`
--

INSERT INTO `akun_auditee` (`id_auditee`, `NIP`, `jabatan`, `auditee`, `kategori`, `keterangan`, `user_id`) VALUES
(100, 'SDM_01sd100', 'Pengusaha Hotel dan Restoran', 'Pengusaha Hotel dan Restoran', 'User', 'Seluruh Personil Pengguna layanan pengguna SIMHORE', 10),
(102, 'SDM_19691229 199902 1 001', 'Kepala Badan Pendapatan Daerah Kabupaten Berau', 'Melva Calista Putri', 'Accountable/Consuled/Informed/User', 'Penanggung Jawab', 12),
(103, 'SDM_19730830 200901 1 006', 'Web Developer Badan Pendapatan Daerah', 'Raden Bagus Kuncoro', 'Responsible/User', 'Bertugas sebagai developer website, melakukan transfer knowledge kepada admin website internal, melakukan perawatan maupun perbaikan terhadap aplikasi, serta melakukan pembaruan tampilan website.', 9),
(104, 'SDM_19750414 200701 1 023', 'Kepala Bidang Pendaftaran dan Penetapan', 'Sakura Alika Zahra', 'Accountable/Consuled/Informed/User', 'Kepala Bidang/ Pemrakarsa aplikasi SIMHORE', 10),
(105, 'SDM_19750725 201201 1 002', 'Teknisi pada Bidang Pendaftaran dan Penetapan', 'Cornelius Tanuwijaya', 'Responsible/User', 'Bertugas sebagai teknisi, melakukan perawatan maupun perbaikan terhadap perangkat lunak maupun perangkat keras.', 11),
(106, 'SDM_19820627 200012 2 004', 'Admin SIMHORE Badan Pendapatan Daerah', 'Tiara Andromeda Dewi', 'Responsible/User', 'Bertugas melakukan update data pengguna dan daftar aktivitas dan menyampaikan informasi tentang kondisi sistem Layanan SIMHORE kepada pemangku kepentingan', 7);

-- --------------------------------------------------------

--
-- Table structure for table `akun_auditor`
--

CREATE TABLE `akun_auditor` (
  `id_auditor` int NOT NULL,
  `kode_auditor` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `bidang_keahlian` varchar(100) DEFAULT NULL,
  `peran` varchar(50) DEFAULT NULL,
  `id_user` int DEFAULT NULL
);

--
-- Dumping data for table `akun_auditor`
--

INSERT INTO `akun_auditor` (`id_auditor`, `kode_auditor`, `nama`, `bidang_keahlian`, `peran`, `id_user`) VALUES
(209, 'AT01_DP', 'Aldebaran Wijayanto', 'Senior Programming', 'Anggota Tim', 4);

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int NOT NULL,
  `kode_alat` varchar(50) NOT NULL DEFAULT '',
  `nama_alat` varchar(100) DEFAULT NULL,
  `spesifikasi` text,
  `disiapkan_oleh` varchar(100) DEFAULT NULL,
  `fungsi` text,
  `id_auditee` int DEFAULT NULL
);

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `kode_alat`, `nama_alat`, `spesifikasi`, `disiapkan_oleh`, `fungsi`, `id_auditee`) VALUES
(13, 'K001', 'Scanner Audit', 'Resolusi 600dpi', 'Tim IT', 'Memindai dokumen audit', NULL),
(14, 'K002', 'Laptop Audit', 'Core i7, 16GB RAM', 'Tim IT', 'Menjalankan aplikasi audit', NULL),
(17, 'K003', 'Scanner Barcode', 'Scan barcode QR dan 1D', 'Tim IT', 'Input otomatis ke sistem audit', NULL),
(18, 'K004', 'Thermometer Digital', 'Akurasi tinggi, digital', 'Tim Operasional', 'Mengukur suhu lingkungan', NULL),
(19, 'K005', 'Scanner Dokumen', 'Resolusi tinggi, mendukung A3', 'Bagian Arsip', 'Memindai dokumen audit', NULL),
(20, 'K006', 'Laptop Lenovo', 'Core i5, RAM 8GB, SSD 256GB', 'IT Support', 'Pengolahan data hasil audit', NULL),
(21, 'K007', 'Voice Recorder', 'Perekaman audio jernih', 'Tim Auditor', 'Merekam wawancara dengan auditee', NULL),
(22, 'K008', 'Camera DSLR', '24MP, Zoom optik 10x', 'Tim Dokumentasi', 'Mengambil dokumentasi visual', NULL),
(23, 'K009', 'Alat Ukur Listrik', 'Multimeter digital', 'Teknisi Lapangan', 'Mengukur tegangan dan arus listrik', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alokasi`
--

CREATE TABLE `alokasi` (
  `kode_alokasi` varchar(20) NOT NULL,
  `id_aset` int DEFAULT NULL,
  `kode_risiko` varchar(50) DEFAULT NULL,
  `kode_kontrol` varchar(50) DEFAULT NULL,
  `id_dokumen` int DEFAULT NULL,
  `teknik_pengujian` text,
  `dokumentasi` varchar(255) DEFAULT NULL,
  `id_jadwal` varchar(50) DEFAULT NULL,
  `id_auditor` int DEFAULT NULL,
  `kode_alat` int DEFAULT NULL,
  `penilaian_level` varchar(50) DEFAULT NULL,
  `audit` varchar(100) DEFAULT NULL,
  `skor` int DEFAULT NULL
);

--
-- Dumping data for table `alokasi`
--

INSERT INTO `alokasi` (`kode_alokasi`, `id_aset`, `kode_risiko`, `kode_kontrol`, `id_dokumen`, `teknik_pengujian`, `dokumentasi`, `id_jadwal`, `id_auditor`, `kode_alat`, `penilaian_level`, `audit`, `skor`) VALUES
('A4', 42, 'RISK_6858c1b137789', 'Indikator 101', 24, 'uu aa', NULL, 'JAD002', NULL, 18, '3', 'Audit Pengembangan Teknologi Informasi', 66),
('ii', 52, 'RISK_6858c1a7df935', 'Indikator 10', 24, 'oo', NULL, 'JAD003', NULL, 22, '1', 'Audit Operasional Teknologi Informasi', 88);

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` int NOT NULL,
  `kode_aset` varchar(100) NOT NULL,
  `nama_aset` varchar(100) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `kategori` varchar(50) DEFAULT NULL,
  `id_auditee` int DEFAULT NULL
);

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `kode_aset`, `nama_aset`, `jenis`, `deskripsi`, `kategori`, `id_auditee`) VALUES
(39, 'AST001', 'Server Database', 'Perangkat Elektronik pada Ruang Server', 'Server utama penyimpan data', 'Perangkat Keras', 106),
(42, 'AST004', 'Laptop Audit', 'Perangkat Keras', 'Digunakan auditor untuk tugas lapangan', 'Sedang', 104),
(52, 'AST002', 'Server Utama', 'Perangkat Elektronik pada Ruang Server', 'Server untuk hosting aplikasi utama', 'Perangkat Keras', 106),
(53, 'AST003', 'Laptop Auditor', 'Peralatan Pendukung', 'Digunakan untuk audit lapangan', 'Perangkat Keras', 106),
(54, 'AST005', 'Dokumen SOP', 'Dokumen', 'Standar Operasional Prosedur untuk audit', 'Dokumen', 104),
(55, 'AST006', 'Aplikasi Audit', 'Perangkat Lunak', 'Aplikasi internal untuk pengolahan data audit', 'Aplikasi', 105),
(56, 'AST007', 'Jaringan VPN', 'Jaringan', 'Akses aman ke jaringan internal', 'IT Infrastruktur', 105);

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id_audit` int NOT NULL,
  `kode_audit` varchar(20) NOT NULL,
  `nama_kegiatan_audit` varchar(100) DEFAULT NULL
);

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id_audit`, `kode_audit`, `nama_kegiatan_audit`) VALUES
(1, 'ATI-01', 'Audit Perencanaan Teknologi Informasi'),
(2, 'ATI-02', 'Audit Pengembangan Teknologi Informasi'),
(3, 'ATI-03', 'Audit Operasional Teknologi Informasi'),
(4, 'ATI-04', 'Audit Pemantauan Teknologi Informasi'),
(5, 'ATI-05', 'Audit Aplikasi Teknologi Informasi'),
(6, 'ATI-06', 'Audit Infrastruktur Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int NOT NULL,
  `kode_dokumen` varchar(50) NOT NULL DEFAULT '',
  `jenis` varchar(200) DEFAULT NULL,
  `nama` text ,
  `deskripsi` text,
  `file` varchar(225) DEFAULT NULL,
  `id_auditee` int DEFAULT NULL
);

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `kode_dokumen`, `jenis`, `nama`, `deskripsi`, `file`, `id_auditee`) VALUES
(23, 'DOK001', 'Laporan Audit Internal', 'Laporan Audit Triwulan 1', 'Dokumen hasil audit internal TW1', 'laporan_tw1.pdf', 100),
(24, 'DOK002', 'Manual Prosedur', 'Prosedur Pengelolaan Aset', 'Dokumen prosedur aset', 'manual_aset.pdf', 100),
(25, 'DOK003', 'Checklist Audit', 'Checklist Kesiapan IT', 'Checklist kesiapan sebelum audit', 'checklist_it.xlsx', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_penilaian`
--

CREATE TABLE `hasil_penilaian` (
  `Kolom 1` int DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hasil_penilaian_view`
-- (See below for the actual view)
--
CREATE TABLE `hasil_penilaian_view` (
`id_aset` int
,`indikator` text
,`level_terpenuhi` varchar(13)
,`mitigasi_dampak` text
,`mitigasi_penyebab` text
,`nama_aset` varchar(100)
,`nilai_risiko` int
);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_kegiatan` varchar(50) NOT NULL DEFAULT '',
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `hari_tanggal` varchar(50) DEFAULT NULL,
  `jam` varchar(50) DEFAULT NULL,
  `target_luaran` text,
  `id_auditee` int DEFAULT NULL
);

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_kegiatan`, `nama_kegiatan`, `hari_tanggal`, `jam`, `target_luaran`, `id_auditee`) VALUES
('JAD001', 'Audit Sistem Informasi', 'Senin, 17 Juni 2025', '09:00 - 12:00', 'Laporan temuan awal audit sistem informasi', 106),
('JAD002', 'Evaluasi Infrastruktur Jaringan', 'Selasa, 18 Juni 2025', '13:00 - 15:00', 'Dokumentasi hasil evaluasi', 106),
('JAD003', 'Review Keamanan Data', '2025-06-27', '10:00 - 12:00', 'Daftar rekomendasi keamanannya', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_penilaian`
--

CREATE TABLE `komponen_penilaian` (
  `id_kontrol` varchar(20) NOT NULL,
  `domain` varchar(100) DEFAULT NULL,
  `tahapan` varchar(100) DEFAULT NULL,
  `aktivitas` text,
  `indikator` text,
  `level_1` text,
  `level_2` text,
  `level_3` text
) ;

--
-- Dumping data for table `komponen_penilaian`
--

INSERT INTO `komponen_penilaian` (`id_kontrol`, `domain`, `tahapan`, `aktivitas`, `indikator`, `level_1`, `level_2`, `level_3`) VALUES
('Indikator 1', 'Tata Kelola', 'Tata Kelola', 'Pengaturan TIK', 'Bagaimana instansi mengatur Arsitektur Layanan SPBE ?', 'Surat Undangan / Notulen rapat yang membahas kebijakan internal arsitektur SPBE atau yang membahas penerapan arsitektur layanan instansi (koordinasi)', '1. Kebijakan internal arsitektur layanan SPBE yang mengacu pada Arsitektur SPBE Nasional; 2. Arsitektur layanan SPBE yang memuat obyek audit terkait.', 'Dokumen Pelaksanaan layanan SPBE terkait obyek audit yang dilakukan sesuai kebijakan (Indikator 11)'),
('Indikator 10', 'Manajemen', 'Perencanaan TIK', 'Manajemen SDM', 'Bagaimana instansi melakukan perencanaan SDM SPBE sesuai dengan kompetensi dan kualifikasi yang dibutuhkan pada objek audit?', 'Notulen rapat pembahasan penetapan pedoman manajemen SDM SPBE instansi atau rapat pembahasan penerapan manajemen SDM pada objek audit.', 'Kebijakan internal /pedoman manajemen SDM TIK yang berisi perencanaan SDM TIK, pengembangan kompetensi TIK, pembinaan dan pendayagunaan SDM TIK.', 'Laporan perencanaan SDM pengelola objek audit atau SK TIM penelola Objek audit'),
('Indikator 100', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Pemeliharaan Infrastruktur pendukung', 'Bagaimana menyimpan back up aplikasi ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pemeliharaan preventif aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur backup aplikasi', 'Dokumen Penyimpanan Backup aplikasi'),
('Indikator 101', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Pemeliharaan Infrastruktur pendukung', 'Bagaimana melaksanakan pendaftaran Aplikasi SPBE', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pemeliharaan preventif aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur pendaftaran aplikasi', 'Dokumen bukti pendaftaran aplikasi.'),
('Indikator 102', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Pemeliharaan Infrastruktur pendukung', 'Bagaimana pemeliharaan kode sumber pada repositori aplikasi ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pemeliharaan preventif aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur repositori aplikasi', 'Dokumen bukti pemeliharaan kode sumber / repositori penyimpanan kode sumber'),
('Indikator 103', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Evaluasi dan Pemantauan Aplikasi', 'Unit kerja mana yang harus melaksanakan evaluasi dan pemantauan aplikasi secara berkala ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pelaksana evaluasi aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur pelaksana evaluasi aplikasi', 'Dokumen kebijakan yang menggambarkan unit kerja yang melaksanakan evaluasi dan pemantauan aplikasi secara berkala'),
('Indikator 104', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Evaluasi dan Pemantauan Aplikasi', 'Bagaimana menetapkan indikator keberhasilan aplikasi sebagai alat ukur evaluasi aplikasi ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan penetapan indikator keberhasilan evaluasi aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur alat ukur evaluasi aplikasi', 'Alat ukur evaluasi keberhasilan objek audit'),
('Indikator 105', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Evaluasi dan Pemantauan Aplikasi', 'Bagaimana menindaklanjuti hasil evaluasi ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan tindak lanjut hasil evaluasi aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur tindak lanjut hasil evaluasi.', 'Dokumen hasil tindak lanjut evaluasi'),
('Indikator 11', 'Manajemen', 'Perencanaan TIK', 'Manajemen SDM', 'Bagaimana instansi melakukan pengembangan kompetensi SDM SPBE sesuai objek audit?', 'Notulen rapat pembahasan penetapan pedoman manajemen SDM SPBE instansi atau rapat pembahasan penerapan manajemen SDM pada objek audit.', 'Kebijakan internal /pedoman manajemen SDM TIK yang berisi perencanaan SDM TIK, pengembangan kompetensi TIK, pembinaan dan pendayagunaan SDM TIK.', 'Laporan pelaksanaan kegiatan pengembangan kompetensi SDM sesuai objek audit'),
('Indikator 12', 'Manajemen', 'Perencanaan TIK', 'Manajemen SDM', 'Bagaimana instansi melakukan pembinaan SDM pengelola SPBE ?', 'Notulen rapat pembahasan penetapan pedoman manajemen SDM SPBE instansi atau rapat pembahasan penerapan manajemen SDM pada objek audit.', 'Kebijakan internal /pedoman manajemen SDM TIK yang berisi perencanaan SDM TIK, pengembangan kompetensi TIK, pembinaan dan pendayagunaan SDM TIK.', 'Laporan lengkap pelaksanaan pembinaan SDM SPBE pada objek audit'),
('Indikator 13', 'Manajemen', 'Perencanaan TIK', 'Manajemen SDM', 'Bagaimana instansi mendayagunakan SDM SPBE ?', 'Notulen rapat pembahasan penetapan pedoman manajemen SDM SPBE instansi atau rapat pembahasan penerapan manajemen SDM pada objek audit.', 'Kebijakan internal /pedoman manajemen SDM TIK yang berisi perencanaan SDM TIK, pengembangan kompetensi TIK, pembinaan dan pendayagunaan SDM TIK.', 'Tim pengelola objek audit (aplikasi/infrastruktur)'),
('Indikator 14', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi memenuhi Standar Data yang ditetapkan oleh Pembina Data?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan penerapan standar data pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Dokumen Standar Data pada objek audit'),
('Indikator 15', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi melengkapi Metadata dari semua data yang ada di Daftar Data?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan penerapan metadata data pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Dokumen Arsitektur Data dan informasi pada objek audit'),
('Indikator 16', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi menetapkan data mana saja yang di interoperabilitaskan dari Daftar Data?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan penerapan interoperabilitas data pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Daftar data dalam objek audit yang diinteroperabilitaskan antar instansi atau internal antar unit kerja. atau Metadata data pada objek audit'),
('Indikator 17', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi menerapkan penggunaan Kode Referensi dan Data Induk pada data yang dihasilkan?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan penerapan kode referensi dan data induk pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Kode refernsi dan data induk yang diterapkan pada objek audit'),
('Indikator 18', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi melaksanakan Perencanaan Data yaitu penentuan Daftar Data, Daftar Data Prioritas dan Rencana Aksi agar sesuai penyelenggaraan SDI?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat penyusunan Daftar data/Katalog data/data prioritas pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Dokumen penetapan daftar data instansi termasuk data pada objek audit'),
('Indikator 19', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi melaksanakan Pengumpulan Data yaitu terkait dengan data input dari basis data aplikasi agar sesuai penyelenggaraan SDI?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan penerapan akses data input pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Dokumen Arsitektur Data dan informasi pada objek audit'),
('Indikator 2', 'Tata Kelola', 'Tata Kelola', 'Pengaturan TIK', 'Bagaimana instansi mengatur Peta Rencana SPBE ?', 'Surat Undangan / Notulen rapat yang membahas kebijakan internal peta rencana SPBE atau yang membahas penerapan peta rencana instansi (koordinasi)', '1. Kebijakan internal peta rencana SPBE yang mengacu pada arsitektur SPBE Nasional; 2. Peta Rencana SPBE yang memuat obyek audit di unsur Aplikasi dan unsur Audit TIK.', 'Jadwal Peta rencana SPBE yang memperlihatkan jadwal audit TIK sesuai objek audit'),
('Indikator 20', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi melaksanakan Pemeriksaan Data yaitu terkait dengan data output dari basis data aplikasi agar sesuai penyelenggaraan SDI?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan penerapan data output pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Dokumen Arsitektur aplikasi sesuai objek audit atau metadata aplikasi objek audit'),
('Indikator 21', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi melaksanakan Penyebarluasan Data yaitu pemberian akses, pendistribusian dan pertukaran data melalui Portal SDI?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan penyebarluasan data atau berbagi data dengan instansi lain pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Dokumen data instansi yang telah disebarluaskan melalui Portal SDI melalui SPLP Kemenkominfo yang menunjukkan data tersebut adalah data pada objek audit'),
('Indikator 22', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi mengelola Arsitektur Data yang terdiri dari spesifikasi dan ketentuan datanya?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan arsitektur data pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Penerapan Arsitektur Data pada data objek audit'),
('Indikator 23', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi melaksanakan Manajemen Basis Data terkait data input dan data output serta data bisa dibagipakai dari aplikasi?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan penerapan basis data input dan data output pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Dokumen arsitektur aplikasi sesuai objek audit serta arsitektur data objek audit'),
('Indikator 24', 'Manajemen', 'Perencanaan TIK', 'Manajemen Data', 'Bagaimana instansi melaksanakan Manajemen Kualitas Data termasuk pengelolaan Data Induk/Kode Referensi dari Data Prioritas?', 'Notulen rapat pembahasan penetapan pedoman manajemen data SPBE instansi atau rapat pembahasan pemeriksaan kualitas data pada objek audit.', '1. Kebijakan internal Manajemen Data instansi (Indikator 3). 2. Pedoman manajemen data instansi (indikator 23 SPBE) 3. Arsitektur Data dan Informasi (indikator 11)', 'Dokumen alur pemeriksaan Kualitas Data pada objek audit'),
('Indikator 25', 'Manajemen', 'Perencanaan TIK', 'Manajemen Perencanaan Layanan', 'Bagaimana menetapkan atribut metadata layanan yang didukung oleh aplikasi objek audit?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan atribut metadata layanan pada objek audit.', '1. Pedoman manajemen layanan SPBE instansi 2. Arsitektur Layanan SPBE instansi', 'Dokumen penetapan Atribut metadata layanan objek audit'),
('Indikator 26', 'Manajemen', 'Perencanaan TIK', 'Manajemen Perencanaan Layanan', 'Bagaimana melakukan perumusan katalog layanan?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan katalog layanan sesuai objek audit.', 'Pedoman Manajemen Layanan yang telah ditetapkan pimpinan instansi yang mengatur katalog layanan /Arsitektur Layanan SPBE', 'Dokumen Katalog layanan objek audit'),
('Indikator 27', 'Manajemen', 'Perencanaan TIK', 'Manajemen Perencanaan Layanan', 'Bagaimana menetapkan target layanan pengguna?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan target layanan sesuai objek audit.', 'Pedoman Manajemen Layanan yang telah ditetapkan pimpinan instansi yang mengatur target layanan pengguna /Arsitektur Layanan SPBE', 'Dokumen penetapan Target layanan objek audit'),
('Indikator 28', 'Manajemen', 'Perencanaan TIK', 'Manajemen Perencanaan Layanan', 'Bagaimana menetapkan target pengoperasian layanan?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan target pengoperasian layanan sesuai objek audit.', 'Pedoman Manajemen Layanan yang telah ditetapkan pimpinan instansi yang mengatur target pengoperasian layanan /Arsitektur Layanan SPBE', 'Dokumen Rencana keberlangsungan layanan objek audit'),
('Indikator 29', 'Manajemen', 'Pengembangan TIK', 'Manajemen Pengetahuan', 'Bagaimana instansi melaksanakan pengumpulan pengetahuan SPBE pada objek audit?', 'Notulen rapat pembahasan penetapan pedoman manajemen pengetahuan SPBE instansi atau rapat pembahasan pengumpulan pengetahuan pada objek audit.', 'Pedoman Manajemen pengetahuan instansi yang mengatur pengumpulan Pengetahuan SPBE.', 'Dokumen yang menjelaskan bagaimana mengumpulkan Pengetahuan terkait objek audit.'),
('Indikator 3', 'Tata Kelola', 'Tata Kelola', 'Pengaturan TIK', 'Bagaimana instansi melaksanakan evaluasi menyeluruh (audit) terkait sumber daya SPBE (aplikasi dan/atau infrastruktur) ?', 'Surat Undangan / Notulen rapat yang membahas kebijakan internal audit TIK atau yang membahas rencana/tindak lanjut audit (koordinasi).', 'Kebijakan internal audit TIK instansi.', 'Hasil audit TIK internal dan/atau eksternal terhadap aplikasi khusus instansi layanan publik dan/atau infrastruktur'),
('Indikator 30', 'Manajemen', 'Pengembangan TIK', 'Manajemen Pengetahuan', 'Bagaimana instansi melaksanakan penyimpanan pengetahuan terkait objek audit ke sistem manajemen pengetahuan yang tersedia?', 'Notulen rapat pembahasan penetapan pedoman manajemen pengetahuan SPBE instansi atau rapat pembahasan penyimpanan pengetahuan SPBE pada objek audit.', 'Pedoman Manajemen pengetahuan instansi yang mengatur Penyimpanan Pengetahuan SPBE.', 'Tempat penyimpanan pengetahuan terkait objek audit'),
('Indikator 31', 'Manajemen', 'Pengembangan TIK', 'Manajemen Pengetahuan', 'Bagaimana instansi melaksanakan pengolahan pengetahuan SPBE untuk memudahkan pengambilan keputusan?', 'Notulen rapat pembahasan penetapan pedoman manajemen pengetahuan SPBE instansi atau rapat pembahasan pengolahan pengetahuan pada objek audit untuk memudahkan pengambilan keputusan.', 'Pedoman Manajemen pengetahuan instansi yang mengatur Pengolahan Pengetahuan SPBE', 'Bukti adanya Pengolahan Pengetahuan terhadap objek audit untuk memudahkan pengambilan keputusan.'),
('Indikator 32', 'Manajemen', 'Pengembangan TIK', 'Manajemen Pengetahuan', 'Bagaimana instansi melaksanakan alih pengetahuan dan teknologi yang dihasilkan SPBE untuk meningkatkan mutu pelayanan?', 'Notulen rapat pembahasan penetapan pedoman manajemen pengetahuan SPBE instansi atau rapat pembahasan pelaksanaan alih pengetahuan dan teknologi yang dihasilkan oleh objek audit.', 'Pedoman Manajemen pengetahuan instansi yang mengatur Pemanfaatan dan Evaluasi Pengetahuan SPBE', 'Bukti adanya proses alih pengetahuan dan teknologi yang dihasilkan oleh objek audit untuk meningkatkan layanan SPBE.'),
('Indikator 33', 'Manajemen', 'Pengembangan TIK', 'Manajemen Perubahan', 'Bagaimana instansi melakukan perencanaan perubahan yang terjadi pada objek audit ?', 'Notulen rapat pembahasan penetapan pedoman manajemen perubahan SPBE instansi atau rapat pembahasan perencanaan perubahan.', 'Pedoman Manajemen Perubahan yang sudah ditetapkan pimpinan instansi, yang mengatur perencanaan perubahan SPBE.', 'Dokumen Perencanaan perubahan pada objek audit'),
('Indikator 34', 'Manajemen', 'Pengembangan TIK', 'Manajemen Perubahan', 'Bagaimana Instansi melakukan analisis perubahan pada objek audit?', 'Notulen rapat pembahasan penetapan pedoman manajemen perubahan SPBE instansi atau rapat pembahasan analisis perubahan objek audit..', 'Pedoman Manajemen Perubahan yang sudah ditetapkan pimpinan instansi, yang mengatur analisis perubahan SPBE.', 'Laporan pelaksanaan analisis perubahan pada objek audit'),
('Indikator 35', 'Manajemen', 'Pengembangan TIK', 'Manajemen Perubahan', 'Bagaimana instansi melakukan pengembangan perubahan pada objek audit?', 'Notulen rapat pembahasan penetapan pedoman manajemen perubahan SPBE instansi atau rapat pembahasan pengembangan perubahan objek audit.', 'Pedoman Manajemen Perubahan yang sudah ditetapkan pimpinan instansi, yang mengatur pengembangan perubahan SPBE.', 'Laporan pelaksanaan pengembangan perubahan objek audit sesuai pedoman manajemen perubahan.'),
('Indikator 36', 'Manajemen', 'Pengembangan TIK', 'Manajemen Perubahan', 'Bagaimana instansi melakukan implementasi perubahan pada objek audit?', 'Notulen rapat pembahasan penetapan pedoman manajemen perubahan SPBE instansi atau rapat pembahasan implementasi perubahan objek audit.', 'Pedoman Manajemen Perubahan yang sudah ditetapkan pimpinan instansi, yang mengatur implementasi perubahan SPBE.', 'Laporan pelaksanaan implementasi perubahan objek audit'),
('Indikator 37', 'Manajemen', 'Pengembangan TIK', 'Manajemen Perubahan', 'Bagaimana instansi mengevaluasi dan memantau perubahan yang telah dilakukan pada objek audit?', 'Notulen rapat pembahasan penetapan pedoman manajemen perubahan SPBE instansi atau rapat evaluasi dan pemantauan perubahan pada objek audit.', 'Pedoman Manajemen Perubahan yang sudah ditetapkan pimpinan instansi, yang mengatur evaluasi dan pemantauan perubahan SPBE', 'Laporan pelaksanaan pemantauan dan evaluasi perubahan objek audit'),
('Indikator 38', 'Manajemen', 'Pengembangan TIK', 'Manajemen Aset', 'Bagaimana instansi melakukan perencanaan kebutuhan aset TIK?', 'Notulen rapat pembahasan penetapan pedoman manajemen Aset TIK instansi atau rapat perencanaan kebutuhan objek audit.', 'Pedoman Manajemen aset TIK yang sudah ditetapkan pimpinan instansi, yang mengatur perencanaan aset TIK. /Arsitektur aplikasi SPBE', 'Dokumen perencanaan aset TIK objek audit'),
('Indikator 39', 'Manajemen', 'Pengembangan TIK', 'Manajemen Aset', 'Bagaimana instansi melakukan pengadaan Aset TIK (sesuai objek audit)?', 'Notulen rapat pembahasan penetapan pedoman manajemen Aset TIK instansi atau rapat pengadaan objek audit.', 'Pedoman Manajemen aset TIK yang sudah ditetapkan pimpinan instansi, yang mengatur pengadaan aset TIK. /Arsitektur aplikasi SPBE', 'Dokumen pengadaan aset TIK objek audit'),
('Indikator 4', 'Tata Kelola', 'Tata Kelola', 'Pengarahan Tata Kelola TIK', 'Bagaimana instansi memberikan tugas dan wewenang terkait SPBE di setiap unit kerja (Tim koordinasi SPBE instansi)?', 'Surat Undangan / Notulen rapat yang membahas kebijakan internal tim koordinasi SPBE atau membahas koordinasi SPBE antar unit keria.', 'Kebijakan Internal Tim Koordinasi SPBE instansi (Indikator 10).', 'Terdapat unit kerja yang mengoperasionalkan objek audit (Indikator 19)'),
('Indikator 40', 'Manajemen', 'Pengembangan TIK', 'Manajemen Aset', 'Bagaimana instansi melakukan pengelolaan aset TIK yang dimiliki ?', 'Notulen rapat pembahasan penetapan pedoman manajemen Aset TIK instansi atau rapat pengelolaan objek audit.', 'Pedoman Manajemen aset TIK yang sudah ditetapkan pimpinan instansi, yang mengatur pengelolaan aset TIK. /Arsitektur aplikasi SPBE', 'Dokumen pengelolaan aset TIK objek audit'),
('Indikator 41', 'Manajemen', 'Pengembangan TIK', 'Manajemen Aset', 'Bagaimana cara instansi melakukan penghapusan aset TIK yang dimiliki?', 'Notulen rapat pembahasan penetapan pedoman manajemen Aset TIK instansi atau rapat penghapusan objek audit.', 'Pedoman Manajemen aset TIK yang sudah ditetapkan pimpinan instansi, yang mengatur penghapusan aset TIK. /Arsitektur aplikasi SPBE', 'Dokumen penghapusan aset TIK objek audit'),
('Indikator 42', 'Manajemen', 'Pengoperasian TIK', 'Manajemen Operasional Layanan', 'Bagaimana memberikan bantuan terhadap permintaan layanan?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan pemberian bantuan terhadap permintaan layanan objek audit.', 'Pedoman Manajemen Layanan yang telah ditetapkan pimpinan instansi yang mengatur pemberian bantuan terhadap permintaan layanan /Arsitektur Layanan SPBE', 'Formulir permintaan layanan objek audit'),
('Indikator 43', 'Manajemen', 'Pengoperasian TIK', 'Manajemen Operasional Layanan', 'Bagaimana melakukan penanganan gangguan layanan?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan penanganan gangguan layanan objek audit.', 'Pedoman Manajemen Layanan yang telah ditetapkan pimpinan instansi yang mengatur penanganan gangguan layanan /Arsitektur Layanan SPBE', 'Formulir penanganan gangguan layanan objek audit'),
('Indikator 44', 'Manajemen', 'Pengoperasian TIK', 'Manajemen Operasional Layanan', 'Bagaimana melakukan pemantauan dan pemeliharaan layanan?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan pemantauan dan pemeliharaan layanan objek audit.', 'Pedoman Manajemen Layanan yang telah ditetapkan pimpinan instansi yang mengatur pemantauan dan pemeliharaan layanan /Arsitektur Layanan SPBE', 'Laporan Ketersediaan Layanan objek audit'),
('Indikator 45', 'Manajemen', 'Pengoperasian TIK', 'Manajemen Operasional Layanan', 'Bagaimana melakukan pemulihan layanan?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan pemulihan layanan objek audit.', 'Pedoman Manajemen Layanan yang telah ditetapkan pimpinan instansi yang mengatur pemulihan layanan /Arsitektur Layanan SPBE', 'Laporan Evaluasi DRP objek audit'),
('Indikator 46', 'Manajemen', 'Pengoperasian TIK', 'Manajemen Operasional Layanan', 'Bagaimana melakukan rilis layanan secara terkendali untuk meminimalkan terjadinya dampak operasional?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan rilis layanan objek audit.', 'Pedoman Manajemen Layanan yang telah ditetapkan pimpinan instansi yang mengatur rilis layanan /Arsitektur Layanan SPBE', 'Dokumen rencana rilis objek audit'),
('Indikator 47', 'Manajemen', 'Pengoperasian TIK', 'Manajemen Operasional Layanan', 'Bagaimana melakukan evaluasi keseluruhan pelaksanaan kegiatan operasional layanan?', 'Notulen rapat pembahasan penetapan pedoman manajemen layanan SPBE instansi atau rapat pembahasan evaluasi pelaksanaan operasional layanan objek audit.', 'Pedoman Manajemen Layanan yang telah ditetapkan pimpinan instansi yang mengatur evaluasi pelaksanaan operasional layanan /Arsitektur Layanan SPBE', 'Laporan evaluasi (keseluruhan pelaksanaan kegiatan operasional layanan) objek audit'),
('Indikator 48', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Persyaratan Layanan [Business Requirement)', 'Bagaimana atribut metadata proses bisnis instansi?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan metadata proses bisnis objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur proses bisnis dan layanan. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Arsitektur proses bisnis instansi yang menggambarkan layanan objek audit'),
('Indikator 49', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Persyaratan Layanan [Business Requirement)', 'Bagaimana proses pengusulan layanan/fungsi pada awal perencanaan aplikasi?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pengusulan proposal objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur pengusulan aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen perencanaan aplikasi yang berisi layanan sesuai proses bisnis objek audit'),
('Indikator 5', 'Tata Kelola', 'Tata Kelola', 'Pengarahan Tata Kelola TIK', 'Bagaimana kolaborasi instansi dengan stakeholder (internal dan eksternal) termasuk kolaborasi aplikasi SPBE?', 'Surat Undangan / Notulen rapat yang membahas kebijakan kolaborasi antar aplikasi internal dan eskternal atau penerapan kolaborasi (koordinasi).', '1. Kebijakan internal arsitektur aplikasi SPBE; 2. Kolaborasi aplikasi SPBE terkait obyek audit baik internal maupun eksternal (terlihat dalam metadata aplikasi pada arsitektur aplikasi).', 'Terdapat objek audit dalam arsitekur aplikasi yang menggambarkan kolaborasi aplikasi internal dan eksternal (katalog API)'),
('Indikator 50', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Persyaratan Layanan [Business Requirement)', 'Jelaskan secara rinci kebutuhan dan pemetaan hak akses pengguna beserta perannya (user role management)!', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan hak akses pengguna objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur pengguna aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen yang berisi pemetaan hak akses pengguna objek audit'),
('Indikator 51', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Persyaratan Layanan [Business Requirement)', 'Jelaskan ruang lingkup kebutuhan fungsional dan non-fungsional dari aplikasi!', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan fungsional dan non-fungsional objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur fungsional dan non-fungsional aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen penjelasan ruang lingkup kebutuhan fungsional dan non-fungsional objek audit'),
('Indikator 52', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Persyaratan Layanan [Business Requirement)', 'Bagaimana arsitektur aplikasi mendeskripsikan keterkaitan antara proses bisnis, data, dan informasi sebagai layanan yang terintegrasi?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan keterpaduan layanan objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur proses bisnis dan layanan serta data yang dibutuhkan dan dihasilkan. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Gambaran dan penjelasan relasional arsitektur objek audit sebagai layanan yang terintegrasi antara proses bisnis, layanan, data dan informasi.'),
('Indikator 53', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Persyaratan Layanan [Business Requirement)', 'Apakah lisensi yang digunakan pada Aplikasi tidak membatasi jumlah dan jenis pengguna, jumlah perangkat, jumlah sumber daya, ukuran data, dan wilayah geografis?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan lisensi pada objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur lisensi aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Perjanjian tingkat layanan / Service Level Agreement objek audit'),
('Indikator 54', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Kebutuhan Aplikasi [Software Requirement)', 'Apa saja proses / fungsi / layanan yang dapat dilakukan oleh aplikasi?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan fungsi objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur fungsi aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen proposal perencanaan aplikasi yang menjelaskan fungsi objek audit'),
('Indikator 55', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Kebutuhan Aplikasi [Software Requirement)', 'Apa saja proses / fungsi / layanan yang dapat dilakukan oleh aplikasi?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan fungsi objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur fungsi aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen proposal perencanaan aplikasi yang menjelaskan fungsi objek audit'),
('Indikator 56', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Kebutuhan Aplikasi [Software Requirement)', 'Bagaimana penggambaran interaksi antar komponen yang ada pada aplikasi dengan antarmuka (interface), dan apakah navigasi dari layar ke layar sesuai dengan tingkatan pengguna?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan antar muka internal dan eksternal objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur lisensi aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen kebutuhan antar muka internal dan eksternal objek audit'),
('Indikator 57', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Kebutuhan Aplikasi [Software Requirement)', 'Jelaskan kemampuan kerja yang dapat dicapai oleh aplikasi!', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan kemampuan kerja objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur kemampuan kerja aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen kebutuhan khusus terkait kemampuan kerja objek audit'),
('Indikator 58', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Kebutuhan Aplikasi [Software Requirement)', 'Bagaimana penggambaran/penjelasan atribut metadata yang terkait pada aplikasi?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan metadata aplikasi objek audit', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur lmetadata aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen kebutuhan khusus terkait atribut metadata aplikasi objek audit'),
('Indikator 59', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Rancangan Aplikasi [Software Design)', 'Apakah aplikasi dirancang dengan memperhatikan skalabilitas dan performa untuk mengakomodasi pertumbuhan jumlah akses dan data di masa depan?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan batasan khusus objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur batasan khusus aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen kebutuhan khusus terkait skalabilitas dan kinerja objek audit'),
('Indikator 6', 'Tata Kelola', 'Tata Kelola', 'Pengendalian TIK', 'Bagaimana instansi melaksanakan pengendalian SPBE internal?', 'Surat Undangan / Notulen rapat yang membahas kebijakan pengendalian SPBE internal atau penerapan pengendalian (koordinasi).', 'Kebijakan Pengendalian internal SPBE sesuai Sistem Pengendalian Internal Pemerintah.', 'Pelaksanaan pengendalian internal SPBE pada objek audit dilakukan sesuai kebijakan'),
('Indikator 60', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Rancangan Aplikasi [Software Design)', 'Apakah memiliki dokumen mengenai deskripsi rancangan detil teknis basisdata dari aplikasi (detail of database engineering design)?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan batasan khusus objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur batasan khusus aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen deskripsi rancangan detil teknis basisdata objek audit'),
('Indikator 61', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Rancangan Aplikasi', 'Bagaimana pemetaan dan keterhubungan antar fungsi dan basis data dalam aplikasi beserta kepemilikan basisdata input dan outputnya?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan batasan khusus objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur batasan khusus aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen deskripsi rancangan detil teknis basisdata aplikasi yang menggambarkan kepemilikan basis data input dan output objek audit'),
('Indikator 62', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Rancangan Aplikasi', 'Bagaimana bentuk arsitektur aplikasi sehingga dapat menggambarkan keseluruhan sistem, proses bisnis, dan layanan aplikasi?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan batasan khusus objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur batasan khusus aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen yang menggambarkan relasi proses bisnis dan layanan objek audit'),
('Indikator 63', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Rancangan Aplikasi', 'Apakah aplikasi dirancang dengan menggunakan komponen-komponen yang bersifat modular pada data, logika komputasi, dan antarmuka?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan batasan khusus objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur batasan khusus aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen deskripsi rancangan aplikasi tingkat rendah pada objek audit'),
('Indikator 64', 'Fungsionalitas dan Kinerja', 'Perencanaan', 'Rancangan Aplikasi', 'Jelaskan arsitektur/rancangan aplikasi yang bersifat service-oriented architecture dan/atau microservices yang diintegrasikan dengan aplikasi lainnya?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan batasan khusus objek audit.', '1. Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur layanan microservices aplikasi. 2. Arsitektur Proses Bisnis instansi 3. Arsitektur Aplikasi instansi', 'Dokumen kebutuhan khusus terkait arsitektur layanan microservices pada objek audit'),
('Indikator 65', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Implementasi Aplikasi', 'Jelaskan metode-metode pengembangan perangkat lunak yang digunakan dalam pengembangan aplikasi!', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan metode pengembangan objek audit.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur metode pengembangan aplikasi', 'Dokumen penjelasan metode pengembangan aplikasi yang digunakan untuk pengembangan objek audit'),
('Indikator 66', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Implementasi Aplikasi', 'Apakah sudah memiliki dokumentasi aplikasi yang memuat penjelasan dari setiap fungsi kode sumber, Metadata, kamus data, format data, dan lain sebagainya?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan fungsi setiap kode sumber serta format data objek audit.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur fungsi kode sumber, format data.', 'Dokumentasi objek audit yang memuat penjelasan setiap fungsi kode sumber, kamus data dan format data objek audit'),
('Indikator 67', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Implementasi Aplikasi', 'Bagaimana aplikasi dapat digunakan kembali secara berkesinambungan di masa yang akan datang?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan daftar komponen objek audit yang dapat digunakan kembali di masa yang akan datang', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur repositori aplikasi', 'Dokumen Daftar komponen aplikasi objek audit yang dapat dimanfaatkan kembali di masa yang akan datang'),
('Indikator 68', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Implementasi Aplikasi', 'Apakah kode sumber aplikasi dapat dimodifikasi / open source dan memiliki kemampuan untuk dapat diintegrasikan dengan layanan SPBE lainnya', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan bagian objek audit yang dapat diintegrasikan dengan aplikasi lainnya.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur kemampuan untuk dapat diintegrasikan dengan layanan SPBE lainnya.', 'Dokumentasi kode sumber yang mampu diintegrasikan pada objek audit'),
('Indikator 69', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Implementasi Aplikasi', 'Apakah kode aplikasi bersifat modular dan memenuhi syarat fungsional dan non-fungsional?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan daftar katalog atau library objek audit.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur sifat aplikasi yang modular', 'Dokumen penjelasan daftar katalog atau library kode sumber objek audit'),
('Indikator 7', 'Manajemen', 'Perencanaan TIK', 'Manajemen Resiko', 'Bagaimana instansi melakukan identifikasi dan analisis risiko TIK/SPBE (sesuai objek audit)?', 'Notulen rapat pembahasan penetapan pedoman manajemen risiko SPBE instansi atau rapat pembahasan penerapan manajemen risiko pada objek audit.', 'Kebijakan internal/ Panduan Manajemen Risiko SPBE instansi', 'Formulir Identifikasi Risiko dan Analisis Risiko Objek Audit'),
('Indikator 70', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Implementasi Aplikasi', 'Bagaimana sistem pencatatan aktifitas rekam jejak (log file) yang ada pada aplikasi untuk kepentingan pemantauan, evaluasi, audit, dan investigasi?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan log file objek audit.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur rekam jejak (log file)', 'Dokumen penjelasan pencatatan log file objek audit'),
('Indikator 71', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Implementasi Aplikasi', 'Bagaimana instansi menyimpan kode sumber dan dokumentasi aplikasi? Apakah disimpan oleh instansi secara langsung atau dititipkan kepada pihak ketiga yang terpercaya?', 'Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan tempat penyimpanan kode sumber objek audit.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur tempat penyimpanan kode sumber', 'Dokumen penjelasan tempat penyimpanan kode sumber dan dokumentasi objek audit'),
('Indikator 72', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Pengujian (Testing)', 'Jelaskan perencanaan dan metodologi uji fungsi aplikasi!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan rencana dan metoda uji fungsi aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur pelaksanaan uji fungsi aplikasi', 'Gambaran dan penjelasan rencana pengujian'),
('Indikator 73', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Pengujian (Testing)', 'Jelaskan hasil uji fungsi aplikasi!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan hasil uji fungsi aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur pelaksanaan uji fungsi aplikasi', 'Dokumen hasil uji fungsi objek audit'),
('Indikator 74', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Pengujian (Testing)', 'Jelaskan perencanaan dan metodologi uji beban aplikasi!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan rencana dan metoda uji beban aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur pelaksanaan uji beban aplikasi', 'Dokumen perencanaan dan metodologi uji fungsi beban audit'),
('Indikator 75', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Pengujian (Testing)', 'Jelaskan hasil uji beban aplikasi!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan hasil uji beban aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur pelaksanaan uji beban aplikasi', 'Dokumentasi hasil uji beban objek audit'),
('Indikator 76', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Pengujian (Testing)', 'Jelaskan perencanaan dan metodologi uji integrasi aplikasi!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan rencana dan metoda uji integrasi aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur pelaksanaan uji integrasi aplikasi', 'Dokumen perencanaan dan metodologi uji integrasi audit'),
('Indikator 77', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Pengujian (Testing)', 'Jelaskan hasil uji integrasi aplikasi!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan hasil uji integrasi aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur pelaksanaan uji integrasi aplikasi', 'Dokumentasi hasil uji integrasi objek audit'),
('Indikator 78', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Instalasi/Pemasangan', 'Jelaskan prosedur instalasi (pemasangan) aplikasi!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan prosedur pemasangan aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur prosedur instalasi aplikasi', 'Gambaran dan penjelasan prosedur instalasi objek audit'),
('Indikator 79', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Instalasi/Pemasangan', 'Apakah sudah memiliki daftar personil yang bertugas untuk melakukan instalasi/pemasangan aplikasi?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan daftar personil yang melakukan pemasangan aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur daftar personil yang bertugas instalasi aplikasi', 'Daftar SDM, kompetensi dan tugas personil dalam melakukan instalasi objek audit'),
('Indikator 8', 'Manajemen', 'Perencanaan TIK', 'Manajemen Resiko', 'Bagaimana instansi melakukan evaluasi risiko TIK/SPBE (sesuai objek audit)?', 'Notulen rapat pembahasan penetapan pedoman manajemen risiko SPBE instansi atau rapat pembahasan penerapan manajemen risiko pada objek audit.', 'Kebijakan internal/ Panduan Manajemen Risiko SPBE instansi', 'Formulir Evaluasi Risiko Objek Audit'),
('Indikator 80', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Instalasi/Pemasangan', 'Jelaskan rencana pelatihan terhadap personil yang melakukan instalasi (pemasangan) aplikasi!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan rencana pelatihan personil yang melakukan pemasangan aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur pelatihan personil yang melakukan instalasi aplikasi', 'Dokumen yang menjelaskan rencana pelatihan pemasangan aplikasi objek audit'),
('Indikator 81', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Instalasi/Pemasangan [Installation)', 'Jelaskan jadwal instalasi (pemasangan) aplikasi!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan jadwal pemasangan aplikasi', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur jadwal instalasi aplikasi', 'Dokumen yang menjelaskan jadwal instalasi objek audit'),
('Indikator 82', 'Fungsionalitas dan Kinerja', 'Pengembangan', 'Instalasi/Pemasangan [Installation)', 'Jelaskan daftar fasilitas yang dibutuhkan selama proses instalasi (pemasangan) aplikasi dilakukan!', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan daftar fasilitas pemasangan aplikasi.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur fasilitas yang dibutuhkan selama proses instalasi aplikasi', 'Dokumen yang menjelaskan daftar fasilitas instalasi objek audit'),
('Indikator 83', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Penggunaan Aplikasi [Software Usage)', 'Bagaimana aplikasi berkolaborasi dengan aplikasi lain?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan API/kolaborasi aplikasi.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur kolaborasi antar aplikasi', '1. Dokumentasi API objek audit 2. Daftar layanan yang terhubung ke objek audit'),
('Indikator 84', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Penggunaan Aplikasi [Software Usage)', 'Apakah memiliki manual aplikasi?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan manual aplikasi.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur manual aplikasi', '1. manual penggunaan aplikasi bagi administrator objek audit; 2. manual penggunaan aplikasi bagi pengguna objek audit;'),
('Indikator 85', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Penggunaan Aplikasi [Software Usage)', 'Bagaimana aplikasi menyediakan fasilitas helpdesk untuk layanan bantuan bisnis dan teknis terkait Aplikasi?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan fasilitas helpdesk (layanan bantuan) aplikasi.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur layanan bantuan bisnis kepada pengguna aplikasi dan teknis aplikasi', 'Dokumen log/proses layanan bantuan (help desk) proses bisnis dan teknis operasional objek audit'),
('Indikator 86', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Penggunaan Aplikasi [Software Usage)', 'Bagaimana menyusun Pertanyaan yang Sering Diajukan (Frequently Asked Questions) untuk pengguna aplikasi?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan FAQ aplikasi.', 'Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi yang mengatur FAQ proses bisnis kepada pengguna dan teknis aplikasi', 'Dokumen Daftar FAQ proses bisnis dan teknis operasional objek audit'),
('Indikator 87', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Infrastruktur Pendukung Aplikasi', 'Bagaimana infrastruktur yang dimiliki memenuhi kesesuaian dengan kebutuhan kapasitas dan tingkat layanan?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan kebutuhan kapasita dan tingkat layanan.', '- Kebijakan Internal Layanan SPLP terkait pengoperasian - Kebijakan Internal Layanan Pusat Data terkait pengoperasian - Kebijakan Internal Layanan JIP terkait pengoperasian', 'Dokumen perencanaan infrastruktur sesuai kebutuhan kapasitas aplikasi dan tingkat layanan objek audit'),
('Indikator 88', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Infrastruktur Pendukung Aplikasi', 'Bagaimana aplikasi memanfaatkan teknologi cloud pada pusat Data Nasional atau pada pihak ketiga, untuk penempatan dan penyimpanan data?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan PDN untuk aplikasi', 'Kebijakan Internal Layanan Pusat Data dan dokumen layanan pusat data instansi', 'Bukti keterhubungan objek audit dengan Pusat Data Nasional');
INSERT INTO `komponen_penilaian` (`id_kontrol`, `domain`, `tahapan`, `aktivitas`, `indikator`, `level_1`, `level_2`, `level_3`) VALUES
('Indikator 89', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Infrastruktur Pendukung Aplikasi', 'Bagaimana aplikasi yang dimiliki terhubung dengan Layanan Interoperabilitas Data (LID) IPPD dan/atau LID Nasional?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan Layanan interoperabilitas yang terhubung ke aplikasi.', 'Kebijakan Internal Layanan SPLP dan dokumen layanan SPLP instansi', 'Bukti keterhubungan objek audit dengan SPLP Nasional'),
('Indikator 9', 'Manajemen', 'Perencanaan TIK', 'Manajemen Resiko', 'Bagaimana instansi melakukan penanganan risiko TIK/SPBE (sesuai objek audit)?', 'Notulen rapat pembahasan penetapan pedoman manajemen risiko SPBE instansi atau rapat pembahasan penerapan manajemen risiko pada objek audit.', 'Kebijakan internal/ Panduan Manajemen Risiko SPBE instansi', 'Formulir Penanganan Risiko Objek Audit'),
('Indikator 90', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Infrastruktur Pendukung Aplikasi', 'Isikan atribut Metadata Sistem Penghubung Layanan Pemerintah dimana aplikasi yang sedang diaudit terkoneksi.', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan Metadata Sistem Penghubung Layanan dimana aplikasi yang sedang diaudit terkoneksi.', 'Kebijakan Arsitektur Infrastruktur SPBE dan arsitektur infrastruktur', 'Atribut metadata Sistem Penghubung Layanan objek audit'),
('Indikator 91', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Infrastruktur Pendukung Aplikasi', 'Isikan atribut Metadata Komputasi Awan / Fasilitas Komputasi dimana aplikasi yang sedang diaudit terkoneksi.', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan Metadata Komputasi Awan / Fasilitas Komputasi dimana aplikasi yang sedang diaudit terkoneksi.', 'Kebijakan Arsitektur Infrastruktur SPBE dan arsitektur infrastruktur', 'Atribut Metadata Komputasi Awan / Fasilitas Komputasi objek audit'),
('Indikator 92', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Utilitas/Kinerja Jaringan', 'Bagaimana prosedur pengoperasian jaringan intra yang digunakan aplikasi menghubungkan antar simpul jaringan secara berjenjang?', 'Surat Undangan / Notulen rapat yang membahas kinerja jaringan aplikasi yang di audit atau simpul jaringan.', 'Kebijakan internal layanan JIP instansi dan layanan JIP instnasi serta Arsitektur Infrastruktur SPBE', '- Prosedur pengoperasian JIP; - Konfigurasi jaringan.'),
('Indikator 93', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Utilitas/Kinerja Jaringan', 'Bagaimana prosedur dan dokumentasi jika terjadi gangguan dan penanganannya dalam rangka pengoperasian jaringan?', 'Surat Undangan / Notulen rapat yang membahas kinerja jaringan aplikasi yang di audit atau penanganan gangguan dalam rangka pengoperasian jaringan.', 'Kebijakan internal layanan JIP instansi dan layanan JIP instnasi serta Arsitektur Infrastruktur SPBE', 'Dokumen Prosedur penanganan gangguan jaringan; dan Rekam jejak penanganan gangguan jaringan yang digunakan objek audit'),
('Indikator 94', 'Fungsionalitas dan Kinerja', 'Pengoperasian', 'Utilitas/Kinerja Jaringan', 'Isikan atribut Metadata Jaringan Intra Pemerintah dimana aplikasi yang sedang diaudit terkoneksi.', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan Metadata Jaringan Intra Pemerintah dimana aplikasi yang sedang diaudit terkoneksi.', 'Kebijakan internal layanan JIP instansi dan layanan JIP instnasi serta Arsitektur Infrastruktur SPBE', 'Atribut metadata Jaringan Intra Pemerintah yang digunakan objek audit'),
('Indikator 95', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Pemeliharaan Aplikasi', 'Bagaimana melaksanakan pemeliharaan perfektif, pemeliharaan aplikasi berupa penambahan atau penyempurnaan aplikasi ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pemeliharaan perfektif aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur pemeliharaan perfektif aplikasi.', 'Dokumen pemeliharaan aplikasi berupa penambahan atau penyempurnaan objek audit.'),
('Indikator 96', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Pemeliharaan Aplikasi', 'Bagaimana melaksanakan pemeliharaan adaptif, yang merupakan pemeliharaan adaptasi aplikasi terhadap teknologi ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pemeliharaan adaptif aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur pemeliharaan adaptif aplikasi.', 'Dokumen pemeliharaan aplikasi berupa penyesuaian dengan lingkungan operasional baru, dan penerapan protokol baru pada objek audit.'),
('Indikator 97', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Pemeliharaan Aplikasi', 'Bagaimana melaksanakan pemeliharaan korektif, yang merupakan perbaikan aplikasi terhadap permasalahan yang timbul setelah aplikasi digunakan ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pemeliharaan korektif aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur pemeliharaan korektif aplikasi.', 'Dokumen pemeliharaan aplikasi berupa perbaikan terhadap permasalahan yang timbul setelah objek audit digunakan.'),
('Indikator 98', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Pemeliharaan Aplikasi', 'Bagaimana pemeliharaan preventif, yang merupakan pemeriksaan aplikasi secara berkala untuk mengantisipasi permasalahan ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pemeliharaan preventif aplikasi.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur pemeliharaan preventif aplikasi.', 'Dokumen pemeliharaan aplikasi berupa penyesuaian dengan lingkungan operasional baru, dan penerapan protokol baru pada objek audit.'),
('Indikator 99', 'Fungsionalitas dan Kinerja', 'Pemeliharaan', 'Pemeliharaan Aplikasi', 'Unit kerja mana yang harus melaksanakan pemeliharaan aplikasi ?', 'Undangan/Notulen rapat pembahasan penetapan Kebijakan Pembangunan dan Pengembangan Aplikasi SPBE instansi atau rapat pembahasan pemeliharaan aplikasi antar unit kerja.', 'Kebijakan Internal Pembangunan dan Pengembangan Aplikasi yang mengatur unit kerja pelaksana pemeliharaan aplikasi.', 'Dokumen kebijakan yang menggambarkan unit kerja yang melaksanakan pemeliharaan objek audit');

-- --------------------------------------------------------

--
-- Table structure for table `risiko`
--

CREATE TABLE `risiko` (
  `kode_risiko` varchar(50) NOT NULL,
  `kode_aset` varchar(50) DEFAULT NULL,
  `penyebab` text,
  `dampak` text,
  `nilai_frekuensi` int DEFAULT NULL,
  `nilai_risiko` int DEFAULT NULL,
  `total_frekuensi_risiko` int DEFAULT NULL,
  `mitigasi_penyebab` text,
  `mitigasi_dampak` text
);

--
-- Dumping data for table `risiko`
--

INSERT INTO `risiko` (`kode_risiko`, `kode_aset`, `penyebab`, `dampak`, `nilai_frekuensi`, `nilai_risiko`, `total_frekuensi_risiko`, `mitigasi_penyebab`, `mitigasi_dampak`) VALUES
('RISK_6858c18790fe5', 'AST003', 'Dokumen rusak atau hilang', 'Proses audit terganggu', 3, 4, 8, 'Digitalisasi dokumen', 'Backup berkala'),
('RISK_6858c1a7df935', 'AST001', 'Kegagalan daya', 'Downtime sistem', 4, 3, 12, 'Instalasi UPS', 'Failover system'),
('RISK_6858c1b137789', 'AST002', 'Kehilangan perangkat', 'Kebocoran data', 3, 5, 15, 'Labelisasi dan tracking', 'Enkripsi data'),
('RISK_R004', 'AST004', 'Bug dalam aplikasi', 'Hasil audit tidak akurat', 4, 4, 16, 'Pengujian rutin', 'Rollback version'),
('RISK_R005', 'AST005', 'Koneksi tidak stabil', 'Akses audit terhambat', 3, 3, 9, 'Provider cadangan', 'Monitoring koneksi');

-- --------------------------------------------------------

--
-- Table structure for table `temuan`
--

CREATE TABLE `temuan` (
  `id_temuan` int NOT NULL,
  `kode_audit` varchar(500) DEFAULT NULL,
  `temuan` varchar(500) DEFAULT NULL,
  `rekomendasi` varchar(500) DEFAULT NULL
);

--
-- Dumping data for table `temuan`
--

INSERT INTO `temuan` (`id_temuan`, `kode_audit`, `temuan`, `rekomendasi`) VALUES
(3, 'Peraencanaan Teknologi Informasi', 'Admin Tidak Kompeten dalam penggunaan aplikasi', 'Segera dapatkan jadwal diklat dan daftarkan admin yang masih belum kompeten'),
(4, 'Audit Pengembangan  Teknologi Infromasi', 'Belum terdapat SOP untuk rilis layanan', 'Buat SOP untuk rilis layanan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('auditor','auditee','admin') NOT NULL
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'auditor_mf', 'password', 'auditor'),
(2, 'auditor_tys', 'password', 'auditor'),
(3, 'auditor_kt', 'password', 'auditor'),
(4, 'auditor_dp', 'password', 'auditor'),
(5, 'auditor_ma', 'password', 'auditor'),
(6, 'auditor_h', 'password', 'auditor'),
(7, 'auditee_dj', 'password', 'auditee'),
(8, 'auditee_zj', 'password', 'auditee'),
(9, 'auditee_zi', 'password', 'auditee'),
(10, 'auditee_ls', 'password', 'auditee'),
(11, 'auditee_f', 'password', 'auditee'),
(12, 'auditee_ph', 'password', 'auditee'),
(13, 'auditee_leni', '$2y$10$MiVkFt3Xk92M/W4MuBN33OS5tQdr2T3mWzZQhM3rDjSRqNk.SvIMW', 'auditee'),
(14, 'auditee_zakir', '$2y$10$4Luvk9ZG.jv7jvMQ0guNeuvNn7Qa6Cl8w2wB/qTDpnzYm.DPgECay', 'auditee'),
(15, 'admin', 'password', 'admin'),
(16, 'auditor 1', 'password', 'auditor');

-- --------------------------------------------------------

--
-- Structure for view `hasil_penilaian_view`
--
DROP TABLE IF EXISTS `hasil_penilaian_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hasil_penilaian_view`  AS SELECT `aset`.`id_aset` AS `id_aset`, `aset`.`nama_aset` AS `nama_aset`, `risiko`.`nilai_risiko` AS `nilai_risiko`, `risiko`.`mitigasi_penyebab` AS `mitigasi_penyebab`, `risiko`.`mitigasi_dampak` AS `mitigasi_dampak`, `komponen_penilaian`.`indikator` AS `indikator`, (case when (`alokasi`.`penilaian_level` = 1) then 'Level 1' when (`alokasi`.`penilaian_level` = 2) then 'Level 2' when (`alokasi`.`penilaian_level` = 3) then 'Level 3' else 'Belum Dinilai' end) AS `level_terpenuhi` FROM (((`alokasi` join `aset` on((`alokasi`.`id_aset` = `aset`.`id_aset`))) join `risiko` on((`risiko`.`kode_aset` = `aset`.`kode_aset`))) join `komponen_penilaian` on((`komponen_penilaian`.`id_kontrol` = `alokasi`.`kode_kontrol`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_auditee`
--
ALTER TABLE `akun_auditee`
  ADD PRIMARY KEY (`id_auditee`) USING BTREE,
  ADD KEY `NIP` (`NIP`),
  ADD KEY `FK_akun_auditee_users` (`user_id`);

--
-- Indexes for table `akun_auditor`
--
ALTER TABLE `akun_auditor`
  ADD PRIMARY KEY (`id_auditor`),
  ADD KEY `FK_akun_auditor_users` (`id_user`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `FK_alat_akun_auditee` (`id_auditee`);

--
-- Indexes for table `alokasi`
--
ALTER TABLE `alokasi`
  ADD PRIMARY KEY (`kode_alokasi`),
  ADD KEY `FK_alokasi_aset_2` (`kode_risiko`),
  ADD KEY `FK_alokasi_komponen_penilaian` (`kode_kontrol`),
  ADD KEY `FK_alokasi_dokumen` (`id_dokumen`),
  ADD KEY `FK_alokasi_jadwal` (`id_jadwal`),
  ADD KEY `FK_alokasi_akun_auditor` (`id_auditor`),
  ADD KEY `FK_alokasi_alat` (`kode_alat`),
  ADD KEY `FK_alokasi_aset` (`id_aset`) USING BTREE;

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD UNIQUE KEY `kode_aset` (`kode_aset`),
  ADD KEY `FK_aset_akun_auditee` (`id_auditee`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id_audit`),
  ADD UNIQUE KEY `kode_audit` (`kode_audit`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD UNIQUE KEY `kode_dokumen` (`kode_dokumen`),
  ADD KEY `FK_dokumen_akun_auditee` (`id_auditee`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `FK_jadwal_akun_auditee` (`id_auditee`);

--
-- Indexes for table `komponen_penilaian`
--
ALTER TABLE `komponen_penilaian`
  ADD PRIMARY KEY (`id_kontrol`);

--
-- Indexes for table `risiko`
--
ALTER TABLE `risiko`
  ADD PRIMARY KEY (`kode_risiko`),
  ADD KEY `kode_aset` (`kode_aset`);

--
-- Indexes for table `temuan`
--
ALTER TABLE `temuan`
  ADD PRIMARY KEY (`id_temuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_auditee`
--
ALTER TABLE `akun_auditee`
  MODIFY `id_auditee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `akun_auditor`
--
ALTER TABLE `akun_auditor`
  MODIFY `id_auditor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id_audit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `temuan`
--
ALTER TABLE `temuan`
  MODIFY `id_temuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun_auditee`
--
ALTER TABLE `akun_auditee`
  ADD CONSTRAINT `FK_akun_auditee_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `akun_auditor`
--
ALTER TABLE `akun_auditor`
  ADD CONSTRAINT `FK_akun_auditor_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `alat`
--
ALTER TABLE `alat`
  ADD CONSTRAINT `FK_alat_akun_auditee` FOREIGN KEY (`id_auditee`) REFERENCES `akun_auditee` (`id_auditee`);

--
-- Constraints for table `alokasi`
--
ALTER TABLE `alokasi`
  ADD CONSTRAINT `FK_alokasi_akun_auditor` FOREIGN KEY (`id_auditor`) REFERENCES `akun_auditor` (`id_auditor`),
  ADD CONSTRAINT `FK_alokasi_alat` FOREIGN KEY (`kode_alat`) REFERENCES `alat` (`id_alat`),
  ADD CONSTRAINT `FK_alokasi_aset` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`),
  ADD CONSTRAINT `FK_alokasi_dokumen` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`),
  ADD CONSTRAINT `FK_alokasi_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_kegiatan`),
  ADD CONSTRAINT `FK_alokasi_komponen_penilaian` FOREIGN KEY (`kode_kontrol`) REFERENCES `komponen_penilaian` (`id_kontrol`),
  ADD CONSTRAINT `FK_alokasi_risiko` FOREIGN KEY (`kode_risiko`) REFERENCES `risiko` (`kode_risiko`);

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `FK_aset_akun_auditee` FOREIGN KEY (`id_auditee`) REFERENCES `akun_auditee` (`id_auditee`);

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `FK_dokumen_akun_auditee` FOREIGN KEY (`id_auditee`) REFERENCES `akun_auditee` (`id_auditee`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_jadwal_akun_auditee` FOREIGN KEY (`id_auditee`) REFERENCES `akun_auditee` (`id_auditee`);

--
-- Constraints for table `risiko`
--
ALTER TABLE `risiko`
  ADD CONSTRAINT `risiko_ibfk_1` FOREIGN KEY (`kode_aset`) REFERENCES `aset` (`kode_aset`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
