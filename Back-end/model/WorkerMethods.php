<?php

require_once __DIR__ . "/Connection.php";

class WorkerMethods extends Connection
{



    // sign in methods for worker

    public function SignIn($email)
    {
        $query = "SELECT * FROM `users` WHERE  email = '$email' AND role = 'worker' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }


    // function to get post by id
    public function SinglePost($idPost)
    {
        $query = "SELECT * FROM `posts` P ,`users` U WHERE idPost = '$idPost' AND P.idClient = U.id ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    // function to Apply for job


    public function Apply($idPost, $idWorker, $proposal)
    {
        $query = "INSERT INTO comments (idPost, idWorker, proposal) VALUES ( '$idPost', '$idWorker', '$proposal')";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log) {
            return true;
        } else {
            return false;
        }
    }
}
