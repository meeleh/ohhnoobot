<?php
$token = "774419724:AAGuwyci9C4xjUQVETZTqfkyLEO32tESJfc"; //Il token da @BotFather
$sito = "https://ohhnoobot.herokuapp.com/index.php"; //Il percorso dell'index

//////////////////////////////////// NON TOCCARE QUI ////////////////////////////////////////
$webhook = 'https://api.telegram.org/bot'.$token.'/setwebhook?url='.$sito.'?api=bot'.$token;
$ch = curl_init("$webhook");
curl_exec($ch);
