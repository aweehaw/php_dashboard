<?php

// Turn this off when diagnosing...
error_reporting(0);
ini_set('display_errors', 0);
// until this line.

unset($_SESSION['id']);
unset($_SESSION['email']);

session_start();

$error_login = " ";

if($_GET["login"] == "wrong") {
    $error_login = "<br>The username or password is incorrect.<br>";
 }
 if($_GET["login"] == "missing") {
    $error_login = "<br>Enter your username and password.<br>";
 }
 if($_GET["login"] == "noresult") {
    $error_login = "<br>Cannot find login information.<br>";
 }
 if($_GET["login"] == "index") {
    $error_login = "";
 }
 else {
     session_destroy();
 }
 ?>

<html>
<head>
    <title>Login - MyDashboard</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="login_start.php" method="post">
                            <h3 class="text-center text-info">Welcome to MyDashboard</h3>
                            <br>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <small><?php echo $error_login; ?></small>
                                <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="register.php" class="text-info">Forgot password?</a>
                                &nbsp;
                                <a href="register.php" class="text-info">Register here</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</body>
</html>