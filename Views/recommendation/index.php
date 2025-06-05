<?php
// Check if recommendations data exists
if (!isset($recommendations) || empty($recommendations)) {
    echo '<div class="text-center p-8">No recommendations found. Please try different criteria.</div>';
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyleMatch - Recommendations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .outfit-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .outfit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .outfit-image-container {
            width: 100%;
            height: 100%;
            background-color: #e5e7eb;
        }
        .outfit-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .outfit-card:hover .outfit-image {
            transform: scale(1.05);
        }
        .scroll-container {
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }
        .scroll-container::-webkit-scrollbar {
            display: none;
        }
        .rating-badge {
            background-color: rgba(0,0,0,0.7);
            backdrop-filter: blur(4px);
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-start min-h-screen p-4">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl overflow-hidden">
       
    <!-- Header -->
        <div class="p-5 border-b border-gray-200 sticky top-0 bg-white z-10">
            <div class="flex justify-between items-center">
                <a href="index.php?action=main" class="text-gray-600 text-xl">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="text-xl font-bold text-center">Recommended Outfits</h1>
                <span class="text-gray-600 text-xl">
                    <i class="fas fa-user"></i>
                </span>
            </div>
        </div>

        <div class="scroll-container p-5">
           
        <!-- Recommendation Grid -->
            <div class="grid grid-cols-2 gap-4">
                <?php foreach ($recommendations as $outfit): ?>
                    <a href="index.php?action=detail&id=<?= $outfit['id'] ?>" class="outfit-card rounded-xl overflow-hidden h-64 relative">
                        <div class="outfit-image-container">
                            <?php if (!empty($outfit['image_url'])): ?>
                                <img data-src="<?= htmlspecialchars($outfit['image_url']) ?>"
                                     src="assets/images/placeholder.jpg"
                                     alt="<?= htmlspecialchars($outfit['title']) ?>"
                                     class="outfit-image lazy"
                                     onerror="this.onerror=null;this.src='assets/images/street_style.jpg';">
                            <?php else: ?>
                                <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-gray-200 to-gray-300">
                                    <span class="text-gray-500 text-center px-2"><?= htmlspecialchars($outfit['title']) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3">
                            <div class="text-white font-medium truncate"><?= htmlspecialchars($outfit['title']) ?></div>
                            <div class="flex items-center text-white text-sm mt-1">
                                <div class="rating-badge px-2 py-1 rounded-full flex items-center">
                                    <i class="fas fa-star text-yellow-300 mr-1"></i>
                                    <span><?= number_format($outfit['avg_rating'] ?? 0, 1) ?></span>
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-heart text-red-300 mr-1"></i>
                                    <span><?= $outfit['likes_count'] ?? 0 ?></span>
                                </div>
                            </div>
                        </div>

                        <?php if ($outfit['is_new'] ?? false): ?>
                            <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                NEW
                            </div>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>

                <?php if (count($recommendations) % 2 != 0): ?>
                    <div class="outfit-card h-64 opacity-0"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        
        document.addEventListener('DOMContentLoaded', function () {
            const lazyImages = document.querySelectorAll('img.lazy');
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        const dataSrc = img.getAttribute('data-src');
                        if (dataSrc) {
                            img.src = dataSrc;
                        }
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(img => {
                imageObserver.observe(img);
            });
        });
    </script>
</body>
</html>
