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
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body background="assets/Images/FairMap.png">
  <?php

    //restrict this query so we can output by section
    //handle letters firstSELECT Company.booth_id,Company.Name,Company_Data.url FROM Company LEFT JOIN Company_Data ON Company.booth_id=Company_Data WHERE Company LIKE 'B%';


    $booth_query = "SELECT Company.booth_id,Company.Name,Company_Data.url FROM Company LEFT JOIN Company_Data ON Company.booth_id=Company_Data.booth_id WHERE Company.booth_id LIKE :booth_id";

    $booths = array("B%","C%","D%","E%","F%","G%","H%","I%","J%","K%");

    foreach ($booths as $booth)  {

    try {
        $sth = $db->prepare($booth_query);
        $query_params = array(':booth_id' => $booth);
        $result=$sth->execute($query_params);
    }
    catch (PDOException $e) {
        // Note: On a production website, you should not output $ex->getMessage().
        // It may provide an attacker with helpful information about your code.
        die("Failed to run booth query: ");//. $e->getMessage()
    }

    //displays all information on table
    $rows = $sth->fetchAll();
    //we will change this so our query can print out the section
    echo '<div class="'. $row['booth_id'] .'">';
    foreach ($rows as $row) {
      $content = " <div>
        <a href='" . $row['url'] ."'><b>Career Site</b></a>
        <input type='submit' name='View" . $row['booth_id'] . "' value='View'/>
        <br>
        <input type='submit' name='Save" . $row['booth_id'] . "' value='Save'/>
      </div>";
      echo '<a href="#" data-html="true"
         data-toggle="popover"
         title="<b>' . $row['Name'] .'</b>"
         data-content="'.$content.'">'.$row['booth_id'].'
      </a>';
    }
    echo '</div>';
    }
  ?>
    <script>
      $(function(){
      // Enables popover #1
      $("[data-toggle=popover]").popover();

      /*
      // Enables popover #2
      $("#popover-2").popover({
          html : true,
          content: function() {
            return $("#popover-content").html();
          },
          title: function() {
            return $("#popover-title").html();
          }
      });
      */
      });
    </script>

  </body>
</html>
