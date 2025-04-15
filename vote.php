<?php include 'includes/config.php'; include 'includes/header.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$candidates = readJSON('data/candidates.json');
$votes = readJSON('data/votes.json');
$alreadyVoted = false;

foreach ($votes as $v) {
    if ($v['email'] === $_SESSION['user']) {
        $alreadyVoted = true;
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$alreadyVoted) {
    $votes[] = [
        'email' => $_SESSION['user'],
        'candidate_id' => (int)$_POST['candidate']
    ];
    writeJSON('data/votes.json', $votes);
    header("Location: vote-succes.php");
    exit();
}
?>
<?php
// Make sure necessary logic and data is loaded before HTML


// Example logic (optional - place as per your setup)
$alreadyVoted = false; // Replace with actual logic
$candidates = [
    ['id' => 1, 'name' => 'Candidate A'],
    ['id' => 2, 'name' => 'Candidate B']
]; // Replace with real candidate data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Successful</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .page-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: linear-gradient(135deg, #a8edea, #fed6e3);
        }

        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .success-box {
            background-color: #ffffffdd;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeInUp 1s ease-out;
        }

        .success-box h2 {
            color: #28a745;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .success-box p {
            color: #555;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .success-box a {
            text-decoration: none;
            background-color: #28a745;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .success-box a:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .emoji {
            font-size: 48px;
            animation: bounce 1.2s infinite;
            margin-bottom: 15px;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="content">
            <div class="success-box">
                <div class="emoji">🎉</div>
                <h2>Thank You for Voting!</h2>
                <p>Your vote has been successfully recorded.</p>
                <a href="results.php">View Results</a>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
</body>
</html>
