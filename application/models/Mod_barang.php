<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_barang extends CI_Model
{
    protected $_table = 'barang';

    public function getdata()
    {
        return $this->db->get($this->_table)->result_array();
    }
    public function create($data)
    {
        $this->db->insert($this->_table, $data);
    }
    public function update($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update($this->_table, $data);
    }
    public function delete($id_barang)
    {
        return $this->db->delete($this->_table, ['id_barang' => $id_barang]);
    }
}


/* End of file Model_barang.php */
