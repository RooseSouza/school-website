<?php
include("../config/db.php");

if (isset($_POST['save'])) {

  $title = $_POST['title'];
  $description = $_POST['description'];
  $category = $_POST['category'];

  // Insert event
  mysqli_query($conn,
    "INSERT INTO gallery_events (title, description, category)
     VALUES ('$title','$description','$category')"
  );

  $event_id = mysqli_insert_id($conn);

  // Upload multiple images
  foreach ($_FILES['images']['name'] as $key => $name) {

    $imgName = time() . "_" . $name;
    move_uploaded_file(
      $_FILES['images']['tmp_name'][$key],
      "../uploads/gallery/" . $imgName
    );

    mysqli_query($conn,
      "INSERT INTO gallery_images (event_id, image)
       VALUES ($event_id, '$imgName')"
    );
  }

  echo "Gallery event added";
}
?>

<form method="post" enctype="multipart/form-data">
  <input type="text" name="title" placeholder="Event Title" required><br><br>

  <textarea name="description" placeholder="Event Description"></textarea><br><br>

  <select name="category" required>
    <option value="">Select Category</option>
    <option value="preprimary">Pre-Primary</option>
    <option value="primary">Primary</option>
    <option value="highschool">High School</option>
  </select><br><br>

  <input type="file" name="images[]" multiple required><br><br>

  <button name="save">Save Event</button>
</form>
