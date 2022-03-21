<?php



class database
{
    var $_sql = '';
    var $_connection = null;
    var $_cursor = null;
    var $_host = "localhost";
    var $_user = "root";
    var $_pass = "";
    function __construct()
    {
        $this->_connection = @mysqli_connect($this->_host, $this->_user, $this->_pass);
        if (!$this->_connection) {
            die("Khong the ket noi Mysql");
        }
        $db = 'fashion_mylishop';
        if ($db != '' && !mysqli_select_db($this->_connection, $db,)) {
            die("Khong the mo CSDL $db");
        }
    }
    function setQuery($sql)
    {
        $this->_sql = $sql;
    }
    function loadAllRow()
    {
        if (!($cur = $this->query()))
            return null;
        while ($row = mysqli_fetch_assoc($cur)) {
            $array[] = $row;
        }
        mysqli_free_result($cur);
        return $array;
    }
    function query()
    {
        $this->_cursor = mysqli_query($this->_connection, $this->_sql);
        return $this->_cursor;
    }
    function disconnect()
    {
        mysqli_close($this->_connection);
    }
}

class Process_product extends database
{
    function Get_list($sql)
    {
        $data = new database();
        $data->setQuery($sql);
        $result = $data->LoadAllRow();
        // $data->disconnect();
        return $result;
    }

    function Print()
    {
        $arr = $this->Get_list('SELECT * from products');
        if ($arr <> 0) {
            foreach ($arr as $product) {
                if ($product['image'] == null || $product['image'] == "") $product["image"] = '';
                else  $product["image"] = '../' .  $product["image"];
                echo ' 
                                <tr>
                                    <td>' . $product['id'] . '</td>
                                    <td>' . $product['name'] . '</td>
                                    <td>' . $product['category_id'] . '</td>
                                    <td><img  width= "100px" src="' . $product['image'] . '" alt=""></td>
                                    <td>' . $product['price'] . '</td>
                                    <td>' . $product['saleprice'] . '</td>
                                    <td><a href="./add-product.php?id=' . $product['id'] . '"><i class="m-r-10 mdi mdi-lead-pencil"></i></a></td>
                                    <td> <a href="../php/delete.php?id=' . $product['id'] . '"><i class="m-r-10 mdi mdi-refresh"></i></a> </td>
                                </tr>    
                                
                             ';
            }
        } else {
            echo "Nothing to show";
        }
    }

    function Print_category()
    {
        $arr = $this->Get_list('SELECT * from categories');
        if ($arr <> 0) {
            foreach ($arr as $category) {
                echo ' 
                    <option value= "' . $category['id'] . '">' . $category['name'] . '</option>
                    ';
            }
        } else {
            echo "Nothing to show";
        }
    }
    function Print_category1(int $id)
    {
        $arr = $this->Get_list('SELECT * from categories');
        if ($arr <> 0) {
            foreach ($arr as $category) {
                if ($id == $category['id']) {
                    $select = "selected";
                } else {
                    $select = "";
                }
                echo ' 
                    <option ' . $select . ' value= "' . $category['id'] . '">' . $category['name'] . '</option>
                    ';
            }
        } else {
            echo "Nothing to show";
        }
    }
    function Print_card()
    {
        $arr = $this->Get_list('SELECT * from products');
        if ($arr <> 0) {
            foreach ($arr as $product) {
                if ($product['image'] == null || $product['image'] == "") $product["image"] = '';
                else  $product["image"] = '../' .  $product["image"];
                echo '
                                  <div class="card">
                                    <div class="imgBx">
                                        <img src="' . $product['image'] . '" alt="images">
                                    </div>
                                    <div class="details">
                                        <h2>' . $product['name'] . '</h2>
                                        <a class="button-34" href="./detail.php?id=' . $product['id'] . '">Mua ngay</a>
                                    </div>
                                </div>
                                
                             ';
            }
        } else {
            echo "Nothing to show";
        }
    }

    function Print_Detail($id)
    {
        $sql = 'SELECT * from products WHERE id =' . $id;
        $product = $this->Get_list($sql);
        if ($product <> 0) {
            $product = $product[0];
            if ($product['image'] == null || $product['image'] == "") $product["image"] = '';
            else  $product["image"] = '../' .  $product["image"];
            echo '
                                  <div class="card">
                                    <div class="imgBx">
                                        <img src="' . $product['image'] . '" alt="images">
                                    </div>
                                    <div class="details">
                                        <h2>' . $product['name'] . '</h2>
                                        <a class="button-34" href="./detail.php?id=' . $product['id'] . '">Mua ngay</a>
                                    </div>
                                </div>


                                 <div id="container">
                                    <div class="product-details">
                                        <h1>' . $product['name'] . '</h1>
                                        <span class="hint-star star">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </span>
                                        <p class="information">" Mua hàng ngay</p>
                                        <p class="information">"Mua hàng luôn</p>
                                        <p class="information">"buy it please</p>
                                        <div class="control">

                                            <button class="btn">
                                              
                                                   <a href="./cart.php?id=' . $product['id'] . '">
                                                     <span class="price">' . $product['price'] . '</span>
                                                <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                                <span class="buy">Get now</span>
                                                   </a>
                                            </button>

                                        </div>

                                    </div>

                                    <div class="product-image">

                                        <img src="' . $product['image'] . '"
                                            alt="">


                                        <div class="info">
                                            <h2> Description</h2>
                                            <ul>
                                                <li><strong>Height : </strong>5 Ft </li>
                                                <li><strong>Shade : </strong>Olive green</li>
                                                <li><strong>Decoration: </strong>balls and bells</li>
                                                <li><strong>Material: </strong>Eco-Friendly</li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                                            
                             ';
        } else {
            echo "Nothing to show";
        }
    }
    function Add_to_cart($idUser, $id, $quantity)
    {
        $sql = 'SELECT * from add_to_cart where id=' . $id;
        $data = $this->Get_list($sql);
        foreach ($data as $product) {
            if ($id === $product['id']) {
                
            }
        }
    }
    function RenderData($idUser)
    {
        $sql = 'SELECT * from add_to_cart ';
        //WHERE id_user =' . $idUser
        $data = $this->Get_list($sql);
        if ($data <> 0) {
            foreach ($data as $product)
                $sqlGetImage = 'SELECT image from products WHERE id =' . $product['id'];
            $getImage = $this->Get_list($sqlGetImage);
            echo '
                        <div class="item">
                            <div class="buttons">
                                <span class="delete-btn">X</span>
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
                                <button class="plus-btn" type="button" name="button">
                                    +
                                </button>
                                <input type="text" class="abc" name="name" value="1">
                                <button class="minus-btn" type="button" name="button">
                                    -
                                </button>
                            </div>
                            <div class="total-price">' . $product["price"] . '</div>
                        </div>
                                                            
                             ';
        } else {
            echo "Nothing to show";
        }
    }
}