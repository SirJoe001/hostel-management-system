<?php session_start(); 
 if (empty($_SESSION['check'])) {
    header("location:../index.php");
    }
include('../connection/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="apply.css">
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
                                            <img src="../images/h1.jpg" alt="" height="430" width="465">
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Apply Hostel</h1>
                                                </div>
                                                <?php
                                                $user = $_SESSION['id'];
                                                $gen = "SELECT * FROM register WHERE reg_number='$user'";
                                                $cont = mysqli_query($conn, $gen);
                                                $row = mysqli_fetch_assoc($cont);
                                                    
                                                    if (isset($_POST['apply'])) {
                                                        $hostel = $_POST['hostel'];
                                                        $phase = $_POST['phase'];
                                                        $hostelNum = $_POST['hostelNum'];
                                                        $reg = $row['reg_number'];
                                                        $student = $row['student_name'];
                                                        
                                                        $send = "INSERT INTO applications (student, reg_number, hostel, phase, room_number, status) VALUES ('$student','$reg','$hostel','$phase','$hostelNum','0')";
                                                        $ql = mysqli_query($conn, $send);
                                                        if ($ql) {
                                                            echo "<script>alert('application sent')</script>";
                                                        } else {
                                                            echo "<script>alert('application not set')</script>";
                                                        } 
                                                    }
                                                ?>
                                                <form method="POST" action="" class="user">
                                                    <div class="form-group row">
                                                    <div class="form-group">  
                                                    </div>
                                                        <div class="col-md-12">
                                                                    <div class='text-center'>
                                                                    <h6 class='text-primary'>Select Hostel</h6>
                                                                    <?php 
                                                                    $userid = $_SESSION['id'];
                                                                    $gender = "SELECT * FROM register WHERE reg_number='$userid'";
                                                                    $con = mysqli_query($conn, $gender);
                                                                    $roll = mysqli_fetch_assoc($con);
                                                                    if($roll['gender'] == 'female'){
                                                                        echo "
                                                                        <select name='hostel' class='form-control'> 
                                                                        <option value='Delimin'>Delimin</option>
                                                                        <option value='MainHall'>Main-Hall</option>
                                                                        <option value='NewHostel'>New-Hostel</option>
                                                                </select>
                                                            </div>
                                                                <div class='text-center'>
                                                                        <h6 class='text-primary'>Select Phase</h6>
                                                                        <select name='phase' class='form-control'> 
                                                                            <option value='Main Hall Phase 1'>Main Hall Phase 1</option>
                                                                            <option value='Main Hall Phase 2'>Main Hall Phase 2</option>
                                                                            <option value='New Hostel Phase 1'>New Hostel Phase 1</option>
                                                                            <option value='New Hostel Phase 2'>New Hostel Phase 2</option>
                                                                            <option value='Delimin'>Delimin</option>
                                                                      </select>
                                                                </div>
                                                                        ";
                                                                    } else {
                                                                        echo "
                                                                        
                                                                        <select name='hostel' class='form-control'> 
                                                                        <option value='Mande'>Mande</option>
                                                                        <option value='MainHall'>Main-Hall</option>
                                                                        <option value='NewHostel'>New-Hostel</option>
                                                                </select>
                                                            </div>
                                                                <div class='text-center'>
                                                                        <h6 class='text-primary'>Select Phase</h6>
                                                                        <select name='phase' class='form-control'> 
                                                                            <option value='Main Hall Phase 1'>Main Hall Phase 1</option>
                                                                            <option value='Main Hall Phase 2'>Main Hall Phase 2</option>
                                                                            <option value='New Hostel Phase 1'>New Hostel Phase 1</option>
                                                                            <option value='New Hostel Phase 2'>New Hostel Phase 2</option>
                                                                            <option value='Mande'>Mande</option>
                                                                      </select>
                                                                </div>                                                                        
                                                                        ";
                                                                    }
                                                                    ?>
                                                                   
                                                              <div class='text-center'>
                                                                 <h6 class='text-primary text-center'>Enter Room Number</h6>
                                                                 <input type='number' name='hostelNum' value='1'class='form-control'>
                                                              </div>
                                                  <input type="submit" name="apply" value="Apply!" class="btn btn-primary mt-4 btn-user btn-block">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>

                    <div class="row">


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