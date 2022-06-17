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
        $query = "SELECT COUNT(idComment) AS NumberOfComments FROM comments";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    
    // get total of reports

    public function GetTotalReports()
    {
        $query = "SELECT COUNT(idReport) AS NumberOfReports FROM reports";
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

    // get total of Users

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



    // function to get all reports and who made the reports

    public function GetAllReports()
    {
        $query = "SELECT * FROM `reports` R,`comments` C  WHERE  R.idComment = C.idComment;";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    // delete reported comment function

    public function DeleteComment($idComment)
    {
        $query = "DELETE FROM `comments` WHERE idComment = '$idComment' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // delete user

    public function DeleteUser($idUser)
    {
        $query = "DELETE FROM `users` WHERE id = '$idUser' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete user post 

    public function DeleteUserPost($idPost)
    {
        $query = "DELETE FROM `posts` WHERE idPost = '$idPost' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log->execute()) {
            return true;
        } else {
            return false;
        }
    }


    
    // update admin information
    public function UpdateAdmin($idAdmin,$Fname,$Lname,$new_name,$phone,$email)
    {
        $query = "UPDATE `users` SET `first_name` = '$Fname',`last_name` = '$Lname', `avatar` = '$new_name', `phone` = '$phone',`email` = '$email' WHERE id = '$idAdmin' ";
        $log = $this->connect()->prepare($query);
        $res = $log->execute();
        return $res;
    }

    
    // function to get all categories

    public function GetCategory()
    {
        $query = "SELECT * FROM `categories` ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    
    // delete Category

    public function DeleteCategory($idCategory)
    {
        $query = "DELETE FROM `categories` WHERE id = '$idCategory' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log->execute()) {
            return true;
        } else {
            return false;
        }
    }

        
    // Function for report comment

    public function AddCategory($name)
    {
        $query = "INSERT INTO `categories`( `name`) VALUES ('$name')";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log) {
            return true;
        } else {
            return false;
        }
    }














    // // function to get all reports

    // public function GetAllReports()
    // {
    //     $query = "SELECT * FROM `reports` R,`users` U , `users` UU,`comments` C ,`posts` P WHERE R.idUser = U.id AND R.idComment = C.id AND C.idPost = P.idPost AND C.idWorker = UU.id";
    //     $log = $this->connect()->prepare($query);
    //     $log->execute();
    //     $res = $log->fetchAll(PDO::FETCH_ASSOC);
    //     return $res;
    // }



    // function for get one report

    // public function GetOneReport($idReport)
    // {
    //     $query = "SELECT * FROM `reports` R,`users` U , `comments` C ,`posts` P WHERE idReport = '$idReport' AND U.id = C.idWorker AND  R.idComment = C.id AND C.idPost = P.idPost";
    //     $log = $this->connect()->prepare($query);
    //     $log->execute();
    //     $res = $log->fetch(PDO::FETCH_ASSOC);
    //     return $res;
    // }

    // get all reports 
    // SELECT * FROM `reports` R,`users` U , `users` UU,`comments` C ,`posts` P WHERE R.idUser = '37' AND R.idUser = U.id AND R.idComment = C.id AND C.idPost = P.idPost AND C.idWorker = UU.id;

}
