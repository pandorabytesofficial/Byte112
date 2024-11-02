<?php 
include 'includes/_header.php';
include 'includes/db.php';
$insert = false;
$id_paper = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = 11;
    $author = $_POST['author'];
    $research_area = $_POST['research_area'];
    $course_enrolled = $_POST['course_enrolled'];
    $research_theme = $_POST['research_theme'];
    $research_note = $_POST['research_note'];
    $research_org = $_POST['research_org'];
    $address_org = $_POST['address_org'];
    $funding = $_POST['funding'];
    $supervisor = $_POST['supervisor'];
    $cosupervisor = $_POST['cosupervisor'];
    $data_type = $_POST['data_type'];
    $data_format = $_POST['data_format'];


    $filename = $_FILES["upload"]["name"];
    $tempname = $_FILES["upload"]["tmp_name"];
    $folder = "datasets/".$filename;
    move_uploaded_file($tempname, $folder);

    
    $sql = "INSERT INTO `datasets` (`author`, `scholar_id`, `research_area`, `enrolled_course`, `research_theme`, `research_note`, `org_address`, `funding`, `supervisor`, `co-supervisor`, `data_type`, `data_format`, `data_location`) VALUES ('$author', '$user_id', '$research_area', '$course_enrolled', '$research_theme', '$research_note', '$address_org', '$funding', '$supervisor', '$cosupervisor', '$data_type', '$data_format', '$folder')";
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
                    <a href='datasets.php'>
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
                        Edit Dataset
                    </h2>
                </div>

            </div>

            <div>


                <form action="editDataset.php" method="post" enctype="multipart/form-data">
                    <div class="mb-6">
                        <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author's Name</label>
                        <input type="text" id="author" name="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Name" required/>
                    </div>
                    <div class="mb-6">
                        <label for="research_area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Research Area</label>
                        <input type="text" id="research_area" name="research_area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc@def.com" required />
                    </div>
                    <div class="mb-6">
                        <label for="research_theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Research Theme</label>
                        <input type="text" id="research_theme" name="research_theme" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123456789" required />
                    </div>
                    <div class="mb-6">
                        <label for="research_note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Research Note</label>
                        <input type="text" id="research_note" name="research_note" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>
                    <div class="mb-6">
                        <label for="research_org" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Research Organisation</label>
                        <input type="text" id="research_org" name="research_org" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>
                    <div class="mb-6">
                        <label for="course_enrolled" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course Enrolled</label>
                        <input type="text" id="course_enrolled" name="course_enrolled" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>
                    <div class="mb-6">
                        <label for="address_org" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address Of Organisation</label>
                        <input type="text" id="address_org" name="address_org" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>
                    <div class="mb-6">
                        <label for="funding" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Funding Agency</label>
                        <input type="text" id="funding" name="funding" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>
                    <div class="mb-6">
                        <label for="supervisor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Research Supervisor/Principal Investigator/Director/Head</label>
                        <input type="text" id="supervisor" name="supervisor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>
                    <div class="mb-6">
                        <label for="cosupervisor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Co-Supervisor/Co-Director</label>
                        <input type="text" id="cosupervisor" name="cosupervisor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>
                    <div class="mb-6">
                        <label for="data_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Type</label>
                        <input type="text" id="data_type" name="data_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>
                    <div class="mb-6">
                        <label for="data_format" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Format</label>
                        <input type="text" id="data_format" name="data_format" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123ABC" required />
                    </div>
                    <div class="mb-6">
                        <input type="file" id="upload" name="upload" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                    </div>
                    
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>

<?php include 'includes/_footer.php' ?>