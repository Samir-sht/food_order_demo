<?php
session_start();

if($_SESSION['customerid']){
    $id=$_SESSION['customerid'];
}
if (!($_SESSION['user'])) {
    header ("Location: ../login.php");
    }
    
include '../admin/config.php';


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
    $allitems=implode('<br>', $items);
    $allquantity=implode('<br>', $quantity);
    $unitprice=implode('<br>', $price);
     $sql="INSERT INTO orders (food_items,order_qty,food_price,total_amount,customer_id)
    VALUES('".$allitems."','".$allquantity."','".$unitprice."','".$total_price."','".$id."')";   
                if(mysqli_query($con,$sql)){
                    $message= "order placed";

                }
                else{
                    $message="order not placed";
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

<?php echo $message."<br>";?>

<label>Payment</label>
<form action="" method="post">
    <select name="payment_option">
        <option value="cash">cash</option>
        <option value="stripe">Stripe</option>
    </select><br>
    <input type="submit" name="payment" value="pay">
</form>
<?php #include 'order-view.php';?>
<!-- <div class="container-sm">
  <h5 class="heading">Order details</h5>
  <div class="message_box" style="margin:10px 0px;" onclick="this.remove();">
<?php #echo $status; ?>
</div> -->


    
 <?php
// session_start();
// if($_SESSION['customerid']){
//     $id=$_SESSION['customerid'];
// }
//  include '../admin/config.php';


//  $sql1 = "SELECT * FROM orders WHERE customer_id = '".$id."'";
// $res = mysqli_query($con, $sql1);
// $data = [];
// if (mysqli_num_rows($res) > 0) {
//     while ($row = mysqli_fetch_assoc($res)) {
//     array_unshift($data, $row);
//         }
//     }
?>

<!-- <div class="row">
  <table>
    <thead>
    <th>sn</th>
      <th>food items</th>
      <th>quantity</th>
      <th>food price</th>
      <th>total amount</th>
      <th>status</th>
      <th>action</th>
    </thead>
  
    <tbody>
         

    </tbody>


</div> -->