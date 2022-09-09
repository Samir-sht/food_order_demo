<?php
 include('stripeconfig.php');
 $total = $_POST['total'] * 100;
if (isset($_POST['stripeToken'])) {
 $token = $_POST['stripeToken'];

 $charge = \Stripe\Charge::create(array(
    "amount"=>$total,
    "currency"=>"npr",
    "description"=>"Payment Gateway",
    "source"=>$token,
 ));
}
?>
<?php
include '../admin/config.php';

session_start();	

if($_SESSION['customerid']){
    $id=$_SESSION['customerid'];
}

$sql="SELECT * FROM orders WHERE customer_id='$id'";
      $result=mysqli_query($con,$sql);

      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

          $_SESSION['order'] = $row['order_number'];
          
          }
       }

 if($_SESSION['order']){
 	$oid=$_SESSION['order'];
 }

if (!($_SESSION['user'])) {
    header ("Location: ../login.php");
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
    $total=$total_price;

	$sql1= "INSERT INTO orders (food_items,order_qty,food_price,total_amount,order_status,customer_id)
			VALUES('".$allitems."','".$allquantity."','".$unitprice."','".$total."','Pending','".$id."')"; 

	mysqli_query($con,$sql1);
	$sql2="INSERT INTO payment(transaction_id,payment_amt,payment_mode,order_number,customer_id)
	values ('".$token."','".$total_price."','stripe','".$oid."','".$id."')";
        
	
	mysqli_query($con,$sql2);

	// echo "<script>window.alert('Your Order has been placed.')
	// </script>";
	

	header("location:../customerpage.php");
?>

