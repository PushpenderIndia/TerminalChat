import base64
import requests
import hashlib
import os

BLUE, RED, WHITE, YELLOW, MAGENTA, GREEN, END = '\33[94m', '\033[91m', '\33[97m', '\33[93m', '\033[1;35m', '\033[1;32m', '\033[0m'

# Please Enter Full URL With Protocal i.e. http:// or https://
SERVER_URL = "http://localhost/chat"     #Replace This With Your URL

def gettoken(chatpasswd, chatroom):
    calculated_auth_token = chatpasswd + ":" + chatroom
    result = hashlib.md5(calculated_auth_token.encode()) 
    return result.hexdigest()

def sendmsg(msg, chatroom, token, user):
    url = SERVER_URL + f"/sendchat.php?chatroom={chatroom}&token={token}&chats={msg}&user={user}"
    response = requests.get(url)
    if "Success" in response.text: 
        print("Message Sended Successfully !")
        
    else:
        print(response.text)
        
def getmsg():
    url = SERVER_URL + f"/getchat.php?chatroom={chatroom}&token={token}"
    response = requests.get(url)
    messages = str(response.text).replace("<br>", "\n")
    print(messages)
    
def del_chat(chatroom, token, user):
    url = SERVER_URL + f"/del_chat.php?chatroom={chatroom}&token={token}&user={user}"
    response = requests.get(url)
    if "Success" in response.text: 
        print("Your Messages Deleted Successfully From Server!") 

def del_room(chatroom, token, masterKey):
    url = SERVER_URL + f"/del_room.php?chatroom={chatroom}&token={token}&masterKey={masterKey}"
    response = requests.get(url)
    if "Success" in response.text: 
        print("Chatroom Deleted Successfully From Server!") 
        quit()
        
    else:
        print(response.text)
        
def create_room(chatroom_name, masterKey, invitationKey):
    url = SERVER_URL + f"/create_room.php?chatroom={chatroom_name}&masterKey={masterKey}&invitationKey={invitationKey}"
    response = requests.get(url)
    if "Success" in response.text: 
        print("\nChatroom Created Successfully!")
        print("Share Chatroom & InvitationKey to Your Friends")
        print("==============================================")
        print(f"Chatroom : {chatroom_name}")
        print(f"InvitationKey: {invitationKey}\n")

def takeinput(chatroom, user):
    text = input(f"{RED}{chatroom}@{user} :{WHITE} ")
    return text
    
def show_help():
    text = """
    
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
    
    """
    print(text)
        
if __name__ == "__main__":
    try:
        chatroom = input("[?] Enter Chatroom Name: ")
        chatpasswd = input("[?] Enter Chatroom Invitation Passwd: ")
        user = input("[?] Enter Nick Name: ")
        
        token = gettoken(chatpasswd, chatroom)
        
        print("\nType help or ? for help menu\n")
        
        while True:
            msg = takeinput(chatroom, user)
            if msg.lower() == "help" or msg == "?":
                show_help()
            
            elif "send" in msg.lower():
                msg = msg.replace("send ", "")
                msg = msg.split("\"")[1]
                sendmsg(str(base64.b64encode(msg.encode())).split('\'')[1], chatroom, token, user)
                
            elif msg.lower() == "getmsg":
                getmsg()
                
            elif msg.lower() == "del chats":
                del_chat(chatroom, token, user)
                
            elif "del room" in msg.lower():
                masterKey = msg.replace("del room ", "") 
                if masterKey == "":
                    print("Please Enter MasterKey")
                else:
                    del_room(chatroom, token, masterKey)
                
            elif "create room" in msg.lower():
                chatroom_name = msg.split(" ")[2]
                masterKey = msg.split(" ")[3]
                invitationKey = msg.split(" ")[4]
                create_room(chatroom_name, masterKey, invitationKey)
            
            elif msg == "":
                pass
                
            elif msg.lower() == "exit" or msg.lower() == "quit":
                quit()
                
            elif msg.lower() == "cls" or msg.lower() == "clear":
                try:
                    os.system("cls")
                except Exception:
                    os.system("clear")
            
            else:
                print("Command Not Found! Type help or ? for help menu")
    
    except KeyboardInterrupt:
        quit()
        