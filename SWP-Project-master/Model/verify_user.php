<?php
  class UserAuthenticator {
    protected $pdo;

    // Constructor to receive the PDO instance
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Method to verify user credentials
    public function verifyCredentials($username, $password) {
      $sql = "SELECT * FROM users WHERE username = ?";
      $stmt = $this->pdo->prepare($sql);
  
      // Bind parameters using positional placeholders
      // Since there's only one placeholder, bind the $username variable directly
      $stmt->bind_param('s', $username);

      $stmt->execute();
  
      $result = $stmt->get_result(); // Get the result set from the prepared statement
      $user = $result->fetch_assoc(); // Fetch the data as an associative array
  
      if ($user && password_verify($password, $user['password'])) {
          return $user;
      } else {
          return false;
      }
  
  }
  

    // Method to initialize user session
    public function initUserSession($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_type'] = $user['userType'];
        $_SESSION['user_username'] = $user['username'];

        switch ($user['userType']) {
            case 'tenant':
                header('Location: ../View/tenant_dashboard.php');
                break;
            case 'service_worker':
                header('Location: ../View/service_worker_dashboard.php');
                break;
            case 'property_owner':
                header('Location: ../View/owner_dashboard.php');
                break;
        }
        exit;
    }
}
?>