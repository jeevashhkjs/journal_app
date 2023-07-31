<?php

class Database
{
    public $db;
    public function __construct()
    {
        try
        {
           $this->db = new PDO
            (
                'mysql:host=127.0.0.1;dbname=journal_writing',
                'root',
                'welcome'
            );

        }
        catch(PDOException $e)
        {
            die("connection failed");
        }

    }
}




?>