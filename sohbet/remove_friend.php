<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mychat_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$myid = $_SESSION['userid']; 
$friend_userid = $_POST['friend_userid'];


$query = "UPDATE friend_requests SET active = 0, accepted = 0, sender_userid = 0, receiver_userid = 0 WHERE (sender_userid = '$myid' AND receiver_userid = '$friend_userid') OR (sender_userid = '$friend_userid' AND receiver_userid = '$myid')";
if ($conn->query($query) === TRUE) {
    $response = array(
        'success' => true,
        'message' => "Arkadaşlıktan çıkıldı."
    );
} else {
    $response = array(
        'success' => false,
        'message' => "Arkadaşlıktan çıkılırken bir hata oluştu: " . $conn->error
    );
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
