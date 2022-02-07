<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="reg.css">
    <title>Register</title>
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
        <!-- the form div start here -->
        <?php 
        $userReg = '';
        $username = '';
        $gender = '';
        $department = '';
        $level = '';
        $state = '';
        $phone = '';
        $addy = '';
        $parentName = '';
        if($_POST > 0){
            extract($_POST);

        }
        ?>
<?php 
require_once("connection/db.php");
              
require_once("connection/db.php");
if(isset($_POST['submit'])){
    $userReg = $_POST['userReg'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $level = $_POST['level'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];
    $addy = $_POST['addy'];
    $parentName = $_POST['parentName'];
    $password = $_POST['password'];

    $error = array();

    if (empty($userReg)) {
        $error['msg'] = "Please Enter Your Registration Number";
    }
    else if (empty($username)) {
        $error['msg'] = "Please Enter Your Username";
    }
    else if (empty($gender)) {
        $error['msg'] = "Please Select Gender";
    }
    else if (empty($department)) {
        $error['msg'] = "Please Enter Department";
    }
    else if (empty($level)) {
        $error['msg'] = "Please Select Level";
    }
    else if (empty($state)) {
        $error['msg'] = "Please Enter Your State Name";
    }
    else if (empty($phone)) {
        $error['msg'] = "Please Enter Your Phone Number";
    }
    else if (empty($addy)) {
        $error['msg'] = "Please Enter Your Guidiance Address";
    }
    else if (empty($parentName)) {
        $error['msg'] = "Please Enter Your Guidiance Name";
    }
    else if (empty($password)) {
        $error['msg'] = "Please Enter Your Password";
    }
    $succ = array();
   if (count($error) == 0){
        $sql = "INSERT INTO register (student_name, gender, department, level, state, phone_number, address, parent_name,reg_number) 
                VALUES ('$username','$gender', '$department','$level','$state','$phone','$addy','$parentName','$userReg')";
         $query = mysqli_query($conn, $sql);    
         
         if ($query) {
             $ql = "INSERT INTO login (register_number, password, role) VALUES ('$userReg','$password',2)";
             $qq = mysqli_query($conn, $ql);
            $succ['say'] = "Registration Successful";
         } else {
             $error['msg'] = "Registration Failed";
         }

   }
}
if (isset($error['msg'])) {
    $m = $error['msg'];
    $show = "<h6 class='alert alert-danger text-center'>$m</h6>";
} else {
    $show = "";
}
if (isset($succ['say'])) {
    $bol = $succ['say'];
    $disp = "<h6 class='alert alert-success'>$bol</h6>";
} else {
    $disp = '';
}
?>
       

                <div class="col-md-5 form">
                <div class="col-md-12 jumbotron login-form">
                    <div class="row">
                        <form action="" method="POST" class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <h2 class="text-primary text-center">Register</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <?php 
                                        echo $show; 
                                        echo $disp;
                                     ?>
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Registration Number</label>   
                                <input type="text" name="userReg" value="<?=$userReg ?>" class="form-control" placeholder="Enter Reg Number">
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Student Name</label>   
                                <input type="text" name="username" value="<?=$username ?>" class="form-control" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Gender</label>   
                               <select name="gender" id="" class="form-control" value="<?=$gender ?>">
                                   <option value="male">Male</option>
                                   <option value="female">Female</option>
                               </select>
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Department</label>   
                                <input type="text" value="<?=$department ?>" name="department" class="form-control" placeholder="Enter Department">
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Level</label>   
                               <select name="level" id="" value="<?=$level ?>" class="form-control">
                                   <option value="100">100</option>
                                   <option value="200">200</option>
                                   <option value="100">300</option>
                                   <option value="200">400</option>
                                   <option value="100">500</option>
                                   <option value="200">600</option>
                                   <option value="100">700</option>
                               </select>
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">State</label>   
                                <input type="text" name="state" value="<?=$state ?>" class="form-control" placeholder="Enter Reg State">
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Phone Number</label>   
                                <input type="text" name="phone" value="<?=$phone ?>" class="form-control" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Guidance Address</label>   
                                <input type="text" name="addy" value="<?=$addy ?>" class="form-control" placeholder="Guidance Address">
                                </div>
                            </div>
                            <div class="col-md-12 input">
                                <div class="row">
                                 <label for="">Name of Guidiance</label>   
                                <input type="text" name="parentName" value="<?=$parentName ?>" class="form-control" placeholder="Parent or Guidiance Name">
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
                            <input type="submit" class="btn btn-info" name="submit" value="Sign Up">
                            </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <h5 class="text-primary">Already have account? <a href="index.php"><span class="text-success"> Login</span></a></h5>
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