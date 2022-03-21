<!DOCTYPE html>
<html lang="en">
<?php
require  "../php/Class_database.php";
$show = new Process_product();
error_reporting(1)

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/cart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="shopping-cart">
        <!-- Title -->
        <div class="title">
            Shopping Bag
        </div>
        <!-- Product #3 -->
        <div class="item">
            <div class="buttons">
                <span class="delete-btn">X</span>
            </div>

            <div class="image">
                <img src="item-3.png" alt="" />
            </div>

            <div class="description">
                <span>Our Legacy</span>
                <span>Brushed Scarf</span>
                <span>Brown</span>
            </div>

            <div class="quantity">
                <button class="plus-btn" type="button" name="button">
                    +
                </button>
                <input type="text" class="abc" name="name" value="1">
                <button class="minus-btn" type="button" name="button">
                    -
                </button>
            </div>
            <div class="total-price">349</div>
        </div>
        <?php
        if (isset($_GET["id"])) {
            $show->RenderData($_GET["id"]);
            $show->disconnect();
        }



        ?>
    </div>

    <script src="./js/click.js"></script>
</body>

</html>