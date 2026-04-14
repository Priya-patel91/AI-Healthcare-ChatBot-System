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
    <meta name="description" content="Health Tips & Wellness Guide - Comprehensive health advice, wellness tips, and preventive care recommendations">
    <meta name="keywords" content="health tips, wellness, preventive care, healthy lifestyle, nutrition, exercise, mental health">
    <meta name="author" content="Healthcare Advisory Team">
    <meta name="theme-color" content="#6A0DAD">
    <title>Health Tips & Wellness Guide - Healthcare Advisory</title>
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

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .tip-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
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

        .tip-card:nth-child(1) { animation-delay: 0.1s; }
        .tip-card:nth-child(2) { animation-delay: 0.2s; }
        .tip-card:nth-child(3) { animation-delay: 0.3s; }
        .tip-card:nth-child(4) { animation-delay: 0.4s; }
        .tip-card:nth-child(5) { animation-delay: 0.5s; }
        .tip-card:nth-child(6) { animation-delay: 0.6s; }
        .tip-card:nth-child(7) { animation-delay: 0.7s; }
        .tip-card:nth-child(8) { animation-delay: 0.8s; }

        .tip-card::before {
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

        .tip-card:hover::before {
            transform: scaleX(1);
        }

        .tip-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        }

        .tip-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .tip-header::after {
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

        .tip-icon {
            font-size: 3rem;
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

        .tip-header h3 {
            font-size: 1.5rem;
            margin-bottom: 0;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .tip-content {
            padding: 2rem;
        }

        .tip-content p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
        }

        .tip-benefits {
            background: #f8f9ff;
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 1.5rem;
        }

        .tip-benefits h4 {
            color: #667eea;
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
        }

        .tip-benefits ul {
            list-style: none;
            padding: 0;
        }

        .tip-benefits li {
            padding: 0.3rem 0;
            color: #555;
            position: relative;
            padding-left: 1.5rem;
        }

        .tip-benefits li::before {
            content: "✓";
            color: #667eea;
            font-weight: bold;
            position: absolute;
            left: 0;
        }

        .age-section {
            margin: 4rem 0;
        }

        .age-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .age-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 5px solid #667eea;
            animation: slideInLeft 0.6s ease forwards;
            opacity: 0;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .age-card:nth-child(1) { animation-delay: 0.1s; }
        .age-card:nth-child(2) { animation-delay: 0.2s; }
        .age-card:nth-child(3) { animation-delay: 0.3s; }
        .age-card:nth-child(4) { animation-delay: 0.4s; }
        .age-card:nth-child(5) { animation-delay: 0.5s; }
        .age-card:nth-child(6) { animation-delay: 0.6s; }

        .age-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
        }

        .age-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .age-card h4 {
            color: #667eea;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .age-card p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .age-recommendations {
            background: #f0f4ff;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
        }

        .age-recommendations h5 {
            color: #667eea;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .age-recommendations ul {
            list-style: none;
            padding: 0;
        }

        .age-recommendations li {
            padding: 0.2rem 0;
            color: #555;
            font-size: 0.95rem;
            position: relative;
            padding-left: 1.2rem;
        }

        .age-recommendations li::before {
            content: "•";
            color: #667eea;
            position: absolute;
            left: 0;
        }

        .prevention-section {
            margin: 4rem 0;
        }

        .prevention-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .prevention-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            animation: fadeInScale 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .prevention-card:nth-child(1) { animation-delay: 0.1s; }
        .prevention-card:nth-child(2) { animation-delay: 0.2s; }
        .prevention-card:nth-child(3) { animation-delay: 0.3s; }

        .prevention-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .prevention-icon {
            font-size: 2rem;
            margin-bottom: 0.8rem;
            display: block;
        }

        .prevention-card h4 {
            color: #667eea;
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
        }

        .prevention-card p {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .section-title {
            text-align: center;
            color: white;
            margin-bottom: 3rem;
            font-size: 2.5rem;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
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

            .tips-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .age-grid {
                grid-template-columns: 1fr;
            }

            .prevention-grid {
                grid-template-columns: 1fr;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .tip-header {
                padding: 1.5rem;
            }

            .tip-icon {
                font-size: 2.5rem;
            }

            .tip-header h3 {
                font-size: 1.3rem;
            }

            .tip-content {
                padding: 1.5rem;
            }

            .age-card {
                padding: 1.5rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="topbar">
        <a href="index.php" class="back-link">← Back</a>
        <div class="topbar-title">Health Tips & Wellness</div>
        <div class="spacer"></div>
    </div>

    <div class="hero-section">
        <h1>Health Tips & Wellness Guide</h1>
        <p>Discover comprehensive health tips, wellness strategies, and preventive care recommendations to maintain optimal health and wellbeing.</p>
    </div>

    <div class="container">
        <h2 class="section-title">Essential Daily Health Tips</h2>

        <div class="tips-grid">
            <!-- Hydration -->
            <div class="tip-card">
                <div class="tip-header">
                    <span class="tip-icon">💧</span>
                    <h3>Stay Hydrated</h3>
                </div>
                <div class="tip-content">
                    <p>Proper hydration is crucial for maintaining bodily functions, energy levels, and overall health. Water helps transport nutrients, regulate temperature, and remove waste products.</p>
                    <div class="tip-benefits">
                        <h4>Benefits:</h4>
                        <ul>
                            <li>Improved energy levels</li>
                            <li>Better digestion</li>
                            <li>Enhanced physical performance</li>
                            <li>Reduced headache risk</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Exercise -->
            <div class="tip-card">
                <div class="tip-header">
                    <span class="tip-icon">🏃‍♂️</span>
                    <h3>Regular Exercise</h3>
                </div>
                <div class="tip-content">
                    <p>Aim for at least 150 minutes of moderate-intensity aerobic activity or 75 minutes of vigorous activity per week, combined with strength training exercises.</p>
                    <div class="tip-benefits">
                        <h4>Benefits:</h4>
                        <ul>
                            <li>Stronger cardiovascular health</li>
                            <li>Improved mental wellbeing</li>
                            <li>Better weight management</li>
                            <li>Enhanced muscle strength</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Nutrition -->
            <div class="tip-card">
                <div class="tip-header">
                    <span class="tip-icon">🥗</span>
                    <h3>Balanced Nutrition</h3>
                </div>
                <div class="tip-content">
                    <p>Include a variety of fruits, vegetables, whole grains, lean proteins, and healthy fats in your daily meals. Focus on nutrient-dense foods for optimal health.</p>
                    <div class="tip-benefits">
                        <h4>Benefits:</h4>
                        <ul>
                            <li>Stronger immune system</li>
                            <li>Better disease prevention</li>
                            <li>Improved energy levels</li>
                            <li>Healthy weight maintenance</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sleep -->
            <div class="tip-card">
                <div class="tip-header">
                    <span class="tip-icon">😴</span>
                    <h3>Quality Sleep</h3>
                </div>
                <div class="tip-content">
                    <p>Get 7-9 hours of quality sleep per night. Establish a consistent sleep schedule and create a relaxing bedtime routine for better rest.</p>
                    <div class="tip-benefits">
                        <h4>Benefits:</h4>
                        <ul>
                            <li>Enhanced immune function</li>
                            <li>Improved cognitive performance</li>
                            <li>Better mood regulation</li>
                            <li>Reduced stress levels</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Stress Management -->
            <div class="tip-card">
                <div class="tip-header">
                    <span class="tip-icon">🧘‍♀️</span>
                    <h3>Stress Management</h3>
                </div>
                <div class="tip-content">
                    <p>Practice mindfulness, meditation, deep breathing exercises, or yoga daily. Take regular breaks and engage in activities you enjoy.</p>
                    <div class="tip-benefits">
                        <h4>Benefits:</h4>
                        <ul>
                            <li>Reduced anxiety levels</li>
                            <li>Improved mental clarity</li>
                            <li>Better emotional balance</li>
                            <li>Enhanced overall wellbeing</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Regular Checkups -->
            <div class="tip-card">
                <div class="tip-header">
                    <span class="tip-icon">🏥</span>
                    <h3>Regular Checkups</h3>
                </div>
                <div class="tip-content">
                    <p>Schedule annual health screenings and preventive care visits. Early detection and regular monitoring are key to maintaining good health.</p>
                    <div class="tip-benefits">
                        <h4>Benefits:</h4>
                        <ul>
                            <li>Early disease detection</li>
                            <li>Preventive care opportunities</li>
                            <li>Personalized health guidance</li>
                            <li>Peace of mind</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Healthy Habits -->
            <div class="tip-card">
                <div class="tip-header">
                    <span class="tip-icon">🌱</span>
                    <h3>Healthy Lifestyle</h3>
                </div>
                <div class="tip-content">
                    <p>Limit caffeine and alcohol consumption, avoid tobacco products, maintain a healthy weight, and practice good hygiene habits.</p>
                    <div class="tip-benefits">
                        <h4>Benefits:</h4>
                        <ul>
                            <li>Reduced health risks</li>
                            <li>Longer lifespan</li>
                            <li>Better quality of life</li>
                            <li>Improved self-esteem</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Hygiene -->
            <div class="tip-card">
                <div class="tip-header">
                    <span class="tip-icon">🧼</span>
                    <h3>Personal Hygiene</h3>
                </div>
                <div class="tip-content">
                    <p>Wash hands regularly, especially before meals and after using the restroom. Maintain oral hygiene and practice good respiratory etiquette.</p>
                    <div class="tip-benefits">
                        <h4>Benefits:</h4>
                        <ul>
                            <li>Prevention of infections</li>
                            <li>Reduced illness transmission</li>
                            <li>Better oral health</li>
                            <li>Improved personal confidence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="age-section">
            <h2 class="section-title">Age-Specific Health Recommendations</h2>

            <div class="age-grid">
                <div class="age-card">
                    <div class="age-icon">👶</div>
                    <h4>Infants (0-12 months)</h4>
                    <p>Focus on exclusive breastfeeding, timely vaccinations, and developmental milestones monitoring.</p>
                    <div class="age-recommendations">
                        <h5>Key Recommendations:</h5>
                        <ul>
                            <li>Exclusive breastfeeding for 6 months</li>
                            <li>Complete vaccination schedule</li>
                            <li>Regular pediatric checkups</li>
                            <li>Safe sleep practices</li>
                        </ul>
                    </div>
                </div>

                <div class="age-card">
                    <div class="age-icon">👧</div>
                    <h4>Children (1-12 years)</h4>
                    <p>Promote healthy eating, physical activity, and establish good habits early in life.</p>
                    <div class="age-recommendations">
                        <h5>Key Recommendations:</h5>
                        <ul>
                            <li>Nutritious balanced diet</li>
                            <li>Daily physical activity</li>
                            <li>Regular dental care</li>
                            <li>Vision and hearing tests</li>
                        </ul>
                    </div>
                </div>

                <div class="age-card">
                    <div class="age-icon">👨</div>
                    <h4>Adolescents (13-19 years)</h4>
                    <p>Support mental health, encourage healthy relationships, and promote responsible decision-making.</p>
                    <div class="age-recommendations">
                        <h5>Key Recommendations:</h5>
                        <ul>
                            <li>Regular exercise routine</li>
                            <li>Balanced nutrition</li>
                            <li>Mental health awareness</li>
                            <li>Regular medical checkups</li>
                        </ul>
                    </div>
                </div>

                <div class="age-card">
                    <div class="age-icon">👨‍💼</div>
                    <h4>Adults (20-40 years)</h4>
                    <p>Build healthy habits, manage stress, and focus on preventive care and career health.</p>
                    <div class="age-recommendations">
                        <h5>Key Recommendations:</h5>
                        <ul>
                            <li>Regular exercise</li>
                            <li>Stress management</li>
                            <li>Preventive screenings</li>
                            <li>Healthy work-life balance</li>
                        </ul>
                    </div>
                </div>

                <div class="age-card">
                    <div class="age-icon">👴</div>
                    <h4>Middle-Aged (41-60 years)</h4>
                    <p>Focus on chronic disease prevention, regular health screenings, and lifestyle optimization.</p>
                    <div class="age-recommendations">
                        <h5>Key Recommendations:</h5>
                        <ul>
                            <li>Chronic disease screening</li>
                            <li>Cardiovascular checkups</li>
                            <li>Bone density tests</li>
                            <li>Weight management</li>
                        </ul>
                    </div>
                </div>

                <div class="age-card">
                    <div class="age-icon">👵</div>
                    <h4>Seniors (60+ years)</h4>
                    <p>Prevent falls, manage medications, monitor cognitive health, and maintain mobility.</p>
                    <div class="age-recommendations">
                        <h5>Key Recommendations:</h5>
                        <ul>
                            <li>Fall prevention measures</li>
                            <li>Medication management</li>
                            <li>Cognitive health monitoring</li>
                            <li>Regular health evaluations</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="prevention-section">
            <h2 class="section-title">Disease Prevention & Health Promotion</h2>

            <div class="prevention-grid">
                <div class="prevention-card">
                    <div class="prevention-icon">💉</div>
                    <h4>Childhood Vaccines</h4>
                    <p>MMR, DPT, Polio, Hepatitis B, Varicella, and other routine vaccines following recommended immunization schedules for children.</p>
                </div>

                <div class="prevention-card">
                    <div class="prevention-icon">💉</div>
                    <h4>Adult Boosters</h4>
                    <p>Tdap boosters every 10 years, annual flu vaccine, and age-appropriate vaccines for pneumonia, shingles, and HPV prevention.</p>
                </div>

                <div class="prevention-card">
                    <div class="prevention-icon">💉</div>
                    <h4>Travel Vaccines</h4>
                    <p>Yellow fever, hepatitis A/B, typhoid, and malaria prevention for travelers visiting high-risk regions and destinations.</p>
                </div>
            </div>

            <div class="prevention-grid" style="margin-top: 2rem;">
                <div class="prevention-card">
                    <div class="prevention-icon">🩸</div>
                    <h4>Blood Pressure Monitoring</h4>
                    <p>Check annually, or monthly for those with hypertension. Maintain healthy blood pressure through diet and exercise.</p>
                </div>

                <div class="prevention-card">
                    <div class="prevention-icon">🩸</div>
                    <h4>Cholesterol Screening</h4>
                    <p>Screen every 4-6 years starting at age 20, annually if elevated. Monitor LDL and HDL cholesterol levels regularly.</p>
                </div>

                <div class="prevention-card">
                    <div class="prevention-icon">🩸</div>
                    <h4>Blood Sugar Testing</h4>
                    <p>Fast glucose test at age 45, annually if overweight or family history. Monitor for diabetes risk factors.</p>
                </div>

                <div class="prevention-card">
                    <div class="prevention-icon">🎗️</div>
                    <h4>Cancer Screenings</h4>
                    <p>Mammography (women 45+), Colonoscopy (50+), Pap smear (21-65). Regular cancer screenings save lives.</p>
                </div>

                <div class="prevention-card">
                    <div class="prevention-icon">👁️</div>
                    <h4>Vision & Hearing</h4>
                    <p>Annual eye exams and hearing tests as recommended by age. Early detection prevents vision and hearing loss.</p>
                </div>

                <div class="prevention-card">
                    <div class="prevention-icon">🦴</div>
                    <h4>Bone Density</h4>
                    <p>DEXA scan recommended for post-menopausal women and men 70+. Prevent osteoporosis through calcium and vitamin D.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html></content>
<parameter name="filePath">c:\xampp\htdocs\Major Project\health_tips.php