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
            <article id="cat2-post1" class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Foldable iPad Coming in 2024, per report</h2>
                        <p class="text-sm text-gray-400 mb-2">January 30, 2023</p>
                        <p class="text-gray-300">Ever just wanted to snap your iPad in half? Well, now you don’t have to! Thanks to a report from Ming-Chi Kuo, we’ve learned that Apple has plans to release the first foldable iPad in 2024 – let’s talk about it!</p>
                        <p class="text-gray-300 mt-3 mb-3">Due to the lack of new releases this year, Kuo predicts a slump in sales year-over-year; yet, since he’s “positive” about a foldable iPad appearing in 2024, he predicts a boost in shipments after release.</p>
                        <p class="text-gray-300 mt-3 mb-3">Finally, Kuo also alludes to 2024’s foldable iPad coming equipped with a foldable carbon fiber kickstand – which would definitely be a sight.</p>
                        <!-- <a href="#" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a> -->
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/iPad-Pro-2021-1024x568.jpg" alt="ipad pro" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <article id="cat2-post2" class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Here’s The New 10th-Generation iPad…</h2>
                        <p class="text-sm text-gray-400 mb-2">October 18, 2022</p>
                        <p class="text-gray-300">So, Apple announced the latest addition to the normal, basic iPad family this morning. The 10th-generation iPad is here, and… it sucks. Let’s talk about why.</p>
                        <p class="text-gray-300 mt-3 mb-3">For starters, I generally dislike talking sh*t about Apple products released on the lower end of the price spectrum – I think making the Apple ecosystem as accessible as possible is one of the best things Tim and Co. can do; however, this new 10th-gen iPad is a joke. Let’s look at pricing and features of the new 10th-gen iPad:</p>
                        <ul class="list-disc ml-12">
                            <li>Featuring A14 Bionic chip for acceptable performance</li>
                            <li>All new design, with flat sides and larger 10.9-inch Liquid Retina display (Ala iPad Air)</li>
                            <li>Touch ID integrated side lock/unlock button</li>
                            <li>Landscape front-facing Ultra Wide 12MP camera, and updated rear-facing 12MP camera</li>
                            <li>USB-C port instead of Lightning</li>
                            <li>Wi-Fi 6 support and 5G connectivity on cellular models</li>
                            <li>Support for new Magic Keyboard Folio</li>
                            <li>Support for <span class="text-xl italic">first-generation Apple Pencil only<span></li>
                            <li>Available for order today starting at an increased $449 for 64GB and $599 for 256GB</li>
                            <li>Colors available are Blue, Pink, Yellow and Silver</li>
                            <li>Shipping October 26th</li>
                        </ul>
                        <p class="text-gray-300 mt-3 mb-3">Now that the specs are out of the way, let’s complain. Price has gone up considerably from the 9th-gen iPad, from $329 – so that is a total bummer. Over $100 increase for… what exactly? The updated display? Meh. Boring.</p>
                        <!-- <a href="#" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a> -->
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/Apple-iPad-10th-gen-hero-221018_Full-Bleed-Image.jpg.large_2x-800x450.jpg" alt="Apple Glasses" class="w-full h-auto rounded-md">
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