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
    <title>Childhood Vaccines - Healthcare Advisory System</title>
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
            background: linear-gradient(135deg, #eef7ff 0%, #fffaf3 55%, #eefcf6 100%);
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
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
            background: rgba(29, 78, 216, 0.95);
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
            color: #1d4ed8;
            margin-bottom: 1rem;
            font-size: clamp(1.4rem, 2.8vw, 2rem);
            border-bottom: 3px solid #60a5fa;
            display: inline-block;
            padding-bottom: 0.45rem;
        }

        .hero,
        .card,
        .alert-box,
        .cta-box {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 24px rgba(29, 78, 216, 0.08);
        }

        .hero {
            padding: 2rem;
            background: linear-gradient(135deg, #ffffff 0%, #edf5ff 100%);
            border: 1px solid #dbeafe;
        }

        .hero h2 {
            color: #1d4ed8;
            margin-bottom: 0.8rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
        }

        .card {
            padding: 1.4rem;
            border-top: 5px solid #60a5fa;
        }

        .card h3 {
            color: #1e40af;
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
            border-left: 5px solid #60a5fa;
            box-shadow: 0 6px 18px rgba(29, 78, 216, 0.07);
        }

        .tips-list strong {
            color: #1d4ed8;
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
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
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
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
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
        <h1>Childhood Vaccines</h1>
        <p>Important childhood vaccines protect babies and children from serious infections and help build safer communities.</p>
    </header>
<!-- 
    <nav>
        <a href="index.php">Home</a>
       
    </nav> -->

    <main>
        <section class="hero" id="overview">
            <h2>Why Childhood Vaccines Matter</h2>
            <p>Vaccines train the immune system to recognize and fight harmful infections before they cause serious illness. They are one of the safest and most effective ways to protect children during early growth and development.</p>
            <p>Following the recommended schedule helps children build protection at the right age, before they are exposed to dangerous diseases.</p>
        </section>

        <section id="vaccines">
            <h2>Important Childhood Vaccines</h2>
            <div class="grid">
                <div class="card">
                    <h3>BCG</h3>
                    <p>Helps protect against severe forms of tuberculosis in children.</p>
                </div>
                <div class="card">
                    <h3>Polio Vaccine</h3>
                    <p>Protects against poliovirus, which can lead to paralysis.</p>
                </div>
                <div class="card">
                    <h3>DPT</h3>
                    <p>Protects against diphtheria, pertussis, and tetanus.</p>
                </div>
                <div class="card">
                    <h3>Hepatitis B</h3>
                    <p>Helps prevent liver infection caused by the hepatitis B virus.</p>
                </div>
                <div class="card">
                    <h3>MMR</h3>
                    <p>Protects against measles, mumps, and rubella.</p>
                </div>
                <div class="card">
                    <h3>Varicella</h3>
                    <p>Reduces the risk of chickenpox and related complications.</p>
                </div>
            </div>
        </section>

        <section id="schedule">
            <h2>Example Vaccine Schedule</h2>
            <ul class="tips-list">
                <li><strong>At birth:</strong> BCG and Hepatitis B, according to local guidance.</li>
                <li><strong>6 weeks:</strong> Early doses of DPT, polio, and other routine vaccines.</li>
                <li><strong>10 to 14 weeks:</strong> Follow-up doses for stronger protection.</li>
                <li><strong>9 months:</strong> Measles-containing vaccine as advised.</li>
                <li><strong>12 to 15 months:</strong> MMR and other age-appropriate vaccines.</li>
                <li><strong>Booster doses:</strong> Important later in childhood to maintain protection.</li>
            </ul>
        </section>

        <section id="benefits">
            <h2>Benefits of Vaccination</h2>
            <ul class="tips-list">
                <li><strong>Prevents serious diseases:</strong> Reduces the risk of infections that can cause disability or death.</li>
                <li><strong>Builds immunity early:</strong> Protects children when they are most vulnerable.</li>
                <li><strong>Supports community safety:</strong> Higher vaccination rates help reduce disease spread.</li>
                <li><strong>Reduces hospital visits:</strong> Prevention lowers the chance of severe illness and complications.</li>
            </ul>
        </section>

        <section id="care">
            <h2>After-Vaccination Care</h2>
            <div class="grid">
                <div class="card">
                    <h3>Mild Reactions</h3>
                    <p>Some children may have mild fever, soreness, or fussiness for a short time after vaccination.</p>
                </div>
                <div class="card">
                    <h3>Comfort Measures</h3>
                    <p>Offer fluids, rest, and follow your doctor's advice if mild discomfort appears.</p>
                </div>
                <div class="card">
                    <h3>Watch for Severe Reactions</h3>
                    <p>Seek medical advice immediately if there is difficulty breathing, swelling, or an unusual severe reaction.</p>
                </div>
            </div>
        </section>

        <section class="alert-box">
            <h3>Important Note</h3>
            <p>Vaccination schedules can differ by country, region, and a child's health needs. Always follow the schedule recommended by your pediatrician or local health authority.</p>
        </section>

        <section class="cta-box">
            <h2>Need General Guidance?</h2>
            <p>If you have questions about vaccine timing, child health, or preventive care, you can return to the healthcare advisory homepage for more support.</p>
            <a class="btn" href="index.php">Back to Home</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Healthcare Advisory System. All rights reserved.</p>
        <p>This page provides general health education and should not replace professional medical advice.</p>
    </footer>
</body>
</html>
