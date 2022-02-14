<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;


class Pelanggan extends CI_Controller
{
    var $folder        = 'admin/manage/pelanggan/';
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
            'pelanggan' => $this->pelanggan->getpelanggan(),
            'content'     => $this->folder . ('view'),
        ];
        $this->load->view('layout/admin/template', $data);
    }
    public function create()
    {
        if ($this->form_validation->run('pelanggan') == FALSE) {
            $data = [
                'title' => 'Tambah Pelanggan',
                'content'     => $this->folder . ('create'),
            ];
            $this->load->view('layout/admin/template', $data);
        } else {
            $data = array(
                'kode_pelanggan' => $this->input->post('kode_pelanggan',true),
                'nama_pelanggan' => $this->input->post('nama_pelanggan',true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin',true),
                'alamat' => $this->input->post('alamat',true),
                'nomor_telepon' => $this->input->post('nomor_telepon',true),
                'kota' => $this->input->post('kota',true),
                'date_created' => time(),
                'edited_at' => time(),
                'rand' => md5(mt_rand()),
            );
            $this->pelanggan->tambah($data);
            $this->session->set_flashdata('pelanggan', 'Ditambahkan!');
            redirect('pelanggan');
        }
    }

    public function update($id)
    {
        if ($this->form_validation->run('pelanggan') == FALSE) {
            $data = [
                'title' => 'Update Pelanggan',
                'pelanggan' => $this->pelanggan->lihat_id($id),
                'content'     => $this->folder . ('update'),
            ];
            $this->load->view('layout/admin/template', $data);
        } else {
            $data = array(
                'id' => $id,
                'kode_pelanggan' => $this->input->post('kode_pelanggan',true),
                'nama_pelanggan' => $this->input->post('nama_pelanggan',true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin',true),
                'alamat' => $this->input->post('alamat',true),
                'nomor_telepon' => $this->input->post('nomor_telepon',true),
                'kota' => $this->input->post('kota',true),
                'edited_at' => time(),
                'rand' => md5(mt_rand()),
            );
            $this->pelanggan->updateData($data);
            $this->session->set_flashdata('pelanggan', 'Diupdate!');
            redirect('pelanggan');
        }
    }

    public function hapus($rand)
    {
        $this->pelanggan->hapus($rand);
        $this->session->set_flashdata('pelanggan', 'Dihapus!');
        redirect('pelanggan');
    }


    public function export()
    {
        if (
            $this->session->userdata('level') == "Kasir"
        ) {
            redirect('landing_page/noaccess');
        }
        $pelanggan = $this->pelanggan->getPelanggan();

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Pelanggan');
        $sheet->setCellValue('C1', 'Kode Pelanggan');
        $sheet->setCellValue('D1', 'Nama Pelanggan');
        $sheet->setCellValue('E1', 'Jenis Kelamin');
        $sheet->setCellValue('F1', 'Kota');
        $sheet->setCellValue('G1', 'Alamat');
        $sheet->setCellValue('H1', 'Created At');
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
            $sheet->setCellValue('B' . $kolom, $plg->id);
            $sheet->setCellValue('C' . $kolom, $plg->kode_pelanggan);
            $sheet->setCellValue('D' . $kolom, $plg->nama_pelanggan);
            $sheet->setCellValue('E' . $kolom, $plg->jenis_kelamin);
            $sheet->setCellValue('F' . $kolom, $plg->kota);
            $sheet->setCellValue('G' . $kolom, $plg->alamat);
            $sheet->setCellValue('H' . $kolom, $plg->created_at);
            $sheet->setCellValue('I' . $kolom, $plg->edited_at);
            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Data Pelanggan Tanggal ' . date('d F Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    // public function _aturan()
    // {
    //     $this->form_validation->set_rules(array(
    //         array(
    //             'field' => 'nama_pelanggan',
    //             'label' => 'Nama',
    //             'rules' => 'required|trim|max_length[25]|alpha|min_length[3]',
    //             'errors' =>
    //             array(
    //                 'required'      => 'Data %s Wajib Diisi.',
    //                 'alpha' => 'Data %s Tidak Boleh Input Angka',
    //                 'min_length' => 'Data %s Harus Berisikan Minimal 3 Huruf',
    //                 'max_length' => 'Data %s Harus Berisikan Maximal 25 Huruf',
    //             ),
    //         ),
    //         array(
    //             'field' => 'nomor_telepon',
    //             'label' => 'Nomor Telepon',
    //             'rules' => 'required|trim',
    //             'errors' =>
    //             array(
    //                 'required'      => 'Data %s Wajib Diisi.',
    //             ),
    //         ),
    //         array(
    //             'field' => 'kota',
    //             'label' => 'Kota',
    //             'rules' => 'required|trim|max_length[25]|min_length[3]',
    //             'errors' =>
    //             array(
    //                 'min_length' => 'Data %s Harus Berisikan Minimal 3 Huruf',
    //                 'required'      => 'Data %s Wajib Diisi.',
    //             ),

    //         ),
    //         array(
    //             'field' => 'alamat',
    //             'label' => 'Alamat',
    //             'rules' => 'required|trim',
    //             'errors' =>
    //             array(
    //                 'required'      => 'Data %s Wajib Diisi.',
    //             ),
    //         )
    //     ));
    // }
}
/* End of file pelanggan.php */
