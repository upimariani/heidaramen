<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pemesanan');
        $this->load->model('m_dashboard');
    }
    public function index()
    {
        $this->login_admin->cek_halaman();
        $data = array(
            'produk' => $this->m_dashboard->lap_produk()
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vdashboard', $data);
        $this->load->view('Admin/footer');
    }
}
