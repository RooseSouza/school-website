<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h2>Welcome to Admin Dashboard</h2>

<ul>
    <li><a href="add_blog.php">Add Blog</a></li>
    <li><a href="blogs.php">Manage Blogs</a></li>
    <li><a href="add_staff.php">Add Staff</a></li>
    <li><a href="add_gallery.php">Add Gallery Image</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<h3>Curriculum Management</h3>
<ul>
  <li><a href="curriculum_manage.php?section=preprimary">Pre-Primary Curriculum</a></li>
  <li><a href="curriculum_manage.php?section=primary">Primary Curriculum</a></li>
  <li><a href="curriculum_manage.php?section=highschool">High School Curriculum</a></li>
</ul>


</body>
</html>
