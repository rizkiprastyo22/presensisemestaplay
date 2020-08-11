<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('PegawaiModel'); // Load SiswaModel ke controller ini
  }
  
  public function index(){
    $data['pegawai'] = $this->PegawaiModel->view();
    $this->load->view('pegawai/tampil', $data);
  }

  public function tambah(){
    if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
      if($this->PegawaiModel->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
        $this->PegawaiModel->save(); // Panggil fungsi save() yang ada di SiswaModel.php
        redirect('pegawai');
      }
    }
    
    $this->load->view('pegawai/form_tambah');
  }

  public function ubah($id){
    if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
      if($this->PegawaiModel->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
        $this->PegawaiModel->edit($id); // Panggil fungsi edit() yang ada di SiswaModel.php
        redirect('pegawai');
      }
    }
    
    $data['pegawai'] = $this->PegawaiModel->view_by($id);
    $this->load->view('pegawai/form_ubah', $data);
  }
  
  public function hapus($id){
    $this->PegawaiModel->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
    redirect('pegawai');
  }
}