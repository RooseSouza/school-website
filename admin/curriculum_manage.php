<?php
include("../config/db.php");
include("auth_check.php");

$section = $_GET['section'] ?? 'preprimary';

$query = mysqli_query($conn,
  "SELECT * FROM curriculum WHERE section='$section' LIMIT 1"
);
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Curriculum</title>
  <script src="https://cdn.tiny.cloud/1/9k6s4ufvmdth4pf39krlc3p4x2753ga6m7wic4hcforyom0l/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
  <script>
    tinymce.init({
      selector: '#content',
      height: 400
    });
  </script>
</head>

<body>
<h2>Manage Curriculum</h2>

<form method="post" action="curriculum_save.php">
  <label>Select Section:</label>
  <select name="section" onchange="location='?section='+this.value">
    <option value="preprimary" <?= $section=='preprimary'?'selected':'' ?>>Pre-Primary</option>
    <option value="primary" <?= $section=='primary'?'selected':'' ?>>Primary</option>
    <option value="highschool" <?= $section=='highschool'?'selected':'' ?>>High School</option>
  </select>

  <br><br>

  <textarea id="content" name="content">
    <?= $data['content'] ?? '' ?>
  </textarea>

  <br>

  <?php if ($data): ?>
    <p><small>Last updated: <?= $data['updated_at'] ?></small></p>
  <?php endif; ?>

  <button type="submit">Save Curriculum</button>
</form>

</body>
</html>
