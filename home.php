<?php
session_start();
include('./admin/config.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `food` WHERE `food_id`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['food_name'];
$code = $row['food_id'];
$price = $row['food_price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>

<style>

    img{
        height:100px;
        width:100px;
    }
</style>

<body>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<?php
$result = mysqli_query($con,"SELECT * FROM `food`");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['food_id']." />
    <div class='image'><img src='./images/".$row['image']."' /></div>
    <div class='name'>".$row['food_name']."</div>
    <div class='price'>$".$row['food_price']."</div>
    <button type='submit' class='buy'>Add to cart</button>
    </form>
    </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</body>