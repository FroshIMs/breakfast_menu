<?php
  require('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\config\config.php');
  require('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\config\db.php');

  if(isset($_POST['delete'])){
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM reviews WHERE id = {$delete_id}";

    if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'');
    } else {
      echo 'ERROR: '.mysqli_error($conn);
    }
  }


  $review_query = 'SELECT * FROM reviews ORDER BY created_at DESC';
  $result = mysqli_query($conn, $review_query);
  $review = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);
  ?>

<?php include('inc/header.php'); ?>
      <div class="container">
        <a href="<?php echo ROOT_URL; ?>" class="btn btn-default">Back</a>
        <h1><?php echo $review['title']; ?></h1>
            <small>Created on <?php echo $review['created_at']; ?> by <?php echo $review['author']; ?> </small>
            <p><?php echo $review['body'] ?></p>
            <hr>
            <form class="pull-right" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <input type="hidden" name="delete_id" value="<?php echo $review['id']; ?>">
              <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </form>
            <a href="<?php echo ROOT_URL; ?>editreview.php?id=<?php echo $review['id']; ?>" class="btn btn-default">Edit</a>
      </div>
<?php include('inc/footer.php'); ?>
