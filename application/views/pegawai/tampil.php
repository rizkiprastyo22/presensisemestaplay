<html>
  <head>
    <title>Pegawai</title>
  </head>
  <body>
    <h1>Data Pegawai</h1>
    <hr>
    <a href='<?php echo base_url("pegawai/tambah"); ?>'>Tambah Pegawai</a><br><br>

    <table border="1" cellpadding="7">
      <tr>
        <th>ID</th>
        <th>Nama Lengkap</th>
      </tr>
      <?php
      if( ! empty($pegawai)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
        foreach($pegawai as $data){
          echo "<tr>
          <td>".$data->id."</td>
          <td>".$data->nama_lengkap."</td>
          <td><a href='".base_url("pegawai/ubah/".$data->id)."'>Ubah</a></td>
          <td><a href='".base_url("pegawai/hapus/".$data->id)."'>Hapus</a></td>
          </tr>";
        }
      }else{ // Jika data siswa kosong
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
    </table>
  </body>
</html>