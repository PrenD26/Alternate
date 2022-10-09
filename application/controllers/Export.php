<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;


class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_pelanggan', 'pelanggan');
        $this->load->model('mod_barang', 'barang');
        $this->load->model('mod_paket', 'paket');
        $this->load->model('mod_user', 'users');
        $this->load->model('mod_transaksi', 'transaksi');
        $this->load->model('mod_mutasi', 'mutasi');

        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        }
    }
    public function barang()
    {
        //pengecekan jika isi session (level) adalah kasir maka dikembalikan ke halaman 403
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $barang2 = $this->barang->getdata();
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
            $sheet->setCellValue('B' . $kolom, $brg['id_barang']);
            $sheet->setCellValue('C' . $kolom, $brg['jenis_barang']);
            for ($i = 0; $i < 3; $i++) {
                $spreadsheet->getActiveSheet()->getStyle($cols[$i] . $kolom)->applyFromArray($style);
            }
            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data Barang Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function paket()
    {
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $paket = $this->paket->getdata();
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
        $sheet->setCellValue('B1', 'ID Paket');
        $sheet->setCellValue('C1', 'Nama Paket');
        $sheet->setCellValue('D1', 'Include');
        $sheet->setCellValue('E1', 'Estimasi');
        $sheet->setCellValue('F1', 'Biaya');
        $sheet->setCellValue('G1', 'Jenis');


        // $spreadsheet->getActiveSheet()->getStyle('A1:I10')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A1:G1')
            ->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFill()
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
        $kolom = 2;
        $nomor = 1;

        foreach ($paket as $pkt) {
            $sheet->setCellValue('A' . $kolom, $nomor++);
            $sheet->setCellValue('B' . $kolom, $pkt['id_paket']);
            $sheet->setCellValue('C' . $kolom, $pkt['nama_paket']);
            $sheet->setCellValue('D' . $kolom, $pkt['barang']);
            $sheet->setCellValue('E' . $kolom, $pkt['waktu'] . ' Hari');
            $sheet->setCellValue('F' . $kolom, $pkt['biaya']);
            $sheet->setCellValue('G' . $kolom, $pkt['jenis']);
            for ($i = 0; $i < 7; $i++) {
                $spreadsheet->getActiveSheet()->getStyle($cols[$i] . $kolom)->applyFromArray($style);
            }
            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data Paket Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function pelanggan()
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

    public function user()
    {
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $user = $this->users->getdata();
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
        $sheet->setCellValue('B1', 'ID User');
        $sheet->setCellValue('C1', 'Username');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Level');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Nomor Telepon');
        $sheet->setCellValue('H1', 'Bio');
        $sheet->setCellValue('I1', 'Kondisi');
      


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

        foreach ($user as $tsk) {
            $sheet->setCellValue('A' . $kolom, $nomor++);
            $sheet->setCellValue('B' . $kolom, $tsk['id_user']);
            $sheet->setCellValue('C' . $kolom, $tsk['username']);
            $sheet->setCellValue('D' . $kolom, $tsk['nama']);
            $sheet->setCellValue('E' . $kolom, $tsk['level']);
            $sheet->setCellValue('F' . $kolom, $tsk['status']);
            $sheet->setCellValue('G' . $kolom, $tsk['no_telepon']);
            $sheet->setCellValue('H' . $kolom, $tsk['bio']);
            $sheet->setCellValue('I' . $kolom, $tsk['kondisi']);
         
            for ($i = 0; $i < 9; $i++) {
                $spreadsheet->getActiveSheet()->getStyle($cols[$i] . $kolom)->applyFromArray($style);
            }
            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data User Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function transaksi()
    {
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $transaksi = $this->transaksi->getdata();
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
        $sheet->setCellValue('B1', 'ID Transaksi');
        $sheet->setCellValue('C1', 'No Transaksi');
        $sheet->setCellValue('D1', 'Tanggal Transaksi');
        $sheet->setCellValue('E1', 'Kasir');
        $sheet->setCellValue('F1', 'Pelanggan');
        $sheet->setCellValue('G1', 'Paket');
        $sheet->setCellValue('H1', 'Harga');
        $sheet->setCellValue('I1', 'Qty');
        $sheet->setCellValue('J1', 'Total');
        $sheet->setCellValue('K1', 'Bayar');
        $sheet->setCellValue('L1', 'Kembalian');
        $sheet->setCellValue('M1', 'Status');
        $sheet->setCellValue('N1', 'Catatan');


        // $spreadsheet->getActiveSheet()->getStyle('A1:I10')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A1:N1')
            ->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:N1')->getFill()
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
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setAutoSize(true);

        $kolom = 2;
        $nomor = 1;

        foreach ($transaksi as $tsk) {
            $sheet->setCellValue('A' . $kolom, $nomor++);
            $sheet->setCellValue('B' . $kolom, $tsk['id_transaksi']);
            $sheet->setCellValue('C' . $kolom, $tsk['no_transaksi']);
            $sheet->setCellValue('D' . $kolom, date('d M Y / H:i:s',$tsk['created']));
            $sheet->setCellValue('E' . $kolom, $tsk['nama']);
            $sheet->setCellValue('F' . $kolom, $tsk['nama_pelanggan']);
            $sheet->setCellValue('G' . $kolom, $tsk['nama_paket']);
            $sheet->setCellValue('H' . $kolom, $tsk['harga']);
            $sheet->setCellValue('I' . $kolom, $tsk['qty']);
            $sheet->setCellValue('J' . $kolom, $tsk['total']);
            $sheet->setCellValue('K' . $kolom, $tsk['bayar']);
            $sheet->setCellValue('L' . $kolom, $tsk['kembalian']);
            $sheet->setCellValue('M' . $kolom, $tsk['status']);
            $sheet->setCellValue('N' . $kolom, $tsk['note']);
            for ($i = 0; $i < 14; $i++) {
                $spreadsheet->getActiveSheet()->getStyle($cols[$i] . $kolom)->applyFromArray($style);
            }
            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data Transaksi Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

   public function mutasi()
    {
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $mutasi = $this->mutasi->getdata();
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
        $sheet->setCellValue('B1', 'ID Mutasi');
        $sheet->setCellValue('C1', 'No Mutasi');
        $sheet->setCellValue('D1', 'User');
        $sheet->setCellValue('E1', 'Jenis Mutasi');
        $sheet->setCellValue('F1', 'Nominal');
        $sheet->setCellValue('G1', 'Keterangan');
        $sheet->setCellValue('H1', 'Tanggal Mutasi');


        // $spreadsheet->getActiveSheet()->getStyle('A1:I10')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A1:N1')
            ->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:N1')->getFill()
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
            $sheet->setCellValue('B' . $kolom, $mts['id_mutasi']);
            $sheet->setCellValue('C' . $kolom, $mts['no_mutasi']);
            $sheet->setCellValue('D' . $kolom, $mts['username']);
            $sheet->setCellValue('E' . $kolom, $mts['jenis']);
            $sheet->setCellValue('F' . $kolom, $mts['nominal']);
            $sheet->setCellValue('G' . $kolom, $mts['keterangan']);
            $sheet->setCellValue('H' . $kolom, date('d M Y / H:i:s',$mts['created']));
            for ($i = 0; $i < 8; $i++) {
                $spreadsheet->getActiveSheet()->getStyle($cols[$i] . $kolom)->applyFromArray($style);
            }
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