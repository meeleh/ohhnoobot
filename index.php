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
//function file($chatID, $file, $reply) {
//global $api;
//global $update;
//if($reply != NULL) {
//	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendPhoto?chat_id='.$chatID.'&file_id='.$file.'&reply_to_message_id='.$reply);	
//}
//else {	
//	$r = file_get_contents('https://api.telegram.org/'.$api.'/sendPhoto?chat_id='.$chatID.'&file_id='.$file); }
//} 
///////////////////////////////////////////////////////////////////////////
//Azioni
if(array_key_exists("text", $msg)){
    $text = strtolower($update["message"]["text"]);
	
    if($text == "/start") {
	$out = sm($chatID, "Scrivimi ancora e ti blocco", NULL); }

     
      if (stripos($text, "sete") !== false) {
	$out = sm($chatID, "Andiamo a bere qualcosa", NULL); }
	
	if (stripos($text, "fame") !== false){
	$out = sm($chatID, "*offre un biscotto*", NULL); }

        if (stripos($text, "latte") !== false)
          { $rand = array("chi devo allattare?", "mmm che sete", NULL , NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }

       if (stripos($text, "dimmi") !== false)
          { $rand = array("shhhh", "zitto", "zitta", "nudo", "nuda", "sesso nudo", NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }
     
       
        if (stripos($text, "fake") !== false)
          { $rand = array("foto o fake", "audio o fake", "se è fake non va bene", "odio i fake", "cosa dovrebbe dimostrare un audio, sei fake per quello che dici non perchè non esisti nel mondo empirico", NULL, NULL);
          $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }



        if (stripos($text, "tette") !== false)
          { $rand = array("Ho le tettone", "mmm a chi le esco?", "puoi anche essere donna ma se non hai le tettone sei solo un mostro deforme che non deve assolutamente parlare.", "Le tette sono l'antistress per eccellenza", "Succhiamele", NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }

         if (stripos($text, "Notte") !== false)
          { $rand = array("Nottee", "Dormi bene :) ", "Non riesco ad addormentarmi... ", "sogni d'oro", NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }

        if (stripos($text, "Buongiorno") !== false)
          { $rand = array("Giornoo", "Hai dormito abbastanza?", "Ho dormito pochissimo questa notte, che stanchezza", "che sonno", NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }


       if($text == "ok") {
	$rand = array("sono porca", "Si", "che noia", "no" , NULL, NULL);
      $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }

    if($text =="ciao" or $text == "ehi") { 
       $rand = array("Ciao", "Ehi ehi", "che noia", "da quanto tempoo" , "A quanti di voi il tè alla pesca l'estate crea dipendenza?", "Il mondo è una giungla moderna. Sbrani o vieni sbranato. Fine", NULL, NULL);
      $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }


        if (stripos($text, "piedi") !== false)
          { $rand = array("Mando foto piedi, per favore ditemi se sono carini", "Ho il 37 di piedi", "Mi scrivono solo per chiedermi i piedini... ", NULL, NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }
     
        
       if ((stripos($text, ":(") !== false) or (stripos($text, ":c") !== false)) 
         { $rand = array("Dai, ti abbraccio", "Quando sei triste lo sono anche io... ", "dai, sorridi per me", "che succede?", "voglio vederti solo sorridere, capito?", NULL, NULL);
          
           $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }
 
     
      if ((stripos($text, "brutto") !== false) or (stripos($text, "cesso") !== false) or (stripos($text, "incel") !== false))  { 
       $rand = array("Un brutto fatica tantissimo a conquistare una ragazza, spesso impiegando molto tempo. Se la perde può non avere alternative, anzi di sicuro non ha la ruota di scorta pronta. E rischia anzi è altamente probabile che debba dover restare solo per lungo tempo", "L'uomo è obbligato dalla società a dimostrare qualcosa. La donna obbliga se stessa a dimostrare qualcosa agli altri.", "Sei un cesso? Ok facile. Trovati i soldi e sottoponiti alla chirurgia", "Oddio.. Non credo dipenda da quanto sia bello o brutto" , "Ho il brutto vizio di non avere vie di mezzo", "Il mondo è una giungla moderna. Sbrani o vieni sbranato. Fine", NULL, NULL);
      $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }


     if ((stripos($text, "sesso") !== false) or (stripos($text, "scopare") !== false)) 
         { $rand = array("Ma quando ti decidi a scopare?", "Voglio fare sesso", "Voi dove preferite scopare?", "se devo scopare mi scopo qualcosa di decente non un buco qualsiasi", "voglio solo affetto, che schifo il sesso", NULL, NULL);
          
           $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }
 
     

      //Inizio risposta a Marty e reply

     if ((stripos($text, "Marty") !== false) or ($update["message"]["reply_to_message"]["from"]["id"] == 1145887993) or  (stripos($text, "@martinagrassobot")!== false)) {
           
          if (stripos($text, "bella") !== false)
          { $out = sm($chatID,"Sono io", $user_id);  }

          if (stripos($text, "nuda") !== false)
           { $rand = array("mmm ti piace?", " no *si copre*", "non guardarmi", "ti odio");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }

          if (stripos($text, "suca") !== false)
           { $rand = array("mmm *lo suca*", "va bene *glielo suca fino a farlo venire*", "levati", "no, ce l'hai troppo piccolo");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }

           if ((stripos($text, "muori") !== false) or (stripos($text, "ammazzati") !== false) or  (stripos($text, "ammazzo") !== false)) 
           { $rand = array("sta puttana non sa che una zombie è già dead", "caso umano", "levati", "ti spacco", "mi fai pena");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }
          
           if ((stripos($text, "abbracciami") !== false) or (stripos($text, "abbraccio") !== false)) 
          { $out = sm($chatID,"*abbraccia ".$user."*", $user_id); } 



           
           if (stripos($text, "?") !== false)
          { $rand = array("Insomma", "mmm", "lasciami stare", "sì dai", "non mi va", "non lo dico", "ok", "no hahah", "certo!", "ci sono dei pro e dei contro", "cosa vuoi ottenere da queste domande vaghe?", "Ci vuole anche un po' di buon senso a volte");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }

          if ((stripos($text, "gnocca") !== false) or (stripos($text, "carina") !== false) or  (stripos($text, "scopo") !== false) or (stripos($text, "scopo") !== false)) 
           { $rand = array("graziee", "lo so hahah", "levati", "hahahaha", "baciami");
           $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);} 
          
         
            if ((stripos($text, "cagna") !== false) or (stripos($text, "odio") !== false) or (stripos($text, "puttana") !== false) or (stripos($text, "zoccola") !== false) or (stripos($text, "zitta") !== false) or (stripos($text, "taci") !== false) or (stripos($text, "cogliona") !== false)) 
           { $rand = array("caso umano", "sono io", "puoi stare zitto? ", "taci", "Ho più palle di te bimbo di merda");
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);} 
       
           if (stripos($text, "anime") !== false)
           { $rand = array("che schifo", "Il mio anime preferito è Evangelion", "roba da sfigati");
           $out = sm($chatID, ($rand[array_rand($rand)]), NULL); } 
          
           if (stripos($text, "musica") !== false)
           { $rand = array("ascolto musica bella", "Mi mancano i concertii", "hahaha boh");
            $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  } 
          
          
}
      //Fine
     

     //if ($update["message"]["reply_to_message"]["from"]["id"] == 1145887993) {
      //  $out = sm($chatID,"eheh", $user_id);  }

	
  //   if (stripos($text, "Marty") !== false)
      // { $out = sm($chatID,"Ciao!", $user_id);  }

    if($text == "foto"){
	$photo = 'AgACAgEAAxkBAAEvN5BfB4AF6PMS8MV1X8qimJ2fERLSRQACiqgxG-RfOUR_AWNll5FDtt6jEjAABAEAAwIAA3kAA-luAQABGgQ';
	$out = file($chatID, $photo , NULL); }
   // file_get_contents('https://api.telegram.org/'.$api.'/sendPhoto?chat_id='.$chatID.'&photo=AgADBAADBrIxG9ZMGFB0-4_B_pgDi0roHhsABLnx3cNvC6zq-wEHAAEC');}
   
    if ($text == "nerino") {
	$photo = 'AgACAgEAAxkBAAEvN5BfB4AF6PMS8MV1X8qimJ2fERLSRQACiqgxG-RfOUR_AWNll5FDtt6jEjAABAEAAwIAA3kAA-luAQABGgQ';
	$out = sf($chatID, $photo, NULL);}
	
   if($text == "gattino"){
	$photo = 'https://www.miciogatto.it/new/wp-content/uploads/2018/02/Linguaggio-dei-gatti-come-capire-un-gatto-1030x587.jpg';
	$out = sf($chatID, $photo, NULL);}

   
	
}
//if(array_key_exists("photo", $msg))
//	$dati = file_get_contents('https://api.telegram.org/'.$api.'/sendMessage?chat_id=593168377&text='.json_encode($update,JSON_PRETTY_PRINT)); 
?>
