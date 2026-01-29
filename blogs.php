<?php include("config/db.php"); ?>

<!doctype html>
<html>
  <head>
    <title>Blogs</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <header class="header">
  <div class="header-inner">

    <!-- LEFT: LOGO + TITLE -->
    <div class="header-left">
      <img src="assets/images/logo.jpg" alt="School Logo" class="logo">
      <div class="header-text">
        <h1>Gopalkrishna Pre-Primary, Primary & High School</h1>
        <p>Managed by Gopalkrishna Vidhyaprasarak Saunstha</p>
      </div>
    </div>

    <!-- RIGHT: NAVIGATION -->
    <nav class="navbar">
      <a href="index.php">Home</a>
      <a href="about.php">About Us</a>

      <div class="dropdown">
        <a class="dropdown-toggle">Curriculum ▾</a>
        <div class="dropdown-menu">
          <a href="curriculum.php#preprimary">Pre-Primary</a>
          <a href="curriculum.php#primary">Primary</a>
          <a href="curriculum.php#highschool">High School</a>
        </div>
      </div>

      <a href="gallery.php">Gallery</a>
      <a href="blogs.php" class="active">Blogs</a>
    </nav>

  </div>
</header>

    <div class="container">
      <h2 class="page-title">Blogs</h2>
      <div class="card-grid">
<?php
$result = mysqli_query($conn,
  "SELECT * FROM blogs WHERE status='published' ORDER BY created_at DESC"
);

while ($row = mysqli_fetch_assoc($result)) {
?>
  <div class="card blog"
  data-title="<?php echo htmlspecialchars($row['title']); ?>"
  data-image="uploads/blogs/<?php echo $row['image']; ?>"
  data-author="<?php echo htmlspecialchars($row['author']); ?>"
  data-content="<?php echo htmlspecialchars($row['content']); ?>"
>

  <img src="uploads/blogs/<?php echo $row['image']; ?>">
  <h3><?php echo $row['title']; ?></h3>
  <p><?php echo substr(strip_tags($row['content']), 0, 80); ?>...</p>

</div>

<?php } ?>
</div>

    </div>

    <!-- BLOG MODAL -->
    <div id="blogModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeBlogModal()">&times;</span>
        <div id="modalBody" class="modal-body">
          <!-- Content will be inserted here -->
        </div>
        <div class="modal-credit">
          <p>Written by: <span id="modalAuthor"></span></p>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="footer-content">
        <!-- SCHOOL INFO -->
        <div class="footer-section">
          <h4>Gopalkrishna High School</h4>
          <p>© 2026 All Rights Reserved</p>
          <p>Gopalkrishna Vidhyaprasarak Saunstha</p>
        </div>

        <!-- CONTACT INFO -->
        <div class="footer-section">
          <h4>Contact Us</h4>
          <p>Address: Sanquelim, Goa</p>
          <p>Phone: +91 9876543210</p>
          <p>Email: info@gvs.edu.in</p>
        </div>

        <!-- SOCIAL LINKS -->
        <div class="footer-section">
          <h4>Connect With Us</h4>

          <div class="social-icons">
          <a href="https://www.facebook.com/gopalkrishnaschool" target="_blank">
            <img src="assets/images/facebook-icon.png" alt="Facebook">
          </a>

          <a href="https://www.instagram.com/gopalkrishna_high_school" target="_blank">
            <img src="assets/images/instagram-icon.png" alt="Instagram">
          </a>

          <a href="https://wa.me/919876543210" target="_blank">
            <img src="assets/images/whatsapp-icon.png" alt="WhatsApp">
          </a>
        </div>
        </div>
      </div>
    </footer>

    <script src="assets/js/blog-modal.js"></script>
  </body>
</html>
