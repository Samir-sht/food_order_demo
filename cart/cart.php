
<?php
session_start();
if(!isset($_SESSION['user'])){
  header ('location:index.php');
}
$id=$_GET['cartid'];
	include '../admin/config.php';

$sql = "SELECT * FROM food where food_id=$id";
$result = mysqli_query($con, $sql);
$cart_data=[];
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    
    array_push($cart_data, $row);
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
            <!-- <img src="cart.svg" alt="cart"/> -->
           <a href="cart.php" class="cart-store"> cart (<span>0</span>)</a>
          </div>
          <a href="../login.php" class="login">login</a>
        </div>
      </nav>

<div class="container-sm">
  <h5 class="heading">Shopping cart</h5>
  <div class="row">
  <table>
    <thead>
      <th>image</th>
      <th>name</th>
      <th>price</th>
      <th>quantity</th>
      <th>total price</th>
      <th>action</th>
    </thead>
    <tbody>
        <?php 
     
        $qty=1;
          foreach($cart_data as $c){
            if(isset($_POST['quantity'])){
              $qty=$_POST['quantity'];
            }

         
            ?>
            <tr>
            <td><img src="../images/<?php echo $c['image'] ?>" height="150px" width="150px"></td>
            <td><?php echo $c['food_name'];?></td>
            <td><?php echo $c['food_price']?></td>
            <td>
            <form action="" method="post">
            <!-- <a href="#"><img src="../minus.svg" alt="minus"></a> -->
           <input type="number" min="1"  max ="10" value="<?php echo $qty;?>" name="quantity" class="qty">
            <!-- <span name="plus"><img src="../plus.svg" alt="plus"></span>   -->
          </form>
       
            </td>
            <td>
            <?php echo $totalamt=$qty * $c['food_price'];?>
           </td>
            <td><a class="delete" href="#">Delete from cart</a></td>
            </tr>
            <tr>
         <td colspan="4" class="total">Total amount</td>
         <td><?php $total=0;
         $total+=$totalamt;
         echo $total;
         ?></td>
              <td></td>
              </tr>
         <?php } ?>
            
    </tbody>
            <tfoot>
             
              <tr>
              <td colspan="3"></td>
            <td><a href="checkout.php">Proceed to checkout</a></td></tr>
            </tfoot>
           
    </table>
    </div>
      </div>
   
  
</div>


