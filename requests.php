<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "blood-bank";

$mysqli = new mysqli($servername,$username,$password,$db);

if($mysqli->connect_error){
    die("Connection Failed ". $mysqli->connect_error);
}
// Initialise session
session_start();

if(isset($_SESSION['login'])){

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

$sql = "SELECT * FROM request";
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodBank - Requests</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
</head>
<body>
    <?php include "Navbar.php" ?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Requests</h1>
    </div>
    <div class="row table-responsive">
        <table border='1' class="table table-hover"  cellspacing="2" cellpadding="2" >
                <?php
                    if($result->num_rows>0){

                        echo "<thead>
                        <tr>
                        <th>Requester's ID</th>
                        <th>Requester's Name</th>
                        <th>Mobile Number</th>
                        <th>Blood Group </th>
                        <th>Action </th>
                        </tr>
                        </thead>";
                        while($row = $result->fetch_assoc()){
                ?>  
                <tr>
                    <td><?php echo $row["req_id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["mobile_no"]; ?></td>
                    <td><?php echo $row["bloodgroup"]; ?></td>
                    <td><a class="btn btn-success rounded-pill" href="updaterequest.php?req_id=<?php echo $row["req_id"] ?>&bloodgroup=<?php echo $row["bloodgroup"] ?>">Accept</a></td>
                </tr>
                
                <?php	
                } 
                ?>
        </table>
    </div>


</div>

<?php
    } else{
        echo "0 Results";
    }

$mysqli->close();
?>
<?php require_once "footer.php"?>
</body>


<?php
}else{
    header("location:adminlogin.php");
}

?>
