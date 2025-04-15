<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - E-Vote</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-100 to-green-300 flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md animate-fade-in-up">
        <h2 class="text-3xl font-extrabold mb-6 text-center text-green-700">Welcome Back</h2>
        <?php
        $users = readJSON("data/users.json");
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            foreach ($users as $u) {
                if ($u['email'] === $email && password_verify($password, $u['password'])) {
                    $_SESSION['user'] = $email;
                    header("Location: dashboard.php");
                    exit();
                }
            }

            $error = "Invalid login credentials.";
        }
        ?>
        <form method="POST" class="space-y-4">
            <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                class="w-full border border-gray-300 focus:ring-2 focus:ring-green-400 focus:outline-none p-3 rounded-md transition-all duration-300" 
                required
            >
            <input 
                type="password" 
                name="password" 
                placeholder="Password" 
                class="w-full border border-gray-300 focus:ring-2 focus:ring-green-400 focus:outline-none p-3 rounded-md transition-all duration-300" 
                required
            >
            <button 
                type="submit" 
                class="w-full bg-green-600 hover:bg-green-700 transition-all duration-300 text-white font-medium py-3 rounded-md"
            >
                Login
            </button>
            <?php if ($error): ?>
                <p class="text-red-500 text-sm text-center mt-2"><?= $error ?></p>
            <?php endif; ?>
        </form>
        <p class="text-sm text-center text-gray-500 mt-4">
            Don’t have an account? <a href="register.php" class="text-green-700 hover:underline">Register here</a>
        </p>
    </div>
</body>
</html>
