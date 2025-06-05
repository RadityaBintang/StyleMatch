<?php

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember-me']);

    $userModel = new User();
    $user = $userModel->authenticate($username, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        if ($remember) {
            setcookie('stylematch_remember', $user['id'], time() + (30 * 24 * 60 * 60), '/');
        }
        
        header('Location: index.php?action=main');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyleMatch Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .login-card {
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }
        .gradient-header {
            background: linear-gradient(135deg, #f5f7fa 0%,rgb(121, 169, 247) 100%);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="login-card bg-white w-full max-w-xs rounded-xl overflow-hidden shadow-lg">
        <!-- App Logo/Header -->
        <div class="gradient-header p-6 text-center">
            <h1 class="text-2xl font-bold text-gray-800">StyleMatch</h1>
            <p class="text-gray-600 mt-1">Find your perfect style</p>
        </div>

        <!-- Login Form -->
        <form action="index.php?action=login" method="POST" class="p-6 space-y-6">
            <?php if ($error): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            
            <div class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input 
                            type="text" 
                            id="username" 
                            name="username"
                            class="input-field pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2 border" 
                            placeholder="Enter your username"
                            required
                            value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password"
                            class="input-field pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2 border" 
                            placeholder="Enter your password"
                            required>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>

                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>

            <button style="margin-top: 300px;"   
            type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition-all">
                Login
            </button>
        </form>
    </div>
</body>
</html>