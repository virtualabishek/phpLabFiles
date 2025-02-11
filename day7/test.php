<?php

?>
<html>
<head>
<title>Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <form action="get">
        <label for="name">Name:</label>
        <input type="text" id="name">
        <input type="phone" id="mob">
        <input type="button" id="sendData" value="Submit">
        <div id="response"></div>
    </form>
</body>
<script>
    $(document).ready(function() {
        $("#sendData").click(function() {
           var name=$("#name").val();
           var  mob=$("#mob").val();
            alert(name + mob);
        })
    })
$.ajax ({
    url: "process.php",
    type: "POST",
    data: { name: name, mob:mob},
    success: function(response) {
        alert(response);
    },
    error: function() {
    alert ("Error on ajax case.")
    }

})
</script>
</html>
