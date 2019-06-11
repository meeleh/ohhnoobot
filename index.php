    
<?php 
//Non toccare qui
$api = $_GET['api'];
$content = file_get_contents("php://input");
$update = json_decode($content, true);
/////////////////////////////////////////////
///////////////////// Parte da api.telegram.org //////////////////////////
//Variabili
$msg = $update["message"]["text"];
$chatID = $update["message"]["chat"]["id"];
$user_id = $update["message"]["message_id"];
//Funzioni
function sm($chatID, $text, $reply) {
global $api;
if($reply != NULL) {
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text.'&reply_to_message_id='.$reply);
}
else {
$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text);  }
}
///////////////////////////////////////////////////////////////////////////
//Azioni
if(in_array("text", $msg)){
    $text = $msg["text"]

    if($text == "/start") 
        sm($chatID, "Ehi ehi", NULL);
    
    if($text =="ciao" or $msg == "ehi") 
        sm($chatID,"Ciao!", $user_id);
}

if(in_array("photo", $msg)){
}


?>
