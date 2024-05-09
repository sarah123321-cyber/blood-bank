<?php

session_start();

if(isset($_SESSION['login'])){
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
}
else{
    header("location:adminlogin.php");
}

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "bloodbankk";

$mysqli = new mysqli($servername,$username,$password,$db);

if($mysqli->connect_error){
    die("Connection Failed " . $mysqli->connect_error);
}

$sql = "SELECT * FROM stock";
$result = $mysqli->query($sql);

?>
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style2.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
   <?php include 'Navbar.php' ?>


    <div class="container">
        <div class="row justify-content-center">
            <h1>Review and Update Stocks</h1>
        </div>
        <div class="table-responsive">
            <table  border='1' class="table table-hover"  cellspacing="2" cellpadding="2" >
                <?php
                    if($result->num_rows>0){

                        echo " <thead>
                        <tr>
                        <th>Stock ID</th>
                        <th>Blood Group </th>
                        <th>Stock</th>
                        </tr>
                        </thead>";
                        while($row = $result->fetch_assoc()){
                ?>  
                    <tr>
                        <td><?php echo $row["stock_id"]; ?></td>
                        <td><?php echo $row["bloodgroup"]; ?></td>
                        <td><?php echo $row["stock"]; ?></td>
                        <td><a class="btn btn-primary rounded-pill" href="updatestock.php?stock_id=<?php echo $row["stock_id"] ?>">Update</a></td>
                    </tr>

                <?php	
                } 
                ?>
            </table>

        </div>

    </div>

    <?php require_once "footer.php"?>
</body>
<?php
    } else{
        echo "0 Results";
    }

$mysqli->close();
?>