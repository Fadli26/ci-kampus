<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $this->load->library(['form_validation', 'session']);
    }

    public function index()
    {
        $data["judul"] = "Mahasiswa";
        $data["mahasiswa"] = $this->mahasiswa->getMahasiswa(null);
        $data["jurusan"] = $this->db->get('jurusan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    private function _formVal()
    {
        // set rules
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[5]');

        // SEMENTARA MENGHILANGKAN is_unique PADA VALIDATION DIBAWAH, KARNA MENYEBABKAN UPDATE TIDAK BEKERJA
        // $this->form_validation->set_rules('nim', 'Nim', 'required|is_unique[mahasiswa.nim]|max_length[8]|min_length[5]|numeric');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[mahasiswa.email]');

        $this->form_validation->set_rules('nim', 'Nim', 'required|max_length[8]|min_length[5]|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    }

    public function createMahasiswa()
    {
        $data["judul"] = "Create Mahasiswa";
        $data["mahasiswa"] = $this->mahasiswa->getMahasiswa(null);
        $data["jurusan"] = $this->db->get('jurusan')->result_array();

        $this->_formVal();

        if ($this->form_validation->run()) {
            $result = $this->mahasiswa->addDataMahasiswa();
            if ($result > 0) {
                $this->session->set_flashdata(
                  'insert_status',
                  "<div class='alert alert-success' role='alert'>
              Berhasil menambah data mahasiswa
          </div>"
              );
            } else {
                $this->session->set_flashdata(
                  'insert_status',
                  "<div class='alert alert-danger' role='alert'>
                Gagal menambah data mahasiswa
              </div>"
              );
            }
            redirect('mahasiswa');
        }

        // akan otomatis dieksekusi ketika form_validation tidak run
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('mahasiswa/create');
        $this->load->view('templates/footer');
    }

    public function addMatkulMhs($id)
    {
        $data["judul"] = "Add Mata Kuliah Mahasiswa";
        $data["mahasiswa"] = $this->mahasiswa->getMahasiswaById($id);
        $data["matkul"] = $this->mahasiswa->getMatkul($data["mahasiswa"]["jurusan_id"]);
        $this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required');
        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('mahasiswa/addMatkul', $data);
            $this->load->view('templates/footer');
        } else {
            $nim = $data["mahasiswa"]["nim"];
            $matkul = $this->input->post('matkul');
            $semester = $this->db->get_where('semester', ["nim" => $nim, "matkul_id" => $matkul])->row_array();
            if ($semester) {
                // sementara ganti dengan alert bootstrap
                echo "<script>alert('gagal');</script>";
            } else {
                $this->mahasiswa->addMatkul($nim);
                redirect('mahasiswa/detailMhs/' . $data["mahasiswa"]["id"]);
            }
            // var_dump($data["semester"]);
        }
    }

    public function updateMahasiswa($id)
    {
        $this->_formVal();

        if ($this->form_validation->run()) {
            $result = $this->mahasiswa->updateDataMahasiswa();
            if ($result > 0) {
                $this->session->set_flashdata(
                        'insert_status',
                        "<div class='alert alert-success' role='alert'>
                    Berhasil mengubah data mahasiswa
                </div>"
                    );
            } else {
                $this->session->set_flashdata(
                        'insert_status',
                        "<div class='alert alert-danger' role='alert'>
                      Gagal mengubah data mahasiswa
                    </div>"
                    );
            }
            redirect('mahasiswa');
        }

        $data['mahasiswa'] = $this->mahasiswa->getMahasiswaById($id);
        $data["jurusan"] = $this->db->get('jurusan')->result_array();
        $data['judul'] = 'Update Mahasiswa';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('mahasiswa/update', $data);
        $this->load->view('templates/footer');
    }

    public function deleteMahasiswa($id)
    {
        $result = $this->mahasiswa->deleteDataMahasiswa($id);
        if ($result > 0) {
            $this->session->set_flashdata(
                'insert_status',
                "<div class='alert alert-success' role='alert'>
            Berhasil menghapus data mahasiswa
        </div>"
            );
        } else {
            $this->session->set_flashdata(
                'insert_status',
                "<div class='alert alert-danger' role='alert'>
              Gagal menghapus data mahasiswa
            </div>"
            );
        }
        redirect('mahasiswa');
    }

    public function detailMhs($id)
    {
        $data["judul"] = "Detail Mahasiswa";
        $data["mahasiswa"] = $this->mahasiswa->getMahasiswa($id);
        $data["matkulMhs"] = $this->mahasiswa->getMatkulMhs($data["mahasiswa"]["nim"]);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('mahasiswa/detailMhs', $data);
        $this->load->view('templates/footer');
    }
}
