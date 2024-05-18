<?php
include_once './database/DB.php';
class LoginController {

    public function login($username) {
        $db = new DB();
        $sql = "SELECT * FROM `user` WHERE username='$username';";
        $result = $db->executeSQL($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row;
            }
        } else {
            return false;
        }
    }

}
?>