<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../assets/auth/login.css">
</head>

<body style="margin: 80px;">
    <div class="container">
        <div class="logo">
            <h1>ARDMS</h1>
        </div>
        <div class="sign-in-box">
            <h2>Sign In</h2>
            <form action="authenticate.php" method="post">
                <label for="email">Email / Username *</label>
                <input type="text" id="email" name="email" placeholder="Enter your email address or username" required>

                <label for="password">Password *</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Enter password" required>
                    <!-- <button type="button" class="show-password">👁</button> -->
                </div>

                <div class="forgot-links">
                    <a href="#">Forgot Username</a> or <a href="#">Password</a>
                </div>

                <div class="form-actions">

                    <button type="submit" class="sign-in-btn">Sign In</button>
                </div>
            </form>
        </div>
    </div>

    <div style="margin-top: 15px;">
        <a href="register.php">
        <button type="submit" class="quirk-btn"
            style="background-color: #00b3e6; 
            color: white;
            padding: 12px 24px; /* Adjust padding for larger button */
            border: none;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;" onmouseover="this.style.backgroundColor = '#02576e'" onmouseout="this.style.backgroundColor = '#00b3e6'">
            Not  a member? Sign up
        </button>
        </a>
    </div>
    <div class="support">
        <!-- <a href="#">Contact Us / Support</a> -->
    </div>
</body>

</html>