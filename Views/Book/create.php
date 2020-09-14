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
    <?php include "$_SERVER[DOCUMENT_ROOT]/Views/_navbar.php"; ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-5">
                <div class="text-center py-5">
                    <h1>Add a new Book!</h1>
                </div>
                <form action="/" method="POST">
                    <div class="form-group py-3">
                        <label for="title">Book </label>
                        <input type="text" onkeyup="validateForm()" class="form-control" id="title" name="title" aria-describedby="textHelp" placeholder="What's the title?">
                        <p id="errorTitle" class="text-danger font-weight-bold"></p>
                    </div>
                    <div class="input-group mb-3 py-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="authorsSelect">Authors..</label>
                        </div>
                        <select class="custom-select" id="authorsSelect" name="authorsSelect">
                            <option disabled selected>Choose...</option>
                            <?php
                            //fill select with name of authors and value = id
                            if (mysqli_num_rows($authors) > 0) {
                                while ($row = mysqli_fetch_assoc($authors)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                            }
                            ?>


                        </select>
                    </div>
                    <div class="input-group mb-3 py-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="categoriesSelect">Categories..</label>
                        </div>
                        <select class="custom-select" id="categoriesSelect" name="categoriesSelect">

                            <option disabled selected>Choose...</option>
                            <?php

                            //fill select with name of categories and value = id
                            if (mysqli_num_rows($categories) > 0) {
                                while ($row = mysqli_fetch_assoc($categories)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                            }
                            ?>

                        </select>
                    </div>
                    <div class="text-right py-4">
                        <button type="submit" name="bookSubmit" id="bookSubmit" class="btn btn-primary rounded-lg p-2">Add book!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
<script type="text/javascript">
    function validateForm() {
        var name = document.getElementById("title").value;
        var cansubmit = (name.length > 1);
        document.getElementById("bookSubmit").disabled = !cansubmit;
        if (!cansubmit)
            document.getElementById("errorTitle").innerText = "Book title is too short!";
        else
            document.getElementById("errorTitle").innerText = "";
    }
</script>

</html>