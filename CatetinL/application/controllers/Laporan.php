<?php

defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcatetin');
    }

    public function index()
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);

        $ID_PEBISNIS = $this->session->userdata('ID_PEBISNIS');
        // $batas_berlangganan = $this->Mcatetin->check_subscription_status($ID_PEBISNIS);

        // if ($batas_berlangganan && strtotime($batas_berlangganan) < strtotime(date('Y-m-d'))) {
        // // Tanggal berlangganan sudah lewat, hindari login dan tampilkan pesan kesalahan
        //     $this->session->set_flashdata('error', 'Tanggal berlangganan sudah habis.');
        // redirect('main/berlangganan');
        // }



        $userdata = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();

        if ($userdata['BATAS_BERLANGGANAN'] == NULL) {
            redirect('main/berlangganan');
        }
        
        $ID_PEBISNIS = $this->session->userdata('ID_PEBISNIS');

        $months = $this->Mcatetin->get_unique_months_by_business($ID_PEBISNIS);

        $data['laporan_bulanan'] = $months;
        $data['ID_PEBISNIS'] = $ID_PEBISNIS;
        $id = $this->session->userdata('ID_PEBISNIS');

        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/laporan/tampil', $data);
        $this->load->view('home/layout/footer');
    }

    public function detail_transaksi($selected_month, $ID_PEBISNIS)
    {

        $transactions = $this->Mcatetin->get_transaction_history_by_month_and_business($selected_month, $ID_PEBISNIS);
        $data['transactions'] = $transactions;
        $data['selected_month'] = $selected_month;
        $data['ID_PEBISNIS'] = $ID_PEBISNIS;
        $data['start_date'] = date('Y-m-01');
        $data['end_date'] = date('Y-m-t');

        $totalPendapatan = 0;
        foreach ($transactions as $transactions) {
            $transactions->total_bayar = $this->Mcatetin->getTotalBayarByIdTransaksi($transactions->ID_TRANSAKSI);
            $totalPendapatan += $transactions->total_bayar;
        }

        $totalDenda = $this->Mcatetin->sumDendaByMonth($selected_month, $ID_PEBISNIS);

        $data['totalDenda'] = $totalDenda;
        $data['totalPendapatan'] = $totalPendapatan;

        $totalSemuaPendapatan = $totalDenda + $totalPendapatan;


        $data['totalSemuaPendapatan'] = $totalSemuaPendapatan;

        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/laporan/detail', $data);
        $this->load->view('home/layout/footer');
    }
}
