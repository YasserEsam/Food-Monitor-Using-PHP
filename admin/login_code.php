<?php
session_start();
require_once("../config.php");
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where user_email = '$email' and user_password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_type'] = $row['user_type'];

        header("location:index.php");
    } else {
        echo '<script>
            window.location.href = "login.php";
                alert("login faild, Please Try Again");
            </script>';
    }
}
