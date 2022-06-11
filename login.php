<?php  
    include './admin/config.php';

    if(isset($_POST['login'])){
      $email=$_POST['email'];
      $pwd=$_POST['password'];
      // $Role=$_POST['role'];


      $sql="SELECT * FROM users WHERE email='$email' AND password='$pwd'";
      $result=mysqli_query($con,$sql);

      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

           session_start();
          $_SESSION['user'] = $row['fullname'];
          if($row['role']=="admin"){
            header('location:./admin/dashboard.php');
          }
          if($row['role']=="customer"){
            echo "customer login";
          }

          }

        }
        else{
          echo "login failed";
        }
      }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="dist/css/style.min.css" />
  <title>Madhyapur Restro</title>
</head>

<body>
  <div class="main-container">
    <?php include 'navbar.php'; ?>
  </div>

  <header>
    <div class="container">
      <div class="container__form">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
         
          <h2>Login</h2>
          <label>Email</label><br />
          <input type="email" name="email" /><br />
          <label>Password</label><br />
          <input type="password" name="password" /><br />
         <!-- <label>Role:</label><br>
         <input type="radio" name="role" value="admin">admin
          <input type="radio" name="role" value="customer">customer <br> -->

          <input type="submit" name="login" value="login" />
        </form>

        <p>
          Don't Have An Account?
          <span><a href="register.php">Register Now</a></span>
        </p>
      </div>
      <img src="food.jpg" alt="food" />
    </div>
  </header>
  <?php include 'footer.php'; ?>
</body>

</html>