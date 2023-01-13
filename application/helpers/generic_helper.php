<?php 

/*
* genertic function to stdobject to array . 
*/

if (!function_exists("validationcheck")) {

    function validationcheck( $data ) {

        $message = [];

        if(empty($data)) {
            $message = [

                "message"        => [
                    'Latitude'   => "Latitude is required.",
                    'Longitude'  => "Longitude is required.",
                    'status'     => "Status is required." ,
                ]
            ];
        }
        $latitude = explode(".", $data['latitude']);
        $longitude = explode(".", $data['longitude']);

        if($latitude[0] <= -90 || $latitude[0] >= 90) {
            $message = [

                "message"    => [
                    'error'  => "latitude value should be in between -90 to 90.",
                    'status' =>  false,
                ]
            ];
        }
        if($longitude[0] <= -180 || $longitude[0] >= 180) {
            $message = [
                "message"    =>  [
                    'error'  => "latitude value should be in between -90 to 90.",
                    'status' =>  false,
                ]
            ];
        }
    
        return $message;
    }
}



