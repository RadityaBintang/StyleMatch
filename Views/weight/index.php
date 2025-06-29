<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyleMatch - Weight</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        .input-card {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }
        .input-field {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
            font-size: 1.125rem; /* text-lg */
        }
        .input-field:focus {
            border-color: #9ca3af;
            box-shadow: 0 0 0 3px rgba(156, 163, 175, 0.2);
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">

<div class="container bg-white w-[480px] h-[936px] shadow-md rounded-lg overflow-hidden relative">

    <div class="border-b border-gray-200 p-6 relative">
        <a href="index.php?action=main" class="absolute left-6 top-1/2 transform -translate-y-1/2 text-xl">
            ←
        </a>
    </div>

    <h1 class="text-2xl font-bold text-center mt-8">What's for You?</h1>
    <div class="p-6 mt-1 pt-4 flex flex-col justify-center h-full">
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="index.php?c=Weight&m=submitWeight" method="POST" class="flex flex-col justify-between h-[600px]">

            <div>
                <!-- Weight -->
                <div class="space-y-2">
                    <label class="block text-base font-medium text-gray-700">Weight (kg)</label>
                    <div class="relative">
                        <input 
                            type="number" 
                            name="weight"
                            class="input-field w-full px-5 py-4 rounded-lg border focus:outline-none focus:ring-1 focus:ring-gray-400" 
                            placeholder="Enter your weight"
                            step="0.1"
                            min="30"
                            max="200"
                            required>
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 text-base">
                            kg
                        </div>
                    </div>
                </div>

                <!-- Height -->
                <div class="space-y-2 mt-12">
                    <label class="block text-base font-medium text-gray-700">Height (cm)</label>
                    <div class="relative">
                        <input 
                            type="number" 
                            name="height"
                            class="input-field w-full px-5 py-4 rounded-lg border focus:outline-none focus:ring-1 focus:ring-gray-400" 
                            placeholder="Enter your height"
                            min="100"
                            max="250"
                            required>
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 text-base">
                            cm
                        </div>
                    </div>
                </div>
            </div>

            <button 
                type="submit" 
                class="w-full py-4 px-5 bg-black text-white rounded-lg font-medium hover:bg-gray-800 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mt-10">
                Find Recommendations
            </button>

        </form>
    </div>
</div>

</body>
</html>
