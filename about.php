<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Symptoms & Medicines - AI Healthcare Chatbot</title>

<style>
body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f4f9ff;
}

/* Header */
header {
    background: linear-gradient(to right, #0077b6, #0096c7);
    color: white;
    text-align: center;
    padding: 25px;
}

/* Navigation */
nav {
    background: #023e8a;
    padding: 12px;
    text-align: center;
}

nav a {
    color: white;
    text-decoration: none;
    margin: 0 15px;
    font-weight: bold;
}

nav a:hover {
    text-decoration: underline;
}

/* Container */
.container {
    padding: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

/* Cards */
.card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.card h3 {
    color: #0077b6;
    margin-top: 0;
}

ul {
    padding-left: 20px;
    line-height: 1.6;
}

/* Footer */
footer {
    background: #023e8a;
    color: white;
    text-align: center;
    padding: 15px;
    margin-top: 30px;
}
</style>
</head>

<body>

<header>
    <h1>Common Symptoms & Suggested Medicines</h1>
    <p>AI Healthcare Chatbot System - Major Project</p>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="about.php">Normal Medication</a>
</nav>

<div class="container">

<?php
$medicalData = [
["Fever","Paracetamol","Rest & drink fluids"],
["Headache","Ibuprofen","Hydration & rest"],
["Cold","Cetirizine","Steam inhalation"],
["Cough","Dextromethorphan Syrup","Warm fluids"],
["Weakness","Multivitamins","Balanced diet"],
["Stomach Pain","Antacid","Avoid spicy food"],
["Acidity","Pantoprazole","Small frequent meals"],
["Diarrhea","ORS, Loperamide","Stay hydrated"],
["Vomiting","Ondansetron","Light food"],
["Allergy","Loratadine","Avoid allergens"],
["Body Pain","Paracetamol","Proper rest"],
["Back Pain","Diclofenac","Correct posture"],
["Toothache","Ibuprofen","Dental consultation"],
["Sore Throat","Lozenges","Salt water gargle"],
["Skin Rash","Calamine Lotion","Keep skin clean"],
["High BP","Amlodipine","Low salt diet"],
["Diabetes","Metformin","Control sugar intake"],
["Asthma","Salbutamol Inhaler","Avoid dust"],
["Migraine","Sumatriptan","Avoid bright light"],
["Ear Pain","Ear Drops","Avoid water entry"],
["Eye Irritation","Lubricating Drops","Avoid rubbing eyes"],
["Dehydration","ORS","Increase water intake"],
["Insomnia","Melatonin","Maintain sleep schedule"],
["Anxiety","Doctor prescribed medication","Relaxation exercises"],
["Minor Cuts","Antiseptic Cream","Clean wound properly"]
];

foreach($medicalData as $data){
    echo "<div class='card'>
            <h3>".$data[0]."</h3>
            <ul>
                <li><strong>Medicine:</strong> ".$data[1]."</li>
                <li><strong>Advice:</strong> ".$data[2]."</li>
            </ul>
          </div>";
}
?>

</div>

<footer>
⚠ Disclaimer: This information is for educational purposes only. 
Please consult a certified doctor for serious medical conditions.
</footer>

</body>
</html> 