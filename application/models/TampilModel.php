<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TampilModel extends CI_Model {
  // Fungsi untuk menampilkan semua data siswa
  public function view(){
    return $this->db->get('presensi')->result();
  }
  
  // Fungsi untuk menampilkan data siswa berdasarkan NIS nya
  public function view_by($id){
    $this->db->where('id', $id);
    return $this->db->get('presensi')->row();
  }

  // Fungsi untuk melakukan ubah data siswa berdasarkan NIS siswa
  public function edit($id){
    $data = array(
      "status" => $this->input->post('input_status'),
      "waktu" => $this->input->post('input_waktu'),
      "nama_lengkap" => $this->input->post('nama_lengkap')
    );
    
    $this->db->where('id', $id);
    $this->db->update('presensi', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('presensi'); // Untuk mengeksekusi perintah delete data
  }
}