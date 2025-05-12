<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>petboarding Plans</title>
    <link rel="stylesheet" href="css/petboarding_view.css">
</head>
<body>
    <section class="petboarding" id="petboarding">
        <h2>Pet boarding Services</h2>
        <h1>Choose the <span>Best Price</span></h1>
        <div class="petboarding-cards">
            <div class="card">
                <img src="img/cat1.jpg" alt="Basic Plan">
                <div class="card-header">
                    <h2>Basic</h2>
                    <p><span>$49</span>/Mo</p>
                </div>
                <ul class="features">
                    <li>✔️ Feeding</li>
                    <li>✔️ Boarding</li>
                    <li>❌ Spa & Grooming</li>
                    <li>❌ Veterinary Medicine</li>
                </ul>
                <button>Book Now</button>
            </div>
            <div class="card">
                <img src="img/dogs.jpg" alt="Standard Plan">
                <div class="card-header">
                    <h2>Standard</h2>
                    <p><span>$99</span>/Mo</p>
                </div>
                <ul class="features">
                    <li>✔️ Feeding</li>
                    <li>✔️ Boarding</li>
                    <li>✔️ Spa & Grooming</li>
                    <li>❌ Veterinary Medicine</li>
                </ul>
                <button>Book Now</button>
            </div>
            <div class="card">
                <img src="img/cat2.jpg" alt="Premium Plan">
                <div class="card-header">
                    <h2>Premium</h2>
                    <p><span>$149</span>/Mo</p>
                </div>
                <ul class="features">
                    <li>✔️ Feeding</li>
                    <li>✔️ Boarding</li>
                    <li>✔️ Spa & Grooming</li>
                    <li>✔️ Veterinary Medicine</li>
                </ul>
                <button>Book Now</button>
            </div>
        </div>
        
        <!-- Signup Form -->
        <div id="bookingform">
            <h2>Booking Form</h2>
            <form>
                <label for="plan-type">Plan Type:</label>
                <input type="text" id="plan-type" readonly>

                <label for="total-price">Total Price:</label>
                <input type="text" id="total-price" readonly>

                <label for="owner-name">Owner's Name:</label>
                <input type="text" id="owner-name" placeholder="Enter owner's name" required>

                <label for="contact-number">Contact Number:</label>
                <input type="tel" id="contact-number" placeholder="Enter contact number" required>

                <label for="pet-name">Pet Name:</label>
                <input type="text" id="pet-name" placeholder="Enter pet's name" required>

                <label for="pet-type">Pet Type:</label>
                <input type="text" id="pet-type" placeholder="Enter pet's type (e.g., Dog, Cat)" required>

                <label for="dietary-preference">Dietary Preferences:</label>
                <select id="dietary-preference">
                    <option value="high-protein">High Protein</option>
                    <option value="weight-management">Weight Management</option>
                    <option value="allergy-friendly">Allergy-Friendly</option>
                </select>

                <label for="additional-notes">Additional Notes:</label>
                <textarea id="additional-notes" rows="4" placeholder="Any special requirements or requests..."></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
    <script src="js/petboarding_view.js"></script>
</body>
</html>
