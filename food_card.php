<?php
include './admin/config.php';

$result = mysqli_query($con,"SELECT * FROM `food`");
while($row = mysqli_fetch_assoc($result)){
?>
<div class="card">
    <form action="" method="post">
    <img class="image" src="./images/<?php echo $row['image']?>" alt="food item" />
    <div class="card_body">
        <input type="hidden" name="code" value="">
        <h2 class="card_title "><?php echo $row['food_name'] ?></h2>
        <p class="card_desc">
            <?php echo $row['food_desc'] ?>
        </p>
        <p class="card_price">Rs <?php echo $row['food_price'] ?></p>
        <button type="submit" class="btn-cart buy">add to cart</button>
    </div>
    </form>
</div>
<?php } ?>
?>