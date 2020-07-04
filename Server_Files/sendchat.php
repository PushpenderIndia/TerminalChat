<?php

$chatroom_name = $_GET['chatroom'];
$auth_token = $_GET['token'];
$chats = base64_decode($_GET['chats']);
$posted_by = $_GET['user'];

// SQL Injection Prevention Filters for ChatRoom Name
$chatroom_name = str_replace("\\", "\\\\", $chatroom_name);
$chatroom_name = str_replace("'", "\\'", $chatroom_name);
$chatroom_name = str_replace("\"", "\\\"", $chatroom_name);

// SQL Injection Prevention Filters for Auth Token
$auth_token = str_replace("\\", "\\\\", $auth_token);
$auth_token = str_replace("'", "\\'", $auth_token);
$auth_token = str_replace("\"", "\\\"", $auth_token);

// SQL Injection Prevention Filters for User
$posted_by = str_replace("\\", "\\\\", $posted_by);
$posted_by = str_replace("'", "\\'", $posted_by);
$posted_by = str_replace("\"", "\\\"", $posted_by);

include_once 'config.php';

$sql = "select * from chatrooms where chatroom_name=\"" . $chatroom_name . "\";";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$passwd = $row["invitation_key"];
  }
} else {
	$passwd = "";
}


$calculated_auth_token = md5($passwd . ":" . $chatroom_name);

if ($calculated_auth_token == $auth_token) {
	$sql = "INSERT INTO `chats`(`chatroom_name`, `chats`, `posted_by`) VALUES (\"" . $chatroom_name . "\", \"" . $chats . "\", \"" . $posted_by . "\");";
	$result = $conn->query($sql);
	echo "Success";
}

else {
	echo "Invalid ChatRoom Name or Auth Token";
}


$conn->close();
?>