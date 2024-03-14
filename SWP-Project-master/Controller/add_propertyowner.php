<?php
require_once "../Database/db_config.php";

// Get form data
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$contactEmail = isset($_POST['contactEmail']) ? $_POST['contactEmail'] : '';
$contactPhone = isset($_POST['contactPhone']) ? $_POST['contactPhone'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';

// Assuming 'owner' as the default userType for this form submission
$userType = 'owner';

// Prepare and bind for Property Owner table
$stmtOwner = $link->prepare("INSERT INTO propertyowner (FirstName, LastName, ContactEmail, ContactPhone, Address) VALUES (?, ?, ?, ?, ?)");
$stmtOwner->bind_param("ssssi", $firstName, $lastName, $contactEmail, $contactPhone, $address);

// Execute the statement
if ($stmtOwner->execute()) {
    // Property owner successfully added
    header("Location: ../index.php");

    // Now, insert the user with userType 'owner'
    $username = $firstName; // You can use the first name as the username
    $password = ''; // Set an initial password or handle password generation securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Prepare and bind for users table
    $stmtUser = $link->prepare("INSERT INTO users (username, password, userType) VALUES (?, ?, ?)");
    $stmtUser->bind_param("sss", $username, $hashedPassword, $userType);

    // Execute the statement for users
    if ($stmtUser->execute()) {
        // Both property owner and user added successfully
        header("Location: ../index.php"); // Redirecting to the homepage/index page
    } else {
        // Error adding user
        echo "Error adding user: " . $stmtUser->error;
    }

    // Close the user statement
    $stmtUser->close();
} else {
    // Error adding property owner
    echo "Error adding property owner: " . $stmtOwner->error;
}

// Close the property owner statement and connection
$stmtOwner->close();
$link->close();
?>
