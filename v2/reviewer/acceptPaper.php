<?php 
include 'includes/_header.php';
include 'includes/db.php';
$id_paper=$_GET['id'];
$insert = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $sql = "update datasets set accepted = 1 where _id = $id_paper;";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
            echo "<meta http-equiv='refresh' content='0;url=assigned.php' />";
        } else {
            echo "try again";
        }
}

?>