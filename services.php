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
    <meta name="description" content="Healthcare Services - Comprehensive healthcare advisory covering multiple health domains">
    <meta name="keywords" content="healthcare services, medical consultation, disease prevention, fitness, nutrition, mental health">
    <meta name="author" content="Healthcare Advisory Team">
    <meta name="theme-color" content="#6A0DAD">
    <title>Our Services - Healthcare Advisory</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .topbar {
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: white;
            color: #667eea;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .back-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .topbar-title {
            color: white;
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .spacer {
            width: 120px;
        }

        .hero-section {
            padding: 5rem 2rem;
            text-align: center;
            color: white;
            animation: slideDown 0.8s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-section h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            margin-bottom: 1rem;
            font-weight: 900;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            letter-spacing: -1px;
        }

        .hero-section p {
            font-size: 1.3rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.8;
            opacity: 0.95;
            font-weight: 300;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 4rem 1.5rem;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .service-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .service-card:nth-child(1) { animation-delay: 0.1s; }
        .service-card:nth-child(2) { animation-delay: 0.2s; }
        .service-card:nth-child(3) { animation-delay: 0.3s; }
        .service-card:nth-child(4) { animation-delay: 0.4s; }
        .service-card:nth-child(5) { animation-delay: 0.5s; }
        .service-card:nth-child(6) { animation-delay: 0.6s; }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        }

        .service-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 1.5rem;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .service-header::after {
            content: '';
            position: absolute;
            bottom: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .service-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: inline-block;
            animation: float 3s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .service-header h3 {
            font-size: 1.7rem;
            margin-bottom: 0;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .service-content {
            padding: 2.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-content p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1.05rem;
            flex-grow: 1;
        }

        .service-btn {
            display: inline-block;
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 999px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            border: 2px solid transparent;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .service-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .service-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .service-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        .service-btn span {
            position: relative;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .container {
                padding: 2.5rem 1rem;
            }

            .hero-section {
                padding: 3rem 1.5rem;
            }

            .topbar {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .spacer {
                display: none;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .service-header {
                padding: 2rem 1.5rem;
            }

            .service-icon {
                font-size: 3rem;
            }

            .service-header h3 {
                font-size: 1.4rem;
            }

            .service-content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="topbar">
        <a href="index.php" class="back-link">← Back</a>
        <div class="topbar-title">Healthcare Services</div>
        <div class="spacer"></div>
    </div>

    <div class="hero-section">
        <h1>Our Services</h1>
        <p>Discover comprehensive healthcare solutions designed for your wellbeing. Choose from our range of expert-led services.</p>
    </div>
    <div class="container">
        <div class="services-grid">
            <!-- General Health Consultation -->
            <div class="service-card">
                <div class="service-header">
                    <span class="service-icon">🏥</span>
                    <h3>General Health Consultation</h3>
                </div>
                <div class="service-content">
                    <p>Get professional advice on common health issues, symptoms, and general wellness. Our advisory system provides initial guidance for various health concerns and conditions.</p>
                    <a href="General%20Health%20Consultation.php" class="service-btn"><span>Start Consultation →</span></a>
                </div>
            </div>

            <!-- Disease Prevention -->
            <div class="service-card">
                <div class="service-header">
                    <span class="service-icon">🧬</span>
                    <h3>Disease Prevention</h3>
                </div>
                <div class="service-content">
                    <p>Learn about preventive measures for common diseases. We provide information on vaccinations, screening, and lifestyle modifications to maintain optimal health.</p>
                    <a href="Disease%20Prevention.php" class="service-btn"><span>Learn Prevention →</span></a>
                </div>
            </div>

            <!-- Fitness & Wellness -->
            <div class="service-card">
                <div class="service-header">
                    <span class="service-icon">💪</span>
                    <h3>Fitness & Wellness</h3>
                </div>
                <div class="service-content">
                    <p>Personalized fitness recommendations, exercise routines, and wellness programs designed for your lifestyle and health goals.</p>
                    <a href="Fitness%20%26%20Wellness.php" class="service-btn"><span>Get Fit →</span></a>
                </div>
            </div>

            <!-- Nutrition Guidance -->
            <div class="service-card">
                <div class="service-header">
                    <span class="service-icon">🥗</span>
                    <h3>Nutrition Guidance</h3>
                </div>
                <div class="service-content">
                    <p>Expert nutritional advice, diet plans, and dietary recommendations tailored to your health condition and dietary preferences.</p>
                    <a href="Nutrition%20Guidance.php" class="service-btn"><span>Get Nutrition Help →</span></a>
                </div>
            </div>

            <!-- Mental Health Support -->
            <div class="service-card">
                <div class="service-header">
                    <span class="service-icon">🧠</span>
                    <h3>Mental Health Support</h3>
                </div>
                <div class="service-content">
                    <p>Resources and guidance on mental wellbeing, stress management, anxiety reduction, and emotional health support.</p>
                    <a href="Mental_Support.php" class="service-btn"><span>Get Support →</span></a>
                </div>
            </div>

            <!-- Medication Information -->
            <div class="service-card">
                <div class="service-header">
                    <span class="service-icon">💊</span>
                    <h3>Medication Information</h3>
                </div>
                <div class="service-content">
                    <p>Detailed information about medications, dosage guidelines, potential side effects, and drug interaction awareness.</p>
                    <a href="Medication_Information.php" class="service-btn"><span>Learn Medications →</span></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>