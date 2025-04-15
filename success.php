<?php include 'includes/config.php'; include 'includes/header.php'; ?>

<!-- Main Content -->
<div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-green-300 via-blue-300 to-teal-400">
    <div class="bg-white p-10 rounded-lg shadow-xl text-center animate__animated animate__fadeInUp">
        <div class="text-6xl mb-4 animate__animated animate__bounce">🎉</div>
        <h2 class="text-3xl font-semibold text-green-600 mb-4">Thank you for voting!</h2>
        <p class="text-lg text-gray-600 mb-6">Your vote hs been successfully recorded.</p>
        <a href="results.php" class="inline-block bg-green-500 text-white py-3 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:bg-green-400 hover:scale-105 active:bg-green-600">
            View Results
        </a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
