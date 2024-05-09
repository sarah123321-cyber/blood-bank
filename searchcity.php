<?php

session_start();

if(isset($_SESSION['login'])){
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "bloodbankk";

$mysqli = new mysqli($servername,$username,$password,$db);

if($mysqli->connect_error){
    die("Connection Failed ". $mysqli->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodBank - search by city</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<nav class="navbar mynavbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">BloodBank Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav mr-auto"  >
    </ul>
        <form class="form-inline my-2 my-lg-0"><ul class="navbar-nav mr-auto"  >
            <li class="nav-item ">
            <a class="nav-link" href="userdashboard.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="ourmembers.php">Our Members</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="joinus.php">Join Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="userstock.php">Make Request</a>
                </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
        </form>
    </div>
</nav>


    <div class="container">
    <div class="row justify-content-center">
        <h1>Search Donor Near you </h1>
    </div>

    <form method="post" class="row g-3">
        <div class="col-auto">
            <label class="visually-hidden">Enter City Name</label>
        </div>
        <div class="col-auto">
            <input type="text" name="city" id="city">
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-primary mb-3" value="search" name="search" id="search">
        </div>
    </form>

    <?php
        if(isset($_POST['search'])){
            $city = $_POST['city'];
            $query = "SELECT * FROM donors WHERE city='$city'";
            $result = $mysqli->query($query);
            echo "<div class='table-responsive'>";
            echo "<table class='table table-hover' border='1'>
                <thead>
                    <tr>
                    <th scope='col'>Donor's Name</th>
                    <th scope='col'>Mobile Number</th>
                    <th scope='col'>Blood Group</th>
                    <th scope='col'>Donor's Age</th>
                    <th scope='col'>Gender</th>
                    <th scope='col'>Address</th>
                    <th scope='col'>City</th>
                </thead>
                </tr>";
            
            
            if($result->num_rows > 0){
                echo "<tbody>";
                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>" . $row['donor_name'] . "</td>";
                    echo "<td>" . $row['mobile_no'] . "</td>";
                    echo "<td>" . $row['bloodgroup'] . "</td>";
                    echo "<td>" . $row['age'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['city'] . "</td> ";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }else{
                echo "0 Results";
            }
            echo "</div>";

        }
    ?>

    </div>

    <?php require_once "footer.php"?>
</body>
</html>

<?php

}
else{
    header("location:index.php");
}

?>
