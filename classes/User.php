<?php

class User 
{
    public $fname = "";
    public $lname = "";
    public $phone = "";
    public $address = "";
    public $city = "";
    public $state = "";
    public $zip = "";

    //create user object
    public function __construct ($fname, $lname, $phone, $address, $city, $state, $zip) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phone = $phone;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
    }

    public function __toString() {
        return "User {$this->fname} {$this->lname}";
    }
}
