<?php
// Initialise session
session_start();

if(isset($_SESSION['login'])){

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php include 'Navbar.php' ?>


<div class="container-fluid" >
    <div class="row justify-content-center" style="margin-top:20px">
        
        
        
        <div class="card mycards col-md-3 text-dark bg-light mb-3" style="max-width: 18rem;margin:10px">
            <div class="card-header">Delete Records</div>
            <div class="card-body">
                <p class="card-text">Review and Delete Specific Donor's Data</p>
                <a href="deletea.php" class="btn btn-danger">Delete</a>
            </div>
        </div>
        
        <div class="card mycards col-md-3 text-dark bg-light mb-3" style="max-width: 18rem;margin:10px">
            <div class="card-header">Review and update Stocks</div>
            <div class="card-body">
                <p class="card-text">Review and Update BloodBank's Stock </p>
                <div class="d-flex align-items-center justify-content-between gap-2">
                    <a href="updatea.php" class="btn btn-primary w-100">Update</a>
                    <a href="adminstock.php" class="btn btn-primary w-100 ml-2">Review</a>
                </div>
            </div>
        </div>

        <div class="card mycards col-md-3 text-dark bg-light mb-3" style="max-width: 18rem;margin:10px">
            <div class="card-header">Requests</div>
            <div class="card-body">
                <p class="card-text">View Requests to the Bloodbank</p>
                <a href="requests.php" class="btn btn-info">Requests</a>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php"?>
</body>
</html>
<?php
}
else{
    header("location:adminlogin.php");
}
?>