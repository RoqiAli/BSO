<?php
session_start();
	include "conn.php";
		$title = $_POST['title'];
		$dueDate = $_POST['dueDate'];
		$des = $_POST['des'];
		$lock = $_POST['lock'];
		$teacher_email = $_SESSION['email'];
		$link = $_POST['link'];

		$teacher_code_qry = "SELECT teacher_code FROM teacher WHERE email='$teacher_email'";
		$teacher_code_qry_result = mysqli_query($cxn,$teacher_code_qry);
		$teacher_code_fetch = mysqli_fetch_assoc($teacher_code_qry_result);
		$teacher_code = $teacher_code_fetch['teacher_code'];

		$destination ='C:\xampp\htdocs\BBO\instruction-attachment'."\\".$_FILES['attachment']['name'];
		$temp_file = $_FILES['attachment']['tmp_name'];
		$attachment = $_FILES['attachment']['name'];

		move_uploaded_file($temp_file,$destination);

		$sql = "INSERT INTO instruction (teacher_code, judul, description, attachment, uploadedDate, dueDate, status) VALUES ('$teacher_code', '$title', '$des', '$attachment', NOW(), '$dueDate', '$lock')";
		$res = mysqli_query($cxn,$sql);

		
		header("Location: dashboard.php");
?>