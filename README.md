<p align="center">
  <img src="https://github.com/PushpenderIndia/TerminalChat/blob/master/TerminalChat-logo.png" alt="TerminalChat Logo" width=100 height=100/>
</p>

<h1 align="center">TerminalChat</h1>
<p align="center">
    <a href="https://python.org">
    <img src="https://img.shields.io/badge/Python-3.7-green.svg">
  </a>
  <a href="https://www.php.net">
    <img src="https://img.shields.io/badge/PHP-7.2.30-blue.svg">
  </a>
  <a href="https://github.com/PushpenderIndia/TerminalChat/blob/master/LICENSE">
    <img src="https://img.shields.io/badge/License-BSD%203-lightgrey.svg">
  </a>
  <a href="https://github.com/PushpenderIndia/TerminalChat/releases">
    <img src="https://img.shields.io/badge/Release-1.0-blue.svg">
  </a>
    <a href="https://github.com/PushpenderIndia/TerminalChat">
    <img src="https://img.shields.io/badge/Open%20Source-%E2%9D%A4-brightgreen.svg">
  </a>
</p>

TerminalChat is a console based instant messaging application made for hackers written in python3 &amp; php. Gives all Basic Messaging Functionality with a Console UI

## Features
- [x] OS Independent (Can Work On Any OS).
- [x] Have all basic instant messaging application functionality.
- [x] You can setup TerminalChat on any free hosting server.
- [x] Chatroom are protected with Two Passwords i.e. MasterKey & InvitationKey
- [x] Multiple Peoples can Chat at a time.


## Tested On

[![Windows)](https://www.google.com/s2/favicons?domain=https://www.microsoft.com/en-in/windows/)](https://www.microsoft.com/en-in/windows/) **Windows 8.1 - Pro**

## Prerequisite
- [x] Python 3.X
- [x] Few External Python Modules
- [x] Free Hosting Server Which Supports PHP & MySQL

## Installation

1. Download all files of TerminalChat by cloning/downloading this Repository
2. Upload all server files to your Free/Paid Hosting Server
3. Replace your Server URL in `TerminalChat.py`
4. Create Database with any name & Import the given `chats.sql` file.
5. Replace your correct Database credentials with the default one in the `Server_files/config.php`
6. Install Python Module Using Pip : `python -m pip install requests`
7. Run `TerminalChat.py` using python v3 : `python TerminalChat`
8. Login to Default Chatroom Name & Invitation Code: 

| Chatroom Name  | Invitation Code | MasterKey |
| ----------  | --------- | ----------- |
| mrrobot     | passw0rd | mast3rKey |

### Note : You can create your own Chatroom also, after creating your own chatroom you can delete default chatroom

## Help Menu

```
    Help Menu
    =========

    (1) Send Messages 
    -----------------
    Command : send "Message Here in Quotes"      
    Example : send "Hello How are U ?"
    
    (2) Retrieve Messages
    ---------------------
    Command : getmsg                           
    
    (3) Delete You All Chats From Server
    ------------------------------------  
    Command : del chats                        

    (4) Delete Current Chatroom
    ---------------------------
    Command : del room <master_key>            
    Example : del room mast3rKey

    (5) Create New Chatroom
    ----------------------- 
    Command : create room <roomName> <masterKey> <invitationKey>     
    Example : create room mrrobot mast3rKey passw0rd
       
    (6) Exit Chat Console
    ---------------------
    Command : exit
    Command : quit

```

## Contribute

* All Contributors are welcome, this repo needs contributors who will improve this tool to make it best.

## Contact

singhpushpender250@gmail.com 

## More Features Coming Soon...
