<?php
session_start();
error_reporting(0);
include('conn.php');
error_reporting(0);
//if (strlen($_SESSION['ccmsaid']==0)) {
//  header('location:logout.php');
//  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['ccmsaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($conn,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($conn,"update tbladmin set Password='$newpassword' where ID='$adminid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

  
  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title> Change Password</title>


    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="dashboardcss/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="dashboardcss/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="dashboardcss/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script type="text/javascript">
        function checkpass() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert('New Password and Confirm Password field does not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>

</head>


<style>
    form.example button:hover {
        font-weight: bold;
        background-color: #f4511e;
        border-color: #f4511e;
        padding-right: 20px;
        padding-left: 20px;
        -webkit-box-shadow: 0px 0px 15px 0px #000000;
        box-shadow: 0px 0px 15px 0px #000000;

    }
</style>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Change Password</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="change-password.php">Change Password</a></li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center"> Change Password <i class="fa fa-lock" aria-hidden="true"></i>
                                </h3>
                            </div>

                            <form class="example" name="changepassword" method="post" onsubmit="return checkpass();"
                                action="">
                                <p style="font-size:16px; color:red" align="center"> 
                                <?php if($msg){
                                        echo $msg;
                                } ?> </p>
                                <div class="card-body card-block">
                                    <?php

                                    ?>
                                    <div class="form-group"><label for="company" class=" form-control-label">Current
                                            Password</label><input type="password" name="currentpassword"
                                            id="currentpassword" class="form-control" required=""></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">New
                                            Password</label><input type="password" name="newpassword"
                                            class="form-control" required=""></div>
                                    <div class="form-group"><label for="street" class=" form-control-label">Confirm
                                            Password</label><input type="password" name="confirmpassword"
                                            id="confirmpassword" value="" class="form-control"></div>

                                </div>
                                <?php  ?>
                                <div class="card-footer">
                                    <p style="text-align: center;">
                                        <button type="submit" style="border-radius:15px;" class="btn btn-success btn-lg"
                                            name="submit" id="submit">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i> Change
                                        </button>
                                    </p>

                                </div>
                        </div>
                        </form>
                    </div>




                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->


    <script src="dashboardcss/vendors/jquery/dist/jquery.min.js"></script>
    <script src="dashboardcss/vendors/popper.js/dist/umd/popper.min.js"></script>

    <script src="dashboardcss/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="dashboardcss/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

    <script src="dashboardcss/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dashboardcss/assets/js/main.js"></script>
</body>

</html>
<?php //}  ?>