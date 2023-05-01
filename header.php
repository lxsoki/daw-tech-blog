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
            <!-- log in btn -->
            <?php if (!isset($_SESSION['authenticated'])) : ?>
                <button id="loginButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Log In
                </button>
            <?php endif ?>

            <?php if (isset($_SESSION['authenticated'])) : ?>
                <button id="addRecordBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add a Post
                </button>
                <button id="loginButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick=logout()>
                    Log Out
                </button>
            <?php endif ?>
            <!-- log in btn ends -->
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

<!-- Log In Modal & Register Modal -->
<div id="loginModal" class="fixed inset-0 hidden w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-75 z-20">
    <div class="bg-gray-700 p-8 rounded-md w-full max-w-md">
        <div id="loginContainer">
            <h2 class="text-2xl font-semibold mb-4">Log In</h2>
            <form action="server/login-logic.php" method="POST">
                <div class="mb-4">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" id="login-username" name="name" placeholder="Enter your username (login)" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="text" id="login-email" name="email" placeholder="Enter your email (login)" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input id="password" placeholder="Enter your password (login)" name="password" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="loginBtn" id="loginModalButton">
                        Log In
                    </button>
                </div>
            </form>
        </div>
        <div id="registerContainer" class="hidden">
            <h2 class="text-2xl font-semibold mb-4">Register</h2>
            <form action="server/register-logic.php" method="POST">
                <div class="mb-4">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" id="login-username" name="name" placeholder="Enter your username (register)" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="text" id="login-email" name="email" placeholder="Enter your email (register)" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input id="password" placeholder="Enter your password (register)" name="password" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="registerBtn" id="loginModalButton">
                        Register
                    </button>
                </div>
            </form>
        </div>
        <div class="mb-4 mt-4">
            <p id="registerToggle" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block cursor-pointer">Click here to Register</p>
            <p id="loginToggle" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block cursor-pointer hidden">Click here to Log In</p>
        </div>
    </div>
</div>

<!-- Add new Record Modal -->
<div id="addRecordModal" class="fixed inset-0 hidden w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-75 z-20">
        <div class="bg-gray-700 p-8 rounded-md w-full max-w-md">
            <h2 class="text-2xl font-semibold mb-4">Add a new article</h2>
            <form>
                <div class="mb-4">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="modal-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-4">
                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea id="modal-message" 
                            rows="4" 
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Write your thoughts here...">
                    </textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                            type="button" onclick="submitNewRecord()"
                            id="submitRecordBtn">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

<script>
    document.getElementById('loginButton').addEventListener('click', function() {
        document.getElementById('loginModal').classList.remove('hidden');
    });

    document.getElementById('loginModal').addEventListener('click', function(event) {
        if (event.target === event.currentTarget) {
            document.getElementById('loginModal').classList.add('hidden');
        }
    });

    document.getElementById('loginModalButton').addEventListener('click', function() {
        document.getElementById('loginModal').classList.add('hidden');
    });

    document.getElementById('registerToggle').addEventListener('click', function(event) {
        document.getElementById('loginContainer').classList.add('hidden');
        document.getElementById('loginToggle').classList.remove('hidden');
        document.getElementById('registerToggle').classList.add('hidden');
        document.getElementById('registerContainer').classList.remove('hidden');
    });

    document.getElementById('loginToggle').addEventListener('click', function(event) {
        document.getElementById('loginContainer').classList.remove('hidden');
        document.getElementById('loginToggle').classList.add('hidden');
        document.getElementById('registerToggle').classList.remove('hidden');
        document.getElementById('registerContainer').classList.add('hidden');
    });

    function logout() {
        window.location.href = "server/logout-logic.php";
    }

    // add new record functionality
    document.getElementById('addRecordBtn').addEventListener('click', function() {
        document.getElementById('addRecordModal').classList.remove('hidden');
    });

    document.getElementById('addRecordModal').addEventListener('click', function(event) {
        if (event.target === event.currentTarget) {
            document.getElementById('addRecordModal').classList.add('hidden');
        }
    });
</script>