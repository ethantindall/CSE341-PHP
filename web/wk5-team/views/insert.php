<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wk 5 Team</title>

</head>
<body>
<h1>SCRIPTURE INSERT</h1>
    <a href="/wk5-team/index.php"><button>Home</button></a>
    <a href="/wk5-team/index.php/?action=insertForm"><button>Input</button></a>
    <a href="/wk5-team/index.php/?action=search"><button>Search</button></a></br>
</header>

    <form method="POST" action="/wk5-team/index.php">
        Book: <input type="text" name="book" id="book">
        Chapter: <input type="text" name="chapter" id="chapter">
        Verse: <input type="text" name="verse" id="verse">
        Content: <input type="text" name="content" id="content">

        <input type="submit" name="submit" id="submit" value="Submit">
        <input type="hidden" name="action" value="completeSearch">

    </form>
</body>
</html>