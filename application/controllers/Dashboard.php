<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

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
    $data['pageContent'] = $this->load->view('dashboard/presensiList', $data, TRUE);

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
      $this->form_validation->set_rules('status', 'status', 'required|in_list[masuk,istirahat,kembali,pulang]');
      $this->form_validation->set_rules('waktu', 'waktu', 'required');


      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
          'id' => $this->input->post('id'),
          'status' => $this->input->post('status'),
          'waktu' => $this->input->post('waktu')
        );

        // Jalankan function insert pada model_tampil_presensi
        $query = $this->model_tampil_presensi->insert($data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan presensi');
        else $message = array('status' => true, 'message' => 'Gagal menambahkan presensi');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('dashboard/add', 'refresh');
			} 
    }
    
    // Data untuk page users/add
    $data['pageTitle'] = 'Tambah Data Presensi';
    $data['pageContent'] = $this->load->view('dashboard/presensiAdd', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function edit($nomor = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator, alumni] = hanya boleh bernilai 
      //   salah satu di antara administrator atau alumni
      $this->form_validation->set_rules('status', 'status', 'required|in_list[masuk,istirahat,kembali,pulang]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
            'status' => $this->input->post('status')
        );

        // Jalankan function insert pada model_tampil_presensi
        $query = $this->model_tampil_presensi->update($nomor, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui presensi');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui presensi');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('dashboard/edit/'.$nomor, 'refresh');
			} 
    }
    
    // Ambil data user dari database
    $presensi = $this->model_tampil_presensi->get_where(array('nomor' => $nomor))->row();

    // Jika data user tidak ada maka show 404
    if (!$presensi) show_404();

    // Data untuk page users/add
    $data['pageTitle'] = 'Edit Data presensi';
    $data['presensi'] = $presensi;
    $data['pageContent'] = $this->load->view('dashboard/presensiEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($nomor)
  {
    // Ambil data user dari database
    $presensi = $this->model_tampil_presensi->get_where(array('nomor' => $nomor))->row();

    // Jika data user tidak ada maka show 404
    if (!$presensi) show_404();

    // Jalankan function delete pada model_tampil_presensi
    $query = $this->model_tampil_presensi->delete($nomor);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus presensi');
    else $message = array('status' => true, 'message' => 'Gagal menghapus presensi');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('dashboard', 'refresh');
  }
}