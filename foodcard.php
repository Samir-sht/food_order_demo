<?php
  include './admin/config.php';
  $sql="SELECT * FROM food";
  $result=mysqli_query($con,$sql);
  $data=[];

  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
      array_push($data,$row);
    }
  }
?>

<?php
    foreach($data as $d){
?>
<div class="card">
    <img src="./images/<?php echo $d['image']?>" alt="food item" />
    <div class="card_body">
        <h2 class="card_title"><?php echo $d['food_name'] ?></h2>
        <p class="card_desc">
            <?php echo $d['food_desc'] ?>
        </p>
        <p class="card_price">Rs <?php echo $d['food_price'] ?></p>
        <a href="#" class="btn-cart">add to cart</a>
    </div>
</div>
<?php } ?>