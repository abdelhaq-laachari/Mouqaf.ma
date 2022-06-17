<?php
header('Access-Control-Allow-Origin: *'); // * OR https://www.reddit.com/
header('Content-Type: application/json ; charset=utf-8');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
// header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");

require __DIR__ . '/../model/WorkerMethods.php';

class Worker
{



    // sign in function for worker

    public function SignIn()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $new = new WorkerMethods();
        // check if email exists

        $check = $new->SignIn($email);

        if ($check) {
            $verify = password_verify($password, $check['password']);

            if ($verify) {
                http_response_code(200);
                echo json_encode(array("message" => "you're logged as worker", "idWorker" => $check['id']));
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "Password or email is wrong"));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Password or email is wrong"));
        }
    }


    // time of creation post

    public function get_time_ago($time)
    {
        // $time = "2022-06-05 18:01:33";
        $now = time() - 3600;
        $time_difference = $now - $time;

        if ($time_difference < 1) {
            return 'less than 1 second ago';
        }
        $condition = array(
            12 * 30 * 24 * 60 * 60 =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;

            if ($d >= 1) {
                $t = round($d);
                $string = 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
                // echo json_encode($string);
                return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            }
        }
    }

    // get my single post by id

    public function SinglePost($idPost)
    {

        $new = new WorkerMethods();
        $var = $new->SinglePost($idPost);
        foreach ($var as $key => $element) {
            $var[$key]['created_at'] = $this->get_time_ago(strtotime($element['created_at']));
        }

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function to Apply for job
    public function Apply()
    {
        $idPost = $_POST['idPost'];
        $idWorker = $_POST['idWorker'];
        $proposal = $_POST['proposal'];

        $new = new WorkerMethods();
        $var = $new->Apply($idPost, $idWorker, $proposal);

        if ($var) {
            http_response_code(200);
            echo json_encode(array("message" => "you applied for this job"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }


    // get comments by post id
    public function Applied($idWorker)
    {

        $new = new WorkerMethods();
        $var = $new->Applied($idWorker);

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "No comments for now"));
        }
    }
}
