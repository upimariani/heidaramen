<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pemesanan_produk');
        $this->db->join('pemesanan', 'pemesanan.id_pemesanan = pemesanan_produk.id_pemesanan', 'left');
        $this->db->join('produk', 'produk.id_menu = pemesanan_produk.id_menu', 'left');
        $this->db->where('DAY(pemesanan.tanggal_pemesanan)', $tanggal);
        $this->db->where('MONTH(pemesanan.tanggal_pemesanan)', $bulan);
        $this->db->where('YEAR(pemesanan.tanggal_pemesanan)', $tahun);
        $this->db->order_by('jumlah', 'desc');
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pemesanan_produk');
        $this->db->join('pemesanan', 'pemesanan.id_pemesanan = pemesanan_produk.id_pemesanan', 'left');
        $this->db->join('produk', 'produk.id_menu = pemesanan_produk.id_menu', 'left');
        $this->db->where('MONTH(tanggal_pemesanan)', $bulan);
        $this->db->where('YEAR(tanggal_pemesanan)', $tahun);
        $this->db->where('konfirmasi=1');
        $this->db->order_by('jumlah', 'desc');
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('pemesanan_produk');
        $this->db->join('pemesanan', 'pemesanan.id_pemesanan = pemesanan_produk.id_pemesanan', 'left');
        $this->db->join('produk', 'produk.id_menu = pemesanan_produk.id_menu', 'left');
        $this->db->where('YEAR(tanggal_pemesanan)', $tahun);
        $this->db->where('konfirmasi=1');
        $this->db->order_by('jumlah', 'desc');

        return $this->db->get()->result();
    }

    public function lap_stock($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('DAY(pemesanan.tanggal_pemesanan)', $tanggal);
        $this->db->where('MONTH(pemesanan.tanggal_pemesanan)', $bulan);
        $this->db->where('YEAR(pemesanan.tanggal_pemesanan)', $tahun);
        $this->db->order_by('stock', 'desc');
        return $this->db->get()->result();
    }
}

/* End of file M_laporan.php */
