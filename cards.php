

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

  $sql1="SELECT * FROM users";
  $result1=mysqli_query($con,$sql1);
?>

<div class="container">  
<div class="row"> 
    <?php
    foreach($data as $d){
?>
    <div class="col-12 col-md-6 col-lg-4 ">


<div class="card mb-5 box">
    <img src="./images/<?php echo $d['image']?>" alt="food item" />
    <div class="card_body">
        <h2 class="card_title"><?php echo $d['food_name'] ?></h2>
        <p class="card_desc">
            <?php echo $d['food_desc'] ?>
        </p>
        <p class="card_price">Rs <?php echo $d['food_price'] ?></p>
        <a href="./cart/cart.php?cartid=<?php echo $d['food_id'];?>" class="btn-cart">add to cart</a>
    </div>
</div>

</div> 
<?php } ?>
</div> 
</div> 
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


