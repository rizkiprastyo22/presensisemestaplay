// Menjalankan Service Worker
if ('serviceWorker' in navigator)
{
  window.addEventListener('load', () => {navigator.serviceWorker.register('/sw.js');});
}

// Membuka Popup
$(document).ready(function(){
  $("#males").click(function(){
    $("#modalForm").modal();
  });
});

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
setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
}

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

function search(){
    $("#loading").show(); // Tampilkan loadingnya
    
    $.ajax({
          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "search.php", // Isi dengan url/path file php yang dituju
          data: {id : $("#id").val()}, // data yang akan dikirim ke file proses
          dataType: "json",
          beforeSend: function(e) {
              if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
              }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
              $("#loading").hide(); // Sembunyikan loadingnya
              
              if(response.status == "success"){ // Jika isi dari array status adalah success
          $("#nama_lengkap").val(response.nama_lengkap); // set textbox dengan id nama
        }else{ // Jika isi dari array status adalah failed
          alert("Data Tidak Ditemukan");
        }
      },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
        alert(xhr.responseText);
          }
      });
  }
  $(document).ready(function(){
    $("#loading").hide(); // Sembunyikan loadingnya
    
      $("#btn-search").click(function(){ // Ketika user mengklik tombol Cari
          search(); // Panggil function search
      });
      
      $("#id").keyup(function(event){ // Ketika user menekan tombol di keyboard
      if(event.keyCode == 13){ // Jika user menekan tombol ENTER
        search(); // Panggil function search
      }
    });
  });