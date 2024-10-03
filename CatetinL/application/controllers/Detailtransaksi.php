<?php

defined('BASEPATH') or exit('No direct script access allowed');

class detailtransaksi extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcatetin');
    }

    public function index($ID_TRANSAKSI)
    {

        $data['ID_TRANSAKSI'] = $ID_TRANSAKSI;

        $data['datajoin'] = $this->Mcatetin->getProdukJoinById($ID_TRANSAKSI);

        $data_harga = $this->Mcatetin->getHargaProduk($ID_TRANSAKSI);

        $total_bayar = 0;
        foreach ($data_harga as $val) {
            $total_bayar += $val['HARGA_PRODUK'];
        }
        $data['total_bayar'] = $total_bayar;

        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/transaksi/tampil_detail', $data);
        $this->load->view('home/layout/footer');
    }


    public function add($ID_TRANSAKSI)
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array(
            'ID_PEBISNIS' => $id,
            'STATUS_PRODUK' => 'Tersedia'
        );

        $data['ID_TRANSAKSI'] = $ID_TRANSAKSI;

        $data['produk'] = $this->Mcatetin->get_by_id('produk', $dataWhere)->result();

        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/transaksi/form_add_detail_produk', $data);
        $this->load->view('home/layout/footer');
    }

    public function save_dt()
    {
        $idTran = $this->input->post('idTransaksi');
        $idProduk = $this->input->post('produk');

        $harga_produk = $this->Mcatetin->getHargaProdukById($idProduk);

        $data_insert = array(
            'ID_TRANSAKSI' => $idTran,
            'ID_PRODUK' => $idProduk,
            'TOTAL_HARGA' => $harga_produk
        );


        $data_update_produk = array(
            'STATUS_PRODUK' => 'Tidak Tersedia'
        );

        $this->Mcatetin->update('produk', $data_update_produk, 'ID_PRODUK', $idProduk);

        $this->Mcatetin->insert('detail_sewa_produk', $data_insert);
        redirect('detailtransaksi/index/' . $idTran);
    }

    public function delete($id, $ID_TRANSAKSI)
    {

        $data_update_produk = array(
            'STATUS_PRODUK' => 'Tersedia'
        );

        $this->Mcatetin->update('produk', $data_update_produk, 'ID_PRODUK', $id);

        $this->Mcatetin->delete('detail_sewa_produk', 'ID_PRODUK', $id);
        redirect('detailtransaksi/index/' . $ID_TRANSAKSI);
    }
}
