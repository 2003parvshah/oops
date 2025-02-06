<?php

class UserService {
    // This method violates SRP (Single Responsibility Principle) because it does too many things
    public function getUserData($userId) {
        // Database connection
        $connection = new mysqli("localhost", "root", "password", "your_database");

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // SQL query to fetch user
        $sql = "SELECT * FROM users WHERE id = '$userId'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            // Output the data
            $user = $result->fetch_assoc();
            echo "User ID: " . $user['id'] . " - Name: " . $user['name'];
        } else {
            echo "No user found!";
        }

        $connection->close();
    }
}

// Usage
$userService = new UserService();
$userService->getUserData(1);

?>
