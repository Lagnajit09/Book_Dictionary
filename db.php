<?php

$host="localhost";
$user="root";
$passwd="";
// $host="sql206.infinityfree.com";
// $user="if0_35607013";
// $passwd="bINplroa8NC";

// $category = 0;
// $uid = 0;
// $bid = 0;
// $genre = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=Library",$user,$passwd);
    // $conn = new PDO("mysql:host=$host;dbname=if0_35607013_Bookmania",$user,$passwd);
} catch(PDOException $pd) {
    die("Failed to connect!");
}

?>