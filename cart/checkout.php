<?php
session_start();

if($_SESSION['customerid']){
    $id=$_SESSION['customerid'];
}
if (!($_SESSION['user'])) {
    header ("Location: ../login.php");
    }
    
include '../admin/config.php';



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
                    echo "order placed";

                }
                else{
                    echo "order not placed";
                }           
               
               
                
?>


<?php
    include 'order-view.php';
?>

