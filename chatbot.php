<?php
date_default_timezone_set('UTC');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Healthcare Advisory Chatbot — get quick guidance on wellness, nutrition, fitness, and more.">
    <meta name="keywords" content="healthcare chatbot, health advice, wellness advice, nutrition bot">
    <meta name="author" content="Healthcare Advisory Team">
    <meta name="theme-color" content="#6A0DAD">
    <title>Healthcare Advisory Chatbot</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #222;
            background: linear-gradient(135deg, #f8f0ff 0%, #fff5e6 100%);
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #6A0DAD 0%, #4B0082 100%);
            color: white;
            padding: 2rem 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        header .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        header .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        header .logo::before {
            content: "❤️";
            font-size: 2rem;
        }

        header h1 {
            margin: 0.5rem 0 0.2rem 0;
            font-size: clamp(1.3rem, 3vw, 2rem);
        }

        header .tagline {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        nav {
            background: rgba(0, 95, 115, 0.95);
            padding: 0.8rem 1rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        nav a:hover {
            background: rgba(10, 147, 150, 0.3);
            transform: translateY(-2px);
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .hero {
            background: linear-gradient(135deg, #6A0DAD 0%, #4B0082 50%, #FFC107 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 16px rgba(10, 147, 150, 0.2);
        }

        .hero h2 {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: clamp(1rem, 2vw, 1.2rem);
            margin-bottom: 1.25rem;
            opacity: 0.95;
        }

        .chat-section {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 2rem;
            align-items: start;
        }

        .chat-window {
            background: white;
            border-radius: 14px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            min-height: 520px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .chat-log {
            flex: 1;
            overflow-y: auto;
            padding-right: 0.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .chat-message {
            max-width: 78%;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            line-height: 1.5;
            word-wrap: break-word;
        }

        .chat-message.user {
            align-self: flex-end;
            background: #6a0dad;
            color: white;
            border-bottom-right-radius: 4px;
        }

        .chat-message.bot {
            align-self: flex-start;
            background: #f3f4ff;
            color: #1a1a1a;
            border-bottom-left-radius: 4px;
        }

        .chat-form {
            display: flex;
            gap: 0.5rem;
            align-items: flex-end;
            padding-top: 0.5rem;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
        }

        .chat-form input {
            flex: 1;
            padding: 0.9rem 1rem;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
        }

        .chat-form button {
            padding: 0.95rem 1.2rem;
            border-radius: 10px;
            border: none;
            background: #6a0dad;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .chat-form button:hover {
            background: #52147d;
        }

        .guidelines {
            background: white;
            border-radius: 14px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            line-height: 1.5;
        }

        .guidelines h2 {
            color: #4b0082;
            margin-bottom: 0.75rem;
        }

        .guidelines h3 {
            margin-top: 1.2rem;
            margin-bottom: 0.5rem;
            color: #6a0dad;
        }

        .guidelines ul {
            list-style: disc;
            padding-left: 1.4rem;
            margin-top: 0.5rem;
        }

        .guidelines li {
            margin-bottom: 0.7rem;
        }

        footer {
            background: linear-gradient(135deg, #4B0082 0%, #5E35B1 100%);
            color: white;
            padding: 2rem 1rem;
            margin-top: 3rem;
            text-align: center;
        }

        footer .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
            margin-bottom: 2rem;
        }

        footer h4 {
            color: #00b4d8;
            margin-bottom: 1rem;
        }

        footer ul {
            list-style: none;
        }

        footer ul li {
            margin-bottom: 0.5rem;
        }

        footer a {
            color: #e0f2f7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #00b4d8;
        }

        @media (max-width: 900px) {
            .chat-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 2rem 1rem;
            }

            .chat-window {
                min-height: 460px;
            }

            .chat-form {
                flex-direction: column;
            }

            .chat-form button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<header role="banner">
    <div class="header-container">
        <div class="logo">
            <div>
                <h1>Healthcare Advisory</h1>
                <p class="tagline">Ask your health questions anytime</p>
            </div>
        </div>
    </div>
</header>

<nav role="navigation" aria-label="Main Navigation">
    <a href="index.php" title="Home">Home</a>
    <a href="chatbot.php" title="Chatbot">Chatbot</a>
    <a href="General%20Health%20Consultation.php" title="General Health">General Health</a>
    <a href="Disease%20Prevention.php" title="Disease Prevention">Disease Prevention</a>
    <a href="Fitness%20%26%20Wellness.php" title="Fitness & Wellness">Fitness</a>
    <a href="Nutrition%20Guidance.php" title="Nutrition">Nutrition</a>
    <a href="Mental%20Health%20Support.php" title="Mental Health">Mental Health</a>
</nav>

<main role="main">
    <section class="hero">
        <h2>Health Chatbot</h2>
        <p>Get quick wellness guidance, health tips, and general well-being advice from our AI-style chat assistant.</p>
    </section>

    <section class="chat-section" aria-label="Chatbot">
        <div class="chat-window" aria-label="Chat conversation" role="region">
            <div id="chatLog" class="chat-log" aria-live="polite"></div>

            <form id="chatForm" class="chat-form" aria-label="Send a message">
                <label for="chatInput" class="sr-only">Type your question</label>
                <input id="chatInput" type="text" placeholder="Ask about diet, exercise, mental health, or medications..." autocomplete="off" required>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>

        <aside class="guidelines" aria-label="Chat guidelines">
            <h2>How to use this assistant</h2>
            <p>This chatbot provides **general health guidance** and **wellness tips** only. It is not a substitute for professional medical advice.</p>

            <h3>Try asking</h3>
            <ul>
                <li>"How can I improve my sleep habits?"</li>
                <li>"What should I eat to manage my weight?"</li>
                <li>"How do I reduce stress naturally?"</li>
                <li>"What are basic precautions for flu season?"</li>
                <li>"How can I stay active if I work from home?"</li>
            </ul>

            <h3>Quick tips</h3>
            <ul>
                <li>Share the main topic of your question (e.g., nutrition, exercise, mental health).</li>
                <li>If you have a medical emergency, call emergency services immediately.</li>
                <li>This assistant is best for general guidance; always follow your doctor’s instructions.</li>
            </ul>
        </aside>
    </section>
</main>

<footer>
    <div class="footer-content">
        <div>
            <h4>About</h4>
            <p>Healthcare Advisory is a platform that provides general health information and wellness recommendations. For personalized medical advice, always consult a licensed professional.</p>
        </div>
        <div>
            <h4>Quick Links</h4>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="chatbot.php">Chatbot</a></li>
                <li><a href="General%20Health%20Consultation.php">General Health</a></li>
                <li><a href="Disease%20Prevention.php">Disease Prevention</a></li>
            </ul>
        </div>
        <div>
            <h4>Contact</h4>
            <ul>
                <li>Email: info@healthadvisory.chandigarh</li>
                <li>Phone: +919106775271</li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; <?php echo date('Y'); ?> Healthcare Advisory. All rights reserved.
    </div>
</footer>

<script>
const chatLog = document.getElementById('chatLog');
const chatForm = document.getElementById('chatForm');
const chatInput = document.getElementById('chatInput');

const cannedResponses = [
    // General Help & Navigation
    {
        match: /\b(help|what can you do|what can i ask|how to use|guide)\b/i,
        reply: "I can help with health advice, site navigation, and information about our services. Ask about symptoms, wellness tips, emergency contacts, or how to use any page on our site!",
    },
    {
        match: /\b(index|home|main page|dashboard|welcome)\b/i,
        reply: "The home page shows health statistics, emergency alerts, age-specific health recommendations, and quick links to all our services. Use the navigation menu to explore different sections.",
    },
    {
        match: /\b(services|what services|health services|consultation)\b/i,
        reply: "We offer 6 main services: General Health Consultation, Disease Prevention, Fitness & Wellness, Nutrition Guidance, Mental Health Support, and Medication Information. Click 'Services' in the menu to explore them.",
    },

    // Services Page Specific
    {
        match: /\b(general health|health consultation|common health|symptoms)\b/i,
        reply: "Our General Health Consultation service provides guidance on common health issues, symptoms, and general wellness. Visit the Services page and click 'Start Consultation' for personalized advice.",
    },
    {
        match: /\b(disease prevention|prevent disease|vaccines|screening)\b/i,
        reply: "Disease Prevention covers vaccinations, screening recommendations, and lifestyle modifications. Check our Services page for detailed prevention strategies and immunization schedules.",
    },
    {
        match: /\b(fitness|wellness|exercise|workout|physical activity)\b/i,
        reply: "Fitness & Wellness offers personalized exercise routines, workout plans, and wellness programs. Visit Services > Fitness & Wellness for tailored recommendations based on your goals.",
    },
    {
        match: /\b(nutrition|diet|food|eating|meal planning)\b/i,
        reply: "Nutrition Guidance provides expert dietary advice, meal plans, and nutritional recommendations. Go to Services > Nutrition Guidance for personalized diet plans and healthy eating tips.",
    },
    {
        match: /\b(mental health|stress|anxiety|depression|mood)\b/i,
        reply: "Mental Health Support offers resources for stress management, anxiety reduction, and emotional wellbeing. Access Services > Mental Health Support for coping strategies and professional guidance.",
    },
    {
        match: /\b(medication|drugs|medicine|prescription|side effects)\b/i,
        reply: "Medication Information covers drug details, dosage guidelines, side effects, and interactions. Visit Services > Medication Information for comprehensive drug safety information.",
    },

    // Health Tips Page
    {
        match: /\b(health tips|daily tips|wellness tips|lifestyle)\b/i,
        reply: "Our Health Tips page has 8 essential daily tips plus age-specific recommendations. Click 'Health Tips' in the menu for hydration, exercise, nutrition, sleep, and stress management advice.",
    },
    {
        match: /\b(hydration|water|drink|thirsty)\b/i,
        reply: "Stay hydrated by drinking 8+ glasses of water daily. It helps with energy, digestion, and overall health. Check our Health Tips page for more hydration strategies.",
    },
    {
        match: /\b(sleep|insomnia|rest|bedtime)\b/i,
        reply: "Aim for 7-9 hours of quality sleep. Keep a consistent schedule, reduce screen time, and create a cool, dark sleep environment. Visit Health Tips for sleep improvement techniques.",
    },
    {
        match: /\b(stress|anxiety|relaxation|calm)\b/i,
        reply: "Practice deep breathing, meditation, or short walks to manage stress. Our Health Tips page has detailed stress management strategies and mental health resources.",
    },

    // Age-Specific Health
    {
        match: /\b(infant|baby|newborn|0-12 months)\b/i,
        reply: "For infants: Exclusive breastfeeding, timely vaccinations, regular pediatric checkups, and safe sleep practices are essential. Check Health Tips > Infants section for detailed guidance.",
    },
    {
        match: /\b(children|kids|1-12 years|child health)\b/i,
        reply: "Children's health focuses on nutrition, physical activity, dental care, and vaccinations. Visit Health Tips > Children for age-appropriate health recommendations.",
    },
    {
        match: /\b(adolescent|teen|13-19 years|teenage)\b/i,
        reply: "Adolescents need balanced nutrition, regular exercise, mental health awareness, and sexual health education. See Health Tips > Adolescents for comprehensive guidance.",
    },
    {
        match: /\b(adult|20-40 years|young adult)\b/i,
        reply: "Adults should focus on preventive screenings, stress management, healthy work-life balance, and regular exercise. Check Health Tips > Adults section.",
    },
    {
        match: /\b(middle age|41-60|middle-aged)\b/i,
        reply: "Middle-aged adults need chronic disease screening, cardiovascular checkups, bone density tests, and weight management. Visit Health Tips > Middle-Aged section.",
    },
    {
        match: /\b(senior|elderly|60\+|older adult)\b/i,
        reply: "Seniors should focus on fall prevention, medication management, cognitive health, and mobility. See Health Tips > Seniors for specialized recommendations.",
    },

    // Emergency Page
    {
        match: /\b(emergency|urgent|crisis|help now)\b/i,
        reply: "For emergencies, call 108 (ambulance), 100 (police), or 101 (fire). Visit our Emergency page for contact numbers, first aid tips, and when to seek immediate help.",
    },
    {
        match: /\b(ambulance|medical emergency|hospital)\b/i,
        reply: "Call 108 for ambulance services. For chest pain, breathing issues, severe bleeding, or loss of consciousness, seek immediate medical help. Check Emergency page for details.",
    },
    {
        match: /\b(police|crime|accident|security)\b/i,
        reply: "Call 100 for police emergencies including crime, accidents, or immediate safety concerns. Visit Emergency page for all emergency contact numbers.",
    },
    {
        match: /\b(fire|fire brigade|burning)\b/i,
        reply: "Call 101 for fire emergencies, building collapses, or hazardous material incidents. See Emergency page for fire safety and prevention tips.",
    },
    {
        match: /\b(women|woman|female|domestic violence|harassment)\b/i,
        reply: "Call 1091 for women's helpline - 24/7 support for women in distress, domestic violence, harassment, or abuse. Visit Emergency page for women's safety resources.",
    },
    {
        match: /\b(child|children|kid|abuse|missing child)\b/i,
        reply: "Call 1098 for child helpline - emergency support for children in need, child abuse, missing children, or child-related emergencies. Check Emergency page for child safety information.",
    },
    {
        match: /\b(first aid|cpr|wound|burn|bleeding)\b/i,
        reply: "Our Emergency page has comprehensive first aid information including CPR, wound care, burn treatment, and bleeding control. Learn essential life-saving skills there.",
    },

    // FAQ Page
    {
        match: /\b(faq|questions|frequently asked|common questions)\b/i,
        reply: "Visit our FAQ page for answers to common questions about reliability, emergency situations, data privacy, medical consultations, and how to use our platform effectively.",
    },
    {
        match: /\b(reliable|trust|accurate|dependable)\b/i,
        reply: "Our system uses medical knowledge bases and AI technology. While reliable for general guidance, always consult healthcare providers for personal medical decisions. See FAQ page for details.",
    },
    {
        match: /\b(privacy|confidential|data|security)\b/i,
        reply: "We take data privacy seriously. All information is encrypted and protected. Review our privacy policy in the FAQ section for detailed information about data handling.",
    },
    {
        match: /\b(doctor|professional|consultation|medical advice)\b/i,
        reply: "This platform provides general health information. For professional diagnosis and treatment, consult licensed healthcare providers. Check FAQ for clarification on our services.",
    },

    // Contact Page
    {
        match: /\b(contact|get in touch|reach|support|email|phone)\b/i,
        reply: "Contact us at +91 9106775271 or info@healthcareadvisory.com. Visit the Contact page to send messages, find our address, or get in touch with our healthcare team.",
    },
    {
        match: /\b(address|location|office|where)\b/i,
        reply: "Our office is located at: Healthcare Advisory Center, 123 Medical Lane, Healthcare City, Chandigarh. Visit Contact page for full address and directions.",
    },

    // Login & Registration
    {
        match: /\b(login|sign in|account|register|signup)\b/i,
        reply: "Click the Login button in the navigation to access your account. New users can register for personalized health tracking and saved consultations.",
    },
    {
        match: /\b(logout|sign out|exit)\b/i,
        reply: "Click the Logout button (with your username) in the top-right corner to securely sign out of your account.",
    },

    // Navigation & Site Features
    {
        match: /\b(menu|navigation|nav|how to navigate)\b/i,
        reply: "Use the top navigation menu: Home, Chatbot, Services, Health Tips, Emergency, FAQ, Contact. The logout button appears in the top-right when logged in.",
    },
    {
        match: /\b(chatbot|chat|talk|conversation)\b/i,
        reply: "You're talking to me! I can answer health questions, provide guidance, and help you navigate the site. Ask me anything about health, wellness, or how to use our platform.",
    },
    {
        match: /\b(disclaimer|liability|legal|medical disclaimer)\b/i,
        reply: "This platform provides general health information for educational purposes only. It is not a substitute for professional medical advice. See our medical disclaimer in the FAQ section.",
    },

    // Specific Health Conditions
    {
        match: /\b(heart|cardiovascular|cardiac)\b/i,
        reply: "Heart health information is available in the Common Health Conditions section on the home page. Focus on exercise, healthy diet, stress management, and regular checkups.",
    },
    {
        match: /\b(diabetes|blood sugar|insulin)\b/i,
        reply: "Diabetes management includes blood sugar monitoring, balanced diet, regular exercise, and medication adherence. Visit the home page's health conditions section for detailed guidance.",
    },
    {
        match: /\b(respiratory|lungs|breathing|cough)\b/i,
        reply: "For respiratory health, avoid allergens, use prescribed inhalers, maintain air quality, and get vaccinated. Check respiratory conditions section on the home page.",
    },
    {
        match: /\b(arthritis|joint pain|bones)\b/i,
        reply: "Arthritis management includes weight control, exercise, heat/cold therapy, and anti-inflammatory medications. Visit the health conditions section for comprehensive advice.",
    },
    {
        match: /\b(obesity|weight|overweight)\b/i,
        reply: "Weight management involves creating a calorie deficit through diet and exercise, seeking nutritional counseling, and setting realistic goals. Check obesity section on home page.",
    },

    // Vaccination & Prevention
    {
        match: /\b(childhood vaccine|baby vaccine|pediatric)\b/i,
        reply: "Childhood vaccines include MMR, DPT, Polio, Hepatitis B, and Varicella. Follow the recommended immunization schedule. Visit Disease Prevention section for details.",
    },
    {
        match: /\b(adult vaccine|booster|flu shot)\b/i,
        reply: "Adult vaccines include Tdap boosters, annual flu shots, pneumonia, shingles, and HPV vaccines. Check Disease Prevention > Adult Boosters for your vaccination schedule.",
    },
    {
        match: /\b(travel vaccine|traveling|international)\b/i,
        reply: "Travel vaccines may include yellow fever, hepatitis A/B, typhoid, and malaria prevention. Visit Disease Prevention > Travel Vaccines for destination-specific recommendations.",
    },

    // Symptoms & Common Issues
    {
        match: /\b(headache|migraine|head pain|headache relief)\b/i,
        reply: "For mild headaches, rest in a quiet place, stay hydrated, and try gentle neck stretches. If severe or frequent, consult a healthcare provider. Check our symptom guidance.",
    },
    {
        match: /\b(fever|temperature|high fever)\b/i,
        reply: "For mild fever, stay hydrated, rest, and use cool compresses. If fever exceeds 38°C (100.4°F) or lasts more than 2 days, contact a healthcare provider.",
    },
    {
        match: /\b(cough|cold|sore throat|flu)\b/i,
        reply: "Stay hydrated, rest, and try warm salt water gargles. If breathing difficulty, high fever, or cough lasting over a week, see a doctor.",
    },
    {
        match: /\b(stomach pain|nausea|indigestion|diarrhea)\b/i,
        reply: "For mild stomach issues, try small bland meals and stay hydrated. Avoid spicy/fatty foods. If severe or persistent, consult a healthcare provider.",
    },
    {
        match: /\b(fatigue|tired|exhausted|low energy)\b/i,
        reply: "Fatigue can result from poor sleep, stress, or nutrition. Focus on balanced diet, regular exercise, and consistent sleep. If persistent, see a doctor.",
    },
    {
        match: /\b(dizziness|vertigo|lightheaded)\b/i,
        reply: "Sit or lie down, sip water, and avoid sudden movements. If frequent or severe, consult a healthcare provider to rule out underlying causes.",
    },
    {
        match: /\b(back pain|backache|spine)\b/i,
        reply: "Practice good posture and gentle stretching. If severe, radiating, or with numbness, seek medical attention for proper diagnosis.",
    },
    {
        match: /\b(rash|itchy skin|hives|allergic reaction)\b/i,
        reply: "Keep area clean, avoid scratching, use gentle moisturizer. For severe reactions with swelling or breathing issues, seek immediate medical help.",
    },

    // Default Responses
    {
        match: /\b(hi|hello|hey|greetings)\b/i,
        reply: "Hello! I'm your healthcare assistant. I can help with health questions, site navigation, and wellness advice. What would you like to know?",
    },
    {
        match: /\b(thank|thanks|appreciate)\b/i,
        reply: "You're welcome! Remember, this is general health information. For personal medical concerns, please consult a healthcare professional. Is there anything else I can help with?",
    },
    {
        match: /\b(bye|goodbye|see you|farewell)\b/i,
        reply: "Take care of your health! Remember to stay hydrated, eat well, and get regular exercise. Feel free to come back anytime with health questions.",
    },
];

function addMessage(sender, text) {
    const msg = document.createElement('div');
    msg.className = `chat-message ${sender}`;
    msg.textContent = text;
    chatLog.appendChild(msg);
    chatLog.scrollTop = chatLog.scrollHeight;
}

function getBotReply(userText) {
    const trimmed = userText.trim();
    if (!trimmed) return "Please type a question so I can help you.";

    for (const item of cannedResponses) {
        if (item.match.test(trimmed)) {
            return item.reply;
        }
    }

    return "I’m sorry, I don’t have a specific answer for that right now. Try asking about general wellness, nutrition, exercise, or how to stay healthy. For medical emergencies, contact a professional immediately.";
}

function sendUserMessage(text) {
    addMessage('user', text);
    const response = getBotReply(text);
    setTimeout(() => {
        addMessage('bot', response);
    }, 350);
}

chatForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const text = chatInput.value.trim();
    if (!text) return;
    sendUserMessage(text);
    chatInput.value = '';
    chatInput.focus();
});

// Greet the visitor on load
window.addEventListener('DOMContentLoaded', () => {
    addMessage('bot', 'Hello! I am your friendly health assistant. Ask me about nutrition, exercise, mental health, or general wellness tips.');
});
</script>
</body>
</html>
