<?php

$chatroom_name = $_GET['chatroom'];
$auth_token = $_GET['token'];
$masterKey = $_GET['masterKey'];

// SQL Injection Prevention Filters for ChatRoom Name
$chatroom_name = str_replace("\\", "\\\\", $chatroom_name);
$chatroom_name = str_replace("'", "\\'", $chatroom_name);
$chatroom_name = str_replace("\"", "\\\"", $chatroom_name);

// SQL Injection Prevention Filters for Auth Token
$auth_token = str_replace("\\", "\\\\", $auth_token);
$auth_token = str_replace("'", "\\'", $auth_token);
$auth_token = str_replace("\"", "\\\"", $auth_token);

// SQL Injection Prevention Filters for MasterKey
$masterKey = str_replace("\\", "\\\\", $masterKey);
$masterKey = str_replace("'", "\\'", $masterKey);
$masterKey = str_replace("\"", "\\\"", $masterKey);

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
	$sql = "DELETE FROM `chatrooms` WHERE chatroom_name=\"" . $chatroom_name . "\" and master_key=\"" . $masterKey . "\";";
	if ($conn->query($sql) === TRUE) {
		echo "Success";
	}
	else {
		echo "Failed";
	}
}

else {
	echo "Invalid ChatRoom Name or Auth Token or MasterKey";
}

$conn->close();
?>