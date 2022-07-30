<?php
  session_start();
  if(!isset($_SESSION['admin'])){
    header ('location:../index.php');
  }
  ?>
<?php
include 'config.php';
$sql = "SELECT * FROM food ORDER BY food_name ASC";
$result = mysqli_query($con, $sql);
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
          <ul class="text-capitalize">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="food.php" class="font active">Food</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="customerdetails.php">Customer Details</a></li>
             <li><a href="salesreport.php">sales report</a></li>
            <li><a href="../login.php">logout</a></li>
          </ul>
        </nav>
      </div>
      <div class="col-sm-10 p-3">
        <div class="row">
          <h5 class="text-end h5 fw-normal p-2">Welcome <?php echo $_SESSION['admin'];?></h5>
          <hr>
        </div>
        <p class="text-capitalize h4 ">food details</p>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add Food
        </button>


        <!---display food details --->
        <table class="table table-bordered  mt-5">
          <thead class="table-dark">
            <tr class="text-capitalize ">
              <th scope="col">S.N</th>
              <th scope="col">name</th>
              <th scope="col">description</th>
              <th scope="col">price</th>
              <th scope="col">image</th>
              <th colspan="2">action</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $i = 1;
            foreach ($data as $d) {
            ?>
              <tr class="text-capitalize">
                <td><?php echo $i++; ?></td>
                <td><?php echo $d['food_name']; ?></td>
                <td class="w-25"><?php echo $d['food_desc']; ?></td>
                <td><?php echo $d['food_price']; ?></td>
                <td><img src="../images/<?php echo $d['image']; ?>" height="150px" width="150px"></td>
                <td>
                  <button class="btn btn-success"><a class="text-decoration-none text-white" href="updatefood.php?id=<?php echo $d['food_id'];?>">Edit</a></button>
                  <button class="btn btn-danger"> <a class="text-decoration-none text-white" href="deletefood.php?id=<?php echo $d['food_id']; ?>" onclick="return confirm('Are u sure to delete?')">Delete</a></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Add food details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="insertfood.php">

                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-capitalize">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="foodname">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-capitalize">price</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="foodprice">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-capitalize">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="fooddesc" ></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-capitalize">Image</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" name="img"><br>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="login">submit</button>
                  </div>
                </form>
              </div>




            </div>
          </div>

        </div>
      </div>
    </div>
  </div>





  <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
      myInput.focus()
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>

</html>