<?php
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
  <?php include '../navbar.php'; ?>

<div class="container-sm">
  <h5>Shopping cart</h5>
  <div class="row">
  <table class="table mt-3">
    <thead>
      <th>image</th>
      <th>name</th>
      <th>price</th>
      <th>quantity</th>
      <th>total</th>
      <th>action</th>
    </thead>
    <tbody>
        <?php 
        $quantity=1;
          foreach($cart_data as $c){
            ?>
            <tr>
            <td><img src="../images/<?php echo $c['image'] ?>" height="150px" width="150px"></td>
            <td><?php echo $c['food_name'];?></td>
            <td><?php echo $c['food_price']?></td>
            <td><?php echo $quantity;?></td>
            <td><?php echo $quantity*$c['food_price'];?></td>
            </tr>
         <?php } ?>

         
    
    </tbody>
    </div>
      </div>
  </table>
</div>


