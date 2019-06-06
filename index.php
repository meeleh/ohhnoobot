<?php

$botToken = "bot"."796042247:AAEW581EaI5x0995-HnXjhP5mdxXas58rYA";

$TelegramRawInput = file_get_contents("php://input");

$update = json_decode($TelegramRawInput, TRUE);

if(!$update)
{
  exit;
}

$MessageObj = $update['message'];

$chatId = $MessageObj['chat']['id'];

saveInJsonFile($update, "ricevuto.json");

$out = sendMsg($botToken,$chatId,"Hello World!");

saveInJsonFile($out, "inviato.json");

/
function sendMsg($tkn, $cId, $msgTxt){
 
    $TelegramUrlSendMessage = "https://api.telegram.org/".$tkn."/sendMessage?chat_id=".$cId."&text=".urlencode($msgTxt);
    
   
    return file_get_contents($TelegramUrlSendMessage);
}


function saveInJsonFile($data, $filename){
    if(file_exists($filename))
        unlink($filename);
    file_put_contents($filename,json_encode($data,JSON_PRETTY_PRINT));
}

?>
