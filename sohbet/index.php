<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOHBET</title>
    <link rel="stylesheet" href="./style.css">
    <style>

      
    </style>
</head>

<body>
    <div id="wrapper">

        <div id="left_pannel">
            <div id="user_info" style="    padding: 10px;">
                <img id="profile_image" src="ui/images/user_male.jpg" alt="">
                <br>
                <span id="username">Username</span>
                <br>
                <span id="email" style="font-size: 12px; opacity: 0.5; ">email@gmail.com</span>
                <br>
                <br>
                <br>
                <div>
                    <label id="label_chat" for="radio_chat">Sohbet <img src="ui/icons/chat.png" alt=""> </label>
                    <label id="label_contacts" for="radio_contacts">Kişiler <img src="ui/icons/contacts.png" alt=""></label>
                    <label id="label_settings" for="radio_settings">Ayarlar <img src="ui/icons/settings.png" alt=""></label>
                    <label id="logout" for="radio_logout">Çıkış <img src="ui/icons/iconx.jpg" alt=""></label>


                </div>
            </div>

        </div>
        <div id="right_pannel">
            <div id="header">
            <div id="loader_holder" class="loader_on"><img style="width: 70px;" src="ui/icons/giphy.gif" alt=""> </div>
                <div id="image_viewer" class="image_off" onclick="close_image(event)" ></div>
                Sohbet</div>
            <div id="container" style="display: flex;"  >


                <div id="inner_left_pannel">
                   
                </div>
                <input type="radio" id="radio_chat" name="myradio" style="display: none;">
                <input type="radio" id="radio_contacts" name="myradio" style="display: none;">
                <input type="radio" id="radio_settings" name="myradio" style="display: none;">
                <div id="inner_right_pannel"></div>
            </div>
        </div>
    </div>



</body>

</html>
<script>



function sendFriendRequest(userid) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            alert(response.message);
            var sendButton = document.querySelector("button[onclick='sendFriendRequest(\"" + userid + "\")']");
            if (sendButton) {
                sendButton.innerHTML = "İstek Gönderildi";
                sendButton.disabled = true; 
            }
        }
    };
    xhttp.open("POST", "friend_request.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("friend_userid=" + userid);
}





function accepted(event) {
    var userid = event.target.getAttribute("userid");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            alert(response.message);

            event.target.innerHTML = "Arkadaşsınız";
            event.target.disabled = true;
            
            var friendRequestButton = document.querySelector("button[userid='" + userid + "']");
            if (friendRequestButton) {
                friendRequestButton.innerHTML = "Arkadaş İsteği Gönderildi";
                friendRequestButton.disabled = true;
            }
        }
    };
    xhttp.open("POST", "accept_friend_request.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("friend_userid=" + userid);
}


function removeFriend(userid) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            alert(response.message);

            var friendRequestButton = document.querySelector("button[onclick='removeFriend(\"" + userid + "\")']");
            if (friendRequestButton) {
                friendRequestButton.innerHTML = "Arkadaşlık İsteği Gönder";
            }
        }
    };
    xhttp.open("POST", "remove_friend.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("friend_userid=" + userid);
}




</script>

<script src="api.js"></script>