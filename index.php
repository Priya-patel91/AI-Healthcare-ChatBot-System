<?php
    session_start();
    date_default_timezone_set('UTC');

    // Ensure only authenticated users can reach this page directly.
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
    
    

    <meta name="description" content="Professional Healthcare Advisory System - Get expert health guidance, medical tips, and wellness advice from our AI-powered healthcare platform.">
    <meta name="keywords" content="healthcare, medical advice, health tips, wellness, doctor consultation, health advisory">
    <meta name="author" content="Healthcare Advisory Team">
    <meta name="theme-color" content="#6A0DAD">
    
    
    <!-- Title -->
    <title>Healthcare Advisory System - Your Comprehensive Health Guide</title>
    <style>
        body {
            background: linear-gradient(135deg, #f5f3ff 0%, #dbeafe 45%, #fff7ed 100%);
            min-height: 100vh;
        }

        .clickable {
            cursor: pointer;
            transition: opacity 0.2s ease;
        }

        .clickable:hover {
            opacity: 0.9;
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
            position: relative;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 0.75rem 1.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        nav a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
            z-index: -1;
        }

        nav a:hover::before {
            left: 100%;
        }

        nav a:hover {
            background: rgba(10, 147, 150, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(10, 147, 150, 0.3);
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 3px;
            background: #FFD700;
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        nav .nav-icon {
            font-size: 1.2rem;
            display: inline-block;
            animation: navIconFloat 2s ease-in-out infinite;
        }

        @keyframes navIconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }

        nav a:hover .nav-icon {
            animation: navIconBounce 0.6s ease;
        }

        @keyframes navIconBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .logout-btn {
            position: fixed;
            top: 1rem;
            right: 1.5rem;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
            color: white;
            text-decoration: none;
            border-radius: 999px;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .logout-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 12px 30px rgba(255, 107, 107, 0.4);
        }

        .logout-btn .logout-icon {
            font-size: 1.2rem;
            animation: logoutPulse 2s ease-in-out infinite;
        }

        @keyframes logoutPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15); }
        }

        .logout-btn:hover .logout-icon {
            animation: logoutSpin 0.6s ease;
        }

        @keyframes logoutSpin {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(-10deg) scale(1.2); }
            100% { transform: rotate(0deg) scale(1); }
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
            margin-bottom: 3rem;
            box-shadow: 0 8px 16px rgba(10, 147, 150, 0.2);
            position: relative;
            overflow: hidden;
            animation: heroFadeInScale 0.8s ease;
        }

        @keyframes heroFadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: heroGlow 6s ease-in-out infinite;
        }

        @keyframes heroGlow {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-50px, 50px) scale(1.2); }
        }

        .hero h2 {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            margin-bottom: 1rem;
            animation: heroTextSlideIn 0.6s ease 0.2s backwards;
        }

        @keyframes heroTextSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero p {
            font-size: clamp(1rem, 2vw, 1.2rem);
            margin-bottom: 2rem;
            opacity: 0.95;
            animation: heroTextSlideIn 0.6s ease 0.3s backwards;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: heroTextSlideIn 0.6s ease 0.4s backwards;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
            z-index: 0;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn > * {
            position: relative;
            z-index: 1;
        }

        .btn-primary {
            background: #FFC107;
            color: white;
        }

        .btn-primary:hover {
            background: #FFB300;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 180, 216, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #4B0082;
            border: 2px solid #4B0082;
        }

        .btn-secondary:hover {
            background: #fff8e1;
            transform: translateY(-3px);
        }

       
        section {
            margin-bottom: 3rem;
        }

        section h2 {
            color: #4B0082;
            font-size: clamp(1.5rem, 3vw, 2.2rem);
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid #6A0DAD;
            display: inline-block;
            position: relative;
            animation: headingSlideIn 0.6s ease;
        }

        @keyframes headingSlideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        section h2::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 3px;
            background: #FFD700;
            transition: width 0.5s ease;
        }

        section:hover h2::after {
            width: 100%;
        }

        section h3 {
            color: #6A0DAD;
            font-size: 1.3rem;
            margin-top: 1.5rem;
            margin-bottom: 0.8rem;
        }

        
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 4px solid #6A0DAD;
            animation: cardFadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        @keyframes cardFadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .cards-grid .card:nth-child(1) { animation-delay: 0.1s; }
        .cards-grid .card:nth-child(2) { animation-delay: 0.2s; }
        .cards-grid .card:nth-child(3) { animation-delay: 0.3s; }
        .cards-grid .card:nth-child(4) { animation-delay: 0.4s; }
        .cards-grid .card:nth-child(5) { animation-delay: 0.5s; }
        .cards-grid .card:nth-child(6) { animation-delay: 0.6s; }

        .card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            display: inline-block;
            animation: iconFloat 3s ease-in-out infinite;
        }

        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .card:hover .card-icon {
            animation: iconBounce 0.6s ease;
        }

        @keyframes iconBounce {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-12px) scale(1.2); }
        }

        .card h4 {
            color: #4B0082;
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
        }

        .card p {
            color: #666;
            margin-bottom: 1rem;
        }

       
        .services-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .service-box {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: serviceSlideIn 0.6s ease forwards;
            opacity: 0;
        }

        @keyframes serviceSlideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .services-container .service-box:nth-child(1) { animation-delay: 0.1s; }
        .services-container .service-box:nth-child(2) { animation-delay: 0.2s; }
        .services-container .service-box:nth-child(3) { animation-delay: 0.3s; }
        .services-container .service-box:nth-child(4) { animation-delay: 0.4s; }
        .services-container .service-box:nth-child(5) { animation-delay: 0.5s; }
        .services-container .service-box:nth-child(6) { animation-delay: 0.6s; }

        .service-box::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(106, 13, 173, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .service-box:hover::before {
            opacity: 1;
        }

        .service-box:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 12px 30px rgba(106, 13, 173, 0.2);
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: inline-block;
            animation: serviceIconGlow 2s ease-in-out infinite;
        }

        @keyframes serviceIconGlow {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15); }
        }

        .service-box:hover .service-icon {
            animation: serviceIconRotate 0.6s ease;
        }

        @keyframes serviceIconRotate {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(20deg) scale(1.2); }
            100% { transform: rotate(0deg) scale(1.15); }
        }

        .service-box h4 {
            color: #4B0082;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }

        .tips-list {
            list-style: none;
            margin: 1.5rem 0;
        }

        .tips-list li {
            background: #fff8e1;
            padding: 1rem;
            margin-bottom: 0.8rem;
            border-left: 4px solid #6A0DAD;
            border-radius: 4px;
            transition: all 0.3s ease;
            animation: tipSlideIn 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes tipSlideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .tips-list li:nth-child(1) { animation-delay: 0.1s; }
        .tips-list li:nth-child(2) { animation-delay: 0.2s; }
        .tips-list li:nth-child(3) { animation-delay: 0.3s; }
        .tips-list li:nth-child(4) { animation-delay: 0.4s; }
        .tips-list li:nth-child(5) { animation-delay: 0.5s; }
        .tips-list li:nth-child(6) { animation-delay: 0.6s; }
        .tips-list li:nth-child(7) { animation-delay: 0.7s; }
        .tips-list li:nth-child(8) { animation-delay: 0.8s; }

        .tips-list li:hover {
            background: #fff5e6;
            transform: translateX(5px) scale(1.02);
            box-shadow: 0 4px 12px rgba(106, 13, 173, 0.15);
        }

        .tips-list li::before {
            content: "✓ ";
            color: #6A0DAD;
            font-weight: bold;
            margin-right: 0.5rem;
            display: inline-block;
            animation: checkmarkPop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes checkmarkPop {
            0% { transform: scale(0); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }

        
        .faq-item {
            background: white;
            margin-bottom: 1rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            background: #fff5e6;
            padding: 1rem;
            cursor: pointer;
            font-weight: bold;
            color: #4B0082;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            user-select: none;
        }

        .faq-question:hover {
            background: #d0ebf1;
        }

        .faq-answer {
            padding: 1rem;
            display: none;
            color: #666;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

    
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .stat-box {
            background: linear-gradient(135deg, #6A0DAD 0%, #4B0082 100%);
            color: white;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            animation: statPopIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            opacity: 0;
        }

        @keyframes statPopIn {
            from {
                opacity: 0;
                transform: scale(0.5);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .stats-container .stat-box:nth-child(1) { animation-delay: 0.1s; }
        .stats-container .stat-box:nth-child(2) { animation-delay: 0.2s; }
        .stats-container .stat-box:nth-child(3) { animation-delay: 0.3s; }
        .stats-container .stat-box:nth-child(4) { animation-delay: 0.4s; }

        .stat-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .stat-box:hover::before {
            left: 100%;
        }

        .stat-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: inline-block;
            animation: numberCount 2s ease-out;
        }

        @keyframes numberCount {
            from {
                opacity: 0;
                transform: scale(0);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .stat-box:hover .stat-number {
            animation: numberPulse 0.6s ease;
        }

        @keyframes numberPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        
        .emergency-alert {
            background: #ffe5e5;
            border-left: 4px solid #d32f2f;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 2rem 0;
        }

        .emergency-alert h3 {
            color: #d32f2f;
            margin-top: 0;
        }

        
        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4B0082;
        }

        input, textarea, select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #6A0DAD;
            box-shadow: 0 0 8px rgba(106, 13, 173, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .contact-form {
            max-width: 600px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
        }

        
        .disclaimer {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 2rem 0;
            font-size: 0.95rem;
            color: #856404;
        }

        .disclaimer h4 {
            color: #856404;
            margin-top: 0;
        }

        
        @media (max-width: 768px) {
            header .header-container {
                justify-content: center;
                text-align: center;
            }

            nav {
                flex-direction: column;
                gap: 0.5rem;
            }

            nav a {
                width: 100%;
                text-align: center;
                justify-content: center;
            }

            .logout-btn {
                position: fixed;
                top: 1rem;
                right: 1rem;
                padding: 0.7rem 1rem;
                font-size: 0.9rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .hero {
                padding: 2rem 1rem;
            }

            section h2 {
                font-size: 1.5rem;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .services-container {
                grid-template-columns: 1fr;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .contact-form {
                padding: 1.5rem;
            }

            footer .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            footer a {
                color: white;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.3rem;
            }

            .hero h2 {
                font-size: 1.5rem;
            }

            .hero p {
                font-size: 0.95rem;
            }

            section h3 {
                font-size: 1.1rem;
            }

            main {
                padding: 1rem 0.5rem;
            }

            .card, .service-box {
                padding: 1rem;
            }

            input, textarea, select {
                padding: 0.6rem;
                font-size: 1rem;
            }

            .logout-btn {
                padding: 0.6rem 0.8rem;
                font-size: 0.85rem;
            }

            nav a {
                padding: 0.6rem 0.8rem;
                font-size: 0.9rem;
            }
        }

       
        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

        .highlight {
            background: #fff4e6;
            padding: 0.2rem 0.4rem;
            border-radius: 3px;
            color: #d35400;
        }

        .mt-1 { margin-top: 1rem; }
        .mt-2 { margin-top: 2rem; }
        .mb-1 { margin-bottom: 1rem; }
        .mb-2 { margin-bottom: 2rem; }
        .p-1 { padding: 1rem; }
        
    </style>
</head>

<body>

<header role="banner">
    <div class="header-container">
        <div class="logo">
            <div>
                <h1>Healthcare Advisory</h1>
                <p class="tagline">Your Trusted Health Partner</p>
            </div>
        </div>
    </div>
</header>

<nav role="navigation" aria-label="Main Navigation">
    <a href="#home" title="Home"><span class="nav-icon">🏠</span> Home</a>
    <a href="chatbot.php" title="Chatbot"><span class="nav-icon">🤖</span> Chatbot</a>
    <a href="services.php" title="Services"><span class="nav-icon">⚕️</span> Services</a>
    <a href="health_tips.php" title="Health Tips"><span class="nav-icon">💡</span> Health Tips</a>
    <a href="emergency.php" title="Emergency"><span class="nav-icon">🚨</span> Emergency</a>
    <a href="faq.php" title="FAQ"><span class="nav-icon">❓</span> FAQ</a>
    <a href="contact.php" title="Contact"><span class="nav-icon">📧</span> Contact</a>
</nav>

<?php if (!empty($_SESSION['user'])): ?>
    <a href="logout.php" class="logout-btn" title="Logout">
        <span class="logout-icon">🚪</span>
        Logout (<?php echo htmlspecialchars($_SESSION['user']['username']); ?>)
    </a>
<?php else: ?>
    <a href="login.php" class="logout-btn" title="Login">
        <span class="logout-icon">🔐</span>
        Login
    </a>
<?php endif; ?>

<main role="main">

    
    <section class="hero" id="home">
        <h2 style="color: white;">Welcome to Your Healthcare Advisory Platform</h2>
        <p>Get professional health guidance, medical information, and wellness advice from our expert advisory system</p>
        <div class="cta-buttons">
            <a href="services.php" class="btn btn-primary">Explore Services</a>
            <a href="contact.php" class="btn btn-secondary">Get In Touch</a>
        </div>
    </section>

    
    <section id="stats">
        <h2>Why Choose Our Healthcare Advisory</h2>
        <div class="stats-container">
            <div class="stat-box">
                <div class="stat-number">98%</div>
                <div class="stat-label">Patient Satisfaction</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">15K+</div>
                <div class="stat-label">Happy Patients</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">50+</div>
                <div class="stat-label">Health Experts</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support Available</div>
            </div>
        </div>
    </section>

    <!-- <section id="services">
        <h2>Our Healthcare Services</h2>
        <p>Comprehensive healthcare advisory covering multiple health domains</p>
        
        <div class="services-container">
            <div class="service-box">
                <div class="service-icon">🏥</div>
                <h4>General Health Consultation</h4>
                <p>Get advice on common health issues, symptoms, and general wellness. Our advisory system provides initial guidance for various health concerns and conditions.</p>
                <a href="General%20Health%20Consultation.php" class="btn btn-secondary" style="margin-top: 0.75rem;">Start a Consultation</a>
            </div>
           
            <div class="service-box">
                <div class="service-icon">🧬</div>
                <h4>Disease Prevention</h4>
                <p>Learn about preventive measures for common diseases. We provide information on vaccinations, screening, and lifestyle modifications to maintain optimal health.</p>
                <a href="Disease%20Prevention.php" class="btn btn-secondary" style="margin-top: 0.75rem;">Learn More</a>
            </div>
            <div class="service-box">
                <div class="service-icon">🏃</div>
                <h4>Fitness & Wellness</h4>
                <p>Personalized fitness recommendations, exercise routines, and wellness programs designed for your lifestyle and health goals.</p>
                <a href="Fitness%20%26%20Wellness.php" class="btn btn-secondary" style="margin-top: 0.75rem;">Learn More</a>
            </div>
            <div class="service-box">
                <div class="service-icon">🍎</div>
                <h4>Nutrition Guidance</h4>
                <p>Expert nutritional advice, diet plans, and dietary recommendations tailored to your health condition and dietary preferences.</p>
                <a href="Nutrition%20Guidance.php" class="btn btn-secondary" style="margin-top: 0.75rem;">Learn More</a>
            </div>
            <div class="service-box">
                <div class="service-icon">🧘</div>
                <h4>Mental Health Support</h4>
                <p>Resources and guidance on mental wellbeing, stress management, anxiety reduction, and emotional health support.</p>
                <a href="Mental_Support.php" class="btn btn-secondary" style="margin-top: 0.75rem;">Learn More</a>
            </div>
            <div class="service-box">
                <div class="service-icon">💊</div>
                <h4>Medication Information</h4>
                <p>Detailed information about medications, INDIAge guidelines, potential side effects, and drug interaction awareness.</p>
                <a href="Medication_Information.php" class="btn btn-secondary" style="margin-top: 0.75rem;">Learn More</a>
            </div>
            
        </div>
    </section> -->


    <!-- <section id="health-tips">
        <h2>Daily Health Tips & Recommendations</h2>
        
        <h3>Essential Health Tips</h3>
        <ul class="tips-list">
            <li><span class="text-bold">Stay Hydrated</span> - Drink at least 8 glasses of water daily to maintain proper bodily functions and energy levels</li>
            <li><span class="text-bold">Regular Exercise</span> - Aim for 150 minutes of moderate-intensity exercise per week for optimal cardiovascular health</li>
            <li><span class="text-bold">Balanced Diet</span> - Include fruits, vegetables, whole grains, and lean proteins in your daily meals</li>
            <li><span class="text-bold">Quality Sleep</span> - Get 7-9 hours of sleep per night to support immune function and mental health</li>
            <li><span class="text-bold">Stress Management</span> - Practice meditation, yoga, or deep breathing exercises daily</li>
            <li><span class="text-bold">Regular Checkups</span> - Schedule annual health screenings and preventive care visits</li>
            <li><span class="text-bold">Limit Harmful Substances</span> - Reduce caffeine, alcohol, and avoid tobacco products</li>
            <li><span class="text-bold">Hand Hygiene</span> - Wash hands regularly to prevent the spread of infectious diseases</li>
        </ul> -->

        <h3>Age-Specific Healthcare Recommendations</h3>
        <div class="cards-grid">
            <div class="card clickable" data-file="Infants%20(0-12%20months).php">
                <div class="card-icon">👶</div>
                <h4>Infants (0-12 months)</h4>
                <p>Exclusive breastfeeding recommended, immunity building through vaccinations, regular pediatric checkups mandatory, and safe sleeping practices essential.</p>
            </div>
            <div class="card clickable" data-file="Children%20(1-12%20years).php">
                <div class="card-icon">👧</div>
                <h4>Children (1-12 years)</h4>
                <p>Nutritious diet for growth, outdoor physical activities, immunization updates, dental care, and regular vision/hearing tests.</p>
            </div>
            <div class="card clickable" data-file="Adolescents%20(13-19%20years).php">
                <div class="card-icon">👨</div>
                <h4>Adolescents (13-19 years)</h4>
                <p>Physical activity, healthy diet, mental health awareness, sexual health education, and regular medical checkups.</p>
            </div>
            <div class="card clickable" data-file="Adults%20(20-40%20years).php">
                <div class="card-icon">👨‍💼</div>
                <h4>Adults (20-40 years)</h4>
                <p>Regular exercise, stress management, preventive screenings, dietary balance, healthy lifestyle choices, and occupational health awareness.</p>
            </div>
            <div class="card clickable" data-file="Middle-Aged%20(41-60%20years).php">
                <div class="card-icon">👴</div>
                <h4>Middle-Aged (41-60 years)</h4>
                <p>Chronic disease prevention, regular health screenings, cardiovascular checkups, bone density tests, and weight management.</p>
            </div>
            <div class="card clickable" data-file="Seniors%20(60%2B%20years).php">
                <div class="card-icon">👵</div>
                <h4>Seniors (60+ years)</h4>
                <p>Fall prevention, medication management, cognitive health monitoring, mobility enhancement, and regular health evaluations.</p>
            </div>
        </div>
    </section>


    <section>
        <h2>Common Health Conditions - Information & Guidance</h2>
        
        <div class="cards-grid">
            <div class="card clickable" data-file="heart_diseases.php">
                <div class="card-icon">❤️</div>
                <h4>Heart Diseases</h4>
                <p>Comprehensive information on heart conditions, symptoms, risk factors, prevention, and treatment options for cardiovascular health.</p>
            </div>
            <div class="card clickable" data-file="diabetes.php">
                <div class="card-icon">🍬</div>
                <h4>Diabetes</h4>
                <p>Monitor blood sugar levels, follow a diabetic diet, stay active, take medications as prescribed, and attend regular checkups.</p>
            </div>
            <div class="card clickable" data-file="respiratory_conditions.php">
                <div class="card-icon">🫁</div>
                <h4>Respiratory Conditions</h4>
                <p>Avoid allergens and pollutants, use prescribed inhalers, maintain air quality, and prevent respiratory infections through vaccination.</p>
            </div>
            <div class="card clickable" data-file="mental_health.php">
                <div class="card-icon">🧠</div>
                <h4>Mental Health</h4>
                <p>Seek professional help when needed, practice mindfulness, maintain social connections, exercise regularly, and manage stress effectively.</p>
            </div>
            <div class="card clickable" data-file="obesity.php">
                <div class="card-icon">⚖️</div>
                <h4>Obesity</h4>
                <p>Create a calorie deficit through diet and exercise, seek nutritional counseling, set realistic goals, and monitor progress regularly.</p>
            </div>
            <div class="card clickable" data-file="arthritis.php">
                <div class="card-icon">🦴</div>
                <h4>Arthritis</h4>
                <p>Maintain healthy weight, stay active, use heat/ice therapy, take anti-inflammatory medications, and consider physical therapy.</p>
            </div>
        </div>
    </section>

   
    <!-- <section id="emergency">
        <h2>Health Emergencies - When to Seek Immediate Help</h2>
        <div class="emergency-alert">
            <h3>⚠️ Call Emergency Services (108 in INDIA) Immediately If You Experience:</h3>
            <ul class="tips-list">
                <li>Chest pain or pressure, difficulty breathing</li>
                <li>Severe allergic reactions or difficulty breathing</li>
                <li>Signs of stroke (facial drooping, arm weakness, speech difficulty)</li>
                <li>Severe bleeding that won't stop</li>
                <li>Choking or airway obstruction</li>
                <li>Severe head, neck, or spinal injuries</li>
                <li>Poisoning or overdose</li>
                <li>Severe burns or trauma</li>
                <li>Loss of consciousness or unresponsiveness</li>
                <li>Thoughts of self-harm or suicide</li>
            </ul>
        </div> -->

        <div class="disclaimer">
            <h4>⚠️ Important Medical Disclaimer</h4>
            <p><span class="text-bold">This healthcare advisory system provides general health information for educational purposes only.</span> It is not a substitute for professional medical advice, diagnosis, or treatment. Always consult with a qualified healthcare provider before making any health-related decisions. Never disregard professional medical advice or delay seeking treatment based on information from this platform. In case of medical emergencies, immediately contact your local emergency services or visit the nearest hospital.</p>
        </div>
    </section>

   
    <section>
        <h2>Disease Prevention & Health Promotion</h2>
        
        <h3>Immunization Schedule</h3>
        <div class="cards-grid">
            <div class="card clickable" data-file="Childhood_Vaccines.php">
                <div class="card-icon">💉</div>
                <h4>Childhood Vaccines</h4>
                <p>MMR, DPT, Polio, Hepatitis B, Varicella, and other routine vaccines following recommended immunization schedules.</p>
            </div>
            <div class="card clickable" data-file="adult_boosters.php">
                <div class="card-icon">💉</div>
                <h4>Adult Boosters</h4>
                <p>Tdap boosters every 10 years, annual flu vaccine, and age-appropriate vaccines for pneumonia, shingles, and HPV.</p>
            </div>
            <div class="card clickable" data-file="travel_vaccines.php">
                <div class="card-icon">💉</div>
                <h4>Travel Vaccines</h4>
                <p>Yellow fever, hepatitis A/B, typhoid, and malaria prevention for travelers visiting high-risk regions.</p>
            </div>
        </div>

        <h3>Health Screening Recommendations</h3>
        <ul class="tips-list">
            <li><span class="text-bold">Blood Pressure:</span> Check annually, or monthly for those with hypertension</li>
            <li><span class="text-bold">Cholesterol:</span> Screen every 4-6 years starting at age 20, annually if elevated</li>
            <li><span class="text-bold">Blood Sugar:</span> Fast glucose test at age 45, annually if overweight or family history</li>
            <li><span class="text-bold">Cancer Screening:</span> Mammography (women 45+), Colonoscopy (50+), Pap smear (21-65)</li>
            <li><span class="text-bold">Vision & Hearing:</span> Annual eye exams and hearing tests as recommended by age</li>
            <li><span class="text-bold">Bone Density:</span> DEXA scan recommended for post-menopausal women and men 70+</li>
        </ul>
    </section>

   
    <!-- <section id="faq">
        <h2>Frequently Asked Questions</h2>
        
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
                No. For any emergency situation, immediately call your local emergency services (108 in the INDIA) or visit the nearest hospital. This platform is for non-emergency health information only.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>Is my health information kept confidential?</span>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                Yes, we take data privacy seriously. Any information you provide is encrypted and protected. Review our privacy policy for detailed information on how your data is handled and secured.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>How often should I update my health information?</span>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                Update your health information whenever there are significant changes to your medical history, medications, or health status. Regular updates ensure more accurate and relevant health advisory.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>Can I consult with a real doctor through this platform?</span>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                This platform provides general health information and advisory. For professional medical diagnosis and treatment, please consult with licensed healthcare providers in your area.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>What should I do if I have adverse side effects from medications?</span>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                Contact your healthcare provider immediately or visit an emergency department if the side effects are severe. Report all serious adverse effects to your doctor or pharmacist.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>Is the health information on this platform updated regularly?</span>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                Yes, our health information is regularly updated based on the latest medical research, guidelines, and healthcare standards to ensure accuracy and relevance.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>How can I provide feedback about my experience?</span>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                We welcome your feedback! Please use our contact form or reach out through the email provided in the contact section. Your input helps us improve our services.
            </div>
        </div>
    </section>

    
    <section id="contact"> -->
        <!-- <h2>Get In Touch With Us</h2>
        <p class="text-center">Have questions or need assistance? Contact our healthcare advisory team</p>
        
        <div class="contact-form">
            <form action="process_contact.php" method="POST" novalidate>
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
                </div> -->

                <!-- <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" placeholder="Please describe your inquiry in detail" required aria-required="true"></textarea>
                </div>

                <div class="form-group">
                    <label for="preferred_contact">Preferred Contact Method</label>
                    <select id="preferred_contact" name="preferred_contact">
                        <option value="email">Email</option>
                        <option value="phone">Phone</option>
                        <option value="both">Both</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
            </form>
        </div> -->

        <h3>Other Ways to Reach Us</h3>
        <div class="cards-grid">
            <div class="card">
                <div class="card-icon">📧</div>
                <h4>Email</h4>
                <p><a href="mailto:info@healthcareadvisory.com">info@healthcareadvisory.com</a></p>
            </div>
            <div class="card">
                <div class="card-icon">📞</div>
                <h4>Phone</h4>
                <p><a href="tel:+919106775271">+91 9106775271</a></p>
            </div>
            <div class="card">
                <div class="card-icon">📍</div>
                <h4>Address</h4>
                <p>Healthcare Advisory Center<br>123 Medical Lane<br>Healthcare City, Chandigarh </p>
            </div>
        </div>
    </section>

</main>


     <!-- FOOTER -->

<footer role="contentinfo">
    <div class="footer-content">
        <div>
            <h4>About Us</h4>
            <p>We provide comprehensive healthcare advisory services powered by advanced AI technology combined with medical expertise to support your health journey.</p>
        </div>
        <div>
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="health_tips.php">Health Tips</a></li>
                <li><a href="emergency.php">Emergency</a></li>
                <li><a href="faq.php">FAQ</a></li>
            </ul>
        </div>
        <div>
            <h4>Healthcare Resources</h4>
            <ul>
                <li><a href="#" title="Blog Articles">Blog Articles</a></li>
                <li><a href="#" title="Health Tools">Health Tools</a></li>
                <li><a href="#" title="Medical News">Medical News</a></li>
                <li><a href="#" title="Wellness Tips">Wellness Tips</a></li>
            </ul>
        </div>
        <div>
            <h4>Legal</h4>
            <ul>
                <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
                <li><a href="#" title="Terms of Service">Terms of Service</a></li>
                <li><a href="#" title="Medical Disclaimer">Medical Disclaimer</a></li>
                <li><a href="#" title="Contact Us">Contact Us</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2026 Healthcare Advisory System. All rights reserved. <br>
        This platform provides general health information for educational purposes. Always consult with healthcare professionals for medical advice.</p>
    </div>
</footer>

<script>
    
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.parentElement;
            faqItem.classList.toggle('active');
        });
    });

    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

   
    document.querySelector('form')?.addEventListener('submit', function(e) {
        const name = document.getElementById('name')?.value.trim();
        const email = document.getElementById('email')?.value.trim();
        const message = document.getElementById('message')?.value.trim();

        if (!name || !email || !message) {
            e.preventDefault();
            alert('Please fill in all required fields');
        }
    });

    
    document.querySelectorAll('.card.clickable').forEach(el => {
        el.addEventListener('click', function() {
            const file = this.dataset.file;
            if (file) {
                window.location.href = file;
            }
        });
    });
</script>
<script>
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('service-worker.js');
}
</script>

</body>
</html>

