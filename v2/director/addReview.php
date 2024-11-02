<?php
include 'includes/_header.php';
include 'includes/db.php';
$insert = false;
$error = false;



$userEmail = $_SESSION['email'];
$sqlUserData = "SELECT * FROM `admin` where `email` = '$userEmail'";
$resultUserData = mysqli_query($conn, $sqlUserData);
$rowUserData = mysqli_fetch_assoc($resultUserData);
$org = $rowUserData['current_org'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_type=3;
    $name = $_POST['name'];
    $email = $_POST['email'];

    $created_password = $_POST['created_password'];

        // --------FILTERING//
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        // --------Filtering//


    $existSql = "SELECT * FROM `auth` WHERE email= '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows > 0) {
        $showError = "email already exists";
        $error = true;
    } else {
        $hash = password_hash($created_password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO auth (password, email, user_type) VALUES ('$hash', '$email', '$user_type');";
        $result = mysqli_query($conn, $sql);
        $sql2 = "INSERT INTO `reviewer` (`name`, `email`, `org`) VALUES ('$name', '$email', '$org')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            $insert = true;
        } else {
            echo "try again";
        }
    }
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
                    <a href='reviewer.php'>
                        <div>View Data</div>
                    </a>
                </div>
            </div>
            ";
    }
    if ($error) {
        echo "
            <div class='flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800' role='alert'>
                <svg class='flex-shrink-0 inline w-4 h-4 me-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 20 20'>
                    <path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'/>
                </svg>
                <span class='sr-only'>Info</span>
                <div>
                    <span class='font-medium'>Error alert!</span> Email already exists. -->
                </div>
                <div class='flex justify-end'>
                    <a href='reviewer.php'>
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
                        Add a Reviewer
                    </h2>
                </div>

            </div>

            <div>


                <form action="addReview.php" method="post">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reviewer Name</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Name" required />
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc@def.com" required />
                    </div>
                
                    
                    <div class="mb-6">
                        <label for="created_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Create a Password</label>
                        <input type="text" id="created_password" name="created_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>

<?php include 'includes/_footer.php' ?>