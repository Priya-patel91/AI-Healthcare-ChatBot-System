<?php
    session_start();
    date_default_timezone_set('UTC');

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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Frequently Asked Questions - Healthcare Advisory"> 
    <meta name="keywords" content="FAQ, healthcare questions, medical guidance">
    <meta name="author" content="Healthcare Advisory Team">
    <meta name="theme-color" content="#6A0DAD">
    <title>FAQ - Healthcare Advisory</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #eef2ff 0%, #d6bcfa 100%);
            color: #2c2c2c;
            min-height: 100vh;
        }

        .wrapper {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        header {
            text-align: center;
            margin-bottom: 2rem;
        }

        header h1 {
            font-size: clamp(2rem, 4vw, 3.2rem);
            color: #4B0082;
            margin-bottom: 0.75rem;
        }

        header p {
            font-size: 1rem;
            color: #333;
            max-width: 760px;
            margin: 0 auto;
            line-height: 1.8;
            opacity: 0.95;
        }

        .back-link {
            display: inline-block;
            margin: 2rem auto 3rem;
            padding: 0.85rem 1.5rem;
            border-radius: 999px;
            color: #ffffff;
            background: #6A0DAD;
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .back-link:hover {
            transform: translateY(-3px);
            background: #4b0082;
        }

        .faq-list {
            display: grid;
            gap: 1rem;
        }

        .faq-item {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(106, 13, 173, 0.1);
        }

        .faq-question {
            background: linear-gradient(135deg, #6A0DAD 0%, #4B0082 100%);
            color: white;
            padding: 1.35rem 1.5rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 700;
            transition: background 0.3s ease;
        }

        .faq-question:hover {
            background: linear-gradient(135deg, #7b2cbf 0%, #5a189a 100%);
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-answer {
            display: none;
            padding: 1.5rem;
            background: #faf8ff;
            color: #3a3a3a;
            line-height: 1.8;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer strong {
            color: #4B0082;
        }

        @media (max-width: 768px) {
            .wrapper {
                padding: 1.5rem 1rem 3rem;
            }

            .faq-question {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Frequently Asked Questions</h1>
            <p>Find answers to common questions about our healthcare advisory platform, services, contact process, and how to use the system safely and effectively.</p>
        </header>

        <a href="index.php" class="back-link">← Back to Dashboard</a>

        <div class="faq-list">
            <div class="faq-item active">
                <div class="faq-question">
                    <span>How reliable is this healthcare advisory system?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    Our system is AI-powered with medical knowledge bases and is designed to provide general health information. However, it is not a replacement for professional medical consultation. Always verify critical health information with qualified healthcare providers.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Can I use this for emergency medical situations?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    No. For any emergency situation, immediately call your local emergency services in your area or visit the nearest hospital. This platform is for non-emergency health information only.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Is my health information kept confidential?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    Yes, we take data privacy seriously. Any information you provide is protected. Review your privacy policy or contact support for more details on how we manage your data.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How often should I update my health information?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    Update your health information whenever there are significant changes to your medical history, medications, or overall health status. Regular updates help the advisory system provide more accurate and relevant recommendations.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Can I consult with a real doctor through this platform?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    This platform provides general health information and advisory only. For medical diagnosis and treatment, consult licensed healthcare providers in your area directly.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>What should I do if I have adverse side effects from medications?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    Contact your healthcare provider immediately or visit an emergency department if the side effects are severe. Report serious reactions to your doctor or pharmacist without delay.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Is the health information on this platform updated regularly?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    Yes, our health information is regularly updated based on the latest medical research, clinical guidelines, and healthcare standards to ensure accuracy and relevance.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How can I provide feedback about my experience?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    We welcome your feedback. Use the contact form on the website or send us a message through the contact page to help us improve our services.
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', function() {
                const faqItem = this.parentElement;
                faqItem.classList.toggle('active');
            });
        });
    </script>
</body>
</html>