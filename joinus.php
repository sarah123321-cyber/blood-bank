<?php
// Initialise session
session_start();

if(isset($_SESSION['login'])){

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodBank - Join Us</title>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!--Script-->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#join").click(function(){
                
                if($("#donor_name").val() == ""){
                $("#add_err2").html('<div class="alert alert-danger"> <strong>Name</strong> is required. </div>');
                return false;
                }

                if($("#mobile_no").val().length != 10){
                $("#add_err2").html('<div class="alert alert-danger"> <strong>Mobile Number</strong> must be 10 digits. </div>');
                return false;
                }

                if($("#bloodgroup").val() == ""){
                $("#add_err2").html('<div class="alert alert-danger"> <strong>BloodGroup</strong> is required. </div>');
                return false;
                }

                if($("#age").val() == ""){
                $("#add_err2").html('<div class="alert alert-danger"> <strong>Age</strong> is required. </div>');
                return false;
                }

                if($("#gender").val() == ""){
                $("#add_err2").html('<div class="alert alert-danger"> <strong>Gender</strong> is required. </div>');
                return false;
                }

                if($("#address").val() == ""){
                $("#add_err2").html('<div class="alert alert-danger"> <strong>Address</strong> is required. </div>');
                return false;
                }

                if($("#city").val() == ""){
                $("#add_err2").html('<div class="alert alert-danger"> <strong>City</strong> is required. </div>');
                return false;
                }
               
                donor_name = $("#donor_name").val();
                mobile_no = $("#mobile_no").val();
                bloodgroup = $("#bloodgroup").val();
                age = $("#age").val();
                gender = $("#gender").val();
                address = $("#address").val();
                city = $("#city").val();

                $.ajax({
                    type: "POST",
                    url:"adddonor.php",
                    data: {
                        donor_name: donor_name,
                        mobile_no: mobile_no,
                        bloodgroup: bloodgroup,
                        age: age,
                        gender: gender,
                        address: address,
                        city: city
                    },
                    success: function(html){
                        if(html == 'true'){
                            $("#add_err2").html('<div class="alert alert-success"> <strong>Account</strong> processed. </div>');
                            window.location.href = "userdashboard.php";
                        }

                    },
                    beforeSend : function(){
                        $("#add_err2").html("loading...")
                    }
                });
                return false;
            });
        });
    </script>

</head>
<body>


    <?php include 'UserNavbar.php' ?>

    <div class="container-fluid" style="padding-top: 80px;">
        <div class="row justify-content-center">
           
            <div class="col-lg-6" style="align-items: center;">
                    <hr>
                    <h1 class="intro-text text-center">Donor's Registration form
                    </h1>
                    <div id="add_err2"></div>
                    <hr>
                    <form role="form" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="donor_name">Donor's Full Name</label>
                            </div>
                            <div class="form-group col-md-6 ">
                            <input type="text" class="form-control" id="donor_name" name="donor_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no">Mobile Number</label>
                            </div>
                            <div class="form-group col-md-6 ">
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="bloodgroup">Blood Group</label>
                            </div>
                            <div class="form-group col-md-6">
                            <select id="bloodgroup" name="bloodgroup"  class="form-control">
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
                            
                        </div>  
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="age">Age</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="age" name="age">
                            </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                               <label for="gender">Gender</label>
                           </div>
                           <div class="form-group col-md-6">
                                <select id="gender" name="gender"  class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                           </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="address">Address</label>
                            </div>
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="city" name="city" placeholder="city">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="join">Register</button>
                    </form>
            </div>

            
        </div>
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