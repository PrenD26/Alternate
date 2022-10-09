<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class User extends CI_Controller
{
    var $folder        = 'user/';
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
            redirect('403');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Data User',
            'user' => $this->users->getdata(),
            'content'     => $this->folder . ('view'),
        ];
        $this->load->view('layout/A_layout', $data);
    }
    public function create()
    {
        if ($this->form_validation->run('user') == FALSE) {
            $data = [
                'title' => 'Create User',
                'content'     => $this->folder . ('create'),
            ];
            $this->load->view('layout/A_layout', $data);
        } else {
            $post = $this->input->post();
            $data = [
                'created' => time(),
                'username' => $post['username'],
                'no_telepon' => $post['no_telepon'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'image' => 'layla2.png',
                'nama' => $post['nama'],
                'level' => $post['level'],
                'status' => $post['status'],
            ];
            $this->users->create($data);
            $this->session->set_flashdata('flash', 'Ditambahkan!');
            redirect('user');
        }
    }

    public function update($id_user)
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules(
            'username', 'Username',
            'required|trim|edit_unique[user.username.id_user.' . $id . ']|strip_tags',
            array(
                    'required'      => 'You have not provided %s.',
                    'edit_unique'     => 'This %s already exists.'
            )
    );
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]|trim|strip_tags[<a><b><i>]');
        $this->form_validation->set_rules('level', 'Level', 'required|trim|strip_tags');
        $this->form_validation->set_rules('status', 'Status', 'required|trim|strip_tags');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Update User',
                'user' => $this->users->lihat_id($id_user),
                'content'     => $this->folder . ('update'),
            ];
            $this->load->view('layout/A_layout', $data);
        } else {
            $post = $this->input->post();
            $data = [
                'id_user' => $id_user,
                'updated' => time(),
                'username' => $post['username'],
                'nama' => $post['nama'],
                'level' => $post['level'],
                'status' => $post['status'],
            ];
            $this->users->update($data);
            $this->session->set_flashdata('flash', 'Diupdate!');
            redirect('user');
        }
    }
    public function change($id_user)
    {

        if ($this->form_validation->run('reset') == FALSE) {
            $data = [
                'title' => 'Reset Password',
                'user' => $this->users->lihat_id($id_user),
                'content'     => $this->folder . ('change'),
            ];
            $this->load->view('layout/A_layout', $data);
        } else {
            $post = $this->input->post();
            $data = [
                'id_user' => $id_user,
                'updated' => time(),
                'password' => password_hash($post['new_password1'], PASSWORD_DEFAULT),
            ];
            $this->users->update($data);
            $this->session->set_flashdata('flash', 'Diupdate!');
            redirect('user');
        }
    }
    public function delete($id_user)
    {
        $this->users->delete($id_user);
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('user');
    }

}

/* End of file User.php */
