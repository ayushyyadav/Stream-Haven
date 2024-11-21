<?php
    // Establishing MySQL connection
    $servername = "localhost"; // Replace with your MySQL server name
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $database = "Web"; // Replace with your MySQL database name

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Processing form data when registration form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["psw"];
        $confirmPassword = $_POST["cpsw"];
        $mobile = $_POST["mobile"];

        if ($password !== $confirmPassword) {
            echo "Error: Passwords do not match";
            exit();
        }

        $sql = "INSERT INTO users (name, email, password, Mobile) VALUES ('$name', '$email', '$password', '$mobile')";

        if ($conn->query($sql) === TRUE) {
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Processing form data when login form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["psw"];

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            header("Location: index1.html");
            exit();
        } else {
            echo "Invalid email or password";
        }
    }

    $conn->close();
?>