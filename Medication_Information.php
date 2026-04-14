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
    <title>Medication Information - Healthcare Advisory</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #22313f;
            background:
                radial-gradient(circle at top left, rgba(0, 180, 216, 0.16), transparent 28%),
                linear-gradient(135deg, #eef7ff 0%, #fff8ef 100%);
        }

        header {
            background: linear-gradient(135deg, #005f73 0%, #0a9396 100%);
            color: white;
            text-align: center;
            padding: 2.5rem 1rem;
        }

        header h1 {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3rem);
        }

        header p {
            max-width: 760px;
            margin: 0.8rem auto 0;
            line-height: 1.7;
            opacity: 0.95;
        }

        nav {
            background: rgba(75, 0, 130, 0.96);
            padding: 0.9rem 1rem;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 0.6rem;
            font-weight: 600;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 2rem 1rem 3rem;
        }

        .intro,
        .panel,
        .warning {
            background: white;
            border-radius: 18px;
            box-shadow: 0 10px 24px rgba(0, 95, 115, 0.09);
        }

        .intro {
            padding: 2rem;
            margin-bottom: 2rem;
            border-left: 6px solid #0a9396;
        }

        .section-title,
        .intro h2 {
            color: #005f73;
            margin-top: 0;
        }

        .intro p {
            margin-bottom: 0;
            line-height: 1.8;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .panel {
            padding: 1.5rem;
        }

        .panel h3 {
            margin-top: 0;
            color: #0a9396;
        }

        .panel ul {
            margin-bottom: 0;
            padding-left: 1.2rem;
            line-height: 1.8;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .step {
            background: #f5fbff;
            border: 1px solid rgba(10, 147, 150, 0.16);
            border-radius: 16px;
            padding: 1.4rem;
        }

        .step h3 {
            margin-top: 0;
            color: #005f73;
        }

        .warning {
            padding: 1.6rem;
            border-left: 6px solid #d62828;
        }

        .warning ul {
            margin-bottom: 0;
            padding-left: 1.2rem;
            line-height: 1.8;
        }

        footer {
            background: #005f73;
            color: white;
            text-align: center;
            padding: 1rem;
        }

        @media (max-width: 640px) {
            header {
                padding: 2rem 1rem;
            }

            .intro,
            .panel,
            .warning {
                border-radius: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Medication Information</h1>
        <p>Understand how to use medicines more safely, what details to check before taking them, and when to contact a doctor or pharmacist.</p>
    </header>

    <nav>
        <a href="services.php">Back to Services</a>
        
    </nav>

    <div class="container">
        <section class="intro">
            <h2>Why medication knowledge matters</h2>
            <p>Medicines can improve health when they are taken correctly, but the wrong dose, timing, or combination can cause problems. Reading labels carefully and asking questions helps reduce risk and improves treatment results.</p>
        </section>

        <h2 class="section-title">Important things to check</h2>
        <div class="grid">
            <section class="panel">
                <h3>Before taking medicine</h3>
                <ul>
                    <li>Check the medicine name and the purpose for taking it.</li>
                    <li>Read the dose, timing, and number of days clearly.</li>
                    <li>Tell your doctor about allergies, pregnancy, or other health conditions.</li>
                </ul>
            </section>

            <section class="panel">
                <h3>Use it correctly</h3>
                <ul>
                    <li>Take medicine exactly as prescribed or directed on the label.</li>
                    <li>Use the correct measuring spoon or cup for liquid medicines.</li>
                    <li>Do not crush or split tablets unless a professional says it is safe.</li>
                </ul>
            </section>

            <section class="panel">
                <h3>Stay alert to safety</h3>
                <ul>
                    <li>Watch for side effects like rash, dizziness, vomiting, or swelling.</li>
                    <li>Avoid mixing medicines without checking for interactions.</li>
                    <li>Store medicines away from heat, sunlight, and children.</li>
                </ul>
            </section>
        </div>

        <h2 class="section-title">Safe medication routine</h2>
        <div class="steps">
            <section class="step">
                <h3>1. Read the label</h3>
                <p>Look at the medicine name, instructions, expiry date, and any food or timing advice before every new course.</p>
            </section>

            <section class="step">
                <h3>2. Keep a schedule</h3>
                <p>Use a phone reminder, chart, or pill organizer so doses are not missed or repeated by mistake.</p>
            </section>

            <section class="step">
                <h3>3. Review regularly</h3>
                <p>Tell your doctor if the medicine is not helping, causes side effects, or seems difficult to manage.</p>
            </section>
        </div>

        <h2 class="section-title">When to get medical help quickly</h2>
        <section class="warning">
            <ul>
                <li>Difficulty breathing, swelling of the face, or a severe allergic reaction.</li>
                <li>Accidentally taking too much medicine or the wrong medicine.</li>
                <li>Severe side effects such as fainting, chest pain, or continuous vomiting.</li>
                <li>Symptoms getting worse even after taking the prescribed medicine.</li>
            </ul>
        </section>
    </div>

    <footer>
        <p>&copy; 2026 Healthcare Advisory System | Medication details on this page are educational and do not replace professional medical advice.</p>
    </footer>
</body>
</html>
