<?php 

include_once "classes/User.php";

class Records 
{
    /**
     * Get the list of uses 
     */
    public function getUsers() {
        global $db;

        //get all user table records
        $res = $db->query("SELECT * FROM users");

        // translating from generic object to a User object
        $users = [];
        foreach($res as $r) {
            $users[] = new User($r->fname, $r->lname, $r->phone, $r->address, $r->city, $r->state, $r->zip);
        }

        //return users array
        return $users;
    }

    
    /**
     * Add New User
     */
    public function addUser($user) {
        global $db;
        $num = $this->formatPhoneNumber($user->phone);
        //insert into db
        $db->query("
        INSERT INTO users (fname, lname, phone, address, city, state, zip) 
        VALUES ('$user->fname', '$user->lname', '$num', '$user->address', '$user->city', '$user->state', '$user->zip')");  
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
     * Search if User exists
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

    function formatPhoneNumber($phoneNumber) {
        $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);
    
        if(strlen($phoneNumber) > 10) {
            $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
            $areaCode = substr($phoneNumber, -10, 3);
            $nextThree = substr($phoneNumber, -7, 3);
            $lastFour = substr($phoneNumber, -4, 4);
    
            $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
        }
        else if(strlen($phoneNumber) == 10) {
            $areaCode = substr($phoneNumber, 0, 3);
            $nextThree = substr($phoneNumber, 3, 3);
            $lastFour = substr($phoneNumber, 6, 4);
    
            $phoneNumber = $areaCode.'-'.$nextThree.'-'.$lastFour;
        }
        else if(strlen($phoneNumber) == 7) {
            $nextThree = substr($phoneNumber, 0, 3);
            $lastFour = substr($phoneNumber, 3, 4);
    
            $phoneNumber = $nextThree.'-'.$lastFour;
        }
    
        return $phoneNumber;
    }
}