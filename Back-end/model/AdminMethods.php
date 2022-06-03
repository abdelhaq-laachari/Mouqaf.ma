<?php

require_once __DIR__ . "/Connection.php";

class AdminMethods extends Connection
{
    // sign in client function

    public function SignInAdmin($email, $password)
    {
        $query = "SELECT * FROM `users` WHERE  email = '$email' AND password = '$password' AND role = 'admin' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    // Get admin information

    public function GetAdmin()
    {
        $query = "SELECT * FROM `users` WHERE  role = 'admin' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get all clients

    public function GetClients()
    {
        $query = "SELECT * FROM `users` WHERE  role = 'client' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get all workers

    public function GetWorkers()
    {
        $query = "SELECT * FROM `users` WHERE  role = 'worker' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get total of new users

    public function GetNewUsers()
    {
        $query = "SELECT signed_at ,count(id) as total from users where role = 'client' group by signed_at ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get total of new users

    public function GetDates()
    {
        $query = "SELECT DISTINCT signed_at FROM `users` ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get total of posts

    public function GetTotalPosts()
    {
        $query = "SELECT COUNT(idPost) AS NumberOfPosts FROM posts";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get total of comments

    public function GetTotalComments()
    {
        $query = "SELECT COUNT(id) AS NumberOfComments FROM comments";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get total of category's

    public function GetTotalCategory()
    {
        $query = "SELECT COUNT(id) AS NumberOfCategory FROM categories";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get total of category's

    public function GetTotalUsers()
    {
        $query = "SELECT COUNT(id) AS NumberOfUsers FROM users";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // function to get all posts

    public function GetAllPosts()
    {
        $query = "SELECT * FROM `posts` ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get all reports 
    // SELECT * FROM `reports` R,`users` U,`comments` C  WHERE R.idUser = '37'  AND R.iduser = U.id AND R.idComment = C.id;
}
