<?php
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "db.php";
    $name = $_POST["name"];
    $name = mysqli_real_escape_string($conn, $name);
    $email = $_POST['email'];
    $userType = $_POST['userType'];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $existSql = "SELECT * FROM `auth` WHERE email= '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if (strlen($password) < 5) {
        $showError = "password too small";
    } else {
        if ($numExistRows > 0) {
            $showError = "email already exists";
        } else {
            if (($password == $cpassword)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO auth (password, email, user_type) VALUES ('$hash', '$email', '$userType');";

                $result = mysqli_query($conn, $sql);
                $sql2 = "INSERT INTO profile (name, email) VALUES ('$name', '$email');";

                $result2 = mysqli_query($conn, $sql2);


                if ($result && $result2) {
                    $_SESSION['name'] = $name;
                    header('location: login.php');
                    $showAlert = true;
                }
            } else {
                $showError = "Passwords do not match";
            }
        }
    }
}


echo $showError;
