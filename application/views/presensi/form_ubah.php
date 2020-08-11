<html>
  <head>
    <title>Form Ubah Presensi</title>
  </head>
  <body>
    <h1>Form Ubah Data Presensi</h1>
    <hr>

    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>

    <?php echo form_open("presensi/ubah/".$presensi->id); ?>
      <table cellpadding="8">
        <tr>
          <td>ID</td>
          <td><input type="text" name="id" value="<?php echo set_value('id', $presensi->id); ?>" readonly></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td><input type="text" name="nama_lengkap" value="<?php echo set_value('nama_lengkap', $presensi->nama_lengkap); ?>"></td>
        </tr>
        <tr>
          <td>Status</td>
          <td><input type="text" name="input_status" value="<?php echo set_value('input_status', $presensi->status); ?>"></td>
        </tr>
        <tr>
          <td>Waktu</td>
          <td>
          <input type="datetime-local" name="input_waktu" value="<?php echo set_value('input_waktu', $presensi->waktu); ?>">
          </td>
        </tr>
      </table>
        
      <hr>
      <input type="submit" name="submit" value="Ubah">
      <a href="<?php echo base_url("dashboard"); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
  </body>
</html>