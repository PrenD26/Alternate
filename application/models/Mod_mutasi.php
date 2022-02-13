 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Mod_mutasi extends CI_Model
    {
        protected $_table = 'mutasi';

        public function getmutasi()
        {

            $this->db->select('A.id,A.edited_at, A.id_user, A.date_created, A.no_mutasi, A.nominal, A.keterangan, A.jenis, B.username');
            $this->db->from('mutasi A');
            $this->db->join('user B', 'B.id = A.id_user');
            $this->db->order_by('A.id');
            $query = $this->db->get();
            return $query->result();
            // $query = "SELECT A.id, A.id_user, A.tanggal, A.no_mutasi, A.nominal, A.keterangan, A.jenis,  B.username
            // FROM mutasi A
            // INNER JOIN user B
            // ON A.id_user = B.id
            // ORDER BY A.id DESC";
            // return $this->db->query($query)->result();
        }
        public function lihat_id($id)
        {

            $this->db->select('A.id, A.id_user,A.edited_at, A.date_created, A.no_mutasi, A.nominal, A.keterangan, A.jenis, B.username');
            $this->db->from('mutasi A');
            $this->db->join('user B', 'B.id = A.id_user');
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
    }
 
 /* End of file Mod_mutasi.php */
