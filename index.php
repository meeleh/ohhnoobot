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
$user_id = $update["message"]["from"]["id"];

//Funzioni

function saveInJsonFile($data, $filename){
    if(file_exists($filename))
        unlink($filename);
    file_put_contents($filename,json_encode($data,JSON_PRETTY_PRINT));
}

function sm($chatID, $text, $reply) {
global $api;
if($reply != NULL) {
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text.'&reply_to_message='.$reply)
}
else 
$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text);  
}
///////////////////////////////////////////////////////////////////////////


//Azioni


//Salvo il json ricevuto per analizzarlo in seguito
saveInJsonFile($update, "ricevuto.json");

if($msg == "/acul") {
$out = sm($chatID, "Ehi ehi");
}

if($msg =="ciao" or $msg == "ehi" or $msg == "Ciao" or $msg == "Ehi" or $msg == "Hey") {
	$out = sm($chatID,"Ciao!", $user_id;}

if($msg == "No") {
$out = sm($chatID, "Sì");
}

if($msg == "/start") {
$out = sm($chatID, "ciao");
}


//Salvo il json ricevuto per analizzarlo in seguito
saveInJsonFile($out, "inviato.json");
