<?php

require_once __DIR__ . "/Connection.php";

class ClientMethods extends Connection
{
    public function check($email)
    {
        $query = "SELECT * FROM `client` WHERE  email='$email'";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function SignUp($Fname, $Lname, $email, $hashed_password)
    {

        if ($this->check($email) == null) {
            $query = "INSERT INTO client (first_name, last_name, email, password , role) VALUES ( '$Fname', '$Lname',  '$email', '$hashed_password' , 'client')";
            $log = $this->connect()->prepare($query);
            $log->execute();
            if ($log) {
                return true;
            } else {
                return false;
            }
        }
    }

    // sign in client function

    // public function SignIn($email, $role)
    public function SignIn()
    {
        // $query = "SELECT * FROM `client` WHERE  email='$email' AND role = '$role'";
        $query = "SELECT * FROM `client`";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
}
