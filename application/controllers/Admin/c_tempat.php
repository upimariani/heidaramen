<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_tempat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tempat');
        $this->load->model('m_pemesanan');
    }
    public function index()
    {
        $data = array(
            'tempat' => $this->m_tempat->select_tempat()
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vtempat', $data);
        $this->load->view('Admin/footer');
    }
    public function insert()
    {
        $data = array(
            'nama_tempat' => $this->input->post('nama'),
            'no_tempat' => $this->input->post('no'),
            'status_tempat' => '0',
        );
        $this->db->insert('tempat', $data);
        $this->session->set_flashdata('pesan', 'Data Tempat Berhasil Ditambahkan!!!');
        redirect('Admin/c_tempat');
    }
    public function edit($id_tempat)
    {
        $data = array(
            'tempat' => $this->m_tempat->edit($id_tempat)
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vedit_tempat', $data);
        $this->load->view('Admin/footer');
    }
    public function update($id_tempat)
    {
        $data = array(
            'nama_tempat' => $this->input->post('nama'),
            'no_tempat' => $this->input->post('no')
        );
        $this->db->where('id_tempat', $id_tempat);
        $this->db->update('tempat', $data);
        $this->session->set_flashdata('pesan', 'Data Tempat Berhasil Diperbaharui!!!');
        redirect('Admin/c_tempat');
    }
    public function hapus($id_tempat)
    {
        $this->db->where('id_tempat', $id_tempat);
        $this->db->delete('tempat');
        $this->session->set_flashdata('pesan', 'Data Tempat Berhasil Dihapus!!!');
        redirect('Admin/c_tempat');
    }
}
