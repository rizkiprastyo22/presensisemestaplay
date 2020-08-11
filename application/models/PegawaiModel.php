<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PegawaiModel extends CI_Model {
  // Fungsi untuk menampilkan semua data siswa
  public function view(){
    return $this->db->get('pegawai')->result();
  }
  
  // Fungsi untuk menampilkan data siswa berdasarkan NIS nya
  public function view_by($id){
    $this->db->where('id', $id);
    return $this->db->get('pegawai')->row();
  }

  // Fungsi untuk validasi form tambah dan ubah
  public function validation($mode){
    $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
    
    // Tambahkan if apakah $mode save atau update
    // Karena ketika update, ID tidak harus divalidasi
    // Jadi ID di validasi hanya ketika menambah data presensi saja
    if($mode == "save")
    $this->form_validation->set_rules('id', 'id', 'required'); // ID wajib diisi
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required'); // Status wajib dipilih salah satu
      
    if($this->form_validation->run()) // Jika validasi benar
      return TRUE; // Maka kembalikan hasilnya dengan TRUE
    else // Jika ada data yang tidak sesuai validasi
      return FALSE; // Maka kembalikan hasilnya dengan FALSE
  }
  
  // Fungsi untuk melakukan simpan data ke tabel presensi
  public function save(){
    $data = array(
      "id" => $this->input->post('id'), // ID dari input user
      "nama_lengkap" => $this->input->post('nama_lengkap') // Status sesuai pilihan user
    );
    
    $this->db->insert('pegawai', $data); // Untuk mengeksekusi perintah insert data
  }

  public function edit($id){
    $data = array(
      "id" => $this->input->post('id'),
      "nama_lengkap" => $this->input->post('nama_lengkap')
    );
    
    $this->db->where('id', $id);
    $this->db->update('pegawai', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('pegawai'); // Untuk mengeksekusi perintah delete data
  }
}