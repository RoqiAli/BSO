<?php 
    session_start();
    include "conn.php";
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM teacher WHERE email='$email'";
        $result = mysqli_query($cxn,$sql);
        $name = mysqli_fetch_assoc($result);
        $first_name = $name['first_name'];
        $last_name = $name['last_name'];
        $teacher_code = $name['teacher_code'];
?>

<html>
<head>
    <title><?php echo $first_name." ".$last_name; ?> | BIMBO</title>
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
        <?php include "teacher-profile-banner.php"; ?>
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar-teacher-profile.php"; ?>
            </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div>
                                        <button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Attachment File"><i class="fa fa-pencil"></i>
                                                    </button>&nbsp;Complete Your Profile !
                                    </div><br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;Photo Profile</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <center>
                                                            <img src="img/student.png" class="imgsize profil thumbnail"><br>
                                                            <form class="form-group" enctype="multipart/form-data" action="photo-profile-upload.php" method="POST">
                                                                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                                                                <input type="file" value="photo-profile" name="photo-profile">
                                                                <input type="submit" class="btn btn-primary" value="Upload" name="Upload"/>
                                                            </form>
                                                        </center>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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