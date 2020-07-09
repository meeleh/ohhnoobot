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
$user= $update["message"]["from"]["first_name"];
//Funzioni
function sm($chatID, $text, $reply) {
global $api;
global $update;
//$dati = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.json_encode($update,JSON_PRETTY_PRINT));   
if($reply != NULL) {
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text.'&reply_to_message_id='.$reply);	
}
else {	
	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id='.$chatID.'&text='.$text); }
}
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
//Azioni
if(array_key_exists("text", $msg)){
    $text = strtolower($update["message"]["text"]);
	
    if($text == "/start") {
	$out = sm($chatID, "Che vuoi??", NULL); }
	
    if($text =="ciao" or $text == "ehi") { 
       $out = sm($chatID,"Ciao ".$user."!", $user_id);  }


      //Inizio risposta a Marty e reply

     if ((stripos($text, "Marty") !== false) or ($update["message"]["reply_to_message"]["from"]["id"] == 1145887993) or  (stripos($text, "@martinagrassobot")!== false)) {
           
          if (stripos($text, "bella") !== false)
          { $out = sm($chatID,"Sono io", $user_id);  }
          
          if (stripos($text, "suca") !== false)
           { $rand = array("mmm *lo suca*", "va bene *glielo suca fino a farlo venire*", "levati", "no, ce l'hai troppo piccolo");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }

           if ((stripos($text, "muori") !== false) or (stripos($text, "ammazzati") !== false) or  (stripos($text, "ammazzo") !== false)) 
           { $rand = array("sta puttana non sa che una zombie è già dead", "caso umano", "levati", "ti spacco", "mi fai pena");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }
          
           if ((stripos($text, "abbracciami") !== false) or (stripos($text, "abbraccio") !== false)) 
          { $out = sm($chatID,"*abbraccia ".$user."*", $user_id); } 

           
           if (stripos($text, "?") !== false)
          { $rand = array("Insomma", "mmm", "lasciami stare", "sì dai", "non mi va", "non lo dico", "ok", "no hahah", "certo!");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }

          if ((stripos($text, "gnocca") !== false) or (stripos($text, "carina") !== false) or  (stripos($text, "sesso") !== false) or (stripos($text, "scopo") !== false)) 
           { $rand = array("graziee", "lo so hahah", "levati", "hahahaha", "baciami");} 
         
            if (stripos($text, "cagna") !== false)
           { $rand = array("caso umano", "sono io", "puoi stare zitto? ", "taci");
          
}
      //Fine
     

     //if ($update["message"]["reply_to_message"]["from"]["id"] == 1145887993) {
      //  $out = sm($chatID,"eheh", $user_id);  }

	
  //   if (stripos($text, "Marty") !== false)
      // { $out = sm($chatID,"Ciao!", $user_id);  }

    if($text == "foto"){
	$photo = 'AgADBAADBrIxG9ZMGFB0-4_B_pgDi0roHhsABLnx3cNvC6zq-wEHAAEC';
	$out = sf($chatID, $photo , NULL); }
   // file_get_contents('https://api.telegram.org/'.$api.'/sendPhoto?chat_id='.$chatID.'&photo=AgADBAADBrIxG9ZMGFB0-4_B_pgDi0roHhsABLnx3cNvC6zq-wEHAAEC');}
   
    if ($text == "gatto") {
	$photo = 'https://www.miciogatto.it/new/wp-content/uploads/2018/02/Linguaggio-dei-gatti-come-capire-un-gatto-1030x587.jpg';
	$out = sf($chatID, $photo, NULL);}
	
   if($text == "gattino"){
	$photo = 'https://www.miciogatto.it/new/wp-content/uploads/2018/02/Linguaggio-dei-gatti-come-capire-un-gatto-1030x587.jpg';
	$out = sf($chatID, $photo, NULL);}

   
	
}
//if(array_key_exists("photo", $msg))
//	$dati = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id=593168377&text='.json_encode($update,JSON_PRETTY_PRINT)); 
?>
