<?php
    //Development Connection 
   // $host =  '127.0.0.1';
   // $db = 'attendance_db';
   // $user = 'root';
   // $pass = '';
   // $charset = 'utf8mb4';

    //Remote Database Connecction
     $host =  'remotemysql.com';
     $db = '5ENTq7gMfM';
     $user = '5ENTq7gMfM';
     $pass = 'tZeSoIv5T8';
     $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        //echo "<h7 class='text-success'>Hello Database</h7>";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo); 

    $user->insertUser("admin","password");
?>