<?php
session_start();

if($_SESSION['customerid']){
    $id=$_SESSION['customerid'];
}
if (!($_SESSION['user'])) {
    header ("Location: ../login.php");
    }
    
include '../admin/config.php';
require 'stripeconfig.php';


$message=" ";
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
    $items=array();
    $quantity=array();
    $price=array();
   }
   foreach ($_SESSION["shopping_cart"] as $product)
    {   
        $items[]=$product["name"];
        $quantity[]=$product["quantity"];
        $price[]=$product["price"];
        $total_price += ($product["price"]*$product["quantity"]);   
        }
    $allitems=implode(' <br>', $items);
    $allquantity=implode('<br> ', $quantity);
    $unitprice=implode('<br> ', $price);
    //  $sql="INSERT INTO orders (food_items,order_qty,food_price,total_amount,customer_id)
    // VALUES('".$allitems."','".$allquantity."','".$unitprice."','".$total_price."','".$id."')";   
    //     mysqli_query($con,$sql);
    //             if(mysqli_query($con,$sql)){
    //                 $message= "order placed";

    //             }
    //             else{
    //                 $message="order not placed";
    //             }           
               
               
                
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
        <h2 class="logo_name"><a href="../customerpage.php">Madhyapur Restro</a></h2>
            
        <div class="cart">
                <?php
          if(isset($_SESSION['user'])){
          echo "<a class='orderhistory' href='order-view.php'>order history</a>";
      }?>
        <p style="margin-right:1rem;">
        <?php if(isset($_SESSION['user'])){ echo $_SESSION['user'];}?></p>
          <div class="cart-img">
          <?php
              if(!empty($_SESSION["shopping_cart"])) {
              $cart_count = count(array_keys($_SESSION["shopping_cart"]));
              ?>
        <a href="carts.php" class="Cart" >Cart (<span><?php echo $cart_count; ?>)</span></a>

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



<div class="container-sm">
  <h5 class="heading">Cart Summary</h5>
  <table class="order-history">
    <thead>
      <th>food items</th>
      <th>quantity</th>
      <th>food price</th>
</thead>
    <tbody>
         <td><?php echo $allitems.'<br>'; ?></td>
         <td><?php echo $allquantity; ?></td>
         <td><?php echo $unitprice; ?></td>
    </tbody>
    <tr>
    <td colspan="2"> Total Price</td>
    <td><?php echo $total_price;?></td>
    </tr>
    
</table>

<form action="order-submit.php" method="post">
<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
data-key="<?php echo $publishableKey?>" data-amount="<?php echo $total_price * 100;?>" data-name = "FoodPayment" data-description="Payment Gateway" data-image="" data-currency="npr"
data-email="">
 </script>   
<input type="hidden" name="total" value="<?php echo $total_price;?>">

</form>






<!--     <form action="https://uat.esewa.com.np/epay/main" method="POST">
    <input value="<?#php echo $total_price;?>" name="tAmt" type="hidden">
    <input value="<?#php echo $total_price;?>" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
    <input value="http://localhost/food%20ordering/cart/esewasuccess.php" type="hidden" name="su">
    <input value="http://localhost/food%20ordering/cart/esewa-failure.php" type="hidden" name="fu">
    <input value="Pay with Esewa" type="submit" name="esewasuccess">
    </form> -->

</div>
</div>
<?php include '../footer.php';?>