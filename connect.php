<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "test";

    // Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    // Prepare SQL statement to insert data
    $sql = "INSERT INTO regestration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successfully...";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
