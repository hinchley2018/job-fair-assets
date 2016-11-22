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

    //output by section
    $booth_query = "SELECT Company.booth_id,Company.Name,Company_Data.url FROM Company LEFT JOIN Company_Data ON Company.booth_id=Company_Data.booth_id WHERE Company.booth_id BETWEEN :start_booth_id AND :end_booth_id";

    $booths = array(array("B01","B17"),
        array("C01","C17"),
        array("D01","D17"),
        array("E01","E17"),
        array("F01","F17"),
        array("G01","G17"),
        array("H01","H17"),
        array("I01","I17"),
        array("J01","J17"),
        array("K01","K17")/*,
        array("L01","L17"),array("L01","L17"),array("L01","L17"),

        array("001","011"),
        array("012","015"),
        array("016","021"),
        array("022","025"),
        array("026","045"),
        array("046","049"),
        array("050","055"),
        array("056","059"),
        array("060","070"),
        array("071","076"),
        array("077","080"),
        array("081","084"),
        array("085","104"),
        array("105","108"),
        array("109","112"),
        array("113","115"),
        array("116","118")*/
    );
    echo '<form method="post" action="AdvancedDescription.php">';

    //do special formatting here
    echo '
    <div class="A">';
    $special_booths = array(array("A01","A03"),
        array("A04","A07"),
        array("A08","A11"),
        array("A12","A14"));
    foreach ($special_booths as $special_booth){
      try{
        $sth = $db->prepare($booth_query);
        $query_params = array(':start_booth_id'=>$special_booth[0],
          'end_booth_id'=>$special_booth[1]);
        $result=$sth->execute($query_params);
      }
      catch (PDOException $e){
        // Note: On a production website, you should not output $ex->getMessage().
        // It may provide an attacker with helpful information about your code.
        die("Failed to run booth query: ");//. $e->getMessage()
      }
    }
      $rows = $sth->fetchAll();
      echo '
      <div class="'. $special_booth[0] .'">';
      foreach ($rows as $row) {
        $content = " <div>
          <a href='http://" . $row['url'] ."'><b>Career Site</b></a>
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
      echo '    </div>';


    echo '</div>';


    //normal formatting
    foreach ($booths as $booth)  {

      try {
          $sth = $db->prepare($booth_query);
          $query_params = array(':start_booth_id' => $booth[0],
                  ':end_booth_id' => $booth[1]);
          $result=$sth->execute($query_params);
      }
      catch (PDOException $e) {
          // Note: On a production website, you should not output $ex->getMessage().
          // It may provide an attacker with helpful information about your code.
          die("Failed to run booth query: ");//. $e->getMessage()
      }

      //displays all information on table
      $rows = $sth->fetchAll();
      //section the booths by angles
      echo '<div class="'. $booth[0] .'">';
      foreach ($rows as $row) {
        $content = " <div>
          <a href='http://" . $row['url'] ."'><b>Career Site</b></a>
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

    echo '</form>';
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
