<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sohbet 48447</title>
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
                    <label id="label_contacts" for="radio_contacts">kişiler <img src="ui/icons/contacts.png" alt=""></label>
                    <label id="label_settings" for="radio_settings">ayarlar <img src="ui/icons/settings.png" alt=""></label>
                    <label id="logout" for="radio_logout">Çıkış <img src="ui/icons/logout.png" alt=""></label>


                </div>
            </div>

        </div>
        <div id="right_pannel">
            <div id="header">
            <div id="loader_holder" class="loader_on"><img style="width: 70px;" src="ui/icons/giphy.gif" alt=""> </div>
                <div id="image_viewer" class="image_off" onclick="close_image(event)" ></div>
                Sohbet 48447</div>
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
<script src="./ap.js" ></script>

