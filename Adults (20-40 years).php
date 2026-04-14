<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adults (20-40 years) - Healthcare Advisory</title>
    <style>
        :root {
            --bg1: #f0f4ff;
            --bg2: #e9f2ff;
            --accent: #1d4ed8;
            --accent2: #2563eb;
            --text: #102a43;
            --card: rgba(255, 255, 255, 0.95);
            --shadow: rgba(0, 0, 0, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(140deg, var(--bg1), var(--bg2));
            color: var(--text);
        }

        header {
            text-align: center;
            padding: 3rem 1rem 2.25rem;
            background: linear-gradient(135deg, rgba(29,78,216,0.9), rgba(37,99,235,0.85));
            clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);
            box-shadow: 0 18px 35px rgba(0,0,0,0.18);
        }

        header h1 {
            margin: 0;
            font-size: clamp(2rem, 5vw, 3rem);
            letter-spacing: 0.02em;
            color: white;
        }

        header p {
            max-width: 740px;
            margin: 1rem auto 0;
            font-size: 1.1rem;
            opacity: 0.92;
            color: rgba(255,255,255,0.9);
        }

        nav {
            margin: 2rem auto 0;
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            padding: 0 1rem;
        }

        nav a {
            padding: 0.75rem 1.3rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--text);
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 10px 22px rgba(0,0,0,0.12);
            transition: transform 0.25s ease, background 0.25s ease;
        }

        nav a:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 1);
        }

        main {
            max-width: 1100px;
            margin: 2.5rem auto 3rem;
            padding: 0 1rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.75rem;
        }

        .card {
            background: var(--card);
            border-radius: 22px;
            padding: 1.75rem;
            box-shadow: 0 12px 30px var(--shadow);
            border: 1px solid rgba(255,255,255,0.7);
            position: relative;
            overflow: hidden;
            min-height: 260px;
        }

        .card::before {
            content: "";
            position: absolute;
            top: -25px;
            right: -35px;
            width: 120px;
            height: 120px;
            background: rgba(37, 99, 235, 0.2);
            border-radius: 50%;
            filter: blur(12px);
        }

        .card h2 {
            margin-top: 0;
            font-size: 1.5rem;
            color: #102a43;
        }

        .card p {
            margin: 0.85rem 0 1.2rem;
            line-height: 1.6;
        }

        .card ul {
            padding-left: 1.2rem;
            line-height: 1.6;
        }

        .card li {
            margin-bottom: 0.75rem;
        }

        .highlight {
            background: rgba(37, 99, 235, 0.18);
            border-left: 4px solid var(--accent);
            padding: 1rem 1.1rem;
            border-radius: 14px;
            margin: 1.5rem 0;
        }

        .highlight h3 {
            margin: 0 0 0.6rem;
            color: #102a43;
        }

        .hero-img {
            display: block;
            max-width: 500px;
            width: 100%;
            margin: 1.5rem auto 0;
            border-radius: 24px;
            box-shadow: 0 18px 30px rgba(0,0,0,0.18);
        }

        footer {
            text-align: center;
            padding: 2rem 1rem;
            background: rgba(13, 5, 170, 0.75);
            border-top: 1px solid rgba(0,0,0,0.12);
        }

        footer p {
            margin: 0;
            color: rgba(240, 234, 234, 0.65);
            font-size: 0.95rem;
        }

        @media (max-width: 640px) {
            header {
                clip-path: none;
                border-radius: 0 0 30px 30px;
            }

            .card::before {
                display: none;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Adults (20-40 years)</h1>
    <p>Health tips for busy adult life—balancing work, wellness, and long-term fitness.</p>
</header>

<nav>
    <a href="index.php">🏠 Home</a>
</nav>

<main>
    <div class="card">
        <h2>Daily Wellness Habits</h2>
        <p>Good habits are the foundation of adult health. Consistency is more powerful than perfection.</p>
        <ul>
            <li>Prioritize sleep: aim for 7-9 hours and keep a regular bedtime.</li>
            <li>Eat balanced meals with lean protein, whole grains, and plenty of vegetables.</li>
            <li>Stay hydrated: carry a water bottle and sip throughout the day.</li>
        </ul>

        <div class="highlight">
            <h3>Quick Win</h3>
            <p>Start each day with a glass of water and a 5-minute stretch to set a healthy tone.</p>
        </div>
    </div>

    <div class="card">
        <h2>Fitness & Movement</h2>
        <p>Move in ways you enjoy, and aim for a mix of cardio, strength, and flexibility.</p>
        <ul>
            <li>Schedule 150 minutes of moderate activity per week (walks, cycling, class).</li>
            <li>Include strength training 2-3 times weekly (bodyweight, weights, resistance bands).</li>
            <li>Take short movement breaks during long work sessions to reduce stiffness and boost focus.</li>
        </ul>

        <img class="hero-img" src="https://via.placeholder.com/500x320?text=Active+Adults" alt="Adults exercising">
    </div>

    <div class="card">
        <h2>Stress Management & Mental Health</h2>
        <p>Adult life can be busy—simple routines and small pauses can support mental clarity and resilience.</p>
        <ul>
            <li>Practice brief mindfulness or deep breathing daily (even 2-3 minutes helps).</li>
            <li>Set boundaries around work and personal time to prevent burnout.</li>
            <li>Talk with trusted friends or a professional when you feel overwhelmed.</li>
        </ul>

        <div class="highlight">
            <h3>Mindful Moment</h3>
            <p>Try the 5-4-3-2-1 grounding exercise: name 5 things you see, 4 you can touch, 3 you hear, 2 you smell, and 1 you can taste.</p>
        </div>
    </div>

    <div class="card">
        <h2>Preventive Care</h2>
        <p>Regular checkups and preventive screenings help you stay ahead of health issues.</p>
        <ul>
            <li>Book annual physicals and keep vaccinations up to date.</li>
            <li>Monitor blood pressure, cholesterol, and blood sugar as recommended.</li>
            <li>Practice safe habits (seat belts, sunscreen, and avoiding risky behaviors).</li>
        </ul>
    </div>
</main>

<footer>
    <p>⚠️ This is general information. For personalized health advice, consult a healthcare provider.</p>
</footer>

</body>
</html>
