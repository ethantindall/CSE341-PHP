<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "main.css" ?></style>
    <style><?php include "button.css" ?></style>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <title>Strata SHIP</title>

</head>
<body>
    <header>   
        <div class="bar topbar"></div>

        <div class="slantedbar"><h1>Spectra Helpdesk Inventory Program</h1></div>
        <div class="bar bottombar"></div>

    </header>

    <main>
        
        <form method="POST" action="/wk3/index.php">
            <div>
                <label>Select company: </label>
                <input type="radio" name="company" value="Strata">Strata</input>
                <input type="radio" name="company" value="Spectra">Spectra</input>
            </div>
            <div>
            <label>Search By:</label>
            <select name="searchBy" onclick="check()" id="searchBy">
                <option value="name">Name</option>
                <option value="checked-out">Checked Out</option>
                <option value="sticker-id">Sticker ID</option>
                <option value="location">Location</option>
            </select>
            </div>

            <input type="text" id="searchParameter" name="searchParameter">
            <input id="search" type="submit" value="Search">
            <input required type="hidden" name="action" value="searchDatabase">
        </form>
        <div class="display-area"><p>Search Results Here</p></div>
    </main>
   
    <footer>

    </footer>
    <script src="script.js"></script>
</body>
</html>