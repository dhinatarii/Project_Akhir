<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        // $params = array('server_key' => 'SB-Mid-server-8UK3pQTiLrdNXzBVPXiP1Qzo', 'production' => false);
		$params = array('server_key' => 'Mid-server-bBjXjsYStswKtYTOWDLZ0Q6u', 'production' => true);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		
    }

	public function index()
	{
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, "true");

		// $id = $this->session->userdata('ID_PEBISNIS');
        // $dataWhere = array('ID_PEBISNIS' => $id);
        // $user = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->row_array();
		
		$order_id = $result['order_id'];
		$user = $this->db->get_where('midtrans', ['order_id' => $order_id])->row_array();
		$data = [
            'status_code'   => $result['status_code']
		];

		if($result['status_code']==200 && $result['gross_amount']==30000 ){
			$this->db->update('midtrans', $data, array('order_id'=>$order_id));
			$update = [
				'STATUS_PEBISNIS' => 'Aktif',
				'BATAS_BERLANGGANAN' => date('Y-m-d', strtotime('+3 month'))
			];
			$this->db->update('pebisnis', $update, array('ID_PEBISNIS'=>$user['ID_PEBISNIS']));
		} else if ($result['status_code']==200 && $result['gross_amount']==75000){
			$this->db->update('midtrans', $data, array('order_id'=>$order_id));
			$update = [
				'STATUS_PEBISNIS' => 'Aktif',
				'BATAS_BERLANGGANAN' => date('Y-m-d', strtotime('+6 month'))
			];
			$this->db->update('pebisnis', $update, array('ID_PEBISNIS'=>$user['ID_PEBISNIS']));
		} else if ($result['status_code']==200 && $result['gross_amount']==1){
			$this->db->update('midtrans', $data, array('order_id'=>$order_id));
			$update = [
				'STATUS_PEBISNIS' => 'Aktif',
				'BATAS_BERLANGGANAN' => date('Y-m-d', strtotime('+1 day'))
			];
			$this->db->update('pebisnis', $update, array('ID_PEBISNIS'=>$user['ID_PEBISNIS']));
		} 

		//notification handler sample

		/*
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}*/

	}
}
