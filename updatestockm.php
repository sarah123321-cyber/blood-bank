<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "blood-bank";

$mysqli = new mysqli($servername,$username,$password,$db);

if($mysqli->connect_error){
    die("Connection Failed " . $mysqli->connect_error);
}

// Form Variables
$bloodgroup = val($_POST["bloodgroup"]);
$stock = val($_POST["stock"]);
$stock_id = val($_POST["stock_id"]);

// validation

function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




// Update Users table with new Values
if ($stock >= 0) {
    $sql = "UPDATE stock SET bloodgroup='$bloodgroup', stock='$stock' WHERE stock_id='$stock_id'";
} else {
    echo "Stock value cannot be less than zero.";
}


// Readirect to main page
if($mysqli->query($sql) === TRUE){
    header("location:adminstock.php?message=success&stock_id=".$stock_id);
}else {
    echo "Error updating record " . $mysqli->error;
}


$mysqli->close();
?>
