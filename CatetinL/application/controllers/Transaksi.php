<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcatetin');
    }

    public function index($ID_PENYEWA)
    {
        $data['ID_PENYEWA'] = $ID_PENYEWA;
        $dataWhere = array('ID_PENYEWA' => $ID_PENYEWA);

        $data['transaksi'] = $this->Mcatetin->get_by_id('transaksi', $dataWhere)->result();

        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/transaksi/tampil', $data);
        $this->load->view('home/layout/footer');
    }

    public function add($ID_PENYEWA)
    {
        $data['ID_PENYEWA'] = $ID_PENYEWA;

        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/transaksi/form_add', $data);
        $this->load->view('home/layout/footer');
    }

    public function edit($ID_TRANSAKSI)
    {
        $dataWhere = array('ID_TRANSAKSI' => $ID_TRANSAKSI);
        $data['transaksi'] = $this->Mcatetin->get_by_id('transaksi', $dataWhere)->row_object();
        
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/transaksi/form_edit', $data);
        $this->load->view('home/layout/footer');
    }


    public function save_transaksi()
    {
        $idPenyewa = $this->input->post('idPenyewa');
        $idTrans = $this->input->post('idTrans');
        $tglPinjam = $this->input->post('tglPinjam');
        $tglDefaultKembali = $this->input->post('tglDefaultKembali');
        $jaminan = $this->input->post('jaminan');

        $data_insert = array(
            'ID_TRANSAKSI' => $idTrans,
            'TANGGAL_PEMINJAMAN' => $tglPinjam,
            'STATUS_SEWA' => 'Belum selesai',
            'ID_PENYEWA' => $idPenyewa,
            'TANGGAL_HARUS_KEMBALI' => $tglDefaultKembali,
            'DENDA' => '0',
            'JAMINAN' => $jaminan
        );
        $this->Mcatetin->insert('transaksi', $data_insert);
        redirect('transaksi/index/' . $idPenyewa);
    }

    public function save_edit()
    {

        $id = $this->input->post('id');
        $idPenyewa = $this->input->post('idPenyewa');
        $idTrans = $this->input->post('idTrans');
        $tglPinjam = $this->input->post('tglPinjam');
        $tglKembali = $this->input->post('tglDefaultKembali');
        $jaminan = $this->input->post('jaminan');

        $data_insert = array(
            'ID_PENYEWA' => $idPenyewa,
            'ID_TRANSAKSI' => $idTrans,
            'TANGGAL_PEMINJAMAN' => $tglPinjam,
            'TANGGAL_HARUS_KEMBALI' => $tglKembali,
            'JAMINAN' => $jaminan
        );
        $this->Mcatetin->update('transaksi', $data_insert, 'ID_TRANSAKSI', $id);
        redirect('transaksi/index/' . $idPenyewa);
    }

    public function ubah_status($ID_TRANSAKSI, $idPenyewa)
    {

        $dataWhere = array('ID_TRANSAKSI' => $ID_TRANSAKSI);

        $result = $this->Mcatetin->get_by_id('transaksi', $dataWhere)->row_object();

        $status = $result->STATUS_SEWA;

        $tanggal_pengembalian = date('Y-m-d');
        $tanggal_pengembalian_null = null;

        $tanggal_default_kembali = $result->TANGGAL_HARUS_KEMBALI;

        $selisih_hari = strtotime($tanggal_pengembalian) - strtotime($tanggal_default_kembali);
        $selisih_hari = floor($selisih_hari / (60 * 60 * 24));

        $denda_perhari = 5000;
        $denda = max(0, $selisih_hari) * $denda_perhari;


        // UPDATE STATUS PRODUK KETIKA SUDAH SELESAI
        $detail_transaksi = $this->Mcatetin->get_transaction_details($ID_TRANSAKSI);

        foreach ($detail_transaksi as $detail) {
            $this->update_product_status($detail->ID_PRODUK);
        }


        if ($status == "Belum selesai") {
            $dataUpdate = array(
                'STATUS_SEWA' => "Selesai",
                'TANGGAL_PENGEMBALIAN' => $tanggal_pengembalian,
                'DENDA' => $denda
            );
        } else {
            $dataUpdate = array(
                'STATUS_SEWA' => "Belum selesai",
                'TANGGAL_PENGEMBALIAN' => $tanggal_pengembalian_null,
                'DENDA' => '0'
            );
        }
        $this->Mcatetin->update('transaksi', $dataUpdate, 'ID_TRANSAKSI', $ID_TRANSAKSI);
        redirect('transaksi/index/' . $idPenyewa);
    }

    private function update_product_status($ID_PRODUK) {
        // Update status produk di sini sesuai kebutuhan
        $data = array('STATUS_PRODUK' => 'Tersedia');
        $this->db->where('ID_PRODUK', $ID_PRODUK);
        $this->db->update('produk', $data);
    }


    public function delete($id, $ID_PENYEWA)
    {
        $this->Mcatetin->delete('transaksi', 'ID_TRANSAKSI', $id);
        redirect('transaksi/index/' . $ID_PENYEWA);
    }
}
