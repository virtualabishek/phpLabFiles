<!DOCTYPE html>
<html>
  <head>
    <title>Parsing CSV Into Database</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  </head>
  <body>
    <h1 class="text-center p-5 text-3xl">Parsing CSV File</h1>
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-lg font-semibold mb-4">Upload CSV File</h2>
      <form
        id="csvUploadForm"
        class="space-y-4"
        method="post"
        enctype="multipart/form-data"
        action="/phpLab/day10/main.php"
      >
        <input
          type="file"
          name="csvFile"
          accept=".csv"
          class="block w-full border rounded p-2"
          required
        />
        <div class="flex space-x-2">
          <button
            type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
          >
            Submit
          </button>
          <button
            type="button"
            id="resetBtn"
            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
          >
            Reset
          </button>
          <button
            type="button"
            id="cancelBtn"
            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
          >
            Cancel
          </button>
        </div>
      </form>
    </div>

    <?php
    // Database connection
    $conn = new mysqli("localhost", "root", "imp2083", "exampleDB");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from database
    $sql = "SELECT * FROM test  Students ORDER BY id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
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
        
        while($row = $result->fetch_assoc()) {
            echo '<tr class="hover:bg-gray-50">';
            echo '<td class="py-2 px-4 border-b">' . htmlspecialchars($row["id"]) . '</td>';
            echo '<td class="py-2 px-4 border-b">' . htmlspecialchars($row["fname"]) . '</td>';
            echo '<td class="py-2 px-4 border-b">' . htmlspecialchars($row["lname"]) . '</td>';
            echo '<td class="py-2 px-4 border-b">' . htmlspecialchars($row["phone"]) . '</td>';
            echo '<td class="py-2 px-4 border-b">' . htmlspecialchars($row["email"]) . '</td>';
            echo '<td class="py-2 px-4 border-b">' . htmlspecialchars($row["age"]) . '</td>';
            echo '<td class="py-2 px-4 border-b">' . htmlspecialchars($row["degree"]) . '</td>';
            echo '<td class="py-2 px-4 border-b">' . htmlspecialchars($row["course"]) . '</td>';
            echo '<td class="py-2 px-4 border-b">' . htmlspecialchars($row["joined_date"]) . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="max-w-md mx-auto mt-8 p-4 bg-yellow-100 text-yellow-700 rounded">';
        echo 'No records found in the database.';
        echo '</div>';
    }

    $conn->close();
    ?>
  </body>
</html>