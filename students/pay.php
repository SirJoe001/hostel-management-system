<?php session_start(); 
 if (empty($_SESSION['check'])) {
    header("location:../index.php");
    }
include('../connection/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="style.css">
   <?php include("links.php"); ?>
   
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("topper.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <div class="container">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-5 d-none d-lg-block ">
                                            <img src="../images/h5.jpg" alt="" height="400" width="465">
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900  mb-4">Make Payment</h1>
                                                </div>
                                                <?php 
                                                $user = $_SESSION['id'];
                                                    $sql = "SELECT * FROM register WHERE reg_number='$user'";
                                                    $query = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_assoc($query);
                                                    if (isset($_POST['pay'])) {
                                                        $expirydate = $_POST['expirydate'];
                                                        $cardcvv = $_POST['cardcvv'];
                                                        $cardnumber = $_POST['cardnumber'];
                                                        $cardpin = $_POST['cardpin'];
                                                        $cardtype = $_POST['cardtype'];
                                                        $student = $row['reg_number'];

                                                        $error = array();
                                                        if (empty($expirydate)) {
                                                            $error['msg'] = "Enter Card Date";
                                                        } else if (empty($cardcvv)) {
                                                            $error['msg'] = "Enter Cvv";
                                                        } else if (empty($cardnumber)) {
                                                            $error['msg'] = "Enter Card Number";
                                                        } else if (empty($cardpin)) {
                                                            $error['msg'] = "Enter Card Pin";
                                                        } else if (empty($cardtype)) {
                                                            $error['msg'] = "Select Card Type";
                                                        }
                    
                                                        if (count($error) == 0) {
                                                            $send = "INSERT INTO payment (card_number, pin, cvv, student, expiry_date, cardtype, status) VALUES ('$cardnumber','$cardpin','$cardcvv','$student','$expirydate','$cardtype',1)";
                                                            $ch = mysqli_query($conn, $send);
                                                            if ($ch) {
                                                                echo "<script>alert('Payment Successful')</script>";
                                                            } else {
                                                                echo "<script>alert('Payment Not Successful')</script>";
                                                            }
                                                        }
                                                    }

                                                    if (isset($error['msg'])) {
                                                        $m = $error['msg'];
                                                        $show = "<h6 class='alert alert-danger'>$m</h6>";
                                                    } else {
                                                        $show = '';
                                                    }

                                            
                                                 $userid = $_SESSION['id'];
                                                 $sqli = "SELECT * FROM applications WHERE reg_number='$userid'";
                                                 $que = mysqli_query($conn, $sqli);
                                                 $ra = mysqli_fetch_assoc($que);
                                                 if ($ra) {
                                                 if($ra['status'] == 'Approved') {
                                                     echo "
                                                     <form method='POST' action='' class='user'>
                                                     <div class='form-group row'>
                                                     <div class='form-group'>
                                                         $show
                                                     </div>
                                                         <div class='col-sm-6 '>
                                                             <select style='height: 50px;
                                                                     width: 200px;
                                                                     border-radius:25px;
                                                                     border-color: rgb(189, 214, 214);
                                                                     color:  rgb(139, 153, 153);
                                                                     font-size: small;
                                                                     padding:10px; ' placeholder='...' name='cardtype' >
                                                                 <option value='verve'>Verve Card</option>
                                                                 <option value='master'>Master Card</option>
                                                             </select>
                                                         </div>
                                                         <div class='col-sm-6'>
                                                             <input type='number' class='form-control form-control-user' id='exampleLastName'
                                                                 placeholder='Card Pin' name='cardpin'>
                                                         </div>
                                                     </div>
                                                     <div class='form-group'>
                                                         <input type='number' class='form-control form-control-user' id='exampleInputEmail'
                                                             placeholder='Card Number' name='cardnumber'>
                                                     </div>
                                                     <div class='form-group row'>
                                                         <div class='col-sm-6 mb-3 mb-sm-0'>
                                                             <input type='number' class='form-control form-control-user'
                                                                 id='exampleInputPassword' placeholder='cvv' name='cardcvv'>
                                                         </div>
                                                         <div class='col-sm-6'>
                                                             <input type='date' class='form-control form-control-user'
                                                                 id='exampleRepeatPassword' placeholder='Expiry Date' name='expirydate'>
                                                         </div>
                                                     </div>
                                                     <input type='submit' name='pay' value='Pay!' class='btn btn-primary btn-user btn-block'>
                                                 </form>
                                                     ";
                                                } } else {
                                                    echo "<div><h3 class='text-center text-danger'>You have not being approved yet!</h3></div>";
                                                 } 
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>

                    <div class="row">

                     
                       
                    <!-- Content Row -->
                  
                <!-- /.container-fluid -->

            
            <!-- End of Main Content -->

            <!-- Footer -->
            <!--  -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>