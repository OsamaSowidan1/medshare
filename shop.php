<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css\all.min.css">
    <link rel="stylesheet" href="css\ShopStyle.css">
    <title>تسوق</title>
</head>
<style>
        .logo1 {
            position: fixed;
            height: 10vh;
            width: 100%;
            top: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            background-color: white;
            padding: 17px 6%;
            transition: all .50s ease;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .logo1 a {
            text-decoration: none;
        }

        .logo1 h3 {
            display: inline-block;
            color: #0496ff;
            padding-top: 6px;
            font-size: 30px;
            
        }
    </style>

<body>
<header class="logo1">
        <a href="home.php">&#8594;<h3>الدواء للجميع</h3></a>
    </header>
    <div class='container mySS'>
        <?php
        include('config.php');
        $result = mysqli_query($con, "SELECT * FROM prod");



        while ($row = mysqli_fetch_array($result)) {
            echo "
        <center>
        <main>
        
            <div class='box'>
                <img src='$row[image]'>
                <h2>$row[name]</h2>
                <p>$row[description]</p>
                <span>$$row[price]</span>
                <div class='rate'>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                    <i class='fa-regular fa-star'></i>
                </div>
                <div class='options'>
                    <a href='product.php?id=$row[id]'>Buy It Now</a>
                </div>
            </div>
        
        </main>
        </center>
        ";
        }


        ?>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>



<!-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script>
    $(document).ready(function() {
        $('button').click(function() {
            var id = '$row[id]';
            $.post('AddToCart.php', {
                    id: id
                },
                function(data, status) {
                    alert('Data: ' + data + '\nStatus: ' + status);
                });
        });
    });
</script> -->