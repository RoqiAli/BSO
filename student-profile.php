<?php session_start();
include "conn.php";
$email = $_SESSION['email'];
$sql = "SELECT * FROM student WHERE email='$email'";
    $result = mysqli_query($cxn,$sql);
    $name = mysqli_fetch_assoc($result);
    $first_name = $name['first_name'];
    $last_name = $name['last_name'];
    $teacher_code = $name['teacher_code'];

$qry = "SELECT first_name, last_name FROM teacher WHERE teacher_code='$teacher_code'";
$qry_result = mysqli_query($cxn,$qry);
$fetch = mysqli_fetch_assoc($qry_result);
$teacher_first_name = $fetch['first_name'];
$teacher_last_name = $fetch['last_name'];
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
		<?php include "student-profile-banner.php" ?>
		<div class="row">
			<div class="col-md-3">
                <?php include "sidebar-student-profile.php" ?>
                </div>
				<div class="col-md-9">
					<div class="row">
                        <div class="col-md-12">
                        	<div class="panel panel-default">
                            	<div class="panel-body">
                            		<div>
                                    	<button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Attachment File"><i class="fa fa-pencil"></i>
                                                    </button>&nbsp;Your Title !
									</div><br>
									<form role="form" method="POST" action="updatetitle.php">
										<div class="form-group">
											<input type="text" class="form-control" id="judul" name="judul" style="height:39px" placeholder="Please First Input Your Title" />
										</div>
										<div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-lg" value="Submit" style="float:right;background-color:#18bc9c"/>
                                        </div>
									</form>
                            	</div>
                        	</div>
                    	</div>
                	</div>
                    <div class="row">
                        <div class="col-md-12">
                        	<div class="panel panel-default">
                            	<div class="panel-body">
                                	<div>
                                    	<button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Attachment File"><i class="fa fa-heart"></i>
                                        </button>&nbsp;Your Progress !
									</div><br>
									<div class="progress">
                                        <?php
                                            include "conn.php";
                                            $sql = "SELECT assignment.ass_ID, instruction.inst_ID 
                                                    FROM assignment
                                                    INNER JOIN instruction
                                                    ON assignment.inst_ID=instruction.inst_ID
                                                    WHERE assignment.accepted=1
                                                    AND instruction.status=1
                                                    AND assignment.email_student = '$email'";
                                            $res = mysqli_query($cxn,$sql);
                                            $progress = mysqli_num_rows($res)*10;
                                        
  											echo '<div class="progress-bar" role="progressbar" aria-valuenow="'.$progress.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress.'%;">
    										'.$progress.'%
  											</div>';
                                        ?>
                               		</div>
                            	</div>
                        	</div>
                    	</div>
                	</div>
                	<div class="row">
                        <div class="col-md-12">
                        	<div class="panel panel-default">
                            	<div class="panel-body">
                                	<div>
                                    	<button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Attachment File"><i class="fa fa-user"></i>
                                                    </button>&nbsp;Your Teacher !
									</div><br>
									<div class="row">
										<div class="col-md-3">
                                            <?php
                                                $teacher = "SELECT email FROM teacher WHERE teacher_code='$teacher_code'";
                                                $res = mysqli_query($cxn,$teacher);
                                                $fetch = mysqli_fetch_assoc($res);
                                                $email_teacher = $fetch['email'];

                                                $photo_teacher = "SELECT path from photo_profile_path WHERE email='$email_teacher'";
                                                $photo_res = mysqli_query($cxn,$photo_teacher);
                                                $photo_fetch = mysqli_fetch_assoc($photo_res);
                                                $photo = 'photo-file/'.$photo_fetch['path'];
                                            ?>
    										<a href="#" class="profil thumbnail">
      											<?php echo '<img src="'.$photo.'" class="imgAvaContainer" alt="...">'; ?>
   	 										</a>
  										</div>
  										<div class="col-md-3">
    										<h5><?php echo $teacher_first_name." ".$teacher_last_name;?></h5>
    										<p>Code : <?php echo $teacher_code;?></p>
  										</div>
  									</div>
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
	<script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/freelancer.js"></script>
</body>
</html>