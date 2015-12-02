<?php
    require 'autoload.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Главная страница</title>
    </head>
    <body>
<?php

use MDM\Acquiring\Order as Order;   

$data = filter_input_array(INPUT_POST);

if ( isset($data['account_number']) && ($data['account_number']>0) ){ 
    $order = new Order();
    $order_id = $order->insertOrder($data);
    
    if($order_id>0){
        $order->setOption("TRTYPE", "0");   //устанавливаем статус в 0
        $fields = $order->getFields($order_id);
        var_dump($fields);
    }
} else {
?>
        <h4>Пополнить лицевой счет по софинансированию</h4>
        <form enctype="application/x-www-form-urlecoded" method="POST">
            <div>
               <label for="account_number">Номер лицевого счета</label>
               <input name="account_number" type="text" class="form-control" id="account_number" placeholder="XXXXXX">
            </div>
            <div>
               <label for="amount">Сумма</label>
               <input name="amount" type="text" id="amount" placeholder="XXXX.XX">
            </div>
    <input name="currency" type="hidden" value="RUB">
    <button type="submit">Пополнить</button>
        </form>
 <?php
 }
 ?>       
    </body>
</html>
