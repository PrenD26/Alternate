<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_pelanggan extends CI_Model
{
    protected $_table = 'pelanggan';

    public function getdata()
    {
        return $this->db->get($this->_table)->result_array();
    }
    public function v_id($id_pelanggan)
    {
        return $this->db->get_where($this->_table, ['id_pelanggan' => $id_pelanggan])->row_array();
    }
    public function create($data)
    {
        $this->db->insert($this->_table, $data);
    }
    public function update($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update($this->_table, $data);
    }
    public function delete($id_pelanggan)
    {
        return $this->db->delete($this->_table, ['id_pelanggan' => $id_pelanggan]);
    }
    function cari($id_pelanggan)
    {
        $query = $this->db->get_where($this->_table, ['id_pelanggan' => $id_pelanggan]);
        return $query;
    }
    public function jumlah()
    {
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
}

/* End of file Mod_pelanggan.php */
