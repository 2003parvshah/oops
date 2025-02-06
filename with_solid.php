<?php

// 1. Single Responsibility Principle (SRP): Each class has one job.

interface DatabaseConnectionInterface {
    public function connect();
    public function query($sql);
    public function close();
}

// 2. Open/Closed Principle (OCP): The DatabaseConnection can be extended or replaced without modifying the UserService.

class MySQLDatabaseConnection implements DatabaseConnectionInterface {
    private $connection;

    public function connect() {
        $this->connection = new mysqli("localhost", "root", "1256", "solid_with");

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
 
    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function close() {
        $this->connection->close();
    }
}

// 3. Dependency Inversion Principle (DIP): UserService now depends on an abstraction (DatabaseConnectionInterface), not a concrete class.

class UserService {
    private $dbConnection;

    // Constructor dependency injection (DIP)
    public function __construct(DatabaseConnectionInterface $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    // Single Responsibility: Now, this method is only concerned with user data, not the database connection
    public function getUserData($userId) {
        $this->dbConnection->connect();
        $sql = "SELECT * FROM users WHERE id = '$userId'";
        $result = $this->dbConnection->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "User ID: " . $user['id'] . " - Name: " . $user['name'];
        } else {
            echo "No user found!";
        }

        $this->dbConnection->close();
    }
}

// Usage
$dbConnection = new MySQLDatabaseConnection();
$userService = new UserService($dbConnection);
$userService->getUserData(1);

?>
