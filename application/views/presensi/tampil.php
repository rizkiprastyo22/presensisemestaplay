<html>
  <head>
    <title>Dashboard</title>
  </head>
  <body>
    <h1>Data Presensi</h1>
    <hr>
    <a href='<?php echo base_url("pegawai"); ?>'>Daftar Pegawai</a><br><br>
    <a href='<?php echo base_url("presensi"); ?>'>Tambah Data</a><br><br>

    <table border="1" cellpadding="7">
      <tr>
        <th>ID</th>
        <th>Nama Lengkap</th>
        <th>Status</th>
        <th>Waktu</th>
      </tr>
      <?php
      if( ! empty($presensi)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
        foreach($presensi as $data){
          echo "<tr>
          <td>".$data->id."</td>
          <td>".$data->nama_lengkap."</td>
          <td>".$data->status."</td>
          <td>".$data->waktu."</td>
          <td><a href='".base_url("dashboard/ubah/".$data->id)."'>Ubah</a></td>
          <td><a href='".base_url("dashboard/hapus/".$data->id)."'>Hapus</a></td>
          </tr>";
        }
      }else{ // Jika data siswa kosong
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
    </table>
  </body>
</html>