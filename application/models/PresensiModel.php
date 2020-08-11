<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class PresensiModel extends CI_Model {
  // Fungsi untuk menampilkan semua data presensi
  public function view(){
    return $this->db->get('presensi')->result();
  }
  
  // Fungsi untuk menampilkan data presensi berdasarkan ID nya
  public function view_byId($id){
    $this->db->where('id', $id);
    $result = $this->db->get('presensi')->row(); // Tampilkan data siswa berdasarkan id
		return $result; 
  }
  
  // Fungsi untuk validasi form tambah dan ubah
  public function validation($mode){
    $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
    
    // Tambahkan if apakah $mode save atau update
    // Karena ketika update, ID tidak harus divalidasi
    // Jadi ID di validasi hanya ketika menambah data presensi saja
    if($mode == "save")
    $this->form_validation->set_rules('id', 'id', 'required'); // ID wajib diisi
    $this->form_validation->set_rules('input_status', 'status', 'required'); // Status wajib dipilih salah satu
      
    if($this->form_validation->run()) // Jika validasi benar
      return TRUE; // Maka kembalikan hasilnya dengan TRUE
    else // Jika ada data yang tidak sesuai validasi
      return FALSE; // Maka kembalikan hasilnya dengan FALSE
  }
  
  // Fungsi untuk melakukan simpan data ke tabel presensi
  public function save(){
    $data = array(
      "id" => $this->input->post('id'), // ID dari input user
      "status" => $this->input->post('input_status'), // Status sesuai pilihan user
      "waktu" => date('Y-m-d H:i:s'), // Waktu sesuai submit kapan
      "nama_lengkap" => $this->input->post('nama_lengkap') // Status sesuai pilihan user
    );
    
    $this->db->insert('presensi', $data); // Untuk mengeksekusi perintah insert data
  }

  function get_data_pegawai_byid($id){
		$hsl=$this->db->query("SELECT * FROM pegawai WHERE id='$id'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id' => $data->id,
					'nama_lengkap' => $data->nama_lengkap,
					);
			}
		}
		return $hasil;
  }
  
  function get_data_masuk_byid($id){
		$hsl=$this->db->query("SELECT id, status, DATE_FORMAT(waktu, '%H:%i') as `waktu` 
      FROM presensi WHERE id='$id' AND status='masuk' AND DATE(waktu)=CURDATE() LIMIT 1");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id' => $data->id,
          'status' => $data->status,
          'waktu' => $data->waktu
					);
			}
		}
		return $hasil;
  }
  
  function get_data_istirahat_byid($id){
		$hsl=$this->db->query("SELECT id, status, DATE_FORMAT(waktu, '%H:%i') as `waktu` 
      FROM presensi WHERE id='$id' AND status='istirahat' AND DATE(waktu)=CURDATE() LIMIT 1");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id' => $data->id,
          'status' => $data->status,
          'waktu' => $data->waktu
					);
			}
		}
		return $hasil;
  }
  
  function get_data_kembali_byid($id){
		$hsl=$this->db->query("SELECT id, status, DATE_FORMAT(waktu, '%H:%i') as `waktu` 
      FROM presensi WHERE id='$id' AND status='kembali' AND DATE(waktu)=CURDATE() LIMIT 1");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id' => $data->id,
          'status' => $data->status,
          'waktu' => $data->waktu
					);
			}
		}
		return $hasil;
  }
  
  function get_data_pulang_byid($id){
		$hsl=$this->db->query("SELECT id, status, DATE_FORMAT(waktu, '%H:%i') as `waktu` 
      FROM presensi WHERE id='$id' AND status='pulang' AND DATE(waktu)=CURDATE() LIMIT 1");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id' => $data->id,
          'status' => $data->status,
          'waktu' => $data->waktu
					);
			}
		}
		return $hasil;
	}
}

?>