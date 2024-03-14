<!DOCTYPE html>
<html>
  <head>
    <title>Tenant Management System</title>
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
    margin: 20px auto;
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

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    color: #fff; /* Adjusted text color */
  }

  th, td {
    padding: 10px;
    border: 1px solid #4f4f7a; /* Adjusted border color */
    text-align: left;
    color: #fff; /* Adjusted text color */
  }

  th {
    background-color: #3a3a4e; /* Adjusted header background color */
  }

  tr:nth-child(even) {
    background-color: #323347; /* Adjusted even row background color */
  }

  .form-input {
    margin-bottom: 15px;
    color: #fff; /* Adjusted text color for form */
  }

  .form-input label {
    display: block;
    margin-bottom: 5px;
    color: #6cb6ff; /* Adjusted label color */
  }

  .form-input input,
  .form-input select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #4f4f7a; /* Adjusted border color */
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #3a3a4e; /* Adjusted input background color */
    color: #fff; /* Adjusted text color */
  }

  button {
    background-color: #4caf50; /* Green */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #45a049;
  }

  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }
  input[type="submit"] {
      background-color: #28a745;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
      background-color: #218838;
    }

    input[type="text"],
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
</style>

  </head>
  <body>
    <div class="container">
      <h2>Tenants</h2>
      <!-- Tenant List -->
      <table>
        <tr>
          <th>Name</th>
          <th>Contact Info</th>
          <th>Active</th>
          <th>Actions</th>
        </tr>
        <!-- Repeat for each tenant -->
        <tr>
          <td>John Doe</td>
          <td>johndoe@example.com</td>
          <td>Yes</td>
          <td>Edit | Deactivate</td>
        </tr>
      </table>

      <h2>Add Tenant</h2>
      <form id="addTenantForm" action="../Controller/add_tenant.php" method="post">
        <div class="form-input">
          <label for="firstName">First Name:</label>
          <input type="text" id="firstName" name="firstName" required />
        </div>
        <div class="form-input">
          <label for="lastName">Last Name:</label>
          <input type="text" id="lastName" name="lastName" required />
        </div>
        <div class="form-input">
          <label for="contactInfo">Contact Info:</label>
          <input type="text" id="contactInfo" name="contactInfo" required />
        </div>
        <div class="form-input">
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required />
</div>
<div class="form-input">
  <label for="confirmPassword">Confirm Password:</label>
  <input type="password" id="confirmPassword" name="confirmPassword" required />
</div>

<div class="form-input">
  <label for="apartmentAddress">Apartment/Address:</label>
  <input type="text" id="apartmentAddress" name="apartmentAddress" required />
</div>


        <div class="form-input">
          <label for="isActive">Active:</label>
          <select id="isActive" name="isActive">
            <option value="true">Yes</option>
            <option value="false">No</option>
          </select>
        </div>
        <input type="submit" value="Add Tenant">
      </form>
    </div>
    <script>
  document.getElementById('addTenantForm').onsubmit = function(event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    
    // Check if passwords match
    if (password !== confirmPassword) {
      event.preventDefault(); // Prevent form submission
      alert('Passwords do not match.');
      return false; // Stop the function
    }
    // If passwords match, form is submitted
    return true;
  };
</script>

</html>
