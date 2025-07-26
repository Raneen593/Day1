<script>
fetch("http://127.0.0.1/api.php").then(r => r.json()).then(item => {
    if (!item.connection) {
        alert(item.massege);

    } else {
        item.student.forEach(t => {
                document.getElementById("h").innerHTML += "name is: " + t.name + " age :" + t.age +
                    "email:" + t.email + "<br>";
            }

        )
    }
})
</script>
<h5 id="h"></h5>