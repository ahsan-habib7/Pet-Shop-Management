<?php
//session_start();
//$admin_id = $_SESSION['admin_id'];
?>
<?php include '../Controllers/adminLoginCheckController.php'; ?>
<?php include '../Models/database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Admin Messages</title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/messageAdmin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php include 'html/messageAdmin_navigation.html'?>
<main>
<div class="message-container">
    <!-- Left: List of users -->
    <div class="message-list">
        <h3>Conversations</h3>
        <ul id="userList">
    <?php
    $query = "SELECT DISTINCT sender FROM messages";
    $conn = con();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li onclick='loadMessages({$row['sender_id']}); document.getElementById(\"selectedUser\").value = {$row['sender_id']};'>User {$row['sender_id']}</li>";
    }            
    ?>
</ul>

    </div>

    <!-- Right: Chat Area -->
    <div class="chat-area">
        <div id="chatBox"></div>
        <div class="chat-input">
            <input type="hidden" id="selectedUser">
            <input type="text" id="messageInput" placeholder="Type a message...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
</div>
</main>
<script>
function loadMessages(senderId) {
    let adminId = document.getElementById('adminId').value;

    fetch(`get_messages.php?sender=${senderId}&receiver=${adminId}`)
    .then(response => response.json())
    .then(messages => {
        let chatBox = document.getElementById('chatBox');
        chatBox.innerHTML = "";  

        messages.forEach(msg => {
            let messageDiv = document.createElement('div');

            if (msg.sender == adminId) {
                messageDiv.classList.add('message', 'sent');
            } else {
                messageDiv.classList.add('message', 'received');
            }

            messageDiv.innerHTML = `<p><strong>${msg.sender}:</strong> ${msg.message}</p><span>${msg.timestamp}</span>`;
            chatBox.appendChild(messageDiv);
        });

        chatBox.scrollTop = chatBox.scrollHeight; 
    });
}

function sendMessage() {
    let sender = document.getElementById('adminId').value;
    let receiver = document.getElementById('selectedUser').value;
    let message = document.getElementById('messageInput').value;

    if (message.trim() !== "") {
        fetch('send_message.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `sender=${sender}&receiver=${receiver}&message=${message}`
        }).then(response => response.text())
          .then(data => {
            console.log(data);
            loadMessages(receiver);
        });

        document.getElementById('messageInput').value = "";
    }
}
</script>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>