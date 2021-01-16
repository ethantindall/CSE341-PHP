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
    <title>CSE341 Home Page</title>

</head>
<body>
    <div id="resume">
        <div class="col1">
            <h1>Ethan Tindall</h1>
            <img src="goodpic.jpg" alt="Image of Ethan">
            <h3>About Me</h3>
            <p>I am studying at BYUI Online. My degree is Applied Technology. I am studying Web Frontend, Backend, and Computer Programming. This will be my last semester. (If I manage my time correctly!)</p> 
        </div>
        <div class="col2">
            <div class="drop-selector sel1"><h3>Interests</h3>
                <img src="image.png" class="arrow arrow1 closed" alt="Arrow">
            </div>
            <div class="drop1">
                <?php echo $_SESSION['about']; ?>
            </div>
            <div class="drop-selector sel2"><h3>Random Facts I Know</h3>
                <img src="image.png" class="arrow arrow2 closed" alt="Arrow">
            </div>            
            <div class="drop2">

                <?php echo $_SESSION['facts']; ?>

            </div>

            <a href="index.php/?action=assignments"><div class="drop-selector sel3"><h3>Visit Assignments</h3>
                <img src="image.png" class="arrow arrow3" alt="Arrow">
            </div></a>



        </div>
    </div>
</body>
</html>