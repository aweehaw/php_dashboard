<?php
include '_includes/connect.php';
include '_includes/session.php';

if( $_POST["email"] && $_POST["password"] ) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query01 = "SELECT * FROM users where email='$email'";
    $query02 = $link->query($query01);

    if ($query02->num_rows > 0) {
        while($row = $query02->fetch_assoc()) {
            if ($row['password'] == $pass) {
                include '_includes/session.php';
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                header('Location: index.php?h=1');
            } else {
                header('Location: login.php?login=wrong');               
            }
        }
    } else {
        header('Location: login.php?login=noresult');
    }
    exit();
}

if ( $_POST["password"] == "" || $_POST["email"] == "" ) {
    header('Location: login.php?login=missing');
}

else {
     header('Location: login.php?login=index');
}


mysql_close($link);
?>