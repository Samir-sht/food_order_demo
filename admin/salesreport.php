<?php
  session_start();
  if(!isset($_SESSION['admin'])){
    header ('location:../index.php');
  }
  ?>
<?php
include 'config.php';
$sql = "SELECT o.order_number,c.customer_id,c.fullname, sum(o.total_amount) as totalsales FROM customers as c 
inner join orders as o
on c.customer_id=o.customer_id WHERE order_status='Delivered'
group by c.customer_id;";


$result = mysqli_query($con, $sql);
// $row=mysqli_fetch_assoc($result);


$data = [];
if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
     array_push($data, $row);
   }
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>dashboard</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

</head>

<body>
  <div class="container-fluid dashboard font">
    <div class="row min-vh-100">
      <div class="col-sm-2  px-4 ">
        <h5 class="text-white text-uppercase pt-4 ">Food Ordering System</h5>
        <nav class="">
          <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="food.php">Food</a></li>
            <li><a href="orders.php" >Orders</a></li>
            <li><a href="customerdetails.php" >Customer Details</a></li>
           <li><a href="salesreport.php" class="font active">Sales Report</a></li>
            <li><a href="payment.php" class="font ">Payments</a></li>
            <li><a href="../adminlogout.php">logout</a></li>
          </ul>
        </nav>
      </div>
      <div class="col-sm-10 p-3">
        <div class="row">
          <h5 class="text-end h5 fw-normal p-2">Welcome <?php echo $_SESSION['admin'];?></h5>
          <hr>
        </div>
        <p class="text-capitalize h4  ">Sales Report</p>
        <table class="table table-bordered mt-3">
          <thead class="table-dark">
            <tr class="text-capitalize ">
            <th>S.N</th>
            <th>Customer id</th>
            <th>Customer name</th>
            <th>total sales</th>
            </tr>
          </thead>

          <?php
            $i=1;
            foreach ($data as $d) {
          ?> 
          <tbody>
            <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $d['customer_id'];?></td>
            <td><?php echo $d['fullname'];?></td>
            <td><?php echo $d['totalsales'];?></td>
            </tr>
          </tbody>
          <?php } ?>
        </table>


        </div>
      </div>
    </div>
  </div>





 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>

</html>