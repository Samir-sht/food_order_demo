<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header ('location:../index.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dashboard</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container-fluid dashboard font">
      <div class="row min-vh-100">
        <div class="col-sm-2  px-4 ">
          <h5 class="text-white text-uppercase pt-4 mb-2 underline">Food Ordering System</h5>
          <nav class="">
            <ul>
              <li><a href="dashboard.php" class="font active">Dashboard</a></li>
              <li><a href="food.php">Food</a></li>
              <li><a href="#">Orders</a></li>
              <li><a href="#">Customer Details</a></li>
              <li><a href="#">Users</a></li>
              <li><a href="../logout.php">logout</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-sm-10 p-3">
          <div class="row">
            <h5 class="text-end h5 fw-normal p-2">Welcome <?php echo $_SESSION['user'];?></h5>
            <hr>
          </div>
        <p class="text-capitalize">welcome to dashboard</p>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
