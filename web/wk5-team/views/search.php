<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wk 5 Team</title>

</head>
<body>
<h1>SCRIPTURE SEARCH</h1>
    <a href="/wk5-team/index.php"><button>Home</button></a>
    <a href="/wk5-team/index.php/?action=insertForm"><button>Input</button></a>
    <a href="/wk5-team/index.php/?action=search"><button>Search</button></a></br>
</header>

    <form method="POST" action="index.php">
        Search by book: <input type="text" name="book_name" id="book">
        <input type="submit" name="submit" id="submit" value="Submit">

    </form>
</body>
</html>