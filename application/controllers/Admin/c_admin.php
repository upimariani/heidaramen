<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pemesanan');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'admin' => $this->m_admin->select_admin()
            );
            $this->load->view('Admin/head');
            $this->load->view('Admin/sidebar');
            $this->load->view('Admin/vadmin', $data);
            $this->load->view('Admin/footer');
        } else {
            $admin = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'nama_lengkap' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jk'),
                'tanggal_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'hp' => $this->input->post('no_tlp'),
                'status' => 'admin'
            );
            $this->m_admin->insert_admin($admin);
            $this->session->set_flashdata('pesan', 'Data Admin Berhasil Disimpan!!!');
            redirect('Admin/c_admin');
        }
    }
    public function edit($id_user)
    {
        $data = array(
            'admin' => $this->m_admin->edit($id_user)
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vedit_admin', $data);
        $this->load->view('Admin/footer');
    }
    public function update_admin($id_user)
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama_lengkap' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'tanggal_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('no_tlp'),
            'status' => 'admin'
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Diperbaharui!!!');
        redirect('Admin/c_admin');
    }
    public function hapus($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('Admin/c_admin');
    }
}
