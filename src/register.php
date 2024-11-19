<?php
require_once 'database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Input Sanitization (Important)
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['passsword'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if($stmt->exceute()) {
        header("Location: login.html?success=1"); //redirect to login on success
    } else{
        echo "Error during registration";
    }

    $stmt->close();
    $conn->close();
}

?>