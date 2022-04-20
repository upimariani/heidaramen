<?php
class m_pemesanan extends CI_Model
{
    public function belum_bayar()
    {
        $id = $this->session->userdata('id_user');;
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('konfirmasi=0');
        $this->db->where('id_user', $id);
        return $this->db->get()->result();
    }
    public function batalkan_pemesanan($id_pemesanan)
    {
        $this->db->delete('pemesanan', array('id_pemesanan' => $id_pemesanan));
        $this->db->delete('pemesanan_produk', array('id_pemesanan' => $id_pemesanan));
    }
    public function detail_pemesanan($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('pemesanan_produk', 'pemesanan.id_pemesanan = pemesanan_produk.id_pemesanan', 'left');
        $this->db->join('produk', 'pemesanan_produk.id_menu = produk.id_menu', 'left');
        $this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
        return $this->db->get()->result();
    }
    public function pesanan_selesai()
    {
        $id_user = $this->session->userdata('id_user');;
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('konfirmasi=1');

        $this->db->where('id_user', $id_user);
        return $this->db->get()->result();
    }


    //pemesanan untuk admin
    public function total_pesanan()
    {
        $this->db->where('konfirmasi=0');
        return $this->db->get('pemesanan')->num_rows();
    }
    public function pesanan_masuk()
    {
        $konfirmasi = '0';
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('pemesanan.konfirmasi=', $konfirmasi);
        return $this->db->get()->result();
    }
    public function detail_produk($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('pemesanan_produk', 'pemesanan.id_pemesanan = pemesanan_produk.id_pemesanan', 'left');
        $this->db->join('produk', 'pemesanan_produk.id_menu = produk.id_menu', 'left');
        $this->db->join('user', 'pemesanan.id_user = user.id_user', 'left');
        $this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
        $data['detail'] = $this->db->get()->result();
        $data['pemesanan'] = $this->db->get_where('pemesanan', array('id_pemesanan =' => $id_pemesanan))->row();
        return $data;
    }
    public function order_selesai()
    {
        $konfirmasi = '1';
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('konfirmasi=', $konfirmasi);
        return $this->db->get()->result();
    }
    public function struk($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('pemesanan_produk', 'pemesanan.id_pemesanan = pemesanan_produk.id_pemesanan', 'left');
        $this->db->join('produk', 'pemesanan_produk.id_menu = produk.id_menu', 'left');
        $this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
        return $this->db->get()->result();
    }
    public function data($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->get()->result();
    }
}
