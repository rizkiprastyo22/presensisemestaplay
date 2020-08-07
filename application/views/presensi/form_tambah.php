<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=0.4">
    <meta name="Description" content="Presensi" />
    <!-- Mendeklarasikan warna yang muncul pada address bar Chrome versi seluler -->
    <meta name="theme-color" content="#414f57" />
    <!-- Mendeklarasikan ikon untuk iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta name="apple-mobile-web-app-title" content="Semesta" />
    <link rel="apple-touch-icon" href="/semestaplay.png" />
    <!-- Mendeklarasikan ikon untuk Windows -->
    <meta name="msapplication-TileImage" content="/semestaplay.png" />
    <meta name="msapplication-TileColor" content="#000000" />

    <title>Presensi Karyawan Semesta Play</title>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="/assets/loading-bar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" type="text/css" href="/assets/loading-bar.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- CSS -->
    <link href="<?php echo base_url('assets/css/form_tambah.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>

  <body>
    <!-- Memunculkan pop up setelah presensi -->
    <div id="snackbar">TERIMAKASIH, AKTIVITAS ANDA TELAH DIREKAM!</div>

    <!-- Judul utama -->
    <h1>Presensi Karyawan Semesta Play</h1>
    <hr></hr>

    <!-- Menampilkan Error jika ID tidak diisi -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>

    <!-- OPEN FORM TAG -->
    <?php echo form_open("presensi/tambah",array("id"=>"hore")); ?>

      <!-- Input ID -->
      <p><br>ID : <input type="number" name="input_id" id="input_id" value="<?php echo set_value('input_id'); ?>" 
      autofocus="autofocus" placeholder="Silakan tap kartu Anda" maxlength="10"></p>

      <!-- Menunjukkan jam sekarang -->
      <p>Jam Sekarang : <input id="waktu" type="text" value="<?php date_default_timezone_set('Asia/Jakarta');
      echo date('H:i'); ?>" readonly="readonly">
      
      <!-- Popup -->
      <div class="modal fade" id="modalForm" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <!-- Popup Header -->
            <div class="modal-header" id="header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Tutup</span>
              </button>
              <h3 class="modal-title" id="labelModalKu">Status</h3>
            </div>
            
            <!-- Popup Body -->
            <div class="modal-body" id="popup">
              <p class="statusMsg"></p>

              <!-- Membuat progress bar -->
              <div id="myProgress">
              <div id="myBar"></div>
              </div><br></br>

              <!-- 4 pilihan status tipe "submit" semua, variabel input_status untuk form, ketika diklik menjalankan fungsi move()-->
              <input id="masuk" type="submit" name="input_status" value="MASUK" onclick="move()"><br></br>
              <input id="istirahat" type="submit" name="input_status" value="ISTIRAHAT" onclick="move()"> <br></br>
              <input id="kembali" type="submit" name="input_status" value="KEMBALI" onclick="move()"><br></br>
              <input id="pulang" type="submit" name="input_status" value="PULANG" onclick="move()"><br></br><br>
            </div>

                  <!-- Popup Footer -->
                  <div class="modal-footer" id="footer">
                    <input type="reset" id="ulang" class="btn btn-default" data-dismiss="modal" value="BATAL">
                  </div>
              </div>
          </div>
      </div>
        
        <!-- Tombol RESET -->
        <input type="reset" id="batal" value="RESET">
        
      <!-- CLOSE FORM TAG -->
      <?php echo form_close(); ?>

    <!-- Tombol untuk memicu modal -->
    <button id="males">
          Status
    </button>
        
    <!-- JS -->
    <script src="<?php echo base_url('assets/js/form_tambah.js'); ?>"></script>
    
  </body>
</html>