<?php
require_once './Classes/Database.php';
class BookController extends Controller
{
    public static function index()
    {
        //if not logged - redirect to login page
        if (!isset($_SESSION['logged_in'])) {
            header("Location: http://localhost:8000/login");
            exit();
        }

        $mySql = new Database();
        $mySql->connect();

        $query = "SELECT 
                        title,
                        books.id as book_id,
                        categories.name as category,
                        categories.id as category_id,
                        authors.name as author,
                        authors.id as author_id
                        from books
                    JOIN authors ON books.author_id = authors.id
                    JOIN categories ON  books.category_id = categories.id ";



        $result = $mySql->myConn->query($query);

        require_once("./Views/home.php");

        $mySql->close();
    }

    public static function create()
    {
        //if not logged - redirect to login page
        if (!isset($_SESSION['logged_in'])) {
            header("Location: http://localhost:8000/login");
        }

        $mySql = new Database();
        $mySql->connect();
        $queryCategories = "SELECT * FROM categories";
        $queryAuthors = "SELECT * FROM authors";
        $categories = $mySql->myConn->query($queryCategories);
        $authors = $mySql->myConn->query($queryAuthors);


        require_once("./Views/Book/create.php");
    }

    public static function store($request, $response, $service, $app)
    {

        if (isset($_POST['bookSubmit'])); {
            $author_id = $_POST['authorsSelect'];
            $category_id = $_POST['categoriesSelect'];
            $title = $_POST['title'];
            $createdAt  = date("Y-m-d H:i:s");
        }



        $mySql = new Database();
        $mySql->connect();
        $query = "INSERT INTO books (author_id, category_id, title, created_at)
        VALUES ('$author_id', '$category_id', '$title', '$createdAt')";
        $mySql->myConn->query($query);

        $mySql->close();
        $response->redirect('/');
    }

    public static function edit($request, $response, $service, $app)
    {
        //if not logged - redirect to login page
        if (!isset($_SESSION['logged_in'])) {
            header("Location: http://localhost:8000/login");
            exit();
        }


        $url_id = $request->id;
        $mySql = new Database();
        $mySql->connect();
        $query = "SELECT * FROM books";
        $result = $mySql->myConn->query($query);

        // takes book with id = url/id
        $queryBook = "SELECT title, id, author_id, category_id FROM books WHERE id=$url_id";
        $queryBookResult = $mySql->myConn->query($queryBook);
        $book = mysqli_fetch_assoc($queryBookResult);

        $queryCategories = "SELECT * FROM categories";
        $queryAuthors = "SELECT * FROM authors";

        $categories = $mySql->myConn->query($queryCategories);

        $authors = $mySql->myConn->query($queryAuthors);


        //object with id == id in url (example category/1)



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




        require_once("./Views/Book/edit.php");
        $mySql->close();
    }

    public static function update($request, $response, $service, $app)
    {
        if (isset($_POST['updateBookSubmit'])); {
            $title = $_POST['titleEdit'];
            $authorId = $_POST['authorsSelectEdit'];
            $categoryId = $_POST['categoriesSelectEdit'];
        }



        $mySql = new Database();
        $mySql->connect();
        $query = "UPDATE books SET title='$title', author_id='$authorId', 
        category_id='$categoryId'
         WHERE id=$request->id";
        $mySql->myConn->query($query);
        $mySql->close();
        $response->redirect('/');
    }
    public static function destroy($request, $response, $service, $app)
    {
        if (isset($_POST['deleteBook'])) {
            $bookId = $_POST['deleteBookId'];
        }



        $mySql = new Database();
        $mySql->connect();
        $query = "DELETE FROM books WHERE id=$bookId";
        $mySql->myConn->query($query);

        $mySql->close();
        $response->redirect('/');
    }
}
