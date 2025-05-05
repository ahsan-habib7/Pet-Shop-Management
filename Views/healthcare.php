<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honeycomb Grid Layout In Pure CSS</title>
    <link rel="stylesheet" href="css/healthcare.css">
    <style>
        .panel {
            display: none;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }
    </style>
</head>
<body>

<section class="healthcare" id="healthcare">
    <div class="help-text">How can we help your pet today?</div>
    <ul class="honeycomb">
        <div class="honeycomb-cell" onclick="showPanel('skin-allergies')">
            <img class="honeycomb-cell_img" src="img/skin problems.png">
            <div class="honeycomb-cell_title">Skin Allergies</div>
        </div>
        <div class="honeycomb-cell" onclick="showPanel('bad-breath')">
            <img class="honeycomb-cell_img" src="img/badbreath.png">
            <div class="honeycomb-cell_title">Bad Breath</div>
        </div>
        <div class="honeycomb-cell" onclick="showPanel('anxiety-and-stress')">
            <img class="honeycomb-cell_img" src="img/anxiety.png">
            <div class="honeycomb-cell_title">Anxiety and Stress</div>
        </div>
        <div class="honeycomb-cell" onclick="showPanel('joint-problem')">
            <img class="honeycomb-cell_img" src="img/jointproblem.png">
            <div class="honeycomb-cell_title">Joint Problem</div>
        </div>
        <div class="honeycomb-cell" onclick="showPanel('ear-infection')">
            <img class="honeycomb-cell_img" src="img/ear infection.png">
            <div class="honeycomb-cell_title">Ear Infection</div>
        </div>
        <div class="honeycomb-cell" onclick="showPanel('loose-stool')">
            <img class="honeycomb-cell_img" src="img/loose stool.png">
            <div class="honeycomb-cell_title">Loose Stool</div>
        </div>
        <div class="honeycomb-cell" onclick="showPanel('obesity')">
            <img class="honeycomb-cell_img" src="img/Obesity.png">
            <div class="honeycomb-cell_title">Obesity</div>
        </div>
        <li class="honeycomb-cell honeycomb_Hidden"></li>
    </ul>
</section>

<!-- Panels for each problem -->
<div id="skin-allergies" class="panel">
    <h2>Skin Allergies</h2>
    <p>Common causes of pet skin allergies include food, environmental factors, and parasites. Consult a vet for appropriate treatment.</p>
</div>

<div id="bad-breath" class="panel">
    <h2>Bad Breath</h2>
    <p>Bad breath in pets can indicate dental issues or digestive problems. Regular brushing and vet checkups are recommended.</p>
</div>

<div id="anxiety-and-stress" class="panel">
    <h2>Anxiety and Stress</h2>
    <p>Provide a calm environment, regular exercise, and mental stimulation. Consider pheromone diffusers or consult a vet for severe cases.</p>
</div>

<div id="joint-problem" class="panel">
    <h2>Joint Problem</h2>
    <p>Maintain a healthy weight and provide joint supplements. Regular exercise and vet checkups can help improve joint health.</p>
</div>

<div id="ear-infection" class="panel">
    <h2>Ear Infection</h2>
    <p>Clean your pet's ears regularly and avoid excessive moisture. If symptoms persist, consult a vet for proper medication.</p>
</div>

<div id="loose-stool" class="panel">
    <h2>Loose Stool</h2>
    <p>Loose stool can be caused by diet changes, infections, or allergies. Provide a balanced diet and consult a vet if symptoms persist.</p>
</div>

<div id="obesity" class="panel">
    <h2>Obesity</h2>
    <p>Control portion sizes, provide a balanced diet, and encourage regular exercise to maintain a healthy weight.</p>
</div>

<script>
    function showPanel(panelId) {
        // Hide all panels
        document.querySelectorAll('.panel').forEach(panel => {
            panel.style.display = 'none';
        });

        // Show the selected panel
        document.getElementById(panelId).style.display = 'block';
    }
</script>

</body>
</html>
