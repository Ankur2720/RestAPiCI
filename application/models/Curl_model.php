<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Curl_model extends CI_Model {


	public function getuserdata() {

		$curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => GET_API,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
	}

	public function deleteuserdata( $id) {

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => DELETE_API.$id,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'DELETE',
	));

	$response = curl_exec($curl);

	curl_close($curl);
	return $response;

	}

	public function insertUserDetails( $insertArray) {

		$rawData  =  json_encode($insertArray);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => INSERT_API,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>$rawData,
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;

	}

	public function updateUserDetails( $updateArray) {
	
		$rawData  =  json_encode($updateArray);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => UPDATE_API.$updateArray['id'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'PUT',
		  CURLOPT_POSTFIELDS => $rawData,
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
	}
}