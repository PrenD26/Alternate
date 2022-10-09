<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
require('./application/third_party/phpoffice/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Paket extends CI_Controller
{
    var $folder        = 'paket/';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_paket', 'paket');
        $this->load->model('mod_barang', 'barang');
        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Data Paket',
            'barang' => $this->barang->getdata(),
            'paket' => $this->paket->getdata(),
            'content'     => $this->folder . ('view'),
        ];
        $this->load->view('layout/A_layout', $data);
    }
    public function create()
    {
        if ($this->form_validation->run('paket') == FALSE) {
            $data = [
                'title' => 'Create Paket',
                'barang' => $this->barang->getdata(),
                'content'     => $this->folder . ('create'),
            ];
            $this->load->view('layout/A_layout', $data);
        } else {
            $post = $this->input->post();
            $now = date('Y-m-d H:i:s');
            $data = [
                'nama_paket' => $post['nama_paket'],
                'barang' => implode(",", $post['barang']),
                'waktu' => $post['waktu'],
                'biaya' => $post['biaya'],
                'jenis' => $post['jenis'],
                'dibuat' => $now,
                'diubah' => $now,
            ];
            $this->paket->create($data);
            $this->session->set_flashdata('paket', 'Ditambahkan!');
            redirect('paket');
        }
    }

    public function update($id_paket)
    {
        if (
            $id_paket == null
        ) {
            redirect('landing_page/noaccess');
        }
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules(
            'nama_paket', 'Nama Paket',
            'required|trim|min_length[5]|max_length[25]|edit_unique[paket.nama_paket.id_paket.' . $id . ']|strip_tags[<a><b><i>]',
            array(
                'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                'edit_unique' => 'Data %s Sudah Pernah Terdaftar',
                'required'      => 'Data %s Wajib Diisi.',
            )
    );
        $this->form_validation->set_rules(array(
            array(
                'field' => 'barang[]',
                'label' => 'Barang',
                'rules' => 'required',
                'errors' =>
                array(
                    'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                    'required'      => 'Data %s Wajib Diisi.',
                ),
            ),
            array(
                'field' => 'waktu',
                'label' => 'Waktu',
                'rules' => 'required|numeric|trim|strip_tags',
                'errors' =>
                array(
                    'numeric' => 'Data %s Hanya Berisikan Angka',
                    'required'      => 'Data %s Wajib Diisi.',
                ),
            ),
            array(
                'field' => 'biaya',
                'label' => 'Biaya',
                'rules' => 'required|trim|numeric|strip_tags',
                'errors' =>
                array(
                    'numeric' => 'Data %s Hanya Berisikan Angka',
                    'required'      => 'Data %s Wajib Diisi.',
                ),
            ),
            array(
                'field' => 'jenis',
                'label' => 'jenis',
                'rules' => 'required|strip_tags',
                'errors' =>
                array(
                    'numeric' => 'Data %s Hanya Berisikan Angka',
                    'required'      => 'Data %s Wajib Diisi.',
                ),
            )
        ));
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Update Paket',
                'barang' => $this->barang->getdata(),
                'paket' => $this->paket->v_id($id_paket),
                'content'     => $this->folder . ('update'),
            ];
            $this->load->view('layout/A_layout', $data);
        } else {
            $post = $this->input->post();
            $now = date('Y-m-d H:i:s');
            $data = [
                'id_paket' => $id_paket,
                'nama_paket' => $post['nama_paket'],
                'barang' => implode(",", $post['barang']),
                'waktu' => $post['waktu'],
                'biaya' => $post['biaya'],
                'jenis' => $post['jenis'],
                'diubah' => $now,
            ];
            $this->paket->update($data);
            $this->session->set_flashdata('paket', 'Diupdate!');
            redirect('paket');
        }
    }

    public function delete($id_paket)
    {
        $this->paket->delete($id_paket);
        $this->session->set_flashdata('paket', 'Dihapus!');
        redirect('paket');
    }

 
}

/* End of file paket.php */
