<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getuser($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
}

/* End of file Login_model.php */
