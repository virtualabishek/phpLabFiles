<?php

?>
<html>
<head>
<title>Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <form action="post">
        <label for="name">Name:</label>
        <input type="text" id="name">
        <br><br><br>
        <label for="mob">Mobile</label>
        <input type="phone" id="mob">
        <input type="button" id="sendData" value="Submit">
        <div id="response"></div>
    </form>
</body>
<script>
$(document).ready(function() {
    $("#sendData").click(function() {
        var name = $("#name").val();
        var mob = $("#mob").val();

        $.ajax({
            url: "process.php",
            type: "POST",
            data: { name: name, mob: mob },
            success: function(response) {
                var data = JSON.parse(response);
                $("#response").html("Name: " + data.name + "<br>Mobile: " + data.mob);
            },
            error: function() {
                $("#response").html("Error occurred");
                alert("You did something wrong! Go and die.");
            }
        });
    });
});
</script>
</html>
