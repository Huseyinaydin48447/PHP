<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mychat_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$receiver_userid = $_SESSION['userid']; 
$sender_userid = $_POST['friend_userid'];

$query = "UPDATE friend_requests SET accepted = 1 WHERE sender_userid = '$sender_userid' AND receiver_userid = '$receiver_userid'";
if ($conn->query($query) === TRUE) {
    $response = array(
        'success' => true,
        'message' => "Arkadaşlık isteği kabul edildi."
    );
} else {
    $response = array(
        'success' => false,
        'message' => "Arkadaşlık isteği kabul edilirken bir hata oluştu."
    );
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
