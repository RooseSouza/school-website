document.addEventListener("DOMContentLoaded", function () {
  const blogCards = document.querySelectorAll(".card.blog");

  blogCards.forEach(card => {
    card.addEventListener("click", function () {
      openBlogModal(
        this.dataset.title,
        this.dataset.image,
        this.dataset.author,
        this.dataset.content
      );
    });
  });
});

// Modal Functions
function openBlogModal(title, imageUrl, author, content) {
  const modal = document.getElementById("blogModal");
  const modalBody = document.getElementById("modalBody");
  const modalAuthor = document.getElementById("modalAuthor");

  modalAuthor.textContent = author;

  modalBody.innerHTML = `
    <img src="${imageUrl}" alt="Blog Image">
    <h2>${title}</h2>
    <div class="blog-content">${content}</div>
  `;

  modal.style.display = "block";
  document.body.style.overflow = "hidden";
}

function closeBlogModal() {
  document.getElementById("blogModal").style.display = "none";
  document.body.style.overflow = "auto";
}

window.onclick = function (event) {
  const modal = document.getElementById("blogModal");
  if (event.target === modal) closeBlogModal();
};
