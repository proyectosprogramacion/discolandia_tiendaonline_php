<?php
require_once("config.php");
?>

<?php

/****************************Front Catalog ************************/


if (isset($_GET['add_catalog'])) {
    $query = query("SELECT * FROM products Where product_id=" . escape_string($_GET['add_catalog']) . "");
    confirm($query);

    while ($row = fetch_array($query)) {
        if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add_catalog']]) {
            $_SESSION['product_' . $_GET['add_catalog']] += 1;
            redirect("../ecommerce_v.27/app/catalog.php");
        } else {
            set_message("Solo tenemos  " . $row['product_quantity'] . " " . $row['product_title'] . " disponibles.");
            redirect("../ecommerce_v.27/app/catalog.php");
        }
    }


}



if (isset($_GET['add_icon_catalog'])) {
    $query = query("SELECT * FROM products Where product_id=" . escape_string($_GET['add_icon_catalog']) . "");
    confirm($query);

    while ($row = fetch_array($query)) {
        if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add_icon_catalog']]) {
            $_SESSION['product_' . $_GET['add_icon_catalog']] += 1;
            redirect("../ecommerce_v.27/app/checkout.php");
        } else {
            set_message("Solo tenemos  " . $row['product_quantity'] . " " . $row['product_title'] . " disponibles.");
            redirect("../ecommerce_v.27/app/checkout.php");
        }
    }


}




if (isset($_GET['remove_catalog'])) {
    $_SESSION['product_' . $_GET['remove_catalog']]--;

    if ($_SESSION['product_' . $_GET['remove_catalog']] < 1) {
        //unset — Destroys one or more specified variables

        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../ecommerce_v.27/app/checkout.php");

    } else {
        redirect("../ecommerce_v.27/app/checkout.php");

    }

}





if (isset($_GET['delete_catalog'])) {
    $_SESSION['product_' . $_GET['delete_catalog']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../ecommerce_v.27/app/checkout.php");

}





/****************************Front Merchandising ************************/

if (isset($_GET['add_merchandising'])) {
    $query = query("SELECT * FROM merchandising  Where merchand_id =" . escape_string($_GET['add_merchandising']) . "");
    confirm($query);

    while ($row = fetch_array($query)) {
        echo $row['merchand_price'];
        if ($row['merchand_quantitiy'] != $_SESSION['merchand_' . $_GET['add_merchandising']]) {
            $_SESSION['merchand_' . $_GET['add_merchandising']] += 1;
            redirect("../ecommerce_v.27/app/merchandising.php");
        } else {
            echo $row['merchand_quantitiy'];
            set_message("Solo tenemos  " . $row['merchand_quantitiy'] . " " . $row['merchand_title'] . " disponibles.");
            redirect("../ecommerce_v.27/app/merchandising.php");
        }
    }


}






if (isset($_GET['add_icon_merchandising'])) {
    $query = query("SELECT * FROM merchandising  Where merchand_id=" . escape_string($_GET['add_icon_merchandising']) . "");
    confirm($query);

    while ($row = fetch_array($query)) {
        if ($row['merchand_quantitiy'] != $_SESSION['merchand_' . $_GET['add_icon_merchandising']]) {
            $_SESSION['merchand_' . $_GET['add_icon_merchandising']] += 1;
            redirect("../ecommerce_v.27/app/checkout.php");
        } else {
            set_message("Solo tenemos  " . $row['merchand_quantitiy'] . " " . $row['merchand_title'] . " disponibles.");
            redirect("../ecommerce_v.27/app/checkout.php");
        }
    }


}


if (isset($_GET['remove_merchandising'])) {
    $_SESSION['merchand_' . $_GET['remove_merchandising']]--;

    if ($_SESSION['merchand_' . $_GET['remove_merchandising']] < 1) {
        //unset — Destroys one or more specified variables

        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../ecommerce_v.27/app/checkout.php");

    } else {
        redirect("../ecommerce_v.27/app/checkout.php");

    }

}


if (isset($_GET['delete_merchandising'])) {
    $_SESSION['merchand_' . $_GET['delete_merchandising']] = '0';
    //unset — Destruye una o más variables especificadas
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../ecommerce_v.27/app/checkout.php");

}










function cart()
{
    //variables used
    $total_catalog = 0;
    $item_quantity_catalog = 0;
    $item_name_catalog = 1;
    $item_number_catalog = 1;
    $amount_catalog = 1;
    $quantity_catalog = 1;

    $total_merchan = 0;
    $item_quantity_merchan = 0;
    $item_name_merchan = 1;
    $item_number_merchan = 1;
    $amount_merchan = 1;
    $quantity_merchan = 1;

    $catalog_total = 0;
    $catalog_total_quantity = 0;
    $merchan_total = 0;
    $merchan_total_quantity = 0;

    foreach ($_SESSION as $name => $value) {

        if ($value > 0) {

            //Product

            if (substr($name, 0, 8) == "product_") {

                $length = strlen($name) - 8;
                $id = substr($name, 8, $length);


                $query = query("SELECT * FROM products WHERE product_id= " . escape_string($id) . " ");
                confirm($query);

                while ($row = fetch_array($query)) {
                    $sub = $row['product_price'] * $value;
                    $item_quantity_catalog += $value;
                    $product_image = display_image($row['product_image']);


                    $product = <<<DELIMETER
         <tr>
            <td class="align-middle">{$row['product_title']}<br>
            <img src="{$product_image}" style="width: 2rem;">
            </td>
            <td class="align-middle" >{$row['product_price']} €</td>
            <td class="align-middle" >{$value}</td>
            <td class="align-middle" >{$sub} €</td>              
            <td class="align-middle">
            <div class="bt-group">
            <button class="btn" type="button"><a class="btn btn-black" href="../cart.php?add_icon_catalog={$row['product_id']}"><i class="bi bi-cart-plus-fill" style="font-size: 20px;"></i>
            </a></button>
            <button class="btn" type="button" > <a class="btn btn-black" href="../cart.php?remove_catalog={$row['product_id']}"><i class="bi bi-cart-dash-fill" style="font-size: 20px;"></i></a>
            </button>
            <button class="btn" type="button"><a class="btn btn-black" href="../cart.php?delete_catalog={$row['product_id']}"><i class="bi bi-trash-fill" style="font-size: 20px;"></i></a>
            </button>
            </div>
            
            </td>

            <input type="hidden" name="item_name_{$item_name_catalog}" class="form-control"  value="{$row['product_title']}">
            <input type="hidden" name="item_number_{$item_number_catalog}" class="form-control"  value="{$row['product_id']}">
            <input type="hidden" name="amount_{$amount_catalog}" class="form-control"  value="{$row['product_price']}">
            <input type="hidden" name="quantity_{$quantity_catalog}" class="form-control"  value="{$value}"
            >





        DELIMETER;
                    echo $product;
                    $item_name_catalog++;
                    $item_number_catalog++;
                    $amount_catalog++;
                    $quantity_catalog++;

                }

                $catalog_total = $total_catalog += $sub;
                $catalog_total_quantity = $item_quantity_catalog;
                //$_SESSION['item_total_catalog'] = $total_catalog += $sub;
                //$_SESSION['item_quantity_catalog'] = $item_quantity_catalog;
            }

            //Merchandising
            if (substr($name, 0, 9) == "merchand_") {

                $length = strlen($name) - 9;
                $id = substr($name, 9, $length);


                $query = query("SELECT * FROM  merchandising  WHERE  merchand_id = " . escape_string($id) . " ");
                confirm($query);

                while ($row = fetch_array($query)) {
                    $sub = $row['merchand_price'] * $value;
                    $item_quantity_merchan += $value;
                    $merchand_image = display_image($row['merchand_image']);


                    $merchandising = <<<DELIMETER
         <tr>
            <td class="align-middle">{$row['merchand_title']}<br>
            <img src="{$merchand_image}" style="width: 2rem;">
            </td>
            <td class="align-middle" >{$row['merchand_price']} €</td>
            <td class="align-middle" >{$value}</td>
            <td class="align-middle" >{$sub} €</td>              
            <td class="align-middle">
            <div class="bt-group">
            <button class="btn" type="button"><a class="btn btn-black" href="../cart.php?add_icon_merchandising={$row['merchand_id']}"><i class="bi bi-cart-plus-fill" style="font-size: 20px;"></i>
            </a></button>
            <button class="btn" type="button" > <a class="btn btn-black" href="../cart.php?remove_merchandising={$row['merchand_id']}"><i class="bi bi-cart-dash-fill" style="font-size: 20px;"></i></a>
            </button>
            <button class="btn" type="button"><a class="btn btn-black" href="../cart.php?delete_merchandising={$row['merchand_id']}"><i class="bi bi-trash-fill" style="font-size: 20px;"></i></a>
            </button>
            </div>
            
            </td>

            <input type="hidden" name="item_name_{$item_name_merchan}" class="form-control"  value="{$row['merchand_title']}">
            <input type="hidden" name="item_number_{$item_number_merchan}" class="form-control"  value="{$row['merchand_id']}">
            <input type="hidden" name="amount_{$amount_merchan}" class="form-control"  value="{$row['merchand_price']}">
            <input type="hidden" name="quantity_{$quantity_merchan}" class="form-control"  value="{$value}"
            >





        DELIMETER;
                    echo $merchandising;
                    $item_name_merchan++;
                    $item_number_merchan++;
                    $amount_merchan++;
                    $quantity_merchan++;

                }
                $merchan_total = $total_merchan += $sub;
                $merchan_total_quantity = $item_quantity_merchan;


            }
            $_SESSION['item_total'] = $merchan_total + $catalog_total;
            $_SESSION['item_quantity'] = $merchan_total_quantity + $catalog_total_quantity;


        }

    }

    //Botón finalizar compra
    if (isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1) {
        show_button($_SESSION['item_quantity'], $_SESSION['item_total']);
    }
}



function show_button($item_name, $total)
{
    $button = <<<DELIMETER
    <p>
    <br>
        <a href="../app/shopping_cart.php?tx=$item_name&amt=$total" class="btn text-left text-light bg-dark">Finalizar compra</a> 
        </p>
    <br>
    </tr>
DELIMETER;
    echo $button;

}







function print_cart()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = escape_string($_POST['name']);
        $surnames = escape_string($_POST['surnames']);
        $email = escape_string($_POST['email']);
        $phone = escape_string($_POST['phone']);
        $country = escape_string($_POST['country']);
        $province = escape_string($_POST['province']);
        $municipality = escape_string($_POST['municipality']);
        $fulladdress = escape_string($_POST['fulladdress']);
        $postalcode = escape_string($_POST['postalcode']);
        //uniqid() Gets a uniquely prefixed identifier based on the current time in microseconds.
       $order_transaction_id=  uniqid();

        $order_status="pending send";
        $item_quantity= $_SESSION['item_quantity'];
        $item_total= $_SESSION['item_total'];

        
        $insert_buyer = query("INSERT INTO buyer (order_transaction_id , buyer_name , buyer_surnames, buyer_email , buyer_phone, buyer_country , buyer_province,  	buyer_municipality,  buyer_fulladdress,  buyer_postalcode ) VALUES('{$order_transaction_id}','{$username}','{$surnames}','{$email}','{$phone}','{$country}','{$province}' ,'{$municipality}' ,'{$fulladdress}' ,'{$postalcode}')");
        confirm($insert_buyer);

        $insert_orders = query("INSERT INTO orders (order_transaction_id , order_quantity , order_amount , order_status ) VALUES('{$order_transaction_id}','{$item_quantity}','{$item_total}','{$order_status}')");
        confirm($insert_orders);

        redirect("print.php?order_transaction_id=$order_transaction_id");

  }
}


?>