
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Property Owner Registration</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #1a1a2e;
        color: #d4d4d4;
        margin: 0;
        padding: 20px;
      }
      .container {
        max-width: 400px;
        margin: auto;
        background: #2a2a3e;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      h2 {
        color: #6cb6ff;
        text-align: center;
        margin-bottom: 20px;
      }
      label {
        color: #c6c6c6;
        display: block;
        margin-bottom: 5px;
      }
      input[type="text"],
      input[type="email"],
      input[type="submit"],
      textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #4f4f7a;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #3a3a4e;
        color: #fff;
      }
      input[type="submit"] {
        background-color: #28a745;
        color: white;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #28a745;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Register as a Property Owner</h2>
      <form
        id="propertyOwnerForm"
        action="../Controller/add_propertyowner.php"
        method="post"
      >
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required />

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required />

        <label for="contactEmail">Contact Email:</label>
        <input type="email" id="contactEmail" name="contactEmail" required />

        <label for="contactPhone">Contact Phone:</label>
        <input type="text" id="contactPhone" name="contactPhone" required />

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <input type="submit" value="Register" />
      </form>
    </div>
  </body>
</html>


</html>
