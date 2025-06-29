

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyleMatch - Main Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }
        .outfit-box {
            background-size: cover;
            background-position: center;
            transition: all 0.3s ease;
            min-width: 250px;
            height: 600px;
            filter: grayscale(100%);
        }
        .outfit-box:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            filter: grayscale(0%);
        }
        .header-btn {
            transition: all 0.2s ease;
        }
        .header-btn:hover {
            transform: translateY(-2px);
        }
        .rec-btn {
            transition: all 0.2s ease;
        }
        .rec-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .outfit-scroll-container {
            display: flex;
            overflow-x: auto;
            gap: 12px;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .outfit-scroll-container::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">

<div class="container bg-white w-[480px] h-[900px] shadow-md rounded-lg overflow-hidden relative">

    <!-- Header -->
    <div class="p-4 flex justify-between items-center border-b border-gray-200">
        <div class="flex space-x-2">
            <button class="header-btn bg-gray-200 px-3 py-1 rounded-full text-sm font-medium text-gray-800">Reviews</button>

<div class="relative group">
    <button class="header-btn bg-gray-200 px-3 py-1 rounded-full text-sm font-medium text-gray-800 flex items-center">
        Gender <i class="fas fa-chevron-down ml-1 text-xs"></i>
    </button>
    <div class="absolute hidden group-hover:block mt-1 bg-white border rounded-md shadow-md w-28 z-10">
        <a href="?gender=male" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Male</a>
        <a href="?gender=female" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Female</a>
    </div>
</div>

            <button class="header-btn bg-gray-800 px-3 py-1 rounded-full text-sm font-medium text-white">
                <i class="fas fa-crown mr-1"></i> Top Choice
            </button>
        </div>
        <div class="flex items-center">
        
            <a href="index.php?action=logout" class="text-gray-800 text-xl">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>

    <!-- Content -->
    <div class="p-5 pb-24">
        <h2 class="text-lg font-semibold mb-4 text-gray-800">Choose Your Style!</h2>

        <div class="outfit-scroll-container mb-8">
<a href="index.php?c=Outfit&m=select&style=Casual">

        <div class="outfit-box rounded-lg overflow-hidden flex-shrink-0" style="background-image: url('https://styleyouroccasion.com/wp-content/uploads/2023/05/Casual-Chic-Style-2.jpg'); width: 110px;">
            <div class="bg-black bg-opacity-40 h-full flex items-end p-2">
                <span class="text-white font-medium text-sm">Chic</span>
            </div>
        </div>
    </a>

<a href="index.php?c=Outfit&m=select&style=Casual">

        <div class="outfit-box rounded-lg overflow-hidden flex-shrink-0" style="background-image: url('https://40plusstyle.com/wp-content/uploads/2019/12/outfit4.jpg'); width: 110px;">
            <div class="bg-black bg-opacity-40 h-full flex items-end p-2">
                <span class="text-white font-medium text-sm">Casual</span>
            </div>
        </div>
    </a>

<a href="index.php?c=Outfit&m=select&style=Casual">

        <div class="outfit-box rounded-lg overflow-hidden flex-shrink-0" style="background-image: url('https://40plusstyle.com/wp-content/uploads/2019/12/outfitidea1.jpg'); width: 110px;">
            <div class="bg-black bg-opacity-40 h-full flex items-end p-2">
                <span class="text-white font-medium text-sm">College</span>
            </div>
        </div>
    </a>

<a href="index.php?c=Outfit&m=select&style=Casual">

        <div class="outfit-box rounded-lg overflow-hidden flex-shrink-0" style="background-image: url('https://3.bp.blogspot.com/-dWWn0m3Lcd0/Vtmd0mQtLWI/AAAAAAAAqwQ/nZhhtgq9nBo/s1600/4_.jpg'); width: 110px;">
            <div class="bg-black bg-opacity-40 h-full flex items-end p-2">
                <span class="text-white font-medium text-sm">Street Wear</span>
            </div>
        </div>
    </a>

   <a href="index.php?c=Outfit&m=select&style=Casual">

        <div class="outfit-box rounded-lg overflow-hidden flex-shrink-0" style="background-image: url('https://midlifeglobetrotter.com/wp-content/uploads/2023/04/Safari-Capsule-Wardrobe.jpg'); width: 110px;">
            <div class="bg-black bg-opacity-40 h-full flex items-end p-2">
                <span class="text-white font-medium text-sm">Gym Wear</span>
            </div>
        </div>
    </a>

<a href="index.php?c=Outfit&m=select&style=Casual">

        <div class="outfit-box rounded-lg overflow-hidden flex-shrink-0" style="background-image: url('https://i.pinimg.com/originals/7d/ca/f7/7dcaf760b232e86febb71c2d8c732d2b.jpg'); width: 110px;">
            <div class="bg-black bg-opacity-40 h-full flex items-end p-2">
                <span class="text-white font-medium text-sm">Prep</span>
            </div>
        </div>
    </a>
</div>


    <!-- Bottom Fixed Buttons -->
    <div class="absolute bottom-0 left-0 right-0 p-4 bg-white border-t border-gray-200">
        <div class="flex justify-between space-x-4">
            <button class="rec-btn flex-1 bg-gray-200 text-gray-800 py-3 px-4 rounded-lg font-medium flex items-center justify-center text-sm">
                <i class="fas fa-cloud-sun mr-2"></i> Weather
            </button>
            <a href="index.php?action=weight" class="rec-btn flex-1 bg-gray-800 text-white py-3 px-4 rounded-lg font-medium flex items-center justify-center text-sm">
                <i class="fas fa-user mr-2"></i> Body Type
            </a>
        </div>
    </div>

</div>

</body>
</html>
