<!DOCTYPE html>
<html>
    <head>
        <title>My Exam Timetable</title>
        <meta charset="utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="myexams.js"></script>
        <link href="exams.css" type="text/css" rel="stylesheet" />
        <?php
        $id = $_REQUEST['id'];
        $courses = $_REQUEST['courses'];

        if (is_numeric($id)) {
            require "config.php";
            $mysqlconnect = mysqli_connect($servername, $username, $password, $db);

            if (is_null($courses)){     
                $q = "SELECT course, section, instructor, date, start, end FROM courses NATURAL JOIN time WHERE id = " . $id . ";";
            } else {
                $q = "(SELECT course, section, instructor, date, start, end FROM courses NATURAL JOIN time WHERE id = " . $id . ") UNION (SELECT course, section, instructor, date, start, end FROM courses NATURAL JOIN time WHERE id IN (SELECT id FROM courses WHERE course IN " . $courses . ")) order by date asc, start asc;";
            }
            $res = mysqli_query($mysqlconnect, $q);
            $rows = array();
            if (mysqli_num_rows($res) > 0)
            {
                for ( $i = 0; $i < mysqli_num_rows($res); $i++)
                {
                    $rows[] = mysqli_fetch_assoc($res);
                }
            }
            else
            {
                header("HTTP/1.1 404 page not found");
            }
        }
        else
        {
            header("HTTP/1.1 400 Invalid Request");
        }
        ?>
    </head>
    <body> 
        <div id="frame">
            <div id="top">
                <?php require "top.html"; ?>
                <?php
                    for ($i=0; $i < count($rows) ; $i++) { ?>
                        <tr> <?php
                        foreach ($rows[$i] as $singlerow) { ?>
                            <td><?= $singlerow ?></td>
                        <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div id="bottom">
                <?php require "bottom.html"; ?>
            </div>
        </div>
    </body>
</html>