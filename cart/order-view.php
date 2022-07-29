
 <?php
// session_start();
if($_SESSION['customerid']){
    $id=$_SESSION['customerid'];
}
 include '../admin/config.php';


 $sql1 = "SELECT * FROM orders WHERE customer_id = '".$id."'";
$res = mysqli_query($con, $sql1);
$data = [];
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
    array_unshift($data, $row);
        }
    }
?>
<body>
    <h2>Order Details</h2>
    <table>
        <thead>
        <th>sn</th>
        <th>food items</th>
        <th>quantity</th>
        <th>food price</th>
        <th>status</th>
        
        <th>action</th>
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
                <td><?php echo $d['order_status']; ?></td>
            
               
                <td>
                 
                  <button class="btn btn-danger"> <a class="text-decoration-none text-white" href="cancelorder.php?id=<?php echo $d['customer_id']; ?>" onclick="return confirm('Are u sure to cancel the order?')">cancel order</a></button>
                </td>
              </tr>

              <tr><td>total amount</td>
              <td><?php echo $d['total_amount']; ?></td></tr>
            <?php } ?>
          </tbody>
        
    </table>
</body>