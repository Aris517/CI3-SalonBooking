-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2024 pada 14.44
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` enum('Admin','Customer','Pemilik') NOT NULL DEFAULT 'Customer',
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `email`, `password`, `role`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$pNMsdDCohIV.dAoRR./9l.omJ/CG4qioZ24H2G/rBfgmYq6mNYALy', 'Admin', 1),
(2, 'User', 'user@gmail.com', '$2y$10$cGOftiqWy0vWq0ol0Uf1D.lMMkfTODwSiIN/NtjwCrym5rUseQnWC', 'Customer', 1),
(3, 'Pemilik', 'pemilik@gmail.com', '$2y$10$x6XOlyBVQ4Vd28PYIIjr8.2msTA/0k0jLRXONf4NuPhf0r8oETfI6', 'Pemilik', 1),
(4, 'Lina', 'lina@gmail.com', '$2y$10$JfPgJ5ObQiblY/OC35R3YOJRWX82tmVCjKuDeuGM7O6QO/CvtqNNu', 'Customer', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `baju`
--

CREATE TABLE `baju` (
  `id` int(4) NOT NULL,
  `id_kategori_baju` int(4) NOT NULL,
  `nama_baju` varchar(40) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `baju`
--

INSERT INTO `baju` (`id`, `id_kategori_baju`, `nama_baju`, `harga_sewa`, `stok`, `foto`) VALUES
(4, 1, 'Kamboja', 100000, 2, '8a1a07608e0eb0ea31e4e1386ac141b1.jpeg'),
(5, 1, 'Edelweiss', 100000, 2, '5e164b444779ae81274775ebe59ac56f.jpeg'),
(7, 8, 'baju padang', 125000, 6, 'bajuku.jpg'),
(8, 1, 'Mawar', 100000, 2, 'c975a8be296454c377544af9b81c1bdf.jpeg'),
(9, 1, 'Lili', 100000, 1, '9b1d88f0176f1f39e0bcf2945926ba6e.jpeg'),
(10, 1, 'Sky blue', 100000, 1, 'a20c91e9e84c2f038a570f15e60bc4c6.jpeg'),
(11, 1, 'Klasik', 75000, 30, 'd823c0700b128043d75a562c87ccf6cd.jpeg'),
(12, 1, 'Azrina', 100000, 2, '6cb0ac0b8936f12731928165cb5dbc87.jpeg'),
(13, 1, 'Alysa', 100000, 1, '910e40ddb66e9b56f8dc3e5f9898b955.jpeg'),
(14, 1, 'Blossom', 100000, 1, 'f51050a0e83926f87a416a47422b4cc6.jpeg'),
(15, 1, 'Cempaka', 100000, 1, '5aaeba70d6daa82cbc04ec16ba9b02d5.jpeg'),
(16, 1, 'Hitam ', 100000, 2, '8607798d3205007db188ff524fe56b48.jpeg'),
(17, 1, 'Erika', 100000, 1, 'ab9e16a6403c8e3f9287fa57988038a0.jpeg'),
(18, 1, 'Flora', 100000, 1, '5da00ee7dd0018b8ded2804d644b7e11.jpeg'),
(19, 1, 'Clara', 100000, 1, '1fd2bb99ed997ec49a53116382228e8a.jpeg'),
(20, 4, 'Gladys', 100000, 1, '2350fde10e59823c8ef6f3ffd07d3416.jpeg'),
(21, 4, 'Hazel', 100000, 1, '91e0de07d6de6e4036ec6b387b6d99eb.jpeg'),
(22, 4, 'Celine', 100000, 1, 'b526968a4bca59f3ccb18707c2092a4d.jpeg'),
(23, 1, 'Pinkes', 75000, 1, '369d8ff83bc276cd36dba5ea0f8a82ce.jpeg'),
(24, 1, 'Peac', 75000, 1, '8778885ee6e85382fac1ab2e937c05c2.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_mua`
--

CREATE TABLE `booking_mua` (
  `id` int(11) NOT NULL,
  `id_mua` int(4) NOT NULL,
  `id_pelayanan` int(4) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `untuk_tgl` date NOT NULL,
  `jml_orang` int(3) NOT NULL,
  `tgl_booking` date NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `status` enum('Menunggu','Batal','Selesai') NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking_mua`
--

INSERT INTO `booking_mua` (`id`, `id_mua`, `id_pelayanan`, `id_akun`, `nama`, `no_hp`, `alamat`, `untuk_tgl`, `jml_orang`, `tgl_booking`, `total`, `status`) VALUES
(4, 1, 2, 1, 'Nurul Fadia ', '0895378173933', 'Jl Semangka Rt 5 Rw 2, Pedagangan, Dukuhwaru.', '2024-11-21', 1, '2024-06-11', 150000, 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_baju`
--

CREATE TABLE `kategori_baju` (
  `id` int(4) NOT NULL,
  `kategori_baju` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_baju`
--

INSERT INTO `kategori_baju` (`id`, `kategori_baju`) VALUES
(1, 'Kebaya'),
(3, 'pengantin'),
(4, 'Dress');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mua`
--

CREATE TABLE `mua` (
  `id` int(4) NOT NULL,
  `kategori_mua` varchar(40) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mua`
--

INSERT INTO `mua` (`id`, `kategori_mua`, `harga`, `deskripsi`) VALUES
(1, 'Wisuda', 150000, 'include hair do and free softlens, '),
(3, 'Pengantin', 500000, 'Free soflens and nail art'),
(4, 'Tari ', 100000, 'harga belum include face painting'),
(5, 'Karnaval', 150000, 'include face painting '),
(6, 'Acara adat', 130000, 'Request  gaya make up');

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id` tinyint(1) NOT NULL,
  `tipe` enum('sewa','mua') NOT NULL,
  `take_line` text NOT NULL,
  `header` text NOT NULL,
  `deskripsi` text NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id`, `tipe`, `take_line`, `header`, `deskripsi`, `banner`) VALUES
(1, 'mua', 'Make Up & Hair do By Nana', 'DEWI SALON', '<p>Booking jasa rias Dewi Salon sekarang juga sebelum slot penuh ya cantikk..setelah daftar booking selesai, segera hubungi admin untuk proses lebih lanjut, Terimakasih.</p>', 'e820f737ccbbf1549191b4d9fdbe7865.png'),
(2, 'sewa', 'Sewa Baju', 'DEWI SALON', '<p>Dengan banyak model kebaya yang disewakan di Dewi Salon kamu bisa lebih bebas memilih kebaya sesuai dengan gaya yang kamu sukai lohh, setelah mengirim isi form sewa segera hubungi admin untuk proses lebih lanjut.</p>', 'de76794fc5a9d6ae9524ebba72c51bb2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id` int(4) NOT NULL,
  `pelayanan` varchar(40) NOT NULL,
  `harga_layanan` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id`, `pelayanan`, `harga_layanan`, `deskripsi`) VALUES
(1, 'COD', 20000, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam voluptate cum amet, atque mollitia officia provident veritatis. Eius illo ab, ratione quibusdam adipisci nesciunt ullam autem officia! Minima, doloremque asperiores.'),
(2, 'Datang ke Toko', 0, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam voluptate cum amet, atque mollitia officia provident veritatis. Eius illo ab, ratione quibusdam adipisci nesciunt ullam autem officia! Minima, doloremque asperiores.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` tinyint(1) NOT NULL,
  `header` text NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `header`, `deskripsi`, `foto`) VALUES
(1, 'Dewi Salon', '<p>Selamat datang di Dewi Salon, pilihan terbaik Anda untuk kecantikan dan gaya di Kota Tegal. Kami adalah salon yang berkomitmen untuk memberikan layanan terbaik dalam bidang tata rias dan penyewaan busana, dengan tujuan membuat setiap momen spesial Anda menjadi tak terlupakan.</p>', '171fa4a4b16c5e67e2176987356a07a7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_baju`
--

CREATE TABLE `sewa_baju` (
  `id` int(11) NOT NULL,
  `id_baju` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `untuk_tgl` date NOT NULL,
  `jml_baju` int(3) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Menunggu','Batal','Selesai') NOT NULL DEFAULT 'Menunggu',
  `tgl_sewa` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sewa_baju`
--

INSERT INTO `sewa_baju` (`id`, `id_baju`, `id_pelayanan`, `id_akun`, `nama`, `no_hp`, `alamat`, `untuk_tgl`, `jml_baju`, `total`, `status`, `tgl_sewa`) VALUES
(3, 5, 2, 4, 'Putri Nur Amalina', '089618653445', 'jl Semanga Rt 5 Rw 2 Pedagangan ', '2024-06-14', 1, 100000, 'Menunggu', '2024-06-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tipe` enum('sewa','booking') NOT NULL,
  `id_tipe` int(5) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tipe`, `id_tipe`, `bayar`, `kembalian`, `tgl_transaksi`) VALUES
(1, 'sewa', 2, 100000, 0, '2024-05-21'),
(2, 'booking', 3, 100000, 0, '2024-05-21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori_baju` (`id_kategori_baju`);

--
-- Indeks untuk tabel `booking_mua`
--
ALTER TABLE `booking_mua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mua` (`id_mua`),
  ADD KEY `id_pelayanan` (`id_pelayanan`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `kategori_baju`
--
ALTER TABLE `kategori_baju`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mua`
--
ALTER TABLE `mua`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sewa_baju`
--
ALTER TABLE `sewa_baju`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_baju` (`id_baju`),
  ADD KEY `id_pelayanan` (`id_pelayanan`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `baju`
--
ALTER TABLE `baju`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `booking_mua`
--
ALTER TABLE `booking_mua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori_baju`
--
ALTER TABLE `kategori_baju`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mua`
--
ALTER TABLE `mua`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `page`
--
ALTER TABLE `page`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sewa_baju`
--
ALTER TABLE `sewa_baju`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
