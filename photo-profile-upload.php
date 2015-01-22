<?php
	session_start();
	include "conn.php";

	$email = $_SESSION['email'];
	$check = "SELECT * FROM photo_profile_path WHERE email='$email'";
	$res = mysqli_query($cxn,$check);
	$fecth = mysqli_fetch_assoc($res);
	$is_have_photo = $fecth['have_photo'];

	if($is_have_photo == 0){
		$destination ='C:\xampp\htdocs\BBO\photo-file'."\\".$_FILES['photo-profile']['name'];
		$temp_file = $_FILES['photo-profile']['tmp_name'];
		$path = $_FILES['photo-profile']['name'];

		move_uploaded_file($temp_file,$destination);

		$sql = "INSERT INTO photo_profile_path (email, path) VALUES ('$email', '$path')";
		$res = mysqli_query($cxn,$sql);

		header("location:teacher-profile.php");
	} else if ($is_have_photo == 1){

		$destination ='C:\xampp\htdocs\BBO\photo-file'."\\".$_FILES['photo-profile']['name'];
		$temp_file = $_FILES['photo-profile']['tmp_name'];
		$path = $_FILES['photo-profile']['name'];

		move_uploaded_file($temp_file,$destination);

		$sql = "UPDATE photo_profile_path SET path='$path' WHERE email='$email'";
		$res = mysqli_query($cxn,$sql);
		header("location:teacher-profile.php");
	}
?>