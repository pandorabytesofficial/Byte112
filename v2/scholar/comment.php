<?php
include 'includes/_header.php';
?>


<div class="p-6">

    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Comments on Dataset</h1>
        

        <!-- Displaying Comments -->
        <div class="comments-section">
            <!-- Comment 1 -->
            <div class="mb-6 p-4 border border-gray-300 rounded-lg">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-700">User1</span>
                    <span class="text-sm text-gray-500">October 5, 2024</span>
                </div>
                <p id="comment-text-1" class="text-gray-600 mb-4">This dataset is amazing! How did you clean the time series data?</p>

                <!-- Reply and Edit Buttons -->
                <div class="ml-8 mt-4 flex gap-4">
                    <button class="text-sm text-blue-600 hover:underline" onclick="toggleReplyForm(1)">Reply</button>
                    <button class="text-sm text-green-600 hover:underline">Edit Paper</button>
                </div>

                <!-- Reply Form -->
                <form action="your-reply-script.php" method="POST" id="reply-form-1" class="hidden flex flex-col gap-4 mt-4">
                    <textarea name="reply" rows="3" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Write your reply..."></textarea>
                    <button type="submit" class="self-end px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700">Post Reply</button>
                </form>
            </div>

            
        </div>
    </div>

    <script>
        // Toggle Reply Form
        function toggleReplyForm(commentId) {
            const form = document.getElementById(`reply-form-${commentId}`);
            form.classList.toggle('hidden');
        }
    </script>

</div>


<?php include 'includes/_footer.php' ?>