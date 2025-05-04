<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grooming Services</title>
    <link rel="stylesheet" href="css/grooming_view.css">
</head>
<body>
<section class="grooming" id="grooming">
    <div class="grooming-container">
        <h2>Grooming Services</h2>
        <p>At our pet shop, we offer professional grooming services to keep your furry friend looking and feeling their best. Our experienced groomers provide a range of services tailored to your pet's needs.</p>

        <div class="grooming-services-list">
            <h3>Our Grooming Services:</h3>
            <form id="grooming-form">
                <label class="grooming-service-label">
                    Bathing & Drying - $30
                    <input type="checkbox" name="service" value="30">
                </label>
                <label class="grooming-service-label">
                    Hair Trimming & Styling - $25
                    <input type="checkbox" name="service" value="25">
                </label>
                <label class="grooming-service-label">
                    Nail Clipping - $15
                    <input type="checkbox" name="service" value="15">
                </label>
                <label class="grooming-service-label">
                    Ear Cleaning - $10
                    <input type="checkbox" name="service" value="10">
                </label>
                <label class="grooming-service-label">
                    Teeth Brushing - $20
                    <input type="checkbox" name="service" value="20">
                </label>
                <label class="grooming-service-label">
                    De-shedding Treatment - $35
                    <input type="checkbox" name="service" value="35">
                </label>
            </form>
        </div>

        <div class="grooming-booking-summary">
            <h3>Your Selection:</h3>
            <p id="grooming-selected-services">No services selected.</p>
            <p>Total: $<span id="grooming-total-price">0</span></p>
            <button id="grooming-book-now">Book Now</button>
        </div>

        <div class="grooming-booking-form" id="grooming-booking-form">
            <h3>Book a Grooming Session</h3>
            <form action="#" method="post">
                <div class="grooming-form-group">
                    <label for="grooming-pet-name" class="grooming-form-label">Pet Name:</label>
                    <input type="text" id="grooming-pet-name" name="pet_name" required>
                </div>

                <div class="grooming-form-group">
                    <label for="grooming-pet-type" class="grooming-form-label">Pet Type:</label>
                    <input type="text" id="grooming-pet-type" name="pet_type" required>
                </div>

                <div class="grooming-form-group">
                    <label for="grooming-owner-name" class="grooming-form-label">Owner Name:</label>
                    <input type="text" id="grooming-owner-name" name="owner_name" required>
                </div>

                <div class="grooming-form-group">
                    <label for="grooming-contact-number" class="grooming-form-label">Contact Number:</label>
                    <input type="tel" id="grooming-contact-number" name="contact_number" required>
                </div>

                <div class="grooming-form-group">
                    <label for="grooming-preferred-date" class="grooming-form-label">Preferred Date:</label>
                    <input type="date" id="grooming-preferred-date" name="preferred_date" required>
                </div>

                <div class="grooming-form-group" style="grid-column: span 2;">
                    <label for="grooming-options" class="grooming-form-label">Selected Services:</label>
                    <textarea id="grooming-options" name="grooming_options" rows="5" readonly></textarea>
                </div>

                <button type="submit">Confirm Booking</button>
            </form>
        </div>
    </div>
</section>
<script src="js/grooming_view.js"></script>
</body>
</html>
