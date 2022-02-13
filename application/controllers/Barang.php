<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Barang extends CI_Controller
{
    var $folder        = 'admin/master/barang/';

    public function __construct()
    {
        parent::__construct();
        //load model barang
        $this->load->model('mod_barang', 'barang');
        //pengecekan jika isi session (username) kosong maka dikembalikan ke login
        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        }
    }

    //halaman saat meload menu barang
    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'barang' => $this->barang->getbarang(),
            'content'     => $this->folder . ('view'),

        ];
        $this->load->view('layout/admin/template', $data);
    }

    //menambahkan data baru ke db
    public function tambahData()
    {
        $data = array(
            'jenis_barang' => $this->input->post('jenis_barang', true),
        );
        $this->barang->tambah($data);
        $this->session->set_flashdata('barang', 'Ditambahkan!');
        redirect('barang');
    }
    //mengubah data dari db
    public function updateData($id)
    {
        $data = array(
            'id' => $id,
            'jenis_barang' => $this->input->post('jenis_barang', true),
        );
        $this->barang->updateData($data);
        $this->session->set_flashdata('barang', 'Diupdate!');
        redirect('barang');
    }
    //menghapus data dari db
    public function hapus($id)
    {
        $this->barang->hapus($id);
        $this->session->set_flashdata('barang', 'Dihapus!');
        redirect('barang');
    }
    //fungasi export excell
    public function export()
    {
        //pengecekan jika isi session (level) adalah kasir maka dikembalikan ke halaman 403
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $barang2 = $this->barang->getBarang();

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID');
        $sheet->setCellValue('C1', 'Jenis Barang');

        // Set column width automatically
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);

        $spreadsheet->getActiveSheet()->getStyle('A1:C1')
            ->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:C1')->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFBA93FF');


        $kolom = 2;
        $nomor = 1;
        foreach ($barang2 as $brg) {
            $sheet->setCellValue('A' . $kolom, $nomor++);
            $sheet->setCellValue('B' . $kolom, $brg->id);
            $sheet->setCellValue('C' . $kolom, $brg->jenis_barang);
            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data Barang Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file barang.php */
