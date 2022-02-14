<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_pelanggan extends CI_Model
{
    protected $_table = 'pelanggan';

    public function getPelanggan()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    public function getAll()
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
    public function updateData($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($this->_table, $data);
    }
    public function hapus($rand)
    {
        return $this->db->delete($this->_table, ['rand' => $rand]);
    }
    function cari($id_pelanggan)
    {
        $query = $this->db->get_where($this->_table, ['id' => $id_pelanggan]);
        return $query;
    }
    public function jumlah()
    {
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
}

/* End of file Mod_pelanggan.php */
