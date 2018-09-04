<?php 
include_once "classes/Rolodex.php";
include_once "classes/User.php";
include_once "model/records.php";

class Home 
{
    /**
     * index action
     */
    public function index() {
        // create the model object
        $record1Model = new Records();

        // get info for the view
        $records1 = $record1Model->getUsers();

        $qty = $record1Model->getCount();

        //get info for the view
        $msg = "Welcome";

        $title = "Home";
        // include the view
        include "view/home.php";
    } 

    /**
     * submit action
     */
    public function submit() {
        // get params from the view
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        // create new Stamp
        $user = new User(ucfirst ($fname), ucfirst ($lname), $phone, $address, $city, $state, $zip);
        
        // save the stamp
        $record2Model = new Records();
        $record2Model->addUser($user); 
        
        // redirect to the list of stamps
        header('Location: index.php?page=map');
    }
}
