<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model users
    $this->load->model('model_tampil_presensi');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Presensi';
    $data['presensi'] = $this->model_tampil_presensi->get()->result();
    $data['pageContent'] = $this->load->view('daftar/presensiList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }
}