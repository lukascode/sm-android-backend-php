<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Android backend</title>
    </head>

    <body>
        <h2>Hello Android</h2>
        <?php
            require_once('messagedao.php');
            $messagedao = new MessageDAO();
            $message = new Message(0, 4, 6, 'Tomorrow Im goting to back to home');
            $messagedao->add($message);
            echo '<pre>';
            //print_r($messages);
            echo '</pre>';
         ?>
    </body>

</html>
