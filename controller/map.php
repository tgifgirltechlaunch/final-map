<?php 
//include classes
include_once "classes/Rolodex.php";
include_once "classes/User.php";
include_once "model/records.php";

class Map 
{
    /**
     * index action
     */
    public function index() {
        // create the model object
        $record1Model = new Records();
        
        //works to change value of static variable in Rolodex class by call database function to count records
        $quantity = $record1Model->getCount();
        
        $rolo = $record1Model->getUsers();
        $coords = [];      
        $myAddress = new Map;

        //create message
        $msg = "Welcome to our user map.";
        
        //create markers array and page variables
        for($i = 0; $i < $quantity; $i++){        
            $fullAddress = $rolo[$i]->address . " " . $rolo[$i]->city . ", " . $rolo[$i]->state . " " . $rolo[$i]->zip;
            $fullName = $rolo[$i]->fname  . " " . $rolo[$i]->lname . "</br>" . $rolo[$i]->phone;
            $addCoord = $myAddress->coordinates($fullAddress);

            if($addCoord['meta']['status']===200){
                $coords[]=([$fullName, $addCoord['response']['lat'], $addCoord['response']['lng'], $i]); 
            }
            else{
                //address is unknown message
                $msg = $addCoord['meta']['message'];
            }
        }    

        //create Rolodex obect
        $rolodex = new Rolodex;

        //example, to get the static variable values declared in the Rolodex class
        $welcome=$rolodex->getWelcome();

        //set page title
        $title = "Map";

        // include the view
        include "view/map.php";
    } 

    /**
     * get map lat/long
     */
    public function coordinates($address) {
        //get lat and long from user address
        $Geocoder = new GoogleMapsGeocoder($address);
        $response = $Geocoder->geocode();
        
        if (isset($response) && is_array($response)) {
            
            $latLong = $response['results'][0]['geometry']['location'];
            $meta = array(
                "status"=>200,
                "message"=>"Succeed."
            );

            return array("meta"=>$meta, "response"=>$latLong);
        } else {
            $meta = array(
                "status"=>406,
                "message"=>"Address is unknown."
            );
            return array("meta"=>$meta);
        }
    }
}
