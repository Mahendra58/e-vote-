<?php 
    include 'includes/config.php'; 
    include 'includes/auth.php'; 
    requireLogin(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-xl fade-in">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">Welcome, <?= htmlspecialchars($_SESSION['user']) ?> 🎉</h2>
        
        <p class="text-lg text-gray-600 mb-8 text-center">Please select your candidate and cast your vote:</p>

        <form method="POST" action="vote.php">
            <div class="grid gap-4 sm:grid-cols-2">
                <?php
                $candidates = readJSON("data/candidates.json");
                foreach ($candidates as $candidate): ?>
                    <label class="flex items-center p-5 border-2 border-gray-300 rounded-xl hover:border-blue-600 hover:shadow-lg cursor-pointer transition-all duration-300 transform hover:scale-105">
                        <input 
                            type="radio" 
                            name="candidate" 
                            value="<?= htmlspecialchars($candidate['id']) ?>" 
                            class="form-radio text-blue-600 mr-4" 
                            required
                        >
                        <div>
                            <p class="font-semibold text-xl text-gray-800"><?= htmlspecialchars($candidate['name']) ?></p>
                            <p class="text-sm text-gray-500"><?= htmlspecialchars($candidate['description'] ?? 'No description provided.') ?></p>
                        </div>
                    </label>
                <?php endforeach; ?>
            </div>

            <button 
                type="submit" 
                class="mt-6 w-full sm:w-auto bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white px-6 py-3 rounded-md font-semibold transition-colors duration-300"
            >
                Submit Vote
            </button>
        </form>

        <div class="mt-6 flex flex-col sm:flex-row gap-4 text-sm text-center">
            <a href="results.php" class="text-blue-700 hover:text-blue-900 hover:underline transition-colors duration-300">📊 View Results</a>
            <span class="hidden sm:inline">|</span>
            <a href="logout.php" class="text-red-600 hover:text-red-800 hover:underline transition-colors duration-300">🚪 Logout</a>
        </div>
    </div>
</body>
</html>
