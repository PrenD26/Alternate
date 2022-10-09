<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_user extends CI_Model
{
    protected $_table = 'user';

    public function getdata()
    {
        return $this->db->get($this->_table)->result_array();
    }
    public function lihat_id($id_user)
    {
        return $this->db->get_where($this->_table, ['id_user' => $id_user])->row_array();
    }
    public function create($data)
    {
        $this->db->insert($this->_table, $data);
    }
    public function updateprofile($data2)
    {
        $this->db->where('username', $data2['username']);
        $this->db->update($this->_table, $data2);
    }
    public function update($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update($this->_table, $data);
    }
    public function delete($id_user)
    {
        return $this->db->delete($this->_table, ['id_user' => $id_user]);
    }
    public function jumlah()
    {
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function login($login){
        $this->db->where('id_user', $login['id_user']);
        $this->db->update($this->_table, $login);
    }
    public function logout($logout){
        $this->db->where('id_user', $logout['id_user']);
        $this->db->update($this->_table, $logout);
    }
}


/* End of file Model_user.php */
