<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share your thoughts :)</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-900 text-white flex flex-col min-h-screen">
    <?php include 'header.php'; ?>

    <main class="container mx-auto px-6 py-8 flex-grow">
        <?php include 'carousel.php'; ?>
        <!-- articles container, content will pe generated dinamically via http calls & js -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" id="mainContainer">
            <article id="ignore-this" class="rounded-md shadow-md  bg-gradient-to-r from-gray-700 p-6 hover:bg-slate-500">
                    <div>user page works? :D</div>
                    <p>1></p>
                    <p>2></p>
                    <p>3></p>
            </article>

        </div>
        <!-- articles container end -->
    </main>

    <?php include 'footer.php'; ?>

    <!-- js land -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script> -->

    <script src="index.js"></script>
    <script src="carousel.js"></script>
</body>
<script>

</script>

</html>