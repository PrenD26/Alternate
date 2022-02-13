<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_transaksi extends CI_Model
{
    protected $_table = 'transaksi';

    public function getTransaksi()
    {
        $this->db->select('A.id, A.note, A.no_transaksi, A.status, A.date_created, A.edited_at, A.qty, A.biaya, A.bayar, A.total, A.kembalian,  B.alamat,  B.kota, B.nomor_telepon, B.kode_pelanggan, B.nama_pelanggan, C.barang, C.nama_paket, C.kode_paket, D.username, D.nama');
        $this->db->from('transaksi A');
        $this->db->join('pelanggan B', 'A.id_pelanggan = B.id');
        $this->db->join('paket C', 'A.id_paket = C.id');
        $this->db->join('user D', 'A.id_user = D.id');
        $this->db->order_by('A.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function lihat_id($id)
    {
        $this->db->select('A.id, A.note, A.no_transaksi, A.status, A.date_created, A.edited_at, A.qty, A.biaya, A.bayar, A.total, A.kembalian,  B.alamat,  B.kota, B.nomor_telepon, B.kode_pelanggan, B.nama_pelanggan, C.barang, C.nama_paket, C.kode_paket, D.username, D.nama');
        $this->db->from('transaksi A');
        $this->db->join('pelanggan B', 'A.id_pelanggan = B.id');
        $this->db->join('paket C', 'A.id_paket = C.id');
        $this->db->join('user D', 'A.id_user = D.id');
        $this->db->where('A.id',$id);
        $query = $this->db->get();
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
    public function cariStatus()
    {
        $cari = $this->input->GET('cari', TRUE);
        $data = $this->db->query("SELECT * from transaksi where no_transaksi like '%$cari%' ");
        return $data->result();
    }
}


/* End of file Model_transaksi.php */
