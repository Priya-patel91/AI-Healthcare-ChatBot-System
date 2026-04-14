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
    <title>Heart Diseases - Healthcare Advisory System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #24303a;
            background: linear-gradient(135deg, #fff1f2 0%, #fffaf3 55%, #eef8ff 100%);
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #b91c1c 0%, #7f1d1d 100%);
            color: #fff;
            padding: 2rem 1rem;
            text-align: center;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
        }

        header h1 {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            margin-bottom: 0.4rem;
        }

        header p {
            max-width: 760px;
            margin: 0 auto;
            opacity: 0.95;
        }

        nav {
            background: rgba(153, 27, 27, 0.95);
            padding: 0.85rem 1rem;
            display: flex;
            justify-content: center;
            gap: 0.8rem;
            flex-wrap: wrap;
            position: sticky;
            top: 0;
            z-index: 20;
            backdrop-filter: blur(8px);
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            padding: 0.55rem 0.95rem;
            border-radius: 999px;
            transition: background 0.25s ease, transform 0.25s ease;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.16);
            transform: translateY(-1px);
        }

        main {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1rem 3rem;
        }

        .hero {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .hero-panel,
        .info-card,
        .stat-card,
        .alert-box,
        .cta-box {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 24px rgba(127, 29, 29, 0.08);
        }

        .hero-panel {
            padding: 2rem;
            background: linear-gradient(135deg, #ffffff 0%, #fff3f4 100%);
            border: 1px solid #fecdd3;
        }

        .hero-panel h2 {
            color: #991b1b;
            font-size: clamp(1.5rem, 3vw, 2.3rem);
            margin-bottom: 0.9rem;
        }

        .hero-panel p {
            margin-bottom: 1rem;
        }

        .hero-side {
            display: grid;
            gap: 1rem;
        }

        .stat-card {
            padding: 1.5rem;
            border-left: 6px solid #ef4444;
        }

        .stat-card h3 {
            color: #991b1b;
            margin-bottom: 0.4rem;
        }

        section {
            margin-bottom: 2rem;
        }

        section h2 {
            color: #991b1b;
            margin-bottom: 1rem;
            font-size: clamp(1.4rem, 2.8vw, 2rem);
            border-bottom: 3px solid #ef4444;
            display: inline-block;
            padding-bottom: 0.45rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
        }

        .info-card {
            padding: 1.4rem;
            border-top: 5px solid #ef4444;
        }

        .info-card h3 {
            color: #b91c1c;
            margin-bottom: 0.7rem;
        }

        .tips-list {
            list-style: none;
            display: grid;
            gap: 0.85rem;
        }

        .tips-list li {
            background: #ffffff;
            padding: 1rem 1.1rem;
            border-radius: 12px;
            border-left: 5px solid #ef4444;
            box-shadow: 0 6px 18px rgba(127, 29, 29, 0.07);
        }

        .tips-list strong {
            color: #991b1b;
        }

        .alert-box {
            padding: 1.5rem;
            background: #fff1f2;
            border-left: 6px solid #dc2626;
        }

        .alert-box h3 {
            color: #b91c1c;
            margin-bottom: 0.65rem;
        }

        .cta-box {
            padding: 1.75rem;
            background: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%);
            color: #fff;
            text-align: center;
        }

        .cta-box h2 {
            border: none;
            color: #fff;
            padding: 0;
            margin-bottom: 0.8rem;
        }

        .cta-box p {
            max-width: 760px;
            margin: 0 auto 1.1rem;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            background: #f59e0b;
            color: #fff;
            padding: 0.8rem 1.3rem;
            border-radius: 999px;
            font-weight: 700;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.14);
        }

        footer {
            background: linear-gradient(135deg, #7f1d1d 0%, #4c0519 100%);
            color: #fff;
            text-align: center;
            padding: 1.5rem 1rem;
        }

        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
            }

            nav {
                position: static;
            }

            nav a {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Heart Disease Care and Awareness</h1>
        <p>Learn the early warning signs, understand common heart conditions, and build daily habits that protect long-term cardiovascular health.</p>
    </header>

    <nav>
        <!-- <a href="index.php">Home</a>
     -->
    </nav>

    <main>
        <section class="hero" id="overview">
            <div class="hero-panel">
                <h2>What Is Heart Disease?</h2>
                <p>Heart disease is a broad term for conditions that affect the heart and blood vessels, including blocked arteries, rhythm problems, weakened heart muscle, and valve disorders. Some forms develop slowly over time, while others can become emergencies without much warning.</p>
                <p>Risk can often be lowered through healthy food choices, regular movement, not smoking, quality sleep, and routine checks for blood pressure, cholesterol, and blood sugar.</p>
            </div>

            <div class="hero-side">
                <div class="stat-card">
                    <h3>Coronary Artery Disease</h3>
                    <p>Plaque narrows the arteries and reduces blood flow to the heart muscle.</p>
                </div>
                <div class="stat-card">
                    <h3>Heart Failure</h3>
                    <p>The heart becomes less effective at pumping blood where the body needs it.</p>
                </div>
                <div class="stat-card">
                    <h3>Arrhythmias</h3>
                    <p>The heartbeat becomes too fast, too slow, or irregular.</p>
                </div>
            </div>
        </section>

        <section>
            <h2>Common Risk Factors</h2>
            <div class="grid">
                <div class="info-card">
                    <h3>High Blood Pressure</h3>
                    <p>Uncontrolled blood pressure strains the heart and damages blood vessels over time.</p>
                </div>
                <div class="info-card">
                    <h3>High Cholesterol</h3>
                    <p>Excess cholesterol can build plaque inside arteries and reduce healthy circulation.</p>
                </div>
                <div class="info-card">
                    <h3>Smoking and Tobacco</h3>
                    <p>Tobacco damages blood vessels, lowers oxygen supply, and sharply increases heart risk.</p>
                </div>
                <div class="info-card">
                    <h3>Diabetes and Obesity</h3>
                    <p>Both can raise inflammation and make heart and vessel problems more likely.</p>
                </div>
            </div>
        </section>

        <section id="symptoms">
            <h2>Symptoms to Watch For</h2>
            <ul class="tips-list">
                <li><strong>Chest pressure or pain:</strong> A squeezing, burning, or heavy feeling in the chest should never be ignored.</li>
                <li><strong>Shortness of breath:</strong> Trouble breathing with activity, at rest, or when lying down can signal heart strain.</li>
                <li><strong>Unusual fatigue:</strong> Persistent tiredness or reduced stamina may appear before obvious heart symptoms.</li>
                <li><strong>Fast or irregular heartbeat:</strong> Fluttering, pounding, or skipped beats can suggest rhythm problems.</li>
                <li><strong>Swelling:</strong> Puffiness in the feet, ankles, legs, or abdomen may happen when the heart is not pumping well.</li>
                <li><strong>Dizziness or fainting:</strong> Lightheadedness can happen when the brain is not getting enough blood flow.</li>
                <li><strong>Pain spreading elsewhere:</strong> Discomfort can move to the arm, back, jaw, neck, or upper stomach.</li>
            </ul>
        </section>

        <section id="prevention">
            <h2>Heart-Healthy Daily Habits</h2>
            <ul class="tips-list">
                <li><strong>Stay active:</strong> Aim for regular walking, cycling, stretching, or other exercise most days of the week.</li>
                <li><strong>Choose balanced meals:</strong> Focus on fruits, vegetables, whole grains, beans, nuts, and lean proteins.</li>
                <li><strong>Reduce salt and trans fats:</strong> This can help control blood pressure and support healthier arteries.</li>
                <li><strong>Keep a healthy weight:</strong> Even modest weight loss can improve blood pressure, sugar, and cholesterol levels.</li>
                <li><strong>Manage stress:</strong> Relaxation techniques, better sleep, and social support can reduce strain on the heart.</li>
                <li><strong>Stop smoking:</strong> Quitting tobacco is one of the strongest steps you can take for heart protection.</li>
                <li><strong>Attend checkups:</strong> Regular monitoring helps catch risk factors before they lead to serious disease.</li>
            </ul>
        </section>

        <section id="conditions">
            <h2>Important Heart Conditions</h2>
            <div class="grid">
                <div class="info-card">
                    <h3>Heart Attack</h3>
                    <p>Happens when blood flow to part of the heart is blocked and the muscle is damaged.</p>
                </div>
                <div class="info-card">
                    <h3>Angina</h3>
                    <p>Chest discomfort caused by reduced blood flow, often triggered by activity or stress.</p>
                </div>
                <div class="info-card">
                    <h3>Valve Disease</h3>
                    <p>Heart valves may narrow or leak, affecting how blood moves through the heart.</p>
                </div>
                <div class="info-card">
                    <h3>Stroke Risk</h3>
                    <p>Some heart conditions increase the chance of clots that can travel to the brain.</p>
                </div>
            </div>
        </section>

        <section id="treatment">
            <h2>Treatment and Support</h2>
            <div class="grid">
                <div class="info-card">
                    <h3>Lifestyle Changes</h3>
                    <p>Diet improvement, exercise, stress reduction, and tobacco cessation are part of many care plans.</p>
                </div>
                <div class="info-card">
                    <h3>Medicines</h3>
                    <p>Doctors may prescribe medicines for blood pressure, cholesterol, rhythm control, or blood thinning.</p>
                </div>
                <div class="info-card">
                    <h3>Procedures</h3>
                    <p>Some people may need angioplasty, stents, bypass surgery, valve repair, or device support.</p>
                </div>
                <div class="info-card">
                    <h3>Cardiac Rehabilitation</h3>
                    <p>Structured recovery programs can improve fitness, confidence, and long-term heart outcomes.</p>
                </div>
            </div>
        </section>

        <section id="emergency">
            <div class="alert-box">
                <h3>Seek Emergency Help Immediately If You Notice</h3>
                <p>Chest pain lasting more than a few minutes, severe shortness of breath, fainting, sudden weakness on one side, slurred speech, or pain spreading to the arm, jaw, or back.</p>
                <p><strong>Do not wait for symptoms to pass</strong> if they feel intense, unusual, or are getting worse quickly.</p>
            </div>
        </section>

        <section class="cta-box">
            <h2>Need Personal Guidance?</h2>
            <p>If you are having symptoms, want help understanding risk factors, or need general support for healthier routines, you can request a consultation through the healthcare advisory platform.</p>
            <a class="btn" href="index.php">Back to Home</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Healthcare Advisory System. All rights reserved.</p>
        <p>This page provides general health education and should not replace professional medical advice, diagnosis, or treatment.</p>
    </footer>
</body>
</html>
