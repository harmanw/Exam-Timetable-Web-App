
<?php
    $course = $_REQUEST['course'];
    if ($course)
    {
        require "config.php";
        $mysqlconnect = mysqli_connect($servername, $username, $password, $db);
        $q = "select * from courses where course like '" . $course . "%' order by course;";
        $res = mysqli_query($mysqlconnect, $q);
        $rows = array();
        if(mysqli_num_rows($res) > 0)
        {
            while($singlerow = mysqli_fetch_assoc($res))
            {
                $rows[] = $singlerow;
            }
            $json_format_rows = json_encode($rows);
            echo $json_format_rows;
        }
        else
        {
            header("HTTP 404 - Data not found !!!");
        }
    }
    else
    {
        header("HTTP 400 - Invalid Input !!!");
    }
?>