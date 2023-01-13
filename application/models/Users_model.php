<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*  users model 
*/
class Users_model extends CI_Model
{
    public function read(){
   
       $query = $this->db->select("id, latitude, longitude, status")
                         ->from("users_address")
                         ->where("status", "1")->get();
       return $query->result_array();
   }

   public function insert($data){
       
       // $this->user_name      = $data['latitude']; // please read the below note
       // $this->user_password  = $data['longitude'];
        $query  =  $this->db->select("count(latitude) as count, latitude, longitude ")
                            ->where("latitude",  $data['latitude'])
                            ->where("longitude", $data['longitude'])
                            ->from("users_address")->get();

        if ( $query->result_array()[0]['count'] > 0 ) { 
            return false;                   

       } else {
            return $this->db->insert('users_address',$data);
       }
   }

   public function update($id,$data){
   
        $this->latitude     =   $data['latitude']; // please read the below note
        $this->longitude    =   $data['longitude'];
        $this->status       =   $data['status'];

       $result = $this->db->update('users_address', $this, array('id' => $id));
       if($result)
       {
           return true ;
       }
       else
       {
           return false;
       }
   }

   public function delete($id){
   
       $result = $this->db->query('update users_address set status = "0"  where id = "'.$id.'"');
       if($result)
       {
           return true; 
       }
       else
       {
           return false; 
       }
   }

}