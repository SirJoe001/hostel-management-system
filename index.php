<?php 
 session_start();
 require_once('connection/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Home page</title>
</head>
<body>
    <div class="container-fluid index-container">
        <div class="col-md-12">
            <div class="row">
                <!-- logo -->
                <div class="col-md-6 text-center">
                <div class="col-md-12">
                    <div class="row">
                        <img src="images/nas.png" alt="" height="200" width="200">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <h1 class="text-success school-name">Nasarawa State University Keffi</h1>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <h1 class="text-primary project-name">Hostel Allocation Management System</h1>
                    </div>
                </div>
                </div>
                <!-- logo end -->
                <div class="col-md-1"></div>
                <?php 
                    if (isset($_POST['login'])) {

                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $error = array();
                        
                        if (empty($username)) { 
                            $error['msg'] = "Enter Username";
                        } else if (empty($password)) {
                            $error['msg'] = "Enter Password"; 
                        }
                        $quey = "SELECT * FROM login WHERE register_number='$username' AND password='$password'";
                        $sql = mysqli_query($conn, $quey);
                        $fetch = mysqli_fetch_array($sql);

                        if ($fetch) {
                            if($fetch['role'] == 1){
                                $_SESSION['id'] = $fetch['register_number'];
                                $_SESSION['check'] = 1;
                                header("Location: admin/index.php");
                            } else if ($fetch['role'] == 2) {
                                $_SESSION['id'] = $fetch['register_number'];
                                $_SESSION['check'] = 1;
                                header("Location: students/index.php");
                            }
                        }
                    }
                ?>
        <!-- the form div start here -->
                <div class="col-md-5 form">
                <div class="col-md-12 jumbotron login-form">
                    <div class="row">
                        <form action="" method="POST" class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <h2 class="text-primary text-center">Login</h2>
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Registration Number</label>   
                                <input type="text" name="username" class="form-control" placeholder="Enter Reg Number">
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Registration Password</label>   
                                <input type="password" name="password" class="form-control" placeholder="Enter Reg Password">
                                </div>
                            </div>
                            <div class="col-md-12 input">
                            <div class="row">
                            <input type="submit" class="btn btn-info" name="login" value="Sign In">
                            </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <h5 class="text-primary">Don't have account? <a href="reg.php"><span class="text-success"> Register</span></a></h5>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                
        <!-- the form div ends here -->
            </div>
        </div>
    </div>
</body>
</html>