<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_user extends CI_Model
{
    protected $_table = 'user';

    public function getUser()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    public function lihat_id($id)
    {
        $query = $this->db->get_where($this->_table, ['id' => $id]);
        return $query->row();
    }
    public function tambah($data)
    {
        $this->db->insert($this->_table, $data);
    }
    public function updateprofile($data2)
    {
        $this->db->where('username', $data2['username']);
        $this->db->update($this->_table, $data2);
    }
    public function updateData($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($this->_table, $data);
    }
    public function hapus($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }
    public function jumlah()
    {
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function login($login){
        $this->db->where('id', $login['id']);
        $this->db->update($this->_table, $login);
    }
    public function logout($logout){
        $this->db->where('id', $logout['id']);
        $this->db->update($this->_table, $logout);
    }
}


/* End of file Model_user.php */
