<?php

require_once __DIR__ . "/Connection.php";

class ClientMethods extends Connection
{


    // function for get client information

    public function GetOneClient($idClient)
    {
        $query = "SELECT * FROM `users` WHERE  id='$idClient'";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    // update client information
    public function UpdateClient($idClient, $Fname, $Lname, $new_name, $phone, $email)
    {
        $query = "UPDATE `users` SET `first_name` = '$Fname',`last_name` = '$Lname', `avatar` = '$new_name', `phone` = '$phone',`email` = '$email' WHERE id = '$idClient' ";
        $log = $this->connect()->prepare($query);
        $res = $log->execute();
        return $res;
    }


    // function for checking email if already exist

    public function check($email)
    {
        $query = "SELECT * FROM `users` WHERE  email='$email'";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    // function for sign up

    // public function SignUp($Fname, $Lname, $phone, $email, $hashed_password, $role,$city,$signed_at)
    // {

    //     if ($this->check($email) == null) {
    //         $query = "INSERT INTO users (first_name, last_name, avatar, phone, email, password , role, city, signed_at ) VALUES ( '$Fname', '$Lname', 'default.png', '$phone', '$email', '$hashed_password' , '$role', '$city','$signed_at' )";
    //         $log = $this->connect()->prepare($query);
    //         $log->execute();
    //         if ($log) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }
    // }

    public function SignUp($Fname, $Lname, $phone, $email, $hashed_password, $role, $city, $signed_at)
    {

        $query = "INSERT INTO users (first_name, last_name, avatar, phone, email, password , role, city, signed_at ) VALUES ( '$Fname', '$Lname', 'default.png', '$phone', '$email', '$hashed_password' , '$role', '$city','$signed_at' )";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log) {
            return true;
        } else {
            return false;
        }
    }

    // sign in client function

    public function SignIn($email)
    {
        $query = "SELECT * FROM `users` WHERE  email = '$email' AND role = 'client' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to create a new post for client

    public function CreatePost($idClient, $idCategory, $post_title, $description, $new_name, $city)
    {
        $query = "INSERT INTO posts (idClient, idCategory, post_title, description, images, city) VALUES ( '$idClient', '$idCategory', '$post_title', '$description', '$new_name', '$city')";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log) {
            return true;
        } else {
            return false;
        }
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


    // function to get all posts

    public function GetAllPosts()
    {
        $query = "SELECT * FROM `posts` ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    // function to search for posts by city and category

    public function SearchPosts($idCategory, $city)
    {
        $query = "SELECT * FROM `posts` P,`categories` C WHERE P.idCategory = '$idCategory' AND `city` = '$city' AND P.idCategory = C.id";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // function to search for posts by city

    public function SearchPostsByCity($city)
    {
        $query = "SELECT * FROM `posts` WHERE `city` = '$city'";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // function to search for posts by category

    public function SearchPostsByCategory($idCategory)
    {
        $query = "SELECT * FROM `posts` P,`categories` C WHERE P.idCategory = '$idCategory' AND P.idCategory = C.id ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    // get time ago function
    public function get_time_ago()
    {
        $query = "SELECT created_at FROM `posts` ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    // get my posts function
    public function MyPosts($idClient)
    {
        $query = "SELECT * FROM `posts` P,`users` U WHERE P.idClient = '$idClient' and P.idClient = U.id ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get post by id 

    public function MySinglePost($idPost)
    {
        $query = "SELECT * FROM `posts` WHERE idPost = '$idPost' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // delete post function

    public function DeleteMyPost($idPost)
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


    // get post by id 

    public function GetComments($idPost)
    {
        $query = "SELECT * FROM `comments` C,`posts` P, `users` U WHERE C.idPost = '$idPost' and C.idPost = P.idPost and C.idWorker = U.id";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // get total of comments
    public function TotalComments($idPost)
    {
        $query = "SELECT * FROM `comments` WHERE idPost = '$idPost' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $total = $log->rowCount();
        return $total;
    }


    // function for get one comment

    public function GetOneComment($idComment)
    {
        $query = "SELECT * FROM `comments` WHERE  idComment ='$idComment' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    }


    // Function for report comment

    public function ReportComment($idUser, $idComment, $topic)
    {
        $query = "INSERT INTO `reports` (`idUser`, `idComment`, `topic`) VALUES ('$idUser','$idComment','$topic')";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log) {
            return true;
        } else {
            return false;
        }
    }
}
