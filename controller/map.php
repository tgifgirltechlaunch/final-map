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

        // get info for the view
        Rolodex::$list= $record1Model->getUsers();

        //works to change value of static variable in Rolodex class by call database function to count records
        Rolodex::$total = $record1Model->getCount();

        // build Rolodex by calling rolodex run function in rolodex class
        Rolodex::run();
        
        $rolo = $record1Model->getUsers();
        $coords = [];      
        $myAddress = new Map;
        
        //create markers array and page variables
        for($i = 0; $i < Rolodex::$total; $i++){        
            $fullAddress = $rolo[$i]->address . " " . $rolo[$i]->city . ", " . $rolo[$i]->state . " " . $rolo[$i]->zip;
            $fullName = $rolo[$i]->fname  . " " . $rolo[$i]->lname . "</br>" . $rolo[$i]->phone;
            $addCoord = $myAddress->coordinates($fullAddress);
            $coords[]=([$fullName, $addCoord[0], $addCoord[1], $i]); 
        }    

        //create message
        $msg = "This is our user map.";

        $dex = new Rolodex;

        //works to get the static variable values declared in the Rolodex class
        $quantity=$dex->getTotal();

        //works to get the static variable values declared in the Rolodex class
        $welcome=$dex->getWelcome();

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

        $testLat = $response['results'][0]['geometry']['location']['lat'];
        $testLng = $response['results'][0]['geometry']['location']['lng'];

        $addCoord = [$testLat, $testLng];
        
        //return array of lat lng
        return $addCoord;

    }
}
