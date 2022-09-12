-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2022 pada 16.15
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Administrasi Perkantoran'),
(2, 'Pemasaran'),
(3, 'Akuntansi'),
(4, 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `magang`
--

CREATE TABLE `magang` (
  `id_magang` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `magang`
--

INSERT INTO `magang` (`id_magang`, `id_siswa`, `id_pembimbing`, `id_perusahaan`, `status`) VALUES
(1, 1, 3, 2, 'Magang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nilai_dudi` int(5) NOT NULL,
  `nilai_laporan` int(5) NOT NULL,
  `nilai_akhir` int(5) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nilai_dudi`, `nilai_laporan`, `nilai_akhir`, `id_siswa`, `id_pembimbing`) VALUES
(1, 97, 98, 97, 1, 3),
(2, 96, 98, 96, 2, 4),
(3, 99, 99, 99, 3, 5),
(4, 98, 97, 98, 4, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_pembimbing` varchar(255) NOT NULL,
  `jenkel` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `nip`, `nama_pembimbing`, `jenkel`, `alamat`) VALUES
(1, '-', '-', 'Laki-laki', '-'),
(3, '19882009200201002', 'Rika Astuti,S.Kom', 'Perempuan', 'Jorong Balimbing Kec. Rambatan Kab. Tanah Datar'),
(4, '199002082006003001', 'Roni Janvialdi,S.Pd', 'Laki-laki', 'Jln.Mardeka II no. 12 Malana Ponco Batusangkar'),
(5, '-', 'Dodis Saufitro,S.Pd', 'Laki-laki', 'Jorong Talang Dasun Nagari Pasie Laweh Kec. Sungai Tarab Kab.Tanah Datar'),
(8, '197902011999020112', 'Yendriadi,S.Pd', 'Laki-laki', 'Jorong Kubang Landai Nagari Saruaso Kec. Tj. Emas Kab. Tanah Datar'),
(9, '197820011998001291', 'Drs. Hasmuniarti,M. Eng', 'Perempuan', 'Komplek Perumahan Cubadak Indah Nagari Cubadak Kec. Limo Kaum Batusangkar'),
(10, '1987610120021220', 'Embun Suryani, S.Pd, M.Pd', 'Perempuan', 'Komplek Perumahan Rizano Cipta Mandiri Balai Labuah Ateh Limo Kaum Batusangkar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jurusan_diterima` enum('Akuntasi','Pemasaran','Administrasi Perkantoran','Teknik Komputer dan Jaringan') NOT NULL,
  `kuota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `jurusan_diterima`, `kuota`) VALUES
(1, 'Dinas Pendidikan Kab. Tanah Datar', 'Jln. Sultan Alam Bagagarsyah no.33 Pagaruyung Batusangkar', 'Administrasi Perkantoran', 4),
(2, 'Pedia Komputer', 'Jl. Prof. Hamka No.5 D, Parupuk Tabing, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25171', 'Teknik Komputer dan Jaringan', 3),
(3, 'Aisyah Komputer', 'Jln. Ahmad Yani no.45 Lantai Batu Batusangkar', 'Teknik Komputer dan Jaringan', 4),
(4, 'PT. BPR Andaleh Baru Bukik', 'Jln. Tengku Umar no.27 Batusangkar, Kab.Tanah Datar Sumatera Barat', 'Akuntasi', 6),
(5, 'Bunda Minimarket', 'Pasar Atas Batusangkar Blok H no.56 Kab.Tanah Datar Sumatera Barat', 'Pemasaran', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenkel` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `id_pembimbing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenkel`, `alamat`, `jurusan`, `id_pembimbing`) VALUES
(1, 160654, 'Rendy Pratama', 'Laki-laki', 'Jorong Kubang Landai Nagari Saruaso kec.Tj.Emas Kab.Tanah Datar', 'Teknik Komputer dan Jaringan', 3),
(2, 160642, 'Putri Annisa Rahma', 'Perempuan', 'Jln.Piliang I no.12 Piliang Dobok Batusangkar Kab.Tanah Datar', 'Administrasi Perkantoran', 1),
(3, 160553, 'Muhammad Habri', 'Laki-laki', 'Jln.Soekarno no.31 Depan Kantor Camat kec.Rambatan Kab.Tanah Datar', 'Pemasaran', 1),
(4, 160499, 'Chairani Syafitri', 'Perempuan', 'Jorong Koto Tuo Sungai Tarab Kab.Tanah Datar', 'Akuntansi', 1),
(5, 160466, 'Farid Yosrefa Efendi', 'Laki-laki', 'Jorong Tabiang Tinggi Nagari Paagaruyung Ke. Tj.Emas Kab.Tanah Datar', 'Teknik Komputer dan Jaringan', 1),
(6, 160476, 'Cindy Nadia Putri', 'Perempuan', 'Jorong Saruaso Barat Kec. Tj. Emas Kab. Tanah Datar', 'Akuntansi', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Dodis Saufitro', 'bukalapauonline@gmail.com', 'boy.png', '$2y$10$9EW7tWLnDqlLRbdET50nk.x8jY00/.LBWfKXc4QZ873Le7kJBEeUe', 3, 1, 1622085441),
(6, 'Dodis Saufitro', 'saufitrod@gmail.com', 'default1.jpg', '$2y$10$CKwI0plxATqFPhgbU86XD.eUu/4aKEvlWi9xMasUGSc1Qt.ZSD64S', 2, 1, 1622085842),
(7, 'Rinto Ardi', 'rinto470@gmail.com', 'pas_foto_ok.jpg', '$2y$10$9EW7tWLnDqlLRbdET50nk.x8jY00/.LBWfKXc4QZ873Le7kJBEeUe', 1, 1, 1622087049),
(9, 'Rendy Pratama', 'ndit0923@gmail.com', 'default.jpg', '$2y$10$MO4xBpIekRhWn74.aghIwO/miFmLprezt53xgf9FD8L14VZ4VY2aO', 3, 1, 1632318173),
(10, 'Putri Annisa Rahma', 'nissa2365@gmail.com', 'default.jpg', '$2y$10$HvMOw5n7FCDVem0FQpqEB.OqR7bEnuXmkaq4BsRBi7becptUgg.nS', 3, 1, 1632399280),
(11, 'test', 'test@gmail.com', 'default.jpg', '$2y$10$rzbK81DlmxjAc4XQNJFFBO1Pu5G7DRZFDdZKynxSReAbiQngKEXx.', 3, 1, 1632409147);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(7, 3, 2),
(9, 1, 3),
(10, 1, 4),
(11, 3, 5),
(12, 2, 6),
(13, 3, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Menu Admin'),
(6, 'Pembimbing'),
(7, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user-ninja', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 4, 'Siswa', 'admin/siswa', 'fas fa-fw fa-user-graduate', 1),
(9, 4, 'Pembimbing', 'admin/pembimbing', 'fas fa-fw fa-handshake', 1),
(10, 4, 'Perusahaan', 'admin/perusahaan', 'fas fa-fw fa-university', 1),
(11, 5, 'Perusahaan', 'siswa/perusahaan', 'fas fa-fw fa-university', 1),
(12, 5, 'Nilai', 'siswa/nilai', 'fas fa-fw fa-calculator', 1),
(13, 7, 'Perusahaan', 'user/perusahaan', 'fas fa-fw fa-university', 1),
(14, 7, 'Nilai', 'user/nilai', 'fas fa-fw fa-calculator', 1),
(15, 7, 'Info Prakerin Siswa', 'user/info', 'fas fa-fw fa-info-circle', 1),
(16, 4, 'Nilai', 'admin/nilai', 'fas fa-fw fa-calculator', 1),
(17, 6, 'Daftar Siswa', 'pembimbing/siswa', 'fas fa-fw fa-user-graduate', 1),
(18, 6, 'Nilai', 'pembimbing/nilai', 'fas fa-fw fa-calculator', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `magang`
--
ALTER TABLE `magang`
  ADD PRIMARY KEY (`id_magang`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `magang`
--
ALTER TABLE `magang`
  MODIFY `id_magang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
