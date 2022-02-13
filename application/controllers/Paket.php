<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Paket extends CI_Controller
{
    var $folder        = 'admin/master/paket/';
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
            'barang' => $this->barang->getbarang(),
            'paket' => $this->paket->getpaket(),
            'content'     => $this->folder . ('view'),

        ];
        $this->load->view('layout/admin/template', $data);
    }
    public function create()
    {
        if ($this->form_validation->run('paket') == FALSE) {
            $data = [
                'title' => 'Tambah Paket',
                'barang' => $this->barang->getbarang(),
                
                'content'     => $this->folder . ('create'),
            ];
            $this->load->view('layout/admin/template', $data);
        } else {
            $data = array(
                'kode_paket' => $this->input->post('kode_paket', true),
                'nama_paket' => $this->input->post('nama_paket', true),
                'barang' => implode(",", $this->input->post('barang',true)),
                'waktu' => $this->input->post('waktu', true),
                'biaya' => $this->input->post('biaya', true),
                'jenis' => $this->input->post('jenis', true),
                'date_created' => time(),
                'edited_at' => time(),
            );
            $this->paket->tambah($data);
            $this->session->set_flashdata('paket', 'Ditambahkan!');
            redirect('paket');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules(array(
            array(
                'field' => 'nama_paket',
                'label' => 'Nama Paket',
                'rules' => 'required|trim|min_length[5]|max_length[25]|edit_unique[paket.nama_paket.' . $id . ']|strip_tags[<a><b><i>]',
                'errors' =>
                array(
                    'min_length' => 'Data %s Harus Berisikan Minimal 5 Huruf',
                    'edit_unique' => 'Data %s Sudah Pernah Terdaftar',
                    'required'      => 'Data %s Wajib Diisi.',
                ),
            ),
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
                'barang' => $this->barang->getbarang(),
                'paket' => $this->paket->lihat_id($id),
                'content'     => $this->folder . ('update'),
            ];
            $this->load->view('layout/admin/template', $data);
        } else {
            $data = array(
                'id' => $id,
                'kode_paket' => $this->input->post('kode_paket', true),
                'nama_paket' => $this->input->post('nama_paket', true),
                'barang' => implode(",", $this->input->post('barang',true)),
                'waktu' => $this->input->post('waktu', true),
                'biaya' => $this->input->post('biaya', true),
                'jenis' => $this->input->post('jenis', true),
                'edited_at' => time(),
            );
            $this->paket->updateData($data);
            $this->session->set_flashdata('paket', 'Diupdate!');
            redirect('paket');
        }
    }

    public function hapus($id)
    {
        $this->paket->hapus($id);
        $this->session->set_flashdata('paket', 'Dihapus!');
        redirect('paket');
    }

    public function export()
    {
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $paket = $this->paket->getpaket();

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Paket');
        $sheet->setCellValue('C1', 'Kode Paket');
        $sheet->setCellValue('D1', 'Nama Paket');
        $sheet->setCellValue('E1', 'Include');
        $sheet->setCellValue('F1', 'Estimasi');
        $sheet->setCellValue('G1', 'Biaya');
        $sheet->setCellValue('H1', 'Jenis');


        // $spreadsheet->getActiveSheet()->getStyle('A1:I10')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A1:H1')
            ->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:H1')->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFBA93FF');

        // Set column width automatically
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);

        $kolom = 2;
        $nomor = 1;

        foreach ($paket as $pkt) {
            $sheet->setCellValue('A' . $kolom, $nomor++);
            $sheet->setCellValue('B' . $kolom, $pkt->id);
            $sheet->setCellValue('C' . $kolom, $pkt->kode_paket);
            $sheet->setCellValue('D' . $kolom, $pkt->nama_paket);
            $sheet->setCellValue('E' . $kolom, $pkt->barang);
            $sheet->setCellValue('F' . $kolom, $pkt->waktu . ' Hari');
            $sheet->setCellValue('G' . $kolom, $pkt->biaya);
            $sheet->setCellValue('H' . $kolom, $pkt->jenis);

            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data Paket Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file paket.php */
