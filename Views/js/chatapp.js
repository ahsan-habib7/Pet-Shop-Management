document.addEventListener("DOMContentLoaded", function () {
    const chatBox = document.getElementById("messages");
    const messageInput = document.getElementById("messageInput");

    let lastMessageId = 0;
    const customerId = 1; // Replace this dynamically with logged-in customer ID
    const adminId = 9999; // Fixed admin ID

    function loadMessages() {
        fetch("MessageController.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `action=getMessages&customer_id=${customerId}&lastMessageId=${lastMessageId}`,
        })
        .then(response => response.json())
        .then(data => {
            data.forEach(msg => {
                const messageElement = document.createElement("div");
                messageElement.textContent = msg.sender_id === customerId ? `You: ${msg.message}` : `Admin: ${msg.message}`;
                chatBox.appendChild(messageElement);
                lastMessageId = msg.id;
            });
        });
    }

    function sendMessage() {
        const message = messageInput.value.trim();
        if (!message) return;

        fetch("MessageController.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `action=sendMessage&sender_id=${customerId}&receiver_id=${adminId}&message=${encodeURIComponent(message)}`,
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                messageInput.value = "";
                loadMessages();
            }
        });
    }

    setInterval(loadMessages, 3000);
});
