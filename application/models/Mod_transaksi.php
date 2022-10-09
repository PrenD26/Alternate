<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_transaksi extends CI_Model
{
    protected $_table = 'transaksi';
    protected $_view = 'view_transaksi';

    public function getdata()
    {
        return $this->db->get($this->_view)->result_array();
    }

    public function v_id($id_transaksi)
    {
        $query = $this->db->query("CALL v_transdetail($id_transaksi)");
        return $query->row_array();
    }

    public function create($data)
    {
        $this->db->insert($this->_table, $data);
    }
    public function update($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update($this->_table, $data);
    }
    public function delete($id_transaksi)
    {
        return $this->db->delete($this->_table, ['id_transaksi' => $id_transaksi]);
    }
    public function jumlah()
    {
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
    public function hitungTotal()
    {
        $this->db->select_sum('total');
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->row()->total;
        } else {
            return 0;
        }
    }
    public function find()
    {
        $cari = $this->input->GET('cari', TRUE);
        $data = $this->db->query("SELECT * from view_transaksi where no_transaksi like '%$cari%' ");
        return $data->result_array();
    }
}


/* End of file Model_transaksi.php */
