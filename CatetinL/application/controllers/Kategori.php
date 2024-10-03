<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
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
        $userdata = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();


        if ($userdata['BATAS_BERLANGGANAN'] == NULL) {
            redirect('main/berlangganan');
        }

       
        // if ($userdata['BATAS_BERLANGGANAN'] == NULL) {
        //     redirect('main/berlangganan');
        // }

        //   $ID_PEBISNIS = $this->session->userdata('ID_PEBISNIS'); 
        // $batas_berlangganan = $this->Mcatetin->check_subscription_status($ID_PEBISNIS);

        // if ($batas_berlangganan && strtotime($batas_berlangganan) < strtotime(date('Y-m-d'))) {
        // // Tanggal berlangganan sudah lewat, hindari login dan tampilkan pesan kesalahan
        //     $this->session->set_flashdata('error', 'Tanggal berlangganan sudah habis.');
        // redirect('main/berlangganan');
        // }

        $data['kategori'] = $this->Mcatetin->get_by_id('kategori', $dataWhere)->result();
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/kategori/tampil', $data);
        $this->load->view('home/layout/footer');
    }

    public function add()
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/kategori/form_add');
        $this->load->view('home/layout/footer');
    }

    public function save()
    {
        $idKategori = $this->input->post('idKat');
        $namaKategori = $this->input->post('namaKat');

        $data_insert = array(
            'ID_KATEGORI' => $idKategori,
            'NAMA_KATEGORI' => $namaKategori,
            'ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')
        );
        $this->Mcatetin->insert('kategori', $data_insert);
        redirect('kategori');
    }

    public function edit($id)
    {
        $dataWhere = array('ID_KATEGORI' => $id);
        $data['kategori'] = $this->Mcatetin->get_by_id('kategori', $dataWhere)->row_object();
        
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();

        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/kategori/form_edit', $data);
        $this->load->view('home/layout/footer');
    }


    public function save_edit()
    {
        $id = $this->input->post('id');

        $idKategori = $this->input->post('idKat');
        $namaKategori = $this->input->post('namaKat');
        $dataUpdate = array(
            'ID_KATEGORI' => $idKategori,
            'NAMA_KATEGORI' => $namaKategori
        );
        $this->Mcatetin->update('kategori', $dataUpdate, 'ID_KATEGORI', $id);
        redirect('kategori');
    }

    public function delete($id)
    {
        $this->Mcatetin->delete('kategori', 'ID_KATEGORI', $id);
        redirect('kategori');
    }
}
