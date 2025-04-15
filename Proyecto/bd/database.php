<?php
class Database
{
    public static function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=tpcsi;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}