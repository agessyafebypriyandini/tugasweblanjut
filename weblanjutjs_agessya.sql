-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 05:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weblanjutjs_agessya`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa_kirim`
--

CREATE TABLE `jasa_kirim` (
  `id` int(11) NOT NULL,
  `nama_jasa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jasa_kirim`
--

INSERT INTO `jasa_kirim` (`id`, `nama_jasa`) VALUES
(1, 'JNE'),
(2, 'J&T Ekspress'),
(3, 'SiCepat'),
(4, 'TIKI'),
(5, 'POS Indonesia'),
(6, 'Ninja Express'),
(7, 'Anteraja');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Kerajinan Tangan'),
(4, 'Souvenier');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `jasa_id` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `jasa_id`, `nama_kota`, `ongkos`) VALUES
(1, 1, 'Jakarta', 9000),
(2, 2, 'Jakarta', 10000),
(3, 3, 'Jakarta', 7000),
(4, 1, 'Surabaya', 12000),
(5, 2, 'Surabaya ', 14000),
(6, 3, 'Surabaya', 10000),
(7, 1, 'Bandung', 9000),
(8, 2, 'Bandung', 12000),
(9, 3, 'Bandung', 8000),
(10, 1, 'Semarang', 15000),
(11, 2, 'Semarang', 17000),
(12, 3, 'Semarang', 13000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kota_id`, `nama`, `telp`, `email`, `alamat`) VALUES
(1, 4, 'Ayu', '089517328129', 'ayuyuyua@gmail.com', 'Jalan Melati'),
(2, 8, 'Rudi', '081281203741', 'rudirudiii@gmail.com', 'Jalan Flamboyan'),
(3, 3, 'Dewi', '089612910216', 'dewiwiwi@gmail.com', 'Jalan Senopati'),
(4, 12, 'Joko', '087812934173', 'jokokojo@gmail.com', 'Jalan Ambarawa');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `jumlah` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `produk_id`, `pelanggan_id`, `tanggal_pesanan`, `jumlah`, `total`) VALUES
(1, 4, 1, '2022-06-13', 2, 110000),
(2, 17, 3, '2022-06-13', 3, 165000),
(3, 10, 4, '2022-06-13', 2, 10000),
(4, 6, 4, '2022-06-13', 2, 20000),
(5, 5, 4, '2022-06-13', 4, 60000),
(6, 15, 2, '2022-06-13', 2, 200000),
(7, 9, 2, '2022-06-13', 5, 100000),
(8, 14, 2, '2022-06-13', 5, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `detail` text NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kat_id`, `nama_produk`, `harga`, `stok`, `detail`, `gambar`) VALUES
(1, 1, 'Pecak Bandeng', 20000, 25, 'Pencak bandeng merupakan salah satu makanan khas Banten. Dahulu, makanan ini hanya dinikmati oleh Kesultanan Banten.', 'pecak.jpg'),
(2, 2, 'Sirup Rosella Fresh', 30000, 15, 'Sirup rosella fresh berasal dari Banten. Ciri khasnya segar dan alami.', 'rosella.jpg'),
(3, 3, 'Gerabah Bandalu', 150000, 20, 'Gerabah bandalu buatan warga Desa Bandalu. Selain berbentuk dan digunakan sebagi alat dapur, Gerabah bandulu mempunyai nilai seni. ', 'bandalu.jpg'),
(4, 4, 'Tas Koja Suku Baduy', 55000, 25, 'Tas koja merupakan tas yang dibuat oleh Suku Baduy di Banten. Tas ini terbuat dari kulit kayu Pohon Teureup atau Terap. ', 'koja.jpg'),
(5, 1, 'Kerak Telor', 15000, 20, 'Kerak telur adalah makanan asli daerah Jakarta (Betawi), dengan bahan utama beras ketan putih, telur ayam atau bebek, dan kelapa sangrai.', 'kerak.jpg'),
(6, 2, 'Es Selendang Mayang', 10000, 10, 'Es selendang mayang adalah salah satu minuman tradisional Indonesia asal Jakarta. ', 'mayang.jpg'),
(7, 3, 'Topeng Betawi ', 8000, 40, 'Ondel-ondel adalah bentuk pertunjukan rakyat Betawi. Bagian wajah berupa topeng dihiasi rambut yang buat dari ijuk. ', 'ondel.jpg'),
(8, 4, 'Gantungan Kunci Ondel - Ondel', 10000, 40, 'Ondel-ondel adalah bentuk pertunjukan rakyat Betawi. Tak jarang banyak yang membuat gantungan kunci.', 'ganciondel.jpg'),
(9, 1, 'Dodol Garut Manis', 20000, 50, 'Dodol Garut adalah camilan khas dari Kabupaten Garut, Jawa Barat. Banyak masyarakat yang menyukai camilan ini.', 'dodol.jpg'),
(10, 2, 'Bajigur', 5000, 25, 'Bajigur adalah minuman khas Sunda. Bahan utamanya adalah gula aren dan santan kelapa serta dapat ditambahkan jahe dan garam.', 'bajigur.jpg'),
(11, 3, 'Angklung', 100000, 30, 'Angklung adalah alat musik multitonal (bernada ganda) yang berkembang dari masyarakat Sunda yang terbuat dari bambu.', 'angklung.jpg'),
(12, 4, 'Gantungan Kunci Cepot', 25000, 20, 'Gantungan kunci cepot adalah gambaran tokoh wayang yang mempunyai kelakuan buruk namun setia.', 'gancicepot.jpg'),
(13, 1, 'Lumpia Semarang', 18000, 45, 'Lumpia semarang adalah makanan semacam rollade yang berisi rebung, telur, dan daging ayam atau udang.', 'lumpia.jpg'),
(14, 2, 'Es Dawet', 8000, 20, 'Dawet ayu adalah minuman khas dari Kabupaten Banjarnegara. Dawet ayu mudah ditemukan di pasar-pasar tradisional.', 'dawet.jpg'),
(15, 3, 'Batik Pekalongan', 100000, 30, 'Batik Pekalongan berasal dari Pekalongan, Jawa Tengah. Motif batik Pekalongan bervariasi seperti tumbuh-tumbuhan dan hewan.', 'batikpk.jpg'),
(16, 4, 'Magnet Kulkas Semarang', 45000, 20, 'Di Semarang banyak yang menjual magnet kulkas sebagai souvenier yang lucu dan menarik.', 'semarang.jpg'),
(17, 1, 'Gudeg', 55000, 30, 'Gudeg adalah  hidangan khas Provinsi Daerah Istimewa Yogyakarta yang terbuat dari nangka muda yang dimasak dengan santan. ', 'gudegjg.jpg'),
(18, 2, 'Es Semlo', 10000, 15, 'Es semlo adalah salah satu menu khas Keraton Yogyakarta. Konon, hidangan ini jadi favorit Sultan Hamengkubuwono IX. Es semlo banyak dijual di Jogja.', 'semlo.jpg'),
(19, 3, 'Blangkon dan Surjan', 85000, 15, 'Surjan memiliki 5 kancing baju melambangkan rukun Islam. Sedangkan blangkon melambangkan rukun iman.', 'blsj.jpg'),
(20, 4, 'Kaos Dagadu Djokdja', 100000, 30, 'PT. Aseli Dagadu Djokdja adalah sebuah merek dagang berupa suatu rancangan grafis yang dibuat terutama pada kaos.', 'kaos.jpg'),
(21, 1, 'Manco', 15000, 70, 'Kue manco merupakan jajanan tradisional yang mempunyai rasa manis dan gurih dapat dijumpai di daerah Trenggalek dan Madiun.', 'manco.jpg'),
(22, 2, 'Sirup Pokak', 35000, 30, 'Sirup Pokak adalah minuman yang berasal dari Probolinggo. Bahan-bahannya jahe, kayu manis, serai, cengkih, kapulaga, dan gula aren.', 'pokak.jpg'),
(23, 3, 'Piring Anyaman Lidi Rotan', 150000, 20, 'Piring lidi untuk acara hajatan atau ruang makan pribadi. sangat berkualitas terbaik karena di anyam secara rapat.', 'piring.jpg'),
(24, 4, 'Miniatur Patung Surabaya', 30000, 40, 'Miniatur Patung Surabaya adalah replika dari patung suro dan boyo besar yang ada di di pusat Surabaya.', 'surabaya.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'password', 'admin'),
(2, 'user', 'password', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa_kirim`
--
ALTER TABLE `jasa_kirim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jasa_id` (`jasa_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kat_id` (`kat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jasa_kirim`
--
ALTER TABLE `jasa_kirim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`jasa_id`) REFERENCES `jasa_kirim` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kat_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
