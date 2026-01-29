<?php
include("../config/db.php");
include("auth_check.php");

$section = $_POST['section'];
$content = $_POST['content'];

$check = mysqli_query($conn,
  "SELECT id FROM curriculum WHERE section='$section'"
);

if (mysqli_num_rows($check) > 0) {
  // Update
  mysqli_query($conn,
    "UPDATE curriculum SET content='$content' WHERE section='$section'"
  );
} else {
  // Insert
  mysqli_query($conn,
    "INSERT INTO curriculum (section, content)
     VALUES ('$section', '$content')"
  );
}

header("Location: curriculum_manage.php?section=$section");
exit;
