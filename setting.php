<?php session_start(); ?>
<html>
<head>
	<title>Setting | BIMBO</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/ownstyle.css">
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body class="latar">
	<?php include "navbar.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Setting</h2>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-7">
                    <h4>Account</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>
                                <button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-pencil"></i>
                                </button>&nbsp;Personal Information !
                            </div><br>
                            <div class="col-lg-12">
                                <form role="form" method="POST" action="">
                                    <div class="form-group form-inline">
                                        <input type="text" class="form-control" id="" style="height:39px" placeholder="Firstname" name="firstname" />
                                        <input type="text" class="form-control" id="" style="height:39px" placeholder="Lastname" name="lastname" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-lg" style="float:right;background-color:#18bc9c" value="Save" name="save-name">
                                    </div>
                                </form>
                                <?php 
                                    if(isset($_POST['save-name'])){
                                        $firstname = $_POST['firstname'];
                                        $lastname = $_POST['lastname'];

                                        if(strcmp($_SESSION['user_type'], "student") == 0){
                                            $sql = "UPDATE student SET first_name='$firstname', last_name='$lastname' WHERE email='$email'";
                                            $res = mysqli_query($cxn,$sql);

                                        } else if(strcmp($_SESSION['user_type'], "teacher") == 0){
                                            $sql = "UPDATE teacher SET first_name='$firstname', last_name='$lastname' WHERE email='$email'";
                                            $res = mysqli_query($cxn,$sql);
                                        }
                                        echo '<p>User information changed successfully</p>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-5">
                    <h4>Security</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>
                                <button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-pencil"></i>
                                </button>&nbsp;Password!
                            </div><br>
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="" style="height:39px" placeholder="Current Password" name="password" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="" style="height:39px" placeholder="New Password" name="password_new" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="" style="height:39px" placeholder="Retype Password" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg" style="float:right;background-color:#18bc9c" value="Save" name="save-acc">
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['save-acc'])){
                                    $password_old = md5($_POST['password']);
                                    $password_new = md5($_POST['password_new']);

                                    if(strcmp($_SESSION['user_type'], "student") == 0){
                                        $sql = "SELECT * FROM student WHERE email='$email'";
                                        $res = mysqli_query($cxn,$sql);
                                        $fetch = mysqli_fetch_assoc($res);
                                        $password_saved = $fetch['password'];

                                        if(strcmp($password_old, $password_saved) == 0){
                                            $change = "UPDATE student SET password='$password_new' WHERE email='$email'";
                                            $res_change = mysqli_query($cxn,$change);
                                            echo '<p>Password changed successfully</p>';
                                        } else {
                                            echo "old password didn't match, Try again";
                                        }
                                    }
                                    else if(strcmp($_SESSION['user_type'], "teacher") == 0){
                                        $sql = "SELECT * FROM teacher WHERE email='$email'";
                                        $res = mysqli_query($cxn,$sql);
                                        $fetch = mysqli_fetch_assoc($res);
                                        $password_saved = $fetch['password'];

                                        if(strcmp($password_old, $password_saved) == 0){
                                            $change = "UPDATE teacher SET password='$password_new' WHERE email='$email'";
                                            $res_change = mysqli_query($cxn,$change);
                                            echo '<p>Password changed successfully</p>';
                                        } else {
                                            echo "old password didn't match, Try again";
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h4>Account</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>
                                <button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-pencil"></i>
                                </button>&nbsp;University & Photo !
                            </div><br>
                            <div class="col-lg-7">
                                <form role="form" method="POST" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="" style="height:39px" placeholder="University" name="univ_new" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-lg" style="float:right;background-color:#18bc9c" value="Save" name="save-univ" />
                                    </div>
                                    
                                </form>
                                <?php
                                    if(isset($_POST['save-univ'])){
                                        $univ_new = $_POST['univ_new'];
                                        if(strcmp($_SESSION['user_type'], "student") == 0){
                                            $sql = "UPDATE student SET university='$univ_new' WHERE email='$email'";
                                            $res = mysqli_query($cxn,$sql);
                                            echo '<p>University changed successfully</p>';
                                        } else if(strcmp($_SESSION['user_type'], "teacher") == 0){
                                            $sql = "UPDATE teacher SET university='$univ_new' WHERE email='$email'";
                                            $res = mysqli_query($cxn,$sql);
                                            echo '<p>University changed successfully</p>';
                                        }
                                    }
                                ?>
                            </div>
                            <div class="col-lg-4 verticalLine">
                                <?php
                                    $check = "SELECT * FROM photo_profile_path WHERE email='$email'";
                                    $res_check = mysqli_query($cxn,$sql);
                                    if(mysqli_num_rows($res_check) == 0){
                                        echo '<center style="width: 300px;"><img src="img/student.png" class="imgsize profil thumbnail"><br></center>';
                                    } else if (mysqli_num_rows($res_check) > 0){
                                        $fecth = mysqli_fetch_assoc($res_check);
                                        $photo = $fecth['path'];
                                        echo '<center style="width: 300px;"><img src="photo-file/'.$photo.'" class="imgsize profil thumbnail"><br></center>';
                                    }
                                ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <center><span class="btn btn-primary btn-file"><input type="file" value="photo-profile" name="photo-profile"/>Choose photo</span></center>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-lg" style="float:right;background-color:#18bc9c" value="Save" name="save-photo" />
                                    </div>
                                </form>
                                <?php
                                if(isset($_POST['save-photo'])){
                                    $check = "SELECT * FROM photo_profile_path WHERE email='$email'";
                                    $res = mysqli_query($cxn,$check);

                                    if(mysqli_num_rows($res) == 0){
                                        $destination ='C:\xampp\htdocs\BBO\photo-file'."\\".$_FILES['photo-profile']['name'];
                                        $temp_file = $_FILES['photo-profile']['tmp_name'];
                                        $path = $_FILES['photo-profile']['name'];

                                        move_uploaded_file($temp_file,$destination);

                                        $sql = "INSERT INTO photo_profile_path (email, path) VALUES ('$email', '$path')";
                                        $res = mysqli_query($cxn,$sql);

                                        echo '<p class="pull-right">photo profil updated</p>';
                                    } else if (mysqli_num_rows($res) > 0){

                                        $destination ='C:\xampp\htdocs\BBO\photo-file'."\\".$_FILES['photo-profile']['name'];
                                        $temp_file = $_FILES['photo-profile']['tmp_name'];
                                        $path = $_FILES['photo-profile']['name'];

                                        move_uploaded_file($temp_file,$destination);

                                        $sql = "UPDATE photo_profile_path SET path='$path' WHERE email='$email'";
                                        $res = mysqli_query($cxn,$sql);
                                        echo '<p class="pull-right">photo profil updated</p>';
                                    }
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
</body>
</html>