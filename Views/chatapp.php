<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbox</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="css/chatapp.css">-->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
        }

        .chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            cursor: pointer;
            z-index: 1000;
        }

        .chat-icon img {
            width: 50px;
            height: 50px;
            transition: transform 0.2s;
        }

        .chat-icon img:hover {
            transform: scale(1.1);
        }

        .chatbox {
            width: 350px;
            height: 400px;
            background-color: #ffffff; /* Solid white background */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: fixed;
            bottom: 80px;
            right: 20px;
            z-index: 9999; /* Ensures it's above other elements */
            border: 2px solid #ddd; /* Optional border */
        }

        .chatbox-header {
            background-color: #6200ea;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #close-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            padding: 0;
            margin: 0;
            line-height: 1;
        }

        .chatbox-body {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background-color: #f9f9f9;
            max-height: calc(100% - 120px);
        }

        .messages {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .message {
            max-width: 70%;
            padding: 10px;
            border-radius: 10px;
            font-size: 14px;
        }

        .message.received {
            background-color: #e0e0e0;
            align-self: flex-start;
        }

        .message.sent {
            background-color: #6200ea;
            color: #fff;
            align-self: flex-end;
        }

        .chatbox-footer {
            display: flex;
            padding: 10px;
            background-color: #fff;
            border-top: 1px solid #ddd;
        }

        #chat-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
        }

        #send-btn {
            background-color: #6200ea;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            margin-left: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="chat-icon" id="chat-icon">
        <img src="https://cdn-icons-png.flaticon.com/512/134/134914.png" alt="Chat Icon">
    </div>

    <div class="chatbox" id="chatbox">
        <div class="chatbox-header">
            <h3>Chat with Us</h3>
            <button id="close-btn">&times;</button>
        </div>
        <div class="chatbox-body">
            <div class="messages" id="chat-messages">
                <div class="message received">Hello! How can I help you today?</div>
            </div>
        </div>
        <div class="chatbox-footer">
            <input type="text" id="chat-input" placeholder="Type a message...">
            <button id="send-btn">Send</button>
        </div>
    </div>

    <script>
        document.getElementById('chat-icon').addEventListener('click', function() {
            const chatbox = document.getElementById('chatbox');
            chatbox.style.display = chatbox.style.display === 'none' || chatbox.style.display === '' ? 'flex' : 'none';
        });

        document.getElementById('close-btn').addEventListener('click', function() {
            document.getElementById('chatbox').style.display = 'none';
        });

        document.getElementById('send-btn').addEventListener('click', function() {
            sendMessage();
        });

        document.getElementById('chat-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        function sendMessage() {
            const input = document.getElementById('chat-input');
            const message = input.value.trim();
            if (message) {
                const messagesContainer = document.getElementById('chat-messages');
                const newMessage = document.createElement('div');
                newMessage.classList.add('message', 'sent');
                newMessage.textContent = message;
                messagesContainer.appendChild(newMessage);
                input.value = '';
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        }
    </script>
</body>
</html>
