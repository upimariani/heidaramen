<?php
defined('BASEPATH') or exit('No direct script access allowed');
class login_pelanggan
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_login_pelanggan');
    }
    public function login($username, $password)
    {
        $cek = $this->ci->m_login_pelanggan->login_pelanggan($username, $password);
        if ($cek) {
            $username = $cek->username;
            $id_user = $cek->id_user;
            $nama_lengkap = $cek->nama_lengkap;
            //session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('id_user', $id_user);
            $this->ci->session->set_userdata('nama_lengkap', $nama_lengkap);
            redirect('Pelanggan/c_katalog');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('gagal', 'Username Atau Password Salah!!!');
            redirect('Pelanggan/c_login');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('gagal', 'Anda Belum login!!!');
            redirect('Pelanggan/c_login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('id_user');
        $this->ci->session->unset_userdata('nama_lengkap');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!!');
        redirect('Pelanggan/c_login');
    }
}
