<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Middle-Aged (41-60 years) - Healthcare Advisory</title>
    <style>
        :root {
            --bg1: #f7fbff;
            --bg2: #e3f2fd;
            --accent: #0b6e99;
            --accent2: #0c4a6e;
            --text: #102a43;
            --card: rgba(255, 255, 255, 0.92);
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
            background: linear-gradient(135deg, rgba(11,110,153,0.9), rgba(12,74,110,0.85));
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
            max-width: 720px;
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

        .card {
            background: var(--card);
            border-radius: 22px;
            padding: 1.75rem;
            box-shadow: 0 12px 30px var(--shadow);
            border: 1px solid rgba(255,255,255,0.7);
            position: relative;
            overflow: hidden;
            min-height: 220px;
        }

        .card h2 {
            margin-top: 0;
            font-size: 1.5rem;
            color: var(--text);
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
            background: rgba(11, 110, 153, 0.18);
            border-left: 4px solid var(--accent);
            padding: 1rem 1.1rem;
            border-radius: 14px;
            margin: 1.5rem 0;
        }

        .highlight h3 {
            margin: 0 0 0.6rem;
            color: var(--accent2);
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
            background: rgba(255, 255, 255, 0.75);
            border-top: 1px solid rgba(0,0,0,0.12);
        }

        footer p {
            margin: 0;
            color: rgba(0,0,0,0.65);
            font-size: 0.95rem;
        }

        @media (max-width: 640px) {
            header {
                clip-path: none;
                border-radius: 0 0 30px 30px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Middle-Aged Adults (41-60 years)</h1>
    <p>Key health priorities for midlife — staying strong, managing stress, and preventing chronic disease.</p>
</header>

<nav>
    <a href="index.php">🏠 Home</a>
</nav>

<main>
    <div class="card">
        <h2>Health Screenings & Prevention</h2>
        <p>Regular checkups can catch issues early when they’re easiest to treat.</p>
        <ul>
            <li>Schedule annual physicals and follow recommended screenings (blood pressure, cholesterol, diabetes).</li>
            <li>Stay current with vaccines, including flu and any age-based boosters.</li>
            <li>Discuss bone health, heart disease risk, and cancer screenings with your provider.</li>
        </ul>

        <div class="highlight">
            <h3>Quick Reminder</h3>
            <p>Keep a health log of lab results and medications to track changes over time.</p>
        </div>
    </div>

    <div class="card">
        <h2>Fitness & Strength</h2>
        <p>Consistency matters more than intensity. Build habits that support strength, mobility, and energy.</p>
        <ul>
            <li>Mix cardio (walking, cycling), strength training, and flexibility work each week.</li>
            <li>Choose weight-bearing exercises and resistance training to support bone health.</li>
            <li>Listen to your body: rest when needed and adjust intensity according to how you feel.</li>
        </ul>

        <img class="hero-img" src="https://via.placeholder.com/500x320?text=Active+Midlife" alt="Middle-aged adults exercising">
    </div>

    <div class="card">
        <h2>Nutrition & Healthy Habits</h2>
        <p>Focus on nutrient-dense foods, balanced meals, and mindful habits to support long-term wellbeing.</p>
        <ul>
            <li>Prioritize vegetables, lean proteins, healthy fats, and whole grains.</li>
            <li>Reduce added sugars and highly processed foods.</li>
            <li>Stay hydrated and limit excess caffeine and alcohol.</li>
        </ul>

        <div class="highlight">
            <h3>Tip</h3>
            <p>Start meals with a salad or vegetable to boost fiber and slow digestion for better blood sugar control.</p>
        </div>
    </div>

    <div class="card">
        <h2>Stress & Wellbeing</h2>
        <p>Managing stress and prioritizing mental health is essential during busy midlife years.</p>
        <ul>
            <li>Practice stress-reduction techniques like deep breathing, meditation, or mindful walks.</li>
            <li>Keep social connections strong—relationships matter for long-term health.</li>
            <li>Get 7-8 hours of sleep and create a calming bedtime routine.</li>
        </ul>
    </div>
</main>

<footer>
    <p>⚠️ This information is general guidance. For personalized medical advice, consult a healthcare provider.</p>
</footer>

</body>
</html>
