<?php

    class Message {
        public $id;
        public $id_sender;
        public $id_receiver;
        public $message;
        public $ts;

        public function __construct($id, $id_sender, $id_receiver, $message, $ts='') {
            $this->id = $id;
            $this->id_sender = $id_sender;
            $this->id_receiver = $id_receiver;
            $this->message = $message;
            $this->ts = $ts;
        }
    }

 ?>
