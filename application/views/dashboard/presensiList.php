<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content light-blue lighten-1 white-text">
          <span class="card-title">Data Presensi</span>
          <a href="<?php echo base_url('dashboard/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light amber tooltipped" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <table class="bordered highlight">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Status</th>
                      <th>Waktu</th>
                      <th class="center-align">Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($presensi as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->nama_lengkap; ?></td>
                      <td><?php echo $row->status; ?></td>
                      <td><?php echo $row->waktu; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('dashboard/edit/' . $row->nomor); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Edit Data"><i class="material-icons">edit</i></a>
                        <a href="<?php echo base_url('dashboard/delete/' . $row->nomor); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>