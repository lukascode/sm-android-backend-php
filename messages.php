<?php
    require_once('messagedao.php');

    $messagedao = new MessageDAO();

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            if(isset($_GET['id'])) {
                $message = $messagedao->get($_GET['id']);
                $message_json = json_encode($message);
                echo $message_json;
            }
            else if(isset($_GET['id_sender'])) {
                $messages = $messagedao->getSenderMessages($_GET['id_sender']);
                $messages_json = json_encode($messages);
                echo $messages_json;
            }
            else if(isset($_GET['id_receiver'])) {
                $messages = $messagedao->getReceiverMessages($_GET['id_receiver']);
                $messages_json = json_encode($messages);
                echo $messages_json;
            }
        break;

        case 'POST':
            $message = json_decode(file_get_contents('php://input'));
            $rmessage = new Message(0, $message->id_sender, $message->id_receiver, $message->message);
            $result = $messagedao->add($rmessage);
            if($result == true) http_response_code(201);
            else http_response_code(500);
        break;
    }

 ?>
