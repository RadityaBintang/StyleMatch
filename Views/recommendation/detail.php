<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=480, height=936, initial-scale=1.0">
    <title>StyleMatch - Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }
        .scroll-container {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .scroll-container::-webkit-scrollbar {
            display: none;
        }
        .outfit-image {
            background-size: cover;
            background-position: center;
            transition: all 0.3s ease;
        }
        .outfit-image:hover {
            transform: scale(1.02);
        }
        .detail-box-container {
            width: calc(100% - 40px);
            margin: 0 auto;
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
<div class="container bg-white w-[480px] h-[936px] shadow-md rounded-lg overflow-hidden relative">
    <!-- Header -->
    <div class="p-4 border-b border-gray-200 relative">
        <a href="index.php?action=recommendations" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-xl">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-xl font-bold text-center">Detail</h1>
    </div>

    <!-- Content Scroll -->
    <div class="h-[calc(100%-120px)] overflow-y-auto scroll-container p-4">
        <!-- Gambar dan Informasi Outfit -->
        <div class="mb-6 detail-box-container">
            <div class="outfit-image w-full h-64 rounded-lg border-2 border-black overflow-hidden"
                 style="background-image: url('<?= htmlspecialchars($outfit['image_url']) ?>')">
                <div class="h-full w-full bg-black bg-opacity-30 flex items-end p-3">
                    <div class="text-white">
                        <p class="font-bold text-lg"><?= htmlspecialchars($outfit['title']) ?></p>
                        <div class="flex items-center mt-1">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm"><?= round($outfit['avg_rating'], 1) ?> (<?= $outfit['likes_count'] ?> reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="px-2 text-gray-800">
            <p class="text-lg font-medium mb-2">Style: <?= htmlspecialchars($outfit['style'] ?? 'N/A') ?></p>
            <p class="text-sm leading-relaxed"><?= htmlspecialchars($outfit['description']) ?></p>
        </div>

        <!-- Outfit Lain -->
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Others</h3>
            <div class="flex space-x-3 overflow-x-auto scroll-container pb-2">
                <div class="outfit-image flex-shrink-0 w-32 h-32 rounded-lg overflow-hidden"
                     style="background-image: url(assets/images/college.jpg)">
                    <div class="h-full w-full bg-black bg-opacity-20"></div>
                </div>
                <div class="outfit-image flex-shrink-0 w-32 h-32 rounded-lg overflow-hidden"
                     style="background-image: url(assets/images/casual_look.jpg)">
                    <div class="h-full w-full bg-black bg-opacity-20"></div>
                </div>
                <div class="outfit-image flex-shrink-0 w-32 h-32 rounded-lg overflow-hidden"
                     style="background-image: url(assets/images/sporty.jpg)">
                    <div class="h-full w-full bg-black bg-opacity-20"></div>
                </div>
                <div class="outfit-image flex-shrink-0 w-32 h-32 rounded-lg overflow-hidden"
                     style="background-image: url(assets/images/street_style.jpg)">
                    <div class="h-full w-full bg-black bg-opacity-20"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Buttons -->
    <div class="absolute bottom-0 left-0 right-0 p-4 bg-white border-t border-gray-200 flex justify-between">
        <!-- Tombol Reviews -->
        <a href="index.php?action=reviews&id=<?= $outfit['id'] ?>" class="flex items-center justify-center px-4 py-2 bg-gray-800 text-white rounded-lg">
            <i class="fas fa-user-friends mr-2"></i> Reviews
        </a>

        <!-- Tombol Favorite -->
        <button class="flex items-center justify-center px-4 py-2 bg-black text-white rounded-lg">
            <i class="fas fa-heart mr-2"></i> Favourite
        </button>
    </div>
</div>
</body>
</html>
