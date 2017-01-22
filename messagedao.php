<?php
    require_once('message.php');
    require_once('connect.php');

    class MessageDAO {

        public function get($id) {
            $conn = getDBConnection();
            $sql = 'SELECT * FROM messages WHERE id='.$id;
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $message = new Message($row['id'], $row['id_sender'], $row['id_receiver'], $row['message'], $row['ts']);
                $conn->close();
                return $message;
            }
            $conn->close();
            return null;
        }

        public function getMessages($who, $id) {
            $conn = getDBConnection();
            $messages = array();
            $sql = "SELECT * FROM messages WHERE $who=".$id;
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $message = new Message($row['id'], $row['id_sender'], $row['id_receiver'], $row['message'], $row['ts']);
                    array_push($messages, $message);
                }
            }
            $conn->close();
            return $messages;
        }

        public function getSenderMessages($id) {
            return $this->getMessages('id_sender', $id);
        }

        public function getReceiverMessages($id) {
            return $this->getMessages('id_receiver', $id);
        }

        public function add($message) {
            $result = true;
            $conn = getDBConnection();
            $sql = "INSERT INTO messages(id, id_sender, id_receiver, message) VALUES ".
            "(null, $message->id_sender, $message->id_receiver, '$message->message')";
            if($conn->query($sql) === FALSE) { $result = false; }
            $conn->close();
            return $result;
        }

    }

 ?>
