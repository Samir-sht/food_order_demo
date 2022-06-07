<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
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
          <form action="#" method="post">
            <h2>Login</h2>
            <label>Email</label><br />
            <input type="email" name="email" /><br />
            <label>Password</label><br />
            <input type="password" name="password" /><br />
            <input type="checkbox" name="checkbox" /><span class="remember"
              >keep me logged in</span
            >
            <br />
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
    <?php include 'footer.php';?>
  </body>
</html>
