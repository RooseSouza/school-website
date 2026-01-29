<?php
include("../config/db.php");

// Publish / Unpublish
if (isset($_GET['toggle'])) {
  $id = $_GET['toggle'];

  mysqli_query($conn,
    "UPDATE blogs
     SET status = IF(status='published','draft','published')
     WHERE id=$id"
  );

  header("Location: blogs.php");
  exit;
}

$result = mysqli_query($conn, "SELECT * FROM blogs ORDER BY created_at DESC");
?>

<h2>Manage Blogs</h2>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>Title</th>
    <th>Section</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo ucfirst($row['section']); ?></td>
    <td>
      <strong style="color:<?php echo $row['status']=='published'?'green':'orange'; ?>">
        <?php echo ucfirst($row['status']); ?>
      </strong>
    </td>
    <td>
      <a href="blogs.php?toggle=<?php echo $row['id']; ?>">
        <?php echo $row['status']=='published'?'Unpublish':'Publish'; ?>
      </a> |
      <a href="edit_blog.php?id=<?php echo $row['id']; ?>">Edit</a> |
      <a href="delete_blog.php?id=<?php echo $row['id']; ?>"
         onclick="return confirm('Delete this blog?')">Delete</a>
    </td>
  </tr>
<?php } ?>
</table>
