<?php
include("../config/db.php");

if (isset($_POST['save'])) {

  $title = $_POST['title'];
  $content = $_POST['content'];
  $author = $_POST['author'];
  $section = $_POST['section'];
  $status = $_POST['status'];

  $imageName = time() . "_" . $_FILES['image']['name'];
  move_uploaded_file(
    $_FILES['image']['tmp_name'],
    "../uploads/blogs/" . $imageName
  );

  mysqli_query($conn,
    "INSERT INTO blogs (title, content, image, author, section, status)
     VALUES ('$title','$content','$imageName','$author','$section','$status')"
  );

  echo "Blog saved";
}
?>

<form method="post" enctype="multipart/form-data">

  <input type="text" name="title" placeholder="Blog Title" required><br><br>

  <textarea name="content" placeholder="Blog Content" rows="8" required></textarea><br><br>

  <input type="text" name="author" placeholder="Author Name" required><br><br>

  <select name="section" required>
    <option value="">Select Section</option>
    <option value="preprimary">Pre-Primary</option>
    <option value="primary">Primary</option>
    <option value="highschool">High School</option>
  </select><br><br>

  <select name="status">
    <option value="draft">Draft</option>
    <option value="published">Published</option>
  </select><br><br>

  <input type="file" name="image" required><br><br>

  <button name="save">Save Blog</button>

</form>
