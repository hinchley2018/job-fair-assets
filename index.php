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
  </head>
  <body>
  <?php

    $query = "SELECT booth_id FROM ScantronInv";

    try {
        $sth = $db->prepare($query);
        $result=$sth->execute();
    }
    catch (PDOException $e) {
        // Note: On a production website, you should not output $ex->getMessage().
        // It may provide an attacker with helpful information about your code.
        die("Failed to run query: ");//. $ex->getMessage()
    }

    //displays all information on table
    $rows = $sth->fetchAll();
  ?>
    <a href="http://www.w3schools.com">
      <img border="0" alt="W3Schools" src="assets/Images/FairMap.png" width="1000" height="1000">
    </a>
  </body>
</html>
