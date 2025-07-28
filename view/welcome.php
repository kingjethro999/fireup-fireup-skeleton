<?php
if (!function_exists('csrf_token')) {
    function csrf_token() {
        if (!isset($_SESSION)) session_start();
        if (!isset($_SESSION['_token'])) {
            $_SESSION['_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_token'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to FireUp!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Vite assets (development) -->
    <?php if (file_exists(__DIR__ . '/../public/build/js/app.js')): ?>
        <script type="module" src="/build/js/app.js"></script>
        <link rel="stylesheet" href="/build/css/app.css">
    <?php endif; ?>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-fireup-600">FireUp</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/dashboard" class="text-gray-600 hover:text-fireup-600 transition-colors">Dashboard</a>
                    <a href="/api/docs" class="text-gray-600 hover:text-fireup-600 transition-colors">API Docs</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-gray-900 mb-4">Welcome to FireUp! 🚀</h1>
            <p class="text-xl text-gray-600 mb-8">Your modern PHP framework with JavaScript superpowers</p>
            
            <!-- Feature Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="card animate-fade-in">
                    <div class="text-fireup-600 text-3xl mb-4">⚡</div>
                    <h3 class="text-lg font-semibold mb-2">Lightning Fast</h3>
                    <p class="text-gray-600">Built for speed with modern PHP 8+ and optimized for performance.</p>
                </div>
                <div class="card animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="text-fireup-600 text-3xl mb-4">🎯</div>
                    <h3 class="text-lg font-semibold mb-2">Developer Friendly</h3>
                    <p class="text-gray-600">Intuitive CLI, auto-generated docs, and seamless JavaScript integration.</p>
                </div>
                <div class="card animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="text-fireup-600 text-3xl mb-4">📱</div>
                    <h3 class="text-lg font-semibold mb-2">Mobile Ready</h3>
                    <p class="text-gray-600">Auto-generate RESTful APIs for your React Native apps.</p>
                </div>
            </div>
        </div>

        <!-- Interactive Demo Section -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Try It Out!</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <button data-fireup-demo="api-test" class="btn-primary">
                    Test API Call
                </button>
                <button data-fireup-demo="notification" class="btn-secondary">
                    Show Notification
                </button>
                <button data-fireup-demo="event" class="btn-primary">
                    Trigger Event
                </button>
            </div>
        </div>

        <!-- Quick Start Guide -->
        <div class="bg-blue-50 border-l-4 border-blue-400 p-6 rounded-r-lg">
            <h3 class="text-lg font-semibold text-blue-900 mb-4">Quick Start Guide</h3>
            <div class="space-y-3 text-sm">
                <div class="flex items-start">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-mono mr-3 mt-1">1</span>
                    <p class="text-blue-800">Edit <code class="bg-blue-100 px-1 rounded">app/Controllers/WelcomeController.php</code> to customize this page</p>
                </div>
                <div class="flex items-start">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-mono mr-3 mt-1">2</span>
                    <p class="text-blue-800">Run <code class="bg-blue-100 px-1 rounded">fireup serve</code> to start the development server</p>
                </div>
                <div class="flex items-start">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-mono mr-3 mt-1">3</span>
                    <p class="text-blue-800">Run <code class="bg-blue-100 px-1 rounded">npm run dev</code> to start the JavaScript build process</p>
                </div>
                <div class="flex items-start">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-mono mr-3 mt-1">4</span>
                    <p class="text-blue-800">Visit <a href="/dashboard" class="underline font-medium">/dashboard</a> for visual development tools</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-300">Built with ❤️ using FireUp PHP Framework</p>
            <div class="mt-4 space-x-4">
                <a href="/api/docs" class="text-gray-300 hover:text-white transition-colors">API Documentation</a>
                <a href="/dashboard" class="text-gray-300 hover:text-white transition-colors">Dashboard</a>
                <a href="https://github.com/fireup/fireup" class="text-gray-300 hover:text-white transition-colors">GitHub</a>
            </div>
        </div>
    </footer>

    <!-- Development Notice -->
    <?php if (isset($_ENV['APP_ENV']) && $_ENV['APP_ENV'] === 'local'): ?>
    <div class="fixed bottom-4 right-4 bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-2 rounded-lg shadow-lg">
        <div class="flex items-center">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            Development Mode
        </div>
    </div>
    <?php endif; ?>
</body>
</html>
