<?php session_start();
include('search.php');
?>
<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدواء للجميع</title>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600&family=Quicksand:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="Imags/icon.jpg">
    <style>
        /* ------------search bar------------- */

.search-container {
    display: flex;
    align-items: center;
    background-color: #f1f1f1;
    border-radius: 20px;
    padding: 5px;
    margin-left: 100px;
  }
  
  input[type="text"] {
    border: none;
    background-color: transparent;
    flex: 1;
    padding: 10px;
    font-size: 16px;
    outline: none;
  }
  
  button[type="submit"] {
    border: none;
    background-color: transparent;
    font-size: 16px;
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  
  button[type="submit"]:hover {
    transform: scale(1.2);
  }
  
  .fa-search {
    color:#0496ff   ;
  }
  section{
    display:inline-block;
  }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['username'])) {
	echo '<header>';
    echo '<a href="#" class="logo"><span>الدواء للجميع</span></a>';
    echo '<ul class="navbar">';
    echo '<li><a href="home.php" ><i class="ri-home-heart-fill active"></i></a></li>';
    echo '<li><a href="shop.php">تسوق</a></li>';
    echo '<li><a href="donate.php">خير</a></li>';
    echo '</ul>';
    echo '<div class="main">';

    echo '<h3 style="color: #0496ff;">مرحبا : '  .   $_SESSION["username"].    '</h3>';
    echo '<div class="bx bx-menu" id="menu-icon"></div>';
    echo '</div>';
    echo '<li><a href="AddToCart.php" ><img style="width: 35px;" src="images/cart.png" alt=""></a></li>';
    echo '<form method="POST">';
    echo '<input class="active" id="myId" type="submit" value="بيع" name="bbtn">';
    echo '</form>';
    echo '</header>';
} else { 
	
    echo '<header>';
    echo '<a href="#" class="logo"><span>الدواء للجميع</span></a>';
    echo '<ul class="navbar">';
    echo '<li><a href="home.php" ><i class="ri-home-heart-fill active"></i></a></li>';
    echo '<li><a href="shop.php">تسوق</a></li>';
    echo '<li><a href="donate.php">خير</a></li>';

    echo '</ul>';
    echo '<div class="main">';
    
    
    echo '<a href="login.php" class="user">تسجيل الدخول</a>';
    echo '<a href="reg.php">تسجيل</a>';
    echo '<li><a href="AddToCart.php" ><img style="width: 35px;" src="images/cart.png" alt=""></a></li>';
    echo '<form method="POST">';
    echo '<input class="active" id="myId" type="submit" value="بيع" name="bbtn">';
    echo '</form>';
    echo '<div class="bx bx-menu" id="menu-icon"></div>';
    echo '</div>';
    
    echo '</header>';
}


if (isset($_SESSION['username']) != "" && isset($_POST['bbtn'])) {
    header("Location: osell.php");
    }elseif(isset($_SESSION['username']) == "" && isset($_POST['bbtn'])){
        header("Location: reg.php");
    }
?>
    <!-- js link -->
    <script type="text/javascript" src="js/navbar.js"></script>
</html>