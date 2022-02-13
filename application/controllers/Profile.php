<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    var $folder        = 'admin/manage/profile/';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_user', 'users');
        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        }
    }
    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]|trim|strip_tags[<a><b><i>]');
        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['title'] = 'Profile';
            $data['content'] = $this->folder . ('view');
            $this->load->view('layout/admin/template', $data);
        } else {

            //cek jika ada upload gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1000;
                $config['max_height']           = 1000;

                $config['upload_path']          = './assets/avatar/';
                $this->load->library('upload', $config);
                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'layla.png') {
                        unlink(FCPATH . "assets/avatar/" . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('flash', $this->upload->display_errors());
                    redirect('profile');
                }
            }
            $edited_at = time();
            $no_telepon = $this->input->post('no_telepon',true);
            $bio = $this->input->post('bio',true);
            $nama = $this->input->post('nama',true);
            $username = $this->input->post('username',true);
            $this->db->set('edited_at', $edited_at);
            $this->db->set('no_telepon', $no_telepon);
            $this->db->set('bio', $bio);
            $this->db->set('nama', $nama);
            $this->db->where('username', $username);
            $this->db->update('user');
            $this->session->set_flashdata('success', 'Data Profile berhasil diperbarui');
            redirect('profile');
        }
    }

    public function change()

    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        if ($this->form_validation->run('passprofile') == FALSE) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['title'] = 'Change Password';
            $data['content'] = $this->folder . ('change');
            $this->load->view('layout/admin/template', $data);
        } else {
            $current_password = $this->input->post('current_password',true);
            $new_password = $this->input->post('new_password1',true);
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', 'Password Lama Salah');
                redirect('profile/change');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', 'Password Baru Tidak Boleh Sama');
                    redirect('profile/change');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');
                    $this->session->set_flashdata('success', 'Data Profile berhasil diperbarui');
                    redirect('profile');
                }
            }
        }
    }
}
/* End of file Profil.php */
