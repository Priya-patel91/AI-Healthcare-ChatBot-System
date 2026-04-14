<?php
// General Health Consultation page
// This page provides a consultation request form that submits to process_contact.php

$success = isset($_GET['success']) && $_GET['success'] === '1';
$error = isset($_GET['error']) ? urldecode($_GET['error']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Health Consultation - Healthcare Advisory</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f2f8ff 0%, #edf3ff 35%, #fff8e1 100%);
            color: #333;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            left: -120px;
            top: 40px;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(106, 13, 173, 0.14);
            filter: blur(72px);
            z-index: -1;
        }

        body::after {
            content: '';
            position: absolute;
            right: -100px;
            bottom: -80px;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(255, 193, 7, 0.16);
            filter: blur(76px);
            z-index: -1;
        }

        header {
            background: linear-gradient(135deg, #6A0DAD 0%, #4B0082 100%);
            color: white;
            padding: 2rem 1rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(75, 0, 130, 0.18);
        }

        header::before {
            content: '';
            position: absolute;
            left: 50%;
            top: -80px;
            width: 220px;
            height: 220px;
            background: rgba(255, 255, 255, 0.16);
            border-radius: 50%;
            transform: translateX(-50%);
        }

        header::after {
            content: '';
            position: absolute;
            right: -60px;
            bottom: -50px;
            width: 180px;
            height: 180px;
            background: rgba(255, 255, 255, 0.18);
            border-radius: 50%;
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
            border-radius: 16px;
            margin: 0 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 0.75rem 1.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin: 0 0.35rem;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: rgba(255, 255, 255, 0.08);
        }

        nav a:hover {
            background: rgba(255, 193, 7, 0.2);
            transform: translateY(-2px);
            color: white;
        }

        main {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(75, 0, 130, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(75, 0, 130, 0.12);
        }

        .card h2 {
            margin-top: 0;
            color: #4B0082;
            font-size: clamp(1.9rem, 3.2vw, 2.4rem);
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: #e6ffed;
            border: 1px solid #72dd8a;
            color: #205b2d;
        }

        .alert-error {
            background: #ffe6e6;
            border: 1px solid #e06767;
            color: #7a1f1f;
        }

        .form-group {
            margin-bottom: 1.4rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 700;
            color: #4B0082;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        input, textarea, select {
            width: 100%;
            padding: 0.95rem 1rem;
            border: 1px solid rgba(106, 13, 173, 0.2);
            border-radius: 14px;
            font-size: 1rem;
            font-family: inherit;
            transition: border 0.25s ease, box-shadow 0.25s ease, transform 0.25s ease;
            background: rgba(255, 255, 255, 0.92);
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #6A0DAD;
            box-shadow: 0 0 10px rgba(106, 13, 173, 0.18);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn {
            display: inline-block;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 999px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: 700;
            background: linear-gradient(135deg, #FFC107 0%, #FFB300 100%);
            color: white;
            transition: transform 0.25s ease, box-shadow 0.25s ease, filter 0.25s ease;
            text-decoration: none;
            box-shadow: 0 12px 28px rgba(255, 193, 7, 0.25);
        }

        .btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 18px 35px rgba(255, 122, 89, 0.32);
            filter: saturate(1.05);
        }

        .btn:active {
            transform: translateY(0);
        }

        .animated-card {
            animation: fadeInUp 0.8s ease both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .status-panel {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(106, 13, 173, 0.12);
            padding: 1rem 1.25rem;
            border-radius: 14px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #4B0082;
            box-shadow: 0 10px 24px rgba(17, 24, 39, 0.06);
        }

        .status-panel span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f5e6ff;
            color: #6A0DAD;
            font-size: 1.15rem;
        }

        .note {
            font-size: 0.95rem;
            color: #555;
            margin-top: 0.5rem;
        }

        footer {
            text-align: center;
            padding: 1.5rem 1rem;
            background: linear-gradient(135deg, #4B0082 0%, #5E35B1 100%);
            color: #fff;
        }

        @media (max-width: 600px) {
            nav {
                padding: 1rem;
            }

            .card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>General Health Consultation</h1>
    <p>Submit your details and symptoms; our team will reach out with general health guidance.</p>
</header>

<nav>
    <a href="services.php">Back to Services</a>


    <a href="messages.php">Submissions</a>
</nav>

<main>
    <div class="card animated-card">
        <h2>Request a General Health Consultation</h2>

        <div class="status-panel">
            <span>💬</span>
            <div>
                <strong>Fast response tip:</strong> Select both email and phone for the quickest follow-up from our team.
            </div>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success">Thank you! Your consultation request has been submitted. We will get back to you shortly.</div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <form action="process_contact.php" method="POST" novalidate>
            <input type="hidden" name="subject" value="General Health Consultation">

            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" id="name" name="name" placeholder="Priya Patel" required aria-required="true">
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required aria-required="true">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="+91 98765 43210" pattern="[0-9\-\+\(\)\s]*">
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" min="0" max="120" placeholder="e.g. 34">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="">Select</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                    <option value="non_binary">Non-binary</option>
                    <option value="prefer_not_to_say">Prefer not to say</option>
                </select>
            </div>

            <div class="form-group">
                <label for="symptoms">Symptoms / Health Concerns *</label>
                <textarea id="symptoms" name="message" placeholder="Please describe your symptoms or health concerns in detail" required aria-required="true"></textarea>
            </div>

            <div class="form-group">
                <label for="duration">How Long Have You Had These Symptoms?</label>
                <input type="text" id="duration" name="duration" placeholder="e.g. 3 days, 2 weeks">
            </div>

            <div class="form-group">
                <label for="conditions">Existing Medical Conditions (if any)</label>
                <input type="text" id="conditions" name="conditions" placeholder="e.g. hypertension, diabetes">
            </div>

            <div class="form-group">
                <label for="medications">Current Medications (if any)</label>
                <input type="text" id="medications" name="medications" placeholder="e.g. metformin, ibuprofen">
            </div>

            <div class="form-group">
                <label for="allergies">Allergies (if any)</label>
                <input type="text" id="allergies" name="allergies" placeholder="e.g. penicillin, peanuts">
            </div>

            <div class="form-group">
                <label for="preferred_contact">Preferred Contact Method</label>
                <select id="preferred_contact" name="preferred_contact">
                    <option value="email">Email</option>
                    <option value="phone">Phone</option>
                    <option value="both">Both</option>
                </select>
            </div>

            <button type="submit" class="btn">Submit Consultation Request</button>
            <p class="note">⚠️ This platform provides general guidance only. For emergencies or serious conditions, contact a licensed healthcare provider immediately.</p>
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2026 Healthcare Advisory System. All rights reserved.</p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var messageField = document.getElementById('symptoms');
        var preferredContact = document.getElementById('preferred_contact');

        if (messageField) {
            var counter = document.createElement('div');
            counter.style.marginTop = '0.5rem';
            counter.style.fontSize = '0.95rem';
            counter.style.color = '#4B0082';
            counter.textContent = '0 / 500 characters';
            messageField.parentNode.appendChild(counter);

            messageField.addEventListener('input', function() {
                var length = messageField.value.length;
                counter.textContent = length + ' / 500 characters';
                if (length > 500) {
                    counter.style.color = '#d12c2c';
                    messageField.style.borderColor = '#d12c2c';
                } else {
                    counter.style.color = '#4B0082';
                    messageField.style.borderColor = '';
                }
            });
        }

        if (preferredContact) {
            preferredContact.addEventListener('change', function() {
                var tip = document.querySelector('.status-panel div');
                if (!tip) return;
                if (preferredContact.value === 'both') {
                    tip.textContent = 'Great choice! We will use email and phone for the fastest follow-up.';
                } else if (preferredContact.value === 'phone') {
                    tip.textContent = 'Phone selected — make sure your number is entered correctly for faster contact.';
                } else {
                    tip.textContent = 'Email selected — we will reply to you through your email address.';
                }
            });
        }
    });
</script>

</body>
</html>
