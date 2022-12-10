<?php
$id= $_GET['id'];
include "../database/include.php";
$query= "SELECT id,status FROM banners WHERE id='$id' ";
$data= mysqli_query($conn,$query);
$banner=mysqli_fetch_assoc($data);

if ($banner['status']==0) {
	$query= "UPDATE banners SET status='1' WHERE id='$id'";
}else{
	$query= "UPDATE banners SET status='0' WHERE id='$id'";
}
mysqli_query($conn,$query);
header("location:../back/allbanner.php");