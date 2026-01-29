<?php include("config/db.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Gallery | Gopalkrishna High School</title>
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

      <a href="gallery.php" class="active">Gallery</a>
      <a href="blogs.php">Blogs</a>
    </nav>

  </div>
</header>

    <div class="container">
      <h2 class="page-title">Gallery</h2>

      <div class="gallery-filter">
  <button class="filter-btn active" data-filter="all">All</button>
  <button class="filter-btn" data-filter="preprimary">Pre-Primary</button>
  <button class="filter-btn" data-filter="primary">Primary</button>
  <button class="filter-btn" data-filter="highschool">High School</button>
</div>


      <?php
$events = mysqli_query($conn,
  "SELECT * FROM gallery_events WHERE status=1 ORDER BY id DESC"
);

while ($event = mysqli_fetch_assoc($events)) {

  $event_id = $event['id'];
  $images = mysqli_query($conn,
    "SELECT * FROM gallery_images WHERE event_id=$event_id"
  );
?>
<section class="section" data-category="<?php echo $event['category']; ?>">

  <h2><?php echo $event['title']; ?></h2>
  <p><?php echo $event['description']; ?></p>

  <div class="carousel">
    <button class="nav-btn prev">❮</button>

    <div class="carousel-track-container">
      <div class="carousel-track">
        <?php while ($img = mysqli_fetch_assoc($images)) { ?>
          <img src="uploads/gallery/<?php echo $img['image']; ?>">
        <?php } ?>
      </div>
    </div>

    <button class="nav-btn next">❯</button>
  </div>

  <div class="thumbnails">
    <?php
    mysqli_data_seek($images, 0);
    while ($img = mysqli_fetch_assoc($images)) {
    ?>
      <img src="uploads/gallery/<?php echo $img['image']; ?>">
    <?php } ?>
  </div>

</section>
<?php } ?>


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

    <script src="assets/js/gallery.js"></script>
  </body>
</html>
