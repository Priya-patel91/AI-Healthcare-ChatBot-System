<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seniors (60+ years) - Healthcare Advisory</title>
  <style>
    :root {
      --bg1: #f7fafc;
      --bg2: #e2e8f0;
      --accent: #047857;
      --accent2: #065f46;
      --text: #0f172a;
      --card: rgba(255, 255, 255, 0.94);
      --shadow: rgba(0, 0, 0, 0.14);
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(140deg, var(--bg1), var(--bg2));
      color: var(--text);
      min-height: 100vh;
    }

    header {
      text-align: center;
      padding: 3rem 1rem 2.25rem;
      background: linear-gradient(135deg, rgba(4,120,87,0.9), rgba(6,95,70,0.85));
      clip-path: polygon(0 0, 100% 0, 100% 82%, 0 100%);
      box-shadow: 0 18px 35px rgba(0,0,0,0.2);
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
      background: rgba(4,120,87,0.18);
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
      max-width: 520px;
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
  <h1>Seniors (60+ years)</h1>
  <p>Focused guidance for staying healthy, active, and independent as you age.</p>
</header>

<nav>
  <a href="index.php">🏠 Home</a>
</nav>

<main>
  <div class="card">
    <h2>Maintain Mobility & Strength</h2>
    <p>Gentle, regular movement helps keep muscles strong and joints flexible.</p>
    <ul>
      <li>Include balance exercises (e.g., heel-to-toe walking, chair stands) to reduce fall risk.</li>
      <li>Try low-impact activities like walking, swimming, or tai chi.</li>
      <li>Incorporate gentle strength training with resistance bands or light weights.</li>
    </ul>

    <div class="highlight">
      <h3>Quick Tip</h3>
      <p>Break movement into shorter sessions (10–15 min) throughout the day if needed.</p>
    </div>
  </div>

  <div class="card">
    <h2>Healthy Nutrition & Hydration</h2>
    <p>Eat nutrient-rich foods and stay hydrated to support energy, immunity, and bone health.</p>
    <ul>
      <li>Choose lean proteins, whole grains, fruits, vegetables, and healthy fats.</li>
      <li>Stay hydrated—carry water and sip regularly, especially in warm weather.</li>
      <li>Consider calcium and vitamin D sources (dairy, fortified foods, sunlight).</li>
    </ul>

    <img class="hero-img" src="https://via.placeholder.com/520x340?text=Healthy+Seniors" alt="Seniors staying active">
  </div>

  <div class="card">
    <h2>Preventive Care & Checkups</h2>
    <p>Routine screenings and check-ins can help catch issues early when they’re easier to manage.</p>
    <ul>
      <li>Keep up with vaccinations (flu, pneumonia, shingles) and regular exams.</li>
      <li>Monitor blood pressure, cholesterol, and bone density as recommended.</li>
      <li>Talk to your provider about medication review and any new symptoms.</li>
    </ul>

    <div class="highlight">
      <h3>Keeping Track</h3>
      <p>Use a simple notebook or app to store doctor info, medication lists, and appointment dates.</p>
    </div>
  </div>

  <div class="card">
    <h2>Social Connection & Wellbeing</h2>
    <p>Staying connected with others supports mental health and a sense of purpose.</p>
    <ul>
      <li>Join community groups, clubs, or classes that match your interests.</li>
      <li>Schedule regular chats or activities with friends and family.</li>
      <li>Practice relaxation techniques such as deep breathing or gentle yoga.</li>
    </ul>
  </div>
</main>

<footer>
  <p>⚠️ This content is general guidance. For personalized advice, consult a healthcare professional.</p>
</footer>

</body>
</html>
