<?php
$showError = false;

include "../includes/db.php";

$email = $_POST['email'];
$pass = $_POST['password'];
$email = mysqli_real_escape_string($conn, $email);

$sql = "SELECT * FROM myself WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
   

if ($num == 1){
    while($row=mysqli_fetch_assoc($result)){
        if ($pass == $row['password']){
        // if (password_verify($pass, $row['password'])){

            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['email']=$email;
                header('location: ../datasets.php');
            
        }
        else{
            header('location: 404.php');
            $showError = "Invalid Password";
        }
    }
} 
else{
    $showError = "Invalid Credentials";
}
?>
