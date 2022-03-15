<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "../php/Class_database.php";
$delete = new Process_product();
error_reporting(2);
// Xóa sản phẩm theo id
if (isset($_GET['id'])) {
    $idProduct = $_GET['id'];
    $sq1 = "DELETE FROM products WHERE id = " . $idProduct;
    $delete->setQuery($sq1);
    $delete->query();
    $delete->disconnect();
    if ($delete) {
?>
<script type="text/javascript">
window.location = '../html/index.php?deleted=success';
</script>
<?php
    } else
    ?>
<script type="text/javascript">
window.location = '../html/index.php?delete=fail';
</script>
<?php
}
?>