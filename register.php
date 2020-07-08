<?php
$token = "1145887993:AAGmVvRibrgjacU8E8fDpQVIXbv0B3n8KqY"; //Il token da @BotFather
$sito = "https://ohhnoobot.herokuapp.com/index.php"; //Il percorso dell'index

//////////////////////////////////// NON TOCCARE QUI ////////////////////////////////////////
$webhook = 'https://api.telegram.org/bot'.$token.'/setwebhook?url='.$sito.'?api=bot'.$token;
$ch = curl_init("$webhook");
curl_exec($ch);
