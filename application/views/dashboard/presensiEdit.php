<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content light-blue lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="edit-user-form" method="post" action="">
          <?php if(validation_errors()): ?>
            <div class="col s12">
              <div class="card-panel red">
                <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
              </div>
            </div>
          <?php endif; ?>
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <div class="input-field col s12 m6">
              <input id="username" disabled name="id" type="number" value="<?php echo $presensi->id; ?>">
              <label for="id" class="">ID</label>
          </div>
          <div class="input-field col s12 m6">
              <select id="level" name="status">
                  <option value="masuk">Masuk</option>
                  <option value="istirahat">Istirahat</option>
                  <option value="kembali">Kembali</option>
                  <option value="pulang">Pulang</option>
              </select>
              <label>Pilih Status</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="tanggal_mulai" class="datepicker" name="waktu" type="datetime-local" value="<?php echo set_value('waktu'); ?>">
              <label for="waktu" class="">Waktu</label>
          </div>
          <div class="input-field col s12 right-align">
              <button type="submit" name="submit" value="<?php echo $presensi->id; ?>" class="btn amber waves-effect waves-green">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>