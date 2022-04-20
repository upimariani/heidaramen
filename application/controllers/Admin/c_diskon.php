<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_diskon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_pemesanan');
    }
    public function index()
    {
        $data = array(
            'produk' => $this->m_produk->select_produk(),
            'diskon' => $this->m_produk->diskon()
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vdiskon', $data);
        $this->load->view('Admin/footer');
    }
    public function insert()
    {
        $data = array(
            'id_menu' => $this->input->post('produk'),
            'diskon' => $this->input->post('diskon')
        );
        $this->db->where('id_menu', $data['id_menu']);
        $this->db->update('produk', $data);
        $this->session->set_flashdata('pesan', 'Data Diskon Berhasil Ditambahkan!!!');
        redirect('Admin/c_diskon');
    }
    public function edit($id_menu)
    {
        $data = array(
            'produk' => $this->m_produk->select_produk(),
            'diskon' => $this->m_produk->edit($id_menu)
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vedit_diskon', $data);
        $this->load->view('Admin/footer');
    }
    public function proses_edit()
    {
        $data = array(
            'id_menu' => $this->input->post('produk'),
            'diskon' => $this->input->post('diskon')
        );
        $this->db->where('id_menu', $data['id_menu']);
        $this->db->update('produk', $data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diperbaharui!!!');
        redirect('Admin/c_diskon');
    }
    public function hapus($id_menu)
    {
    }
}
