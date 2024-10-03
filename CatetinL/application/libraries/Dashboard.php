<?php
Class Dashboard {
    private $ci;
    function __construct()
    {
        // parent::__construct();
        $this->ci=&get_instance();
    }

    public function count_cus(){
        $this->ci->load->model('MCatetin');
        return $this->ci->MCatetin->get()->num_rows();
    }

    public function sum_pendapatan(){
        $this->ci->load->model('MCatetin');
        return $this->ci->MCatetin->get()->num_rows();
    }

    public function count_cus(){
        $this->ci->load->model('MCatetin');
        return $this->ci->MCatetin->get()->num_rows();
    }
}
?>