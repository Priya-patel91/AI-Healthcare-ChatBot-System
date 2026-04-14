<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition Guidance - Healthcare Advisory</title>
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
    <h1>Nutrition Guidance</h1>
    <p>Practical advice on healthy eating, balanced meal planning, and nutrition for every age.</p>
</header>

<nav>
    <a href="services.php">Back to Services</a>
</nav>

<main>
    <div class="card">
        <h2>Why Nutrition Matters</h2>
        <p>Good nutrition is the foundation of health—it supports energy, immunity, mental clarity, and long-term disease prevention. This page offers practical, evidence-based guidance to help you build sustainable eating habits.</p>
    </div>

    <div class="card">
        <h2>Nutrition Basics</h2>
        <ul>
            <li><strong>Eat a variety of foods:</strong> Include fruits, vegetables, whole grains, lean proteins, and healthy fats.</li>
            <li><strong>Focus on whole foods:</strong> Minimize processed snacks, sugary drinks, and highly refined foods.</li>
            <li><strong>Portion control:</strong> Pay attention to portion sizes and eat mindfully to support healthy weight management.</li>
            <li><strong>Hydrate smartly:</strong> Drink water consistently throughout the day and limit sugar-sweetened beverages.</li>
            <li><strong>Balance macronutrients:</strong> Aim for a mix of carbs, protein, and fats that aligns with your activity level and goals.</li>
        </ul>
    </div>

    <div class="grid">
        <div class="card">
            <h2>Meal Planning Tips</h2>
            <ul>
                <li>Plan meals ahead of time to reduce reliance on fast food and convenience meals.</li>
                <li>Batch cook and use leftovers for easy lunches and dinners.</li>
                <li>Include a colorful plate: aim for at least 3 different colors at each meal.</li>
                <li>Prep healthy snacks (cut veggies, nuts, yogurt) so they’re ready when hunger strikes.</li>
            </ul>
        </div>

        <div class="card">
            <h2>Nutrition for Energy & Focus</h2>
            <ul>
                <li>Start your day with protein and fiber to stabilize energy (e.g., oatmeal with nuts, eggs with veggies).</li>
                <li>Choose low-GI carbs (whole grains, legumes) for sustained energy and stable blood sugar.</li>
                <li>Include omega-3 sources (fish, flaxseed, walnuts) to support brain health and mood.</li>
                <li>Avoid large sugary meals that can cause energy crashes.</li>
            </ul>
        </div>

        <div class="card">
            <h2>Healthy Weight Management</h2>
            <ul>
                <li>Focus on gradual, sustainable changes rather than quick fixes.</li>
                <li>Track what you eat for a few days to identify areas for improvement.</li>
                <li>Pair healthy eating with regular physical activity for best results.</li>
                <li>Seek professional advice if you have a medical condition affecting weight.</li>
            </ul>
        </div>

        
    </div>

    <div class="card">
        <h2>Quick Action Steps</h2>
        <ul>
            <li>Start a food journal to track how you feel after meals.</li>
            <li>Try one new vegetable or whole grain each week.</li>
            <li>Swap sugary snacks for fruit, nuts, or yogurt.</li>
            <li>Drink water first thing in the morning and before meals.</li>
        </ul>
    </div>
</main>

<footer>
    <p>⚠️ Disclaimer: This information is for educational purposes only. Consult a licensed healthcare provider for individualized medical advice.</p>
</footer>

</body>
</html>
