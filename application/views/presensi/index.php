<html>
  <head>
    <title>Presensi Semesta Play</title>
  </head>
  <body>
    <h1>Data Presensi</h1>
    <hr>
    <a href='<?php echo base_url("presensi/tambah"); ?>'>Tambah Data</a><br><br>
    <table border="1" cellpadding="7">
      <tr>
        <th>ID</th>
        <th>Status</th>
        <th>Waktu</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      if( ! empty($siswa)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
        foreach($siswa as $data){
          echo "<tr>
          <td>".$data->id."</td>
          <td>".$data->status."</td>
          <td>".$data->waktu."</td>
          <td><a href='".base_url("siswa/ubah/".$data->id)."'>Ubah</a></td>
          <td><a href='".base_url("siswa/hapus/".$data->id)."'>Hapus</a></td>
          </tr>";
        }
      }else{ // Jika data siswa kosong
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
    </table>
  </body>
</html>