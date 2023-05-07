<?php

include('server/authentication.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple News Aggregator</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-900 text-white flex flex-col min-h-screen">
    <?php include 'header.php'; ?>
    <main class="container mx-auto px-6 py-8 flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8" id="userPageContainer">
            <article id="ignore-this" class="rounded-md shadow-md bg-gray-800 p-6">
                <div>user page works? :D</div>
                <h5>user email: <?= $_SESSION['auth_user']['email'] ?></h5>
                <h5>user id: <?= $_SESSION['auth_user']['id'] ?></h5>
                <h5>user name: <?= $_SESSION['auth_user']['username'] ?></h5>
            </article>
        </div>
    </main>
</body>

<script>
    const mainContainer = document.getElementById('userPageContainer');

    function addArticleToDom(article) {
        console.log(article);
        const nArt = document.createElement("article");
        const articleWrapper = document.createElement("div");
        const articleContentWrapper = document.createElement("div");
        const articleTitle = document.createElement("h2");
        const articleContent = document.createElement("p");
        const articleCreatedAt = document.createElement("p");
        const articleActions = document.createElement("div");
        const articleEditBtn = document.createElement("button");
        const articleDeleteBtn = document.createElement("button");
        articleTitle.classList.add("text-xl", "font-bold", "mb-4");
        articleCreatedAt.classList.add("text-sm", "text-gray-400", "mb-2");
        articleContentWrapper.classList.add("w-full"); //md:w-2/3
        articleWrapper.classList.add("flex", "flex-col", "md:flex-row", "items-center");
        nArt.classList.add("rounded-md", "shadow-md", "bg-gradient-to-r", "from-gray-800", "hover:bg-slate-500", "p-6", "article-added"); // og color bg-gray-800

        // article action btns
        articleActions.classList.add("flex", "flex-row", "justify-end", "items-center");
        articleEditBtn.classList.add("bg-gray-700", "hover:bg-gray-600", "text-white", "font-bold", "py-2", "px-4", "rounded");
        articleDeleteBtn.classList.add("bg-red-700", "hover:bg-red-600", "text-white", "font-bold", "py-2", "px-4", "rounded", "ml-4");
        articleEditBtn.innerText = "Edit";
        articleDeleteBtn.innerText = "Delete";


        mainContainer.appendChild(nArt);
        nArt.appendChild(articleWrapper);
        articleWrapper.appendChild(articleContentWrapper);
        articleContentWrapper.appendChild(articleTitle);
        articleContentWrapper.appendChild(articleCreatedAt);
        articleContentWrapper.appendChild(articleContent);
        articleContentWrapper.appendChild(articleActions);
        articleActions.appendChild(articleEditBtn);
        articleActions.appendChild(articleDeleteBtn);
        articleTitle.innerText = article.title;
        articleCreatedAt.innerText = `Created on ${article.created_at}`;
        articleContent.innerText = article.content;

        articleEditBtn.addEventListener('click', () => {
            console.log('edit article', article.id, article.userId, article.content, article.title);
        });

        articleDeleteBtn.addEventListener('click', async () => {
            console.log('delete article', article.id, article.userId, article.content, article.title);
            const endpoint = `server/delete.php?id=${article.id}`;
            const request = await fetch(endpoint, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 200) {
                        console.log('article deleted');
                        // remove article from dom
                        nArt.remove();
                    } else {
                        console.log('article not deleted');
                    }
                });

        });
    }



    async function getArticlesForUser() {
        // user-page method
        const userId = '<?= $_SESSION['auth_user']['id'] ?>';
        const endpoint = `server/getArticlesById.php?id=${userId}`;
        const request = await fetch(endpoint, {
            method: 'GET'
        });
        window.localStorage.setItem('userId', userId);
        const response = await request.json();
        if (response.status === 404) {
            console.log('no articles found for this user')
        } else {

            console.log(response);
            response.data.forEach((article) => {
                addArticleToDom(article);
            });
        }
    }
    // check if the page has loaded
    document.onreadystatechange = () => {
        if (document.readyState === "complete") {
            console.log('page loaded');
            getArticlesForUser();
        }
    }
</script>

</html>