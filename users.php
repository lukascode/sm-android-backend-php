<?php
    require_once('userdao.php');
    require_once('utils.php');

    $userdao = new UserDAO();

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            if(isset($_GET['id'])) {
                $user = $userdao->get($_GET['id']);
                $user_json = json_encode($user);
                echo $user_json;
            }
            else {
                $users = $userdao->getAll();
                $users_json = json_encode($users);
                echo $users_json;
            }
        break;

        case 'POST':
            $user = json_decode(file_get_contents('php://input'));
            $user->avatar = '';
            $result = $userdao->add($user);
            if($result == true) http_response_code(201);
            else http_response_code(500);
        break;
    }
 ?>
