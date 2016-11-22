<?php
  //connect to db and start session
    require("db_connect.php");
    include("zoneFunctions.php");
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
  <body background="assets/Images/FairMap.svg">

  <?php

  //output by section
  $booth_query = "SELECT Company.booth_id,Company.Name,Company_Data.url FROM Company LEFT JOIN Company_Data ON Company.booth_id=Company_Data.booth_id WHERE Company.booth_id BETWEEN :start_booth_id AND :end_booth_id";

  $zone1 = array(
      //top row
      array("050","059"),
      array("060","070"),
      array("071","080"),

      //bottom row
      array("A01","A03"),
      array("A04","A07"),
      array("A08","A11"),
      array("A12","A14"));

  $zone2 = array(
      //exterior right
      array("081","108"),

      //middle rows right to left
      array("B01","B17"),
      array("C01","C17"),
      array("D01","D17"),
      array("E01","E17"),
      array("F01","F17"),
      array("G01","G17"),
      array("H01","H17"),
      array("I01","I17"),
      array("J01","J17"),
      array("K01","K17"),

      //exterior left
      array("49","22")

  );

  $zone3 = array(
      //top row
      array("L01","L03"),
      array("L04","L12"),
      array("L13","L15"),

      //bottom row
      array("021","012"),
      array("011","001"),
      array("118","109"),
  );



  echo '<form method="post" action="AdvancedDescription.php">';

  ouputZone($db,$booth_query,"Zone1",$zone1);
  ouputZone($db,$booth_query,"Zone2",$zone2);
  ouputZone($db,$booth_query,"Zone3",$zone3);

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