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

class Mutasi extends CI_Controller
{
    var $folder        = 'admin/mutasi/';

    public function __construct()
    {
        //load model mutasi,user
        parent::__construct();
        $this->load->model('mod_mutasi', 'mutasi');
        $this->load->model('mod_user', 'user');
         //pengecekan jika isi session (username) kosong maka akan dikembalikan ke login
        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        }
    }
    //halaman awal saat meload menu mutasi
    public function index()
    {
        $data = [
            'title' => 'Mutasi',
            'mutasi' => $this->mutasi->getmutasi(),
            'content'     => $this->folder . ('view'),

        ];
        $this->load->view('layout/admin/template', $data);
    }

    public function create()
    {
        //validasi jika inputan user tidak sesuai ketentuan maka akan dikembalikan ke halaman create (validasi ada di app>config>form_validation.php) 
        if ($this->form_validation->run('mutasi') == FALSE) {
            $data = [
                'title' => ' Tambah Mutasi',
                'content'     => $this->folder . ('create'),
    
            ];
            $this->load->view('layout/admin/template', $data);
        } else {
            $data = array(
                'no_mutasi' => $this->input->post('no_mutasi',true),
                'date_created' => time(),
                'edited_at' => time(),
                'id_user' => $this->input->post('id_user',true),
                'jenis' => $this->input->post('jenis',true),
                'nominal' => $this->input->post('nominal',true),
                'keterangan' => $this->input->post('keterangan',true),
            );
            $this->mutasi->tambah($data);
            $this->session->set_flashdata('mutasi', 'Ditambahkan!');
            redirect('mutasi');
        }
    }
    public function update($id)
    {
         //validasi jika inputan user tidak sesuai ketentuan maka akan dikembalikan ke halaman create (validasi ada di app>config>form_validation.php) 
        if ($this->form_validation->run('mutasi') == FALSE) {
            $data = [
                'title' => 'Update Mutasi',
                'mutasi' => $this->mutasi->lihat_id($id),
                'content' => $this->folder . ('update'),
    
            ];
            $this->load->view('layout/admin/template', $data);
        } else {
            $data = array(
                'id' => $id,
                'id_user' => $this->input->post('id_user',true),
                'no_mutasi' => $this->input->post('no_mutasi',true),
                'jenis' => $this->input->post('jenis',true),
                'nominal' => $this->input->post('nominal',true),
                'keterangan' => $this->input->post('keterangan',true),
                'edited_at' => time(),
            );
            $this->mutasi->updateData($data);
            $this->session->set_flashdata('mutasi', 'Diupdate!');
            redirect('mutasi');
        }
      
    }
//menghapus data
    public function hapus($id)
    {
        $this->mutasi->hapus($id);
        $this->session->set_flashdata('mutasi', 'Dihapus!');
        redirect('mutasi');
    }

    //fitur export excell
    public function export()
    {
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $mutasi = $this->mutasi->getmutasi();

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Mutasi');
        $sheet->setCellValue('C1', 'No Mutasi');
        $sheet->setCellValue('D1', 'User');
        $sheet->setCellValue('E1', 'Jenis Mutasi');
        $sheet->setCellValue('F1', 'Nominal');
        $sheet->setCellValue('G1', 'Keterangan');
        $sheet->setCellValue('H1', 'Tanggal Mutasi');

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

        foreach ($mutasi as $mts) {
            $sheet->setCellValue('A' . $kolom, $nomor++);
            $sheet->setCellValue('B' . $kolom, $mts->id);
            $sheet->setCellValue('C' . $kolom, $mts->no_mutasi);
            $sheet->setCellValue('D' . $kolom, $mts->username);
            $sheet->setCellValue('E' . $kolom, $mts->jenis);
            $sheet->setCellValue('F' . $kolom, $mts->nominal);
            $sheet->setCellValue('G' . $kolom, $mts->keterangan);
            $sheet->setCellValue('H' . $kolom, $mts->tanggal);
            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data Mutasi Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file Mutasi.php */
