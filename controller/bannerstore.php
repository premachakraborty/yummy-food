<?php
session_start();
include "../database/include.php";

if (isset($_POST['submit'])) {
$request= $_POST;



$title=$request['title'];
$video=$request['video'];
$description=$request['description'];
$img= $_FILES['img'];
$extension=pathinfo($img['name'])['extension'];
$allow_extension= ['jpg','png'];
//var_dump($img);
 //exit();


$error=[];
if (empty($title)) {
	$error['title']= "Enter a Banner Title";
}
if (empty($video)) {
	$error['video']= "Enter a Banner Video";
}
if (empty($description)) {
	$error['description']= "Enter a Banner Description";
}
if ($img['size']==0) {
	$error['img']= "Enter a Banner Image";
}elseif (in_array($extension, $allow_extension) == false) {
	$error['img']= "Enter a Jpg or Png Format Image";
}





if (count($error) > 0) {
	$_SESSION['error']= $error;
	header("location: ../back/addbanner.php");
}else{
	$newimg= "Img-". uniqid().'.'. $extension;
	 $upload= move_uploaded_file($img['tmp_name'], "../upload/banners/$newimg");
if ($upload) {
	$query= "INSERT INTO banners(title, video, description, img) VALUES ('$title','$video','$description','$newimg')";

	$store=mysqli_query($conn,$query);
	if ($store) {
		header("location:../back/addbanner.php");
	}
}
}
}