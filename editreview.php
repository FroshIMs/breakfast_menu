<?php
  require('config/config.php');
  require('config/db.php');

  if(isset($_POST['submit'])){
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author= mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);

    $query = "UPDATE reviews SET
                title = '$title',
                author = '$author',
                body = '$body',
                rating = '$rating'
              WHERE  id = {$update_id}";

    if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'');
    } else {
      echo 'ERROR: '.mysqli_error($conn);
    }
  }

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $query = 'SELECT * FROM reviews WHERE id = '.$id;

  $result = mysqli_query($conn, $query);

  $review = mysqli_fetch_assoc($result);
  //var_dump($posts);

  mysqli_free_result($result);

  mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>

      <div class="uk-container">
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <fieldset class="uk-fieldset">
            <h1 class="uk-heading">Edit Review</h1>

              <div class="uk-margin">
                <label for="label">Title</label>
                  <input class="uk-input" type="text" name="title" value="<?php echo $review['title']; ?>">
              </div>

              <div class="uk-margin">
                <label for="labek">Author</label>
                  <input class="uk-input" type="text" name="author" value="<?php echo $review['author']; ?>">
              </div>

              <div class="uk-margin">
                <label>Body</label>
                  <textarea class="uk-textarea" name="body" rows="5" placeholder=""><?php echo $review['body']; ?></textarea>
              </div>

              <div class="uk-margin">
                <label for="label">Rating</label>
                  <select class="uk-select" name="rating" required>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                  </select>
              </div>

              <input type="hidden" name="update_id" value="<?php echo $review['id']; ?>">
              <input type="submit" name="submit" value="Update" class="uk-button uk-button-primary uk-margin-right">
              <a href="<?php echo ROOT_URL; ?>" class="uk-button uk-button-secondary uk-margin-left">Cancel</a>

          </fieldset>
      </form>
      </div>
<?php include('inc/footer.php'); ?>
