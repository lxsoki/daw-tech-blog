const articlesMainPage = document.getElementById("mainContainer");

document.getElementById("menu-toggle").addEventListener("click", () => {
  const mobileNav = document.getElementById("mobile-nav");
  mobileNav.classList.toggle("hidden");
});

document.onreadystatechange = () => {
  if (document.readyState === "complete") {
      console.log('page loaded');
      getAllRecords();
  }
}

function addArticleToDom(article) {
  const nArt = document.createElement("article");
  const articleWrapper = document.createElement("div");
  const articleContentWrapper = document.createElement("div");
  const articleH2 = document.createElement("h2");
  const articleP1 = document.createElement("p");
  const articleP2 = document.createElement("p");
  articleH2.classList.add("text-xl", "font-bold", "mb-4");
  articleContentWrapper.classList.add("w-full", "md:w-2/3");
  articleWrapper.classList.add("flex", "flex-col", "md:flex-row", "items-center");
  nArt.classList.add("rounded-md", "shadow-md", "bg-gray-800", "p-6", "article-added");
  articlesMainPage.appendChild(nArt);
  nArt.appendChild(articleWrapper);
  articleWrapper.appendChild(articleContentWrapper);
  articleContentWrapper.appendChild(articleH2);
  articleContentWrapper.appendChild(articleP1);
  articleContentWrapper.appendChild(articleP2);
  articleH2.innerText = article.title;
  articleP1.innerText = article.content;
  articleP2.innerText = 'placeholder text';
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
    // console.log(record);
    addArticleToDom(record);
  });
}

function addRecord() {
  console.log('clicked add record');
}

async function submitNewRecord() {
  const title = document.getElementById("modal-title").value;
  const content = document.getElementById("modal-message").value;
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