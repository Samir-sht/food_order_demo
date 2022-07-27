
<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=='remove'){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $value["code"]){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box''>
      food item  removed from cart!</div>";
      }
    
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
    
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    
    }
}
	
}



?>

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
  rel="stylesheet"
/>


<link rel="stylesheet" href="../dist/css/style.min.css" />
<div class="main-container">
<nav>
        <h2 class="logo_name"><a href="../index.php">Madhyapur Restro</a></h2>
            
        <div class="cart">
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
          <a href="../login.php" class="login">login</a>
        </div>
      </nav>

<div class="container-sm">
  <h5 class="heading">Shopping cart</h5>
  <div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
  <?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
  <div class="row">
  <table>
    <thead>
      <th>image</th>
      <th>name</th>
      <th>price</th>
      <th>quantity</th>
      <th>subtotal</th>
      <th>action</th>
    </thead>
    <?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
    <tbody>
       
            <tr>
            <td><img src='../images/<?php echo $product["image"]; ?>' width="150px" height="150px" /></td>
            <td><?php echo $product["name"];?></td>
            <td><?php echo "Rs"." ".$product["price"]; ?></td>
            <td>
            <form method='post' action=''>
                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                <input type='hidden' name='action' value="change" />
                <input type="number" id="number" min="1" name='quantity' class="quantity" onchange="this.form.submit()" 
                value="<?php echo $product["quantity"];?>">

                </form>
       
            </td>
            <td>
            <?php echo "Rs"." ".$product["price"]*$product["quantity"];?> 
           </td>
            <td>
            <form method='post' action=''>
            <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                <input type='hidden' name='action' value="remove" />
                <button type='submit' class='remove btn-remove'>Delete From Cart</button>
                </form>
                </td>
            </tr>
            <tr>
            <?php
            $total_price += ($product["price"]*$product["quantity"]);
            }
            ?>
         <td colspan="4" class="total"><strong>Total amount </strong> </td>
         <td><?php echo "<strong>Rs"." " .$total_price."</strong>"; ?></td>
        </tr>
        <tr class="checkout">
        <td colspan="3"></td>
            <td><a href="checkout.php">Proceed to checkout</a></td>
        </tr>
    </tbody>
            <tfoot>
           
           <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
              
           
            </tfoot>
           
    </table>
    </div>
      </div>
   
  
</div>

<script>
    // Select your input element.
var number = document.getElementById('number');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}
</script>
