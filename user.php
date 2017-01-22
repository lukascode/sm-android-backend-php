<?php
    class User {
        public $id;
        public $login;
        public $password;
        public $avatar;
        public $nationality;
        public $skills;
        public $aboutme;

        public function __construct ($id, $login, $password, $avatar, $nationality, $skills, $aboutme) {
            $this->id = $id;
            $this->login = $login;
            $this->password = $password;
            $this->avatar = $avatar;
            $this->nationality = $nationality;
            $this->skills = $skills;
            $this->aboutme = $aboutme;
        }
    }
 ?>
