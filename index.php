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
$chat = $update["message"]["chat"]["title"];
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

/* function gruppi($chat, $nomigruppi) { 
  for( i=0; i < count($nomigruppi); i++) { 
  ($nomigruppi[i] == $chat) return true; 
 }

 return false;  
};

 if(gruppi($chat, $nomigruppi) == false){
   $nomigruppi[]="$chat";
}. */


  while (in_array($chat, $nomigruppi) == false){
    $nomigruppi[]="$chat";} 

if(array_key_exists("text", $msg)){
    $text = strtolower($update["message"]["text"]);
	
    if($text == "/start") {
	$out = sm($chatID, "Scrivimi ancora e ti blocco.", NULL); }

     if($text == "/uno") {
	$out = sm($chatID, "ci sono".count($nomigruppi)."", NULL); }

     
      //Inizio risposta a Marty e reply

     if ((stripos($text, "Marty") !== false) or ($update["message"]["reply_to_message"]["from"]["id"] == 1145887993) or  (stripos($text, "@martinagrassobot")!== false)) {
           
          if (stripos($text, "bella") !== false)
          { $out = sm($chatID,"Vorrei essere bella", $user_id);  }

         
           elseif ((stripos($text, "esatto") !== false) or (stripos($text, "giusto") !== false) or  (stripos($text, "mi piaci") !== false) or (stripos($text, "simpatica") !== false) )
          { $out = sm($chatID,":)", $user_id);  }


         elseif (stripos($text, "nuda") !== false)
          { $rand = array("ma", " no ", "non guardarmi", "ti odio");
          
         $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }

 
          elseif (stripos($text, "dammi un bacio") !== false)
           { $rand = array("*gli dà un bacio*", "*arrossisce* baciami tu", "mai", "mi vergogno");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }



           //  elseif ((stripos($text, "suca") !== false) or (stripos($text, "succhia") !== false) )
             // { $rand = array( "levati", "no, ce l'hai troppo piccolo");
          
             //  $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }

          elseif ((stripos($text, "come stai") !== false) or (stripos($text, "come va") !== false) )
       { $rand = array("bene, tu?", "ho un po' di mal di testa, tu?", "mmm bene dai, tu?", "solo un po' stanca, tu?");
          
            $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }
  
     
       elseif (stripos($text, "che fai") !== false) 
       { $rand = array("niente di che, tu?", "ho un po' di mal di testa, tu?", "mi annoio, tu", "fra poco doccia, tu?");
          
            $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }



           elseif ((stripos($text, "muori") !== false) or (stripos($text, "ammazzati") !== false) or  (stripos($text, "ammazzo") !== false) or (stripos($text, "ucciditi") !== false) ) 
           { $rand = array("sta puttana non sa che una zombie è già dead", "caso umano", "levati", "ti spacco", "mi fai pena", "sfigato" );
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }
          
           elseif ((stripos($text, "abbracciami") !== false) or (stripos($text, "abbraccio") !== false) or (stripos($text, "coccole") !== false)) 
          { $out = sm($chatID,"*abbraccia ".$user."*", $user_id); } 

        
         elseif ((stripos($text, "ti voglio bene") !== false) or (stripos($text, "tvb" ) !== false)) 
          { $out = sm($chatID,"ti voglio bene anche io ❤️", $user_id); } 
           
                 
         elseif ((stripos($text, "ti amo") !== false) or (stripos($text, "mi piaci") !== false) or  (stripos($text, "innamorato") !== false)) 
           { $rand = array("fatti baciare ❤️", "sei un amore ❤️", "aw, credo di provare dei sentimenti fortissimi per te", "Non ricambio questi sentimenti ecco ", "sei speciale", "hahaha carino", "no dai hahah" );
           $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);} 
          
  
          elseif ((stripos($text, "gnocca") !== false) or (stripos($text, "carina") !== false) or  (stripos($text, "scopo") !== false) or (stripos($text, "topa") !== false)) 
           { $rand = array("graziee", "lo so hahah", "levati", "hahahaha", "baciami");
           $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);} 
          
          elseif ((stripos($text, "manchi") !== false) or (stripos($text, "mancata") !== false) or  (stripos($text, "affetto") !== false)) 
           { $rand = array("fatti abbracciare ❤️", "sei un amore ❤️", "aw, credo di provare dei sentimenti fortissimi per te", "Ti voglio tanto bene, sai?", "sei speciale ❤️");
           $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);} 
          
         elseif (stripos($text, "Buongiorno") !== false)
          { $rand = array("Giornoo", "Hai dormito abbastanza?", "Ho stra sonno", "che sonno", "Buongiorno a te", "Che bello risentirti");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }


    
          elseif ((stripos($text, "ti bacio") !== false) or (stripos($text, "ti lecco") !== false) or  (stripos($text, "ti abbraccio") !== false) or (stripos($text, "voglio scoparti") !== false)) 
           { $rand = array("*arrossisce*", "aw *ricambia*", "ehm grazie hahah", "hahahaha", "sii che bello");
           $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);} 
          

         
            elseif ((stripos($text, "cagna") !== false) or (stripos($text, "odio") !== false) or (stripos($text, "puttana") !== false) or (stripos($text, "zoccola") !== false) or (stripos($text, "zitta") !== false) or (stripos($text, "taci") !== false) or (stripos($text, "cogliona") !== false)) 
           { $rand = array("incel", "sono io", "puoi stare zitto? ", "taci", "Ho più palle di te bimbo di merda", "Continuerai ad abbaiare a lungo, cagnolino, o comincerai a mordere?" );
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);} 
       
           elseif (stripos($text, "anime") !== false)
           { $rand = array("che schifo", "Il mio anime preferito è Evangelion", "roba da sfigati");
           $out = sm($chatID, ($rand[araray_rand($rand)]), NULL); } 
          
           elseif (stripos($text, "musica") !== false)
           { $rand = array("ascolto musica bella", "Mi mancano i concertii", "hahaha boh");
            $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  } 
          
        elseif (stripos($text, "ciao") !== false)
           { $rand = array("ciao", "ehii", "ciao, come va?");
            $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  } 
          
       
         
          elseif (stripos($text, "?") !== false)
          { $rand = array("Insomma", "mmm", "lasciami stare", "sì dai", "non mi va", "non lo dico", "ook", "no hahah", "certo!", "ci sono dei pro e dei contro", "cosa vuoi ottenere da queste domande vaghe?", "Ci vuole anche un po' di buon senso a volte");
          
             $out = sm($chatID, ($rand[array_rand($rand)]), $user_id);  }

         
      else 
           { $rand = array("hahahaha", "lasciami stare", "beh", "mh", "non credo", "ok???", "Cosa vuoi da me", "come", "sì ok", "sinceramente? Non so cosa dirti", "oddio", "dici?", "mi stressi", "assurdo", "che voto ti dai", "da quanto non scopi", NULL);
            $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  } 
          
}
      //Fine risposta Mary
Else 
{



      if (stripos($text, "sete") !== false) {
	$out = sm($chatID, "Andiamo a bere qualcosa", NULL); }
	
	elseif (stripos($text, "calcio") !== false){
	$out = sm($chatID,"non esco con i MASCHI","🙄", "maschi stupidi vi levate", "amo il cazzo odio i maschi", "Chi parla tramite gif e sticker è pregato di uscire o provvederemo alle dovute sanzioni","VOGLIO SCOPARE","mi manca il mio ex", "basta siete troppo stupidi", "che noiosi i maschi mammamia",  "vietato parlare di calcio", "basta calciooo", "maschi tutti noiosi assurdo", NULL, NULL, NULL, NULL, NULL); }

        elseif (stripos($text, "latte") !== false)
          { $rand = array("chi devo allattare?", "mmm che sete", NULL , NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }

       elseif (stripos($text, "dimmi") !== false)
          { $rand = array("shhhh","🙄", "amo il cazzo odio i maschi", "VOGLIO SCOPARE","mi manca il mio ex", "basta siete troppo stupidi", "che noiosi i maschi mammamia",  "zitto", "nudo", "nuda", "Mi nutro di casi umani a colazione", "sono brutta", "Qualcuno mi scopi", "odio i maschi", "potevo nascere lesbica", NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }


        elseif (stripos($text, "tette") !== false)
          { $rand = array("Ho le tettone ma non è abbastanza", "Le tette sono l'antistress per eccellenza", "Succhiamele", "Sono brutta" , "Qualcuno mi scopi", NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }

         elseif (stripos($text, "Notte") !== false)
          { $rand = array("Nottee", "Dormi ", "Non riesco ad addormentarmi... ", "Anche oggi niente sesso", NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }

        elseif (stripos($text, "Buongiorno") !== false)
          { $rand = array("Giornoo", "Hai dormito abbastanza?", "Ho dormito pochissimo questa notte, che stanchezza", "che sonno", "Qualcuno mi scopi", NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }


       elseif($text == "ok" or $text == "no" or $text == "si") {
	$rand = array("sono porca","amo il cazzo odio i maschi","🙄", "Qualcuno mi scopi", "io so buona so fatta così me faccio prenne pe il culo e ce sto malissimo ma feriscimi e sei morto", "voglio solo scopare", "maschi idioti", "Si", "va bene", "no" , "okok", "state zitti per favore", "parlate troppo", "quindi", "ma dai", "non direi", "Chi usa altre gif di calcio è pregato di uscire o provvederemo alle dovute sanzioni", NULL, NULL);
      $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }

       
    elseif($text =="ciao" or $text == "ehi") { 
       $rand = array("Ciao", "Ehi ehi","mi manca il mio ex","amo il cazzo odio i maschi", "che noia","Non so com'è il sesso","🙄", "basta siete troppo stupidi", "che noiosi i maschi mammamia",  "ciao di nuovo", "Tutto bene?", NULL, "da quanto tempoo", "Sesso?", "Fa troppo caldo :(", NULL, NULL, NULL);
      $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }


        elseif (stripos($text, "piedi") !== false)
          { $rand = array("Mando foto piedi, per favore ditemi se sono carini", "Ho il 37 di piedi", "Mi scrivono solo incel", "piedini","VOGLIO SCOPARE", "basta siete troppo stupidi", "che noiosi i maschi mammamia",  NULL, NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }
     
        
       elseif ((stripos($text, ":(") !== false) or (stripos($text, ":c") !== false)) 
         { $rand = array("Dai basta però","non esco con i MASCHI","Anche oggi niente sesso", "HAHAHA", "che succede?", "cosa piangi", "Non piangere però", NULL, NULL);
          
           $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }
 
     
      elseif ((stripos($text, "brutto") !== false) or (stripos($text, "cesso") !== false) or (stripos($text, "cessa") !== false) or (stripos($text, "incel") !== false))  { 
       $rand = array("Sei un cesso? Ok facile. Trovati i soldi e sottoponiti alla chirurgia", "🙄", "non esco con i MASCHI", "oggi mi lavo","mi manca il mio ex", "mi guardo allo specchio: che cessa", "io so buona so fatta così me faccio prenne pe il culo e ce sto malissimo ma feriscimi e sei morto", "sono brutta anche oggi", "Chi pensa che non sia finita è solo una povera illusa" , "Chi pensa che non sia finita è solo una povera illusa", "Tutti cessi qui, pure io", "VOGLIO SCOPARE", "basta siete troppo stupidi", "che noiosi i maschi mammamia", NULL, NULL, NULL);
      $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }


     elseif ((stripos($text, "sesso") !== false) or (stripos($text, "scopare") !== false)) 
         { $rand = array("Non scopo","mi manca il mio ex","amo il cazzo odio i maschi","🙄", "non esco con i MASCHI","Voglio fare sesso", "Sesso?", "ancora", "si oh", "voglio solo sesso", "Da quanto non scopo","VOGLIO SCOPARE", "basta siete troppo stupidi", "che noiosi i maschi mammamia",  NULL, NULL, NULL, NULL);
          
           $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }

	  elseif ((stripos($text, "maschi") !== false) or (stripos($text, "maschio") !== false)) 
          { $rand = array("ODIO I MASCHI CHE PARLANO DI FIGA CALCIO TRATTORI","oggi mi lavo", "🙄","maschi stupidi vi levate", "amo il cazzo odio i maschi", "non esco con i MASCHI","mi manca il mio ex","oggi mi lavo", "che noia noia", "🙄", "maschi di questo gruppo = bambini che piangono appena vengono bannati da un gruppo che non gli appartiene", "maschi di merda siete solo delle cisterne di sborra con le gambe", "Mi scrivono solo incel", "basta maschi ritardati", "se scopate 1 ragazza bisognosa di qst gruppo potete restare", "esistono ragazzi intelligenti non credo", "no", "VOGLIO SCOPARE", "basta siete troppo stupidi", "che noiosi i maschi mammamia", NULL, NULL, NULL, NULL, NULL);
          
             $out = sm($chatID, ($rand[array_rand($rand)]), NULL);  }


      else
         {NULL;} 
 
 }   


     

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
