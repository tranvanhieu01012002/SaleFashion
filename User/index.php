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
</head>

<body>
    <div class="box">
        <?php
        $show->Print_card();
        $show->disconnect();
        ?>
    </div>
</body>

</html>