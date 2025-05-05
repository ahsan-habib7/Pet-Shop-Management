<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Pet Feeding Service</title>
    <link rel="stylesheet" href="css/healthymeal_view.css">
</head>
<body>
    <section class="healthymeal" id="healthymeal">
        <div class="meal-container">
            <h1>Pet Feeding Service</h1>
            <p>Personalized, nutritious meals served with care.</p>

            <div id="mealform">
                <h2>Feeding Criteria</h2>
                <div class="info-cards">
                    <div class="info-card">
                        <h3><i class="fas fa-utensils"></i> Dietary Preferences</h3>
                        <p>Choose a diet that suits your pet’s needs.</p>
                    </div>
                    <div class="info-card">
                        <h3><i class="fas fa-calendar-day"></i> Meal Plans</h3>
                        <p>Pick a meal plan that fits your schedule.</p>
                    </div>
                    <div class="info-card">
                        <h3><i class="fas fa-clock"></i> Feeding Schedule</h3>
                        <p>Set a time for daily feedings.</p>
                    </div>
                </div>

                <form id="feeding-form" action="booking.php" method="post" class="feeding-form">
                    <div class="form-group">
                        <label for="pet-name">Pet Name:</label>
                        <input type="text" id="pet-name" name="pet-name" placeholder="Enter your pet's name">
                    </div>

                    <div class="form-group">
                        <label for="diet">Dietary Preferences:</label>
                        <div class="select-wrapper">
                            <select id="diet" name="diet" onchange="updateTotal()">
                                <option value="high-protein" data-price="12">High Protein - $12</option>
                                <option value="weight-management" data-price="10">Weight Management - $10</option>
                                <option value="allergy-friendly" data-price="15">Allergy-Friendly - $15</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meal-plan">Choose a Meal Plan:</label>
                        <div class="select-wrapper">
                            <select id="meal-plan" name="meal-plan" onchange="updateTotal()">
                                <option value="single" data-multiplier="1">Single Meal</option>
                                <option value="daily" data-multiplier="7">Daily Package (7 meals)</option>
                                <option value="weekly" data-multiplier="30">Weekly Package (30 meals)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="schedule">Feeding Schedule:</label>
                        <input type="time" id="schedule" name="schedule">
                    </div>

                    <h3>Total Amount: $<span id="total-amount">0</span></h3>

                    <button type="submit">Book Now</button>
                </form><br>
            </div>
        </div>
        <script src="js/healthymeal_view.js"></script>
    </section>
</body>
</html>
