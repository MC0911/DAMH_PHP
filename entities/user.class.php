<?php
require_once("config/db.class.php");

class User {
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;
    public $user_address;
    public $user_phonenumber;

    public function __construct($user_name, $user_email, $user_password, $user_address, $user_phonenumber) {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_password = $user_password;
        $this->user_address = $user_address;
        $this->user_phonenumber = $user_phonenumber;
    }

    public static function login($user_email, $user_password) {
        $db = new Db();
        $sql = "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password'";
        $result = $db->select_to_array($sql);
        if ($result && count($result) > 0) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function register() {
        $db = new Db();
        $sql_check = "SELECT * FROM users WHERE user_email='$this->user_email'";
        $result_check = $db->select_to_array($sql_check);
        if ($result_check && count($result_check) > 0) {
            return false;
        } else {
            $sql_register = "INSERT INTO users (user_name, user_email, user_password, user_address, user_phonenumber) VALUES ('$this->user_name', '$this->user_email', '$this->user_password', '$this->user_address', '$this->user_phonenumber')";
            $result_register = $db->query_excute($sql_register);
            if ($result_register) {
                return true;
            } else {
                return false;
            }
        }
    }
    public static function getUserInfoByEmail($user_email) {
        $db = new Db();
        $sql = "SELECT * FROM users WHERE user_email='$user_email'";
        $result = $db->select_to_array($sql);
        if ($result && count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }
}
?>
