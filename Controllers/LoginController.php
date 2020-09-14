<?php
session_start();
require_once './Classes/Database.php';
class LoginController extends Controller
{

    public static function index()
    {
        require_once "./Views/Login/index.php";
    }
    public static function store($request, $response, $service, $app)
    {
        if (isset($_POST['loginSubmit'])) {
            $userName = $_POST['userName'];
            $userPassword = $_POST['userPassword'];
        }
        $mySql = new Database();
        $mySql->connect();
        $query = "SELECT username, password FROM users WHERE username='$userName'";
        $result = $mySql->myConn->query($query);


        //how many results are with matching username and passsword
        $numOfResutls = mysqli_num_rows($result);
        //informs if there is no result
        if ($numOfResutls == 0) {
            //redirects to login page again after 2 seconds
            header("refresh:2;url=http://localhost:8000/login");
            echo "<h2> Incorrect username or password - try again </h2>";
        } else {
            $dbUsername = mysqli_fetch_assoc($result);
            //check if given password matches hash in database
            if (password_verify($userPassword, $dbUsername['password'])) {
                $_SESSION['logged_in'] = 1;
                $response->redirect('/');
            } else {
                //redirects to login page again after 2 seconds
                header("refresh:2;url=http://localhost:8000/login");
                echo "<h2> Incorrect password! - try again </h2>";
            }
        }
        $mySql->close();
    }
}
