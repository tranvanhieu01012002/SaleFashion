<!DOCTYPE html>
<html lang="en">
<?php
require  "./admin/html/Create_object.php";



?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home page</title>
    <link rel="stylesheet" href="./css/css.css">
</head>

<body>
    <div class="box">
        <?php
        $Process->Print_card();
        ?>
    </div>
</body>

</html>