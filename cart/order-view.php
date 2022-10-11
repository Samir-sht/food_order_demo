
 <?php
session_start();
if($_SESSION['customerid']){
    $id=$_SESSION['customerid'];
}
 include '../admin/config.php';


 $sql1 = "SELECT * FROM orders WHERE customer_id = '".$id."' " ;
$res = mysqli_query($con, $sql1);
$data = [];
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
    array_unshift($data, $row);
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
<body>
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
  <h5 class="heading">Order history</h5>
    <table class="order-history">
        <thead>
        <th>S.N</th>
        <th>food items</th>
        <th>quantity</th>
        <th>food price</th>
        <th>total amount</th>
        <th>Order date</th>
        <th>status</th>
        
        
        </thead>
        
        <tbody>
            <?php
            $i = 1;
            foreach ($data as $d) {
            ?>
              <tr class="">
                <td><?php echo $i++; ?></td>
                <td><?php echo $d['food_items']; ?></td>
                <td><?php echo $d['order_qty']; ?></td>
                <td><?php echo $d['food_price']; ?></td>
                <td><?php echo $d['total_amount']?></td>
                <td><?php echo $d['order_date']?></td>
                <td><?php echo $d['order_status']; ?></td>
            
               
                
              </tr>

           
            <?php } ?>
          </tbody>
        
    </table>
    </div>
   
</div>
<?php #include '../footer.php';?>
</body>
