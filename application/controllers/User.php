<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    var $folder        = 'admin/manage/user/';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_user', 'users');
        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        } elseif (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Data User',
            'user' => $this->users->getuser(),
            'content'     => $this->folder . ('view'),
        ];
        $this->load->view('layout/admin/template', $data);
    }
    public function create()
    {
        if ($this->form_validation->run('user') == FALSE) {
            $data = [
                'title' => 'Tambah User',
                'content'     => $this->folder . ('create'),
            ];
            $this->load->view('layout/admin/template', $data);
        } else {
            $data = array(
                'kode_user' => $this->input->post('kode_user', true),
                'last_login' => time(),
                'date_created' => time(),
                'edited_at' => time(),
                'username' =>$this->input->post('username', true),
                'password' =>password_hash($this->input->post('password',true), PASSWORD_DEFAULT),
                'image' => 'layla2.png',
                'nama' => $this->input->post('nama',true),
                'level' => $this->input->post('level', true),
                'status' => $this->input->post('status', true),
            
            );
            $this->users->tambah($data);
            $this->session->set_flashdata('flash', 'Ditambahkan!');
            redirect(base_url() . 'user', 'refresh');
        }
    }
    
    public function update($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|edit_unique[user.username.' . $id . ']|strip_tags');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]|trim|strip_tags[<a><b><i>]');
        $this->form_validation->set_rules('level', 'Level', 'required|trim|strip_tags');
        $this->form_validation->set_rules('status', 'Status', 'required|trim|strip_tags');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Update User',
                'user' => $this->users->lihat_id($id),
                'content'     => $this->folder . ('update'),
            ];
            $this->load->view('layout/admin/template', $data);
        } else {

            $data = array(
                'id' => $id,
                'kode_user' => $this->input->post('kode_user', true),
                'edited_at' => time(),
                'username' => $this->input->post('username', true),
                'nama' => $this->input->post('nama', true),
                'level' => $this->input->post('level', true),
                'status' => $this->input->post('status', true),
            );
            $this->users->updateData($data);
            $this->session->set_flashdata('flash', 'Diupdate!');
            redirect('user');
        }
    }
    public function change($id)
    {
       
        if ($this->form_validation->run('reset') == FALSE) {
            $data = [
                'title' => 'Reset Password',
                'user' => $this->users->lihat_id($id),
                'content'     => $this->folder . ('change'),
            ];
            $this->load->view('layout/admin/template', $data);
        } else {

            $data = array(
                'id' => $id,
                'edited_at' => time(),
                'password' => password_hash($this->input->post('new_password1',true), PASSWORD_DEFAULT),
            );
            $this->users->updateData($data);
            $this->session->set_flashdata('flash', 'Diupdate!');
            redirect('user');
        }
    }
    public function hapus($password)
    {
        $this->users->hapus($password);
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('user');
    }
}

/* End of file User.php */
