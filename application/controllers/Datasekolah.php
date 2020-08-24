<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Datasekolah extends CI_Controller
{
        public function index()
        {
                $data['guru'] = $this->db->get('guru')->result_array();
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = 'Data Guru';

                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('nip', 'Nip', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('mapel', 'Mapel', 'required');

                if ($this->form_validation->run() == false) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sidebar', $data);
                        $this->load->view('templates/topbar', $data);
                        $this->load->view('datasekolah/index', $data);
                        $this->load->view('templates/footer');
                } else {
                        $data = [
                                'name' => $this->input->post('nama'),
                                'nip' => $this->input->post('nip'),
                                'gender' => $this->input->post('gender'),
                                'alamat' => $this->input->post('alamat'),
                                'mapel' => $this->input->post('mapel')
                        ];

                        $this->db->insert('guru', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New data added</div>');
                        redirect('datasekolah');
                }
        }

        public function staff()
        {
                $data['staff'] = $this->db->get('staff')->result_array();
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = 'Data Staff';

                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('np', 'Np', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('bidang', 'Bidang', 'required');

                if ($this->form_validation->run() == false) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sidebar', $data);
                        $this->load->view('templates/topbar', $data);
                        $this->load->view('datasekolah/staff', $data);
                        $this->load->view('templates/footer');
                } else {
                        $data = [
                                'nama' => $this->input->post('nama'),
                                'np' => $this->input->post('np'),
                                'gender' => $this->input->post('gender'),
                                'alamat' => $this->input->post('alamat'),
                                'bidang' => $this->input->post('bidang')
                        ];

                        $this->db->insert('staff', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New data added</div>');
                        redirect('datasekolah/staff');
                }
        }

        public function siswa()
        {
                $data['class'] = $this->db->get('class')->result_array();
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = 'Data Siswa';

                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('nisn', 'Nisn', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('kelas', 'Kelas', 'required');
                $this->form_validation->set_rules('kelas_id', 'Kelas_id', 'required');

                if ($this->form_validation->run() == false) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sidebar', $data);
                        $this->load->view('templates/topbar', $data);
                        $this->load->view('datasekolah/siswa', $data);
                        $this->load->view('templates/footer');
                } else {
                        $data = [
                                'nama' => $this->input->post('nama'),
                                'nisn' => $this->input->post('nisn'),
                                'gender' => $this->input->post('gender'),
                                'kelas' => $this->input->post('kelas'),
                                'kelas_id' => $this->input->post('kelas_id')
                        ];

                        $this->db->insert('siswa', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New data added</div>');
                        redirect('datasekolah/siswa');
                }
        }

        public function detail($id)
        {
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = 'Data Siswa';
                $data['siswa'] = $this->db->get_where('siswa', ['kelas_id' => $id])->result_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('datasekolah/detail', $data);
                $this->load->view('templates/footer');
        }


        public function getUbah()
        {
                echo json_encode($this->db->get_where('siswa', ['id' => $_POST['id']])->row_array());
        }

        public function getUbahStaff()
        {
                echo json_encode($this->db->get_where('staff', ['id' => $_POST['id']])->row_array());
        }

        public function getUbahGuru()
        {
                echo json_encode($this->db->get_where('guru', ['id' => $_POST['id']])->row_array());
        }

        public function ubah()
        {

                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = 'Data Siswa';


                $id = $this->input->post('kelas_id');
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('nisn', 'Nisn', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('kelas', 'Kelas', 'required');

                if ($this->form_validation->run() == false) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sidebar', $data);
                        $this->load->view('templates/topbar', $data);
                        $this->load->view('datasekolah/siswa', $data);
                        $this->load->view('templates/footer');
                } else {
                        $data = [
                                'nama' => $this->input->post('nama'),
                                'nisn' => $this->input->post('nisn'),
                                'gender' => $this->input->post('gender'),
                                'kelas' => $this->input->post('kelas'),
                                'id' => $this->input->post('id')
                        ];


                        $this->db->where('id', $data['id']);
                        $this->db->update('siswa', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has benn edit</div>');
                        redirect('datasekolah/detail/' . $id);
                }
        }

        public function ubahStaff()
        {

                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = 'Data Staff';



                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('np', 'Np', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('bidang', 'Bidang', 'required');

                if ($this->form_validation->run() == false) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sidebar', $data);
                        $this->load->view('templates/topbar', $data);
                        $this->load->view('datasekolah/siswa', $data);
                        $this->load->view('templates/footer');
                } else {
                        $data = [
                                'id' => $this->input->post('id'),
                                'nama' => $this->input->post('nama'),
                                'np' => $this->input->post('np'),
                                'gender' => $this->input->post('gender'),
                                'alamat' => $this->input->post('alamat'),
                                'bidang' => $this->input->post('bidang')
                        ];


                        $this->db->where('id', $data['id']);
                        $this->db->update('staff', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has benn update</div>');
                        redirect('datasekolah/staff');
                }
        }

        public function ubahGuru()
        {

                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = 'Data Staff';



                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('nip', 'Nip', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('mapel', 'Mapel', 'required');

                if ($this->form_validation->run() == false) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sidebar', $data);
                        $this->load->view('templates/topbar', $data);
                        $this->load->view('datasekolah/siswa', $data);
                        $this->load->view('templates/footer');
                } else {
                        $data = [
                                'id' => $this->input->post('id'),
                                'name' => $this->input->post('nama'),
                                'nip' => $this->input->post('nip'),
                                'gender' => $this->input->post('gender'),
                                'alamat' => $this->input->post('alamat'),
                                'mapel' => $this->input->post('mapel')
                        ];


                        $this->db->where('id', $data['id']);
                        $this->db->update('guru', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has benn update</div>');
                        redirect('datasekolah/index');
                }
        }

        public function delGuru($id)
        {
                $this->db->delete('guru', ['id' => $id]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete success!</div>');
                redirect('datasekolah');
        }

        public function delStaff($id)
        {
                $this->db->delete('staff', ['id' => $id]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete success!</div>');
                redirect('datasekolah/staff');
        }

        public function delSiswa($id)
        {
                $data['siswa'] = $this->db->get_where('siswa', ['id' => $id])->row_array();
                $id_kelas = $data['siswa']['kelas_id'];
                $this->db->delete('siswa', ['id' => $id]);



                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete success!</div>');
                redirect('datasekolah/detail/' . $id_kelas);
        }
}
