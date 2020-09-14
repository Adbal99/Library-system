<?php
require_once './Classes/Database.php';
class CategoryController extends Controller
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
        $query = "SELECT * FROM categories";
        //result is used in view
        $result = $mySql->myConn->query($query);

        require_once("./Views/Category/categories.php");
        $mySql->close();
    }

    public static function store($request, $response, $service, $app)
    {
        if (isset($_POST['categorySubmit'])); {
            $name = $_POST['name'];
            $createdAt  = date("Y-m-d H:i:s");
        }


        $mySql = new Database();
        $mySql->connect();
        $query = "INSERT INTO categories (name, created_at) VALUES ('$name','$createdAt')";
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
        $query = "SELECT * FROM categories";
        //object with id == id in url (example category/1)
        $url_id = $request->id;
        $queryId = "SELECT * FROM categories WHERE id=$url_id";
        $resultId = $mySql->myConn->query($queryId);
        //category object from database with id = id in url
        $firstCategoryObject = mysqli_fetch_assoc($resultId);
        //
        $result = $mySql->myConn->query($query);
        $arrayOfIds = [];


        //checks if requested url is proper

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




        require_once("./Views/Category/edit.php");
        $mySql->close();
    }

    public static function update($request, $response, $service, $app)
    {
        if (isset($_POST['updateCategorySubmit'])); {
            $name = $_POST['name'];
        }

        //put this part as function in database class

        $mySql = new Database();
        $mySql->connect();
        $query = "UPDATE categories SET name='$name' WHERE id=$request->id";
        $mySql->myConn->query($query);

        $mySql->close();
        $response->redirect('/category');
    }
    public static function destroy($request, $response, $service, $app)
    {
        if (isset($_POST['deleteCategory'])) {
            $categoryId = $_POST['deleteCategoryId'];
        }

        //put this part as function in database class

        $mySql = new Database();
        $mySql->connect();
        $query = "DELETE FROM categories WHERE id=$categoryId";
        $mySql->myConn->query($query);

        $mySql->close();
        $response->redirect('/category');
    }
}
