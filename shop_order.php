<?php
    require "db.php";
?>

<?php

function save_order()
{
    if (isset($_SESSION["shopping_cart"]))
    {
        $now_item_id = $_POST['hidden_id'];
        $uid = $_SESSION['logged_user']->id;

        $key_value_ar = R::getAll('SELECT `item_id` FROM `order` WHERE `user_id` = ?', array($uid));

        $item_id_in_db =array();
        foreach ($key_value_ar as $yeah_baby) {
            foreach ($yeah_baby as $key => $value ) {
                array_push($item_id_in_db, $value);
            }
        }

        if (in_array($now_item_id,$item_id_in_db))
        {
            $findne = R::getAll('SELECT `id` FROM `order` WHERE `user_id` = ? AND `item_id` = ?', [$uid, $now_item_id]);

            $id_in_db =array();
            foreach ($findne as $yeah_baby) {
                foreach ($yeah_baby as $key => $value ) {
                    array_push($id_in_db, $value);
                }
            }

            $updateOrder = R::load('order', $id_in_db[0]);
            $updateOrder->item_quantity = $_POST['quantity'];
            $updateOrder->price = $_POST['hidden_price']*$_POST['quantity'];
            R::store($updateOrder);
        }
        else {
            $order = R::dispense('order');
            $order->item_id = $_POST['hidden_id'];
            $order->user_id = $_SESSION['logged_user']->id;
            $order->price = $_POST['hidden_price']*$_POST['quantity'];
            $order->item_quantity = $_POST['quantity'];
            R::store($order);
        }
    }
    else{
        $order = R::dispense('order');
        $order->item_id = $_POST['hidden_id'];
        $order->user_id = $_SESSION['logged_user']->id;
        $order->price = $_POST['hidden_price']*$_POST['quantity'];
        $order->item_quantity = $_POST['quantity'];
        R::store($order);
    }
}


if(isset($_POST["add_to_cart"]))
{

    save_order();
}

if(isset($_GET["delete"]))
{
    $our_order = R::exportAll($_SESSION["shopping_cart"]);
    foreach ($our_order as $keys => $values)
    {

        if($values["item_id"] == $_GET["id"])
        {
            $deleteOrder = R::load('order', $values["id"]);
            R::trash($deleteOrder);

        }
    }
}

header('Location: /shop.php');

?>
