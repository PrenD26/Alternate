<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Mutasi extends CI_Controller
{
    var $folder        = 'mutasi/';

    public function __construct()
    {
        //load model mutasi,user
        parent::__construct();
        $this->load->model('mod_pelanggan', 'pelanggan');
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
            'mutasi' => $this->mutasi->getdata(),
            'content'     => $this->folder . ('view'),

        ];
       $this->load->view('layout/A_layout', $data);
    }

    public function create()
    {
        //validasi jika inputan user tidak sesuai ketentuan maka akan dikembalikan ke halaman create (validasi ada di app>config>form_validation.php) 
        if ($this->form_validation->run('mutasi') == FALSE) {
            $data = [
                'title' => ' Tambah Mutasi',
                'content'     => $this->folder . ('create'),
    
            ];
           $this->load->view('layout/A_layout', $data);
        } else {
            $post =  $this->input->post();
            $data = array(
                'no_mutasi' => $post['no_mutasi'],
                'created' => time(),
                'id_user' => $this->session->userdata('id_user'),
                'jenis' => $post['jenis'],
                'nominal' => $post['nominal'],
                'keterangan' => $post['keterangan'],
            );
            $this->mutasi->create($data);
            $this->session->set_flashdata('mutasi', 'Ditambahkan!');
            redirect('mutasi');
        }
    }
    public function update($id_mutasi)
    {
         //validasi jika inputan user tidak sesuai ketentuan maka akan dikembalikan ke halaman create (validasi ada di app>config>form_validation.php) 
        if ($this->form_validation->run('mutasi') == FALSE) {
            $data = [
                'title' => 'Update Mutasi',
                'mutasi' => $this->mutasi->v_id($id_mutasi),
                'content' => $this->folder . ('update'),
    
            ];
           $this->load->view('layout/A_layout', $data);
        } else {
            $post =  $this->input->post();
            $data = array(
                'id_mutasi' => $id_mutasi,
                'id_user' => $this->session->userdata('id_user'),
                'no_mutasi' => $post['no_mutasi'],
                'jenis' => $post['jenis'],
                'nominal' => $post['nominal'],
                'keterangan' => $post['keterangan'],
                'updated' => time(),
            );
            $this->mutasi->update($data);
            $this->session->set_flashdata('mutasi', 'Diupdate!');
            redirect('mutasi');
        }
      
    }
//menghapus data
    public function delete($id_mutasi)
    {
        $this->mutasi->delete($id_mutasi);
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
        $pelanggan = $this->pelanggan->getdata();
        $cols = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $style = array(
            'borders' => array(
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),
                'left' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),
                'right' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),
            ),
        );
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Pelanggan');
        $sheet->setCellValue('C1', 'Nama Pelanggan');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Kota');
        $sheet->setCellValue('F1', 'Alamat');
        $sheet->setCellValue('G1', 'Nomor Telepon');
        $sheet->setCellValue('H1', 'Date Created');
        $sheet->setCellValue('I1', 'Edited At');
      


        // $spreadsheet->getActiveSheet()->getStyle('A1:I10')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A1:I1')
            ->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:I1')->getFill()
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
        $sheet->getColumnDimension('I')->setAutoSize(true);
      

        $kolom = 2;
        $nomor = 1;

        foreach ($pelanggan as $plg) {
            $sheet->setCellValue('A' . $kolom, $nomor++);
            $sheet->setCellValue('B' . $kolom, $plg['id_pelanggan']);
            $sheet->setCellValue('C' . $kolom, $plg['nama_pelanggan']);
            $sheet->setCellValue('D' . $kolom, $plg['jk']);
            $sheet->setCellValue('E' . $kolom, $plg['kota']);
            $sheet->setCellValue('F' . $kolom, $plg['alamat']);
            $sheet->setCellValue('G' . $kolom, $plg['no_telp']);
            $sheet->setCellValue('H' . $kolom, date('d M Y / H:i:s',$plg['created']));
            $sheet->setCellValue('I' . $kolom, date('d M Y / H:i:s',$plg['updated']));
           
            for ($i = 0; $i < 9; $i++) {
                $spreadsheet->getActiveSheet()->getStyle($cols[$i] . $kolom)->applyFromArray($style);
            }
            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data Pelanggan Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}

/* End of file Mutasi.php */
