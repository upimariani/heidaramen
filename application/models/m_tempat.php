<?php
class m_tempat extends CI_Model
{
    public function select_tempat()
    {
        $this->db->select('*');
        $this->db->from('tempat');
        return $this->db->get()->result();
    }
    public function edit($id_tempat)
    {
        $this->db->select('*');
        $this->db->from('tempat');
        $this->db->where('id_tempat', $id_tempat);
        return $this->db->get()->row();
    }
}
