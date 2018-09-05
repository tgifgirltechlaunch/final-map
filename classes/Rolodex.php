<?php

class Rolodex {
    public static $list = [];
    public static $welcome = "Hello";

    //set later in map controller
    public static $total = "";

    public static function run() {

        // collection of user objects
        foreach(Rolodex::$list as $l) {
            $l->fname;
            $l->lname;
            $l->phone;
            $l->address;
            $l->city;
            $l->state;
            $l->zip;
        }
    }

    //function to get static variable total
    public static function getTotal() {  
        return Rolodex::$total;
    }

    //function to get static variable welcome
    public static function getWelcome() {  
        return Rolodex::$welcome;
    }
}