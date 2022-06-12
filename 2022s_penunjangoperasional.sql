-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 11:30 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2022s_penunjangoperasional`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnus`
--

CREATE TABLE `alumnus` (
  `idAlumnus` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl1` varchar(100) NOT NULL,
  `ttl2` date NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `statusPekerjaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `sosmed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumnus`
--

INSERT INTO `alumnus` (`idAlumnus`, `nama`, `ttl1`, `ttl2`, `jabatan`, `statusPekerjaan`, `alamat`, `email`, `sosmed`) VALUES
(2, 'Nur Laila', 'Martapura', '1997-05-25', 'Desainer Grafis', 'Tetap', 'Jalan Menteri 4 , Kel. Keraton â€“ Martapura ( telp. 085751992224)', 'nr.laila1409@gmail.com', 'https://www.instagram.com/nrlaila/'),
(3, 'Ramadhany Abdillah', 'Sungai Ulin', '1998-01-25', 'Desainer Grafis', 'Tetap', 'Jalan Menteri 4 , Kel. Keraton â€“ Martapura ( telp. 085751992224)', 'ramadhanyabd@gmail.com', 'https://www.instagram.com/ramadhanyabd/');

-- --------------------------------------------------------

--
-- Table structure for table `alumnus_detail`
--

CREATE TABLE `alumnus_detail` (
  `idAlumnusDetail` int(5) NOT NULL,
  `idAlumnus` int(5) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tahun1` varchar(20) NOT NULL,
  `tahun2` varchar(20) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumnus_detail`
--

INSERT INTO `alumnus_detail` (`idAlumnusDetail`, `idAlumnus`, `kategori`, `tahun1`, `tahun2`, `ket`) VALUES
(1, 2, 'Pendidikan', '-', '2010', 'Lulus SD di SDN INDRASARI 2'),
(2, 2, 'Pendidikan', '2010', '2013', 'Lulus SMP di SMP Negeri 2 Martapura Timur'),
(3, 2, 'Pendidikan', '2013', '2016', 'Lulus SMK di SMK Darussalam Martapura'),
(4, 2, 'Pekerjaan', '2016', 'Sekarang', 'Percetakan Green Design Printing Martapura'),
(5, 3, 'Pendidikan', '2005', '2010', 'Lulus SD di SDN SUNGAI BESAR 5'),
(6, 3, 'Pendidikan', '2010', '2012', 'Lulus SMP di SMP 6 BANJARBARU'),
(7, 3, 'Pendidikan', '2012', '2016', 'Lulus SMK di SMK Darussalam Martapura'),
(8, 3, 'Pendidikan', '2016', '2022', 'Lulus S1 di STIE PANCASETIA BANJARBARU'),
(9, 3, 'Pekerjaan', '2016', 'Sekarang', 'Percetakan Green Design Printing Martapura');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `idArtikel` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `judul` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `waktu` datetime NOT NULL,
  `thumb` text NOT NULL,
  `view` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`idArtikel`, `id`, `judul`, `kategori`, `konten`, `waktu`, `thumb`, `view`) VALUES
(5, 6, 'Jaksa Masuk Sekolah, Ngapain ya?', 'Berita', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Senin, 22 Mei 2022 di aula SMK Darrusalam Martapura sekitar jam 10.00 Wita sebanyak 80 siswa SMK Darrusalam Martapura duduk dengan rapi, mendengarkan dengan saksama penyuluhan tentang hukum dengan tema â€œDari, Oleh, dan Untuk Sekolahku.â€ Kegiatan tersebut diselenggarakan oleh Dinas Pendidikan Provinsi Kalimantan Selatan bekerjasama dengan Kantor Kejaksaan Provinsi Kalimantan Selatan.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Pada penyuluhan hukum tersebut dibahas tentang tindak kejahatan siber dan perundungan Beberapa contoh kasus kejahatan siber yang ada di Indonesia di antaranya adalah penipuan lelang secara online, pemalsuan cek, penipuan kartu kredit atau carding, confidence fraud atau penipuan kepercayaan, penipuan identitas, dan pornografi. Sedangkan perundungan bisa terjadi lewat media sosial maaupun secara langsung.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Menurut Aprilia Maulida , siswa kelas X TSM 2, terdapat banyak manfaat yang dapat diambil dari mengikuti kegiatan penyuluhan tersebut. Di antaranya siswa bisa mengetahui jika perundungan bisa mengakibatkan seseorang dikenai sanksi hukum. Intan Sari, siswa X TMT 2 juga menambahkan bahwa dengan adanya ancaman sanksi hukum terhadap kejahatan siber dan perundungan, seseorang dapat berpikir lebih panjang jika akan melakukan tindakan tersebut. (Maru)</p>', '2022-05-23 11:35:00', 'assets/img/WhatsApp-Image-2022-01-26-at-07.58.41-3.jpeg', 18),
(7, 6, 'Meriahkan Perayaan Idul Adha, Empat Ekor Daging Sapi dibagikan di SMK Darrusalam Martapura', 'Berita', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Ibadah kurban disyariatkan Allah SWT untuk mengenal sejarah Idul Adha yang dialami oleh Nabi Ibrahim AS. Peristiwa tersebut diabadikan dalam QS As Shaffat ayat 102-107.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Dalam rangka perayaan Idul Adha 1442 H yang jatuh pada Senin, 20 Juli 2021,&nbsp; sebanyak&nbsp; 26 guru, staf TU, keluarga ditambah 2 orang pengawas SMK turut serta melaksanakan ibadah qurban. Dari 28 peserta akhirnya dapat diselenggarakan penyembelihan hewan kurban sebanyak empat ekor sapi. Pelaksanaan penyembelihan sapi kurban dilaksanakan pada Kamis, 22 Juli 2021.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Ini kali kedua SMK Darrusalam Martapura melaksanakannya. Semangat pelaksanaan ibadah kurban tahun ini meningkat dibandingkan pelaksanaan pertama tahun 2020. Saat itu tiga ekor sapi yang disembelih dan dibagi-bagikan ke warga.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Pelaksanaan ibadah qurban tersebut memang direncanakan setahun sebelumnya. Warga SMK berinisiatif menyelenggarakan tabungan qurban yang disetorkan setiap bulan atau pada waktu tertentu kepada Panitia. Daging kurban dibagi-bagikan kepada sebagian siswa, guru, dan masyarakat sekitar sebanyak 544 kupon. Ketua Panitia, H. Syukhyar mengungkapkan rasa syukur karena antusias warga SMK semakin bertambah untuk ikut melaaksanakan ibadah kurban. Beliau juga berharap se tahun mendatang pelaksanaan ibadah kurban di SMK Darrusalam Martapura tetap berlanjut. (MaRu)</p>', '2022-06-09 10:54:00', 'assets/img/WhatsApp-Image-2021-07-22-at-13.28.10.jpeg', 0),
(8, 6, 'Di Tengah Bencana, SMK Darrusalam Hadir', 'Berita', '<p><span style=\"text-align: justify;\">Hari ini adalah hari ke tujuh pengungsi berada di SMK Darrusalam Martapura. Banyak bantuan dari para dermawan yang sudah sampai dan dikelolakan oleh relawan Smekma baik berupa uang, sembako, pakaian, bahan untuk keperluan mandi, obat-obatan. Bahkan ada donatur yang memberikan ikan segar sebanyak empat karung besar. Menurut Muniroh, koordinator relawan Smekma, donatur ikan segar yang tidak mau disebutkan namanya tersebut berasal dari Rantau. Dengan kondisi jalan yang putus, relawan dengan sigap mengambil bantuan menggunakan kelotok. Untuk membersihkan ikan segar tersebut relawan Smekma dibantu oleh ibu-ibu pengungsi.</span></p><p><span style=\"text-align: justify;\">Kolaborasi antara relawan dengan pengungsi tidak hanya urusan konsumsi. Pada hari ketiga pengungsi menggagas acara Maulid yang dilaksanakan di mushalla sekolah. Pengungsi di SMK Darrusalam Martapura yang cukup tertib juga sangat membantu memudahkan relawan untuk melayani mereka dengan baik dan tulus.</span><span style=\"text-align: justify;\"><br></span><br></p>', '2022-06-05 10:57:00', 'assets/img/WhatsApp-Image-2021-01-19-at-21.18.06.jpeg', 3),
(10, 6, 'Pendaftaran Penerimaan Didik Baru (PPDB) Online SMK Darrusalam Tahun Pelajaran 2022/2023', 'Pengumuman', '<p><span style=\"text-align: justify;\">Calon peserta didik baru mengisi formulir pendaftaran dengan memilih jenis jalur pendaftaran yang tersedia.</span></p><p>Pendaftaraan dibuka mulai tanggal 10 Juni 2022 s/d 20 Juli 2022</p><p>Silahkan pergi ke link berikut ini :&nbsp;<a href=\"http://localhost/2022/2022s_penunjangoperasional/ppdb\" target=\"_blank\">http://localhost/2022/2022s_penunjangoperasional/ppdb</a><b></b></p>', '2022-06-09 11:10:00', 'assets/img/Remini20220609112421647.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idGuru` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `idt` varchar(50) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `tipe` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idGuru`, `id`, `jabatan`, `idt`, `prodi`, `golongan`, `tipe`) VALUES
(8, 5, 'Guru MatPel', 'S1 1995', 'PLS', 'III/a', 'Tetap'),
(9, 7, 'Waka Kesiswaan', 'S1 1995', 'S1 Kimia', 'III/b', 'Tetap'),
(10, 13, 'Guru MatPel	', 'S1 1991', 'S1 Fisika', 'IVA', 'Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `idKegiatan` int(5) NOT NULL,
  `idGuru` int(5) NOT NULL,
  `kegiatannya` text NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `nosurat` varchar(15) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`idKegiatan`, `idGuru`, `kegiatannya`, `lokasi`, `waktu`, `nosurat`, `status`) VALUES
(1, 9, 'Pengambilan Raport Siswa', 'Banjarbaru', '2022-05-25 09:14:00', '001-peg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idKelas` int(5) NOT NULL,
  `idGuru` int(5) NOT NULL,
  `kelasnya` varchar(30) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `tahun` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `idGuru`, `kelasnya`, `jurusan`, `tahun`) VALUES
(1, 8, 'X / I (Sepuluh 1)', 'TSM (Teknik Sepeda Motor)', 'Tahun Ke-1'),
(2, 8, 'X / I (Sepuluh 1)', 'TSM (Teknik Sepeda Motor)', 'Tahun Ke-2'),
(3, 9, 'X / III (Sepuluh 3)', 'TSM (Teknik Sepeda Motor)', 'Tahun Ke-3'),
(4, 10, 'X / I (Sepuluh 1)', 'Asisten Keperawatan (Khusus Perempuan)', 'Tahun Ke-1');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idSiswa` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `idKelas` int(5) NOT NULL,
  `namaAyah` varchar(100) NOT NULL,
  `agamaAyah` varchar(50) NOT NULL,
  `kerjaAyah` varchar(50) NOT NULL,
  `namaIbu` varchar(100) NOT NULL,
  `agamaIbu` varchar(50) NOT NULL,
  `kerjaIbu` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','Menunggu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `id`, `idKelas`, `namaAyah`, `agamaAyah`, `kerjaAyah`, `namaIbu`, `agamaIbu`, `kerjaIbu`, `status`) VALUES
(4, 11, 2, 'Anas', 'Islam', 'Wirausaha', 'Hafsah', 'Katolik', 'PNS', 'Aktif'),
(5, 12, 3, 'Dustin Tiffany', 'Islam', 'Dokter', 'Chelsea Olivia', 'Budha', 'Perawat', 'Aktif'),
(7, 15, 4, 'Didik Setiawan', 'Kristen', 'Dokter', 'Desi Ratnasari', 'Islam', 'Suster', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `surat_panggilan`
--

CREATE TABLE `surat_panggilan` (
  `idSuratPanggilan` int(5) NOT NULL,
  `idSiswa` int(5) NOT NULL,
  `waktu` datetime NOT NULL,
  `nosurat` varchar(50) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_panggilan`
--

INSERT INTO `surat_panggilan` (`idSuratPanggilan`, `idSiswa`, `waktu`, `nosurat`, `tempat`, `ket`) VALUES
(1, 4, '2022-05-24 19:21:00', '404', 'Kantor Kepala Sekolah', 'Pemerkosaan');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pindah`
--

CREATE TABLE `surat_pindah` (
  `idSuratPindah` int(5) NOT NULL,
  `idSiswa` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `nosurat` int(11) NOT NULL,
  `sekolahTujuan` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pindah`
--

INSERT INTO `surat_pindah` (`idSuratPindah`, `idSiswa`, `tgl`, `nosurat`, `sekolahTujuan`, `ket`) VALUES
(1, 5, '2022-05-26', 2, 'SMA Negeri 1 Banjarmasin', 'Pekerjaan Orang Tua');

-- --------------------------------------------------------

--
-- Table structure for table `surat_thadir`
--

CREATE TABLE `surat_thadir` (
  `idSuratThadir` int(5) NOT NULL,
  `idGuru` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_thadir`
--

INSERT INTO `surat_thadir` (`idSuratThadir`, `idGuru`, `tgl`, `ket`, `status`) VALUES
(1, 8, '2022-06-07', 'Opname di Rumah Sakit Zuleha Martapura', 0),
(2, 10, '2022-06-01', 'Acara Pernikahan Anak', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `ni` varchar(30) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `level` enum('Guru','Siswa','Karyawan','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `ni`, `jk`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telp`, `level`) VALUES
(5, 'Coki Pardede', '19801114 200802 1 001', '19801114 200802 1 001', '21710005', 'Pria', 'Islam', 'Banjarbaru', '2006-05-24', 'Landasan Ulin', '08959731445', 'Guru'),
(6, 'admin', 'admin', 'admin', '', '', '', '', '0000-00-00', '', '', 'Admin'),
(7, 'Anti Dendruf', '19720713200604 1 885', '19720713200604 1 885', '19720713200604 1 885', 'Pria', 'Islam', 'Jakarta', '2022-05-23', 'Jakarta', '089666714255', 'Guru'),
(11, 'Rendi Irawan', '21710006', '21710006', '21710006', 'Pria', 'Katolik', 'Binuang', '2005-05-24', 'Jl. Guntung Manggis kota Banjarbaru', '08959751123', 'Siswa'),
(12, 'Rispo Anwar', '21710009', '21710009', '21710009', 'Pria', 'Budha', 'Landasan Ulin', '2005-05-25', 'Jl. Guntung Manggis kota Banjarbaru', '08159611341', 'Siswa'),
(13, 'Hesti', '19801114 206801 2 009', '19801114 206801 2 009', '21710010', 'Wanita', 'Islam', 'tidakada', '1994-06-10', 'Kandangan', '08154613432', 'Guru'),
(15, 'Riri Ramadhani', '085309214412', '085309214412', '', 'Wanita', 'Islam', 'Jawa Timur', '2007-06-10', 'Landasan Ulin', '085309214412', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnus`
--
ALTER TABLE `alumnus`
  ADD PRIMARY KEY (`idAlumnus`);

--
-- Indexes for table `alumnus_detail`
--
ALTER TABLE `alumnus_detail`
  ADD PRIMARY KEY (`idAlumnusDetail`),
  ADD KEY `idAlumni` (`idAlumnus`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`idArtikel`),
  ADD KEY `id` (`id`);
ALTER TABLE `artikel` ADD FULLTEXT KEY `judul` (`judul`,`kategori`);
ALTER TABLE `artikel` ADD FULLTEXT KEY `judul_2` (`judul`,`konten`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idGuru`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`idKegiatan`),
  ADD KEY `idGuru` (`idGuru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idKelas`),
  ADD KEY `idGuru` (`idGuru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idSiswa`),
  ADD KEY `id` (`id`),
  ADD KEY `idKelas` (`idKelas`);

--
-- Indexes for table `surat_panggilan`
--
ALTER TABLE `surat_panggilan`
  ADD PRIMARY KEY (`idSuratPanggilan`),
  ADD KEY `idSiswa` (`idSiswa`);

--
-- Indexes for table `surat_pindah`
--
ALTER TABLE `surat_pindah`
  ADD PRIMARY KEY (`idSuratPindah`),
  ADD KEY `idSiswa` (`idSiswa`);

--
-- Indexes for table `surat_thadir`
--
ALTER TABLE `surat_thadir`
  ADD PRIMARY KEY (`idSuratThadir`),
  ADD KEY `idGuru` (`idGuru`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnus`
--
ALTER TABLE `alumnus`
  MODIFY `idAlumnus` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alumnus_detail`
--
ALTER TABLE `alumnus_detail`
  MODIFY `idAlumnusDetail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `idArtikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idGuru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `idKegiatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idKelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idSiswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat_panggilan`
--
ALTER TABLE `surat_panggilan`
  MODIFY `idSuratPanggilan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_pindah`
--
ALTER TABLE `surat_pindah`
  MODIFY `idSuratPindah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_thadir`
--
ALTER TABLE `surat_thadir`
  MODIFY `idSuratThadir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnus_detail`
--
ALTER TABLE `alumnus_detail`
  ADD CONSTRAINT `alumnus_detail_ibfk_1` FOREIGN KEY (`idAlumnus`) REFERENCES `alumnus` (`idAlumnus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`idGuru`) REFERENCES `guru` (`idGuru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`idGuru`) REFERENCES `guru` (`idGuru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_panggilan`
--
ALTER TABLE `surat_panggilan`
  ADD CONSTRAINT `surat_panggilan_ibfk_1` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_pindah`
--
ALTER TABLE `surat_pindah`
  ADD CONSTRAINT `surat_pindah_ibfk_1` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
