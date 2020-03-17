<?php
  $conn = mysqli_connect(BD_HOST, BD_USER, BD_PASS, BD_NAME);

  if(mysqli_connect_errno()){
    echo 'Failed to connect to mysql '. mysqli_connect_errno();
  }
