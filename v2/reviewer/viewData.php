<?php
include 'includes/_header.php';
include 'includes/db.php';
$id_paper = $_GET['id'];
$sql = "SELECT * from datasets where _id = $id_paper";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="p-6">

<div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Research Information</h1>

    <!-- Grid for Main Information -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Left Column -->
      <div>
        <!-- Author Name -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Name of the Author/s:</span>
          <p class="mt-1 text-gray-600"><?=$row['author']?></p>
        </div>

        <!-- Research Area -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Area:</span>
          <p class="mt-1 text-gray-600"><?=$row['research_area']?></p>
        </div>

        <!-- Research Organization -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Organization:</span>
          <p class="mt-1 text-gray-600"><?=$row['research_org']?></p>
        </div>

        <!-- Course Enrolled/Designation -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Course Enrolled/Designation:</span>
          <p class="mt-1 text-gray-600">M<?=$row['enrolled_course']?></p>
        </div>

        <!-- Address of the Research Organization -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Address of the Research Organization:</span>
          <p class="mt-1 text-gray-600"><?=$row['org_address']?></p>
        </div>
      </div>

      <!-- Right Column -->
      <div>
        <!-- Research Theme -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Theme:</span>
          <p class="mt-1 text-gray-600"><?=$row['research_theme']?></p>
        </div>

        <!-- Research Supervisor/Principal Investigator/Director/Head -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Supervisor/Principal Investigator/Director/Head:</span>
          <p class="mt-1 text-gray-600"><?=$row['supervisor']?></p>
        </div>

        <!-- Funding Agency -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Funding Agency:</span>
          <p class="mt-1 text-gray-600"><?=$row['funding']?></p>
        </div>

        <!-- Alternate Mobile No. (Optional) -->
        
      </div>
    </div>

    <!-- Research Note and Data Info (Full Width) -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Left -->
      <div>
        <!-- Research Note -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Note (Optional):</span>
          <p class="mt-1 text-gray-600"><?=$row['research_note']?></p>
        </div>
      </div>

      <!-- Right -->
      <div>
        <!-- Co-Supervisor/Co-Director -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Co-Supervisor/Co-Director (Optional):</span>
          <p class="mt-1 text-gray-600"><?=$row['co-supervisor']?></p>
        </div>

        <!-- Data Type and Format -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Data Type -->
          <div class="mb-4">
            <span class="block text-lg font-semibold text-gray-700">Data Type:</span>
            <p class="mt-1 text-gray-600">S<?=$row['data_type']?></p>
          </div>

          <!-- Data Format -->
          <div class="mb-4">
            <span class="block text-lg font-semibold text-gray-700">Data Format:</span>
            <p class="mt-1 text-gray-600"><?=$row['data_format']?></p>
          </div>
        </div>

        <!-- Download Button -->
        <div class="mt-6">
          <a href="<?=$row['data_location']?>" download class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700">Download Data</a>
        </div>
      </div>
    </div>

  </div>

  <div class="mb-10 mt-10">
      <h2 class="text-xl font-semibold mb-4">Leave a Comment</h2>
      <form action="commentPost.php?id=<?=$id_paper?>" method="POST" class="flex flex-col gap-4">
        <textarea name="comment" rows="4" class="w-full p-4 border border-gray-300 rounded-md" placeholder="Write your comment here..."></textarea>
        <button type="submit" class="self-end px-6 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700">Post Comment</button>
      </form> 
  </div>


  

    







<div class="flex justify-between items-center"> 
  
  <form action="acceptPaper.php?id=<?=$id_paper?>" method="post">
    <button type="submit" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700">
      Accept
    </button>
  </form>


  <div>
    <a href="commentsLog.php?id=<?=$id_paper?>">
    <button type="button" class="px-6 py-2 bg-yellow-600 text-white font-semibold rounded-md shadow-md hover:bg-yellow-700">
      Comments Log
    </button>
    </a>
  </div>
</div>






</body>
</div>

<?php
include 'includes/_footer.php';
?>