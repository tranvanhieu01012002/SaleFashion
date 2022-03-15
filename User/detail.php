<!DOCTYPE html>
<html lang="en">
<?php
require  "../php/Class_database.php";
$show = new Process_product();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details page</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    if (isset($_GET["id"])) {
        $show->Print_Detail($_GET["id"]);
        $show->disconnect();
    } else {
        echo "not found product";
    }

    ?>
    <br>
    <a class="button-34" href="./index.php">Back Home</a>
</body>

</html>