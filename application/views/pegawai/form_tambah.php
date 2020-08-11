<html>
  <head>
    <title>Form Tambah Pegawai</title>
  </head>
  <body>
    <h1>Form Tambah Data Pegawai</h1>
    <hr>
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("pegawai/tambah"); ?>
      <table cellpadding="8">
        <tr>
          <td>ID</td>
          <td><input type="text" name="id" value="<?php echo set_value('id'); ?>"></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td><input type="text" name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>"></td>
        </tr>
      </table>
        
      <hr>
      <input type="submit" name="submit" value="Simpan">
      <a href="<?php echo base_url("pegawai"); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
  </body>
</html>