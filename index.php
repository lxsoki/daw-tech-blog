<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share your thoughts :)</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-900 text-white flex flex-col min-h-screen">
    <?php include 'header.php'; ?>

    <main class="container mx-auto px-6 py-8 flex-grow">
        <?php include 'carousel.php'; ?>
        <!-- articles container, content will pe generated dinamically via http calls & js -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" id="mainContainer"></div>
        <!-- articles container end -->
    </main>

    <?php include 'footer.php'; ?>

    <!-- js land -->
    <script src="index.js" defer></script>
    <script src="carousel.js"></script>
</body>

<script>
    const articlesMainPage = document.getElementById("mainContainer");
    document.onreadystatechange = () => {
        if (document.readyState === "complete") {
            // init app code after page has finished loading
            console.log('page loaded');
            getAllRecords();
        }
    }
    document.getElementById("menu-toggle").addEventListener("click", () => {
        const mobileNav = document.getElementById("mobile-nav");
        mobileNav.classList.toggle("hidden");
    });
</script>

</html>
