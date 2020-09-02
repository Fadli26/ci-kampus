<?php
class Mahasiswa_model extends CI_Model{
    public function getMahasiswa($id){
        $this->db->select('*');
        $this->db->from('jurusan');
        $this->db->join('mahasiswa','mahasiswa.jurusan_id = jurusan.id');
        if ($id) {
            $query = $this->db->where('mahasiswa.id',$id)->get()->row_array();
        }else{
            $query = $this->db->get()->result_array();
        }
        return $query;
    }
    public function getMahasiswaById($id){
        return $this->db->get_where('mahasiswa',["id" => $id])->row_array();
    }

    public function addDataMahasiswa(){
        $data =  [
            'nim' => $this->input->post('nim',true),
            'nama' => $this->input->post('nama',true),
            'email' => $this->input->post('email',true),
            'jurusan_id' => $this->input->post('jurusan',true)
        ];
        $this->db->insert('mahasiswa',$data);
        return $this->db->affected_rows('mahasiswa');
    }

    public function deleteDataMahasiswa($id){
      $where['id'] = $id;
      $this->db->delete('mahasiswa',$where);
      return $this->db->affected_rows('mahasiswa');
    }

    public function getMatkul($id){
        $this->db->select('*');
        $this->db->from('jurusan');
        $this->db->join('mata_kuliah','mata_kuliah.jurusan_id = jurusan.id');
        $this->db->where('jurusan.id',$id);
        return $this->db->get()->result_array();
    }
    public function getMatkulMhs($nim){
        $this->db->select('*');
        $this->db->from('semester');
        $this->db->join('mata_kuliah','mata_kuliah.id = semester.matkul_id');
        $this->db->where('semester.nim',$nim);
        return $this->db->get()->result_array();

    }
    public function addMatkul($nim){
        $data = [
            "nim" => $nim,
            "matkul_id" => $this->input->post('matkul')
        ];
        $this->db->insert('semester',$data);
    }

}
