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


    <div class="container vh-100 position-relative">
        <div class="row justify-content-center">
            <div class="col-6 text-center bg-white rounded-lg shadow-lg  position-absolute center">
                <h2 class="mt-4 mb-5">LOGIN</h2>
                <form action="/login" method="post">
                    <div class="input-group justify-content-center my-5">
                        <div class="input-group-prepend ">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                        </div>
                        <input type="text" onkeyup="validateForm()" class="form-control" style="max-width: 70%;" id="userName" name="userName" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group justify-content-center my-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">Password</span>
                        </div>
                        <input type="password" onkeyup="validateForm()" class=" form-control" style="max-width: 70%;" id="userPassword" name="userPassword" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                    </div>
                    <p id="error" class="text-danger font-weight-bold"></p>

                    <div class="pt-5 w-50 mx-auto">
                        <a href="/register" class="text-decoration-none text-secondary mt-5 font-weight-bold ">
                            <p>Don't have account?</p>
                        </a>
                    </div>

                    <button type="submit" id="loginSubmit" name="loginSubmit" class="btn btn-outline-secondary px-4 my-5">Login</button>
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
        var username = document.getElementById("userName").value;
        var password = document.getElementById("userPassword").value;
        var cansubmit = false;

        if (username.length > 0 && password.length > 0)
            cansubmit = true

        document.getElementById("loginSubmit").disabled = !cansubmit;
        if (!cansubmit)
            document.getElementById("error").innerText = "One of the fields is not filled!";
        else
            document.getElementById("error").innerText = "";
    }
</script>

<style>
    body {
        background-color: #ebebeb;
    }

    .center {
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>