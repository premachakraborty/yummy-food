<?php
require "./include/header.php";
           ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">WELCOME <?= $_SESSION['author']['firstname']. ' ' . $_SESSION['author']['lastname']?></h1>

           <?php
require "./include/footer.php";
           ?>