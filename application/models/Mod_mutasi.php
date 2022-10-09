<?php

defined('BASEPATH') or exit('No direct script access allowed');

    class Mod_mutasi extends CI_Model
    {
        protected $_table = 'mutasi';
        protected $_view = 'view_mutasi';
        
        public function getdata()
        {
            return $this->db->get($this->_view)->result_array();
        }
        public function v_id($id_mutasi)
        {
            return $this->db->query("CALL v_mutasidetail($id_mutasi)")->row_array();
        }
        public function create($data)
        {
            $this->db->insert($this->_table, $data);
        }
        public function update($data)
        {
            $this->db->where('id_mutasi', $data['id_mutasi']);
            $this->db->update($this->_table, $data);
        }
        public function delete($id_mutasi)
        {
            return $this->db->delete($this->_table, ['id_mutasi' => $id_mutasi]);
        }
    }
 
 /* End of file Mod_mutasi.php */
