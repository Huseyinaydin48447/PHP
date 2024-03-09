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

$sender_userid = $_SESSION['userid']; 
$receiver_userid = $_POST['friend_userid'];

$query = "INSERT INTO friend_requests (sender_userid, receiver_userid, active, request_status) VALUES ('$sender_userid', '$receiver_userid', 1, 'sent')";
if ($conn->query($query) === TRUE) {
    $response = array(
        'success' => true,
        'message' => "Arkadaşlık isteği gönderildi.",
        'receiver_userid' => $receiver_userid
    );
} else {
    $response = array(
        'success' => false,
        'message' => "Arkadaşlık isteği gönderilirken bir hata oluştu: " . $conn->error
    );
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
