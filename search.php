<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="css/ShopStyle.css">

</head>

<body>
    <?php

    require 'config.php';
    try {

        if (isset($_POST['btn'])) {
            $search_term = $_GET['search'];

            // Query the database for products matching the search term
            $query = "SELECT * FROM prod WHERE name LIKE '%$search_term%'";
            $result = mysqli_query($con, $query);

            // Display the search results
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // echo $rrow['name'] . "<br>";
                    echo  "
    <div class='container'>
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
                    <a href='#'>Add to Cart</a>
                </div>
            </div>
        
        </main>
        </center> </div>
         ";
                }
            } else {
                echo " مش موجود يصاحبي والله";
            }
        }
        // Get the search term from the user

    } catch (Exception $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    ?>
</body>

</html>