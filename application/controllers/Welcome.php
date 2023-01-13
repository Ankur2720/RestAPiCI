<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/RestController.php');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
        parent::__construct();   
        $this->load->model("curl_model");     
    }

	public function index()
	{
	
		$res   =  $this->curl_model->getuserdata();

		$this->load->view('welcome_message', json_decode($res));
	}

	public function deleteEntry() {

		$res   =  $this->curl_model->deleteuserdata($_POST['id']);

		if(!empty($res)) {
			echo $res;
		}

	}

	public function saveEntry() {
		
		$res   =  $this->curl_model->insertUserDetails($_POST);

		// $response = ["status" =>  true , "message" => $res];
		if(!empty($res)) {
			echo $res;
		}
		
	}

	public function updateEntry() {

		$res   =  $this->curl_model->updateUserDetails($_POST);

		// $response = ["status" =>  true , "message" => $res];
		if(!empty($res)) {
			echo $res;
		}

	}

	public function calculateDistance() {

		// substract langitude and logitude..
		$delta_lat = $_POST['latitude1'] - $_POST['latitude2'] ;
		$delta_lon = $_POST['longitude1'] - $_POST['longitude2'] ;

		// earth radius ...
		$earth_radius = 6372.795477598;

		$alpha    = $delta_lat/2;
		$beta     = $delta_lon/2;
		$a        = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($_POST['latitude1'])) * cos(deg2rad($_POST['latitude2'])) * sin(deg2rad($beta)) * sin(deg2rad($beta)) ;
		$c        = asin(min(1, sqrt($a)));
		$distance = 2*$earth_radius * $c;
		$distance = round($distance, 4);

		if(! empty($distance)) {
			echo json_encode(['status' => true, "distance" => $distance]);

		}
	}
}
