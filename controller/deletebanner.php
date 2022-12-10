<?php

$id= $_GET['id'];
include "../database/include.php";
$query= "SELECT img FROM banners WHERE id= '$id' ";
$data=mysqli_query($conn,$query);
$banner=mysqli_fetch_assoc($data);
$path= "../upload/banners/" . $banner['img'];

if (file_exists($path)) {
	unlink($path);
}
$query= "DELETE FROM banners WHERE id='$id'";
$data=mysqli_query($conn,$query);

if ($data) {
	header("location:../back/allbanner.php");
}

