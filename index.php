<?php
  require('config/config.php');
  require('config/db.php');


  $menu_query = 'SELECT * FROM menu ORDER BY created_at DESC';
  $result = mysqli_query($conn, $menu_query);
  $menus = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);
?>


  <!-- <?php $menu = array('Starch' => 'https://images.unsplash.com/photo-1541961152178-0077098ff937?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=784&q=80', 'Protein' => 'https://cdn.pixabay.com/photo/2017/09/28/18/13/bread-2796393_960_720.jpg', 'Hot Beverage' => 'https://images.unsplash.com/photo-1560106426-c90ed1729664?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60' );
    ?> -->

<?php include('inc/header.php'); ?>

      <div class="uk-container">

        <div uk-slideshow="autoplay: true">

          <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 4:1; animation: push">
            <ul class="uk-slideshow-items">
                <li>
                    <img src="<?php echo $menu['Starch']; ?>" alt="" uk-cover>
                </li>
                <li>
                    <img src="<?php echo $menu['Protein']; ?>" alt="" uk-cover>
                </li>
                <li>
                    <img src="<?php echo $menu['Hot Beverage']; ?>" alt="" uk-cover>
                </li>
            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
        </div>
      </div>


      <h1 class="uk-header">Menu</h1>
      <small>
        <?php
          echo date('m/d/Y h:i:s a');
        ?>
     </small>

      <div class="uk-margin">
        <hr class="uk-heading-line" />
      </div>

      <div uk-switcher="animation: uk-animation-fade; toggle: > *">
          <button class="uk-button uk-button-default" type="button">Today's Menu</button>
          <button class="uk-button uk-button-default" type="button">Yesterday's Menu</button>
          <button class="uk-button uk-button-default" type="button">Last Week's Menu</button>
      </div>

      <ul class="uk-switcher uk-margin">
        <?php foreach($menus as $menu): ?>
          <li>
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
                          <a class="uk-button uk-button-default uk-margin-top" href="<?php echo ROOT_URL; ?>review.php?id=<?php echo $menu['id']; ?>">View Reviews</a>
                          <a class="uk-button uk-button-default uk-margin-top" href="<?php echo ROOT_URL; ?>addreview.php">Add Review</a>
                      </div>
                  </div>
                </div>

            </div>
            <!-- -->
          </li>
          <?php endforeach; ?>
          <li>No menu yet.</li>
          <li>No menu yet.</li>
      </ul>

<?php include('inc/footer.php'); ?>
