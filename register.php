<?php
include 'includes/config.php';
include 'includes/header.php';
?>

<div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-xl mt-14 mb-14 border-2 border-white" style="background: linear-gradient(135deg, #e0f7fa, #fce4ec); box-shadow: 0 8px 16px rgba(0,0,0,0.2); animation: fadeInUp 0.8s ease-out;">
    <h2 class="text-3xl font-extrabold mb-6 text-center text-green-800">Create Your Account</h2>
    <?php
    $users = readJSON("data/user.json");
    $error = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $ssn_last4 = $_POST['ssn_last4'];

        $exists = false;
        $ssn_used = false;

        foreach ($users as $u) {
            if ($u['email'] === $email) $exists = true;
            if ($u['ssn_last4'] === $ssn_last4) $ssn_used = true;
        }

        if ($exists) {
            $error = "Email already registered.";
        } elseif ($ssn_used) {
            $error = "SSN already used. You cannot register again.";
        } else {
            $users[] = [
                "email" => $email,
                "password" => $password,
                "ssn_last4" => $ssn_last4
            ];
            writeJSON("data/user.json", $users);
            header("Location: login.php");
            exit();
        }
    }
    ?>
    <form method="POST" class="space-y-4">
        <input type="email" name="email" placeholder="Email" class="w-full border border-gray-300 focus:ring-2 focus:ring-green-400 focus:outline-none p-3 rounded-md transition-all duration-300" required>
        <input type="password" name="password" placeholder="Password" class="w-full border border-gray-300 focus:ring-2 focus:ring-green-400 focus:outline-none p-3 rounded-md transition-all duration-300" required>
        <input type="text" name="ssn_last4" maxlength="4" placeholder="Last 4 digits of your SSN" class="w-full border border-gray-300 focus:ring-2 focus:ring-green-400 focus:outline-none p-3 rounded-md transition-all duration-300" required>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition-all duration-300 text-white py-2 rounded-md">Register</button>
        <?php if ($error): ?>
            <p class="text-red-500 text-center mt-3"><?= $error ?></p>
        <?php endif; ?>
    </form>
    <p class="mt-4 text-center text-gray-700">Already have an account? <a href="login.php" class="text-blue-700 hover:underline">Login here</a></p>
</div>

<?php include 'includes/footer.php'; ?>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
