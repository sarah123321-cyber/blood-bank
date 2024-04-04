<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood-bank";

// create connection
$mysqli = new mysqli($servername, $username, $password,$dbname);

if(!$mysqli){
    die("Connection failed: " . mysqli_connect_error());
}

$donor_name = mysqli_real_escape_string($mysqli, $_POST['donor_name']);
$bloodgroup = mysqli_real_escape_string($mysqli, $_POST['bloodgroup']);
$mobile_no = mysqli_real_escape_string($mysqli, $_POST['mobile_no']);
$age = mysqli_real_escape_string($mysqli, $_POST['age']);
$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
$city = mysqli_real_escape_string($mysqli, $_POST['city']);
$address = mysqli_real_escape_string($mysqli, $_POST['address']);


if(strlen($donor_name) < 2){
    echo 'name';
} elseif (strlen($bloodgroup) <= 3){
    echo 'bg';
} elseif (strlen($mobile_no) < 10){
    echo 'mob';
} else {
    $query = "INSERT INTO donors(donor_name, mobile_no, bloodgroup,age,gender,city,address) VALUES ('$donor_name','$mobile_no','$bloodgroup','$age','$gender','$city','$address')";
    $insert_row = $mysqli->query($query);
    if($insert_row){
        echo "true";
    } 
    else{
        echo "false";
    }  
}

$mysqli->close();
?>
