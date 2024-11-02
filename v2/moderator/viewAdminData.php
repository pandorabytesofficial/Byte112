<?php include 'includes/_header.php' ?>
<?php include 'includes/db.php' ?>

<?php
$id = $_GET['id'];
$sqlUserData = "SELECT * FROM `admin` where `_id` = '$id'";
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
            <div class="mt-6">
                
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
                    <p><strong>Email:</strong><?=$rowUserData['email']?></p>
                    <p><strong>Organisation:</strong><?=$rowUserData['current_org']?></p>
                    <p><strong>Organisation Address:</strong>
                    <?php
                        
                        if($rowUserData['org_address']){
                            echo $rowUserData['org_address'];
                        }else{
                            echo "Enter organisation address";
                        }
                        
                    ?>
                    </p>
                    <p><strong>Designation:</strong>
                    <?php
                        
                        if($rowUserData['designation']){
                            echo $rowUserData['designation'];
                        }else{
                            echo "Enter your designation";
                        }
                        
                    ?>
                    </p>
                    <a href="editProfile.php?id=<?=$userEmail?>">
                        <button class="absolute bottom-2 right-2 bg-blue-500 text-white text-sm px-3 py-1 rounded-md hover:bg-blue-600">
                            Edit
                        </button>
                    </a>
                </div>

                
            </div>

         

            
        </div>
    </div>
</div>
<?php include 'includes/_footer.php' ?>