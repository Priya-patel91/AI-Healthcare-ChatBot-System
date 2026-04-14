<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adolescents (13-19 years) - Healthcare Advisory</title>
    <style>
        :root {
            --bg-start: #0f2027;
            --bg-mid: #203a43;
            --bg-end: #2c5364;
            --card: rgba(255, 255, 255, 0.95);
            --text: #1a202c;
            --accent: #ffb703;
            --accent2: #8ecae6;
            --shadow: rgba(0,0,0,0.18);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            background: radial-gradient(circle at top, var(--bg-start), var(--bg-mid), var(--bg-end));
            min-height: 100vh;
        }

        header {
            text-align: center;
            padding: 3rem 1rem 2.5rem;
            background: linear-gradient(135deg, rgba(255,183,3,0.9), rgba(142,202,230,0.85));
            clip-path: polygon(0 0, 100% 0, 100% 75%, 0 100%);
            box-shadow: 0 18px 35px rgba(0,0,0,0.25);
        }

        header h1 {
            margin: 0;
            font-size: clamp(2rem, 5vw, 3.2rem);
            letter-spacing: 0.03em;
            color: #102a43;
        }

        header p {
            max-width: 720px;
            margin: 1rem auto 0;
            font-size: 1.1rem;
            opacity: 0.9;
            color: #102a43;
        }

        nav {
            margin: 2rem auto 0;
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            padding: 0 1rem;
        }

        nav a {
            padding: 0.7rem 1.3rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--text);
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 8px 20px rgba(0,0,0,0.18);
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
            gap: 1.8rem;
        }

        .card {
            background: var(--card);
            border-radius: 24px;
            padding: 1.75rem;
            box-shadow: 0 12px 30px var(--shadow);
            border: 1px solid rgba(255,255,255,0.6);
            position: relative;
            overflow: hidden;
            min-height: 260px;
        }

        .card::before {
            content: "";
            position: absolute;
            top: -30px;
            right: -40px;
            width: 120px;
            height: 120px;
            background: rgba(255, 183, 3, 0.25);
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
            background: rgba(142,202,230,0.25);
            border-left: 4px solid var(--accent);
            padding: 1rem 1.1rem;
            border-radius: 14px;
            margin: 1.5rem 0;
        }

        .highlight h3 {
            margin: 0 0 0.6rem;
            color: #102a43;
        }

        .hero-image {
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
            background: rgba(255, 255, 255, 0.8);
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

            .card::before {
                display: none;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Adolescents (13-19 years)</h1>
    <p>Support for mental wellness, healthy habits, and growing independence during the teen years.</p>
</header>

<nav>
    <a href="index.php">🏠 Home</a>
</nav>

<main>
    <div class="card">
        <h2>Mental Health & Resilience</h2>
        <p>This is a time of big emotions. Building healthy routines and coping tools can make a big difference.</p>
        <ul>
            <li>Check in with your feelings daily—name what you’re feeling and why.</li>
            <li>Create a “calm kit” with music, drawing, or breathing exercises to use when stressed.</li>
            <li>Reach out to a trusted adult or friend when you need support.</li>
        </ul>

        <div class="highlight">
            <h3>Quick Tip</h3>
            <p>If you’re feeling overwhelmed, try the 4-7-8 breathing method: breathe in 4 seconds, hold 7, breathe out 8.</p>
        </div>
    </div>

    <div class="card">
        <h2>Healthy Habits & Energy</h2>
        <p>Sleep, movement, and food are the foundation for feeling your best.</p>
        <ul>
            <li>Keep a consistent sleep schedule—even on weekends.</li>
            <li>Prioritize whole foods and include veggies, fruit, protein, and healthy fats.</li>
            <li>Move your body with activities you enjoy—sports, dance, or even walking with friends.</li>
        </ul>

        <img class="hero-image" src="https://via.placeholder.com/500x320?text=Healthy+Habits" alt="Teen being active">
    </div>

    <div class="card">
        <h2>School & Social Balance</h2>
        <p>Managing school, social life, and self-care is a skill that takes practice.</p>
        <ul>
            <li>Use a planner to break big tasks into smaller steps and avoid last-minute stress.</li>
            <li>Set boundaries around social media and screen time to protect your focus and mood.</li>
            <li>Make time for friends, but also for quiet moments and hobbies you love.</li>
        </ul>

        <div class="highlight">
            <h3>Study Hack</h3>
            <p>Try the Pomodoro technique: work for 25 minutes, then take a 5-minute break.</p>
        </div>
    </div>

    <div class="card">
        <h2>Safety & Communication</h2>
        <p>Staying safe and building healthy relationships are key during the teenage years.</p>
        <ul>
            <li>Talk openly about boundaries, consent, and respectful behavior.</li>
            <li>If you’re using substances or feel pressured, reach out to someone you trust.</li>
            <li>Know important numbers: parents, school counselor, and local helplines.</li>
        </ul>
    </div>
</main>

<footer>
    <p>⚠️ This information is general guidance. For personalized advice, consult a healthcare provider or trusted adult.</p>
</footer>

</body>
</html>
