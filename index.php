<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./dist/css/style.min.css" />
  <title>Madhyapur Restro</title>
</head>

<body>
  <div class="main-container">
    <?php include 'navbar.php'; ?>

    <div class="menu-list">
      <h2 class="title">Our Menu</h2>
    </div>

    <div class="card-container">
      <?php include 'foodcard.php'; ?>
     
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>

</html>