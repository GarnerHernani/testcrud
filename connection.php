<?php 

function connection(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "student_system";

    $con = new mysqli($host, $username, $password, $database);

    if ($con->connect_error) {
        echo $con->connect_error;
    } else {
        return $con;
    }

    // $sql = "SELECT * FROM student_list";
    // $students = $con->query($sql) or die ($con->error);
    // $row = $students->fetch_assoc();

    // do {
    //     echo $row['first_name'].' '.$row['last_name']. '<br>';
    // } while ($row = $students->fetch_assoc());
}