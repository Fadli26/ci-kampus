<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data["judul"] = "Home";
		$data["mahasiswa"] = $this->db->get('mahasiswa')->num_rows();
		$data["jurusan"] = $this->db->get('jurusan')->num_rows();
		$data["mata_kuliah"] = $this->db->get('mata_kuliah')->num_rows();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		$this->load->view('home/index',$data);
		$this->load->view('templates/footer');
	}
}