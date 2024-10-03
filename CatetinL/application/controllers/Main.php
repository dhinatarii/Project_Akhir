<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcatetin');
        $params = array('server_key' => 'Mid-server-bBjXjsYStswKtYTOWDLZ0Q6u', 'production' => true);

        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('landingpage/index');
    }



    public function login()
    {

        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function lupa_pass()
    {

        $this->load->view('lupa_password');
    }

    private function isUserSubscribed()
    {
        return $this->session->userdata('TGL_BERLANGGANAN') === NULL;
    }

    public function dashboard()
    {

        if (empty($this->session->userdata('ID_PEBISNIS'))) {
            redirect('main');
        }

        // if ($pebisnis->BATAS_BERLANGGANAN == NULL) {
        //     redirect('main/berlangganan');
        // }


        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $ID_PEBISNIS = $this->session->userdata('ID_PEBISNIS'); // Sesuaikan dengan cara Anda menyimpan ID user
        $total_kategori = $this->Mcatetin->count_kategori_by_user($ID_PEBISNIS);
        $total_produk = $this->Mcatetin->count_produk_by_user($ID_PEBISNIS);
        $total_customers = $this->Mcatetin->count_customers_by_user($ID_PEBISNIS);
        $total_transaksi = $this->Mcatetin->count_transaksi_by_user($ID_PEBISNIS);
        $id_penyewa = $this->session->userdata('ID_PENYEWA'); // Sesuaikan dengan cara Anda menyimpan ID penyewa
        $id_pebisnis = $this->session->userdata('ID_PEBISNIS');


        $pebisnis = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->result();



        $totalPendapatan = $this->Mcatetin->getTotalPendapatanByPebisnis($ID_PEBISNIS);


        $midtrans = $this->Mcatetin->get_all_data('midtrans')->result_array();

        foreach ($midtrans as $key) {
            if ($key['ID_PEBISNIS'] == $this->session->userdata('ID_PEBISNIS') && $key['status_code'] == '200' && $key['gross_amount']=='30000') {
                $update = [
                    'STATUS_PEBISNIS' => 'Aktif',
                    'BATAS_BERLANGGANAN' => date('Y-m-d', strtotime('+90 day'))
                ];
                $this->Mcatetin->update('pebisnis', $update, 'ID_PEBISNIS', $key['ID_PEBISNIS']);
                $this->Mcatetin->delete('midtrans', 'order_id', $key['order_id']);
            }
            else if ($key['ID_PEBISNIS'] == $this->session->userdata('ID_PEBISNIS') && $key['status_code'] == '200' && $key['gross_amount']=='75000') {
                $update = [
                    'STATUS_PEBISNIS' => 'Aktif',
                    'BATAS_BERLANGGANAN' => date('Y-m-d', strtotime('+180 day'))
                ];
                $this->Mcatetin->update('pebisnis', $update, 'ID_PEBISNIS', $key['ID_PEBISNIS']);
                $this->Mcatetin->delete('midtrans', 'order_id', $key['order_id']);
            }else if ($key['ID_PEBISNIS'] == $this->session->userdata('ID_PEBISNIS') && $key['status_code'] == '200' && $key['gross_amount']=='1') {
                $update = [
                    'STATUS_PEBISNIS' => 'Aktif',
                    'BATAS_BERLANGGANAN' => date('Y-m-d', strtotime('+365 day'))
                ];
                $this->Mcatetin->update('pebisnis', $update, 'ID_PEBISNIS', $key['ID_PEBISNIS']);
                $this->Mcatetin->delete('midtrans', 'order_id', $key['order_id']);
            }
        }


        $userdata = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();

        if ($userdata['BATAS_BERLANGGANAN'] == NULL) {
            redirect('main/berlangganan');
        }


        $data['total_kategori'] = $total_kategori;
        $data['total_produk'] = $total_produk;
        $data['total_customers'] = $total_customers;
        $data['total_transaksi'] = $total_transaksi;
        $totalDenda = $this->Mcatetin->sumDenda($ID_PEBISNIS);
        $totalSemuaPendapatan = $totalDenda + $totalPendapatan;
        $data['totalSemuaPendapatan'] = $totalSemuaPendapatan;

        // $data['produk'] = $this->Mcatetin->get_by_id('produk', $dataWhere)->result();
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();

        // Data di table di dash
        $customers = $this->Mcatetin->get_by_id('penyewa', $dataWhere)->result();
        $total_aktivitas_transaksi = [];
        $total_produk_customer = [];
        // $status_sewa = '';
        // $denda = 0;
        $status_sewa = [];
        $denda = [];

        foreach ($customers as $customer) {
            $total_aktivitas_transaksi[$customer->ID_PENYEWA] = $this->Mcatetin->count_total_aktivitas_penyewa($customer->ID_PENYEWA);

            $dataWhere_transaksi = array('ID_PENYEWA' => $customer->ID_PENYEWA);
            $transaksi_all = $this->Mcatetin->get_by_id('transaksi', $dataWhere_transaksi)->result();
            
             // Initialize status_sewa and denda arrays for each user
            // if (!isset($status_sewa[$customer->ID_PENYEWA])) {
            //     $status_sewa[$customer->ID_PENYEWA] = [];
            // }
            // if (!isset($denda[$customer->ID_PENYEWA])) {
            //     $denda[$customer->ID_PENYEWA] = [];
            // }

            foreach ($transaksi_all as $transaksi) {
                $total_produk_customer[$customer->ID_PENYEWA] = $this->Mcatetin->count_total_produk_penyewa($transaksi->ID_TRANSAKSI);
                $status_sewa[$customer->ID_PENYEWA] = $transaksi->STATUS_SEWA;
                $denda[$customer->ID_PENYEWA] = $transaksi->DENDA;
            }
        }

        $data['status_sewa'] = $status_sewa;
        $data['denda'] = $denda;
        $data['total_aktivitas_transaksi'] = $total_aktivitas_transaksi;
        $data['total_produk_customer'] = $total_produk_customer;
        $data['penyewa'] = $this->Mcatetin->get_by_id('penyewa', $dataWhere)->result();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('dashboard/index', $data);
        $this->load->view('home/layout/footer');
    }

    public function berlangganan()
    {
        if (empty($this->session->userdata('ID_PEBISNIS'))) {
            redirect('main');
        }
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('berlangganan/index');
        $this->load->view('home/layout/footer');
    }


    public function sukses()
    {
        $this->load->view('berlangganan/sukses');
    }

    public function save_login()
    {

        $this->load->model('Mcatetin');

        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->Mcatetin->cek_login($u, $p)->num_rows();
        $result = $this->Mcatetin->cek_login($u, $p)->row_object();


        if ($cek == 1) {
            $data_session = array(
                'ID_PEBISNIS' => $result->ID_PEBISNIS,
                'USERNAME' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            // $dataInput = array(
            //     'STATUS_PEBISNIS' => 'Aktif'
            // );
            // $this->Mcatetin->update('pebisnis', $dataInput, 'PASWORD', $p);
            redirect('main/dashboard');
        } else {
            redirect('main/login');
        }
    }

    public function save_register()
    {

        $namaToko = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $notlp = $this->input->post('nohp');
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $Konfirmasi_pass = $this->input->post('konfirmasi_password');

        if (!$this->Mcatetin->isUsernameUnique($username)) {
            $this->session->set_flashdata('alert_message', 'Username sudah digunakan, silakan pilih username lain.');

            redirect('main/register');
        }

        if ($Konfirmasi_pass == $pass) {
            $dataInput = array(

                'NAMA_TOKO' => $namaToko,
                'ALAMAT_TOKO' => $alamat,
                'NO_TELP_TOKO' => $notlp,
                'USERNAME' => $username,
                'PASWORD' => $pass,
                'EMAIL' => $email,
            );

            $this->Mcatetin->insert('pebisnis', $dataInput);
            redirect('main/login');
        } else {
            redirect('main/register');
        }
    }

    public function save_lupa_pass()
    {
        // $id = $this->input->post('id');

        $username = $this->input->post('username');

        $new_pass = $this->input->post('password_new');
        $new_konfirmasi_pass = $this->input->post('password_new_konfirmasi');

        if ($new_konfirmasi_pass == $new_pass) {
            $dataInput = array(
                'PASWORD' => $new_pass
            );

            $this->Mcatetin->update('pebisnis', $dataInput, 'USERNAME', $username);
            redirect('main/login');
        } else {
            redirect('main/lupa_pass');
        }
    }

    public function token()
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);

        $user = $this->db->get_where('pebisnis', ['ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')])->row();

        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 30000, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 30000,
            'quantity' => 1,
            'name' => "Berlangganan 3 Bulan"
        );


        // Optional
        $item_details = array($item1_details);

        $customer_details = array(
            'first_name'    => null
        );

        $credit_card['secure'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 90 // 3 BULAN
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function token1()
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);

        $user = $this->db->get_where('pebisnis', ['ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')])->row_array();

        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 75000, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 75000,
            'quantity' => 1,
            'name' => "Berlangganan 6 bulan"
        );


        // Optional
        $item_details = array($item1_details);

        $customer_details = array(
            'first_name'    => null
        );

        $credit_card['secure'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 180
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function token2()
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);

        $user = $this->db->get_where('pebisnis', ['ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')])->row_array();

        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 1, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 1, // NANT UBAH LAGI 100.000
            'quantity' => 1,
            'name' => "Berlangganan 1 Tahun"
        );


        // Optional
        $item_details = array($item1_details);

        $customer_details = array(
            'first_name'    => null
        );

        $credit_card['secure'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 365 // DIGANTI 365 NANTI
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }




    public function finish()
    {
        $result = json_decode($this->input->post('result_data'), true);

        // 		$id = $this->session->userdata('ID_PEBISNIS');
        //         $dataWhere = array('ID_PEBISNIS' => $id);
        //         $user = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row();

        $user = $this->db->get_where('pebisnis', ['ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')])->row_array();

        $data = [
            'order_id' => $result['order_id'],
            'gross_amount'       => $result['gross_amount'],
            'status_code'   => $result['status_code'],
            'ID_PEBISNIS'             => $user['ID_PEBISNIS']

        ];
        $this->db->insert('midtrans', $data);
        redirect('main/dashboard');
    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('main/index/landingpage');
    }
}
