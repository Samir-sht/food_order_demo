<?php
include 'config.php';
$sql = "INSERT INTO order_details (order_number,customer_id,total_sales)  SELECT o.order_number,c.customer_id, sum(o.total_amount) as totalsales FROM customers as c 
inner join orders as o
on c.customer_id=o.customer_id WHERE order_status='Delivered'
group by c.customer_id;";


$result = mysqli_query($con, $sql);

?>