<?php
    include('config.php');

    if(isset($_POST['login'])){
        $foodname=$_POST['foodname'];
        $foodprice=$_POST['foodprice'];
        $fooddesc=$_POST['fooddesc'];
        
         //to store image details
  
    $target_dir="../images/";
		$a=uniqid().$_FILES["img"]["name"];
		$target_file=$target_dir.$a;

if(empty($foodname) || empty($foodprice) || empty($fooddesc)){
  header("location:food.php");
}
    //store image to the path folder

     else if(move_uploaded_file($_FILES["img"]["tmp_name"],$target_file)){
        // die ('success');
    }

else{
    $sql="INSERT INTO food(food_name,food_desc,food_price,image) VALUES('$foodname','$fooddesc','$foodprice','$target_file')";
    $result=mysqli_query($con,$sql);
    if($result){
  echo ("<script>
            window.alert('food item added successfully');
            window.location.href='food.php';
            </script>");
     }
    else{
        echo "data not inserted".mysqli_error($con);
    }
    }
}
?>