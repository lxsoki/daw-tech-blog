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
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8" id="goBackLoL" onclick="goBack()">
            <div class="bg-gray-800 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded inline-flex items-center mb-5 cursor-pointer">
                <span class="iconify mr-2" data-icon="mdi:arrow-left" data-inline="false" data-width="24" data-height="24"></span>
                <span>Go Back</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8" id="articleContainer">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8 mt-5" id="addComentContainer">
            <form>
                <label for="sendCommentInput" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Comment</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"></path>
                        </svg>
                    </div>
                    <input type="text" id="sendCommentInput" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment...">
                    <button type="button" onclick="sendComment()" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
                </div>
            </form>
        </div>
        <div class="flex flex-row justify-center mb-5 mt-5">
            <h2 class="text-2xl font-semibold mb-4">Latest Comments</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700" id="articleCommentsContainer">
                <!-- li elements will be generated dynamically from the API results -->
            </ul>
        </div>
    </main>
    <?php include 'footer.php'; ?>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
</body>

<script>
    // check if the page has loaded
    document.onreadystatechange = () => {
        if (document.readyState === "complete") {
            console.log('article page loaded');
            console.log(localStorage.getItem('articleId'));

            getArticleDetails();
        }
    }
    const commentsContainer = document.getElementById('articleCommentsContainer');
    const articleContainer = document.getElementById('articleContainer');

    function sendComment() {
        console.log(document.getElementById('sendCommentInput').value);
    }

    async function getArticleDetails() {
        const article = JSON.parse(localStorage.getItem('articleId'));
        const articleId = article.id;
        const endpoint = `server/getArticleDetails.php?id=${articleId}`;
        appendArticleToDom(article);
        const request = await fetch(endpoint, {
            method: 'GET'
        });
        const response = await request.json();
        console.log(response);
        if (response.data.length > 0) {
            console.log('comments found');
            response.data.forEach((comment) => {
                appendCommentsToDom(comment);
            });
        } else {
            console.log('no comments found :(');
            appendNoCommentContainer();
        }
    }

    function appendNoCommentContainer() {
        const noComments = document.createElement("div");
        const noCommentsSubtitle = document.createElement("p");
        noComments.classList.add("flex", "flex-col", "items-center", "justify-center", "text-gray-400", "text-xl", "font-semibold", "mt-5");
        noCommentsSubtitle.classList.add("text-md", "text-gray-400", "mt-2");
        noComments.innerText = "No comments found :( ";
        noCommentsSubtitle.innerText = "Be the first to leave a comment!";
        commentsContainer.appendChild(noComments);
        noComments.appendChild(noCommentsSubtitle);
    }

    function appendArticleToDom(article) {

        const nArt = document.createElement("article");
        const articleWrapper = document.createElement("div");
        const articleContentWrapper = document.createElement("div");
        const articleTitle = document.createElement("h2");
        const articleContent = document.createElement("p");
        const articleCreatedAt = document.createElement("p");

        articleTitle.classList.add("text-xl", "font-bold", "mb-4");
        articleContent.classList.add("break-all")
        articleCreatedAt.classList.add("text-sm", "text-gray-400", "mb-2");
        articleContentWrapper.classList.add("w-full"); //md:w-2/3
        articleWrapper.classList.add("flex", "flex-col", "md:flex-row", "items-center");
        nArt.classList.add("rounded-md", "shadow-md", "bg-gradient-to-r", "from-gray-800", "hover:bg-slate-500", "p-6", "article-added"); // og color bg-gray-800

        articleContainer.appendChild(nArt);
        nArt.appendChild(articleWrapper);
        articleWrapper.appendChild(articleContentWrapper);
        articleContentWrapper.appendChild(articleTitle);
        articleContentWrapper.appendChild(articleCreatedAt);
        articleContentWrapper.appendChild(articleContent);

        articleTitle.innerText = article.title;
        articleCreatedAt.innerText = `Created on ${article.created_at}`;
        articleContent.innerText = article.content;

    }

    function appendCommentsToDom(comment) {
        console.log(comment);
        console.log(commentsContainer);
        const liElement = document.createElement("li");
        const liContainer = document.createElement("div");
        const authorContainer = document.createElement("div");
        const userNameP = document.createElement("p");
        const userEmailP = document.createElement("p");
        const commentContent = document.createElement("div");
        const commentCreatedAt = document.createElement("div");

        // liElement.classList.add("pb-3", "sm:pb-4" , "border-solid", "border:gray-100", "dark:border-gray-600");
        liElement.classList.add("border-solid", "border-2", "border-gray-600", "rounded", "bg-gray-800", "mb-2");
        liContainer.classList.add("flex", "items-center", "space-x-4");
        authorContainer.classList.add("p-[10px]", "min-w-0");
        userNameP.classList.add("text-sm", "font-medium", "text-gray-900", "truncate", "dark:text-white");
        userEmailP.classList.add("text-sm", "text-gray-500", "truncate");
        commentContent.classList.add("flex-1", "break-all");
        commentCreatedAt.classList.add("inline-flex", "items-center", "text-base", "p-[10px]", "font-semibold", "text-gray-900", "dark:text-white");

        commentsContainer.appendChild(liElement);
        liElement.appendChild(liContainer);
        liContainer.appendChild(authorContainer);
        authorContainer.appendChild(userNameP);
        authorContainer.appendChild(userEmailP);
        liContainer.appendChild(commentContent);
        liContainer.appendChild(commentCreatedAt);

        userNameP.innerText = comment.username;
        userEmailP.innerText = comment.email || 'no email';
        commentContent.innerText = comment.comment;
        commentCreatedAt.innerText = moment(comment.created_at).fromNow();

    }

    function goBack() {
        window.history.back();
    }
</script>