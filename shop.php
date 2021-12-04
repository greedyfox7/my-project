<?php
    require "db.php";

    $order = R::find('order', "`user_id` = ?",array($_SESSION['logged_user']->id));
    $_SESSION["shopping_cart"] = $order;

?>

<?php    if (isset($_SESSION['logged_user'])):?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Магазин</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>
            <style>
        footer a
        {
            position:absolute;
            padding:  10px;
            left: 40%;
            font-size: 37px;
            color: red;
            text-decoration: none;
        }
    </style>
    <footer><a href="/index.php"> Вернуться на главную</a></footer>
    <br><br>
    <br><br>
        <div class="container">
            <h3 align="center">Кошачий магазин</h3><br />
            <br>
            <?php
                $result = R::getAll("SELECT * FROM `products`");
                foreach ($result as $item)
                {
                ?>
                <div class="col-md-3">
                    <form method="post" action="shop_order.php">
                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:13px;" align="center">
                            <img src="source/<?php echo $item["image"]; ?>" class="img-responsive" /><br>
                            <h4 class="text-info"><?php echo $item["name"]; ?></h4><br>
                            <h4 class="text-danger"><?php echo $item["price"]; ?> руб</h4><br>
                            <input type="text" name="quantity" value="1" class="form-control" /><br>
                            <input type="hidden" name="hidden_id" value="<?php echo $item["id"]; ?>" />
                            <input type="hidden" name="hidden_name" value="<?php echo $item["name"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $item["price"]; ?>" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Добавить в корзину" />
                        </div>
                    </form>
                </div>
            <?php
                }
            ?>
            <div style="clear:both"></div>
            <br />
            <h3>Заказы</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Название товара</th>
                        <th width="10%">Количество</th>
                        <th width="20%">Цена</th>
                        <th width="20%">Действие</th>
                    </tr>
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                        $total = 0;
                        $our_order = R::exportAll($_SESSION["shopping_cart"]);
                        foreach ($our_order as $keys => $values)
                        {
                    ?>
                    <tr>
                        <td><?php $order = R::load('products',$values["item_id"]); echo $order->name; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td><?php echo $values["price"]; ?> рублей</td>
                        <td><a href="shop_order.php?delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Удалить</span></a></td>
                    </tr>
                    <?php
                            $total = $total + $values["price"];
                        }
                    ?>
                    <tr>
                        <td colspan="2" align="right">Всего</td>
                        <td align="right"><?php echo number_format($total, 2); ?> рублей</td>
                        <td></td>
                    </tr>
                    <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
    <br><br>

    </body>

</html>

<?php else: {
    header('Location: /error.php');
}
?>

<?php endif; ?>