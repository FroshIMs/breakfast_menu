<?php
  require('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\config\config.php');
  require('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\config\db.php');

  if(isset($_POST['delete'])){
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $delete_query = "DELETE FROM posts WHERE id = {$delete_id}";

    if(mysqli_query($conn, $delete_query)){
      header('Location: '.ROOT_URL.'');
    } else {
      echo 'ERROR: '.mysqli_error($conn);
    }
  }

//menus
  $menu_id = mysqli_real_escape_string($conn, $_GET['id']);
  $menu_query = "SELECT * FROM menu WHERE id = '.$menu_id";
  $result = mysqli_query($conn, $menu_query);
  $menu = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

// reviews
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $review_query = 'SELECT * FROM reviews ORDER BY created_at DESC';
  $result = mysqli_query($conn, $review_query);
  $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
<div class="uk-container">
  <br>

<!-- admin menu -->
<div class="uk-container">
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
      <div class="uk-card-media-left uk-cover-container">
          <img src="" alt="" uk-cover>
          <canvas width="600" height="400"></canvas>
      </div>
      <div>
          <div class="uk-card-body">
            <h1 class="uk-heading"><?php echo $menu['title']; ?></h1>
              <ul>
                <li><?php echo $menu['starch']; ?></li>
                <li><?php echo $menu['protein']; ?></li>
                <li><?php echo $menu['hot_beverage']; ?></li>
                <br>
                <br>
                <br>
                <li><small>Posted at: <?php echo $menu['created_at'] ?></small> </li>
              </ul>
              <a class="uk-button uk-button-default uk-margin-top" href="<?php echo ROOT_URL; ?>addreview.php">Add Review</a>
          </div>
      </div>
    </div>
</div>
<!-- -->
<hr>

<div class="uk-container">
  <?php foreach($reviews as $review): ?>
  <div class="uk-card uk-card-default uk-width-1-2@m">
    <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
                <img class="uk-border-circle" width="40" height="40" src="<?php echo $menu['starch'] ?>">
            </div>
            <div class="uk-width-expand">
                <h3 class="uk-card-title uk-margin-remove-bottom"><?php echo $review['author']; ?></h3>
                <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><?php echo $review['created_at']; ?></time></p>
            </div>
        </div>
    </div>
    <div class="uk-card-body">
        <p><?php echo $review['body']; ?></p>
    </div>
    <div class="uk-card-body">
        <p class=""><?php echo "Rated: ".$review['rating']; ?></p>
    </div>
    <div class="uk-card-footer">
      <a class="button button-default" href="<?php echo ROOT_URL; ?>review.php?id=<?php echo $review['id']; ?>">Read More</a>
    </div>
  </div>
  <div class="uk-margin">
    <hr class="uk-heading-line" />
  </div>
  <?php endforeach; ?>
</div>
<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
  <input type="hidden" name="id" value="<?php echo ROOT_URL; ?>review.php?id=<?php echo $review['id']; ?>">
</form>


<?php include('inc/footer.php'); ?>
