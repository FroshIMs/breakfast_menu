<?php
  require('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\config\config.php');
  require('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\config\db.php');

  // logout
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: login.php');
    exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit-icons.min.js"></script>
  <link rel="stylesheet" href="css\styles.css">

</head>
<body>
  <?php include('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\inc\header.php'); ?>
  <a class="uk-link-text uk-margin-left" href="<?php echo ROOT_URL; ?>admin\">Sign Out</a>

  <?php

    if(isset($_POST['submit'])){
      $starch = mysqli_real_escape_string($conn, $_POST['starch']);
      $protein = mysqli_real_escape_string($conn, $_POST['protein']);
      $hot_beverage = mysqli_real_escape_string($conn, $_POST['hot_beverage']);

      $query = "INSERT INTO menu(starch, protein, hot_beverage) VALUES('$starch', '$protein', '$hot_beverage')";

      if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'');
      } else {
        echo 'ERROR: '.mysqli_error($conn);
      }
    }

  ?>

        <div class="uk-container">
          <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset class="uk-fieldset">
              <h1 class="uk-heading">Add New Menu</h1>

                <div class="uk-margin">
                  <label for="label">Starch</label>
                    <input class="uk-input" type="text" name="starch" placeholder="Starch">
                </div>

                <div class="uk-margin">
                  <label for="label">Protein</label>
                    <input class="uk-input" type="text" name="protein" placeholder="Protein">
                </div>

                <div class="uk-margin">
                  <label for="label">Hot Beverage</label>
                    <select class="uk-select" name="rating" required>
                        <option>--None--</option>
                        <option>Soup</option>
                        <option>Porridge</option>
                        <option>Tea</option>
                    </select>
                </div>

                <input type="submit" name="submit" value="Submit" class="uk-button uk-button-primary">

            </fieldset>
        </form>
        </div>



  <?php include('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\inc\footer.php'); ?>
</body>
</html>
