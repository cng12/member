<?php

if(isset($_POST['search']))
{
   $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
   $query = "SELECT * FROM `myguests` WHERE CONCAT(`id`, `firstname`, `lastname`, `school`) LIKE '%".$valueToSearch."%'";
   $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `myguests`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "mydb");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>

    </body>
</html>
