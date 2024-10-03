<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcatetin');
        // Pastikan user terautentikasi
        if (!$this->session->userdata('ID_PEBISNIS')) {
            redirect('auth/login'); // Redirect ke halaman login jika tidak terautentikasi
        }
    }

    public function index()
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = ['ID_PEBISNIS' => $id];

        // Ambil parameter sorting dari URL
        $sort_column = $this->input->get('sort_column', true) ?: 'ID_PRODUK';
        $sort_order = $this->input->get('sort_order', true) ?: 'ASC';

        // Ambil data produk dengan sorting
        $data['produk'] = $this->Mcatetin->get_sorted_produk($dataWhere, $sort_column, $sort_order)->result();
        $data['sort_column'] = $sort_column;
        $data['sort_order'] = $sort_order;

        $userdata = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        
        if (empty($userdata['BATAS_BERLANGGANAN'])) {
            redirect('main/berlangganan');
        }

        $pebisnis['pebisnis'] = $userdata;
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/produk/tampil', $data);
        $this->load->view('home/layout/footer');
    }

    public function add()
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = ['ID_PEBISNIS' => $id];

        $data['kategori'] = $this->Mcatetin->get_by_id('kategori', $dataWhere)->result();
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();

        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/produk/form_add', $data);
        $this->load->view('home/layout/footer');
    }

    public function save_produk()
    {
        $this->load->library('upload');
        
        $idKategori = $this->input->post('kategori');
        $idProduk = $this->input->post('idProduk');
        $namaProduk = $this->input->post('namaProduk');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');

        $config['upload_path'] = './assets/foto_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $data_file = $this->upload->data();
            $data_insert = [
                'ID_PRODUK' => $idProduk,
                'NAMA_PRODUK' => $namaProduk,
                'DESKRIPSI' => $deskripsi,
                'GAMBAR' => $data_file['file_name'],
                'HARGA_PRODUK' => $harga,
                'ID_KATEGORI' => $idKategori,
                'STATUS_PRODUK' => 'Tersedia',
                'ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')
            ];
            $this->Mcatetin->insert('produk', $data_insert);
            redirect('produk');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('produk/add');
        }
    }

    public function edit($ID_PRODUK)
    {
        $dataWhere = ['ID_PRODUK' => $ID_PRODUK];
        $data['produk'] = $this->Mcatetin->get_by_id('produk', $dataWhere)->row_object();

        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = ['ID_PEBISNIS' => $id];
        
        $data['kategori'] = $this->Mcatetin->get_by_id('kategori', $dataWhere)->result();
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();

        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/produk/form_edit', $data);
        $this->load->view('home/layout/footer');
    }

    public function save_edit()
    {
        $this->load->library('upload');

        $id = $this->input->post('id');
        $idKategori = $this->input->post('kategori');
        $idProduk = $this->input->post('idProduk');
        $namaProduk = $this->input->post('namaProduk');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');
        $idPebisnis = $this->session->userdata('ID_PEBISNIS');

        $config['upload_path'] = './assets/foto_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $data_file = $this->upload->data();
            $data_update = [
                'ID_PRODUK' => $idProduk,
                'NAMA_PRODUK' => $namaProduk,
                'DESKRIPSI' => $deskripsi,
                'GAMBAR' => $data_file['file_name'],
                'HARGA_PRODUK' => $harga,
                'ID_KATEGORI' => $idKategori,
                'STATUS_PRODUK' => 'Tersedia',
                'ID_PEBISNIS' => $idPebisnis
            ];
            $this->Mcatetin->update('produk', $data_update, 'ID_PRODUK', $id);
            redirect('produk');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('produk/edit/' . $idProduk);
        }
    }

    public function delete($ID_PRODUK)
    {
        $this->Mcatetin->delete('produk', 'ID_PRODUK', $ID_PRODUK);
        redirect('produk');
    }
}