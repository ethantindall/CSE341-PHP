<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wk 5 Team</title>

</head>
<body>
    <form method="POST" action="/wk5-team">
        Book: <input type="text" name="book" id="book">
        Chapter: <input type="text" name="chapter" id="chapter">
        Verse: <input type="text" name="verse" id="verse">
        Content: <input type="text" name="content" id="content">

        <input type="submit" name="submit" id="submit" value="Submit">
        <input required type="hidden" name="action" value="addToDatabase">
    </form>
</body>
</html>