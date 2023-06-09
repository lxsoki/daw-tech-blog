<?php

include('server/authentication.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Posts</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-900 text-white flex flex-col min-h-screen">
    <?php include 'header.php'; ?>
    <main class="container mx-auto px-6 py-8 flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8" id="goBackLoL" onclick="window.history.back();">
            <div class="bg-gray-800 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded inline-flex items-center mb-5 cursor-pointer">
                <span class="iconify mr-2" data-icon="mdi:arrow-left" data-inline="false" data-width="24" data-height="24"></span>
                <span>Go Back</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8" id="userPageContainer">

            <!-- uncomment this article to debug -->
            <!-- it displated the logged user information -->
            <!-- <article id="ignore-this" class="rounded-md shadow-md bg-gray-800 p-6">
                <div>user page works? :D</div>
                <h5>user email: <?= $_SESSION['auth_user']['email'] ?></h5>
                <h5>user id: <?= $_SESSION['auth_user']['id'] ?></h5>
                <h5>user name: <?= $_SESSION['auth_user']['username'] ?></h5>
            </article> -->

        </div>
    </main>
    <?php include 'footer.php'; ?>
    <script src="index.js"></script>
</body>

<!-- edit article modal -->
<div id="editRecordModal" class="fixed inset-0 hidden w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-75 z-20">
    <div class="bg-gray-700 p-8 rounded-md w-full max-w-5xl h-[500px]">
        <h2 class="text-2xl font-semibold mb-4">Edit article</h2>
        <form class="flex flex-col h-[390px] justify-evenly">
            <div class="mb-4">
                <label for="e-modal-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="e-modal-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="e-modal-message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <textarea id="e-modal-message" rows="7" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </textarea>
            </div>
            <div class="flex items-center justify-end">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-5" type="button" onclick="submitEditedRecord()" id="submitEditRecordBtn">
                    Submit
                </button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="cancelEditedRecord()" id="cancelEditRecordBtn">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("menu-toggle").addEventListener("click", () => {
        const mobileNav = document.getElementById("mobile-nav");
        mobileNav.classList.toggle("hidden");
    });

    const mainContainer = document.getElementById('userPageContainer');

    function addArticleToDom(article) {
        const nArt = document.createElement("article");
        const articleWrapper = document.createElement("div");
        const articleContentWrapper = document.createElement("div");
        const articleTitle = document.createElement("h2");
        const articleContent = document.createElement("p");
        const articleCreatedAt = document.createElement("p");
        const articleActions = document.createElement("div");
        const articleEditBtn = document.createElement("button");
        const articleDeleteBtn = document.createElement("button");
        const articleCommentsBtn = document.createElement("button");
        const editBtnIcon = document.createElement("span");
        const deleteBtnIcon = document.createElement("span");
        const commentsBtnIcon = document.createElement("span");
        articleTitle.classList.add("text-xl", "font-bold", "mb-4");
        articleContent.classList.add("break-all")
        articleCreatedAt.classList.add("text-sm", "text-gray-400", "mb-2");
        articleContentWrapper.classList.add("w-full"); //md:w-2/3
        articleWrapper.classList.add("flex", "flex-col", "md:flex-row", "items-center");
        nArt.classList.add("rounded-md", "shadow-md", "bg-gradient-to-r", "from-gray-800", "hover:bg-slate-500", "p-6", "article-added"); // og color bg-gray-800

        // article action btns
        articleActions.classList.add("flex", "flex-row", "justify-end", "items-center", "mb-[15px]", "mt-[15px]");
        articleEditBtn.classList.add("bg-gray-700", "hover:bg-gray-600", "text-white", "font-bold", "py-2", "px-4", "rounded");
        articleDeleteBtn.classList.add("bg-red-600", "hover:bg-red-700", "text-white", "font-bold", "py-2", "px-4", "rounded", "ml-4");
        articleCommentsBtn.classList.add("bg-gray-700", "hover:bg-gray-600", "text-white", "font-bold", "py-2", "px-4", "rounded", "mr-4");

        // add icons to btns
        commentsBtnIcon.classList.add("iconify");
        editBtnIcon.classList.add("iconify");
        deleteBtnIcon.classList.add("iconify");
        commentsBtnIcon.setAttribute("data-icon", "mdi:comments");
        editBtnIcon.setAttribute("data-icon", "mdi:pencil");
        deleteBtnIcon.setAttribute("data-icon", "mdi:delete");
        articleCommentsBtn.appendChild(commentsBtnIcon);
        articleEditBtn.appendChild(editBtnIcon);
        articleDeleteBtn.appendChild(deleteBtnIcon);

        mainContainer.appendChild(nArt);
        nArt.appendChild(articleWrapper);
        articleWrapper.appendChild(articleContentWrapper);
        articleContentWrapper.appendChild(articleTitle);
        articleContentWrapper.appendChild(articleCreatedAt);
        articleContentWrapper.appendChild(articleContent);
        articleContentWrapper.appendChild(articleActions);
        articleActions.appendChild(articleCommentsBtn);
        articleActions.appendChild(articleEditBtn);
        articleActions.appendChild(articleDeleteBtn);
        articleTitle.innerText = article.title;
        articleCreatedAt.innerText = `Created on ${article.created_at}`;
        articleContent.innerText = article.content;

        // article edit click handler
        articleEditBtn.addEventListener('click', () => {
            // console.log('edit article', article.id, article.userId, article.content, article.title);
            window.localStorage.setItem('editingArticle', JSON.stringify(article));
            document.getElementById('editRecordModal').classList.remove('hidden');
            document.getElementById('e-modal-title').value = article.title;
            document.getElementById('e-modal-message').value = article.content;
        });

        // article delete click handler
        articleDeleteBtn.addEventListener('click', async () => {
            console.log('delete article', article.id, article.userId, article.content, article.title);
            if (confirm('Are you sure you want to delete this article?')) {
                console.log('yes delete');
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
            } else {
                console.log('no delete');
            }
        });

        // article comment click handler
        articleCommentsBtn.addEventListener('click', () => {
            // console.log('comments btn clicked');
            window.location.href = `article-page.php?id=${article.id}`;
            window.localStorage.setItem('articleId', JSON.stringify(article));
        });
    }


    async function submitEditedRecord() {
        const articleToEdit = JSON.parse(window.localStorage.getItem('editingArticle'));
        // console.log('submit edited record', articleToEdit);
        const currentArticles = document.querySelectorAll('.article-added');
        const noArticleContainer = document.querySelector('.noArticleContainer');
        const endpoint = `server/update.php?id=${articleToEdit.id}`;
        const request = await fetch(endpoint, {
                method: 'PUT',
                body: JSON.stringify({
                    title: document.getElementById('e-modal-title').value,
                    content: document.getElementById('e-modal-message').value,
                })
            }).then(response => response.json())
            .then(data => {
                if (data.status === 200) {
                    console.log('article updated');
                    currentArticles.forEach(article => article.remove());
                    if (noArticleContainer) noArticleContainer.remove();
                    getArticlesForUser();
                    document.getElementById('editRecordModal').classList.add('hidden');
                    window.localStorage.removeItem('editingArticle');
                } else {
                    console.log('article not updated');
                }
            });
    }

    function cancelEditedRecord() {
        document.getElementById('modal-title').value = '';
        document.getElementById('modal-message').value = '';
        document.getElementById('editRecordModal').classList.add('hidden');
        window.localStorage.removeItem('editingArticle');
    }

    function addNoArticleContainerToDom() {
        const noArticleContainer = document.createElement("div");
        const noArticleTitle = document.createElement("h2");
        const noArticleMessage = document.createElement("p");
        noArticleContainer.classList.add("rounded-md", "shadow-md", "bg-gradient-to-r", "from-gray-800", "hover:bg-slate-500", "p-6", "noArticleContainer"); // og color bg-gray-800
        noArticleTitle.classList.add("text-xl", "font-bold", "mb-4");
        noArticleMessage.classList.add("text-sm", "text-gray-400", "mb-2");
        noArticleTitle.innerText = 'No articles found';
        noArticleMessage.innerText = 'You have not posted any articles yet. Click the button above to create one.';
        mainContainer.appendChild(noArticleContainer);
        noArticleContainer.appendChild(noArticleTitle);
        noArticleContainer.appendChild(noArticleMessage);
    }

    async function getArticlesForUser() {
        // user-page method
        const noArticleContainer = document.querySelector('.noArticleContainer');
        const userId = '<?= $_SESSION['auth_user']['id'] ?>';
        const endpoint = `server/getArticlesByUserId.php?id=${userId}`;
        const request = await fetch(endpoint, {
            method: 'GET'
        });
        window.localStorage.setItem('userId', userId);
        const response = await request.json();
        if (response.status === 404) {
            console.log('no articles found for this user')
        } else {
            // toDo
            // if response data is empty append an empty article container
            // similar to the comments one
            // console.log(response);
            if (response.data.length > 0) {
                if (noArticleContainer) noArticleContainer.remove();
                response.data.forEach((article) => {
                    addArticleToDom(article);
                });
            } else {
                addNoArticleContainerToDom();
            }
        }
    }
    // check if the page has loaded
    document.onreadystatechange = () => {
        if (document.readyState === "complete") {
            console.log('user-page loaded');
            window.localStorage.removeItem('articleId');
            getArticlesForUser();
        }
    }
</script>

</html>
