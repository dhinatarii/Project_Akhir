<?php

// echo APPPATH;
// require_once APPPATH.'../vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') or exit('No direct script access allowed');

class customer extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcatetin');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pdf');
        // $this->load->library('excel'); // Library Excel (PHPExcel)
        // $this->load->library('pdf'); 
    }

    public function index()
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);

        $data['penyewa'] = $this->Mcatetin->get_by_id('penyewa', $dataWhere)->result();

        $pebisnis = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->result();

        $userdata = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();


        if ($userdata['BATAS_BERLANGGANAN'] == NULL) {
            redirect('main/berlangganan');
        }
        // $ID_PEBISNIS = $this->session->userdata('ID_PEBISNIS');
        // $batas_berlangganan = $this->Mcatetin->check_subscription_status($ID_PEBISNIS);

        // if ($batas_berlangganan && strtotime($batas_berlangganan) < strtotime(date('Y-m-d'))) {
        //     // Tanggal berlangganan sudah lewat, hindari login dan tampilkan pesan kesalahan
        //     $this->session->set_flashdata('error', 'Tanggal berlangganan sudah habis.');
        //     redirect('main/berlangganan');
        // }

        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $keyword = $this->input->get('keyword');
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $data['penyewa'] = $this->Mcatetin->get_customers_by_pebisnis($id, $keyword);
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/customer/tampil', $data);
        $this->load->view('home/layout/footer');
    }

    public function add()
    {
        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/customer/form_add');
        $this->load->view('home/layout/footer');
    }

    public function save()
    {
        $idCustomer = $this->input->post('idCus');
        $namaCustomer = $this->input->post('namaCus');
        $alamatCus = $this->input->post('alamat');
        $nohpCus = $this->input->post('nohp');
        $jeniskelamin = $this->input->post('jenkel');

        $data_insert = array(
            'ID_PENYEWA' => $idCustomer,
            'NAMA_PENYEWA' => $namaCustomer,
            'ALAMAT_PENYEWA' => $alamatCus,
            'NO_TELP_PENYEWA' => $nohpCus,
            'JENIS_KELAMIN' => $jeniskelamin,
            'ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')
        );
        $this->Mcatetin->insert('penyewa', $data_insert);
        redirect('customer/index/');
    }



    public function edit($id)
    {
        $dataWhere = array('ID_PENYEWA' => $id);
        $data['penyewa'] = $this->Mcatetin->get_by_id('penyewa', $dataWhere)->row_object();

        $id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $pebisnis['pebisnis'] = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
        $this->load->view('home/layout/header', $pebisnis);
        $this->load->view('home/layout/menu');
        $this->load->view('home/customer/form_edit', $data);
        $this->load->view('home/layout/footer');
    }

    public function save_edit()
    {

        $id = $this->input->post('id');

        $idCustomer = $this->input->post('idCus');
        $namaCustomer = $this->input->post('namaCus');
        $alamatCus = $this->input->post('alamat');
        $nohpCus = $this->input->post('nohp');
        $jeniskelamin = $this->input->post('jenkel');

        $dataUpdate = array(
            'ID_PENYEWA' => $idCustomer,
            'NAMA_PENYEWA' => $namaCustomer,
            'ALAMAT_PENYEWA' => $alamatCus,
            'NO_TELP_PENYEWA' => $nohpCus,
            'JENIS_KELAMIN' => $jeniskelamin
        );
        $this->Mcatetin->update('penyewa', $dataUpdate, 'ID_PENYEWA', $id);
        redirect('customer');
    }

    public function delete($id)
    {
        $this->Mcatetin->delete('penyewa', 'ID_PENYEWA', $id);
        redirect('customer');
    }

    // public function search_customer(){
    //     $this->load->library('pagination');
    //     $ID_PENYEWA = $this->session->userdata('ID_PENYEWA');
    //     $query = $this->input->get('query');
    //     $data['results'] = $this->Mcatetin->search_data($ID_PENYEWA, $query);
    //     $this->load->view('home/layout/menu');
    //     $this->load->view('home/customer/tampil', $data);
    //     $this->load->view('home/layout/footer');

    // }

    public function search() {
        $keyword = $this->input->get('keyword');
        redirect('customer/index?keyword=' . urlencode($keyword));
    }
    public function to_pdf() {
        // Aktifkan error reporting untuk debugging
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    
        // Memuat model untuk mengambil data pengguna
        $this->load->model('MExport');
    
        // Ambil data pengguna
        $users = $this->MExport->get_users();
    
        // Debugging: Cek apakah data pengguna diambil dengan benar
        if (empty($users)) {
            echo "No users found."; // Pesan debug jika tidak ada pengguna
            return; // Hentikan eksekusi jika tidak ada data
        }
    
        // Memuat autoload Composer
        require_once APPPATH . '../vendor/autoload.php';
    
        // Mengatur format dan orientasi PDF
        try {
            $mpdf = new \Mpdf\Mpdf([
                'format' => 'A4',
                'orientation' => 'L' // 'L' untuk landscape, 'P' untuk portrait
            ]);
        } catch (\Mpdf\MpdfException $e) {
            // Menangkap dan menampilkan error jika ada masalah saat menginisialisasi mPDF
            echo "Error initializing mPDF: " . $e->getMessage();
            return;
        }
    
        // Render ke template
        $html = $this->load->view('pdf_template', ['customer' => $users], true);
    
        // Tulis HTML ke file PDF
        $mpdf->WriteHTML($html);
        
        // Menghasilkan dan mendownload PDF
        $mpdf->Output('user_data.pdf', 'D'); // 'D' untuk mendownload
    }

    public function to_excel() {
        $users = $this->export_model->get_users();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set judul kolom
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Tanggal Registrasi');

        // Isi data
        $row = 2;
        foreach($users as $user) {
            $sheet->setCellValue('A' . $row, $user['id']);
            $sheet->setCellValue('B' . $row, $user['name']);
            $sheet->setCellValue('C' . $row, $user['email']);
            $sheet->setCellValue('D' . $row, $user['created_at']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="user_data.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    
}
