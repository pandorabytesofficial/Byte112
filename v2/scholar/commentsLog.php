<?php
error_reporting(0);
include 'includes/_header.php';
include 'includes/db.php';
$id_paper = $_GET['id'];
$insert = false;


$sql = "SELECT * FROM comment_logs WHERE paper_id = $id_paper ORDER BY done_at DESC LIMIT 1;";
$result = mysqli_query($conn, $sql);
$sno = 0;
$row = mysqli_fetch_assoc($result);
$comment_id = $row["_id"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $reply = $_POST['reply'];
  $sql = "INSERT INTO reply_logs (comment_id, reply) VALUES ('$comment_id', '$reply');";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $insert = true;
  } else {
    echo "try again";
  }
}

?>
<div class="container mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
  <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Correction - Comments and Replies</h1>


  <div class="comments-section">
    <!-- Comment 1 -->
    <div class="mb-6 p-4 border border-gray-300 rounded-lg">
      <div class="flex justify-between items-center mb-2">
        <span class="font-semibold text-gray-700">Reviewer</span>
        <span class="text-sm text-gray-500"><?= $row['done_at'] ?></span>
      </div>
      <p id="comment-text-1" class="text-gray-600 mb-4"><?= $row['comment'] ?></p>

      <!-- Reply and Edit Buttons -->
      <div class="ml-8 mt-4 flex gap-4">
        <button class="text-sm text-blue-600 hover:underline" onclick="toggleReplyForm(1)">Reply</button>
        <!-- <button class="text-sm text-green-600 hover:underline">Edit Paper</button> -->
      </div>

      <!-- Reply Form -->
      <form action="commentsLog.php?id=<?=$id_paper?>" method="POST" id="reply-form-1" class="hidden flex flex-col gap-4 mt-4">
        <textarea name="reply" rows="3" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Write your reply..."></textarea>
        <button type="submit" class="self-end px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700">Post Reply</button>
      </form>
    </div>


  </div>
  <!-- Comments and Replies Section -->
  <div class="comments-section">
    <!-- Comment 1 -->
    <?php
    $sql = "SELECT * FROM comment_logs where paper_id = $id_paper;";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      $comment_search_id = $row['_id'];


      echo "
    <div class='mb-6 p-4 border border-gray-300 rounded-lg'>
      <div class='flex justify-between items-center mb-2'>
        <span class='font-semibold text-gray-700'>Reviewer</span>
        <span class='text-sm text-gray-500'>" . $row['done_at'] . "</span>
      </div>
      <p id='comment-text-1' class='text-gray-600 mb-4'>" . $row['comment'] . "</p>";
      $sql2 = "SELECT * FROM reply_logs where comment_id = $comment_search_id;";
      $result2 = mysqli_query($conn, $sql2);

      while ($row2 = mysqli_fetch_assoc($result2)) {
        echo "
      <div class='ml-8 mt-4 p-4 border border-gray-200 bg-gray-50 rounded-lg'>
        <div class='flex justify-between items-center mb-2'>
          <span class='font-semibold text-gray-700'>You</span>
          <span class='text-sm text-gray-500'>" . $row['done_at'] . "</span>
        </div>
        <p class='text-gray-600 mb-4'>" . $row2['reply'] . "</p>
      </div>";
      }
      echo "</div>";
    }
    ?>
  </div>
</div>


<script>
  // Toggle Reply Form
  function toggleReplyForm(commentId) {
    const form = document.getElementById(`reply-form-${commentId}`);
    form.classList.toggle('hidden');
  }
</script>


<?php
include 'includes/_footer.php';
?>