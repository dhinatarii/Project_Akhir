<?php

class Mcatetin extends CI_Model {

    public function cek_login($u, $p)
    {
        $q = $this->db->get_where('pebisnis', array('USERNAME' => $u, 'PASWORD' => $p));
        return $q;
    }
    public function cek_login2($u, $p){
        $q = $this->db->get_where('admin', array('userName'=>$u, 'password'=>$p));
        return $q;
    }
    

    public function get_all_data($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }

    public function delete($tabel, $id, $val)
    {
        $this->db->delete($tabel, array($id => $val));
    }

    public function delete_where($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->delete($tabel, $data);
    }

    public function count_total_produk_penyewa($ID_TRANSAKSI) {
        $this->db->where('ID_TRANSAKSI', $ID_TRANSAKSI);
        return $this->db->count_all_results('detail_sewa_produk');
    }

    public function count_total_aktivitas_penyewa($ID_PENYEWA) {
        $this->db->where('ID_PENYEWA', $ID_PENYEWA);
        return $this->db->count_all_results('transaksi');
    }

    public function count_kategori_by_user($ID_PEBISNIS) {
        $this->db->where('ID_PEBISNIS', $ID_PEBISNIS);
        return $this->db->count_all_results('kategori');
    }

    public function count_produk_by_user($ID_PEBISNIS) {
        $this->db->where('ID_PEBISNIS', $ID_PEBISNIS);
        return $this->db->count_all_results('produk');
    }

    public function count_customers_by_user($ID_PEBISNIS) {
        $this->db->where('ID_PEBISNIS', $ID_PEBISNIS);
        return $this->db->count_all_results('penyewa');
    }

    public function count_transaksi_by_user($ID_PEBISNIS) {
        $this->db->from('transaksi');
        $this->db->join('penyewa', 'penyewa.ID_PENYEWA = transaksi.ID_PENYEWA');
        $this->db->where('penyewa.ID_PEBISNIS', $ID_PEBISNIS);
    
        return $this->db->count_all_results();
    }
    

    public function getTotalPendapatanByPebisnis($ID_PEBISNIS)
    {
        $this->db->select_sum('TOTAL_HARGA');
        $this->db->from('detail_sewa_produk');
        $this->db->join('transaksi', 'transaksi.ID_TRANSAKSI = detail_sewa_produk.ID_TRANSAKSI');
        $this->db->join('penyewa', 'penyewa.ID_PENYEWA = transaksi.ID_PENYEWA');
        $this->db->join('pebisnis', 'pebisnis.ID_PEBISNIS = penyewa.ID_PEBISNIS');
        $this->db->where('transaksi.STATUS_SEWA', 'Selesai');
        $this->db->where('pebisnis.ID_PEBISNIS', $ID_PEBISNIS);

        $result = $this->db->get()->row();

        return $result->TOTAL_HARGA;
    }

    public function sumDenda($ID_PEBISNIS) {
        $this->db->select_sum('DENDA');
        $this->db->from('transaksi');
        $this->db->join('penyewa', 'transaksi.ID_PENYEWA = penyewa.ID_PENYEWA');
        $this->db->join('pebisnis', 'penyewa.ID_PEBISNIS = pebisnis.ID_PEBISNIS');
        $this->db->where('transaksi.STATUS_SEWA', 'Selesai');
        $this->db->where('pebisnis.ID_PEBISNIS', $ID_PEBISNIS);

        $query = $this->db->get();
        $result = $query->row();

        return $result->DENDA;
    }


    public function getProdukJoinById($ID_TRANSAKSI)
    {
        $this->db->select('produk.NAMA_PRODUK, produk.HARGA_PRODUK, detail_sewa_produk.ID_PRODUK, detail_sewa_produk.ID_TRANSAKSI');
        $this->db->from('detail_sewa_produk');
        $this->db->join('produk', 'produk.ID_PRODUK = detail_sewa_produk.ID_PRODUK');
        $this->db->where('detail_sewa_produk.ID_TRANSAKSI', $ID_TRANSAKSI );
        $query = $this->db->get();
        return $query->result();
    }

    public function getHargaProduk($ID_TRANSAKSI)
    {
        $this->db->select('produk.HARGA_PRODUK');
        $this->db->from('detail_sewa_produk');
        $this->db->join('produk', 'produk.ID_PRODUK = detail_sewa_produk.ID_PRODUK');
        $this->db->where('detail_sewa_produk.ID_TRANSAKSI', $ID_TRANSAKSI );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_unique_months_by_business($ID_PEBISNIS) {
        $this->db->distinct();
        $this->db->select('MONTHNAME(transaksi.TANGGAL_PENGEMBALIAN) as month', false);
        $this->db->from('transaksi');
        $this->db->join('penyewa', 'transaksi.ID_PENYEWA = penyewa.ID_PENYEWA');
        $this->db->join('pebisnis', 'penyewa.ID_PEBISNIS = pebisnis.ID_PEBISNIS');
        $this->db->where('transaksi.STATUS_SEWA', 'Selesai');
        $this->db->where('pebisnis.ID_PEBISNIS', $ID_PEBISNIS);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_transaction_history_by_month_and_business($selected_month, $ID_PEBISNIS) {

        $this->db->select('transaksi.*');
        $this->db->from('transaksi');
        $this->db->join('penyewa', 'transaksi.ID_PENYEWA = penyewa.ID_PENYEWA');
        $this->db->join('pebisnis', 'penyewa.ID_PEBISNIS = pebisnis.ID_PEBISNIS');
        $this->db->where('STATUS_SEWA', 'Selesai');
        $this->db->where('MONTHNAME(transaksi.TANGGAL_PENGEMBALIAN)', $selected_month);
        $this->db->where('pebisnis.ID_PEBISNIS', $ID_PEBISNIS);
        // $this->db->where('TANGGAL_PEMINJAMAN >=', date('Y-m-01'));
        $this->db->where('TANGGAL_PENGEMBALIAN <=', date('Y-m-t'));
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalBayarByIdTransaksi($ID_TRANSAKSI) {
        $this->db->select_sum('TOTAL_HARGA');
        $this->db->from('detail_sewa_produk');
        $this->db->where('ID_TRANSAKSI', $ID_TRANSAKSI);
        $query = $this->db->get();
        return $query->row()->TOTAL_HARGA;
    }

    public function getHargaProdukById($ID_PRODUK) {
        $this->db->select('HARGA_PRODUK');
        $this->db->from('produk');
        $this->db->where('ID_PRODUK', $ID_PRODUK);
        $query = $this->db->get();
        return $query->row()->HARGA_PRODUK;
    }

    public function sumDendaByMonth($selected_month, $ID_PEBISNIS) {
        $this->db->select_sum('DENDA');
        $this->db->from('transaksi');
        $this->db->join('penyewa', 'transaksi.ID_PENYEWA = penyewa.ID_PENYEWA');
        $this->db->join('pebisnis', 'penyewa.ID_PEBISNIS = pebisnis.ID_PEBISNIS');
        $this->db->where('transaksi.STATUS_SEWA', 'Selesai');
        $this->db->where("MONTHNAME(transaksi.TANGGAL_PENGEMBALIAN)", $selected_month);
        $this->db->where('pebisnis.ID_PEBISNIS', $ID_PEBISNIS);

        $query = $this->db->get();
        $result = $query->row();

        return $result->DENDA;
    }

    
    public function isUsernameUnique($username) {
        $query = $this->db->get_where('pebisnis', array('USERNAME' => $username));
        return $query->num_rows() == 0;
    }

    public function get_transaction_details($ID_TRANSAKSI) {
        $this->db->select('detail_sewa_produk.ID_PRODUK');
        $this->db->from('detail_sewa_produk');
        $this->db->where('detail_sewa_produk.ID_TRANSAKSI', $ID_TRANSAKSI);
        return $this->db->get()->result();
    }

    public function check_subscription_status($ID_PEBISNIS) {
    $this->db->select('BATAS_BERLANGGANAN');
    $this->db->from('pebisnis');
    $this->db->where('ID_PEBISNIS', $ID_PEBISNIS);

    $query = $this->db->get();
    $result = $query->row();

    if ($result) {
        // Mengembalikan tanggal berlangganan
        return $result->BATAS_BERLANGGANAN;
    } else {
        return null;
    }
}

    // RATING
    // Fungsi untuk menambahkan rating baru
    // public function add_rating($data) {
    //     $this->db->insert('rating', $data);
    //     return $this->db->insert_id();
    // }

    // Fungsi untuk mengambil data rating dari database
    public function get_ratings() {
        $query = $this->db->get('rating');
        return $query->result();
    }

    public function get_ratings_by_id($id) {
        // Mengambil data rating berdasarkan ID pebisnis
        $query = $this->db->get_where('rating', array('ID_PEBISNIS' => $id));
        return $query->result_array();
    }


    // Fungsi untuk menambahkan rating baru ke dalam database
    public function add_rating($id_pebisnis, $nama, $nilai_rating, $komentar) {
        $data = array(
            'ID_PEBISNIS' => $id_pebisnis,
            'nama' => $nama,
            'nilai_rating' => $nilai_rating,
            'komentar' => $komentar
        );
        $this->db->insert('rating', $data);
    }

    // public function search_data($ID_PENYEWA, $query){
    //     $this->db->where('ID_PENYEWA', $ID_PENYEWA);
    //     $this->db->group_start();
    //     $this->db->like('NAMA_PENYEWA', $query);
    //     #$this->db->or_like('--', $query);
    //     $this->db->group_end();
    //     $query = $this->db-get('penyewa');
    //     return $query->result();
    // }

    public function get_customers_by_pebisnis($id_pebisnis, $keyword = null) {
        $this->db->select('*');
        $this->db->from('penyewa');
        $this->db->where('ID_PEBISNIS', $id_pebisnis);
        
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('NAMA_PENYEWA', $keyword);
            $this->db->or_like('ALAMAT_PENYEWA', $keyword);
            $this->db->or_like('NO_TELP_PENYEWA', $keyword);
            $this->db->group_end();
        }
        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_sorted_produk($dataWhere, $sort_column, $sort_order){
        $this->db->where($dataWhere);
        $this->db->order_by($sort_column, $sort_order);
        return $this->db->get('produk');
    }

    public function to_pdf() {
        // Memuat model untuk mengambil data pengguna
        $this->load->model('Export_model');
        $users = $this->Export_model->get_users();
    
        // Memuat mPDF
        require_once APPPATH . 'libraries/mpdf/autoload.php';
    
        // Mengatur format dan orientasi PDF
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'orientation' => 'L' // 'L' untuk landscape, 'P' untuk portrait
        ]);
    
        // Render ke template
        $html = $this->load->view('pdf_template', ['users' => $users], true);
    
        // Tulis HTML ke file PDF
        $mpdf->WriteHTML($html);
        
        // Menghasilkan dan mendownload PDF
        $mpdf->Output('user_data.pdf', 'D'); // 'D' untuk mendownload
    }

    // public function export_data_to_csv($penyewa) {
    //     $this->load->dbutil(); // Load database utility class
    //     $this->load->helper('file'); // Load helper untuk menangani file
    //     $this->load->helper('download'); // Load helper untuk download file
    
    //     // Pastikan direktori ada
    //     if (!is_dir('./exports/')) {
    //         mkdir('./exports/', 0755, true);
    //     }
    
    //     // Mengambil seluruh data dari tabel
    //     $query = $this->db->get($penyewa);
    
    //     // Cek jika tidak ada data
    //     if ($query->num_rows() === 0) {
    //         echo "Tidak ada data untuk diekspor.";
    //         return;
    //     }
    
    //     // Konversi hasil query ke format CSV
    //     $delimiter = ",";
    //     $newline = "\r\n";
    //     $enclosure = '"';
    //     $csv_data = $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
    
    //     // Nama file yang akan diekspor
    //     $filename = $penyewa . "_export.csv";
    
    //     // Simpan data ke file CSV
    //     if (write_file('./exports/' . $filename, $csv_data)) {
    //         // Jika file berhasil disimpan, berikan opsi untuk di-download
    //         force_download('./exports/' . $filename, NULL);
    //     } else {
    //         // Jika gagal, beri pesan error
    //         echo "Gagal mengekspor data ke file.";
    //     }
    // }

}
 

?>