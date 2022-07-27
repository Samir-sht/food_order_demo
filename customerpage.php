<?php
  // session_start();
  // if(!isset($_SESSION['user'])){
  //   header ('location:../index.php');
  // }

    session_start();
    if(isset($_SESSION['user'])){
      // header('location:../index.php');
    
    include './admin/config.php';

    $status=" ";

    if(isset($_POST['code']) && $_POST['code']!==""){
        $code=$_POST['code'];

        $result = mysqli_query(
            $con,"SELECT * FROM `food` WHERE `food_id`='$code'"
            );
            $row = mysqli_fetch_assoc($result);
            $name = $row['food_name'];
            $code = $row['food_id'];
            $price = $row['food_price'];
            $image = $row['image'];
            
            $cartArray = array(
                $code=>array(
                'name'=>$name,
                'code'=>$code,
                'price'=>$price,
                'quantity'=>1,
                'image'=>$image)
            );
            
            if(empty($_SESSION["shopping_cart"])) {
                $_SESSION["shopping_cart"] = $cartArray;
                $status = "<div class='box'>food item added to cart!</div>";
            }
            else{
                $array_keys = array_keys($_SESSION["shopping_cart"]);
                if(in_array($code,$array_keys)) {
                $status = "<div class='in_box'>
                food item is already in cart!</div>";	
                } else {
                $_SESSION["shopping_cart"] = array_merge(
                $_SESSION["shopping_cart"],
                $cartArray
                );
                $status = "<div class='box'>Product is added to your cart!</div>";
                }
            
             }
     }
    }
    else{
      header('location:index.php');
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
  <link rel="stylesheet" href="./dist/css/style.min.css" />
  <title>Madhyapur Restro</title>
</head>

<body>
  <div class="main-container">
  <nav>
        <h2 class="logo_name"><a href="index.php">Madhyapur Restro</a></h2>

        <div class="cart">
         <p style="margin-right:1rem;"></a> <?php echo $_SESSION['user'];?></p>
          <div class="cart-img"> 
            <!-- <img src="cart.svg" alt="cart"/> -->
           <!-- <a href="./cart/carts.php" class="cart-store"> cart (<span>0</span>)</a> -->
          
        <?php
          
              if(!empty($_SESSION["shopping_cart"])) {
              $cart_count = count(array_keys($_SESSION["shopping_cart"]));
              ?>
        <a href="cart.php" class="Cart" >Cart (<span><?php echo $cart_count; ?>)</span></a>

            <?php
            }
            ?>
         </div>
          <a href="logout.php" class="login">logout</a>
        </div>
      </nav>

    <div class="menu-list">
      <h2 class="title">Our Menu</h2>
    </div>
    <div class="message_box" style="margin:10px 0px;" onclick="this.remove();">
<?php echo $status; ?>
</div>
    <div class="card-container">
    <?php
$result = mysqli_query($con,"SELECT * FROM `food`");
while($row = mysqli_fetch_assoc($result)){
  echo "<div class='card'>
 
  <form method='post' action=''>
  <img class='image' src='./images/".$row['image']."' />
  <div class='card_body'>
  <input type='hidden' name='code' value=".$row['food_id']." />
  <div class='name card_title'>".$row['food_name']."</div>
  <div class='desc card_desc'>".$row['food_desc']."</div>
  <div class='price card_price'>Rs ".$row['food_price']."</div>
  <button type='submit' class='buy btn-cart'>Add to cart</button>
  </div>
  </form>
  </div>";
  } 
mysqli_close($con);
?>


    </div>
  </div>
  <?php include 'footer.php'; ?>
  
</body>

</html>