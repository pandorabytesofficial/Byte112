<?php 
include 'includes/_header.php';
include 'includes/db.php';
$insert = false;
$user = $_SESSION['email'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $msg = $_POST['msg'];
    $receiver = $_POST['receiver'];

        // --------FILTERING//
        $title = mysqli_real_escape_string($conn, $title);
        $msg = mysqli_real_escape_string($conn, $msg);
        // --------Filtering//

    $sql = "INSERT INTO notice (title, message, issue_for, posted_by) VALUES ('$title', '$msg', '$receiver', '$user');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        } else {
            echo "try again";
        }
}

?>

<div class="p-6">
    <?php
        if($insert){
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
                    <a href='notice.php'>
                        <div>View Data</div>
                    </a>
                </div>
            </div>
            ";
        }
    ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">
                    <h2 class="text-xl">
                        Send Notification
                    </h2>
                </div>

            </div>

            <div>


                <form action="addNotice.php" method="post">
                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Name" required/>
                    </div>
                    <div class="mb-6">
                        <label for="msg" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                        <input type="text" id="msg" name="msg" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc@def.com" required />
                    </div>
                    <div class="mb-6">
                        <label for="receiver" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Send to</label>
                        <select name="receiver" id="receiver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value=''>--SELECT--</option>
                        <option value='viewer'>viewer</option>
                        <option value='scholar'>scholar</option>
                        <option value='reviewer'>reviewer</option>
                        </select>
                    </div>

                    
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>

<?php include 'includes/_footer.php' ?>