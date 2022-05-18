<?php

require_once __DIR__ . "/Connection.php";

class WorkerMethods extends Connection
{



    // sign in methods for worker

    public function SignIn($email)
    {
        $query = "SELECT * FROM `users` WHERE  email='$email' AND role = 'worker' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
}