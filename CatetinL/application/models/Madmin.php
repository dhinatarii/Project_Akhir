<?php 

class Madmin extends CI_Model{

    // cek login admin
    public function cek_login($u, $p){
        $q = $this->db->get_where('tbl_admin', array('userName'=>$u, 'password'=>$p));
        return $q;
    }

    public function get_all_data($table) {
        $q = $this->db->get($table);
        return $q;
    }

    public function insert($table, $data) {
        $this->db->insert($table, $data);
    }

    public function get_by_id($table, $id) {
        return $this->db->get_where($table, $id);
    }

    public function update($table, $data, $pk, $id){
        $this->db->where($pk, $id);
        $this->db->update($table, $data);
    }

    public function delete($table, $id, $val){
        $this->db->delete($table, array($id => $val));
    }

    // public function delete_produk($table, $id, $val, $pk){
    //     $this->db->where($pk, $id);
    //     $this->db->delete($table, array($id => $val));
    // }


    public function cek_login_member($u, $p){
        $q = $this->db->get_where('tbl_member', array('username'=>$u, 'password'=>$p, 'statusAktif'=>'Y'));
        return $q;
    }
    
    //  fungsi untuk cek login member bedasarkan username
    public function cek_login_username_member($u){
        $q = $this->db->get_where('tbl_member', array('username'=>$u, 'statusAktif'=>'Y'));
        return $q;
    }

    public function get_midtrans_data() {
        $this->db->select('m.*, p.USERNAME, p.NAMA_TOKO');
        $this->db->from('midtrans m');
        $this->db->join('pebisnis p', 'm.ID_PEBISNIS = p.ID_PEBISNIS', 'left');
        $this->db->where('m.status_code', 200);
    
        $query = $this->db->get();
    
        if ($query->num_rows() === 0) {
            $error = $this->db->error();
            log_message('error', 'Database error: ' . $error['message']);
            return false;
        }
    
        return $query->result();
    }

    public function count_customer() {
        return $this->db->count_all('pebisnis');
    }

    public function sum_gross_amount() {
        $this->db->select_sum('gross_amount');
        $this->db->where('status_code', 200);
        $query = $this->db->get('midtrans');
    
        if ($query === false) {
            $error = $this->db->error();
            log_message('error', 'Database error: ' . $error['message']);
            return false;
        }
    
        $result = $query->row();
        return $result->gross_amount;
    }

    public function count_berlangganan_by_user($ID_PEBISNIS) {
        $this->db->where('ID_PEBISNIS', $ID_PEBISNIS);
        $this->db->where('status_code', 201); 
        return $this->db->count_all_results('midtrans');
    }

    public function get_unique_id_customer() {
        $query = $this->db->query("SELECT DISTINCT ID_PEBISNIS FROM pebisnis");
    
        if ($query === false) {
            $error = $this->db->error();
            log_message('error', 'Database error: ' . $error['message']);
            return false;
        }
    
        return $query->result();
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
    
}
?>