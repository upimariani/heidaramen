<?php
class m_dashboard extends CI_Model
{
    public function jml_menu()
    {
        return $this->db->get('produk')->num_rows();
    }
    public function jml_pelanggan()
    {
        $status = 'user';
        $this->db->where('status=', $status);
        return $this->db->get('user')->num_rows();
    }
    public function jml_pemesanan()
    {
        $konfirmasi = '0';
        $this->db->where('pemesanan.konfirmasi', $konfirmasi);
        return $this->db->get('pemesanan')->num_rows();
    }
    public function lap_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
}
