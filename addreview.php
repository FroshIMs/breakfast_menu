<?php
  require('config/config.php');
  require('config/db.php');

  if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author= mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);

    $query = "INSERT INTO reviews(title, author, body, rating) VALUES('$title', '$author', '$body', '$rating')";

    if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'');
    } else {
      echo 'ERROR: '.mysqli_error($conn);
    }
  }

?>

<?php include('inc\header.php') ?>

      <div class="uk-container">
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <fieldset class="uk-fieldset">
            <h1 class="uk-heading">Add Review</h1>

              <div class="uk-margin">
                <label for="label">Title</label>
                  <input class="uk-input" type="text" name="title" placeholder="Review Title">
              </div>

              <div class="uk-margin">
                <label for="labek">Author</label>
                  <input class="uk-input" type="text" name="author" placeholder="Username">
              </div>

              <div class="uk-margin">
                <label>Body</label>
                  <textarea class="uk-textarea" name="body" rows="5" placeholder="Enter Review"></textarea>
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

              <input type="submit" name="submit" value="Submit" class="uk-button uk-button-primary">

          </fieldset>
      </form>
      </div>
<?php include('inc/footer.php'); ?>
