var selectedId = null;

function loadUsers() {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var users = JSON.parse(this.responseText);
            var txt = "";

            for (var i = 0; i < users.length; i++) {
                txt += users[i].id + ". " +
                       users[i].name + " - " +
                       users[i].email +
                       " <button onclick='editUser(" + users[i].id + ", \"" + users[i].name + "\", \"" + users[i].email + "\")'>Edit</button>" +
                       " <button onclick='deleteUser(" + users[i].id + ")'>Delete</button><br>";
            }

            document.getElementById("output").innerHTML = txt;
        }
    };

    xhttp.open("GET", "server.php", true);
    xhttp.send();
}

function addUser() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;

    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "server.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            loadUsers();
        }
    };

    var data = JSON.stringify({name: name, email: email});
    xhttp.send(data);
}

function editUser(id, name, email) {
    selectedId = id;
    document.getElementById("name").value = name;
    document.getElementById("email").value = email;
}

function updateUser() {
    if (selectedId == null) {
        alert("Select user first");
        return;
    }

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;

    var xhttp = new XMLHttpRequest();

    xhttp.open("PUT", "server.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            loadUsers();
            selectedId = null;
        }
    };

    var data = JSON.stringify({
        id: selectedId,
        name: name,
        email: email
    });

    xhttp.send(data);
}

function deleteUser(id) {
    var xhttp = new XMLHttpRequest();

    xhttp.open("DELETE", "server.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            loadUsers();
        }
    };

    xhttp.send();
}

loadUsers();