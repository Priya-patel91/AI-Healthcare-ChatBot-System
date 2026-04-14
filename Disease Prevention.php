<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease Prevention - Healthcare Advisory</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #f4f9ff 0%, #fffaf0 100%);
            color: #222;
        }

        header {
            background: linear-gradient(to right, #0077b6, #0096c7);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        header h1 {
            margin: 0;
            font-size: 2.2rem;
        }

        header p {
            margin: 0.5rem 0 0;
            opacity: 0.9;
        }

        nav {
            background: #023e8a;
            padding: 12px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 14px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 40px 20px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
            padding: 24px;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.12);
        }

        .card h2 {
            margin-top: 0;
            color: #0077b6;
        }

        .card ul {
            padding-left: 20px;
            line-height: 1.6;
        }

        .card li {
            margin-bottom: 0.65rem;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.3rem;
            border-radius: 10px;
            background: #0096c7;
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-top: 1rem;
            transition: background 0.2s ease;
        }

        .btn:hover {
            background: #0077b6;
        }

        footer {
            background: #023e8a;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }

        @media (max-width: 580px) {
            header h1 {
                font-size: 1.8rem;
            }

            .container {
                padding: 20px 16px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Disease Prevention & Wellness</h1>
    <p>Learn practical steps to stay healthy, avoid illness, and support long-term wellbeing.</p>
</header>

<nav>
    <a href="services.php">Back to Services</a>

</nav>

<div class="container">
    <div class="card">
        <h2>Why Disease Prevention Matters</h2>
        <p>Preventing disease is the most effective way to maintain long-term health and reduce the burden on you, your family, and the healthcare system. By focusing on prevention, you can reduce risk factors, avoid complications, and enjoy a higher quality of life.</p>
    </div>

    <div class="grid">
        <div class="card">
            <h2>Healthy Lifestyle Habits</h2>
            <ul>
                <li>Eat a balanced diet high in fruits, vegetables, whole grains, and lean protein.</li>
                <li>Stay physically active with at least 150 minutes of moderate exercise per week.</li>
                <li>Maintain a healthy weight and avoid excess sugar, salt, and processed foods.</li>
                <li>Limit alcohol intake and avoid tobacco or vaping products.</li>
                <li>Prioritize sleep—aim for 7–9 hours per night for most adults.</li>
            </ul>
        </div>

        <div class="card">
            <h2>Immunizations & Screening</h2>
            <ul>
                <li>Follow recommended vaccination schedules for your age and health status.</li>
                <li>Keep your vaccinations up to date—flu shot every year, boosters as needed.</li>
                <li>Attend regular health screenings (blood pressure, cholesterol, diabetes, cancers).</li>
                <li>Talk to your provider about age-specific screenings (mammograms, colonoscopy, bone density).</li>
            </ul>
        </div>

        <div class="card">
            <h2>Hygiene & Infection Prevention</h2>
            <ul>
                <li>Wash your hands regularly with soap for 20 seconds, especially before eating.</li>
                <li>Cough or sneeze into your elbow or a tissue, and dispose of tissues safely.</li>
                <li>Keep commonly touched surfaces clean, especially during flu or cold season.</li>
                <li>Stay home when sick to reduce spread of illness to others.</li>
            </ul>
        </div>

        <div class="card">
            <h2>Mental Health & Stress Management</h2>
            <ul>
                <li>Practice relaxation techniques like deep breathing, meditation, or yoga.</li>
                <li>Seek social support from friends, family, or support groups.</li>
                <li>Set realistic goals and celebrate small health wins.</li>
                <li>Ask a professional for help if you feel overwhelmed, anxious, or depressed.</li>
            </ul>
        </div>
    </div>

</div>

<footer>
    <p>⚠️ Disclaimer: This information is for educational purposes only. Consult a licensed healthcare provider for medical advice.</p>
</footer>

</body>
</html>
