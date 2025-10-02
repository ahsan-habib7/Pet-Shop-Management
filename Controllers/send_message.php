<?php
include '../Models/database.php';
include '../Models/message.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $message = $_POST['message'];

    if (!empty($sender) && !empty($receiver) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages (sender, receiver, message, status) VALUES (?, ?, ?, 'sent')");
        $stmt->bind_param("iis", $sender, $receiver, $message);
        if ($stmt->execute()) {
            echo "Message sent";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}
?>
