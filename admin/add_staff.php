<?php
include("../config/db.php");

if (isset($_POST['save'])) {

  $name = $_POST['name'];
  $designation = $_POST['designation'];
  $subject = $_POST['subject'];

  $photoName = time() . "_" . $_FILES['photo']['name'];
  move_uploaded_file(
    $_FILES['photo']['tmp_name'],
    "../uploads/staff/" . $photoName
  );

  $sql = "INSERT INTO staff (name, designation, subject, photo)
          VALUES ('$name','$designation','$subject','$photoName')";

  mysqli_query($conn, $sql);
  echo "Staff added successfully";
}
?>

<form method="post" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Name" required><br><br>
  <input type="text" name="designation" placeholder="Designation" required><br><br>
  <input type="text" name="subject" placeholder="Subject" required><br><br>
  <input type="file" name="photo" required><br><br>
  <button name="save">Save</button>
</form>
