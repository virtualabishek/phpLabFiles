<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Using PHP...</title>
  </head>
  <body>
    <h1>CRUD Operation</h1>
    <ol>
      <li>Create</li>
      <div>
        <p>Instering || Adding data to the db</p>
        <form action="craud.php" method="post">
          <label for="name">Name: </label>
          <input type="text" name="name" />
          <br />
          <br />
          <label for="Class">Class: </label>
          <input type="number" name="class" />
          <br />
          <br />
          <label for="email">Email: </label>
          <input type="email" name="email" />
          <br />
          <br />
          <input type="submit" value="submit" />
          <br />
          <br />
        </form>
      </div>
      <li>Read</li>
      <div></div>
      <li>Updated</li>
      <div></div>
      <li>Delete</li>
      <div></div>
    </ol>
  </body>
</html>
