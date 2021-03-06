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
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/zone.css">
    <link rel="stylesheet" href="assets/css/rows.css">
    <link rel="stylesheet" href="assets/css/searchBar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="assets/js/rowScripts.js"></script>
  </head>
  <body ><!--background="assets/Images/FairMap.png"-->

  <!--searchbar
  Link for snippet http://bootsnipp.com/snippets/2q81r
  Originally created by maridlcrmn
  Modified by me XD
  Note to self I may not end up using this because the autocomplete is so useful
  -->

  <!--http://stackoverflow.com/questions/4871595/highlight-div-for-few-seconds-->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="input-group" id="adv-search">
                  <!-- http://www.w3schools.com/tags/tag_datalist.asp -->
                  <input id="companyInput" list="companies" name="browser" class="form-control" placeholder="Search for companies">
                      <datalist id="companies">
                          <?php insertCompanies($db); ?>
                      </datalist>
                  <div class="input-group-btn">
                      <div class="btn-group" role="group">
                          <div class="dropdown dropdown-lg">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                              <div class="dropdown-menu dropdown-menu-right" role="menu">
                                  <form class="form-horizontal" role="form">
                                      <div class="form-group">
                                          <label for="filter">Filter by</label>
                                          <select class="form-control">
                                              <option value="0" selected>All Snippets</option>
                                              <option value="1">Featured</option>
                                              <option value="2">Most popular</option>
                                              <option value="3">Top rated</option>
                                              <option value="4">Most commented</option>
                                          </select>
                                      </div>

                                      <div class="form-group">
                                          <label for="contain">Contains the words</label>
                                          <input class="form-control" type="text" />
                                      </div>
                                      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                  </form>
                              </div>
                          </div>
                          <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="container">
  <?php

  echo '<form class="" method="post" action="AdvancedDescription.php">';

  //output the zones/sections
  ouputZone($db,"Zone1",0,6);
  echo "<br><br><br>";
  ouputZone($db,"Zone2",1,12);
  echo "<br><br><br>";
  ouputZone($db,"Zone3",2,6);

  echo '</form>';
  ?>

  <!--js scripts moved to file because of increasing size -->
  </div>
  </body>
</html>
