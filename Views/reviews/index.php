<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=480, initial-scale=1.0">
    <title>StyleMatch - Reviews</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }
        .scroll-container::-webkit-scrollbar {
            display: none;
        }
        .scroll-container {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="container bg-white w-[480px] h-[936px] shadow-md rounded-lg overflow-hidden relative">
        <!-- Header -->
        <div class="p-4 border-b border-gray-200 relative">
            <a href="javascript:history.back()" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-xl">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-xl font-bold text-center">Reviews</h1>
        </div>

        <!-- Scrollable Reviews -->
        <div class="h-[calc(100%-70px)] overflow-y-auto scroll-container p-4 space-y-4 pb-28">
            <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="bg-white p-4 rounded-xl shadow-md">
                        <div class="flex items-center justify-between mb-2">
                            <div class="font-semibold"><?= htmlspecialchars($review['username']) ?></div>
                            <div class="text-yellow-400">
                                <?php for ($i = 0; $i < $review['rating']; $i++): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                                <?php for ($i = $review['rating']; $i < 5; $i++): ?>
                                    <i class="far fa-star"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700"><?= htmlspecialchars($review['comment']) ?></p>
                        <p class="text-xs text-gray-400 mt-2"><?= date('d M Y', strtotime($review['created_at'])) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-500 mt-10">No reviews yet.</p>
            <?php endif; ?>
        </div>

        <!-- Add Yours Button -->
        <button onclick="toggleForm()" class="absolute bottom-6 left-1/2 transform -translate-x-1/2 bg-blue-600 text-white px-6 py-2 rounded-full shadow hover:bg-blue-700 transition">
            Add Yours
        </button>

        <!-- Hidden Review Form -->
        <div id="reviewForm" class="absolute bottom-20 left-4 right-4 bg-white shadow-lg p-4 rounded-lg hidden z-10">
            <form action="index.php?action=addReview" method="POST">
                <input type="hidden" name="outfits_id" value="<?= htmlspecialchars($_GET['id']) ?>">

                <label class="block mb-2 font-medium">Your Name</label>
                <input type="text" name="username" required class="w-full border border-gray-300 rounded px-3 py-2 mb-4">

                <label class="block mb-2 font-medium">Rating</label>
                <select name="rating" required class="w-full border border-gray-300 rounded px-3 py-2 mb-4">
                    <option value="5">★★★★★</option>
                    <option value="4">★★★★☆</option>
                    <option value="3">★★★☆☆</option>
                    <option value="2">★★☆☆☆</option>
                    <option value="1">★☆☆☆☆</option>
                </select>

                <label class="block mb-2 font-medium">Review</label>
                <textarea name="comment" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 mb-4"></textarea>

                <div class="flex justify-between">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Submit</button>
                    <button type="button" onclick="toggleForm()" class="text-gray-600 hover:underline">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function toggleForm() {
        const form = document.getElementById('reviewForm');
        form.classList.toggle('hidden');
    }
    </script>
</body>
</html>
