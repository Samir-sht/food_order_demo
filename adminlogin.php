<?php  
    include './admin/config.php';
    
    $erremail=$errpwd=$error=" ";
    if(isset($_POST['login'])){
      $email=$_POST['email'];
      $pwd=$_POST['password'];
      // $Role=$_POST['role'];

      if(empty($email)){
        // echo ("<script>
        // window.alert('Please Enter Email!!');
        // </script>");
        $erremail="Please Enter  Email!";  
      }
      
       else if((!filter_var($email,FILTER_VALIDATE_EMAIL))){
          // echo ("<script>
          // window.alert('Please Enter Valid Email!!');
          // </script>");
          $erremail="Please Enter valid Email!";  
        }
      

      if(empty($pwd)){
        $errpwd="Please Enter Password!";  
        // echo ("<script>
        
        //     window.alert('Please Enter Password !!');
        //   </script>");
      }
    
    //    else if((strlen($pwd)<8 || strlen($pwd)>25)){
    //     //   echo ("<script>
    //     //   window.alert('Please Enter Password of 8 or more characters!!');
    //     // </script>");
    //     $errpwd="Please Enter Password of 8 or more characters!";  

    //     }
      

      else{
      $sql="SELECT * FROM admin WHERE email='$email' AND password='$pwd'";
      $result=mysqli_query($con,$sql);

      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

           session_start();
          $_SESSION['admin'] = $row['fullname'];
            header('location:./admin/dashboard.php');

          }

        }
        else{
          // echo ("<script>
          //   window.alert('Invalid Email and Password!!!');</script>");
          $error="Invalid Email and Password!";
        
      }
       
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
         
          <h2>Admin Login</h2>
          <div>
          <label>Email</label><br />
          <input type="email" name="email" />
          <div class="formerror"><?php echo $erremail;?></div>
          </div>
          <div>
          <label>Password</label><br />
          <input type="password" name="password" />
          <div class="formerror"><?php echo $errpwd;?></div>
          </div>
          <div>
          <div class="formerror"><?php echo $error;?></div>
          </div>
         <!-- <label>Role:</label><br>
         <input type="radio" name="role" value="admin">admin
          <input type="radio" name="role" value="customer">customer <br> -->

          <input type="submit" name="login" value="login" />
        </form>


        <p >Login as <span><a href="login.php" >Customer</a></span></p>
      </div>
      <img src="food.jpg" alt="food" />
    </div>
  </header>
  <?php include 'footer.php'; ?>
</body>

</html>