<?php

defined('BASEPATH') or exit('No direct script access allowed');

class c_laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->model('m_pemesanan');
        $this->load->library('pdf');
    }

    public function index()
    {
        $data = array(
            'title' => 'Laporan',
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/laporan/v_laporan', $data);
        $this->load->view('Admin/footer');
    }

    public function lap_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Harian',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/laporan/v_lap_harian', $data);
        $this->load->view('Admin/footer');
    }

    public function lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/laporan/v_lap_bulanan', $data);
        $this->load->view('Admin/footer');
    }

    public function lap_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Tahunan',
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_tahunan($tahun),
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/sidebar');
        $this->load->view('Admin/laporan/v_lap_tahunan', $data);
        $this->load->view('Admin/footer');
    }

    public function lap_stock()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Stock Barang',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
            'isi' => 'layout/backend/laporan/v_lap_stock'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }
    public function struk_pembelian($id_pemesanan)
    {

        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 20);
        // mencetak string 
        $pdf->Cell(190, 7, 'HEIDA RAMEN', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 7, '-----------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $transaksi = $this->m_pemesanan->data($id_pemesanan);
        foreach ($transaksi as $value) {
            $pdf->Cell(40, 7, 'Id Pemesanan', 0, 0, 'L');
            $pdf->Cell(50, 7, $value->id_pemesanan, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Date', 0, 0, 'L');
            $pdf->Cell(50, 7, $value->tanggal_pemesanan, 0, 1, 'L');
        }

        $pdf->Cell(10, 7, '', 0, 1);

        $detail = $this->m_pemesanan->struk($id_pemesanan);
        foreach ($detail as $value) {
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(190, 7, $value->nama_menu, 0, 1, 'L');
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(50, 7, number_format($value->jumlah, 0), 0, 0, 'L');
            $pdf->Cell(50, 7, 'X', 0, 0, 'L');
            $pdf->Cell(50, 7, 'Rp. ' . number_format($value->harga - ($value->diskon / 100 * $value->harga), 0), 0, 0, 'L');
            $pdf->Cell(50, 7, 'Rp. ' . number_format($value->jumlah * ($value->harga - ($value->diskon / 100 * $value->harga)), 0), 0, 1, 'L');
        }

        $pdf->Cell(20, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $tot = $this->m_pemesanan->data($id_pemesanan);
        foreach ($tot as $value) {
            $pdf->Cell(150, 7, 'TOTAL : ', 0, 0, 'R');
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(30, 7, 'Rp. ' . number_format($value->total_belanja, 0), 0, 1, 'R');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(150, 7, 'BAYAR : ', 0, 0, 'R');
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(30, 7, 'Rp. ' . number_format($value->bayar, 0), 0, 1, 'R');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(150, 7, 'KEMBALI : ', 0, 0, 'R');
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(30, 7, 'Rp. ' . number_format($value->kembalian), 0, 1, 'R');
        }
        $pdf->Output();
    }
}
