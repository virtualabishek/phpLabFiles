<!DOCTYPE html>
<html>
  <head>
    <title>CSV Files</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@300&display=swap");
      body {
        font-family: Poppins, "sans-serif";
        background-color: aqua;
      }
      h1 {
        text-align: center;
      }
      .csvUpload {
        border: 2px black solid;
        border-width: 4px;
        padding: 15px;
      }
      button {
        background-color: skyblue;
        color: blue;
        border: 2px gray dashed;
      }
    </style>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  </head>
  <body>
    <form action="/phpLab/main.php" method="post">
      <h1>CSV Reader</h1>
      <div class="csvUpload">
        <label for="csvDetail">Upload a CSV</label>
        <br />
        <input type="file" name="csvFile" accept=".csv" />
        <br />
        <br />
        <div class="buttonClass">
          <button type="submit">Submit</button>
          <button type="reset">Cancel</button>
        </div>
      </div>
    </form>
    <!-- Showing data from database. -->
<?php 
// Already writtem function.
  // If you want to access db,
  //  use this mysqli () pass 4 parameters.
  // server, user, passwr,
$HostAddress = "localhost";
$DbUSer = "root";
$DbPassword = "imp2083";
$DbName = "exampleDB";
  $conn = new mysqli($HostAddress, $DbUSer, $DbPassword, $DbName);
  // Using PDO, Class.
  // Connection Checking
  // Predefine function
  // K aaucha sabai tya hunxa,
  if($conn->connect_error) {  
    die ("Error Found at: ".$conn->connect_error);
  }
  else {
    echo "Connected Successfully!";
  }
  // $connection = $conn->connect_error;
  // echo $connection;
  // if($connection) {  
  //   die ("Error Found at: ".$connection);
  // }
  // else {
  //   echo "Connected Successfully!";
  // }
  // MYSQL
  // JSON
  //MYSQl.
// To perform any operation we need query.
// $insertSquery = "INSERT INTO courseStudents VALUES (1, "Ram"
  $sql = "SELECT* FROM courseStudents ORDER BY id";
  $result = $conn->query($sql);
  
  if($result->num_rows >0) {
    // perform operation
      echo '<div class="max-w-6xl mx-auto mt-8 px-4">';
        echo '<h2 class="text-xl font-semibold mb-4">Student Records</h2>';
        echo '<div class="overflow-x-auto">';
        echo '<table class="min-w-full bg-white border border-gray-200">';
        echo '<thead class="bg-gray-100">';
        echo '<tr>';
        echo '<th class="py-2 px-4 border-b">ID</th>';
        echo '<th class="py-2 px-4 border-b">First Name</th>';
        echo '<th class="py-2 px-4 border-b">Last Name</th>';
        echo '<th class="py-2 px-4 border-b">Phone</th>';
        echo '<th class="py-2 px-4 border-b">Email</th>';
        echo '<th class="py-2 px-4 border-b">Age</th>';
        echo '<th class="py-2 px-4 border-b">Degree</th>';
        echo '<th class="py-2 px-4 border-b">Course</th>';
        echo '<th class="py-2 px-4 border-b">Joined Date</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.htmlspecialchars($row["id"]).'</td>';
          echo '<td>'.htmlspecialchars($row["fname"]).'</td>;
          echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
  }
  else {
    echo "There is no item on the table. Or Some Error Occured.";
  }
  $conn->close();
  
?>
  </body>
</html>


