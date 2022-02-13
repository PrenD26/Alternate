<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_barang extends CI_Model
{
    protected $_table = 'barang';

    public function getBarang()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    public function getAll()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    // public function getAll()
    // {
    //     $data_barang = $this->db->get('barang')->result();
    //     return $data_barang;
    // }
    // public function getAll()
    // {
    //     $this->db->select('*');
    //     $this->db->from('barang');

    //     return $this->db->get();
    // }

    public function lihat_id($id)
    {
        $query = $this->db->get_where($this->_table, ['id' => $id]);
        return $query->row();
    }
    public function tambah($data)
    {
        $this->db->insert($this->_table, $data);
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
}


/* End of file Model_barang.php */
