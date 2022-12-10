<?php

session_start();
include "../database/include.php";


if (isset($_POST['submit'])) {
	$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$email= $_POST['email'];
$password= $_POST['password'];
$confirmpassword= $_POST['confirm_password'];
$encrypt_password=sha1($password);




	



$error=[];
if (empty($firstname)) {
	$error['firstname_error']="Please Provide Your Fullname";
}
if (empty($lastname)) {
	$error['lastname_error']="Please Provide Your Lastname";
}
if (empty($email)) {
	$error['email_error']="Please Provide Your Email Address";
}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

	$error['email_error']="Please Provide Your Validate Email Address";

}
if (empty($password)) {
	$error['password_error']="Please Provide Your Password";
}
if (empty($confirmpassword)) {
	$error['confirm_password_error']="Please Provide Confirm Password";
}elseif ($password !== $confirmpassword) {
		$error['confirm_password_error']="Password do not match";
}

if (count($error)>0) {
	$_SESSION['error']= $error;
	header("location: ../back/register.php");
}else{
	$query="INSERT INTO user(firstname, lastname, email, password) VALUES ('$firstname','$lastname','$email','$encrypt_password')";
	$store= mysqli_query($conn,$query);
	if ($store) {
			$_SESSION['success'] = "Successfully Registered";

	header("location: ../back/login.php");

}
}

}
?>