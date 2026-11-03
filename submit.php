<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (
        $name === '' ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        $subject === '' ||
        $message === ''
    ) {
        die("Please enter valid details.");
    }

    $stmt = $conn->prepare(
        "INSERT INTO feedback (name, email, subject, message)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    }

    echo "Error submitting feedback.";
}
?>