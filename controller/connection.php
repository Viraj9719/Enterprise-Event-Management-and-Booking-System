<?php

class Database
{
    public static $connection;

    public static function setUpConnection()
    {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "LahiruJava03@", "rawds", "3306");

            if (Database::$connection->connect_error) {
                die("Connection failed: " . Database::$connection->connect_error);
            }
        }
    }

    public static function iud($q)
    { //Insert,Update,Delete
        Database::setUpConnection();
        if(Database::$connection->query($q) === TRUE){
            echo "Operation Success.";
        }else{
            echo "Operation Failed.";
        }
    }

    public static function search($q)
    {
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}
