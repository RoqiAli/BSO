<?php
include "conn.php";

$university = $_POST['university'];
$sex = $_POST['sex'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$teacher_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,5);

$query = "INSERT INTO teacher (university,sex,first_name,last_name,email,password,teacher_code)
	VALUES ('$university','$sex','$first_name','$last_name','$email','$password','$teacher_code')";
	$result = mysqli_query($cxn,$query);

	header("location:teacher-profile.php");
?>