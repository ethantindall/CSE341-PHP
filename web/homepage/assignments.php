<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <style><?php include "main.css" ?></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="main.js"></script>
    <title>CSE341 Assignments Page</title>

</head>
<body>
    <div id="resume">
        <div class="col1">
            <h1>Assignments</h1>
        </div>
        <div class="col2">
            <ul>
                <?php echo $_SESSION["assignmentList"]; ?>

            </ul>

        </div>
    </div>
</body>
</html>