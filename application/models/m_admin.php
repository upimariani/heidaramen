<?php
class m_admin extends CI_Model
{
    public function select_admin()
    {
        $status = 'admin';
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('status=', $status);
        return $this->db->get()->result();
    }
    public function insert_admin($data)
    {
        $this->db->insert('user', $data);
    }
    public function edit($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }
}
