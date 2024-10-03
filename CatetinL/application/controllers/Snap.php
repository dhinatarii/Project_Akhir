<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

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
        //$params = array('server_key' => 'SB-Mid-server-8UK3pQTiLrdNXzBVPXiP1Qzo', 'production' => false);
		$params = array('server_key' => 'SB-Mid-server-8UK3pQTiLrdNXzBVPXiP1Qzo', 'production' => false);

		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		$this->load->model('Mcatetin');
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {
		// $user = $this->db->get_where('PEBISNIS', ['ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')]);
		$id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $user = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->result();
		
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => 5000, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => 5000,
		  'quantity' => 1,
		  'name' => "Apple"
		);

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array ($item1_details);

		// Optional
		// $billing_address = array(
		//   'first_name'    => "Andri",
		//   'last_name'     => "Litani",
		//   'address'       => "Mangga 20",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16602",
		//   'phone'         => "081122334455",
		//   'country_code'  => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		//   'first_name'    => "Obet",
		//   'last_name'     => "Supriadi",
		//   'address'       => "Manggis 90",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16601",
		//   'phone'         => "08113366345",
		//   'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
		  'first_name'    => $user->NAMA_TOKO,
		  'email'         => $user->EMAIL,
		  'phone'         => $user->NO_TELP_TOKO,
		  'address'         => $user->ALAMAT_TOKO
		//   'billing_address'  => $billing_address,
		//   'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day', 
            'duration'  => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
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
		// $user = $this->db->get_where('PEBISNIS', ['ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')]);
		$id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $user = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->result();
		
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
		  'name' => "Apple"
		);

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array ($item1_details);

		// Optional
		// $billing_address = array(
		//   'first_name'    => "Andri",
		//   'last_name'     => "Litani",
		//   'address'       => "Mangga 20",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16602",
		//   'phone'         => "081122334455",
		//   'country_code'  => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		//   'first_name'    => "Obet",
		//   'last_name'     => "Supriadi",
		//   'address'       => "Manggis 90",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16601",
		//   'phone'         => "08113366345",
		//   'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
		  'first_name'    => $user->NAMA_TOKO,
		  'email'         => $user->EMAIL,
		  'phone'         => $user->NO_TELP_TOKO,
		  'address'         => $user->ALAMAT_TOKO
		//   'billing_address'  => $billing_address,
		//   'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day', 
            'duration'  => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
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
		// $user = $this->db->get_where('PEBISNIS', ['ID_PEBISNIS' => $this->session->userdata('ID_PEBISNIS')]);
		$id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $user = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->result();
		
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => 100000, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => 100000,
		  'quantity' => 1,
		  'name' => "Apple"
		);

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array ($item1_details);

		// Optional
		// $billing_address = array(
		//   'first_name'    => "Andri",
		//   'last_name'     => "Litani",
		//   'address'       => "Mangga 20",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16602",
		//   'phone'         => "081122334455",
		//   'country_code'  => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		//   'first_name'    => "Obet",
		//   'last_name'     => "Supriadi",
		//   'address'       => "Manggis 90",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16601",
		//   'phone'         => "08113366345",
		//   'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
		  'first_name'    => $user->NAMA_TOKO,
		  'email'         => $user->EMAIL,
		  'phone'         => $user->NO_TELP_TOKO,
		  'address'         => $user->ALAMAT_TOKO
		//   'billing_address'  => $billing_address,
		//   'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day', 
            'duration'  => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
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

		$id = $this->session->userdata('ID_PEBISNIS');
        $dataWhere = array('ID_PEBISNIS' => $id);
        $user = $this->Mcatetin->get_by_id('pebisnis', $dataWhere)->result();

		$data = [
			'order_id'=> $result['order_id'],
            'gross_amount'       => $result['gross_amount'],
            'status_code'   => $result['status_code'],
            'va_number'        => $result['va_numbers'][0]['va_number'],
            'ID_PEBISNIS'             => $user->ID_PEBISNIS

		];
		$this->db->insert('midtrans',$data);
		redirect('main/dashboard');
    }
}
