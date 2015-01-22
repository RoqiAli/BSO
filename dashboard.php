<?php session_start(); ?>
<html>
<head>
	<title>Home | BIMBO</title>
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
    <div class="container padlost">
            <div class="row">
                <div class="col-md-3">
                    <?php
                        if(strcmp($_SESSION['user_type'], "student") == 0){
                            include "sidebar-student.php";
                        } else if (strcmp($_SESSION['user_type'], "teacher") == 0){
                            include "sidebar-teacher.php";
                        }
                    ?>
                </div> 
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:30px">
                            <?php
                                if(strcmp($_SESSION['user_type'], "student") == 0){
                                    include "student-taks.php";
                                } else if (strcmp($_SESSION['user_type'], "teacher") == 0){
                                    include "teacher-validate.php";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; BIMBO (Bimbingan Skripsi Online) 2014 
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/freelancer.js"></script>
    <script src="js/expand.js"></script>
</body>
</html>