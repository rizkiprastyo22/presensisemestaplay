<html>
  <head>
    <title>Form Ubah Presensi</title>
  </head>
  <body>
    <h1>Form Ubah Data Presensi</h1>
    <hr>

    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>

    <?php echo form_open("presensi/ubah/".$pegawai->id); ?>
      <table cellpadding="8">
        <tr>
          <td>ID</td>
          <td><input type="text" name="id" value="<?php echo set_value('id', $pegawai->id); ?>" readonly></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td><input type="text" name="nama_lengkap" value="<?php echo set_value('nama_lengkap', $pegawai->nama_lengkap); ?>"></td>
        </tr>
      </table>
        
      <hr>
      <input type="submit" name="submit" value="Ubah">
      <a href="<?php echo base_url("pegawai"); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
  </body>
</html>