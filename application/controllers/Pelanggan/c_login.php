<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_login extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/header');
            $this->load->view('Pelanggan/vlogin');
            $this->load->view('Pelanggan/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->login_pelanggan->login($username, $password);
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required|min_length[11]|max_length[13]', array(
            'required' => '%s Harus Diisi!!!',
            'min_lenght' => '%s Minimal 11 Digit!!!',
            'max_lenght' => '%s Maksimal 13 Digit!!!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/header');
            $this->load->view('Pelanggan/vregister_pelanggan');
            $this->load->view('Pelanggan/footer');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'nama_lengkap' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jk'),
                'tanggal_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'hp' => $this->input->post('no_tlp'),
                'status' => 'user',
            );
            $this->db->insert('user', $data);
            $this->session->set_flashdata('pesan', 'Anda Berhasil Registrasi Akun!!!');
            redirect('Pelanggan/c_login');
        }
    }
    public function logout_pelanggan()
    {
        $this->login_pelanggan->logout();
    }
}
