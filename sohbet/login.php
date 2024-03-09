<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sohbet</title>
    <link rel="stylesheet" href="kayitsignup.css">
</head>

<body>
    <div id="wrapper">
        <div id="header">
        Sohbet
            <div style="font-size: 20px; font-family: myFont;  ">Login</div>
        </div>
        <div id="error"   > text</div>
        <form action="" id="myform">
            <input type="text" name="email" placeholder="Email"><br>

            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="Login" id="login_button"><br>

            <br>
            <a href="signup.php" style="display: block;  text-align: center; text-decoration: none; " >
            Hesabınız yok mu? Buradan kaydolun
            </a>

        </form>



    </div>

</body>

</html>

<script>
    function _(element){
    return document.getElementById(element);
}

document.addEventListener("DOMContentLoaded", function () {
    var login_button = _("login_button");
    login_button.addEventListener("click", collect_data);

    // Rest of your code...
});

function collect_data(e){
    e.preventDefault();
    login_button.disabled=true;
    login_button.value="Loading...Please wait...";
 

    var myform=_("myform");
    var inputs=myform.getElementsByTagName("INPUT");
    var data ={};
    for(var i=inputs.length-1; i>=0; i--){
        var key=inputs[i].name;

        switch(key){
            
            case "email":
                data.email=inputs[i].value;
                break;
          
            case "password":
                data.password=inputs[i].value;
                break;
         
        }
    }
    send_data(data,"login"); 
}
function send_data(data,type){
    var xml = new XMLHttpRequest();
    xml.onload = function(){
        if(xml.readyState==4 || xml.status==200){
            handle_result(xml.responseText);
            login_button.disabled=false;
            login_button.value="Login";
        }
    }
        data.data_type=type;
        var data_string=JSON.stringify(data);
        xml.open("POST","api.php",true);
        xml.send(data_string);
    
}
function handle_result(result){
    var data = JSON.parse(result);
    if(data.data_type === "info"){
        window.location.href = "index.php";
    } else {
        var error = _("error");
        error.innerHTML = data.message;
        error.style.display = "block";
    }
}
</script>
