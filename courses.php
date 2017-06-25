<!DOCTYPE html>
<html>
    <head>
        <title>My Exam Timetable</title>
        <meta charset="utf-8" />

        <!-- Links to provided files.  Do not change these links -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="myexams.js"></script>

        <!-- Link to your CSS file that you should edit -->
        <link href="exams.css" type="text/css" rel="stylesheet" />
    </head>

    <body>   <!-- page body is split into #frame(#top, #bottom) -->
        <div id="frame">
            <div id="top">
                <?php require "top.html"; ?>
                </table>
            </div>
            <div id="bottom">
                <?php require "bottom.html"; ?>
            </div>
        </div>
    </body>
</html>
