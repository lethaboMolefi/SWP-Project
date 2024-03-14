<?php
require_once "../Database/db_config.php";

// Get form data
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
$contactEmail = isset($_POST['contactEmail']) ? $_POST['contactEmail'] : '';
$contactPhone = isset($_POST['contactPhone']) ? $_POST['contactPhone'] : '';
$specialization = isset($_POST['specialization']) ? $_POST['specialization'] : '';
$availability = isset($_POST['availability']) ? $_POST['availability'] : '';
$isActive = isset($_POST['isActive']) ? $_POST['isActive'] : 'false';
$username = $firstName; // Assuming the username is the first name
$password = isset($_POST['password']) ? $_POST['password'] : '';
// Assuming 'service_worker' as the default userType for this form submission
$userType = 'service_worker';

// Convert isActive to boolean for SQL
$isActive = $isActive === 'true' ? 1 : 0;

// Hash the password for storage
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind for ServiceWorker table
$stmtServiceWorker = $link->prepare("INSERT INTO serviceworker (FirstName, LastName, CompanyName, ContactEmail, ContactPhone, Specialization, IsActive) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmtServiceWorker->bind_param("ssssssi", $firstName, $lastName, $companyName, $contactEmail, $contactPhone, $specialization, $isActive);

// Execute the statement for ServiceWorker
if ($stmtServiceWorker->execute()) {
    // Prepare and bind for users table
    $stmtUser = $link->prepare("INSERT INTO users (username, password, userType) VALUES (?, ?, ?)");
    $stmtUser->bind_param("sss", $username, $hashedPassword, $userType);

    // Execute the statement for users
    if ($stmtUser->execute()) {
        header("Location: ../index.php"); // Redirecting to the homepage/index page on successful user addition
    } else {
        echo "Error adding user: " . $stmtUser->error;
    }
} else {
    echo "Error adding service provider: " . $stmtServiceWorker->error;
}

// Close statement and connection
$stmtServiceWorker->close();
$stmtUser->close();
$link->close();
?>
