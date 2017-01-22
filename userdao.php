<?php
    require_once('connect.php');
    require_once('user.php');

    class UserDAO {

        public function getAll() {
            $conn = getDBConnection();
            $users = array();
            $sql = 'SELECT * FROM users';
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $user = new User($row['id'], $row['login'], $row['password'], $row['avatar'],
                                     $row['nationality'], $row['skills'], $row['aboutme']);
                    array_push($users, $user);
                }
            }
            $conn->close();
            return $users;
        }

        public function add($user) {
            $conn = getDBConnection();
            $sql = "INSERT INTO users(null, login, password, avatar, nationality, skills, aboutme) VALUES ";
            $sql .= "($user->id, '$user->login', '$user->password', '$user->avatar', '$user->nationality', '$user->skills', '$user->aboutme')";
            $result = $conn->query($sql);
            return $result;
        }

        public function delete($id) {
            $conn = getDBConnection();
            $sql = 'DELETE FROM users WHERE id='.$id;
            $result = $conn->query($sql);
            $conn->close();
        }

        public function get($id) {
            $conn = getDBConnection();
            $sql = 'SELECT * FROM users WHERE id='.$id;
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $user = new User($row['id'], $row['login'], $row['password'], $row['avatar'],
                                 $row['nationality'], $row['skills'], $row['aboutme']);
                $conn->close();
                return $user;
            }
            $conn->close();
            return null;
        }

        public function getLP($login, $password) {
            $conn = getDBConnection();
            $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $user = new User($row['id'], $row['login'], $row['password'], $row['avatar'],
                                 $row['nationality'], $row['skills'], $row['aboutme']);
                $conn->close();
                return $user;
            }
            $conn->close();
            return null;
        }

        public function existsLogin($login) {
            $exists = false;
            $conn = getDBConnection();
            $sql = "SELECT login FROM users WHERE login='$login'";
            $results = $conn->query($sql);
            if($results->num_rows > 0) $exists = true;
            $conn->close();
            return $exists;
        }

        public function update($user) {
            $result = true;
            $conn = getDBConnection();
            $sql = "UPDATE users SET login='$user->login', password='$user->password', avatar='$user->avatar', " .
            " nationality='$user->nationality', skills='$user->skills', aboutme='$user->aboutme' WHERE id=$user->id";
            if($conn->query($sql) === FALSE) { $result = false; }
            $conn->close();
            return $result;
        }
    }
 ?>
