<?php
    require "db.php";
?>


<?php

if (isset($_POST['add_products'])){
    $add_product = R::dispense('products');
    $add_product->name = $_POST['name'];
    $add_product->price = $_POST['price'];
    $add_product->image = "5.jpg";
    R::store($add_product);
}

if (isset($_POST['delete_products'])){
    $rm_product = R::load('products',$_POST['id']);
    R::trash($rm_product);
}



header('Location: /secret.php');


?>
