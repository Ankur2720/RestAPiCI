<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/RestController.php');

class Api extends RestController
{

       public function __construct() {
               parent::__construct();
               $this->load->model('users_model');

       }    
       public function getuserdata_get(){

           $res = [];
           $res  =  $this->users_model->read();
 
           if (!empty($res)) {

                $this->response([
                    'status'  =>   true,
                    'data'    =>   $res,
                ], 200);
            
           } else  {

                $this->response([
                    'message'=> 'NO data found in the database, Insert some data to view.',
                    'status'=>  false,
                ], 200);
           }
       }

    public function updateUserData_put(){

       $id = $this->uri->segment(3);

       $requestBody  =  json_decode(file_get_contents('php://input'), true);

        $res  =  validationcheck($requestBody);

        if( ! empty($res)) {
            $this->response($res);
            die;
        }

        $data  =  [
           'latitude'   =>  $requestBody['latitude'],
           'longitude'  =>  $requestBody['longitude'],
           'status'     =>  (string)$requestBody['status']
        ];

        $res  =  $this->users_model->update($id,$data);

        if( $res) {
            $this->response([
                'message'=> "Data is updated successfully",
                'status'=>  true,
            ], 200);
        } else {
            $this->response([
                'message'=> "Server down, try again after some time.",
                'status'=>  false,
            ], 200);
        }
        
    }

    public function insertUserData_post(){

        try {
            // $body = file_get_contents('php://input');
            $requestBody   =  json_decode(file_get_contents('php://input'), true);
            
            $res   =  validationcheck($requestBody);

            /* if not getting any error return empty response ...*/
            if ( ! empty($res)) {
                $this->response($res);
                die;
            }
            /* payload for inserting data in database..*/
            $insertArray = [
                "latitude"   =>  $requestBody['latitude'],
                "longitude"  =>  $requestBody['longitude'],
                "status"     =>  !empty($requestBody['status'])  ? $requestBody['status']  : "1"
            ];
            
            if ( $this->users_model->insert($insertArray)) {

               $this->response([
                    'message'  =>  'Your data is our database now.',
                    'status'   =>  true,
                ]);

            } else  {

                $this->response([
                    'message'=> 'Given data already exist in our database.',
                    'status'=>  false,
                ], 200);

            }
       } catch( Exceptions $e) {
            print_r($e->getMessage());
       }
    }
       public function deleteUserData_delete(){
           $id   =  $this->uri->segment(3);
           $res  =  $this->users_model->delete($id);

           if( $res) {
                $this->response([
                        'message'=> 'Data is deleted successfully',
                        'status'=>  true,
                ], 200); 
            } else {
                $this->response([
                        'message'=> 'Server down, try again after some time.',
                        'status'=>  false,
                ], 200); 

            }
       }
    
    /*public function convertStdtoArray ( $body ) {

        $object = json_decode($body);
        return get_object_vars($object);
    }*/

}