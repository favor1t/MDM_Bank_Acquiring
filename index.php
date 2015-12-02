<?php
    require 'autoload.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Главная страница</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link href="https://dadata.ru/static/css/lib/suggestions-15.10.css" type="text/css" rel="stylesheet" />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    </head>
    <body class="container">
<?php
use MDM\DB\Order as Order;   

if ( isset($_POST['account_number']) && ($_POST['account_number']>0) ){ 
    
    $order = new Order();
    $status = $order->insertOrder($_POST);
    if($status>0){
        echo 'Запись произведена';
    }
}
?>
<?php
    include 'template/step1.php';
?>


<script>
   $(document).ready(function() {
        $("#address").suggestions({
            serviceUrl: "https://dadata.ru/api/v2",
            token: "c7c1bfad6d996122a2c590719be0efae69c219d5",
            type: "ADDRESS",
            count: 5,
            /* Вызывается, когда пользователь выбирает одну из подсказок */
            onSelect: function(suggestion) {
                console.log(suggestion);
            }
        });        
    });
</script>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://dadata.ru/static/js/lib/jquery.suggestions-15.10.min.js"></script>
    </body>
</html>
