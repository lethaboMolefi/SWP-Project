<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Property Management System Login</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #1a1a2e; /* Twilight background color */
    }

    .container {
      width: 100%;
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: #2a2a3e; /* Adjusted background color */
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }

    h2 {
      text-align: center;
      color: #6cb6ff; /* Adjusted text color */
    }

    input[type="text"],
    input[type="password"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #4f4f7a; /* Adjusted border color */
      border-radius: 4px;
      box-sizing: border-box;
      background-color: #3a3a4e; /* Adjusted input background color */
      color: #fff; /* Adjusted text color */
    }

    input[type="submit"] {
      background-color: #28a745;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
      background-color: #218838;
    }

    .signup-link {
      text-align: center;
      color: #6cb6ff; /* Adjusted text color */
    }

    .signup-link a {
      color: #6cb6ff; /* Adjusted text color */
      text-decoration: none;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }
    .error-message{
      color:red;
      text-align:center;
      margin-top:10px;


    }
  </style>
</head>
<body>
  <div class="container" id="login-container">
    <?php
    session_start();
      (isset($_SESSION["error-message"])) ? $error_message = $_SESSION["error-message"] : $error_message ="";

    ?>
    
    <h2>Login</h2>
    <?php if(isset($error_message)): ?>
      <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>


    <form action="Controller/verify_user.php" method="post" id="login-form">
      <input type="text" name="username" placeholder="Username" required /><br />
      <input type="password" name="password" placeholder="Password" required /><br />
      <input type="submit" value="Login"  />
    </form>

    <div class="signup-link" >
      <p>Don't have an account? <a href="View/signup.php">Sign up</a></p>
    </div>
  </div>
  <!-- <div id="user-not-found" style="text-align: center; margin-top: 20px; color: red; display: none;">
    User does not exist.
  </div> -->
  <script>
    function animateForm() {
      const container = document.getElementById("login-container");
      container.style.transform = "translateX(-400px)";
      // const userNotFound = document.getElementById("user-not-found");
      // userNotFound.style.display = "block";
    }
  </script>
</body>
</html>
