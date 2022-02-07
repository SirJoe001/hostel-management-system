<?php 
session_start();
include("../connection/db.php");
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
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <?php if (isset($_GET['ms'])) {
                               $ms = $_GET['ms'];
                               $show = "<span class='text-success'>Approved</span>";
                            } else {
                                $show = '';
                            }
                            ?>
                            <h6 class="m-0 font-weight-bold text-primary">Applicants Details <?php echo $show; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <?php
                                    $sql = "SELECT * FROM applications";
                                    $query = mysqli_query($conn, $sql);
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th >Name</th>
                                            <th>Registeration Number</th>
                                            <th>Hostel</th>
                                            <th>Phase</th>
                                            <th>Room Number</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                       <tr>
                                           <th >Name</th>
                                            <th>Registeration Number</th>
                                            <th>Hostel</th>
                                            <th>Phase</th>
                                            <th>Room Number</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($query)) { ?>
                                        <tr>
                                            <td><?php echo $row['student']; ?></td>
                                            <td><?php echo $row['reg_number']; ?></td>
                                            <td><?php echo $row['hostel']; ?></td>
                                            <td><?php echo $row['phase']; ?></td>
                                            <td><?php echo $row['room_number']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td style="display: flex;"><a href="approve.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success">Approve</button></a>
                                            <a  class="ml-3" href="reject.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Remove</button></a></td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>





