<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_paket extends CI_Model
{
    protected $_table = 'paket';

    public function getpaket()
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
    public function hapus($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }
    function cari($id_paket)
    {
        $query = $this->db->get_where($this->_table, ['id' => $id_paket]);
        return $query;
    }
}


/* End of file Model_paket.php */
