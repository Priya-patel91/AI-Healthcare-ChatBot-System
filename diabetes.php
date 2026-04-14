<?php
session_start();

// Ensure only authenticated users can reach this page.
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
    <title>Diabetes - Healthcare Advisory System</title>
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
            background: linear-gradient(135deg, #eef9f8 0%, #fffaf3 55%, #f2f1ff 100%);
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #0f766e 0%, #115e59 100%);
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
            box-shadow: 0 8px 24px rgba(17, 94, 89, 0.08);
        }

        .hero-panel {
            padding: 2rem;
            background: linear-gradient(135deg, #ffffff 0%, #e6fffb 100%);
            border: 1px solid #d7f2ee;
        }

        .hero-panel h2 {
            color: #115e59;
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
            border-left: 6px solid #14b8a6;
        }

        .stat-card h3 {
            color: #115e59;
            margin-bottom: 0.4rem;
        }

        section {
            margin-bottom: 2rem;
        }

        section h2 {
            color: #115e59;
            margin-bottom: 1rem;
            font-size: clamp(1.4rem, 2.8vw, 2rem);
            border-bottom: 3px solid #14b8a6;
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
            border-top: 5px solid #14b8a6;
        }

        .info-card h3 {
            color: #0f766e;
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
            border-left: 5px solid #14b8a6;
            box-shadow: 0 6px 18px rgba(17, 94, 89, 0.07);
        }

        .tips-list strong {
            color: #115e59;
        }

        .alert-box {
            padding: 1.5rem;
            background: #fff4f4;
            border-left: 6px solid #dc2626;
        }

        .alert-box h3 {
            color: #b91c1c;
            margin-bottom: 0.65rem;
        }

        .cta-box {
            padding: 1.75rem;
            background: linear-gradient(135deg, #115e59 0%, #0f766e 100%);
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
            background: #fbbf24;
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
            background: linear-gradient(135deg, #115e59 0%, #134e4a 100%);
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
        <h1>Diabetes Care and Guidance</h1>
        <p>Understand diabetes, notice warning signs early, and build healthy daily habits that support stable blood sugar and long-term wellness.</p>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <!-- <a href="#overview">Overview</a>
        <a href="#symptoms">Symptoms</a>
        <a href="#management">Management</a>
        <a href="#diet">Diet</a>
        <a href="#emergency">Warning Signs</a> -->
        <a href="General%20Health%20Consultation.php">Consultation</a>
    </nav>

    <main>
        <section class="hero" id="overview">
            <div class="hero-panel">
                <h2>What Is Diabetes?</h2>
                <p>Diabetes is a long-term condition that affects how the body uses glucose, which is an important source of energy. When the body does not make enough insulin or cannot use insulin effectively, blood sugar levels can rise above a healthy range.</p>
                <p>Good diabetes care usually combines regular monitoring, healthy eating, exercise, medication when prescribed, and routine medical follow-up.</p>
            </div>

            <div class="hero-side">
                <div class="stat-card">
                    <h3>Type 1 Diabetes</h3>
                    <p>The body produces very little or no insulin and daily insulin therapy is needed.</p>
                </div>
                <div class="stat-card">
                    <h3>Type 2 Diabetes</h3>
                    <p>The body becomes resistant to insulin or does not make enough to keep blood sugar controlled.</p>
                </div>
                <div class="stat-card">
                    <h3>Gestational Diabetes</h3>
                    <p>Develops during pregnancy and needs careful monitoring for parent and baby health.</p>
                </div>
            </div>
        </section>

        <section>
            <h2>Common Risk Factors</h2>
            <div class="grid">
                <div class="info-card">
                    <h3>Family History</h3>
                    <p>A close family history of diabetes can increase your chance of developing the condition.</p>
                </div>
                <div class="info-card">
                    <h3>Low Physical Activity</h3>
                    <p>Less movement can make it harder for the body to use insulin efficiently.</p>
                </div>
                <div class="info-card">
                    <h3>Weight and Diet</h3>
                    <p>Being overweight and regularly eating high-sugar, high-calorie foods can raise risk.</p>
                </div>
                <div class="info-card">
                    <h3>Pregnancy History</h3>
                    <p>Previous gestational diabetes can increase the future risk of type 2 diabetes.</p>
                </div>
            </div>
        </section>

        <section id="symptoms">
            <h2>Symptoms to Watch For</h2>
            <ul class="tips-list">
                <li><strong>Frequent urination:</strong> Passing urine more often than usual, especially at night.</li>
                <li><strong>Increased thirst:</strong> Feeling unusually thirsty even after drinking fluids.</li>
                <li><strong>Increased hunger:</strong> Feeling hungry again soon after meals.</li>
                <li><strong>Fatigue:</strong> Low energy, tiredness, or weakness during the day.</li>
                <li><strong>Blurred vision:</strong> Changes in eyesight caused by unstable blood sugar.</li>
                <li><strong>Slow healing:</strong> Cuts, infections, or sores taking longer to heal.</li>
                <li><strong>Unexplained weight loss:</strong> Sudden weight loss can be a warning sign, especially in type 1 diabetes.</li>
            </ul>
        </section>

        <section id="management">
            <h2>Daily Management Tips</h2>
            <ul class="tips-list">
                <li><strong>Monitor blood sugar:</strong> Check levels as advised by your doctor and track patterns.</li>
                <li><strong>Take medicines properly:</strong> Use insulin or tablets exactly as prescribed.</li>
                <li><strong>Stay active:</strong> Aim for regular walking, stretching, cycling, or other exercise most days.</li>
                <li><strong>Protect your feet:</strong> Inspect feet daily for cuts, redness, swelling, or numbness.</li>
                <li><strong>Keep appointments:</strong> Routine visits help monitor blood sugar, kidneys, eyes, and heart health.</li>
                <li><strong>Manage stress and sleep:</strong> Poor sleep and high stress can affect glucose control.</li>
            </ul>
        </section>

        <section id="diet">
            <h2>Healthy Eating for Diabetes</h2>
            <div class="grid">
                <div class="info-card">
                    <h3>Choose Smart Carbs</h3>
                    <p>Prefer whole grains, beans, fruits, and vegetables over sugary drinks and refined snacks.</p>
                </div>
                <div class="info-card">
                    <h3>Balance Your Plate</h3>
                    <p>Try filling half the plate with non-starchy vegetables, one quarter with lean protein, and one quarter with healthy carbohydrates.</p>
                </div>
                <div class="info-card">
                    <h3>Watch Portion Sizes</h3>
                    <p>Large portions can raise blood sugar quickly, even with healthier foods.</p>
                </div>
                <div class="info-card">
                    <h3>Limit Added Sugar</h3>
                    <p>Cut back on sweets, packaged juices, sweet tea, and desserts eaten frequently.</p>
                </div>
            </div>
        </section>

        <section>
            <h2>Possible Long-Term Complications</h2>
            <div class="grid">
                <div class="info-card">
                    <h3>Heart and Blood Vessel Disease</h3>
                    <p>High blood sugar can increase the risk of heart attack, stroke, and high blood pressure.</p>
                </div>
                <div class="info-card">
                    <h3>Kidney Damage</h3>
                    <p>Uncontrolled diabetes can gradually affect kidney function.</p>
                </div>
                <div class="info-card">
                    <h3>Eye Problems</h3>
                    <p>Retinal damage and blurred vision may develop if blood sugar remains high over time.</p>
                </div>
                <div class="info-card">
                    <h3>Nerve Damage</h3>
                    <p>Tingling, numbness, burning pain, or reduced feeling can appear, especially in the feet.</p>
                </div>
            </div>
        </section>

        <section id="emergency">
            <div class="alert-box">
                <h3>Seek Urgent Medical Help If You Notice</h3>
                <p>Confusion, severe weakness, fainting, vomiting, trouble breathing, severe dehydration, chest pain, or very high or very low blood sugar symptoms that do not improve quickly.</p>
                <p><strong>Do not delay emergency care</strong> if the person becomes drowsy, unconscious, or unable to drink fluids safely.</p>
            </div>
        </section>

        <section class="cta-box">
            <h2>Need Personal Guidance?</h2>
            <p>If you are experiencing symptoms, struggling with blood sugar control, or want general advice on lifestyle changes, you can request a consultation through the healthcare advisory platform.</p>
            <a class="btn" href="General%20Health%20Consultation.php">Request Consultation</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Healthcare Advisory System. All rights reserved.</p>
        <p>This page provides general health education and should not replace professional medical advice, diagnosis, or treatment.</p>
    </footer>
</body>
</html>
