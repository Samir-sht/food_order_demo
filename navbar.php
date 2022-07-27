<nav>
        <h2 class="logo_name"><a href="index.php">Madhyapur Restro</a></h2>

        <div class="cart">
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
          <a href="login.php" class="login">login</a>
        </div>
      </nav>