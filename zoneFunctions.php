<?php

/**
 * Created by PhpStorm.
 * User: jhinchley
 * Date: 11/22/16
 * Time: 5:16 PM
 */

function ouputZone($db,$zoneName, $zone, $zoneLimit){
    //do special formatting here
    echo '
    <div class="'.$zoneName.'">';
    for ($section = 0; $section < $zoneLimit; $section++) {
        $booth_query = "SELECT Company.booth_id,Company.Name, Company.SubSection, Company_Data.url FROM Company LEFT JOIN Company_Data ON Company.booth_id=Company_Data.booth_id WHERE Company.Section=:section AND Company.SubSection=:subsection";


        try{
            $sth = $db->prepare($booth_query);
            $query_params = array(':section'=>$zone,
                ':subsection'=>$section
                );

            $result=$sth->execute($query_params);
        }
        catch (PDOException $e){
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("Failed to run booth query: ");//. $e->getMessage()
        }

        $rows = $sth->fetchAll();
        //var_dump($rows);
        $className = "h";
        if ($zone == 1){
            $className = "v";
        }
        echo '
        <div class="'.$className.'" id="'. $section .'">';
        foreach ($rows as $row) {
            $content = " <div >
            <a href='http://" . $row['url'] ."'><b>Career Site</b></a>
            <br>
            <input class='btn' type='submit' name='View" . $row['booth_id'] . "' value='View'/>
            
            <input class='btn' type='submit' name='Save" . $row['booth_id'] . "' value='Save'/>
          </div>";
            echo '<a href="#" data-html="true" data-toggle="popover" title="<b>' . $row['Name'] .'</b>" data-content="'.$content.'">'.$row['booth_id'].'
          </a>';
        }
        echo '    </div>';
    }



    echo '</div>';
}

function insertCompanies($db){
    $companyQuery = "SELECT booth_id,Name FROM Company";
    try{
        $sth = $db->prepare($companyQuery);

        $result=$sth->execute();
    }
    catch (PDOException $e){
        // Note: On a production website, you should not output $ex->getMessage().
        // It may provide an attacker with helpful information about your code.
        die("Failed to run booth query: ");//. $e->getMessage()
    }

    $rows = $sth->fetchAll();
    foreach ($rows as $row) {
        echo '<option id="'.$row['booth_id'].'" value="'.$row['Name'].'">';
    }
}