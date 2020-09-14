<?php
require_once './Classes/Database.php';
class RegisterController extends Controller
{
    public static function index()
    {
        require_once "./Views/Register/index.php";
    }
    public static function store($request, $response, $service, $app)
    {
        if (isset($_POST['registerSubmit'])) {
            $userName = $_POST['userName'];
            $userPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
            $created_at = date("Y-m-d H:i:s");
        }
        $mySql = new Database();
        $mySql->connect();
        $query = "INSERT INTO users (username, password, created_at) VALUES ('$userName', '$userPassword', '$created_at')";
        $mySql->myConn->query($query);
        $mySql->close();

        $response->redirect('/');
    }
}
