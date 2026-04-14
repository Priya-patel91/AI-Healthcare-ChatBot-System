<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness & Wellness - Healthcare Advisory</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8f0ff 0%, #fff5e6 100%);
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #6A0DAD 0%, #4B0082 100%);
            color: white;
            padding: 2rem 1rem;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: clamp(1.5rem, 4vw, 2.5rem);
        }

        header p {
            opacity: 0.9;
            margin-top: 0.5rem;
        }

        nav {
            background: rgba(0, 95, 115, 0.95);
            padding: 0.8rem 1rem;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background 0.2s ease;
            margin: 0 0.25rem;
            display: inline-block;
        }

        nav a:hover {
            background: rgba(255, 193, 7, 0.2);
        }

        main {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.08);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .card h2 {
            margin-top: 0;
            color: #4B0082;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .grid .card {
            padding: 1.6rem;
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
            background: #FFC107;
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-top: 1rem;
            transition: background 0.2s ease;
        }

        .btn:hover {
            background: #ffb300;
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
    <h1>Fitness & Wellness</h1>
    <p>Your guide to safe, sustainable exercise habits and holistic wellbeing.</p>
</header>

<nav>
    <a href="services.php">Back to Services</a>

    <a href="about.php">Medication</a>
</nav>

<main>
    <div class="card">
        <h2>Why Fitness & Wellness Matter</h2>
        <p>Regular physical activity and a wellness-focused lifestyle are the foundation of long-term health. This page provides practical advice to help you build habits that improve strength, mobility, mood, sleep, and resilience.</p>
    </div>

    <div class="card">
        <h2>Core Fitness Principles</h2>
        <ul>
            <li><strong>Consistency over intensity:</strong> Small, regular workouts build habits and reduce injury risk.</li>
            <li><strong>Progressive overload:</strong> Gradually increase the difficulty of your workouts to keep improving.</li>
            <li><strong>Balance:</strong> Combine cardiovascular, strength, flexibility, and recovery activities.</li>
            <li><strong>Listen to your body:</strong> Rest when needed and modify exercises if you feel pain.</li>
            <li><strong>Hydration & nutrition:</strong> Support your workouts with proper fuel and water intake.</li>
        </ul>
    </div>

    <div class="grid">
        <div class="card">
            <h2>Cardio & Heart Health</h2>
            <ul>
                <li>Aim for at least 150 minutes of moderate activity per week (e.g. brisk walking, cycling, swimming).</li>
                <li>Include shorter bursts of higher intensity (intervals) to boost cardiovascular fitness.</li>
                <li>Choose activities you enjoy so you stay motivated.</li>
            </ul>
        </div>

        <div class="card">
            <h2>Strength & Mobility</h2>
            <ul>
                <li>Perform strength exercises 2–3 times per week targeting major muscle groups.</li>
                <li>Use bodyweight, resistance bands, or weights depending on your fitness level.</li>
                <li>Include mobility work (stretching, foam rolling, yoga) to support joint health.</li>
            </ul>
        </div>

        <div class="card">
            <h2>Recovery & Wellness Habits</h2>
            <ul>
                <li>Sleep 7–9 hours per night to support recovery and cognitive function.</li>
                <li>Practice stress reduction techniques such as deep breathing, meditation, or brief walks.</li>
                <li>Maintain a balanced diet rich in whole foods and antioxidants to support recovery.</li>
            </ul>
        </div>

        <div class="card">
            <h2>Getting Started Safely</h2>
            <ul>
                <li>Check with your healthcare provider before starting a new program, especially if you have chronic conditions.</li>
                <li>Begin with low-impact activities if you are returning to exercise after a break.</li>
                <li>Warm up before workouts and cool down afterward to reduce injury risk.</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <h2>Sample Weekly Workout Plan</h2>
        <p>Use this as a starting point and adjust it based on your fitness level and schedule.</p>
        <ul>
            <li><strong>Monday:</strong> 30 min brisk walk + bodyweight strength (squats, push-ups, planks)</li>
            <li><strong>Tuesday:</strong> Yoga or mobility session (20–30 min)</li>
            <li><strong>Wednesday:</strong> Interval cardio (walk/jog intervals) + light strength</li>
            <li><strong>Thursday:</strong> Active recovery (stretching, gentle cycle, leisure swim)</li>
            <li><strong>Friday:</strong> Full-body circuit (squats, lunges, rows, core exercises)</li>
            <li><strong>Saturday:</strong> Outdoor activity (hike, bike ride, dance class)</li>
            <li><strong>Sunday:</strong> Rest or gentle movement (walking, stretching)</li>
        </ul>
    </div>

</main>

<footer>
    <p>⚠️ Disclaimer: This information is for educational purposes only. Consult a licensed healthcare provider for individualized medical advice.</p>
</footer>

</body>
</html>
