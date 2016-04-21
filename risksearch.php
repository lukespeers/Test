<?php
// Filename: risksearch.php
// Author:   Luke Speers
// Date:     4/20/2016

//This file allows you to search and view risk results. It uses AJAX to 
//return the query results from test_s2.php. This file also contains the 
//styling for the table.

?>

<html>
<head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #4CAF50;
        color: white;
    }
</style>





<script>
function showResults(str) {
    if (str.length == 0) { 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtResult").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "test_s2.php?q=", true);
        xmlhttp.send();
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtResult").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "test_s2.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
</head>



<body>
    <h1>Risk Lookup Application</h1>
    <p><b>Start by typing in a keyword, or nothing to browse results:</b></p>

<form> 
    <input type="button" id="btnEnglish" onclick="showResults(1)" value="English"/>
    <input type="button" id="btnFrench" onclick="showResults(2)" value="French"/>
    Search: <input id="searchString" type="text"/>
    <input type="button" id="myBtn" onclick="showResults(searchString.value)" value="Search"/>
</form>

    <p><br><span id="txtResult"></span></p>

</body>
</html>