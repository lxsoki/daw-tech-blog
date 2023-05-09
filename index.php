<?php
session_start();
?>
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
  <?php include 'header.php';?>

  <main class="container mx-auto px-6 py-8 flex-grow">
    <?php include 'carousel.php';?>
    <!-- articles container -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8" id="mainContainer">
      <!-- <article id="ignore-this" class="rounded-md shadow-md bg-gray-800 p-6">
                <button class="rounded-md p-2 bg-slate-400"
                onclick="getAllRecords()">get all records</button>
                <button class="rounded-md p-2 bg-slate-400" id="addRecordBtn"
                onclick="addRecord()">add record</button>
            </article> -->

      <!-- <article class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Apple Announces Apple Music Classical, Now Available on the App Store</h2>
                        <p class="text-sm text-gray-400 mb-2">March 28, 2023</p>
                        <p class="text-gray-300">Apple has announced the release of Apple Music Classical, which is now available to download in the App Store. Apple originally planned to launch a classical music app in 2022, but the app was not announced until this year.</p>
                        <a href="cat-page3.php#cat3-post1" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a>
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/Apple-Music-Classical-hero.jpg" alt="apple-reality-pro-alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <article class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Apple Seeds Second Beta of macOS Ventura 13.3 to Developers</h2>
                        <p class="text-sm text-gray-400 mb-2">February 28, 2023</p>
                        <p class="text-gray-300">Apple today seeded the second beta of macOS Ventura 13.3 to developers for testing purposes, with the new software update coming two weeks after the release of the first macOS 13.3 beta.</p>
                        <a href="cat-page4.php#cat4-post2" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a>
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/macOS+Ventura+Compatibility+hero.jpg" alt="ios16-alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <article class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">iPhone 15 Pro’s New Buttons DELAYED</h2>
                        <p class="text-sm text-gray-400 mb-2">April 12, 2023</p>
                        <p class="text-gray-300">Analyst Ming-Chi Kuo has dashed everyone’s hopes with a new Medium blog post; due to “design issues”, the iPhone 15 Pro will no longer be featuring solid-state buttons in place of the usual volume buttons and mute switch.</p>
                        <a href="cat-page1.php#cat1-post1" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a>
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/iphone-ultra-14-pro-apple-800x450.jpg" alt="iPhone15-btn-alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <article class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Apple’s 2023 WWDC – June 5 through June 9!</h2>
                        <p class="text-sm text-gray-400 mb-2">March 29, 2023</p>
                        <p class="text-gray-300">Yay! Apple has finally, officially announced the date and time for 2023’s WWDC event! We’ll get a good look at all of Apple’s latest and greatest in their usual keynote to be held on Monday, June 5th.</p>
                        <a href="cat-page4.php#cat4-post1" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a>
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/wwdc23-682x384.jpg" alt="wwdc23-alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <article class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Here’s The New 10th-Generation iPad…</h2>
                        <p class="text-sm text-gray-400 mb-2">October 18, 2022</p>
                        <p class="text-gray-300">So, Apple announced the latest addition to the normal, basic iPad family this morning. The 10th-generation iPad is here, and… it sucks. Let’s talk about why.</p>
                        <a href="cat-page2.php#cat2-post2" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a>
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/Apple-iPad-10th-gen-hero-221018_Full-Bleed-Image.jpg.large_2x-800x450.jpg" alt="iPhone15-alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <article class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">A New Yellow iPhone 14 and iPhone 14 Plus Is Here!</h2>
                        <p class="text-sm text-gray-400 mb-2">March 10, 2023</p>
                        <p class="text-gray-300">If you’re wondering if there’s any other differences with the newly released yellow iPhone 14 and iPhone 14 Plus – nope! It’s just a very bright, piss colored option for people who really dig uhhhh bananas and the sun.</p>
                        <a href="cat-page1.php#cat1-post2" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a>
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/ip14-yellow-800x450.jpg" alt="iphon14-yellow-alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article> -->

    </div>
    <!-- articles container end -->
  </main>

  <?php include 'footer.php';?>

  <!-- js land -->
  <script src="index.js"></script>
  <script src="carousel.js"></script>
</body>
<script>

</script>

</html>