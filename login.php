<?php
session_start();

// If the user is already logged in, send them to the homepage
if (!empty($_SESSION['user'])) {
    header('Location: home.php', true, 302);
    exit;
}

require_once __DIR__ . '/db_connect.php';

// Ensure users table exists
$createUsersSql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if (!mysqli_query($conn, $createUsersSql)) {
    die('Failed to create users table: ' . mysqli_error($conn));
}

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'login';

    if ($action === 'register') {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if ($username === '' || $email === '' || $password === '' || $confirm === '') {
            $errors[] = 'All registration fields are required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid e-mail address.';
        } elseif ($password !== $confirm) {
            $errors[] = 'Passwords do not match.';
        } elseif (strlen($password) < 6) {
            $errors[] = 'Password needs to be at least 6 characters.';
        }

        if (empty($errors)) {
            $stmt = mysqli_prepare($conn, 'SELECT id FROM users WHERE username=? OR email=? LIMIT 5');
            mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                $errors[] = 'Username or e-mail already exists.';
            }
            mysqli_stmt_close($stmt);
        }

        if (empty($errors)) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($conn, 'INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)');
            mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $passwordHash);
            if (mysqli_stmt_execute($stmt)) {
                $success = 'Registration successful. You can now log in.';
                $username = $email = '';
            } else {
                $errors[] = 'Could not register account: ' . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username === '' || $password === '') {
            $errors[] = 'Enter both username and password.';
        }

        if (empty($errors)) {
            $stmt = mysqli_prepare($conn, 'SELECT id, username, password_hash FROM users WHERE username=? LIMIT 1');
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $userId, $userName, $passwordHash);

            if (mysqli_stmt_fetch($stmt)) {
                if ($passwordHash === null) {
                    $errors[] = 'Invalid username or password.';
                } else {
                    if (password_verify($password, $passwordHash)) {
                        $_SESSION['user'] = [
                            'id' => $userId,
                            'username' => $userName,
                        ];
                        mysqli_stmt_close($stmt);
                        header('Location: home.php');
                        exit;
                    } else {
                        $errors[] = 'Invalid username or password.';
                    }        
                }
            } else {
                $errors[] = 'Invalid username or password.';
            }
            mysqli_stmt_close($stmt);
        }
    }
}

// Default demo account for initial access
$stubDemoAccount = 'Use "testuser" / "Test@123" after first registration if needed.';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Healthcare Advisory System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('https://img.freepik.com/free-vector/shiny-cardiograph-health-care-background-design_1017-50524.jpg?semt=ais_hybrid&w=740&q=80');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: min(520px, 95vw);
            background: #ffffff;
            border: 3px solid #008cba;
            border-radius: 16px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.22);
            padding: 2rem;
        }

        h1,
        h2 {
            margin: 0 0 1rem;
            color: #036b9b;
        }

        .tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .tab {
            text-align: center;
            padding: 0.88rem 0;
            border-radius: 8px;
            cursor: pointer;
            user-select: none;
            border: 1px solid #b6d7eb;
            background: #f1f8ff;
            color: #054f7f;
            font-weight: 600;
        }

        .tab.active {
            background: #00a6c7;
            color: #fff;
            border-color: #00a6c7;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 700;
            color: #036b9b;
        }

        .form-group input {
            width: 100%;
            padding: 0.7rem 0.8rem;
            border: 1px solid #a3cfe0;
            border-radius: 8px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        .form-group input:focus {
            border-color: #008cba;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 140, 186, 0.18);
        }

        .btn {
            width: 100%;
            padding: 0.78rem;
            border: none;
            border-radius: 10px;
            background: #008cba;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 140, 186, 0.3);
        }

        .btn:hover {
            background: #006a92;
        }

        .message {
            margin-bottom: 1rem;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            font-weight: 600;
        }

        .error {
            background: #ffd6dc;
            border: 1px solid #f08a95;
            color: #b91f34;
        }

        .success {
            background: #d8f5e4;
            border: 1px solid #8ccf9a;
            color: #1b6e44;
        }

        .small {
            font-size: 0.92rem;
            color: #2e586b;
            margin-top: 0.75rem;
        }
    </style>
    <script>
        function switchTabs(mode) {
            document.getElementById('loginForm').style.display = mode === 'login' ? 'block' : 'none';
            document.getElementById('registerForm').style.display = mode === 'register' ? 'block' : 'none';
            document.getElementById('tabLogin').classList.toggle('active', mode === 'login');
            document.getElementById('tabRegister').classList.toggle('active', mode === 'register');
        }
        window.addEventListener('DOMContentLoaded', function() {
            switchTabs('login');
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Healthcare Advisory Login</h1>

        <?php if (!empty($errors)): ?>
            <div class="message error"><?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?></div>
        <?php endif; ?>

        <?php if ($success !== ''): ?>
            <div class="message success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>

        <div class="tabs">
            <div id="tabLogin" class="tab active" onclick="switchTabs('login')">Login</div>
            <div id="tabRegister" class="tab" onclick="switchTabs('register')">Register</div>
        </div>

        <form id="loginForm" method="post" style="display:none;">
            <input type="hidden" name="action" value="login" />
            <div class="form-group">
                <label for="login-username">Username</label>
                <input type="text" id="login-username" name="username" required value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" />
            </div>
            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" required />
            </div>
            <button type="submit" class="btn">Login</button>
        </form>

        <form id="registerForm" method="post" style="display:none;">
            <input type="hidden" name="action" value="register" />
            <div class="form-group">
                <label for="reg-username">Username</label>
                <input type="text" id="reg-username" name="username" required />
            </div>
            <div class="form-group">
                <label for="reg-email">E-mail</label>
                <input type="email" id="reg-email" name="email" required />
            </div>
            <div class="form-group">
                <label for="reg-password">Password</label>
                <input type="password" id="reg-password" name="password" required />
            </div>
            <div class="form-group">
                <label for="reg-confirm">Confirm Password</label>
                <input type="password" id="reg-confirm" name="confirm_password" required />
            </div>
            <button type="submit" class="btn">Register</button>
        </form>

        <p class="small">Need quick start after registration? <?php echo htmlspecialchars($stubDemoAccount); ?></p>
    </div>
</body>

</html>