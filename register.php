<?php
$token = "796042247:AAEW581EaI5x0995-HnXjhP5mdxXas58rYA"; //Il token da @BotFather
$sito = "https://ohhnoobot.herokuapp.com/index.php"; //Il percorso dell'index

//////////////////////////////////// NON TOCCARE QUI ////////////////////////////////////////
$webhook = 'https://api.telegram.org/bot'.$token.'/setwebhook?url='.$sito.'?api=bot'.$token;
$ch = curl_init("$webhook");
curl_exec($ch);
