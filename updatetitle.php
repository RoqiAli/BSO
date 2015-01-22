<?php
session_start();
	include "conn.php";
	$judul = $_POST['judul'];
	$email = $_SESSION['email'];

	$qry = "UPDATE student SET judul='$judul' WHERE email='$email'";
	$result = mysqli_query($cxn,$qry);
	header("location:student-profile.php");
?>