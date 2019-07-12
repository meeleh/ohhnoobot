 <?php 
$api = $_GET['api'];
$content = file_get_contents("php://input");
$update = json_decode($content, true);
/////////////////////////////////////////////
///////////////////// Parte da api.telegram.org //////////////////////////
////////////


//VARIABILI
$msg = $update["message"];
$chatID = $update["message"]["chat"]["id"];
$user_id = $update["message"]["message_id"];

///////////////////////////////////////////////

//FUNZIONI

//funzione per mandare un messaggio di testo
function sm($chatID, $text, $reply) {
global $api;
global $update;
if($reply != NULL) {
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text.'&reply_to_message_id='.$reply);	
}
else {	
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text); }
}

//funzione per mandare una foto
function sf($chatID, $photo, $reply) {
global $api;
global $update;
if($reply != NULL) {
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendPhoto?chat_id='.$chatID.'&photo='.$photo.'&reply_to_message_id='.$reply);	
}
else {	
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendPhoto?chat_id='.$chatID.'&photo='.$photo); }
} 


///////////////////////////////////////////////////////////////////////////
//AZIONI 


if(array_key_exists("text", $msg)){ 
    $text = strtolower($update["message"]["text"]); //non modificare
	
    if($text == "/start") {
	$out = sm($chatID, "Ehi ehi", NULL); } //NULL per mandare il messaggio senza reply
	
    if($text =="ciao" or $text == "ehi") { 
       $out = sm($chatID,"Ciao!", $user_id);  } //$user_id per mandare il messaggio con reply
	
    if($text == "foto"){
	$photo = 'AgADBAADBrIxG9ZMGFB0-4_B_pgDi0roHhsABLnx3cNvC6zq-wEHAAEC';  //id della foto
	$out = sf($chatID, $photo , NULL); }
  
   
    if ($text == "gatto") {
	$photo = 'https://www.miciogatto.it/new/wp-content/uploads/2018/02/Linguaggio-dei-gatti-come-capire-un-gatto-1030x587.jpg'; //url della foto
	$out = sf($chatID, $photo, NULL);}
	
}

?>
