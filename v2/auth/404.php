<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @keyframes floating {
        0% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0); }
      }
      .float {
        animation: floating 3s infinite ease-in-out;
      }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="text-center">
    <!-- Animated Image/Graphic -->
    <div class="relative">
      <img src="https://cdn-icons-png.flaticon.com/512/564/564619.png" alt="404 Error" class="w-48 h-48 mx-auto float">
    </div>

    <!-- Error Message -->
    <h1 class="text-5xl font-bold text-gray-800 mt-8 mb-4">404</h1>
    <p class="text-2xl text-gray-600 mb-6">Oops! Page not found.</p>
    <p class="text-lg text-gray-500 mb-12">It looks like the page you are looking for doesn’t exist or was moved.</p>

    <!-- Back to Home Button -->
    <a href="login.php" class="px-6 py-3 bg-blue-500 text-white rounded-full font-semibold hover:bg-blue-600 transition duration-300">Go Back Home</a>
  </div>

</body>
</html>
