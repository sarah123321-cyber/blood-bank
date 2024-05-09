<?php
// Initialise session
session_start();

if(isset($_SESSION['login'])){

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bloodbankk";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // SQL query to calculate total stock
    $sqlStock = "SELECT SUM(stock) AS total_stock FROM stock";

    // Execute SQL query for total stock
    $resultStock = $conn->query($sqlStock);

    // Check if query execution was successful
    if ($resultStock->num_rows > 0) {
        // Fetch total stock value
        $rowStock = $resultStock->fetch_assoc();
        $totalStock = $rowStock["total_stock"];
    } else {
        $totalStock = 0; // If no data found, set total stock to 0
    }

    // SQL query to calculate total donors
    $sqlDonors = "SELECT COUNT(*) AS total_donors FROM donors";

    // Execute SQL query for total donors
    $resultDonors = $conn->query($sqlDonors);

    // Check if query execution was successful
    if ($resultDonors->num_rows > 0) {
        // Fetch total donors count
        $rowDonors = $resultDonors->fetch_assoc();
        $totalDonors = $rowDonors["total_donors"];
    } else {
        $totalDonors = 0; // If no data found, set total donors to 0
    }

    // SQL query to calculate total requests
    $sqlRequests = "SELECT COUNT(*) AS total_requests FROM request";

    // Execute SQL query for total requests
    $resultRequests = $conn->query($sqlRequests);

    // Check if query execution was successful
    if ($resultRequests->num_rows > 0) {
        // Fetch total requests count
        $rowRequests = $resultRequests->fetch_assoc();
        $totalRequests = $rowRequests["total_requests"];
    } else {
        $totalRequests = 0; // If no data found, set total requests to 0
    }

    // Close database connection
    $conn->close();
?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php include 'Navbar.php' ?>


<div class="container-fluid container" >
    <div class="row justify-content-center" style="margin-top:20px">
        <div class="col-md-4">
        <div class="card mycards col-md-3 text-dark bg-light mb-3" style="max-width: 18rem;margin:10px">
            <div class="card-header">Delete Records</div>
            <div class="card-body">
                <p class="card-text">Review and Delete Specific Donor's Data</p>
                <a href="deletea.php" class="btn btn-danger">Delete</a>
            </div>
        </div>
        
        </div>
        <div class="col-md-4">
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
        </div>

        <div class="col-md-4">
        <div class="card mycards col-md-3 text-dark bg-light mb-3" style="max-width: 18rem;margin:10px">
            <div class="card-header">Requests</div>
            <div class="card-body">
                <p class="card-text">View Requests to the Bloodbank</p>
                <a href="requests.php" class="btn btn-info">Requests</a>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card mycards col-md-3 text-dark bg-light mb-3" style="max-width: 18rem;margin:10px">
            <div class="card-header">Total Donors</div>
            <div class="card-body">
                <p class="card-text"><?php echo $totalDonors; ?></p>
            </div>
        </div>
        
        </div>
        <div class="col-4">
            <div class="card mycards col-md-3 text-dark bg-light mb-3" style="max-width: 18rem;margin:10px">
            <div class="card-header">Total Request</div>
            <div class="card-body">
                <p class="card-text"><?php echo $totalRequests; ?></p>
            </div>
        </div>
        
        </div>
        <div class="col-4">
            <div class="card mycards col-md-3 text-dark bg-light mb-3" style="max-width: 18rem;margin:10px">
            <div class="card-header">Available Stock</div>
            <div class="card-body">
                <p class="card-text"><?php echo $totalStock; ?></p>
            </div>
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