<?php

include "./include/header.php";
include "../database/include.php";
$query= "SELECT * FROM banners";
$data=mysqli_query($conn,$query);
$banners= mysqli_fetch_all($data,1);
//print_r($banners);



?>


<h1>All Banner</h1>
<table class="table w-100">
	<tr>
		<th>#</th>
		<th>Banner Title</th>
		<th>Banner Description</th>
		<th>Banner Image</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<?php
	foreach ($banners as $key=>$banner) {
		?>
	<tr>
		<td><?= ++$key ?></td>
		<td><?= $banner['title']?></td>
		<td><?= $banner['description']?></td>
		<td>
			<img src="<?= "../upload/banners/". $banner['img']?>" alt="" style="height: 100px">
		</td>
		<td>
			<span class="badge <?= $banner['status'] == 0? 'bg-danger' : 'bg-warning' ?> text-light"><?= $banner['status'] == 0? 'De-Active' : 'Active' ?></span>
		</td>
		<td>
			<a href="../controller/bannerupdate.php?id=<?=$banner['id']  ?>" class="btn btn-dark">
			<?= $banner['status'] != 0? 'De-Active' : 'Active' ?>
				
			</a>
				<a href="#" class="btn btn-primary">Edit</a>
				<a href="../controller/deletebanner.php?id=<?= $banner['id']?>" class="btn btn-success deletebanner">Delete</a>


		</td>
	</tr>
	<?php
	}


	?>
	

</table>


<?php

include "./include/footer.php";



?>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

let dltbanner=	document.querySelectorAll(".deletebanner");
console.log(dltbanner);

for(i=0;i<dltbanner.length;i++){
	dltbanner[i].addEventListener('click',function(e){
	e.preventDefault();
	let url=e.target.href


	Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
  	window.location=url
    //Swal.fire(
     // 'Deleted!',
      //'Your file has been deleted.',
     // 'success'
   // )
  }
})
});

	console.log('hui' +i);
}








	</script>