<?php
  //connect to db and start session
  require("db_connect.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Career Fair Locator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body

  <?php

    //output by section
    $booth_query = "SELECT Company.booth_id,Company.Name,Company_Data.url FROM Company LEFT JOIN Company_Data ON Company.booth_id=Company_Data.booth_id";
    try{
      $sth = $db->prepare($booth_query);
      $result=$sth->execute();
    }
    catch (PDOException $e){
      // Note: On a production website, you should not output $ex->getMessage().
      // It may provide an attacker with helpful information about your code.
      die("Failed to run booth query: ");//. $e->getMessage()
    }
  ?>
</body>
</html>
