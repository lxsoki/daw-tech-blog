<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple News Aggregator</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-900 text-white flex flex-col min-h-screen">
    <?php include 'header.php'; ?>

    <main class="container mx-auto px-6 py-8 flex-grow">
        <?php include 'carousel.php'; ?>
        <!-- articles start -->
        <div class="grid grid-cols-1 gap-8">
            <article id="cat1-post1" class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">iPhone 15 Pro’s New Buttons DELAYED</h2>
                        <p class="text-sm text-gray-400 mb-2">April 12, 2023</p>
                        <p class="text-gray-300">Analyst Ming-Chi Kuo has dashed everyone’s hopes with a new Medium blog post; due to “design issues”, the iPhone 15 Pro will no longer be featuring solid-state buttons in place of the usual volume buttons and mute switch.</p>
                        <p class="text-gray-300 mt-3 mb-3">Kuo’s Medium post lays it all out: </p>
                        <p class="text-2xl text-gray-300 italic">My latest survey indicates that due to unresolved technical issues before mass production, both high-end iPhone 15 Pro models (Pro & Pro Max) will abandon the closely-watched solid-state button design and revert to the traditional physical button design.</p>
                        <p class="text-gray-300 mt-3 mb-3">Kuo’s reasoning for the lack of delays to Apple’s overall schedule is that the iPhone 15 Pro is currently still in the EVT development stage – which means there’s still ample time to modify the design of the device. Of course, removing a potentially difficult design element like solid-state buttons would also simplify the design process and potentially speed everything up.</p>
                        <!-- <a href="#" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a> -->
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/iphone-ultra-14-pro-apple-800x450.jpg" alt="iPhone15-btn-alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <article id="cat1-post2" class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">A New Yellow iPhone 14 and iPhone 14 Plus Is Here!</h2>
                        <p class="text-sm text-gray-400 mb-2">March 10, 2023</p>
                        <p class="text-gray-300">If you’re wondering if there’s any other differences with the newly released yellow iPhone 14 and iPhone 14 Plus – nope! It’s just a very bright, piss colored option for people who really dig uhhhh bananas and the sun.</p>
                        <p class="text-grey-300 mt-3 mb-3">Announced via a Newsroom post on March 7th, Apple showed off the latest addition to the iPhone 14 family – a very bright, banana yellow.</p>
                        <p class="text=grey-300 mt-3 mb-3">As of today, the new color is available for preorder in the U.S and many other countries via Apple’s website, with orders shipping to customers on Tuesday, March 14th!</p>
                        <!-- <a href="#" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a> -->
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/ip14-yellow-800x450.jpg" alt="iphon14-yellow-alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <!-- articles end -->

        </div>
    </main>

    <?php include 'footer.php'; ?>

    <!-- js land -->
    <script src="index.js"></script>
    <script src="carousel.js"></script>
</body>

</html>