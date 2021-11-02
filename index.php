<?php
include '_includes/connect.php';
include '_includes/session.php';
include '_includes/version.php';

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
} else {
?>

<!doctype html>
<html lang="en">

<html>
<head>

    <title><?php echo $_SESSION['first_name']; ?> - MyDashboard  <?php echo $ver; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="_styles/custom.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

    <hr/>

    <blockquote class="blockquote">
        <p class="mb-0">&nbsp;MyDashboard <?php echo $ver; ?></p>
        <p class="lead">
        &nbsp;<small>You are currently logged-in as: <?php echo $_SESSION['email']."&nbsp;"; ?>
        </small>
        </p>
    </blockquote>

    <?php
    include '_includes/navbar.php';
    }
    ?>
    
    <hr/>

    <?php
        if($_GET["h"] == "1") {
            include '_includes/dashboard01.php';
        }
        if($_GET["h"] == "2") {
            include '_includes/dashboard02.php';
        }
    ?>

    <br><br><br>

</body>

</html>