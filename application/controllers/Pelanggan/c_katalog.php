<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_katalog');
        $this->load->model('m_pemesanan');
        $this->load->model('m_tempat');
    }
    public function index()
    {
        $this->login_pelanggan->cek_halaman();
        $data = array(
            'menu' => $this->m_katalog->select_produk(),
            'makanan' => $this->m_katalog->select_makanan(),
            'minuman' => $this->m_katalog->select_minuman(),
            'belum_bayar' => $this->m_pemesanan->belum_bayar(),
            'pesanan_selesai' => $this->m_pemesanan->pesanan_selesai(),
            'tempat' => $this->m_tempat->select_tempat()
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/header');
        $this->load->view('Pelanggan/vhalaman_utama', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function add()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name')
        );
        $this->cart->insert($data);
        redirect('Pelanggan/c_katalog');
    }
    //hapus data cart
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('Pelanggan/c_katalog');
    }

    //update data cart dengan menambah dan mengurangi jumlah barang
    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid'  => $items['rowid'],
                'qty'    => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('Pelanggan/c_katalog');
    }
    public function pesan()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'id_user' => $this->session->userdata('id_user'),
            'username' => $this->input->post('atas_nama'),
            'tanggal_pemesanan' => $this->input->post('date'),
            'no_meja' => $this->input->post('no_meja'),
            'total_belanja' => $this->input->post('total'),
            'konfirmasi' => $this->input->post('konfirmasi'),
            'keterangan' => $this->input->post('ket'),
        );
        $this->db->insert('pemesanan', $data);
        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $data_rinci = array(
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'id_menu' => $item['id'],
                'jumlah' => $this->input->post('qty' . $i++)
            );
            $this->db->insert('pemesanan_produk', $data_rinci);
        }
        $tempat = array(
            'id_tempat' => $this->input->post('no_meja'),
            'status_tempat' => '1'
        );
        $this->db->where('id_tempat', $tempat['id_tempat']);
        $this->db->update('tempat', $tempat);

        $this->cart->destroy();
        redirect('Pelanggan/c_katalog');
    }
    public function batalkan_pemesanan($id_pemesanan)
    {
        $this->m_pemesanan->batalkan_pemesanan($id_pemesanan);
        redirect('Pelanggan/c_katalog');
    }
    public function detail_pemesanan($id_pemesanan)
    {
        $data = array(
            'detail' => $this->m_pemesanan->detail_pemesanan($id_pemesanan)
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/vdetail_pemesanan', $data);
        $this->load->view('Pelanggan/footer');
    }
}
