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
    <link rel="stylesheet" href="./dist/css/style.min.css" />
    <title>Madhyapur Restro</title>
  </head>
  <body>
    <div class="main-container">
      <?php include 'navbar.php';?>

      <div class="menu-list">
        <h2 class="title">Our Menu</h2>
      </div>

      <div class="card-container">
        <div class="card">
          <img src="food.jpg" alt="food item" />
          <div class="card_body">
            <h2 class="card_title">Burger</h2>
            <p class="card_desc">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet
            </p>
            <p class="card_price">Rs 100</p>
            <a href="#" class="btn-cart">add to cart</a>
          </div>
        </div>

        <div class="card">
          <img src="food.jpg" alt="food item" />
          <div class="card_body">
            <h2 class="card_title">Burger</h2>
            <p class="card_desc">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet
            </p>
            <p class="card_price">Rs 100</p>
            <a href="#" class="btn-cart">add to cart</a>
          </div>
        </div>

        <div class="card">
          <img src="food.jpg" alt="food item" />
          <div class="card_body">
            <h2 class="card_title">Burger</h2>
            <p class="card_desc">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet
            </p>
            <p class="card_price">Rs 100</p>
            <a href="#" class="btn-cart">add to cart</a>
          </div>
        </div>
      </div>
    </div>
<?php include 'footer.php';?>
  </body>
</html>
