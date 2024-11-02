<?php include 'includes/_header.php' ?>
<?php include 'includes/db.php' ?>

<?php
$userEmail = $_SESSION['email'];
$sqlUserData = "SELECT * FROM `profile` where `email` = '$userEmail'";
$resultUserData = mysqli_query($conn, $sqlUserData);
$rowUserData = mysqli_fetch_assoc($resultUserData);
?>


<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Banner -->
        <div class="relative">
            <img src="../assets/images/images.jfif" alt="Profile Banner" class="w-full h-48 object-cover">
            <div class="absolute top-4 left-4">
                <img src="../assets/images/kevin-laminto-nQl9tHiMSww-unsplash.jpg" alt="Profile Pic" class="rounded-full border-4 border-white shadow-lg h-28">
            </div>
        </div>

        <!-- Profile Info -->
        <div class="p-6">
            <h1 class="text-2xl font-bold"><?=$rowUserData['name']?></h1>
            <p class="text-gray-600">Viewer</p>
            <!-- <p class="mt-2 text-gray-600">"If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality)."</p> -->

            <!-- Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                
                <!-- Card 2: Profile Information -->
                <div class="bg-white p-4 rounded-lg shadow-md relative">
                    <h2 class="font-semibold text-lg mb-2">Profile Information</h2>
                    <p><strong>Full Name:</strong><?=$rowUserData['name']?></p>
                    <p><strong>Mobile:</strong>
                        <?php
                        
                            if($rowUserData['phone']){
                                echo $rowUserData['phone'];
                            }else{
                                echo "Enter phone number";
                            }
                            
                        ?>
                    </p>
                    <p><strong>Email:</strong><?=$userEmail?></p>
                    <a href="editProfile.php?id=<?=$userEmail?>">
                        <button class="absolute bottom-2 right-2 bg-blue-500 text-white text-sm px-3 py-1 rounded-md hover:bg-blue-600">
                            Edit
                        </button>
                    </a>
                </div>

                <!-- Card 3: Conversations -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="font-semibold text-lg mb-2">Notice</h2>
                    <?php
                        $sql = "SELECT * FROM `notice` where `notice`.`issue_for` = 'viewer' limit 3";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $posted_on = $row['posted_on'];
                            $date = new DateTime($posted_on);
                            echo " <div class='flex items-center justify-between mb-2'>
                        <span class='text-gray-700'>".$row['title']."</span>
                        <p class='text-blue-500'>".$date->format('d-m-Y')."</p>
                    </div>";
                        }
                        ?>
                   
                </div>
            </div>

         

            
        </div>
    </div>
</div>
<?php include 'includes/_footer.php' ?>