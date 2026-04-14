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
    <meta name="description" content="Emergency Health Services - Emergency contacts, first aid information, and when to seek immediate medical help">
    <meta name="keywords" content="emergency, first aid, medical emergency, ambulance, emergency contacts, health emergency">
    <meta name="author" content="Healthcare Advisory Team">
    <meta name="theme-color" content="#dc3545">
    <title>Emergency Services - Healthcare Advisory</title>
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
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
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
            color: #ff6b6b;
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

        .emergency-alert {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: 20px;
            margin-bottom: 3rem;
            box-shadow: 0 15px 40px rgba(220, 53, 69, 0.3);
            animation: pulseAlert 2s ease-in-out infinite;
            position: relative;
            overflow: hidden;
        }

        @keyframes pulseAlert {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .emergency-alert::before {
            content: '🚨';
            position: absolute;
            top: -10px;
            right: -10px;
            font-size: 4rem;
            opacity: 0.3;
            animation: rotate 10s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .emergency-alert h2 {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            font-weight: 800;
        }

        .emergency-alert p {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .emergency-contacts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .contact-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            animation: slideInUp 0.6s ease forwards;
            opacity: 0;
            position: relative;
            overflow: hidden;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .contact-card:nth-child(1) { animation-delay: 0.1s; }
        .contact-card:nth-child(2) { animation-delay: 0.2s; }
        .contact-card:nth-child(3) { animation-delay: 0.3s; }
        .contact-card:nth-child(4) { animation-delay: 0.4s; }
        .contact-card:nth-child(5) { animation-delay: 0.5s; }
        .contact-card:nth-child(6) { animation-delay: 0.6s; }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #dc3545 0%, #ff6b6b 100%);
        }

        .contact-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .contact-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .contact-card h3 {
            color: #dc3545;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .contact-number {
            font-size: 1.8rem;
            font-weight: 800;
            color: #dc3545;
            margin-bottom: 0.5rem;
            display: block;
        }

        .contact-desc {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .emergency-situations {
            margin: 4rem 0;
        }

        .situations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .situation-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            animation: fadeInScale 0.5s ease forwards;
            opacity: 0;
            border-left: 5px solid #dc3545;
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .situation-card:nth-child(1) { animation-delay: 0.1s; }
        .situation-card:nth-child(2) { animation-delay: 0.2s; }
        .situation-card:nth-child(3) { animation-delay: 0.3s; }
        .situation-card:nth-child(4) { animation-delay: 0.4s; }
        .situation-card:nth-child(5) { animation-delay: 0.5s; }
        .situation-card:nth-child(6) { animation-delay: 0.6s; }

        .situation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .situation-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: block;
        }

        .situation-card h4 {
            color: #dc3545;
            margin-bottom: 1rem;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .situation-card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .action-steps {
            background: #ffeaea;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
        }

        .action-steps h5 {
            color: #dc3545;
            margin-bottom: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
        }

        .action-steps ul {
            list-style: none;
            padding: 0;
        }

        .action-steps li {
            padding: 0.3rem 0;
            color: #555;
            position: relative;
            padding-left: 1.5rem;
            font-size: 0.95rem;
        }

        .action-steps li::before {
            content: "⚡";
            position: absolute;
            left: 0;
            color: #dc3545;
        }

        .first-aid-section {
            margin: 4rem 0;
        }

        .first-aid-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .first-aid-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
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

        .first-aid-card:nth-child(1) { animation-delay: 0.1s; }
        .first-aid-card:nth-child(2) { animation-delay: 0.2s; }
        .first-aid-card:nth-child(3) { animation-delay: 0.3s; }
        .first-aid-card:nth-child(4) { animation-delay: 0.4s; }
        .first-aid-card:nth-child(5) { animation-delay: 0.5s; }
        .first-aid-card:nth-child(6) { animation-delay: 0.6s; }

        .first-aid-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .first-aid-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: block;
        }

        .first-aid-card h4 {
            color: #dc3545;
            margin-bottom: 1rem;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .first-aid-card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .first-aid-steps {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
        }

        .first-aid-steps h5 {
            color: #dc3545;
            margin-bottom: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
        }

        .first-aid-steps ol {
            padding-left: 1.5rem;
        }

        .first-aid-steps li {
            margin-bottom: 0.3rem;
            color: #555;
            font-size: 0.95rem;
        }

        .preparedness-section {
            margin: 4rem 0;
        }

        .preparedness-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .preparedness-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }

        .preparedness-card:nth-child(1) { animation-delay: 0.1s; }
        .preparedness-card:nth-child(2) { animation-delay: 0.2s; }
        .preparedness-card:nth-child(3) { animation-delay: 0.3s; }
        .preparedness-card:nth-child(4) { animation-delay: 0.4s; }
        .preparedness-card:nth-child(5) { animation-delay: 0.5s; }
        .preparedness-card:nth-child(6) { animation-delay: 0.6s; }

        .preparedness-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        .preparedness-icon {
            font-size: 2rem;
            margin-bottom: 0.8rem;
            display: block;
        }

        .preparedness-card h4 {
            color: #dc3545;
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .preparedness-card p {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .disclaimer {
            background: rgba(255, 255, 255, 0.95);
            border-left: 4px solid #dc3545;
            padding: 2rem;
            border-radius: 12px;
            margin: 3rem 0;
            font-size: 0.95rem;
            color: #721c24;
            backdrop-filter: blur(10px);
        }

        .disclaimer h3 {
            color: #dc3545;
            margin-bottom: 1rem;
            font-size: 1.2rem;
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

            .emergency-contacts {
                grid-template-columns: 1fr;
            }

            .situations-grid {
                grid-template-columns: 1fr;
            }

            .first-aid-grid {
                grid-template-columns: 1fr;
            }

            .preparedness-grid {
                grid-template-columns: 1fr;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .emergency-alert {
                padding: 2rem 1.5rem;
            }

            .emergency-alert h2 {
                font-size: 1.8rem;
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
        <div class="topbar-title">Emergency Services</div>
        <div class="spacer"></div>
    </div>

    <div class="hero-section">
        <h1>Emergency Services</h1>
        <p>Critical information for medical emergencies, emergency contacts, and first aid guidance when every second counts.</p>
    </div>

    <div class="container">
        <div class="emergency-alert">
            <h2>🚨 CALL EMERGENCY SERVICES IMMEDIATELY IF YOU EXPERIENCE:</h2>
            <p><strong>Chest pain or pressure, difficulty breathing</strong></p>
            <p><strong>Severe allergic reactions or difficulty breathing</strong></p>
            <p><strong>Signs of stroke (facial drooping, arm weakness, speech difficulty)</strong></p>
            <p><strong>Severe bleeding that won't stop</strong></p>
            <p><strong>Choking or airway obstruction</strong></p>
            <p><strong>Severe head, neck, or spinal injuries</strong></p>
            <p><strong>Poisoning or overdose</strong></p>
            <p><strong>Severe burns or trauma</strong></p>
            <p><strong>Loss of consciousness or unresponsiveness</strong></p>
            <p><strong>Thoughts of self-harm or suicide</strong></p>
        </div>

        <h2 class="section-title">Emergency Contact Numbers</h2>

        <div class="emergency-contacts">
            <div class="contact-card">
                <span class="contact-icon">🚑</span>
                <h3>Ambulance Service</h3>
                <span class="contact-number">108</span>
                <p class="contact-desc">24/7 emergency medical services for life-threatening situations. Call immediately for medical emergencies.</p>
            </div>

            <div class="contact-card">
                <span class="contact-icon">👮</span>
                <h3>Police Emergency</h3>
                <span class="contact-number">100</span>
                <p class="contact-desc">For crime, accidents, or situations requiring immediate police intervention.</p>
            </div>

            <div class="contact-card">
                <span class="contact-icon">🔥</span>
                <h3>Fire Brigade</h3>
                <span class="contact-number">101</span>
                <p class="contact-desc">For fire emergencies, building collapses, or hazardous material incidents.</p>
            </div>

            <div class="contact-card">
                <span class="contact-icon">🏥</span>
                <h3>Healthcare Advisory</h3>
                <span class="contact-number">+91 9106775271</span>
                <p class="contact-desc">Our healthcare advisory team for non-emergency medical guidance and support.</p>
            </div>

            <div class="contact-card">
                <span class="contact-icon">👩</span>
                <h3>Women's Helpline</h3>
                <span class="contact-number">1091</span>
                <p class="contact-desc">24/7 support for women in distress, domestic violence, harassment, or any form of abuse.</p>
            </div>

            <div class="contact-card">
                <span class="contact-icon">👶</span>
                <h3>Child Helpline</h3>
                <span class="contact-number">1098</span>
                <p class="contact-desc">Emergency support for children in need, child abuse, missing children, or any child-related emergencies.</p>
            </div>
        </div>

        <div class="emergency-situations">
            <h2 class="section-title">Common Emergency Situations</h2>

            <div class="situations-grid">
                <div class="situation-card">
                    <span class="situation-icon">😮</span>
                    <h4>Choking</h4>
                    <p>Inability to breathe, speak, or cough. Universal sign of choking is hands clutching throat.</p>
                    <div class="action-steps">
                        <h5>Immediate Actions:</h5>
                        <ul>
                            <li>Encourage coughing if mild</li>
                            <li>Perform Heimlich maneuver</li>
                            <li>Call emergency if severe</li>
                            <li>Continue until object is expelled</li>
                        </ul>
                    </div>
                </div>

                <div class="situation-card">
                    <span class="situation-icon">🤕</span>
                    <h4>Severe Bleeding</h4>
                    <p>Blood soaking through bandages, spurting blood, or blood that won't stop. Apply pressure immediately.</p>
                    <div class="action-steps">
                        <h5>Immediate Actions:</h5>
                        <ul>
                            <li>Apply direct pressure</li>
                            <li>Elevate injured area</li>
                            <li>Use clean cloth or bandage</li>
                            <li>Call emergency services</li>
                        </ul>
                    </div>
                </div>

                <div class="situation-card">
                    <span class="situation-icon">⚡</span>
                    <h4>Electric Shock</h4>
                    <p>Burns, irregular heartbeat, muscle pain, or unconsciousness. Do not touch person until power is off.</p>
                    <div class="action-steps">
                        <h5>Immediate Actions:</h5>
                        <ul>
                            <li>Turn off power source</li>
                            <li>Call emergency services</li>
                            <li>Do not touch if still energized</li>
                            <li>Perform CPR if needed</li>
                        </ul>
                    </div>
                </div>

                <div class="situation-card">
                    <span class="situation-icon">🔥</span>
                    <h4>Burns</h4>
                    <p>Redness, blistering, or charred skin. Cool the burn immediately and seek medical attention.</p>
                    <div class="action-steps">
                        <h5>Immediate Actions:</h5>
                        <ul>
                            <li>Cool with running water</li>
                            <li>Cover with clean cloth</li>
                            <li>Do not apply creams or oils</li>
                            <li>Seek medical help for severe burns</li>
                        </ul>
                    </div>
                </div>

                 <div class="situation-card">
                    <span class="situation-icon">🤢</span>
                    <h4>Poisoning</h4>
                    <p>Nausea, vomiting, confusion, or seizures. Different poisons require different treatments.</p>
                    <div class="action-steps">
                        <h5>Immediate Actions:</h5>
                        <ul>
                            <li>Call poison control center</li>
                            <li>Do not induce vomiting</li>
                            <li>Save container/pill bottle</li>
                            <li>Seek emergency medical help</li>
                        </ul>
                    </div>
                </div> 

                 <div class="situation-card">
                    <span class="situation-icon">💔</span>
                    <h4>Allergic Reaction</h4>
                    <p>Hives, swelling, difficulty breathing, or anaphylaxis. Use epinephrine if available.</p>
                    <div class="action-steps">
                        <h5>Immediate Actions:</h5>
                        <ul>
                            <li>Use epinephrine auto-injector</li>
                            <li>Call emergency services</li>
                            <li>Remove allergen if possible</li>
                            <li>Perform CPR if needed</li>
                        </ul>
                    </div>
                </div> 

            </div>
        </div>

        <div class="first-aid-section">
            <h2 class="section-title">Essential First Aid Information</h2>

            <div class="first-aid-grid">
                <div class="first-aid-card">
                    <span class="first-aid-icon">👐</span>
                    <h4>CPR (Cardiopulmonary Resuscitation)</h4>
                    <p>Life-saving technique for when someone's heart stops beating. Combines chest compressions with rescue breathing.</p>
                    <div class="first-aid-steps">
                        <h5>Adult CPR Steps:</h5>
                        <ol>
                            <li>Check for responsiveness</li>
                            <li>Call emergency services</li>
                            <li>30 chest compressions (2 inches deep)</li>
                            <li>2 rescue breaths</li>
                            <li>Continue until help arrives</li>
                        </ol>
                    </div>
                </div>

                <div class="first-aid-card">
                    <span class="first-aid-icon">🩹</span>
                    <h4>Wound Care</h4>
                    <p>Proper cleaning and dressing of cuts and wounds to prevent infection and promote healing.</p>
                    <div class="first-aid-steps">
                        <h5>Wound Care Steps:</h5>
                        <ol>
                            <li>Stop the bleeding with pressure</li>
                            <li>Clean with soap and water</li>
                            <li>Apply antibiotic ointment</li>
                            <li>Cover with sterile bandage</li>
                            <li>Change dressing daily</li>
                        </ol>
                    </div>
                </div>

                <div class="first-aid-card">
                    <span class="first-aid-icon">❄️</span>
                    <h4>Sprains & Strains</h4>
                    <p>Common injuries to ligaments and muscles. RICE method helps reduce swelling and pain.</p>
                    <div class="first-aid-steps">
                        <h5>RICE Method:</h5>
                        <ol>
                            <li><strong>Rest:</strong> Stop using injured area</li>
                            <li><strong>Ice:</strong> Apply ice for 15-20 minutes</li>
                            <li><strong>Compression:</strong> Use elastic bandage</li>
                            <li><strong>Elevation:</strong> Keep above heart level</li>
                        </ol>
                    </div>
                </div>

                <div class="first-aid-card">
                    <span class="first-aid-icon">🌡️</span>
                    <h4>Heat Exhaustion</h4>
                    <p>Overheating that can lead to heat stroke. Move to cool area and hydrate immediately.</p>
                    <div class="first-aid-steps">
                        <h5>Treatment Steps:</h5>
                        <ol>
                            <li>Move to cool, shaded area</li>
                            <li>Remove excess clothing</li>
                            <li>Give cool water to drink</li>
                            <li>Apply cool, wet cloths</li>
                            <li>Seek medical help if severe</li>
                        </ol>
                    </div>
                </div>

                <div class="first-aid-card">
                    <span class="first-aid-icon">🥶</span>
                    <h4>Hypothermia</h4>
                    <p>Dangerously low body temperature. Warm the person gradually and seek medical attention.</p>
                    <div class="first-aid-steps">
                        <h5>Treatment Steps:</h5>
                        <ol>
                            <li>Move to warm location</li>
                            <li>Remove wet clothing</li>
                            <li>Warm with blankets</li>
                            <li>Give warm fluids if conscious</li>
                            <li>Seek immediate medical help</li>
                        </ol>
                    </div>
                </div>

                <div class="first-aid-card">
                    <span class="first-aid-icon">🦟</span>
                    <h4>Snake/Animal Bites</h4>
                    <p>Venomous bites require immediate medical attention. Clean wound and immobilize affected area.</p>
                    <div class="first-aid-steps">
                        <h5>Immediate Actions:</h5>
                        <ol>
                            <li>Keep person calm and still</li>
                            <li>Clean wound with soap/water</li>
                            <li>Apply clean dressing</li>
                            <li>Immobilize bitten area</li>
                            <li>Seek emergency medical help</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="preparedness-section">
            <h2 class="section-title">Emergency Preparedness</h2>

            <div class="preparedness-grid">
                <div class="preparedness-card">
                    <span class="preparedness-icon">🏠</span>
                    <h4>Emergency Kit</h4>
                    <p>Prepare a comprehensive emergency kit with first aid supplies, medications, important documents, and essential items for at least 72 hours.</p>
                </div>
<!--  
                <div class="preparedness-card">
                    <span class="preparedness-icon">📱</span>
                    <h4>Emergency Contacts</h4>
                    <p>Keep a list of emergency contacts, family members, doctors, and local emergency services readily accessible on your phone and in writing.</p>
                </div>

                <div class="preparedness-card">
                    <span class="preparedness-icon">🏥</span>
                    <h4>Medical Information</h4>
                    <p>Maintain updated medical records, allergy information, current medications, and medical conditions for quick reference in emergencies.</p>
                </div>

                <div class="preparedness-card">
                    <span class="preparedness-icon">🚪</span>
                    <h4>Escape Plan</h4>
                    <p>Create and practice home escape routes, designate meeting points, and establish communication plans for family members.</p>
                </div>

                <div class="preparedness-card">
                    <span class="preparedness-icon">💊</span>
                    <h4>Medication Backup</h4>
                    <p>Keep extra supply of essential medications and maintain a list of all current prescriptions with dosages and pharmacy information.</p>
                </div>

                <div class="preparedness-card">
                    <span class="preparedness-icon">🔋</span>
                    <h4>Power Backup</h4>
                    <p>Have flashlights, batteries, power banks, and alternative power sources ready for extended power outages or emergencies.</p>
                </div>
            </div>
        </div> -->

        <div class="disclaimer">
            <h3>⚠️ Important Medical Disclaimer</h3>
            <p><strong>This emergency information is for educational purposes only and is not a substitute for professional medical advice, diagnosis, or treatment.</strong></p>
            <p>Always call emergency services (108) immediately for any medical emergency. Do not attempt complex medical procedures unless you are properly trained. In case of doubt, seek immediate professional medical help. Remember that timely professional intervention can save lives.</p>
        </div>
    </div>
</body>
</html></content>