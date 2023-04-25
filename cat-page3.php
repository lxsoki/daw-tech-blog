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
            <article id="cat3-post1" class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Apple Announces Apple Music Classical, Now Available on the App Store</h2>
                        <p class="text-sm text-gray-400 mb-2">March 28, 2023</p>
                        <p class="text-gray-300">Apple has announced the release of Apple Music Classical, which is now available to download in the App Store. Apple originally planned to launch a classical music app in 2022, but the app was not announced until this year.</p>
                        <p class="text-gray-300 mt-3 mb-3">The new ‌Apple Music‌ Classical app offers ‌Apple Music‌ and Apple One subscribers access to over five million classical music tracks, including new high-quality releases, in addition to thousands of exclusive albums, and other features like composer bios and deep dives on key works.</p>
                        <p class="text-gray-300 mt-3">Over 700 playlists are available to guide listeners through 800 years of music, with more to be added, according to Apple. Beginners can start with The Story of Classical audio guides, which blend expert commentary and selected works to introduce key composers, periods, instruments, and classical terminology.</p>
                        <p class="text-gray-300 mt-3 mb-3">The app offers a simpler interface for interacting with classical music specifically. Unlike the existing ‌Apple Music‌ app, ‌Apple Music‌ Classical allows users to search by composer, work, conductor, catalog number, and more. Users can get more detailed information from editorial notes and descriptions.</p>
                        <!-- <a href="#" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a> -->
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/Apple-Music-Classical-hero.jpg" alt="apple music alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <article id="cat2-post2" class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Apple Music Spatial Audio Set to launch at WWDC 2021</h2>
                        <p class="text-sm text-gray-400 mb-2">June 6, 2021</p>
                        <p class="text-gray-300">In a press release back in May, Apple Music announced Spatial Audio with Dolby Atmos with a target rollout date in June. It’s here. It’s that month. The month of the Juneth. I’m in a weird mood. What ya want.</p>
                        <p class="text-gray-300 mt-3 mb-3">An Apple Music video posted to Reddit has been discovered, called “Introducing Spatial Audio.” The video invites viewers to “tune in at 12pm PT on June 7 to watch this special event,” which follows after the opening keynote of WWDC 2021.</p>
                        <p class="text-gray-300 mt-3">While it is not yet clear what hardware will be supported, we’ll soon enough know as WWDC is just around the corner.</p>
                        <!-- <a href="#" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a> -->
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/spcial-audi0event-1024x571.jpg" alt="apple music alt" class="w-full h-auto rounded-md">
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