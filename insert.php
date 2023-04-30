<?php

include('config.php');

if(isset($_POST['pub'])){
    $p_type = $_POST['p_type'];
    $pname = $_POST['pname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "images/".$image_name;
    $insert = "INSERT INTO prod (p_type,name , description , price , image) VALUES ('$p_type','$pname','$description','$price','$image_up')";
    mysqli_query($con, $insert);

    if(move_uploaded_file($image_location,'images/'.$image_name)){
        echo "<script>alert('uploaded')</script>";
    }else{
        echo "<script>alert('failed')</script>";
    }

    header('location: shop.php');


    // echo "your product is:".$pname."<br>";
    // echo "your desc is:".$description."<br>";
    // echo "your price is:".$price."<br>";
    // echo "your type is:".$p_type."<br>";
    
}

?>