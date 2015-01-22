<?php
session_start();
	include "conn.php";
	
	$active_student = $_SESSION['email'];
    
    $teacher_code_sql = "SELECT teacher_code FROM student WHERE email='$active_student'";
    $teacher_code_result = mysqli_query($cxn,$teacher_code_sql);
    $teacher_code_fetch = mysqli_fetch_assoc($teacher_code_result);
    
    $teacher_code = $teacher_code_fetch['teacher_code'];

	$comment = $_POST['comment'];

	$destination ='C:\xampp\htdocs\BBO\assignment-attachment'."\\".$_FILES['attachment']['name'];
	$temp_file = $_FILES['attachment']['tmp_name'];
	$path = $_FILES['attachment']['name'];

	move_uploaded_file($temp_file,$destination);

	$sql = "INSERT INTO assignment (inst_ID, teacher_code, email_student, comment, attachment, uploadedDate) 
			VALUES ('$inst_ID', '$teacher_code', '$email', '$comment', '$path', NOW())"
	$res = mysqli_query($cxn,$sql);
?>