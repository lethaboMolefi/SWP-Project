<?php
require_once "../Database/db_config.php";

// Get form data
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$contactInfo = isset($_POST['contactInfo']) ? $_POST['contactInfo'] : '';
$apartmentAddress = isset($_POST['apartmentAddress']) ? $_POST['apartmentAddress'] : ''; // New address input
$isActive = isset($_POST['isActive']) ? $_POST['isActive'] : 'false';
$username = $firstName; // Corrected to use the firstName directly
$password = isset($_POST['password']) ? $_POST['password'] : '';
// Assuming 'tenant' as the default userType for this form submission
$userType = 'tenant';

// Convert isActive to boolean for SQL
$isActive = $isActive === 'true' ? 1 : 0;

// Hash the password for storage
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind for TTenant table including the address
$stmtTenant = $link->prepare("INSERT INTO ttenant (FirstName, LastName, ContactInfo, IsActive,ApartmentID) VALUES (?, ?, ?, ?, ?)");
$stmtTenant->bind_param("ssssi", $firstName, $lastName, $contactInfo, $isActive, $apartmentAddress);

// Execute the statement for TTenant
if ($stmtTenant->execute()) {
    header("Location: ../index.php");
} else {
    echo "Error adding tenant: " . $stmtTenant->error;
}

// Prepare and bind for users table
$stmtUser = $link->prepare("INSERT INTO users (username, password, userType) VALUES (?, ?, ?)");
$stmtUser->bind_param("sss", $username, $hashedPassword, $userType);

// Execute the statement for users
if ($stmtUser->execute()) {
    header("Location: ../index.php"); // Redirecting to the homepage/index page on successful user addition
} else {
    echo "Error adding user: " . $stmtUser->error;
}

// Close statement and connection
$stmtTenant->close();
$stmtUser->close();
$link->close();
?>
