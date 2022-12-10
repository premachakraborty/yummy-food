<?php

session_start();
include "../database/include.php";

if (isset($_POST['login'])) {
$email = $_POST['email'];
$password = $_POST['password'];
$pass_encrypt= sha1($password);




$error= [];

if (empty($email)) {
	$error['email'] = "Please Provide Your Email Address ";
}
if (empty($password)) {
	$error['password'] = "Please Provide Your passsword ";
}

if (count($error)>0) {
	$_SESSION['error']= $error;
	header("location: ../back/login.php");
}else{

$query=" SELECT * FROM user WHERE email = '$email'";
$data= mysqli_query($conn,$query);


if (mysqli_num_rows($data)>0) {
	$query= "SELECT * FROM `user` WHERE email = '$email' AND password= '$pass_encrypt' ";
	$data= mysqli_query($conn,$query);
	if (mysqli_num_rows($data)>0) {
		$author= mysqli_fetch_assoc($data);
		$_SESSION['author']= $author;
		header("location:../back/dashboard.php");
		
	}else{
		$_SESSION['error']['password'] = "Wrong password";
		header("location:../back/login.php");

	}

}else{
		$_SESSION['error']['email'] = "Email Address Not Found ";
		header("location:../back/login.php");
}


}
}


















