<?php

class Rolodex {
    public static $list = [];
    public static $welcome = "Hello";
    public static $total = "24";

    public static function run() {
  

        // User Info
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