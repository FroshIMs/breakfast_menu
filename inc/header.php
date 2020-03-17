<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit-icons.min.js"></script>
</head>
<body>
  <?php
    $navi = array('Home' => '', 'Add Review' => 'addreview.php');
   ?>
  <div id="app">
    <template>
      <div class="uk-sticky" uk-sticky>
        <v-app-bar
          color="deep-purple accent-4"
          dense
          dark
        >
          <v-app-bar-nav-icon></v-app-bar-nav-icon>

          <v-toolbar-title>Breakfast Menu</v-toolbar-title>

          <v-spacer></v-spacer>

          <?php foreach($navi as $key => $value): ?>
            <a class="uk-link-text" href="<?php echo ROOT_URL.$value; ?>">
              <v-list-item-title class="uk-margin-right"><?php echo $key; ?></v-list-item-title>
            </a>
          <?php endforeach; ?>

          <v-btn icon>
            <v-icon>mdi-magnify</v-icon>
          </v-btn>

          <v-menu
            left
            bottom
          >
            <template v-slot:activator="{ on }">
              <v-btn icon v-on="on">
                <v-icon>mdi-dots-vertical</v-icon>
              </v-btn>
            </template>

            <v-list>
              <v-list-item
                v-for="n in 5"
                :key="n"
                @click="() => {}"
              >
                <v-list-item-title>Option {{ n }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-app-bar>
      </div>
    </template>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
    })
  </script>
</body>
</html>
