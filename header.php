<header class="bg-gray-800 shadow-md sticky">
  <nav class="container mx-auto px-6 py-4">
    <div class="flex justify-between items-center">

      <a href="index.php"
        class="text-2xl font-semibold text-indigo-500 opacity-100 animate-bounce font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">Share
        your thoughts ☺ </a>
      <div class="hidden lg:flex" id="nav-items">
        <a href="index.php" class="mx-4 text-white hover:text-gray-300">Home</a>
        <?php if (isset($_SESSION['authenticated'])): ?>
        <div class="relative inline-block">
          <a href="user-page.php" class="mx-4 text-white hover:text-gray-300 py-2">My Posts</a>
        </div>
        <?php endif?>
      </div>
      <!-- log in btn -->
      <div class="flex justify-between w-[220px]">
        <?php if (!isset($_SESSION['authenticated'])): ?>
        <button id="loginButton"
          class="bg-gradient-to-r from-gray-700 to-slate-500 text-white font-bold py-2 px-4 rounded">
          Log In
        </button>
        <?php endif?>

        <?php if (isset($_SESSION['authenticated'])): ?>
        <button id="addRecordBtn"
          class="bg-gradient-to-r from-gray-700 to-slate-500 hover:from-violet-900 hover:to-violet-700 text-white font-bold py-2 px-4 rounded">
          Add a Post
        </button>
        <button id="loginButton"
          class="bg-gradient-to-r from-gray-700 to-slate-500 hover:from-slate-900 hover:to-slate-600 text-white font-bold py-2 px-4 rounded"
          onclick=logout()>
          Log Out
        </button>
        <?php endif?>
      </div>
      <!-- log in btn ends -->
      <button class="lg:hidden focus:outline-none" id="menu-toggle">
        <span class="iconify" data-icon="mdi:menu" data-inline="false" data-width="24" data-height="24"
          data-color="white"></span>
      </button>
    </div>
    <div class="flex flex-col hidden lg:hidden mt-4 space-y-2" id="mobile-nav">
      <a href="index.php" class="mx-4 text-white hover:text-gray-300">Home</a>
      <?php if (isset($_SESSION['authenticated'])): ?>
      <div class="relative inline-block">
        <a href="user-page.php" class="mx-4 text-white hover:text-gray-300 py-2">My Posts</a>
      </div>
      <?php endif?>
    </div>
  </nav>
</header>

<!-- Log In Modal & Register Modal -->
<div id="loginModal"
  class="fixed inset-0 hidden w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-75 z-20">
  <div class="bg-gray-700 p-8 rounded-md w-full max-w-md">
    <!-- login -->
    <div id="loginContainer">
      <h2 class="text-2xl font-semibold mb-4">Log In</h2>
      <form action="server/login-logic.php" method="POST">
        <div class="mb-4">
          <label for="login-username"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
          <input type="text" id="login-username" name="name" placeholder="Enter your username (login)" type="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label for="login-email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
          <input type="email" id="login-email" name="email" placeholder="Enter your email (login)" type="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label for="login-password"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <input id="login-password" type="password" placeholder="Enter your password (login)" name="password"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="flex items-center justify-between">
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit" name="loginBtn" id="loginModalButton">
            Log In
          </button>
        </div>
      </form>
    </div>
    <!-- registration -->
    <div id="registerContainer" class="hidden">
      <h2 class="text-2xl font-semibold mb-4">Register</h2>
      <form action="server/register-logic.php" method="POST">
        <div class="mb-4">
          <label for="register-username"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
          <input type="text" id="register-username" name="username" placeholder="Enter your username (register)"
            type="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label for="register-email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
          <input type="email" id="register-email" name="email" placeholder="Enter your email (register)" type="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label for="register-password"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <input id="register-password" type="password" autocomplete='new-password'
            placeholder="Enter your password (register)" name="password"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="flex items-center justify-between">
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit" name="registerBtn" id="registerModalButton">
            Register
          </button>
        </div>
      </form>
    </div>
    <div class="mb-4 mt-4">
      <p id="registerToggle" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block cursor-pointer">Click here
        to Register</p>
      <p id="loginToggle" class="text-indigo-400 hover:text-indigo-300 mt-4 inline-block cursor-pointer hidden">Click
        here to Log In</p>
    </div>
  </div>
</div>

<!-- Add new Record Modal -->
<div id="addRecordModal"
  class="fixed inset-0 hidden w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-75 z-20">
  <div class="bg-gray-700 p-8 rounded-md w-full max-w-5xl h-[500px]">
    <h2 class="text-2xl font-semibold mb-4">Add a new article</h2>
    <form class="flex flex-col h-[390px] justify-evenly">
      <div class="mb-4">
        <label for="modal-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" id="modal-title" placeholder="Article title"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>
      <div class="mb-4">
        <label for="modal-message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
        <textarea id="modal-message" rows="7"
          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Write your thoughts here...">
                    </textarea>
      </div>
      <div class="flex items-center justify-between">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="button" onclick="submitNewRecord()" id="submitRecordBtn">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById('loginButton').addEventListener('click', function() {
  document.getElementById('loginModal').classList.remove('hidden');
});

document.getElementById('loginModal').addEventListener('click', function(event) {
  if (event.target === event.currentTarget) {
    document.getElementById('loginModal').classList.add('hidden');
  }
});

document.getElementById('loginModalButton').addEventListener('click', function() {
  document.getElementById('loginModal').classList.add('hidden');
});

document.getElementById('registerToggle').addEventListener('click', function(event) {
  document.getElementById('loginContainer').classList.add('hidden');
  document.getElementById('loginToggle').classList.remove('hidden');
  document.getElementById('registerToggle').classList.add('hidden');
  document.getElementById('registerContainer').classList.remove('hidden');
});

document.getElementById('loginToggle').addEventListener('click', function(event) {
  document.getElementById('loginContainer').classList.remove('hidden');
  document.getElementById('loginToggle').classList.add('hidden');
  document.getElementById('registerToggle').classList.remove('hidden');
  document.getElementById('registerContainer').classList.add('hidden');
});

function logout() {
  window.localStorage.removeItem('userId');
  window.location.href = "server/logout-logic.php";
}

// add new record functionality
const addRecordBtn = document.getElementById('addRecordBtn');
if (addRecordBtn) {
  addRecordBtn.addEventListener('click', function() {
    document.getElementById('addRecordModal').classList.remove('hidden');
    console.log('??')
    document.getElementById("modal-title").value = "";
    document.getElementById("modal-message").value = "";
  });
}

document.getElementById('addRecordModal').addEventListener('click', function(event) {
  if (event.target === event.currentTarget) {
    document.getElementById('addRecordModal').classList.add('hidden');
  }
});

async function submitNewRecord() {
  const title = document.getElementById("modal-title").value.trim();
  const content = document.getElementById("modal-message").value.trim();
  const modal = document.getElementById("addRecordModal");
  const currentArticles = document.querySelectorAll(".article-added");
  console.log(title, content);
  const endpoint = "server/create.php";

  await fetch(endpoint, {
    method: "POST",
    Headers: {
      Accept: 'application.json',
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      title: title,
      content: content,
    })
  }).then((response) => {
    return response.json();
  }).then((data) => {
    if (data.status === 201) {
      console.log(data);
      // check if we are on the user page
      if (window.location.pathname.includes('user-page')) {
        console.log('??????')
        currentArticles.forEach(article => article.remove());
        getArticlesForUser();
        modal.classList.add("hidden");
      } else {
        currentArticles.forEach(article => article.remove());
        getAllRecords();
        modal.classList.add("hidden");
      }
    }
  });
}

async function getArticlesForUser() {
  // header method
  const userId = window.localStorage.getItem('userId');
  const endpoint = `server/getArticlesByUserId.php?id=${userId}`;
  const request = await fetch(endpoint, {
    method: 'GET'
  });
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

function addArticleToDom(article) {
  const nArt = document.createElement("article");
  const articleWrapper = document.createElement("div");
  const articleContentWrapper = document.createElement("div");
  const articleTitle = document.createElement("h2");
  const articleContent = document.createElement("p");
  const articleAuthor = document.createElement("p");
  const articleCreatedAt = document.createElement("p");

  articleTitle.classList.add("text-xl", "font-bold", "mb-4");
  articleCreatedAt.classList.add("text-sm", "text-gray-400", "mb-2");

  articleContent.classList.add("text-gray-300", "mt-2");
  articleAuthor.classList.add("text-sm", "text-indigo-400", "mb-2", "mt-2");
  articleContentWrapper.classList.add("w-full", "md:w-2/3");
  articleWrapper.classList.add("flex", "flex-col", "md:flex-row", "items-center");
  nArt.classList.add("rounded-md", "shadow-md", "bg-gradient-to-r", "from-gray-800", "hover:bg-slate-500", "p-6",
    "article-added"); // bg-gray-800 or color
  articlesMainPage.appendChild(nArt);
  nArt.appendChild(articleWrapper);
  articleWrapper.appendChild(articleContentWrapper);
  articleContentWrapper.appendChild(articleTitle);
  articleContentWrapper.appendChild(articleCreatedAt);
  articleContentWrapper.appendChild(articleContent);
  articleContentWrapper.appendChild(articleAuthor);

  if (window.location.pathname === '/daw-tech-blog/' || window.location.pathname === '/daw-tech-blog/index.php') {
    const readMore = document.createElement("a");
    readMore.classList.add("text-sm", "text-gray-400", "mb-2");
    articleContentWrapper.appendChild(readMore);
    readMore.innerText = "Read more";
    readMore.href = `article-page.php?id=${article.id}`;

    readMore.addEventListener("click", (e) => {
      window.localStorage.setItem('articleId', JSON.stringify(article));
    })
  }

  articleTitle.innerText = article.title;
  articleCreatedAt.innerText = `Created on ${article.created_at}`;
  articleContent.innerText = article.content;
  articleAuthor.innerText = `Author: ${article.username}`;
}


async function getAllRecords() {
  console.log('clicked get all');
  const endpoint = "server/getAll.php";
  const response = await fetch(endpoint, {
    method: "GET",
  });
  const reqData = await response.json();
  console.log(reqData);
  reqData.data.forEach((record) => {
    addArticleToDom(record);
  });
}
</script>