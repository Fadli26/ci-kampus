<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Mahasiswa_model','mahasiswa');
        $this->load->library('form_validation');
    }
	public function index()
	{
        $data["judul"] = "Mahasiswa";
        $data["mahasiswa"] = $this->mahasiswa->getMahasiswa(null);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('mahasiswa/index',$data);
		$this->load->view('templates/footer');
    }
    public function createMahasiswa(){
        $data["judul"] = "Create Mahasiswa";
        $data["mahasiswa"] = $this->mahasiswa->getMahasiswa(null);
        $data["jurusan"] = $this->db->get('jurusan')->result_array();
        // set rules
        $this->form_validation->set_rules('jurusan','Jurusan','required');
        $this->form_validation->set_rules('nama','Nama','required|min_length[5]');
        $this->form_validation->set_rules('nim','Nim','required|is_unique[mahasiswa.nim]|max_length[8]|min_length[5]|numeric');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[mahasiswa.email]');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('mahasiswa/create');
            $this->load->view('templates/footer');
        }else{
            $this->mahasiswa->addDataMahasiswa();
            redirect('mahasiswa');
        }
    }
    public function deleteMahasiswa($id){
        $this->mahasiswa->deleteDataMahasiswa($id);
        redirect('mahasiswa');
    }
    public function addMatkulMhs($id){
        $data["judul"] = "Add Mata Kuliah Mahasiswa";
        $data["mahasiswa"] = $this->mahasiswa->getMahasiswaById($id);
        $data["matkul"] = $this->mahasiswa->getMatkul($data["mahasiswa"]["jurusan_id"]);
        $this->form_validation->set_rules('matkul','Mata Kuliah','required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('mahasiswa/addMatkul',$data);
            $this->load->view('templates/footer');
        }else{
            $nim = $data["mahasiswa"]["nim"];
            $matkul = $this->input->post('matkul');
            $semester = $this->db->get_where('semester',["nim" => $nim, "matkul_id" => $matkul])->row_array();
            if ($semester) {
                // sementara ganti dengan alert bootstrap
                echo "<script>alert('gagal');</script>";
            }else{
                $this->mahasiswa->addMatkul($nim);
                redirect('mahasiswa/detailMhs/' . $data["mahasiswa"]["id"]);
            }
            // var_dump($data["semester"]);
        }
    }
    public function detailMhs($id){
        $data["judul"] = "Detail Mahasiswa";
        $data["mahasiswa"] = $this->mahasiswa->getMahasiswa($id);
        $data["matkulMhs"] = $this->mahasiswa->getMatkulMhs($data["mahasiswa"]["nim"]);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('mahasiswa/detailMhs',$data);
        $this->load->view('templates/footer');
    }
}