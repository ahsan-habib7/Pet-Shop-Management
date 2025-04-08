<?php
include '../Models/database.php';

class MessageController {
    
    // Fetch messages between a customer and the admin
    public function getMessages($customer_id, $lastMessageId = 0) {
        global $conn;
        $customer_id = intval($customer_id);
        $lastMessageId = intval($lastMessageId);

        $query = "SELECT * FROM messages 
                  WHERE (sender_id = $customer_id OR receiver_id = $customer_id) 
                  AND id > $lastMessageId 
                  ORDER BY timestamp ASC";

        $result = mysqli_query($conn, $query);
        $messages = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $messages[] = $row;
        }
        echo json_encode($messages);
    }

    // Send a message (customer to admin OR admin to customer)
    public function sendMessage($sender_id, $receiver_id, $message) {
        global $conn;
        $sender_id = intval($sender_id);
        $receiver_id = intval($receiver_id);
        $message = mysqli_real_escape_string($conn, $message);
        
        $query = "INSERT INTO messages (sender_id, receiver_id, message, status) 
                  VALUES ($sender_id, $receiver_id, '$message', 'sent')";
    
        if (mysqli_query($conn, $query)) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
        }
    }
}

// Handle AJAX Requests
if (isset($_POST['action'])) {
    $controller = new MessageController();

    if ($_POST['action'] === 'getMessages' && isset($_POST['customer_id'])) {
        $lastMessageId = $_POST['lastMessageId'] ?? 0;
        $controller->getMessages($_POST['customer_id'], $lastMessageId);
    }
    
    if ($_POST['action'] === 'sendMessage' && isset($_POST['sender_id'], $_POST['receiver_id'], $_POST['message'])) {
        $controller->sendMessage($_POST['sender_id'], $_POST['receiver_id'], $_POST['message']);
    }
}
?>
