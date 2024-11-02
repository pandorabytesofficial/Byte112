<?php 
include 'includes/_header.php';
include 'includes/db.php';
$insert = false;
$id_paper=$_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $reviewer_email = $_POST['reviewer_email'];
    $sql = "INSERT INTO work_assigned (rev_id, paper_id) VALUES ('$reviewer_email', '$id_paper');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        } else {
            echo "try again";
        }

        $sql2 = "UPDATE `datasets` SET `assigned` = 1 WHERE `datasets`.`_id` = '$id_paper'";
    $result2 = mysqli_query($conn, $sql2);
    
}

?>
<div class="p-6">
<?php
    if ($insert) {
        echo "
            <div class='flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800' role='alert'>
                <svg class='flex-shrink-0 inline w-4 h-4 me-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 20 20'>
                    <path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'/>
                </svg>
                <span class='sr-only'>Info</span>
                <div>
                    <span class='font-medium'>Success alert!</span> Data has been added. -->
                </div>
                <div class='flex justify-end'>
                    <a href='assigned.php'>
                        <div>View Data</div>
                    </a>
                </div>
            </div>
            ";
    }
    ?>
    </div>


<?php 
include 'includes/_footer.php';
?>