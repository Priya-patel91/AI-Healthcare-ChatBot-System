<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infants (0–12 months) - Healthcare Advisory</title>
    <style>
        :root {
            --brand-1: #ff9a9e;
            --brand-2: #fad0c4;
            --brand-3: #a18cd1;
            --brand-4: #fbc2eb;
            --text: #2a2a2a;
            --card: rgba(255, 255, 255, 0.9);
            --shadow: rgba(0, 0, 0, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle at top, var(--brand-1), var(--brand-2), var(--brand-4));
            color: var(--text);
            min-height: 100vh;
        }

        header {
            text-align: center;
            padding: 3rem 1rem 2rem;
            background: linear-gradient(135deg, rgba(255,154,158,0.9), rgba(161,140,209,0.9));
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }

        header h1 {
            margin: 0;
            font-size: clamp(2rem, 5vw, 3rem);
            letter-spacing: 0.02em;
        }

        header p {
            margin: 1rem auto 0;
            max-width: 680px;
            font-size: 1.05rem;
            opacity: 0.9;
        }

        nav {
            margin: 2rem auto 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.75rem;
            padding: 0 1rem;
        }

        nav a {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.2rem;
            border-radius: 999px;
            font-weight: 600;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            color: var(--text);
            transition: transform 0.25s ease, background 0.25s ease;
        }

        nav a:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.9);
        }

        main {
            max-width: 1100px;
            margin: 2.5rem auto 3rem;
            padding: 0 1rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.75rem;
        }

        .card {
            background: var(--card);
            border-radius: 24px;
            padding: 1.75rem;
            box-shadow: 0 10px 30px var(--shadow);
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
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            filter: blur(10px);
        }

        .card h2 {
            margin-top: 0;
            font-size: 1.45rem;
            color: #4b0d7a;
        }

        .card p {
            margin: 0.85rem 0 1.2rem;
            line-height: 1.6;
        }

        .card ul {
            padding-left: 1.15rem;
            line-height: 1.6;
        }

        .card li {
            margin-bottom: 0.75rem;
        }

        .highlight {
            background: rgba(255,255,255,0.7);
            border-left: 4px solid #ff7a9a;
            padding: 1rem 1.1rem;
            border-radius: 14px;
            margin: 1.5rem 0;
        }

        .highlight h3 {
            margin: 0 0 0.6rem;
            color: #8b0d99;
        }

        .hero-illustration {
            max-width: 420px;
            width: 100%;
            border-radius: 24px;
            margin: 1.5rem auto 0;
            box-shadow: 0 18px 30px rgba(0,0,0,0.15);
            display: block;
        }

        footer {
            text-align: center;
            padding: 2rem 1rem;
            background: rgba(255, 255, 255, 0.7);
            border-top: 1px solid rgba(0,0,0,0.08);
        }

        footer p {
            margin: 0;
            color: rgba(0,0,0,0.65);
            font-size: 0.95rem;
        }

        @media (max-width: 640px) {
            header {
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
    <h1>Infants (0–12 months)</h1>
    <p>Gentle guidance for your baby’s first year — feeding, sleep, development and safety.</p>
</header>

<nav>
    <a href="index.php">🏠 Home</a>
</nav> 

<main>
    <div class="card">
        <h2>Feeding & Growth</h2>
        <p>Breastmilk or formula provides all the nutrition your baby needs in the first 6 months. Offer feeds on demand, look for hunger cues, and track growth with your pediatrician.</p>
        <ul>
            <li>Keep newborns on a 2–3 hour feeding schedule; watch for rooting, lip-smacking or hands-to-mouth.</li>
            <li>If introducing solids after 6 months, start with single-ingredient purees (rice cereal, mashed banana, avocado).</li>
            <li>Keep a feeding log for 1–2 weeks to share with your child’s provider if you have concerns.</li>
        </ul>
    </div>

    <div class="card">
        <h2>Sleep Safety & Routines</h2>
        <p>Safe sleep practices decrease SIDS risk and help establish healthy sleep habits.</p>
        <ul>
            <li>Always place baby on their back in a clear sleep space (no pillows, toys, bumpers).</li>
            <li>Use a firm mattress and keep the room at a comfortable temperature.</li>
            <li>Develop a calming bedtime routine with a bath, soft songs, and dim lighting.</li>
        </ul>

        <div class="highlight">
            <h3>Safe Sleep Reminder</h3>
            <p>Back to sleep, tummy to play: Supervise tummy time during awake periods to help your baby build strength.</p>
        </div>

        <img class="hero-illustration" src="https://via.placeholder.com/420x300?text=Safe+Sleep" alt="Baby sleeping safely illustration">
    </div>

    <div class="card">
        <h2>Development & Milestones</h2>
        <p>Babies grow rapidly; every child develops at their own pace. Focus on connection, play, and talking throughout the day.</p>
        <ul>
            <li>At 3–4 months: begins to smile, reaches for toys, and follows moving objects.</li>
            <li>At 6–9 months: sits with support, babbles, and responds to their name.</li>
            <li>At 12 months: pulls up to stand, says simple words, and enjoys interactive games like peekaboo.</li>
        </ul>

        <div class="highlight">
            <h3>When to Talk to a Provider</h3>
            <p>If your baby isn’t tracking with key milestones (e.g., not reaching for objects, not responding to sound), mention it at your next visit for early support.</p>
        </div>
    </div>

    <div class="card">
        <h2>Health & Safety Checklist</h2>
        <ul>
            <li>Keep immunizations up to date (DTaP, Hib, IPV, PCV, Rotavirus and more).</li>
            <li>Never shake a baby; use gentle motion when soothing.</li>
            <li>Baby-proof your home: secure furniture, cover outlets, and keep small objects out of reach.</li>
            <li>Wash hands before feeding and after diaper changes.</li>
        </ul>

        <div class="highlight">
            <h3>Quick Tip</h3>
            <p>Keep a list of your baby’s medicines, allergies, and clinic contact info in your diaper bag.</p>
        </div>
    </div>
</main>

<footer>
    <p>⚠️ This information is educational and does not replace medical advice. Speak with a pediatrician for personalized care.</p>
</footer>

</body>
</html>
