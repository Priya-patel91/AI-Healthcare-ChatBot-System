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
    <title>Travel Vaccines - Healthcare Advisory System</title>
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
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
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
            background: rgba(180, 83, 9, 0.95);
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
            color: #b45309;
            margin-bottom: 1rem;
            font-size: clamp(1.4rem, 2.8vw, 2rem);
            border-bottom: 3px solid #f59e0b;
            display: inline-block;
            padding-bottom: 0.45rem;
        }

        .hero,
        .card,
        .alert-box,
        .cta-box {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 24px rgba(180, 83, 9, 0.08);
        }

        .hero {
            padding: 2rem;
            background: linear-gradient(135deg, #ffffff 0%, #fff4e5 100%);
            border: 1px solid #fde5c4;
        }

        .hero h2 {
            color: #b45309;
            margin-bottom: 0.8rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
        }

        .card {
            padding: 1.4rem;
            border-top: 5px solid #f59e0b;
        }

        .card h3 {
            color: #92400e;
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
            border-left: 5px solid #f59e0b;
            box-shadow: 0 6px 18px rgba(180, 83, 9, 0.07);
        }

        .tips-list strong {
            color: #b45309;
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
            background: linear-gradient(135deg, #b45309 0%, #92400e 100%);
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
            background: #2563eb;
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
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
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
        <h1>Travel Vaccines</h1>
        <p>Travel vaccines help protect you from infections that may be more common in certain countries, regions, or travel settings.</p>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="#overview">Overview</a>
        <a href="#vaccines">Common Vaccines</a>
        <a href="#timing">Timing</a>
        <a href="#safety">Travel Safety</a>
        <a href="#doctor">Doctor Advice</a>
    </nav>

    <main>
        <section class="hero" id="overview">
            <h2>Why Travel Vaccines Matter</h2>
            <p>Different destinations can expose travelers to infections that are uncommon at home. Travel vaccines lower the risk of illness, reduce the chance of spreading disease, and may be required for entry into some countries.</p>
            <p>Your vaccine needs can depend on where you are going, how long you will stay, your activities, your age, and your medical history.</p>
        </section>

        <section id="vaccines">
            <h2>Common Travel Vaccines</h2>
            <div class="grid">
                <div class="card">
                    <h3>Hepatitis A</h3>
                    <p>Often recommended for travel to areas where food and water contamination may be a concern.</p>
                </div>
                <div class="card">
                    <h3>Hepatitis B</h3>
                    <p>Important for travelers who may need medical care abroad or have close personal contact during travel.</p>
                </div>
                <div class="card">
                    <h3>Typhoid</h3>
                    <p>May be advised for travel to regions where sanitation and food safety conditions vary.</p>
                </div>
                <div class="card">
                    <h3>Yellow Fever</h3>
                    <p>Required or recommended for some countries, especially in parts of Africa and South America.</p>
                </div>
                <div class="card">
                    <h3>Rabies</h3>
                    <p>Sometimes advised for long stays, remote travel, or areas with high animal exposure risk.</p>
                </div>
                <div class="card">
                    <h3>Meningococcal Vaccine</h3>
                    <p>May be needed for specific destinations, group settings, or religious travel requirements.</p>
                </div>
            </div>
        </section>

        <section id="timing">
            <h2>When to Plan Travel Vaccines</h2>
            <ul class="tips-list">
                <li><strong>Book early:</strong> Try to review vaccine needs at least 4 to 6 weeks before departure.</li>
                <li><strong>Some vaccines need more than one dose:</strong> Early planning gives enough time to complete the schedule.</li>
                <li><strong>Keep routine vaccines updated:</strong> Standard vaccines like tetanus, flu, and MMR are also important before travel.</li>
                <li><strong>Carry records:</strong> Some destinations may ask for proof of vaccination at entry.</li>
            </ul>
        </section>

        <section id="safety">
            <h2>Extra Travel Health Tips</h2>
            <ul class="tips-list">
                <li><strong>Drink safe water:</strong> Use bottled or treated water where needed.</li>
                <li><strong>Choose food carefully:</strong> Eat freshly prepared food and avoid unsafe raw items in higher-risk places.</li>
                <li><strong>Avoid mosquito bites:</strong> Use repellent, wear protective clothing, and sleep under nets if needed.</li>
                <li><strong>Pack medicines:</strong> Carry your regular medicines and a basic travel health kit.</li>
                <li><strong>Know local risks:</strong> Learn about local infections, weather, and healthcare access before travel.</li>
            </ul>
        </section>

        <section id="doctor">
            <h2>When to Talk to a Doctor</h2>
            <div class="grid">
                <div class="card">
                    <h3>If You Have a Chronic Illness</h3>
                    <p>People with diabetes, heart disease, lung disease, or weak immunity may need a more careful travel plan.</p>
                </div>
                <div class="card">
                    <h3>If You Are Pregnant</h3>
                    <p>Some vaccines may be recommended, delayed, or avoided depending on the situation.</p>
                </div>
                <div class="card">
                    <h3>If You Are Traveling to Remote Areas</h3>
                    <p>Remote locations can increase the importance of prevention because healthcare access may be limited.</p>
                </div>
                <div class="card">
                    <h3>If You Need Entry Requirements</h3>
                    <p>Some countries require specific vaccination certificates, so check before booking travel.</p>
                </div>
            </div>
        </section>

        <section class="alert-box">
            <h3>Important Note</h3>
            <p>Travel vaccine advice depends on your destination and can change over time. Always confirm the latest travel health guidance and entry rules with a healthcare provider or official travel health source before your trip.</p>
        </section>

        <section class="cta-box">
            <h2>Need General Health Guidance?</h2>
            <p>If you want support with preventive care or planning a healthier trip, you can return to the healthcare advisory homepage.</p>
            <a class="btn" href="index.php">Back to Home</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Healthcare Advisory System. All rights reserved.</p>
        <p>This page provides general health education and should not replace professional medical advice.</p>
    </footer>
</body>
</html>
