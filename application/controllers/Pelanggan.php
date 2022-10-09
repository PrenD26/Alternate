<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;


class Pelanggan extends CI_Controller
{
    var $folder        = 'pelanggan/';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_pelanggan', 'pelanggan');
       
        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        }
    }
 
    public function index()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'pelanggan' => $this->pelanggan->getdata(),
            'content'     => $this->folder . ('view'),
        ];
        $this->load->view('layout/A_layout', $data);
    }
    public function create()
    {
        if ($this->form_validation->run('pelanggan') == FALSE) {
            $data = [
                'title' => 'Create Pelanggan',
                'content'     => $this->folder . ('create'),
            ];
            $this->load->view('layout/A_layout', $data);
        } else {
            $post = $this->input->post();
            $data = [
                'nama_pelanggan' => $post['nama_pelanggan'],
                'jk' => $post['jenis_kelamin'],
                'alamat' => $post['alamat'],
                'no_telp' => $post['nomor_telepon'],
                'kota' => $post['kota'],
                'created' => time(),
            ];
            $this->pelanggan->create($data);
            $this->session->set_flashdata('pelanggan', 'Ditambahkan!');
            redirect('pelanggan');
        }
    }

    public function update($id_pelanggan)
    {
        if ($this->form_validation->run('pelanggan') == FALSE) {
            $data = [
                'title' => 'Update Pelanggan',
                'pelanggan' => $this->pelanggan->v_id($id_pelanggan),
                'content'     => $this->folder . ('update'),
            ];
            $this->load->view('layout/A_layout', $data);
        } else {
            $post = $this->input->post();
            $data = [
                'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $post['nama_pelanggan'],
                'jk' => $post['jenis_kelamin'],
                'alamat' => $post['alamat'],
                'no_telp' => $post['nomor_telepon'],
                'kota' => $post['kota'],
                'updated' => time(),
            ];
            $this->pelanggan->update($data);
            $this->session->set_flashdata('pelanggan', 'Diupdate!');
            redirect('pelanggan');
        }
    }

    public function delete($id_pelanggan)
    {
        $this->pelanggan->delete($id_pelanggan);
        $this->session->set_flashdata('pelanggan', 'Dihapus!');
        redirect('pelanggan');
    }
}
/* End of file pelanggan.php */
