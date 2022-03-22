<?php
require "../php/ProcessUser.php";
$Process = new ProcessUser();
if (isset($_GET["id"]) && isset($_GET["f"])) {
    $id = $_GET["id"];
    $func = $_GET["f"];
    if ($func == 1) {
        $Process->AddQuantity($id);
    } else if ($func == 2) {
        $Process->DecreaseQuantity($id);
    } else if ($func == 3) {
        $Process->DeleteProduct($id);
    }
    $Process->disconnect();
}


?>
<script>
window.location = "../User/cart.php?add=success&id=-1"
</script>