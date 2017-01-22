<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    class Response {
        public $status;
        public $message;

        public function __construct($status, $message) {
            $this->status = $status;
            $this->message = $message;
        }

    }
 ?>
