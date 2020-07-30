USE db_semestaplay;
DROP TABLE presensi;
CREATE TABLE `pegawai` (
  `id` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) 
ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
SELECT * FROM pegawai;
CREATE TABLE `presensi` (
  `id` varchar(50) NOT NULL,
  `status` enum('masuk','istirahat','kembali','pulang') NOT NULL,
  `waktu` datetime NOT NULL,
  FOREIGN KEY (`id`) REFERENCES `pegawai`(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
SELECT*FROM presensi;
INSERT INTO pegawai VALUES
('0010227942', 'Pras'),
('0010481263','Sheilla'),
('0010471828','Nabila'),
('0010469633','Ara'),
('0010489389','Nuha'),
('0010468813','Yuniar'),
('0010496194','Rizal'),
('0010485902','Langit'),
('0010499258','Leon');
DELETE FROM presensi WHERE id = '0010469633';