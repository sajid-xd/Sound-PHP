<?php
session_start();
include "db.php";

// REGISTER...

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = 2;

    $query = mysqli_query($con,"INSERT INTO users (name, username, password, usertype) VALUES ('$name', '$username', '$password', '$usertype')");

    if($query){
        $_SESSION['success'] = "Created";
        header('location:login.php');
    }

}

// LOGIN...

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $qu2 = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND usertype = 2");

    if (mysqli_num_rows($qu2) > 0) {
        $user = mysqli_fetch_assoc($qu2);

        if ($user['password'] === $password) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['usertype'] = $user['usertype'];

            header('Location: index.php');
            exit();
        } else {
            $_SESSION['error'] = "Oops! Incorrect password!";
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Username not found or not a regular user!";
        header('Location: login.php');
        exit();
    }
}

?>