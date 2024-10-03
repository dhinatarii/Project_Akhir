<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load model yang diperlukan
        $this->load->model('Mcatetin');
    }

    public function index() {
        // Mengambil ID pebisnis dari sesi
        $id_pebisnis = $this->session->userdata('ID_PEBISNIS');
    
        // Mengambil data rating berdasarkan ID pebisnis
        $data['ratings'] = $this->Mcatetin->get_ratings_by_id($id_pebisnis);
    
        // Menampilkan view dengan data rating
        $this->load->view('home/rating/add', $data);
    }
    

    // public function tampil($data){
    //     $id = $this->session->userdata('ID_PEBISNIS');
    //     $data['ID_PEBISNIS'] = $id;
    //     $this->load->view('home/rating/add');
    // }
    

    public function add_rating() {
        // Tangkap data dari form
        $nama = $this->input->post('nama');
        $nilai_rating = $this->input->post('nilai_rating');
        $komentar = $this->input->post('komentar');
    
        // Simpan rating ke dalam database
        $id_pebisnis = $this->session->userdata('ID_PEBISNIS');
        if ($this->Mcatetin->add_rating($id_pebisnis, $nama, $nilai_rating, $komentar)) {
            // Redirect kembali ke halaman form rating
            redirect('rating');
        } else {
            // Tampilkan pesan kesalahan jika penyimpanan gagal
            echo "Gagal menyimpan rating.";
        }
    }
    
}
?>
