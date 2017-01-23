<?php
    require_once('userdao.php');
    require_once('utils.php');

    $userdao = new UserDAO();

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            if(isset($_GET['login'])) {
                $exists = $userdao->existsLogin($_GET['login']);
                if($exists == true) echo '{ "exists": "yes"}';
                else echo '{ "exists": "no"}';
            }
        break;

        case 'POST':
            $lp = json_decode(file_get_contents('php://input'));
            $user = $userdao->getLP($lp->login, $lp->password);
            if($user != null) echo json_encode($user);
            else echo '{}';
        break;
    }


 ?>
