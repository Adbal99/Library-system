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
                    <h1>Edit a Category!</h1>
                </div>

                <form name="editCategoryForm" action=<?php echo '/category/' . $firstCategoryObject['id'] ?> method="post">
                    <div class="form-group py-3">
                        <label for="title">Name of category</label>
                        <input type="text" onkeyup="validateForm()" value="<?php echo $firstCategoryObject['name']; ?>" class="form-control" name="name" id="name" aria-describedby="textHelp" placeholder="What's the name of category?">
                        <p id="error" class="text-danger font-weight-bold"></p>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="updateCategorySubmit" id="updateCategorySubmit" class="btn btn-primary rounded-lg p-2"> Edit now!</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-4 mt-5 mx-auto">
                <!-- Categoory has been updated! -->
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
        var name = document.getElementById("name").value;
        var cansubmit = (name.length > 2);
        document.getElementById("updateCategorySubmit").disabled = !cansubmit;
        if (!cansubmit)
            document.getElementById("error").innerText = "Category name is too short!";
        else
            document.getElementById("error").innerText = "";
    }
</script>

</html>