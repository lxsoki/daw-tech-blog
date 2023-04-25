<header class="bg-gray-800 shadow-md sticky">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <a href="index.php" class="text-2xl font-semibold text-white">Latest News <span class="text-xs">from <span class="text-base italic">frontpagetech</span> & <span class="text-base italic">macrumors</span> </span></a>
            <div class="hidden lg:flex" id="nav-items">
                <a href="index.php" class="mx-4 text-white hover:text-gray-300">Home</a>
                <div class="relative dropdown inline-block">
                    <a href="#" class="mx-4 text-white hover:text-gray-300 py-2">Products</a>
                    <div class="dropdown-menu absolute left-0 mt-1 w-32 bg-gray-800 rounded-md shadow-lg hidden z-10">
                        <a href="cat-page1.php" class="block px-4 py-4 text-white hover:bg-gray-700">iPhone</a>
                        <a href="cat-page2.php" class="block px-4 py-4 text-white hover:bg-gray-700">iPad</a>
                    </div>
                </div>
                <div class="relative dropdown inline-block">
                    <a href="#" class="mx-4 text-white hover:text-gray-300 py-2">Services</a>
                    <div class="dropdown-menu absolute left-0 mt-0 w-32 bg-gray-800 rounded-md shadow-lg hidden z-10">
                        <a href="cat-page3.php" class="block px-4 py-4 text-white hover:bg-gray-700">Apple Music</a>
                        <a href="cat-page4.php" class="block px-4 py-4 text-white hover:bg-gray-700">macOS</a>
                    </div>
                </div>
            </div>
            <button class="lg:hidden focus:outline-none" id="menu-toggle">
                <span class="iconify" data-icon="mdi:menu" data-inline="false" data-width="24" data-height="24" data-color="white"></span>
            </button>
        </div>
        <div class="flex flex-col hidden lg:hidden mt-4 space-y-2" id="mobile-nav">
            <a href="#" class="mx-4 text-white hover:text-gray-300">Home</a>
            <div class="relative dropdown">
                <a href="#" class="mx-4 text-white hover:text-gray-300 py-2">Products</a>
                <div class="dropdown-menu absolute left-12 -mt-8 w-32 bg-gray-800 rounded-md shadow-lg hidden z-10">
                    <a href="cat-page1.php" class="block px-4 py-2 text-white hover:bg-gray-700">iPhone</a>
                    <a href="cat-page2.php" class="block px-4 py-2 text-white hover:bg-gray-700">iPad</a>
                </div>
            </div>
            <div class="relative dropdown">
                <a href="#" class="mx-4 text-white hover:text-gray-300 py-2">Services</a>
                <div class="dropdown-menu absolute left-12 -mt-8 w-32 bg-gray-800 rounded-md shadow-lg hidden z-10">
                    <a href="cat-page3.php" class="block px-4 py-2 text-white hover:bg-gray-700">Apple Music</a>
                    <a href="cat-page4.php" class="block px-4 py-2 text-white hover:bg-gray-700">macOS</a>
                </div>
            </div>
        </div>
    </nav>
</header>