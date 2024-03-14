<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tenant Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #1a1a2e; /* Twilight background color */
      color: #fff; /* Adjusted text color */
    }

    .flex-container {
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      flex: 0 0 200px; /* Do not grow, do not shrink, start at 200px wide */
      background-color: #161625; /* Darker shade for the sidebar */
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar a {
      color: #6cb6ff; /* Adjusted link color */
      text-decoration: none;
      display: block; /* Make the links fill the container */
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 5px; /* Space out the links */
    }

    .sidebar a:hover {
      background-color: #1a1a2e;
      text-decoration: underline;
    }

    .main-content {
      flex-grow: 1; /* Take up all available space */
      background-color: #2a2a3e; /* Adjusted background color */
      padding: 20px;
      color: #fff; /* Adjusted text color */
    }

    h2, h3 {
      color: #6cb6ff; /* Adjusted text color */
    }

    .dashboard-action {
      background-color: #4caf50; /* Green */
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      display: inline-block; /* Adjusted display type */
      margin: 5px 0;
    }

    .dashboard-action:hover {
      background-color: #45a049;
    }

  </style>
</head>
<body>
<?php
  // Start the session at the beginning of the script
  session_start();
    unset($_SESSION["error-message"]);
  // Check if the session variable exists before using it
  $username = isset($_SESSION['user_username']) ? $_SESSION['user_username'] : 'Guest';
?>
  <div class="flex-container">
    <div class="sidebar">
      <a href="dashboard.php">Home</a>
      <a href="View/pay_rent.php">Pay Rent</a>
      <a href="View/request_maintenance.php">Request Maintenance</a>
      <a href="View/update_details.php">Update My Details</a>
      <a href="Controller/logout.php">Log Out</a>
    </div>
    <div class="main-content">
      <h2>Tenant Dashboard</h2>

      <div class="dashboard-section">
        <?php
          echo htmlspecialchars($username);
        ?>
        <h3>Welcome, </h3>
        <p>Here's what's happening with your tenancy:</p>
      </div>

      <div class="dashboard-section">
        <h3>Your Details</h3>
        <p>Username: [Tenant Username]</p>
        <p>Contact Info: [Tenant Contact Info]</p>
        <p>Lease Expiry: [Lease Expiry Date]</p>
      </div>

      <!-- Other dashboard content goes here -->
    </div>
  </div>
</body>
</html>
