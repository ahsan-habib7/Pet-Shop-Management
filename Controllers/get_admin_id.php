<?php
include '../Models/database.php';

$admin_username = 'admin'; // Change this if your admin username is different

$query = "SELECT id FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $admin_username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode(['admin_id' => $row['id']]);
} else {
    echo json_encode(['error' => 'Admin not found']);
}
?>
