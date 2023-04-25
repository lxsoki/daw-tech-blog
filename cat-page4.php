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
            <article id="cat4-post1" class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Apple’s 2023 WWDC – June 5 through June 9!</h2>
                        <p class="text-sm text-gray-400 mb-2">March 29, 2023</p>
                        <p class="text-gray-300">Yay! Apple has finally, officially announced the date and time for 2023’s WWDC event! We’ll get a good look at all of Apple’s latest and greatest in their usual keynote to be held on Monday, June 5th.</p>
                        <p class="text-gray-300 mt-3 mb-3">This year it’s the usual online affair, but on June 5th select developers and students will get to enjoy a special, in-person event on June 5th at Apple Park!</p>
                        <p class="text-gray-300 mt-3 mb-3 text-2xl italic">Along with announcements shared from the keynote and State of the Union presentations, this year’s online program will include sessions, one-on-one labs, and opportunities to engage with Apple engineers and other developers. Developers and students will also have the opportunity to attend a special day at Apple Park on June 5 to watch the keynote and State of the Union, alongside the global online community.</p>
                        <p class="text-gray-300 mt-3 mb-3">As to what we can expect from this year’s WWDC, we’re looking at a handful of really interesting announcements and new tech (potentially) making its debut:</p>
                        <ul class="list-disc ml-12">
                            <li>iOS 17</li>
                            <li>iPadOS 17</li>
                            <li>watchOS 10</li>
                            <li>macOS 14</li>
                            <li>tvOS 17</li>
                            <li>Apple’s VR/AR headset, “Reality Pro” (potentially)</li>
                            <li>New Apple Silicon generation of the Mac Pro</li>
                            <li>MacBook Air 15-inch</li>
                        </ul>
                        <p class="text-gray-300 mt-3 mb-3">Stay tuned for rumors, leaks, yada yada. Maybe Tim Cook will just come out and dump all the goodies out on our floor like a little kid with their halloween candy!</p>
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/wwdc23-682x384.jpg" alt="wwdc23-alt" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>

            <article id="cat4-post2" class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Apple Seeds Second Beta of macOS Ventura 13.3 to Developers</h2>
                        <p class="text-sm text-gray-400 mb-2">February 28, 2023</p>
                        <p class="text-gray-300">Apple today seeded the second beta of macOS Ventura 13.3 to developers for testing purposes, with the new software update coming two weeks after the release of the first macOS 13.3 beta.</p>
                        <p class="text-gray-300 mt-3 mb-3">Registered developers can download the beta through the Apple Developer Center and after the appropriate profile is installed, with the betas available through the Software Update mechanism in System Settings.</p>
                        <p class="text-gray-300 mt-3 mb-3">macOS Ventura‌ 13.3 adopts the same new emoji characters that are in iOS 16.4 and iPadOS 16.4, including pink heart, light blue heart, left and right hand, moose, black bird, goose, wing, jellyfish, pea pod, finger, and more.</p>
                        <p class="text-gray-300 mt-3 mb-3">The update adds the new HomeKit architecture that was initially removed from iOS 16.2 and its sister updates, and the revised version should have fewer bugs that affect ‌HomeKit‌ setups.</p>
                        <p class="text-gray-300 mt-3 mb-3">macOS Ventura‌ 13.3 will go through multiple rounds of beta testing, with Apple planning to release it in the spring.</p>
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/macOS+Ventura+Compatibility+hero.jpg" alt="Apple Glasses" class="w-full h-auto rounded-md">
                    </div>
                </div>
            </article>


            <article id="cat4-post3" class="rounded-md shadow-md bg-gray-800 p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Apple Release macOS Ventura today!</h2>
                        <p class="text-sm text-gray-400 mb-2">October 24, 2022</p>
                        <p class="text-gray-300">Praise the fruit lords! macOS Ventura is here! Huzzah! Let’s talk about the goodies and features that come with a new macOS release.</p>
                        <p class="text-gray-300 mt-3 mb-3">For starters the new macOS version is free and compatible with this list of Macs:</p>
                        <ul class="list-disc ml-12">
                            <li>2017 iMac and later</li>
                            <li>iMac Pro</li>
                            <li>2018 MacBook Air and later</li>
                            <li>2017 MacBook Pro and later</li>
                            <li>2019 Mac Pro and later</li>
                            <li>2018 Mac mini and later</li>
                            <li>2017 MacBook</li>
                        </ul>
                        <p class="text-gray-300 mt-3 mb-3">A major new feature of Ventura is Stage Manager! A fancy new way to multitask. It puts your main app front and center, tucking your other apps to the side for easy access when needed. Potentially super useful if it doesn’t end up sucking.</p>
                        <p class="text-gray-300 mt-3 mb-3">Next up is the new Continuity Camera feature. Gone are the days of needing to use your built-in Mac camera or mic for FaceTime. Continuity Camera allows you to use your iPhone as the camera. With all the image quality benefits and some sneaky new tricks, this is a killer feature for Ventura.</p>
                        <p class="text-gray-300 mt-3 mb-3">Safari is also receiving a major feature called Passkeys, which are a next-gen replacement for passwords. Passkeys never leave your device, or enter a web server and they are authenticated through Touch ID or Face ID. Massive security improvement right there.</p>
                        <!-- <a href="#" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block">Read More</a> -->
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-6">
                        <img src="assets/macOS+Ventura+Compatibility+hero.jpg" alt="iPhone 15" class="w-full h-auto rounded-md">
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