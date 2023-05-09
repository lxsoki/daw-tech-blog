<?php

include('server/authentication.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Posts</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-900 text-white flex flex-col min-h-screen">
    <?php include 'header.php'; ?>
    <main class="container mx-auto px-6 py-8 flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8" id="articleContainer">
        </div>
    </main>
    <? include 'footer.php'; ?>
</body>

<script>

</script>