<?php
include "../php/Class_database.php";
error_reporting(1);
class ProcessUser extends Process_product
{
    function Add_to_cart($idUser, $id)
    {
        $sql = 'SELECT * from add_to_cart where Id_product=' . $id;
        $data = $this->Get_list($sql);
        if ($data != null) {
            $this->AddQuantity($id);
        } else if ($id != -1) {
            $sql = "INSERT INTO add_to_cart(id_user,Id_product,quantity) values ($idUser,$id,1)";
            $this->setQuery($sql);
            $this->query();
        }
    }
    function AddQuantity($idProduct)
    {
        $sql = "UPDATE add_to_cart SET quantity = ((SELECT quantity FROM add_to_cart where Id_product =$idProduct  limit 1)+1) WHERE Id_product = " . $idProduct;
        // you can add id product if you contact with other user /."AND id_user = ".$idUser
        $this->setQuery($sql);
        $this->query();
    }
    function DecreaseQuantity($idProduct)
    {
        $sql = "UPDATE add_to_cart SET quantity = ((SELECT quantity FROM add_to_cart where Id_product =$idProduct  limit 1)-1) WHERE Id_product = " . $idProduct;
        // you can add id product if you contact with other user /."AND id_user = ".$idUser
        $this->setQuery($sql);
        $this->query();
    }
    function DeleteProduct($idProduct)
    {
        $sql = "DELETE FROM  add_to_cart WHERE Id_product = " . $idProduct;
        // you can add id product if you contact with other user /."AND id_user = ".$idUser
        $this->setQuery($sql);
        $this->query();
    }
    function RenderData($idUser)
    {
        $sql = 'SELECT * from add_to_cart ';
        //WHERE id_user =' . $idUser
        $data = $this->Get_list($sql);
        if ($data) {
            foreach ($data as $product) {
                $sqlGetImage = 'SELECT image,price from products WHERE id =' . $product['Id_product'];
                $getImage = $this->Get_list($sqlGetImage);

                echo '
                        <div class="item">
                            <div class="buttons">
                                <a href="../php/AddButton.php?id=' . $product["Id_product"] . '&f=3"><span class="delete-btn">X</span></a>
                            </div>

                            <div class="image">
                                <img src="../' . $getImage[0]['image'] . '" alt="" />
                            </div>

                            <div class="description">
                                <span>Our Legacy</span>
                                <span>Brushed Scarf</span>
                                <span>Brown</span>
                            </div>

                            <div class="quantity">
                                <a href="../php/AddButton.php?id=' . $product["Id_product"] . '&f=1" class="plus-btn" type="button" name="button">
                                    +
                                </a>
                                <input type="text" class="abc" name="name" value="' . $product["quantity"] . '">
                                <a href ="../php/AddButton.php?id=' . $product["Id_product"] . '&f=2" class="minus-btn" type="button" name="button">
                                    -
                                </a>
                            </div>
                            <div class="total-price">' . $getImage[0]['price'] * $product["quantity"] . '</div>
                        </div>
                                                            
                             ';
            }
        } else {
            echo "Nothing to show";
        }
    }
}