<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <form action="<?=$MDMBank->getURL()?>" method="POST">
            <input type="hidden" name="AMOUNT" value="" />
            <input type="hidden" name="CURRENCY" value="" />
            <input type="hidden" name="DESC" value="" />
            <input type="hidden" name="MERCH_NAME" value="" />
            <input type="hidden" name="MERCH_URL" value="" />
            <input type="hidden" name="TERMINAL" value="" />
            <input type="hidden" name="EMAIL" value="" />
            <input type="hidden" name="TRTYPE" value="" />
            <input type="hidden" name="COUNTRY" value="" />
            <input type="hidden" name="MERC_GMT" value="" />
            <input type="hidden" name="TIMESTAMP" value="" />
            <input type="hidden" name="BACKREF" value="" />
            <input type="hidden" name="ORDER" value="" />
        </form>
    </body>
</html>
