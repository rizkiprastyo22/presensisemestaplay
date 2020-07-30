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
  </head>

  <style>
    /* Hide pop up status */
    #myPopup{
      display: none;
    }

    /* Background pada loading bar */
    #myProgress
    {
      visibility: show;
      width: 100%;
      background-color: #ddd;
    }
    
    /* Isi loading bar yang bergerak */
    #myBar
    {
      visibility: show;
      width: 1%;
      height: 30px;
      background-color: #4CAF50;
    }

    /* Pop up setelah presensi */
    #snackbar
    {
      visibility: hidden;
      position: center;
      text-align: center;
      position: absolute;
      /* min-width: 250px; */
      /* margin-left: -125px; */
      /* border-radius: 2px; */
      /* padding: 16px; */
      /* z-index: 1; */
      left: 40%;
      top: 35%;
      font-size: 20px;
      font-family: helvetica;
      font-size : 20px;
      color: #323232;
      background-color: #f5fffa;
    }

    /* Efek pada snackbar ketika muncul dan menghilang */
    #snackbar.show
    {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    /* Judul Presensi Karyawan Semesta Play */
    h1
    {
      text-align: center;
      font-family: helvetica;
      font-size: 50px;
      color: #008080;
    }

    /* Warna background utama pada web */
    body
    {
      background-color: #f5fffa;
    }

    /* Efek pada tulisan ID, Status, dan Jam Sekarang */
    p
    {
      text-align: center;
      font-family: helvetica;
      font-size: 30px;
      color: #323232;
    }

    /* Efek tulisan dalam kotak ID */
    input
    {
      text-align: center;
      align-content: center;
      padding: 42px 42px;
      margin: 8px 8px;
      cursor: pointer;
      font-family: helvetica;
      font-size: 30px;
      border: #b9d9eb;
      border-style: solid;
      border-width: 2px;
      color: #323232;
      background-color: #cdd4e4;
    }

    /* Efek ngilangin tombol status */
    button
    {
      text-align: center;
      align-content: center;
      border: #f5fffa;
      border-style: solid;
      border-width: 2px;
      color : #f5fffa;
      background-color : #f5fffa;
    }

    /* Efek tombol RESET */
    #batal
    {
      text-align: center;
      align-content: center;
      position: absolute;
      display: block;
      cursor: pointer;
      top: 90%;
      left: 43%;
      margin: 8px 8px;
      padding: 42px 42px;
      font-family : helvetica;
      font-size: 30px;
      border: #ff004d;
      border-style: solid;
      border-width: 2px;
      color : white;
      background-color : #ff4040;
    }

    /* Efek tombol MASUK, ISTIRAHAT, KEMBALI, PULANG */
    #masuk, #istirahat, #kembali, #pulang
    {
      text-align: center;
      position: center;
      align-content: center;
      display: inline-block;
      width: 50%;
      padding: 50px 50px;
      border: #00b5b8;
      border-style: solid;
      border-width: 2px;
      color: white;
      background-color: #99badd;
    }

    /* Efek tulisan dalam kotak Jam Sekarang */
    #waktu
    {
      text-align: center;
      align-content: center;
      padding: 35px 35px;
      margin: 2px 2px;
      font-family : helvetica;
      font-size: 30px;
      cursor: pointer;
      border: #b9d9eb;
      border-style: solid;
      border-width: 2px;
      color : #323232;
      background-color: #cdd4e4;
    }

    /* Setelah tombol RESET ditekan, langsung autofocus ke ID */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button
    {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>

  <body>
    <!-- Memunculkan pop up setelah presensi -->
    <div id="snackbar">TERIMAKASIH, AKTIVITAS ANDA TELAH DIREKAM!</div>

    <!-- Judul utama -->
    <h1>Presensi Karyawan Semesta Play</h1>

    <!-- Menampilkan Error jika ID tidak diisi -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>

    <!-- OPEN FORM TAG -->
    <?php echo form_open("presensi/tambah",array("id"=>"hore")); ?>

      <!-- Input ID -->
      <p>ID : <input type="number" name="input_id" id="input_id" value="<?php echo set_value('input_id'); ?>" 
      autofocus="autofocus" placeholder="Silakan tap kartu Anda" maxlength="10"></p>

      <!-- Pop up status -->
      <div id="myPopup">

        <!-- Membuat progress bar -->
        <div id="myProgress">
        <div id="myBar"></div>
        </div><br></br>

          <!-- 4 pilihan status tipe "submit" semua, variabel input_status untuk form, ketika diklik menjalankan fungsi move()-->
          <p>Status : <br></br>
              <input id="masuk" type="submit" name="input_status" value="MASUK" onclick="move()"><br></br>
              <input id="istirahat" type="submit" name="input_status" value="ISTIRAHAT" onclick="move()"> <br></br>
              <input id="kembali" type="submit" name="input_status" value="KEMBALI" onclick="move()"><br></br>
              <input id="pulang" type="submit" name="input_status" value="PULANG" onclick="move()"><br></br><br>

              <!-- Menunjukkan jam sekarang -->
              Jam Sekarang : <input id="waktu" type="text" value="<?php date_default_timezone_set('Asia/Jakarta');
              echo date('H:i'); ?>" readonly="readonly">
      </div>
      
      <!-- Tombol RESET -->
      <input type="reset" style="text-align:center" id="batal" value="RESET">

    <!-- CLOSE FORM TAG -->
    <?php echo form_close(); ?>

    <!-- Button untuk show "status" -->
    <button id="males" onclick="myFunction()">Status</button>
        
    <!-- FUNGSI DALAM SCRIPT -->
    <script>
      // Menjalankan Service Worker
      if ('serviceWorker' in navigator)
      {
        window.addEventListener('load', () => {navigator.serviceWorker.register('/sw.js');});
      }

      // Ketika ENTER ditekan, maka masuk ke input status
      $('#hore').on('keyup keypress', function(e)
      {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13)
        { 
          e.preventDefault();
          document.getElementById("males").click();
        }
      });

      // Ketika pengguna menekan "enter" pada ID, akan muncul pop up
      function myFunction()
      {
        var popup = document.getElementById("myPopup");
        //  var x = document.getElementById("input_id");
        //  if (x.toString().length < 10 && x.toString().length > 10)
        if (popup.style.display === "none")
        {
          popup.style.display = "block";
        }
        else
        {
          popup.style.display = "none";
        }
        // else{
        //   popup.style.display = "none";
        // }
      }

      // function myReset() {
      //   var popup = document.getElementById("myPopup");
      //   popup.style.display = "none";
      // }
      
      // Pop up konfirmasi setelah tombol input status ditekan
      jQuery(function()
      {
        jQuery('input[id=masuk]').click(
        function(){return confirm('Apakah Anda yakin MASUK?');});
        pesan();
      });
        
      jQuery(function()
      {
        jQuery('input[id=istirahat]').click(
        function(){return confirm('Apakah Anda yakin ISTIRAHAT?');});
        pesan();
      });

      jQuery(function()
      {
        jQuery('input[id=kembali]').click(
        function(){return confirm('Apakah Anda yakin KEMBALI?');});
        pesan();
      });

      jQuery(function()
      {
        jQuery('input[id=pulang]').click(
        function(){return confirm('Apakah Anda yakin PULANG?');});
        pesan();
      });

      // Fungsi pop up setelah submit
      function pesan() {
      var x = document.getElementById("snackbar");
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);}
      
      // Fungsi RESET
      var form = document.querySelector('form');
      form.addEventListener('reset', function(event)
      {
        var autofocusField = form.querySelector('[autofocus]');
        if(autofocusField instanceof HTMLInputElement)
        {
          autofocusField.focus();
        }
      });

        // function loading1() {
        //   /* construct manually */
        //   var bar1 = new ldBar("#myItem1");
        //   /* ldBar stored in the element */
        //   var bar2 = document.getElementById('myItem1').ldBar;
        //   bar1.set(60);
        // }
        // function loading2() {
        //   $( "#progressbar" ).progressbar({
        //     value: 37
        //   });
        // } );
      
      // Fungsi progress bar
      function move()
      {
        var i = 0;
        if (i == 0)
        {
          i = 1;
          var elem = document.getElementById("myBar");
          var width = 1;
          var id = setInterval(frame, 10);
          function frame()
          {
            if (width >= 100)
            {
              clearInterval(id);
              i = 0;
            }
            else
            {
              width++;
              elem.style.width = width + "%";
            }
          }
        }
      }
    </script>
  </body>
</html>