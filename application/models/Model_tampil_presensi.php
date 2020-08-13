<?php
  class Model_tampil_presensi extends CI_Model {

    public $table = 'presensi';

    public function cekPresensi($id, $status, $waktu)
    {
      // Get data user yang mempunyai username == $username dan active == 1
      $this->db->where('id', $id);
      $this->db->where('status', $status);
      $this->db->where('waktu', $waktu);
			
      // Jalankan query
      $query = $this->db->get($this->table)->row();
      
      // Jika query gagal atau tidak menemukan username yang sesuai 
      // maka return false
      if (!$query) return false;
      
      // Jika username dan password benar maka return data user
      return $query;        
    }

    public function get()
    {
      // Jalankan query
      $query = $this->db->get($this->table);

      // Return hasil query
      return $query;
    }

    public function get_where($where)
    {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get($this->table);

      // Return hasil query
      return $query;
    }

    public function insert($data)
    {
      // Jalankan query
      $query = $this->db->insert($this->table, $data);

      // Return hasil query
      return $query;
    }

    public function update($nomor, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('nomor', $nomor)
        ->update($this->table, $data);
      
      // Return hasil query
      return $query;
    }

    public function delete($nomor)
    {
      // Jalankan query
      $query = $this->db
        ->where('nomor', $nomor)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }
  }