<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Plans</title>
    <link rel="stylesheet" href="css/pettraning_view.css">
</head>
<body>
    <section class="training" id="training">
        <h2>Pet Training Services</h2>
        <h1>Training <span>Plans</span></h1>

        <div class="testimonials">
            <h2>What Our Clients Say</h2>
            <div class="testimonial">
                <p>"The training has been fantastic. My dog has learned so much and is much more obedient!" - <span class="author">Alice M.</span></p>
            </div>
            <div class="testimonial">
                <p>"Excellent training programs. The trainers are knowledgeable and friendly." - <span class="author">John D.</span></p>
            </div>
            <div class="testimonial">
                <p>"Highly recommend! The personalized sessions made a big difference for my dog's behavior." - <span class="author">Samantha W.</span></p>
            </div>
        </div>

        <div class="schedule">
            <h2>Training Schedule</h2>
            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Session</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monday</td>
                        <td>10:00 AM - 11:00 AM</td>
                        <td>Basic Training</td>
                    </tr>
                    <tr>
                        <td>Wednesday</td>
                        <td>2:00 PM - 3:00 PM</td>
                        <td>Advanced Training</td>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <td>4:00 PM - 5:00 PM</td>
                        <td>Expert Training</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="training-plans">
            <div class="plan">
                <h2>Basic Training</h2>
                <p><strong>$79</strong>/Mo</p>
                <ul>
                    <li>✔️ Basic Commands</li>
                    <li>✔️ Leash Training</li>
                    <li>❌ Advanced Tricks</li>
                </ul>
                <button onclick="openForm('Basic Training', '$79')">Book Now</button>
            </div>
            <div class="plan">
                <h2>Advanced Training</h2>
                <p><strong>$129</strong>/Mo</p>
                <ul>
                    <li>✔️ Basic Commands</li>
                    <li>✔️ Advanced Tricks</li>
                    <li>✔️ Behavioral Training</li>
                </ul>
                <button onclick="openForm('Advanced Training', '$129')">Book Now</button>
            </div>
            <div class="plan">
                <h2>Expert Training</h2>
                <p><strong>$179</strong>/Mo</p>
                <ul>
                    <li>✔️ Basic Commands</li>
                    <li>✔️ Advanced Tricks</li>
                    <li>✔️ Behavioral Training</li>
                    <li>✔️ Personalized Sessions</li>
                </ul>
                <button onclick="openForm('Expert Training', '$179')">Book Now</button>
            </div>
        </div>

        <!-- Booking Form -->
        <div id="bookingForm">
            <h2>Book a Session for <span id="trainingType"></span> - <span id="trainingPrice"></span></h2>
            <form action="#" method="POST">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name">

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="xyz@gmail.com.............">

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone">

                <label for="pettype">Pet type</label>
                <input type="text" id="type" name="phone">

                <label for="date">Preferred Date</label>
                <input type="date" id="date" name="date">

                <label for="time">Preferred Time</label>
                <input type="time" id="time" name="time">

                <label for="message">Additional Comments</label>
                <textarea id="message" name="message" rows="4"></textarea>

                <button type="submit">Book Now</button>
            </form>
        </div>
    </section>

    <script src="js/pettraning_view.js"></script>
</body>
</html>
