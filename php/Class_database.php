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
}
