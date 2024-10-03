<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Memuat library form_validation dan model Madmin
        $this->load->library('form_validation');
        $this->load->model('Madmin');
        $this->load->model('Mcatetin');
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function dashboard()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $jumlah_pebisnis = $this->Madmin->count_customer();
        $total_pendapatan = $this->Madmin->sum_gross_amount();

        $data['jumlah_customer'] = $jumlah_pebisnis;
        $data['total_pendapatan'] = $total_pendapatan;

        $customers = $this->Madmin->get_unique_id_customer();

        $total_berlangganan = [];

        foreach ($customers as $customer) {
            $total_berlangganan[$customer->ID_PEBISNIS] = $this->Madmin->count_berlangganan_by_user($customer->ID_PEBISNIS);
        }

        $data['total_berlangganan'] = $total_berlangganan;
        $data['customer'] = $this->Madmin->get_all_data('pebisnis')->result();

        $username = $this->session->userdata('userName');
        $dataWhere = array('username' => $username);
        $admin['admin'] = $this->Madmin->get_by_id('admin', $dataWhere)->row_array();

        $this->load->view('admin/layout/header', $admin);
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('home/layout/footer');
    }

    public function customer()
    {
        $data['customer'] = $this->Madmin->get_all_data('pebisnis')->result();

        $username = $this->session->userdata('userName');
        $dataWhere = array('username' => $username);
        $admin['admin'] = $this->Madmin->get_by_id('admin', $dataWhere)->row_array();

        $this->load->view('admin/layout/header', $admin);
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/customer/tampil', $data);
        $this->load->view('home/layout/footer');
    }

    public function detail_customer()
    {
        $customers = $this->Madmin->get_unique_id_customer();
        $total_kategori = [];
        $total_produk = [];
        $total_penyewa = [];
        $total_transaksi = [];

        foreach ($customers as $customer) {
            $total_kategori[$customer->ID_PEBISNIS] = $this->Madmin->count_kategori_by_user($customer->ID_PEBISNIS);
            $total_produk[$customer->ID_PEBISNIS] = $this->Madmin->count_produk_by_user($customer->ID_PEBISNIS);
            $total_penyewa[$customer->ID_PEBISNIS] = $this->Madmin->count_customers_by_user($customer->ID_PEBISNIS);
            $total_transaksi[$customer->ID_PEBISNIS] = $this->Madmin->count_transaksi_by_user($customer->ID_PEBISNIS);
        }

        $data['customers'] = $customers;
        $data['total_kategori'] = $total_kategori;
        $data['total_produk'] = $total_produk;
        $data['total_penyewa'] = $total_penyewa;
        $data['total_transaksi'] = $total_transaksi;

        $username = $this->session->userdata('userName');
        $dataWhere = array('username' => $username);
        $admin['admin'] = $this->Madmin->get_by_id('admin', $dataWhere)->row_array();

        $this->load->view('admin/layout/header', $admin);
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/detailcus/tampil', $data);
        $this->load->view('home/layout/footer');
    }

    public function pendapatan()
    {
        $data['pendapatan'] = $this->Madmin->get_midtrans_data();
        $username = $this->session->userdata('userName');
        $dataWhere = array('username' => $username);
        $admin['admin'] = $this->Madmin->get_by_id('admin', $dataWhere)->row_array();

        $this->load->view('admin/layout/header', $admin);
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/pendapatan/tampil', $data);
        $this->load->view('home/layout/footer');
    }

    public function login()
    {
        // Validasi form login admin
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $u = $this->input->post('username');
            $p = $this->input->post('password');

            $username = $this->session->userdata('userName');
            $dataWhere = array('username' => $username);
            // $admin = $this->Madmin->get_by_id('admin', $dataWhere)->row_array();

            $admin = $this->Madmin->get_by_id('admin', array('username' => $u))->row();

            // Username dan password yang valid
            $valid_username = 'admin';
            $valid_password = $admin->password;

            if ($u === $valid_username && $p === $valid_password) {
                $data_session = array(
                    'userName' => $u,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                redirect('adminpanel/dashboard');
            } else {
                // Username atau password salah, kembali ke halaman login
                $this->session->set_flashdata('error', 'Username atau Password salah');
                redirect('adminpanel');
            }
        } else {
            // Validasi gagal, kembali ke halaman login
            $this->session->set_flashdata('error', validation_errors());
            redirect('adminpanel');
        }
    }

    public function ubahpassword()
    {
        $username = $this->session->userdata('userName');
        $dataWhere = array('username' => $username);
        $admin['admin'] = $this->Madmin->get_by_id('admin', $dataWhere)->row_array();

        $this->load->view('admin/layout/header', $admin);
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/ubahpass');
        $this->load->view('home/layout/footer');
    }

    public function save_ubah_pass()
    {
        $passlama = $this->input->post('passlama');
        $passbaru = $this->input->post('passbaru');
        $konfirpassbaru = $this->input->post('konfirpassbaru');
        if ($passbaru == $konfirpassbaru) {
            $data_insert = array(
                'password' => $passbaru,
                'username' => $this->session->userdata('userName')
            );
            $this->Madmin->update('admin', $data_insert, 'password', $passlama);
        }
        redirect('adminpanel/dashboard');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('adminpanel/login');
    }
}
