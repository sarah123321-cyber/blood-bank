<?php

session_start();
// session checking and connection to database 
if (isset($_SESSION['login'])) {
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "bloodbankk";
    // databse connection 
    $mysqli = new mysqli($servername, $username, $password, $db);
    // error handling
    if ($mysqli->connect_error) {
        die("Connection Failed " . $mysqli->connect_error);
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BloodBank - search by bloodgroup</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style2.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-top: 80px;
            }

            .row.justify-content-center {
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            form.row.g-3 {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 20px;
            }

            .col-auto {
                margin-right: 10px;
                margin-left: 10px;
            }

            select#bloodgroup {
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                border: 1px solid #ced4da;
                border-radius: 0.25rem;
            }

            .btn.btn-primary.mb-3 {
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                border-radius: 0.25rem;
                cursor: pointer;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                border-collapse: collapse;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }
        </style>


    </head>

    <body>
        <!-- global user navbar included  -->
        <?php include 'UserNavbar.php' ?>


        <div class="container">
            <div class="row justify-content-center">
                <h1>Search By bloodgroup</h1>
            </div>
            <form method="post" class="row g-3">
                <div class="col-auto">
                    <label class="visually-hidden">Select Blood Group</label>
                </div>
                <div class="col-auto">
                    <select name="bloodgroup" id="bloodgroup">
                        <option selected>Choose...</option>
                        <option value="A positive">A+</option>
                        <option value="A negative">A-</option>
                        <option value="B positive">B+</option>
                        <option value="B negative">B-</option>
                        <option value="O positive">O+</option>
                        <option value="O negative">O-</option>
                        <option value="AB positive">AB+</option>
                        <option value="AB negative">AB-</option>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary mb-3" value="search" name="search" id="search">
                </div>
            </form>

            <?php
            // targetting the id or name  search from the input 
            if (isset($_POST['search'])) {
                $bloodgroup = $_POST['bloodgroup'];
                // send find query to data to look for bloodgroup from donors
                $query = "SELECT * FROM donors WHERE bloodgroup='$bloodgroup'";
                $result = $mysqli->query($query);
                // showing the result after quering to databse 
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

                if ($result->num_rows > 0) {
                    echo "<tbody>";
                    while ($row = mysqli_fetch_array($result)) {
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
                } else {
                    echo "0 Results";
                }
                echo "</div>";
            }
            ?>

        </div>
            <!-- include the global footer part -->
        <?php require_once "footer.php" ?>
    </body>

    </html>

<?php

} else {
    // homepage redirection 
    header("location:index.php");
}

?>