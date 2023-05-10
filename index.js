document.getElementById("menu-toggle").addEventListener("click", () => {
  const mobileNav = document.getElementById("mobile-nav");
  mobileNav.classList.toggle("hidden");
});

const articlesMainPage = document.getElementById("mainContainer");

document.onreadystatechange = () => {
  if (document.readyState === "complete") {
    // init app code after page has finished loading
    console.log('page loaded');
    getAllRecords();
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
  const readMore = document.createElement("a");
  articleTitle.classList.add("text-xl", "font-bold", "mb-4");
  articleCreatedAt.classList.add("text-sm", "text-gray-400", "mb-2");
  readMore.classList.add("text-sm", "text-gray-400", "mb-2");
  articleContent.classList.add("text-gray-300", "mt-2", "truncate");
  articleAuthor.classList.add("text-sm", "text-indigo-400", "mb-2", "mt-2");
  articleContentWrapper.classList.add("w-full", "md:w-2/3");
  articleWrapper.classList.add("flex", "flex-col", "md:flex-row", "items-center");
  nArt.classList.add("rounded-md", "shadow-md", "bg-gradient-to-r", "from-gray-800", "hover:bg-slate-500", "p-6", "article-added"); // bg-gray-800 or color
  articlesMainPage.appendChild(nArt);
  nArt.appendChild(articleWrapper);
  articleWrapper.appendChild(articleContentWrapper);
  articleContentWrapper.appendChild(articleTitle);
  articleContentWrapper.appendChild(articleCreatedAt);
  articleContentWrapper.appendChild(articleContent);
  articleContentWrapper.appendChild(articleAuthor);
  articleContentWrapper.appendChild(readMore);
  articleTitle.innerText = article.title;
  articleCreatedAt.innerText = `Created on ${article.created_at}`;
  articleContent.innerText = article.content;
  articleAuthor.innerText = `Author: ${article.username}`;
  readMore.innerText = "Read more";
  readMore.href = `article-page.php?id=${article.id}`;

  readMore.addEventListener("click", (e) => { 
    // e.preventDefault();
    window.localStorage.setItem('articleId', JSON.stringify(article));
  })
}


async function getAllRecords() {
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

function addRecord() {
  // console.log('clicked add record');
}

async function submitNewRecord() {
  const title = document.getElementById("modal-title").value.trim();
  const content = document.getElementById("modal-message").value.trim();
  const modal = document.getElementById("addRecordModal");
  const currentArticles = document.querySelectorAll(".article-added");
  console.log(title, content);
  const endpoint = "server/create.php";

  fetch(endpoint, {
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
      currentArticles.forEach(article => article.remove());
      getAllRecords();
      modal.classList.add("hidden");
    }
  });
}