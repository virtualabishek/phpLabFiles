<?php 
$dbConnect = new mysqli("localhost", "root", "imp2083", "exampleDB");
if($dbConnect->connect_error) {
    die("Connection Error Found and Connection Error Number is: ".$dbConnect->connect_errno." and
    Error is: ". $dbConnect->connect_error);
}
$sql = "SELECT * FROM testBooks ORDER BY title";
$result = $dbConnect->query($sql);

?>
<html>
    <head>
        <title>Display Table</title>
    </head>
    <body>
        <h1>Displaying table data</h1>
        <table cellspacing="2" cellpadding="2" align="center" border="1">
            <tr>
                <th align="center">Title</th>
                <th align="center">Year Published</th>
                <th align="center">ISBN</th>
            </tr>
            <tr>
                <?php 
                // Fetch Assoc stores all the id or values or rows of a table.
                while ($row = $result->fetch_assoc()) { ?>
    
                
                ?>
                <td>
                    <?php 
                    echo stripslashes($row['Title']);
                    ?>
                </td>
                <td>
                    <?php 
                    echo $row['Year_Published'];
                    ?>
                </td>
                <td>
                    <?php 
                    echo $row['ISBN'];
                    ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>