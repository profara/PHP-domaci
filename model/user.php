<?php

class User
{
    public $userID;
    public $username;
    public $password;

    public function __construct($userID, $username = null, $password = null)
    {
        $this->userID = $userID;
        $this->username = $username;
        $this->password = $password;
    }

    public static function loginUser($user, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE username = '$user->username' and password = '$user->password'";

        return $conn->query($query);
    }

}