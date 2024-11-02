<?php
$showError = false;

include "db.php";

$email = $_POST['email'];
$pass = $_POST['password'];
$email = mysqli_real_escape_string($conn, $email);

$sql = "SELECT * FROM auth WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
   

if ($num == 1){
    while($row=mysqli_fetch_assoc($result)){
        // if ($pass == $row['pass']){
        if (password_verify($pass, $row['password'])){

            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['email']=$email;
            if($row['user_type']==1){
                header('location: ../scholar/datasets.php');
            }
            else if($row['user_type']==2){
                header('location: ../viewer/datasets.php');
            }else if($row['user_type']==3){
                header('location: ../reviewer/assigned.php');
            }else if($row['user_type']==4){
                header('location: ../director/datasets.php');
            }else{
                header('location: 404.php');
            }
        }
        else{
            echo "Incorrect password";
        }
    }
} 
else{
    $showError = "Invalid Credentials";
}
?>
