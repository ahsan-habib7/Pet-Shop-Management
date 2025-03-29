<?php
class AdminController {
    public function getRecentActivities() {
        include '../Models/database.php'; // Include database connection

        $query = "SELECT activity FROM activities ORDER BY created_at DESC LIMIT 5";
        $result = mysqli_query($conn, $query);

        $activities = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $activities[] = $row['activity'];
        }

        return $activities;
    }
}

// Instantiate the controller
$adminController = new AdminController();
$recentActivities = $adminController->getRecentActivities();
?>