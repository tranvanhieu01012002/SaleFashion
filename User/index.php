<?php
require  "../php/Class_database.php";
$show = new Process_product();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home page</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
</head>

<body>
    <div>
        <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="#contact">Contact</a></li>
            <li style="float:right"><a href="./cart.php?id=-1">Cart</a></li>

        </ul>
    </div>
    <br>
    <div class="containerr">
        <div class="box">
            <?php
            $show->Print_card();
            $show->disconnect();
            ?>
        </div>
        <div class="view-cart">

        </div>

    </div>


    </div>


</body>

</html>