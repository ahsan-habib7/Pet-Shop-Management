<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Planner</title>
    <link rel="stylesheet" href="css/exercise_view.css">
</head>
<body>
<section class="exercise-section" id="exercise-section">
    <div class="recommendations">
        <h2>Exercise Services</h2><br>
        <h3>Your Personalized Exercise Plan</h3>
        <p>Here you'll see the recommended exercise plan based on your selections.</p>
        <p>Daily Routine: Morning walks, evening runs.</p>
        <p>Suggested Products: Retractable leash, agility training kit.</p>
    </div>
    <div class="packages-section">
        <h2>Choose Your Package</h2>
        <div class="package">
            <h3>Basic Plan</h3>
            <p>Perfect for beginners who want a simple exercise routine.</p>
            <p class="price">$29.99</p>
            <button onclick="showForm('Basic Plan', 29.99)">Select</button>
        </div>
        <div class="package">
            <h3>Standard Plan</h3>
            <p>Includes a detailed plan with variety and flexibility.</p>
            <p class="price">$49.99</p>
            <button onclick="showForm('Standard Plan', 49.99)">Select</button>
        </div>
        <div class="package">
            <h3>Premium Plan</h3>
            <p>Comprehensive plan with personalized advice and support.</p>
            <p class="price">$79.99</p>
            <button onclick="showForm('Premium Plan', 79.99)">Select</button>
        </div>
    </div>

    <div class="form-section" id="form-section">
        <h2>Create Your Custom Exercise Plan</h2>
        <form id="exercise-form">
            <div class="form-group">
                <label for="selected-package">Selected Package:</label>
                <div class="package-cost" id="package-cost">No package selected</div>
            </div>

            <div class="form-group">
                <label for="pet-type">Select Pet Type:</label>
                <select id="pet-type" name="pet-type">
                    <option value="" disabled selected>Select pet type</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="fish">Fish</option>
                    <option value="rabbit">Rabbit</option>
                    <option value="bird">Bird</option>
                </select>
            </div>

            <div class="form-group">
                <label for="activity-level">Choose Activity Level:</label>
                <select id="activity-level" name="activity-level">
                    <option value="" disabled selected>Select activity level</option>
                    <option value="low">Low Energy</option>
                    <option value="moderate">Moderate Energy</option>
                    <option value="high">High Energy</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exercise-times">Preferred Exercise Times:</label>
                <label>From: </label>
                <input type="time" id="exercise-time-1" name="exercise-time-1">
            </div>
            <div class="form-group">
                <label>To:</label>
                <input type="time" id="exercise-time-2" name="exercise-time-2">
            </div>

            <div class="form-group">
                <label for="special-notes">Add Special Notes:</label>
                <textarea id="special-notes" name="special-notes" placeholder="E.g., Avoid intense activities, prefers short walks, has a heart condition..."></textarea>
            </div>

            <button type="button" class="submit-button" onclick="submitForm()">Submit Plan</button>
        </form>
    </div>
    <script src="js/exercise_view.js"></script>
</section>
</body>
</html>
