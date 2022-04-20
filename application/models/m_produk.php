<?php
class m_produk extends CI_Model
{
    public function insert_produk($data)
    {
        $this->db->insert('produk', $data);
    }
    public function select_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
    public function edit($id_menu)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('produk.id_menu', $id_menu);
        return $this->db->get()->row();
    }
    public function diskon()
    {
        $diskon = '0';
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('diskon!=', $diskon);
        return $this->db->get()->result();
    }
}
