<?php
session_start();
include "conn.php";

$teacher_code = $_POST['teacher_code'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$check = "SELECT * from teacher WHERE teacher_code='$teacher_code'";
$check_result = mysqli_query($cxn,$check);

$num = mysqli_num_rows($check_result);

if($num > 0) {
	$querystudent = "INSERT INTO student (email, teacher_code, first_name, last_name, password) VALUES ('$email', '$teacher_code', '$first_name', '$last_name', '$password')";
	$resultstudent = mysqli_query($cxn,$querystudent);
	$_SESSION['auth']="yes";
	$_SESSION['email'] = $email;
	$_SESSION['first_name'] = $first_name;
	$_SESSION['last_name'] = $last_name;
	$_SESSION['user_type'] = "student";
	header("location:student-profile.php");
	//page untuk konfirmasi registerasi sukses dan dilanjutkan untuk log in.
} else {
	// page untuk kembali mengulang registeration
	echo "'$teacher_code' tidak ditemukan";
}

header("location:student-profile.php")
?>