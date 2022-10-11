<nav>
        <h2 class="logo_name"><a href="../customerpage.php">Madhyapur Restro</a></h2>
            
        <div class="cart">
                <?php
          if(isset($_SESSION['user'])){
          echo "<a style='margin-right:1rem; text-decoration:none;' href='./cart/order-view.php'>order history</a>";
      }?>
        <p style="margin-right:1rem;">
        <?php if(isset($_SESSION['user'])){ echo $_SESSION['user'];}?></p>
          <div class="cart-img">
          <?php
              if(!empty($_SESSION["shopping_cart"])) {
              $cart_count = count(array_keys($_SESSION["shopping_cart"]));
              ?>
        <a href="./cart/carts.php" class="Cart" >Cart (<span><?php echo $cart_count; ?>)</span></a>

            <?php
            }
            ?>
          </div>
         <?php
          if(isset($_SESSION['user'])){
          echo "<a href='../logout.php' class='login'>logout</a>";
      }
      
         else{
         echo "<a href='../login.php' class='login'>login</a>";
     }
         ?>
                </div>
        
      </nav>
