<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_paket extends CI_Model
{
    protected $_table = 'paket';

    public function getdata()
    {
        return $this->db->get($this->_table)->result_array();
    }
    public function v_id($id_paket)
    {
        return $this->db->get_where($this->_table, ['id_paket' => $id_paket])->row_array();
    }
    public function create($data)
    {
        $this->db->insert($this->_table, $data);
    }
    public function update($data)
    {
        $this->db->where('id_paket', $data['id_paket']);
        $this->db->update($this->_table, $data);
    }
    public function delete($id_paket)
    {
        return $this->db->delete($this->_table, ['id_paket' => $id_paket]);
    }
    function cari($id_paket)
    {
        $query = $this->db->get_where($this->_table, ['id_paket' => $id_paket]);
        return $query;
    }
}


/* End of file Model_paket.php */
