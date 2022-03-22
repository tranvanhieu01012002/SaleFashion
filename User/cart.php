<!DOCTYPE html>
<html lang="en">
<?php
require  "../php/ProcessUser.php";
$show = new ProcessUser();
// error_reporting(1)

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
        <?php
        if (isset($_GET["id"])) {
            $show->Add_to_cart(1, $_GET["id"]);
            $show->RenderData(1);
            $show->disconnect();
        }



        ?>

    </div>
    <a href="./index.php">Back to home</a>
    <!-- <script src="./js/click.js"></script> -->
</body>

</html>