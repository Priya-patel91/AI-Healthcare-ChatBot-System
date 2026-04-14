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

    <meta name="description" content="Healthcare Advisory Platform - Get professional health guidance and medical information">
    <meta name="keywords" content="healthcare, medical advice, health guidance, wellness">
    <meta name="author" content="Healthcare Advisory Team">
    <meta name="theme-color" content="#6A0DAD">

    <title>Healthcare Advisory Platform</title>
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

        .clickable {
            cursor: pointer;
            transition: opacity 0.2s ease;
        }

        .clickable:hover {
            opacity: 0.9;
        }

        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            color: #4B0082;
            padding: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
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
            color: #6A0DAD;
        }

        header .logo::before {
            content: "🏥";
            font-size: 2rem;
        }

        header h1 {
            margin: 0.5rem 0 0.2rem 0;
            font-size: clamp(1.3rem, 3vw, 2rem);
            color: #4B0082;
        }

        header .tagline {
            font-size: 0.9rem;
            opacity: 0.8;
            color: #666;
        }

        main {
            padding-top: 120px;
            min-height: calc(100vh - 200px);
        }

        .hero {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.9) 100%);
            backdrop-filter: blur(10px);
            color: #4B0082;
            padding: 6rem 2rem 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(106, 13, 173, 0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translate(-50%, -50%) rotate(0deg); }
            50% { transform: translate(-50%, -50%) rotate(180deg); }
        }

        .hero h2 {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            margin-bottom: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #6A0DAD 0%, #4B0082 50%, #FF6B6B 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            z-index: 2;
        }

        .hero p {
            font-size: clamp(1.2rem, 2.5vw, 1.8rem);
            margin-bottom: 3rem;
            opacity: 0.9;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
            position: relative;
            z-index: 2;
        }

        .cta-buttons {
            display: flex;
            gap: 2rem;
            justify-content: center;
            flex-wrap: wrap;
            position: relative;
            z-index: 2;
        }

        .btn {
            padding: 1.2rem 3rem;
            border: none;
            border-radius: 50px;
            font-size: 1.3rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s ease;
            text-decoration: none;
            display: inline-block;
            min-width: 220px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
            color: white;
            transform: translateY(0);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #FF5252 0%, #FF7043 100%);
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(255, 107, 107, 0.4);
        }

        footer {
            background: linear-gradient(135deg, #4B0082 0%, #6A0DAD 100%);
            color: white;
            text-align: center;
            padding: 3rem 1rem;
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF6B6B, #FF8E53, #667eea, #764ba2);
        }

        footer p {
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 4rem 1rem 3rem;
            }

            .hero h2 {
                font-size: 2.5rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }

            .btn {
                min-width: 250px;
            }
        }

        .text-bold {
            font-weight: bold;
        }

        .mt-1 { margin-top: 1rem; }
        .mt-2 { margin-top: 2rem; }
        .mb-1 { margin-bottom: 1rem; }
        .mb-2 { margin-bottom: 2rem; }
        .p-1 { padding: 1rem; }
    </style>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <div>
                    <h1>Healthcare Advisory</h1>
                    <div class="tagline">Your Health, Our Priority</div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <h2>Welcome to Your Healthcare Advisory Platform</h2>
            <p>Get professional health guidance, medical information, and wellness advice from our expert advisory system powered by advanced AI technology</p>
            <div class="cta-buttons">
                <a href="index.php" class="btn btn-primary">Explore this website</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Healthcare Advisory System. All rights reserved.</p>
        <p>We provide comprehensive healthcare advisory services powered by advanced AI technology combined with medical expertise to support your health journey.</p>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>