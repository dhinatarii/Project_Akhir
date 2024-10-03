<?php

class Export_model extends CI_Model 
{
    public function get_users($tabel) 
    {
        return $this->db->get($tabel)->result();
    }

    // public function get_all_data($tabel)
    // {
    //     $q = $this->db->get($tabel);
    //     return $q;
    // } 
    
    public function to_pdf($data) 
    {
        require_once APPPATH . 'libraries/mpdf/autoload.php';
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $html = $this->load->view('pdf_template', ['users' => $data], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('user_data.pdf', 'D');
    }

    public function export_data_to_csv($data, $filename) 
    {
        $this->load->dbutil();
        $this->load->helper('download');
        
        $delimiter = ",";
        $newline = "\r\n";
        $enclosure = '"';
        $csv_data = $this->dbutil->csv_from_result($data, $delimiter, $newline, $enclosure);

        if (write_file('./exports/' . $filename, $csv_data)) {
            force_download('./exports/' . $filename, NULL);
        } else {
            echo "Gagal mengekspor data ke file.";
        }
    }
}

?>