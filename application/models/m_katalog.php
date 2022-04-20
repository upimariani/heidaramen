<?php
class m_katalog extends CI_Model
{
    public function select_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
    public function select_makanan()
    {
        $makanan = 'Makanan';
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('jenis_menu=', $makanan);
        return $this->db->get()->result();
    }
    public function select_minuman()
    {
        $minuman = 'Minuman';
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('jenis_menu=', $minuman);
        return $this->db->get()->result();
    }
}
