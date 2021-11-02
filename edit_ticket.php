<html>
<head>
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

<?php

include '_includes/connect.php';
include '_includes/session.php';

$_email = $_SESSION['email'];

$current_day = date('j');
$current_month = date('F');
$current_year = date('Y');


if ($_POST['txt_id']) {
    $_id = $_POST['txt_id'];
    $_incident = $_POST['txt_incident'];
    $_issue = $_POST['txt_issue'];
    $_resolution = $_POST['txt_resolution'];
    $_month = $_POST['txt_month'];
    $_day = $_POST['txt_day'];
    $_year = $_POST['txt_year'];
  
    if ($_POST['txt_duplicate_incident']) {
      $_duplicateinc = $_POST['txt_duplicate_incident'];
    } else {
      $_duplicateinc = "";
    }

    $_email = $_SESSION['email'];

    $q04 = "UPDATE incidents SET caseid = '$_incident', issue = '$_issue', status = '$_resolution', day_m = '$_month', day_d = '$_day', day_y = '$_year', duplicateof = '$_duplicateinc' WHERE id = '$_id'";
    //$q4 = $q04->query;
    $q4 = $link->query($q04);

    if($q4 === TRUE) {
        echo "<br><h4>&nbsp;Updated!</h4>";
        echo "<p>&nbsp;&nbsp;<small><font color='green'>Record has been updated.</font></small></p>";
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