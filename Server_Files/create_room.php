<?php

$chatroom_name = $_GET['chatroom'];
$masterKey = $_GET['masterKey'];
$invitation_key = $_GET['invitationKey'];

// SQL Injection Prevention Filters for ChatRoom Name
$chatroom_name = str_replace("\\", "\\\\", $chatroom_name);
$chatroom_name = str_replace("'", "\\'", $chatroom_name);
$chatroom_name = str_replace("\"", "\\\"", $chatroom_name);

// SQL Injection Prevention Filters for invitation_key
$invitation_key = str_replace("\\", "\\\\", $invitation_key);
$invitation_key = str_replace("'", "\\'", $invitation_key);
$invitation_key = str_replace("\"", "\\\"", $invitation_key);

// SQL Injection Prevention Filters for MasterKey
$masterKey = str_replace("\\", "\\\\", $masterKey);
$masterKey = str_replace("'", "\\'", $masterKey);
$masterKey = str_replace("\"", "\\\"", $masterKey);

include_once 'config.php';

$sql = "INSERT INTO chatrooms (chatroom_name, master_key, invitation_key) VALUES (\"" . $chatroom_name . "\", \"" . $masterKey . "\", \"" . $invitation_key . "\");";
$result = $conn->query($sql);

if ($result == 1) {
	echo "Success";
}

$conn->close();
?>