<?php session_start(); 
 if (empty($_SESSION['check'])) {
    header("location:../index.php");
    }
include('../connection/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

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

                       
                        <?php
                        $user = $_SESSION['id'];
                        $sql = "SELECT * FROM register WHERE reg_number='$user'";
                        $query = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($query);
                        if ($row['gender'] == 'male') {
                            $sec = "SELECT * FROM applications WHERE reg_number='$user'";
                            $sqk = mysqli_query($conn, $sec);
                            $rf = mysqli_fetch_assoc($sqk);
                            if (!$rf) {
                                $say = "Apply Now";
                                echo "
                                
                                <div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-info shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <div class='text-xs font-weight-bold text-info text-uppercase mb-1'>Boys Hostel Room
                                            </div>
                                            <div class='row no-gutters align-items-center'>
                                                <div class='col-auto'>
                                                    <div class='h5 mb-0 mr-3 font-weight-medium text-gray-800'>$say</div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <i class='fas fa-procedures fa-2x text-gray-300'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                                
                                ";
                            } else {
                                if($rf['status'] != '0'){
                                    $message = "<span class='text-success'>Approved</span>";
                                    } else {
                                        $message = "<span class='text-danger'>Not Approved yet</span>";
                                    }
                             
                            echo "
                            
                            <div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-info shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <div class='text-xs font-weight-bold text-info text-uppercase mb-1'>Boys Hostel Room
                                            </div>
                                            <div class='row no-gutters align-items-center'>
                                                <div class='col-auto'>
                                                    <div class='h5 mb-0 mr-3 font-weight-medium text-gray-800'>$message</div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <i class='fas fa-procedures fa-2x text-gray-300'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ";
                       } } else {
                            $sec = "SELECT * FROM applications WHERE reg_number='$user'";
                            $sqk = mysqli_query($conn, $sec);
                            $row = mysqli_fetch_assoc($sqk);
                            if($row['status'] != '0'){
                                $message = "<span class='text-success'>Approved</span>";
                            } else {
                                $message = "<span class='text-danger'>Not Approved yet</span>";
                            }
                            echo "
                            <div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-info shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <div class='text-xs font-weight-bold text-info text-uppercase mb-1'>Girls Hostel Room
                                            </div>
                                            <div class='row no-gutters align-items-center'>
                                                <div class='col-auto'>
                                                    <div class='h5 mb-0 mr-3 font-weight-medium text-gray-800'>$message</div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <i class='fas fa-procedures fa-2x text-gray-300'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            ";
                        }

                        ?>
                        

                        <!-- Pending Requests Card Example -->
                        <?php 
                        $user = $_SESSION['id'];
                        $sql = "SELECT * FROM register WHERE reg_number='$user'";
                        $query = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($query);
                        $reg = $row['reg_number'];
                        if($row){
                            $check = "SELECT * FROM payment WHERE student='$reg'";
                            $found = mysqli_query($conn, $check);
                            $row = mysqli_fetch_assoc($found);
                            if (!$row) {
                                echo "
                                    <div class='col-xl-3 col-md-6 mb-4'>
                                    <div class='card border-left-warning shadow h-100 py-2'>
                                        <div class='card-body'>
                                            <div class='row no-gutters align-items-center'>
                                                <div class='col mr-2'>
                                                    <div class='text-xs font-weight-bold text-warning text-uppercase mb-1'>
                                                        Payment Status</div>
                                                    <div class='h5 mb-0 font-weight-bold text-gray-800'>
                                                    <span class='text-danger'>Not paied<span>
                                                    </div>
                                                </div>
                                                <div class='col-auto'>
                                                    <i class='fas fa-money-check-alt fa-2x text-gray-300'></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                                ";
                            } else {
                                echo "
                                <div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-warning shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <div class='text-xs font-weight-bold text-warning text-uppercase mb-1'>
                                                Payment Status</div>
                                            <div class='h5 mb-0 font-weight-bold text-gray-800'>
                                            <span class='text-success'>Paid<span>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <i class='fas fa-money-check-alt fa-2x text-gray-300'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                
                                ";
                            }
                        }
                ?>
                        

                    <!-- Content Row -->

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