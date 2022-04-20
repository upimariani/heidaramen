<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_pemesanan');
    }
    public function index()
    {
        $config['upload_path']          = './asset/gambar/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'produk' => $this->m_produk->select_produk()
            );
            $this->login_admin->cek_halaman();
            $this->load->view('Admin/head');
            $this->load->view('Admin/sidebar');
            $this->load->view('Admin/vproduk', $data);
            $this->load->view('Admin/footer');
        } else {
            $upload_data =  $this->upload->data();
            $data = array(
                'nama_menu' => $this->input->post('nama'),
                'jenis_menu' => $this->input->post('jenis'),
                'stok' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
                'gambar' =>  $upload_data['file_name']
            );
            $this->m_produk->insert_produk($data);
            $this->session->set_flashdata('pesan', 'Data Menu Berhasil Di Simpan!!!');
            redirect('Admin/c_produk');
        }
    }
    public function edit($id_menu)
    {
        $data['edit_produk'] = $this->m_produk->edit($id_menu);
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/vedit_produk', $data);
        $this->load->view('Admin/footer');
    }
    public function update($id_menu)
    {
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('jenis_menu', 'Jenis Menu', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('jumlah', 'Stok Menu', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('harga', 'Harga Menu', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './asset/gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'produk' => $this->m_produk->select_produk()
                );
                $this->load->view('Admin/head');
                $this->load->view('Admin/sidebar');
                $this->load->view('Admin/vproduk', $data);
                $this->load->view('Admin/footer');
            } else {
                $produk = $this->m_produk->select_produk();
                if ($produk->gambar !== "") {
                    unlink('./asset/gambar/' . $produk->gambar);
                }
                $upload_data =  $this->upload->data();
                $data = array(
                    'nama_menu' => $this->input->post('nama'),
                    'jenis_menu' => $this->input->post('jenis_menu'),
                    'stok' => $this->input->post('jumlah'),
                    'harga' => $this->input->post('harga'),
                    'gambar' =>  $upload_data['file_name']
                );
                $this->db->where('produk.id_menu', $id_menu);
                $this->db->update('produk', $data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
                redirect('Admin/c_produk');
            } //tanpa ganti gambar
            $data = array(
                'id_menu' => $id_menu,
                'nama_menu' => $this->input->post('nama'),
                'jenis_menu' => $this->input->post('jenis_menu'),
                'stok' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga')
            );
            $this->db->where('produk.id_menu', $id_menu);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('Admin/c_produk');
        }
        redirect('Admin/c_produk');
    }
    public function hapus($id_menu)
    {
        $produk = $this->m_produk->select_produk($id_menu);
        if ($produk->gambar !== "") {
            unlink('./asset/gambar/' . $produk->gambar);
        }
        $this->db->where('id_menu', $id_menu);
        $this->db->delete('produk');
        $this->session->set_flashdata('pesan', 'Data Produk Berhasil Di Hapus!!!');
        redirect('Admin/c_produk');
    }
}
