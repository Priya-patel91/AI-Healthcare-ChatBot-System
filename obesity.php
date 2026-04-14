<?php
session_start();

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
<title>Obesity - Healthcare Advisory</title>

<style>
body { font-family: 'Segoe UI'; margin:0; background: linear-gradient(#f8f0ff,#fff); }
header { background:#4B0082; color:white; padding:1.5rem; text-align:center; }
nav { background:#6A0DAD; padding:10px; text-align:center; }
nav a { color:white; margin:0 10px; text-decoration:none; font-weight:bold; }
.container { max-width:1000px; margin:2rem auto; padding:1rem; }
h2 { color:#4B0082; border-bottom:2px solid #6A0DAD; }
.card { background:white; padding:1.5rem; margin:1rem 0; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1);}
.tips { background:#fff8e1; padding:1rem; border-left:5px solid #6A0DAD; }
.alert { background:#ffe5e5; border-left:5px solid red; padding:1rem; }
footer { text-align:center; background:#4B0082; color:white; padding:1rem; }
</style>
</head>

<body>

<header>
<h1>Obesity Management</h1>
<p>Maintain Healthy Weight for Better Life</p>
</header>

<nav>
<a href="index.php">Home</a>

</nav>

<div class="container">

<h2>⚖️ What is Obesity?</h2>
<div class="card">
<p>Obesity is a condition where excess body fat increases the risk of health problems like diabetes, heart disease, and high blood pressure.</p>
</div>

<h2>⚠️ Causes</h2>
<div class="card">
<ul>
<li>Overeating & unhealthy diet</li>
<li>Lack of physical activity</li>
<li>Genetic factors</li>
<li>Stress and poor sleep</li>
</ul>
</div>

<h2>🚨 Symptoms</h2>
<div class="card">
<ul>
<li>Excess body weight</li>
<li>Breathlessness</li>
<li>Fatigue</li>
<li>Joint pain</li>
</ul>
</div>

<h2>🛡️ Prevention & Control</h2>
<div class="tips">
<ul>
<li>Eat balanced diet (fruits, vegetables)</li>
<li>Exercise daily (30–45 min)</li>
<li>Avoid junk food & sugary drinks</li>
<li>Drink plenty of water</li>
<li>Maintain regular sleep schedule</li>
</ul>
</div>

<h2>💊 Treatment</h2>
<div class="card">
<ul>
<li>Diet plan by nutritionist</li>
<li>Regular physical activity</li>
<li>Medical treatment (if required)</li>
<li>Bariatric surgery (severe cases)</li>
</ul>
</div>

<h2>⚠️ When to Consult Doctor</h2>
<div class="alert">
<ul>
<li>BMI > 30</li>
<li>Sudden weight gain</li>
<li>Breathing problems</li>
</ul>
</div>

</div>

<footer>
<p>&copy; 2026 Healthcare Advisory System</p>
</footer>

</body>
</html>