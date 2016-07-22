<?php

/**
 * Created by PhpStorm.
 * User: jhinchley
 * Date: 7/21/16
 * Time: 9:12 PM
 * Purpose: Form to update companies in database
 */

//connect to db and start session
require("db_connect.php");

    //restrict this query so we can output by section
    //handle letters first
    $booth_query = "INSERT INTO Company(booth_id,Name) VALUES(:booth_id,:Name)";
    $advanced_query = "INSERT INTO Company_Data(booth_id,url) VALUES(:booth_id,:url)";

    $booths = array("A","B","C","D","E","F","G","H","I","J","K","L");
    for ($tens_place=0; $tens_place<=1; $tens_place++) {

        for ($ones_place = 1; $ones_place <= 9; $ones_place++) {
            foreach ($booths as $booth) {

                try {
                    $sth = $db->prepare($booth_query);
                    $query_params = array(
                        ':booth_id' => $booth . $tens_place . $ones_place,
                        ':Name' => "Company" . $booth . $tens_place . $ones_place
                    );
                    $result = $sth->execute($query_params);

                    $sth2 = $db->prepare($advanced_query);
                    $query_params2 = array(
                        ':booth_id' => $booth . $tens_place . $ones_place,
                        ':url' => "www.google.com"
                    );
                    $result = $sth2->execute($query_params2);
                } catch (PDOException $e) {
                    // Note: On a production website, you should not output $ex->getMessage().
                    // It may provide an attacker with helpful information about your code.
                    die("Failed to run booth query: ");//. $e->getMessage()
                }
            }

        }
    }


?>