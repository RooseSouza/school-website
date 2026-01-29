<?php
include("../config/db.php");

$id = $_GET['id'];

$blog = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM blogs WHERE id=$id")
);

if (isset($_POST['update'])) {

  $title = $_POST['title'];
  $content = $_POST['content'];
  $author = $_POST['author'];
  $section = $_POST['section'];
  $status = $_POST['status'];

  $sql = "UPDATE blogs SET
            title='$title',
            content='$content',
            author='$author',
            section='$section',
            status='$status'
          WHERE id=$id";

  mysqli_query($conn, $sql);

  header("Location: blogs.php");
}
?>

<form method="post">
  <input type="text" name="title" value="<?php echo $blog['title']; ?>"><br><br>

  <textarea name="content" rows="8"><?php echo $blog['content']; ?></textarea><br><br>

  <input type="text" name="author" value="<?php echo $blog['author']; ?>"><br><br>

  <select name="section">
    <option value="preprimary" <?php if($blog['section']=='preprimary') echo 'selected'; ?>>Pre-Primary</option>
    <option value="primary" <?php if($blog['section']=='primary') echo 'selected'; ?>>Primary</option>
    <option value="highschool" <?php if($blog['section']=='highschool') echo 'selected'; ?>>High School</option>
  </select><br><br>

  <select name="status">
    <option value="draft" <?php if($blog['status']=='draft') echo 'selected'; ?>>Draft</option>
    <option value="published" <?php if($blog['status']=='published') echo 'selected'; ?>>Published</option>
  </select><br><br>

  <button name="update">Update Blog</button>
</form>
