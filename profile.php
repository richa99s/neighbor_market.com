<?php

include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['user_email'] ?></title>
    <!-- Bootsrap CSS link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome link-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
     integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- CSS file link-->
     <link rel="stylesheet" href="../style.css">
     <style>
      body{
        overflow-x: hidden;
      }
     </style>
</head>
<body>
    
    <!-- navbar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
              <img src="../images/logo.png" alt="" class="logo">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../display_all.php">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="profile.php">My Account</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-plus"></i><sup><?php cart_item_num(); ?></sup></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                  </li>

                </ul>
                <form class="d-flex"  action="../search_product.php" method="get">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                  <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
              </div>
            </div>
          </nav>


<!-- calling cart function -->
<?php

cart();

?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            
                  <?php

                  if(!isset($_SESSION['user_email'])){
                    echo "<li class='nav-item'>
                          <a class='nav-link' href='#'>Welcome Guest</a>
                          </li>";
                  }else{
                    echo "<li class='nav-item'>
                          <a class='nav-link' href='#'>Welcome ".$_SESSION['user_email']." </a>
                          </li>";
                  }

                  if(!isset($_SESSION['user_email'])){
                    echo "<li class='nav-item'>
                          <a class='nav-link' href='user_login.php'>Login</a>
                          </li>";
                  }else{
                    echo "<li class='nav-item'>
                          <a class='nav-link' href='logout.php'>Logout</a>
                          </li>";
                  }

                  ?>
            </ul>
          </nav>

          <div class="bg-light">
            <h3 class="text-center">Neighbor Market</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
          </div>

          <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
                  </li> 
                  <?php
                  $user_email = $_SESSION['user_email'];
                  $user_image = "SELECT * FROM `user_table` WHERE user_email = '$user_email'";
                  $result_image = mysqli_query($con,$user_image);
                  $row_image = mysqli_fetch_array($result_image);   
                  $user_image = $row_image['user_image'];
                  echo "<li class='nav-item'>
                            <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
                        </li> ";
                  ?>
                  
                  <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">Logout</a>
                  </li> 
                </ul>
            </div>

            <div class="col-md-10 text-center">
              <?php   get_user_order_details();  
                      if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                      }
                      if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                      }
                      if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                      }
                  ?>
            </div>
          </div>

<!-- Footer section -->

          <div class="bg-info p-3 text-center" >
            <p>All rights reserved - Designed by Richa Pandey-2023</p>
          </div>
    </div>




<!-- Bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html> 