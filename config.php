<?php 


    //host
    $host = "localhost";


    //dbname
    $dbname = "rating-system";

    //user
    $user = "root";

    //pass
    $pass = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
    
    // if($conn == true) {
    //     echo "it's working fine";
    // } else {
    //     echo "connection is wrong: err";
    // }



?>