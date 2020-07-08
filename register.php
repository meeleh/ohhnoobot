<?php
$token = "1071068150:AAF5tebVKxqndoE9xN9Tm6Q5rYLZKY5KD60"; //Il token da @BotFather
$sito = "https://ohhnoobot.herokuapp.com/index.php"; //Il percorso dell'index

//////////////////////////////////// NON TOCCARE QUI ////////////////////////////////////////
$webhook = 'https://api.telegram.org/bot'.$token.'/setwebhook?url='.$sito.'?api=bot'.$token;
$ch = curl_init("$webhook");
curl_exec($ch);
