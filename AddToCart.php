<?php
session_start();
include('config.php');

$result = mysqli_query($con, "SELECT * FROM prod");


if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'           =>    $_GET["id"],
                'item_name'         =>    mysqli_fetch_array(mysqli_query($con, "SELECT name FROM prod where id = '" . $_GET["id"] . "'"))['name'],
                'item_price'        =>    mysqli_fetch_array(mysqli_query($con, "SELECT price FROM prod where id = '" . $_GET["id"] . "'"))['price'],
                'item_image'        =>    mysqli_fetch_array(mysqli_query($con, "SELECT image FROM prod where id = '" . $_GET["id"] . "'"))['image'],
                'item_description'  =>    mysqli_fetch_array(mysqli_query($con, "SELECT description FROM prod where id = '" . $_GET["id"] . "'"))['description'],
                'item_quantity'     =>    $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id'               =>    $_GET["id"],
            'item_name'             =>    mysqli_fetch_array(mysqli_query($con, "SELECT name FROM prod where id = '" . $_GET["id"] . "'"))['name'],
            'item_price'            =>    mysqli_fetch_array(mysqli_query($con, "SELECT price FROM prod where id = '" . $_GET["id"] . "'"))['price'],
            'item_image'            =>    mysqli_fetch_array(mysqli_query($con, "SELECT image FROM prod where id = '" . $_GET["id"] . "'"))['image'],
            'item_description'      =>    mysqli_fetch_array(mysqli_query($con, "SELECT description FROM prod where id = '" . $_GET["id"] . "'"))['description'],
            'item_quantity'         =>    $_POST["quantity"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="AddToCart.php"</script>';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>التسوق</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css\CartStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css\all.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css\bootstrap.min.css'>

</head>

<body >
    <section class="bg-light my-5">
        <div class="container">
            <div class="row">
                <div class="row">

                    <div class="col-lg-9">
                        <?php
                        if (!empty($_SESSION["shopping_cart"])) {
                            $total = 0;
                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                        ?>
                                <!-- cart -->
                                <div class="col-lg-9">
                                    <div class="card border shadow-0">

                                        <div class="m-4">
                                            <h4 class="card-title mb-4">Your shopping cart</h4>
                                            <div class="row gy-3 mb-4">
                                                <div class="col-lg-5">
                                                    <div class="me-lg-5">
                                                        <div class="d-flex">
                                                            <img src="<?php echo $values["item_image"]; ?>" class="border rounded me-3" style="width: 96px; height: 96px;" />
                                                            <div class="">
                                                                <a href="#" class="nav-link"><?php echo $values["item_name"]; ?></a>
                                                                <p class="text-muted"><?php echo $values["item_description"]; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                                    <div class='rate' style='color: #ffb900; font-size: 12px;'>
                                                        <i class='filled fas fa-star'></i>
                                                        <i class='filled fas fa-star'></i>
                                                        <i class='filled fas fa-star'></i>
                                                        <i class='filled fas fa-star'></i>
                                                        <i class='filled fas fa-star'></i>
                                                    </div>
                                                    <div class="">
                                                        <text class="h6">$<?php echo $values["item_price"]; ?></text> <br />
                                                        <p><?php echo $values["item_quantity"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                                    <div class="float-md-end">
                                                        <a href="AddToCart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn btn-light border text-danger icon-hover-danger">Remove</span></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- cart -->
                                <br>
                            <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                $TotalAndTax =  ($total * (14 / 100));
                                $SubTotal = $total + $TotalAndTax;
                            }
                            ?>
                    </div>
                    <!-- summary -->
                    <div class="col-lg-3">
                        <div class="card mb-3 border shadow-0">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-label">Have coupon?</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                                            <button class="btn btn-light border">Apply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow-0 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total price:</p>
                                    <p class="mb-2">$<?php echo number_format($total, 2); ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Discount:</p>
                                    <p class="mb-2 text-success">-$60.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">TAX:</p>
                                    <p class="mb-2">$<?php echo number_format($TotalAndTax, 2); ?></p>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total price:</p>
                                    <p class="mb-2 fw-bold">$<?php echo number_format($SubTotal, 2); ?></p>
                                </div>

                                <div class="mt-3">
                                    <a href="#" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                                    <a href="shop.php" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- summary -->
                <?php
                        }
                ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>