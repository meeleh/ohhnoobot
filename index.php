    
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
$user_id = $update["message"]["id"];
//Funzioni
function sm($chatID, $text, $reply) {
global $api;
if($reply != NULL) {
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text.'&reply_to_message='.$reply);
}
else {
$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text);  }
}
///////////////////////////////////////////////////////////////////////////
//Azioni
if($msg == "/start") {
sm($chatID, "Ehi ehi",$user_id);
}
if($msg =="ciao" or $msg == "ehi" or $msg == "Ciao" or $msg == "Ehi" or $msg == "Hey") {
	sm($chatID,"Ciao!",$user_id);}

?>
