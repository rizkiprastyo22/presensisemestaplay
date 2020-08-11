<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Cek apakah user login 
    // sebagai administrator
    $this->isAdmin();

    // Load model users
    $this->load->model('model_pegawai');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Pegawai';
    $data['pegawai'] = $this->model_pegawai->get()->result();
    $data['pageContent'] = $this->load->view('pegawai/pegawaiList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data username,
      // # required = tidak boleh kosong
      // # min_length[5] = username harus terdiri dari minimal 5 karakter
      // # is_unique[users.username] = username harus bernilai unique, 
      //   tidak boleh sama dengan record yg sudah ada pada tabel users
      $this->form_validation->set_rules('id', 'id', 'required|min_length[10]|is_unique[pegawai.id]');

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
          'id' => $this->input->post('id'),
          'nama_lengkap' => $this->input->post('nama_lengkap')
        );

        // Jalankan function insert pada model_pegawai
        $query = $this->model_pegawai->insert($data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan pegawai');
        else $message = array('status' => true, 'message' => 'Gagal menambahkan pegawai');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('pegawai/add', 'refresh');
			} 
    }
    
    // Data untuk page users/add
    $data['pageTitle'] = 'Tambah Data Pegawai';
    $data['pageContent'] = $this->load->view('pegawai/pegawaiAdd', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap')
        );

        // Jalankan function insert pada model_pegawai
        $query = $this->model_pegawai->update($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui pegawai');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui pegawai');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('pegawai/edit/'.$id, 'refresh');
			} 
    }
    
    // Ambil data user dari database
    $pegawai = $this->model_pegawai->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$pegawai) show_404();

    // Data untuk page users/add
    $data['pageTitle'] = 'Edit Data Pegawai';
    $data['pegawai'] = $pegawai;
    $data['pageContent'] = $this->load->view('pegawai/pegawaiEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($id)
  {
    // Ambil data user dari database
    $pegawai = $this->model_pegawai->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$pegawai) show_404();

    // Jalankan function delete pada model_pegawai
    $query = $this->model_pegawai->delete($id);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus pegawai');
    else $message = array('status' => true, 'message' => 'Gagal menghapus pegawai');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('pegawai', 'refresh');
  }
}