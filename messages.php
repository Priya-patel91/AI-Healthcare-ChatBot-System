<?php
include "db_connect.php";

// Fetch all contact messages (most recent first)
$result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY submitted_at DESC");
$messages = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
}

function esc($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Messages - Healthcare Advisory</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            color: #222;
            padding: 2rem;
        }
        h1 {
            margin-bottom: 1rem;
            color: #4b0082;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 16px rgba(0,0,0,0.08);
        }
        th, td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
            font-size: 0.9rem;
        }
        th {
            background: #6a0dad;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        tr:nth-child(even) {
            background: #f9fafb;
        }
        .small {
            font-size: 0.8rem;
            color: #555;
        }
        .top-links {
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        .top-links a {
            text-decoration: none;
            background: #6a0dad;
            color: white;
            padding: 0.6rem 1rem;
            border-radius: 8px;
            transition: background 0.2s ease;
        }
        .top-links a:hover {
            background: #52147d;
        }
        @media (max-width: 900px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            th {
                position: sticky;
                top: 0;
            }
            td {
                display: flex;
                justify-content: space-between;
                padding: 0.6rem 1rem;
            }
            td::before {
                content: attr(data-label);
                font-weight: 600;
                margin-right: 0.5rem;
                color: #4b0082;
            }
        }
    </style>
</head>
<body>
    <h1>Submitted Messages</h1>
    <div class="top-links">
        <a href="index.php">Back to Home</a>
        <a href="?download=csv">Download CSV</a>
    </div>

<?php if (isset($_GET['download']) && $_GET['download'] === 'csv'): ?>
    <?php
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=contact_messages.csv');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Name', 'Email', 'Phone', 'Age', 'Subject', 'Message', 'Preferred Contact', 'Submitted At']);
    foreach ($messages as $msg) {
        fputcsv($output, [
            $msg['id'],
            $msg['name'],
            $msg['email'],
            $msg['phone'],
            $msg['age'],
            $msg['subject'],
            $msg['message'],
            $msg['preferred_contact'],
            $msg['submitted_at'],
        ]);
    }
    fclose($output);
    exit;
    ?>
<?php endif; ?>

<?php if (empty($messages)): ?>
    <p>No messages have been submitted yet.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Preferred</th>
                <th>Submitted</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $msg): ?>
                <tr>
                    <td data-label="ID"><?php echo esc($msg['id']); ?></td>
                    <td data-label="Name"><?php echo esc($msg['name']); ?></td>
                    <td data-label="Email"><?php echo esc($msg['email']); ?></td>
                    <td data-label="Phone"><?php echo esc($msg['phone']); ?></td>
                    <td data-label="Age"><?php echo esc($msg['age']); ?></td>
                    <td data-label="Subject"><?php echo esc($msg['subject']); ?></td>
                    <td data-label="Message"><?php echo nl2br(esc($msg['message'])); ?></td>
                    <td data-label="Preferred"><?php echo esc($msg['preferred_contact']); ?></td>
                    <td data-label="Submitted" class="small"><?php echo esc($msg['submitted_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>
