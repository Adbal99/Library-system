<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Library</title>
</head>

<body>
    <?php require_once __DIR__ . "./_navbar.php"; ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-5 text-center">
                <h1 class="mb-5">List of books..</h1>
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- data from query.. (BookController) -->
                        <?php

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo  '<tr>
                            <form action="/book/' . $row['book_id'] . '/delete" method="post">
                            <th scope="row">' . $row['book_id'] . '</th>
                            <td>' . $row['title'] . '</td>
                            <td>' . $row['author'] . '</td>
                            <td>' . $row['category'] . '</td>
                            <td>
                            <a href="/book/' . $row['book_id'] . '" class="btn-info text-white w-100 px-3 py-1 rounded-pill text-decoration-none ">Edit</a>
                            </td>
                            <td>
                            <input type="hidden"  name="deleteBookId" value="' . $row['book_id'] . '">
                            <input type=submit class="btn-danger text-white rounded-pill " value=Delete name=deleteBook>
                            </td>
                            </form>
                        </tr>';
                            }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>