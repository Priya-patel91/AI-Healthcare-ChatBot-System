<?php
session_start();

// Protect page
if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respiratory Conditions - Healthcare Advisory</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #f0f8ff, #ffffff);
        }

        header {
            background: #4B0082;
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        nav {
            background: #6A0DAD;
            padding: 0.8rem;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 1rem;
        }

        h2 {
            color: #4B0082;
            border-bottom: 2px solid #6A0DAD;
            padding-bottom: 5px;
        }

        .card {
            background: white;
            padding: 1.5rem;
            margin: 1rem 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .tips {
            background: #fff8e1;
            padding: 1rem;
            border-left: 5px solid #6A0DAD;
            border-radius: 6px;
        }

        ul {
            line-height: 1.8;
        }

        .alert {
            background: #ffe5e5;
            border-left: 5px solid red;
            padding: 1rem;
            border-radius: 6px;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background: #4B0082;
            color: white;
            margin-top: 2rem;
        }

    </style>
</head>

<body>

<header>
    <h1>Respiratory Conditions</h1>
    <p>Understand, Prevent & Manage Breathing Disorders</p>
</header>

<nav>
    <a href="index.php">Home</a>
</nav>

<div class="container">

    <h2>🫁 What are Respiratory Conditions?</h2>
    <div class="card">
        <p>
            Respiratory conditions affect the lungs and airways, making breathing difficult.
            These conditions can be temporary (like cold/flu) or chronic (like asthma).
        </p>
    </div>

    <h2>⚠️ Common Respiratory Diseases</h2>
    <div class="card">
        <ul>
            <li><b>Asthma</b> – Airways become narrow and inflamed</li>
            <li><b>Bronchitis</b> – Inflammation of bronchial tubes</li>
            <li><b>Pneumonia</b> – Lung infection causing fluid buildup</li>
            <li><b>COPD</b> – Chronic Obstructive Pulmonary Disease</li>
            <li><b>Tuberculosis (TB)</b> – Bacterial infection affecting lungs</li>
        </ul>
    </div>

    <h2>🚨 Symptoms to Watch</h2>
    <div class="card">
        <ul>
            <li>Shortness of breath</li>
            <li>Persistent cough</li>
            <li>Chest tightness or pain</li>
            <li>Wheezing sound while breathing</li>
            <li>Fatigue and weakness</li>
        </ul>
    </div>

    <h2>🛡️ Prevention Tips</h2>
    <div class="tips">
        <ul>
            <li>Avoid smoking and polluted environments</li>
            <li>Wear masks in dusty or polluted areas</li>
            <li>Get vaccinated (Flu, COVID-19)</li>
            <li>Maintain good indoor air quality</li>
            <li>Exercise regularly to improve lung capacity</li>
        </ul>
    </div>

    <h2>💊 Treatment & Care</h2>
    <div class="card">
        <ul>
            <li>Use inhalers or medications as prescribed</li>
            <li>Follow doctor's advice strictly</li>
            <li>Stay hydrated</li>
            <li>Practice breathing exercises</li>
            <li>Regular medical checkups</li>
        </ul>
    </div>

    <h2>⚠️ When to Seek Immediate Help</h2>
    <div class="alert">
        <ul>
            <li>Severe difficulty breathing</li>
            <li>Chest pain</li>
            <li>Blue lips or face</li>
            <li>High fever with breathing issues</li>
        </ul>
        <p><b>Call emergency services immediately (108 in India)</b></p>
    </div>

</div>

<footer>
    <p>&copy; 2026 Healthcare Advisory System</p>
</footer>

</body>
</html>