<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Transaksi extends CI_Controller
{
    var $folder        = 'admin/transaksi/';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_transaksi', 'transaksi');
        $this->load->model('mod_paket', 'paket');
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
            'title' => 'Data Transaksi',
            'transaksi' => $this->transaksi->gettransaksi(),
            'content'     => $this->folder . ('view'),
        ];
        $this->load->view('layout/admin/template', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Transaksi',
            'paket' => $this->paket->getpaket(),
            'pelanggan' => $this->pelanggan->getPelanggan(),
            'content'     => $this->folder . ('create'),
        ];
        $this->load->view('layout/admin/template', $data);
    }
    public function create()
    {
        $this->_aturan();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'no_transaksi' => $this->input->post('no_transaksi',true),
                'id_user' => $this->input->post('id_user',true),
                'id_pelanggan' => $this->input->post('id_pelanggan',true),
                'nama_pelanggan' => $this->input->post('nama_pelanggan',true),
                'id_paket' => $this->input->post('id_paket',true),
                'qty' => $this->input->post('qty',true),
                'biaya' => $this->input->post('biaya',true),
                'bayar' => $this->input->post('bayar',true),
                'total' => $this->input->post('total',true),
                'status' => $this->input->post('status',true),
                'note' => $this->input->post('note',true),
                'kembalian' => $this->input->post('kembalian',true),
                'id_user' => $this->session->userdata['id'],
                'date_created' => time(),
                'edited_at' => time(),
            );
            $this->transaksi->tambah($data);
            $this->session->set_flashdata('transaksi', 'Ditambahkan!');
            redirect('transaksi');
        }
    }
    public function update($id)
    {
        $this->_dummy();
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Update Transaksi',
                'paket' => $this->paket->getpaket(),
                'pelanggan' => $this->pelanggan->getPelanggan(),
                'transaksi' => $this->transaksi->lihat_id($id),
                'content'     => $this->folder . ('update'),
            ];
            $this->load->view('layout/admin/template', $data);
        } else {
            $data = array(
                'id' => $id,
                'status' => $this->input->post('status'),
                'note' => $this->input->post('note'),
                'edited_at' => time(),
            );
            $this->transaksi->updateData($data);
            $this->session->set_flashdata('transaksi', 'Diupdate!');
            redirect('transaksi');
        }
    }

    public function hapus($id)
    {
        $this->transaksi->hapus($id);
        $this->session->set_flashdata('transaksi', 'Dihapus!');
        redirect('transaksi');
    }
    public function _dummy(){
        $this->form_validation->set_rules('note', 'Catatan', 'trim');
        
    }
    public function _aturan()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules(array(
            array(
                'field' => 'qty',
                'label' => 'Qty',
                'rules' => 'required|trim|numeric|strip_tags',
                'errors' =>
                array(
                    'required'      => 'Data %s Wajib Diisi.',
                    'numeric' => 'Data %s Harus Berupa Angka'
                ),
            ),
            array(
                'field' => 'bayar',
                'label' => 'Bayar',
                'rules' => 'required|trim|numeric|min_length[4]|greater_than_equal_to[' . $post['total'] . ']|strip_tags',
                'errors' =>
                array(
                    'min_length' => 'Data %s Harus Berisikan Minimal 4 Huruf',
                    'numeric' => 'Data %s Harus Berupa Angka',
                    'required'      => 'Data %s Wajib Diisi.',
                    
                ),
            ),
        ));
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Transaksi',
            'paket' => $this->paket->getpaket(),
            'pelanggan' => $this->pelanggan->getPelanggan(),
            'transaksi' => $this->transaksi->lihat_id($id),
            'content'     => $this->folder . ('detail'),
        ];
        $this->load->view('layout/admin/template', $data);
    }
    // public function printfull($id)
    // {
    //     $data = [
    //         'title' => 'Generate Full',
    //         'paket' => $this->paket->getpaket(),
    //         'pelanggan' => $this->pelanggan->getPelanggan(),
    //         'transaksi' => $this->transaksi->lihat_id($id),
    //         'content'     => $this->folder . ('printfull'),
    //     ];
    //     $this->load->view('admin/partials/template', $data);

    // }
    public function nota($id)
    {
        $data = [
            'title' => 'Nota Transaksi',
            'paket' => $this->paket->getpaket(),
            'pelanggan' => $this->pelanggan->getPelanggan(),
            'transaksi' => $this->transaksi->lihat_id($id),
        ];
        $this->load->view('admin/transaksi/nota', $data);
    }
    public function cari()
    {
        $id_paket = $_GET['id_paket'];
        $cari = $this->paket->cari($id_paket)->result();
        echo json_encode($cari);
    }
    public function cari_pelanggan()
    {
        $id_pelanggan = $_GET['id_pelanggan'];
        $find = $this->pelanggan->cari($id_pelanggan)->result();
        echo json_encode($find);
    }
    public function export()
    {
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $transaksi = $this->transaksi->getTransaksi();

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Transaksi');
        $sheet->setCellValue('C1', 'No Transaksi');
        $sheet->setCellValue('D1', 'Tanggal Transaksi');
        $sheet->setCellValue('E1', 'Kasir');
        $sheet->setCellValue('F1', 'Pelanggan');
        $sheet->setCellValue('G1', 'Paket');
        $sheet->setCellValue('H1', 'Biaya');
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

        foreach ($transaksi as $plg) {
            $sheet->setCellValue('A' . $kolom, $nomor++);
            $sheet->setCellValue('B' . $kolom, $plg['id']);
            $sheet->setCellValue('C' . $kolom, $plg['no_transaksi']);
            $sheet->setCellValue('D' . $kolom, $plg['tanggal']);
            $sheet->setCellValue('E' . $kolom, $plg['nama']);
            $sheet->setCellValue('F' . $kolom, $plg['nama_pelanggan']);
            $sheet->setCellValue('G' . $kolom, $plg['nama_paket']);
            $sheet->setCellValue('H' . $kolom, $plg['biaya']);
            $sheet->setCellValue('I' . $kolom, $plg['qty']);
            $sheet->setCellValue('J' . $kolom, $plg['total']);
            $sheet->setCellValue('K' . $kolom, $plg['bayar']);
            $sheet->setCellValue('L' . $kolom, $plg['kembalian']);
            $sheet->setCellValue('M' . $kolom, $plg['status']);
            $sheet->setCellValue('N' . $kolom, $plg['note']);

            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data Transaksi Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file paket.php */
