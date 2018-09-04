<?php 

include_once "classes/User.php";

class Records 
{
    /**
     * Get the list of stamps 
     */
    public function getUsers() {
        global $db;

        //get all collection table records
        $res = $db->query("SELECT * FROM users");

        // translating from generic object to a Stamp object
        $users = [];
        foreach($res as $r) {
            $users[] = new User($r->fname, $r->lname, $r->phone, $r->address, $r->city, $r->state, $r->zip);
        }

        //return stamps array
        return $users;
    }

    
    /**
     * Add New User
     */
    public function addUser($user) {
        global $db;
        
        $temp = $this->findUser($user->address, $user->city, $user->state, $user->zip);

        if($temp < 1){

            //if we don't already have that user on file, go ahead and add to the database
            $db->query("
            INSERT INTO users (fname, lname, phone, address, city, state, zip) 
            VALUES ('$user->fname', '$user->lname', '$user->phone', '$user->address', '$user->city', '$user->state', '$user->zip')");
        }
    }

    /**
    * Count total Users
    */
    public function getCount() {
        global $db;

        $res = $db->query("SELECT count(1) as 'count' FROM users");
        $totalCount = $res[0]->count;
        
        // return count
        return $totalCount;
    }

    /**
     * Find Stamp and Return ID and Quantity
     */
    public function findUser($address, $city, $state, $zip) {
        global $db;

        //find a record matching passed property values
        $res = $db->query("SELECT * FROM users WHERE address='$address' AND city='$city' AND state='$state' AND zip='$zip'");
        

        //if there are no rows in results, return 0, else return 1
        if(empty($res)){
            return 0;
        }
        else{
            return 1;
        }
    }
}