<?php
$id = $_GET['id'];

include 'config.php';

if(isset($_POST['update'])){
    $fname=$_POST['foodname'];
    $fprice=$_POST['foodprice'];
    $fdesc=$_POST['fooddesc'];
    
     //to store image details

$target_dir="../images/";
    $a=uniqid().$_FILES["img"]["name"];
    $target_file=$target_dir.$a;

//store image to the path folder

if(move_uploaded_file($_FILES["img"]["tmp_name"],$target_file)){
    // die ('success');
}

    $sql = "UPDATE food SET food_name='$fname' , food_desc = '$fdesc',
         food_price='$fprice',image='$a' where food_id = '$id'";
		mysqli_query($con,$sql);
   
		if (mysqli_affected_rows($con)==1) {
          // header("location:food.php");
      echo ("<script>
            window.alert('Data Updated successfully');
            window.location.href='food.php';
            </script>");


	 }
	 else{
	 	echo "Data update failed".mysqli_error($con);
	 }
}
$sql1 = "select * from food where food_id = '$id'";
$res = mysqli_query($con, $sql1);
$data = mysqli_fetch_assoc($res);

 


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
            <li><a href="food.php" class="font active">Food</a></li>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Customer Details</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="../login.php">logout</a></li>
          </ul>
        </nav>
      </div>

      <div class="col-sm-10 p-3">
        <div class="row">
          <h5 class="text-end h5 fw-normal p-2">Welcome user</h5>
          <hr>
        </div>
        <p class="text-capitalize h4 ">Update food details</p>
        <form enctype="multipart/form-data" method="post">

                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-capitalize">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="foodname" value="<?php echo $data['food_name'];?>">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-capitalize">price</label>
                    <input type="number" class="form-control" id="number" name="foodprice" value="<?php echo $data['food_price'];?>">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-capitalize">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="fooddesc"><?php echo $data['food_desc'];?></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-capitalize">Image</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" name="img"><br>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="update">submit</button>
                  </div>
                </form>
</div>
</div>
</div>



  <script>
    // disable negative values
var number = document.getElementById('number');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}
</script>