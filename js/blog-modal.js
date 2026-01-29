// Blog Modal Functions
function openBlogModal(title, imageUrl, author) {
  const modal = document.getElementById('blogModal');
  const modalBody = document.getElementById('modalBody');
  const modalAuthor = document.getElementById('modalAuthor');

  // Set author
  modalAuthor.textContent = author;

  // Generate full content including image and title
  const fullContent = `
    <img src="${imageUrl}" alt="Blog Image">
    <h2>${title}</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </p>
    
    <p>
      Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
      cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    
    <p>
      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa 
      quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
    </p>
    
    <p>
      Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
      voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
    </p>
    
    <p>
      At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos 
      dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.
    </p>

    <p>
      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. Itaque earum rerum hic tenetur 
      a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
    </p>
  `;

  modalBody.innerHTML = fullContent;

  // Display the modal
  modal.style.display = 'block';
  document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function closeBlogModal() {
  const modal = document.getElementById('blogModal');
  modal.style.display = 'none';
  document.body.style.overflow = 'auto'; // Re-enable background scrolling
}

// Close modal when clicking outside the modal-content
window.onclick = function(event) {
  const modal = document.getElementById('blogModal');
  if (event.target === modal) {
    closeBlogModal();
  }
}

// Allow scrolling inside modal
document.addEventListener('DOMContentLoaded', function() {
  const modalBody = document.getElementById('modalBody');
  if (modalBody) {
    modalBody.addEventListener('wheel', function(e) {
      e.stopPropagation();
    });
  }
});
