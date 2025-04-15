<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-700 via-purple-600 to-pink-500 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-extrabold mb-6 animate-fade-in-up">🌐 Secure Online Voting</h1>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Transparent and tamper-proof digital elections with real-time results</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="register.php" class="bg-yellow-300 text-black px-6 py-3 rounded-full font-bold hover:bg-yellow-400 transition duration-300 shadow-md">
                📝 Register to Vote
            </a>
            <a href="login.php" class="bg-white text-blue-700 px-6 py-3 rounded-full font-bold hover:bg-blue-200 transition duration-300 shadow-md">
                🔐 Voter Login
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gradient-to-b from-gray-100 to-white">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-16">✨ Why Choose E-Vote?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Feature 1 -->
            <div class="bg-blue-100 p-8 rounded-3xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-300">
                <div class="text-blue-700 mb-4">
                    <i class="fas fa-shield-alt text-5xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3">End-to-End Security</h3>
                <p class="text-gray-700">Military-grade encryption to protect every vote from tampering.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-green-100 p-8 rounded-3xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-300">
                <div class="text-green-700 mb-4">
                    <i class="fas fa-user-check text-5xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3">Verified Identity</h3>
                <p class="text-gray-700">Multi-factor authentication ensures only valid voters participate.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-pink-100 p-8 rounded-3xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-300">
                <div class="text-pink-700 mb-4">
                    <i class="fas fa-chart-bar text-5xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3">Live Results</h3>
                <p class="text-gray-700">Real-time result tracking with transparency and accuracy.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="bg-gradient-to-r from-yellow-200 via-red-300 to-pink-300 py-16 text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">🗳️ Ready to Cast Your Vote?</h2>
        <p class="text-lg text-gray-700 mb-8">Join thousands of voters making democracy digital and secure!</p>
        <a href="register.php" class="bg-blue-700 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-800 transition duration-300 shadow-md">
            Get Started
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
