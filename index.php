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

if ( isset($_POST['account_number']) && ($_POST['account_number']>0) ){ 
    $order = new Order();
    $status = $order->insertOrder($_POST);
    
    if($status>0){
        echo "Запись произведена";
    }
}
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
    <input name="CURRENCY" type="hidden" value="RUB">
 <button type="submit">Пополнить</button>
        </form>
        
    </body>
</html>
