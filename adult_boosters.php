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
    <title>Adult Boosters - Healthcare Advisory System</title>
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
            background: linear-gradient(135deg, #eef7ff 0%, #fffaf2 55%, #eefcf7 100%);
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #0f766e 0%, #0f5c56 100%);
            color: #fff;
            text-align: center;
            padding: 2rem 1rem;
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
            background: rgba(15, 118, 110, 0.95);
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

        section {
            margin-bottom: 2rem;
        }

        section h2 {
            color: #0f766e;
            margin-bottom: 1rem;
            font-size: clamp(1.4rem, 2.8vw, 2rem);
            border-bottom: 3px solid #2dd4bf;
            display: inline-block;
            padding-bottom: 0.45rem;
        }

        .hero,
        .card,
        .alert-box,
        .cta-box {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 24px rgba(15, 118, 110, 0.08);
        }

        .hero {
            padding: 2rem;
            background: linear-gradient(135deg, #ffffff 0%, #eafffb 100%);
            border: 1px solid #d0faf2;
        }

        .hero h2 {
            color: #0f766e;
            margin-bottom: 0.8rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
        }

        .card {
            padding: 1.4rem;
            border-top: 5px solid #2dd4bf;
        }

        .card h3 {
            color: #115e59;
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
            border-left: 5px solid #2dd4bf;
            box-shadow: 0 6px 18px rgba(15, 118, 110, 0.07);
        }

        .tips-list strong {
            color: #0f766e;
        }

        .alert-box {
            padding: 1.5rem;
            background: #fff8e8;
            border-left: 6px solid #f59e0b;
        }

        .alert-box h3 {
            color: #b45309;
            margin-bottom: 0.65rem;
        }

        .cta-box {
            padding: 1.75rem;
            background: linear-gradient(135deg, #0f766e 0%, #115e59 100%);
            color: #fff;
            text-align: center;
        }

        .cta-box h2 {
            border: none;
            color: #fff;
            padding: 0;
            margin-bottom: 0.8rem;
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
            text-align: center;
            background: linear-gradient(135deg, #115e59 0%, #134e4a 100%);
            color: #fff;
            padding: 1.5rem 1rem;
        }

        @media (max-width: 768px) {
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
        <h1>Adult Booster Vaccines</h1>
        <p>Booster vaccines help adults maintain protection over time and lower the risk of serious infections, complications, and hospital visits.</p>
    </header>

    <!-- <nav>
        <a href="index.php">Home</a>
        
    </nav> -->

    <main>
        <section class="hero" id="overview">
            <h2>Why Adult Boosters Matter</h2>
            <p>Protection from some vaccines can decrease with time, which is why booster doses are important during adulthood. They help strengthen immunity again and reduce the chance of infection spreading to family members, older adults, and people with weaker immune systems.</p>
            <p>Booster needs may vary depending on your age, health history, travel plans, pregnancy status, work environment, and previous vaccinations.</p>
        </section>

        <section id="boosters">
            <h2>Important Adult Boosters</h2>
            <div class="grid">
                <div class="card">
                    <h3>Tdap or Td</h3>
                    <p>Helps protect against tetanus, diphtheria, and pertussis. Booster doses are important through adult life.</p>
                </div>
                <div class="card">
                    <h3>Influenza Vaccine</h3>
                    <p>An annual flu shot is recommended because flu viruses change over time and immunity decreases.</p>
                </div>
                <div class="card">
                    <h3>COVID-19 Boosters</h3>
                    <p>Booster doses may be advised to maintain protection, especially for older adults and higher-risk groups.</p>
                </div>
                <div class="card">
                    <h3>Pneumococcal Vaccine</h3>
                    <p>Often recommended for older adults and people with certain chronic medical conditions.</p>
                </div>
                <div class="card">
                    <h3>Shingles Vaccine</h3>
                    <p>Can reduce the risk of shingles and long-lasting nerve pain in later adulthood.</p>
                </div>
                <div class="card">
                    <h3>Hepatitis and Other Risk-Based Vaccines</h3>
                    <p>Some adults may need boosters or catch-up doses depending on work, travel, or medical conditions.</p>
                </div>
            </div>
        </section>

        <section id="timing">
            <h2>When Boosters Are Commonly Needed</h2>
            <ul class="tips-list">
                <li><strong>Every 10 years:</strong> Tetanus and diphtheria booster, or as advised by your doctor.</li>
                <li><strong>Every year:</strong> Flu vaccination to match the current season.</li>
                <li><strong>Later adulthood:</strong> Some vaccines become especially important after age 50 or 60.</li>
                <li><strong>Chronic conditions:</strong> Adults with diabetes, heart disease, lung disease, or kidney problems may need extra vaccine protection.</li>
                <li><strong>Travel or job exposure:</strong> Healthcare workers, travelers, and people in shared settings may need additional vaccines.</li>
            </ul>
        </section>

        <section id="benefits">
            <h2>Benefits of Adult Booster Vaccines</h2>
            <ul class="tips-list">
                <li><strong>Refreshes immunity:</strong> Helps maintain protection after earlier vaccines wear down.</li>
                <li><strong>Prevents serious illness:</strong> Reduces the risk of severe infection, complications, and hospitalization.</li>
                <li><strong>Protects loved ones:</strong> Lowers the chance of spreading infections to babies, elders, and vulnerable family members.</li>
                <li><strong>Supports public health:</strong> Higher vaccine coverage improves community protection.</li>
            </ul>
        </section>

        <section id="doctor">
            <h2>When to Talk to a Doctor</h2>
            <div class="grid">
                <div class="card">
                    <h3>If You Missed Vaccines Earlier</h3>
                    <p>Adults can often receive catch-up vaccines safely with proper medical advice.</p>
                </div>
                <div class="card">
                    <h3>If You Have a Chronic Illness</h3>
                    <p>Some conditions increase infection risk, so a personalized vaccine plan may be needed.</p>
                </div>
                <div class="card">
                    <h3>If You Are Pregnant</h3>
                    <p>Certain vaccines may be recommended during pregnancy for parent and baby protection.</p>
                </div>
                <div class="card">
                    <h3>If You Had a Strong Reaction Before</h3>
                    <p>Always tell your doctor about allergies or past vaccine reactions before taking a booster.</p>
                </div>
            </div>
        </section>

        <section class="alert-box">
            <h3>Important Note</h3>
            <p>Vaccine guidance can differ by country, age group, and personal medical history. Always follow your local health authority and your doctor's recommendation for booster timing.</p>
        </section>

        <section class="cta-box">
            <h2>Need General Health Guidance?</h2>
            <p>If you want help understanding preventive care, immunization, or routine health planning, you can return to the healthcare advisory homepage.</p>
            <a class="btn" href="index.php">Back to Home</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Healthcare Advisory System. All rights reserved.</p>
        <p>This page provides general health education and should not replace professional medical advice.</p>
    </footer>
</body>
</html>
