<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Presensi extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('PresensiModel'); // Load PresensiModel ke controller ini
  }
  
  public function index(){
    $data['presensi'] = $this->PresensiModel->view(); // Inisialisasi untuk pengambilan data
    $this->load->view('presensi/form_tambah', $data); // Redirect ke view form_tambah
  }
  
  public function tambah(){
    if($this->input->post('input_status')){ // Jika user mengklik tombol submit yang ada di form
      if($this->PresensiModel->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
        $this->PresensiModel->save(); // Panggil fungsi save() yang ada di SiswaModel.php
        redirect('presensi');
      }
    }
    
    $this->load->view('presensi/form_tambah');
  }
}

?>