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
    <title>Mental Support - Healthcare Advisory</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2d1b3d;
            background:
                radial-gradient(circle at top right, rgba(255, 193, 7, 0.22), transparent 30%),
                linear-gradient(135deg, #f7efff 0%, #fff8ec 100%);
        }

        header {
            background: linear-gradient(135deg, #6A0DAD 0%, #4B0082 100%);
            color: white;
            text-align: center;
            padding: 2.5rem 1rem;
        }

        header h1 {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3rem);
        }

        header p {
            margin: 0.75rem auto 0;
            max-width: 700px;
            line-height: 1.7;
            opacity: 0.95;
        }

        nav {
            background: rgba(0, 95, 115, 0.95);
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
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1rem 3rem;
        }

        .hero-card,
        .section-card,
        .alert-box {
            background: white;
            border-radius: 18px;
            box-shadow: 0 10px 24px rgba(75, 0, 130, 0.08);
        }

        .hero-card {
            padding: 2rem;
            margin-bottom: 2rem;
            border-left: 6px solid #6A0DAD;
        }

        .hero-card h2,
        .section-title {
            color: #4B0082;
            margin-top: 0;
        }

        .hero-card p {
            line-height: 1.8;
            margin-bottom: 0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .section-card {
            padding: 1.5rem;
        }

        .section-card h3 {
            margin-top: 0;
            color: #6A0DAD;
        }

        .section-card ul {
            padding-left: 1.2rem;
            margin-bottom: 0;
            line-height: 1.8;
        }

        .routine {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .routine-step {
            background: #fffaf0;
            border: 1px solid rgba(106, 13, 173, 0.12);
            border-radius: 16px;
            padding: 1.4rem;
        }

        .routine-step h3 {
            color: #4B0082;
            margin-top: 0;
        }

        .alert-box {
            padding: 1.5rem;
            border-left: 6px solid #d62828;
        }

        .alert-box ul {
            margin-bottom: 0;
            padding-left: 1.2rem;
            line-height: 1.8;
        }

        footer {
            background: #4B0082;
            color: white;
            text-align: center;
            padding: 1rem;
        }

        @media (max-width: 640px) {
            header {
                padding: 2rem 1rem;
            }

            .hero-card,
            .section-card,
            .alert-box {
                border-radius: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Mental Support</h1>
        <p>Simple guidance to reduce stress, build emotional strength, and know when to reach out for extra help.</p>
    </header>

    <nav>
        <a href="services.php">Back to Services</a>
        
    </nav>

    <div class="container">
        <section class="hero-card">
            <h2>Why mental support matters</h2>
            <p>Mental support helps people feel heard, calmer, and more capable during difficult moments. Small daily habits, supportive conversations, and early care can make a real difference in emotional wellbeing.</p>
        </section>

        <h2 class="section-title">Healthy support strategies</h2>
        <div class="grid">
            <section class="section-card">
                <h3>Talk openly</h3>
                <ul>
                    <li>Share your feelings with a trusted friend or family member.</li>
                    <li>Ask for help before stress becomes overwhelming.</li>
                    <li>Stay connected instead of isolating yourself.</li>
                </ul>
            </section>

            <section class="section-card">
                <h3>Care for your body</h3>
                <ul>
                    <li>Sleep 7 to 9 hours regularly.</li>
                    <li>Eat balanced meals and drink enough water.</li>
                    <li>Use walking, stretching, or light exercise to release tension.</li>
                </ul>
            </section>

            <section class="section-card">
                <h3>Calm the mind</h3>
                <ul>
                    <li>Practice deep breathing for a few minutes each day.</li>
                    <li>Limit doom-scrolling and stressful media exposure.</li>
                    <li>Try journaling, prayer, or mindfulness for emotional balance.</li>
                </ul>
            </section>
        </div>

        <h2 class="section-title">A simple daily routine</h2>
        <div class="routine">
            <section class="routine-step">
                <h3>Morning reset</h3>
                <p>Start the day with a few deep breaths, a short stretch, and one positive intention for the day.</p>
            </section>

            <section class="routine-step">
                <h3>Midday check-in</h3>
                <p>Pause for water, a healthy snack, and a quick check of your mood, energy, and stress level.</p>
            </section>

            <section class="routine-step">
                <h3>Evening unwind</h3>
                <p>Reduce screen time, reflect on one good thing from the day, and prepare for restful sleep.</p>
            </section>
        </div>

        <h2 class="section-title">When to seek professional support</h2>
        <section class="alert-box">
            <ul>
                <li>Sadness, worry, or fear continues for many days or weeks.</li>
                <li>You lose interest in daily life, food, sleep, or relationships.</li>
                <li>Stress begins affecting work, study, or personal safety.</li>
                <li>You feel hopeless or have thoughts of harming yourself.</li>
            </ul>
        </section>
    </div>

    <footer>
        <p>&copy; 2026 Healthcare Advisory System | Mental support information is educational and not a substitute for medical care.</p>
    </footer>
</body>
</html>
