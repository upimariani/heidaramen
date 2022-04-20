<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pemesanan');
        $this->load->model('m_pemesanan');
    }
    public function index()
    {
        $data = array(
            'belum_bayar' => $this->m_pemesanan->pesanan_masuk(),
            'selesai' => $this->m_pemesanan->order_selesai()
        );
        $this->login_admin->cek_halaman();
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vorder', $data);
        $this->load->view('Admin/footer');
    }
    public function detail_pemesanan($id_pemesanan)
    {
        $data = array(
            'detail' => $this->m_pemesanan->detail_produk($id_pemesanan)
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vdetail_pemesanan', $data);
        $this->load->view('Admin/footer');
    }
    public function bayar($id_pemesanan)
    {
        $kembali = 0;
        $tot = $this->input->post('tot');
        $bayar = $this->input->post('bayar');
        $kembali = $bayar - $tot;
        $data = array(
            'bayar' => $bayar,
            'kembalian' => $kembali,
            'konfirmasi' => '1'
        );
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan', $data);

        $tempat = array(
            'id_tempat' => $this->input->post('kursi'),
            'status_tempat' => '0'
        );
        $this->db->where('id_tempat', $tempat['id_tempat']);
        $this->db->update('tempat', $tempat);
        redirect('Admin/c_laporan/struk_pembelian/' . $id_pemesanan);
    }
}
