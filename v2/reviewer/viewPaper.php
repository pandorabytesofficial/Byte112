<?php
include 'includes/_header.php';
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
          <p class="mt-1 text-gray-600">John Doe, Jane Smith</p>
        </div>

        <!-- Research Area -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Area:</span>
          <p class="mt-1 text-gray-600">Machine Learning in Social Sciences</p>
        </div>

        <!-- Research Organization -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Organization:</span>
          <p class="mt-1 text-gray-600">Institute of Data Science</p>
        </div>

        <!-- Course Enrolled/Designation -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Course Enrolled/Designation:</span>
          <p class="mt-1 text-gray-600">Master's Student in Data Science</p>
        </div>

        <!-- Address of the Research Organization -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Address of the Research Organization:</span>
          <p class="mt-1 text-gray-600">United States, California, Los Angeles, 90001</p>
        </div>
      </div>

      <!-- Right Column -->
      <div>
        <!-- Research Theme -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Theme:</span>
          <p class="mt-1 text-gray-600">Data-driven Decision Making for Policy Development</p>
        </div>

        <!-- Research Supervisor/Principal Investigator/Director/Head -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Supervisor/Principal Investigator/Director/Head:</span>
          <p class="mt-1 text-gray-600">Dr. Emily Taylor</p>
        </div>

        <!-- Funding Agency -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Funding Agency:</span>
          <p class="mt-1 text-gray-600">National Science Foundation (NSF)</p>
        </div>

        <!-- Alternate Mobile No. (Optional) -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Alternate Mobile No. (Optional):</span>
          <p class="mt-1 text-gray-600">+1 987-654-3210</p>
        </div>
      </div>
    </div>

    <!-- Research Note and Data Info (Full Width) -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Left -->
      <div>
        <!-- Research Note -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Research Note (Optional):</span>
          <p class="mt-1 text-gray-600">This research explores the integration of machine learning techniques in social policy development, focusing on data fusion and analysis to inform better decision-making.</p>
        </div>
      </div>

      <!-- Right -->
      <div>
        <!-- Co-Supervisor/Co-Director -->
        <div class="mb-4">
          <span class="block text-lg font-semibold text-gray-700">Co-Supervisor/Co-Director (Optional):</span>
          <p class="mt-1 text-gray-600">Dr. Michael Brown (Optional)</p>
        </div>

        <!-- Data Type and Format -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Data Type -->
          <div class="mb-4">
            <span class="block text-lg font-semibold text-gray-700">Data Type:</span>
            <p class="mt-1 text-gray-600">Survey Data, Time Series Data</p>
          </div>

          <!-- Data Format -->
          <div class="mb-4">
            <span class="block text-lg font-semibold text-gray-700">Data Format:</span>
            <p class="mt-1 text-gray-600">CSV, JSON</p>
          </div>
        </div>

        <!-- Download Button -->
        <div class="mt-6">
          <a href="your-file-url-here" download class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700">Download Data</a>
        </div>
      </div>
    </div>

  </div>


  <div class="mb-10 mt-10">
      <h2 class="text-xl font-semibold mb-4">Leave a Comment</h2>
      <form action="your-server-side-script.php" method="POST" class="flex flex-col gap-4">
        <textarea name="comment" rows="4" class="w-full p-4 border border-gray-300 rounded-md" placeholder="Write your comment here..."></textarea>
        <button type="submit" class="self-end px-6 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700">Post Comment</button>
      </form>
    </div>

</div>

<?php
include 'includes/_footer.php';
?>