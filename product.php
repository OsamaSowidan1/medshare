<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css\all.min.css">
    <link rel="stylesheet" href="css\style.css">
    <title>المنتجات</title>
</head>

<body>

    <div class="container">

        <?php
        include('config.php');

        $id = $_GET['id'];

        $result = mysqli_query($con, "SELECT * FROM prod WHERE id = $id");


        while ($row = mysqli_fetch_array($result)) {
            echo "
        <center>
        <main>
        
        <div class='box'>
        <div class='images'>
            <div class='img-holder active'>
                <img src='$row[image]' id='zoom'>
            </div>
            <div class='img-holder'>
                <img src='$row[image]'>
            </div>
            <div class='img-holder'>
                <img src='$row[image]'>
            </div>
            <div class='img-holder'>
                <img src='$row[image]'>
            </div>
        </div>
        <div class='basic-info'>
            <h1 class='na'>$row[name]</h1>
            <div class='rate'>
                <i class='filled fas fa-star'></i>
                <i class='filled fas fa-star'></i>
                <i class='filled fas fa-star'></i>
                <i class='filled fas fa-star'></i>
                <i class='filled fas fa-star'></i>
            </div>
            <span>$$row[price]</span>
            <div class='description'>
            <p>$row[description]</p>
            </div>
            <div class='options'>
            <form action='AddToCart.php?action=add&id=$row[id]' method='post'>
            <input type='number' name='quantity' value='1' class='quan' />
            <input type='hidden' name='product_id' value='<?=$row[id]?>'>
            <br><br>
            <input type='submit' name='add_to_cart' value='Add To Cart' class='btn2'>
            </form>
            <form action='shop.php'>
        <input  type='submit' name='Back' value='Back' class='btn2'>
    </form>
            </div>
        </div>
       
        
        </main>
        </center>
        ";
        }


        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="Stylish-Magnifying-Glass-Plugin-SergeLand-Image-Zoomer\zoomsl.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#zoom').imagezoomsl();
        });
    </script>

</body>

</html>


<!-- <div class='description'>

    <ul class='social'>
        <li><a href='#'><i class='fa-brands fa-facebook-f'></i></a></li>
        <li><a href='#'><i class='fa-brands fa-instagram'></i></a></li>
        <li><a href='#'><i class='fa-brands fa-twitter'></i></a></li>
    </ul>
</div> -->