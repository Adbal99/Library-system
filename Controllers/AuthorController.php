<?php
require_once './Classes/Database.php';

class AuthorController extends Controller
{

    public static function create()
    {
        //if not logged - redirect to login page
        if (!isset($_SESSION['logged_in'])) {
            header("Location: http://localhost:8000/login");
            exit();
        }


        $mySql = new Database();
        $mySql->connect();
        $query = "SELECT * FROM authors";
        //result is used in view
        $result = $mySql->myConn->query($query);

        require_once("./Views/Author/authors.php");
        $mySql->close();
    }

    public static function store($request, $response, $service, $app)
    {
        if (isset($_POST['authorSubmit'])); {
            $name = $_POST['name'];
            $createdAt  = date("Y-m-d H:i:s");
        }

        $mySql = new Database();
        $mySql->connect();
        $query = "INSERT INTO authors (name, created_at) VALUES ('$name','$createdAt')";
        $mySql->myConn->query($query);

        $mySql->close();
        $service->back();
    }
    public static function edit($request, $response, $service, $app)
    {
        //if not logged - redirect to login page
        if (!isset($_SESSION['logged_in'])) {
            header("Location: http://localhost:8000/login");
            exit();
        }



        $mySql = new Database();
        $mySql->connect();
        $query = "SELECT * FROM authors";
        //object with id == id in url (for example 1 == author/1)
        $url_id = $request->id;
        $queryId = "SELECT * FROM authors WHERE id=$url_id";
        $resultId = $mySql->myConn->query($queryId);
        //author object from database with id = id in url
        $firstAuthorObject = mysqli_fetch_assoc($resultId);

        //
        $result = $mySql->myConn->query($query);
        $arrayOfIds = [];


        //checks if requested url is proper
        //*
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arrayOfIds, $row['id']);
            }
        }


        if (!in_array($url_id, $arrayOfIds)) {
            http_response_code(404);
            echo '404 not found';
            die();
        }
        //*//



        require_once("./Views/Author/edit.php");
        $mySql->close();
    }

    public static function update($request, $response, $service, $app)
    {
        if (isset($_POST['updateAuthorSubmit'])); {
            $name = $_POST['name'];
        }



        $mySql = new Database();
        $mySql->connect();
        $query = "UPDATE authors SET name='$name' WHERE id=$request->id";
        $mySql->myConn->query($query);

        $mySql->close();
        $response->redirect('/author');
    }
    public static function destroy($request, $response, $service, $app)
    {
        if (isset($_POST['deleteAuthor'])) {
            $authorId = $_POST['deleteAuthorId'];
        }



        $mySql = new Database();
        $mySql->connect();
        $query = "DELETE FROM authors WHERE id=$authorId";
        $mySql->myConn->query($query);

        $mySql->close();
        $response->redirect('/author');
    }
}
