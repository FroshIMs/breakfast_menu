<?php
  require('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\config\config.php');
  require('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\config\db.php');

  session_start();

  $errors = array();
  $username = "";
  $password = "";


  // if user clicks on the login button
  if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


      $query = 'SELECT * FROM admin';
      $result = mysqli_query($conn, $query);
      $admin = mysqli_fetch_all($result, MYSQLI_ASSOC);
      var_dump($admin);
      mysqli_free_result($result);
      mysqli_close($conn);


          //login success
          $_SESSION['id'] = $admin['id'];
          $_SESSION['username'] = $admin['username'];
          // set flash message
          $_SESSION['message'] = "You are now logged in!";
          $_SESSION['alert-class'] = "alert-success";
          header('location: dashboard.php');
          exit();

    }



?>

<?php include('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\inc\header.php'); ?>

      <br>
      <br>
      <br>
      <div class="uk-container uk-card uk-card-default uk-card-body uk-width-1-7@m">
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <fieldset class="uk-fieldset">
            <h1 class="uk-heading">Admin Login</h1>

            <?php if(count($errors) > 0): ?>
                <v-alert type="warning">
                  <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                  <?php endforeach; ?>
                </v-alert>
            <?php endif; ?>

              <div class="uk-margin">
                <label for="label">Username</label>
                  <input class="uk-input" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
              </div>

              <div class="uk-margin">
                <label for="label">Password</label>
                  <input class="uk-input" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
              </div>

              <input type="submit" name="login" value="Login" class="uk-button uk-button-primary">

          </fieldset>
      </form>
      </div>



<?php include('C:\Users\Shema\Downloads\XAMPP\XAMPP\htdocs\breakfast-menu\inc\footer.php'); ?>
