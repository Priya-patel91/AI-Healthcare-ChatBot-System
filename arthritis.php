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
<title>Arthritis - Healthcare Advisory</title>

<style>
body { font-family:'Segoe UI'; margin:0; background:linear-gradient(#f8f0ff,#fff); }
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
<h1>Arthritis Care</h1>
<p>Joint Health & Pain Management</p>
</header>

<nav>
<a href="index.php">Home</a>
<a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['user']['username']); ?>)</a>
</nav>

<div class="container">

<h2>🦴 What is Arthritis?</h2>
<div class="card">
<p>Arthritis is inflammation of joints causing pain, stiffness, and reduced movement. It is common in older adults but can affect any age.</p>
</div>

<h2>⚠️ Types</h2>
<div class="card">
<ul>
<li>Osteoarthritis (wear & tear)</li>
<li>Rheumatoid arthritis (autoimmune)</li>
<li>Gout (uric acid buildup)</li>
</ul>
</div>

<h2>🚨 Symptoms</h2>
<div class="card">
<ul>
<li>Joint pain</li>
<li>Swelling</li>
<li>Stiffness</li>
<li>Reduced movement</li>
</ul>
</div>

<h2>🛡️ Prevention Tips</h2>
<div class="tips">
<ul>
<li>Maintain healthy weight</li>
<li>Exercise regularly</li>
<li>Avoid joint injuries</li>
<li>Eat calcium & vitamin D rich food</li>
</ul>
</div>

<h2>💊 Treatment</h2>
<div class="card">
<ul>
<li>Pain relief medicines</li>
<li>Physical therapy</li>
<li>Joint exercises</li>
<li>Surgery (severe cases)</li>
</ul>
</div>

<h2>⚠️ When to See Doctor</h2>
<div class="alert">
<ul>
<li>Severe joint pain</li>
<li>Swelling for long time</li>
<li>Difficulty in movement</li>
</ul>
</div>

</div>

<footer>
<p>&copy; 2026 Healthcare Advisory System</p>
</footer>

</body>
</html>