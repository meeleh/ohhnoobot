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

//Funzioni
function sm($chatID, $text) {
global $api;
$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text);  
}

///////////////////////////////////////////////////////////////////////////


//Azioni
if($msg == "/start") {
sm($chatID, "Ehi ehi");
}

if($msg =="ciao") {
	sm($chatID,"ciao ciao");}
