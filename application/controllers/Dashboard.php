<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('TampilModel'); // Load SiswaModel ke controller ini
  }
  
  public function index(){
    $data['presensi'] = $this->TampilModel->view();
    $this->load->view('presensi/tampil', $data);
  }

  public function ubah($id){
    if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
      if($this->TampilModel->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
        $this->TampilModel->edit($id); // Panggil fungsi edit() yang ada di SiswaModel.php
        redirect('dashboard');
      }
    }
    
    $data['presensi'] = $this->TampilModel->view_by($id);
    $this->load->view('presensi/form_ubah', $data);
  }
  
  public function hapus($id){
    $this->TampilModel->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
    redirect('dashboard');
  }
}
