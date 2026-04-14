<?php
    session_start();
    date_default_timezone_set('UTC');

    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }

    $success = isset($_GET['success']) && $_GET['success'] === '1';
    $errorMessage = isset($_GET['error']) ? htmlspecialchars(urldecode($_GET['error'])) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Contact Healthcare Advisory - Get in touch with our support team for health guidance.">
    <meta name="keywords" content="contact, health support, medical advice, healthcare advisory">
    <meta name="author" content="Healthcare Advisory Team">
    <meta name="theme-color" content="#1f3c88">
    <title>Get In Touch - Healthcare Advisory</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --ink: #0f172a;
            --navy: #1f3c88;
            --purple: #6d4cff;
            --cyan: #38b6ff;
            --sky: #e8f1ff;
            --panel: #ffffff;
            --line: #d6e2ff;
            --soft: #f7faff;
            --accent: #ff7a59;
            --accent-dark: #ff652f;
            --success-bg: #e9f9ee;
            --success-text: #166534;
            --error-bg: #fff0f0;
            --error-text: #b42318;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            color: var(--ink);
            position: relative;
            overflow-x: hidden;
            background: radial-gradient(circle at top left, rgba(86, 165, 255, 0.24), transparent 24%),
                        radial-gradient(circle at bottom right, rgba(255, 122, 89, 0.24), transparent 20%),
                        linear-gradient(180deg, #d7dbff 0%, #f8d5ff 55%, #fff3da 100%);
            background-attachment: fixed;
            background-size: cover;
        }

        body::before {
            content: '';
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(109, 76, 255, 0.16);
            top: -80px;
            left: -80px;
            filter: blur(70px);
            z-index: -1;
        }

        body::after {
            content: '';
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(56, 182, 255, 0.16);
            bottom: -60px;
            right: -60px;
            filter: blur(65px);
            z-index: -1;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
            position: relative;
        }

        .hero-glow {
            position: absolute;
            top: 30px;
            right: -20px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(109, 76, 255, 0.25), transparent 60%);
            filter: blur(30px);
            animation: float 8s ease-in-out infinite;
        }

        .hero-glow:nth-child(2) {
            left: -30px;
            top: 220px;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, rgba(56, 182, 255, 0.24), transparent 58%);
        }

        .background-grid {
            position: absolute;
            top: 0;
            left: 50%;
            width: 900px;
            height: 900px;
            transform: translateX(-50%);
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.12) 1px, transparent 1px);
            background-size: 36px 36px;
            pointer-events: none;
            z-index: -2;
            opacity: 0.4;
        }

        header {
            margin-bottom: 2rem;
            padding: 2rem;
            text-align: center;
            background: linear-gradient(135deg, #4f32c3, #2c7be5);
            border-radius: 12px;
            box-shadow: 0 24px 60px rgba(17, 24, 39, 0.12);
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        header::after {
            content: '';
            position: absolute;
            width: 220px;
            height: 220px;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 50%;
            top: -70px;
            right: -70px;
        }

        header h1 {
            margin-bottom: 0.75rem;
            font-size: clamp(2rem, 4vw, 3.2rem);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        header p {
            max-width: 720px;
            margin: 0 auto;
            line-height: 1.75;
            color: rgba(255, 255, 255, 0.88);
        }

        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.9rem 1.4rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            color: #fff;
            font-weight: 700;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.25s ease, background 0.25s ease, box-shadow 0.25s ease;
        }

        .back-link:hover {
            transform: translate(-2px, -2px);
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.12);
        }

        .contact-layout {
            display: grid;
            grid-template-columns: minmax(280px, 340px) minmax(0, 1fr);
            gap: 1.5rem;
            align-items: start;
        }

        .contact-sidebar,
        .contact-panel {
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid rgba(31, 60, 136, 0.12);
            border-radius: 16px;
            box-shadow: 0 18px 45px rgba(17, 24, 39, 0.06);
        }

        .contact-sidebar {
            padding: 1.75rem;
        }

        .contact-panel {
            padding: 2rem;
        }

        .contact-sidebar h2,
        .contact-panel h2 {
            margin-bottom: 0.9rem;
            font-size: 1.8rem;
            color: var(--navy);
        }

        .contact-sidebar p,
        .contact-panel p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            color: #475569;
        }

        .square-stack {
            display: grid;
            gap: 1rem;
        }

        .square-card {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 1rem;
            padding: 1.15rem;
            background: linear-gradient(180deg, #ffffff 0%, #eef3ff 100%);
            border: 1px solid rgba(31, 60, 136, 0.08);
            border-radius: 14px;
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
            align-items: center;
        }

        .square-card:hover {
            transform: translateY(-4px);
            border-color: rgba(56, 182, 255, 0.35);
            box-shadow: 0 18px 40px rgba(31, 60, 136, 0.08);
        }

        .contact-illustration {
            padding: 1.25rem;
            margin: 0 0 1.25rem;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(86, 165, 255, 0.16), rgba(255, 122, 89, 0.14));
            border: 1px solid rgba(86, 165, 255, 0.22);
            box-shadow: 0 18px 40px rgba(31, 60, 136, 0.05);
            display: flex;
            justify-content: center;
        }

        .contact-illustration svg {
            width: 100%;
            max-width: 260px;
            height: auto;
            animation: float 6s ease-in-out infinite;
        }

        .icon {
            display: inline-flex;
            width: 48px;
            height: 48px;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(86, 165, 255, 0.18), rgba(109, 76, 255, 0.18));
            color: var(--navy);
            font-size: 1.4rem;
            border-radius: 14px;
            animation: float 6s ease-in-out infinite;
        }

        .square-card h4 {
            margin-bottom: 0.3rem;
            font-size: 0.97rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--navy);
        }

        .square-card p,
        .square-card a {
            margin: 0;
            color: var(--ink);
            text-decoration: none;
            line-height: 1.7;
            word-break: break-word;
        }

        .alert {
            margin-bottom: 1.5rem;
            padding: 1rem 1.25rem;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
        }

        .alert-success {
            background: var(--success-bg);
            color: var(--success-text);
            border: 1px solid #93d3a2;
        }

        .alert-error {
            background: var(--error-bg);
            color: var(--error-text);
            border: 1px solid #eea5a5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.25rem;
        }

        .form-group {
            margin-bottom: 0.2rem;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--navy);
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 1rem 1rem;
            border: 2px solid rgba(31, 60, 136, 0.12);
            border-radius: 14px;
            background: #fbfbff;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.25s ease, box-shadow 0.25s ease, transform 0.25s ease;
        }

        input:hover,
        textarea:hover,
        select:hover {
            transform: translateY(-1px);
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 4px rgba(56, 182, 255, 0.16);
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem 1.8rem;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease, filter 0.25s ease;
        }

        .submit-btn::before {
            content: '✉️';
            display: inline-block;
            transform: translateY(-1px);
        }

        .submit-btn:hover {
            transform: translate(-2px, -2px);
            box-shadow: 0 18px 45px rgba(255, 122, 89, 0.24);
            filter: saturate(1.08);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem 1rem 3rem;
            }

            .contact-layout,
            .form-grid {
                grid-template-columns: 1fr;
            }

            header,
            .contact-sidebar,
            .contact-panel {
                padding: 1.5rem;
            }

            .hero-glow {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">        <div class="background-grid"></div>        <header>
            <h1>Get In Touch</h1>
            <p>Reach out to our healthcare advisory team for questions, support, or medical guidance.</p>
            <a href="index.php" class="back-link">&larr; Back to Dashboard</a>
        </header>

        <div class="hero-glow"></div>
        <div class="hero-glow"></div>
        <div class="contact-layout">
            <aside class="contact-sidebar">
                <h2>Contact Details</h2>
                <!-- <p>This page now uses a square-style card design with bright accents, animated icons, and attractive gradient surfaces.</p> -->

                <!-- <div class="contact-illustration">
                    <svg viewBox="0 0 320 240" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <rect x="16" y="32" width="288" height="176" rx="24" fill="#ffffff" stroke="#2c7be5" stroke-width="4" opacity="0.88"/>
                        <path d="M40 64H280" stroke="#6d4cff" stroke-width="8" stroke-linecap="round"/>
                        <path d="M40 104L100 146L154 110L220 158L280 104" stroke="#ff7a59" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="68" cy="172" r="14" fill="#38b6ff"/>
                        <circle cx="128" cy="182" r="10" fill="#ff7a59"/>
                        <circle cx="208" cy="168" r="12" fill="#6d4cff"/>
                        <path d="M46 44C52 32 76 24 120 24C167 24 194 32 202 44" stroke="#38b6ff" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div> -->

                <div class="square-stack">
                    <div class="square-card">
                        <span class="icon">📧</span>
                        <div>
                            <h4>Email Support</h4>
                            <p><a href="mailto:info@healthcareadvisory.com">info@healthcareadvisory.com</a></p>
                        </div>
                    </div>
                    <div class="square-card">
                        <span class="icon">📞</span>
                        <div>
                            <h4>Phone Support</h4>
                            <p><a href="tel:+919106775271">+91 9106775271</a></p>
                        </div>
                    </div>
                    <div class="square-card">
                        <span class="icon">📍</span>
                        <div>
                            <h4>Office Location</h4>
                            <p>123 Medical Lane, Healthcare City, Chandigarh</p>
                        </div>
                    </div>
                    <div class="square-card">
                        <span class="icon">⏰</span>
                        <div>
                            <h4>Working Hours</h4>
                            <p>Monday to Saturday<br>9:00 AM to 7:00 PM</p>
                        </div>
                    </div>
                </div>
            </aside>

            <section class="contact-panel">
                <h2>Contact Form</h2>
                <p>Please fill in your details and message. Our team will respond as soon as possible.</p>

                <?php if ($success): ?>
                    <div class="alert alert-success">Your message has been sent successfully.</div>
                <?php elseif ($errorMessage): ?>
                    <div class="alert alert-error"><?php echo $errorMessage; ?></div>
                <?php endif; ?>

                <form action="process_contact.php" method="POST" novalidate>
                    <input type="hidden" name="redirect_page" value="contact.php">

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" placeholder="Enter your full name" required aria-required="true">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email address" required aria-required="true">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" pattern="[0-9\-\+\(\)\s]*">
                        </div>

                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" id="age" name="age" placeholder="Enter your age" min="0" max="120">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required aria-required="true">
                                <option value="">Select a subject</option>
                                <option value="general_inquiry">General Inquiry</option>
                                <option value="appointment">Schedule an Appointment</option>
                                <option value="health_concern">Health Concern</option>
                                <option value="feedback">Feedback</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="preferred_contact">Preferred Contact Method</label>
                            <select id="preferred_contact" name="preferred_contact">
                                <option value="email">Email</option>
                                <option value="phone">Phone</option>
                                <option value="both">Both</option>
                            </select>
                        </div>

                        <div class="form-group full-width">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" placeholder="Please describe your inquiry in detail" required aria-required="true"></textarea>
                        </div>

                        <div class="form-group full-width">
                            <button type="submit" class="submit-btn">Send Message</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</body>
</html>
