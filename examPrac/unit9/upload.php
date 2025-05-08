<html>
    <head>
        <title>Upload a file</title>
    </head>
    <body>
        <h1 class="color:red">Upload a file</h1>
        <form action="test.php" method="POST" enctype="multipart/form-data">
            <label for="file">Choose a file:</label>
            <input type="file" name="Userfile">
            <input type="submit" value="upload">
        </form>
    </body>
</html>