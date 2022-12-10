<?php

include "./include/header.php";



?>








<h1>Add Banner</h1>
<div class="card">
	<div class="card-header bg-primary text-light">
		Add New Banner
	</div>
	<div class="card-body">
		<form action="../controller/bannerstore.php" method="POST" enctype="multipart/form-data">

			<div class="row align-items-center">
				<div class="col-lg-3">
					<label for="img">
						<img class="imgplaceholder" src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png" alt=" " style="width: 80%; display: block;">
					</label>
					 <?php
                                                if (isset($_SESSION['error']['img'])) {

                                                    ?>
                                                     <span class="text-danger">
                                                    <?= $_SESSION['error']['img']  ?>
                                                </span>

                                                <?php
                                                }




                                                ?>

					
		
					<input type="file" name="img" class=" d-none inputimg" id="img">
				</div>
				<div class="col-lg-8">
					<label class="w-100">
						Enter A Banner Title<span class="text-danger">*</span>
						<input type="text" name="title" class="form-control">
						 <?php
                                                if (isset($_SESSION['error']['title'])) {

                                                    ?>
                                                     <span class="text-danger">
                                                    <?= $_SESSION['error']['title']  ?>
                                                </span>

                                                <?php
                                                }




                                                ?>

					

					</label>
					<label class="w-100">
						Enter A Banner Video<span class="text-danger">*</span>
						<input type="text" name="video" class="form-control">
						 <?php
                                                if (isset($_SESSION['error']['video'])) {

                                                    ?>
                                                     <span class="text-danger">
                                                    <?= $_SESSION['error']['video']  ?>
                                                </span>

                                                <?php
                                                }




                                                ?>
						

					</label>
					<label class="w-100">
						Enter A Banner Description<span class="text-danger">*</span>
						<textarea name="description" class="form-control"></textarea>
						 <?php
                                                if (isset($_SESSION['error']['description'])) {

                                                    ?>
                                                     <span class="text-danger">
                                                    <?= $_SESSION['error']['description']  ?>
                                                </span>

                                                <?php
                                                }




                                                ?>
						

					</label>
					<button name="submit" class="btn btn-primary float-right">Save Banner</button>
				</div>
			</div>

		</form>
		





	</div>




	</div>

<?php

include "./include/footer.php";
unset($_SESSION['error']);


?>

<script>
	let bannerimg= document.querySelector('.inputimg')
	 let imgplaceholder= document.querySelector('.imgplaceholder')
	bannerimg.addEventListener('change', function(e){
	 let createObjectURL=	window.URL.createObjectURL(e.target.files[0])
	imgplaceholder.src= createObjectURL
	})
	
</script>


