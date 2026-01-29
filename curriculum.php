<?php
include("config/db.php");
function getCurriculum($conn, $section) {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT content, updated_at FROM curriculum WHERE section = ? LIMIT 1"
    );
    mysqli_stmt_bind_param($stmt, "s", $section);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

$pre  = getCurriculum($conn, 'preprimary');
$pri  = getCurriculum($conn, 'primary');
$high = getCurriculum($conn, 'highschool');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Curriculum</title>
  <link rel="stylesheet" href="assets/css/style.css">
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
        <a class="dropdown-toggle" class="active">Curriculum ▾</a>
        <div class="dropdown-menu">
          <a href="curriculum.php#preprimary">Pre-Primary</a>
          <a href="curriculum.php#primary">Primary</a>
          <a href="curriculum.php#highschool">High School</a>
        </div>
      </div>

      <a href="gallery.php">Gallery</a>
      <a href="blogs.php">Blogs</a>
    </nav>

  </div>
</header>

  <div class="container">
  <h2 class="page-title">Curriculum</h2>

  <!-- PRE-PRIMARY -->
  <div id="preprimary" class="section curriculum-section">
    <h2>Pre-Primary Curriculum</h2>

    <?= $pre['content'] ?? '<p>Curriculum content coming soon.</p>' ?>

    <?php if (!empty($pre['updated_at'])): ?>
      <p class="last-updated">
        <small>Last updated: <?= date("d M Y", strtotime($pre['updated_at'])) ?></small>
      </p>
    <?php endif; ?>
  </div>

  <!-- PRIMARY -->
  <div id="primary" class="section curriculum-section">
    <h2>Primary Curriculum</h2>

    <?= $pri['content'] ?? '<p>Curriculum content coming soon.</p>' ?>

    <?php if (!empty($pri['updated_at'])): ?>
      <p class="last-updated">
        <small>Last updated: <?= date("d M Y", strtotime($pri['updated_at'])) ?></small>
      </p>
    <?php endif; ?>
  </div>

  <!-- HIGH SCHOOL -->
  <div id="highschool" class="section curriculum-section">
    <h2>High School Curriculum</h2>

    <?= $high['content'] ?? '<p>Curriculum content coming soon.</p>' ?>

    <?php if (!empty($high['updated_at'])): ?>
      <p class="last-updated">
        <small>Last updated: <?= date("d M Y", strtotime($high['updated_at'])) ?></small>
      </p>
    <?php endif; ?>
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

  <script src="assets/js/main.js"></script>
</body>

</html>