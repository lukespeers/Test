<?php
// Filename: test_s2.php
// Author:   Luke Speers
// Date:     4/20/2016

//This file contains all the php connection and query logic.
//This file is accessed by page.php to return the result of the query
//back to the risksearch.php using AJAX. 







    // get the q parameter from URL
    $q = $_REQUEST["q"];



    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "test_db");

    $mysqli = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

    /* Open a connection */
    //$mysqli = new mysqli("localhost", "admin", "password", "test_db");

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{
        //echo "successfull Connection";
    }



if($q == 1){
    //english search all
    $query = "SELECT Description_of_Risk, Liability, Property, E_O, Excess, Umbrella 
          FROM `data`
          WHERE Language = 'E'";

}elseif($q == 2){
    //french search all
    $query = "SELECT Description_of_Risk, Liability, Property, E_O, Excess, Umbrella 
          FROM `data`
          WHERE Language = 'F'";

}else{
    $query = "SELECT Description_of_Risk, Liability, Property, E_O, Excess, Umbrella 
          FROM `data`
          WHERE Description_of_Risk LIKE '%{$q}%'";
}




if ($stmt = $mysqli->prepare($query)) {

    /* execute query */
    $stmt->execute();

    /* store result */
    $stmt->store_result();

    printf("Number of Results: %d\n", $stmt->num_rows);


    $result = $mysqli->query($query);



    if ($result->num_rows > 0) {

        echo "<table><tr>
                    <th>Description of Risk/<br>Description du risque</th>
                    <th>Liability/<br>Responsibilite</th>
                    <th>Property/<br> Biens</th>
                    <th>E&O/<br>E&O</th>
                    <th>Excess/<br>Complementaire</th>
                    <th>Umbrella/<br>Umbrella</th>
                </tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {

        //show first part of table: id, description
            echo utf8_encode("<tr>
                    <td>".$row["Description_of_Risk"]."</td>");


//Liability and/or check
            $textToChange = $row["Liability"];
            $textToOutput = strlen($textToChange);
            $str1 = "";
            $str2 = "";
            $type = "";

            $andPos = strpos($textToChange, ' and ');
            $orPos = strpos($textToChange, ' or ');


            if ($andPos !== false){
                $str1 = substr($textToChange, 0, $andPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> and
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";


            }elseif ($orPos !== false){
                $str1 = substr($textToChange, 0, $orPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> or
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";

            }else{
                echo "
                    <td><a href=".$row["Liability"].">PDF</a></td>
                     ";
            }
//end of Liability and/or check

//Property and/or check
            $textToChange = $row["Property"];
            $textToOutput = strlen($textToChange);
            $str1 = "";
            $str2 = "";
            $type = "";

            $andPos = strpos($textToChange, ' and ');
            $orPos = strpos($textToChange, ' or ');


            if ($andPos !== false){
                $str1 = substr($textToChange, 0, $andPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> and
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";


            }elseif ($orPos !== false){
                $str1 = substr($textToChange, 0, $orPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> or
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";

            }else{
                echo "
                    <td><a href=".$row["Property"].">PDF</a></td>
                     ";
            }
//end of Property and/or check
//E_O and/or check
            $textToChange = $row["E_O"];
            $textToOutput = strlen($textToChange);
            $str1 = "";
            $str2 = "";
            $type = "";

            $andPos = strpos($textToChange, ' and ');
            $orPos = strpos($textToChange, ' or ');


            if ($andPos !== false){
                $str1 = substr($textToChange, 0, $andPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> and
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";


            }elseif ($orPos !== false){
                $str1 = substr($textToChange, 0, $orPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> or
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";

            }else{
                echo "
                    <td><a href=".$row["E_O"].">PDF</a></td>
                     ";
            }
//end of E_O and/or check
//Excess and/or check
            $textToChange = $row["Excess"];
            $textToOutput = strlen($textToChange);
            $str1 = "";
            $str2 = "";
            $type = "";

            $andPos = strpos($textToChange, ' and ');
            $orPos = strpos($textToChange, ' or ');


            if ($andPos !== false){
                $str1 = substr($textToChange, 0, $andPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> and
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";


            }elseif ($orPos !== false){
                $str1 = substr($textToChange, 0, $orPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> or
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";

            }else{
                echo "
                    <td><a href=".$row["Excess"].">PDF</a></td>
                     ";
            }
//end of Excess and/or check
//Umbrella and/or check
            $textToChange = $row["Umbrella"];
            $textToOutput = strlen($textToChange);
            $str1 = "";
            $str2 = "";
            $type = "";

            $andPos = strpos($textToChange, ' and ');
            $orPos = strpos($textToChange, ' or ');


            if ($andPos !== false){
                $str1 = substr($textToChange, 0, $andPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> and
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";


            }elseif ($orPos !== false){
                $str1 = substr($textToChange, 0, $orPos);
                $str2 = substr($textToChange, strlen($str1) +5, strlen($textToChange));
                echo "
                    <td>
                        <a href=".$str1.">PDF</a> or
                        <a href=".$str2.">PDF</a>
                    </td>
                    ";

            }else{
                echo "
                    <td><a href=".$row["Umbrella"].">PDF</a></td>
                     ";
            }
//end of Umbrella and/or check



            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }


    /* close statement */
    $stmt->close();
}

/* close connection */
$mysqli->close();

?>