j query
js
ajax

jquery is advance and easy form of js.
ajax is sending request from the client.

jquery format.

document.ready(function() {....})

document.ready()

data from input

````<script>
    var name = $("")```
    $(document).ready(function() {
        $("#sendData").click(function() {
            name=$("#name).val();
            mob=$("#name).val();
            alert(name + mobile);
        })
    })
</script>
```


FOr ajax

$.ajax ({
url:
'process.php",

type = "POST",
data: {
    {name: name, mob=mob}
},
success: function(response) {
    alert(response);
},
error: function() {
    alert ("Error in ajax case.)
}
})
````

Keep data at csv at excel and print it or keep at database.
