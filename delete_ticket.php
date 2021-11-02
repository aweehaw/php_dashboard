<html>
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="_styles/custom.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

<?php

include '_includes/connect.php';
include '_includes/session.php';

$_email = $_SESSION['email'];

$current_day = date('j');
$current_month = date('F');
$current_year = date('Y');


if ($_POST['txt_delete']) {
    $_id = $_POST['txt_delete'];
    $_email = $_SESSION['email'];

    $q04 = "DELETE FROM incidents WHERE id = '$_id' AND assigned_email = '$_email'";
    //$q4 = $q04->query;
    $q4 = $link->query($q04);

    if($q4 === TRUE) {
        echo "<br><h4>&nbsp;Deleted!</h4>";
        echo "<p>&nbsp;&nbsp;<small><font color='green'>Record has been deleted.</font></small></p>";
    ?>
    <p>&nbsp;&nbsp;<a href="" onclick="window.opener.location.replace('index.php?h=1');window.close();">Click here to continue.</a></p>
    <?php
    }
    else {
      echo "ERROR: could not execute $q4".mysqli_error($link);
      echo "<br>$link->error";
      echo mysqli_connect_errno() . PHP_EOL;
      echo mysqli_error($link);
    ?>
      <a href="" onclick="window.opener.location.replace('index.php?h=1');window.close();">Okay</a>
    <?php
    }
}

?>