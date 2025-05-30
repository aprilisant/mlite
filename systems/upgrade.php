<?php

if (!defined("UPGRADABLE")) {
    exit();
}

function rrmdir($dir)
{
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        if (is_dir("$dir/$file")) {
            rrmdir("$dir/$file");
        } else {
            unlink("$dir/$file");
        }
    }
    return rmdir($dir);
}

switch ($version) {
    case '4.0.0':
        $return = '4.0.1';
    case '4.0.1':
        $return = '4.0.2';
    case '4.0.2':
        $return = '4.0.3';
    case '4.0.3':
        $return = '4.0.4';
    case '4.0.4':
        $return = '4.0.5';
    case '4.0.5':
        $return = '4.0.6';
    case '4.0.6':
        $return = '4.0.7';
   case '4.0.7':
        $return = '4.0.8';
    case '4.0.8':
        $return = '4.0.9';
    case '4.0.9':
        $return = '4.1.0';
    case '4.1.0':
        $return = '4.1.1';
    case '4.1.1':
        $return = '4.1.2';
    case '4.1.2':
        $return = '4.1.3'; 
    case '4.1.3':
        $return = '4.1.4'; 
    case '4.1.4':
        $return = '4.1.5';        
    case '4.1.5':
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('settings', 'websocket', 'tidak')");
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('settings', 'websocket_proxy', '')");
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('settings', 'username_fp', '')");
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('settings', 'password_fp', '')");
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('settings', 'username_frista', '')");
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('settings', 'password_frista', '')");
        $return = '4.1.6';        
    case '4.1.6':
        $this->core->db()->pdo()->exec("ALTER TABLE `mlite_settings` CHANGE `module` `module` VARCHAR(100) NOT NULL");
        $this->core->db()->pdo()->exec("ALTER TABLE `mlite_settings` CHANGE `field` `field` VARCHAR(100) NOT NULL");
        $this->core->db()->pdo()->exec("ALTER TABLE `mlite_settings` CHANGE `value` `value` VARCHAR(1000) NOT NULL");
        $this->core->db()->pdo()->exec("ALTER TABLE `mlite_settings` ADD UNIQUE KEY `module` (`module`,`field`)");
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('farmasi', 'keterangan_etiket', '')");
        $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_surat_rujukan` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nomor_surat` varchar(100) DEFAULT NULL,
            `no_rawat` varchar(100) DEFAULT NULL,
            `no_rkm_medis` varchar(100) DEFAULT NULL,
            `nm_pasien` varchar(100) DEFAULT NULL,
            `tgl_lahir` varchar(100) DEFAULT NULL,
            `umur` varchar(100) DEFAULT NULL,
            `jk` varchar(100) DEFAULT NULL,
            `alamat` varchar(1000) DEFAULT NULL,
            `kepada` varchar(250) DEFAULT NULL,
            `di` varchar(250) DEFAULT NULL,
            `anamnesa` varchar(100) DEFAULT NULL,
            `pemeriksaan_fisik` varchar(100) DEFAULT NULL,
            `pemeriksaan_penunjang` varchar(100) DEFAULT NULL,
            `diagnosa` varchar(100) DEFAULT NULL,
            `terapi` varchar(100) DEFAULT NULL,
            `alasan_dirujuk` varchar(250) DEFAULT NULL,
            `dokter` varchar(100) DEFAULT NULL,
            `petugas` varchar(100) DEFAULT NULL, 
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_surat_sakit` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nomor_surat` varchar(100) DEFAULT NULL,
            `no_rawat` varchar(100) DEFAULT NULL,
            `no_rkm_medis` varchar(100) DEFAULT NULL,
            `nm_pasien` varchar(100) DEFAULT NULL,
            `tgl_lahir` varchar(100) DEFAULT NULL,
            `umur` varchar(100) DEFAULT NULL,
            `jk` varchar(100) DEFAULT NULL,
            `alamat` varchar(1000) DEFAULT NULL,
            `keadaan` varchar(100) DEFAULT NULL,
            `diagnosa` varchar(100) DEFAULT NULL,
            `lama_angka` varchar(100) DEFAULT NULL,
            `lama_huruf` varchar(100) DEFAULT NULL,
            `tanggal_mulai` varchar(100) DEFAULT NULL,
            `tanggal_selesai` varchar(100) DEFAULT NULL,
            `dokter` varchar(100) DEFAULT NULL,
            `petugas` varchar(100) DEFAULT NULL, 
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_surat_sehat` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nomor_surat` varchar(100) DEFAULT NULL,
            `no_rawat` varchar(100) DEFAULT NULL,
            `no_rkm_medis` varchar(100) DEFAULT NULL,
            `nm_pasien` varchar(100) DEFAULT NULL,
            `tgl_lahir` varchar(100) DEFAULT NULL,
            `umur` varchar(100) DEFAULT NULL,
            `jk` varchar(100) DEFAULT NULL,
            `alamat` varchar(1000) DEFAULT NULL,
            `tanggal` varchar(100) DEFAULT NULL,
            `berat_badan` varchar(100) DEFAULT NULL,
            `tinggi_badan` varchar(100) DEFAULT NULL,
            `tensi` varchar(100) DEFAULT NULL,
            `gol_darah` varchar(100) DEFAULT NULL,
            `riwayat_penyakit` varchar(100) DEFAULT NULL,
            `keperluan` varchar(100) DEFAULT NULL,
            `dokter` varchar(100) DEFAULT NULL,
            `petugas` varchar(100) DEFAULT NULL, 
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");        
        $return = '4.1.7';
    case '4.1.7':
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('settings', 'billing_obat', 'false')");
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('settings', 'instansi_induk', '')");

        $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_fenton` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `no_rawat` varchar(17) NOT NULL,
            `tanggal` datetime NOT NULL,
            `usia_kehamilan` int(11) NOT NULL,
            `tgl_lahir` date NOT NULL,
            `berat_badan` float NOT NULL,
            `lingkar_kepala` int(11) NOT NULL,
            `panjang_badan` int(11) NOT NULL,
            `petugas` varchar(60) NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `deleted_at` timestamp NULL DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
          
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_penilaian_awal_keperawatan_gigi` (
            `no_rawat` varchar(17) NOT NULL,
            `tanggal` datetime NOT NULL,
            `informasi` enum('Autoanamnesis','Alloanamnesis') NOT NULL,
            `td` varchar(8) NOT NULL DEFAULT '',
            `nadi` varchar(5) NOT NULL DEFAULT '',
            `rr` varchar(5) NOT NULL,
            `suhu` varchar(5) NOT NULL DEFAULT '',
            `bb` varchar(5) NOT NULL DEFAULT '',
            `tb` varchar(5) NOT NULL DEFAULT '',
            `bmi` varchar(10) NOT NULL,
            `keluhan_utama` varchar(150) NOT NULL DEFAULT '',
            `riwayat_penyakit` enum('Tidak Ada','Diabetes Melitus','Hipertensi','Penyakit Jantung','HIV','Hepatitis','Haemophilia','Lain-lain') DEFAULT NULL,
            `ket_riwayat_penyakit` varchar(30) NOT NULL,
            `alergi` varchar(25) NOT NULL DEFAULT '',
            `riwayat_perawatan_gigi` enum('Tidak','Ya, Kapan') NOT NULL,
            `ket_riwayat_perawatan_gigi` varchar(50) NOT NULL DEFAULT '',
            `kebiasaan_sikat_gigi` enum('1x','2x','3x','Mandi','Setelah Makan','Sebelum Tidur') NOT NULL,
            `kebiasaan_lain` enum('Tidak ada','Minum kopi/teh','Minum alkohol','Bruxism','Menggigit pensil','Mengunyah 1 sisi rahang','Merokok','Lain-lain') DEFAULT NULL,
            `ket_kebiasaan_lain` varchar(30) NOT NULL,
            `obat_yang_diminum_saatini` varchar(100) DEFAULT NULL,
            `alat_bantu` enum('Tidak','Ya') NOT NULL,
            `ket_alat_bantu` varchar(30) NOT NULL,
            `prothesa` enum('Tidak','Ya') NOT NULL,
            `ket_pro` varchar(50) NOT NULL,
            `status_psiko` enum('Tenang','Takut','Cemas','Depresi','Lain-lain') NOT NULL,
            `ket_psiko` varchar(70) NOT NULL,
            `hub_keluarga` enum('Baik','Tidak Baik') NOT NULL,
            `tinggal_dengan` enum('Sendiri','Orang Tua','Suami / Istri','Lainnya') NOT NULL,
            `ket_tinggal` varchar(40) NOT NULL,
            `ekonomi` enum('Baik','Cukup','Kurang') NOT NULL,
            `budaya` enum('Tidak Ada','Ada') NOT NULL,
            `ket_budaya` varchar(50) NOT NULL,
            `edukasi` enum('Pasien','Keluarga') NOT NULL,
            `ket_edukasi` varchar(50) NOT NULL,
            `berjalan_a` enum('Ya','Tidak') NOT NULL,
            `berjalan_b` enum('Ya','Tidak') NOT NULL,
            `berjalan_c` enum('Ya','Tidak') NOT NULL,
            `hasil` enum('Tidak beresiko (tidak ditemukan a dan b)','Resiko rendah (ditemukan a/b)','Resiko tinggi (ditemukan a dan b)') NOT NULL,
            `lapor` enum('Ya','Tidak') NOT NULL,
            `ket_lapor` varchar(15) NOT NULL,
            `nyeri` enum('Tidak Ada Nyeri','Nyeri Akut','Nyeri Kronis') NOT NULL,
            `lokasi` varchar(50) NOT NULL,
            `skala_nyeri` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
            `durasi` varchar(25) NOT NULL,
            `frekuensi` varchar(25) NOT NULL,
            `nyeri_hilang` enum('Istirahat','Medengar Musik','Minum Obat','Tidak ada nyeri','Lain-lain') NOT NULL,
            `ket_nyeri` varchar(40) NOT NULL,
            `pada_dokter` enum('Tidak','Ya') NOT NULL,
            `ket_dokter` varchar(15) NOT NULL,
            `kebersihan_mulut` enum('Baik','Cukup','Kurang') NOT NULL,
            `mukosa_mulut` enum('Normal','Pigmentasi','Radang') NOT NULL,
            `karies` enum('Ada','Tidak') NOT NULL,
            `karang_gigi` enum('Ada','Tidak') NOT NULL,
            `gingiva` enum('Normal','Radang') NOT NULL,
            `palatum` enum('Normal','Radang') NOT NULL,
            `rencana` varchar(200) NOT NULL,
            `nip` varchar(20) NOT NULL,
            PRIMARY KEY (`no_rawat`),
            KEY `nip` (`nip`),
            CONSTRAINT `mlite_penilaian_awal_keperawatan_gigi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_penilaian_awal_keperawatan_gigi_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
          
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_penilaian_awal_keperawatan_ralan` (
            `no_rawat` varchar(17) NOT NULL,
            `tanggal` datetime NOT NULL,
            `informasi` enum('Autoanamnesis','Alloanamnesis') NOT NULL,
            `td` varchar(8) NOT NULL DEFAULT '',
            `nadi` varchar(5) NOT NULL DEFAULT '',
            `rr` varchar(5) NOT NULL,
            `suhu` varchar(5) NOT NULL DEFAULT '',
            `gcs` varchar(5) NOT NULL,
            `bb` varchar(5) NOT NULL DEFAULT '',
            `tb` varchar(5) NOT NULL DEFAULT '',
            `bmi` varchar(10) NOT NULL,
            `keluhan_utama` varchar(150) NOT NULL DEFAULT '',
            `rpd` varchar(100) NOT NULL DEFAULT '',
            `rpk` varchar(100) NOT NULL,
            `rpo` varchar(100) NOT NULL,
            `alergi` varchar(25) NOT NULL DEFAULT '',
            `alat_bantu` enum('Tidak','Ya') NOT NULL,
            `ket_bantu` varchar(50) NOT NULL DEFAULT '',
            `prothesa` enum('Tidak','Ya') NOT NULL,
            `ket_pro` varchar(50) NOT NULL,
            `adl` enum('Mandiri','Dibantu') NOT NULL,
            `status_psiko` enum('Tenang','Takut','Cemas','Depresi','Lain-lain') NOT NULL,
            `ket_psiko` varchar(70) NOT NULL,
            `hub_keluarga` enum('Baik','Tidak Baik') NOT NULL,
            `tinggal_dengan` enum('Sendiri','Orang Tua','Suami / Istri','Lainnya') NOT NULL,
            `ket_tinggal` varchar(40) NOT NULL,
            `ekonomi` enum('Baik','Cukup','Kurang') NOT NULL,
            `budaya` enum('Tidak Ada','Ada') NOT NULL,
            `ket_budaya` varchar(50) NOT NULL,
            `edukasi` enum('Pasien','Keluarga') NOT NULL,
            `ket_edukasi` varchar(50) NOT NULL,
            `berjalan_a` enum('Ya','Tidak') NOT NULL,
            `berjalan_b` enum('Ya','Tidak') NOT NULL,
            `berjalan_c` enum('Ya','Tidak') NOT NULL,
            `hasil` enum('Tidak beresiko (tidak ditemukan a dan b)','Resiko rendah (ditemukan a/b)','Resiko tinggi (ditemukan a dan b)') NOT NULL,
            `lapor` enum('Ya','Tidak') NOT NULL,
            `ket_lapor` varchar(15) NOT NULL,
            `sg1` enum('Tidak','Tidak Yakin','Ya, 1-5 Kg','Ya, 6-10 Kg','Ya, 11-15 Kg','Ya, >15 Kg') NOT NULL,
            `nilai1` enum('0','1','2','3','4') NOT NULL,
            `sg2` enum('Ya','Tidak') NOT NULL,
            `nilai2` enum('0','1') NOT NULL,
            `total_hasil` tinyint(4) NOT NULL,
            `nyeri` enum('Tidak Ada Nyeri','Nyeri Akut','Nyeri Kronis') NOT NULL,
            `provokes` enum('Proses Penyakit','Benturan','Lain-lain') NOT NULL,
            `ket_provokes` varchar(40) NOT NULL,
            `quality` enum('Seperti Tertusuk','Berdenyut','Teriris','Tertindih','Tertiban','Lain-lain') NOT NULL,
            `ket_quality` varchar(50) NOT NULL,
            `lokasi` varchar(50) NOT NULL,
            `menyebar` enum('Tidak','Ya') NOT NULL,
            `skala_nyeri` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
            `durasi` varchar(25) NOT NULL,
            `nyeri_hilang` enum('Istirahat','Medengar Musik','Minum Obat') NOT NULL,
            `ket_nyeri` varchar(40) NOT NULL,
            `pada_dokter` enum('Tidak','Ya') NOT NULL,
            `ket_dokter` varchar(15) NOT NULL,
            `rencana` varchar(200) NOT NULL,
            `nip` varchar(20) NOT NULL,
            PRIMARY KEY (`no_rawat`),
            KEY `nip` (`nip`),
            CONSTRAINT `mlite_penilaian_awal_keperawatan_ralan_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_penilaian_awal_keperawatan_ralan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
                    
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_penilaian_awal_keperawatan_ranap` (
            `no_rawat` varchar(17) NOT NULL,
            `tanggal` datetime NOT NULL,
            `informasi` enum('Autoanamnesis','Alloanamnesis') NOT NULL,
            `ket_informasi` varchar(30) NOT NULL,
            `tiba_diruang_rawat` enum('Jalan Tanpa Bantuan','Kursi Roda','Brankar') NOT NULL,
            `kasus_trauma` enum('Trauma','Non Trauma') DEFAULT NULL,
            `cara_masuk` enum('Poli','IGD','Lain-lain') NOT NULL,
            `rps` varchar(300) NOT NULL,
            `rpd` varchar(100) NOT NULL,
            `rpk` varchar(100) NOT NULL,
            `rpo` varchar(100) NOT NULL,
            `riwayat_pembedahan` varchar(40) NOT NULL,
            `riwayat_dirawat_dirs` varchar(40) NOT NULL,
            `alat_bantu_dipakai` enum('Kacamata','Prothesa','Alat Bantu Dengar','Lain-lain') NOT NULL,
            `riwayat_kehamilan` enum('Tidak','Ya') NOT NULL,
            `riwayat_kehamilan_perkiraan` varchar(30) NOT NULL,
            `riwayat_tranfusi` varchar(40) NOT NULL,
            `riwayat_alergi` varchar(40) NOT NULL,
            `riwayat_merokok` enum('Tidak','Ya') NOT NULL,
            `riwayat_merokok_jumlah` varchar(5) NOT NULL,
            `riwayat_alkohol` enum('Tidak','Ya') NOT NULL,
            `riwayat_alkohol_jumlah` varchar(5) NOT NULL,
            `riwayat_narkoba` enum('Tidak','Ya') NOT NULL,
            `riwayat_olahraga` enum('Tidak','Ya') NOT NULL,
            `pemeriksaan_mental` varchar(40) NOT NULL,
            `pemeriksaan_keadaan_umum` enum('Baik','Sedang','Buruk') NOT NULL,
            `pemeriksaan_gcs` varchar(10) NOT NULL,
            `pemeriksaan_td` varchar(8) NOT NULL,
            `pemeriksaan_nadi` varchar(5) NOT NULL,
            `pemeriksaan_rr` varchar(5) NOT NULL,
            `pemeriksaan_suhu` varchar(5) NOT NULL,
            `pemeriksaan_spo2` varchar(5) NOT NULL,
            `pemeriksaan_bb` varchar(5) NOT NULL,
            `pemeriksaan_tb` varchar(5) NOT NULL,
            `pemeriksaan_susunan_kepala` enum('TAK','Hydrocephalus','Hematoma','Lain-lain') NOT NULL,
            `pemeriksaan_susunan_wajah` enum('TAK','Asimetris','Kelainan Kongenital') NOT NULL,
            `pemeriksaan_susunan_leher` enum('TAK','Kaku Kuduk','Pembesaran Thyroid','Pembesaran KGB') NOT NULL,
            `pemeriksaan_susunan_kejang` enum('TAK','Kuat','Ada') NOT NULL,
            `pemeriksaan_susunan_sensorik` enum('TAK','Sakit Nyeri','Rasa kebas') NOT NULL,
            `pemeriksaan_kardiovaskuler_denyut_nadi` enum('Teratur','Tidak Teratur') NOT NULL,
            `pemeriksaan_kardiovaskuler_sirkulasi` enum('Akral Hangat','Akral Dingin','Edema') NOT NULL,
            `pemeriksaan_kardiovaskuler_pulsasi` enum('Kuat','Lemah','Lain-lain') NOT NULL,
            `pemeriksaan_respirasi_pola_nafas` enum('Normal','Bradipnea','Tachipnea') NOT NULL,
            `pemeriksaan_respirasi_retraksi` enum('Tidak Ada','Ringan','Berat') NOT NULL,
            `pemeriksaan_respirasi_suara_nafas` enum('Vesikuler','Wheezing','Rhonki') NOT NULL,
            `pemeriksaan_respirasi_volume_pernafasan` enum('Normal','Hiperventilasi','Hipoventilasi') NOT NULL,
            `pemeriksaan_respirasi_jenis_pernafasan` enum('Pernafasan Dada','Alat Bantu Pernafasaan') NOT NULL,
            `pemeriksaan_respirasi_irama_nafas` enum('Teratur','Tidak Teratur') NOT NULL,
            `pemeriksaan_respirasi_batuk` enum('Tidak','Ya : Produktif','Ya : Non Produktif') NOT NULL,
            `pemeriksaan_gastrointestinal_mulut` enum('TAK','Stomatitis','Mukosa Kering','Bibir Pucat','Lain-lain') NOT NULL,
            `pemeriksaan_gastrointestinal_gigi` enum('TAK','Karies','Goyang','Lain-lain') NOT NULL,
            `pemeriksaan_gastrointestinal_lidah` enum('TAK','Kotor','Gerak Asimetris','Lain-lain') NOT NULL,
            `pemeriksaan_gastrointestinal_tenggorokan` enum('TAK','Gangguan Menelan','Sakit Menelan','Lain-lain') NOT NULL,
            `pemeriksaan_gastrointestinal_abdomen` enum('Supel','Asictes',' Tegang','Nyeri Tekan/Lepas','Lain-lain') NOT NULL,
            `pemeriksaan_gastrointestinal_peistatik_usus` enum('TAK','Tidak Ada Bising Usus','Hiperistaltik') NOT NULL,
            `pemeriksaan_gastrointestinal_anus` enum('TAK','Atresia Ani') NOT NULL,
            `pemeriksaan_neurologi_pengelihatan` enum('TAK','Ada Kelainan') NOT NULL,
            `pemeriksaan_neurologi_alat_bantu_penglihatan` enum('Tidak','Kacamata','Lensa Kontak') NOT NULL,
            `pemeriksaan_neurologi_pendengaran` enum('TAK','Berdengung','Nyeri','Tuli','Keluar Cairan','Lain-lain') NOT NULL,
            `pemeriksaan_neurologi_bicara` enum('Jelas','Tidak Jelas') NOT NULL,
            `pemeriksaan_neurologi_sensorik` enum('TAK','Sakit Nyeri','Rasa Kebas','Lain-lain') NOT NULL,
            `pemeriksaan_neurologi_motorik` enum('TAK','Hemiparese','Tetraparese','Tremor','Lain-lain') NOT NULL,
            `pemeriksaan_neurologi_kekuatan_otot` enum('Kuat','Lemah') NOT NULL,
            `pemeriksaan_integument_warnakulit` enum('Pucat','Sianosis','Normal','Lain-lain') NOT NULL,
            `pemeriksaan_integument_turgor` enum('Baik','Sedang','Buruk') NOT NULL,
            `pemeriksaan_integument_kulit` enum('Normal','Rash/Kemerahan','Luka','Memar','Ptekie','Bula') NOT NULL,
            `pemeriksaan_integument_dekubitas` enum('Tidak Ada','Usia > 65 tahun','Obesitas','Imobilisasi','Paraplegi/Vegetative State','Dirawat Di HCU','Penyakit Kronis (DM, CHF, CKD)','Inkontinentia Uri/Alvi') NOT NULL,
            `pemeriksaan_muskuloskletal_pergerakan_sendi` enum('Bebas','Terbatas') NOT NULL,
            `pemeriksaan_muskuloskletal_kekauatan_otot` enum('Baik','Lemah','Tremor') NOT NULL,
            `pemeriksaan_muskuloskletal_nyeri_sendi` enum('Tidak Ada','Ada') NOT NULL,
            `pemeriksaan_muskuloskletal_oedema` enum('Tidak Ada','Ada') NOT NULL,
            `pemeriksaan_muskuloskletal_fraktur` enum('Tidak Ada','Ada') NOT NULL,
            `pemeriksaan_eliminasi_bab_frekuensi_jumlah` varchar(5) NOT NULL,
            `pemeriksaan_eliminasi_bab_frekuensi_durasi` varchar(10) NOT NULL,
            `pemeriksaan_eliminasi_bab_konsistensi` varchar(30) NOT NULL,
            `pemeriksaan_eliminasi_bab_warna` varchar(30) NOT NULL,
            `pemeriksaan_eliminasi_bak_frekuensi_jumlah` varchar(5) NOT NULL,
            `pemeriksaan_eliminasi_bak_frekuensi_durasi` varchar(10) NOT NULL,
            `pemeriksaan_eliminasi_bak_warna` varchar(30) NOT NULL,
            `pemeriksaan_eliminasi_bak_lainlain` varchar(30) NOT NULL,
            `pola_aktifitas_makanminum` enum('Mandiri','Bantuan Orang Lain') NOT NULL,
            `pola_aktifitas_mandi` enum('Mandiri','Bantuan Orang Lain') NOT NULL,
            `pola_aktifitas_eliminasi` enum('Mandiri','Bantuan Orang Lain') NOT NULL,
            `pola_aktifitas_berpakaian` enum('Mandiri','Bantuan Orang Lain') NOT NULL,
            `pola_aktifitas_berpindah` enum('Mandiri','Bantuan Orang Lain') NOT NULL,
            `pola_nutrisi_frekuesi_makan` varchar(3) NOT NULL,
            `pola_nutrisi_jenis_makanan` varchar(20) NOT NULL,
            `pola_nutrisi_porsi_makan` varchar(3) NOT NULL,
            `pola_tidur_lama_tidur` varchar(3) NOT NULL,
            `pola_tidur_gangguan` enum('Tidak Ada Gangguan','Insomnia') NOT NULL,
            `pengkajian_fungsi_kemampuan_sehari` enum('Mandiri','Bantuan Minimal','Bantuan Sebagian','Ketergantungan Total') NOT NULL,
            `pengkajian_fungsi_aktifitas` enum('Tirah Baring','Duduk','Berjalan') NOT NULL,
            `pengkajian_fungsi_berjalan` enum('TAK','Penurunan Kekuatan/ROM','Paralisis','Sering Jatuh','Deformitas','Hilang Keseimbangan','Riwayat Patah Tulang','Lain-lain') NOT NULL,
            `pengkajian_fungsi_ambulasi` enum('Walker','Tongkat','Kursi Roda','Tidak Menggunakan') NOT NULL,
            `pengkajian_fungsi_ekstrimitas_atas` enum('TAK','Lemah','Oedema','Tidak Simetris','Lain-lain') NOT NULL,
            `pengkajian_fungsi_ekstrimitas_bawah` enum('TAK','Varises','Oedema','Tidak Simetris','Lain-lain') NOT NULL,
            `pengkajian_fungsi_menggenggam` enum('Tidak Ada Kesulitan','Terakhir','Lain-lain') NOT NULL,
            `pengkajian_fungsi_koordinasi` enum('Tidak Ada Kesulitan','Ada Masalah') NOT NULL,
            `pengkajian_fungsi_kesimpulan` enum('Ya (Co DPJP)','Tidak (Tidak Perlu Co DPJP)') NOT NULL,
            `riwayat_psiko_kondisi_psiko` enum('Tidak Ada Masalah','Marah','Takut','Depresi','Cepat Lelah','Cemas','Gelisah','Sulit Tidur','Lain-lain') NOT NULL,
            `riwayat_psiko_gangguan_jiwa` enum('Ya','Tidak') NOT NULL,
            `riwayat_psiko_perilaku` enum('Tidak Ada Masalah','Perilaku Kekerasan','Gangguan Efek','Gangguan Memori','Halusinasi','Kecenderungan Percobaan Bunuh Diri','Lain-lain') NOT NULL,
            `riwayat_psiko_hubungan_keluarga` enum('Harmonis','Kurang Harmonis','Tidak Harmonis','Konflik Besar') NOT NULL,
            `riwayat_psiko_tinggal` enum('Sendiri','Orang Tua','Suami/Istri','Keluarga','Lain-lain') NOT NULL,
            `riwayat_psiko_nilai_kepercayaan` enum('Tidak Ada','Ada') NOT NULL,
            `riwayat_psiko_pendidikan_pj` enum('-','TS','TK','SD','SMP','SMA','SLTA/SEDERAJAT','D1','D2','D3','D4','S1','S2','S3') NOT NULL,
            `riwayat_psiko_edukasi_diberikan` enum('Pasien','Keluarga') NOT NULL,
            `penilaian_nyeri` enum('Tidak Ada Nyeri','Nyeri Akut','Nyeri Kronis') NOT NULL,
            `penilaian_nyeri_penyebab` enum('Proses Penyakit','Benturan','Lain-lain') NOT NULL,
            `penilaian_nyeri_kualitas` enum('Seperti Tertusuk','Berdenyut','Teriris','Tertindih','Tertiban','Lain-lain') NOT NULL,
            `penilaian_nyeri_lokasi` varchar(50) NOT NULL,
            `penilaian_nyeri_menyebar` enum('Tidak','Ya') NOT NULL,
            `penilaian_nyeri_skala` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
            `penilaian_nyeri_waktu` varchar(5) NOT NULL,
            `penilaian_nyeri_hilang` enum('Istirahat','Medengar Musik','Minum Obat') NOT NULL,
            `penilaian_nyeri_diberitahukan_dokter` enum('Tidak','Ya') NOT NULL,
            `penilaian_nyeri_jam_diberitahukan_dokter` varchar(10) NOT NULL,
            `penilaian_jatuhmorse_skala1` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhmorse_nilai1` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhmorse_skala2` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhmorse_nilai2` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhmorse_skala3` enum('Tidak Ada/Kursi Roda/Perawat/Tirah Baring','Tongkat/Alat Penopang','Berpegangan Pada Perabot') DEFAULT NULL,
            `penilaian_jatuhmorse_nilai3` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhmorse_skala4` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhmorse_nilai4` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhmorse_skala5` enum('Normal/Tirah Baring/Imobilisasi','Lemah','Terganggu') DEFAULT NULL,
            `penilaian_jatuhmorse_nilai5` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhmorse_skala6` enum('Sadar Akan Kemampuan Diri Sendiri','Sering Lupa Akan Keterbatasan Yang Dimiliki') DEFAULT NULL,
            `penilaian_jatuhmorse_nilai6` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhmorse_totalnilai` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala1` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai1` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala2` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai2` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala3` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai3` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala4` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai4` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala5` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai5` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala6` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai6` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala7` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai7` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala8` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai8` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala9` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai9` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala10` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai10` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_skala11` enum('Tidak','Ya') DEFAULT NULL,
            `penilaian_jatuhsydney_nilai11` tinyint(4) DEFAULT NULL,
            `penilaian_jatuhsydney_totalnilai` tinyint(4) DEFAULT NULL,
            `skrining_gizi1` enum('Tidak ada penurunan berat badan','Tidak yakin/ tidak tahu/ terasa baju lebih longgar','Ya 1-5 kg','Ya 6-10 kg','Ya 11-15 kg','Ya > 15 kg') DEFAULT NULL,
            `nilai_gizi1` int(11) DEFAULT NULL,
            `skrining_gizi2` enum('Tidak','Ya') DEFAULT NULL,
            `nilai_gizi2` int(11) DEFAULT NULL,
            `nilai_total_gizi` double DEFAULT NULL,
            `skrining_gizi_diagnosa_khusus` enum('Tidak','Ya') DEFAULT NULL,
            `skrining_gizi_diketahui_dietisen` enum('Tidak','Ya') DEFAULT NULL,
            `skrining_gizi_jam_diketahui_dietisen` varchar(10) DEFAULT NULL,
            `rencana` varchar(200) DEFAULT NULL,
            `nip1` varchar(20) NOT NULL,
            `nip2` varchar(20) NOT NULL,
            `kd_dokter` varchar(20) NOT NULL,
            PRIMARY KEY (`no_rawat`),
            KEY `nip1` (`nip1`),
            KEY `nip2` (`nip2`),
            KEY `kd_dokter` (`kd_dokter`),
            CONSTRAINT `mlite_penilaian_awal_keperawatan_ranap_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_penilaian_awal_keperawatan_ranap_ibfk_2` FOREIGN KEY (`nip1`) REFERENCES `petugas` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_penilaian_awal_keperawatan_ranap_ibfk_3` FOREIGN KEY (`nip2`) REFERENCES `petugas` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_penilaian_awal_keperawatan_ranap_ibfk_4` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
                    
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_penilaian_medis_igd` (
            `no_rawat` varchar(17) NOT NULL,
            `tanggal` datetime NOT NULL,
            `kd_dokter` varchar(20) NOT NULL,
            `anamnesis` enum('Autoanamnesis','Alloanamnesis') NOT NULL,
            `hubungan` varchar(100) NOT NULL,
            `keluhan_utama` varchar(2000) NOT NULL DEFAULT '',
            `rps` varchar(2000) NOT NULL,
            `rpd` varchar(1000) NOT NULL DEFAULT '',
            `rpk` varchar(1000) NOT NULL,
            `rpo` varchar(1000) NOT NULL,
            `alergi` varchar(100) NOT NULL DEFAULT '',
            `keadaan` enum('Sehat','Sakit Ringan','Sakit Sedang','Sakit Berat') NOT NULL,
            `gcs` varchar(10) NOT NULL,
            `kesadaran` enum('Compos Mentis','Apatis','Somnolen','Sopor','Koma') NOT NULL,
            `td` varchar(8) NOT NULL DEFAULT '',
            `nadi` varchar(5) NOT NULL DEFAULT '',
            `rr` varchar(5) NOT NULL,
            `suhu` varchar(5) NOT NULL DEFAULT '',
            `spo` varchar(5) NOT NULL,
            `bb` varchar(5) NOT NULL DEFAULT '',
            `tb` varchar(5) NOT NULL DEFAULT '',
            `kepala` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `mata` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `gigi` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `leher` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `thoraks` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `abdomen` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `genital` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `ekstremitas` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `ket_fisik` text NOT NULL,
            `ket_lokalis` text NOT NULL,
            `ekg` text NOT NULL,
            `rad` text NOT NULL,
            `lab` text NOT NULL,
            `diagnosis` varchar(500) NOT NULL,
            `tata` text NOT NULL,
            PRIMARY KEY (`no_rawat`),
            KEY `kd_dokter` (`kd_dokter`),
            CONSTRAINT `mlite_penilaian_medis_igd_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_penilaian_medis_igd_ibfk_2` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
                    
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_penilaian_medis_ralan` (
            `no_rawat` varchar(17) NOT NULL,
            `tanggal` datetime NOT NULL,
            `kd_dokter` varchar(20) NOT NULL,
            `anamnesis` enum('Autoanamnesis','Alloanamnesis') NOT NULL,
            `hubungan` varchar(30) NOT NULL,
            `keluhan_utama` varchar(2000) NOT NULL DEFAULT '',
            `rps` varchar(2000) NOT NULL,
            `rpd` varchar(1000) NOT NULL DEFAULT '',
            `rpk` varchar(1000) NOT NULL,
            `rpo` varchar(1000) NOT NULL,
            `alergi` varchar(50) NOT NULL DEFAULT '',
            `keadaan` enum('Sehat','Sakit Ringan','Sakit Sedang','Sakit Berat') NOT NULL,
            `gcs` varchar(10) NOT NULL,
            `kesadaran` enum('Compos Mentis','Apatis','Somnolen','Sopor','Koma') NOT NULL,
            `td` varchar(8) NOT NULL DEFAULT '',
            `nadi` varchar(5) NOT NULL DEFAULT '',
            `rr` varchar(5) NOT NULL,
            `suhu` varchar(5) NOT NULL DEFAULT '',
            `spo` varchar(5) NOT NULL,
            `bb` varchar(5) NOT NULL DEFAULT '',
            `tb` varchar(5) NOT NULL DEFAULT '',
            `kepala` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `gigi` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `tht` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `thoraks` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `abdomen` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `genital` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `ekstremitas` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `kulit` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `ket_fisik` text NOT NULL,
            `ket_lokalis` text NOT NULL,
            `penunjang` text NOT NULL,
            `diagnosis` varchar(500) NOT NULL,
            `tata` text NOT NULL,
            `konsulrujuk` varchar(1000) NOT NULL,
            PRIMARY KEY (`no_rawat`),
            KEY `kd_dokter` (`kd_dokter`),
            CONSTRAINT `mlite_penilaian_medis_ralan_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_penilaian_medis_ralan_ibfk_2` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
                    
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_penilaian_medis_ranap` (
            `no_rawat` varchar(17) NOT NULL,
            `tanggal` datetime NOT NULL,
            `kd_dokter` varchar(20) NOT NULL,
            `anamnesis` enum('Autoanamnesis','Alloanamnesis') NOT NULL,
            `hubungan` varchar(100) NOT NULL,
            `keluhan_utama` varchar(2000) NOT NULL DEFAULT '',
            `rps` varchar(2000) NOT NULL,
            `rpd` varchar(1000) NOT NULL DEFAULT '',
            `rpk` varchar(1000) NOT NULL,
            `rpo` varchar(1000) NOT NULL,
            `alergi` varchar(100) NOT NULL DEFAULT '',
            `keadaan` enum('Sehat','Sakit Ringan','Sakit Sedang','Sakit Berat') NOT NULL,
            `gcs` varchar(10) NOT NULL,
            `kesadaran` enum('Compos Mentis','Apatis','Somnolen','Sopor','Koma') NOT NULL,
            `td` varchar(8) NOT NULL DEFAULT '',
            `nadi` varchar(5) NOT NULL DEFAULT '',
            `rr` varchar(5) NOT NULL,
            `suhu` varchar(5) NOT NULL DEFAULT '',
            `spo` varchar(5) NOT NULL,
            `bb` varchar(5) NOT NULL DEFAULT '',
            `tb` varchar(5) NOT NULL DEFAULT '',
            `kepala` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `mata` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `gigi` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `tht` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `thoraks` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `jantung` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `paru` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `abdomen` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `genital` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `ekstremitas` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `kulit` enum('Normal','Abnormal','Tidak Diperiksa') NOT NULL,
            `ket_fisik` text NOT NULL,
            `ket_lokalis` text NOT NULL,
            `lab` text NOT NULL,
            `rad` text NOT NULL,
            `penunjang` text NOT NULL,
            `diagnosis` varchar(500) NOT NULL,
            `tata` text NOT NULL,
            `edukasi` varchar(1000) NOT NULL,
            PRIMARY KEY (`no_rawat`),
            KEY `kd_dokter` (`kd_dokter`),
            CONSTRAINT `mlite_penilaian_medis_ranap_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_penilaian_medis_ranap_ibfk_2` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
          
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_penilaian_ulang_nyeri` (
            `no_rawat` varchar(17) NOT NULL,
            `tanggal` datetime NOT NULL,
            `nyeri` enum('Tidak Ada Nyeri','Nyeri Akut','Nyeri Kronis') NOT NULL,
            `provokes` enum('Proses Penyakit','Benturan','Lain-lain','-') NOT NULL,
            `ket_provokes` varchar(40) NOT NULL,
            `quality` enum('Seperti Tertusuk','Berdenyut','Teriris','Tertindih','Tertiban','Lain-lain','-') NOT NULL,
            `ket_quality` varchar(50) NOT NULL,
            `lokasi` varchar(50) NOT NULL,
            `menyebar` enum('Tidak','Ya') NOT NULL,
            `skala_nyeri` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
            `durasi` varchar(25) NOT NULL,
            `nyeri_hilang` enum('Istirahat','Medengar Musik','Minum Obat','-') NOT NULL,
            `ket_nyeri` varchar(40) NOT NULL,
            `manajemen_nyeri` varchar(1000) DEFAULT NULL,
            `nip` varchar(20) NOT NULL,
            PRIMARY KEY (`no_rawat`,`tanggal`),
            KEY `nip` (`nip`),
            CONSTRAINT `mlite_penilaian_ulang_nyeri_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_penilaian_ulang_nyeri_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
                    
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_peta_mukosa_rongga_mulut` (
            `no_rawat` varchar(17) NOT NULL,
            `tanggal` datetime NOT NULL,
            `kelainan` text,
            `gambar` text,
            `nip` varchar(20) NOT NULL,
            PRIMARY KEY (`no_rawat`),
            KEY `nip` (`nip`),
            CONSTRAINT `mlite_peta_mukosa_rongga_mulut_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `mlite_peta_mukosa_rongga_mulut_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
                            
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_triase` (
            `no_rawat` varchar(17) NOT NULL,
            `tgl_kunjungan` datetime NOT NULL,
            `cara_masuk` enum('Jalan','Brankar','Kursi Roda','Digendong') NOT NULL,
            `alat_transportasi` enum('-','AGD','Sendiri','Swasta') NOT NULL,
            `alasan_kedatangan` enum('Datang Sendiri','Polisi','Rujukan','-') NOT NULL,
            `keterangan_kedatangan` varchar(100) NOT NULL,
            `macam_kasus` enum('Trauma Kecelakaan Lalu Lintas','Trauma Kecelakaan Kerja','Trauma Kasus Unit Pelayanan Anak & Perempuan','Trauma Lainnya','Non Trauma') NOT NULL,
            `tekanan_darah` varchar(8) NOT NULL,
            `nadi` varchar(3) NOT NULL,
            `pernapasan` varchar(3) NOT NULL,
            `suhu` varchar(5) NOT NULL,
            `saturasi_o2` varchar(3) NOT NULL,
            `nyeri` varchar(5) NOT NULL,
            `jenis_triase` enum('Primer','Sekunder') NOT NULL,
            `keluhan_utama` varchar(500) NOT NULL,
            `kebutuhan_khusus` enum('-','UPPA','Airborne','Dekontaminan') NOT NULL,
            `catatan` varchar(100) NOT NULL,
            `plan` enum('Ruang Resusitasi','Ruang Kritis','Zona Kuning','Zona Hijau') NOT NULL,
            `nik` varchar(20) NOT NULL,
            PRIMARY KEY (`no_rawat`),
            CONSTRAINT `mlite_triase_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
          
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_triase_detail` (
            `no_rawat` varchar(17) NOT NULL,
            `skala` varchar(3) NOT NULL,
            `kode_skala` varchar(3) NOT NULL,
            PRIMARY KEY (`no_rawat`,`skala`,`kode_skala`) USING BTREE,
            CONSTRAINT `mlite_triase_detail_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
          
          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_triase_pemeriksaan` (
            `kode_pemeriksaan` varchar(3) NOT NULL,
            `nama_pemeriksaan` varchar(150) DEFAULT NULL,
            PRIMARY KEY (`kode_pemeriksaan`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

          $this->core->db()->pdo()->exec("INSERT INTO `mlite_triase_pemeriksaan` (`kode_pemeriksaan`, `nama_pemeriksaan`)
          VALUES
            ('001','JALAN NAFAS'),
            ('002','PERNAFASAN DEWASA'),
            ('003','PERNAFASAN ANAK'),
            ('004','SIRKULASI DEWASA'),
            ('005','SIRKULASI ANAK'),
            ('006','MENTAL STATUS'),
            ('007','SKOR NYERI'),
            ('008','ASSESMENT TRIASE');");

          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_triase_skala` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `kode_pemeriksaan` varchar(3) NOT NULL,
            `skala` int(11) NOT NULL,
            `kode_skala` varchar(3) NOT NULL,
            `pengkajian_skala` varchar(150) NOT NULL,
            PRIMARY KEY (`id`),
            KEY `kode_pemeriksaan` (`kode_pemeriksaan`),
            CONSTRAINT `mlite_triase_skala_ibfk_1` FOREIGN KEY (`kode_pemeriksaan`) REFERENCES `mlite_triase_pemeriksaan` (`kode_pemeriksaan`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

          $this->core->db()->pdo()->exec("INSERT INTO `mlite_triase_skala` (`id`, `kode_pemeriksaan`, `skala`, `kode_skala`, `pengkajian_skala`)
          VALUES
            (1,'001',1,'001','Sumbatan Total'),
            (2,'002',1,'002','Henti Nafas'),
            (3,'002',1,'003','Frekuensi Nafas < 10x/menit'),
            (4,'003',1,'004','Henti Nafas'),
            (5,'003',1,'005','Retraksi berat, sianosis'),
            (6,'004',1,'006','Nadi Karotis Tidak Teraba'),
            (7,'005',1,'007','Nadi Karotis Tidak Teraba'),
            (8,'005',1,'008','Pucat'),
            (9,'005',1,'009','Akral Dingin'),
            (10,'005',1,'010','CRT > 4 detik'),
            (11,'006',1,'011','Tidak Respon (GCS < 8)'),
            (12,'007',1,'012','Nyeri Jantung VAS 10'),
            (13,'008',1,'013','Immediate / Segera'),
            (14,'001',2,'001','Sumbatan Parsial'),
            (15,'002',2,'002','Ada Nafas'),
            (16,'003',2,'003','Retraksi sedang'),
            (17,'004',2,'004','Nadi perifer tidak teraba'),
            (18,'004',2,'005','CRT > 2 detik'),
            (19,'004',2,'006','Akral Dingin'),
            (20,'004',2,'007','Pucat'),
            (21,'005',2,'008','Nadi perifer tidak teraba'),
            (22,'005',2,'009','Pucat'),
            (23,'005',2,'010','Akral Dingin'),
            (24,'005',2,'011','CRT 2 - 4 detik'),
            (25,'006',2,'012','Respon terhadap nyeri (GCS 9 - 12)'),
            (26,'007',2,'013','Nyeri jantung VAS 7-9'),
            (27,'008',2,'014','Emergent/ Gawat Darurat'),
            (28,'001',3,'001','Bebas'),
            (29,'002',3,'002','Frekuensi nafas 24- 40x/menit'),
            (30,'003',3,'003','Retraksi ringan'),
            (31,'004',3,'004','Nadi 121-150x/menit'),
            (32,'004',3,'005','Sistolik 160-200mmHg'),
            (33,'004',3,'006','Akral hangat'),
            (34,'005',3,'007','Nadi perifer teraba'),
            (35,'005',3,'008','Pucat'),
            (36,'005',3,'009','Hangat'),
            (37,'006',3,'010','Respon terhadap verbal (GCS 13 - 14)'),
            (38,'007',3,'011','Nyeri Jantung VAS 1-6'),
            (39,'007',3,'012','Nyeri Selain Jantung, VAS 7 - 10'),
            (40,'008',3,'013','Urgent/ Mendesak'),
            (41,'001',4,'001','Bebas'),
            (42,'002',4,'002','Frekuensi nafas 21- 23x/menit'),
            (43,'003',4,'003','Tidak ada retraksi'),
            (44,'004',4,'004','Nadi 81-120x/menit'),
            (45,'004',4,'005','Sistolik 120-159 mmHg'),
            (46,'004',4,'006','Akral Hangat'),
            (47,'005',4,'007','Nadi perifer teraba'),
            (48,'005',4,'008','Merah Muda'),
            (49,'005',4,'009','Hangat'),
            (50,'006',4,'010','Sadar Penuh (GCS 15)'),
            (51,'007',4,'011','Nyeri Selain Jantung, VAS 1-6'),
            (52,'008',4,'012','Semi Urgent / Kurang Mendesak'),
            (53,'001',5,'001','Bebas'),
            (54,'002',5,'002','Frekwensi Nafas 12 - 20x/menit'),
            (55,'003',5,'003','Tidak ada retraksi'),
            (56,'004',5,'004','Nadi 60 - 80x/menit'),
            (57,'004',5,'005','Sistolik < 120 mmHg'),
            (58,'004',5,'006','Akral hangat'),
            (59,'005',5,'007','Nadi Perifer teraba'),
            (60,'005',5,'008','Merah Muda'),
            (61,'005',5,'009','Hangat'),
            (62,'006',5,'010','Sadar Penuh (GCS 15)'),
            (63,'007',5,'011','Tidak ada nyeri'),
            (64,'008',5,'012','Non Urgent/ Tidak Mendesak');");

          $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `utd_stok_darah` (
            `no_kantong` varchar(20) NOT NULL DEFAULT '',
            `kode_komponen` varchar(5) DEFAULT NULL,
            `golongan_darah` enum('A','AB','B','O') DEFAULT NULL,
            `resus` enum('(-)','(+)') DEFAULT NULL,
            `tanggal_aftap` date DEFAULT NULL,
            `tanggal_kadaluarsa` date DEFAULT NULL,
            `asal_darah` enum('Hibah','Beli','Produksi Sendiri') DEFAULT NULL,
            `status` enum('Ada','Diambil','Dimusnahkan') DEFAULT NULL,
            PRIMARY KEY (`no_kantong`),
            KEY `kode_komponen` (`kode_komponen`),
            CONSTRAINT `utd_stok_darah_ibfk_1` FOREIGN KEY (`kode_komponen`) REFERENCES `utd_komponen_darah` (`kode`) ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

        $return = '4.1.8'; 
    case '4.1.8':
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('settings', 'prefix_surat', 'RS')");
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('farmasi', 'keterangan_etiket', '')");
        $this->core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('pcare', 'consumerUserKeyAntrol', '')");
        $this->core->db()->pdo()->exec("ALTER TABLE `mlite_penjualan_detail` CHANGE `id_barang` `id_barang` VARCHAR(11) NOT NULL");

        $this->core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `mlite_set_nomor_surat` (
          `nomor_surat` varchar(10) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

        $return = '5.0.0'; 
    case '5.0.0':
        $return = '5.1.0'; 
    case '5.1.0':
        $return = '5.2.0'; 
    }
return $return;
