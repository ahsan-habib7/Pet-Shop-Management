let lastMessageId = 0; // Store the ID of the last message received
let selectedUser = null;

// Function to load messages every few seconds
function loadMessages(customerId, autoRefresh = false) {
    if (!customerId) return;

    selectedUser = customerId;
    $("#selectedUser").val(customerId);

    $.ajax({
        url: "../Controllers/MessageController.php",
        type: "POST",
        data: { action: "getMessages", customer_id: customerId },
        dataType: "json",
        success: function (messages) {
            let chatBox = $("#chatBox");
            chatBox.html(""); // Clear previous messages

            messages.forEach(msg => {
                let sender = (msg.sender === 'admin') ? "Admin" : `User ${msg.customer_id}`;
                chatBox.append(`<p><strong>${sender}:</strong> ${msg.message}</p>`);
            });

            // Scroll to bottom for new messages
            chatBox.scrollTop(chatBox[0].scrollHeight);

            // Update lastMessageId to detect new messages
            if (messages.length > 0) {
                lastMessageId = messages[messages.length - 1].id;
            }
        }
    });

    // Auto-refresh every 3 seconds
    if (autoRefresh) {
        setTimeout(() => loadMessages(customerId, true), 3000);
    }
}

// Function to send messages
function sendMessage() {
    let customerId = $("#selectedUser").val();
    let message = $("#messageInput").val();

    if (!customerId || !message.trim()) {
        alert("Select a user and type a message.");
        return;
    }

    $.ajax({
        url: "../Controllers/MessageController.php",
        type: "POST",
        data: { action: "sendMessage", customer_id: customerId, message: message },
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                $("#messageInput").val("");
                loadMessages(customerId, false); // Reload messages immediately after sending
            } else {
                alert("Message sending failed.");
            }
        }
    });
}

// Start auto-refresh when a user is selected
$(document).ready(function () {
    $("#userList li").click(function () {
        let userId = $(this).attr("data-id");
        loadMessages(userId, true); // Enable auto-refresh
    });
});
