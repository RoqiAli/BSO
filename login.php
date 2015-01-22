<?php
	session_start();
	include "conn.php";

	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM teacher WHERE email='$email'";
	$result_teacher = mysqli_query($cxn,$sql);
	$num_teacher = mysqli_num_rows($result_teacher);

	$sql1 = "SELECT * FROM student WHERE email='$email'";
	$result_student =mysqli_query($cxn,$sql1);
	$num_student = mysqli_num_rows($result_student);

	if($num_teacher > 0){ // email ditemukan di tabel teacher
		$sqlpass_teacher = "SELECT * FROM teacher WHERE email='$email' AND password='$password'";
		$result_teacher2 = mysqli_query($cxn,$sqlpass_teacher);
		$numresult_teacher = mysqli_num_rows($result_teacher2);

			if($numresult_teacher > 0) { //password benar
				$_SESSION['auth']="yes";
				$_SESSION['email'] = $email;
				$_SESSION['user_type'] = "teacher";
				$sql = "INSERT INTO Login (email,loginTime)
				VALUES ('$_SESSION[logname]',NOW())";
				$result_login = mysqli_query($cxn,$sql);
				header("Location: dashboard.php");
			} else { //password tidak cocok
				echo "password tidak cocok";
			}
	} else if ($num_student > 0){ //email ditemukan di tabel student
		$sqlpass_student = "SELECT * FROM student WHERE email='$email' AND password='$password'";
		$result_student2 = mysqli_query($cxn,$sqlpass_student);
		$num_result_student2 = mysqli_num_rows($result_student2);

			if($num_result_student2 > 0) { //password benar
				$_SESSION['auth']="yes";
				$_SESSION['email'] = $email;
				$_SESSION['user_type'] = "student";
				$sql = "INSERT INTO Login (email,loginTime)
				VALUES ('$_SESSION[logname]',NOW())";
				$result_login = mysqli_query($cxn,$sql);
				header("Location: dashboard.php");
			} else { //password tidak cocok
				echo "password tidak cocok";
		}
	}
?>