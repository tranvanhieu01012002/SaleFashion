<?php
// require_once "./Create_object.php";
error_reporting(2);
require_once "../php/Class_database.php";
$add = new Process_product();
$target_file = "../" . basename($_FILES['img']["name"]);
$uploadOK = 1;

if (isset($_POST["button"])) {
    // $key = "";
    // $des = "";
    // $status = 0;
    $image = basename($_FILES['img']["name"]);
    if ($image == null || $image == "") {
        $image = $_POST['img'];
        $uploadOK = 0;
    } else {
        $check = getimagesize($_FILES['img']["tmp_name"]);
        if ($check !== false) {
            $image = basename($_FILES['img']["name"]);
            $uploadOK = 1;
        } else {
            $image = "";
?>
<script type="text/javascript">
window.location = "product-add.php?notimage=notimage"
</script>
<?php

            $uploadOK = 0;
        }
        if ($uploadOK == 0) {
            echo "image not found";
        } else {
            if (move_uploaded_file($_FILES['img']["tmp_name"], $target_file)) {
                echo "Up Image successful";
            } else {
                echo "Update not found";
            }
        }
    }
    if (file_exists($target_file)  && $_GET['id'] == -1) {
        echo "Tên file đã tồn tại trên server, không được ghi đè";
        $allowUpload = false;
    }
    if (isset($_POST['txtName'])) {
        $namePr = $_POST['txtName'];
    }

    if (isset($_POST['category'])) {
        $categoryPr = $_POST['category'];
    }

    if (isset($_POST['txtPrice'])) {
        $pricePr = $_POST['txtPrice'];
    }
    if (isset($_POST['txtSalePrice'])) {
        $salePricePr = $_POST['txtSalePrice'];
    }
    if (isset($_POST['txtNumber'])) {
        $quantityPr = $_POST['txtNumber'];
    }
    if (isset($_POST['txtKeyword'])) {
        $keywordPr = $_POST['txtKeyword'];
    }
    if (isset($_POST['txtDescript'])) {
        $descriptPr = $_POST['txtDescript'];
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($_GET['id'] != -1) {
            $sql = "UPDATE products SET name='$namePr', category_id = '$categoryPr',
        image ='$image',description =  '$descriptPr',price = '$pricePr',saleprice ='$salePricePr',
        created = now(),quantity = '$quantityPr' ,keyword = '$keywordPr',status = '1' WHERE id = $id  ";
        } else {
            $sql = "INSERT INTO products(name,category_id,image,description,price,saleprice,created,quantity,keyword,status) 
      VALUES('$namePr', '$categoryPr', '$image', '$descriptPr', '$pricePr', '$salePricePr',now(), '$quantityPr', '$keywordPr',0)";
        }
    }

    $add->setQuery($sql);
    $result = $add->query();
    $add->disconnect();

    if ($result != null) {
        header("location:index.php?add=success&id=$id&name=$namePr");
        exit();
    } else {
        header("location:index.php?add=fail");
        exit();
    }
}


?>