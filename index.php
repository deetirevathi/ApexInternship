<?php
session_start();
include 'config.php';

// Fetch posts
$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY created_at DESC");
?>

<h1>Blog Posts</h1>
<?php if(isset($_SESSION['username'])): ?>
  <p>Welcome, <?php echo $_SESSION['username']; ?> | <a href="logout.php">Logout</a></p>
  <a href="create.php">Add New Post</a>
<?php else: ?>
  <p><a href="login.php">Login</a> | <a href="register.php">Register</a></p>
<?php endif; ?>

<?php while($row = mysqli_fetch_assoc($result)): ?>
  <h2><?php echo $row['title']; ?></h2>
  <p><?php echo $row['content']; ?></p>
  <small>Posted on <?php echo $row['created_at']; ?></small><br>
  <?php if(isset($_SESSION['username'])): ?>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
  <?php endif; ?>
  <hr>
<?php endwhile; ?>