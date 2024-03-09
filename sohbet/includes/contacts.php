<?php
$myid = $_SESSION['userid'];
$sql = "SELECT * FROM users WHERE userid != '$myid' LIMIT 10";
$myusers = $DB->read($sql, []);

$mydata = '';

if (is_array($myusers)) {
    $msgs = array();
    $me = $_SESSION['userid'];
    $query = "SELECT * FROM messages WHERE receiver = '$me' AND received = 0";
    $mymgs = $DB->read($query, []);

    if (is_array($mymgs)) {
        foreach ($mymgs as $row2) {
            $sender = $row2->sender;

            if (isset($msgs[$sender])) {
                $msgs[$sender]++;
            } else {
                $msgs[$sender] = 1;
            }
        }
    }
    $mydata .= "<div id='inner_left_pannel' style=' display: flex; flex-wrap: wrap; padding:20px   '  >";
    foreach ($myusers as $row) {
        $mydata .= "<div style='position:relative;' userid='$row->userid'>";

  if (count($msgs) > 0 && isset($msgs[$row->userid])) {
    $mydata .= "<div  onclick='start_chat(event)'   style='width:20px; height:20px; border-radius:50%; background-color:orange;  cursor: pointer;  color:white; position:absolute; left:145px; top:0;'>".$msgs[$row->userid]."</div>";
}
        
        $image = ($row->gender == "Male") ? "ui/images/user_male.jpg" : "ui/images/user_female.jpg";
        if (file_exists($row->image)) {
            $image = $row->image;
        }
        $mydata .= "<img src='$image' style='height: 95px; width: 95px; border-radius:50%'><br>";
        $mydata .= "$row->username<br>";

        $query_check_request_receiver = "SELECT * FROM friend_requests WHERE sender_userid = '$row->userid' AND receiver_userid = '$myid'";
        $existing_request_receiver = $DB->read($query_check_request_receiver, []);

        if (is_array($existing_request_receiver) && count($existing_request_receiver) > 0 && $existing_request_receiver[0]->accepted == 1) {
           // $mydata .= "<button disabled>Arkadaşsınız</button>";
        } else {
            if (is_array($existing_request_receiver) && count($existing_request_receiver) > 0) {
                $mydata .= "<button onclick='accepted(event)' userid='$row->userid' class='accepted'   >Arkadaşlık İsteğini Kabul Et</button>";
            } 
        }

        $query_check_request_sender = "SELECT * FROM friend_requests WHERE sender_userid = '$myid' AND receiver_userid = '$row->userid' AND accepted = 1";
        $existing_request_sender = $DB->read($query_check_request_sender, []);

        $query_check_request_receiver = "SELECT * FROM friend_requests WHERE sender_userid = '$row->userid' AND receiver_userid = '$myid' AND accepted = 1";
        $existing_request_receiver = $DB->read($query_check_request_receiver, []);


        $ekleX="SELECT * FROM friend_requests WHERE   active=1";
        $ekle = $DB->read($ekleX, []);
       

        $query_check_sent_request = "SELECT * FROM friend_requests WHERE sender_userid = '$myid' AND receiver_userid = '$row->userid' AND request_status = 'sent'";
        $sent_request = $DB->read($query_check_sent_request, []);



        if ((is_array($existing_request_sender) && count($existing_request_sender) > 0) || (is_array($existing_request_receiver) && count($existing_request_receiver) > 0)) {
          
            if ( is_array($ekle) && count( $ekle)> 0) {
                $mydata .= "<button onclick='removeFriend(\"$row->userid\")' class='removeFriend'   >Arkadaşlıktan Çık</button>";
                $mydata .= "<button onclick='start_chat(event)'  class='start_chat'    >Arkadaşsınız</button>";
            }
            else if ( is_array($ekle) && count( $ekle) < 0){
                
                $mydata .= "<button onclick='sendFriendRequest(\"$row->userid\")'>Arkadaşlık İsteği Gönder</button>";

            }

        } else if (is_array($existing_request_receiver) && count($existing_request_receiver) > 0 && $existing_request_receiver[0]->request_status == 'sent') {
            $mydata .= "<button disabled> İstek Gönderildi</button>";
        } else {
            if (is_array($existing_request_receiver) && count($existing_request_receiver) > 0) {
                $mydata .= "<button onclick='accepted(event)' userid='$row->userid'      >Arkadaşlık İsteğini Kabul Et</button>";
                $mydata .= "<button onclick='removeAccepted(event)' userid='$row->userid'>Arkadaşlık İsteğini Sil</button>";
            }else {
             
                if (is_array($sent_request) && count($sent_request) > 0) {
                    $mydata .= "<button  class='sendFriendRequest'   > İstek Gönderildi</button>";
                } else {
                    $mydata .= "<button   onclick='sendFriendRequest(\"$row->userid\")' class='sendFriendRequest'    >Arkadaşlık İsteği Gönder</button>";
                }
            }
        }
        

        $mydata .= "</div>";
    }


    if(isset($_POST['remove_friend'])) {
        $myid = $_SESSION['userid'];
        $friend_userid = $_POST['friend_userid'];
    
        $query_remove_friend = "DELETE FROM friend_requests WHERE (sender_userid = '$myid' AND receiver_userid = '$friend_userid') OR (sender_userid = '$friend_userid' AND receiver_userid = '$myid')";
        $DB->write($query_remove_friend, []);
    
        echo json_encode(['success' => true]);
        exit;
    }  
}

$info = (object)[];
$info->message = $mydata;
$info->data_type = "contacts";
echo json_encode($info);
?>

